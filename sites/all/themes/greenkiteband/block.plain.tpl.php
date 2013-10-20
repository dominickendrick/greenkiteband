<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="<?php if ($block->custom_classes) { echo 'block-' . implode(" block-",$block->custom_classes);} ?> block block-<?php print $block->module ?>">  
  <div class="blockinner">
    <h2 class="title"> <?php print $block->subject; ?> <?php if ( $is_front ) { ?><span class='menu-arrow'>&#8250;</span><?php } ?></h2>
    <div class="content">
      <?php print $block->content; ?>
    </div>    
  </div>
</div>
