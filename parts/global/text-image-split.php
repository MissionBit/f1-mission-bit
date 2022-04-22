<?php
/**
 * Text/Image Split (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Text/Image Split Custom Fields 
$prefix = 'text_image_split_';
$bg = get_sub_field($prefix . 'section_background_color');
$layoutOption = get_sub_field($prefix . 'layout_option'); // img on left or right
$image = get_sub_field($prefix . 'image');
$img = wp_get_attachment_image_src($image, 'text_image_split');
$textBg = get_sub_field($prefix . 'text_background_color');
$content = get_sub_field($prefix . 'content');
$btnToggle = get_sub_field($prefix . 'button_toggle');
$btnAlign = get_sub_field($prefix . 'button_alignment');
$btnColor = get_sub_field($prefix . 'button_color');
$btn = get_sub_field($prefix . 'button'); 

// Conditional classes 
$rowClass = $layoutOption == 'right' ? ' row--reverse' : ''; ?>

<section class="text-image-split" style="background-color: <?php echo $bg; ?>">
  <div class="container">
    <div class="row row--justify-content-center<?php echo $rowClass; ?>">

      <div class="col-4 sm-col-10 stretch" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat"></div>

      <div class="col-6 sm-col-10" style="background-color: <?php echo $textBg; ?>">
        <div class="text-image-split__text">
          
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
      </div>

    </div>
  </div>
</section>