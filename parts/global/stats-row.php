<?php
/**
 * Stats Row (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Stats Row Custom Fields 
$prefix = 'stats_row_';
$bg = get_sub_field($prefix . 'section_background_color');

if( have_rows($prefix . 'stats') ) : ?>

  <section class="stats-row" style="background-color: <?php echo $bg; ?>">
    <div class="container">
      <div class="row row--justify-content-center">

        <?php while( have_rows($prefix . 'stats') ) : the_row();
          $i = 0;
          $image = get_sub_field('image');
          $img = wp_get_attachment_image_src($image, 'medium');
          $alt = get_post_meta($image, '_wp_attachment_image_alt', true); 
          $number = get_sub_field('number');
          $unit = get_sub_field('unit'); // none, plus, percent
          $desc = get_sub_field('description');
          
          // Conditional output
          if( $unit == 'percent' ) :
            $formatOutput = '<span>' . $i . '</span>%';
          elseif( $unit == 'plus' ) :
            $formatOutput = '<span>' . $i . '</span>+';
          else :
            $formatOutput = '<span>' . $i . '</span>';
          endif;?>

          <div class="col-3 md-col-4 sm-col-12 text-center stretch">

            <div class="stats-row__stat">

              <?php if( $image ) : ?>

                <div>
                  <img src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>">
                </div>

              <?php endif; ?>

              <h3 class="number" data-number="<?php echo $number; ?>"><?php echo $formatOutput; ?></h3>

              <h6 class="description"><?php echo $desc; ?></h6>

            </div>
          
          </div>

        <?php endwhile; ?>

      </div>
    </div>
  </section>

<?php endif; ?>