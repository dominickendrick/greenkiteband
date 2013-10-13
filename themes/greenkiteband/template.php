<?php 




function air09_links($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';
// remove upload from links to only show language links
	unset($links['upload_attachments']);
  
  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}


function air09_breadcrumb($breadcrumb) {

    
  if (!empty($breadcrumb)) {

    $breadcrumb[0] = '<a href="/">' . t('Amnesty International Report 2009') .'</a> &raquo; <a href="'.base_path().'">'. t('Press Area') .'</a>';  

    $first_crumb = true;
    foreach ($breadcrumb as $crumb) {
      if ($crumb != '<a href="/"></a>') {
        if ($first_crumb) {
          $first_crumb = false;
          $output .= '<li class="breadcrumb-item"><span class="breadcrumb-text">' . $crumb . '</span></li>';
        } else {
          $output .= '<li class="breadcrumb-item"><span class="breadcrumb-text">&raquo; ' . $crumb . '</span></li>';
        }
      }
    }
    return '<div class="breadcrumb clear-block"><ul class="menu">'. $output . '</ul></div>';
  }
}
// Theme rss feed blocks

function air09_aggregator_block_item($item, $feed = 0) {



  $description = $item->description;
  $output .= "<a href=\"". check_url($item->link) ."\">";

 if(preg_match("/(<img(.+?)\/>)/",$description,$image)){
	$image = $image[1];
	
	$description = str_replace($image, "", $description);
	$image = str_replace("<img ","<img width=\"70\" height=\"70\"",$image);
	$output .= $image;
 } 
 
 elseif ($item->fid == 5) { // if feed is from twitter add thumbnail
 
 $output .= "<img src=\"". base_path() . path_to_theme() ."/images/twitter70x70.png\" alt=\"\" title=\"\" />";
 
 } else {
	$output .="<img title=\"\" alt=\"\" src=\"". base_path() . path_to_theme() ."/images/feed-default.png\"/>";
 }
	

  // Display the external link to the item.
  
  $output .= strip_tags(substr($description,0,80)) ."...</a>\n";
  
  return $output;
}

//node type preprocess functions

function air09_preprocess_node(&$vars, $hook) {
  // Variables available to every node are defined here
 
 //$drupal_to_js = "var lang = \"".$language->language."\";var base_path = \"".base_path()."\"";
 //drupal_add_js($drupal_to_js,'inline');
 drupal_add_js(drupal_get_path('theme', 'air09').'/thumbnails.js', 'theme');
 drupal_add_js(drupal_get_path('theme', 'air09').'/supersleight.plugin.js', 'theme'); 
 drupal_add_js(drupal_get_path('theme', 'air09').'/png.js', 'theme');
 


$vars['date'] = format_date($vars['node']->revision_timestamp, 'custom', 'F jS, Y');
 
 
 
 
  // Now define node type-specific variables by calling their own preprocess functions (if they exist)
$function = 'air09_preprocess_node'.'_'. $vars['node']->type;
  if (function_exists($function)) {
   $function($vars);
  }
/*  air09_preprocess_node_video($vars);
  air09_preprocess_node_photo($vars);
  air09_preprocess_node_audio($vars); */
}

//
//set up variables for video content type template
//
//

function air09_preprocess_node_video(&$vars) {
	  
 $vars['video'] = $vars['node']->field_video_embed[0]['data']['embed_code'][0];
 
 $vars['duration'] = $vars['node']->field_video_duration[0]['value'];;
// $vars['duration'] = preg_replace("/(\d\d$)/",":$1",$duration);
 //$vars['duration'] = $duration / 60;
 $vars['text_content'] = $vars['node']->content['body']['#value'];
 $vars['download'] = $vars['node']->field_video_embed[0]['data']['flv']['url'];

}

//
//set up variables for photo content type template
//
//

function air09_preprocess_node_photo(&$vars) {
  
  $node_qid;
  $node_position;
  
  $result_db = db_query('SELECT * FROM {nodequeue_nodes} WHERE nid = %s'.$vars['node']->nid);  
  
  while ($action = db_fetch_object($result_db)) {
	$node_qid = $action->qid;
	$node_position = $action->position;
  }

if (isset($node_qid)){
  $result_db = db_query('SELECT * FROM {nodequeue_nodes} WHERE qid = %s'. $node_qid);

  $node_queue = array();
  
  while ($action = db_fetch_object($result_db)) {

	$node_queue[] = $action;

 }
 
 $vars['link'] =  array();	
 $queue_length = count($node_queue);

 if ($queue_length > 1){
 
 	if ($node_position == 1){
  		$vars['link'][next] = $node_queue[1]->nid;
  	}
  	elseif ($node_position == $queue_length){
  		$vars['link'][prev] = $node_queue[$queue_length - 2]->nid;
  	
  	}
  	else{
  	$vars['link'][next] = $node_queue[$node_position]->nid;
  	$vars['link'][prev] = $node_queue[$node_position - 2]->nid;
  	}
  }
 }


  $vars['description'] = $vars['node']->content['body']['#value']; 
  $vars['download_path'] = $vars['node']->field_image_main[0]['filepath'];
  $vars['preview_image'] = str_replace("/files/","/files/imagecache/preview/",$vars['download_path']); 

}

//
//set up variables for audio content type template
//
//


function air09_preprocess_node_audio(&$vars) {
  drupal_add_js(drupal_get_path('theme', 'air09').'/audio-player/audio-player.js', 'theme');
  
  $audio_js ="AudioPlayer.setup(\"". base_path()."".path_to_theme()."/audio-player/player.swf\", {width: \"450\",initialvolume: \"50\",transparentpagebg: \"yes\"});";
  drupal_add_js($audio_js,'inline');
 
  $vars['audio_file'] = $vars['node']->field_audio_file[0]['filepath'];
  $vars['attachment'] = $vars['node']->files[9]->filepath;

}


function air09_preprocess_node_terms_conditions(&$vars) {
	
    $path = drupal_get_path_alias($_GET['q']); //get alias of URL
    $path = explode('/', $path); //break path into an array
    //user print_r($path); to see what the $path array looks like
	array_shift($path);
	$vars['ref'] = $_SERVER["HTTP_REFERER"];  
    $vars['download'][0] = array_shift($path);
    $vars['download'][1] = implode('/',$path);
    $vars['download'][1] = str_replace('http:/','http://',$vars['download'][1]);
   	 // $vars['ref'] =  print_r($ref,false);//drupal_get_path_alias($ref); //get alias of URL
}

/**
 * Implementation of theme_service_links_build_link().
 *
 */
 function air09_service_links_build_link($text, $url, $title, $image, $nodelink) {
  global $base_path;

  if ($nodelink) {
    switch (variable_get('service_links_style', 1)) {
      case 1:
        $link = array(
          'title' => $text,
          'href' => $url,
          'attributes' => array('title' => $title, 'rel' => 'nofollow')
        );
        break;
      case 2:
        $link = array(
          'title' => '<img src="'. $base_path . path_to_theme() .'/images/servicelinks/'. $image .'" alt="'. $text .'" />',
          'href' => $url,
          'attributes' => array('title' => $title, 'rel' => 'nofollow'),
          'html' => TRUE
        );
        break;
      case 3:
        $link = array(
          'title' => '<img src="'. $base_path . path_to_theme() .'/images/servicelinks/'. $image .'" alt="'. $text .'" /> '. $text,
          'href' => $url,
          'attributes' => array('title' => $title, 'rel' => 'nofollow'),
          'html' => TRUE
        );
        break;
    }
  }
  else {
    switch (variable_get('service_links_style', 1)) {
      case 1:
        $link = '<a href="'. check_url($url) .'" title="'. $title .'" rel="nofollow">'. $text .'</a>';
        break;
      case 2:
        $link = '<a href="'. check_url($url) .'" title="'. $title .'" rel="nofollow"><img src="'. $base_path . path_to_theme() .'/images/servicelinks/'. $image .'" alt="'. $text .'" /></a>';
        break;
      case 3:
        $link = '<a href="'. check_url($url) .'" title="'. $title .'" rel="nofollow"><img src="'. $base_path . path_to_theme() .'/images/servicelinks/'. $image .'" alt="'. $text .'" /> '. $text .'</a>';
        break;
    }
  }

  return $link;
}




