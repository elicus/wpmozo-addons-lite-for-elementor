<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Rotating_Text' ) ) {
	class WPMOZO_AE_Rotating_Text extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_rotating_text';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Rotating Text', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz rotating text', 'wpmozo rotating text', 'wpmz rotatingtext', 'wpmozo rotatingtext' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-rotating-text wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.3.0
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
		 * @since  1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-rotating-text-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-rotating-text-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'rotating-text/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings              = $this->get_settings_for_display();
			$rotating_text_raw     = isset( $settings['rotating_text'] ) ? $settings['rotating_text'] : 'Your content goes here ';
			$rotating_text         = html_entity_decode( $rotating_text_raw, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
			$circle_icon           = isset( $settings['circle_icon'] ) ? $settings['circle_icon'] : '';
			$circle_image          = isset( $settings['circle_image']['url'] ) ? $settings['circle_image']['url'] : array();
			$use_image             = isset( $settings['use_image'] ) ? $settings['use_image'] : '';
			$circle_image_alt_text = isset( $settings['circle_image_alt_text'] ) ? $settings['circle_image_alt_text'] : '';
			$rotation_arc          = isset( $settings['rotation_arc']['size'] ) ? (float) $settings['rotation_arc']['size'] : 360;
			// Cap rotation_arc between 30° and 360°.
			$rotation_arc = min( 360, max( 30, $rotation_arc ) );

			if ( empty( $rotating_text ) ) {
				return;
			}

			// Split string to characters (support multibyte, emoji etc.).
			$characters = preg_split( '//u', $rotating_text, -1, PREG_SPLIT_NO_EMPTY );
			// Append space if text doesn't already end with one.
			if ( end( $characters ) !== ' ' ) {
				$characters[] = ' ';
			}
			$total = count( $characters );

			if ( 0 === $total ) {
				return;
			}

			// Angle per character based on user-defined arc.
			$angle_step = $rotation_arc / $total;
			?>
			<div class="wpmozo_rotating_text_wrap">
				<p class="wpmozo_rotating_text_inner">
					<?php foreach ( $characters as $index => $char ) : ?>
						<span class="wpmozo_circle_text" style="--index: <?php echo esc_attr( $index ); ?>; --angle-step: <?php echo esc_attr( $angle_step ); ?>;"><?php echo esc_html( $char ); ?></span>
					<?php endforeach; ?>
				</p>
				<div class="wpmozo_rotating_text_icon_wrapper">
					<?php if ( 'yes' === $use_image && ! empty( $circle_image ) ) : ?>
						<img decoding="async" src="<?php echo esc_url( $circle_image ); ?>" alt="<?php echo esc_attr( $circle_image_alt_text ); ?>" class="wpmozo_rotating_text_img">
					<?php elseif ( ! empty( $circle_icon ) ) : ?>
						<div class="wpmozo_circle_icon">
							<?php
							Icons_Manager::render_icon(
								$circle_icon,
								array(
									'aria-hidden' => 'true',
									'class'       => 'wpmozo_icon',
								),
								'span'
							);
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<?php
		}
	}
}