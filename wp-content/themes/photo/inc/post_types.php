<?php

// Register Custom Post Type
function projects() {

	$labels = array(
		'name'                  => 'Projects',
		'singular_name'         => 'Project',
		'menu_name'             => 'Projects',
		'name_admin_bar'        => 'Projects',
		'archives'              => 'Projects Archives',
		'attributes'            => 'Projects Attributes',
		'parent_item_colon'     => 'Parent Project:',
		'all_items'             => 'All Projects',
		'add_new_item'          => 'Add New Project',
		'add_new'               => 'Add New',
		'new_item'              => 'New Project',
		'edit_item'             => 'Edit Project',
		'update_item'           => 'Update Project',
		'view_item'             => 'View Project',
		'view_items'            => 'View Projects',
		'search_items'          => 'Search Projects',
		'not_found'             => 'Projects',
		'not_found_in_trash'    => 'Projects Not found in Trash',
		'featured_image'        => 'Featured Project Image',
		'set_featured_image'    => 'Set projects featured image',
		'remove_featured_image' => 'Remove Project featured image',
		'use_featured_image'    => 'Use as featured project image',
		'insert_into_item'      => 'Insert into project',
		'uploaded_to_this_item' => 'Project',
		'items_list'            => 'Projects list',
		'items_list_navigation' => 'Projects list navigation',
		'filter_items_list'     => 'Filter projects list',
	);

	$args = array(
		'label'                 => 'Project',
		'description'           => 'Project Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'post-formats' ),
		'taxonomies'            => ['project-categories'],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-tablet',
	);
	register_post_type( 'projects', $args );

}
add_action( 'init', 'projects', 0 );





// Register Custom Taxonomy
function project_categories() {

	$labels = array(
		'name'                       => 'project categories',
		'singular_name'              => 'project categorie',
		'menu_name'                  => 'Project Categories',
		'all_items'                  => 'All Items',
		'parent_item'                => 'Parent Item',
		'parent_item_colon'          => 'Parent Item:',
		'new_item_name'              => 'New Project Categorie Name',
		'add_new_item'               => 'Add New Item',
		'edit_item'                  => 'Edit Item',
		'update_item'                => 'Update Item',
		'view_item'                  => 'View Item',
		'separate_items_with_commas' => 'Separate items with commas',
		'add_or_remove_items'        => 'Add or remove items',
		'choose_from_most_used'      => 'Choose from the most used',
		'popular_items'              => 'Popular Items',
		'search_items'               => 'Search Items',
		'not_found'                  => 'Not Found',
		'no_terms'                   => 'No items',
		'items_list'                 => 'Items list',
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
	register_taxonomy( 'project-categories', array( 'projects' ), $args );

}
add_action( 'init', 'project_categories', 0 );