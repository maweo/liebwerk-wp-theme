<?php

// Limit the excerpt by characters instead of words to get a more consistent length
//(does not truncate the last word)
function get_excerpt($limit = 100, $source = null){
  $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);

  if (strlen($excerpt) > $limit) {
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    if (substr($excerpt, -1) == ",") {
      $excerpt = substr($excerpt, 0, -1);
    }
  }

  return $excerpt;
}

function get_excerpt_by_id($limit = 100, $source = null, $id){
  $excerpt = $source == "content" ? get_the_content(null, null, $id) : get_the_excerpt($id);
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);

  if (strlen($excerpt) > $limit) {
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    if (substr($excerpt, -1) == ",") {
      $excerpt = substr($excerpt, 0, -1);
    }
  }

  return $excerpt;
}

