<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://flexperception.com
 * @since             1.0.0
 * @package           Tec_Facebook_Events_Importer_Show_Facebook_Url
 *
 * @wordpress-plugin
 * Plugin Name:       The Events Calendar - Facebook Events add-on - Show FB URL
 * Plugin URI:        http://flexperception.com/tec-facebook-events-importer-show-facebook-url
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Seth Miller
 * Author URI:        http://flexperception.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tec-facebook-events-importer-show-facebook-url
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tec-facebook-events-importer-show-facebook-url-activator.php
 */
function activate_tec_facebook_events_importer_show_facebook_url() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tec-facebook-events-importer-show-facebook-url-activator.php';
	Tec_Facebook_Events_Importer_Show_Facebook_Url_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tec-facebook-events-importer-show-facebook-url-deactivator.php
 */
function deactivate_tec_facebook_events_importer_show_facebook_url() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tec-facebook-events-importer-show-facebook-url-deactivator.php';
	Tec_Facebook_Events_Importer_Show_Facebook_Url_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tec_facebook_events_importer_show_facebook_url' );
register_deactivation_hook( __FILE__, 'deactivate_tec_facebook_events_importer_show_facebook_url' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tec-facebook-events-importer-show-facebook-url.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tec_facebook_events_importer_show_facebook_url() {

	$plugin = new Tec_Facebook_Events_Importer_Show_Facebook_Url();
	$plugin->run();

}
run_tec_facebook_events_importer_show_facebook_url();

/**
 * Return Facebook Event link any time we look for The Events Calendar Event URL
 **/
add_filter( 'tribe_get_event_website_url', 'event_website_use_fb_event_url', 10, 2 );
function event_website_use_fb_event_url( $url, $id ) {
        $fb_id = get_post_meta( $id, '_FacebookID', true );
        if ( empty( $fb_id ) ) return $url;
        return esc_url( 'http://facebook.com/events/' . $fb_id );
}
