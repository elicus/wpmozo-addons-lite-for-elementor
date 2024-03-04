<?php
defined( 'ABSPATH' ) || die( 'No script kiddies please!' );
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */
class WPMOZO_Addons_Lite_For_Elementor_Public {

	public function init() {

		add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ), 99 );
		add_action( 'elementor/widgets/register', array( $this, 'register_oembed_widget' ), 99 );
		add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_frontend_styles' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_frontend_scripts' ) );
		add_action( 'elementor/editor/before_enqueue_scripts', array( $this, 'wpmozo_ale_editor_enqueue_scripts' ) );
		$this->include_files();
	}

	public function include_files() {
		require_once __DIR__ . '/wpmozo-ale-helper-functions.php';

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
			plugins_url( 'assets/css/wpmozoicon.css', plugin_dir_path( __FILE__ ) ),
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
		wp_register_script( 'wpmozo-ale-magnify', plugins_url( 'assets/js/magnify.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-popper', plugins_url( 'assets/js/popper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-tippy', plugins_url( 'assets/js/tippy-bundle.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-move-event', plugins_url( 'assets/js/jquery_event_move.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-twenty-twenty', plugins_url( 'assets/js/jquery_twentytwenty.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-mfp', plugins_url( 'assets/js/magnificPopup.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		wp_register_script( 'wpmozo-ale-swiper', plugins_url( 'assets/js/swiper.min.js', plugin_dir_path( __FILE__ ) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

	}

	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'wpmozo',
			array(
				'title' => esc_html__( 'WPMozo', 'wpmozo-addons-lite-for-elementor-lite' ),
				'icon'  => 'fa fa-plug',
			)
		);

	}

	public function register_oembed_widget( $widgets_manager ) {
		$modules = glob( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'widgets/*', GLOB_ONLYDIR );
		if ( is_array( $modules ) && ! empty( $modules ) ) {
			$modules      = array_map( 'basename', $modules );
			$modules_list = array();
			function capitalizeAfterUnderscore( $string ) {
				$words  = explode( '_', $string );
				$result = '';

				foreach ( $words as $word ) {
					$result .= ucfirst( $word ) . '_';
				}

				// Remove the trailing underscore.
				$result = rtrim( $result, '_' );

				return $result;
			}
			foreach ( $modules as $module ) {
				$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $module ) );
				$key                  = sanitize_text_field( '\WPMOZO_ALE_' . capitalizeAfterUnderscore( strtolower( str_replace( '-', '_', $mod ) ) ) );
				$modules_list[ $key ] = esc_html( $mod );
			}
		}
		$this->include_widgets( $modules_list );
		foreach ( $modules_list as $key => $value ) {
			$widgets_manager->register( new $key() );
		}
	}

	public function include_widgets( $widgets ) {

		foreach ( $widgets as $key => $value ) {
			require_once plugin_dir_path( __DIR__ ) . '/widgets/' . $value . '/' . $value . '.php';
		}
	}

}
