<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2023 Elicus Technologies Private Limited
 * @version     1.0.0
 */

if ( 'image' === $settings['front_use_icon_image'] && '' !== $settings['front_image'] ) {			

	$front_image = ( '' !== $settings['front_image']['url'] ) ?  '<div class="wpmozo_ae_flipbox_image"><img src="'.$settings['front_image']['url'].'" alt="'.esc_attr( $settings['front_image_alt'] ).'"/></div>' : '';

}

if ( '' !== $front_title ) {	
	$f_title = '<div ' . $this->get_render_attribute_string( 'flipbox_title' ) . '>
					' . $front_title . '
				</div>';

} else {
	$f_title = '';
}

if ( '' !== $front_content ) {	
	$f_content = '<div ' . $this->get_render_attribute_string( 'flipbox_content' ) . '>
					' . $front_content . '
				</div>';

} else {
	$f_content = '';
}

if ( '' !== $back_title ) {
	
	$b_title = '<div ' . $this->get_render_attribute_string( 'flipbox_title' ) . '>
					' . $back_title . '
				</div>';

} else {
	$b_title = '';
}

if ( '' !== $back_content ) {
	$b_content = '<div ' . $this->get_render_attribute_string( 'flipbox_content' ) . '>
					' . $back_content . '
				</div>';

} else {
	$b_content = '';
}

if ( '' !== $button_html ) {
	$b_button = '<div class="wpmozo_ae_flipbox_button_back">
					' . $button_html . '
				</div>';

} else {
	$b_button = '';
}

$flipbox_content =  '<div class="wpmozo_ae_flipbox_wrapper '.$settings['flipbox_layout'].'" flip-direction="'.$settings['layout1_flip_style'].'">
						<div class="wpmozo_ae_flipbox_side wpmozo_ae_flipbox_front wpmozo_ae_flipbox_position_'.$settings['front_icon_placement'].' wpmozo_ae_flipbox_content_'.$settings['front_content_align'].'">
							<div class="wpmozo_ae_flipbox_inner">'    
								.$front_image
								.$front_icon.
								'<div class="wpmozo_ae_flipbox_front_content_wrapper">'
									.$f_title
									.$f_content.
								'</div>
							</div>
						</div>
						<div class="wpmozo_ae_flipbox_side wpmozo_ae_flipbox_back wpmozo_ae_flipbox_position_'.$settings['back_icon_placement'].' wpmozo_ae_flipbox_content_'.$settings['back_content_align'].'">
							<div class="wpmozo_ae_flipbox_inner">'
								.$back_image
								.$back_icon.
								'<div class="wpmozo_ae_flipbox_back_content_wrapper">'
									.$b_title
									.$b_content
									.$b_button.
								'</div>
							</div>
						</div>
					</div><script src="http://localhost:10004/wp-content/plugins/wpmozo-addons-for-elementor-lite/widgets/flip-box/assets/js/flip-box-custom.js?ver=6.0.2" id="wpmozo-ae-flipbox-script-js"></script>';