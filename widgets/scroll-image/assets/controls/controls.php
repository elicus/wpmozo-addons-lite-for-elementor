<?php

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;

// Start Content Tab.
$this->start_controls_section( 
	'scroll_image_setting',
	array( 
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
$this->add_control( 
	'scroll_image',
	array( 
		'label'   => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array( 
			'url' => Utils::get_placeholder_image_src(),
		 ),
	 )
 );
$this->add_control( 
	'scroll_image_alt_text',
	array( 
		'label'       => esc_html__( 'Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	 )
 );
$this->add_control( 
	'scroll_image_title',
	array( 
		'label'       => esc_html__( 'Image Title Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 
	'scroll_image_configuration',
	array( 
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
$this->add_control( 
	'scroll_direction',
	array( 
		'label'   => esc_html__( 'Scroll Direction', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'top',
		'options' => array( 
			'top'    => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
			'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
			'left'   => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
			'right'  => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
		 ),
	 )
 );
$this->add_responsive_control( 
    'scroll_speed',
    array( 
        'label'      => esc_html__( 'Scroll Speed', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'ms', 's' ),
        'range'      => array( 
            'ms' => array( 
                'min' => 1,
                'max' => 15000, 
            ),
			's' => array( 
                'min' => 1,
                'max' => 15, 
            ),
        ),
        'default' => array( 
            'unit' => 'ms',
            'size' => 5000,
        ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_scroll_image_inner_wrapper img' => 'transition: all {{SIZE}}{{UNIT}} ease-out;',
		 ),
    )
 );
$this->add_responsive_control( 
	'scroll_image_container_width',
	array( 
		'label'      => esc_html__( 'Image Container Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( '%', 'px', 'vw' ),
		'range'      => array( 
			'%' => array( 
				'min' => 1,
				'max' => 100,
			 ),
		 ),
		'default' => array( 
			'unit' => '%',
			'size' => 100,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_scroll_image_wrapper' => 'width: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->add_responsive_control( 
	'scroll_image_alignment',
	array( 
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'Image Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array( 
			'img_left' => array( 
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			 ),
			'img_center' => array( 
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			 ),
			'img_right' => array( 
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			 ),
		 ),
		'default' => 'img_center',
		'toggle'  => true,
	 )
 );
$this->add_responsive_control( 
	'scroll_image_container_height',
	array( 
		'label'      => esc_html__( 'Image Container Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%', 'vh' ),
		'default'    => array( 
			'unit' => 'px',
			'size' => 200,
		 ),
		'range' => array( 
			'px' => array( 
				'min' => 1,
				'max' => 500,
			 ),
			'%' => array( 
				'min' => 0,
				'max' => 100,
			 ),
			'vh' => array( 
				'min' => 0,
				'max' => 100,
			 ),
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_ae_scroll_image_wrapper' => 'height: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 
	'scroll_image_link_setting',
	array( 
		'label' => esc_html__( 'Link', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
$this->add_control( 
	'scroll_image_link',
	array( 
		'label'       => esc_html__( 'Widget Link URL', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	 )
 );
$this->add_control( 
	'scroll_image_link_target',
	array( 
		'label'   => esc_html__( 'Widget Link Target', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => '_blank',
		'options' => array( 
			'_blank' => esc_html__( 'In The New Tab', 'wpmozo-addons-lite-for-elementor' ),
			'_self'  => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
		 ),
	 )
 );
$this->end_controls_section();
//End Content Tab
//Start Style Tab
$this->start_controls_section( 
	'scroll_image_border_styling',
	array( 
		'label' => esc_html__( 'Image Border Style', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
$this->start_controls_tabs( 
	'scroll_image_border_normal_and_hover_tabs'
 );
$this->start_controls_tab( 
	'scroll_image_normal_border_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'      => 'scroll_image_border',
		'selector'  => '{{WRAPPER}} .wpmozo_ae_scroll_image_inner_wrapper',
	 )
 );
$this->add_responsive_control( 'scroll_image_border_radius',
	array( 
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'separator'  => 'after',
		'default'    => array( 
			'unit'   => 'px',
		 ),
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_ae_scroll_image_inner_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 
	'scroll_image_hover_border_tab',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'      => 'scroll_image_hover_border',
		'selector'  => '{{WRAPPER}} .wpmozo_ae_scroll_image_inner_wrapper:hover',
		'separator' => 'none',
	 )
 );
$this->add_responsive_control( 'scroll_image_hover_border_radius',
	array( 
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'separator'  => 'after',
		'default'    => array( 
			'unit'   => 'px',
		 ),
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_ae_scroll_image_inner_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
//End Style Tab