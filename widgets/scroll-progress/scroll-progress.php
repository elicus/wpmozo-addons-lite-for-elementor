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
use Elementor\Utils;

if ( ! class_exists( 'WPMOZO_AE_Scroll_Progress' ) ) {
	class WPMOZO_AE_Scroll_Progress extends Widget_Base {

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
			return 'wpmozo_ae_scroll_progress';
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
			return esc_html__( 'Scroll Progress', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz progress bar', 'wpmozo progress bar','wpmz scroll progress', 'wpmozo scroll progress','wpmz scroll tracker', 'wpmozo scroll tracker' );
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
			return 'wpmozo-ae-icon-scroll-progress wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-scroll-progress-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-scroll-progress-style' );
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
			wp_register_script( 'wpmozo-ae-scroll-progress-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-scroll-progress-script' );
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
			require plugin_dir_path( __DIR__ ) . 'scroll-progress/assets/controls/controls.php';
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

			$layout          = isset( $settings['layout'] ) ? $settings['layout'] : 'bar';
			$progress_number = ( 'yes' === $settings['show_progress_number'] ) ? 'on' : 'off';
			$show_striped    = ( 'yes' === $settings['show_striped'] ) ? 'striped' : 'no_striped';
			$bar_direction   = isset( $settings['bar_direction'] ) ? $settings['bar_direction'] : 'horizontal';

			?>
		
			<div class="wpmozo_scroll_progress">
				<div class="wpmozo_scroll_progress_wrapper wpmozo_scroll_progress_layout_<?php echo esc_attr( $layout ); ?> wpmozo_scroll_progress_<?php echo esc_attr( $show_striped ); ?>" data-show_number="<?php echo esc_attr( $progress_number ); ?>" 
				<?php
				if ( 'bar' === $layout ) {
					?>
					data-bar_direction="<?php echo esc_attr( $bar_direction ); ?>"<?php } ?>>
					<div class="wpmozo_scroll_progress_inner">
						<?php if ( 'bar' === $layout ) { ?>
						<?php } elseif ( 'circle' === $layout ) { ?>
							<svg class="wpmozo_scroll_progress_circle" viewBox="0 0 100 100">
								<circle class="wpmozo_fill_scroll_progress_bg" cx="50" cy="50" r="45"></circle>
								<circle class="wpmozo_circle_bg" cx="50" cy="50" r="45"></circle>
								<circle class="wpmozo_circle_fg" cx="50" cy="50" r="45"></circle>
							</svg>
							<?php if ( 'yes' === $settings['show_progress_number'] ) { ?>
								<span class="wpmozo_scroll_progress_percent"></span>
							<?php } ?>
						<?php } elseif ( 'half_circle' === $layout ) { ?>
							<svg class="wpmozo_half_circle" viewBox="0 0 200 100">
								<path class="wpmozo_circle_bg" d="M 10 100 A 90 90 0 0 1 190 100"></path>
								<path class="wpmozo_circle_fg" d="M 10 100 A 90 90 0 0 1 190 100"></path>
							</svg>
							<?php if ( 'yes' === $settings['show_progress_number'] ) { ?>
								<span class="wpmozo_scroll_progress_percent"></span>
							<?php } ?>
						<?php } ?>	
					</div>
					<?php if ( 'yes' === $settings['show_progress_number'] ) { ?>
						<span class="wpmozo_scroll_progress_percent"></span>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}
}