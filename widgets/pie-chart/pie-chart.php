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

if ( ! class_exists( 'WPMOZO_AE_Pie_Chart' ) ) {
	class WPMOZO_AE_Pie_Chart extends Widget_Base {


		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.9.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_pie_chart';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.9.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Pie Chart', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.9.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz pie chart', 'wpmozo pie chart' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.9.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-pie-chart  wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.9.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since  1.9.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */
		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-pie-chart-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-pie-chart-script', 'wpmozo-ae-chart' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.9.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'pie-chart/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.9.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();

			$render_empty_message = function () {
				?>
				<div class="wpmozo_pie_chart wpmozo_pie_chart_empty">
					<div class="wpmozo_pie_chart_empty_message">
						<?php echo esc_html__( 'No pies found! Please add some pie items to view result.', 'wpmozo-addons-lite-for-elementor' ); ?>
					</div>
				</div>
				<?php
			};

			if ( empty( $settings['pie_chart_items'] ) || ! is_array( $settings['pie_chart_items'] ) ) {
				$render_empty_message();
				return;
			}

			$labels        = array();
			$values        = array();
			$bg_colors     = array();
			$border_colors = array();

			foreach ( $settings['pie_chart_items'] as $item ) {

				if ( empty( $item['item_label'] ) || '' === $item['item_value'] ) {
					continue;
				}

				$labels[] = esc_html( $item['item_label'] );
				$values[] = floatval( $item['item_value'] );

				$bg_colors[] = ! empty( $item['item_background_color'] )
					? esc_attr( $item['item_background_color'] )
					: 'rgba(0,0,0,0.2)';

				$border_colors[] = ! empty( $item['item_border_color'] )
					? esc_attr( $item['item_border_color'] )
					: '#000000';
			}

			if ( empty( $labels ) ) {
				$render_empty_message();
				return;
			}

			$border_width = ! empty( $settings['pie_chart_border_size']['size'] )
				? intval( $settings['pie_chart_border_size']['size'] )
				: 0;

			$chart_data = array(
				'labels'   => $labels,
				'datasets' => array(
					array(
						'data'            => $values,
						'backgroundColor' => $bg_colors,
						'borderColor'     => $border_colors,
						'borderWidth'     => $border_width,
					),
				),
			);

			$height_desktop = ! empty( $settings['pie_chart_height']['size'] )
				? intval( $settings['pie_chart_height']['size'] )
				: 400;

			$height_tablet = ! empty( $settings['pie_chart_height_tablet']['size'] )
				? intval( $settings['pie_chart_height_tablet']['size'] )
				: $height_desktop;

			$height_mobile = ! empty( $settings['pie_chart_height_mobile']['size'] )
				? intval( $settings['pie_chart_height_mobile']['size'] )
				: $height_tablet;

			?>
			<div class="wpmozo_pie_chart">
				<div class="wpmozo_pie_chart_wrapper"
					data-chart="<?php echo esc_attr( wp_json_encode( $chart_data ) ); ?>"
					data-chart_height="<?php echo esc_attr( $height_desktop ); ?>"
					data-chart_height_tablet="<?php echo esc_attr( $height_tablet ); ?>"
					data-chart_height_phone="<?php echo esc_attr( $height_mobile ); ?>" >
					<div class="wpmozo_pie_chart_inner">
						<canvas></canvas>
					</div>
				</div>
			</div>
			<?php
		}
	}
}
