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
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Control_Media;

class WPMOZO_AE_Tilt_Image extends Widget_Base {

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
		return 'wpmozo_ae_tilt_image';
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
		return esc_html__( 'Tilt Image', 'wpmozo-addons-lite-for-elementor' );
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
		return 'eicon-image-rollover';
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

		wp_register_style( 'wpmozo-ae-tiltimage-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );
		return array( 'wpmozo-ae-tiltimage-style' );
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
		wp_register_script( 'wpmozo-ae-tiltimage-script', plugins_url( 'assets/js/tilt-image-custom.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

		return array( 'wpmozo-ae-tiltimage-script' );
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'tilt-image/assets/controls/controls.php';
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
		$settings            = $this->get_settings_for_display();
		$image               = '';
		$title_text          = esc_attr( $settings['title_text'] );
		$title_heading_level = esc_attr( $settings['title_heading_level'] );
		$description_text    = esc_attr( $settings['description_text'] );
		$button_text         = esc_attr( $settings['button_text'] );
		$tilt_max            = esc_attr( $settings['max_rotation_slider']['size'] );
		$icon_shape          = esc_attr( $settings['select_icon_shape'] );
		$content_alignment   = esc_attr( $settings['content_alignment_selector'] );
		$content_animation   = esc_attr( $settings['content_animation_selector'] );

		$tilt_perspective  = esc_attr( $settings['perspective_slider']['size'] );
		$tilt_scale        = esc_attr( $settings['scale_on_hover_slider']['size'] );
		$tilt_speed        = esc_attr( $settings['speed_slider']['size'] );
		$tilt_mobile       = esc_attr( $settings['disable_on_mobile_switcher'] );
		$use_glare         = esc_attr( $settings['use_glare_switcher'] );
		$use_disable_axis  = esc_attr( $settings['use_disable_xy_axis_switcher'] );
		$tilt_disable_axis = esc_attr( $settings['disable_x/y_axis_select'] );
		$icon              = '';

		if ( 'on' === $settings['use_glare_switcher'] ) {
			null !== esc_attr( $settings['max_glare_slider']['size'] ) ? $tilt_max_glare = esc_attr( $settings['max_glare_slider']['size'] ) : '';
		}

		$tilt_max         = '' !== $tilt_max ? 'data-tilt-max="' . $tilt_max . '"' : '';
		$tilt_perspective = '' !== $tilt_perspective ? 'data-tilt-perspective="' . $tilt_perspective . '"' : '';
		$tilt_scale       = '' !== $tilt_scale ? 'data-tilt-scale="' . $tilt_scale . '"' : '';
		$tilt_speed       = '' !== $tilt_speed ? 'data-tilt-speed="' . $tilt_speed . '"' : '';

		$this->add_render_attribute( 'contents_animations', 'class', 'wpmozo_ae_tilt_content_wrapper' );

		if ( '' !== $settings['content_on_hover_switcher'] ) {
			$this->add_render_attribute( 'contents_animations', 'class', $content_animation );
		}

		$this->add_inline_editing_attributes( 'title_text', 'none' );
		$this->add_render_attribute( 'title_text', 'class', 'wpmozo_ae_tilt_title' );
		$this->add_inline_editing_attributes( 'description_text', 'none' );
		$this->add_render_attribute( 'description_text', 'class', 'wpmozo_ae_tilt_desc' );
		$this->add_render_attribute( 'icon_wrapper', 'class', 'wpmozo_ae_tilt_image_icon_wrapper' );
		$this->add_render_attribute( 'icon_wrapper_shape', 'class', array( 'wpmozo_ae_tilt_image_icon_wrapper', 'wpmozo_icon_shape_' . $icon_shape . '_container' ) );
		$this->add_render_attribute( 'wpmozo_button_wrapper', 'class', 'wpmozo_ae_tilt_image_button_wrapper' );
		$this->add_render_attribute( 'wpmozo_ae_tilt_image_button_wrapper_inner', 'class', 'wpmozo_ae_tilt_image_button_wrapper_inner' );
		$this->add_render_attribute(
			'button_text',
			array(
				'class' => 'wpmozo_button',
				'style' => 'text-decoration:none;',
			),
		);
		$this->add_inline_editing_attributes( 'button_text', 'none' );

		if ( '' !== $settings['button_hover_animation'] ) {
			$this->add_render_attribute( 'wpmozo_ae_tilt_image_button_wrapper_inner', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
		}

		if ( ! empty( $settings['button_url']['url'] ) ) {
			$this->add_link_attributes( 'button_text', $settings['button_url'] );
		}

		// Tilt image button icon
		if ( '' !== $settings['button_icon'] ) {
			$button_icon = Icons_Manager::try_get_icon_html(
				$settings['button_icon'],
				array(
					'aria-hidden' => 'true',
					'class'       => 'wpmozo_button_icon ',
				)
			);
		}

		// Tilt attributes
			$tilt_attr = 'data-tilt ' . $tilt_max . ' ' . $tilt_perspective . ' ' . $tilt_scale . ' ' . $tilt_speed . ' ' . $tilt_mobile . ' ' . ( 'on' === $use_glare ? esc_attr( " data-tilt-glare=true data-tilt-max-glare=$tilt_max_glare" ) : '' ) . ' ' . ( 'on' === $use_disable_axis ? esc_attr( " data-tilt-axis=$tilt_disable_axis" ) : '' );

		// Main output

		?>
			<div class="wpmozo_ae_tilt_image_wrapper <?php echo ( '' !== $content_alignment ? 'wpmozo_ae_tilt_align_' . $content_alignment : '' ); ?>" <?php echo $tilt_attr; ?> >
				<div class="wpmozo_ae_tilt_image_inner_wrapper"> 
					<?php
					if ( ! empty( $settings['tilt_image_image']['url'] ) ) {
						$size         = $settings['tilt_image_size_size'];
						$image_sizing = 'attachment-' . $size . ' size-' . $size;
						$image        = $settings['tilt_image_image'];
						$attach_id    = $image['id'];
						$img_url      = Group_Control_Image_Size::get_attachment_image_src( $attach_id, 'tilt_image_size', $settings );

						// To show placeholder image
						if ( empty( $img_url ) ) {
							$img_url = $settings['tilt_image_image']['url'];
						}

						$this->add_render_attribute(
							'image',
							array(
								'src'   => $img_url,
								'class' => array( 'wpmozo_ae_tilt_image_image', $image_sizing ),
								'title' => Control_Media::get_image_title( $image ),
								'alt'   => Control_Media::get_image_alt( $image ),
							)
						);
						?>
								<img <?php echo $this->get_render_attribute_string( 'image' ); ?> />
							<?php
					}
					?>
					<div <?php echo $this->get_render_attribute_string( 'contents_animations' ); ?> >
						<?php
							// Tilt image icon
						if ( 'yes' === $settings['use_icon_switcher'] ) {
							if ( 'yes' !== $settings['icon_style_switcher'] && '' !== $settings['select_icon']['value'] ) {
								?>
										<div <?php echo $this->get_render_attribute_string( 'icon_wrapper' ); ?> >
										<?php
											echo Icons_Manager::try_get_icon_html(
												$settings['select_icon'],
												array(
													'aria-hidden' => 'true',
													'class' => 'wpmozo_ae_tilt-image_icon ',
												),
												'span'
											);
										?>
										</div>
									<?php
							}
							if ( '' !== $settings['select_icon']['value'] && '' !== $settings['select_icon_shape'] ) {
								if ( 'svg' === $settings['select_icon']['library'] ) {
									?>
											<div <?php echo $this->get_render_attribute_string( 'icon_wrapper_shape' ); ?> >
											<?php
												echo Icons_Manager::try_get_icon_html(
													$settings['select_icon'],
													array(
														'aria-hidden' => 'true',
														'class' => array( 'wpmozo_ae_tilt_image_icon', 'wpmozo_icon_shape_' . $icon_shape ),
													),
													'span'
												);
											?>
											</div>
										<?php
								}
							}
						}
							// Tilt image title
						if ( '' !== $title_text ) {
							?>
									<<?php echo $title_heading_level; ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?> >
									<?php echo $title_text; ?> 
									</<?php echo $title_heading_level; ?> >
								<?php
						}
							// Tilt image description
						if ( '' !== $description_text ) {
							?>
									<div <?php echo $this->get_render_attribute_string( 'description_text' ); ?> >
										<p> <?php echo $description_text; ?> </p>
									</div>
								<?php
						}
						?>
								<div class="wpmozo_ae_tilt_image_button_wrapper">
									<?php
										// Tilt image button
									if ( $button_text && 'after' === $settings['button_icon_position'] ) {

										?>
												<div <?php echo $this->get_render_attribute_string( 'wpmozo_button_wrapper' ); ?> >
													<div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_tilt_image_button_wrapper_inner' ); ?> >
														<a <?php echo $this->get_render_attribute_string( 'button_text' ); ?> >
														<?php echo esc_html( $button_text ); ?>
														</a>
													<?php echo ( '' !== $button_icon ? ( '&nbsp;' . $button_icon ) : '' ); ?>
													</div>
												</div>
											<?php
									} elseif ( $button_text && 'before' === $settings['button_icon_position'] ) {
										?>
												<div <?php echo $this->get_render_attribute_string( 'wpmozo_button_wrapper' ); ?> >
													<div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_tilt_image_button_wrapper_inner' ); ?> >
													<?php echo ( '' !== $button_icon ? ( $button_icon . '&nbsp;' ) : '' ); ?>
														<a <?php echo $this->get_render_attribute_string( 'button_text' ); ?> >
														<?php echo esc_html( $button_text ); ?>
														</a>						
													</div>
												</div>
											<?php
									} elseif ( $button_text ) {
										?>
												<div <?php echo $this->get_render_attribute_string( 'wpmozo_button_wrapper' ); ?> >
													<div <?php echo $this->get_render_attribute_string( 'wpmozo_ae_tilt_image_button_wrapper_inner' ); ?> >
													<?php echo '' !== $button_icon ? ( $button_icon . '&nbsp;' ) : ''; ?>
														<a <?php echo $this->get_render_attribute_string( 'button_text' ); ?> >
														<?php echo esc_html( $button_text ); ?>
														</a>						
													</div>
												</div>
											<?php
									}
									?>
									 
								</div> 
												</div>
				</div>
			</div>
		<?php
	}
}
