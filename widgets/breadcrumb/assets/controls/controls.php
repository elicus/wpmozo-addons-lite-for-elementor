<?php

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;

// Start Content Tab.
$this->start_controls_section( 'wpmozo_bc_settings_tab',
	array( 
		'label' => esc_html__( 'Breadcrumbs Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
$this->add_control( 'breadcrumb_layout',
	array( 
		'label'   => esc_html__( 'Breadcrumbs Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'layout1',
		'options' => array( 
			'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		 ),
	 )
 );
$this->add_control( 'link_target',
	array( 
		'label'     => esc_html__( 'Open link in new tab', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
	 )
 );
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section( 
	'separator_styling',
	array( 
		'label'     => esc_html__( 'Separator', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
		 ),
	 )
 );
$this->add_control( 'separator_type',
	array( 
		'label'   => esc_html__( 'Separator Type', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'text_separator',
		'options' => array( 
			'text_separator' => esc_html__( 'Text Separator', 'wpmozo-addons-lite-for-elementor' ),
			'icon_separator' => esc_html__( 'Icon Separator', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
		 ),
	 )
 );
$this->add_control( 'separator_text',
	array( 
		'label'       => esc_html__( 'Separator Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( '|', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'condition'   => array( 
			'breadcrumb_layout' => 'layout2',
			'separator_type'    => 'text_separator',
		 ),
	 )
 );
$this->add_control( 'separator_icon',
	array( 
		'label'   => esc_html__( 'Separator Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array( 
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		 ),
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
			'separator_type'    => 'icon_separator',
		 ),
	 )
 );
$this->add_responsive_control( 'separator_font_size',
	array( 
		'label'      => esc_html__( 'Separator Font Size', 'wpmozo-addons-lite-for-elementor' ),
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
			'size' => 16,
		 ),
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .separator_item svg.wpmozo_separator_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .separator_item'                           => 'font-size: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->start_controls_tabs( 'separator_normal_and_hover_color_tabs' );
$this->start_controls_tab( 'separator_color_normal_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_control( 'separator_color',
	array( 
		'label'     => esc_html__( 'Separator Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .separator_item svg.wpmozo_separator_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
			'{{WRAPPER}} .separator_item'                           => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 'separator_hover_color_tab',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_control( 'separator_hover_color',
	array( 
		'label'     => esc_html__( 'Separator Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array( 
			'breadcrumb_layout' => 'layout2',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .separator_item svg.wpmozo_separator_icon:hover' => 'color: {{VALUE}}; fill:{{VALUE}};',
			'{{WRAPPER}} .separator_item:hover'                           => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'breadcrumb_styling',
	array( 
		'label'     => esc_html__( 'Breadcrumbs', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 
			'breadcrumb_layout' => 'layout1',
		 ),
	 )
 );
$this->start_controls_tabs( 'breadcrumb_normal_and_hover_background_color_tabs' );
$this->start_controls_tab( 'breadcrumb_background_color_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'breadcrumb_background_color',
	array( 
		'label'     => esc_html__( 'Breadcrumbs Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page::before' => 'border-color: {{VALUE}} {{VALUE}} {{VALUE}} transparent;',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page::after' => 'border-color: transparent transparent transparent {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 'breadcrumb_background_color_tab_hover',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'breadcrumb_hover_background_color',
	array( 
		'label'     => esc_html__( 'Breadcrumbs Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page:hover' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page:hover::before' => 'border-color: {{VALUE}} {{VALUE}} {{VALUE}} transparent;',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page:hover::after' => 'border-color: transparent transparent transparent {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_control( 'breadcrumb_lastchild_color',
	array( 
		'label'     => esc_html__( 'Background For Last Child', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
		'separator' => 'before',
	 )
 );
$this->add_responsive_control( 'breadcrumb_lastchild_background_color',
	array( 
		'label'     => esc_html__( 'Color For Last Child', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array( 
			'breadcrumb_lastchild_color' => 'yes',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .wpmozo_last_page .wpmozo_breadcrumb_last_page' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .wpmozo_last_page .wpmozo_breadcrumb_last_page::before' => 'border-color: {{VALUE}} {{VALUE}} {{VALUE}} transparent;',
			'{{WRAPPER}} .layout1 .wpmozo_breadcrumb_inner li .wpmozo_last_page .wpmozo_breadcrumb_last_page::after' => 'border-color: transparent transparent transparent {{VALUE}};',
		 ),
	 )
 );
$this->add_control( 'enable_opacity',
	array( 
		'label'     => esc_html__( 'Enable Opacity', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
	 )
 );
$this->add_responsive_control( 'opacity_slider',
	array( 
		'label' => esc_html__( 'Decrease Opacity By', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::SLIDER,
		'range' => array( 
			'px' => array( 
				'min'  => 0,
				'max'  => 0.9,
				'step' => 0.01,
			 ),
		 ),
		'default' => array( 
			'size' => 0.5,
		 ),
		'condition' => array( 
			'enable_opacity' => 'yes',
		 ),
	 )
 );
$this->add_responsive_control( 'breadcrumb_item_padding',
	array( 
		'label'      => esc_html__( 'Breadcrumbs Items Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array( 
			'top'      => '10',
			'right'    => '16',
			'bottom'   => '10',
			'left'     => '12',
			'unit'     => 'px',
			'isLinked' => false,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_breadcrumb_inner li .breadcrumb_page' => 'height: calc( {{global_text_size.SIZE}}{{global_text_size.UNIT}} + {{TOP}}{{UNIT}} + {{BOTTOM}}{{UNIT}} );',
			'{{WRAPPER}} .wpmozo_breadcrumb_inner li .breadcrumb_page::before, {{WRAPPER}} .wpmozo_breadcrumb_inner li .breadcrumb_page::after' => 'border-width: calc( calc( {{global_text_size.SIZE}}{{global_text_size.UNIT}} + {{TOP}}{{UNIT}} + {{BOTTOM}}{{UNIT}} )/2 ) 10px calc( calc( {{global_text_size.SIZE}}{{global_text_size.UNIT}} + {{TOP}}{{UNIT}} + {{BOTTOM}}{{UNIT}} )/2 ) 10px;', 
			'{{WRAPPER}} .wpmozo_breadcrumb_inner li .breadcrumb_item .breadcrumb_page' => 'padding-right: {{RIGHT}}{{UNIT}}; padding-left: {{LEFT}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 'home_link_styling',
	array( 
		'label' => esc_html__( 'Home Link', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
$this->add_control( 'enable_custom_home_link',
	array( 
		'label'     => esc_html__( 'Custom Home Link Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
	 )
 );
$this->add_control( 'custom_home_link_text',
	array( 
		'label'       => esc_html__( 'Home Link Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Home', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'condition'   => array( 
			'enable_custom_home_link' => 'yes',
		 ),
	 )
 );
$this->add_control( 'use_icon_switcher',
	array( 
		'label'     => esc_html__( 'Use Home Link Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
	 )
 );
$this->add_control( 'display_only_icon_switcher',
	array( 
		'label'     => esc_html__( 'Hide Text ( Display Icon Only )', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SWITCHER,
		'label_on'  => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'default'   => 'no',
		'condition' => array( 
			'use_icon_switcher' => 'yes',
		 )
	 )
 );
$this->add_control( 'home_link_icon',
	array( 
		'label'   => esc_html__( 'Home Link Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array( 
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		 ),
		'condition' => array( 
			'use_icon_switcher' => 'yes',
		 )
	 )
 );
$this->add_responsive_control( 'home_link_icon_size',
	array( 
		'label'      => esc_html__( 'Home Link Icon Size', 'wpmozo-addons-lite-for-elementor' ),
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
			'size' => 16,
		 ),
		'condition' => array( 
			'use_icon_switcher' => 'yes',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .breadcrumb_home_icon svg.wpmozo_home_icon' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .breadcrumb_home_icon'                      => 'font-size: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->add_responsive_control( 'home_link_icon_color',
	array( 
		'label'     => esc_html__( 'Home Link Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array( 
			'use_icon_switcher' => 'yes',
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .breadcrumb_home_icon svg.wpmozo_home_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
			'{{WRAPPER}} .breadcrumb_home_icon'                      => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_section();
$this->start_controls_section( 'text_styling',
	array( 
		'label' => esc_html__( 'Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
$this->add_control( 'global_settings',
	array( 
		'label'     => esc_html__( 'Global Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
	 )
 );
$this->add_responsive_control( 'global_text_alignment',
	array( 
		'type'    => Controls_Manager::CHOOSE,
		'label'   => esc_html__( 'Global Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' => array( 
			'left' => array( 
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			 ),
			'center'  => array( 
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' => 'eicon-text-align-center',
			 ),
			'right'   => array( 
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			 ),
			'justify' => array( 
				'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-justify',
			 ),
		 ),
		'default'     => 'center',
		'label_block' => true,
		'toggle'      => true,
		'selectors'   => array( 
			'{{WRAPPER}} .wpmozo_breadcrumb_wrapper' => 'text-align: {{VALUE}}; justify-content: {{VALUE}};',
		 ),
	 )
 );
$this->start_controls_tabs( 'global_text_size_tabs' );
$this->start_controls_tab( 'global_text_size_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'global_text_size',
	array( 
		'label'      => esc_html__( 'Global Text Size', 'wpmozo-addons-lite-for-elementor' ),
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
			'size' => 16,
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .breadcrumb_item' => 'font-size: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 'global_text_size_tab_hover',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'global_text_size_hover',
	array( 
		'label'      => esc_html__( 'Global Text Size', 'wpmozo-addons-lite-for-elementor' ),
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
		 ),
		'selectors' => array( 
			'{{WRAPPER}} .breadcrumb_item:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();

$this->add_control( 'text_settings',
	array( 
		'label'     => esc_html__( 'Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
	 )
 );
$this->add_group_control( Group_Control_Typography::get_type(),
	array( 
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'name'     => 'text_typography',
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .wpmozo_last_page',
	 )
 );
$this->add_group_control( Group_Control_Text_Shadow::get_type(),
	array( 
		'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_last_page',
	 )
 );
$this->start_controls_tabs( 'text_color_tabs'
 );
$this->start_controls_tab( 'text_color_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'text_color',
	array( 
		'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_last_page' => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 'text_color_tab_hover',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'text_color_hover',
	array( 
		'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_last_page:hover' => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_control( 'link_text_settings',
	array( 
		'label'     => esc_html__( 'Link Text Settings', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
	 )
 );
$this->add_group_control( Group_Control_Typography::get_type(),
	array( 
		'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'link_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_home_page',
	 )
 );
$this->add_group_control( Group_Control_Text_Shadow::get_type(),
	array( 
		'label'       => esc_html__( 'Link Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'link_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_breadcrumb_inner li .wpmozo_home_page',
	 )
 );
$this->start_controls_tabs( 'link_text_color_tabs' );
$this->start_controls_tab( 'link_text_color_tab',
	array( 
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'link_color',
	array( 
		'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_home_page' => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab( 'link_text_color_tab_hover',
	array( 
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	 )
 );
$this->add_responsive_control( 'link_color_hover',
	array( 
		'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_home_page:hover' => 'color: {{VALUE}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
// End Style Tab.
