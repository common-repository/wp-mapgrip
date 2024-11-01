<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.mapgrip.com/
 * @since      1.0.0
 *
 * @package    MapGrip
 * @subpackage MapGrip/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    MapGrip
 * @subpackage MapGrip/public
 * @author     Your Name <email@example.com>
 */
class MapGrip_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $mapgrip    The ID of this plugin.
	 */
	private $mapgrip;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $mapgrip       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $mapgrip, $version ) {

		$this->mapgrip = $mapgrip;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MapGrip_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MapGrip_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->mapgrip, plugin_dir_url( __FILE__ ) . 'css/mapgrip-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in MapGrip_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The MapGrip_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->mapgrip, plugin_dir_url( __FILE__ ) . 'js/mapgrip-public.js', array( 'jquery' ), $this->version, false );

	}

	public function map_grip_shortcode($atts, $content = ""){

		$plugin = new MapGrip();
		$plugin_admin = new MapGrip_Admin( $plugin->get_mapgrip(), $plugin->get_version() );

		return $plugin_admin->generate_map();
		// $height = get_option('mapgrip_height') ?: 450;
		// $width = get_option('mapgrip_width') ?: 600;

  //       return '
  //       	<i>This is an example map using Google Maps Embed API. We will replace with MapGrip Embed once ready.</i>
		// 	<iframe
		// 	  width="'.$width.'"
		// 	  height="'.$height.'"
		// 	  frameborder="0" style="border:0"
		// 	  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0BdqztRf8eeus-ZFUMsm5xRBCFX5M6QI
		// 	    &q=Space+Needle,Seattle+WA" allowfullscreen>
		// 	</iframe>
  //       ';
    }

}
