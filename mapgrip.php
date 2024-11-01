<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           MapGrip
 *
 * @wordpress-plugin
 * Plugin Name:       WP MAPGrip
 * Plugin URI:        http://www.mapgrip.com/
 * Description:       Help your community discover amazing places with MAPGrip
 * Version:           1.0.2
 * Author:            Maplinc Pty Ltd
 * Author URI:        http://www.maplinc.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mapgrip
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MAPGRIP_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mapgrip-activator.php
 */
function activate_mapgrip() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mapgrip-activator.php';
	MapGrip_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mapgrip-deactivator.php
 */
function deactivate_mapgrip() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mapgrip-deactivator.php';
	MapGrip_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mapgrip' );
register_deactivation_hook( __FILE__, 'deactivate_mapgrip' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mapgrip.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mapgrip() {

	$plugin = new MapGrip();
	$plugin->run();

	$loader = $plugin->get_loader();
	// var_dump($loader);
}



run_mapgrip();
