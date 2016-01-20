<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://flexperception.com
 * @since      1.0.0
 *
 * @package    Tec_Facebook_Events_Importer_Show_Facebook_Url
 * @subpackage Tec_Facebook_Events_Importer_Show_Facebook_Url/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Tec_Facebook_Events_Importer_Show_Facebook_Url
 * @subpackage Tec_Facebook_Events_Importer_Show_Facebook_Url/includes
 * @author     Seth Miller <seth@flexperception.com>
 */
class Tec_Facebook_Events_Importer_Show_Facebook_Url_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'tec-facebook-events-importer-show-facebook-url',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
