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
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;

$this->start_controls_section(
	'video_settings',
	array(
		'label' => esc_html__( 'Video', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'sticky_video',
	array(
		'label'       => __( 'Video', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::MEDIA,
		'media_types' => array( 'video' ),
		'default'     => array(
			'url' => Utils::get_placeholder_image_src(),
		),
		'description' => esc_html__( 'Select a video from the media library to display.', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'overlay_settings',
	array(
		'label' => esc_html__( 'Overlay', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'video_image',
	array(
		'label'   => esc_html__( 'Add Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array(
			'url' => Utils::get_placeholder_image_src(),
		),
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'sticky_video_section',
	array(
		'label' => esc_html__( 'Sticky Video', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);

$this->add_responsive_control(
	'video_width',
	array(
		'label'          => esc_html__( 'Video Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px' ),
		'range'          => array(
			'px' => array(
				'min' => 50,
				'max' => 700,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 350,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 350,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 350,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'video_position',
	array(
		'label'        => __( 'Video Position', 'wpmozo-addons-lite-for-elementor' ),
		'label_block'  => false,
		'type'         => Controls_Manager::SELECT,
		'options'      => array(
			'top_left'     => esc_html__( 'Top Left', 'wpmozo-addons-lite-for-elementor' ),
			'top_right'    => esc_html__( 'Top Right', 'wpmozo-addons-lite-for-elementor' ),
			'bottom_left'  => esc_html__( 'Bottom Left', 'wpmozo-addons-lite-for-elementor' ),
			'bottom_right' => esc_html__( 'Bottom Right', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default'      => 'bottom_right',
		'prefix_class' => 'wpmozo_content_pos_',
		'render_type'  => 'template',
	)
);
$this->start_controls_tabs(
	'video_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'video_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'video_padding',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'video_margin',
	array(
		'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'video_border',
		'selector'       => '{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'video_border_radius',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'video_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'video_padding_hover',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'video_margin_hover',
	array(
		'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'video_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'video_border_radius_hover',
	array(
		'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_sticky_video_inner.is-sticky:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'play_icon_section',
	array(
		'label' => esc_html__( 'Play Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'play_icon',
	array(
		'label'   => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array(
			'value'   => 'far fa-play-circle',
			'library' => 'fa-regular',
		),
	)
);
$this->add_control(
	'custom_icon_size',
	array(
		'label'        => esc_html__( 'Use Custom Icon Size', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->start_controls_tabs(
	'icon_normal_and_hover_tabs'
);
$this->start_controls_tab(
	'icon_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Play Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#ffffff',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play span.wpmozo_play_icon' => 'color: {{VALUE}}',
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play svg.wpmozo_play_icon' => 'fill: {{VALUE}}',
		),
	)
);
$this->add_responsive_control(
	'icon_font_size',
	array(
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 50,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play span.wpmozo_play_icon' => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play svg.wpmozo_play_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
		'condition'  => array(
			'custom_icon_size' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'icon_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color_hover',
	array(
		'label'     => esc_html__( 'Play Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#ffffff',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play span.wpmozo_play_icon:hover' => 'color: {{VALUE}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play svg.wpmozo_play_icon:hover' => 'fill: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'icon_font_size_hover',
	array(
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 50,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play span.wpmozo_play_icon:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_play svg.wpmozo_play_icon:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
		'condition'  => array(
			'custom_icon_size' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'overlay_section',
	array(
		'label' => esc_html__( 'Overlay', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'overlay_color',
	array(
		'label'     => esc_html__( 'Overlay Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#00000099',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sticky_video .wpmozo_video_overlay_hover:hover' => 'background-color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->end_controls_section();
