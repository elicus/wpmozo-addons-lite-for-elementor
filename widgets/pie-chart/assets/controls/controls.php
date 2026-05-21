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
	'pie_chart_section',
	array(
		'label' => esc_html__( 'Pie Chart Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'item_label',
	array(
		'label'       => esc_html__( 'Label', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Item Title', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$repeater->add_control(
	'item_value',
	array(
		'label'       => esc_html__( 'Value', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::NUMBER,
		'step'        => 1,
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
	'pie_chart_items',
	array(
		'label'       => esc_html__( 'Pie Chart Items', 'wpmozo-addons-lite-for-elementor' ),
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
	'pie_chart_styling',
	array(
		'label' => esc_html__( 'Chart', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'pie_chart_height',
	array(
		'label'      => esc_html__( 'Pie Chart Height', 'wpmozo-addons-lite-for-elementor' ),
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
	'pie_chart_border_size',
	array(
		'label'      => esc_html__( 'Pie Border Size', 'wpmozo-addons-lite-for-elementor' ),
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
$this->add_control(
	'legend_and_chart_gap',
	array(
		'label'      => esc_html__( 'Gap Between Legend and Chart', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 100,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 1,
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'chart_legend_styling',
	array(
		'label' => esc_html__( 'Legend', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'chart_legend_color',
	array(
		'label' => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::COLOR,
	)
);
$this->add_control(
	'chart_legend_size',
	array(
		'label'      => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'render_type' => 'template',
	)
);
$this->add_control(
	'chart_legend_font_weight',
	array(
		'label'      => esc_html__( 'Font Weight', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 100,
				'max' => 900,
				'step' => 100,
			),
		),
		'render_type' => 'template',
	)
);
$this->add_control( 
	'chart_legend_font_style',
	array( 
		'label'       => esc_html__( 'Font Style', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'normal',
		'options'     => array( 
			'normal' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			'italic' => esc_html__( 'Italic', 'wpmozo-addons-lite-for-elementor' ),
			'oblique' => esc_html__( 'Oblique', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'render_type' => 'template',
	 )
);
$this->end_controls_section();
