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
          <div class="col-md-12">
              <!--Google Map-->
              <div id="map"></div>
              <!--Google Map End-->
          </div>
      </div>
  <script>
    /* jshint ignore:start */
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
      // Basic options for a simple Google Map
      // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
      var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 13,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(<?php echo $option_latitude; ?>, <?php echo $option_longitude; ?>),

        scrollwheel: false,


        // How you would like to style the map.
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{
          featureType: 'all',
          stylers: [{
            saturation: -65
          }]
        }, {
          featureType: 'road.arterial',
          elementType: 'geometry',
          stylers: [{
            hue: '#00ffee'
          }, {
            saturation: 80
          }]
        }, {
          featureType: 'poi.business',
          elementType: 'labels',
          stylers: [{
            visibility: 'off'
          }]
        }]
      };

      // Get the HTML DOM element that will contain your map
      // We are using a div with id="map" seen below in the <body>
      var mapElement = document.getElementById('map');

      // Create the Google Map using our element and options defined above
      var map = new google.maps.Map(mapElement, mapOptions);

      var image = '<?php echo get_template_directory_uri(); ?>/assets/img/map-marker.png';
      // Let's also add a marker while we're at it
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $option_latitude; ?>, <?php echo $option_longitude; ?>),
        map: map,
        icon: image,
        draggable: true,
        animation: google.maps.Animation.DROP
      });
      marker.addListener('click', toggleBounce);

      function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }
    }
    /* jshint ignore:end */
  </script>
</div>

<?php get_footer(); ?>
