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
				'min'  => 0,
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
			'{{WRAPPER}} .wpmozo_wavy_gallery_items' => 'gap: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'lightbox_images_gap',
	array(
		'label'          => esc_html__( 'Lightbox Images Gap', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'%' => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 5,
			'unit' => '%',
		),
		'tablet_default' => array(
			'size' => 5,
			'unit' => '%',
		),
		'mobile_default' => array(
			'size' => 5,
			'unit' => '%',
		),
		'size_units'     => array( '%' ),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_items ' => 'gap: {{SIZE}}{{UNIT}};',
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
$this->add_responsive_control(
	'image_width',
	array(
		'label'          => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'image_height',
	array(
		'label'          => esc_html__( 'Height', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item' => 'height: {{SIZE}}{{UNIT}};',
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
		'selector'       => '{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item',
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
			'{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		'selector'       => '{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item:hover',
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
			'{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'image_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_wavy_gallery_items .wpmozo_wavy_gallery_item',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'lightbox_section',
	array(
		'label' => esc_html__( 'Lightbox', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'lightbox_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Lightbox Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' => 'classic',
			),
			'color'      => array(
				'default' => '#000000B3',
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}}.active',
	)
);
$this->add_responsive_control(
	'lightbox_image_width',
	array(
		'label'       => esc_html__( 'Image Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'size_units'  => array( 'px' ),
		'range'       => array(
			'px' => array(
				'min' => 50,
				'max' => 500,
			),
		),
		'devices'     => array( 'desktop', 'tablet', 'mobile' ),
		'render_type' => 'template',
		'selectors'   => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'lightbox_image_height',
	array(
		'label'       => esc_html__( 'Image Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'size_units'  => array( 'px' ),
		'range'       => array(
			'px' => array(
				'min' => 50,
				'max' => 500,
			),
		),
		'devices'     => array( 'desktop', 'tablet', 'mobile' ),
		'render_type' => 'template',
		'selectors'   => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs(
	'lightbox_image_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'lightbox_image_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'lightbox_image_border',
		'selector'       => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'lightbox_image_border_radius',
	array(
		'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'lightbox_image_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'lightbox_image_border_hover',
		'selector'       => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'lightbox_image_border_radius_hover',
	array(
		'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator'   => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'lightbox_image_box_shadow',
		'selector'       => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_items .wpmozo_wavy_gallery_item',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Image Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'image_title_section',
	array(
		'label' => esc_html__( 'Image Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'image_title_tabs' );
$this->start_controls_tab(
	'image_title_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'image_title_text_color',
	array(
		'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#000000',
		'selectors' => array(
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title' => 'color: {{VALUE}}',
		),
	)
);
$this->add_responsive_control(
	'image_title_text_size',
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
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'image_title_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'image_title_text_shadow',
		'selector'    => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title',
	)
);
$this->add_responsive_control(
	'image_title_background_color',
	array(
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#eaeaea',
		'selectors' => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_item_title' => 'background-color: {{VALUE}}',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'image_title_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'image_title_text_color_hover',
	array(
		'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title:hover' => 'color: {{VALUE}}',
		),
	)
);
$this->add_responsive_control(
	'image_title_text_size_hover',
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
			'{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'image_title_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'image_title_text_shadow_hover',
		'selector'    => '{{WRAPPER}}.wpmozo_wavy_gallery_overlay .wpmozo_wavy_gallery_overlay_item_title:hover',
	)
);
$this->add_responsive_control(
	'image_title_background_color_hover',
	array(
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '',
		'selectors' => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_item_title:hover' => 'background-color: {{VALUE}}',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();

$this->start_controls_tabs( 'image_spacing_tabs', array('separator' => 'before') );
$this->start_controls_tab(
	'image_title_padding_tab',
	array(
		'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' )
	)
);
$this->add_responsive_control(
	'image_title_padding',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'      => 10,
			'right'    => 20,
			'bottom'   => 10,
			'left'     => 20,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'selectors'  => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_item_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'image_title_margin_tab',
	array(
		'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'image_title_margin',
	array(
		'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'      => 15,
			'right'    => 0,
			'bottom'   => 2,
			'left'     => 0,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'selectors'  => array(
			'{{WRAPPER}}.active .wpmozo_wavy_gallery_overlay_item_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
