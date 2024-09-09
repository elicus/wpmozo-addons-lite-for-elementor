<?php

use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

// Content Tab.
$this->start_controls_section( 
	'separator_content_tab',
	array( 
		'label' => esc_html__( 'Separator Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
$this->add_control( 
	'separator_type',
	array( 
		'label'   => esc_html__( 'Separator Type', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'line',
		'options' => array( 
			'line'   => esc_html__( 'Line', 'wpmozo-addons-lite-for-elementor' ),
			'shadow' => esc_html__( 'Shadow', 'wpmozo-addons-lite-for-elementor' ),
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_line_style',
	array( 
		'label'   => esc_html__( 'Select Line Style', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'solid',
		'options' => array( 
			'none'   => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
			'solid'  => esc_html__( 'Solid', 'wpmozo-addons-lite-for-elementor' ),
			'dashed' => esc_html__( 'Dashed', 'wpmozo-addons-lite-for-elementor' ),
			'dotted' => esc_html__( 'Dotted', 'wpmozo-addons-lite-for-elementor' ),
			'double' => esc_html__( 'Double', 'wpmozo-addons-lite-for-elementor' ),
			'ridge'  => esc_html__( 'Ridge', 'wpmozo-addons-lite-for-elementor' ),
			'groove' => esc_html__( 'Groove', 'wpmozo-addons-lite-for-elementor' ),
			'inset'  => esc_html__( 'Inset', 'wpmozo-addons-lite-for-elementor' ),
			'outset' => esc_html__( 'Outset', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'condition' => array( 
			'separator_type' => 'line',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_line' => 'border-style: {{VALUE}};',
		 ),
	 )
 );

$this->add_control( 
	'separator_use_with',
	array( 
		'label'   => esc_html__( 'Use Separator With', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'only_separator',
		'options' => array( 
			'only_separator'       => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
			'separator_with_text'  => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'separator_with_icon'  => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'separator_with_image' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'condition' => array( 
			'separator_type' => 'line',
		 ),
	 )
 );

$this->add_control( 
	'separator_text',
	array( 
		'label'       => esc_html__( 'Separator Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Separator Text', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Separator Text', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'condition'   => array( 
			'separator_use_with' => 'separator_with_text',
			'separator_type'     => 'line',
		 ),
	 )
 );

$this->add_control( 
	'separator_icon',
	array( 
		'label'   => esc_html__( 'Separator Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array( 
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		 ),
		'condition' => array( 
			'separator_use_with' => 'separator_with_icon',
			'separator_type'     => 'line',
		 ),
	 )
 );

$this->add_control( 
	'separator_image',
	array( 
		'label'   => esc_html__( 'Separator Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array( 
			'url' => Utils::get_placeholder_image_src(),
		 ),
		'condition' => array( 
			'separator_use_with' => 'separator_with_image',
			'separator_type'     => 'line',
		 ),
	 )
 );

$this->end_controls_section();

// Style Tab.
$this->start_controls_section( 
	'separator_style_tab',
	array( 
		'label' => esc_html__( 'Separator Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
$this->add_responsive_control( 
	'separator_thickness',
	array( 
		'label'      => esc_html__( 'Separator Thickness', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em', 'vw', 'vh', 'mm', 'cm' ),
		'range'      => array( 
			'px' => array( 
				'min' => 1,
				'max' => 100,
			 ),
		 ),
		'default' => array( 
			'unit' => 'px',
			'size' => 4,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_line' => 'border-width: {{SIZE}}{{UNIT}} 0 0 0;',
			'{{WRAPPER}} .wpmozo_ae_separator .wpmozo_ae_shadow' => 'height: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_shadow_style_color',
	array( 
		'label'     => esc_html__( 'Separator Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#2b87da',
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_shadow' => 'background: radial-gradient( ellipse at 50% -50% , {{VALUE}} 0%, rgba( 0, 0, 0, 0 ) 75% ), repeat scroll;',
			'{{WRAPPER}} .wpmozo_ae_line'   => 'color: {{VALUE}};'
		 ),
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 
	'separator_text_style_tab',
	array( 
		'label'     => esc_html__( 'Text Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'separator_type'     => 'line',
			'separator_use_with' => 'separator_with_text',
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_text_color',
	array( 
		'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_text_wrapper' => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->add_group_control( 
	Group_Control_Typography::get_type(),
	array( 
		'name'     => 'content_typography',
		'selector' => '{{WRAPPER}} .wpmozo_ae_text_wrapper',
	 )
 );
$this->add_group_control( 
	Group_Control_Text_Shadow::get_type(),
	array( 
		'name'     => 'text_shadow',
		'selector' => '{{WRAPPER}} .wpmozo_ae_text_wrapper',
	 )
 );
$this->add_responsive_control( 
	'separator_alignment',
	array( 
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array( 
			'align_left' => array( 
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			 ),
			'align_center' => array( 
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			 ),
			'align_right' => array( 
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			 ),
		 ),
		'default' => 'align_center',
		'toggle'  => false,
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 
	'separator_icon_style_tab',
	array( 
		'label'     => esc_html__( 'Icon Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'separator_use_with' => 'separator_with_icon',
			'separator_type'     => 'line',
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_icon_color',
	array( 
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_icon_wrapper'     => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_ae_icon_wrapper svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
		 ),
	 )
 );

$this->add_responsive_control( 
	'separator_icon_alignment',
	array( 
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array( 
			'align_left' => array( 
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			 ),
			'align_center' => array( 
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			 ),
			'align_right' => array( 
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			 ),
		 ),
		'default' => 'align_center',
		'toggle'  => false,
	 )
 );
$this->add_control( 
	'separator_show_icon_font_size',
	array( 
		'type'         => Controls_Manager::SWITCHER,
		'label'        => esc_html__( 'Use Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'default'      => 'no',
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
	 )
 );
$this->add_responsive_control( 
	'separator_icon_font_size',
	array( 
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array( 
			'px' => array( 
				'min' => 1,
				'max' => 100,
			 ),
		 ),
		'default' => array( 
			'unit' => 'px',
			'size' => 25,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_icon_wrapper' => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_ae_icon_wrapper svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		 ),
		'condition' => array( 
			'separator_show_icon_font_size' => 'yes',
		 ),
	 )
 );
$this->add_control( 
	'separator_show_icon_style',
	array( 
		'type'         => Controls_Manager::SWITCHER,
		'label'        => esc_html__( 'Icon Style', 'wpmozo-addons-lite-for-elementor' ),
		'default'      => 'no',
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
	 )
 );

$this->add_control( 
	'separator_icon_shape',
	array( 
		'label'   => esc_html__( 'Shape', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'circle',
		'options' => array( 
			'wpmozo_ae_icon_square' => esc_html__( 'Square', 'wpmozo-addons-lite-for-elementor' ),
			'wpmozo_ae_icon_circle' => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'condition' => array( 
			'separator_show_icon_style' => 'yes',
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_shape_background_color',
	array( 
		'label'     => esc_html__( 'Shape Background', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_icon_wrapper .wpmozo_ae_separator_icon' => 'background-color: {{VALUE}};',
		 ),
		'condition' => array( 
			'separator_show_icon_style' => 'yes',
		 ),
	 )
 );

$this->add_control( 
	'separator_show_shape_border',
	array( 
		'label'        => esc_html__( 'Display Shape Border', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
		'condition'    => array( 
			'separator_show_icon_style' => 'yes',
		 ),
	 )
 );
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'           => 'icon_shape_border',
		'label'          => esc_html__( 'Shape Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector'       => '{{WRAPPER}} .wpmozo_ae_icon_wrapper .wpmozo_ae_separator_icon',
		'fields_options' => array( 
			'border' => array( 'default' => 'solid' ),
			'width'  => array( 
				'default' => array( 
					'top'    => 2,
					'right'  => 2,
					'bottom' => 2,
					'left'   => 2,
				 ),
			 ),
		 ),
		'condition' => array( 
			'separator_show_icon_style'   => 'yes',
			'separator_show_shape_border' => 'yes',
		 ),
	 )
 );

$this->end_controls_section();
$this->start_controls_section( 
	'separator_image_style_tab',
	array( 
		'label'     => esc_html__( 'Image Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'separator_use_with' => 'separator_with_image',
			'separator_type'     => 'line',
		 ),
	 )
 );
$this->add_responsive_control( 
	'separator_image_alignment',
	array( 
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array( 
			'align_left' => array( 
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			 ),
			'align_center' => array( 
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			 ),
			'align_right' => array( 
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			 ),
		 ),
		'default' => 'align_center',
		'toggle'  => false,
	 )
 );
$this->add_responsive_control( 
	'separator_image_width',
	array( 
		'label'      => esc_html__( 'Image Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array( 
			'px' => array( 
				'min' => 1,
				'max' => 100,
			 ),
		 ),
		'default' => array( 
			'unit' => 'px',
			'size' => 50,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_image_wrapper' => 'width: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_section();