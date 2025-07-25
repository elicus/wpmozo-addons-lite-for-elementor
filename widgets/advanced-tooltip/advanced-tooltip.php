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
use Elementor\Plugin;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Advanced_Tooltip' ) ) {
	class WPMOZO_AE_Advanced_Tooltip extends Widget_Base {
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
			return 'wpmozo_ae_advanced_tooltip';
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
			return esc_html__( 'Advanced Tooltip', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz advanced tooltip', 'wpmozo advanced tooltip' );
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
			return 'wpmozo-ae-icon-advanced-tooltip wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-advanced-tooltip-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-advanced-tooltip-style' );
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
			wp_register_script( 'wpmozo-ae-advanced-tooltip-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-advanced-tooltip-script', 'wpmozo-ae-popper', 'wpmozo-ae-tippy' );
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
			include_once plugin_dir_path( __DIR__ ) . 'advanced-tooltip/assets/controls/controls.php';
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
		
			$trigger_action             = isset( $settings['trigger_action'] ) ? $settings['trigger_action'] : '';
			$trigger_element_type       = isset( $settings['trigger_element_type'] ) ? $settings['trigger_element_type'] : '';
			$trigger_button_link_url    = isset( $settings['trigger_button_link_url']['url'] ) ? $settings['trigger_button_link_url']['url'] : '';
			$trigger_button_text        = isset( $settings['trigger_button_text'] ) ? $settings['trigger_button_text'] : '';
			$trigger_button_link_target = isset( $settings['trigger_button_link_target'] ) ? $settings['trigger_button_link_target'] : '';
			$trigger_image              = isset( $settings['trigger_image']['url'] ) ? $settings['trigger_image']['url'] : '';
			$trigger_image_alt_tag      = isset( $settings['trigger_image_alt_tag'] ) ? $settings['trigger_image_alt_tag'] : '';
			$trigger_icon               = isset( $settings['trigger_icon'] ) ? $settings['trigger_icon'] : '';
			$trigger_text               = isset( $settings['trigger_text'] ) ? $settings['trigger_text'] : '';
			$trigger_selector_id        = isset( $settings['trigger_selector_id'] ) ? $settings['trigger_selector_id'] : '';
			$trigger_selector_class     = isset( $settings['trigger_selector_class'] ) ? $settings['trigger_selector_class'] : '';
			$tooltip_content_type       = isset( $settings['tooltip_content_type'] ) ? $settings['tooltip_content_type'] : '';
			$content_type_text          = isset( $settings['content_type_text'] ) ? $settings['content_type_text'] : '';
			$content_type_image         = isset( $settings['content_type_image']['url'] ) ? $settings['content_type_image']['url'] : '';
			$content_type_image_alt_tag = isset( $settings['content_type_image_alt_tag'] ) ? $settings['content_type_image_alt_tag'] : '';
			$content_type_elementor_layout = isset( $settings['content_type_elementor_layout'] ) ? $settings['content_type_elementor_layout'] : '';
			$tooltip_width              = isset( $settings['tooltip_width']['size'] ) ? $settings['tooltip_width']['size'] : '';
			$entrance_animation         = isset( $settings['entrance_animation'] ) ? $settings['entrance_animation'] : '';
			$animation_duration         = isset( $settings['animation_duration'] ) ? $settings['animation_duration'] : '';
			$make_interactive_tooltip   = ( 'yes' === $settings['make_interactive_tooltip'] ) ? 'true' : 'false';
			$button_icon_placement      = isset( $settings['button_icon_placement'] ) ? $settings['button_icon_placement'] : '';
		
			$trigger_selector = '';
			if ( 'id' === $trigger_element_type && ! empty( $trigger_selector_id ) ) {
				$trigger_selector = $trigger_selector_id;
			} elseif ( 'class' === $trigger_element_type && ! empty( $trigger_selector_class ) ) {
				$trigger_selector = $trigger_selector_class;
			}
		
			// Wrapper attributes
			$this->add_render_attribute( 'tooltip_wrapper', 'class', array(
				'dipl_advanced_tooltip',
				'icon_' . $button_icon_placement,
			) );
		
			// Trigger wrapper
			$this->add_render_attribute( 'trigger_wrap', 'class', array(
				'dipl_tooltip_trigger_element_wrap',
				'trigger_type_' . $trigger_element_type,
			) );
			$this->add_render_attribute( 'trigger_wrap', 'data-trigger-action', $trigger_action );
			$this->add_render_attribute( 'trigger_wrap', 'data-animation', $entrance_animation );
			$this->add_render_attribute( 'trigger_wrap', 'data-duration', $animation_duration );
			$this->add_render_attribute( 'trigger_wrap', 'data-interactive', $make_interactive_tooltip );
			$this->add_render_attribute( 'trigger_wrap', 'data-tooltip-width', $tooltip_width );
			$this->add_render_attribute( 'trigger_wrap', 'data-trigger-element', $trigger_element_type );
			$this->add_render_attribute( 'trigger_wrap', 'data-trigger-selector', $trigger_selector );
		
			// Button trigger
			if ( 'button' === $trigger_element_type ) {
				$this->add_render_attribute( 'trigger_button', 'class', array(
					'wpmozo_readmore_button',
					'dipl_tooltip_trigger_element',
					'dipl_tooltip_trigger_button',
				) );
				$this->add_render_attribute( 'trigger_button', 'href', esc_url( $trigger_button_link_url ) );
				$this->add_render_attribute( 'trigger_button', 'target', esc_attr( $trigger_button_link_target ) );
			}
		
			// Image trigger
			if ( 'image' === $trigger_element_type ) {
				$this->add_render_attribute( 'trigger_image', 'class', array(
					'dipl_tooltip_trigger_element',
					'dipl_tooltip_trigger_image',
				) );
				$this->add_render_attribute( 'trigger_image', 'src', esc_url( $trigger_image ) );
				$this->add_render_attribute( 'trigger_image', 'alt', esc_attr( $trigger_image_alt_tag ) );
				$this->add_render_attribute( 'trigger_image', 'decoding', 'async' );
			}
		
			// Text trigger
			if ( 'text' === $trigger_element_type ) {
				$this->add_render_attribute( 'trigger_text', 'class', array(
					'dipl_tooltip_trigger_element',
					'dipl_tooltip_trigger_text',
				) );
			}
			?>
			<div <?php echo $this->print_render_attribute_string( 'tooltip_wrapper' ); ?>>
				<div <?php echo $this->print_render_attribute_string( 'trigger_wrap' ); ?>>
					<?php if ( 'button' === $trigger_element_type && ! empty( $trigger_button_text ) ) : ?>
						<div class="wpmozo_readmore_button_wrapper">
							<a <?php echo $this->print_render_attribute_string( 'trigger_button' ); ?>>
								<span class="wpmozo_button_text"><?php echo esc_html( $trigger_button_text ); ?></span>
								<?php
								\Elementor\Icons_Manager::render_icon(
									$settings['button_icon'],
									[
										'aria-hidden' => 'true',
										'class'       => 'wpmozo_button_icon',
									]
								);
								?>
							</a>
						</div>
					<?php elseif ( 'image' === $trigger_element_type && ! empty( $trigger_image ) ) : ?>
						<img <?php echo $this->print_render_attribute_string( 'trigger_image' ); ?> aria-expanded="false">
					<?php elseif ( 'icon' === $trigger_element_type && ! empty( $trigger_icon ) ) : ?>
						<?php
						\Elementor\Icons_Manager::render_icon(
							$settings['trigger_icon'],
							[
								'aria-hidden' => 'true',
								'class'       => 'dipl_tooltip_trigger_element dipl_tooltip_trigger_icon',
							],
							'span'
						);
						?>
					<?php elseif ( 'text' === $trigger_element_type && ! empty( $trigger_text ) ) : ?>
						<span <?php echo $this->print_render_attribute_string( 'trigger_text' ); ?>><?php echo esc_html( $trigger_text ); ?></span>
					<?php endif; ?>
				</div>
		
				<div class="dipl_advanced_tooltip_content_wrap">
					<div class="dipl_advanced_tooltip_content">
						<?php if ( 'text' === $tooltip_content_type && ! empty( $content_type_text ) ) : ?>
							<div class="dipl_tooltip_content_text">
								<p><?php echo wp_kses_post( $content_type_text ); ?></p>
							</div>
						<?php elseif ( 'image' === $tooltip_content_type && ! empty( $content_type_image ) ) : ?>
							<img decoding="async" src="<?php echo esc_url( $content_type_image ); ?>" alt="<?php echo esc_attr( $content_type_image_alt_tag ); ?>" class="dipl_tooltip_content_image">
						<?php elseif ( 'el_library_layout' === $tooltip_content_type && ! empty( $content_type_elementor_layout ) ) : ?>
							<div class="dipl_tooltip_content_layout wpmozo_el_layout">
								<?php
								$plugin_elementor         = \Elementor\Plugin::instance();
								$elementor_layout_content = $plugin_elementor->frontend->get_builder_content_for_display( $content_type_elementor_layout, true );
								echo $elementor_layout_content;
								?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<?php
		}		
	}
}