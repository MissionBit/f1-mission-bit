<?php
/**
 * Hero (Global)
 *
 * @package F1 Mission Bit
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Check if blog
$isBlog = is_home();
$isCat = is_category();
$isTag = is_tag();

// Hero Custom Fields
$prefix = 'hero_';
$suffix = $isBlog || $isCat || $isTag ? get_option('page_for_posts') : '';
$bg = wp_get_attachment_image_src(get_field($prefix . 'background', $suffix), 'hero');
$hPos = get_field($prefix . 'horizontal_background_alignment', $suffix); // 0 - 100
$vPos = get_field($prefix . 'vertical_background_alignment', $suffix); // 0 - 100
$colSpan = get_field($prefix . 'column_span', $suffix); // 6 - 12
$colAlign = get_field($prefix . 'column_alignment', $suffix); // start, center, end
$content = get_field($prefix . 'content', $suffix);
$btnAlign = get_field($prefix . 'button_alignment', $suffix); // left, center, right
$heroDisable = get_field($prefix . 'disable', $suffix);

// Bg styles
$xPos = $hPos >= 0 ? $hPos . '%' : '50%';
$yPos = $vPos >= 0 ? $vPos . '%' : '50%';
$bgPos = $xPos . ' ' . $yPos; ?>
<?php if ($heroDisable) : ?>
<div class="hero-disabled"></div>
<?php else : ?>
<section class="hero">
  <div class="hero__bg" style="background: url('<?php echo $bg[0]; ?>') <?php echo $bgPos; ?>/cover no-repeat"></div>

  <div class="container">
    <div class="row row--justify-content-<?php echo $colAlign; ?>">
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

  <div class="hero__scroll text-center">
    <button class="hero__button" value="Scroll down"><i class="fal fa-angle-down"></i></button>
  </div>
</section>

<div id="hero-anchor"></div>
<?php endif; ?>
