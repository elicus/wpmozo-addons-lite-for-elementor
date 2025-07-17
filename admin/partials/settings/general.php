<?php

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$widgets      = glob( WPMOZO_ADDONS_FOR_ELEMENTOR_DIR_PATH . 'widgets/*', GLOB_ONLYDIR );
$lite_widgets = glob( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'widgets/*', GLOB_ONLYDIR );
$widgets      = array_merge( $lite_widgets, $widgets );
if ( is_array( $widgets ) && ! empty( $widgets ) ) {
	$plugin_option = get_option( WPMOZO_ADDONS_FOR_ELEMENTOR_OPTION );
	$widgets       = array_map( 'basename', $widgets );
	$inactives     = array_diff( explode( ',', $plugin_option['wpmozo_inactive_widgets'] ), $widgets );
	$widgets_list  = array();
	foreach ( $widgets as $widget ) {
		$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $widget ) );
		$key                  = sanitize_text_field( $mod );
		$widgets_list[ $key ] = esc_html( str_replace( '-', ' ', $mod ) );
	}
	$atts         = array(
		'label'            => esc_html__( 'Widgets', 'wpmozo-addons-lite-for-elementor' ),
		'name'             => 'wpmozo_active_widgets',
		'widgets'          => $widgets,
		'inactive_name'    => 'wpmozo_inactive_widgets',
		'inactive_default' => $inactives,
		'options'          => $widgets_list,
		'info'             => esc_html__( 'Mark the widgets you want to display in the editor.', 'wpmozo-addons-lite-for-elementor' ),
	);
	$allowed_tags = array(
		'div'   => array( 'class' => array() ),
		'label' => array( 'for' => array() ),
		'span'  => array( 'class' => array() ),
		'input' => array(
			'type'    => array(),
			'class'   => array(),
			'id'      => array(),
			'value'   => array(),
			'name'    => array(),
			'checked' => array(),
		),
	);
	echo wp_kses( $this->settings->render( 'multiple_checkbox', $atts ), $allowed_tags );
}
?>
<div class="wpmozo_ae_panel_save_button">
	<a class="wpmozo_ae_panel_save_options" href="javascript:void(0)">
		<span class="wpmozo_ae_panel_save_text" data-text="<?php echo esc_html__( 'Save', 'wpmozo-addons-lite-for-elementor' ); ?>"><?php echo esc_html__( 'Save', 'wpmozo-addons-lite-for-elementor' ); ?></span>
	</a>
</div>