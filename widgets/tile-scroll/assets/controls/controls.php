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
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;

$this->start_controls_section(
	'image_settings',
	array(
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'images',
	array(
		'label'      => esc_html__( 'Add Images', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::GALLERY,
		'show_label' => false,
		'dynamic'    => array(
			'active' => true,
		),
	)
);
$this->add_control(
	'repeat_count',
	array(
		'label'   => __( 'Repeat Rows', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::NUMBER,
		'min'     => 3,
		'max'     => 50,
		'step'    => 1,
		'default' => 5,
		'render_type'    => 'template',
	)
);
$this->add_control(
	'scroll_speed',
	array(
		'label'   => __( 'Scroll Speed', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::NUMBER,
		'min'     => 3,
		'max'     => 20,
		'step'    => 1,
		'default' => 10,
		'render_type'    => 'template',
		'condition'   => array(
			'layout' => 'layout1',
		),
	)
);
$this->add_control(
	'no_images_text',
	array(
		'label'       => esc_html__( 'No Images Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'default'     => 'No Images Found!',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'display_settings',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'layout',
	array(
		'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'options' => array(
			'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' => 'layout1',
	)
);
$this->add_responsive_control(
	'images_gap',
	array(
		'label'          => esc_html__( 'Images Gap', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 200,
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
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img' => 'margin: {{SIZE}}{{UNIT}};',
		),
		'condition'   => array(
			'layout' => 'layout1',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'container_settings',
	array(
		'label' => esc_html__( 'Container', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
		'condition'   => array(
			'layout' => 'layout1',
		),
	)
);
$this->add_responsive_control(
	'container_height',
	array(
		'label'          => esc_html__( 'Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 300,
				'max'  => 1400,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 700,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 700,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 500,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} #tile_scroll .tiles' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'position_settings',
	array(
		'label' => esc_html__( 'Position', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
		'condition'   => array(
			'layout' => 'layout1',
		),
	)
);
$this->add_responsive_control(
	'horizontal_position',
	array(
		'label'          => esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'%' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 50,
			'unit' => '%',
		),
		'tablet_default' => array(
			'size' => 50,
			'unit' => '%',
		),
		'mobile_default' => array(
			'size' => 50,
			'unit' => '%',
		),
		'size_units'     => array( '%' ),
		'render_type'    => 'template',
	)
);
$this->add_responsive_control(
	'vertical_position',
	array(
		'label'          => esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'%' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 50,
			'unit' => '%',
		),
		'tablet_default' => array(
			'size' => 50,
			'unit' => '%',
		),
		'mobile_default' => array(
			'size' => 50,
			'unit' => '%',
		),
		'size_units'     => array( '%' ),
		'render_type'    => 'template',
	)
);
$this->add_responsive_control(
	'rotation',
	array(
		'label'          => esc_html__( 'Rotation', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'deg' => array(
				'min'  => 0,
				'max'  => 360,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 22,
			'unit' => 'deg',
		),
		'tablet_default' => array(
			'size' => 22,
			'unit' => 'deg',
		),
		'mobile_default' => array(
			'size' => 22,
			'unit' => 'deg',
		),
		'size_units'     => array( 'deg' ),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} #tile_scroll .tiles.tiles--rotated .tiles__wrap' => 'transform: translate3d(-{{horizontal_position.SIZE}}{{horizontal_position.UNIT}}, -{{vertical_position.SIZE}}{{vertical_position.UNIT}}, 0) rotate({{SIZE}}{{UNIT}});',
		),
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'image_section',
	array(
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs(
	'image_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'image_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'image_border',
		'selector'       => '{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
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
			'{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'image_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'image_border_hover',
		'selector'       => '{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
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
			'{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'image_box_shadow',
		'selector'       => '{{WRAPPER}} .tiles__wrap .tiles__line .tiles__line-img',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
