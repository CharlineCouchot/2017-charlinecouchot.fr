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

    jQuery(document).ready(function($) {
      <?php if(is_front_page()) { ?>
        $('.inline-menu-container').removeClass('showx');
        $('.page').removeClass('menu-open');
      <?php } ?>
    });

    (function($) {
      "use strict";

      $(window).on('load', function() {
        $(".preloader").fadeOut("slow", function() {
          $(".preloader-left").addClass("slide-left");
        });
      });
    })(jQuery);
  </script>
</body>
</html>
