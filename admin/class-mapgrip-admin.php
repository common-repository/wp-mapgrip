<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    MapGrip
 * @subpackage MapGrip/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MapGrip
 * @subpackage MapGrip/admin
 * @author     Your Name <email@example.com>
 */
class MapGrip_Admin {

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
	 * @param      string    $mapgrip       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $mapgrip, $version ) {

		$this->mapgrip = $mapgrip;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->mapgrip, plugin_dir_url( __FILE__ ) . 'css/mapgrip-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->mapgrip, plugin_dir_url( __FILE__ ) . 'js/mapgrip-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function mg_add_pages() {

		$icon = "dashicons-location-alt";
	    // Add a new top-level menu (ill-advised):
	    add_menu_page(__('MAPGrip','mapgrip-menu'), __('MAPGrip','mapgrip-menu'), 'manage_options', 'mg-mapgrip-menu', array($this, 'mg_main'), $icon );

	    // Add a second submenu to the custom top-level menu:
	   // add_submenu_page('mg-mapgrip-menu', __('Settings','mapgrip-menu'), __('Settings','mapgrip-menu'), 'manage_options', 'mg-settings', 'mg_sublevel_page2');
	}

	public function mg_main(){

		$height 	= get_option('mapgrip_height') ?: 450;
		$width 		= get_option('mapgrip_width') ?: 600;
	    
	    $html = '<div class="wrap">
					<h2>WP MAPGrip<br>
					<small>
						Help your community discover amazing places with MAPGrip
					</small>
					</h2>

					<div id="col-container">
						<div id="col-left">
							<div class="wrap panel-white">
								<h3>MAPGrip require an API key to function</h3>
			
								<p>To activate the map please follow these steps:</p>
								<ol>
									<li>
										<a target="_BLANK" href="http://map.mapgrip.com/register" class="">Register to MAPGrip if not yet a member (free)</a>
									</li>
									<li>
										Paste your API key here and press save:
										<div class="form-wrap">
											<form id="addtag" method="post" action="'.admin_url('admin-post.php').'" class="validate" _lpchecked="1">
												<input type="hidden" name="action" value="update_data_options">
												'.wp_nonce_field( 'map_grip_update_data', 'map_grip_api_form' ).'
												<input name="mapgrip_grant_type" type="hidden" value="password" size="40" aria-required="true" required>
												<div class="form-field form-required term-name-wrap" style="display: none">
													<label for="tag-name">User Name</label>
													<input name="mapgrip_user_name" type="hidden" value="'.get_option('mapgrip_user_name').'" size="40" aria-required="true" required>
												</div>
												<div class="form-field form-required term-name-wrap" style="display: none">
													<label for="tag-name">Password</label>
													<input name="mapgrip_password" type="hidden"  value="'.get_option('mapgrip_password').'" size="40" aria-required="true" required>
												</div>
												<div class="form-field form-required term-name-wrap">
													<label for="tag-name">API Key (Client ID)</label>
													<input name="mapgrip_client_id" type="text" value="'.get_option('mapgrip_client_id').'" size="40" aria-required="true" required>
												</div>
												<div class="form-field form-required term-name-wrap">
													<label for="tag-name">Map Title</label>
													<input name="mapgrip_title" type="text" value="'.get_option('mapgrip_title').'" size="5" placeholder="Map title">
												</div>
												<div class="form-field form-required term-name-wrap">
													<label for="tag-name">Map Subtitle</label>
													<input name="mapgrip_subtitle" type="text" value="'.get_option('mapgrip_subtitle').'" size="5" >
												</div>
												<div class="form-field form-required term-name-wrap">
													<label for="tag-name">Map Width</label>
													<input name="mapgrip_width" type="text" placeholder="px or %" value="'.$width.'" size="5" aria-required="true" required>
												</div>
												<div class="form-field form-required term-name-wrap">
													<label for="tag-name">Map Height</label>
													<input name="mapgrip_height" type="text"  placeholder="px or %"  value="'.$height.'" size="5" aria-required="true" required>
												</div>
												<p class="submit">
													<input type="submit" name="submit" id="submit" class="button button-primary" value="Save & Connect">
												</p>
											</form>
										</div>
									</li>
								</ol>
								<p><em>Use <strong>[map_grip]</strong> shortcode to display map in your page.
								</em></p>
							</div>
						</div>

						<div id="col-right">
							<div class="wrap">
							'.$this->generate_map().'
							</div>
						</div>

					</div>
				';
// https://www.google.com/maps/embed/v1/place?key=AIzaSyA0BdqztRf8eeus-ZFUMsm5xRBCFX5M6QI&q=Space+Needle,Seattle+WA

		echo $html;
	}

	public function update_data_options() { 

		if(isset( $_POST['map_grip_api_form'] ) && wp_verify_nonce( $_POST['map_grip_api_form'], 'map_grip_update_data' )){

			update_option( 'mapgrip_user_name', sanitize_text_field($_POST['mapgrip_user_name']));
			update_option( 'mapgrip_password', sanitize_text_field($_POST['mapgrip_password']));
			update_option( 'mapgrip_grant_type', sanitize_text_field($_POST['mapgrip_grant_type']));
			update_option( 'mapgrip_client_id', sanitize_text_field($_POST['mapgrip_client_id']));
			// update_option( 'mapgrip_secret_token', sanitize_text_field($_POST['mapgrip_secret_token']));
			update_option( 'mapgrip_width', sanitize_text_field($_POST['mapgrip_width']));
			update_option( 'mapgrip_height', sanitize_text_field($_POST['mapgrip_height']));
			update_option( 'mapgrip_title', sanitize_text_field($_POST['mapgrip_title']));
			update_option( 'mapgrip_subtitle', sanitize_text_field($_POST['mapgrip_subtitle']));

			//connect to API
			// $this->api_connect();

			echo '<div class="updated notice">
					<p>Settings successfully updated!</p>
				</div>';
		}else{
			echo '<div class="error notice">
					<p>Sorry, your nonce was not correct. Please try again.</p>
				</div>';
		}

		// update_option( 'mapgrip_user_name', "Test Ire" );
		wp_redirect(admin_url('admin.php?page=mg-mapgrip-menu'));

		// exit; 
	}

	public function generate_map() {

		$mapgrip_client_id = get_option('mapgrip_client_id');
		// $mapgrip_auth_token = get_option('mapgrip_auth_token');

		if($mapgrip_client_id){

			$height 	= get_option('mapgrip_height') ?: 450;
			$width 		= get_option('mapgrip_width') ?: 600;
			$title 		= get_option('mapgrip_title') ?: "";
			$subtitle 	= get_option('mapgrip_subtitle') ?: "";
			$embed_url 	= get_option('mapgrip_embed_url').'?client_id='.$mapgrip_client_id;


			return '<div class="clearfix">
					'.($title ? '<h2 class="mapgrip_title">'.$title.'</h2>' : '').'
					'.($subtitle ? '<p class="mapgrip_subtitle">'.$subtitle.'</p>' : '').'
					<iframe
					  width="'.$width.'"
					  height="'.$height.'"
					  frameborder="0" style="border:0"
					  src="'.$embed_url.'" allowfullscreen>
					</iframe>
					</div>';

		}else{

			if(!get_option('mapgrip_client_id')){
				return  '<div class="clearfix"><span>Connect to MAPGrip to activate map.</span>';
			}
			return '<div class="clearfix"><span>Oops! Unable to connect to MAPGrip Server.</span>';
		}
		

	}

	public function api_connect() {

		$args = array(
			'client_id' 	=> get_option('mapgrip_client_id'),
			'client_secret'	=> get_option('mapgrip_secret_token'),
			'grant_type'	=> 'password',
			'username'		=> get_option('mapgrip_user_name'),
			'password'		=> get_option('mapgrip_password')
		);

		$response 	= wp_remote_post(get_option('mapgrip_api_url').'oauth/token', array('body' => $args));
		$body 		= json_decode($response['body']);

		if($body->access_token){

			update_option('mapgrip_auth_token', $body->access_token);
			// setcookie('mapgrip_auth_token', 
			// 		$body->access_token, 
			// 		(int) $body->expired_in, 
			// COOKIEPATH, COOKIE_DOMAIN );
		}

		// $this->mapgrip_login($_COOKIE['mapgrip_auth_token']);

		// return $_COOKIE['mapgrip_auth_token'];
		// return $_COOKIE['mapgrip_auth_token'];
		// var_dump( $_COOKIE['mapgrip_auth_token']);
		// die;
	}

	public function mapgrip_login($mapgrip_auth_token) {

		//mapgrip_api_url = https://mapgrip.idalo.io/map
		$args = array(
			'email' 	=> get_option('mapgrip_user_name'),
			'password'	=> get_option('mapgrip_password')
		);

		$response 	= wp_remote_post(get_option('mapgrip_api_url').'api/v1/login', array(
			'body' => $args,
			'headers'	=> array(
		        'Authorization' => 'Bearer ' . $mapgrip_auth_token,
		    ),
		));

		// var_dump($response);
		// even if i "die" here it will still redirect to https://mapgrip.idalo.io/map and it does not create the webapp's php session
		// die;
		return;


	}
}
