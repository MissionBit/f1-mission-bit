<?php // CSS & JavaScript Enqueues

/**
 * Defer jQuery Parsing using the HTML5 defer property
 */

if (!(is_admin() )) {
  function defer_parsing_of_js ( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) || strpos( $url, 'jquery.min.js' ) ) return $url;
    // return "$url' defer ";
    return "$url' defer onload='";
  }
  add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

/**
 * Link to all theme CSS files.
 */
function prelude_theme_scripts() {
  // Fonts
  wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/cce0c39f9a.js', array(), THEME_VERSION, true );
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), THEME_VERSION, null );

  // CSS
  wp_enqueue_style('prelude-css', get_template_directory_uri() . '/dist/theme.css', array(), THEME_VERSION );

  // JS
  wp_enqueue_script('prelude-js', get_template_directory_uri() . '/dist/theme.js', array('jquery'), THEME_VERSION, true );

  add_action( 'wp_head', function () {
    $font_dir = get_theme_file_uri("assets/fonts");
    echo (
      '<link rel="preload" href="' . $font_dir . '/Montserrat-Regular.woff2" as="font" crossorigin=""/>' .
      '<link rel="preload" href="' . $font_dir . '/Montserrat-SemiBold.woff2" as="font" crossorigin=""/>' .
      '<link rel="preload" href="' . $font_dir . '/Montserrat-Bold.woff2" as="font" crossorigin=""/>' .
      '<style>' .
      '@font-face {
        src: url("' . $font_dir . '/Montserrat-Regular.woff2") format("woff2"),url("' . $font_dir . '/Montserrat-Regular.woff") format("woff");
        font-family: Montserrat;
        font-style: normal;
        font-display: swap;
        font-weight: 400;
      }
      @font-face {
        src: url("' . $font_dir . '/Montserrat-SemiBold.woff2") format("woff2"),url("' . $font_dir . '/Montserrat-SemiBold.woff") format("woff");
        font-family: Montserrat;
        font-style: normal;
        font-display: swap;
        font-weight: 500;
      }
      @font-face {
        src: url("' . $font_dir . '/Montserrat-Bold.woff2") format("woff2"),url("' . $font_dir . '/Montserrat-Bold.woff") format("woff");
        font-family: Montserrat;
        font-style: normal;
        font-display: swap;
        font-weight: 700;
      }' .
      '</style>'
    );
  } );
}
add_action( 'wp_enqueue_scripts', 'prelude_theme_scripts' );
