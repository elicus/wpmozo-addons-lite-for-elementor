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
use Elementor\Core\Utils\Svg\Svg_Sanitizer;
if ( ! class_exists( 'WPMOZO_AE_Scrolling_Svg' ) ) {
	class WPMOZO_AE_Scrolling_Svg extends Widget_Base {
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
			return 'wpmozo_ae_scrolling_svg';
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
			return esc_html__( 'Scrolling SVG', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz scrolling svg', 'wpmozo scrolling svg' );
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
			return 'wpmozo-ae-icon-scrolling-svg wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-scrolling-svg-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scrolling-svg-style' );
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
			wp_register_script( 'wpmozo-ae-scrolling-svg', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-scrolling-svg' );
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
			require plugin_dir_path( __DIR__ ) . 'scrolling-svg/assets/controls/controls.php';
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

			$re_animate_on_click = ( isset( $settings['re_animate_on_click'] ) && 'yes' === $settings['re_animate_on_click'] ) ? 'on' : 'off';

			if ( empty( $svg_image ) ) {
				return;
			}

			// Try fetching SVG content.
			$svg_content = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_get_svg_content( $svg_image );

			if ( empty( $svg_content ) ) {
				return;
			}
			?>
		
			<div id="wpmozo_scrolling_svg-<?php echo esc_attr( $widget_id ); ?>"
				class="wpmozo_scrolling_svg_wrapper"
				data-re_animate_on_click="<?php echo esc_attr( $re_animate_on_click ); ?>">
				<div class="wpmozo_scrolling_svg_inner">
					<?php
						$svg_html = ( new Svg_Sanitizer() )->sanitize( $svg_content );
						echo $svg_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</div>
			</div>
			<?php
		}
	}
}