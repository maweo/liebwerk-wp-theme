<?php

// All Functions Require
// Field Type: "Image"
// Return Format "Image ID"
function get_image_data_from_field($field_name, $size = "large") {
  $field_value = get_field($field_name);
  $url = wp_get_attachment_image_src($field_value, $size)[0];
  $alt = get_post_meta( $field_value, '_wp_attachment_image_alt', true);
  return ['url' => $url, 'alt' => $alt];
}

function get_image_data_from_sub_field($field_name, $size = "large") {
  $field_value = get_sub_field($field_name);
  $url = wp_get_attachment_image_src($field_value, $size)[0];
  $alt = get_post_meta( $field_value, '_wp_attachment_image_alt', true);
  return ['url' => $url, 'alt' => $alt];
}

function get_image_data_from_option_field($field_name, $size = "large") {
  $field_value = get_field($field_name, "option");
  $url = wp_get_attachment_image_src($field_value, $size)[0];
  $alt = get_post_meta( $field_value, '_wp_attachment_image_alt', true);
  return ['url' => $url, 'alt' => $alt];
}

function get_image_data($attachment_id, $size = "large") {
  $url = wp_get_attachment_image_src($attachment_id, $size) ?  wp_get_attachment_image_src($attachment_id, $size)[0] : null;
  $alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
  return ['url' => $url, 'alt' => $alt];
}
