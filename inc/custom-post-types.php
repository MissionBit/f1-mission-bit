<?php
/*-----------------------------------------------------------------------------
  Register Custom Post Types
-----------------------------------------------------------------------------*/
// Register Programs Custom Post Type
function programs() {

	$labels = array(
		'name'                  => _x( 'Programs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Program', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Programs', 'text_domain' ),
		'name_admin_bar'        => __( 'Programs', 'text_domain' ),
		'archives'              => __( 'Program Archives', 'text_domain' ),
		'attributes'            => __( 'Program Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Program:', 'text_domain' ),
		'all_items'             => __( 'All Programs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Program', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Program', 'text_domain' ),
		'edit_item'             => __( 'Edit Program', 'text_domain' ),
		'update_item'           => __( 'Update Program', 'text_domain' ),
		'view_item'             => __( 'View Program', 'text_domain' ),
		'view_items'            => __( 'View Programs', 'text_domain' ),
		'search_items'          => __( 'Search Program', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Program', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Program', 'text_domain' ),
		'items_list'            => __( 'Programs list', 'text_domain' ),
		'items_list_navigation' => __( 'Programs list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Programs list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Program', 'text_domain' ),
		'description'           => __( 'Programs', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'programs',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'program', $args );

}
add_action( 'init', 'programs', 0 );

// Register Program Categories Custom Taxonomy
function program_categories() {

	$labels = array(
		'name'                       => _x( 'Program Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Program Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Program Categories', 'text_domain' ),
		'all_items'                  => __( 'All Program Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Program Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Program Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Program Category Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Program Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Program Category', 'text_domain' ),
		'update_item'                => __( 'Update Program Category', 'text_domain' ),
		'view_item'                  => __( 'View Program Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Program Categories with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Program Categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Program Categories', 'text_domain' ),
		'search_items'               => __( 'Search Program Categories', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Program Categories', 'text_domain' ),
		'items_list'                 => __( 'Program Categories list', 'text_domain' ),
		'items_list_navigation'      => __( 'Program Categories list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'program-category', array( 'program' ), $args );

}
add_action( 'init', 'program_categories', 0 );

// Register "Archived" Custom Post Status
function register_archived_status() {

	$args = array(
		'label'                     => _x( 'Archived', 'Status General Name', 'text_domain' ),
		'label_count'               => _n_noop( 'Archived (%s)',  'Archived (%s)', 'text_domain' ), 
		'public'                    => false,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'exclude_from_search'       => true,
	);
	register_post_status( 'archived', $args );

}
add_action( 'init', 'register_archived_status', 0 );

// Display Custom Post Status Option in Post Edit
function display_custom_post_status_option(){
  global $post;
  $complete = '';
  $label = '';
  // if($post->post_type == 'post'){
      if($post->post_status == 'archived'){
          $selected = 'selected';
      }
  echo '<script>
    jQuery(document).ready(function(){
      jQuery(".misc-pub-section span#post-status-display").html("Archived");
    });
  </script>
  ';
  // }
}
add_action('admin_footer', 'display_custom_post_status_option');

function my_custom_status_add_in_quick_edit() {
  echo "<script>
  jQuery(document).ready( function() {
      jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"archived\">Archived</option>' );      
  }); 
  </script>";
}
add_action('admin_footer-edit.php','my_custom_status_add_in_quick_edit');

function my_custom_status_add_in_post_page() {
  echo "<script>
  jQuery(document).ready( function() {        
      jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"archived\">Archived</option>' );
  });
  </script>";
}
add_action('admin_footer-post.php', 'my_custom_status_add_in_post_page');
add_action('admin_footer-post-new.php', 'my_custom_status_add_in_post_page');