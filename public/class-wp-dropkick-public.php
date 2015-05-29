<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://mahfuzulhasan.com
 * @since      1.0.0
 *
 * @package    Wp_Dropkick
 * @subpackage Wp_Dropkick/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Dropkick
 * @subpackage Wp_Dropkick/public
 * @author     Mahfuzul Hasan <mha.cse@gmail.com>
 */
class Wp_Dropkick_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
		add_action( 'wp_footer', array($this, 'wp_dorpkick_js') );

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
		 * defined in Wp_Dropkick_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Dropkick_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-dropkick-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		$selectors     		= esc_attr( get_option('dropkick_jquery_selectors') );
		$mobile_support		= esc_attr( get_option('dropkick_mobile_device_support') );
		// $ie8_support   		= esc_attr( get_option('dropkick_ie8_support') );
		$ui_theme      		= 'default';

		//
		if ($ui_theme == 'default') {
			wp_enqueue_style( $this->plugin_name, WP_DROPKICK_URL . 'DropKick/css/dropkick.css', array(), $this->version, 'all' );
		}
		else {
			wp_enqueue_style( $this->plugin_name, WP_DROPKICK_URL . 'DropKick/css/dropkick-classic.css', array(), $this->version, 'all' );
		}

		// Add dropkick.js
		wp_enqueue_script( $this->plugin_name, WP_DROPKICK_URL . 'DropKick/dropkick.js', array( 'jquery' ), $this->version, false );

		// if ($ie8_polyfill) {
		//   wp_enqueue_script( $this->plugin_name, WP_DROPKICK_URL . 'DropKick/js/ie8-polyfill.js', array( 'jquery' ), $this->version, false );
		// }

		// wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-dropkick-public.js', array( 'jquery' ), $this->version, false );

	}

	public function wp_dorpkick_js() {
		$data = Wp_Dropkick_Admin::wp_dropkick_settings_data();

		$js = '';

		$js = '<script>';
		$js .= '$(function($) { $( "'. $data['selectors'] .'" ).dropkick({ mobile: true }); })( jQuery );';
		$js .= '</script>';

		echo $js;

	}

}
