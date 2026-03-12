<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.2
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Alert_Box' ) ) {
	class WPMOZO_AE_Alert_Box extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_alert_box';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Alert Box', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz alert box', 'wpmozo alert box' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-alert-box wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.3.0
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
		 * @since 1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-alert-box-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-alert-box-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-alert-box-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-alert-box-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'alert-box/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings            = $this->get_settings_for_display();
			$alert_title         = isset( $settings['alert_title'] ) ? $settings['alert_title'] : '';
			$alert_description   = isset( $settings['alert_description'] ) ? $settings['alert_description'] : '';
			$use_alert_box_image = 'yes' === $settings['use_alert_box_image'] ? 'wpmozo_used_image' : '';
			$alert_box_image     = isset( $settings['alert_box_image']['url'] ) ? $settings['alert_box_image']['url'] : '';
			$alert_box_image_alt = isset( $settings['alert_box_image_alt'] ) ? $settings['alert_box_image_alt'] : '';
			$layout              = esc_attr( $settings['layout'] );
			$layout              = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2' ) );
			$title_heading_level = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$show_close_button   = 'yes' === $settings['show_close_button'] ? 'yes' : '';
			$show_alert_button   = 'yes' === $settings['show_alert_button'] ? 'yes' : '';
			$button_text         = isset( $settings['button_text'] ) ? $settings['button_text'] : '';
			$button_url          = isset( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

			?>
			<div class="wpmozo_alert_box">
				<div class="wpmozo_alert_box_wrapper <?php echo esc_attr( $layout ); ?> icon_<?php echo esc_attr( $settings['button_icon_placement'] ); ?>">
				<?php
					$layout_file = plugin_dir_path( __DIR__ ) . "alert-box/assets/layouts/{$layout}.php";

				if ( file_exists( $layout_file ) ) {
					include $layout_file;
				}
				?>
				</div>
			</div>
			<?php
		}
	}
}
