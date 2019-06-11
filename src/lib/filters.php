<?php
namespace Roots\Sage\Extras;

function get_the_excerpt($content) {
  if ( get_post_type() === 'portfolio' && is_front_page() ) {
    return "";
  }
  return $content;
}
add_filter('get_the_excerpt', __NAMESPACE__ . '\\get_the_excerpt');

//Exclude pages from WordPress Search
function search_filter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', __NAMESPACE__ . '\\search_filter');

// Add font-display for Google Fonts
// add_filter('style_loader_tag', __NAMESPACE__ . '\\google_font_filter', 1000, 4);
// function google_font_filter($html, $handle, $href, $media) {
//   if ($handle === 'mfn-base' || $handle === 'mfn-opts-icons') {
//     return str_replace($href, get_stylesheet_directory_uri() . "/style-{$handle}.css", $html);
//   } else if (strpos($href, 'fonts.googleapis.com/css')) {
//     return str_replace($href, $href . esc_attr("&display=swap"), $html);
//   }
//   return $html;
// }
