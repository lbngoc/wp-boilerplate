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

add_shortcode('current_year', 'sc_current_year');
function sc_current_year() {
  $year = date('Y');
  return $year;
}

// Share to social (by Sharethis plugin)
add_shortcode('sharebox', 'sc_sharebox');
function sc_sharebox($attr, $content) {
  if (empty($attr)) {
    return '<div class="sharethis-inline-share-buttons"></div>';
  }
  extract(shortcode_atts([
    'url' => home_url(),
    'title' => get_bloginfo('name')
  ], $attr));
  return sprintf('<div class="sharethis-inline-share-buttons" data-url="%s" data-title="%s"></div>', $url, $title);
}
