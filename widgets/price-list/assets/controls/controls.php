<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;


$this->start_controls_section( 'configuration_section',
    array( 
        'label' 	=> esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   	=> Controls_Manager::TAB_CONTENT,
    )
);
$this->add_control(
	'price_list_layout',
	array(
		'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'layout1',
		'options' => array(
			'layout1' 	=> esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2'  	=> esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_responsive_control( 'number_of_columns',
        array(
            'label'     => esc_html__( 'Number of Columns', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::SELECT,
			'options' => array(
				'1' 	=> esc_html__( '1', 'wpmozo-addons-lite-for-elementor' ),
				'2'  	=> esc_html__( '2', 'wpmozo-addons-lite-for-elementor' ),
				'3'  	=> esc_html__( '3', 'wpmozo-addons-lite-for-elementor' ),
				'4'  	=> esc_html__( '4', 'wpmozo-addons-lite-for-elementor' ),
				'5'  	=> esc_html__( '5', 'wpmozo-addons-lite-for-elementor' ),
				'6'  	=> esc_html__( '6', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default' => '1',
			'render_type' => 'template',
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo_price_list_item' => 'width : calc( calc( 100% / {{VALUE}} ) - calc( {{column_spacing.size}}{{column_spacing.unit}} * calc( {{VALUE}} - 1 ) / {{VALUE}} ) ) ;' 
			),
        )
    );
$this->add_responsive_control( 'column_spacing',
	array(
		'label' => esc_html__( 'Column Spacing', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::SLIDER,
		'range' => array(
			'px' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			)
		),
		'devices' => array( 'desktop', 'tablet', 'mobile' ),
		'default' => array(
			'size' => 20,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 20,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'  => array( 'px' ),
		'render_type' => 'template',
		'selectors'      => array( 
            '{{WRAPPER}} .column_2 .wpmozo_price_list_item:not(:nth-child(2n)), {{WRAPPER}} .column_3 .wpmozo_price_list_item:not(:nth-child(3n)), {{WRAPPER}} .column_4 .wpmozo_price_list_item:not(:nth-child(4n)), {{WRAPPER}} .column_5 .wpmozo_price_list_item:not(:nth-child(5n)), {{WRAPPER}} .column_6 .wpmozo_price_list_item:not(:nth-child(6n))' => 'margin-right: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_price_list_item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
		),
	)
);  
$this->end_controls_section();
$this->start_controls_section(
	'price_list_section',
	array(
		'label' 	=> esc_html__( 'Price List Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	=> Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'item_title',
	array(
		'label'       => esc_html__( 'Item Title', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Item Title', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$repeater->add_control(
	'item_currency',
	array(
		'label'       => esc_html__( 'Currency', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( '$', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'separator'   => 'before',
	)
);
$repeater->add_control(
	'item_price',
	array(
		'label'       => esc_html__( 'Item Price', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( '10', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'separator'   => 'before',
	)
);
$repeater->add_control(
	'item_price_period',
	array(
		'label'       => esc_html__( 'Item Price Period', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'separator'   => 'before',
	)
);
$repeater->add_control(
	'item_thumbnail_type',
	array(
		'label'   => esc_html__( 'Image/Icon as thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'use_image',
		'options' => array(
			'use_icon'  => esc_html__( 'Use Icon', 'wpmozo-addons-lite-for-elementor' ),
			'use_image' => esc_html__( 'Use Image', 'wpmozo-addons-lite-for-elementor' ),
		),
		'label_block' => true,
	)
);

$repeater->add_control(
	'item_thumbnail_icon',
	array(
		'label'   => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array(
			'value'   => 'fas fa-check-circle',
			'library' => 'fa-solid',
		),
		'condition' => array(
			'item_thumbnail_type' => array( 'use_icon' ),
		),
	)
);

$repeater->add_control(
	'item_item_thumbnail',
	array(
		'label'   => esc_html__( 'Item Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array(
			'url' => Utils::get_placeholder_image_src(),
		),
		'condition' => array(
			'item_thumbnail_type' => array( 'use_image' ),
		),
	)
);
$repeater->add_responsive_control(
	'item_thumbnail_alt',
	array(
		'label'     => esc_html__( 'Item Thumbnail Alt Tag', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::TEXT,
		'condition' => array(
			'item_thumbnail_type' => array( 'use_image' ),
		),
	)
);
$repeater->add_control(
	'item_content',
	array(
		'label'       => esc_html__( 'Item Content', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::WYSIWYG,
		'default'     => esc_html__( 'Item Content', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'separator'   => 'before',
	)
);
$this->add_control(
	'wpmozo_items_content',
	array(
		'label'   		=> esc_html__( 'Price List Items', 'wpmozo-addons-lite-for-elementor' ),
		'type'    		=> Controls_Manager::REPEATER,
		'fields'  		=> $repeater->get_controls(),
		'default' 		=> array(
			array(
				'item_title' 	=> esc_html__( 'Item Title', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
		'title_field' 	=> '{{{ item_title }}}',
	)
);
$this->end_controls_section();
$this->start_controls_section( 'text_styling',
    array( 
        'label' => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
	$this->add_responsive_control( 
		'text_alignment',
		array( 
			'label'      => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::CHOOSE,
			'options'    => array( 
				'left'   => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list, {{WRAPPER}} .wpmozo_price_list a' => 'text-align: {{VALUE}};',
			),
			'default' 	=> 'left',
			'toggle' 	=> true,
		)
	);
	
$this->end_controls_section();
$this->start_controls_section( 'thumbnail_styling',
	array( 
		'label' => esc_html__( 'Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	$this->add_responsive_control( 'thumbnail_alignment',
		array( 
			'label'      => esc_html__( 'Thumbnail Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::CHOOSE,
			'options'    => array( 
				'left'   => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_thumbnail' => 'text-align: {{VALUE}};',
			),
			'default' 	=> 'left',
			'toggle' 	=> true,
		)
	);
	$this->add_responsive_control(
		'thumbnail_width',
		array(
			'label' 		=> esc_html__( 'Thumbnail Width', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::SLIDER,
			'size_units' 	=> array('px'),
			'range' 		=> array(
				'px' 	=> array(
					'min' 		=> 1,
					'max' 		=> 100,
				),
			),
			'default' 		=> array(
				'unit' 	=> 'px',
				'size' 	=> 100,
			),
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_thumbnail img' => 'width: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);

	$this->start_controls_tabs(
		'thumbnail_border_tabs'
	);
	$this->start_controls_tab(
		'thumbnail_border_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'thumbnail_border',
			'fields_options' 	=> array(
				'border' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border', 'wpmozo-addons-lite-for-elementor' ),
				),
				'width' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border Width', 'wpmozo-addons-lite-for-elementor' ),
				),
				'color' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border Color', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'selector' => "{{WRAPPER}} .wpmozo_price_list_item_thumbnail img",
		)
	);
	$this->add_responsive_control( 
		'thumbnail_border_radius',
		array( 
			'label'      => esc_html__( 'Thumbnail Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item_thumbnail img" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'      => 'thumbnail_box_shadow',
			'label'       => esc_html__( 'Thumbnail Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} .wpmozo_price_list_item_thumbnail img',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'thumbnail_border_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'thumbnail_border_hover',
			'fields_options' 	=> array(
				'border' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border', 'wpmozo-addons-lite-for-elementor' ),
				),
				'width' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border Width', 'wpmozo-addons-lite-for-elementor' ),
				),
				'color' 			=> array(
					'label' 		=> esc_html__( 'Thumbnail Border Color', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'selector' => "{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_price_list_item_thumbnail img",
		)
	);
	$this->add_responsive_control( 
		'thumbnail_border_radius_hover',
		array( 
			'label'      => esc_html__( 'Thumbnail Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_price_list_item_thumbnail img" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'      => 'thumbnail_box_shadow_hover',
			'label'       => esc_html__( 'Thumbnail Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_price_list_item_thumbnail img',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'icon_style_section',
	array(
		'label' 	=> esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control( 
	'icon_font_size',
	array( 
		'label'     => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array( 
			'px' 		=> array( 
				'min' 		=> 1,
				'max' 		=> 500,
				'step' 		=> 1,
			),
		),
		'default'   => array( 
			'unit' 		=> 'px',
			'size' 		=> 100,
		),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_price_list_item_icon span.wpmozo_price_list_icon' 	=> 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_price_list_item_icon svg.wpmozo_price_list_icon' 	=> 'width: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);

$this->add_control(
	'style_icon',
	array(
		'label'        => esc_html__( 'Style Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'icon_shape',
	array(
		'label'   => esc_html__( 'Shape', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'use_square',
		'options' => array(
			'use_circle'  => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			'use_square'  => esc_html__( 'Square', 'wpmozo-addons-lite-for-elementor' ),
			'use_hexagon' => esc_html__( 'Hexagon', 'wpmozo-addons-lite-for-elementor' ),
		),
		'label_block' => true,
		'condition'   => array(
			'style_icon' => 'yes',
		),
	)
);
$this->add_control(
	'display_shape_border',
	array(
		'label'        => esc_html__( 'Display Shape Border', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
		'condition'    => array(
			'style_icon' => 'yes',
		),
	)
);
$this->start_controls_tabs(
    'icon_color_tabs'
);
$this->start_controls_tab(
    'icon_color_normal_tab',
    array(
        'label' 	 => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
    )
);
$this->add_responsive_control( 
	'icon_color',
	array( 
		'label'      => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::COLOR,
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_price_list_item_icon span.wpmozo_icon'         => 'color: {{VALUE}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_price_list_item_icon svg.wpmozo_icon' 			=> 'fill: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_control(
	'shape_background_color',
	array(
		'label'     => esc_html__( 'Shape Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .use_circle,{{WRAPPER}} .use_square,{{WRAPPER}} .wpmozo_hexagon' => 'background-color: {{VALUE}};',
		),
		'condition' => array(
			'style_icon' => 'yes',
		),
	)
);
$this->add_control(
	'shape_border_color',
	array(
		'label'     => esc_html__( 'Shape Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#000000',
		'selectors' => array(
			'{{WRAPPER}} .use_circle,{{WRAPPER}} .use_square,{{WRAPPER}} .wpmozo_hexagon' => 'border-top: 2px {{VALUE}} solid;border-bottom: 2px {{VALUE}} solid;border-left:2px solid transparent;border-right:2px solid transparent;',
			'{{WRAPPER}} .wpmozo_price_list_layout .hexagon.wpmozo_hexagon:after,{{WRAPPER}} .wpmozo_price_list_layout .hexagon.wpmozo_hexagon:before' => 'border-top:2px solid {{VALUE}};border-bottom:2px solid {{VALUE}};border-color:inherit;'
		),
		'condition' => array(
			'style_icon'           => 'yes',
			'display_shape_border' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
    'icon_color_hover_tab',
    array(
        'label' 	=> esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
    )
);
$this->add_responsive_control( 
	'icon_color_hover',
	array( 
		'label'      => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::COLOR,
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_price_list_item_icon span.wpmozo_icon'       => 'color: {{VALUE}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_price_list_item_icon svg.wpmozo_icon' 		=> 'fill: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_control(
	'shape_background_hover_color',
	array(
		'label'     => esc_html__( 'Shape Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_price_list_item:hover .use_circle,{{WRAPPER}} .wpmozo_price_list_item:hover .use_square,{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_hexagon' => 'background-color: {{VALUE}};',
		),
		'condition' => array(
			'style_icon' => 'yes',
		),
	)
);
$this->add_control(
	'shape_border_hover_color',
	array(
		'label'     => esc_html__( 'Shape Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_price_list_item:hover .use_circle,{{WRAPPER}} .wpmozo_price_list_item:hover .use_square,{{WRAPPER}} .wpmozo_price_list_item:hover .wpmozo_hexagon' => 'border: 2px {{VALUE}} solid;',
		),
		'condition' => array(
			'style_icon'           => 'yes',
			'display_shape_border' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'title_section',
	array( 
		'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	$this->add_control( 
		'heading_level',
		array( 
			'label'       => esc_html__( 'Title Heading Level', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
			'label_block' => true,
			'options'     => array( 
				'h1' => array( 
					'title' => esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h1',
				),
				'h2' => array( 
					'title' => esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h2',
				),
				'h3' => array( 
					'title' => esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h3',
				),
				'h4' => array( 
					'title' => esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h4',
				),
				'h5' => array( 
					'title' => esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h5',
				),
				'h6' => array( 
					'title' => esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-editor-h6',
				),
			),
			'default'     => 'h3',
			'toggle'      => true,
		)
	);
	 $this->start_controls_tabs(
		'title_tabs'
	);
	$this->start_controls_tab(
		'title_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'title_color',
		array( 
			'label'      => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_title' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_title',
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'title_text_shadow',
			'label'    => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_title',
		 )
	 );
	$this->end_controls_tab();
	$this->start_controls_tab(
		'title_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	 $this->add_responsive_control( 
		'title_color_hover',
		array( 
			'label'      => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_title:hover' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'title_hover_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_title:hover',
		)
	);
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'title_hover_text_shadow',
			'label'    => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_title:hover',
		 )
	 );
	$this->end_controls_tab();
	$this->end_controls_tabs();

	$this->start_controls_tabs( 'title_padding_margin_control_tabs',
		array( 
				'separator'  => 'before',
			)
	 );
		$this->start_controls_tab( 
			'title_padding_tab',
			array( 
				'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			)
		 );
			$this->add_responsive_control( 
				'title_padding',
				array( 
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_price_list_item_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 
			'title_margin_tab',
			array( 
				'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_responsive_control( 
				'title_margin',
				array( 
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array( 
						'{{WRAPPER}} .wpmozo_price_list_item_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'price_section',
	array( 
		'label' => esc_html__( 'Price', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	 $this->start_controls_tabs(
		'price_tabs'
	);
	$this->start_controls_tab(
		'price_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'price_color',
		array( 
			'label'      => esc_html__( 'Price Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'price_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price',
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'price_text_shadow',
			'label'    => esc_html__( 'Price Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price',
		 )
	 );
	$this->end_controls_tab();
	$this->start_controls_tab(
		'price_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	 $this->add_responsive_control( 
		'price_color_hover',
		array( 
			'label'      => esc_html__( 'Price Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_price' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'price_hover_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_price',
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'price_hover_text_shadow',
			'label'    => esc_html__( 'Price Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_price',
		 )
	 );
	$this->end_controls_tab();
	$this->end_controls_tabs();	
$this->end_controls_section();
$this->start_controls_section( 'currency_section',
	array( 
		'label' => esc_html__( 'Currency', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	$this->add_control(
		'currency_symbol_position',
		array(
			'label'   => esc_html__( 'Currency Symbol Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'left',
			'options' => array(
				'left' 		=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'right'  	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);
	 $this->start_controls_tabs(
		'currency_tabs'
	);
	$this->start_controls_tab(
		'currency_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'currency_color',
		array( 
			'label'      => esc_html__( 'Currency Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_currency' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	 $this->add_group_control( 
	 	Group_Control_Typography::get_type(),
	 	array( 
	 		'name'     => 'currency_typography',
	 		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
	 		'selector' => '{{WRAPPER}} .wpmozo_price_list_item_currency',
	 	 )
	  );
	  $this->add_group_control( 
	 	Group_Control_Text_Shadow::get_type(),
	 	array( 
	 		'name'     => 'currency_text_shadow',
	 		'label'    => esc_html__( 'Currency Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
	 		'selector' => '{{WRAPPER}} .wpmozo_price_list_item_currency',
	 	 )
	  );
	$this->end_controls_tab();
	$this->start_controls_tab(
		'currency_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	 $this->add_responsive_control( 
		'currency_color_hover',
		array( 
			'label'      => esc_html__( 'Currency Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_currency' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'currency_hover_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_currency',
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'currency_hover_text_shadow',
			'label'    => esc_html__( 'Currency Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_wrap:hover .wpmozo_price_list_item_currency',
		 )
	 );
	$this->end_controls_tab();
	$this->end_controls_tabs();	
$this->end_controls_section();
$this->start_controls_section( 'divider_section',
	array( 
		'label' => esc_html__( 'Divider', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'price_list_layout' => 'layout1',
		)
	 )
);
	$this->add_responsive_control(
		'divider_width',
		array(
			'label' 		=> esc_html__( 'Divider Width', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::SLIDER,
			'size_units' 	=> array('px', '%'),
			'range' 		=> array(
				'px' 	=> array(
					'min' 		=> 1,
					'max' 		=> 100,
				),
			),
			'default' 		=> array(
				'unit' 	=> 'px',
				'size' 	=> 1,
			),
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_price_divider' => 'border-top-width: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_control(
		'divider_style',
		array(
			'label'   => esc_html__( 'Divider Style', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'dotted',
			'options' => array(
				'solid' 	=> esc_html__( 'Solid', 'wpmozo-addons-lite-for-elementor' ),
				'dashed'  	=> esc_html__( 'Dashed', 'wpmozo-addons-lite-for-elementor' ),
				'dotted'  	=> esc_html__( 'Dotted', 'wpmozo-addons-lite-for-elementor' ),
				'double'  	=> esc_html__( 'Double', 'wpmozo-addons-lite-for-elementor' ),
				'groove'  	=> esc_html__( 'Groove', 'wpmozo-addons-lite-for-elementor' ),
				'ridge'  	=> esc_html__( 'Ridge', 'wpmozo-addons-lite-for-elementor' ),
				'inset'  	=> esc_html__( 'Inset', 'wpmozo-addons-lite-for-elementor' ),
				'outset'  	=> esc_html__( 'Outset', 'wpmozo-addons-lite-for-elementor' ),
			),
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_price_divider' => 'border-top-style: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'divider_color_tabs'
	);
	$this->start_controls_tab(
		'divider_color_normal_tab',
		array(
			'label' 	 => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'divider_color',
		array( 
			'label'      => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price_divider' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	$this->end_controls_tab();
	$this->start_controls_tab(
		'divider_color_hover_tab',
		array(
			'label' 	=> esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'divider_color_hover',
		array( 
			'label'      => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_title_wrap:hover .wpmozo_price_list_item_price_divider' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	$this->end_controls_tab();
	$this->end_controls_tabs();	
$this->end_controls_section();
$this->start_controls_section( 'period_section',
	array( 
		'label' => esc_html__( 'Period', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	 $this->start_controls_tabs(
		'period_tabs'
	);
	$this->start_controls_tab(
		'period_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control( 
		'period_color',
		array( 
			'label'      => esc_html__( 'Period Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price_period' => 'color: {{VALUE}}; transition: all 300ms;',
			 ),
		 )
	 );
	$this->add_group_control( 
		Group_Control_Typography::get_type(),
		array( 
			'name'     => 'period_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_period',
		 )
	 );
	 $this->add_group_control( 
		Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'period_text_shadow',
			'label'    => esc_html__( 'Period Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_period',
		 )
	 );
	$this->end_controls_tab();
	$this->start_controls_tab(
		'period_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	 $this->add_responsive_control( 
		'period_color_hover',
		array( 
			'label'      => esc_html__( 'Period Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::COLOR,
			'selectors'  => array( 
				'{{WRAPPER}} .wpmozo_price_list_item_price_period:hover' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	 $this->add_group_control( 
	 	Group_Control_Typography::get_type(),
	 	array( 
	 		'name'     => 'period_hover_typography',
	 		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
	 		'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_period:hover',
	 		'exclude'  => array( 'font_size' ),
	 	 )
	  );
	  $this->add_group_control( 
	 	Group_Control_Text_Shadow::get_type(),
	 	array( 
	 		'name'     => 'period_hover_text_shadow',
	 		'label'    => esc_html__( 'Period Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
	 		'selector' => '{{WRAPPER}} .wpmozo_price_list_item_price_period:hover',
	 	 )
	  );
	$this->end_controls_tab();
	$this->end_controls_tabs();	
$this->end_controls_section();
$this->start_controls_section( 'description_section',
	array(
		'label' => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 	=> Controls_Manager::TAB_STYLE,
	)
);
	$this->start_controls_tabs('description_options');
	$this->start_controls_tab(
		'description_text',
		array(
			'label' 	=> '<i class="eicon-text"></i>',
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label' 		=> esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_typography',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description > p:not(:has(a))',
			'exclude' 		=> array('font_family'),
		)
	);
	$this->add_responsive_control(
		'description_font_family',
		array(
			'label' 			=> esc_html__( 'Description Font Family', 'wpmozo-addons-lite-for-elementor' ),
			'type' 				=> Controls_Manager::FONT,
			'default'			=> "'Open Sans', sans-serif",
			'selectors' 		=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description > p:not(:has(a))' => 'font-family: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_text_color',
		array(
			'label' 	=> esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type' 		=> Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description > p:not(:has(a))' => 'color: {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label' 		=> esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block'	=> true,
			'name' 			=> 'description_text_shadow',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description > p:not(:has(a))',
		)
	);
	$this->add_responsive_control(
		'description_alignment',
		array(
			'type' 		=> Controls_Manager::CHOOSE,
			'label' 	=> esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'options' 	=> array(
				'left' 		=> array(
					'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-left',
				),
				'center' 	=> array(
					'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-center',
				),
				'right' 	=> array(
					'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-right',
				),
				'justify' 	=> array(
					'title' 	=> esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-justify',
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description > p:not(:has(a))' => 'text-align: {{VALUE}};',
			),
			'toggle' 	=> true,
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'description_link',
		array(
			'label' => '<i class="eicon-editor-link"></i>',
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label' 		=> esc_html__( 'Link Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_link_typography',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description a',
			'exclude' 		=> array('font_family'),
		)
	);
	$this->add_responsive_control(
		'description_link_font_family',
		array(
			'label' 		=> esc_html__( 'Link Font Family', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::FONT,
			'default' 		=> "'Open Sans', sans-serif",
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description a' => 'font-family: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_link_color',
		array(
			'label' 	=> esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type' 		=> Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description a' => 'color: {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label' 		=> esc_html__( 'Link Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_link_text_shadow',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description a',
		)
	);
	$this->add_responsive_control(
		'description_link_alignment',
		array(
			'type' 		=> Controls_Manager::CHOOSE,
			'label' 	=> esc_html__( 'Link Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'options' 	=> array(
				'left' 		=> array(
					'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-left',
				),
				'center' 	=> array(
					'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-center',
				),
				'right' 	=> array(
					'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-right',
				),
				'justify' 	=> array(
					'title' 	=> esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-justify',
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description p:has(a)' => 'text-align: {{VALUE}};',
			),
			'toggle' 	=> true,
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'description_unordered',
		array(
			'label' => '<i class="eicon-editor-list-ul"></i>',
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label' 		=> esc_html__( 'Unordered Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_unordered_typography',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description ul',
			'exclude' 		=> array('font_family'),
		)
	);
	$this->add_responsive_control(
		'description_unordered_font_family',
		array(
			'label' 		=> esc_html__( 'Unordered Font Family', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::FONT,
			'default' 		=> "'Open Sans', sans-serif",
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ul' => 'font-family: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_unordered_color',
		array(
			'label' 	=> esc_html__( 'Unordered Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type' 		=> Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ul' => 'color: {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label' 		=> esc_html__( 'Unordered Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_unordered_text_shadow',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description ul',
		)
	);
	$this->add_responsive_control(
		'description_unordered_alignment',
		array(
			'type' 		=> Controls_Manager::CHOOSE,
			'label' 	=> esc_html__( 'Unordered Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'options' 	=> array(
				'left' 		=> array(
					'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-left',
				),
				'center' 	=> array(
					'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-center',
				),
				'right' 	=> array(
					'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-right',
				),
				'justify' 	=> array(
					'title' 	=> esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-justify',
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ul' => 'text-align: {{VALUE}};',
			),
			'toggle' 	=> true,
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'description_ordered',
		array(
			'label' => '<i class="eicon-editor-list-ol"></i>',
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label' 		=> esc_html__( 'Ordered Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_ordered_typography',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description ol',
			'exclude' 		=> array('font_family'),
		)
	);
	$this->add_responsive_control(
		'description_ordered_font_family',
		array(
			'label' 		=> esc_html__( 'Ordered Font Family', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::FONT,
			'default' 		=> "'Open Sans', sans-serif",
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ol' => 'font-family: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_ordered_color',
		array(
			'label' 		=> esc_html__( 'Ordered Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ol' => 'color: {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label' 		=> esc_html__( 'Ordered Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_ordered_text_shadow',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description ol',
		)
	);
	$this->add_responsive_control(
		'description_ordered_alignment',
		array(
			'type' 			=> Controls_Manager::CHOOSE,
			'label' 		=> esc_html__( 'Ordered Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'options' 		=> array(
				'left' 			=> array(
					'title' 		=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 			=> 'eicon-text-align-left',
				),
				'center' 		=> array(
					'title' 		=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 			=> 'eicon-text-align-center',
				),
				'right' 		=> array(
					'title' 		=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 			=> 'eicon-text-align-right',
				),
				'justify' 		=> array(
					'title' 		=> esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 			=> 'eicon-text-align-justify',
				),
			),
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description ol' => 'text-align: {{VALUE}};',
			),
			'toggle' 		=> true,
		)
	);
	$this->end_controls_tab();

	$this->start_controls_tab(
		'description_blockquote',
		array(
			'label' 	=> '<i class="eicon-editor-quote"></i>',
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label' 		=> esc_html__( 'Blockquote Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_blockquote_typography',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description blockquote',
			'exclude' 		=> array('font_family'),
		)
	);
	$this->add_responsive_control(
		'description_blockquote_font_family',
		array(
			'label' 		=> esc_html__( 'Blockquote Font Family', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::FONT,
			'default' 		=> "'Open Sans', sans-serif",
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description blockquote' => 'font-family: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_blockquote_color',
		array(
			'label' 		=> esc_html__( 'Blockquote Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type' 			=> Controls_Manager::COLOR,
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description blockquote' 			=> 'color: {{VALUE}}; transition: all 300ms;',
				'{{WRAPPER}} .wpmozo_price_list_item_description blockquote p:before' 	=> 'border-left: 5px solid {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label' 		=> esc_html__( 'Blockquote Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' 	=> true,
			'name' 			=> 'description_blockquote_text_shadow',
			'selector' 		=> '{{WRAPPER}} .wpmozo_price_list_item_description blockquote',
		)
	);
	$this->add_responsive_control(
		'description_blockquote_alignment',
		array(
			'type' 		=> Controls_Manager::CHOOSE,
			'label' 	=> esc_html__( 'Blockquote Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'options' 	=> array(
				'left' 		=> array(
					'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-left',
				),
				'center' 	=> array(
					'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-center',
				),
				'right' 	=> array(
					'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-right',
				),
				'justify' 	=> array(
					'title' 	=> esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon' 		=> 'eicon-text-align-justify',
				),
			),
			'selectors' 	=> array(
				'{{WRAPPER}} .wpmozo_price_list_item_description blockquote' 	=> 'text-align: {{VALUE}};',
			),
			'toggle' 		=> true,
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'list_item_styling',
	array( 
		'label' => esc_html__( 'List Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
);
	$this->start_controls_tabs(
		'list_item_tabs'
	);
	$this->start_controls_tab(
		'list_item_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'list_item_border',
			'fields_options' 	=> array(
				'border' 			=> array(
					'label' 		=> esc_html__( 'Item List Border', 'wpmozo-addons-lite-for-elementor' ),
				),
				'width' 			=> array(
					'label' 		=> esc_html__( 'Item List Border Width', 'wpmozo-addons-lite-for-elementor' ),
				),
				'color' 			=> array(
					'label' 		=> esc_html__( 'Item List Border Color', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'selector' => "{{WRAPPER}} .wpmozo_price_list_item",
		)
	);
	$this->add_responsive_control( 
		'list_item_border_radius',
		array( 
			'label'      => esc_html__( 'Item List Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'      => 'item_list_box_shadow',
			'label'       => esc_html__( 'Item List Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} .wpmozo_price_list_item',
		)
	);
	$this->add_responsive_control( 
		'list_item_padding',
		array( 
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'list_item_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control( 
		Group_Control_Border::get_type(),
		array( 
			'name'     => 'list_item_border_hover',
			'fields_options' 	=> array(
				'border' 			=> array(
					'label' 		=> esc_html__( 'List Item Border', 'wpmozo-addons-lite-for-elementor' ),
				),
				'width' 			=> array(
					'label' 		=> esc_html__( 'List Item Border Width', 'wpmozo-addons-lite-for-elementor' ),
				),
				'color' 			=> array(
					'label' 		=> esc_html__( 'List Item Border Color', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'selector' => "{{WRAPPER}} .wpmozo_price_list_item:hover",
		)
	);
	$this->add_responsive_control( 
		'list_item_border_radius_hover',
		array( 
			'label'      => esc_html__( 'List Item Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item:hover" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'      => 'list_item_hover_box_shadow',
			'label'       => esc_html__( 'Item List Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector'  => '{{WRAPPER}} .wpmozo_price_list_item:hover',
		)
	);
	$this->add_responsive_control( 
		'list_item_hover_padding',
		array( 
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array( 
				"{{WRAPPER}} .wpmozo_price_list_item:hover" => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();	
$this->end_controls_section();