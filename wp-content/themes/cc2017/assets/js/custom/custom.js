/**
 * scripts.js
 */

function ajaxReload() {
  "use strict";

  if (jQuery('#portfolio-container').length > 0) {
    jQuery('#portfolio-container').isotope({
      masonry: {
        columnWidth: '.portfolio-item'
      },
      itemSelector: '.portfolio-item'
    });
    jQuery('#filters').on('click', 'li', function() {
      jQuery('#filters li').removeClass('active');
      jQuery(this).addClass('active');
      var filterValue = jQuery(this).attr('data-filter');
      jQuery('#portfolio-container').isotope({
        filter: filterValue
      });
    });
  }

  if (jQuery('.project-media').length > 0) {
    jQuery('.project-media').isotope({
      masonry: {
        columnWidth: '.portfolio-item'
      },
      itemSelector: '.portfolio-item'
    });
  }

  jQuery('[data-fancybox="group"]').fancybox({
    toolbar: true,
    buttons: [
      'close'
    ],
    smallBtn: true,
  });
}

function decodeEntities(encodedString) {
  "use strict";

  var textArea = document.createElement('textarea');
  textArea.innerHTML = encodedString;
  return textArea.value;
}

jQuery(window).on('load', function() {
  "use strict";

  ajaxReload();

  jQuery(".preloader").fadeOut("slow", function() {
    jQuery(".preloader-left").addClass("slide-left");
  });
});

jQuery(document).ready(function($) {
  "use strict";

  $('.menu-block a').click(function() {
    $('.content-blocks').addClass('showx');
    $('.inline-menu-container').addClass('showx');
    $('.page').addClass('menu-open');
    $('inline-menu-container .current-menu-item a').focus();
  });

  $('#close, .page.menu-open .name-block-title').click(function() {
    $('.page').removeClass('menu-open');
    $('.inline-menu-container').removeClass('showx');
    $('.content-blocks').removeClass('showx');
    $('.menu-item').removeClass('active');
    return false;
  });

  var $mainContent = $('#content-box'),
    URL = '',
    $siteURL = 'http://' + top.location.host.toString(),
    $location = window.location.href,
    //$ajaxSpinner = $('#ajax-loader'),
    $el,
    $href,
    $title,
    $bodyClasses,
    $allLinks = $('a');

  $(document).on("click", "a[href^='" + $siteURL + "']:not([href*='/wp-admin/']):not([href*='/wp-login.php']):not([href$='/feed/']):not([href$='.pdf']):not([href$='.png']):not([href$='.jpg']):not([href$='.gif'])", function() {
    $el = $(this);
    $href = $el.attr('href');
    $location = window.location.href;

    if ($href !== $location) {

      $mainContent.animate({
        opacity: '0'
      });

      $('.current-menu-item').removeClass('current-menu-item');
      $allLinks.removeClass('current-link');

      URL = $el.attr('href');
      URL = URL + ' #body-content';

      $mainContent.load(URL, function(responseText) {
        $('.content').animate({
          scrollTop: 0
        }, 0);


        $title = responseText.match(/<title>([^<]*)/)[1];
        $title = decodeEntities($title);
        document.title = $title;

        $bodyClasses = responseText.match(/<body.*class=["']([^"']*)["'].*>/)[1];
        $('body').attr('class', $bodyClasses);

        history.pushState({}, $title, $el.attr('href'));

        $el.addClass('current-link').parent().addClass('current-menu-item');

        $mainContent.animate({
          opacity: '1'
        });

        setTimeout(ajaxReload, 300);
      });
    }
    return false;
  });
});
