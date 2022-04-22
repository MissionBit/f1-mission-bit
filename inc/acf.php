<?php 
/*
 * ACF Options
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(
    array(
      'page_title' => 'Site Options',
      'position' => 4
    )
  );

  // acf_add_options_page(
  //   array(
  //     'page_title' => 'Programs Archive',
  //     'position' => 21,
  //     'icon_url' => 'dashicons-calendar-alt'
  //   )
  // );
} ?>