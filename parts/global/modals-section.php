<?php
/**
 * Modals Section
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Check if default template 
$isDefault = is_page() && !is_page_template();

if( $isDefault ) : 

  if( have_rows('page_sections') ) : while( have_rows('page_sections') ) : the_row();

    if( get_row_layout() == 'staff_grid' ) : 

      // Staff Grid Section Custom Fields 
      $prefix = 'staff_grid_';
      $option = get_sub_field($prefix . 'section_option'); // all or department (ID)
      $dept = $option == 'department' ? get_sub_field($prefix . 'department') : null;

      // WP Query arguments 
      $args = array(
        'post_type' => 'staff',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      ); 

      // WP Query
      $staff = new WP_Query($args); 

      if( $staff->have_posts() ) : while( $staff->have_posts() ) : $staff->the_post(); 

        get_template_part('components/modal-staff');

      endwhile; endif; wp_reset_postdata(); 

    endif;

  endwhile; endif;

endif; ?>