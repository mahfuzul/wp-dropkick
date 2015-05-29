<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://mahfuzulhasan.com
 * @since      1.0.0
 *
 * @package    Wp_Dropkick
 * @subpackage Wp_Dropkick/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
<h2>WP Dropkick Settings</h2>

<form method="post" action="options.php">
  <?php settings_fields( 'wp_dropkick-settings-group' ); ?>
  <?php do_settings_sections( 'wp_dropkick-settings-group' ); ?>
  <table class="form-table">
    <tr valign="top">
      <td>
        <label for="dropkick_jquery_selector"><p><strong>Apply DropKick to the following elements:</strong></p> </label><br>
        <textarea id="dropkick_jquery_selector" name="dropkick_jquery_selector" cols="80" rows="5"></textarea>
        <div class="description">
          A jQuery selector to find elements to apply Dropkick to, such as <code>.dropkick-select</code>. Use <code>select</code> to apply Dropkick to all <code>&lt;select&gt;</code> elements.
          <br>For multiple selector use comma separated selector.
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <fieldset>
          <legend><p><strong>Advance Settings</strong></p></legend>

          <input type="checkbox" name="dropkick-mobile-device-support" id="dropkick-mobile-device-support" value="">
          <label for="dropkick-mobile-device-support">Mobile device support for DropKick</label>

          <br>

          <input type="checkbox" name="dropkick_ie8_support" id="dropkick_ie8_support" value="">
          <label for="dropkick_ie8_support">IE 8 support for DropKick</label>
        </fieldset>
      </td>
    </tr>

  </table>

  <?php submit_button(); ?>

</form>
</div>
