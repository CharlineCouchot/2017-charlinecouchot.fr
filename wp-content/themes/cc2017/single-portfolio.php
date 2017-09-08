<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */
get_header(); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="block-content">
      <div class="project-head">
        <h1 class="block-title"><?php the_title(); ?></h1>
        <div class="tags"><span>Category : </span> Graphic / Apps</div>
        <div class="tags"><span>Client : </span> NHS</div>
        <div class="tags"><span>Completion : </span> February 2017</div>
        <div class="tags"><span>Role : </span> Art Direction</div>
      </div>
      <div class="project-description">
        <?php the_content(); ?>
      </div>
      <div class="project-media row">
        <div class="col-md-6">
          <img src="images/portfolio/masonry/001.jpg" alt="" />
        </div>
        <div class="col-md-6">
          <img src="images/portfolio/masonry/002.jpg" alt="" />
          <img src="images/portfolio/masonry/004.jpg" alt="" />
        </div>
      </div>
      <div class="project-nav text-center">
          <span class="float-left">
              <a class="open-project" href="project-6.html">&leftarrow; Previous Project</a>
          </span>
          <span class="">
              <a id="close-project" href="#"><i class="ion-grid"></i></a>
          </span>
          <span class="float-right">
              <a class="open-project" href="project-2.html">Next Project &rightarrow; </a>
          </span>
      </div>
    </div>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
