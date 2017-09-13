<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 * Template Name: Page Contact
 */

get_header(); ?>

<div class="block-content" id="body-content">
  <?php
  $option_address      = get_field_object('general-address', 'option');
  $option_email        = get_field_object('general-email', 'option');
  $option_latitude     = get_field('contact-latitude');
  $option_longitude    = get_field('contact-longitude'); ?>
  <h2 class="block-title"><?php the_title(); ?></h2>
  <div class="row">
          <div class="col-md-6">
              <?php echo do_shortcode( '[contact-form-7 id="126"]' ); ?>
          </div>

          <div class="col-md-5 offset-md-1">
              <div class="contact-content">
                  <div class="contact-icon">
                      <i class="ion-ios-location-outline"></i>
                  </div>
                  <div class="contact-details">
                      <h3><?php echo __('Adresse', 'cc2017'); ?></h3>
                      <p><?php echo $option_address['value']; ?></p>
                  </div>
              </div>
            <?php /* div class="contact-content">
                  <div class="contact-icon">
                      <i class="ion-ios-telephone-outline"></i>
                  </div>
                  <div class="contact-details">
                      <h2>Call Us</h2>
                      <p> <a href="tel:+4402920111222">+44 - 02920111222</a></p>
                  </div>
              </div */ ?>
              <div class="contact-content">
                  <div class="contact-icon">
                      <i class="ion-ios-email-outline"></i>
                  </div>
                  <div class="contact-details">
                      <h3><?php echo __('Email', 'cc2017'); ?></h3>
                      <p><?php echo $option_email['value']; ?></p>
                  </div>
              </div>
          </div>
      </div>
</div>

<?php get_footer(); ?>
