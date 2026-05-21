<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;
use \Elementor\Controls_Manager;

if ( ! class_exists( 'WPMOZO_AE_Advanced_Button' ) ) {
	class WPMOZO_AE_Advanced_Button extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.2.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_advanced_button';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.2.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Advanced Button', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz advanced buttons','wpmozo advanced buttons' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.2.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-advanced-button wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.2.0
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
		 * @since 1.2.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-advanced-button-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-advanced-button-style' );

		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.2.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			

			wp_register_script( 'wpmozo-ae-advanced-button-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-advanced-button-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.2.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'advanced-button/assets/controls/controls.php';
		}

		/**
		 * This function dynamically creates script parameters according to the user settings
		 *
		 * @return string
		 * */

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * ( 
		 *
		 * @since 1.2.0
		 * @access protected
		 */
		protected function render() {

			$settings 				= $this->get_settings_for_display();
			$inline_buttons			= $settings['inline_buttons'] ?? '';
			$order_class            = 'elementor-element-' . $this->get_id();

			$this->add_render_attribute( 'button_secondary_text', 'class', 'wpmozo_button_secondary_text' );
			$this->add_render_attribute( 'background_effect_wrap', 'class', 'wpmozo_background_effect_wrap' );
			$this->add_render_attribute( 'icon_wrapper', 'class', 'wpmozo_ae_image_card_icon_wrapper' );
					

			if($settings['buttons']){
				foreach (  $settings['buttons'] as $index => $item ) {

					$button_link 				= $item['button_url']['url'] ?? '#';
					$background_fill_style 		= $item['background_fill_style'];
					$button_text				= $item['button_text'];
					$secondary_text				= $item['secondary_text'];
					$button_use_icon			= $item['button_use_icon'];
					$button_icon				= $item['button_icon']['value'] ?? '';
					$button_on_hover 			= $item['show_icon_on_hover_switcher'] ?? '';
					$button_icon_placement		= $item['button_icon_placement'] ?? 'left';
					$button_type				= $item['button_type'] ?? 'classic';
					$button_class 				= '';
					$custom_button_icon_class 	= '';
					
					 
					$icon_position          = 'row' === $item[ 'button_icon_position' ] ? 'icon_row' : 'icon_row-reverse';
					$icon_sizing            = empty($item[ 'button_typography_font_size' ]['size']) ? 'size_empty' : 'size_set';

					if ( 'on' === $button_use_icon )
					{
						$custom_button_icon_class = 'wpmozo_button_icon';
					}

					if ( '' === $button_text && 'off' === $button_use_icon ) {
						return '';
					}

					$vertical_or_horizonal_fill_class = '';

					if ( 'vertical_shutter_fill' === $background_fill_style || 'horizontal_shutter_fill' === $background_fill_style )
					{
						$vertical_or_horizonal_fill_class = 'vertical_or_horizonal_fill';
					}
					
					$button_classes = array(
						'wpmozo_button_link',
						"wpmozo_button_{$background_fill_style}",
					);
			
					if ( '' === $button_text ) {
						array_push( $button_classes, 'wpmozo_button_no_text' );
					}
					
					if ( 'on' === $button_use_icon && '' !== $button_icon ) {
						if ( 'on' === $button_on_hover && '' !== $button_text ) {
							array_push( $button_classes, 'wpmozo_button_icon_on_hover' );
						}
						array_push( $button_classes, "wpmozo_button_icon_{$button_icon_placement}" );
					}
			
					if ( '' !== $button_class ) {
						array_push( $button_classes, esc_attr( $button_class ) );
					}
			
					$button_classes = implode( ' ', $button_classes );
					?>
					<div class="wpmozo_button_item wpmozo_button_item_<?php echo esc_attr( $index ); ?> elementor-repeater-item-<?php echo esc_attr( $item['_id']. ' ' . $vertical_or_horizonal_fill_class . ' '.$icon_position. ' '.$icon_sizing  ); ?>">
						<div class="wpmozo_button_wrapper wpmozo_button_<?php echo esc_attr( $button_type ); ?>">
							<a class="<?php echo esc_attr( $button_classes ); ?>" href="<?php echo esc_url( $button_link ); ?>" target="<?php echo esc_attr( $item['url_new_window'] ); ?>" >
								<span class="wpmozo_primary_text_with_icon">
									<span class="wpmozo_button_text <?php echo esc_attr( $custom_button_icon_class ); ?>"><?php echo esc_html( $button_text ); ?></span>
									<?php 
										if( '' !== $item[ 'button_icon' ] ) {
											Icons_Manager::render_icon( 
												$item[ 'button_icon' ],
												array( 
													'aria-hidden' => 'true',
													'class'       => 'wpmozo_ae_button_icon',
													)
												);
										}else {
											echo esc_html( '' );
										} 
									?>
								</span>
								<?php if('' !== $secondary_text && 'conversion' === $button_type): ?>
									<span <?php $this->print_render_attribute_string( 'button_secondary_text' ); ?>><?php echo esc_html( $secondary_text ); ?></span>
								<?php endif; ?>
								<?php if ( 'default_fill' !== $background_fill_style ): ?>
									<span <?php $this->print_render_attribute_string( 'background_effect_wrap' ); ?>></span>
								<?php endif; ?>
							</a>
						</div>
					</div>					
					
					<?php
				
				}

				if('on' === $inline_buttons) {
				?>
					<style> 
					.<?php echo esc_html( $order_class ); ?> .wpmozo_button_item { 
						display:inline-block;
					} 
					</style>
				<?php
				}
			}
		}
	}
}