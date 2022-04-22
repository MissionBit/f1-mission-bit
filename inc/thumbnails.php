<?php

/*-----------------------------------------------------------------------------
  Get featured image as url
-----------------------------------------------------------------------------*/
function featuredURL($size = 'full'){
  global $post;
  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
  $url = $thumb['0'];
  return $url;
}

/*-----------------------------------------------------------------------------
  Adds thumbnail support and additional thumbnail sizes
-----------------------------------------------------------------------------*/

if( function_exists('prelude_features') ){
  // Use add_image_size below to add additional thumbnail sizes
  add_image_size( 'admin_thumb', 75, 75, array('center', 'center') );
  add_image_size( 'header_logo', 370, 90, false );
  add_image_size( 'footer_logo', 82, 90, false );
  add_image_size( 'hero', 1920, 1000, array('center', 'center') );
  add_image_size( 'text_image_split', 950, 1000, array('center', 'center') );
  add_image_size( 'testimonial_block', 700, 660, array('center', 'center') );
  add_image_size( 'logo_slide', 400, 400, false );
  add_image_size( 'text_columns_split', 640, 640, false );
}
