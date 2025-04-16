<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.1
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Control_Media;
use Elementor\Icons_Manager;
use Elementor\Plugin;

if ( ! class_exists( 'WPMOZO_AE_Image_Stack' ) ) {
	class WPMOZO_AE_Image_Stack extends Widget_Base {

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
			return 'wpmozo_ae_image_stack';
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
			return esc_html__( 'Image Stack', 'wpmozo-addons-for-elementor' );
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
			return array( 'wpmz image stack', 'wpmozo image stack' );
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
			return 'wpmozo-ae-icon-image-stack wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-image-stack-style', plugins_url( 'assets/css/style.min.css?test=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-image-stack-style' );
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

			wp_register_script( 'wpmozo-ae-image-stack-script', plugins_url( 'assets/js/script.min.js?test=' . wp_rand(), __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

			return array( 'wpmozo-ae-image-stack-script', 'wpmozo-ae-popper', 'wpmozo-ae-tippy', 'tippy' );
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

			// Separate file containing all the code for registering controls.
			require_once plugin_dir_path( __DIR__ ) . 'image-stack/assets/controls/controls.php';
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
			$settings           = $this->get_settings_for_display();
			$widget_id          = $this->get_id();
			$stack_item_list    = isset( $settings['stack_item_list'] ) ? $settings['stack_item_list'] : array();
			$show_tooltip_on    = $settings['show_tooltip_on'];
			$show_speech_bubble = $settings['show_speech_bubble'];
			$enable_tooltip     = $settings['enable_tooltip'];
			$animation_duration = isset($settings['tooltip_animation_duration']['size']) && ! empty($settings['tooltip_animation_duration']['size']) ? $settings['tooltip_animation_duration']['size'] : '300';

			$animation_name = '';
			if ( isset( $settings['tooltip_animation_type'] ) ) {
				if ( isset( $settings['animation_type_toward'] ) ) {
					$animation_name = $settings['animation_type_toward'];
				} elseif ( isset( $settings['animation_type_scale'] ) ) {
					$animation_name = $settings['animation_type_scale'];
				} elseif ( isset( $settings['animation_type_perspective'] ) ) {
					$animation_name = $settings['animation_type_perspective'];
				} elseif ( isset( $settings['animation_type_away'] ) ) {
					$animation_name = $settings['animation_type_away'];
				}
			}
			$this->add_render_attribute('image-stack-wrap', array(
				"class"                   => "wpmozo_image_stack_wrap elementor-".$widget_id, 
				"id"                      => "wpmozo-".$widget_id,
				"data-speech-bubble"      => $show_speech_bubble, 
				"data-animation-type"     => $settings['tooltip_animation_type'], 
				"data-animation-duration" => $animation_duration,
				"data-animation-name"     => $animation_name,
				"data-tooltip-id"         => "elementor-".$widget_id,
				"data-trigger"            => $show_tooltip_on,
			));

			?>

			<div class="wpmozo_image_stack">
				<div <?php $this->print_render_attribute_string("image-stack-wrap"); ?>>
					<div class="wpmozo_image_stack_inner">
						<?php
						foreach ( $stack_item_list as $index => $single_item ) {
							$stack_item_type = esc_attr( $single_item['stack_item_type'] );
							?>
							<div class="wpmozo_image_stack_item elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-repeater-id="elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-template="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>">
								<span class="wpmozo_stack_item_wrapper stack_item-type-<?php echo esc_attr( $stack_item_type ); ?>">								 
								<?php if ( 'icon' === $stack_item_type ) : ?>
											<?php
											Icons_Manager::render_icon(
												$single_item['stack_item_icon'],
												array(
													'aria-hidden' => 'true',
													'class' => 'wpmozo_ae_stack_item_icon',
												)
											);
											?>
										<?php endif; ?>
									<?php if ( 'image' === $stack_item_type ) : ?>									
											<img src="<?php echo esc_attr( $single_item['stack_item_image']['url'] ); ?>">
										<?php endif; ?>
								</span>
							</div>
							<!-- tooltip content -->
							<?php if ( 'yes' === $enable_tooltip ) : ?>
								<div id="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>"  class="wpmozo_image_stack_tooltip_content" >
									<?php
									if ( '' !== $single_item['tooltip_text'] ) {
										echo wp_kses_post( $single_item['tooltip_text'] );
									}
									?>
								</div>
							<?php endif; ?>
							<?php
						}
						?>
						</div>
					</div>
				</div>
			</div>
			
			<?php
		}
	}
}