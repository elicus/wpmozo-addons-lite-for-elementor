<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2025 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Icons_Manager;
use Elementor\Widget_Base;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Control_Media;

if ( ! class_exists( 'WPMOZO_AE_Promotion_Bar' ) ) {
	class WPMOZO_AE_Promotion_Bar extends Widget_Base {

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
			return 'wpmozo_ae_promotion_bar';
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
			return esc_html__( 'Promotion Bar', 'wpmozo-addons-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz promotion bar', 'wpmozo promotion bar', 'wpmz promotion bar', 'wpmozo promotion bar' );
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
			return 'wpmozo-ae-icon-promotion-bar wpmozo-ae-brandicon';
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

			wp_register_style( 'wpmozo-ae-promotion-bar-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-promotion-bar-style' );
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
			wp_register_script( 'wpmozo-ae-promotion-bar-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-promotion-bar-script' );
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
			require_once plugin_dir_path( __DIR__ ) . 'promotion-bar/assets/controls/controls.php';
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
			// Get settings for display.
			$settings                  = $this->get_settings_for_display();
			$image                     = 'yes' === $settings['enable_image'] && isset( $settings['timer_image'] ) && '' !== $settings['timer_image'] ? $settings['timer_image'] : '';
			$date_time                 = $settings['date_time'];
			$layout                    = esc_attr( $settings['layout'] );
			$layout                    = wpmozo_ae_validate_layout( $layout, array( 'layout1', 'layout2', 'layout3' ) );
			$title_heading_level       = wpmozo_ae_validate_heading_level( $settings['title_heading_level'], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$hide_days                 = 'yes' === $settings['hide_days'] ? 'yes' : '';
			$promotion_bar_title       = $settings['promotion_bar_title'];
			$promotion_bar_description = $settings['promotion_bar_description'];
			$display_label             = $settings['display_label'];
			$display_stack_label       = 'yes' === $settings['display_stack_label'] ? 'yes' : '';
			$show_button               = 'yes' === $settings['show_button'] ? 'yes' : '';
			$button_text               = $settings['button_text'];
			$button_link_url           = isset( $settings['button_link_url']['url'] ) ? $settings['button_link_url']['url'] : '';
			$show_separator            = 'yes' === $settings['show_separator'] ? 'yes' : '';
			$separator_text            = $settings['separator_text'];
			$button_custom_style       = 'yes' === $settings['button_custom_style'] ? 'yes' : '';
			$show_button_icon          = 'yes' === $settings['show_button_icon'] ? 'yes' : '';

			// Convert the selected date_time to a timestamp.
			$end_time     = strtotime( $date_time );
			$current_time = strtotime(current_time('Y-m-d H:i:s'));

			$gmt_offset        = strval( get_option( 'gmt_offset' ) );
			$gmt_divider       = '-' === substr( $gmt_offset, 0, 1 ) ? '-' : '+';
			$gmt_offset_hour   = str_pad( abs( intval( $gmt_offset ) ), 2, '0', STR_PAD_LEFT );
			$gmt_offset_minute = str_pad( ( ( abs( $gmt_offset ) * 100 ) % 100 ) * ( 60 / 100 ), 2, '0', STR_PAD_LEFT );
			$gmt               = "GMT{$gmt_divider}{$gmt_offset_hour}{$gmt_offset_minute}";

			$timestamp = strtotime($date_time." ".$gmt);

			// Calculate the difference in seconds.
			$time_left = $end_time - $current_time;

			// Ensure that the timer only displays positive values (no negative countdown).
			if ( $time_left > 0 ) {
				$days    = floor( $time_left / ( 60 * 60 * 24 ) );
				$hours   = floor( ( $time_left % ( 60 * 60 * 24 ) ) / ( 60 * 60 ) );
				$minutes = floor( ( $time_left % ( 60 * 60 ) ) / 60 );
				$seconds = $time_left % 60;
			} else {
				$days    = 00;
				$hours   = 00;
				$minutes = 00;
				$seconds = 00;
			}

			// Get labels.
			$labels = array(
				'days'    => array(
					'full'   => esc_html__( 'Days', 'wpmozo-addons-for-elementor' ),
					'short'  => esc_html__( 'Days', 'wpmozo-addons-for-elementor' ),
					'single' => esc_html__( 'D', 'wpmozo-addons-for-elementor' ),
				),
				'hours'   => array(
					'full'   => esc_html__( 'Hours', 'wpmozo-addons-for-elementor' ),
					'short'  => esc_html__( 'Hrs', 'wpmozo-addons-for-elementor' ),
					'single' => esc_html__( 'H', 'wpmozo-addons-for-elementor' ),
				),
				'minutes' => array(
					'full'   => esc_html__( 'Minutes', 'wpmozo-addons-for-elementor' ),
					'short'  => esc_html__( 'Min', 'wpmozo-addons-for-elementor' ),
					'single' => esc_html__( 'M', 'wpmozo-addons-for-elementor' ),
				),
				'seconds' => array(
					'full'   => esc_html__( 'Seconds', 'wpmozo-addons-for-elementor' ),
					'short'  => esc_html__( 'Sec', 'wpmozo-addons-for-elementor' ),
					'single' => esc_html__( 'S', 'wpmozo-addons-for-elementor' ),
				),
			);

			// Get the labels based on the selected display_label control.
			$day_label    = ( isset( $labels['days'][ $display_label ] ) ) ? $labels['days'][ $display_label ] : esc_html__( '', 'wpmozo-addons-for-elementor' );
			$hour_label   = ( isset( $labels['hours'][ $display_label ] ) ) ? $labels['hours'][ $display_label ] : esc_html__( '', 'wpmozo-addons-for-elementor' );
			$minute_label = ( isset( $labels['minutes'][ $display_label ] ) ) ? $labels['minutes'][ $display_label ] : esc_html__( '', 'wpmozo-addons-for-elementor' );
			$second_label = ( isset( $labels['seconds'][ $display_label ] ) ) ? $labels['seconds'][ $display_label ] : esc_html__( '', 'wpmozo-addons-for-elementor' );


			?>
			<div class="wpmozo_promotion_bar wpmozo_promotion_bar_0">
				<?php if ( $time_left > 0 ) { ?>
				<div class="wpmozo_promotion_bar_wrap <?php echo esc_attr( $layout ); ?> icon_<?php echo esc_attr( $settings['button_icon_placement'] ); ?>" data-timestamp="<?php echo esc_attr( strtotime($date_time." ".$gmt) ); ?>">
					<?php
					$layout = 'layout3' === $layout ? 'layout1' : $layout;
					if ( file_exists( plugin_dir_path( __DIR__ ) . "promotion-bar/assets/layouts/$layout.php" ) ) {
						include plugin_dir_path( __DIR__ ) . "promotion-bar/assets/layouts/$layout.php";
					}
					?>
				</div>
				<?php } ?>
			</div>
			<?php
		}
	}
}
