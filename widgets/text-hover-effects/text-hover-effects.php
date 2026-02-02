<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.2
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Text_Hover_Effects' ) ) {
	class WPMOZO_AE_Text_Hover_Effects extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_text_hover_effects';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Text Hover Effects', 'wpmozo-addons-lite-for-elementor' );
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
			return array( 'wpmz text hover effects', 'wpmozo text hover effects' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.3.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-text-hover-effects wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.3.0
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
		 * @since 1.3.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends() {
			wp_register_style( 'wpmozo-ae-text-hover-effects-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-text-hover-effects-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require plugin_dir_path( __DIR__ ) . 'text-hover-effects/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.3.0
		 * @access protected
		 */
		protected function render() {
			$settings    = $this->get_settings_for_display();
			$text_effect = ! empty( $settings['text_effect'] ) ? $settings['text_effect'] : 'effect1';
			$text        = ! empty( $settings['text_to_effect'] ) ? $settings['text_to_effect'] : '';

			$text_parts = array();

			/*
			================================
			* Effect 7
			* ================================
			*/

			if ( 'effect7' === $text_effect ) {

				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '">';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '</span>';

				/*
				================================
				* Effect 6
				* ================================
				*/

			} elseif ( 'effect6' === $text_effect ) {

				$text_parts[] = '<span>';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '"></span>';
				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '"></span>';
				$text_parts[] = '</span>';

				/*
				================================
				* Effect 5 (per-letter animation)
				* ================================
				*/

			} elseif ( 'effect5' === $text_effect ) {

				$words      = explode( ' ', $text );
				$delay      = 0;
				$words_html = array();

				foreach ( $words as $word ) {

					$chars      = str_split( $word );
					$char_spans = array();

					foreach ( $chars as $ch ) {
						$char_spans[] =
							'<span style="transition-delay:' . esc_attr( $delay ) . 's;">' .
								esc_html( $ch ) .
							'</span>';

						$delay += 0.1;
					}

					$words_html[] = '<span>' . implode( '', $char_spans ) . '</span> ';
				}

				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '">';
				$text_parts[] = implode( '', $words_html );
				$text_parts[] = '</span>';

				/*
				================================
				* Effect 4
				* ================================
				*/

			} elseif ( 'effect4' === $text_effect ) {

				$text_parts[] = '<span>';
				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '">';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '</span>';
				$text_parts[] = '</span>';

				/*
				================================
				* Effect 3 (split text)
				* ================================
				*/

			} elseif ( 'effect3' === $text_effect ) {

				$len   = strlen( $text );
				$left  = substr( $text, 0, ceil( $len / 2 ) );
				$right = substr( $text, ceil( $len / 2 ) );

				$text_parts[] = '<span>';
				$text_parts[] = '<span data-text-left="' . esc_attr( $left ) . '" data-text-right="' . esc_attr( $right ) . '">';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '</span>';
				$text_parts[] = '</span>';

				/*
				================================
				* Effect 2
				* ================================
				*/

			} elseif ( 'effect2' === $text_effect ) {

				$text_parts[] = '<span>';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '</span>';

				/*
				================================
				* Default (Effect 1)
				* ================================
				*/

			} else {

				$text_parts[] = '<span data-text="' . esc_attr( $text ) . '">';
				$text_parts[] = esc_html( $text );
				$text_parts[] = '</span>';
			}

			$text_html = implode( '', $text_parts );

			?>
		
			<div class="wpmozo_text_hover_effects">
				<div class="wpmozo_text_hover_effects_wrapper wpmozo_text_<?php echo esc_attr( $text_effect ); ?>">
					<div class="wpmozo_text_hover_effects_text">
					<?php echo wp_kses_post( $text_html ); ?>
					</div>
				</div>
			</div>
		
			<?php
		}
	}
}
