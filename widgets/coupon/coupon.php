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

if ( ! class_exists( 'WPMOZO_AE_Coupon' ) ) {
	class WPMOZO_AE_Coupon extends Widget_Base {
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
			return 'wpmozo_ae_coupon';
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
			return esc_html__( 'Coupon', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz coupon', 'wpmozo coupon' );
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
			return 'wpmozo-ae-icon-coupon wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-coupon-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-coupon-style' );
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
			require plugin_dir_path( __DIR__ ) . 'coupon/assets/controls/controls.php';
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
			$settings             = $this->get_settings_for_display();
			$title         		  = isset( $settings['title'] ) ? $settings['title'] : '';
			$coupon_code          = isset( $settings['coupon_code'] ) ? $settings['coupon_code'] : '';
			$description          = isset( $settings['description'] ) ? $settings['description'] : '';
			$show_expiry_date     = 'yes' === $settings['show_expiry_date'] ? 'yes' : '';
			$expiry_date          = isset( $settings['expiry_date'] ) ? $settings['expiry_date'] : '';
			$expiry_date_format   = isset( $settings['expiry_date_format'] ) ? $settings['expiry_date_format'] : '';
			$layout               = esc_attr( $settings['layout'] );
			$layout               = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2' ) );
			$title_heading_level  = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$show_offer_discount  = 'yes' === $settings['show_offer_discount'] ? 'yes' : '';
			$offer_discount       = isset( $settings['offer_discount'] ) ? $settings['offer_discount'] : '';
			$offer_discount_label = isset( $settings['offer_discount_label'] ) ? $settings['offer_discount_label'] : '';

			// Expiry Date Logic.
			$expiry_text  = '';
			$expiry_class = '';

			if ( 'yes' === $show_expiry_date && ! empty( $expiry_date ) ) {

				// Convert expiry date to timestamp
				$expiry_timestamp  = strtotime( $expiry_date );
				$current_timestamp = current_time( 'timestamp' );

				// Fallback date format
				$date_format = ! empty( $expiry_date_format ) ? $expiry_date_format : 'M j, Y';

				if ( $expiry_timestamp ) {

					// Expired
					if ( $current_timestamp > $expiry_timestamp ) {

						$expiry_text  = esc_html__( 'Expired', 'wpmozo-addons-lite-for-elementor' );
						$expiry_class = 'date-expired';

					} else {

						$expiry_text  = esc_html__( 'Expires On', 'wpmozo-addons-lite-for-elementor' ) . ' ';
						$expiry_text .= date_i18n( $date_format, $expiry_timestamp );

						$expiry_class = 'date-active';
					}
				}
			}

			?>
			<div class="dipl_coupon">
				<div class="dipl_coupon_wrapper <?php echo esc_attr( $layout ); ?>">
					<?php
						$layout_file = plugin_dir_path( __DIR__ ) . "coupon/assets/layouts/{$layout}.php";

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
