<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.2
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Hover_List' ) ) {
	class WPMOZO_AE_Hover_List extends Widget_Base {
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
			return 'wpmozo_ae_hover_list';
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
			return esc_html__( 'Hover List', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz hover list', 'wpmozo hover list' );
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
			return 'wpmozo-ae-icon-hover-list wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-hover-list-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-hover-list-style' );
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
			wp_register_script( 'wpmozo-ae-hover-list-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-hover-list-script', 'wpmozo-ae-gsap' );
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
			include_once plugin_dir_path( __DIR__ ) . 'hover-list/assets/controls/controls.php';
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
			$settings = $this->get_settings_for_display();

			$wpmozo_items_content = isset( $settings['wpmozo_items_content'] ) ? $settings['wpmozo_items_content'] : array();
			$title_heading_level  = wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$hide_last_divider    = isset( $settings['hide_last_divider'] ) && ! empty( $settings['hide_last_divider'] ) ? $settings['hide_last_divider'] : '';
			?>
				<div class="wpmozo_hover_list">
					<div class="wpmozo_hover_list_wrapper">
						<div class="wpmozo_hover_list_cursor"></div>
						<div class="wpmozo_hover_list_inner <?php echo esc_attr( $hide_last_divider ); ?>">
							<?php foreach ( $wpmozo_items_content as $index => $item ) { ?>
								<div class="wpmozo_hover_list_item elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
									<div data-image="<?php echo esc_url( $item['item_image']['url'] ); ?>" class="wpmozo_hover_list_item_wrapper">
										<div class="wpmozo_hover_list_item_inner">
											<div class="wpmozo_hover_list_title_wrapper">
												<?php
												if ( 'yes' === $item['show_icon'] ) {
													\Elementor\Icons_Manager::render_icon(
														$item['item_icon'],
														array(
															'aria-hidden' => 'true',
															'class'       => 'wpmozo_hover_list_icon',
														),
														'span'
													);
												}
												?>
												<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_hover_list_title"><?php echo esc_html( $item['item_title'] ); ?></<?php echo esc_attr( $title_heading_level ); ?>>
											</div>
											<div class="wpmozo_hover_list_description"><?php echo esc_html( $item['item_description'] ); ?></div>
											<div class="wpmozo_hover_list_subtitle"><?php echo esc_html( $item['item_subtitle'] ); ?></div>
											<?php
											if ( 'yes' === $item['show_button'] ) {
												?>
												<div class="wpmozo_readmore_button_wrapper">
													<a class="wpmozo_readmore_button" href="<?php echo esc_url( $item['button_link_url']['url'] ); ?>" target="<?php echo esc_attr( $item['button_link_url']['is_external'] ); ?>">
														<span class="wpmozo_button_text"><?php echo esc_html( $item['button_text'] ); ?></span>
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
											<?php } ?>
										</div>
										<div class="wpmozo_hover_list_item_overlay"></div>
									</div>
								</div>
								<div class="wpmozo_hover_list_item_divider"></div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php
		}
	}
}