<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

  <div class="content clear-block">
  <?php if ($node->type == "gig" || $node->type == "news"):?>
      <h2><?php print l($title, "node/".$node->nid); ?></h2>
     <?php if ($node->type == "news"){?> <p><?php print $date; ?></p> <?php }?>
  <?php endif?>
      <?php 
      		print $content;
      ?>
  </div>
</div>
