
<div class="content clear-block">
  <h2><?php print $title ?></h2>
	  
	  <p>
	 	<?php  print t(Duration)." : ".$duration; ?>
	  </p>

	  
	  <div class="media_content">
	  <embed src="http://blip.tv/play/<?php print $video; ?>" type="application/x-shockwave-flash" width="480" height="390" allowscriptaccess="always" allowfullscreen="true"></embed> 
      </div>
      
      <div class="media_meta">
      	<p>
      		<?php print $text_content ?> 
      	</p>
      	
      	<div class="file_downloads clear-block">
      	
      	<ul>
      		<li class="download">
      			<a class="download_video terms_conditions" href="<?php print "".base_path()."".$language.""."/terms_conditions/".t('Video')."".base_path()."". $download; ?>" ><?php print t("Download video (.mov)");?></a>
      		</li>
      		<?php foreach ($node->files as $file): ?>
      		
      		<li class="pdf nobg"><a href="<?php print base_path() . $file->filepath ?>"><?php print $file->description ?></a></li>
      		
      		<?php endforeach; ?> 
      		 	
      	</ul>
      		
      	</div>
      	
      </div>
	
</div>
