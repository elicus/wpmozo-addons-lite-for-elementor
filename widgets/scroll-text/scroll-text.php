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
if ( ! class_exists( 'WPMOZO_AE_Scroll_Text' ) ) {
	class WPMOZO_AE_Scroll_Text extends Widget_Base {
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
			return 'wpmozo_ae_scroll_text';
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
			return esc_html__( 'Scroll Text', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz scroll text', 'wpmozo scroll text', 'wpmz scrolltext', 'wpmozo scrolltext', 'wpmozo textscroll', 'wpmozo text scroll' );
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
			return 'wpmozo-ae-icon-scroll-text wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-scroll-text-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scroll-text-style' );
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
			wp_register_script( 'wpmozo-ae-scroll-text-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-scroll-text-script', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger' );
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
			require plugin_dir_path( __DIR__ ) . 'scroll-text/assets/controls/controls.php';
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
			$settings                = $this->get_settings_for_display();
			$scroll_text             = isset( $settings['scroll_text'] ) ? $settings['scroll_text'] : '';
			$scroll_effect           = isset( $settings['scroll_effect'] ) ? $settings['scroll_effect'] : '';
			$text_split              = isset( $settings['text_split'] ) ? $settings['text_split'] : '';
			
			$start_element_position  = isset( $settings['start_element_position']['size'] ) ? $settings['start_element_position']['size'].$settings['start_element_position']['unit'] : '';
			
			$start_viewport_position = isset( $settings['start_viewport_position']['size'] ) ? $settings['start_viewport_position']['size'].$settings['start_viewport_position']['unit'] : '';
			
			$end_element_position    = isset( $settings['end_element_position']['size'] ) ? $settings['end_element_position']['size'].$settings['end_element_position']['unit'] : '';
			
			$end_viewport_position   = isset( $settings['end_viewport_position']['size'] ) ? $settings['end_viewport_position']['size'].$settings['end_viewport_position']['unit'] : '';



			$start_element_position_pre  = isset( $settings['element_start_position_pre'] ) ? $settings['element_start_position_pre'] : '';
			
			$start_viewport_position_pre = isset( $settings['viewport_start_position_pre'] ) ? $settings['viewport_start_position_pre'] : '';
			
			$end_element_position_pre    = isset( $settings['element_end_position_pre'] ) ? $settings['element_end_position_pre'] : '';
			
			$end_viewport_position_pre   = isset( $settings['viewport_end_position_pre'] ) ? $settings['viewport_end_position_pre'] : '';
			$custom_pos = 'yes' === $settings[ 'use_custom_pos' ] ? true : false;

			$this->add_render_attribute( 'text_wrap', array(
				'class'                             => 'wpmozo_scroll_text_wrap',
				'data-scroll_effect'                => $scroll_effect,
				'data-split'                        => $text_split,
				'data-animation_start_element_pos'  => $custom_pos ? $start_element_position : $start_element_position_pre,
				'data-animation_start_viewport_pos' =>$custom_pos ? $start_viewport_position : $start_viewport_position_pre, 
				'data-animation_end_element_pos'    =>$custom_pos ? $end_element_position : $end_element_position_pre,
				'data-animation_end_viewport_pos'   =>$custom_pos ? $end_viewport_position : $end_viewport_position_pre

			));
			?>

			<div class="wpmozo_scroll_text">
				<div  <?php $this->print_render_attribute_string('text_wrap')?>>
					<div class="wpmozo_scroll_text_inner"><span class="wpmozo_st_word"><?php echo esc_html( nl2br( $scroll_text ) ); ?></span></div>
				</div>
			</div>
			<?php
		}
	}
}