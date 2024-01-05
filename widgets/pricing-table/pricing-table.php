<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

class WPMOZO_AE_Pricing_Table extends Widget_Base {

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
		return 'wpmozo_ae_pricing_table';
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
		return esc_html__( 'Pricing Table', 'wpmozo-addons-lite-for-elementor' );
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
		return 'eicon-price-table';
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
		wp_register_style( 'wpmozo-ae-pricingtable-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );

		return array( 'wpmozo-ae-pricingtable-style' );
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'pricing-table/assets/controls/controls.php';
	}

	/**
	 * Return currency symbol.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	private function get_currency_symbol( $symbol_name ) {
		$symbols = array(
			'dollar'  => ' &#36;',
			'euro'    => ' &#128;',
			'franc'   => ' &#8355;',
			'pound'   => ' &#163;',
			'ruble'   => ' &#8381;',
			'shekel'  => ' &#8362;',
			'baht'    => ' &#3647;',
			'yen'     => ' &#165;',
			'won'     => ' &#8361;',
			'guilder' => ' &fnof;',
			'peso'    => ' &#8369;',
			'peseta'  => ' &#8359',
			'lira'    => ' &#8356;',
			'rupee'   => ' &#8360;',
			'inr'     => ' &#8377;',
			'real'    => ' R$',
			'krona'   => ' kr',
		);
		return isset( $symbols[ $symbol_name ] ) ? $symbols[ $symbol_name ] : '';
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

		$table_title            = esc_attr( $settings['table_title_text'] );
		$title_heading_level    = esc_attr( $settings['title_heading_level'] );
		$currency_symbol        = esc_attr( $settings['currency_symbol'] );
		$currency_symbol_custom = esc_attr( $settings['currency_symbol_custom'] );
		$table_price            = esc_attr( $settings['table_price'] );
		$pricing_period         = esc_attr( $settings['pricing_period'] );
		$button_text            = esc_attr( $settings['button_text'] );
		$features_list          = $this->get_settings_for_display( 'features_list' );
		$header_graphics        = esc_attr( $settings['header_graphics'] );
		$table_subtitle         = esc_attr( $settings['table_subtitle_text'] );
		$currency_position      = esc_attr( $settings['currency_position'] );
		$list_icon              = '';

		// pricing table icon migration settings

		if ( '' !== $settings['header_icon'] ) {
			$icon = Icons_Manager::try_get_icon_html(
				$settings['header_icon'],
				array(
					'aria-hidden' => 'true',
					'class'       => 'wpmozo_ae_header_icon',
				),
				'span'
			);
		}

		if ( '' !== $settings['button_icon'] ) {
			$button_icon = Icons_Manager::try_get_icon_html(
				$settings['button_icon'],
				array(
					'aria-hidden' => 'true',
					'class'       => 'wpmozo_ae_button_icon',
				)
			);
		}

		if ( ! empty( $currency_symbol ) ) {
			if ( 'custom' !== $currency_symbol ) {
				$symbol = $this->get_currency_symbol( $currency_symbol );
			} else {
				$symbol = $currency_symbol_custom;
			}
		} else {
			$symbol = '';
		}

		$this->add_render_attribute( 'table_title_text', 'class', 'wpmozo_ae_pricing_table_title' );
		$this->add_inline_editing_attributes( 'table_title_text', 'none' );

		$this->add_render_attribute( 'table_price', 'class', 'wpmozo_ae_pricing_table_price' );
		$this->add_inline_editing_attributes( 'table_price', 'none' );

		$this->add_render_attribute( 'pricing_period', 'class', 'wpmozo_ae_pricing_table_period' );
		$this->add_inline_editing_attributes( 'pricing_period', 'none' );

		$this->add_render_attribute( 'table_subtitle_text', 'class', 'wpmozo_ae_pricing_table_subtitle' );
		$this->add_inline_editing_attributes( 'table_subtitle_text', 'none' );

		$this->add_render_attribute( 'wpmozo_ae_pricing_table_pricing', 'class', 'wpmozo_ae_pricing_table_pricing' );

		$this->add_render_attribute( 'wpmozo_ae_button_wrapper', 'class', 'wpmozo_ae_pricing_table_button_wrapper' );

		$this->add_render_attribute( 'wpmozo_ae_pricing_table_button_wrapper_inner', 'class', 'wpmozo_ae_pricing_table_button_wrapper_inner' );

		$this->add_render_attribute(
			'button_text',
			array(
				'class' => 'wpmozo_ae_button',
				'style' => 'text-decoration:none;',
			),
		);
		$this->add_inline_editing_attributes( 'button_text', 'none' );

		if ( '' !== $settings['button_hover_animation'] ) {
			$this->add_render_attribute( 'wpmozo_ae_pricing_table_button_wrapper_inner', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
		}

		if ( ! empty( $settings['button_url']['url'] ) ) {
			$this->add_link_attributes( 'button_text', $settings['button_url'] );
		}

		'icon' === $settings['header_graphics'] ? $this->add_render_attribute( 'header_graphics_div', 'class', 'wpmozo_ae_pricing_table_header_graphic_inner' ) : $this->add_render_attribute( 'header_graphics_div', 'class', array( 'wpmozo_ae_pricing_table_header_graphic_inner', 'wpmozo_ae_header_image_container' ) );

		if ( 'icon' === $settings['header_graphics'] && '' !== $settings['header_icon_hover_animation'] ) {
			$this->add_render_attribute( 'header_graphics_div', 'class', 'elementor-animation-' . $settings['header_icon_hover_animation'] );
		}

		?>
		<div class="wpmozo_ae_pricing_table">
			<div class="wpmozo_ae_pricing_table_wrapper">
				<?php
				require __DIR__ . '/assets/templates/pricing_table_1.php';
				?>
			</div>
		</div>
		<?php
	}
}
