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
use Elementor\Group_Control_Background;

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
	$this->add_responsive_control(
		'start_opacity',
		array(
			'label'   => esc_html__( 'On Load Visibility', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SLIDER,
			'range'   => array(
				'px' => array(
					'min'  => 0,
					'max'  => 1,
					'step' => 0.1,
				),
			),
			'default' => array(
				'unit' => 'px',
				'size' => 0,
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
	// Image styling.
	$this->start_controls_section(
		'image_styling_section',
		array(
			'label' => esc_html__( 'Image Styling', 'wpmozo-addons-lite-for-elementor' ),
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
			'name'     => 'image_border',
			'selector' => '{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img',
		)
	);
	$this->add_responsive_control(
		'image_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array(
				'unit' => 'px',
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'name'     => 'image_box_shadow',
			'selector' => '{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img',
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
			'name'      => 'image_border_hover',
			'selector'  => '{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img:hover',
			'separator' => 'none',
		)
	);
	$this->add_responsive_control(
		'image_border_radius_hover',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'name'     => 'image_box_shadow_hover',
			'selector' => '{{WRAPPER}} .wpmozo_scroll_zoom_gallery_item img:hover',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'wrapper_background',
		array(
			'label' => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'wrapper_background',
				'types'    => array( 'classic', 'gradient' ),
				'toggle'   => false,
				'selector' => '{{WRAPPER}} .wpmozo_scroll_zoom_gallery_scroller',
			)
		);
		$this->end_controls_section();
