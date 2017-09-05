<?php
// Nettoyage du <head> ------------------------------------------------

    function removeHeadLinks()
    {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

//  Script no-js / js class
    function alx_html_js_class()
    {
        echo '<script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>'. "\n";
    }
    add_action('wp_head', 'alx_html_js_class', 1);

    function remove_admin_login_header()
    {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'remove_admin_login_header');

    add_theme_support('title-tag');

// --------------------------------------------------------------------

// Traductions --------------------------------------------------------

    load_theme_textdomain('cc2017', TEMPLATEPATH . '/languages');

    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if (is_readable($locale_file)) {
        require_once($locale_file);
    }

// --------------------------------------------------------------------

// Retrait des attributs width et height des miniatures d'images --

    function clean_img_width_height($string)
    {
        return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>', $string);
    }

    // stop wp removing div tags
    function tiny_mce_fix($init)
    {
        // html elements being stripped
        $init['extended_valid_elements'] = 'div[*], p[*]';

        // pass back to wordpress
        return $init;
    }
    add_filter('tiny_mce_before_init', 'tiny_mce_fix');

// --------------------------------------------------------------------


// Menus personnalisés ------------------------------------------------

    if (function_exists('register_nav_menus')) {
        register_nav_menus(array(
            'mainmenu'    => __('Menu principal', 'cc2017'),
        ));
    }

// --------------------------------------------------------------------

// Tailles d'images ---------------------------------------------------

    add_theme_support('post-thumbnails');
    add_image_size('blog-featured', '800', '504', true);

// --------------------------------------------------------------------

// Scripts et styles --------------------------------------------------

    function sdv_scripts()
    {
        if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
            wp_enqueue_script('jquery');


            wp_register_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAmsb2nGLuIl04bt7CWJozRMhThvGa3y1w');
            wp_enqueue_script('gmaps');
            wp_register_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js');
            wp_enqueue_script('scripts');
            wp_register_style('ie_html5shiv', get_template_directory_uri() . '/js/ie/html5shiv.js');
            wp_enqueue_style('ie_html5shiv');
            wp_style_add_data('ie_html5shiv', 'conditional', 'lt IE 9');
            wp_register_style('ie_respond', get_template_directory_uri() . '/js/ie/respond.min.js');
            wp_enqueue_style('ie_respond');
            wp_style_add_data('ie_respond', 'conditional', 'lt IE 9');
        }
    }
    add_action('wp_enqueue_scripts', 'sdv_scripts');

    function sdv_styles()
    {
        wp_register_style('style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
        wp_enqueue_style('style');
    }
    add_action('wp_enqueue_scripts', 'sdv_styles');

    function sdv_admin_styles()
    {
        wp_register_style('admin-style', get_template_directory_uri() . '/admin-style.css', array(), '1.0', 'all');
        wp_enqueue_style('admin-style');
    }
    add_action('admin_enqueue_scripts', 'sdv_admin_styles');
    add_action('login_enqueue_scripts', 'sdv_admin_styles');

    function enqueue_comments_reply()
    {
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
    add_action('wp_enqueue_scripts', 'enqueue_comments_reply');


    add_editor_style();

// --------------------------------------------------------------------

// Retirer la mention sous la boîte de commentaires -------------------
add_filter('comment_form_defaults', 'remove_comment_styling_prompt');
function remove_comment_styling_prompt($defaults)
{
    $defaults['comment_notes_after'] = '';
    return $defaults;
}
// --------------------------------------------------------------------

// Pagination numérique -----------------------------------------------
function pagination($pages = '', $range = 4)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo '<div class="text-center">';
        echo '<ul class="pagination">';
        echo $paged > 1 ? '<li class="page-item"><a href="'.get_pagenum_link($paged - 1).'" class="page-link">'.__('Précédent', 'cc2017').'</a></li>' : '<li class="page-item disabled"><a href="" class="page-link">'.__('Précédent', 'cc2017').'</a></li>';

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                echo ($paged == $i)? '<li class="page-item active"><span class="page-link">'.$i.'<span class="sr-only">('.__('page en cours', 'cc2017').')</span></span><li>':'<li class="page-item"><a href='.get_pagenum_link($i).' class="page-link disabled">'.$i.'</a></li>';
            }
        }

        echo $paged < $pages ? '<li class="page-item"><a href="'.get_pagenum_link($paged + 1).'" class="page-link">'.__('Suivant', 'cc2017').'</a></li>' : '<li class="page-item disabled"><a href="" class="page-link">'.__('Suivant', 'cc2017').'</a></li>';

        echo "</ul>\n";
        echo "</div>\n";
    }
}

// Page d'options -----------------------------------------------------
require_once get_template_directory() . '/assets/admin/options-page.php';
// --------------------------------------------------------------------

// Type de contenu projets et taxonomies ------------------------------
require_once get_template_directory() . '/assets/admin/post-types.php';
// --------------------------------------------------------------------
