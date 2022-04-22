<?php
/**
 * Program Section (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Program Section Custom Fields 
$prefix = 'program_section_';
$layoutOption = get_sub_field($prefix . 'layout_option'); // img on left or right
$program = get_sub_field($prefix . 'program');

// Conditional classes 
$rowClass = $layoutOption == 'right' ? ' row--reverse' : ''; 

if( $program ) : 
  $post = $program;
  setup_postdata($post);
    
  $image = get_post_thumbnail_id();
  $img = featuredURL('text_columns_split');
  $alt = get_post_meta($image, '_wp_attachment_image_alt', true); ?>

  <section class="text-columns-image-split program">
    <div class="container">
      <div class="row row--justify-content-space-around<?php echo $rowClass; ?>">

        <?php // Image ?>
        <div class="col-4 sm-col-4 text-center">

          <?php if( $img ) : ?>

            <img src="<?php echo $img; ?>" alt="<?php echo $alt; ?>">

          <?php endif; ?>

        </div>

        <?php // Text ?>
        <div class="col-7">

          <h3><?php the_title(); ?></h3>

          <?php the_content();

          // Columns
          if( have_rows('program_upcoming_classes') ) : ?>

            <div class="text-columns-image-split__columns">
          
              <?php while( have_rows('program_upcoming_classes') ) : the_row();
                $desc = get_sub_field('description');
                $status = get_sub_field('status'); // open or closed
                $btnColor = get_sub_field('registration_link_color');
                $btn = get_sub_field('registration_link'); ?>

                <div class="text-columns-image-split__column">

                  <?php echo $desc; 
                  
                  if( $status == 'open' && $btn ) : ?>

                    <div class="buttons">
                      <a href="<?php echo esc_url($btn['url']); ?>" class="button button--<?php echo $btnColor; ?>" role="link" title="<?php echo $btn['title']; ?>" target="<?php echo $btn['target']; ?>">
                        <?php echo $btn['title']; ?>
                      </a>
                    </div>

                  <?php elseif( $status == 'closed' ) : ?>

                    <div class="buttons">
                      <button class="button button--red" title="Registration Closed" disabled>
                        Registration Closed
                      </button>
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

  <?php wp_reset_postdata();

endif; ?>
