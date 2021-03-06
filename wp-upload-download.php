<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.appignition.com/
 * @since             1.0.0
 * @package           Wp_Upload_Download
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Upload Download
 * Plugin URI:        https://github.com/suehaas/wp-upload-download
 * Description:       A simple plugin that allows admins to upload files and for users to download them from a page on your WordPress site.
 * Version:           1.0.0
 * Author:            Sue Haas
 * Author URI:        http://www.appignition.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-upload-download
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-upload-download-activator.php
 */
function activate_wp_upload_download() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-upload-download-activator.php';
	Wp_Upload_Download_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-upload-download-deactivator.php
 */
function deactivate_wp_upload_download() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-upload-download-deactivator.php';
	Wp_Upload_Download_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_upload_download' );
register_deactivation_hook( __FILE__, 'deactivate_wp_upload_download' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-upload-download.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_upload_download() {

	$plugin = new Wp_Upload_Download();
	$plugin->run();

}
run_wp_upload_download();
