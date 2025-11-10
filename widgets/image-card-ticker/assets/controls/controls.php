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
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

$this->start_controls_section(
	'image_section',
	array(
		'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'image_card',
	array(
		'label'      => esc_html__( 'Add Images', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::GALLERY,
		'show_label' => false,
		'dynamic'    => array(
			'active' => true,
		),
	)
);
$this->end_controls_section();
// Slider settings start here.
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
		'label'       => __( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'marquee'     => esc_html__( 'Marquee', 'wpmozo-addons-lite-for-elementor' ),
			'3d_circular' => esc_html__( '3D Circular', 'wpmozo-addons-lite-for-elementor' ),
			'curve'       => esc_html__( 'Curve', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default'     => 'marquee',
		'render_type' => 'template',
	)
);
$this->add_responsive_control(
	'marquee_direction',
	array(
		'label'          => __( 'Direction', 'wpmozo-addons-lite-for-elementor' ),
		'label_block'    => false,
		'type'           => Controls_Manager::SELECT,
		'options'        => array(
			'left'   => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
			'right'  => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
			'top'    => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
			'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => 'left',
		'tablet_default' => 'left',
		'mobile_default' => 'left',
		'render_type'    => 'template',
		'condition'      => array(
			'layout' => 'marquee',
		),
	)
);
$this->add_responsive_control(
	'direction',
	array(
		'label'          => __( 'Direction', 'wpmozo-addons-lite-for-elementor' ),
		'label_block'    => false,
		'type'           => Controls_Manager::SELECT,
		'options'        => array(
			'left'  => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
			'right' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => 'left',
		'tablet_default' => 'left',
		'mobile_default' => 'left',
		'render_type'    => 'template',
		'condition'      => array(
			'layout!' => 'marquee',
		),
	)
);
$this->add_control( 
	'pause_on_hover',
	array( 
		'label'        => esc_html__( 'Pause on Hover', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::CHOOSE,
		'label_block'  => true,
		'options'      => array( 
			'no'  => array( 
				'title' => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-close',
			 ),
			'yes' => array( 
				'title' => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-check',
			 ),
		 ),
		'default'      => 'yes',
		'toggle'       => false,
		'label_block'  => false,
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
			'size' => 30,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 20,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'render_type'    => 'template',
	)
);
$this->add_responsive_control(
	'ticker_speed',
	array(
		'label'          => esc_html__( 'Ticker Speed', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 50,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 45,
		),
		'tablet_default' => array(
			'size' => 45,
		),
		'mobile_default' => array(
			'size' => 45,
		),
		'size_units'     => array( 'px' ),
		'render_type'    => 'template',
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'image_styling_section',
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
				'max' => 700,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 200,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 180,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 150,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner img' => 'width: {{SIZE}}{{UNIT}};',
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
			'size' => 150,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 130,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 100,
			'unit' => 'px',
		),
		'render_type'    => 'template',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner img' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs(
	'image_normal_and_hover_tabs',
	array(
		'condition' => array(
			'layout' => 'marquee',
		),
	),
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
		'separator' => 'none'
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
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'image_alignment',
	array(
		'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'start'  => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'end'    => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_image_card_ticker_inner' => 'align-items: {{VALUE}};',
		),
		'condition' => array(
			'layout' => 'marquee',
			'marquee_direction' => array('top','bottom')
		),
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'image_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_image_card_ticker_inner img',
		'condition'      => array(
			'layout' => 'marquee',
		),
	)
);
$this->end_controls_section();
