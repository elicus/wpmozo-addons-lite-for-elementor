<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2026 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;
use Elementor\Controls_Manager;

if ( ! class_exists( 'WPMOZO_AE_Image_Card_Ticker' ) ) {
	class WPMOZO_AE_Image_Card_Ticker extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_image_card_ticker';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Image Card Ticker', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz image card ticker', 'wpmozo image card ticker' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.8.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-image-card-ticker wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.8.0
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
		 * @since 1.8.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-image-card-ticker-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

			return array( 'wpmozo-ae-image-card-ticker-style' );
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
			wp_register_script( 'wpmozo-ae-image-card-ticker-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-image-card-ticker-script', 'wpmozo-ae-gsap', 'wpmozo-ae-imagesloaded' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.8.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'image-card-ticker/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.8.0
		 * @access protected
		 */
		protected function render() {
			$settings = $this->get_settings_for_display();

			$image_card = is_array( $settings['image_card'] ) ? $settings['image_card'] : array();
			if ( empty( $image_card ) ) {
				return; // Exit early if no images.
			}
			$layout              = isset( $settings['layout'] ) && ! empty( $settings['layout'] ) ? $settings['layout'] : 'marquee';
			$pause_on_hover      = isset( $settings['pause_on_hover'] ) && ! empty( $settings['pause_on_hover'] ) ? $settings['pause_on_hover'] : 'yes';
			$images_gap          = isset( $settings['images_gap']['size'] ) && ! empty( $settings['images_gap'] ) ? $settings['images_gap']['size'] : 30;
			$images_gap_tablet   = isset( $settings['images_gap_tablet']['size'] ) && ! empty( $settings['images_gap'] ) ? $settings['images_gap_tablet']['size'] : 30;
			$images_gap_mobile   = isset( $settings['images_gap_mobile']['size'] ) && ! empty( $settings['images_gap'] ) ? $settings['images_gap_mobile']['size'] : 30;
			$ticker_speed        = isset( $settings['ticker_speed']['size'] ) && ! empty( $settings['ticker_speed']['size'] ) ? $settings['ticker_speed']['size'] : 45;
			$ticker_speed_tablet = isset( $settings['ticker_speed_tablet']['size'] ) && ! empty( $settings['ticker_speed_tablet']['size'] ) ? $settings['ticker_speed_tablet']['size'] : 45;
			$ticker_speed_mobile = isset( $settings['ticker_speed_mobile']['size'] ) && ! empty( $settings['ticker_speed_mobile']['size'] ) ? $settings['ticker_speed_mobile']['size'] : 45;
			$image_width         = isset( $settings['image_width']['size'] ) && ! empty( $settings['image_width']['size'] ) ? $settings['image_width']['size'] : 200;
			$image_width_tablet  = isset( $settings['image_width_tablet']['size'] ) && ! empty( $settings['image_width_tablet']['size'] ) ? $settings['image_width_tablet']['size'] : 200;
			$image_width_mobile  = isset( $settings['image_width_mobile']['size'] ) && ! empty( $settings['image_width_mobile']['size'] ) ? $settings['image_width_mobile']['size'] : 200;
			$image_height        = isset( $settings['image_height']['size'] ) && ! empty( $settings['image_height']['size'] ) ? $settings['image_height']['size'] : 150;
			$image_height_tablet = isset( $settings['image_height_tablet']['size'] ) && ! empty( $settings['image_height_tablet']['size'] ) ? $settings['image_height_tablet']['size'] : 150;
			$image_height_mobile = isset( $settings['image_height_mobile']['size'] ) && ! empty( $settings['image_height_mobile']['size'] ) ? $settings['image_height_mobile']['size'] : 150;

			if ( 'marquee' === $layout ) {
				$direction        = isset( $settings['marquee_direction'] ) && ! empty( $settings['marquee_direction'] ) ? $settings['marquee_direction'] : 'left';
				$direction_tablet = isset( $settings['marquee_direction_tablet'] ) && ! empty( $settings['marquee_direction_tablet'] ) ? $settings['marquee_direction_tablet'] : 'left';
				$direction_mobile = isset( $settings['marquee_direction_mobile'] ) && ! empty( $settings['marquee_direction_mobile'] ) ? $settings['marquee_direction_mobile'] : 'left';
			} else {
				$direction        = isset( $settings['direction'] ) && ! empty( $settings['direction'] ) ? $settings['direction'] : 'left';
				$direction_tablet = isset( $settings['direction_tablet'] ) && ! empty( $settings['direction_tablet'] ) ? $settings['direction_tablet'] : 'left';
				$direction_mobile = isset( $settings['direction_mobile'] ) && ! empty( $settings['direction_mobile'] ) ? $settings['direction_mobile'] : 'left';
			}
			// Base wrapper classes.
			$this->add_render_attribute(
				'ticker_wrapper',
				'class',
				array(
					'wpmozo_image_card_ticker_wrapper',
					'layout-' . $layout,
					'direction_mobile-' . $direction_mobile,
					'direction_tablet-' . $direction_tablet,
					'direction-' . $direction,
				)
			);

			// Common data attributes.
			$attributes = array(
				'layout'              => $layout,
				'pause_on_hover'      => $pause_on_hover,
				'direction'           => $direction,
				'direction_tablet'    => $direction_tablet,
				'direction_mobile'    => $direction_mobile,
				'image_gap'           => $images_gap,
				'image_gap_tablet'    => $images_gap_tablet,
				'image_gap_mobile'    => $images_gap_mobile,
				'ticker_speed'        => $ticker_speed,
				'ticker_speed_tablet' => $ticker_speed_tablet,
				'ticker_speed_mobile' => $ticker_speed_mobile,
				'image_width'         => $image_width,
				'image_width_tablet'  => $image_width_tablet,
				'image_width_mobile'  => $image_width_mobile,
				'image_height'        => $image_height,
				'image_height_tablet' => $image_height_tablet,
				'image_height_mobile' => $image_height_mobile,
			);

			foreach ( $attributes as $key => $value ) {
				$this->add_render_attribute( 'ticker_wrapper', 'data-' . $key, $value );
			}

			?>
			<div class="wpmozo_image_card_ticker">
			<?php if ( 'curve' === $layout ) : ?>
			
		<?php endif; ?> 
				<div class="wpmozo_image_card_ticker_inner_wrap">
				<div <?php $this->print_render_attribute_string( 'ticker_wrapper' ); ?>>
						<div class="wpmozo_image_card_ticker_inner">
							<?php
							foreach ( $image_card as $item ) {
								if ( ! empty( $item['id'] ) ) {
									if ( '3d_circular' === $layout || 'curve' === $layout ) {
										?>
										<div class="wpmozo_image_card_ticker_image_wrapper"><?php echo wp_get_attachment_image( $item['id'], 'full' ); ?></div>
										<?php
									} else {
										echo wp_get_attachment_image( $item['id'], 'full' );
									}
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}
}