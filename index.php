<?php
/**
 * The default blog / index template.
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */
 
get_header();

get_template_part('parts/global/hero');

get_template_part('parts/index/post-list');

get_footer(); ?>
