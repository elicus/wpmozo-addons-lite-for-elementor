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
$this->add_group_control(
	Group_Control_Image_Size::get_type(),
	array(
		'name'    => 'image_size',
		'exclude' => array( 'custom' ),
		'include' => array(),
		'default' => 'large',
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
			'size' => 15,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 15,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .dipl_wavy_gallery_items' => 'gap: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'image_styling_section',
	array(
		'label' => esc_html__( 'Image Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'image_width',
	array(
		'label'          => esc_html__( 'Image Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px' ),
		'range'          => array(
			'px' => array(
				'min' => 50,
				'max' => 500,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 60,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 50,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 40,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .dipl_wavy_gallery_items .dipl_wavy_gallery_item' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'image_height',
	array(
		'label'          => esc_html__( 'Image Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px' ),
		'range'          => array(
			'px' => array(
				'min' => 50,
				'max' => 500,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 240,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 200,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 180,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .dipl_wavy_gallery_items .dipl_wavy_gallery_item' => 'height: {{SIZE}}{{UNIT}};',
		),
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
		'selector'       => '{{WRAPPER}} .wpmozo_image_card_ticker_inner img',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'image_border_radius',
	array(
		'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
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
		'selector'       => '{{WRAPPER}} .wpmozo_image_card_ticker_inner img:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'image_border_radius_hover',
	array(
		'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'image_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_image_card_ticker_inner img',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Image Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
