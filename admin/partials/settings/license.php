<?php
$atts = array(
	'name' 		=> 'license_key',
	'label'		=> esc_html__( 'Enter License Key', 'wpmozo-addons-for-elementor' ),
	'default'	=> '',
	'info'		=> '',
	'attrs'		=> array(
		'placeholder' => esc_html__( 'License Key', 'wpmozo-addons-for-elementor' ),
	),
);
echo $this->settings->render( 'licensefield', $atts );
