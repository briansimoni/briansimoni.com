<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.codeui.io
 * @since             1.0.0
 * @package           Post_Share
 *
 * @wordpress-plugin
 * Plugin Name:       PostShare
 * Plugin URI:        www.codeui.io
 * Description:       This plugin was build to help team members of code ui collaborate on different posts.
 * Version:           1.0.0
 * Author:            Nicholas Bellucci
 * Author URI:        www.codeui.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       post-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-post-share-activator.php
 */
function activate_post_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-share-activator.php';
	Post_Share_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-post-share-deactivator.php
 */
function deactivate_post_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-post-share-deactivator.php';
	Post_Share_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_post_share' );
register_deactivation_hook( __FILE__, 'deactivate_post_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-post-share.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_post_share() {

	$plugin = new Post_Share();
	$plugin->run();

}
run_post_share();
