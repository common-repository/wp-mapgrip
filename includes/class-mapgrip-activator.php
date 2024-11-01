<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    MapGrip
 * @subpackage MapGrip/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    MapGrip
 * @subpackage MapGrip/includes
 * @author     Your Name <email@example.com>
 */
class MapGrip_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		// add API url
		update_option( 'mapgrip_api_url', sanitize_text_field('http://map.mapgrip.com/map'));
		update_option( 'mapgrip_embed_url', sanitize_text_field('http://map.mapgrip.com/embed'));
		update_option( 'mapgrip_width', 700);
		update_option( 'mapgrip_height', 600);

	}

}
