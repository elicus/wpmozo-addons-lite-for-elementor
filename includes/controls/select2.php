<?php

use Elementor\Base_Data_Control;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'WPMOZO_ALE_Select2' ) ) {
	class WPMOZO_ALE_Select2 extends Base_Data_Control {

		/**
		 * Set control type.
		 */
		public function get_type() {
			return 'wpmozo-select';
		}

		public function enqueue() {

			wp_register_script( 'wpmozo-select', WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_URL . 'includes/controls/js/wpmozoSelect2.min.js', array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );
			wp_enqueue_script( 'wpmozo-select' );
			wp_localize_script(
				'wpmozo-select',
				'wpmozo_select_localize',
				array(
					'ajaxurl'     => admin_url( 'admin-ajax.php' ),
					'search_text' => esc_html__( 'Search', 'wpmozo-addons-lite-for-elementor' ),
					'nonce'       => wp_create_nonce( 'wpmozo-select-nonce' ),
				)
			);
		}

		/**
		 * control field markup
		 */
		public function content_template() {
			$control_uid = $this->get_control_uid();
			?>
			<# var controlUID = '<?php echo esc_attr( $control_uid ); ?>'; #>
			<# var currentID = elementor.panel.currentView.currentPageView.model.attributes.settings.attributes[data.name]; #>
			<div class="elementor-control-field">
				<# if ( data.label ) { #>
				<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{data.label }}}</label>
				<# } #>
				<div class="elementor-control-input-wrapper elementor-control-unit-5">
					<# var multiple = ( data.multiple ) ? 'multiple' : ''; #>
					<select id="<?php echo esc_attr( $control_uid ); ?>" {{ multiple }} class="wpmozo-select" data-setting="{{ data.name }}"></select>
				</div>
			</div>
			<#
			( function( $ ) {
			$( document.body ).trigger( 'wpmozo_elementor_select_init',{currentID:data.controlValue,data:data,controlUID:controlUID,multiple:data.multiple} );
			}( jQuery ) );
			#>
			<?php
		}

		/**
		 * Set default settings
		 */
		protected function get_default_settings() {
			return array(
				'multiple'    => false,
				'source_name' => 'post_type',
				'source_type' => 'post',
			);
		}
	}
}