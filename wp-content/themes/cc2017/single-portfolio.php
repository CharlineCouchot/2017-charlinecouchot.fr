<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */
get_header(); ?>
  <div class="block-content" id="body-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php $option_implication = get_field_object('portfolio-implication');
            $option_client  = get_field_object('portfolio-client');
            $option_date  = get_field_object('portfolio-date');
            $option_skills  = get_field_object('portfolio-skills');
            $option_link  = get_field_object('portfolio-link');
            $option_gallery  = get_field('portfolio-gallery');
            $cat = get_terms([
              'taxonomy' => 'portfolio_type'
            ]);
            $category = $cat[1]->term_taxonomy_id;?>
        <?php if($option_gallery && $category == 19) { ?>
          <div class="project-media row isotope">
            <?php foreach( $option_gallery as $image ): ?>
              <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo $image['url']; ?>" data-fancybox="group" data-caption="<?php echo $image['title']; ?>">
                  <div class="portfolio-column">
                    <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>">
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php } ?>
        <div class="project-head">
          <h1 class="block-title"><?php the_title(); ?></h1>
            <?php if($option_client['value']) { ?>
              <div class="tags"><h2><?php echo __('Client', 'cc2017'); ?> :</h2> <?php echo $option_client['value']; ?></div>
            <?php } ?>
            <?php if($option_date['value']) { ?>
              <div class="tags"><h2><?php echo __('Dates de réalisation', 'cc2017'); ?> :</h2> <?php echo $option_date['value']; ?></div>
            <?php } ?>
            <?php if($option_skills['value']) { ?>
              <div class="tags">
                <h2><?php echo __('Compétences mises en oeuvre', 'cc2017'); ?> :</h2>
                <?php foreach ($option_skills['value'] as &$value) { ?>
                  <span class="tag"><?php print $value->name; ?></span>
                <?php } ?>
              </div>
            <?php if($option_place['value']) { ?>
              <div class="tags"><h2><?php echo __('Lieu', 'cc2017'); ?> :</h2> <?php echo $option_date['value']; ?></div>
            <?php } ?>
        </div>
        <div class="project-body">
          <h2><?php echo __('Quelques mots sur le projet', 'cc2017'); ?> :</h2>
          <?php the_content(); ?>
          <?php if($option_implication['value']) { ?>
            <div class="tags"><h2><?php echo __('Mon implication', 'cc2017'); ?> :</h2> <?php echo $option_implication['value']; ?></div>
          <?php } ?>
        </div>
        <?php if($option_gallery && $category == 3) { ?>
          <div class="project-media row isotope">
            <?php foreach( $option_gallery as $image ): ?>
              <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item">
                <a href="<?php echo $image['url']; ?>" data-fancybox="group" data-caption="<?php echo $image['title']; ?>">
                  <div class="portfolio-column">
                    <img src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>">
                  </div>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        <?php } ?>
        <div class="project-nav text-center">
          <div>
            <?php previous_post_link( '&leftarrow; %link', __('Projet précédent', 'cc2017')); ?>
          </div>
          <div>
            <a id="close-project" href="#"><i class="ion-grid"></i></a>
          </div>
          <div>
            <?php next_post_link( '%link &rightarrow;', __('Projet suivant', 'cc2017')); ?>
          </div>
        </div>
        <script>
          jQuery(window).on('load', function() {
            var $container = jQuery('.project-media');
            $container.isotope({
              masonry: {
                columnWidth: '.portfolio-item'
              },
              itemSelector: '.portfolio-item'
            });
          });
        </script>
    <?php endwhile; endif; ?>
  </div>

<?php get_footer(); ?>
