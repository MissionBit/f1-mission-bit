<?php
/**
 * Text Columns/Image Split (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Text Columns/Image Split Custom Fields 
$prefix = 'text_columns_image_split_';
$layoutOption = get_sub_field($prefix . 'layout_option'); // img on left or right
$image = get_sub_field($prefix . 'image');
$img = wp_get_attachment_image_src($image, 'text_columns_split');
$alt = get_post_meta($image, '_wp_attachment_image_alt', true);
$content = get_sub_field($prefix . 'content'); 

// Conditional classes 
$rowClass = $layoutOption == 'right' ? ' row--reverse' : ''; ?>

<section class="text-columns-image-split">
  <div class="container">
    <div class="row row--justify-content-space-around<?php echo $rowClass; ?>">

      <?php // Image ?>
      <div class="col-3 sm-col-4 text-center">

        <?php if( $image ) : ?>

          <img src="<?php echo $img[0]; ?>" alt="<?php echo $alt; ?>">

        <?php endif; ?>

      </div>

      <?php // Text ?>
      <div class="col-7">

        <?php echo $content; 

        // Columns
        if( have_rows($prefix . 'columns') ) : ?>

          <div class="text-columns-image-split__columns">
        
            <?php  while( have_rows($prefix . 'columns') ) : the_row();
              $colContent = get_sub_field('content');
              $btnToggle = get_sub_field('button_toggle');
              $btnAlign = get_sub_field('button_alignment'); // left, center, right
              $btnColor = get_sub_field('button_color');
              $btn = get_sub_field('button'); ?>

              <div class="text-columns-image-split__column">

                <?php echo $colContent; 
                
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
        
        <?php endif; ?>        

      </div>

    </div>
  </div>
</section>
