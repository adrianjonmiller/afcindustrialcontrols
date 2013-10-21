<?php

/**
 * Generates custom content types for AFC
 */

function create_custom_content_types()
{
/* Product
 -----------------------------------------------------------------------------*/
	
	$product_labels = array(
		'name' => _x('Products', 'post type general name'),
		'singular_name' => _x('Product', 'post type singular name'),
		'add_new' => _x('Add New', 'Product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product'),
		'new_item' => __('New Product'),
		'view_item' => __('View Product'),
		'search_items' => __('Search product'),
		'not_found' =>  __('No products found'),
		'not_found_in_trash' => __('No products flagged for deletion'), 
		'parent_item_colon' => '',
		'menu_name' => 'Products'
	);
	
	$product_args = array(
		'labels' => $product_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'show_in_menu' => true, 
		'query_var' => true,
		'rewrite' => array('slug' => 'products', 'with_front' => false),
		'capability_type' => 'post',
		'has_archive' => true, 
		'hierarchical' => false,
		//'menu_position' => 20,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type('products', $product_args);

}
add_action('init', 'create_custom_content_types');

// Add featured images to content types
add_theme_support('post-thumbnails', array('product','post'));