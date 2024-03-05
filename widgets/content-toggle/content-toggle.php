<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Plugin;
use \Elementor\Icons_Manager;

class WPMOZO_AE_Content_Toggle extends Widget_Base {


	protected static $toggle_one_page_ids = array();
	protected static $toggle_two_page_ids = array();

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wpmozo_ae_content_toggle_for_elementor';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Content Toggle', 'wpmozo-addons-for-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-dual-button wpmozo-ae-brandicon';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * @since  1.0.0
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
	 * @since  1.0.0
	 * @access public
	 *
	 * @return style handle.
	 */
	public function get_style_depends() {
		wp_register_style( 'wpmozo-ale-content-toggle-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );

		return array( 'wpmozo-ale-content-toggle-style', 'wpmozo-ale-animate-style' );
	}

	/**
	 * Get script dependencies.
	 *
	 * Retrieve the list of script dependencies the element requires.
	 *
	 * @since  1.3.0
	 * @access public
	 *
	 * @return array Element scripts dependencies.
	 */
	public function get_script_depends() {
		wp_register_script( 'wpmozo-ale-content-toggle-script', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );

		return array( 'wpmozo-ale-content-toggle-script' );
	}

	/**
	 * Register widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		// Seprate file containing all the code for registering controls.
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'content-toggle/assets/controls/controls.php';
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings                = $this->get_settings_for_display();
		$toggle_switch_type      = $settings['wpmozo_toggle_switch_layout'];
		$toggle_one_type         = $settings['wpmozo_toggle_one_type'];
		$toggle_two_type         = $settings['wpmozo_toggle_two_type'];
		$toggle_one_title        = $settings['wpmozo_toggle_one_title'];
		$toggle_two_title        = $settings['wpmozo_toggle_two_title'];
		$toggle_one_text_content = isset( $settings['wpmozo_toggle_one_content'] ) ? $settings['wpmozo_toggle_one_content'] : '';
		$toggle_two_text_content = isset( $settings['wpmozo_toggle_two_content'] ) ? $settings['wpmozo_toggle_two_content'] : '';
		$toggle_one_template_id  = isset( $settings['wpmozo_toggle_one_select_template'] ) ? $settings['wpmozo_toggle_one_select_template'] : 0;
		$toggle_two_template_id  = isset( $settings['wpmozo_toggle_two_select_template'] ) ? $settings['wpmozo_toggle_two_select_template'] : 0;
		$toggle_one_page_id      = isset( $settings['wpmozo_toggle_one_select_page'] ) ? $settings['wpmozo_toggle_one_select_page'] : 0;
		$toggle_two_page_id      = isset( $settings['wpmozo_toggle_two_select_page'] ) ? $settings['wpmozo_toggle_two_select_page'] : 0;
		$toggle_switch_alignment = isset( $settings['wpmozo_toggle_switch_alignment'] ) ? $settings['wpmozo_toggle_switch_alignment'] : 'left';
		$toggle_switch_layout    = isset( $settings['wpmozo_toggle_switch_layout'] ) ? $settings['wpmozo_toggle_switch_layout'] : 'wpmozo_toggle_layout_one';
		$label_id                = 'wpmozo_ae_toggle_field_' . wp_rand();

		$toggle_one_content = $toggle_one_text_content;
		$toggle_two_content = $toggle_two_text_content;

		?>
			<div class="wpmozo_content_toggle">
				<div class="wpmozo_content_toggle_wrapper">
					<?php if ( 'wpmozo_toggle_layout_one' === $toggle_switch_type ) { ?>
					<div class="wpmozo_toggle_button_wrapper wpmozo_toggle_layout_one wpmozo_toggle_center">
						<div class="wpmozo_toggle_title_value wpmozo_toggle_off_value">
						<?php if ( isset( $settings['toggle_one_selected_icon'] ) && 'left' === esc_attr( $settings['toggle_one_icon_align'] ) ) : ?>
								<div class="icon-wrapper">
							<?php Icons_Manager::render_icon( $settings['toggle_one_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
						<?php endif; ?>
							<h5 class="wpmozo_toggle_title">
							<?php echo esc_html( $toggle_one_title ); ?>
							</h5>
						<?php if ( isset( $settings['toggle_one_selected_icon'] ) && 'right' === ( esc_attr( $settings['toggle_one_icon_align'] ) ) ) : ?>
								<div class="icon-wrapper">
							<?php Icons_Manager::render_icon( $settings['toggle_one_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
						<?php endif; ?>
						</div>
						<div class="wpmozo_toggle_button">
							<label class="wpmozo_toggle_button_inner">
								<input class="wpmozo_ae_toggle_field" type="checkbox" value="">
								<div class="wpmozo_switch wpmozo_round"></div>
							</label>
						</div>
						<div class="wpmozo_toggle_title_value  wpmozo_toggle_on_value">    
						<?php if ( isset( $settings['toggle_two_selected_icon'] ) && 'left' === esc_attr( $settings['toggle_two_icon_align'] ) ) : ?>
								<div class="icon-wrapper">
							<?php Icons_Manager::render_icon( $settings['toggle_two_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
						<?php endif; ?>                        
							<h5 class="wpmozo_toggle_title"><?php echo esc_html( $toggle_two_title ); ?></h5>
						<?php if ( isset( $settings['toggle_two_selected_icon'] ) && 'right' === esc_attr( $settings['toggle_two_icon_align'] ) ) : ?>
								<div class="icon-wrapper">
							<?php Icons_Manager::render_icon( $settings['toggle_two_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
								</div>
						<?php endif; ?>
						</div>
					</div>
						<?php
					} else {
						?>
							<div class="wpmozo_toggle_button_wrapper <?php echo esc_attr( $toggle_switch_layout ); ?> wpmozo_toggle_<?php echo esc_attr( $toggle_switch_alignment ); ?>">
								<input class="wpmozo_ae_toggle_field" id="<?php echo esc_attr( $label_id ); ?>" type="checkbox" value="" />
								<label class="wpmozo_switch" for="<?php echo esc_attr( $label_id ); ?>">
									<div class="wpmozo_switch_trigger wpmozo_switch_one wpmozo_active" data-value="<?php echo esc_attr( $toggle_one_title ); ?>">
										<?php if ( isset( $settings['toggle_one_selected_icon'] ) && 'left' === esc_attr( $settings['toggle_one_icon_align'] ) ) : ?>
											<div class="icon-wrapper">
											<?php Icons_Manager::render_icon( $settings['toggle_one_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
											</div>
										<?php endif; ?>
										<h5 class="wpmozo_toggle_title"><?php echo esc_html( $toggle_one_title ); ?></h5>
											<?php if ( isset( $settings['toggle_one_selected_icon'] ) && 'right' === ( esc_attr( $settings['toggle_one_icon_align'] ) ) ) : ?>
												<div class="icon-wrapper">
													<?php Icons_Manager::render_icon( $settings['toggle_one_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
												</div>
											<?php endif; ?>
									</div>
									<div class="wpmozo_switch_trigger wpmozo_switch_two wpmozo_inactive" data-value="<?php echo esc_attr( $toggle_two_title ); ?>">
										<?php if ( isset( $settings['toggle_two_selected_icon'] ) && 'left' === esc_attr( $settings['toggle_two_icon_align'] ) ) : ?>
											<div class="icon-wrapper">
												<?php Icons_Manager::render_icon( $settings['toggle_two_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
											</div>
										<?php endif; ?>                        
										<h5 class="wpmozo_toggle_title"><?php echo esc_html( $toggle_two_title ); ?></h5>
										<?php if ( isset( $settings['toggle_two_selected_icon'] ) && 'right' === esc_attr( $settings['toggle_two_icon_align'] ) ) : ?>
											<div class="icon-wrapper">
												<?php Icons_Manager::render_icon( $settings['toggle_two_selected_icon'], array( 'aria-hidden' => 'true' ) ); ?>
											</div>
										<?php endif; ?>
									</div>
								</label>
							</div>
						<?php
					}
					?>
					<div class="wpmozo_content_one_toggle animate__animated animate__<?php echo esc_attr( $settings['entrance_animation'] ); ?> wpmozo_content_active wpmozo_content_container wpmozo_content_toggle_<?php echo esc_attr( $toggle_one_type ); ?>">
						<?php
						if ( 'page' === $toggle_one_type ) {
							array_push( self::$toggle_one_page_ids, $toggle_one_page_id );
							if ( 0 === $toggle_one_page_id ) {
								$toggle_one_content = 'Please select a page.';
							} else {
								$elementor_instance = Plugin::$instance;

								// Get and render the Elementor content.
								if ( in_array( $toggle_one_page_id, self::$toggle_one_page_ids, true ) && isset( self::$toggle_one_page_ids[1] ) ) {
									$toggle_one_content = sprintf(
										'Recursion found! Ensure "%s" page doesn\'t include this page in toggle one.',
										esc_html( get_the_title( self::$toggle_one_page_ids[0] ) )
									);
								} else {
									$toggle_one_content = $elementor_instance->frontend->get_builder_content_for_display( $toggle_one_page_id, true );
									if ( ! str_contains( $toggle_one_content, 'elementor-element' ) ) {
										$toggle_one_content = get_the_content( null, false, $toggle_one_page_id );
										$toggle_one_content = do_shortcode( $toggle_one_content );
									}
								}
							}
						} elseif ( 'template' === $toggle_one_type ) {
							if ( 0 === $toggle_one_template_id ) {
								$toggle_one_content = 'Please select a template.';
							} else {
								$plugin_elementor   = Plugin::instance();
								$toggle_one_content = $plugin_elementor->frontend->get_builder_content_for_display( $toggle_one_template_id, true );
							}
						} else {
							$toggle_one_content = $toggle_one_text_content;
						}
							echo $toggle_one_content;
						?>
					</div>
					<div class="wpmozo_content_two_toggle animate__animated animate__<?php echo esc_attr( $settings['entrance_animation'] ); ?>  wpmozo_content_container wpmozo_content_toggle_<?php echo esc_attr( $toggle_two_type ); ?>">
						<?php
						if ( 'page' === $toggle_two_type ) {
							array_push( self::$toggle_two_page_ids, $toggle_two_page_id );
							if ( 0 === $toggle_two_page_id ) {
								$toggle_two_content = 'Please select a page.';
							} else {
								$elementor_instance = Plugin::$instance;

								// Get and render the Elementor content.
								if ( in_array( $toggle_two_page_id, self::$toggle_two_page_ids, true ) && isset( self::$toggle_two_page_ids[1] ) ) {
									$toggle_two_content = sprintf(
										'Recursion found! Ensure "%s" page doesn\'t include this page in toggle two.',
										esc_html( get_the_title( self::$toggle_two_page_ids[0] ) )
									);
								} else {
									$toggle_two_content = $elementor_instance->frontend->get_builder_content_for_display( $toggle_two_page_id, true );

									if ( ! str_contains( $toggle_two_content, 'elementor-element' ) ) {
										$toggle_two_content = get_the_content( null, false, $toggle_two_page_id );
										$toggle_two_content = do_shortcode( $toggle_two_content );
									}
								}
							}
						} elseif ( 'template' === $toggle_two_type ) {
							if ( 0 === $toggle_two_template_id ) {
								$toggle_two_content = 'Please select a template.';
							} else {
								$plugin_elementor   = Plugin::instance();
								$toggle_two_content = $plugin_elementor->frontend->get_builder_content_for_display( $toggle_two_template_id, true );
							}
						} else {
							$toggle_two_content = $toggle_two_text_content;
						}
							echo $toggle_two_content;
						?>
					</div>
				</div>
			</div>
		<?php
	}
}
