<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( !class_exists( 'WPMOZO_AE_Separator' ) ) {
	class WPMOZO_AE_Separator extends Widget_Base {

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_separator';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Separator', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-separator wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.1.0
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
		 * @since 1.1.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {

			wp_register_style( 'wpmozo-ae-separator-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-separator-style' );
		}

		/**
		 * Get script dependencies.
		 *
		 * Retrieve the list of script dependencies the element requires.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return array Element scripts dependencies.
		 */

		public function get_script_depends() {
			wp_register_script( 'wpmozo-ae-separator-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
			return array( 'wpmozo-ae-separator-script' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function register_controls() {

			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'separator/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function render() {
			$settings                  = $this->get_settings_for_display();
			$separator_text            = $settings[ 'separator_text' ];
			$separator_alignment       = $settings[ 'separator_alignment' ];
			$separator_icon_shape      = $settings[ 'separator_icon_shape' ];
			$separator_icon_alignment  = $settings[ 'separator_icon_alignment' ];
			$separator_image_alignment = $settings[ 'separator_image_alignment' ];
			if ( !empty( $settings[ 'separator_image' ][ 'url' ] ) ) {
				$separator_image = $settings[ 'separator_image' ][ 'url' ];
			}
			$this->add_inline_editing_attributes( 'separator_text', 'none' );
			?>
			<div class="wpmozo_ae_separator">
				<?php if ( !empty( $separator_text ) ) { ?>
					<div class="wpmozo_ae_separator_container <?php echo esc_attr( $separator_alignment ); ?>">
						<div class="wpmozo_ae_line wpmozo_ae_line_before"></div>
						<div class="wpmozo_ae_wrapper">
							<div class="wpmozo_ae_text_wrapper">
								<p <?php $this->print_render_attribute_string( 'separator_text' ) ?>><?php echo esc_html( $separator_text ); ?></p>
							</div>
						</div>
						<div class="wpmozo_ae_line wpmozo_ae_line_after"></div>
					</div>
				<?php } elseif ( 'separator_with_icon' === $settings[ 'separator_use_with' ] && '' !== $settings[ 'separator_icon' ][ 'value' ] ) { ?>
					<div class="wpmozo_ae_separator_container <?php echo esc_attr( $separator_icon_alignment ); ?>">
						<div class="wpmozo_ae_line wpmozo_ae_line_before"></div>
						<div class="wpmozo_ae_wrapper">
							<div class="wpmozo_ae_icon_wrapper <?php echo esc_attr( $separator_icon_shape ); ?>">
								<?php
									Icons_Manager::render_icon( 
										$settings[ 'separator_icon' ],
										array( 
											'aria-hidden' => 'true',
											'class' => 'wpmozo_ae_separator_icon ',
										 ),
										'i'
									 );
								?>
							</div>
						</div>
						<div class="wpmozo_ae_line wpmozo_ae_line_after"></div>
					</div>
				<?php } elseif ( !empty( $separator_image ) ) { ?>
					<div class="wpmozo_ae_separator_container <?php echo esc_attr( $separator_image_alignment ); ?>">
						<div class="wpmozo_ae_line wpmozo_ae_line_before"></div>
						<div class="wpmozo_ae_wrapper">
							<div class="wpmozo_ae_image_wrapper">
								<img src="<?php echo esc_url( $separator_image ); ?>" />
							</div>
						</div>
						<div class="wpmozo_ae_line wpmozo_ae_line_after"></div>
					</div>
					<?php } elseif( 'shadow' === $settings[ 'separator_type' ] ) { ?>
						<div class="wpmozo_ae_shadow"></div>
					<?php } else { ?>
						<div class="wpmozo_ae_separator_container default_separator">
							<div class="wpmozo_ae_line wpmozo_ae_line_before"></div>
							<div class="wpmozo_ae_wrapper"></div>
							<div class="wpmozo_ae_line wpmozo_ae_line_after"></div>
						</div>
					<?php } ?>
			</div>
			<?php
		}
	}
}