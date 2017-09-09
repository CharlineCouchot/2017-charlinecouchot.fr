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
      //$mainContent.load('/contact/ #body-content');

      $(window).on('load', function() {
        <?php //is_front_page() { ?>
          //$('.page').removeClass('menu-open');
        <?php //} ?>

        $(".preloader").fadeOut("slow", function() {
          $(".preloader-left").addClass("slide-left");
        });

        //On Click Close Blocks
        $('#close').click(function() {
          $('.page').removeClass('menu-open');
    			$('.inline-menu-container').removeClass('showx');
          $('.content-blocks').removeClass('showx');
          $('.menu-item').removeClass('active');
        });

        //On Click Close Blog Post And Project Details
        $('#close-pop').click(function() {
    			$('.inline-menu-container').addClass('showx');
          $('.content-blocks.pop').removeClass('showx');
          $('.content-blocks.pop section').empty();
        });

        $('.menu-block, .menu-item, #close').click(function() {
          $('.content-blocks').animate({
            scrollTop: 0
          }, 800);
        });
      });
    })(jQuery);
  </script>
</body>
</html>
