<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */

 get_header(); ?>
<div id="body-content">
  <?php while ( have_posts() ) : the_post(); ?>
    <div id="blog-header" <?php if ( has_post_thumbnail() ) { ?>class="with-cover" style="background: url(<?php the_post_thumbnail_url( 'blog-featured' ); ?> ); background-size: cover;"<?php } ?>>
      <div class="overlay"></div>
      <div class="single-post-title-container">
        <h1 class="single-post-title"><?php the_title(); ?></h1>
        <p class="post-info">
          <span class="post-date"><?php the_date(); ?></span>
          <span class="slash"></span>
          <span class="post-catetory"><?php foreach((get_the_category()) as $category) { echo '<span>' . $category->cat_name . '</span>'; } ?></span>
        </p>
      </div>
    </div>
    <div class="block-content" id="single-post">
      <div class="post">
         <div class="post-body">
           <?php the_content(); ?>
         </div>
         <?php /*<div class="author-box row">
           <div class="col-sm-2">
             <?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
           </div>
           <div class="col-sm-10">
             <div class="author-name"><h3><?php the_author(); ?></h3> | Author</div>
             <?php echo wpautop( get_the_author_meta( 'description' ) ); ?>
           </div>
         </div> */ ?>
         <ul id="blog-social">
           <li><?php echo __('Partager cet article', 'cc2017'); ?> :</li>
           <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sr-only"><?php echo __('sur Facebook', 'cc2017'); ?></span></a> </li>
           <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="sr-only"><?php echo __('sur Twitter', 'cc2017'); ?></span></a> </li>
           <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i><span class="sr-only"><?php echo __('sur Pinterest', 'cc2017'); ?></span></a> </li>
         </ul>
       </div>
       <?php if ( comments_open() || get_comments_number() ) :
         comments_template();
       endif; ?>
    </div>
  <?php endwhile; ?>
</div>
<?php get_footer(); ?>
