<?php
/*
 * @package WordPress
 * @subpackage CC2017
 */
  $option_email = get_field('general-email', 'option');
?>
          <?php if(is_page_template('views/page-profile.php') || is_page_template( 'views/page-portfolio.php' )) { ?>
            <div class="row text-center">
                <div class="col-md-12 btn-email">
                    <a class="btn lowercase"><?php echo $option_email; ?></a>
                </div>
            </div>
          <?php } ?>
          </section> <!-- section.content -->
        </div> <!-- div.content-blocks -->
      </div> <!-- div.content-block -->
    </div> <!-- div.container -->
  </section> <!-- section.page -->

  <?php wp_footer(); ?>

  <script>
    (function($) {
      "use strict";

      $(window).on('load', function() {
        <?php //is_front_page() { ?>
          //$('.page').removeClass('menu-open');
        <?php //} ?>

        $(".preloader").fadeOut("slow", function() {
          $(".preloader-left").addClass("slide-left");
        });

        //On Click Open Menu Items
        $('.menu-block, .menu-item').click(function() {
          $('.page').addClass('menu-open');
    			$('.inline-menu-container').addClass('showx');
        });

        //On Click Close Blocks
        $('#close').click(function() {
          $('.page').removeClass('menu-open');
    			$('.inline-menu-container').removeClass('showx');
          $('.content-blocks').removeClass('showx');
          $('.menu-item').removeClass('active');
        });

        $('.menu-block, .menu-item, #close').click(function() {
          $('.content-blocks').animate({
            scrollTop: 0
          }, 800);
        });

        //On Click Open About/Resume Block
        $('.about-block, .menu-item.about').click(function() {

          var post_link = $(this).attr("href");
          $('.content-blocks').addClass('showx');
          $('.menu-item').removeClass('active');
          $('.menu-item.about').addClass('active');
        });

        //On Click Open Portfolio Block
        $('.portfolio-block, .menu-item.portfolio').click(function() {
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

          $('.content-blocks').removeClass('showx');
          $('.content-blocks.portfolio').addClass('showx');
          $('.menu-item').removeClass('active');
          $('.menu-item.portfolio').addClass('active');
        });

        //On Click Open Blog Block
        $('.blog-block, .menu-item.blog').click(function() {
          $('.content-blocks').removeClass('showx');
          $('.content-blocks.blog').addClass('showx');
          $('.menu-item').removeClass('active');
          $('.menu-item.blog').addClass('active');
        });

        //On Click Open Contact Block
        $('.contact-block, .menu-item.contact').click(function() {
          $('.content-blocks').removeClass('showx');
          $('.content-blocks.contact').addClass('showx');
          $('.menu-item').removeClass('active');
          $('.menu-item.contact').addClass('active');
        });

        /*$.ajaxSetup({cache:false});
        $(".post-link").click(function(){


          $("#single-post-container").html("content loading");
          $("#single-post-container").load(post_link);
          return false;
        });*/

      });
    })(jQuery);
  </script>
</body>
</html>
