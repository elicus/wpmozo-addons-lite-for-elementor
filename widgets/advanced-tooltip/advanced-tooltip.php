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

			$trigger_action            = isset( $settings['trigger_action'] ) ? $settings['trigger_action'] : '';
			//$layout                   = esc_attr( $settings['layout'] );
			//$title_heading_level      = wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			//$animation_start_viewport = isset( $settings['animation_start_viewport']['size'] ) ? $settings['animation_start_viewport']['size'] : '';
			$trigger_element_type       = isset( $settings['trigger_element_type'] ) ? $settings['trigger_element_type'] : '';
			$trigger_button_link_url    = isset( $settings['trigger_button_link_url']['url'] ) ? $settings['trigger_button_link_url']['url'] : '';
			$trigger_button_text        = isset( $settings['trigger_button_text'] ) ? $settings['trigger_button_text'] : '';
			$trigger_button_link_target = isset( $settings['trigger_button_link_target'] ) ? $settings['trigger_button_link_target'] : '';
			$trigger_image    			= isset( $settings['trigger_image']['url'] ) ? $settings['trigger_image']['url'] : '';
			$trigger_image_alt_tag      = isset( $settings['trigger_image_alt_tag'] ) ? $settings['trigger_image_alt_tag'] : '';
			$trigger_icon        		= isset( $settings['trigger_icon'] ) ? $settings['trigger_icon'] : '';
			$trigger_text        		= isset( $settings['trigger_text'] ) ? $settings['trigger_text'] : '';
			$trigger_selector_id        = isset( $settings['trigger_selector_id'] ) ? $settings['trigger_selector_id'] : '';
			$trigger_selector_class     = isset( $settings['trigger_selector_class'] ) ? $settings['trigger_selector_class'] : '';
			$tooltip_content_type       = isset( $settings['tooltip_content_type'] ) ? $settings['tooltip_content_type'] : '';
			$content_type_text          = isset( $settings['content_type_text'] ) ? $settings['content_type_text'] : '';
			$content_type_image    		= isset( $settings['content_type_image']['url'] ) ? $settings['content_type_image']['url'] : '';
			$content_type_image_alt_tag = isset( $settings['content_type_image_alt_tag'] ) ? $settings['content_type_image_alt_tag'] : '';
			$content_type_elementor_layout = isset( $settings['content_type_elementor_layout'] ) ? $settings['content_type_elementor_layout'] : '';
			$tooltip_width          	= isset( $settings['tooltip_width']['size'] ) ? $settings['tooltip_width']['size'] : '';
			$entrance_animation 		= isset( $settings['entrance_animation'] ) ? $settings['entrance_animation'] : '';
			$animation_duration 		= isset( $settings['animation_duration'] ) ? $settings['animation_duration'] : '';
			$make_interactive_tooltip   = ( 'yes' === $settings['make_interactive_tooltip'] ) ? 'true' : 'false';
			$button_icon_placement    = isset( $settings['button_icon_placement'] ) ? $settings['button_icon_placement'] : '';


			$trigger_selector = '';
			if ( 'id' === $trigger_element_type && ! empty( $trigger_selector_id ) ) {
				$trigger_selector = $trigger_selector_id;
			} elseif ( 'class' === $trigger_element_type && ! empty( $trigger_selector_class ) ) {
				$trigger_selector = $trigger_selector_class;
			}

			?>
				<div class="dipl_advanced_tooltip icon_<?php echo esc_attr( $button_icon_placement ); ?>">
					<div data-trigger-action="<?php echo esc_attr( $trigger_action ); ?>" data-animation="<?php echo esc_attr( $entrance_animation ); ?>" data-duration="<?php echo esc_attr( $animation_duration ); ?>" data-interactive="<?php echo esc_attr( $make_interactive_tooltip ); ?>" data-tooltip-width="<?php echo esc_attr( $tooltip_width ); ?>" data-trigger-element="<?php echo esc_attr( $trigger_element_type ); ?>" data-trigger-selector="<?php echo esc_attr( $trigger_selector ); ?>" class="dipl_tooltip_trigger_element_wrap trigger_type_<?php echo esc_attr( $trigger_element_type ); ?>">
					<?php if ( 'button' === $settings['trigger_element_type'] && '' !== $settings['trigger_button_text'] ) {
						?>
						<div class="wpmozo_readmore_button_wrapper">
							<a class="wpmozo_readmore_button dipl_tooltip_trigger_element dipl_tooltip_trigger_button" href="<?php echo esc_url( $settings['trigger_button_link_url']['url'] ); ?>" target="<?php echo esc_attr( $settings['trigger_button_link_target'] ); ?>">
								<span class="wpmozo_button_text"><?php echo esc_html( $settings['trigger_button_text'] ); ?></span>
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
					<?php } elseif ( 'image' === $settings['trigger_element_type'] && '' !== $settings['trigger_image']['url'] ) {?>
						<img decoding="async" src="<?php echo esc_url( $trigger_image ); ?>" alt="<?php echo esc_attr( $trigger_image_alt_tag ); ?>" class="dipl_tooltip_trigger_element dipl_tooltip_trigger_image" aria-expanded="false">
					<?php } elseif ( 'icon' === $settings['trigger_element_type'] && '' !== $settings['trigger_icon'] ) {?>
						<?php
								\Elementor\Icons_Manager::render_icon(
									$settings['trigger_icon'],
									array(
										'aria-hidden' => 'true',
										'class'       => 'dipl_tooltip_trigger_element dipl_tooltip_trigger_icon',
									),
									'span'
								);
								?>
					<?php } elseif ( 'text' === $settings['trigger_element_type'] && '' !== $settings['trigger_text'] ) { ?>
						<span class="dipl_tooltip_trigger_element dipl_tooltip_trigger_text"><?php echo esc_html( $trigger_text ); ?></span>
					<?php } ?>
					</div>
					<div class="dipl_advanced_tooltip_content_wrap">
						<div class="dipl_advanced_tooltip_content">
							<div class="dipl_tooltip_content_text">
								<p><?php echo wp_kses_post( $settings['content_type_text'] ); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
	}
}