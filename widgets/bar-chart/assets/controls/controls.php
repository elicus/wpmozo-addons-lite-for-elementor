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
use \Elementor\Group_Control_Typography;

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
$this->add_control(
	'chart_orientation',
	array(
		'label' => esc_html__( 'Orientation', 'wpmozo-addons-lite-for-elementor' ),
		'type' => Controls_Manager::CHOOSE,
		'options' => array(
			'x' => array(
				'title' => esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
				'icon' => 'eicon-align-end-v',
			),
			'y' => array(
				'title' => esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
				'icon' => 'eicon-align-start-h',
			),
		),
		'default' => 'x',
		'toggle' => false
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

$this->start_controls_section(
	'chart_title_styling',
	array(
		'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'title_color',
	array(
		'label' => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::COLOR,
	)
);
$this->add_control(
	'title_size',
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
	'title_font_weight',
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
	'title_font_style',
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
$this->add_control( 
	'title_position',
	array( 
		'label'       => esc_html__( 'Position', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'top',
		'options'     => array( 
			'top' => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
			'left' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
			'right' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
			'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
		 ),
		'render_type' => 'template',
	 )
);
$this->add_responsive_control( 
	'title_alignment',
	array( 
		'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::CHOOSE,
		'label_block' => true,
		'options'     => array( 
			'start'   =>
				array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
			'center' =>
				array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
			'end'  =>
				array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
		 ),
		'default'     => 'center',
		'toggle'      => true,
		'render_type' => 'template'
	)
);
$this->add_control(
	'title_padding',
	array(
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
		),
		'render_type' => 'template',
	)
);
$this->end_controls_section();
