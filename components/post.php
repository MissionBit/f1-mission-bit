<?php
/**
 * Post Component
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

$image = get_post_thumbnail_id();
$img = featuredURL('text_columns_split');
$alt = get_post_meta($image, '_wp_attachment_image_alt', true);

// Conditional classes 
$colClass = $image ? '7' : '11'; ?>

<article class="text-columns-image-split">
  <div class="container">
    <div class="row row--justify-content-space-around">

      <?php // Image 
      if( $img ) : ?>

        <div class="col-3 sm-col-4 text-center">
          <a href="<?php the_permalink(); ?>">
            <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>">
          </a>
        </div>

      <?php endif; ?>

      <?php // Text ?>
      <div class="col-<?php echo $colClass; ?>">

        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

        <?php get_template_part('components/meta'); ?>

        <?php the_excerpt(); ?>

        <div class="buttons">
          <a href="<?php the_permalink(); ?>" class="button button--red">
            Read More
          </a>
        </div>        

      </div>

    </div>
  </div>
</article>