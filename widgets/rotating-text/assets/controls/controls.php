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

use Elementor\Utils;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Controls_Manager;

// content section starts here.
$this->start_controls_section(
	'content_section',
	array(
		'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$this->add_control(
		'rotating_text',
		array(
			'label'       => __( 'Rotating Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Your content goes here.', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$this->add_control(
		'use_image',
		array(
			'label'                => esc_html__( 'Use Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value'         => 'yes', // return value when the switch is on.
			'default'              => 'no',
			'selectors_dictionary' => array(
				'yes' => 'yes',
				''    => 'no',
			),
		)
	);
	$this->add_control(
		'circle_image',
		array(
			'label'     => __( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::MEDIA,
			'default'   => array(
				'url' => Utils::get_placeholder_image_src(),
			),
			'condition' => array( 'use_image' => 'yes' ),
		)
	);
	$this->add_control(
		'circle_image_alt_text',
		array(
			'label'       => __( 'Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Rotating Image', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'condition'   => array( 'use_image' => 'yes' ),
		)
	);
	$this->add_responsive_control(
		'circle_icon',
		array(
			'label'     => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array(
				'value'   => 'fas fa-home',
				'library' => 'fa-solid',
			),
			'condition' => array(
				'use_image!' => 'yes',
			),
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'wrapper_box_section',
		array(
			'label' => esc_html__( 'Wrapper Box', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'circle_size',
		array(
			'label'      => esc_html__( 'Circle Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px', '%' ),
			'range'      => array(
				'px' => array(
					'min' => 1,
					'max' => 600,
				),
				'%'  => array(
					'min' => 1,
					'max' => 100,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 150,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_wrap' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'circle_animation_speed',
		array(
			'label'      => esc_html__( 'Circle Animation Speed', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'ms' ),
			'separator'  => 'after',
			'range'      => array(
				'ms' => array(
					'min'  => 1000,
					'max'  => 25000,
					'step' => 100,
				),
			),
			'default'    => array(
				'unit' => 'ms',
				'size' => 8000,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_inner' => 'animation-duration: {{SIZE}}{{UNIT}} !important;',
			),
		)
	);
	$this->add_control(
		'text_rotation',
		array(
			'label'     => esc_html__( 'Text Rotation', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => 'wpmozo-text-rotation-clockwise',
			'options'   => array(
				'wpmozo-text-rotation-clockwise'     => esc_html__( 'Clockwise', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo-text-rotation-anticlockwise' => esc_html__( 'Anti-Clockwise', 'wpmozo-addons-lite-for-elementor' ),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_inner' => 'animation: {{VALUE}} linear infinite;',
			),
		)
	);
	$this->start_controls_tabs( 'wrapper_box_tabs' );
	$this->start_controls_tab(
		'wrapper_box_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'           => 'circle_background',
			'types'          => array( 'classic', 'gradient' ),
			'fields_options' => array(
				'background' => array(
					'label'   => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'default' => 'classic',
				),
			),
			'toggle'         => false,
			'selector'       => '{{WRAPPER}} .wpmozo_rotating_text_wrap',
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'circle_border',
			'selector' => '{{WRAPPER}} .wpmozo_rotating_text_wrap',
		)
	);
	$this->add_responsive_control(
		'circle_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Circle Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'circle_box_shadow',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_wrap',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'wrapper_box_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'           => 'circle_background_hover',
			'types'          => array( 'classic', 'gradient' ),
			'fields_options' => array(
				'background' => array(
					'label'   => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'default' => 'classic',
				),
			),
			'toggle'         => false,
			'selector'       => '{{WRAPPER}} .wpmozo_rotating_text_wrap:hover',
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'circle_border_hover',
			'selector' => '{{WRAPPER}} .wpmozo_rotating_text_wrap:hover',
		)
	);
	$this->add_responsive_control(
		'circle_border_radius_hover',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_wrap:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Circle Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'circle_box_shadow_hover',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_wrap:hover',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'text_section',
		array(
			'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_control(
		'rotation_arc',
		array(
			'label'       => esc_html__( 'Text Rotation Arc (Degrees)', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SLIDER,
			'default'     => array(
				'size' => 360,
				'unit' => 'deg',
			),
			'range'       => array(
				'deg' => array(
					'min' => 30,
					'max' => 360,
				),
			),
			'description' => esc_html__( 'Adjust the total arc in which the text is distributed.', 'wpmozo-addons-lite-for-elementor' ),
		)
	);

	$this->start_controls_tabs( 'text_tabs' );
	$this->start_controls_tab(
		'text_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'text_color',
		array(
			'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#000000',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_inner .wpmozo_circle_text' => 'color: {{VALUE}}',
			),
		)
	);
	$this->add_responsive_control(
		'text_size',
		array(
			'label'     => esc_html__( 'Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_inner .wpmozo_circle_text' => 'font-size: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_typography',
			'exclude'     => array( 'font_size' ),
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_inner .wpmozo_circle_text',
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_shadow',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_inner .wpmozo_circle_text',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'text_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'text_color_hover',
		array(
			'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner .wpmozo_circle_text' => 'color: {{VALUE}}',
			),
		)
	);
	$this->add_responsive_control(
		'text_size_hover',
		array(
			'label'     => esc_html__( 'Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner .wpmozo_circle_text' => 'font-size: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_typography_hover',
			'exclude'     => array( 'font_size' ),
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner .wpmozo_circle_text',
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_shadow_hover',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner p, {{WRAPPER}} .wpmozo_rotating_text_wrap:hover .wpmozo_rotating_text_inner .wpmozo_circle_text',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'image_icon_section',
		array(
			'label' => esc_html__( 'Image/Icon', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'image_icon_wrapper_size',
		array(
			'label'      => esc_html__( 'Image/Icon Wrapper Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 1,
					'max' => 300,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 55,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'image_icon_padding',
		array(
			'label'      => esc_html__( 'Image/Icon Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'icon_size',
		array(
			'label'      => esc_html__( 'Icon Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 1,
					'max' => 200,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 20,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_circle_icon svg'  => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_circle_icon span' => 'font-size: {{SIZE}}{{UNIT}};',
			),
			'condition'  => array( 'use_image!' => 'yes' ),
		)
	);
	$this->start_controls_tabs( 'image_icon_tabs' );
	$this->start_controls_tab(
		'image_icon_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'background_color',
		array(
			'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper' => 'background-color:{{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'icon_color',
		array(
			'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_circle_icon svg'  => 'color: {{VALUE}}; fill: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_circle_icon span' => 'color: {{VALUE}};',
			),
			'condition' => array( 'use_image!' => 'yes' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'image_icon_border',
			'selector' => '{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper',
		)
	);
	$this->add_responsive_control(
		'image_icon_border_radius',
		array(
			'label'      => esc_html__( 'Image/Icon Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Image/Icon Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'image_icon_box_shadow',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'image_icon_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'background_color_hover',
		array(
			'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover' => 'background-color:{{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'icon_color_hover',
		array(
			'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover .wpmozo_circle_icon svg'  => 'color: {{VALUE}}; fill: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover .wpmozo_circle_icon span' => 'color: {{VALUE}};',
			),
			'condition' => array( 'use_image!' => 'yes' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'image_icon_border_hover',
			'selector' => '{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover',
		)
	);
	$this->add_responsive_control(
		'image_icon_border_radius_hover',
		array(
			'label'      => esc_html__( 'Image/Icon Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Image/Icon Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'image_icon_box_shadow_hover',
			'selector'    => '{{WRAPPER}} .wpmozo_rotating_text_icon_wrapper:hover',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
