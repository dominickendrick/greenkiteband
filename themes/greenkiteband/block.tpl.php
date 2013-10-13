<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="clear-block <?php if ($block->custom_classes) { echo 'block-' . implode(" block-",$block->custom_classes);} ?> block block-<?php print $block->module ?>">  
  <div class="blockinner">
  <?php if ($block->subject != null){ ?>
    <?php if ($block->subject == 'Upcoming Gigs' || $block->subject == 'About Us'){ ?>
      <h2 class="title_white"> <?php print $block->subject; ?></h2>
    <?php } else {?>
    <h2 class="title"> <?php print $block->subject; ?></h2>
  <?php }} ?>
    <div class="content clear-block">
      <?php print $block->content; ?>
      <?php if ($block->subject == 'Upcoming Gigs'){ ?>
      <a href="?q=gigs">... read more</a>
      <?php }?>
    </div>    
  </div>
</div>
