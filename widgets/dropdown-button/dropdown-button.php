<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2026 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Dropdown_Button' ) ) {
	class WPMOZO_AE_Dropdown_Button extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.7.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_dropdown_button';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.7.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Dropdown Button', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz dropdown button', 'wpmozo dropdown button' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.7.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-dropdown-button wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.7.0
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
		 * @since  1.7.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-dropdown-button-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-dropdown-button-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.7.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-dropdown-button-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-dropdown-button-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.7.0
		 * @access protected
		 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'dropdown-button/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.7.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();

			$dropdown_items_content = isset( $settings['dropdown_items_content'] ) ? $settings['dropdown_items_content'] : array();
			$button_text            = isset( $settings['button_text'] ) ? $settings['button_text'] : '';
			$trigger_action         = isset( $settings['trigger_action'] ) ? $settings['trigger_action'] : '';
			$dropdown_direction     = isset( $settings['dropdown_direction'] ) ? $settings['dropdown_direction'] : '';
			$trigger_speed     = isset( $settings['trigger_speed']['size'] ) ? $settings['trigger_speed']['size'] : 300;
			$button_icon_placement  = isset( $settings['button_icon_placement'] ) ? $settings['button_icon_placement'] : '';

			// Add dynamic attributes.
			$this->add_render_attribute( 'dropdown_button_wrap',
				array( 
					'class' => array( 'wpmozo_dropdown_button_wrap', 'icon_' . $button_icon_placement ),
					'data-trigger-type' => $trigger_action,
					'data-direction' => $dropdown_direction,
					'data-trigger-speed' => $trigger_speed
					 ) );
			?>
				<div class="wpmozo_dropdown_button">
					<div <?php $this->print_render_attribute_string( 'dropdown_button_wrap' ); ?>>
						<div class="wpmozo_dropdown_button_inner">
								<?php
								if ( ! empty( $button_text ) ) {
									?>
										<div class="wpmozo_readmore_button_wrapper">
											<a class="wpmozo_readmore_button">
												<span class="wpmozo_button_text"><?php echo esc_html( $button_text ); ?></span>
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
							<div class="wpmozo_dropdown_menu_items">
								<?php foreach ( $dropdown_items_content as $index => $item ) { 
									$this->add_link_attributes('dropdown_item'.$index, $item['dropdown_item_url'])
									?>
									<div class="wpmozo_dropdown_button_item wpmozo_dropdown_button_item_<?php echo esc_attr( $index ); ?> elementor-repeater-item-<?php echo esc_attr( $item['_id'] ); ?>">
										<a <?php $this->print_render_attribute_string('dropdown_item'.$index) ?>><?php echo esc_attr( $item['dropdown_item_text'] ); ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
	}
}