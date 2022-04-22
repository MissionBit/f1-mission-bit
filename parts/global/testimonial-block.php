<?php
/**
 * Testimonial Block (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Testimonial Block Custom Fields 
$prefix = 'testimonial_block_';
$testimonial = get_sub_field($prefix . 'testimonial'); 
$bg = get_sub_field($prefix . 'background_color');
$layoutOption = get_sub_field($prefix . 'layout_option'); // img on left or right

// Conditional classes 
$rowClass = $layoutOption == 'right' ? ' row--reverse' : '';

if( $testimonial ) :
  $img = wp_get_attachment_image_src(get_post_thumbnail_id($testimonial), 'testimonial_block');
  $content = get_field('testimonial', $testimonial);
  $cite = get_field('citation', $testimonial); ?>

  <section class="testimonial-section">
    <div class="container">
      <div class="row row--justify-content-center<?php echo $rowClass; ?>">
        
        <div class="col-3 md-col-4 sm-col-10 stretch" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat"></div>

        <div class="col-7 md-col-6 sm-col-10" style="background-color: <?php echo $bg; ?>">
          <div class="testimonial-section__block">

            <?php echo $content; ?>

            <p><strong><?php echo $cite; ?></strong></p>

          </div>
        </div>

      </div>
    </div>
  </section>

<?php endif; ?>