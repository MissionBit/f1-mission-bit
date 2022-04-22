<?php
/**
 * Staff Modal Component
 * 
 * @package F1 Mission Bit 
 * @author Factor1 Studios
 * @since 0.0.1
 */

// Staff Modal Custom Fields
$prefix = 'staff_';
$id = get_the_ID();
$img = featuredURL('medium'); 
$first = get_field($prefix . 'first_name');
$last = get_field($prefix . 'last_name');
$title = get_field($prefix . 'title');
$email = get_field($prefix . 'email');
$phone = get_field($prefix . 'phone');
$phoneLink = preg_replace('/[^0-9]/', '', $phone);
$li = get_field($prefix . 'linkedin_url');
$fb = get_field($prefix . 'facebook_url');
$in = get_field($prefix . 'instagram_url');
$tw = get_field($prefix . 'twitter_url');
$bio = get_field($prefix . 'bio'); 

$links = array(
  array(
    'field' => $email,
    'url' => 'mailto:' . $email,
    'icon' => '<i class="fas fa-envelope"></i>'
  ),
  array(
    'field' => $phone,
    'url' => 'tel:' . $phoneLink,
    'icon' => '<i class="fas fa-phone-alt"></i>',
  ),
  array(
    'field' => $li, 
    'url' => $li,
    'icon' => '<i class="fab fa-linkedin-in"></i>',
  ),
  array(
    'field' => $fb, 
    'url' => $fb,
    'icon' => '<i class="fab fa-facebook-f"></i>',
  ),
  array(
    'field' => $in, 
    'url' => $in,
    'icon' => '<i class="fab fa-instagram"></i>',
  ),
  array(
    'field' => $tw, 
    'url' => $tw,
    'icon' => '<i class="fab fa-twitter"></i>',
  )
);

if( $bio ) : ?>

  <div class="modal micromodal-slide" id="modal-staff-<?php echo $id; ?>" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-title">
        <button aria-label="Close modal" class="modal__close" data-micromodal-close></button>

        <div id="modal-staff-<?php echo $id; ?>-content" class="modal__content">

          <h5><?php echo $first . ' ' . $last; ?></h5>

          <p class="staff-title"><?php echo $title; ?></p>

          <?php if( $links ) : ?>

            <div class="staff-links">

              <?php foreach( $links as $link ) : 
                
                if( $link['field'] ) : ?>

                  <a href="<?php echo $link['url']; ?>"><?php echo $link['icon']; ?></a>

                <?php endif;
              
              endforeach; ?>

            </div>

          <?php endif; ?>

          <?php echo $bio; ?>

        </div>
      </div>
    </div>
  </div>

<?php endif; ?>
