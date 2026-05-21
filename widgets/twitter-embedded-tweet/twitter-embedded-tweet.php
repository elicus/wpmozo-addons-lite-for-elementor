<?php

/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;

if ( !class_exists( 'WPMOZO_AE_Twitter_Embedded_Tweet' ) ) {
	class WPMOZO_AE_Twitter_Embedded_Tweet extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_twitter_embedded_tweet';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Twitter Embedded Tweet', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-twitter-embedded-tweet wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
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
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-twitter-embedded-tweet', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-twitter-embedded-tweet' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */

		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-twitter-embedded-tweet-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-twitter-embedded-tweet-script' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'twitter-embedded-tweet/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();
		
			//$do_not_track = $settings['do_not_track'] === 'yes' ? 'true' : 'false';


			$tweet_id 				= esc_attr( $settings[ 'tweet_id' ] );
			$theme					= esc_attr( $settings[ 'theme' ] );
			$tweet_max_width 		= isset( $settings[ 'tweet_max_width' ] ) ? $settings[ 'tweet_max_width' ] : ''; // Retrieve the entire array
			$tweet_max_width_value 	= isset( $tweet_max_width[ 'size' ] ) ? esc_attr( $tweet_max_width[ 'size' ] ) : ''; // Get the numeric size
			$tweet_max_width_unit 	= isset( $tweet_max_width[ 'unit' ] ) ? esc_attr( $tweet_max_width[ 'unit' ] ) : ''; // Get the unit (e.g., 'px')
			$cards 					= 'yes' === $settings[ 'cards' ] ? 'visible' : 'hidden';
			$conversation 			= 'yes' === $settings[ 'conversation' ] ? 'all' : 'none';
			$do_not_track   		= 'yes' === $settings[ 'do_not_track' ] ? 'true' : 'false';
			//$text_orientation   = isset( $settings['text_orientation'] ) ? $settings['text_orientation'] : 'left';
			$content				= wp_kses_post( $settings[ 'content' ] );
			?>
			<div class="wpmozo_twitter_embedded_tweet">
				<div class="wpmozo_twitter_embedded_tweet_wrapper">
					<blockquote class="wpmozo_tweet" 
							data-id="<?php echo $tweet_id; ?>" 
							data-cards="<?php echo $cards; ?>" 
							data-conversation="<?php echo $conversation; ?>" 
							data-theme="<?php echo $theme; ?>" 
							data-dnt="<?php echo $do_not_track; ?>" 
							data-width="<?php echo $tweet_max_width_value . $tweet_max_width_unit; ?>" 
							role="blockquote">
						<?php echo $content; ?>
					</blockquote>
				</div>
    		</div>
			<?php
		}		
	}
}
