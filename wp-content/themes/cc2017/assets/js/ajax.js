jQuery(document).ready(function($) {
  var $mainContent = $('#content-box'),
      URL = '',
      $siteURL = 'http://' + top.location.host.toString(),
      $internalLinks = $('a[href^="' + $siteURL + '"]'),
      hash = window.location.hash,
      $ajaxSpinner = $('#ajax-loader'),
      $el,
      $allLinks = $('a');



  if(hash) {
    $mainContent.animate({ opacity : '0' });
    $('.current_page_item').removeClass('current_page_item');
    $('a[href="'+ hash +'"]').addClass('current-link').parent().addClass('current_page_item');
    URL = hash + ' #body-content';

    $mainContent.load(URL, function(){
      $mainContent.animate({ opacity : '1' });
    });
  }

  $internalLinks.click(function(e) {
    e.preventDefault();
    $el = $(this);


    $mainContent.animate({ opacity : '0' });

    $('.current_page_item').removeClass('current_page_item');
    $allLinks.removeClass('current-link');

    URL = $el.attr('href');
    URL = URL + ' #body-content';

    $mainContent.load(URL, function(){
      $el.addClass('current-link').parent().addClass('current_page_item');
      $mainContent.animate({ opacity : '1' });
      history.pushState({}, null, $el.attr('href'));
    });
  });
});
