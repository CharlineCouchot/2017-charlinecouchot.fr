function ajaxReload() {
  if(jQuery('#portfolio-container').length > 0) {
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

  if(jQuery('.project-media').length > 0) {
    jQuery('.project-media').isotope({
      masonry: {
        columnWidth: '.portfolio-item'
      },
      itemSelector: '.portfolio-item'
    });
  }

  jQuery('[data-fancybox="group"]').fancybox({
    // Should display toolbar (buttons at the top)
	toolbar : true,

	// What buttons should appear in the top right corner.
	// Buttons will be created using templates from `btnTpl` option
	// and they will be placed into toolbar (class="fancybox-toolbar"` element)
  	buttons : [
  		'close'
  	],
  	smallBtn : true,
  });
}
function decodeEntities(encodedString) {
  var textArea = document.createElement('textarea');
  textArea.innerHTML = encodedString;
  return textArea.value;
}

jQuery(document).ready(function($) {
  $('.menu-block a').click(function(e) {
    //e.preventDefault();
    $('.content-blocks').addClass('showx');
    $('.inline-menu-container').addClass('showx');
    $('.page').addClass('menu-open');
    $('inline-menu-container .current-menu-item a').focus();
    //return false;
  });

  $('#close').click(function(e) {
    e.preventDefault();
    $('.page').removeClass('menu-open');
    $('.inline-menu-container').removeClass('showx');
    $('.content-blocks').removeClass('showx');
    $('.menu-item').removeClass('active');
    return false;
  });



  var $mainContent = $('#content-box'),
      URL = '',
      $siteURL = 'http://' + top.location.host.toString(),
      $location = window.location,
      $pathname = window.location.pathname,
      $ajaxSpinner = $('#ajax-loader'),
      $el,
      $href,
      $title,
      $bodyClasses,
      $allLinks = $('a');

  $(document).on( "click", "a[href^='"+$siteURL+"']:not([href*='/wp-admin/']):not([href*='/wp-login.php']):not([href$='/feed/']):not([href$='.pdf']):not([href$='.png']):not([href$='.jpg']):not([href$='.gif'])", function() {
    $el = $(this);
    $href = $el.attr('href');


    if ($href != $location) {

      $mainContent.animate({ opacity : '0' });

      $('.current-menu-item').removeClass('current-menu-item');
      $allLinks.removeClass('current-link');

      URL = $el.attr('href');
      URL = URL + ' #body-content';

      $mainContent.load(URL, function(responseText){
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

        $mainContent.animate({ opacity : '1' });

        setTimeout(ajaxReload, 100);
      });
    }
    return false;
  });
});
