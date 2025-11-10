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
use Elementor\Utils;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Content.
$this->start_controls_section(
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'render_image',
	array(
		'label'   => esc_html__( 'Select Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array(
			'url' => Utils::get_placeholder_image_src(),
		),
	)
);
$this->add_control(
	'image_alt_tag',
	array(
		'label'       => esc_html__( 'Alt Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'hover_effect',
	array(
		'label'       => esc_html__( 'Hover Effect', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'radial',
		'options'     => array(
			'radial'        => esc_html__( 'Radial', 'wpmozo-addons-lite-for-elementor' ),
			'glow'          => esc_html__( 'Glow', 'wpmozo-addons-lite-for-elementor' ),
			'rotate'        => esc_html__( 'Rotate', 'wpmozo-addons-lite-for-elementor' ),
			'flash'         => esc_html__( 'Flash', 'wpmozo-addons-lite-for-elementor' ),
			'flash_instant' => esc_html__( 'Flash Instant', 'wpmozo-addons-lite-for-elementor' ),
			'diagonal'      => esc_html__( 'Diagonal', 'wpmozo-addons-lite-for-elementor' ),
			'glitch'        => esc_html__( 'Glitch', 'wpmozo-addons-lite-for-elementor' ),
			'slide_glitch'  => esc_html__( 'Slide Glitch', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'image_border_section',
	array(
		'label'     => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'image_border_tabs' );
$this->start_controls_tab(
	'image_border_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'image_border',
		'selector'       => '{{WRAPPER}} .wpmozo_image_hover_effect_inner',
	)
);
$this->add_responsive_control(
	'image_border_radius',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_image_hover_effect_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'image_border_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'image_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_image_hover_effect_inner:hover',
		'separator'      => 'none',
	)
);
$this->add_responsive_control(
	'image_border_radius_hover',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_image_hover_effect_inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'image_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_image_hover_effect_inner',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
