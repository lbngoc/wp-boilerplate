<?php
namespace Roots\Sage\Extras;

function get_the_excerpt($content) {
  if ( get_post_type() === 'portfolio' && is_front_page() ) {
    return "";
  }
  return $content;
}
add_filter('get_the_excerpt', __NAMESPACE__ . '\\get_the_excerpt');
