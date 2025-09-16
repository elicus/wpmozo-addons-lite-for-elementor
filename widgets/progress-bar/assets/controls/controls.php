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
// image controls.
$this->start_controls_section(
	'configuration',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'split_image',
	array(
		'label'       => esc_html__( 'Choose Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::MEDIA,
		'dynamic'     => array(
			'active' => true,
		),
		'default'     => array(
			'url' => Utils::get_placeholder_image_src(),
			'id'  => '0',
		),
		'render_type' => 'template',
	)
);
$this->add_responsive_control(
	'image_row',
	array(
		'label'       => esc_html__( 'Rows', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'range'       => array(
			'px' => array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
		),
		'default'     => array(
			'size' => 3,
		),
		'render_type' => 'template',
	)
);
$this->add_responsive_control(
	'image_columns',
	array(
		'label'       => esc_html__( 'Columns', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'range'       => array(
			'px' => array(
				'min'  => 1,
				'max'  => 20,
				'step' => 1,
			),
		),
		'default'     => array(
			'size' => 3,
		),
		'render_type' => 'template',
	)
);
$this->add_control(
	'image_gap',
	array(
		'label'       => esc_html__( 'Gap', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'range'       => array(
			'px' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 1,
			),
		),
		'default'     => array(
			'size' => 15,
			'unit' => 'px',
		),
		'render_type' => 'template',
	)
);
$this->end_controls_section();


// Style tab controls.
$this->start_controls_section(
	'split_portion_style',
	array(
		'label' => esc_html__( 'Split Portion', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs(
	'portion_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'portion_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'portion_border',
		'selector'       => '{{WRAPPER}} .wpmozo_split_image .wpmozo_split_image_portion',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'portion_border_radius',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_split_image .wpmozo_split_image_portion' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'portion_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'portion_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_split_image .wpmozo_split_image_portion:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'portion_border_radius_hover',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_split_image .wpmozo_split_image_portion:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
