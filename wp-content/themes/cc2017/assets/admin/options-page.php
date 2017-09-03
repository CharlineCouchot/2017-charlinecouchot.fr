<?php
// Déclarations des options pour la page d'options ----------
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
  		'menu_title'	=> 'Options du thème', 'cc2017',
  		'menu_slug' 	=> 'theme-general-settings',
  		'capability'	=> 'edit_posts',
  		'redirect'		=> true
  	));

  	acf_add_options_sub_page(array(
  		'page_title' 	=> 'Réglages généraux', 'cc2017',
  		'menu_title'	=> 'Général', 'cc2017',
  		'parent_slug'	=> 'theme-general-settings',
  	));
  }
?>
