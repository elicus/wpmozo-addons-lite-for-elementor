<?php
/**
 * Prevent direct access to this file.
 *
 * This check ensures the file is being accessed through WordPress,
 * and not directly via URL.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;

// Content tab.
$this->start_controls_section( 
'configuration_section',
	array( 
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control( 
	'layout',
	array( 
		'label'       => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'bar',
		'options'     => array( 
			'bar' 			=> esc_html__( 'Bar', 'wpmozo-addons-lite-for-elementor' ),
			'circle' 		=> esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			'half_circle' 	=> esc_html__( 'Half Circle', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->add_control( 
	'bar_direction',
	array( 
		'label'       => esc_html__( 'Bar Direction', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'horizontal',
		'options'     => array( 
			'horizontal' 	=> esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
			'vertical' 		=> esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
			),
		'render_type' => 'template',
		'condition'    => array( 
			'layout' => 'bar',
		),
	)
);
$this->add_control( 
	'show_striped',
	array( 
		'label'        => esc_html__( 'Show Striped', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
		'condition'    => array( 
			'layout' => 'bar',
		),
	)
);
$this->add_control( 
	'show_progress_number',
	array( 
		'label'        => esc_html__( 'Show Progress Number', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->end_controls_section();

// Style tab controls.
$this->start_controls_section(
	'bar_styling',
	array(
		'label' => esc_html__( 'Bar Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control( 
	'bar_size',
	array( 
		'label'     => esc_html__( 'Bar Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array( 
			'px' => array( 
				'min'  => 5,
				'max'  => 150,
				'step' => 1,
			 ),
		),
		'default'   => array( 
			'unit' => 'px',
			'size' => 30,
		),
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_layout_bar' => 'height: {{SIZE}}{{UNIT}};',
		),
	 )
 );
$this->start_controls_tabs(
	'bar_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'bar_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control( 
	'circle_background_color',
	array( 
		'label'     => esc_html__( 'Circle Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_layout_circle svg circle.dipl_fill_progress_bar_bg' => 'fill: {{VALUE}} !important;',
		),
		'condition'    => array( 
			'layout' => 'circle',
		),
	)
);
$this->add_control( 
	'bar_empty_color',
	array( 
		'label'     => esc_html__( 'Bar Empty Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_layout_circle .dipl_progress_bar_inner .dipl_progress_bar_circle circle.dipl_circle_bg' => 'stroke: {{VALUE}};',
		),
	)
);
$this->add_control( 
	'bar_filled_color',
	array( 
		'label'     => esc_html__( 'Bar Filled Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_layout_bar .dipl_progress_bar_inner' => 'background-color: {{VALUE}};', 
			'{{WRAPPER}} .dipl_progress_bar_inner svg .dipl_circle_fg' => 'stroke: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'bar_border',
		'selector'       => '{{WRAPPER}} .dipl_progress_bar_layout_bar',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'bar_border_radius',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .dipl_progress_bar_layout_bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'bar_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control( 
	'circle_background_color_hover',
	array( 
		'label'     => esc_html__( 'Circle Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_inner .dipl_progress_bar_circle .dipl_fill_progress_bar_bg:hover, {{WRAPPER}} .dipl_progress_bar_layout_circle .dipl_progress_bar_percent:hover + {{WRAPPER}} .dipl_progress_bar_layout_circle svg circle.dipl_fill_progress_bar_bg' => 'fill: {{VALUE}} !important; background-color: {{VALUE}} !important;',
		),
		'condition'    => array( 
			'layout' => 'circle',
		),
	)
);
$this->add_control( 
	'bar_empty_color_hover',
	array( 
		'label'     => esc_html__( 'Bar Empty Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( 
			'{{WRAPPER}} .dipl_progress_bar_layout_circle .dipl_progress_bar_inner .dipl_progress_bar_circle circle.dipl_circle_bg:hover' => 'stroke: {{VALUE}};',
		),
	)
);
 $this->add_control( 
	'bar_filled_color_hover',
	array( 
		'label'     => esc_html__( 'Bar Filled Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(  
			'{{WRAPPER}} .dipl_progress_bar_layout_bar .dipl_progress_bar_inner:hover' => 'background-color: {{VALUE}};', 
			'{{WRAPPER}} .dipl_progress_bar_inner svg .dipl_circle_fg:hover' => 'stroke: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'bar_border_hover',
		'selector'       => '{{WRAPPER}} .dipl_progress_bar_layout_bar:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'bar_border_radius_hover',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .dipl_progress_bar_layout_bar:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'percentage_text',
	array(
		'label' => esc_html__( 'Percentage Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control( 
	'percentage_alignment',
	array( 
		'label'       => esc_html__( 'Percentage Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'separator' => 'after',
		'options'     => array( 
			'start'   =>
				array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
			'center' =>
				array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
			'end'  =>
				array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
		 ),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array( '{{WRAPPER}} .dipl_progress_bar_layout_bar .dipl_progress_bar_inner' => 'justify-content: flex-{{VALUE}};' ),
	)
);
$this->start_controls_tabs(
	'percentage_tabs'
);
$this->start_controls_tab(
	'percentage_normal_tabs',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'percentage_typography',
		'label'    => esc_html__( 'Percentage Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .dipl_progress_bar_percent',
	)
);
$this->add_responsive_control(
	'percentage_size',
	array(
		'label'     => esc_html__( 'Percentage Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_progress_bar_percent' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'percentage_color',
	array(
		'label'     => esc_html__( 'Percentage Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .dipl_progress_bar_percent' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'percentage_hover_tabs',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'percentage_typography_hover',
		'label'    => esc_html__( 'Percentage Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .dipl_progress_bar_percent:hover',
	)
);
$this->add_responsive_control(
	'percentage_size_hover',
	array(
		'label'     => esc_html__( 'Percentage Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_progress_bar_percent:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'percentage_color_hover',
	array(
		'label'     => esc_html__( 'Percentage Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .dipl_progress_bar_percent:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'percentage_shadow',
		'label'    => esc_html__( 'Percentage Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .dipl_progress_bar_percent',
	)
);
$this->end_controls_section();