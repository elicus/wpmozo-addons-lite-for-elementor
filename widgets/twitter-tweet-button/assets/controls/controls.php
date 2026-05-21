<?php
/**
 * If this file is called directly, abort.
 * */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Start Content Tab.
$this->start_controls_section(
	'configuration_setting',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'custom_text',
	array(
		'label' => esc_html__( 'Custom Share Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::TEXTAREA,
		'rows'  => 8,
	)
);
$this->add_control(
	'custom_url',
	array(
		'label'       => esc_html__( 'Url', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'hashtags',
	array(
		'label'       => esc_html__( 'Hashtags', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'via',
	array(
		'label'       => esc_html__( 'Via', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'related',
	array(
		'label'       => esc_html__( 'Related', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	)
);
$this->add_control(
	'do_not_track',
	array(
		'label'        => __( 'Do not track', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'display_setting',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'button_size',
	array(
		'label'   => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'large',
		'options' => array(
			'small' => esc_html__( 'Small', 'wpmozo-addons-lite-for-elementor' ),
			'large' => esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section(
	'alignment_styling',
	array(
		'label' => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-h-align-right',
			),
		),
		'default'   => 'center',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_twitter_tweet_button' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'fallback_text_styling',
	array(
		'label' => esc_html__( 'Fallback Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs(
	'fallback_text_style_tabs'
);
$this->start_controls_tab(
	'fallback_text_style_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'fallback_text_typography',
		'label'    => esc_html__( 'Fallback Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button a',
	)
);
$this->add_responsive_control(
	'fallback_text_color',
	array(
		'label'     => esc_html__( 'Fallback Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button a'   => 'color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'fallback_text_shadow',
		'label'    => esc_html__( 'Fallback Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'fallback_text_style_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'fallback_text_typography_hover',
		'label'    => esc_html__( 'Fallback Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button a:hover',
	)
);
$this->add_responsive_control(
	'fallback_text_color_hover',
	array(
		'label'     => esc_html__( 'Fallback Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button a:hover'     => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'fallback_text_shadow_hover',
		'label'    => esc_html__( 'Fallback Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'tweet_button_border',
	array(
		'label' => esc_html__( 'Tweet Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs(
	'border_style_tabs'
);
$this->start_controls_tab(
	'border_style_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'     => 'button_border',
		'label'    => esc_html__( 'Button Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button',
	)
);
$this->add_responsive_control(
	'button_border_radius',
	array(
		'label'      => esc_html__( 'Button Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'separator'  => 'after',
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'border_style_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'     => 'button_border_hover',
		'label'    => esc_html__( 'Button Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button:hover',
	)
);
$this->add_responsive_control(
	'button_border_radius_hover',
	array(
		'label'      => esc_html__( 'Button Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'separator'  => 'after',
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'     => 'button_box_shadow',
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_button',
	)
);
$this->end_controls_section();
// End Style Tab.
