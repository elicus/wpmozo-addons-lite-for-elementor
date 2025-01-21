<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( !class_exists( 'WPMOZO_AE_Twitter_Follow_Button' ) ) {
	class WPMOZO_AE_Twitter_Follow_Button extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_twitter_follow_button';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Twitter Follow Button', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz twitter follow button','wpmozo twitter follow button','wpmz x follow button','wpmozo x follow button','wpmz social media widgets','wpmozo social media widgets' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-twitter-follow-button wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.3.0
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
		 * @since 1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-twitter-follow-button', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-twitter-follow-button' );
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
			wp_register_script( 'wpmozo-ae-twitter-follow-button-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-twitter-follow-button-script' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'twitter-follow-button/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();
		
			$twitter_username = esc_attr($settings['twitter_username']);
			$button_size = esc_attr($settings['button_size']);
			$show_username = $settings['show_username'] === 'yes' ? 'true' : 'false';
			$do_not_track = $settings['do_not_track'] === 'yes' ? 'true' : 'false';
			?>
			<div class="wpmozo_twitter_follow_button">
				<div class="wpmozo_twitter_embedded_follow_button">
					<a class="wpmozo_twitter_embed_follow_button" 
					href="https://twitter.com/<?php echo $twitter_username; ?>" 
					data-show-screen-name="<?php echo $show_username; ?>" 
					data-size="<?php echo $button_size; ?>" 
					data-dnt="<?php echo $do_not_track; ?>" 
					data-name="<?php echo $twitter_username; ?>">
					Follow @<?php echo $twitter_username; ?>
					</a>
				</div>
			</div>
			<?php
		}		
	}
}
