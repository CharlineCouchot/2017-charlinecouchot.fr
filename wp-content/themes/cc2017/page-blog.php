<?php
/*
* @package WordPress
* @subpackage CC2017
* Template Name: Page Blog
*/
  get_header();
  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $query = new WP_Query(array(
	  'post_type' => 'post',
    'paged' => $paged
  ));
?>
<div class="block-content">
  <h2 class="block-title"><?php echo __('Blog', 'cc2017'); ?></h2>
  <?php if($query->have_posts()) : ?>
    <div class="row">
      <div class="col-md-10 mx-auto">
        <?php while($query->have_posts()) : $query->the_post(); ?>
          <div class="post">
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="post-thumbnail">
                <a class="open-post" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('blog-featured'); ?>
                </a>
            </div>
            <?php } ?>
            <div class="post-title">
              <a class="open-post" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
              <p class="post-info">
                <span class="post-date"><?php the_date(); ?></span>
                <span class="slash"></span>
                <span class="post-catetory"><?php echo get_the_category_list(', '); ?></span>
              </p>
            </div>
            <div class="post-body">
              <?php the_excerpt(); ?>
              <a class="btn open-post" href="<?php the_permalink(); ?>"><?php echo __('Lire la suite', 'cc2017'); ?></a>
            </div>
          </div>
        <?php endwhile; ?>
        <?php if (function_exists("pagination")) {
          pagination($query->max_num_pages);
        } ?>
      </div>
    </div>
  <?php wp_reset_postdata(); endif; ?>
</div>
<?php get_footer(); ?>
