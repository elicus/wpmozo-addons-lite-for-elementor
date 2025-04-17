<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

// Start Content Tab.
$this->start_controls_section(
	'content_tab',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'mystery_images',
	array(
		'label'      => esc_html__( 'Select Images', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::GALLERY,
		'show_label' => false,
		'default'    => array(),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'link_tab',
	array(
		'label' => esc_html__( 'Link', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'image_link',
	array(
		'label'       => esc_html__( 'Image Link', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'options'     => array( 'url', 'is_external', 'nofollow' ),
		'default'     => array(
			'url'         => '',
			'is_external' => true,
			'nofollow'    => true,
		),
		'label_block' => true,
		'condition'   => array( 'open_lightbox!' => 'yes' ),
		'dynamic' => [
			'active' => true,
		],
	)
);
$this->add_control(
	'open_lightbox',
	array(
		'label'        => esc_html__( 'Open in Lightbox', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'lightbox_effect',
	array(
		'label'       => esc_html__( 'Lightbox Effect', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'none' => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
			'zoom' => esc_html__( 'Zoom', 'wpmozo-addons-for-elementor' ),
			'fade' => esc_html__( 'Fade', 'wpmozo-addons-for-elementor' ),
		),
		'default'     => 'none',
		'condition'   => array( 'open_lightbox' => 'yes' ),
	)
);
$this->add_responsive_control(
	'transition_duration',
	array(
		'type'        => Controls_Manager::SLIDER,
		'label'       => esc_html__( 'Transition Duration', 'wpmozo-addons-for-elementor' ),
		'render_type' => 'template',
		'range'       => array(
			'ms' => array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'default'     => array(
			'size' => 300,
			'unit' => 'ms',
		),
		'selectors'   => array(
			'{{WRAPPER}}.mfp-bg, {{WRAPPER}} .mfp-content, {{WRAPPER}} .mfp-container' => '-webkit-transition: all {{SIZE}}{{UNIT}} ease-out; -o-transition: all {{SIZE}}{{UNIT}} ease-out; transition: all {{SIZE}}{{UNIT}} ease-out;',
		),
		'condition'   => array(
			'open_lightbox'    => 'yes',
			'lightbox_effect!' => 'none',
		),
	)
);
$this->end_controls_section();
// Style Tab.
$this->start_controls_section(
	'overlay_tab',
	array(
		'label' => esc_html__( 'Overlay', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'enable_overlay',
	array(
		'label'        => esc_html__( 'Enable Overlay', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_responsive_control(
	'overlay_background_color',
	array(
		'label'       => esc_html__( 'Overlay Background Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'default'     => '#0000006E',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_mystery_image_overlay:before' => 'background-color:{{VALUE}};',
		),
		'condition'   => array( 'enable_overlay' => 'yes' ),
	)
);
$this->add_responsive_control(
	'overlay_icon_size',
	array(
		'type'       => Controls_Manager::SLIDER,
		'label'      => esc_html__( 'Icon Size', 'wpmozo-addons-for-elementor' ),
		'range'      => array(
			'px' => array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 1,
			),
			'%'  => array(
				'min' => 0,
				'max' => 200,
			),
			'vw' => array(
				'min' => 0,
				'max' => 200,
			),
			'vh' => array(
				'min' => 0,
				'max' => 200,
			),
		),
		'default'    => array(
			'size' => '18',
			'unit' => 'px',
		),
		'size_units' => array( 'px', '%', 'vw', 'vh' ),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_mystery_image_overlay span.wpmozo_overlay_icon' => 'font-size:{{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_mystery_image_overlay svg.wpmozo_overlay_icon' => 'width:{{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
		),
		'condition'  => array( 'enable_overlay' => 'yes' ),
	)
);
$this->add_responsive_control(
	'overlay_icon_color',
	array(
		'label'       => esc_html__( 'Overlay Icon Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'default'     => '#ffffff',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_mystery_image_overlay span.wpmozo_overlay_icon' => 'color:{{VALUE}};',
			'{{WRAPPER}} .wpmozo_mystery_image_overlay svg.wpmozo_overlay_icon' => 'color:{{VALUE}}; fill:{{VALUE}};',
		),
		'condition'   => array( 'enable_overlay' => 'yes' ),
	)
);
$this->add_responsive_control(
	'overlay_icon_select',
	array(
		'label'     => esc_html__( 'Overlay Icon', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::ICONS,
		'default'   => array(
			'value'   => 'fas fa-image',
			'library' => 'fa-solid',
		),
		'condition' => array( 'enable_overlay' => 'yes' ),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'lightbox_tab',
	array(
		'label'     => esc_html__( 'Lightbox', 'wpmozo-addons-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'open_lightbox' => 'yes' ),
	)
);
$this->add_control(
	'lightbox_background_color',
	array(
		'label'     => esc_html__( 'Lightbox Background Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'default'   => '#0000006E',
		'selectors' => array(
			'{{WRAPPER}}.mfp-wrap' => 'background-color:{{VALUE}};',
		),
	)
);
$this->add_control(
	'close_icon_color',
	array(
		'label'       => esc_html__( 'Close Icon Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'default'     => '#ffffff',
		'selectors'   => array(
			'{{WRAPPER}} .mfp-close' => 'color: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
