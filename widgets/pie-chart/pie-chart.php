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

use Elementor\Widget_Base;
use Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Pie_Chart' ) ) {
	class WPMOZO_AE_Pie_Chart extends Widget_Base {


		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_pie_chart';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Pie Chart', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz pie chart','wpmozo pie chart' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-pie-chart  wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since  1.4.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-pie-chart-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-pie-chart-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.4.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'pie-chart/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * (
		 *
		 * @since 1.4.0
		 * @access protected
		 */
		protected function render() {
			$settings                 = $this->get_settings_for_display();
			$items_content            = isset( $settings['wpmozo_items_content'] ) ? $settings['wpmozo_items_content'] : array();
			$icon_shape               = isset( $settings['icon_shape'] ) ? $settings['icon_shape'] : '';
			?>
			<div class="et_pb_module dipl_pie_chart dipl_pie_chart_0">
				<div class="et_pb_module_inner">
					<div class="dipl_pie_chart_wrapper" data-chart="{&quot;labels&quot;:[&quot;India&quot;,&quot;South Africa&quot;,&quot;Sir Lanka&quot;,&quot;Canada&quot;],&quot;datasets&quot;:[{&quot;data&quot;:[&quot;45&quot;,&quot;20&quot;,&quot;15&quot;,&quot;20&quot;],&quot;backgroundColor&quot;:[&quot;#7CDA24&quot;,&quot;rgba(54, 162, 235, 0.2)&quot;,&quot;#EDF000&quot;,&quot;#E02B20&quot;],&quot;borderColor&quot;:[&quot;#E02B20&quot;,&quot;#0C71C3&quot;,&quot;#8300E9&quot;,&quot;#000000&quot;],&quot;borderWidth&quot;:&quot;2&quot;}]}" data-chart_height="382" data-chart_height_tablet="" data-chart_height_phone="" style="height: 382px;">
						<div class="dipl_pie_chart_inner">
							<canvas id="dipl_pie_chart_0--canvas" height="764" style="display: block; box-sizing: border-box; height: 382px; width: 1080px;" width="2160"></canvas>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}
