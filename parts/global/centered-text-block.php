<?php
/**
 * Centered Text Block (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Check if 404 
$is404 = is_404();

// Centered Text Block Custom Fields 
$prefix = 'centered_text_block_';
$suffix = $is404 ? 'option' : '';
$bg = $is404 ? get_field($prefix . 'section_background_color', $suffix) : get_sub_field($prefix . 'section_background_color');
$colSpan = $is404 ? get_field($prefix . 'column_span', $suffix) : get_sub_field($prefix . 'column_span'); // 6 - 12 
$content = $is404 ? get_field($prefix . 'content', $suffix) : get_sub_field($prefix . 'content');
$btnAlign = $is404 ? get_field($prefix . 'button_alignment', $suffix) : get_sub_field($prefix . 'button_alignment'); // left, center, right ?>

<section class="centered-text-block" style="background-color: <?php echo $bg; ?>">
  <div class="container">
    <div class="row row--justify-content-center">
      <div class="col-<?php echo $colSpan; ?>">

        <?php echo $content; 

        // Optional buttons 
        if( have_rows($prefix . 'buttons', $suffix) ) : ?>

          <div class="buttons text-<?php echo $btnAlign; ?>">

            <?php while( have_rows($prefix . 'buttons', $suffix) ) : the_row(); 
              $btnColor = get_sub_field('button_color');
              $btn = get_sub_field('button'); ?>

              <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>
    </div>
  </div>
</section>