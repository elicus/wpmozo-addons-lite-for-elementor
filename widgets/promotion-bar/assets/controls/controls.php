<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// Start Content Tab.
$this->start_controls_section(
	'date_content_tab',
	array(
		'label' => esc_html__( 'Date & Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'date_time',
	array(
		'label' => esc_html__( 'Date & Time', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::DATE_TIME,
	)
);
$this->add_control(
	'promotion_bar_title',
	array(
		'label'       => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'placeholder' => esc_html__( 'Your title goes here.', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_control(
	'promotion_bar_description',
	array(
		'label'   => esc_html__( 'Description', 'wpmozo-addons-for-elementor' ),
		'type'    => Controls_Manager::WYSIWYG,
		'default' => esc_html__( 'Description', 'wpmozo-addons-for-elementor' ),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'display_tab',
	array(
		'label' => esc_html__( 'Display', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'layout',
	array(
		'label'       => __( 'Layout', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-for-elementor' ),
			'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-for-elementor' ),
		),
		'default'     => 'layout1',
		'render_type' => 'template',
	)
);
$this->add_control(
	'hide_days',
	array(
		'label'        => esc_html__( 'Hide Days', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'display_label',
	array(
		'label'       => __( 'Display Labels', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'none'   => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
			'full'   => esc_html__( 'Full Label', 'wpmozo-addons-for-elementor' ),
			'short'  => esc_html__( 'Short Label', 'wpmozo-addons-for-elementor' ),
			'single' => esc_html__( 'Single Character', 'wpmozo-addons-for-elementor' ),
		),
		'default'     => 'full',
		'render_type' => 'template',
	)
);
$this->add_control(
	'display_stack_label',
	array(
		'label'        => esc_html__( 'Display Label Inline', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'prefix_class' => 'wpmozo_inline_label_',
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'show_button',
	array(
		'label'        => esc_html__( 'Show Button', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->add_control(
	'button_text',
	array(
		'label'       => esc_html__( 'Button Text', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'type'        => Controls_Manager::TEXT,
		'dynamic'     => array( 'active' => true ),
		'default'     => 'Get the deal',
		'condition'   => array(
			'show_button' => 'yes',
		),
	)
);
$this->add_control(
	'button_link_url',
	array(
		'label'       => esc_html__( 'Button Link Url', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'options'     => array( 'url', 'is_external', 'nofollow' ),
		'default'     => array(
			'url'         => '',
			'is_external' => true,
			'nofollow'    => true,
		),
		'label_block' => true,
		'condition'   => array(
			'show_button' => 'yes',
		),
	)
);
$this->end_controls_section();

// Style Tab.
$this->start_controls_section(
	'content_box_tab',
	array(
		'label' => esc_html__( 'Content Box', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'conditions' => array(
			'relation' => 'or',
			'terms' => array(
				array(
					'name' => 'promotion_bar_title',
					'operator' => '!==',
					'value' => '',
				),
				array(
					'name' => 'promotion_bar_description',
					'operator' => '!==',
					'value' => '',
				),
			),
		)
	)
);
$this->add_responsive_control(
	'content_box_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Content Box Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'separator' => 'before',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_promotion_bar .wpmozo_promotion_bar_wrap .wpmozo_promotion_bar_inner .wpmozo_promotion_bar_content' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'content_box_width',
	array(
		'label'          => esc_html__( 'Content Box Width', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'%' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 50,
			'unit' => '%',
		),
		'tablet_default' => array(
			'size' => 50,
			'unit' => '%',
		),
		'mobile_default' => array(
			'size' => 100,
			'unit' => '%',
		),
		'size_units'     => array( '%' ),
		'separator'      => 'before',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_wrap.layout2 .wpmozo_promotion_bar_content' => 'width: {{SIZE}}{{UNIT}};',
		),
		'condition'      => array(
			'layout' => 'layout2',
		),
	)
);
$this->add_responsive_control(
	'content_box_gap',
	array(
		'label'          => esc_html__( 'Content Box Gap', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 200,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 30,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 10,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'separator'      => 'before',
		'selectors'      => array(
			'{{WRAPPER}} .layout2 .wpmozo_promotion_bar_inner' => 'gap: {{SIZE}}{{UNIT}};',
		),
		'condition'      => array(
			'layout' => 'layout2',
		),
	)
);
$this->end_controls_section();
/*$this->start_controls_section(
	'promotion_bar_content_tab',
	array(
		'label' => esc_html__( 'Promotion Bar Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);*/
$this->start_controls_section(
	'title_styling',
	array(
		'label' => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'promotion_bar_title!' => ''
		)
	)
);
$this->add_control(
	'title_heading_level',
	array(
		'type'        => Controls_Manager::CHOOSE,
		'label'       => esc_html__( 'Title Heading', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'options'     => array(
			'h1' => array(
				'title' => esc_html__( 'H1', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-editor-h1',
			),
			'h2' => array(
				'title' => esc_html__( 'H2', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-editor-h2',
			),
			'h3' => array(
				'title' => esc_html__( 'H3', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-editor-h3',
			),
			'h4' => array(
				'title' => esc_html__( 'H4', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-editor-h4',
			),
			'h5' => array(
				'title' => esc_html__( 'H5', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-editor-h5',
			),
			'h6' => array(
				'title' => esc_html__( 'H6', 'wpmozo-addons-for-elementor' ),
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
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'title_text_color',
	array(
		'label'     => esc_html__( 'Title Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_title' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'title_text_size',
	array(
		'label'     => esc_html__( 'Title Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_title' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'title_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'title_text_color_hover',
	array(
		'label'     => esc_html__( 'Title Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_title:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'title_text_size_hover',
	array(
		'label'     => esc_html__( 'Title Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_title:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'title_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Title Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'description_styling',
	array(
		'label' => esc_html__( 'Description', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'promotion_bar_description!' => ''
		)
	)
);
$this->start_controls_tabs( 'description_text_tabs' );
$this->start_controls_tab(
	'description_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'description_text_color',
	array(
		'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_desc' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'description_text_size',
	array(
		'label'     => esc_html__( 'Description Text Size', 'wpmozo-addons-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_pb_desc' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'description_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'description_text_color_hover',
	array(
		'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_desc:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'description_text_size_hover',
	array(
		'label'     => esc_html__( 'Description Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_desc:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'description_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Description Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_desc' => 'text-align: {{VALUE}}',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'timer_clock_digits_tab',
	array(
		'label' => esc_html__( 'Digit Style', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'digit_tabs' );
$this->start_controls_tab(
	'digit_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'digits_text_color',
	array(
		'label'       => esc_html__( 'Digits Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'digit_text_size',
	array(
		'label'     => esc_html__( 'Digit Text Size', 'wpmozo-addons-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Digit Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'digit_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number',
	)
);
$this->add_control(
	'digits_background_color',
	array(
		'label'       => esc_html__( 'Digits Background Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'background-color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'digits_border',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Digits Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Digits Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Digits Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'digit_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'digits_text_color_hover',
	array(
		'label'       => esc_html__( 'Digits Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'digit_text_size_hover',
	array(
		'label'     => esc_html__( 'Digit Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Digit Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'digit_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number:hover',
	)
);
$this->add_control(
	'digits_background_color_hover',
	array(
		'label'       => esc_html__( 'Digits Background Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number:hover' => 'background-color: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'digits_border_hover',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Digits Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Digits Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Digits Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'digit_box_width',
	array(
		'label'     => esc_html__( 'Digit Box Width', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'separator' => 'before',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Digits Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'digits_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box span.wpmozo_pb_number',
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Digits Box Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'digits_box_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number',
	)
);
$this->start_controls_tabs(
	'digit_padding_margin_tabs',
	array(
		'separator' => 'before',
	)
);
$this->start_controls_tab(
	'digit_padding_tab',
	array(
		'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'digits_padding',
	array(
		'label'      => esc_html__( 'Digits Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 10,
			'right'  => 5,
			'bottom' => 10,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'digit_margin_tab',
	array(
		'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'digits_margin',
	array(
		'label'      => esc_html__( 'Digits Margin', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'timer_clock_labels_tab',
	array(
		'label' => esc_html__( 'Label Style', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->start_controls_tabs( 'label_tabs' );
$this->start_controls_tab(
	'label_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'label_text_color',
	array(
		'label'       => esc_html__( 'Label Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'label_text_size',
	array(
		'label'     => esc_html__( 'Label Text Size', 'wpmozo-addons-for-elementor' ),
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
		'label'       => esc_html__( 'Label Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'label_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'label_border',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Label Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Label Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Label Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_control(
	'label_background_color',
	array(
		'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-for-elementor' ),
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
	'label_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'label_text_color_hover',
	array(
		'label'       => esc_html__( 'Label Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'label_text_size_hover',
	array(
		'label'     => esc_html__( 'Label Text Size', 'wpmozo-addons-for-elementor' ),
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
		'label'       => esc_html__( 'Label Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'label_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'label_border_hover',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Label Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Label Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Label Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label:hover',
	)
);
$this->add_control(
	'label_background_color_hover',
	array(
		'label'       => esc_html__( 'Label Background Color', 'wpmozo-addons-for-elementor' ),
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
		'label'       => esc_html__( 'Label Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'label_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Label Box Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'label_box_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label',
	)
);
$this->start_controls_tabs(
	'label_padding_margin_tabs',
	array(
		'separator' => 'before',
	)
);
$this->start_controls_tab(
	'label_padding_tab',
	array(
		'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'label_padding',
	array(
		'label'      => esc_html__( 'Label Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 10,
			'right'  => 5,
			'bottom' => 10,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'label_margin_tab',
	array(
		'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'label_margin',
	array(
		'label'      => esc_html__( 'Label Margin', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box .wpmozo_pb_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'timer_clock_box_tab',
	array(
		'label' => esc_html__( 'Container Style', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'box_alignment',
	array(
		'type'      => Controls_Manager::CHOOSE,
		'label'     => esc_html__( 'Container Alignment', 'wpmozo-addons-for-elementor' ),
		'options'   => array(
			'flex-start' => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center'     => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'flex-end'   => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'default'   => 'center',
		'toggle'    => true,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_timer' => 'justify-content: {{VALUE}}',
		),
	)
);
$this->start_controls_tabs(
	'border_box_tabs'
);
$this->start_controls_tab(
	'border_box_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'box_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label' => esc_html__( 'Container Background', 'wpmozo-addons-for-elementor' ),
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box',
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Container Box Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'box_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'box_border',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Container Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Container Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Container Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'border_box_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'hover_box_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label' => esc_html__( 'Container Background', 'wpmozo-addons-for-elementor' ),
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box:hover',
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Container Box Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'hover_box_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_timer_box:hover',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'box_border_hover',
		'fields_options' => array(
			'border' => array(
				'label' => esc_html__( 'Container Border', 'wpmozo-addons-for-elementor' ),
			),
			'width'  => array(
				'label' => esc_html__( 'Container Border Width', 'wpmozo-addons-for-elementor' ),
			),
			'color'  => array(
				'label' => esc_html__( 'Container Border Color', 'wpmozo-addons-for-elementor' ),
			),
		),
		'selector'       => '{{WRAPPER}} .wpmozo_pb_timer_box:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->start_controls_tabs(
	'box_padding_margin_tabs',
	array(
		'separator' => 'before',
	)
);
$this->start_controls_tab(
	'box_padding_tab',
	array(
		'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'box_padding',
	array(
		'label'      => esc_html__( 'Container Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 10,
			'right'  => 5,
			'bottom' => 10,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'box_margin_tab',
	array(
		'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'box_margin',
	array(
		'label'      => esc_html__( 'Container Margin', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array(
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_pb_timer_box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'timer_separator_tab',
	array(
		'label' => esc_html__( 'Timer Separator', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'show_separator',
	array(
		'label'        => esc_html__( 'Show Separator', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'separator_text',
	array(
		'label'       => esc_html__( 'Separator Text', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( ':', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'placeholder' => esc_html__( ':', 'wpmozo-addons-for-elementor' ),
		'condition'   => array(
			'show_separator' => 'yes',
		),
	)
);
$this->start_controls_tabs(
	'separator_tabs'
);
$this->start_controls_tab(
	'separator_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'separator_text_color',
	array(
		'label'       => esc_html__( 'Separator Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'separator_text_size',
	array(
		'label'     => esc_html__( 'Separator Text Size', 'wpmozo-addons-for-elementor' ),
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
			'size' => 40,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Separator Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'separator_text_typography',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'separator_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
	)
);
$this->add_responsive_control(
	'separator_text_color_hover',
	array(
		'label'       => esc_html__( 'Separator Text Color', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'separator_text_size_hover',
	array(
		'label'     => esc_html__( 'Separator Text Size', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator:hover' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Separator Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'separator_text_typography_hover',
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_control(
	'separator_divier',
	array(
		'type' => Controls_Manager::DIVIDER,
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Separator Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'separator'   => 'before',
		'name'        => 'separator_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_promotion_bar_timer .wpmozo_pb_separator',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'sale_button_tab',
	array(
		'label' => esc_html__( 'Sale Button', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'show_button' => 'yes'
		)
	)
);
$this->add_responsive_control(
	'button_alignment',
	array(
		'label'     => esc_html__( 'Button Alignment', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'options'   => array(
			'left'   => array(
				'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-left',
			),
			'center' => array(
				'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-center',
			),
			'right'  => array(
				'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-text-align-right',
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button_wrapper' => 'text-align: {{VALUE}};',
		),
	)
);

$this->add_control(
	'button_custom_style',
	array(
		'label'        => esc_html__( 'Use Custom Style For Button', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'show_button_icon',
	array(
		'label'        => esc_html__( 'Show Button Icon', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'condition'    => array(
			'button_custom_style' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_icon',
	array(
		'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::ICONS,
		'default'   => array(
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		),
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
	)
);

$this->add_responsive_control(
	'button_icon_placement',
	array(
		'label'        => esc_html__( 'Button Icon Placement', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::CHOOSE,
		'options'      => array(
			'row-reverse' => array(
				'title' => esc_html__( 'Before', 'wpmozo-addons-for-elementor' ),
				'icon'  => 'eicon-angle-left',
			),
			'row'         => array(
				'title' => esc_html__( 'After', 'elementor' ),
				'icon'  => 'eicon-angle-right',
			),
		),
		'render_type'  => 'template',
		'default'      => 'row-reverse',
		'prefix_class' => 'icon_',
		'toggle'       => false,
		'selectors'    => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'flex-flow:{{VALUE}}; gap:5px;',
		),
		'condition'    => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
	)
);
$this->add_control(
	'show_button_icon_on_hover',
	array(
		'label'        => esc_html__( 'Only Show Icon On Hover For Button', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'selectors'    => array(
			'{{WRAPPER}} .icon_row-reverse .wpmozo_sale_button_wrapper .wpmozo_sale_button .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_sale_button_wrapper .wpmozo_sale_button svg'              => 'opacity: 0; margin-right: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row-reverse .wpmozo_sale_button_wrapper .wpmozo_sale_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_sale_button_wrapper .wpmozo_sale_button:hover svg'  => 'opacity: 1; margin-right:0;',
			'{{WRAPPER}} .icon_row .wpmozo_sale_button_wrapper .wpmozo_sale_button .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_sale_button_wrapper .wpmozo_sale_button svg'                              => 'opacity: 0; margin-left: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row .wpmozo_sale_button_wrapper .wpmozo_sale_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_sale_button_wrapper .wpmozo_sale_button:hover svg'                  => 'opacity: 1; margin-left:0;',
			'{{WRAPPER}} .wpmozo_sale_button_wrapper .wpmozo_sale_button .wpmozo_button_icon'                                                                                                                           => ' min-width:{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .wpmozo_sale_button_wrapper .wpmozo_sale_button'                                                                                                                                               => 'gap:0px;',
			'{{WRAPPER}} .wpmozo_sale_button_wrapper .wpmozo_sale_button:hover'                                                                                                                                         => 'gap:5px;',

		),
		'condition'    => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Button Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'button_text_shadow',
		'condition'   => array(
			'button_custom_style' => 'yes',
		),
		'selector'    => '{{WRAPPER}} .wpmozo_sale_button',
	)
);
$this->start_controls_tabs(
	'button_tab'
);
$this->start_controls_tab(
	'button_tab_normal',
	array(
		'label'     => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
		'condition' => array(
			'button_custom_style' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_text_size',
	array(
		'label'      => esc_html__( 'Button Text Size', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 16,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button'     => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_sale_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_text_color',
	array(
		'label'     => esc_html__( 'Button Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'color: {{VALUE}};',
		),
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'button_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Button Background', 'wpmozo-addons-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'condition'      => array(
			'button_custom_style' => 'yes',
		),
		'selector'       => '{{WRAPPER}} .wpmozo_sale_button',
	)
);
$this->add_responsive_control(
	'button_border_width',
	array(
		'label'      => esc_html__( 'Border Width', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 1,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'border: {{SIZE}}{{UNIT}} solid;',
		),
	)
);
$this->add_responsive_control(
	'button_border_color',
	array(
		'label'     => esc_html__( 'Border Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'border-color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'button_border_radius',
	array(
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 8,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Button Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'button_typography',
		'condition'   => array(
			'button_custom_style' => 'yes',
		),
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_sale_button',
	)
);
$this->add_responsive_control(
	'button_icon_color',
	array(
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button svg' => 'fill: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_sale_button i'   => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding',
	array(
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'    => '5',
			'right'  => '10',
			'bottom' => '5',
			'left'   => '10',
			'unit'   => 'px',
		),
		'separator'  => 'after',
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'button_tab_hover',
	array(
		'label'     => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
		'condition' => array(
			'button_custom_style' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_text_size_hover',
	array(
		'label'      => esc_html__( 'Button Text Size', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
			'em' => array(
				'min' => 1,
				'max' => 10,
			),
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover'     => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_sale_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_text_color_hover',
	array(
		'label'     => esc_html__( 'Button Text Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'color: {{VALUE}};',
		),
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'button_background_hover',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Button Background', 'wpmozo-addons-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'condition'      => array(
			'button_custom_style' => 'yes',
		),
		'selector'       => '{{WRAPPER}} .wpmozo_sale_button:hover',
	)
);
$this->add_responsive_control(
	'button_border_width_hover',
	array(
		'label'      => esc_html__( 'Border Width', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
		),
	)
);
$this->add_responsive_control(
	'button_border_color_hover',
	array(
		'label'     => esc_html__( 'Border Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'border-color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'button_border_radius_hover',
	array(
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', '%' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 100,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 8,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label'       => esc_html__( 'Button Typography', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'button_typography_hover',
		'condition'   => array(
			'button_custom_style' => 'yes',
		),
		'exclude'     => array( 'font_size' ),
		'selector'    => '{{WRAPPER}} .wpmozo_sale_button:hover',
	)
);
$this->add_responsive_control(
	'button_icon_color_hover',
	array(
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover svg' => 'fill: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_sale_button:hover i'   => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding_hover',
	array(
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'separator'  => 'after',
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_responsive_control(
	'button_margin',
	array(
		'label'      => esc_html__( 'Button Margin', 'wpmozo-addons-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'    => 0,
			'right'  => 0,
			'bottom' => 0,
			'left'   => 0,
			'unit'   => 'px',
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_sale_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
