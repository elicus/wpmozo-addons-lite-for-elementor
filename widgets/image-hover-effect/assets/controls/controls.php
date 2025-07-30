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
use Elementor\Utils;

// Content.
$this->start_controls_section(
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'render_image',
	array(
		'label'   => esc_html__( 'Select Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array(
			'url' => Utils::get_placeholder_image_src(),
		),
	)
);
$this->add_control(
	'image_alt_tag',
	array(
		'label'       => esc_html__( 'Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'hover_effect',
	array(
		'label'       => esc_html__( 'Hover Effect', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'circle',
		'options'     => array(
			'circle'        => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			'glow'          => esc_html__( 'Glow', 'wpmozo-addons-lite-for-elementor' ),
			'rotate'        => esc_html__( 'Rotate', 'wpmozo-addons-lite-for-elementor' ),
			'flash'         => esc_html__( 'Flash', 'wpmozo-addons-lite-for-elementor' ),
			'flash_instant' => esc_html__( 'Flash Instant', 'wpmozo-addons-lite-for-elementor' ),
			'diagonal'      => esc_html__( 'Diagonal', 'wpmozo-addons-lite-for-elementor' ),
			'glitch'        => esc_html__( 'Glitch', 'wpmozo-addons-lite-for-elementor' ),
			'slide_glitch'  => esc_html__( 'Slide Glitch', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->end_controls_section();
