<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://mahfuzulhasan.com
 * @since      1.0.0
 *
 * @package    Wp_Dropkick
 * @subpackage Wp_Dropkick/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Dropkick
 * @subpackage Wp_Dropkick/admin
 * @author     Mahfuzul Hasan <mha.cse@gmail.com>
 */
class Wp_Dropkick_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

    add_action( 'admin_menu', array($this, 'wp_dropkick_admin_menu') );
    add_action( 'admin_init', array($this, 'wp_dropkick_settings') );

	}

  public static function wp_dropkick_admin_menu() {
    //create new top-level menu
    add_menu_page('WP DropKick', 'WP DropKick', 'administrator', 'wp-dropkick', array('Wp_Dropkick_Admin', 'wp_dropkick_setting_page'),'');
  }

  public static function wp_dropkick_setting_page() {
    include 'partials/wp-dropkick-admin-display.php';
  }

  public static function wp_dropkick_settings() {
    //register our settings
    register_setting( 'wp_dropkick_settings', 'dropkick_jquery_selectors');
    register_setting( 'wp_dropkick_settings', 'dropkick_mobile_device_support');
    register_setting( 'wp_dropkick_settings', 'dropkick_ie8_support');
  }

  public static function wp_dropkick_settings_data() {
    $data = array();

    $data['selectors']         = esc_attr( get_option('dropkick_jquery_selectors') );
    $data['mobile_support']    = esc_attr( get_option('dropkick_mobile_device_support') );
    $data['ie8_support']       = esc_attr( get_option('dropkick_ie8_support') );

    return $data;
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
		 * defined in Wp_Dropkick_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dropkick_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-dropkick-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wp_Dropkick_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dropkick_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-dropkick-admin.js', array( 'jquery' ), $this->version, false );

	}

}
