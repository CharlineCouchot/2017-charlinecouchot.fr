<?php
// Déclarations des types de contenus & taxonomies ----------

// Register Custom Taxonomy
function portfolio_skills() {

	$labels = array(
		'name'                       => _x( 'Compétences', 'Taxonomy General Name', 'cc2017' ),
		'singular_name'              => _x( 'Compétence', 'Taxonomy Singular Name', 'cc2017' ),
		'menu_name'                  => __( 'Compétences', 'cc2017' ),
		'all_items'                  => __( 'Toutes les compétences', 'cc2017' ),
		'parent_item'                => __( 'Compétence parente', 'cc2017' ),
		'parent_item_colon'          => __( 'Compétence parente :', 'cc2017' ),
		'new_item_name'              => __( 'Ajouter une compétence', 'cc2017' ),
		'add_new_item'               => __( 'Ajouter une compétence', 'cc2017' ),
		'edit_item'                  => __( 'Éditer la compétence', 'cc2017' ),
		'update_item'                => __( 'Mettre à jour la compétence', 'cc2017' ),
		'view_item'                  => __( 'Voir la compétence', 'cc2017' ),
		'separate_items_with_commas' => __( 'Séparer les éléments par une virgule', 'cc2017' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer des compétences', 'cc2017' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisées', 'cc2017' ),
		'popular_items'              => __( 'Éléments populaires', 'cc2017' ),
		'search_items'               => __( 'Rechercher une compétence', 'cc2017' ),
		'not_found'                  => __( 'Introuvable', 'cc2017' ),
		'no_terms'                   => __( 'Pas de résultat', 'cc2017' ),
		'items_list'                 => __( 'Liste des résultats', 'cc2017' ),
		'items_list_navigation'      => __( 'Naviguer les compétences', 'cc2017' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_skills', array( 'portfolio' ), $args );
}

add_action( 'init', 'portfolio_skills', 0 );

// Register Custom Taxonomy
function portfolio_type() {

	$labels = array(
		'name'                       => _x( 'Catégories', 'Taxonomy General Name', 'cc2017' ),
		'singular_name'              => _x( 'Catégorie', 'Taxonomy Singular Name', 'cc2017' ),
		'menu_name'                  => __( 'Catégories', 'cc2017' ),
		'all_items'                  => __( 'Toutes les catégories', 'cc2017' ),
		'parent_item'                => __( 'Catégorie parente', 'cc2017' ),
		'parent_item_colon'          => __( 'Catégorie parente :', 'cc2017' ),
		'new_item_name'              => __( 'Ajouter une catégorie', 'cc2017' ),
		'add_new_item'               => __( 'Ajouter une catégorie', 'cc2017' ),
		'edit_item'                  => __( 'Éditer la catégorie', 'cc2017' ),
		'update_item'                => __( 'Mettre à jour la catégorie', 'cc2017' ),
		'view_item'                  => __( 'Voir la catégorie', 'cc2017' ),
		'separate_items_with_commas' => __( 'Séparer les éléments par une virgule', 'cc2017' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer des éléments', 'cc2017' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisées', 'cc2017' ),
		'popular_items'              => __( 'Éléments populaires', 'cc2017' ),
		'search_items'               => __( 'Rechercher un élément', 'cc2017' ),
		'not_found'                  => __( 'Introuvable', 'cc2017' ),
		'no_terms'                   => __( 'Pas de résultat', 'cc2017' ),
		'items_list'                 => __( 'Liste des résultats', 'cc2017' ),
		'items_list_navigation'      => __( 'Naviguer les éléments', 'cc2017' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_type', array( 'portfolio' ), $args );
}

add_action( 'init', 'portfolio_type', 0 );

// Register Custom Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'cc2017' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'cc2017' ),
		'menu_name'             => __( 'Portfolio', 'cc2017' ),
		'name_admin_bar'        => __( 'Portfolio', 'cc2017' ),
		'archives'              => __( 'Archives de portfolio', 'cc2017' ),
		'attributes'            => __( 'Attributs d\'élément de portfolio', 'cc2017' ),
		'parent_item_colon'     => __( 'Élément parent :', 'cc2017' ),
		'all_items'             => __( 'Tous les éléments', 'cc2017' ),
		'add_new_item'          => __( 'Ajouter un élément de portfolio', 'cc2017' ),
		'add_new'               => __( 'Ajouter', 'cc2017' ),
		'new_item'              => __( 'Nouvel élément de portfolio', 'cc2017' ),
		'edit_item'             => __( 'Éditer l\'élément de portfolio', 'cc2017' ),
		'update_item'           => __( 'Mettre à jour l\'élément de portfolio', 'cc2017' ),
		'view_item'             => __( 'Voir l\'élément', 'cc2017' ),
		'view_items'            => __( 'Voir les éléments', 'cc2017' ),
		'search_items'          => __( 'Rechercher l\'élément', 'cc2017' ),
		'not_found'             => __( 'Introuvable', 'cc2017' ),
		'not_found_in_trash'    => __( 'Aucun élément dans la corbeille', 'cc2017' ),
		'featured_image'        => __( 'Image à la une', 'cc2017' ),
		'set_featured_image'    => __( 'Définir l\'image à la une', 'cc2017' ),
		'remove_featured_image' => __( 'Retirer l\'image à la une', 'cc2017' ),
		'use_featured_image'    => __( 'Utiliser en tant qu\'image à la une', 'cc2017' ),
		'insert_into_item'      => __( 'Insérer dans l\'élément', 'cc2017' ),
		'uploaded_to_this_item' => __( 'Charger dans cet élément', 'cc2017' ),
		'items_list'            => __( 'Liste des éléments', 'cc2017' ),
		'items_list_navigation' => __( 'Navigation de la liste d\'éléments', 'cc2017' ),
		'filter_items_list'     => __( 'Filtrer les éléments', 'cc2017' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'cc2017' ),
		'description'           => __( 'Post Type Description', 'cc2017' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'portfolio_type', 'portfolio_skills' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );

?>
