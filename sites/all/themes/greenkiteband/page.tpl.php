<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <title><?php print $head_title; ?></title>
        <?php global $path; ?>
        <?php $path = path_to_theme(); ?>
  

  <meta name="description" content="Great Ceilidh band from London, playing tradtional english, irish, scottish, jewish and american tunes for your dancing pleasure. We play weddings, birthdays and other special events at competative prices">
  <meta content="width=device-width, initial-scale=1" name="viewport">

  <link rel="shortcut icon" href="favicon.ico" />
  <!--[if IE]>
        <link href="/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->
    

    <link href="sites/all/themes/greenkiteband/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Medula+One' rel='stylesheet' type='text/css'>
  
  
   <script type="text/javascript">
 	var lang = "<?php print  $language->language ?>";
 	var base_path = "<?php print base_path(); ?>";
 	var theme_path = "<?php print $path?>";
 	var audio_file;
   </script>
   
     <script data-main="sites/all/themes/greenkiteband/js/app" src="sites/all/themes/greenkiteband/js/lib/require.js"></script>
     
    <?php if(user_is_logged_in()): ?>
         <script type="text/javascript" defer="defer" src="sites/all/modules/admin_menu/admin_menu.js?a"></script>
         <link type="text/css" rel="stylesheet" media="all" href="sites/all/modules/admin_menu/admin_menu.css?a">
    <?php endif;?>
</head>
  
<body>

 <header class="index">
      <h1>Green Kite Ceilidh band</h1>
      <a id="menu-icon" href="#nav">&#9776;</a>
  </header>
  <nav id="main_nav">

      <?php if (isset($primary_links)) : ?>
         <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
       <?php endif; ?>

   </nav>
  <div id="main" role="main">
       <?php if ($tabs): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
       <section class="content">
           <article>
      
   	        <?php if ($title): ?>
      	            <h1 class="title"><?php print t($title); ?></h1>
               <?php endif; ?>
    

               <?php print $content; ?>
               
           </article>
       </section>
       

       <section class="supporting-content">
           <article>
               <?php if ($right): ?>
                   <?php print $right ?>
               <?php endif; ?>
           </article>
       </section>
       
   </div>
 
  <?php print $closure; ?>
  <div id="footer-wrapper" >
    <div id="footer">
      <?php print $footer; ?>
    </div> <!-- /footer -->
  </div> <!-- /footer-wrapper -->
  <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
  try {
  var pageTracker = _gat._getTracker("UA-9262543-1");
  pageTracker._trackPageview();
  } catch(err) {}</script>
</body>
</html>