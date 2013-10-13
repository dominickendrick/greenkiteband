<div id="search">
  SEARCH &nbsp; 
  <input type="text" maxlength="128" name="keywords" id="edit-search_theme_form_keys"  size="15" value="<?php print isset($_GET["keywords"]) ? check_plain($_GET["keywords"]) : ""; ?>" title="<?php print t('Enter the terms you wish to search for.'); ?>" class="form-text" />
  &nbsp; <input type="submit" name="op" class="form-submit" value="GO"  />
  <input type="hidden" name="form_id" id="edit-search-theme-form" value="search_theme_form" />
  <input type="hidden" name="form_token" id="a-unique-id" value="<?php print drupal_get_token('search_theme_form'); ?>" />
</div>