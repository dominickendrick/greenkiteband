  
  <div class="content clear-block">

  <h2><?php print $node->title?></h2>
  <div class="media_content" >
  	<img class="preview_photo" alt="" src="<?php print base_path() ."". $preview_image ?>" />
  <?php if (isset($link[prev]) || isset($link[next])): ?>
  <ul class="photo_nav">
  <?php
  if (isset($link[prev])){
  	print "<li class=\"first\" ><a href=\"".base_path()."".$node->language."/node/".$link[prev]."\"><img src=\"".base_path().path_to_theme()."/images/photo-nav-back.gif\" alt=\"".t("Previous")."\" /></a></li>";
  }
  
  if (isset($link[next])){
  	print "<li class=\"last\"><a href=\"".base_path()."".$node->language."/node/".$link[next]."\"><img src=\"".base_path().path_to_theme()."/images/photo-nav-forward.gif\" alt=\"".t("Next")."\" /></a></li>";
  }
  ?>
  </ul>
  <?php endif; ?>
  </div>
  
  <div class="media_meta">
  <?php print "$description";?>
  	<div class="file_downloads clear-block" >
  	<ul>
  		<li class="download">
  			<a href="<?php print "".base_path()."".$language.""."/terms_conditions/".t('Photograph')."".base_path()."". $download_path; ?>" class="imagedownload terms_conditions" >Download Hi-rez jpeg (1024x756)</a>
		</li>
		</ul>
	  </div>
	</div>
</div>