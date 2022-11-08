<?php
/*
 * Site Footer Component
 *
 * @package F1 Mission Bit
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Site Footer Custom Fields
// $logo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'footer_logo');
$logo = get_theme_file_uri('assets/img/logo-monogram-black.svg');
$contact = get_field('footer_contact', 'option');
$socialHeadline = get_field('footer_social_menu_headline', 'option');
$copyright = get_field('footer_copyright_text', 'option'); ?>

<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-3 sm-text-center">

        <?php // Logo ?>
        <a href="<?php echo esc_url(home_url()); ?>" class="site-footer__logo">
          <img src="<?php echo $logo; ?>" alt="<?php echo get_bloginfo('name'); ?>">
        </a>

        <?php echo $contact; ?>

      </div>

      <div class="col-9">

        <?php // Footer menu
        if( has_nav_menu('footer') ) :
          wp_nav_menu(
            array(
              'theme_location' => 'footer',
              'container' => 'nav',
              'container_class' => 'nav--footer'
            )
          );
        endif; ?>

      </div>

      <div class="col-4 sm-text-center">

        <?php // Social Menu ?>
        <h6><?php echo $socialHeadline; ?></h6>

        <?php prelude_social_menu(); ?>

      </div>

      <div class="col-8 text-right sm-text-center">
        <p class="small-text">
          &copy; <?php echo date('Y') . ' ' . get_bloginfo('name') . '. ' . $copyright; ?><br>
          Site by <a href="https://factor1studios.com" target="_blank" class="factor1">factor1</a>
        </p>
      </div>
    </div>
  </div>
</footer>
