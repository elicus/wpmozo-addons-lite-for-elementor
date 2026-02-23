<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.2
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
if ( ! class_exists( 'WPMOZO_AE_Svg_Animator' ) ) {
	class WPMOZO_AE_Svg_Animator extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_svg_animator';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'SVG Animator', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz svg animator', 'wpmozo svg animator' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-svg-animator wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-svg-animator-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-svg-animator-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since  1.1.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-svg-animator', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-svg-animator' );
		}

		/**
		 * Register widget controls.s
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.1.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'svg-animator/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.1.0
		 * @access protected
		 */
		protected function render() {
			$settings  = $this->get_settings_for_display();
			$widget_id = $this->get_id();

			$svg_image = ! empty( $settings['svg_image']['url'] ) ? esc_url( $settings['svg_image']['url'] ) : '';

			$animation_type   = ! empty( $settings['animation_type'] ) ? $settings['animation_type'] : 'delayed';
			$animation_time   = ! empty( $settings['animation_time']['size'] ) ? intval( $settings['animation_time']['size'] ) : 1000;
			$animation_curves = ! empty( $settings['animation_curves'] ) ? $settings['animation_curves'] : 'linear';

			$re_animate_on_click = ( isset( $settings['re_animate_on_click'] ) && 'yes' === $settings['re_animate_on_click'] ) ? 'on' : 'off';

			if ( empty( $svg_image ) ) {
				return;
			}

			// Try fetching SVG content.
			$svg_content = wpmozo_get_svg_content( $svg_image );

			if ( empty( $svg_content ) ) {
				return;
			}

			?>
		
			<div id="wpmozo-svg-anim-<?php echo esc_attr( $widget_id ); ?>"
				class="wpmozo_svg_animator_wrapper"
				data-svg_anim_type="<?php echo esc_attr( $animation_type ); ?>"
				data-svg_anim_duration="<?php echo esc_attr( $animation_time ); ?>"
				data-svg_anim_curves="<?php echo esc_attr( $animation_curves ); ?>"
				data-re_animate_on_click="<?php echo esc_attr( $re_animate_on_click ); ?>">
				<div class="wpmozo_svg_animator_inner">
					<?php echo $svg_content; ?>
				</div>
			</div>
			<?php
		}
	}
	/**
	 * Retrieve SVG file contents from URL.
	 *
	 * @param string $svg_file SVG file URL.
	 * @return string
	 */
	if ( ! function_exists( 'wpmozo_get_svg_content' ) ) {
		function wpmozo_get_svg_content( $svg_file ) {
			if ( empty( $svg_file ) ) {
				return '';
			}
			if ( strpos( $svg_file, '.svg' ) === false ) {
				return '';
			}
			if ( ini_get( 'allow_url_fopen' ) ) {
				$context = array();
				if ( strpos( $svg_file, 'https://' ) === 0 ) {
					$context = array(
						'ssl' => array(
							'verify_peer'      => false,
							'verify_peer_name' => false,
						),
					);
				}
				$content = @file_get_contents(
					$svg_file,
					false,
					stream_context_create( $context )
				);
				if ( false !== $content ) {
					return $content;
				}
			}

			$response = wp_remote_get(
				$svg_file,
				array(
					'timeout'   => 10,
					'sslverify' => false,
				)
			);

			if ( is_wp_error( $response ) ) {
				return '';
			}

			return wp_remote_retrieve_body( $response );
		}
	}
}