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

  function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
  }

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

  $(document).on( "click", "a[href^='"+$siteURL+"']:not([href*='/wp-admin/']):not([href*='/wp-login.php']):not([href$='.pdf']):not([href$='/feed/'])", function() {
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

        if(jQuery('.project-media').length > 0) {
          jQuery('.project-media').isotope({
            masonry: {
              columnWidth: '.portfolio-item'
            },
            itemSelector: '.portfolio-item'
          });
        }
      });
    }
    return false;
  });
});
