<?php
/**
 * Hooks & filter for LiteSpeed plugin
 */
define('LITESPEED_ON', 1); /* For testing only */

if (!defined('LITESPEED_ON') || !LITESPEED_ON) {
  return ;
}

add_filter('litespeed_optm_html_head', 'add_font_display_gg_fonts');
function add_font_display_gg_fonts($html) {
  $pattern = '/google:{families:\[([^\]]*)]/i';
  $html = preg_replace_callback($pattern, function ($match) {
    return str_replace('\']', '&display=swap\']', $match[0]);
  }, $html);
  // Add to all
  /* $html = preg_replace_callback($pattern, function ($match) {
    $pattern2 = '/\'([^\']*)\'/i';
    $added = preg_replace($pattern2, '\'$1&display=swap\'', $match[1]);
    return str_replace($match[1], $added, $match[0]);
  }, $html); */

  return $html;
}

// Filter text before the first <meta.. tag
add_filter('litespeed_optm_html_head', 'fix_bug_404_and_local_fonts');
function fix_bug_404_and_local_fonts($html) {
  $pattern = '/< id="litespeed-optm-css-rules">(.*)<\/style>/i';
  $html = preg_replace_callback($pattern, function($match) {
    return str_replace('url(min/', 'url(' . home_url('min') . '/', $match[0]);
  }, $html);

  $html = str_replace('@font-face{', '@font-face{font-display:swap;', $html);

  return $html;
}

// Add to font-display to css file
if (defined('RS_PLUGIN_PATH')) {
  $css_file = RS_PLUGIN_PATH . '/public/assets/css/settings.css';
  $ouput_file = WP_CONTENT_DIR . '/uploads/revslider-settings.css';
  if (!file_exists($ouput_file)) {
    $css_content = file_get_contents($css_file);
    $css_content = str_replace('\'revicons\';', '\'revicons\'; font-display: swap;', $css_content);
    $css_content = str_replace('../fonts', RS_PLUGIN_URL . 'public/assets/fonts', $css_content);
    file_put_contents($ouput_file, $css_content);
  }
  // Change path in wp_enqueue_styles
  add_filter('style_loader_tag', function($html, $handle, $href, $media) {
    if ($handle === 'rs-plugin-settings') {
      $new_href = wp_upload_dir()['baseurl'] . '/revslider-settings.css';
      return str_replace($href, $new_href, $html);
    }
    return $html;
  }, 100, 4);
}
