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
<?php ?>
<?php 
$video = node_load($row->nid);
$title = $video->field_video_embed[0]['data']['title'];
$title = preg_replace("/- blip.tv \(beta\)/","",$title);
$thumbnail = $video->field_video_embed[0]['data']['thumbnail']['url'];
$duration = $video->field_video_duration[0]['value'];
//$duration = preg_replace("/(\d\d$)/",":$1",$duration);
$embed = $video->field_video_embed[0]['embed'];
//print_r($video);
print "<a href=\"".base_path()."".$video->language."/".$video->path."\"><img src=\"".$thumbnail."\" width=\"150\" height=\"100\" alt=\"\"/>";
print "<img class=\"overlay video\" src=\"". base_path()."". path_to_theme() ."/images/video-overlay.png\" /></a>";
print "<p><strong>".$title."</strong><br />";
print t("Length")." : ".$duration."</p>";

 ?>
 