<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Sticky_Video' ) ) {
	class WPMOZO_AE_Sticky_Video extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since  1.8.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_sticky_video';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since  1.8.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Sticky Video', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz sticky video', 'wpmozo sticky video', 'wpmozo stickyvideo', 'wpmz stickyvideo' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since  1.8.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-sticky-video wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since  1.8.0
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
		 * @since  1.8.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-sticky-video-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-sticky-video-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-sticky-video-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array(  'wpmozo-ae-sticky-video-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since  1.8.0
		 * @access protected
		 */
		protected function register_controls() {

			// Separate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'sticky-video/assets/controls/controls.php';
		}


		/**
		 * Check YouTube URL and return video ID
		 */
		private function get_youtube_id( $url ) {
			if ( preg_match( '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches ) ) {
				return $matches[1];
			}
			return false;
		}

		/**
		 * Check Vimeo URL and return video ID
		 */
		private function get_vimeo_id( $url ) {
			if ( preg_match( '/vimeo\.com\/(?:video\/)?([0-9]+)/', $url, $matches ) ) {
				return $matches[1];
			}
			return false;
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since  1.8.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();
		
			$sticky_video   = $settings['sticky_video']['url'] ?? '';
			$video_image    = $settings['video_image']['url'] ?? '';
			$play_icon      = $settings['play_icon'] ?? '';
			$video_position = $settings['video_position'] ?? 'bottom_right';
		
			$youtube_id = $sticky_video ? $this->get_youtube_id( $sticky_video ) : false;
			$vimeo_id   = $sticky_video ? $this->get_vimeo_id( $sticky_video ) : false;
		
			$this->add_render_attribute(
				'sticky_inner',
				'class',
				array(
					'wpmozo_sticky_video_inner',
					'wpmozo_position_' . esc_attr( $video_position ),
				)
			);
		
			$this->add_render_attribute(
				'video_overlay',
				'class',
				'wpmozo_video_overlay'
			);
		
			if ( ! empty( $video_image ) ) {
				$this->add_render_attribute(
					'video_overlay',
					'style',
					'background-image:url(' . esc_url( $video_image ) . ')'
				);
			}
			?>
		
			<div class="wpmozo_sticky_video">
				<div class="wpmozo_sticky_video_wrapper">
					<div <?php $this->print_render_attribute_string( 'sticky_inner' ); ?>>
						<div class="wpmozo_video_box">
		
							<?php if ( $youtube_id ) : ?>
		
								<iframe
									src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id ); ?>?enablejsapi=1&rel=0"
									frameborder="0"
									allow="autoplay; encrypted-media"
									allowfullscreen>
								</iframe>
		
							<?php elseif ( $vimeo_id ) : ?>
		
								<iframe
									src="https://player.vimeo.com/video/<?php echo esc_attr( $vimeo_id ); ?>?api=1&player_id=vimeo_<?php echo esc_attr( $vimeo_id ); ?>"
									frameborder="0"
									allow="autoplay; fullscreen"
									allowfullscreen>
								</iframe>
		
							<?php elseif ( ! empty( $sticky_video ) ) : ?>
		
								<video controls>
									<source src="<?php echo esc_url( $sticky_video ); ?>" type="video/mp4">
								</video>
		
							<?php endif; ?>
		
							<div <?php $this->print_render_attribute_string( 'video_overlay' ); ?>>
								<div class="wpmozo_video_overlay_hover">
									<a href="#" class="wpmozo_video_play">
										<?php
										if ( ! empty( $play_icon ) ) {
											Icons_Manager::render_icon(
												$play_icon,
												array(
													'class'       => array( 'wpmozo_play_icon' ),
													'aria-hidden' => 'true',
												)
											);
										}
										?>
									</a>
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