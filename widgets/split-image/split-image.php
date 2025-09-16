<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.2
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
use Elementor\Widget_Base;
use Elementor\Utils;

if ( ! class_exists( 'WPMOZO_AE_Split_Image' ) ) {
	class WPMOZO_AE_Split_Image extends Widget_Base {

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
			return 'wpmozo_ae_split_image';
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
			return esc_html__( 'Split Image', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz split image', 'wpmozo split image' );
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
			return 'wpmozo-ae-icon-split-image wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-splitimage-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-splitimage-style' );
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
			wp_register_script( 'wpmozo-ae-splitimage-script', plugins_url( 'assets/js/script.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-splitimage-script' );
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
			require plugin_dir_path( __DIR__ ) . 'split-image/assets/controls/controls.php';
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

			$rows    = isset( $settings['image_row']['size'] ) ? $settings['image_row']['size'] : 3;
			$columns = isset( $settings['image_columns']['size'] ) ? $settings['image_columns']['size'] : 3;
			$gap     = ! empty( $settings['image_gap']['size'] ) ? $settings['image_gap']['size'] : 0;

			$image_url = '';
			$image_id  = '';

			if ( ! empty( $settings['split_image']['id'] ) ) {
				$image_id  = $settings['split_image']['id'];
				$image_url = $settings['split_image']['url'];
			} else {
				// Fallback Elementor's placeholder image.
				$image_url = Utils::get_placeholder_image_src();
				$image_id  = attachment_url_to_postid( $image_url );

				// If the placeholder image doesn't return an ID, set a fixed fallback.
				if ( ! $image_id ) {
					$image_id = 0; // fallback.
				}
			}
			// Use helper function if ID exists, otherwise fallback to a fixed aspect ratio.
			$aspect_ratio = $image_id ? wpmozo_get_image_aspect_ratio( $image_id ) : '3/2';

			?>
		
			<div class="wpmozo_split_image">
				<div class="wpmozo_split_image_wrapper"
					data-rows="<?php echo esc_attr( $rows ); ?>"
					data-columns="<?php echo esc_attr( $columns ); ?>"
					data-image="<?php echo esc_url( $image_url ); ?>"
					style="<?php if ( $aspect_ratio ) : ?>
							aspect-ratio: <?php echo esc_attr( $aspect_ratio ); ?>;
						<?php endif; ?>
						gap: <?php echo esc_attr( $gap ); ?>px;">
					<?php
					for ( $i = 1; $i <= ( $rows * $columns ); $i++ ) {
						?>
						<span class="wpmozo_split_image_portion"></span>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}
}