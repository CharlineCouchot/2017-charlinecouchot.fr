jQuery(document).ready(function($) {
  $('.menu-block a').click(function() {
    $('.content-blocks').addClass('showx');
    $('.inline-menu-container').addClass('showx');
    $('.page').addClass('menu-open');
    $('inline-menu-container .current-menu-item a').focus();
  });

  $('#close').click(function() {
    $('.page').removeClass('menu-open');
    $('.inline-menu-container').removeClass('showx');
    $('.content-blocks').removeClass('showx');
    $('.menu-item').removeClass('active');
  });

  function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
  }

  console.log(window.location.pathname);

  var $mainContent = $('#content-box'),
      URL = '',
      $siteURL = 'http://' + top.location.host.toString(),
      $internalLinks = $("a[href^='"+$siteURL+"']:not([href*='/wp-admin/']):not([href*='/wp-login.php']):not([href$='/feed/']"),
      $location = window.location,
      $pathname : window.location.pathname,
      $ajaxSpinner = $('#ajax-loader'),
      $el,
      $href,
      $title,
      $allLinks = $('a');

  if($pathname != '/') {

  }

  $internalLinks.each(function() {
    $(this).addClass('internal-link');
    if ($(this).attr('href') == $location) {
      $(this).addClass('current-link').parent().addClass('current-menu-item');
    }

  }).click(function(e) {
    e.preventDefault();
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
        history.pushState({}, $title, $el.attr('href'));

        $el.addClass('current-link').parent().addClass('current-menu-item');
        $mainContent.animate({ opacity : '1' });

        if (typeof ajaxReload == 'function') {
          ajaxReload();
        }
      });
    }

  });
});
