<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
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
			wp_register_style( 'wpmozo-ae-image-card-ticker-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION );

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
			wp_register_script( 'wpmozo-ae-image-card-ticker-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-image-card-ticker-script', 'wpmozo-ae-gsap', 'wpmozo-ae-scrollTrigger', 'wpmozo-ae-imagesloaded' );
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
				return; // Exit early if no images
			}
		
			$layout            = ! empty( $settings['layout'] ) ? $settings['layout'] : 'marquee';
			$marquee_direction = ! empty( $settings['marquee_direction'] ) ? $settings['marquee_direction'] : 'left';
		
			// Slider fields (extract 'size' safely)
			$images_gap = isset( $settings['images_gap']['size'] ) ? $settings['images_gap']['size'] : 30;
			$ticker_speed = isset( $settings['ticker_speed']['size'] ) ? $settings['ticker_speed']['size'] : 5;
		
			// Optional static fields
			$image_width = ! empty( $settings['image_width']['size'] ) ? $settings['image_width']['size'] : '200px';
			$image_height = ! empty( $settings['image_height']['size'] ) ? $settings['image_height']['size'] : '150px';
			
			?>
			<div class="dipl_image_card_ticker">
			<?php if ( 'curve' === $layout ) : ?>
			<svg width="0" height="0" style="position:absolute">
				<defs>
					<mask id="dipl_image_card_ticker_curve_mask" x="0" y="0" width="1" height="1" maskContentUnits="objectBoundingBox">
						<rect x="0" y="0" width="1" height="1" fill="black"></rect>
						<path d="M0,0 Q0.5,0.25 1,0 V1 Q0.5,0.75 0,1 Z" fill="white"></path>
					</mask>
				</defs>
			</svg>
		<?php endif; ?> 
				<div class="dipl_image_card_ticker_inner_wrap">
					<div
						class="dipl_image_card_ticker_wrapper layout-<?php echo esc_attr( $layout ); ?> <?php if ( 'marquee' === $layout ) { ?>direction-<?php echo esc_attr( $marquee_direction ); } ?>"
						data-layout="<?php echo esc_attr( $layout ); ?>"
						<?php if ( 'marquee' === $layout ) { ?>data-direction="<?php echo esc_attr( $marquee_direction ); ?>"<?php } ?>
						data-image_gap="<?php echo esc_attr( $images_gap ); ?>"
						data-ticker_speed="<?php echo esc_attr( $ticker_speed ); ?>"
						data-image_width="<?php echo esc_attr( $image_width ); ?>"
						data-image_height="<?php echo esc_attr( $image_height ); ?>"
					>
						<div class="dipl_image_card_ticker_inner">
							<?php
							foreach ( $image_card as $item ) {
								if ( ! empty( $item['id'] ) ) {
									if ( '3d_circular' === $layout || 'curve' === $layout ) { ?>
										<div class="dipl_image_card_ticker_image_wrapper"><?php echo wp_get_attachment_image( $item['id'], 'full' ); ?></div>
									<?php } else {
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