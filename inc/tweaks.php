<?php
  /*-----------------------------------------------------------------------------
    Custom Theme Tweaks and Features
  -----------------------------------------------------------------------------*/
  if ( !function_exists( 'prelude_features' ) ) {

    // Register Theme Features
    function prelude_features() {
      // Add theme support for Automatic Feed Links
      add_theme_support( 'automatic-feed-links' );

      // Add theme support for Post Formats
      add_theme_support('post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside') );

      // Add theme support for Featured Images
      add_theme_support( 'post-thumbnails' );

      // Add theme support for HTML5 Semantic Markup
      add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption') );

      // Add theme support for document Title tag
      add_theme_support( 'title-tag' );

      // Clean up the default WordPress head section
      remove_action( 'wp_head', 'rsd_link' );
      remove_action( 'wp_head', 'wlwmanifest_link' );
      remove_action( 'wp_head', 'wp_generator' );
      remove_action( 'wp_head', 'start_post_rel_link' );
      remove_action( 'wp_head', 'index_rel_link' );
      remove_action( 'wp_head', 'adjacent_posts_rel_link' );
    }
    add_action( 'after_setup_theme', 'prelude_features' );
  }

  // Set the maximum content width for the theme
  function prelude_content_width() {
    $GLOBALS[ 'content_width' ] = apply_filters( 'prelude_content_width', 1200 );
  }
  add_action( 'after_setup_theme', 'prelude_content_width', 0 );

  // Add page excerpts
  function prelude_page_excerpt() {
    add_post_type_support( 'page', array('excerpt') );
  }
  add_action( 'init', 'prelude_page_excerpt' );

  // Customize the default read more link
  function prelude_continue_reading_link() {
    return '';
  }

  // Customize the default ellipsis (...)
  function prelude_auto_excerpt_more( $more ) {
    return '&hellip;' . prelude_continue_reading_link();
  }
  add_filter( 'excerpt_more', 'prelude_auto_excerpt_more' );

  // Remove the default gallery styling
  function prelude_remove_gallery_css( $css ) {
    return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
  }
  add_filter( 'gallery_style', 'prelude_remove_gallery_css' );

  // Customize which dashboard widgets show
  function prelude_remove_dashboard_boxes() {
    remove_meta_box('dashboard_right_now', 'dashboard', 'core' ); // Right Now Overview Box
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core' ); // Incoming Links Box
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core' ); // Quick Press Box
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' ); // Plugins Box
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core' ); // Recent Drafts Box
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core' ); // Recent Comments
    remove_meta_box('dashboard_primary', 'dashboard', 'core' ); // WordPress Development Blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'core' ); // Other WordPress News
  }
  add_action( 'admin_menu', 'prelude_remove_dashboard_boxes' );

  // Remove meta boxes from default posts screen
  function prelude_remove_default_post_metaboxes() {
    remove_meta_box( 'postcustom', 'post', 'normal' ); // Custom Fields Metabox
    //remove_meta_box( 'postexcerpt', 'post', 'normal' ); // Excerpt Metabox
    //remove_meta_box( 'commentstatusdiv', 'post', 'normal' ); // Comments Metabox
    remove_meta_box( 'trackbacksdiv', 'post', 'normal' ); // Talkback Metabox
    //remove_meta_box( 'authordiv', 'post', 'normal' ); // Author Metabox
  }
  add_action( 'admin_menu', 'prelude_remove_default_post_metaboxes' );

  // Remove meta boxes from default pages screen
  function prelude_remove_default_page_metaboxes() {
    remove_meta_box( 'postcustom', 'page', 'normal' ); // Custom Fields Metabox
    //remove_meta_box('commentstatusdiv', 'page', 'normal' ); // Discussion Metabox
    remove_meta_box( 'authordiv', 'page', 'normal' ); // Author Metabox
  }
  add_action( 'admin_menu', 'prelude_remove_default_page_metaboxes' );

  // Stop automatically hyper-linking images to themselves
  $image_set = get_option( 'image_default_link_type' );

  if ( !$image_set == 'none' ) {
    update_option( 'image_default_link_type', 'none' );
  }

  // Customize the Yoast SEO columns
  add_filter( 'wpseo_use_page_analysis', '__return_false' );

  // Add touch detection class to body
  function be_body_classes( $classes ) {
    $classes[] = 'no-touch';
    return $classes;
  }
  add_filter( 'body_class', 'be_body_classes' );

  // Keep the WordPress Kitchen Sink Toolkit open for all users.
  function enable_more_buttons($buttons) {
    // $buttons[] = 'fontselect';
    // $buttons[] = 'fontsizeselect';
    $buttons[] = 'styleselect';
    // $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'charmap';
    $buttons[] = 'hr';
    $buttons[] = 'visualaid';

    return $buttons;
  }
  add_filter("mce_buttons_3", "enable_more_buttons");

  // Add async defer to font awesome script
  function add_async_attribute($tag, $handle) {
    if ( 'font-awesome' !== $handle )
      return $tag;
    return str_replace( ' src', ' async="async" src', $tag );
  }
  add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

  // Hide ACF from everyone except factor1admin
  // $us = get_user_by('login', 'factor1admin');

  // // If the current logged-in user is not us, hide ACF
  // if( wp_get_current_user()->user_login !== $us->user_login ) :
  //   add_filter('acf/settings/show_admin', '__return_false');
  // endif;

  // Custom excerpt length
  function custom_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

  // Display page templates in admin
  add_filter( 'manage_pages_columns', 'page_column_views' );
  add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );
  function page_column_views( $defaults )
  {
     $defaults['page-layout'] = __('Template');
     return $defaults;
  }
  function page_custom_column_views( $column_name, $id )
  {
     if ( $column_name === 'page-layout' ) {
         $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
         if ( $set_template == 'default' ) {
             echo 'Default';
         }
         $templates = get_page_templates();
         ksort( $templates );
         foreach ( array_keys( $templates ) as $template ) :
             if ( $set_template == $templates[$template] ) echo $template;
         endforeach;
     }
  }

  // Display featured images in admin list
  // Add the posts and pages columns filter. They both use the same function.
  add_filter('manage_posts_columns', 'add_post_admin_thumbnail_column', 2);

  // Add the column
  function add_post_admin_thumbnail_column($columns) {
    $columns['admin_thumb'] = __('Featured Image');
    return $columns;
  }

  // Manage Post and Page Admin Panel Columns
  add_action('manage_posts_custom_column', 'show_post_thumbnail_column', 5, 2);

  // Get featured-thumbnail size post thumbnail and display it
  function show_post_thumbnail_column($columns, $id) {
    switch($columns){
      case 'admin_thumb':
      if( function_exists('the_post_thumbnail') ) {
        echo the_post_thumbnail( 'admin_thumb' );
      }
      else
        echo "Your theme doesn't support featured images";
      break;
    }
  }

  // Add custom colors to wysiwygs
  function custom_editor_colors($init) {
    // build colour grid default+custom colors
    $custom_colors = [
      "F77D2B", "Orange",
      "4949B4", "Purple",
      "7BEFD3", "Teal",
      "000000", "Black",
      "393940", "Dark Grey",
      "EAEAEB", "Medium Grey",
      "F7F7F7", "Light Grey",
      "FFFFFF", "White",
    ];
    $init['textcolor_map'] = json_encode($custom_colors);

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = floor(count($custom_colors) / (8 * 2));

    return $init;
  }
  add_filter('tiny_mce_before_init', 'custom_editor_colors');

  // Paste as text auto-on
  add_filter('tiny_mce_before_init', 'ag_tinymce_paste_as_text');
  function ag_tinymce_paste_as_text( $init ) {
  	$init['paste_as_text'] = true;
  	return $init;
  }

  // Add custom classes to WYSIWYGs
  function custom_wysiwyg_options( $init_array ) {
    $style_formats = array(
      array(
        'title' => 'Small Text',
  			'block' => 'p',
        'classes' => 'small-text',
  			'wrapper' => false,
      ),
      array(
        'title' => 'Number',
  			'block' => 'h3',
        'classes' => 'number',
  			'wrapper' => false,
      ),
      array(
        'title' => 'Two-Column List',
  			'selector' => 'ul',
        'classes' => 'two-column-list',
  			'wrapper' => true,
      ),
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats_merge'] = true;
    $init_array['style_formats'] = wp_json_encode( $style_formats );
    return $init_array;
  }
  add_filter( 'tiny_mce_before_init', 'custom_wysiwyg_options' );

  // Add editor styles from custom wysiwyg options
  function custom_editor_styles() {
    add_editor_style('/dist/editor-styles.css');
  }
  add_action('init', 'custom_editor_styles');

  // Customize Wordpress Admin
  // add login logo
  function custom_loginlogo() {
    $logo = wp_get_attachment_image_src(get_field('header_logo', 'option'), 'header_logo')[0];
    // $logo = get_theme_file_uri('assets/img/logo-black.svg');

  	echo '<style type="text/css">
      .login {
        font-family: "Montserrat", sans-serif;
      }
      .login .message,
      .login #login_error {
        margin-top: 30px;
        border-color: #f1563e;
      }
      .login p a {
        color: #4949B4 !important;
        transition: all .4s ease;
      }
      .login p a:focus,
      .login p a:hover {
        color: #7BEFD3 !important;
      }
      .login input[type="text"]:active,
      .login input[type="text"]:focus,
      .login input[type="password"]:active,
      .login input[type="password"]:focus,
      input[type=text]:focus,
      input[type=search]:focus,
      input[type=radio]:focus,
      input[type=tel]:focus,
      input[type=time]:focus,
      input[type=url]:focus,
      input[type=week]:focus,
      input[type=password]:focus,
      input[type=checkbox]:focus,
      input[type=color]:focus,
      input[type=date]:focus,
      input[type=datetime]:focus,
      input[type=datetime-local]:focus,
      input[type=email]:focus,
      input[type=month]:focus,
      input[type=number]:focus,
      select:focus,
      textarea:focus {
        border-color: #7BEFD3;
        box-shadow: 0 0 2px #7BEFD3;
      }
      .login input[type="submit"] {
        background-color: #7BEFD3;
        border-color: #7BEFD3;
        box-shadow: 0 1px 0 #7BEFD3;
        text-shadow: none;
        transition: all .4s ease;
      }
      .login input[type="submit"]:focus,
      .login input[type="submit"]:hover {
        background-color: #4949B4;
        border-color: #4949B4;
        box-shadow: 0 1px 0 #4949B4;
        color: #fff;
      }
    	h1 a {
    		height: 100% !important;
    		width:100% !important;
    		background-image: url(' . $logo . ') !important;
    		background-postion-x: center !important;
    		background-size:contain !important;
    		margin-bottom:10px !important;
      }
    	h1 {
    		width: 320px !important;
    		Height: 120px !important
      }
  	</style>';
  }
  add_action('login_head', 'custom_loginlogo');

  // Update login logo link
  function custom_loginlogo_url($url) {
    return home_url();
  }
  add_filter( 'login_headerurl', 'custom_loginlogo_url' );

  // add custom footer text
  function modify_footer_admin () {
  	echo 'Created by <a href="https://factor1studios.com">factor1</a>. ';
  	echo 'Powered by<a href="https://WordPress.org">WordPress</a>.';
  }
  add_filter('admin_footer_text', 'modify_footer_admin');

  // Adjust queries
  function adjust_queries($query) {
    if( !is_admin() && (is_home() || is_category() || is_tag()) && $query->is_main_query() ) {

    }
  }
  // add_action('pre_get_posts', 'adjust_queries');

  // Remove additional css option from customizer
  function prefix_remove_css_section( $wp_customize ) {
  	$wp_customize->remove_section( 'custom_css' );
  }
  add_action( 'customize_register', 'prefix_remove_css_section', 15 );

  // Remove theme/plugin editors from admin
  define( 'DISALLOW_FILE_EDIT', true );

  // Add ACF Flexible Content section titles
  function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {
    // load text sub field
    if( $text = get_sub_field('section_title') ) {
      $title .= ': <b>' . esc_html($text) . '</b>';
    }
    return $title;
  }
  add_filter('acf/fields/flexible_content/layout_title/name=page_sections', 'my_acf_fields_flexible_content_layout_title', 10, 4);
