<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://thepixeltribe.com
 * @since      1.0.0
 *
 * @package    Understrap_portfolio
 * @subpackage Understrap_portfolio/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Understrap_portfolio
 * @subpackage Understrap_portfolio/includes
 * @author     Denis Bosire <denischweya@gmail.com>
 */

class Pro_Portfolio_Functions {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	protected $plugin_name;


function portfolio_register_cpts() {

	/**
	 * Post Type: Portfolio.
	 */

	$labels = array(
		"name" => __( "Portfolio", "custom-post-type-ui" ),
		"singular_name" => __( "Portfolio", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Portfolio", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "portfolio", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => plugin_dir_url( __DIR__ ) . 'public/icons/gallery.png',
		"supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
		"taxonomies" => array( "project_type" ),
	);

	register_post_type( "portfolio", $args );
}


function portfolio_register_taxes() {

	/**
	 * Taxonomy: Project Types.
	 */

	$labels = array(
		"name" => __( "Project Types", "custom-post-type-ui" ),
		"singular_name" => __( "Project Type", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Project Types", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'project_type', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "project_type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "project_type", array( "portfolio" ), $args );
}



	function add_img_column($columns) {
	  $columns = array_slice($columns, 0, 2, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
	  return $columns;
	}

	function manage_img_column($column_name, $post_id) {
	 if( $column_name == 'img' ) {
	  echo get_the_post_thumbnail($post_id, 'thumbnail');
	 }
	 return $column_name;
}


function portfolio_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		array(
			'name'      => 'Block Gallery',
			'slug'      => 'block-gallery',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'pro-portfolio',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	
	);

	tgmpa( $plugins, $config );
}


}