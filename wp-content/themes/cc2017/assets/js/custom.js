/**
 * scripts.js
 */

(function($) {
  "use strict";

  $(window).on('load', function() {






    //Portfolio Modal
    $('.open-project').click(function() {
      var projectUrl = $(this).attr("href");
			$('.inline-menu-container').removeClass('showx');
      $('.content-blocks.pop').addClass('showx');
      $('.content-blocks.pop section').load(projectUrl);
      return false;
    });

    //Blog post Modal
    $('.open-post').click(function() {
      var postUrl = $(this).attr("href");
			$('.inline-menu-container').removeClass('showx');
      $('.content-blocks.pop').addClass('showx');
      $('.content-blocks.pop section').load(postUrl);
      return false;
    });

    //On Click Close Blog Post And Project Details
    $('#close-pop').click(function() {
			$('.inline-menu-container').addClass('showx');
      $('.content-blocks.pop').removeClass('showx');
      $('.content-blocks.pop section').empty();
    });



    // Intialize Map

    /* jshint ignore:start */
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
      // Basic options for a simple Google Map
      // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
      var mapOptions = {
        // How zoomed in you want the map to start at (always required)
        zoom: 11,

        // The latitude and longitude to center the map (always required)
        center: new google.maps.LatLng(40.6700, -73.9400),

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

      var image = 'wp-content/themes/cc2017/assets/img/map-marker.png';
      // Let's also add a marker while we're at it
      var marker = new google.maps.Marker({
        position: new google.maps.LatLng(40.6700, -73.9400),
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

  });

  // Typing Animation (Typed.js)
  /*$('#element').typed({
      strings: ["UX, UI Designer", "Web App Developer", "Social Animal!"],
      typeSpeed: 0,
      loop: true,
      startDelay: 500,
      backDelay: 3000,
      contentType: 'html',
  });*/




})(jQuery);
