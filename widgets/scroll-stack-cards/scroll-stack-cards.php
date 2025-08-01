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
if ( ! class_exists( 'WPMOZO_AE_Scroll_Stack_Cards' ) ) {
	class WPMOZO_AE_Scroll_Stack_Cards extends Widget_Base {
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
			return 'wpmozo_ae_scroll_stack_cards';
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
			return esc_html__( 'Scroll Stack Cards', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz scroll stack cards', 'wpmozo scroll stack cards' );
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
			return 'wpmozo-ae-icon-scroll-stack-cards wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-scroll-stack-cards-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scroll-stack-cards-style' );
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
			wp_register_script( 'wpmozo-ae-scroll-stack-cards-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-scroll-stack-cards-script', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger' );
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
			require plugin_dir_path( __DIR__ ) . 'scroll-stack-cards/assets/controls/controls.php';
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

			$items_content            = isset( $settings['wpmozo_items_content'] ) ? $settings['wpmozo_items_content'] : array();
			$layout                   = esc_attr( $settings['layout'] );
			$title_heading_level      = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$animation_start_viewport = isset( $settings['animation_start_viewport']['size'] ) && '' !== $settings['animation_start_viewport']['size'] ? $settings['animation_start_viewport']['size'] : 0;
			$collapsed_width          = isset( $settings['collapsed_width']['size'] ) ? $settings['collapsed_width']['size'] : '';
			$items_content            = isset( $settings['wpmozo_items_content'] ) ? $settings['wpmozo_items_content'] : array();
			$button_icon_placement    = isset( $settings['button_icon_placement'] ) ? $settings['button_icon_placement'] : '';

			// Add attributes for the wrapper.
			$this->add_render_attribute(
				'stack_wrapper',
				array(
					'class'                             => array( 'wpmozo_scroll_stack_cards_wrapper', 'icon_' . $button_icon_placement, 'layout-' . $layout ),
					'data-layout'                       => esc_attr( $layout ),
					'data-animation_start_viewport_pos' => esc_attr( $animation_start_viewport ) . '%',
					'data-collapsed_width'              => esc_attr( $collapsed_width ) . 'px'
				)
			);

			?>
				<div class="wpmozo_scroll_stack_cards">
					<div <?php $this->print_render_attribute_string( 'stack_wrapper' ); ?>>
						<div class="wpmozo_scroll_stack_cards_items">
						<?php foreach ( $items_content as $index => $item ) { ?>
							<div class="wpmozo_scroll_stack_cards_item wpmozo_scroll_stack_cards_item_<?php echo esc_attr( $index ); ?> elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
								<div class="wpmozo_scroll_stack_cards_item_inner">
									<div class="wpmozo_scroll_stack_cards_content_wrapper">
										<div class="wpmozo_scroll_stack_cards_icon_wrapper">
										<?php if ( 'yes' === $item['show_icon'] ) { ?>
											<?php
											\Elementor\Icons_Manager::render_icon(
												$item['card_icon'],
												array(
													'aria-hidden' => 'true',
													'class'       => 'wpmozo_icon',
												),
												'span'
											);
											?>
										<?php } ?>
										</div>
										<div class="wpmozo_scroll_stack_cards_title_wrap">
											<<?php echo esc_attr( $title_heading_level ); ?> class="wpmozo_scroll_stack_cards_title"><?php echo esc_html( $item['item_title'] ); ?></<?php echo esc_attr( $title_heading_level ); ?>></div>
										<div class="wpmozo_scroll_stack_cards_content">
											<p><?php echo wp_kses_post( $item['card_item_description'] ); ?></p>
										</div>
										<?php
										if ( 'yes' === $item['show_button'] && '' !== $item['button_link_url']['url'] && '' !== $item['button_text'] ) {
											$this->add_render_attribute(
												'wpmozo_ae_button'.$index,
												array(
													'class' => 'wpmozo_readmore_button',
												)
											);
											if ( '' !== $item[ 'button_link_url' ] ) {
												$this->add_link_attributes( 'wpmozo_ae_button'.$index, $item[ 'button_link_url' ] );
											}
											?>
											<div class="wpmozo_readmore_button_wrapper">
												<a <?php $this->print_render_attribute_string( 'wpmozo_ae_button'.$index ); ?>>
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
									<div class="wpmozo_scroll_stack_cards_image_wrapper">
										<?php if ( isset( $item['card_item_image']['url'] ) && ! empty( $item['card_item_image']['url'] ) ) { ?>
											<img decoding="async" src="<?php echo esc_attr( $item['card_item_image']['url'] ); ?>" alt="<?php echo esc_attr( $item['card_item_image_alt'] ); ?>" class="wpmozo_scroll_stack_cards_image">
										<?php } ?>
									</div>
								</div>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
			<?php
		}
	}
}