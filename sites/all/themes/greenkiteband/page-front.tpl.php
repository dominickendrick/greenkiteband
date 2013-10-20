<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <title><?php print $head_title; ?></title>
        <?php global $path; ?>
        <?php $path = path_to_theme(); ?>
  

  <meta name="description" content="Great Ceilidh band from London, playing tradtional english, irish, scottish, jewish and american tunes for your dancing pleasure. We play weddings, birthdays and other special events at competative prices">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link rel="shortcut icon" href="favicon.ico" />
  <!--[if IE]>
        <link href="/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->

    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $scripts; ?>
    
    <link href="sites/all/themes/greenkiteband/css/style.css" rel="stylesheet"> 
    <link href='http://fonts.googleapis.com/css?family=Medula+One' rel='stylesheet' type='text/css'>
  
   <script type="text/javascript">
 	var lang = "<?php print  $language->language ?>";
 	var base_path = "<?php print base_path(); ?>";
 	var theme_path = "<?php print $path?>";
 	var audio_file;
   </script>
   
     <script data-main="sites/all/themes/greenkiteband/js/app" src="sites/all/themes/greenkiteband/js/lib/require.js"></script>


</head>
  
<body>

 <header class="index">
      <h1>Green Kite Ceilidh band</h1>
      <a id="menu-icon" href="#nav">&#9776;</a>
  </header>
  
   <div id="main" role="main">
        <?php if ($tabs): ?><div class="tabs"><?php print $tabs; ?></div><?php endif; ?>
        <section class="content">
            <article>
       
    	        <?php if ($title): ?>
       	            <h1 class="title"><?php print t($title); ?></h1>
                <?php endif; ?>
     
                <?php if ($left): ?>
                    
                    <?php print $left ?>
                    
                <?php endif; ?>
                
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
 
 <nav id="main_nav">
      <script>
        var nav = document.getElementById('main_nav');
        nav.style.display = "none";
      </script>
      <a name="nav" onclick="return false;"></a>
        
     <?php if (isset($primary_links)) : ?>
        <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
      <?php endif; ?>

  
  </nav>
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