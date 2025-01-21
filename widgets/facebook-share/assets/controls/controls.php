<?php
/**
 * Registers all the controls for the Facebook Share widget in WPMozo, enabling customization of share settings in Elementor.
 *
 * This widget allows users to embed the Facebook Share button on their website, with options for layout, language, and share count display.
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
		)
	);
	$this->add_control(
		'page_url',
		array(
			'label'       => esc_html__( 'Page URL', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'dynamic'     => array(
				'active' => true,
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

	$this->end_controls_section();


	/* Display controls start here */
	$this->start_controls_section(
		'display',
		array(
			'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);
	$this->add_responsive_control(
		'button_layout',
		array(
			'label'       => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'button'       => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
				'button_count' => esc_html__( 'Button Count', 'wpmozo-addons-lite-for-elementor' ),
				'box_count'    => esc_html__( 'Box Count', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => 'button',
		)
	);
	$this->add_responsive_control(
		'button_size',
		array(
			'label'       => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'small' => esc_html__( 'Small', 'wpmozo-addons-lite-for-elementor' ),
				'large' => esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => 'small',
		)
	);
	$this->end_controls_section();
