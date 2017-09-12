<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */

get_header(); ?>
<div class="block-content" id="body-content">
  <h2 class="block-title"><?php echo __('Portfolio', 'cc2017'); ?></h2>
  <?php if(have_posts()) :
    $categories = get_terms([
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
              <?php if ( has_post_thumbnail() ) { ?>
                <?php $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() ); ?>
                <img src="<?php the_post_thumbnail_url( 'medium_large' ); ?>" alt="<?php get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', true); ?>">
              <?php } ?>

            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
