<?php
/**
 * Logo Slider (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Logo Slider Custom Fields 
$prefix = 'logo_slider';
$intro = get_sub_field($prefix . '_intro');

if( have_rows($prefix) ) : ?>

  <section class="logo-slider">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-10 sm-col-10">

          <?php echo $intro; ?>

          <div class="logo-slider__slider">

            <?php while( have_rows($prefix) ) : the_row();
              $image = get_sub_field('image');
              $img = wp_get_attachment_image_src($image, 'logo_slide');
              $alt = get_post_meta($image, '_wp_attachment_image_alt', true); ?>

              <div class="logo-slider__slide text-center">
                <img src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>">
              </div>

            <?php endwhile; ?>

          </div>

        </div>
      </div>
    </div>
  </section>

<?php endif; ?>