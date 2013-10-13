
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php print $picture ?>

<!--<?php if($links): ?>
<div class="content_meta">
  <?php if ($links): ?>
  <p class="small"><?php print t("This page is avaliable in these"); ?></p>
  <h2 class="language"><?php print t("Languages");?></h2>
  
      <div class="links clear-block"><?php print $links; ?></div>
   <?php endif; ?>

  <?php if ($node->content['files']): ?>
  <p class="small"><?php print t("Related Documents for"); ?></p>
  <h2 class="language"><?php print t("Download");?></h2>
     
     <div class="clear-block">
       <ul class="pdf">
      <?php foreach ($node->files as $file): ?>
      	<li><a href="<?php print base_path() . $file->filepath ?>"><?php print $file->description ?></a></li>
      <?php endforeach; ?>
      </div>
   <?php endif; ?>
	
</div>
<?php endif; ?> -->
  <div class="content clear-block">

	  	<h2><?php print $title ?></h2>
      <?php 
      //print_r($download);
      		print $content;
      		//get full url if an external http address is passed (mostly for videos)
      		if (preg_match("/((.+?)\/)http:\/\//",$download[1],$match)){
      			 $download[1] = str_replace($match[1],'',$download[1]);
      		} else {
      			$download[1] = "/".$download[1];
      		}
      		?>
      		<form action="<?php print $download[1]?>" method="POST">
      			<fieldset>
      				<input type="submit" value="<?php print t('Accept')?>" />
      				<input type="hidden" value="true" name="disclaimer" />
      			</fieldset>
      		</form>
      		<form action="<?php print $ref ?>">
      			<fieldset>
      				<input type="submit" value="<?php print t('Cancel')?>" />
      			</fieldset>
      		</form>
  </div>


    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>
    </div>

</div>
<p><img src="http://localhost/air09/themes/air09/images/print-icon.gif" /> Print this page</p>
