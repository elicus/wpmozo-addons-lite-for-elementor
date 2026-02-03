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
use Elementor\Group_Control_Border;

// Start Content Tab.
$this->start_controls_section(
	'wpmozo_content_tab',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'title',
	array(
		'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Your title goes here', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Your title goes here', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$this->add_control(
	'coupon_code',
	array(
		'label'       => esc_html__( 'Coupon Code', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'COUPON', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'COUPON', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$this->add_control(
	'description',
	array(
		'label'       => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXTAREA,
		'rows'        => 10,
		'default'     => esc_html__( 'Default description', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Type your description here', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'show_expiry_date',
	array(
		'label'        => esc_html__( 'Show Expiry Date', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'expiry_date',
	array(
		'label' => esc_html__( 'Expiry Date', 'wpmozo-addons-lite-for-elementor' ),
		'type'  => Controls_Manager::DATE_TIME,
		'condition' => array(
			'show_expiry_date' => 'yes',
		),
	)
);
$this->add_control(
	'expiry_date_format',
	array(
		'label'       => esc_html__( 'Expiry Date Format', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'M j, Y', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'M j, Y', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'condition' => array(
			'show_expiry_date' => 'yes',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'display_tab',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'layout',
	array(
		'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::SELECT,
		'default' => 'layout1',
		'options' => array(
			'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	'show_offer_discount',
	array(
		'label'        => esc_html__( 'Show Offer Discount', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'offer_discount',
	array(
		'label'       => esc_html__( 'Offer Discount', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'condition' => array(
			'show_offer_discount' => 'yes',
		),
	)
);
$this->add_control(
	'offer_discount_label',
	array(
		'label'       => esc_html__( 'Offer Discount Label', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'condition' => array(
			'show_offer_discount' => 'yes',
		),
	)
);
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section(
	'title_styling',
	array(
		'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'title_heading_level',
	array(
		'type'        => Controls_Manager::CHOOSE,
		'label'       => esc_html__( 'Title Heading', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'options'     => array(
			'h1' => array(
				'title' => esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h1',
			),
			'h2' => array(
				'title' => esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h2',
			),
			'h3' => array(
				'title' => esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h3',
			),
			'h4' => array(
				'title' => esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h4',
			),
			'h5' => array(
				'title' => esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h5',
			),
			'h6' => array(
				'title' => esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-editor-h6',
			),
		),
		'default'     => 'h3',
		'toggle'      => false,
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
	'title_text_color',
	array(
		'label'     => esc_html__( 'Title Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'color: {{VALUE}};',
		),
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
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
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
	'title_text_color_hover',
	array(
		'label'     => esc_html__( 'Title Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'color: {{VALUE}}; transition: all 300ms;',
		),
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
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
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
			'{{WRAPPER}} .dipl_alert_box_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'description_styling',
	array(
		'label' => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'description_text_tabs' );
$this->start_controls_tab(
	'description_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'description_text_color',
	array(
		'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_description' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'description_text_size',
	array(
		'label'     => esc_html__( 'Description Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'default'   => array(
			'unit' => 'px',
			'size' => 14,
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_description' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_description',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_description',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'description_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'description_text_color_hover',
	array(
		'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_description:hover' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'description_text_size_hover',
	array(
		'label'     => esc_html__( 'Description Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_description:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_description:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_description:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'description_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .dipl_alert_box_description' => 'text-align: {{VALUE}}',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'coupon_code_styling',
	array(
		'label' => esc_html__( 'Coupon Code', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'coupon_code_text_tabs' );
$this->start_controls_tab(
	'coupon_code_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'coupon_code_text_color',
	array(
		'label'     => esc_html__( 'Coupon Code Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'coupon_code_text_size',
	array(
		'label'     => esc_html__( 'Coupon Code Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Coupon Code Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'coupon_code_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Coupon Code Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'coupon_code_text_shadow',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'coupon_code_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'coupon_code_text_color_hover',
	array(
		'label'     => esc_html__( 'Coupon Code Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'coupon_code_text_size_hover',
	array(
		'label'     => esc_html__( 'Coupon Code Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Coupon Code Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'coupon_code_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Coupon Code Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'coupon_code_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'discount_tab',
	array(
		'label' => esc_html__( 'Discount Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'discount_tabs' );
$this->start_controls_tab(
	'discount_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'discount_text_color',
	array(
		'label'       => esc_html__( 'Discount Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'discount_text_size',
	array(
		'label'     => esc_html__( 'Discount Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'default'   => array(
			'unit' => 'px',
			'size' => 14,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Discount Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'discount_border',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Discount Border', 'wpmozo-addons-lite-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Discount Border Width', 'wpmozo-addons-lite-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Discount Border Color', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_control(
	'discount_background_color',
	array(
		'label'       => esc_html__( 'Discount Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'separator'   => 'after',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'background-color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'discount_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'discount_text_color_hover',
	array(
		'label'       => esc_html__( 'Discount Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'discount_text_size_hover',
	array(
		'label'     => esc_html__( 'Discount Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Discount Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'discount_border_hover',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Discount Border', 'wpmozo-addons-lite-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Discount Border Width', 'wpmozo-addons-lite-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Discount Border Color', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover',
	)
);
$this->add_control(
	'discount_background_color_hover',
	array(
		'label'       => esc_html__( 'Discount Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'separator'   => 'after',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'background-color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Discount Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'discount_label_tab',
	array(
		'label' => esc_html__( 'Discount Label Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'discount_label_tabs' );
$this->start_controls_tab(
	'discount_label_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'discount_label_text_color',
	array(
		'label'       => esc_html__( 'Label Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'discount_label_text_size',
	array(
		'label'     => esc_html__( 'Label Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'default'   => array(
			'unit' => 'px',
			'size' => 14,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Label Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_label_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_control(
	'discount_label_background_color',
	array(
		'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'separator'   => 'after',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'background-color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'discount_label_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'discount_label_text_color_hover',
	array(
		'label'       => esc_html__( 'Label Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'discount_label_text_size_hover',
	array(
		'label'     => esc_html__( 'Label Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Label Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_label_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover',
	)
);
$this->add_control(
	'discount_label_background_color_hover',
	array(
		'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'separator'   => 'after',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'background-color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Label Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'discount_label_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'expiry_date_styling',
	array(
		'label' => esc_html__( 'Expiry Date Message', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'expiry_date_text_tabs' );
$this->start_controls_tab(
	'expiry_date_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'expiry_date_text_color',
	array(
		'label'     => esc_html__( 'Expiry Date Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'expiry_date_text_size',
	array(
		'label'     => esc_html__( 'Expiry Date Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Expiry Date Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'expiry_date_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Expiry Date Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'expiry_date_text_shadow',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'expiry_date_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'expiry_date_text_color_hover',
	array(
		'label'     => esc_html__( 'Expiry Date Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'expiry_date_text_size_hover',
	array(
		'label'     => esc_html__( 'Expiry Date Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_alert_box_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Expiry Date Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'expiry_date_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Expiry Date Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'expiry_date_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .dipl_alert_box_title:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'expiry_date_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Expiry Date Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .dipl_alert_box_title' => 'text-align: {{VALUE}};',
		),
	)
);
// End Style Tab.
