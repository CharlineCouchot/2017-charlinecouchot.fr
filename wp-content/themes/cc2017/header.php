<?php
/*
* @package WordPress
* @subpackage CC2017
*/

 $option_bg                 = get_field('general-bg', 'option');
 $option_gradientStart      = get_field('general-gradient-start', 'option');
 $option_gradientEnd        = get_field('general-gradient-end', 'option');
 $option_gradientDirection  = get_field('general-gradient-direction', 'option');
 $option_cvLink             = get_field('general-cv-link', 'option');
 $option_socialLinkedIn     = get_field('general-social-linkedin', 'option');
 $option_socialInstagram    = get_field('general-social-instagram', 'option');
 $option_socialGithub       = get_field('general-social-github', 'option');
 $option_socialGitlab       = get_field('general-social-gitlab', 'option');
 $option_socialEtsy         = get_field('general-social-etsy', 'option');
 $option_freelance          = get_field('general-freelance', 'option');
 $option_email              = get_field('general-email', 'option');
 $option_address            = get_field('general-address', 'option');
 $option_subtitle           = get_field('general-subtitle', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-72162889-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments)};
    gtag('js', new Date());

    gtag('config', 'UA-72162889-1');
    </script>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo wp_site_icon(); ?>
    <?php wp_head(); ?>

    <style>
    .content a:hover,
    .content a:focus,
    .social a:hover,
    .social a:focus {
      color: <?php echo $option_gradientStart; ?>;
    }
    .page {
      background-image: url("<?php echo $option_bg; ?>"), -moz-linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%, <?php echo $option_gradientEnd; ?> 100%);
      background-image: url("<?php echo $option_bg; ?>"), -webkit-linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%,<?php echo $option_gradientEnd; ?> 100%);
      background-image: url("<?php echo $option_bg; ?>"), linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%,<?php echo $option_gradientEnd; ?> 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $option_gradientStart; ?>', endColorstr='<?php echo $option_gradientEnd; ?>',GradientType=1 );
    }
    </style>
</head>

<body <?php body_class(); ?>>
  <div class="preloader">
      <div class="anim pulse">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.png" width="100" height="100" class="preloader__img" alt="" aria-hidden="true">
      </div>
  </div>
  <div class="preloader-left"></div>
  <div class="preloader-right"></div>
  <section class="page menu-open">
      <div class="light-overlay"></div>
      <div class="container">
        <div class="language-block">
          <?php do_action("etm_languagemenu"); ?>
        </div>
          <div class="name-block">
              <div class="name-block-container">
                  <div class="name-block-titles">
                    <<?php if ( !is_single() ) { echo 'h1' ; } else { echo 'div' ; } ?> class="name-block-title">
                      <span><?php echo __('Bienvenue.', 'cc2017'); ?></span>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cc2017-logo_final_wob.png" class="name-block-logo" alt="" aria-hidden="true">
                      <span class="sr-only"><?php echo bloginfo('name'); ?></span>
                    </<?php if ( !is_single() ) { echo 'h1' ; } else { echo 'div' ; } ?>>
                    <<?php if ( !is_single() ) { echo 'h2' ; } else { echo 'div' ; } ?> class="name-block-subtitle">
                      <div id="typed-strings">
                        <?php while( have_rows('general-subtitle', 'option') ) : the_row(); ?>
                          <?php if(get_sub_field('general-subtitle-element') !== "") { ?>
                            <span><?php the_sub_field('general-subtitle-element'); ?></span>
                          <?php } ?>
                        <?php endwhile; ?>
                      </div>
                      <div id="typed"></div>
                    </<?php if ( !is_single() ) { echo 'h2' ; } else { echo 'div' ; } ?>>
                    <script type="text/javascript">
                      if( jQuery('#typed') ) {
                        var typed;
                        typed = new Typed("#typed", {
                          stringsElement: '#typed-strings',
                          typeSpeed: 50,
                          backSpeed: 50,
                          loop: true,
                          startDelay: 500,
                          backDelay: 3000,
                          contentType: 'html',
                        });
                      }
                    </script>
                  </div>
                  <div class="name-block-btns">
                    <a class="name-block-btn btn btn-download" href="<?php echo $option_cvLink; ?>"><?php echo __('Télécharger mon CV', 'cc2017'); ?></a>
                  </div>
                  <ul class="name-block-social">
                      <li><a href="<?php echo $option_socialLinkedIn; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a></li>
                      <li><a href="<?php echo $option_socialInstagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i>  Instagram</a></li>
                      <li><a href="<?php echo $option_socialGithub; ?>"><i class="fa fa-github-alt" aria-hidden="true"></i> Github</a></li>
                      <li><a href="<?php echo $option_socialGitlab; ?>"><i class="fa fa-gitlab" aria-hidden="true"></i> Gitlab</a></li>
                      <li><a href="<?php echo $option_socialEtsy; ?>"><i class="fa fa-etsy" aria-hidden="true"></i> Etsy</a></li>
                  </ul>
              </div>
          </div>
          <?php $menu_name = 'mainmenu';
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                $menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) ); ?>
          <nav class="menu-blocks-container" role="navigation" aria-hidden="true">
            <ul class="menu-blocks">
            <?php foreach( $menuitems as $item ) {?>
                <?php $link = $item->url;
                      $title = $item->title;
                      $slug = $item->classes[0]; ?>
                  <li class="<?php echo $slug; ?>-block menu-block">
                    <a href="<?php echo $link; ?>">
                      <div class="menu-block-container">
                        <div class="<?php echo $slug; ?> menu-item"><?php echo $title; ?></div>
                      </div>
                    </a>
                  </li>
              <?php } ?>
            </ul>
        </nav>
          <div class="menu-inline-container showx">
              <?php /*<span class="status<?php if( $option_freelance === true ) { ?> available<?php } else { ?> unavailable<?php } ?>">
                if( $option_freelance === true ) { ?>
                  <?php echo __('Je suis disponible en freelance', 'cc2017'); ?>
                <?php } else { ?>
                  <?php echo __('Je ne suis pas disponible en freelance', 'cc2017'); ?>
                <?php }
              </span>*/ ?>
              <nav role="navigation" class="menu-inline" aria-label="<?php echo __('Navigation principale', 'cc2017'); ?>">
                <?php wp_nav_menu( array(
                  'theme_location' => 'mainmenu',
                  'container' => 'ul' ) );
                ?>
                <a id="close" href="#" class="menu-item" aria-label="<?php echo __('Fermer le panneau', 'cc2017'); ?>"><i class="ion-ios-close-empty" aria-hidden="true"></i></a>
              </nav>
          </div>
          <div class="content-block">
            <div class="content-blocks showx">
              <section class="content" id="content-box">
