<?php
/*
 * @package WordPress
 * @subpackage SdV Gestion
 */
?>

<form role="search" method="get" class="form form--search" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
    <div class="form__line">
        <label class="form__hidden"><?php echo _x( 'Rechercher sur le site :', 'label', 'sdv' ); ?></label>
        <div class="form__field form__field--icon">
            <input class="form__input" type="search" placeholder="<?php echo esc_attr_x( 'Rechercher sur le site &hellip;', 'placeholder', 'sdv' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </div>
        <div class="form__icon">
            <button type="submit" class="icon">
                <div class="form__hidden"><?php echo _x( 'Envoyer', 'submit button', 'sdv' ); ?></div>
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>
</form>
