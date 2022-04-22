<?php
/**
 * The single post template.
 *
 * Used when a single post is queried.
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

get_header();

if( have_posts() ) : while( have_posts() ) : the_post();

  $image = get_post_thumbnail_id();
  $img = featuredURL('text_columns_split');
  $alt = get_post_meta($image, '_wp_attachment_image_alt', true);
  
  // Conditional classes 
  $colClass = $image ? '8' : '10'; ?>

  <section class="centered-text-block">
    <div class="container">
      <div class="row row--justify-content-center row--align-items-center">

        <?php if( $image ) : ?>

          <div class="col-2 sm-col-4 single__meta">
            <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>">
          </div>

        <?php endif; ?>

        <div class="col-<?php echo $colClass; ?> sm-col-7 single__meta">

          <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>

          <?php get_template_part('components/meta'); ?>

        </div>

        <div class="col-10">

          <?php the_content(); ?>

        </div>
      </div>
    </div>
  </section>

<?php endwhile; endif;

get_footer(); ?>
