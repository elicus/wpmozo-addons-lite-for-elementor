<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.2.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
use Elementor\Controls_Manager;

if ( ! class_exists( 'WPMOZO_AE_Lottie' ) ) {
	class WPMOZO_AE_Lottie extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since   1.2.0
		 * @access  public
		 * @package WPMOZO Lite
		 * @return  string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_lottie';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since   1.2.0
		 * @access  public
		 * @package WPMOZO Lite
		 * @return  string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Lottie', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since   1.2.0
		 * @access  public
		 * @package WPMOZO Lite
		 * @return  string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-lottie wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since   1.2.0
		 * @access  public
		 * @package WPMOZO Lite
		 * @return  array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since   1.2.0
		 * @access  public
		 * @package WPMOZO Lite
		 * @return  array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-lottie-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-lottie', 'wpmozo-ae-lottie-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since   1.2.0
		 * @access  protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( __DIR__ ) . 'lottie/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * (
		 *
		 * @since   1.2.0
		 * @access  protected
		 */
		protected function render() {

			$settings          = $this->get_settings_for_display();
			$url               = $settings['url']['url'] ?? '';
			$animation_trigger = $settings['animation_trigger'];
			$direction         = $settings['direction'];
			$loop              = $settings['loop'];
			$speed             = $settings['speed'];
			$data_loop         = 'yes' === $loop ? 'true' : 'false';
			$order_class       = 'elementor-element-' . $this->get_id();
			$this->add_render_attribute(
				'wpmozo_lottie_params',
				array(
					'class'                  => 'wpmozo_lottie_params ' . $order_class,
					'data-url'               => $url,
					'data-animation-trigger' => $animation_trigger,
					'data-direction'         => $direction,
					'data-loop'              => $data_loop,
					'data-speed'             => $speed['size'],
					'data-order-class'       => $order_class,
				)
			);
			if ( '' !== $url ) {
				?>
				<div class="wpmozo_lottie_wrapper">
					<div <?php $this->print_render_attribute_string( 'wpmozo_lottie_params' ); ?>>
					</div>
				</div>
				<?php
			}
		}
	}
}