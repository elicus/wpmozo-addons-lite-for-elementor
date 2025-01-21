<?php
/**
 * Registers all the controls for the Facebook Video Embed widget in WPMozo, enabling customization of video embed settings in Elementor.
 *
 * This widget allows users to embed a Facebook video on their website, with options for video URL, layout, and player settings.
 *
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.4.0
 * @package   WPMOZO Lite
 */

use Elementor\Controls_Manager;
/* Configuration controls start here */
$this->start_controls_section(
	'configuration',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$this->add_control(
		'facebook_app_id',
		array(
			'label'       => esc_html__( 'Facebook APP ID', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'render_type' => 'template',
		)
	);
	$this->add_control(
		'video_url',
		array(
			'label'       => esc_html__( 'URL', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'dynamic'     => array(
				'active' => true,
			),
			'render_type' => 'template',
		)
	);
	$this->add_responsive_control(
		'frame_width',
		array(
			'type'        => Controls_Manager::SLIDER,
			'label'       => esc_html__( 'Frame Width', 'wpmozo-addons-lite-for-elementor' ),
			'size_units'  => array( 'px' ),
			'range'       => array(
				'px' => array(
					'min' => 180,
					'max' => 500,
				),
			),
			'default'     => array(
				'unit' => 'px',
				'size' => 450,
			),
			'render_type' => 'template',
			'selectors'   => array(
				'{{WRAPPER}} .wpmozo_ajax_search_result_masonry .wpmozo_ajax_search_isotope_item_gutter' => 'width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ajax_search_isotope_item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_control(
		'lazy_loading',
		array(
			'label'        => esc_html__( 'Enable lazy loading', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->add_control(
		'lazy_loading',
		array(
			'label'        => esc_html__( 'Enable lazy loading', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->add_control(
		'autoplay',
		array(
			'label'        => esc_html__( 'Autoplay', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->add_control(
		'allow_fullscreen',
		array(
			'label'        => esc_html__( 'Allow Fullscreen', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->end_controls_section();

	/* Display controls start here */
	$this->start_controls_section(
		'display',
		array(
			'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$this->add_control(
		'show_text',
		array(
			'label'        => esc_html__( 'Show Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->add_control(
		'show_captions',
		array(
			'label'        => esc_html__( 'Show Captions', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);
	$this->end_controls_section();
