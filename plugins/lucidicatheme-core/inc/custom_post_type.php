<?php

function lucidicatheme_register_post_type(){
	 
     $args = array(
         'hierarchical' => false,
         'labels' => array( 
         'name'              => esc_html_x( 'Brand', 'taxonomy general name', 'lucidicatheme' ),
         'singular_name'     => esc_html_x( 'Brand', 'taxonomy singular name', 'lucidicatheme' ),
         'search_items'      => esc_html__( 'Search Brands', 'lucidicatheme' ),
         'all_items'         => esc_html__( 'All Brands', 'lucidicatheme' ),
         'parent_item'       => esc_html__( 'Parent Brand', 'lucidicatheme' ),
         'parent_item_colon' => esc_html__( 'Parent Brand:', 'lucidicatheme' ),
         'edit_item'         => esc_html__( 'Edit Brand', 'lucidicatheme' ),
         'update_item'       => esc_html__( 'Update Brand', 'lucidicatheme' ),
         'add_new_item'      => esc_html__( 'Add New Brand', 'lucidicatheme' ),
         'new_item_name'     => esc_html__( 'New Brand Name', 'lucidicatheme' ),
         'menu_name'         => esc_html__( 'Brand', 'lucidicatheme' ),
         ),
     'show_ui' => true,
     'rewrite' => array('slug' => 'brands'),
     'query_var' => true,
     'show_in_rest' => true,
 
     );
 
     register_taxonomy('brand', array('car'), $args);
 
     unset($args);
         $args = array(
             'label' => esc_html__('Cars', 'lucidicatheme'),
             'labels' => array(
             'name'               => 'Car',
             'singular_name'      => 'Car', 
             'add_new'            => 'Add car',
             'add_new_item'       => 'Add car', 
             'edit_item'          => 'Edit car', 
             'new_item'           => 'New car', 
             'view_item'          => 'View car',
             'search_items'       => 'Find car',
             'not_found'          => 'Not found', 
             'not_found_in_trash' => 'Not found', 
             ),
             'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
             'public' => true,
             'publicly_queryable' => true,
             'show_ui' => true,
             'menu	_icon' => 'dashicons-welcome-write-blog',
             'show_in_menu' => true,
             'has_archive' => true,
             'show_in_rest' => true
         
         );
         register_post_type('car', $args);	
 
     
     }
         
 
 add_action('init', 'lucidicatheme_register_post_type');