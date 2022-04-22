<?php
/**
 * Text Split (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Text Split Custom Fields 
$prefix = 'text_split_';
$vAlign = get_sub_field($prefix . 'vertical_alignment'); // top, center
$leftColSpan = get_sub_field($prefix . 'left_column_span'); // 3 - 9
$leftContent = get_sub_field($prefix . 'left_content');
$leftBtnAlign = get_sub_field($prefix . 'left_button_alignment'); // left, center, right
$rightColSpan = get_sub_field($prefix . 'right_column_span'); // 3 - 9
$rightContent = get_sub_field($prefix . 'right_content');
$rightBtnAlign = get_sub_field($prefix . 'right_button_alignment'); // left, center, right ?>

<section class="text-split">
  <div class="container">
    <div class="row row--align-items-<?php echo $vAlign; ?>">

      <?php // Left content ?>
      <div class="col-<?php echo $leftColSpan; ?>">

        <?php echo $leftContent; 
        
        // Optional buttons 
        if( have_rows($prefix . 'left_buttons') ) : ?>

          <div class="buttons text-<?php echo $leftBtnAlign; ?>">

            <?php while( have_rows($prefix . 'left_buttons') ) : the_row();
              $btnColor = get_sub_field('button_color');
              $btn = get_sub_field('button'); ?>

              <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                <?php echo $btn['title']; ?>
              </a>

            <?php endwhile; ?>

          </div>

        <?php endif; ?>

      </div>

      <?php // Right content ?>
      <div class="col-<?php echo $rightColSpan; ?>">

        <?php echo $rightContent; 
        
        // Optional buttons 
        if( have_rows($prefix . 'right_buttons') ) : ?>

          <div class="buttons text-<?php echo $rightBtnAlign; ?>">

            <?php while( have_rows($prefix . 'right_buttons') ) : the_row();
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