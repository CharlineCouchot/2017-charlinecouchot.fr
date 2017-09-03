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
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php echo wp_site_icon(); ?>
    <?php wp_head(); ?>

    <style>
    .content a:hover,
    .content a:focus {
      color: <?php echo $option_gradientStart; ?>;
    }
    .page {
      background-image: url("<?php echo $option_bg; ?>");
    }
    .gradient-overlay {
      background: <?php echo $option_gradientStart; ?>;
      background: -moz-linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%, <?php echo $option_gradientEnd; ?> 100%);
      background: -webkit-linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%,<?php echo $option_gradientEnd; ?> 100%);
      background: linear-gradient(<?php echo $option_gradientDirection; ?>, <?php echo $option_gradientStart; ?> 0%,<?php echo $option_gradientEnd; ?> 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $option_gradientStart; ?>', endColorstr='<?php echo $option_gradientEnd; ?>',GradientType=1 );
    }
    </style>
</head>

<body <?php body_class(); ?>>
  <div class="preloader">
      <div class="anim pulse"><i class="ion-ios-bolt-outline" aria-hidden="true"></i></div>
  </div>
  <div class="preloader-left"></div>
  <div class="preloader-right"></div>
  <section class="page<?php if ( !is_front_page() ) { echo ' menu-open'; } ?>">
      <div class="gradient-overlay"></div>
      <div class="container">
          <div class="name-block">
              <div class="name-block-container">
                  <div class="name-block-titles">
                    <h1 class="name-block-title"><span><?php echo __('Bienvenue. Je suis ', 'cc2017'); ?></span><?php echo bloginfo('name'); ?></h1>
                    <h2 class="name-block-subtitle"><?php echo bloginfo('description'); ?></h2>
                  </div>
                  <div class="name-block-btns">
                    <a class="name-block-btn btn btn-download" href="<?php echo $option_cvLink; ?>"><?php echo __('Télécharger mon CV', 'cc2017'); ?></a>
                  </div>
                  <ul class="social">
                      <li><a href="<?php echo $option_socialLinkedIn; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i> Linked In</a></li>
                      <li><a href="<?php echo $option_socialInstagram; ?>"><i class="fa fa-instagram" aria-hidden="true"></i>  Instagram</a></li>
                      <li><a href="<?php echo $option_socialGithub; ?>"><i class="fa fa-github-alt" aria-hidden="true"></i> Github</a></li>
                      <li><a href="<?php echo $option_socialGitlab; ?>"><i class="fa fa-gitlab" aria-hidden="true"></i> Gitlab</a></li>
                      <li><a href="<?php echo $option_socialEtsy; ?>"><i class="fa fa-etsy" aria-hidden="true"></i> Etsy</a></li>
                  </ul>
              </div>
          </div>
          <nav class="menu-blocks-container" role="navigation"aria-hidden="true">
            <ul class="menu-blocks">
              <li class="about-block menu-block">
                <a href="#">
                  <div class="menu-block-container">
                        <div class="about menu-item"><?php echo __('CV & Parcours', 'cc2017'); ?></div>
                  </div>
                </a>
              </li>
              <li class="portfolio-block menu-block">
                <a href="#">
                  <div class="menu-block-container">
                      <div class="portfolio menu-item"><?php echo __('Portfolio', 'cc2017'); ?></div>
                  </div>
                </a>
              </li>
              <li class="blog-block menu-block">
                <a href="#">
                  <div class="menu-block-container">
                        <div class="blog menu-item"><?php echo __('Blog', 'cc2017'); ?></div>
                  </div>
                </a>
              </li>
              <li class="contact-block menu-block">
                <a href="#">
                  <div class="menu-block-container">
                        <div class="contact menu-item"><?php echo __('Contact', 'cc2017'); ?></div>
                  </div>
                </a>
              </li>
            </ul>
          </nav>
          <div class="inline-menu-container<?php if ( !is_front_page() ) { echo ' showx'; } ?>">
              <span class="status<?php if( $option_freelance === true ) { ?> available<?php } else { ?> unavailable<?php } ?>">
                <?php if( $option_freelance === true ) { ?>
                  <?php echo __('Je suis disponible en freelance', 'cc2017'); ?>
                <?php } else { ?>
                  <?php echo __('Je ne suis pas disponible en freelance', 'cc2017'); ?>
                <?php } ?>
              </span>
              <nav role="navigation" class="inline-menu" aria-label="<?php echo __('Navigation principale', 'cc2017'); ?>">
                <?php wp_nav_menu( array(
                  'theme_location' => 'mainmenu',
                  'container' => 'ul' ) );
                ?>
                <span id="close" class="menu-item" aria-label="<?php echo __('Fermer le panneau', 'cc2017'); ?>"><i class="ion-ios-close-empty" aria-hidden="true"></i></span>
              </nav>
          </div>
          <div class="content-block">
            <div class="content-blocks<?php if ( !is_front_page() ) { echo ' showx'; } ?>">
              <section class="content">
