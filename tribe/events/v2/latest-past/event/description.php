<?php
/**
 * View: Latest Past Single Event Description
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/latest-past/event/description.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.1.0
 *
 * @var WP_Post $event The event post object with properties added by the `tribe_get_event` function.
 *
 * @see tribe_get_event() For the format of the event object.
 */

if ( empty( (string) $event->excerpt ) ) {
	return;
}
?>
<div class="tribe-events-calendar-latest-past__event-description tribe-common-b2">
	<?php echo (string) $event->excerpt; ?>

  <div class="buttons" style="margin-top: 20px;">
    <a href="<?php the_permalink(); ?>" class="button button--teal" role="link" title="View More" style="padding: .9375rem 2.5rem">
      View More
    </a>
  </div>
</div>
