<?php
/**
 * Post List
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Check if category or tag view 
$isCat = is_category();
$isTag = is_tag();

$noPosts = get_field('no_posts_found', get_option('page_for_posts')); ?>

<section class="post-list">

  <?php if( $isCat || $isTag ) :
    $text = get_queried_object()->name; ?>

    <div class="post-list__tax">
      <div class="container">
        <div class="row row--justify-content-space-around">
          <div class="col-11">
            <p class="small-text">

              <?php if( $isCat ) : ?>

                Category: <?php echo $text; ?>

              <?php else : ?>

                Tag: <?php echo $text; ?>

              <?php endif; ?>

              | <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Show All</a>

            </p>
          </div>
        </div>
      </div>
    </div>

  <?php endif; ?>

  <?php if( have_posts() ) :

    while( have_posts() ) : the_post();

      get_template_part('components/post');

    endwhile; ?>

    <div class="post-list__nav">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">

            <?php the_posts_pagination(
              array(
                'mid_size' => 2,
                'next_text' => '<i class="far fa-angle-right"></i>',
                'prev_text' => '<i class="far fa-angle-left"></i>'
              )
            ); ?>

          </div>
        </div>
      </div>
    </div>

  <?php else : ?>

    <div class="post-list__no-posts">
      <div class="container">
        <div class="row row--justify-content-center">
          <div class="col-10">
            <?php echo $noPosts; ?>
          </div>
        </div>
      </div>
    </div>

  <?php endif; ?>

</section>