<?php
/**
 * Page Sections (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

if( have_rows('page_sections') ) : while( have_rows('page_sections') ) : the_row();

  if( get_row_layout() == 'centered_text_block' ) : 

    get_template_part('parts/global/centered-text-block');

  elseif( get_row_layout() == 'text_split' ) : 

    get_template_part('parts/global/text-split');

  elseif( get_row_layout() == 'stats_row' ) : 

    get_template_part('parts/global/stats-row');

  elseif( get_row_layout() == 'text_image_split' ) : 

    get_template_part('parts/global/text-image-split');

  elseif( get_row_layout() == 'text_columns_image_split' ) :

    get_template_part('parts/global/text-columns-image-split');

  elseif( get_row_layout() == 'multi_column_grid' ) : 

    get_template_part('parts/global/multi-column-grid');

  elseif( get_row_layout() == 'testimonial_block' ) : 

    get_template_part('parts/global/testimonial-block');

  elseif( get_row_layout() == 'logo_slider' ) : 

    get_template_part('parts/global/logo-slider');

  elseif( get_row_layout() == 'program_section' ) :

    get_template_part('parts/global/program-section');

  elseif( get_row_layout() == 'staff_grid' ) : 

    get_template_part('parts/global/staff-grid-section');

  elseif( get_row_layout() == 'accordions_section' ) :

    get_template_part('parts/global/accordions');

  endif;

endwhile; endif; ?>