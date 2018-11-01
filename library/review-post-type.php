<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
    flush_rewrite_rules();
}

// let's create the function for the custom type
function review_post_type() {
	// creating (registering) the custom type 
	register_post_type( 'review_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Reviews', 'bonestheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Review', 'bonestheme' ), /* This is the individual type */
			'all_items' => __( 'All Reviews', 'bonestheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Review', 'bonestheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Reviews', 'bonestheme' ), /* Edit Display Title */
			'new_item' => __( 'New Review', 'bonestheme' ), /* New Display Title */
			'view_item' => __( 'View Review', 'bonestheme' ), /* View Display Title */
			'search_items' => __( 'Search Reviews', 'bonestheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'A Curry Congress review', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'reviews', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'reviews', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'review_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'review_type' );
	
}

	// adding the function to the Wordpress init
	add_action( 'init', 'review_post_type');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add custom categories (these act like categories)
	register_taxonomy( 'review_cat',
		array('review_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Review Categories', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Review Category', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Review Categories', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Review Categories', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Review Category', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Review Category:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Review Category', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Review Category', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Review Category', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Review Category Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true, 
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'review-category' ),
		)
	);
	
	// now let's add custom tags (these act like categories)
	register_taxonomy( 'review_tag',
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Review Tags', 'bonestheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Review Tag', 'bonestheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Review Tags', 'bonestheme' ), /* search title for taxomony */
				'all_items' => __( 'All Review Tags', 'bonestheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Review Tag', 'bonestheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Review Tag:', 'bonestheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Review Tag', 'bonestheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Review Tag', 'bonestheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Review Tag', 'bonestheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Review Tag Name', 'bonestheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);
	
	/*
		looking for custom meta boxes?
		check out this fantastic tool:
		https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
	*/
	

?>
