<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;
use Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Background_Switcher' ) ) {
	class WPMOZO_AE_Background_Switcher extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_background_switcher';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Background Switcher', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz background switcher', 'wpmozo background switcher' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-background-switcher wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
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
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-background-switcher-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-background-switcher-style' );
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
			wp_register_script( 'wpmozo-ae-background-switcher-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-background-switcher-script' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'background-switcher/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			// Get settings for display.
			$settings            = $this->get_settings_for_display();
			$background_items    = isset( $settings['background_item'] ) ? $settings['background_item'] : array();
			$title_heading_level = wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$transition          = isset( $settings['transition_duration']['size'] ) && ! empty( $settings['transition_duration']['size'] ) ? $settings['transition_duration']['size'] : 300;

			?>
			<div class="wpmozo_background_switcher">
					<div class="wpmozo_background_switcher_wrap">
						<div class="wpmozo_background_switcher_inner" data-transition="<?php echo esc_attr( $transition ); ?>">
						<?php
						foreach ( $background_items as $index => $background_item ) {
							?>
							<div class="wpmozo_background_switcher_item elementor-repeater-item-<?php echo esc_attr( $background_item['_id'] ); ?> wpmozo_background_switcher_item_<?php echo esc_attr( $index ); ?>">
								<div class="wpmozo_bg_switcher_item_wrap">
									<div class="wpmozo_bg_switcher_content">
										<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_bg_switcher_title"><?php echo esc_html( $background_item['item_title'] ); ?></<?php echo esc_attr( $title_heading_level ); ?>>
										<div class="wpmozo_bg_switcher_hover_content">
											<div class="wpmozo_bg_switcher_desc">
												<?php echo esc_html( $background_item['item_description'] ); ?>
											</div>
											<?php if ( 'yes' === $background_item['show_button'] && '' !== $background_item['button_url'] && '' !== $background_item['button_text'] ) : ?>
											<div class="wpmozo_background_switcher_btn_wrap">
												<div class="wpmozo_read_more_button_wrapper">
													<a class="wpmozo_read_more_button" href="<?php echo esc_url( $background_item['button_url']['url'] ); ?>">
														<span class="wpmozo_button_text"><?php echo esc_html( $background_item['button_text'] ); ?></span>
														<?php
														\Elementor\Icons_Manager::render_icon(
															$settings['button_icon'],
															array(
																'aria-hidden' => 'true',
																'class'       => 'wpmozo_button_icon',
															)
														);
														?>
													</a>
												</div>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
							<div class="wpmozo_background_switcher_image">
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php
		}
	}
}
