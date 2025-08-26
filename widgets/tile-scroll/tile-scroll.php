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
if ( ! class_exists( 'WPMOZO_AE_Tile_Scroll' ) ) {
	class WPMOZO_AE_Tile_Scroll extends Widget_Base {
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
			return 'wpmozo_ae_tile_scroll';
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
			return esc_html__( 'Tile Scroll', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz tile scroll', 'wpmozo tile scroll' );
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
			return 'wpmozo-ae-icon-tile-scroll wpmozo-ae-brandicon';
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
			wp_register_style( 'wpmozo-ae-tile-scroll-style', plugins_url( 'assets/css/style.min.css?tester=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-tile-scroll-style', 'wpmozo-ae-locomotiveScroll-style' );
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
			wp_register_script( 'wpmozo-ae-tile-scroll-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-tile-scroll-script', 'wpmozo-ae-imagesLoaded', 'wpmozo-ae-locomotiveScroll' );
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
			require plugin_dir_path( __DIR__ ) . 'tile-scroll/assets/controls/controls.php';
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
			$settings       = $this->get_settings_for_display();
			$page_id        = get_the_ID(); // Elementor Page/Post ID.
			$widget_id      = $this->get_id(); // Widget instance ID (unique per widget).
			$images_items   = is_array( $settings['images'] ) ? $settings['images'] : array();
			$no_images_text = isset( $settings['no_images_text'] ) ? $settings['no_images_text'] : 'No Images Found!';
			//$image_size     = ! empty( $settings['image_size_size'] ) ? esc_attr( $settings['image_size_size'] ) : 'full';
			?>
			<div id="tile_scroll" class="demo-1 loading">
				<div data-scroll-container class="mainclass">
					<section class="tiles tiles--rotated" id="grid2">
						<div class="tiles__wrap">
						<?php if ( ! empty( $images_items ) ) : ?>
							<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
								<div class="tiles__line-img"></div>
								<div class="tiles__line-img"></div>
								<div class="tiles__line-img"></div>
								<?php foreach ( $images_items as $items ) : ?>
								<div class="tiles__line-img" style="background-image:url(<?php echo esc_url( $items['url'] ); ?>)"></div>
								<?php endforeach; ?>
							</div>
							<div class="tiles__line" data-scroll data-scroll-speed="-1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
								<div class="tiles__line-img"></div>
								<?php foreach ( $images_items as $items ) : ?>
								<div class="tiles__line-img" style="background-image:url(<?php echo esc_url( $items['url'] ); ?>)"></div>
								<?php endforeach; ?>
							</div>
							<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
								<?php foreach ( $images_items as $items ) : ?>
								<div class="tiles__line-img" style="background-image:url(<?php echo esc_url( $items['url'] ); ?>)"></div>
								<?php endforeach; ?>
							</div>
							<div class="tiles__line" data-scroll data-scroll-speed="-1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
								<?php foreach ( $images_items as $items ) : ?>
								<div class="tiles__line-img" style="background-image:url(<?php echo esc_url( $items['url'] ); ?>)"></div>
								<?php endforeach; ?>
							</div>
							<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
								<?php foreach ( $images_items as $items ) : ?>
								<div class="tiles__line-img" style="background-image:url(<?php echo esc_url( $items['url'] ); ?>)"></div>
								<?php endforeach; ?>
								<div class="tiles__line-img"></div>
								<div class="tiles__line-img"></div>
							</div>
						<?php else : ?>
							<div class="wpmozo_tile_scroll_no_item">
								<h3><?php echo esc_html( $no_images_text ); ?></h3>
							</div>
						<?php endif; ?>
						</div>
					</section>
				</div>
			</div>
			<?php
		}
	}
}