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
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
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
		'label' => esc_html__( 'Animation', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_responsive_control(
	'scroll_animation_distance',
	array(
		'label'      => esc_html__( 'Scroll Animation Distance', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'vh' ),
		'range'      => array(
			'vh' => array(
				'min' => 100,
				'max' => 600,
			),
		),
		'default' => array(
			'size' => 200,
			'unit' => 'vh',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper' => 'min-height: {{SIZE}}{{UNIT}};',
		),
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
			'flex-start'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			),
			'flex-end'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
		),
		'default'   => 'center',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scrolling_svg_inner' => 'justify-content: {{VALUE}};',
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
				'max' => 100,
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
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper svg' => 'width: {{SIZE}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper svg *' => 'stroke-width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'draw_animation_speed',
	array(
		'label'      => esc_html__( 'Draw Animation Speed', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 's' ),
		'range'      => array(
			's' => array(
				'min' => 0.05,
				'max' => 10,
				'step' => 0.05,
			),
		),
		'default' => array(
			'size' => 3,
			'unit' => 's',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper svg *' => 'transition: stroke-dashoffset {{SIZE}}{{UNIT}} linear;',
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
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper svg *' => 'stroke: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_scrolling_svg_wrapper svg:hover *' => 'stroke: {{VALUE}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
