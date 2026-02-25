<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Utils;
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
	'svg_image',
	array(
		'label'   => esc_html__( 'SVG Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'dynamic' => array(
			'active' => true,
		),
		'default' => array(
			'url' => Utils::get_placeholder_image_src(),
			'id'  => 'default-image-id',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'animation_section',
	array(
		'label' => __( 'Animation', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'animation_type',
	array(
		'label'   => esc_html__( 'Animation Type', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'delayed',
		'options' => array(
			'delayed'  => esc_html__( 'Delayed', 'wpmozo-addons-lite-for-elementor' ),
			'sync'     => esc_html__( 'Sync', 'wpmozo-addons-lite-for-elementor' ),
			'onebyone' => esc_html__( 'One by One', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_responsive_control(
	'animation_time',
	array(
		'label'       => esc_html__( 'Animation Duration ( in ms )', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SLIDER,
		'size_units'  => array( 'ms' ),
		'range'       => array(
			'ms' => array(
				'min'  => 10,
				'max'  => 5000,
				'step' => 10,
			),
		),
		'default'     => array(
			'unit' => 'ms',
			'size' => 1000,
		),
		'render_type' => 'template',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_animated_text_wrapper .wpmozo_animated_text' => 'animation-duration: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'animation_curves',
	array(
		'label'   => esc_html__( 'Animation Curves', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'linear',
		'options' => array(
			'linear'      => esc_html__( 'Linear', 'wpmozo-addons-lite-for-elementor' ),
			'ease'        => esc_html__( 'Ease', 'wpmozo-addons-lite-for-elementor' ),
			'ease-in-out' => esc_html__( 'Ease-in-out', 'wpmozo-addons-lite-for-elementor' ),
			'bounce'      => esc_html__( 'Ease-out Bounce', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	're_animate_on_click',
	array(
		'label'        => esc_html__( 'Re-Animate on Click', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
	)
);
$this->end_controls_section();

// Text style section starts here.
$this->start_controls_section(
	'svg_styling',
	array(
		'label' => esc_html__( 'SVG Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'svg_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'SVG Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
		),
		'default'   => 'center',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_svg_animator_inner' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'svg_width',
	array(
		'label'          => esc_html__( 'SVG Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px', '%' ),
		'range'          => array(
			'px' => array(
				'min' => 1,
				'max' => 1500,
			),
			'%'  => array(
				'min' => 1,
				'max' => 500,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 100,
			'unit' => '%',
		),
		'tablet_default' => array(
			'size' => 100,
			'unit' => '%',
		),
		'mobile_default' => array(
			'size' => 100,
			'unit' => '%',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_svg_animator_wrapper svg' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'svg_stroke_line_width',
	array(
		'label'          => esc_html__( 'SVG Stroke/Line Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px' ),
		'range'          => array(
			'px' => array(
				'min' => 1,
				'max' => 20,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 2,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 2,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 2,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_svg_animator_wrapper svg *' => 'stroke-width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs( 'svg_styling_tabs' );
$this->start_controls_tab(
	'svg_styling_tab_normal',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'svg_color_normal',
	array(
		'label'       => esc_html__( 'SVG Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'default'     => '',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_svg_animator_wrapper svg *' => 'stroke: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'svg_styling_tab_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'svg_color_hover',
	array(
		'label'       => esc_html__( 'SVG Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'default'     => '',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_svg_animator_wrapper svg:hover *' => 'stroke: {{VALUE}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
