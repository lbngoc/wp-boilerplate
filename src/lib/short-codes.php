<?php
/**
 * Custom short code for child theme
 */

add_shortcode('icon_bar_list', 'sc_icon_bar_list');
function sc_icon_bar_list($attr, $content) {
  ob_start();
  get_template_part( 'includes/include', 'social' );
  $output = ob_get_clean();
  return $output;
}

