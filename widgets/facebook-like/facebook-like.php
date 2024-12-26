<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Facebook_Like' ) ) {
	class WPMOZO_AE_Facebook_Like extends Widget_Base {

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
			return 'wpmozo_ae_facebook_like';
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
			return esc_html__( 'Facebook Like', 'wpmozo-addons-lite-for-elementor' );
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
			return 'wpmozo-ae-icon-facebook-like wpmozo-ae-brandicon';
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
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-facebook-like-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-facebook-like-style' );

		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-facebook-like-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-facebook-like-script' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'facebook-like/assets/controls/controls.php';
		}
		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.4.0
		 * @access protected
		 */
		protected function render() {
			$settings           = $this->get_settings_for_display();
			$facebook_app_id	= '' !== $settings['facebook_app_id'] ?  (int) $settings['facebook_app_id'] : '';
			$page_url 			= $settings['page_url'];
			$button_action 		= $settings['button_action'];
			$button_layout		= $settings['button_layout'];
			$button_size		= $settings['button_size'];
			$share_button		= $settings['share_button'];
			$lazy_loading		= $settings['lazy_loading'];
			$this->add_render_attribute('fb_like_main_wrapper', 'class', 'wpmozo_fb_like_button');
			$this->add_render_attribute(
				'fb_like_wrapper',
				array(
					'class'        			=> 'fb-like',
					'data-href' 			=> esc_url($page_url),
					'data-layout'			=> esc_html($button_layout),
					'data-action'			=> esc_html($button_action),
					'data-size'				=> esc_html($button_size),
					'data-share'			=> 'yes' === $share_button ? 'true' : 'false',
					'data-lazy'				=> 'yes' === $lazy_loading ? 'true' : 'false',
					'data-app-id'			=> esc_html($facebook_app_id),
				)
			);
			if ( !empty($facebook_app_id) ) {
				if( !empty($page_url) ) {
					?>
						<div <?php $this->print_render_attribute_string( 'fb_like_main_wrapper' ); ?>>
							<div <?php $this->print_render_attribute_string( 'fb_like_wrapper' ); ?>>
							</div>
						</div>
					<?php
				}else{
					?>
						<p> <?php echo esc_html__('Please enter a page URL.', 'wpmozo-addons-lite-for-elementor'); ?> </p>
					<?php
				}
			}else {
				?>
					<p><?php echo esc_html__('Please enter your Facebook App ID.', 'wpmozo-addons-lite-for-elementor'); ?></p>
				<?php
			}
		}
	}
}