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

if ( ! class_exists( 'WPMOZO_AE_Bar_Chart' ) ) {
	class WPMOZO_AE_Bar_Chart extends Widget_Base {


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
			return 'wpmozo_ae_bar_chart';
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
			return esc_html__( 'Bar Chart', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz bar chart', 'wpmozo bar chart' );
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
			return 'wpmozo-ae-icon-bar-chart  wpmozo-ae-brandicon';
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
			wp_register_script( 'wpmozo-ae-bar-chart-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-bar-chart-script', 'wpmozo-ae-chart' );
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
			require plugin_dir_path( __DIR__ ) . 'bar-chart/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 * (
		 *
		 * @since 1.9.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();
			$title    = ! empty( $settings['bar_chart_title'] ) ? esc_html( $settings['bar_chart_title'] ) : '';
			$legend_font_size = isset($settings['chart_legend_size']) && '' !== ($settings['chart_legend_size']['size']) ? $settings['chart_legend_size']['size'] : '16';

			$legend_font_color = isset($settings['chart_legend_color']) && !empty($settings['chart_legend_color']) ? $settings['chart_legend_color'] : '#666';

			$legend_font_style = isset($settings['chart_legend_font_style']) && !empty($settings['chart_legend_font_style']) ? $settings['chart_legend_font_style'] : 'normal';
			
			$legend_font_weight = isset($settings['chart_legend_font_weight']) && '' !== $settings['chart_legend_font_weight']['size'] ? $settings['chart_legend_font_weight']['size'] : '400';

			$title_align = isset($settings['title_alignment']) && !empty($settings['title_alignment']) ? $settings['title_alignment'] : 'center';
			$title_color = isset($settings['title_color']) && !empty($settings['title_color']) ? $settings['title_color'] : '#666';
			$title_position = isset($settings['title_position']) && !empty($settings['title_position']) ? $settings['title_position'] : 'top';
			$title_font_size = isset($settings['title_size']) && '' !== $settings['title_size']['size'] ? $settings['title_size']['size'] : '12';
			$title_font_weight = isset($settings['title_font_weight']) && '' !== $settings['title_font_weight']['size'] ? $settings['title_font_weight']['size'] : '400';
			$title_font_style = isset($settings['title_font_style']) && !empty($settings['title_font_style']) ? $settings['title_font_style'] : 'normal';
			$title_padding = isset($settings['title_padding']) && '' !== $settings['title_padding']['size'] ? $settings['title_padding']['size'] : '10';

			$render_empty_message = function () {
				?>
				<div class="wpmozo_bar_chart wpmozo_bar_chart_empty">
					<div class="wpmozo_bar_chart_empty_message">
						<?php echo esc_html__( 'No bars found! Please add some bar items to view result.', 'wpmozo-addons-lite-for-elementor' ); ?>
					</div>
				</div>
				<?php
			};

			if ( empty( $settings['bar_chart_items'] ) || ! is_array( $settings['bar_chart_items'] ) ) {
				$render_empty_message();
				return;
			}

			$labels        = array();
			$values        = array();
			$bg_colors     = array();
			$border_colors = array();

			foreach ( $settings['bar_chart_items'] as $item ) {

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
			$border_width = ! empty( $settings['bar_chart_border_size']['size'] )
				? intval( $settings['bar_chart_border_size']['size'] )
				: 1;

			$chart_data = array();
			$chart_data['datasets'] = array();

			foreach ( $labels as $index => $label ) {
				$chart_data['datasets'][] = array(
					'label'           => $label,
					'data'            => isset( $values[$index] ) ? [$values[$index]] : array(),
					'backgroundColor' => isset( $bg_colors[$index] ) ? $bg_colors[$index] : '',
					'borderColor'     => isset( $border_colors[$index] ) ? $border_colors[$index] : '',
					'borderWidth'     => $border_width,
				);
			}

			$chart_data['labels'] = [''];

			$height_desktop = ! empty( $settings['bar_chart_height']['size'] )
				? intval( $settings['bar_chart_height']['size'] )
				: 400;

			$height_tablet = ! empty( $settings['bar_chart_height_tablet']['size'] )
				? intval( $settings['bar_chart_height_tablet']['size'] )
				: $height_desktop;

			$height_mobile = ! empty( $settings['bar_chart_height_mobile']['size'] )
				? intval( $settings['bar_chart_height_mobile']['size'] )
				: $height_tablet;

			$chart_title_font_data = array(
				'size'   => $title_font_size,
				'weight' => $title_font_weight,
				'style'  => $title_font_style,
			);

			$chart_title_data = array(
				'content'  => $title,
				'align'    => $title_align,
				'color'    => $title_color,
				'position' => $title_position,
				'font'     => $chart_title_font_data,
				'padding'  => $title_padding
			);

			$chart_legend_data = array(
				'title'  => $chart_title_data,
				'size'   => $legend_font_size,
				'color'  => $legend_font_color,
				'weight' => $legend_font_weight,
				'style'  => $legend_font_style,
			);
			?>
			<div class="wpmozo_bar_chart">
				<div class="wpmozo_bar_chart_wrapper"
					data-chart="<?php echo esc_attr( wp_json_encode( $chart_data ) ); ?>"
					data-chart-title="<?php echo esc_attr( wp_json_encode( $chart_legend_data ) ); ?>"
					data-chart_height="<?php echo esc_attr( $height_desktop ); ?>"
					data-chart_height_tablet="<?php echo esc_attr( $height_tablet ); ?>"
					data-chart_height_phone="<?php echo esc_attr( $height_mobile ); ?>" >
					<div class="wpmozo_bar_chart_inner">
						<canvas></canvas>
					</div>
				</div>
			</div>
			<?php
		}
	}
}
