<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPMOZO_Addons_Lite_For_Elementor_Public' ) ) {
	class WPMOZO_Addons_Lite_For_Elementor_Public {

		/**
		 * Initialize required files and funcitons.
		 *
		 * @since    1.0.0
		 */
		public function init() {

			$this->include_files();

		}
		/**
		 * Include file with helper funcitons.
		 *
		 * @since    1.0.0
		 */
		public function include_files() {
			require_once plugin_dir_path( __DIR__ ) . 'includes/wpmozo-helper-functions.php';

		}

		/**
		 * Register the editor styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function wpmozo_ale_editor_enqueue_scripts() {

			wp_enqueue_style(
				'wpmozo-icons',
				plugins_url( 'assets/css/wpmozoicon.min.css', plugin_dir_path( __FILE__ ) ),
				false,
				WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION
			);
		}

		/**
		 * Register the styles
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_styles() {

			wp_register_style( 'wpmozo-ale-swiper-style', plugins_url( 'assets/css/swiper.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ale-animate-style', plugins_url( 'assets/css/animate.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ale-font-awesome-style', plugins_url( 'assets/css/font-awesome.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			wp_register_style( 'wpmozo-ale-mfp-style', plugins_url( 'assets/css/magnificPopup.min.css', plugin_dir_path( __FILE__ ) ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

		}

		/**
		 * Register the scripts
		 *
		 * @since 1.0.0
		 *
		 * @access public
		 */
		public function register_frontend_scripts() {

			wp_register_script( 'wpmozo-ale-isotope', plugins_url( 'assets/js/isotope.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ale-masonry', plugins_url( 'assets/js/masonry.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_register_script( 'wpmozo-ale-magnify', plugins_url( 'assets/js/magnify.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-popper', plugins_url( 'assets/js/popper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-tippy', plugins_url( 'assets/js/tippy-bundle.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-move-event', plugins_url( 'assets/js/jquery_event_move.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-twenty-twenty', plugins_url( 'assets/js/jquery_twentytwenty.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-mfp', plugins_url( 'assets/js/magnificPopup.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			wp_register_script( 'wpmozo-ale-swiper', plugins_url( 'assets/js/swiper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		}

		/**
		 * Add category for widgets.
		 *
		 * @since    1.0.0
		 */
		public function add_elementor_widget_categories( $elements_manager ) {

			$elements_manager->add_category(
				'wpmozo',
				array(
					'title' => esc_html__( 'WPMozo', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'fa fa-plug',
				)
			);
		}

		/**
		 * Register widgets.
		 *
		 * @since    1.0.0
		 */
		public function register_oembed_widget( $widgets_manager ) {
			global $pro_version;
			$plugin_option = get_option( 'wpmozo-addons-for-elementor' );

			if ( false !== $plugin_option && false !== $pro_version ) {
				$modules = array_map( 'basename', explode( ',', $plugin_option['wpmozo_widgets'] ) );

				if ( ! empty( $modules ) && is_array( $modules ) ) {
					$modules_list = array();
					foreach ( $modules as $module ) {
						$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $module ) );
						$key                  = '\WPMOZO_AE_' . ucwords( strtolower( str_replace( '-', '_', $mod ) ) );
						$modules_list[ $key ] = esc_html( $mod );
					}
					$this->include_widgets( $modules_list );
					foreach ( $modules_list as $key => $value ) {
						$widgets_manager->register( new $key() );
					}
				}
			} else {

				$widgets_path = plugin_dir_path( __DIR__ ) . '/widgets/';
				$modules      = glob( $widgets_path . '*', GLOB_ONLYDIR );

				if ( ! empty( $modules ) ) {
					foreach ( $modules as $module ) {
						$module_name = basename( $module );
						$class_name  = 'WPMOZO_AE_' . str_replace( '-', '_', ucwords( $module_name, '-' ) );
						require_once $module . '/' . $module_name . '.php';
						$widgets_manager->register( new $class_name() );
					}
				}
			}
		}
		/**
		 * Include widget files.
		 *
		 * @since    1.0.0
		 */
		public function include_widgets( $widgets ) {
			foreach ( $widgets as $key => $value ) {
				$widget_path = plugin_dir_path( __DIR__ ) . '/widgets/' . $value . '/' . $value . '.php';
				if ( file_exists( $widget_path ) ) {
					require_once $widget_path;
				}
			}
		}
	}
}
