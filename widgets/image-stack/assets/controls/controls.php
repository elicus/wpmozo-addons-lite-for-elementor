<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
// Item section.

$this->start_controls_section(
	'display_tab',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_responsive_control(
	'item_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'flex-start' => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center'     => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'flex-end'   => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_inner' => 'justify-content: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'item_size',
	array(
		'label'          => esc_html__( 'Image/Icon Size', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 500,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 100,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 90,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 70,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_stack_item, {{WRAPPER}} .wpmozo_image_stack_item .stack_item-type-icon .wpmozo_ae_stack_item_icon' => 'width: {{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'item_shrink',
	array(
		'label'          => esc_html__( 'Image/Icon Shrink', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 250,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 40,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 40,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 40,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item:not(:first-child)' => 'margin-left: -{{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'item_spacing',
	array(
		'label'          => esc_html__( 'Image/Icon Spacing', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 150,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 10,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_control(
	'enable_tooltip',
	array(
		'label'        => esc_html__( 'Enable Tooltip', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->add_control(
	'show_tooltip_on',
	array(
		'label'       => esc_html__( 'Show Tooltip On', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'hover',
		'options'     => array(
			'hover' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
			'click' => esc_html__( 'Click', 'wpmozo-addons-for-elementor' ),
		),
		'render_type' => 'template',
		'condition'   => array(
			'enable_tooltip' => 'yes'
		)
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'stack_item',
	array(
		'label' => __( 'Image Stack Item', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();

$repeater->add_control(
	'tooltip_text',
	array(
		'label'       => esc_html__( 'Tooltip Text', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::WYSIWYG,
		'default'     => esc_html__( 'Tooltip Text', 'wpmozo-addons-for-elementor' ),
		'placeholder' => esc_html__( 'Type your Tooltip Text here', 'wpmozo-addons-for-elementor' ),
	)
);
$repeater->add_control(
	'stack_item_type',
	array(
		'label'       => esc_html__( 'Stack Type', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'image',
		'separator'   => 'before',
		'options'     => array(
			'icon'  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
			'image' => esc_html__( 'Image', 'wpmozo-addons-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$repeater->add_control(
	'stack_item_icon',
	array(
		'label'       => esc_html__( 'Stack Icon', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::ICONS,
		'default'     => array(
			'value'   => 'fas fa-circle',
			'library' => 'fa-solid',
		),
		'recommended' => array(
			'fa-solid'   => array(
				'circle',
				'dot-circle',
				'square-full',
			),
			'fa-regular' => array(
				'circle',
				'dot-circle',
				'square-full',
			),
		),
		'condition'   => array(
			'stack_item_type' => 'icon',
		),
	)
);
$repeater->add_control(
	'stack_item_image',
	array(
		'label'     => __( 'Stack Image', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::MEDIA,
		'default'   => array(
			'url' => Utils::get_placeholder_image_src(),
		),
		'condition' => array(
			'stack_item_type' => 'image',
		),
	)
);
$repeater->add_responsive_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item{{CURRENT_ITEM}} .wpmozo_ae_stack_item_icon' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item{{CURRENT_ITEM}} svg.wpmozo_ae_stack_item_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
		),
		'condition' => array(
			'stack_item_type' => 'icon',
		),
	)
);
$repeater->add_responsive_control(
	'stack_item_shape',
	array(
		'label'     => esc_html__( 'Icon Shape', 'wpmozo-addons-for-elementor' ),
		'default'   => '0.0',
		'toggle'      => true,
		'type'        => Controls_Manager::CHOOSE,
		'options'     => array(
			'0.0'   =>
				array(
					'title' => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-close',
				),
			'0' =>
				array(
					'title' => esc_html__( 'Square', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-square',
				),
			'50'  =>
				array(
					'title' => esc_html__( 'Circle', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-circle',
				),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_inner .wpmozo_image_stack_item{{CURRENT_ITEM}} .stack_item-type-icon' => 'border-radius: {{VALUE}}%; transition: all 300ms;',
		),
		'condition' => array(
			'stack_item_type' => 'icon'
		)
	)
);
$repeater->add_responsive_control(
	'stack_item_shape_background_color',
	array(
		'label'     => esc_html__( 'Icon Shape Background', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_inner .wpmozo_image_stack_item{{CURRENT_ITEM}} .stack_item-type-icon' => 'background-color: {{VALUE}};',
		),
		'condition' => array(
			'stack_item_shape' => array( '0', '50' ),
			'stack_item_type' => 'icon'
		),
		'default'   => '#FFFFFF',
	)
);
$repeater->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'      => 'stack_item_image_border',
		'selector'  => '{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item{{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper.stack_item-type-image img',
		'condition' => array(
			'stack_item_type' => 'image',
		),
	)
);
$repeater->add_responsive_control(
	'stack_item_image_border_radius',
	array(
		'type'      => Controls_Manager::SLIDER,
		'label'     => esc_html__( 'Image Border Radius', 'wpmozo-addons-for-elementor' ),
		'range'     => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'%' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'size_units' => array( 'px', '%' ),
		'devices'   => array( 'desktop', 'tablet', 'mobile' ),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item{{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper.stack_item-type-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
		'condition' => array(
			'stack_item_type' => 'image',
		),
	)
);

// Item spacing controls.
$repeater->add_responsive_control(
	'stack_item_padding',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap {{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
		'default'    => array( 
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		),
	)
);
// Item box shadow controls.
$repeater->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'     => 'stack_item_box_shadow',
		'selector' => '{{WRAPPER}} .wpmozo_image_stack_wrap {{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper img,{{WRAPPER}} .wpmozo_image_stack_wrap {{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper:has(.wpmozo_ae_stack_item_icon)',
	)
);
// Item filter controls.
$repeater->add_group_control(
	Group_Control_Css_Filter::get_type(),
	array(
		'name'     => 'stack_item_filters',
		'selector' => '{{WRAPPER}} .wpmozo_image_stack_wrap {{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper img,{{WRAPPER}} .wpmozo_image_stack_wrap {{CURRENT_ITEM}} span.wpmozo_stack_item_wrapper:has(.wpmozo_ae_stack_item_icon)',
	)
);
$this->add_control(
	'stack_item_list',
	array(
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'default'     => array( 
			array( 
				'stack_item_image'     => array( 'url' => Utils::get_placeholder_image_src() ),
				'tooltip_text'     => "Stack Item 1",
			 ),
			array( 
				'stack_item_image'    => array( 'url' => Utils::get_placeholder_image_src() ),
				'tooltip_text'    => "Stack Item 2",
			 ),
			array( 
				'stack_item_image'    => array( 'url' => Utils::get_placeholder_image_src() ),
				'tooltip_text'    => "Stack Item 3",
			 ),
			array( 
				'stack_item_image'    => array( 'url' => Utils::get_placeholder_image_src() ),
				'tooltip_text'    => "Stack Item 4",
			 ),
		 ),
		'title_field' => '{{{ tooltip_text }}}',
	)
);
$this->end_controls_section();

// Global Icon styling.
$this->start_controls_section(
	'global_icon_styling',
	array(
		'label' => esc_html__( 'Global Icon Styling', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'global_icon_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item .wpmozo_ae_stack_item_icon' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item svg.wpmozo_ae_stack_item_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'global_icon_shape',
	array(
		'label'     => esc_html__( 'Icon Shape', 'wpmozo-addons-for-elementor' ),
		'default'   => '0.0',
		'type'        => Controls_Manager::CHOOSE,
		'options'     => array(
			'0.0'   =>
				array(
					'title' => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-close',
				),
			'0' =>
				array(
					'title' => esc_html__( 'Square', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-square',
				),
			'50'  =>
				array(
					'title' => esc_html__( 'Circle', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-circle',
				),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item .wpmozo_stack_item_wrapper:has(.wpmozo_ae_stack_item_icon)' => 'border-radius: {{VALUE}}%; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'global_icon_shape_background_color',
	array(
		'label'     => esc_html__( 'Icon Shape Background', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item .wpmozo_stack_item_wrapper:has(.wpmozo_ae_stack_item_icon)' => 'background-color: {{VALUE}};',
		),
		'condition' => array(
			'global_icon_shape' => array( '0', '50' )
		),
		'default'   => '#FFFFFF',
	)
);
$this->end_controls_section();


// Global Image styling.
$this->start_controls_section(
	'global_stack_item_image_styling',
	array(
		'label' => esc_html__( 'Global Image Styling', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,

	)
);

$this->add_responsive_control(
	'global_stack_item_image_size',
	array(
		'type'           => Controls_Manager::SLIDER,
		'label'          => esc_html__( 'Image Size', 'wpmozo-addons-for-elementor' ),
		'range'          => array(
			'px' => array(
				'min' => 32,
				'max' => 600,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 100,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 70,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 50,
			'unit' => 'px',
		),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item span.wpmozo_stack_item_wrapper.stack_item-type-image img' => 'width: {{SIZE}}{{UNIT}};',
		),

	)
);

$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'     => 'global_stack_item_image_border',
		'selector' => '{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item span.wpmozo_stack_item_wrapper.stack_item-type-image img',
	)
);
$this->add_responsive_control(
	'global_stack_item_image_border_radius',
	array(
		'type'           => Controls_Manager::SLIDER,
		'label'          => esc_html__( 'Image Border Radius', 'wpmozo-addons-for-elementor' ),
		'range'          => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'%' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'size_units' => array( 'px', '%' ),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 0,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 0,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 0,
			'unit' => 'px',
		),
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap .wpmozo_image_stack_item span.wpmozo_stack_item_wrapper.stack_item-type-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
	)
);

$this->end_controls_section();
// Global Tooltip.
$this->start_controls_section(
	'global_tooltip',
	array(
		'label'     => esc_html__( 'Tooltip Styling', 'wpmozo-addons-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'enable_tooltip' => 'yes'
		)
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'     => 'global_tooltip_background',
		'types'    => array( 'classic', 'gradient', 'video' ),
		'selector' => '.tippy-box:has( .wpmozo-floating-container.wpmozo-wrapper-{{ID}} )',
	)
);
$this->add_control(
	'tooltip_animation_type',
	array(
		'label'   => esc_html__( 'Animation Type', 'wpmozo-addons-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'away',
		'separator' => 'before',
		'options' => array(
			'away'        => esc_html__( 'Away', 'wpmozo-addons-for-elementor' ),
			'toward'      => esc_html__( 'Toward', 'wpmozo-addons-for-elementor' ),
			'scale'       => esc_html__( 'Scale', 'wpmozo-addons-for-elementor' ),
			'perspective' => esc_html__( 'Perspective', 'wpmozo-addons-for-elementor' ),
		),
	)
);

$this->add_control(
	'animation_type_away',
	array(
		'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'shift-away',
		'options'   => array(
			'shift-away'         => esc_html__( 'Shift Away', 'wpmozo-addons-for-elementor' ),
			'shift-away-subtle'  => esc_html__( 'Shift Away Subtle', 'wpmozo-addons-for-elementor' ),
			'shift-away-extreme' => esc_html__( 'Shift Away Extreme', 'wpmozo-addons-for-elementor' ),
		),
		'condition' => array(
			'tooltip_animation_type' => 'away',
		),
	)
);
$this->add_control(
	'animation_type_toward',
	array(
		'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'shift-toward',
		'options'   => array(
			'shift-toward'         => esc_html__( 'Shift Toward', 'wpmozo-addons-for-elementor' ),
			'shift-toward-subtle'  => esc_html__( 'Shift Toward Subtle', 'wpmozo-addons-for-elementor' ),
			'shift-toward-extreme' => esc_html__( 'Shift Toward Extreme', 'wpmozo-addons-for-elementor' ),
		),
		'condition' => array(
			'tooltip_animation_type' => 'toward',
		),
	)
);

$this->add_control(
	'animation_type_scale',
	array(
		'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'scale',
		'options'   => array(
			'scale'         => esc_html__( 'Scale', 'wpmozo-addons-for-elementor' ),
			'scale-subtle'  => esc_html__( 'Scale Subtle', 'wpmozo-addons-for-elementor' ),
			'scale-extreme' => esc_html__( 'Scale Extreme', 'wpmozo-addons-for-elementor' ),
		),
		'condition' => array(
			'tooltip_animation_type' => 'scale',
		),
	)
);

$this->add_control(
	'animation_type_perspective',
	array(
		'label'     => esc_html__( 'Select Animation', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'perspective',
		'options'   => array(
			'perspective'         => esc_html__( 'Perspective', 'wpmozo-addons-for-elementor' ),
			'perspective-subtle'  => esc_html__( 'Perspective Subtle', 'wpmozo-addons-for-elementor' ),
			'perspective-extreme' => esc_html__( 'Perspective Extreme', 'wpmozo-addons-for-elementor' ),
		),
		'condition' => array(
			'tooltip_animation_type' => 'perspective',
		),
	)
);

$this->add_control(
	'tooltip_animation_duration',
	array(
		'type'    => Controls_Manager::SLIDER,
		'label'   => esc_html__( 'Animation Duration ( ms )', 'wpmozo-addons-for-elementor' ),
		'range'   => array(
			'ms' => array(
				'min'  => 0,
				'max'  => 5000,
				'step' => 1,
			),
		),
		'default' => array(
			'size' => 400,
			'unit' => 'ms',
		),
		'devices' => array( 'desktop', 'tablet', 'mobile' ),
	)
);

$this->add_control(
	'show_speech_bubble',
	array(
		'label'        => esc_html__( 'Show Speech Bubble', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'separator'    => 'before',
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);

$this->add_responsive_control(
	'global_tooltip_padding',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);

$this->start_controls_tabs( 'global_tooltip_tabs',array('separator' => 'before') );

$this->start_controls_tab(
	'tooltip_text_tab',
	array(
		'label' => '<i class="eicon-text"></i>',
	)
);
$this->add_responsive_control(
	'tooltip_text_color',
	array(
		'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} p' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'tooltip_text_typography',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} p',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'tooltip_text_shadow',
		'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} p',
	)
);
$this->add_responsive_control(
	'tooltip_text_alignment',
	array(
		'label'       => esc_html__( 'Text Alignment', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array(
			'left'   =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center' =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'right'  =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} p' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'tooltip_link',
	array(
		'label' => '<i class="eicon-editor-link"></i>',
	)
);

$this->add_responsive_control(
	'tooltip_link_color',
	array(
		'label'     => esc_html__( 'Link Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} a' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'tooltip_link_typography',
		'label'    => esc_html__( 'Link Typography', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} a',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'tooltip_link_text_shadow',
		'label'    => esc_html__( 'Link Shadow', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} a',
	)
);
$this->add_responsive_control(
	'tooltip_link_alignment',
	array(
		'label'       => esc_html__( 'Link Alignment', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array(
			'left'   =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center' =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'right'  =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} a' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'order_list',
	array(
		'label' => '<i class="eicon-editor-list-ol"></i>',
	)
);
$this->add_responsive_control(
	'ol_text_color',
	array(
		'label'     => esc_html__( 'Order List Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ol li' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'ol_text_typography',
		'label'    => esc_html__( 'Order List Typography', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ol li',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'ol_text_shadow',
		'label'    => esc_html__( 'Order List Text Shadow', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ol li',
	)
);
$this->add_responsive_control(
	'ol_text_alignment',
	array(
		'label'       => esc_html__( 'Order List Text Alignment', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array(
			'left'   =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center' =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'right'  =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ol li' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'un_order_list',
	array(
		'label' => '<i class="eicon-editor-list-ul"></i>',
	)
);
$this->add_responsive_control(
	'ul_text_color',
	array(
		'label'     => esc_html__( 'Unordered List Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ul li' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'ul_text_typography',
		'label'    => esc_html__( 'Unordered List Typography', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ul li',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'ul_text_shadow',
		'label'    => esc_html__( 'Unordered List Text Shadow', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ul li',
	)
);
$this->add_responsive_control(
	'ul_text_alignment',
	array(
		'label'       => esc_html__( 'Unordered List Text Alignment', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array(
			'left'   =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center' =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'right'  =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} ul li' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();

$this->start_controls_tab(
	'blockquote',
	array(
		'label' => '<i class="eicon-editor-quote"></i>',
	)
);
$this->add_responsive_control(
	'blockquote_text_color',
	array(
		'label'     => esc_html__( 'Blockquote Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} blockquote' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'blockquote_text_typography',
		'label'    => esc_html__( 'Blockquote Typography', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} blockquote',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'blockquote_text_shadow',
		'label'    => esc_html__( 'Blockquote Text Shadow', 'wpmozo-addons-for-elementor' ),
		'selector' => '.wpmozo-floating-container.wpmozo-wrapper-{{ID}} blockquote',
	)
);
$this->add_responsive_control(
	'blockquote_text_alignment',
	array(
		'label'       => esc_html__( 'Blockquote Text Alignment', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array(
			'left'   =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center' =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'right'  =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array(
			'.wpmozo-floating-container.wpmozo-wrapper-{{ID}} blockquote' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();

// Global Tooltip.
$this->start_controls_section(
	'spcacing_settings',
	array(
		'label' => esc_html__( 'Spacing', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

$this->add_responsive_control(
	'content_padding',
	array(
		'label'      => esc_html__( 'Content Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_image_stack_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
		'default'    => array( 
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		),
	)
);

$this->end_controls_section();