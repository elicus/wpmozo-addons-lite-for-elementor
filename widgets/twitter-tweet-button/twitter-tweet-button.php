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

if ( !class_exists( 'WPMOZO_AE_Twitter_Tweet_Button' ) ) {
	class WPMOZO_AE_Twitter_Tweet_Button extends Widget_Base {

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
			return 'wpmozo_ae_twitter_tweet_button';
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
			return esc_html__( 'Twitter Share Button', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz twitter tweet button','wpmozo twitter tweet button','wpmz x tweet button','wpmozo x tweet button','wpmz social media widgets','wpmozo social media widgets' );
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
			return 'wpmozo-ae-icon-twitter-tweet-button wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-twitter-tweet-button', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-twitter-tweet-button' );
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
			wp_register_script( 'wpmozo-ae-twitter-tweet-button-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-twitter-tweet-button-script' );
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
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'twitter-tweet-button/assets/controls/controls.php';
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
			$settings 		= $this->get_settings_for_display();
		
			$button_size 	= esc_attr( $settings[ 'button_size' ] );
			$do_not_track 	= ( $settings[ 'do_not_track' ] === 'yes' ) ? 'true' : 'false';
			$custom_text 	= !empty( $settings[ 'custom_text' ] ) ? esc_html( $settings[ 'custom_text' ] ) : '';
			$custom_url 	= !empty( $settings[ 'custom_url' ] ) ? esc_url( $settings[ 'custom_url' ] ) : '';
			$hashtags 		= !empty( $settings[ 'hashtags' ] ) ? esc_attr( $settings[ 'hashtags' ] ) : '';
			$via 			= !empty( $settings[ 'via' ] ) ? esc_attr( $settings[ 'via' ] ) : '';
			$related 		= !empty( $settings[ 'related' ] ) ? esc_attr( $settings[ 'related' ]) : '';
		
			?>
			<div class="wpmozo_twitter_tweet_button">
				<div class="wpmozo_twitter_embedded_tweet_button">
					<a class="wpmozo_twitter_embed_tweet_button" 
					   href="https://twitter.com/intent/tweet" 
					   data-text="<?php echo esc_attr( $custom_text ); ?>" 
					   data-url="<?php echo esc_attr( $custom_url ); ?>" 
					   data-size="<?php echo esc_attr( $button_size ); ?>" 
					   data-dnt="<?php echo esc_attr( $do_not_track ); ?>" 
					   data-hashtags="<?php echo esc_attr( $hashtags ); ?>" 
					   data-via="<?php echo esc_attr( $via ); ?>" 
					   data-related="<?php echo esc_attr( $related ); ?>">
						Tweet
					</a>
				</div>
			</div>
			<?php
		}
				
	}
}
