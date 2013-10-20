<?php
// $Id: views-view-field.tpl.php,v 1.1 2008/05/16 22:22:32 merlinofchaos Exp $
 /**
  * This template is used to print a single field in a view. It is not
  * actually used in default Views, as this is registered as a theme
  * function which has better performance. For single overrides, the
  * template is perfectly okay.
  *
  * Variables available:
  * - $view: The view object
  * - $field: The field handler object that can process the input
  * - $row: The raw SQL result that can be used
  * - $output: The processed output that will normally be used.
  *
  * When fetching output from the $row, this construct should be used:
  * $data = $row->{$field->field_alias}
  *
  * The above will guarantee that you'll always get the correct data,
  * regardless of any changes in the aliasing that might happen if
  * the view is modified.
  */
?>
<?php //print $output; ?>
<?php 
$thumbnail = node_load($row->nid);
//print_r($thumbnail);
$thumbnail_image = "sites/default/files/placeholder_95x95.gif";
 if(isset($thumbnail->field_audio_thumbnail[0]['filepath'])){
	$thumbnail_image = $thumbnail->field_audio_thumbnail[0]['filepath'];
} 

$audio_file = $thumbnail->field_audio_file[0]['filepath'];

//print_r($thumbnail);
?>

<?php
//print "<a href=\"".base_path()."".$thumbnail->language."/".$thumbnail->path."\">Title</a></li>";
print "<ul>";
print "<li><a href=\"".base_path()."".$audio_file."\">".t("Download mp3")."</a></li>";

 ?>
 <?php if ($thumbnail->files): ?>

      <?php foreach ($thumbnail->files as $file): ?>
      	<li><a href="<?php print base_path() . $file->filepath ?>"><?php print t("PDF Transcript"); ?></a></li>
      <?php endforeach; ?>
   <?php endif; ?>
 <?php print "</ul>"; ?>