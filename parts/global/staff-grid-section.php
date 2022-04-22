<?php
/**
 * Staff Grid Section (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Staff Grid Section Custom Fields 
$prefix = 'staff_grid_';
$intro = get_sub_field($prefix . 'intro');
$option = get_sub_field($prefix . 'section_option'); // all or department (ID)
$dept = get_sub_field($prefix . 'department');

// Conditional params 
$taxQuery = $option == 'department' ? array(array('taxonomy' => 'department', 'field' => 'term_id', 'terms' => $dept)) : null;

// WP Query arguments 
$args = array(
  'post_type' => 'staff',
  'posts_per_page' => -1,
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'tax_query' => $taxQuery
); 

// WP Query
$staff = new WP_Query($args); 

if( $staff->have_posts() ) : ?>

  <section class="staff-grid">
    <div class="container">
      <div class="row">
        <div class="col-12">

          <?php echo $intro; ?>

          <div class="block-grid-6 md-block-grid-5 sm-block-grid-4">

            <?php while( $staff->have_posts() ) : $staff->the_post(); ?>

              <div class="col">
                
                <?php get_template_part('components/staff-tile'); ?>

              </div>

            <?php endwhile; ?>

          </div>

        </div>
      </div>
    </div>
  </section>

<?php endif; wp_reset_postdata(); ?>