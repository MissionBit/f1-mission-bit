<?php
/**
 * Staff Tile Component
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Staff Tile Custom Fields
$prefix = 'staff_';
$id = get_the_ID();
$img = featuredURL('medium'); 
$first = get_field($prefix . 'first_name');
$last = get_field($prefix . 'last_name');
$title = get_field($prefix . 'title');
$bio = get_field($prefix . 'bio');

// Conditionals 
$modal = $bio ? ' data-micromodal-trigger="modal-staff-' . $id . '"' : ''; ?>

<div class="staff-tile text-center"<?php echo $modal; ?>>
  <div class="staff-tile__img">
    <img src="<?php echo $img; ?>" alt="Photo of <?php echo $first . ' ' . $last; ?>">
  </div>

  <h6><?php echo $first . ' ' . $last; ?></h6>

  <p><?php echo $title; ?></p>
</div>