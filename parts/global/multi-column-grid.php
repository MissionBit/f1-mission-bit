<?php
/**
 * Multi-Column Grid (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Multi-Column Grid Custom Fields 
$prefix = 'multi_column_grid';
$intro = get_sub_field($prefix . '_intro_content');
$perRow = get_sub_field($prefix . '_columns_per_row');

if( have_rows($prefix) ) : ?>

  <section class="multi-column-grid">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-10">

          <?php echo $intro; ?>

          <div class="block-grid-<?php echo $perRow; ?> sm-block-grid-2">

            <?php while( have_rows($prefix) ) : the_row(); 
              $image = get_sub_field('image');
              $img = wp_get_attachment_image_src($image, 'medium');
              $alt = get_post_meta($image, '_wp_attachment_image_alt', true);
              $content = get_sub_field('content');
              $btnToggle = get_sub_field('button_toggle');
              $btnAlign = get_sub_field('button_alignment');
              $btnColor = get_sub_field('button_color');
              $btn = get_sub_field('button'); ?>

              <div class="col">

                <div class="text-center">
                  <img src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>">
                </div>  

                <?php echo $content; 

                // Optional button 
                if( $btnToggle && $btn ) : ?>

                  <div class="buttons text-<?php echo $btnAlign; ?>">
                    <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                      <?php echo $btn['title']; ?>
                    </a>
                  </div>

                <?php endif; ?>

              </div>

            <?php endwhile; ?>

          </div>          

        </div>
      </div>
    </div>
  </section>

<?php endif; ?>