<?php
// Nettoyage du <head> ------------------------------------------------

    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

//  Script no-js / js class
    function alx_html_js_class () {
        echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
    }
    add_action( 'wp_head', 'alx_html_js_class', 1 );
    
    function remove_admin_login_header() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'remove_admin_login_header');
    
    add_theme_support( 'title-tag' );
// --------------------------------------------------------------------

// Traductions --------------------------------------------------------

    load_theme_textdomain( 'cc2017', TEMPLATEPATH . '/languages' );

    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if ( is_readable($locale_file) ) {
        require_once($locale_file);
    }

// --------------------------------------------------------------------

// Retrait des attributs width et height des miniatures d'images --

    function clean_img_width_height($string){
        return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>',$string);
    }

// --------------------------------------------------------------------


// Menus personnalisés ------------------------------------------------

    if (function_exists('register_nav_menus')) {
        register_nav_menus(array(
            'mainmenu' 	=> __( 'Menu Principal', 'sdv' ),
        )); 
    }

// --------------------------------------------------------------------

// Tailles d'images ---------------------------------------------------

    add_theme_support('post-thumbnails');
    //add_image_size('large-thumbnail', '', '');

// --------------------------------------------------------------------

// Scripts et styles --------------------------------------------------
    
    function sdv_scripts() {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            wp_enqueue_script('jquery'); 
            wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.min.js');
            wp_enqueue_script('scripts');
            wp_register_style( 'ie_html5shiv', get_template_directory_uri() . '/js/ie/html5shiv.js' );
            wp_enqueue_style( 'ie_html5shiv');
            wp_style_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );
            wp_register_style( 'ie_respond', get_template_directory_uri() . '/js/ie/respond.min.js' );
            wp_enqueue_style( 'ie_respond');
            wp_style_add_data( 'ie_respond', 'conditional', 'lt IE 9' );
        }
    }
    add_action('wp_enqueue_scripts', 'sdv_scripts');

    function sdv_styles() {
        wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
        wp_enqueue_style('style');
        //wp_register_style('gfonts', 'https://fonts.googleapis.com/css?family=Alegreya+Sans:400,300,700', array(), '1.0', 'all');
        //wp_enqueue_style('gfonts');
    }
    add_action('wp_enqueue_scripts', 'sdv_styles');

    function sdv_admin_styles() {
        wp_register_style('admin-style', get_template_directory_uri() . '/admin-style.css', array(), '1.0', 'all');
        wp_enqueue_style('admin-style');
    }
    add_action('admin_enqueue_scripts', 'sdv_admin_styles');
    add_action('login_enqueue_scripts', 'sdv_admin_styles');

    function enqueue_comments_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'enqueue_comments_reply' );


    add_editor_style();

// --------------------------------------------------------------------

// Retirer la mention sous la boîte de commentaires -------------------
add_filter('comment_form_defaults', 'remove_comment_styling_prompt');
function remove_comment_styling_prompt($defaults) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}
// --------------------------------------------------------------------

// Type de contenu projets et taxonomies ------------------------------
require_once get_template_directory() . '/assets/admin/post-types.php';
// --------------------------------------------------------------------

?>