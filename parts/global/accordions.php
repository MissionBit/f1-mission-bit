<?php
/**
 * Accordions (Global)
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Accordions Custom Fields 
$section = 'accordions_section_';
$colSpan = get_sub_field($section . 'column_span');
$intro = get_sub_field($section . 'intro');

if( have_rows($section . 'accordions') ) : ?>

  <section class="accordions-section">
    <div class="container">
      <div class="row row--justify-content-center">
        <div class="col-<?php echo $colSpan; ?>">

          <?php echo $intro;

          while( have_rows($section . 'accordions') ) : the_row();
            $headline = get_sub_field('headline');
            $content = get_sub_field('content'); ?>

            <div class="accordion">
              <h5 class="accordion__header" tabindex="0">
                <?php echo $headline; ?>

                <i class="fas fa-caret-down"></i>
              </h5>

              <div class="accordion__content">
                <?php echo $content; ?>
              </div>
            </div>

          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </section>

<?php endif; ?>