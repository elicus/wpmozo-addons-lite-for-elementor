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

$this->start_controls_section(
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'bar_chart_title',
	array(
		'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Chart Title', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Chart Title Goes Here', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'bar_chart_section',
	array(
		'label' => esc_html__( 'Bar Chart Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'item_label',
	array(
		'label'       => esc_html__( 'Label', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Item Label', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$repeater->add_control(
	'item_value',
	array(
		'label'       => esc_html__( 'Value', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::NUMBER,
	)
);
$repeater->add_control(
	'item_background_color',
	array(
		'label' => esc_html__( 'Item Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::COLOR,
	)
);
$repeater->add_control(
	'item_border_color',
	array(
		'label'   => esc_html__( 'Item Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::COLOR,
		'default' => '#000000',
	)
);
$this->add_control(
	'bar_chart_items',
	array(
		'label'       => esc_html__( 'Bar Chart Items', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'default'     => array(
			array(
				'item_label' => esc_html__( 'Label', 'wpmozo-addons-lite-for-elementor' ),
				'item_value' => 100,
			),
		),
		'title_field' => '{{{ item_label }}}',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'bar_chart_styling',
	array(
		'label' => esc_html__( 'Bar Chart', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'bar_chart_height',
	array(
		'label'      => esc_html__( 'Bar Chart Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 100,
				'max' => 1000,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 400,
		),
	)
);
$this->add_control(
	'bar_chart_border_size',
	array(
		'label'      => esc_html__( 'Bar Border Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 20,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 1,
		),
	)
);
$this->end_controls_section();
