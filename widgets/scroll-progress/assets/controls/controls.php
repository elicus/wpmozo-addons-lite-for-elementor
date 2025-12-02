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

use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

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
			'bar'         => esc_html__( 'Bar', 'wpmozo-addons-lite-for-elementor' ),
			'circle'      => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			'half_circle' => esc_html__( 'Half Circle', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->add_control(
	'bar_direction',
	array(
		'label'        => esc_html__( 'Bar Direction', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SELECT,
		'default'      => 'horizontal',
		'options'      => array(
			'horizontal' => esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
			'vertical'   => esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type'  => 'template',
		'prefix_class' => 'direction_',
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
		'label'        => esc_html__( 'Show Progress Percentage', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'%' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
			'px' => array(
				'min'  => 5,
				'max'  => 500,
				'step' => 1,
			),
		),
		'size_units' => array( 'px', '%' ),
		'selectors' => array(
			'{{WRAPPER}}.direction_horizontal .wpmozo_scroll_progress_layout_bar' => 'height: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}}.direction_vertical .wpmozo_scroll_progress_layout_bar,{{WRAPPER}} .wpmozo_scroll_progress .wpmozo_scroll_progress_layout_circle,{{WRAPPER}} .wpmozo_scroll_progress .wpmozo_scroll_progress_layout_half_circle' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'bar_height',
	array(
		'label'     => esc_html__( 'Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 5,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'default'   => array(
			'unit' => 'px',
			'size' => 500,
		),
		'selectors' => array(
			'{{WRAPPER}}.direction_vertical .wpmozo_scroll_progress_layout_bar' => 'height: {{SIZE}}{{UNIT}};',
		),
		'condition' => array(
			'bar_direction' => 'vertical',
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
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_layout_circle svg circle.wpmozo_fill_scroll_progress_bg, {{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle .wpmozo_circle_bg' => 'fill: {{VALUE}};',
		),
		'condition' => array(
			'layout!' => 'bar',
		),
	)
);
$this->add_control(
	'bar_empty_color',
	array(
		'label'     => esc_html__( 'Empty Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_layout_circle .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle circle.wpmozo_circle_bg, {{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle .wpmozo_circle_bg' => 'stroke: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_scroll_progress_wrapper.wpmozo_scroll_progress_layout_bar' => 'background-color: {{VALUE}};',
		),
	)
);
$this->add_control(
	'bar_filled_color',
	array(
		'label'     => esc_html__( 'Filled Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_layout_bar .wpmozo_scroll_progress_inner' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_scroll_progress_inner svg .wpmozo_circle_fg' => 'stroke: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'bar_border',
		'selector'       => '{{WRAPPER}} .wpmozo_scroll_progress_layout_bar',
		'condition' => array( 'layout' => 'bar' )
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
			'{{WRAPPER}} .wpmozo_scroll_progress_layout_bar' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
		'condition' => array( 'layout' => 'bar' )
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
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( '
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle:has( .wpmozo_circle_bg:hover ) > .wpmozo_fill_scroll_progress_bg,

			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle:has( .wpmozo_circle_fg:hover ) > .wpmozo_fill_scroll_progress_bg,

			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle .wpmozo_fill_scroll_progress_bg:hover,

			{{WRAPPER}} .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_scroll_progress_circle .wpmozo_fill_scroll_progress_bg,




			{{WRAPPER}} .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_half_circle .wpmozo_circle_bg,

			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle .wpmozo_circle_bg:hover,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle:has(.wpmozo_circle_fg:hover) .wpmozo_circle_bg
			' => 'fill: {{VALUE}}; background-color: {{VALUE}};',
		),
		'condition' => array(
			'layout!' => 'bar',
		),
	)
);
$this->add_control(
	'bar_empty_color_hover',
	array(
		'label'     => esc_html__( 'Empty Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( '
			{{WRAPPER}} .wpmozo_scroll_progress_layout_circle .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle circle.wpmozo_circle_bg:hover,
			{{WRAPPER}} .wpmozo_scroll_progress_layout_circle .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle circle.wpmozo_fill_scroll_progress_bg:hover ~ circle.wpmozo_circle_bg,
			{{WRAPPER}} .wpmozo_scroll_progress_layout_circle .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_circle_bg,
			{{WRAPPER}} .wpmozo_scroll_progress_layout_circle .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle:has(.wpmozo_circle_fg:hover) .wpmozo_circle_bg,
			{{WRAPPER}} .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_circle_bg,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle .wpmozo_circle_bg:hover,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle:has(.wpmozo_circle_fg:hover) .wpmozo_circle_bg' 
			=> 'stroke: {{VALUE}};',

			'{{WRAPPER}} .wpmozo_scroll_progress_wrapper.wpmozo_scroll_progress_layout_bar:hover' 
			=> 'background-color: {{VALUE}};',
		),
	)
);
$this->add_control(
	'bar_filled_color_hover',
	array(
		'label'     => esc_html__( 'Filled Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array( '

			{{WRAPPER}} .wpmozo_scroll_progress_wrapper.wpmozo_scroll_progress_layout_bar .wpmozo_scroll_progress_inner:hover:not(.wpmozo_scroll_progress_layout_bar:hover),
			{{WRAPPER}} .wpmozo_scroll_progress_wrapper.wpmozo_scroll_progress_layout_bar:hover .wpmozo_scroll_progress_inner,
			{{WRAPPER}} .wpmozo_scroll_progress_wrapper.wpmozo_scroll_progress_layout_bar:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_scroll_progress_inner' 
			=> 'background-color: {{VALUE}};',
			
			'
			{{WRAPPER}} .wpmozo_scroll_progress_inner svg:has(.wpmozo_circle_bg:hover) .wpmozo_circle_fg,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle .wpmozo_circle_fg:hover,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_scroll_progress_circle:has(.wpmozo_fill_scroll_progress_bg:hover) .wpmozo_circle_fg,
			{{WRAPPER}} .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_scroll_progress_circle .wpmozo_circle_fg,
			{{WRAPPER}} .wpmozo_scroll_progress_inner .wpmozo_half_circle .wpmozo_circle_fg:hover,
			{{WRAPPER}} .wpmozo_scroll_progress_inner:has(.wpmozo_scroll_progress_percent:hover) .wpmozo_half_circle .wpmozo_circle_fg' 
			=> 'stroke: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'bar_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_scroll_progress_layout_bar:hover',
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
			'{{WRAPPER}} .wpmozo_scroll_progress_layout_bar:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'percentage_text',
	array(
		'label'     => esc_html__( 'Percentage Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'show_progress_number' => 'yes' )
	)
);
$this->add_responsive_control(
	'percentage_alignment',
	array(
		'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'separator'   => 'after',
		'options'     => array(
			'flex-start' =>
				array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
			'center'     =>
				array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
			'flex-end'   =>
				array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
		),
		'default'     => 'center',
		'toggle'      => true,
		'selectors'   => array( '{{WRAPPER}} .wpmozo_scroll_progress_layout_bar .wpmozo_scroll_progress_percent' => 'align-self: {{VALUE}};' ),
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
$this->add_responsive_control(
	'percentage_color',
	array(
		'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_percent' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'percentage_typography',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .wpmozo_scroll_progress_percent',
	)
);
$this->add_responsive_control(
	'percentage_size',
	array(
		'label'     => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_percent' => 'font-size: {{SIZE}}{{UNIT}};',
		),
		'separator' => 'after'
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'percentage_hover_tabs',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'percentage_color_hover',
	array(
		'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_percent:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'percentage_typography_hover',
		'label'    => esc_html__( 'Percentage Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .wpmozo_scroll_progress_percent:hover',
	)
);
$this->add_responsive_control(
	'percentage_size_hover',
	array(
		'label'     => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_percent:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
		'separator' => 'after'
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'      => 'percentage_shadow',
		'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_scroll_progress_percent',
	)
);
$this->add_responsive_control(
	'percentage_padding',
	array(
		'label'       => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_scroll_progress_percent' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
		'condition' => array( 'layout' => 'bar' )
	)
);
$this->end_controls_section();
