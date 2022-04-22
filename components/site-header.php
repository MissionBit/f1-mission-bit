<?php 
/*
 * Site Header Component
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Site Header Custom Fields 
$logo = wp_get_attachment_image_src(get_field('header_logo', 'option'), 'header_logo'); ?>

<header class="site-header">
  <div class="container">
    <div class="row">
      <div class="col-12">

        <?php // Logo ?>
        <a href="<?php echo esc_url(home_url()); ?>" class="site-header__logo">
          <img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
        </a>

        <?php // Primary menu 
        if( has_nav_menu('primary') ) : 
          wp_nav_menu(
            array(
              'theme_location' => 'primary', 
              'container' => 'nav',
              'container_class' => 'nav--primary lg-only'
            )
          ); 
        endif; 
        
        // Mobile nav button 
        if( has_nav_menu('mobile') ) : ?>

          <button class="menu-icon" value="Menu"><span></span></button>
        
        <?php endif; ?>

      </div>
    </div>
  </div>

  <?php // Primary menu 
  if( has_nav_menu('mobile') ) : 
    wp_nav_menu(
      array(
        'theme_location' => 'mobile', 
        'container' => 'nav',
        'container_class' => 'nav--mobile'
      )
    ); 
  endif; ?>
</header>