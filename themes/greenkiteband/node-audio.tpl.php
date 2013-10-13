<?php

// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>

   <div class="content"> 
    <p><?php print t("Now playing") ?></p>
    <h2>
	<?php print $title ?>
	</h2>  
	  <p id="audioplayer_1"><a href="<?php print base_path() ."". $audio_file ?>" target="_blank">Download <?php print $title?>.mp3</a></p> 
	  
	  <script type="text/javascript">  
         AudioPlayer.embed("audioplayer_1", {soundFile: "<?php print base_path() ."". $audio_file ?>"});  
         var audio_file = "<?php print $audio_file ?>";
      </script>  

</div>
