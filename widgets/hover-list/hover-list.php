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
			wp_register_script( 'wpmozo-ae-hover-list-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-hover-list-script' );
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

			$list_items_content 	= isset( $settings['list_items_content'] ) ? $settings['list_items_content'] : array();
			$button_text            = isset( $settings['button_text'] ) ? $settings['button_text'] : '';
			$trigger_action         = isset( $settings['trigger_action'] ) ? $settings['trigger_action'] : '';
			$dropdown_direction     = isset( $settings['dropdown_direction'] ) ? $settings['dropdown_direction'] : '';
			$button_icon_placement  = isset( $settings['button_icon_placement'] ) ? $settings['button_icon_placement'] : '';

			
			?>
				<div class="et_pb_module dipl_hover_list dipl_hover_list_0">
					<div class="et_pb_module_inner">
						<div class="dipl-hover-list-wrapper">
							<div class="dipl-hover-list-cursor" style="background-image: url(&quot;http://elicus-divi.local/wp-content/uploads/2025/01/pexels-nikita-khandelwal-178978-819805-1.jpg&quot;); translate: none; rotate: none; scale: none; opacity: 0; visibility: hidden; transform: translate(-20px, -20px) scale(0.1, 0.1); top: 354px; left: 414px;"></div>
							<div class="dipl-hover-list-inner">
								<div class="et_pb_module dipl_hover_list_item dipl_hover_list_item_0">
									<div data-image="http://elicus-divi.local/wp-content/uploads/2025/01/pexels-tarun-reddy-362129-984802-1.jpg" class="dipl-hover-list-item-wrapper">
										<div class="dipl-hover-list-item-inner">
											<div class="dipl_hover_list_title_wrapper"><span class="et-pb-icon dipl_hover_list_icon">1</span>
												<h4 class="dipl_hover_list_title">Jaipur</h4></div>
											<div class="dipl_hover_list_description">Hello jaipur</div>
											<div class="dipl_hover_list_subtitle">Jagatpura</div>
											<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Read more</a></div>
										</div>
										<div class="dipl-hover-list-item-overlay"></div>
										<div class="dipl-hover-list-item-divider"></div>
									</div>
								</div>
								<div class="et_pb_module dipl_hover_list_item dipl_hover_list_item_1">
									<div data-image="http://elicus-divi.local/wp-content/uploads/2025/01/pexels-nikita-khandelwal-178978-819805-1.jpg" class="dipl-hover-list-item-wrapper">
										<div class="dipl-hover-list-item-inner">
											<div class="dipl_hover_list_title_wrapper"><span class="et-pb-icon dipl_hover_list_icon"></span>
												<h4 class="dipl_hover_list_title">Sri Ganganagar</h4></div>
											<div class="dipl_hover_list_description">Hello SGNR</div>
											<div class="dipl_hover_list_subtitle">Tatarsar</div>
											<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Read more</a></div>
										</div>
										<div class="dipl-hover-list-item-overlay"></div>
										<div class="dipl-hover-list-item-divider"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
	}
}