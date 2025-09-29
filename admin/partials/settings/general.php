<?php

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$widgets      = glob( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_DIR_PATH . 'widgets/*', GLOB_ONLYDIR );
if ( is_array( $widgets ) && ! empty( $widgets ) ) {
	$plugin_option = get_option( WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_OPTION );
	$widgets       = array_map( 'basename', $widgets );
	$inactives     = array_diff( explode( ',', $plugin_option['wpmozo_inactive_widgets'] ), $widgets );
	$widgets_list  = array();
	foreach ( $widgets as $widget ) {
		$mod                  = trim( preg_replace( '/[A-Z]([A-Z](?![a-z]))*/', ' $0', $widget ) );
		$key                  = sanitize_text_field( $mod );
		$widgets_list[ $key ] = esc_html( str_replace( '-', ' ', $mod ) );
	}
	/*array_push($widgets_list, $var);*/

	$pro_widgets = array(
		/*'content-toggle'             => 'Content Toggle',
		'instagram'                  => 'Instagram',
		'advanced-blog'              => 'Advanced Blogs',
		'ajax-search'                => 'AJAX Search',
		'image-hotspot'              => 'Image Hotspot',
		'product-carousel'           => 'Product Carousel',
		'product-grid'               => 'Product Grid',
		'timeline'                   => 'Timeline',
		'modal-popup'                => 'Modal Popup',
		'advanced-tabs'              => 'Advanced Tabs',
		'dynamic-gallery'            => 'Dynamic Gallery',
		'instagram-feed-carousel'    => 'Instagram Feed Carousel',
		'gravity-form-styler'        => 'Gravity Form Styler',
		'product-categories'         => 'Product Categories',
		'advanced-blog-slider'       => 'Advanced Blog Slider',
		'team-grid'                  => 'Team Grid',
		'testimonial-grid'           => 'Testimonial Grid',
		'twitter-timeline'           => 'Twitter Timeline',
		'product-accordion'          => 'Product Accordion',
		'product-gallery'            => 'Product Gallery',
		'image-carousel'             => 'Image Carousel',
		'facebook-embedded-post'     => 'Facebook Embedded Post',
		'facebook-page'              => 'Facebook Page',
		'hero-slider'                => 'Hero Slider',
		'horizontal-scrolling-card'  => 'Horizontal Scrolling Card',
		'hover-list'                 => 'Hover List',
		'split-image'                => 'Split Image',
		'image-card-ticker'          => 'Image Card Ticker',
		'marquee-text'               => 'Marquee Text'*/
	);
	$pro_widgets = apply_filters( 'wpmozo_add_pro_widgets_to_panel', $pro_widgets );
	$widgets_list = array_merge( $widgets_list, array_unique( $pro_widgets )  ) ;
	ksort($widgets_list);

	$atts         = array(
		'label'            => esc_html__( 'Widgets', 'wpmozo-addons-for-elementor' ),
		'name'             => 'wpmozo_active_widgets',
		'widgets'          => $widgets,
		'inactive_name'    => 'wpmozo_inactive_widgets',
		'inactive_default' => $inactives,
		'options'          => $widgets_list,
		'pros'             => $pro_widgets,
		'info'             => esc_html__( 'Mark the widgets you want to display in the editor.', 'wpmozo-addons-for-elementor' ),
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
	<a class="wpmozo_ae_lite_panel_save_options" href="javascript:void(0)">
		<span class="wpmozo_ae_panel_save_text" data-text="<?php echo esc_html__( 'Save', 'wpmozo-addons-for-elementor' ); ?>"><?php echo esc_html__( 'Save', 'wpmozo-addons-for-elementor' ); ?></span>
	</a>
</div>