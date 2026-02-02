<?php
/**
 * If this file is called directly, abort.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

// Start Content Tab.
$this->start_controls_section(
	'wpmozo_content_tab',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'text_effect',
	array(
		'label'   => esc_html__( 'Text Effect', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'effect1',
		'options' => array(
			'effect1' => esc_html__( 'Effect 1', 'wpmozo-addons-lite-for-elementor' ),
			'effect2' => esc_html__( 'Effect 2', 'wpmozo-addons-lite-for-elementor' ),
			'effect3' => esc_html__( 'Effect 3', 'wpmozo-addons-lite-for-elementor' ),
			'effect4' => esc_html__( 'Effect 4', 'wpmozo-addons-lite-for-elementor' ),
			'effect5' => esc_html__( 'Effect 5', 'wpmozo-addons-lite-for-elementor' ),
			'effect6' => esc_html__( 'Effect 6', 'wpmozo-addons-lite-for-elementor' ),
			'effect7' => esc_html__( 'Effect 7', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	'text_to_effect',
	array(
		'label'       => esc_html__( 'Text to Effect', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Lorem', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Lorem', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section(
	'title_styling',
	array(
		'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'normal_text_color',
	array(
		'label'     => esc_html__( 'Normal Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects_text' => 'color: {{VALUE}};',
		),
	)
);
$this->add_control(
	'hover_text_color',
	array(
		'label'     => esc_html__( 'Hover Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect1 .wpmozo_text_hover_effects_text>span::before' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect2 .wpmozo_text_hover_effects_text>span:hover' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect3 .wpmozo_text_hover_effects_text>span span::before, {{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect3 .wpmozo_text_hover_effects_text>span span::after' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect4 .wpmozo_text_hover_effects_text > span span::before' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect5 .wpmozo_text_hover_effects_text>span:hover span' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect6 .wpmozo_text_hover_effects_text>span span::before' => 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect7 .wpmozo_text_hover_effects_text>span:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_control(
	'bar_line_text_color',
	array(
		'label'     => esc_html__( 'Bar/Line Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect1 .wpmozo_text_hover_effects_text>span::after' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect2 .wpmozo_text_hover_effects_text>span::before' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect3 .wpmozo_text_hover_effects_text>span::before, {{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect3 .wpmozo_text_hover_effects_text>span::after' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect4 .wpmozo_text_hover_effects_text>span::after' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect5 .wpmozo_text_hover_effects_text>span::before' => 'border-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect6 .wpmozo_text_hover_effects_text>span::before' => 'background-color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_text_hover_effects .wpmozo_text_effect7 .wpmozo_text_hover_effects_text>span::before' => 'background-color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'title_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Title Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects_text' => 'text-align: {{VALUE}};',
		),
	)
);
$this->start_controls_tabs( 'title_text_tabs' );
$this->start_controls_tab(
	'title_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'title_text_size',
	array(
		'label'     => esc_html__( 'Title Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_text_hover_effects_text',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_text_hover_effects_text',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'title_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'title_text_size_hover',
	array(
		'label'     => esc_html__( 'Title Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_text_hover_effects_text:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_text_hover_effects_text:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .wpmozo_text_hover_effects_text:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
// End Style Tab.
