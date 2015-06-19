<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://mahfuzulhasan.com
 * @since             1.0.0
 * @package           Wp_Dropkick
 *
 * @wordpress-plugin
 * Plugin Name:       WP dropkick
 * Plugin URI:        https://wordpress.org/plugins/wp-dropkick/
 * Description:       Integrates <a href="http://robdel12.github.io/DropKick/">Dropkick</a> with WordPress. Developed by <a href="http://mahfuzulhasan.com/" target="_blank">Mahfuzul Hasan</a>, <a href="http://fmturjo.wordpress.com/" target="_blank">Faysal Mahamud</a>.
 * Version:           1.0.0
 * Author:            Mahfuzul Hasan
 * Author URI:        http://mahfuzulhasan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-dropkick
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-dropkick-activator.php
 */
function activate_wp_dropkick() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dropkick-activator.php';
	Wp_Dropkick_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-dropkick-deactivator.php
 */
function deactivate_wp_dropkick() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dropkick-deactivator.php';
	Wp_Dropkick_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_dropkick' );
register_deactivation_hook( __FILE__, 'deactivate_wp_dropkick' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-dropkick.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_dropkick() {

	$plugin = new Wp_Dropkick();
	$plugin->run();

}
run_wp_dropkick();

define( 'WP_DROPKICK_URL',        plugin_dir_url( __FILE__ ) );
define( 'WP_DROPKICK_PATH',       dirname( __FILE__ ) . '/' );
