<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;


// Start Content Tab.
$this->start_controls_section(
	'wpmozo_list_items_tab',
	array(
		'label' => esc_html__( 'Items', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new \Elementor\Repeater();


$repeater->add_responsive_control(
	'item_title',
	array(
		'label'       => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Item Text', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);

$repeater->add_control(
	'wpmozo_thumbnail_type',
	array(
		'label'   => esc_html__( 'Image/Icon as thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'use_icon',
		'options' => array(
			'use_icon'  => esc_html__( 'Use Icon', 'wpmozo-addons-lite-for-elementor' ),
			'use_image' => esc_html__( 'Use Image', 'wpmozo-addons-lite-for-elementor' ),
		),
		'label_block' => true,
	)
);

$repeater->add_control(
	'wpmozo_thumbnail_icon',
	array(
		'label'   => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array(
			'value'   => 'fas fa-check-circle',
			'library' => 'fa-solid',
		),
		'condition' => array(
			'wpmozo_thumbnail_type' => array( 'use_icon' ),
		),
	)
);

$repeater->add_control(
	'wpmozo_item_thumbnail',
	array(
		'label'   => esc_html__( 'Item Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array(
			'url' => ' ',
		),
		'condition' => array(
			'wpmozo_thumbnail_type' => array( 'use_image' ),
		),
	)
);
$repeater->add_responsive_control(
	'wpmozo_item_thumbnail_alt',
	array(
		'label'     => esc_html__( 'Item Thumbnail Alt Tag', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::TEXT,
		'condition' => array(
			'wpmozo_thumbnail_type' => array( 'use_image' ),
		),
	)
);


$this->add_control(
	'wpmozo_items_content',
	array(
		'label'   => esc_html__( 'Item Content', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::REPEATER,
		'fields'  => $repeater->get_controls(),
		'default' => array(
			array(
				'item_title' => esc_html__( 'Item #1', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
		'title_field' => '{{{ item_title }}}',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'wpmozo_configuration_tab',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'wpmozo_layout',
	array(
		'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'wpmozo_list_default',
		'options' => array(
			'wpmozo_list_default' => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
			'wpmozo_list_inline'  => esc_html__( 'Inline', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section(
	'wpmozo_alignment_tab',
	array(
		'label' => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'list_alignment_default',
	array(
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'List Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array(
			'start' => array(
				'title' => esc_html__( 'Start', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			),
			'end' => array(
				'title' => esc_html__( 'End', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
			' ' => array(
				'title' => esc_html__( 'Strech', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-stretch',
			),
		),
		'default' => ' ',
		'toggle' => false,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_layout.wpmozo_list_default' => 'align-items: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_list_layout.wpmozo_list_inline'  => 'justify-content: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'wpmozo_list_item_text_tab',
	array(
		'label' => esc_html__( 'List Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs(
	'item_styling'
);
$this->start_controls_tab(
	'item_styling_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'tab_text_color',
	array(
		'label'     => esc_html__( 'Item Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'item_text_font_size',
	array(
		'label'      => esc_html__( 'Item Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array('px', 'em'),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'default' => array(
			'unit' => 'px',
			'size' => 16,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Item Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'item_typography',
		'exclude'     => array('font_size'),
		'selector'    => '{{WRAPPER}} .wpmozo_list_item_text',
	)
);
$this->add_group_control( 
    Group_Control_Background::get_type(),
    array( 
        'name'      => 'item_bg_color',
        'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
        'types'     => array( 'classic', 'gradient' ),
        'selector'  => "{{WRAPPER}} .wpmozo_list_item_content_wrapper",
    )
);
$this->add_group_control( 
    Group_Control_Border::get_type(),
    array( 
        'name'     => 'item_border',
        'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
        'selector' => "{{WRAPPER}} .wpmozo_list_item_content_wrapper",
    )
);
$this->add_responsive_control( 
    'item_border_radius',
    array( 
        'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array( 'px', 'em', '%' ),
        'selectors'  => array( 
            "{{WRAPPER}} .wpmozo_list_item_content_wrapper" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
    )
);
$this->end_controls_tab();
$this->start_controls_tab(
	'item_styling_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'item_text_color_hover',
	array(
		'label'     => esc_html__( 'Item Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'item_text_font_size_hover',
	array(
		'label'      => esc_html__( 'Item Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover .wpmozo_list_item_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Item Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'item_hover_typography',
		'exclude'     => array('font_size'),
		'selector'    => '{{WRAPPER}} .wpmozo_list_item_text:hover',
	)
);
$this->add_group_control( 
    Group_Control_Background::get_type(),
    array( 
        'name'      => 'item_hover_bg_color',
        'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
        'types'     => array( 'classic', 'gradient' ),
        'selector'  => "{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover",
    )
);
$this->add_group_control( 
    Group_Control_Border::get_type(),
    array( 
        'name'     => 'item_hover_border',
        'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
        'selector' => "{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover",
    )
);
$this->add_responsive_control( 
    'item_hover_border_radius',
    array( 
        'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array( 'px', 'em', '%' ),
        'selectors'  => array( 
            "{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
    )
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'item_text_indent',
	array(
		'label'      => esc_html__( 'Item Text Indent', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'separator'  => 'before',
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 100,
			),
		),
		'default' => array(
			'unit' => 'px',
			'size' => 0,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'text-indent: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Item Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'item_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_list_item_text',
	)
);
$this->start_controls_tabs( 
	'list_item_padding_margin_control_tabs',
 );

	// Tab 1.
	$this->start_controls_tab( 
		'list_item_padding_tab',
		array( 
			'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

		// Settings for first tab.
		$this->add_responsive_control( 
			'list_item_padding',
			array( 
				'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array( 
					'top'    => 5,
					'right'  => 5,
					'bottom' => 5,
					'left'   => 5,
				 ),
				'selectors'  => array( 
					'{{WRAPPER}} .wpmozo_list_item_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				 ),
			 )
		 );

	$this->end_controls_tab();

	// Tab 2.
	$this->start_controls_tab( 
		'list_item_margin_tab',
		array( 
			'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );

		// Settings for second tab.
		$this->add_responsive_control( 
			'list_item_margin',
			array( 
				'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'default'    => array( 
					'top'    => 0,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
				 ),
				'selectors'  => array( 
					'{{WRAPPER}} .wpmozo_list_item_content_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				 ),
			 )
		 );

	$this->end_controls_tab();

$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'wpmozo_icon_image_tab',
	array(
		'label' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'icon_font_size',
	array(
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min'  => 1,
				'step' => 1,
				'max'  => 100,
			),
		),
		'default' => array(
			'unit' => 'px',
			'size' => 16,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_icon span'            => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_list_icon svg.wpmozo_icon' => 'width: {{SIZE}}{{UNIT}};',
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
$this->add_responsive_control(
	'icon_width',
	array(
		'label'      => esc_html__( 'Icon Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			)
		),
		'default' => array(
			'unit' => 'px',
			'size' => 20,
		),
		'condition' => array(
			'wpmozo_icon_shape!' => 'use_hexagon',
			'style_icon'         => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_icon.use_circle, {{WRAPPER}} .wpmozo_list_icon.use_square' => 'width: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_list_icon .wpmozo_hexagon' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'wpmozo_icon_shape',
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
	'shape_background_color',
	array(
		'label'     => esc_html__( 'Shape Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .use_circle, .use_square, .wpmozo_hexagon' => 'background-color: {{VALUE}};',
		),
		'condition' => array(
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
$this->add_control(
	'shape_border_color',
	array(
		'label'     => esc_html__( 'Shape Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#000000',
		'selectors' => array(
			'{{WRAPPER}} .use_circle, .use_square, .wpmozo_hexagon' => 'border: 2px {{VALUE}} solid;',
		),
		'condition' => array(
			'style_icon'           => 'yes',
			'display_shape_border' => 'yes',
		),
	)
);
$this->start_controls_tabs(
	'icon_color_tabs'
);
$this->start_controls_tab(
	'icon_color_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_icon span'            => 'color: {{VALUE}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_list_icon svg.wpmozo_icon' => 'fill: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'icon_color_tab_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color_hover',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_icon span:hover'            => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_list_icon svg.wpmozo_icon:hover' => 'fill: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'wpmozo_image_tab',
	array(
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'thumbnail_width',
	array(
		'label'      => esc_html__( 'Thumbnail Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'default' => array(
			'unit' => 'px',
			'size' => 38,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_img_icon' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();

$this->start_controls_section(
	'wpmozo_divider_tab',
	array(
		'label' => esc_html__( 'Divider', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'divider_size',
	array(
		'label'      => esc_html__( 'Divider Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range' => array(
			'px' => array(
				'min' => 0,
				'max' => 20,
			),
		),
		'default' => array(
			'unit' => 'px',
			'size' => 0,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_default .wpmozo_list_divider' => 'border-top-width: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_list_inline .wpmozo_list_divider'  => 'border-left-width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'divider_style',
	array(
		'label'   => esc_html__( 'Divider Style', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'solid',
		'options' => array(
			'solid'  => esc_html__( 'Solid', 'wpmozo-addons-lite-for-elementor' ),
			'dashed' => esc_html__( 'Dashed', 'wpmozo-addons-lite-for-elementor' ),
			'dotted' => esc_html__( 'Dotted', 'wpmozo-addons-lite-for-elementor' ),
			'double' => esc_html__( 'Double', 'wpmozo-addons-lite-for-elementor' ),
			'ridge'  => esc_html__( 'Ridge', 'wpmozo-addons-lite-for-elementor' ),
			'groove' => esc_html__( 'Groove', 'wpmozo-addons-lite-for-elementor' ),
			'inset'  => esc_html__( 'Inset', 'wpmozo-addons-lite-for-elementor' ),
			'outset' => esc_html__( 'Outset', 'wpmozo-addons-lite-for-elementor' ),
			'none'   => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_default .wpmozo_list_divider' => 'border-top-style: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_list_inline .wpmozo_list_divider' => 'border-left-style: {{VALUE}};',
		),
	)
);
$this->add_control(
	'hide_last_divider',
	array(
		'label'        => esc_html__( 'Hide Last Divider?', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'wpmozo_hide_last_divider',
	)
);
$this->start_controls_tabs(
	'divider_color_tabs'
);
$this->start_controls_tab(
	'divider_color_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'divider_color',
	array(
		'label'     => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#d3d3d3',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_default .wpmozo_list_divider' => 'border-top-color: {{VALUE}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_list_inline .wpmozo_list_divider'  => 'border-left-color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'divider_margin',
	array(
		'label'      => esc_html__( 'Divider Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'      => 0,
			'right'    => 0,
			'bottom'   => 0,
			'left'     => 0,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'divider_color_tab_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'divider_color_hover',
	array(
		'label'     => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_default .wpmozo_list_item_wrap:hover .wpmozo_list_divider' => 'border-top-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_list_inline .wpmozo_list_item_wrap:hover .wpmozo_list_divider'  => 'border-left-color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'divider_margin_hover',
	array(
		'label'      => esc_html__( 'Divider Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_wrap:hover .wpmozo_list_divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
// End Style Tab.