<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thepixeltribe.com
 * @since             1.0.0
 * @package           Understrap_portfolio
 *
 * @wordpress-plugin
 * Plugin Name:       Understrap Portfolio
 * Plugin URI:        https://thepixeltribe.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Denis Bosire
 * Author URI:        https://thepixeltribe.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       understrap_portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'UNDERSTRAP_PORTFOLIO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-understrap_portfolio-activator.php
 */
function activate_understrap_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-understrap_portfolio-activator.php';
	Understrap_portfolio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-understrap_portfolio-deactivator.php
 */
function deactivate_understrap_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-understrap_portfolio-deactivator.php';
	Understrap_portfolio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_understrap_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_understrap_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-understrap_portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_understrap_portfolio() {

	$plugin = new Understrap_portfolio();
	$plugin->run();

}
run_understrap_portfolio();
