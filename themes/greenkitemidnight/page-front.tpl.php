
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" xml:lang="<?php print $language->language; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php global $path; ?>
  <?php $path = path_to_theme(); ?>
  
  <script type="text/javascript">
	var lang = "<?php print  $language->language ?>";
	var base_path = "<?php print base_path(); ?>";
	var theme_path = "<?php print $path?>";
	var audio_file;
  </script>
 
 <?php print $head; ?>
  <?php print $styles; ?>
  <!--[if IE]><style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/ie-fixes.css";</style><![endif]-->
  <!--[if IE 6]><style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/ie6.css";</style><![endif]-->
  <link rel="stylesheet" href="<?php print $path ?>/sifr.css" type="text/css">



  <?php print $scripts; ?>
  <script type="text/javascript" src="<?php print $path ?>/sifr.js?E"></script>
  <script type="text/javascript" src="<?php print $path ?>/sifr-config.js?E"></script>


 
</head>
  
<body class="<?php print $body_classes; ?> <?php print $language->dir; ?>_text" >
  <div id="page" class="<?php print $body_classes; ?>">
    <div id="header">
      <div id="header-top">
        <div id="logo">
          <a href="<?php print base_path(); ?>" title="greenkitemidnight"><span>Logo</span></a>
        </div>
        
      </div> <!-- /header-top -->

      <div id="navigation" class="menu <?php if ($primary_links) { print "withprimary"; } if ($secondary_links) { print " withsecondary"; } ?> ">
         
            
         <?php if (isset($primary_links)) : ?>
            <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
          <?php endif; ?>

      
    </div> <!-- /navigation -->
  </div> <!-- /header -->
	<div id="container" class="clear-block home_page">

      <div id="main" class="column main_home_page">
      <div id="squeeze" >
       
    	<?php if ($title): ?>
       	<h1 class="title"><?php print t($title); ?></h1>
     <?php endif; ?>
          <?php if ($left): ?>
               <div id="node" class="content">
                 <?php print $left ?>
               </div>
             <?php endif; ?>
        </div>
        <?php if ($right): ?>
            <div id="sidebar-right" class="sidebar">
              <?php print $right ?>
            </div>
          <?php endif; ?>
        
        </div> <!-- /squeeze /main -->
    </div> <!-- /container -->
  </div> <!-- /page -->
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