<?php
/*
 * @package WordPress
 * @subpackage CC 2017
 */

 get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <div id="blog-header" <?php if ( has_post_thumbnail() ) { ?>class="with-cover" style="background: url(<?php the_post_thumbnail_url( 'blog-featured' ); ?> ); background-size: cover;"<?php } ?>>
    <div class="overlay"></div>
    <div class="single-post-title-container">
      <h1 class="single-post-title"><?php the_title(); ?></h1>
      <p class="post-info">
        <span class="post-date"><?php the_date(); ?></span>
        <span class="slash"></span>
        <span class="post-catetory"><?php echo get_the_category_list(', '); ?></span>
      </p>
    </div>
  </div>
  <div class="block-content" id="single-post">
    <div class="post">
       <div class="post-body">
         <?php the_content(); ?>
       </div>
       <div class="author-box row">
         <div class="col-sm-2">
           <?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
         </div>
         <div class="col-sm-10">
           <h3>John Sparrow<span> | Author</span></h3>
           <p>He is the jack of all trade, but master of none. Ne cum invidunt constituto, sanctus accusam an usu, ea mandamus incorrupte mel. Pro cu purto graeco. Wisi sonet elitr eos in</p>
         </div>
       </div>
       <ul id="blog-social">
         <li>Share this : </li>
         <li><a href="#"><i class="ion-social-facebook"></i></a> </li>
         <li><a href="#"><i class="ion-social-twitter"></i></a> </li>
         <li><a href="#"><i class="ion-social-googleplus"></i></a> </li>
         <li><a href="#"><i class="ion-social-pinterest"></i></a> </li>
       </ul>
     </div>
    <div id="comments">
      <h5>3 Comments</h5>
      <ul class="comments-list">
           <li>
            <div class="comment row">
               <div class="col-sm-2">
                 <img src="images/blog/comment3.jpg" class="rounded-circle" alt="">
               </div>
               <div class="col-sm-10">
                 <h5>Ethan Grant<span class="comment-date"> | Dec 08</span></h5>
                 <p>Ne cum invidunt constituto, sanctus accusam an usu, ea mandamus incorrupte mel. Pro cu purto graeco. Wisi sonet elitr eos in.</p>
                 <a class="comment-reply" href="#">Reply</a>
               </div>
             </div>
            <ul class="children">
                 <li>
                   <div class="comment row">
                     <div class="col-sm-2">
                       <img src="images/blog/comment1.jpg" class="rounded-circle" alt="">
                     </div>
                     <div class="col-sm-10">
                       <h5>Claudia Chekov<span class="comment-date"> | Dec 09</span></h5>
                       <p>Ne cum invidunt constituto, sanctus accusam an usu, ea mandamus incorrupte mel. Pro cu purto graeco. Wisi sonet elitr eos in.</p>
                       <a class="comment-reply" href="#">Reply</a>
                     </div>
                   </div>
                 </li>
               </ul>
           </li>
           <li>
            <div class="comment row">
              <div class="col-sm-2">
                <img src="images/blog/comment2.jpg" class="rounded-circle" alt="">
              </div>
              <div class="col-sm-10">
                <h5>Mark Smith<span class="comment-date"> | Dec 11</span></h5>
                <p>Ne cum invidunt constituto, sanctus accusam an usu, ea mandamus incorrupte mel. Pro cu purto graeco. Wisi sonet elitr eos in.</p>
                <a class="comment-reply" href="#">Reply</a>
              </div>
            </div>
           </li>
       </ul>
    </div>
    <div id="respond">
      <h3>Leave a comment</h3>
      <div class="comment-respond">
          <form class="comment-form">
            <div class="form-double">
              <div class="form-group">
                <input name="author" type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group last">
                <input name="email" type="text" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" placeholder="Comment"></textarea>
            </div>
            <div class="form-submit">
              <button type="button" class="btn btn-dark">Post Comment</button>
            </div>
          </form>
       </div>
    </div>
  </div>
<?php endwhile; ?>
<?php get_footer(); ?>
