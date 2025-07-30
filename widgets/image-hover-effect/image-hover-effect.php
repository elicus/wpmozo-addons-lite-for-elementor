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
use Elementor\Plugin;
use Elementor\Icons_Manager;
if ( ! class_exists( 'WPMOZO_AE_Image_Hover_Effect' ) ) {
	class WPMOZO_AE_Image_Hover_Effect extends Widget_Base {
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
			return 'wpmozo_ae_image_hover_effect';
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
			return esc_html__( 'Image Hover Effect', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz image hover effect', 'wpmozo image hover effect' );
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
			return 'wpmozo-ae-icon-image-hover-effect wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-image-hover-effect-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-image-hover-effect-style' );
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
			include_once plugin_dir_path( __DIR__ ) . 'image-hover-effect/assets/controls/controls.php';
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

			$image_url    = ! empty( $settings['render_image']['url'] ) ? $settings['render_image']['url'] : '';
			$image_alt    = ! empty( $settings['image_alt_tag'] ) ? $settings['image_alt_tag'] : '';
			$hover_effect = ! empty( $settings['hover_effect'] ) ? $settings['hover_effect'] : 'circle';

			// Effect classes.
			$classes = array( 'wpmozo_image_hover_effect_inner' );

			// Unique ID for applying CSS targeting.
			$unique_id = 'wpmozo_' . uniqid();

			// Style string only for non-glitch effects.
			$inline_style = '';

			switch ( $hover_effect ) {
				case 'circle':
					$classes[] = 'circle zoom';
					break;
				case 'glow':
					$classes[] = 'filter zoom';
					break;
				case 'rotate':
					$classes[] = 'rotate';
					break;
				case 'flash':
					$classes[] = 'flash filter zoom';
					break;
				case 'flash_instant':
					$classes[] = 'flash_inst_rev filter zoom';
					break;
				case 'diagonal':
					$classes[] = 'diagonal zoom';
					break;
				case 'glitch':
					$classes[] = 'wpmozo_glitch_image';
					break; // no inline style.
				case 'slide_glitch':
					$classes[] = 'wpmozo_slide_glitch';
					if ( ! empty( $image_url ) ) {
						$inline_style = 'background-image: url(' . esc_url( $image_url ) . ');';
					}
					break;
			}

			?>
			<div class="wpmozo_image_hover_effect">
				<?php if ( ! empty( $image_url ) ) : ?>
					<div class="wpmozo_image_hover_effect_wrapper wpmozo_effect_<?php echo esc_attr( $hover_effect ); ?>">
						<div class="<?php echo esc_attr( implode( ' ', $classes ) . ' ' . $unique_id ); ?>" 
						<?php
						if ( $inline_style ) {
							echo 'style="' . esc_attr( $inline_style ) . '"';}
						?>
						>
							
							<img
								decoding="async"
								src="<?php echo esc_url( $image_url ); ?>"
								alt="<?php echo esc_attr( $image_alt ); ?>"
								loading="lazy"
							/>
		
							<?php if ( 'slide_glitch' === $hover_effect ) : ?>
								<div class="wpmozo_slide_glitch_overlay">
									<div class="quadrant quad1"></div>
									<div class="quadrant quad2"></div>
									<div class="quadrant quad3"></div>
									<div class="quadrant quad4"></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
		
					<?php if ( 'glitch' === $hover_effect ) : ?>
						<style>
							.<?php echo esc_attr( $unique_id ); ?>.wpmozo_glitch_image::before {
								background-image: url('<?php echo esc_url( $image_url ); ?>');
							}
						</style>
					<?php endif; ?>
				<?php else : ?>
					<div class="wpmozo_image_hover_effect_no_image">
						<p>
							<?php esc_html_e( 'No image selected', 'wpmozo-addons-lite-for-elementor' ); ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
			<?php
		}
	}
}