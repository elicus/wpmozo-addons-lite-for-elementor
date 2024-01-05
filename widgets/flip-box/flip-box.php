<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

class WPMOZO_AE_Flip_Box extends Widget_Base {

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
		return 'wpmozo_ae_flip_box';
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
		return __( 'Flip Box', 'wpmozo-addons-lite-for-elementor' );
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
		return 'eicon-flip-box';
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

		wp_register_style( 'wpmozo-ae-flipbox-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );
		return array( 'wpmozo-ae-flipbox-style' );

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
		wp_register_script( 'wpmozo-ae-flipbox-script', plugins_url( 'assets/js/flip-box-custom.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

			return array( 'wpmozo-ae-flipbox-script' );
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'flip-box/assets/controls/controls.php';
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

		$settings                         = $this->get_settings_for_display();
		$settings['layout1_shake_effect'] = isset( $settings['layout1_shake_effect'] ) ? $settings['layout1_shake_effect'] : 'no';
		$front_title                      = '';
		$front_content                    = '';
		$back_title                       = '';
		$back_content                     = '';
		$new_icon                         = '';
		$old_icon                         = '';
		$front_icon                       = '';
		$front_image                      = '';
		$back_icon                        = '';
		$back_image                       = '';
		$button_text                      = esc_attr( $settings['button_text'] );

		$allowed_html_tags = array(
			'h1'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h2'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h3'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h4'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h5'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'h6'     => array(
				'class' => array(),
				'id'    => array(),
			),
			'p'      => array(
				'class' => array(),
				'id'    => array(),
			),
			'span'   => array(
				'class' => array(),
				'id'    => array(),
			),
			'a'      => array(
				'class' => array(),
				'id'    => array(),
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
		);

		$this->add_render_attribute( 'wrapper', 'class', 'wpmozo_ae_flipbox_wrapper' );
		$this->add_render_attribute( 'front-wrapper', 'class', array( 'wpmozo_ae_flipbox_side wpmozo_ae_flipbox_front' ) );
		$this->add_render_attribute( 'back-wrapper', 'class', array( 'wpmozo_ae_flipbox_side wpmozo_ae_flipbox_back' ) );

		$this->add_render_attribute( 'wpmozo_button_wrapper', 'class', 'wpmozo_ae_flip_box_button_wrapper' );
		$this->add_render_attribute( 'wpmozo_ae_flip_box_button_wrapper_inner', 'class', 'wpmozo_ae_flip_box_button_wrapper_inner' );
		$this->add_render_attribute(
			'button_text',
			array(
				'class' => 'wpmozo_button',
				'style' => 'text-decoration:none;',
			),
		);
		$this->add_inline_editing_attributes( 'button_text', 'none' );

		if ( '' !== $settings['button_hover_animation'] ) {
			$this->add_render_attribute( 'wpmozo_ae_flip_box_button_wrapper_inner', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
		}

		if ( ! empty( $settings['button_url']['url'] ) ) {
			$this->add_link_attributes( 'button_text', $settings['button_url'] );
		}

		// Button icon HTML

		/*
		$this->add_render_attribute( 'wrapper', 'id', esc_attr( $settings['text_style'] .'-'. $this->get_id()) );
		$this->add_render_attribute( 'text-wrapper', 'class', 'wpmozo_ae_text_wrapper' );
		$this->add_render_attribute( 'inner-text-wrapper', 'class', ['wpmozo_ae_text_wrapper_inner', esc_attr( $settings['text_style'] ).'_text' ] );
		*/
		$this->add_render_attribute( 'flipbox_title', 'class', 'wpmozo_ae_flipbox_heading' );
		$this->add_render_attribute( 'flipbox_content', 'class', 'wpmozo_ae_flipbox_description' );

		if ( '' !== $settings['button_icon'] ) {
			$button_icon = Icons_Manager::try_get_icon_html(
				$settings['button_icon'],
				array(
					'aria-hidden' => 'true',
					'class'       => 'wpmozo_button_icon ',
				)
			);
		}

		// Button HTML

		$button_html = '
		<div class="wpmozo_ae_flip_box_button_wrapper">';
		if ( $button_text && 'after' === $settings['button_icon_position'] ) {
			$button_html .= '
		    <div ' . $this->get_render_attribute_string( 'wpmozo_button_wrapper' ) . ' >
		        <div ' . $this->get_render_attribute_string( 'wpmozo_ae_flip_box_button_wrapper_inner' ) . ' >
		            <a ' . $this->get_render_attribute_string( 'button_text' ) . ' >
		                ' . $button_text . '
		            </a>
		            ' . ( '' !== $button_icon ? ( '&nbsp;' . $button_icon ) : '' ) . '
		        </div>
		    </div>';
		} elseif ( $button_text && 'before' === $settings['button_icon_position'] ) {
			$button_html .= '
		    <div ' . $this->get_render_attribute_string( 'wpmozo_button_wrapper' ) . ' >
		        <div ' . $this->get_render_attribute_string( 'wpmozo_ae_flip_box_button_wrapper_inner' ) . ' >
		            ' . ( '' !== $button_icon ? ( $button_icon . '&nbsp;' ) : '' ) . '
		            <a ' . $this->get_render_attribute_string( 'button_text' ) . ' >
		                ' . $button_text . '
		            </a>
		        </div>
		    </div>';
		} elseif ( $button_text ) {
			$button_html .= '
		    <div ' . $this->get_render_attribute_string( 'wpmozo_button_wrapper' ) . ' >
		        <div ' . $this->get_render_attribute_string( 'wpmozo_ae_flip_box_button_wrapper_inner' ) . ' >
		            ' . ( '' !== $button_icon ? ( $button_icon . '&nbsp;' ) : '' ) . '
		            <a ' . $this->get_render_attribute_string( 'button_text' ) . ' >
		                ' . $button_text . '
		            </a>
		        </div>
		    </div>';
		}
		$button_html .= '
		</div>';

		// FLIPBOX FRONT TITLE

		if ( '' !== $settings['front_title'] ) {

			$front_title = '<' . $settings['front_heading_level'] . ' class="wpmozo_ae_flipbox_title">
								' . $this->parse_text_editor( wp_kses( $settings['front_title'], $allowed_html_tags ) ) . '
							</' . $settings['front_heading_level'] . '>';
		}

		// FLIPBOX FRONT CONTENT

		if ( '' !== $settings['front_content'] ) {
			$front_content = $this->parse_text_editor( $settings['front_content'] );
		}

		// FLIPBOX BACK TITLE

		if ( '' !== $settings['back_title'] ) {
			$back_title = '<' . $settings['back_heading_level'] . ' class="wpmozo_ae_flipbox_title">
								' . $this->parse_text_editor( wp_kses( $settings['back_title'], $allowed_html_tags ) ) . '
							</' . $settings['back_heading_level'] . '>';
		}

		// FLIPBOX BACK CONTENT

		if ( '' !== $settings['back_content'] ) {
			$back_content = $this->parse_text_editor( $settings['back_content'] );
		}

		// FLIPBOX FRONT ICON

		$migration_allowed = Icons_Manager::is_migration_allowed();
		$f_migrated        = isset( $settings['__fa4_migrated']['front_icon_new'] );
		$f_is_new          = empty( $settings['front_icon_old'] ) && $migration_allowed;
		$b_migrated        = isset( $settings['__fa4_migrated']['back_icon_new'] );
		$b_is_new          = empty( $settings['back_icon_old'] ) && $migration_allowed;

		// FRONT ICON DISPLAY

		if ( 'image' === $settings['front_use_icon_image'] && '' !== $settings['front_image'] ) {

			$front_image = ( '' !== $settings['front_image']['url'] ) ? '<div class="wpmozo_ae_flipbox_image"><img src="' . $settings['front_image']['url'] . '" alt="' . esc_attr( $settings['front_image_alt'] ) . '"/></div>' : '';

		}

		if ( 'icon' === $settings['front_use_icon_image'] && '' !== $settings['front_icon_new'] ) {

			$icon_html = '';
			if ( $f_is_new || $f_migrated ) {
				if ( 'yes' === $settings['front_style_icon'] ) {

					$icon_class  = 'wpmozo_ae_icon_' . $settings['front_icon_shape'];
					$icon_style .= 'background-color:' . esc_attr( $settings['front_shape_color'] ) . ';';
					if ( 'hexagon' === $settings['front_icon_shape'] ) {
						ob_start();
						Icons_Manager::render_icon(
							$settings['front_icon_new'],
							array(
								'aria-hidden' => 'true',
								'class'       => $icon_class,
							)
						);
						$icon = ob_get_clean();

						$icon_html =
							'<div class="wpmozo_ae_hexagon' . ( 'yes' === $settings['front_use_shape_border'] ? ' wpmozo_ae_icon_shape_border' : '' ) . '">
								<div class="wpmozo_ae_hexagon_shape">' . $icon . '
								</div>
							</div>';
					} else {
						if ( 'yes' === $settings['front_use_shape_border'] && 'hexagon' !== $settings['front_icon_shape'] ) {
							$icon_class .= ' wpmozo_ae_icon_shape_border';
							ob_start();
							Icons_Manager::render_icon(
								$settings['front_icon_new'],
								array(
									'aria-hidden' => 'true',
									'class'       => $icon_class,
									'style'       => $icon_style,
								)
							);
							$icon_html = ob_get_clean();
						} else {
							ob_start();
							Icons_Manager::render_icon(
								$settings['front_icon_new'],
								array(
									'aria-hidden' => 'true',
									'class'       => $icon_class,
									'style'       => $icon_style,
								)
							);
							$icon_html = ob_get_clean();
						}
					}
				} else {
					ob_start();
					Icons_Manager::render_icon(
						$settings['front_icon_new'],
						array(
							'aria-hidden' => 'true',
						)
					);
					$icon_html = ob_get_clean();
				}
			} else {
				ob_start();
				Icons_Manager::render_icon(
					$settings['front_icon_old'],
					array(
						'aria-hidden' => 'true',
					)
				);
				$icon_html = ob_get_clean();
			}

			$front_icon = '<div class="wpmozo_ae_flipbox_icon">' . $icon_html . '</div>';
		}

		// BACK ICON DISPLAY

		if ( 'image' === $settings['back_use_icon_image'] && '' !== $settings['back_image'] ) {

			$back_image = ( '' !== $settings['back_image']['url'] ) ? '<div class="wpmozo_ae_flipbox_image"><img src="' . esc_url( $settings['back_image']['url'] ) . '" alt="' . esc_attr( $settings['back_image_alt'] ) . '"/></div>' : '';

		}

		if ( 'icon' === $settings['back_use_icon_image'] && '' !== $settings['back_icon_new'] ) {

			$icon_html = '';
			if ( $b_is_new || $b_migrated ) {
				if ( 'yes' === $settings['back_style_icon'] ) {

					$icon_class  = 'wpmozo_ae_icon_' . $settings['back_icon_shape'];
					$icon_style .= 'background-color: ' . esc_attr( $settings['back_shape_color'] ) . ';';
					if ( 'hexagon' === $settings['back_icon_shape'] ) {
						ob_start();
						Icons_Manager::render_icon(
							$settings['back_icon_new'],
							array(
								'aria-hidden' => 'true',
								'class'       => $icon_class,
							)
						);
						$icon      = ob_get_clean();
						$icon_html =
						'<div class="wpmozo_ae_hexagon ' . ( 'yes' === $settings['back_use_shape_border'] ? 'wpmozo_ae_icon_shape_border' : '' ) . '">
							<div class="wpmozo_ae_hexagon_shape">' . $icon . '
							</div>
						</div>';

					} else {
						if ( 'yes' === $settings['back_use_shape_border'] && 'hexagon' !== $settings['back_icon_shape'] ) {
							$icon_class .= ' wpmozo_ae_icon_shape_border';
							ob_start();
							Icons_Manager::render_icon(
								$settings['back_icon_new'],
								array(
									'aria-hidden' => 'true',
									'class'       => $icon_class,
									'style'       => $icon_style,
								)
							);
							$icon_html = ob_get_clean();
						} else {
							ob_start();
							Icons_Manager::render_icon(
								$settings['front_icon_new'],
								array(
									'aria-hidden' => 'true',
									'class'       => $icon_class,
									'style'       => $icon_style,
								)
							);
							$icon_html = ob_get_clean();
						}
					}
				} else {
					ob_start();
					Icons_Manager::render_icon(
						$settings['back_icon_new'],
						array(
							'aria-hidden' => 'true',
						)
					);
					$icon_html = ob_get_clean();
				}
			} else {
				ob_start();
				Icons_Manager::render_icon(
					$settings['back_icon_old'],
					array(
						'aria-hidden' => 'true',
					)
				);
				$icon_html = ob_get_clean();
			}

			$back_icon = '<div class="wpmozo_ae_flipbox_icon">' . $icon_html . '</div>';
		}

		if ( file_exists( plugin_dir_path( __FILE__ ) . 'assets/layouts/' . $settings['flipbox_layout'] . '.php' ) ) {
			include plugin_dir_path( __FILE__ ) . 'assets/layouts/' . $settings['flipbox_layout'] . '.php';
		}

		echo $flipbox_content;
	}





	/**
	 * Live widget output.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
	}

}

