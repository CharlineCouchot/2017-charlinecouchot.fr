<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */

get_header(); ?>
<div class="block-content">
  <h2 class="block-title"><?php echo __('Portfolio', 'cc2017'); ?></h2>
  <?php if(have_posts()) : ?>
  <?php $categories = get_terms([
      'taxonomy' => 'portfolio_type'
    ]);
    $cls = '';

    if (! empty($categories)) {
      foreach ($categories as $cat) {
        $cls .= $cat->slug . ' ';
      }
    } ?>
    <div class="filters">
      <span><?php echo __('Filtres', 'cc2017'); ?> :</span>
      <ul id="filters">
        <li class="active" data-filter="*"><?php echo __('Tout', 'cc2017'); ?></li>
        <?php foreach ($categories as $cat) { ?>
          <li data-filter=".<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></li>
        <? } ?>
      </ul>
    </div>
    <div class="portfolio-container row isotope" id="portfolio-container">
      <?php while(have_posts()) : the_post(); ?>
        <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item no-gutter <?php echo $cls; ?>">
          <a class="open-project" href="<?php the_permalink(); ?>">
            <div class="portfolio-column">
              <div class="portfolio-hover ">
                <div class="portfolio-content">
                  <h3 class="portfolio-title"><?php the_title(); ?></h3>
                  <hr>
                  <p><?php echo __('Voir les détails', 'cc2017'); ?></p>
                </div>
                <div class="portfolio-overlay"></div>
              </div>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portfolio/masonry/001.jpg" alt="">
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>
<script>
(function($) {
  "use strict";

  $(window).on('load', function() {
    //Portfolio masonry
    var $container = $('#portfolio-container');
    $container.isotope({
      masonry: {
        columnWidth: '.portfolio-item'
      },
      itemSelector: '.portfolio-item'
    });
    $('#filters').on('click', 'li', function() {
      $('#filters li').removeClass('active');
      $(this).addClass('active');
      var filterValue = $(this).attr('data-filter');
      $container.isotope({
        filter: filterValue
      });
    });
  });
})(jQuery);
</script>
<?php get_footer(); ?>
