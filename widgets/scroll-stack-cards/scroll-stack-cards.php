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
			return esc_html__( 'Scroll Stack Cards', 'wpmozo-addons-for-elementor' );
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
			wp_register_style( 'wpmozo-ae-scroll-stack-cards-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION );
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
			wp_register_script( 'wpmozo-ae-scroll-stack-cards-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION, true );

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
			include_once plugin_dir_path( __DIR__ ) . 'scroll-stack-cards/assets/controls/controls.php';
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
			$layout                   = wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2' ) );
			$title_heading_level      = wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$animation_start_element  = isset( $settings['animation_start_element']['size'] ) ? $settings['animation_start_element']['size'] : '';
			$animation_start_viewport = isset( $settings['animation_start_viewport']['size'] ) ? $settings['animation_start_viewport']['size'] : '';

			?>
				<div class="dipl_scroll_stack_cards">
					<div class="dipl-scroll-stack-cards-wrapper layout-vertical" data-layout="vertical" data-animation_start_viewport_pos="0%">
						<div class="dipl-scroll-stack-cards-items">
							<div class="dipl_scroll_stack_cards_item">
								<div class="dipl_scroll_stack_cards_item_inner">
									<div class="dipl_scroll_stack_cards_content_wrapper">
										<div class="dipl_scroll_stack_cards_icon_wrapper"><span class="et-pb-icon">p</span></div>
										<div class="dipl_scroll_stack_cards_title_wrap">
											<h2 class="dipl_scroll_stack_cards_title">Build Strength with Yoga Flow</h2></div>
										<div class="dipl_scroll_stack_cards_content">
											<p><span>Energize your body with dynamic poses that improve flexibility, build muscle strength, and enhance focus. Perfect for a refreshing start to your day.</span></p>
										</div>
										<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Explore Yoga Moves</a></div>
									</div>
									<div class="dipl_scroll_stack_cards_image_wrapper"><img decoding="async" src="http://elicus-divi.local/wp-content/uploads/2024/12/french-fries.png" alt="" srcset="http://elicus-divi.local/wp-content/uploads/2024/12/french-fries.png 300w, http://elicus-divi.local/wp-content/uploads/2024/12/french-fries-150x150.png 150w, http://elicus-divi.local/wp-content/uploads/2024/12/french-fries-100x100.png 100w"
										sizes="(max-width: 300px) 100vw, 300px" class="et_pb_image dipl_scroll_stack_cards_image"></div>
								</div>
							</div>
							<div class="dipl_scroll_stack_cards_item">
								<div class="dipl_scroll_stack_cards_item_inner">
									<div class="dipl_scroll_stack_cards_content_wrapper">
										<div class="dipl_scroll_stack_cards_icon_wrapper"><span class="et-pb-icon">q</span></div>
										<div class="dipl_scroll_stack_cards_title_wrap">
											<h2 class="dipl_scroll_stack_cards_title">Master Balance with Inversions</h2></div>
										<div class="dipl_scroll_stack_cards_content">
											<p><span>Challenge your body and mind with powerful inversion poses that build focus, strength, and confidence. A perfect practice for those ready to elevate their yoga journey.</span></p>
										</div>
										<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Start Balancing</a></div>
									</div>
									<div class="dipl_scroll_stack_cards_image_wrapper"><img decoding="async" src="http://elicus-divi.local/wp-content/uploads/2024/12/coffee-item-7-1-300x300-1.png" alt="" srcset="http://elicus-divi.local/wp-content/uploads/2024/12/coffee-item-7-1-300x300-1.png 300w, http://elicus-divi.local/wp-content/uploads/2024/12/coffee-item-7-1-300x300-1-150x150.png 150w, http://elicus-divi.local/wp-content/uploads/2024/12/coffee-item-7-1-300x300-1-100x100.png 100w"
										sizes="(max-width: 300px) 100vw, 300px" class="et_pb_image dipl_scroll_stack_cards_image"></div>
								</div>
							</div>
							<div class="dipl_scroll_stack_cards_item">
								<div class="dipl_scroll_stack_cards_item_inner">
									<div class="dipl_scroll_stack_cards_content_wrapper">
										<div class="dipl_scroll_stack_cards_icon_wrapper"><span class="et-pb-icon">s</span></div>
										<div class="dipl_scroll_stack_cards_title_wrap">
											<h2 class="dipl_scroll_stack_cards_title">Inner Peace Through Meditation</h2></div>
										<div class="dipl_scroll_stack_cards_content">
											<p><span>Discover the power of calmness and mindfulness. Learn breathing techniques and simple meditative postures to bring balance to your busy life.</span></p>
										</div>
										<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Start Meditating</a></div>
									</div>
									<div class="dipl_scroll_stack_cards_image_wrapper"><img decoding="async" src="http://elicus-divi.local/wp-content/uploads/2024/12/vegetable-salad.png" alt="" srcset="http://elicus-divi.local/wp-content/uploads/2024/12/vegetable-salad.png 300w, http://elicus-divi.local/wp-content/uploads/2024/12/vegetable-salad-150x150.png 150w, http://elicus-divi.local/wp-content/uploads/2024/12/vegetable-salad-100x100.png 100w"
										sizes="(max-width: 300px) 100vw, 300px" class="et_pb_image dipl_scroll_stack_cards_image"></div>
								</div>
							</div>
							<div class="dipl_scroll_stack_cards_item">
								<div class="dipl_scroll_stack_cards_item_inner">
									<div class="dipl_scroll_stack_cards_content_wrapper">
										<div class="dipl_scroll_stack_cards_icon_wrapper"><span class="et-pb-icon">r</span></div>
										<div class="dipl_scroll_stack_cards_title_wrap">
											<h2 class="dipl_scroll_stack_cards_title">Stretch and Heal Your Body</h2></div>
										<div class="dipl_scroll_stack_cards_content">
											<p><span>Relieve tension, open your joints, and boost posture with gentle stretching routines. Ideal for all levels and great for ending your day relaxed.</span></p>
										</div>
										<div class="et_pb_button_wrapper"><a class="et_pb_button" href="#">Try Healing Poses</a></div>
									</div>
									<div class="dipl_scroll_stack_cards_image_wrapper"><img decoding="async" src="http://elicus-divi.local/wp-content/uploads/2024/12/vanilla-latte.png" alt="" srcset="http://elicus-divi.local/wp-content/uploads/2024/12/vanilla-latte.png 300w, http://elicus-divi.local/wp-content/uploads/2024/12/vanilla-latte-150x150.png 150w, http://elicus-divi.local/wp-content/uploads/2024/12/vanilla-latte-100x100.png 100w"
										sizes="(max-width: 300px) 100vw, 300px" class="et_pb_image dipl_scroll_stack_cards_image"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php
		}
	}
}