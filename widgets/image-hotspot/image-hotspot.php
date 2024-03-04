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
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Plugin;

class WPMOZO_ALE_Image_Hotspot extends Widget_Base {




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
		return 'wpmozo_ale_image_hotspot';
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
		return esc_html__( 'Image Hotspot', 'wpmozo-addons-lite-for-elementor' );
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
		return 'eicon-image-hotspot wpmozo-ale-brandicon';
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
		wp_register_style( 'wpmozo-ale-image-hotspot-style', plugins_url( 'assets/css/style.min.css?test=' . wp_rand(), __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
		return array( 'wpmozo-ale-image-hotspot-style' );
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

		wp_register_script( 'wpmozo-ale-image-hotspot-script', plugins_url( 'assets/js/script.min.js?test=' . wp_rand(), __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

		return array( 'wpmozo-ale-image-hotspot-script', 'wpmozo-ale-twenty-twenty', 'wpmozo-ale-move-event', 'wpmozo-ale-popper', 'wpmozo-ale-tippy', 'tippy' );
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'image-hotspot/assets/controls/controls.php';
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
		$settings                 = $this->get_settings_for_display();
		$widget_id                = $this->get_id();
		$marker_list              = $settings['marker_list'];
		$show_tooltip_on          = $settings['show_tooltip_on'];
		$show_speech_bubble       = $settings['show_speech_bubble'];
		$make_interactive_tooltip = $settings['make_interactive_tooltip'];
		$use_pulse_animation      = $settings['use_pulse_animation'];
		$animation_duration       = $settings['tooltip_animation_duration']['size'];

		$animation_name = '';
		if ( isset( $settings['tooltip_animation_type'] ) ) {
			if ( isset( $settings['animation_type_toward'] ) ) {
				$animation_name = $settings['animation_type_toward'];
			} elseif ( isset( $settings['animation_type_scale'] ) ) {
				$animation_name = $settings['animation_type_scale'];
			} elseif ( isset( $settings['animation_type_perspective'] ) ) {
				$animation_name = $settings['animation_type_perspective'];
			} elseif ( isset( $settings['animation_type_away'] ) ) {
				$animation_name = $settings['animation_type_away'];
			}
		}

		$pulse_animation_class = '';
		if ( 'yes' === $use_pulse_animation ) {
			$pulse_animation_class = 'pulse-start';
		}

		?>

		<div class="wpmozo-image-hotspot-wrapper <?php echo esc_attr( $pulse_animation_class ); ?>  elementor-<?php echo esc_attr( $widget_id ); ?>" id="wpmozo-<?php echo esc_attr( $widget_id ); ?>" data-speech-bubble= "<?php echo esc_attr( $show_speech_bubble ); ?>" data-interactive="<?php echo esc_attr( $make_interactive_tooltip ); ?>"  data-animation-type="<?php echo esc_attr( $settings['tooltip_animation_type'] ); ?>" data-animation-duration="<?php echo esc_attr( $animation_duration ); ?>" data-animation-name="<?php echo esc_attr( $animation_name ); ?>" data-tooltip-id="elementor-<?php echo esc_attr( $widget_id ); ?>" data-trigger="<?php echo esc_attr( $show_tooltip_on ); ?>">
			<img src="<?php echo esc_url( $settings['hotspot_image']['url'] ); ?>"   alt="<?php echo esc_attr( $settings['hotspot_image_alt_text'] ); ?>" id="mainImage">

			<?php
			foreach ( $marker_list as $index => $single_item ) {
				$marker_type = esc_attr( $single_item['marker_type'] );
				?>
						<div class="wpmozo-image-hotspot-single-item  elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-repeater-id="elementor-repeater-item-<?php echo esc_attr( $single_item['_id'] ); ?>" data-template="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>">
							<span class="wpmozo-marker-wrapper marker-type-<?php echo esc_attr( $marker_type ); ?>">								 
							<?php if ( 'text' === $marker_type ) : ?>
									<?php echo esc_attr( $single_item['marker_text'] ); ?>
								<?php endif; ?>
							<?php if ( 'icon' === $marker_type ) : ?>
									<?php
									Icons_Manager::render_icon(
										$single_item['marker_icon'],
										array(
											'aria-hidden' => 'true',
											'class'       => 'wpmozo_ale_marker_icon',
										)
									);
									?>
								<?php endif; ?>
							<?php if ( 'image' === $marker_type ) : ?>									
									<img src="<?php echo esc_attr( $single_item['marker_image']['url'] ); ?>">
								<?php endif; ?>
							</span>
						</div>
						<!-- tooltip content -->
						<div id="tooltip-content-<?php echo esc_attr( $widget_id ); ?>-<?php echo esc_attr( $index ); ?>"  class="wpmozo-image-hotspot-tooltip-content" >
							<?php

							if ( 'text' === $single_item['tooltip_content_type'] ) {
								echo wp_kses_post( $single_item['tooltip_text'] );
							} elseif ( 'template' === $single_item['tooltip_content_type'] ) {
								$plugin_elementor = Plugin::instance();
								echo $plugin_elementor->frontend->get_builder_content_for_display( sanitize_text_field( $single_item['select_template'] ), true );
							}

							?>
						</div>						
					<?php
			}
			?>

		</div>		
		<?php

		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
			?>
				<script type="text/javascript">
					var dynamicVariables = {};              
					document.querySelectorAll(".wpmozo-image-hotspot-wrapper").forEach(function (element) {
					var singleId            = element.getAttribute("data-tooltip-id").replace('elementor-','');
					var dataTrigger         = element.getAttribute("data-trigger");
					var speechBubble        = element.getAttribute("data-speech-bubble");
					var dataInteractive     = element.getAttribute("data-interactive");
					var dataAnimationName   = element.getAttribute('data-animation-name');  
					var animationDuration   = element.getAttribute('data-animation-duration');             
			
					dynamicVariables['tippyOptions_'+singleId] = {
						allowHTML: true,
						placement: 'top',
						theme: 'light',                                            
						interactive: true,                                                                   
						content: function (reference) {                            
							var id = reference.getAttribute('data-template');
							var template = document.getElementById(id);
							return template.innerHTML;
						},
					};
					if (dataTrigger === 'click') {
						dynamicVariables['tippyOptions_'+singleId].trigger = 'click';
					}
					if ('' === speechBubble) {
						dynamicVariables['tippyOptions_'+singleId].arrow = false;
					}
					if ('' === animationDuration) {
						dynamicVariables['tippyOptions_'+singleId].arrow = false;
					}
					
					// if ('yes' === dataInteractive) {
					//     dynamicVariables['tippyOptions_'+singleId].interactive = true;
					// }
					if ('' !== dataAnimationName) {
						dynamicVariables['tippyOptions_'+singleId].duration = animationDuration;
					}
					tippy('.elementor-' + singleId + ' .wpmozo-image-hotspot-single-item', dynamicVariables['tippyOptions_'+singleId]);
				}); 
				</script>
			<?php
		}
	}
}
