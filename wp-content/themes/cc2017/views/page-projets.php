<?php
/*
 * @package WordPress
 * @subpackage SdV Gestion
 * Template Name: Page de projets
 */
    
 get_header();
$args = array( 'post_type' => 'projet');
$loop = new WP_Query( $args ); ?>
 
<div id="main-content" class="content page__projects">
    <?php if ( !is_user_logged_in() ) { ?>
        <div class="content__row">
            <div class="content__cell content__cell--middle content__cell--center">
                <form class="form form--small" method="post" action="<?php echo wp_login_url(); ?>" id="loginform" name="loginform">
                    <p class="form__intro form__intro--center"><?php _e('Cet espace est réservé au personnel SdV. Connectez-vous pour y accéder.', 'sdv'); ?></p>
                    <div class="form__line">
                        <label class="form__label" for="user_login"><?php _e('Nom d\'utilisateur', 'sdv'); ?></label>
                        <div class="form__field">
                            <input class="form__input" type="text" tabindex="10" size="20" value="" id="user_login" name="log">
                        </div>
                    </div>
                    <div class="form__line">
                        <label class="form__label" for="user_login"><?php _e('Mot de passe', 'sdv'); ?></label>
                        <div class="form__field">
                            <input class="form__input" type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
                        </div>
                    </div>
                    <div class="form__line">
                        <div class="form__column form__column--left">
                            <input class="form__input--checkbox" type="checkbox" tabindex="90" value="forever" id="rememberme" name="rememberme">
                            <label class="form__label--checkbox" for="rememberme"><?php _e('Rester connecté', 'sdv'); ?></label>
                        </div>
                        <div class="form__column form__column--right">
                            <a class="form__lostpwd" href="<?php echo wp_lostpassword_url(); ?>"><?php _e('Mot de passe oublié', 'sdv'); ?></a>
                        </div>
                    </div>
                    <div class="form__line submit">
                        <input type="submit" class="btn yellow" tabindex="100" value="<?php _e('Se connecter', 'sdv'); ?>" id="wp-submit" name="wp-submit">
                    </div>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <header class="content__row content__header">
            <div class="content__cell content__title">
                <h1 class="title">
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="content__cell content__search">
                <?php get_search_form(); ?>
            </div>
        </header>
        <div class="content__row content__body"> 
            
                <aside class="filters">
                    <div class="filters__container">
                        <h2 class="filters__title"><?php _e('Filtres de recherche', 'sdv'); ?></h2>
                        <?php echo do_shortcode('[searchandfilter id="120"]'); ?>
                    </div>
                </aside>
                <div class="results">
                    <div class="add">
                        <a href="<?php echo admin_url('post-new.php?post_type=projet'); ?>" class="btn yellow"><?php _e('Ajouter un projet', 'sdv'); ?></a>
                    </div>
                    <?php echo do_shortcode('[searchandfilter id="120" show="results"]'); ?>
                </div>

        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>
