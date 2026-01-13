<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

// Start Content Tab.
$this->start_controls_section(
	'wpmozo_content_tab',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'alert_title',
	array(
		'label'       => esc_html__( 'Alert Title', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Alert Title', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Alert Title', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
	)
);
$this->add_control(
	'alert_description',
	array(
		'label'       => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXTAREA,
		'rows'        => 10,
		'default'     => esc_html__( 'Default description', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Type your description here', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'use_alert_box_image',
	array(
		'label'        => esc_html__( 'Use Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'alert_box_icon',
	array(
		'label'   => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::ICONS,
		'default' => array(
			'value'   => 'fas fa-check-circle',
			'library' => 'fa-solid',
		),
		'condition' => array(
			'use_alert_box_image!' => 'yes',
		),
	)
);
$this->add_control(
	'alert_box_image',
	array(
		'label'   => esc_html__( 'Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'type'    => Controls_Manager::MEDIA,
		'default' => array( 
			'url' => Utils::get_placeholder_image_src(),
			'id'  => 'thisistheimage',
		),
		'condition' => array(
			'use_alert_box_image' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'alert_box_image_alt',
	array(
		'label'     => esc_html__( 'Thumbnail Alt Tag', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::TEXT,
		'condition' => array(
			'use_alert_box_image' => 'yes',
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
			'layout2'  => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	'show_close_button',
	array(
		'label'        => esc_html__( 'Show Close Button', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'show_alert_button',
	array(
		'label'        => esc_html__( 'Show Alert Button', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
	)
);
$this->add_control(
	'button_text',
	array(
		'label'       => esc_html__( 'Button Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'default'     => esc_html__( 'Read More', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'condition' => array(
			'show_alert_button'   => 'yes',
		),
	)
);
$this->add_control(
	'button_url',
	array(
		'label'       => esc_html__( 'Button Url', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'options'     => array( 'url', 'is_external', 'nofollow' ),
		'default'     => array(
			'url'         => '',
			'is_external' => true,
			'nofollow'    => true,
		),
		'label_block' => true,
		'condition' => array(
			'show_alert_button'   => 'yes',
		),
	)
);
$this->end_controls_section();
// End Content Tab.
// Start Style Tab.
$this->start_controls_section(
	'title_styling',
	array(
		'label'     => esc_html__( 'Alert Title Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .wpmozo_pb_title' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_pb_title' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title',
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
			'{{WRAPPER}} .wpmozo_pb_title:hover' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_pb_title:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_pb_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_pb_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'description_styling',
	array(
		'label'     => esc_html__( 'Alert Description Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .wpmozo_pb_desc' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_pb_desc' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc',
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
			'{{WRAPPER}} .wpmozo_pb_desc:hover' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_pb_desc:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_pb_desc:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_pb_desc' => 'text-align: {{VALUE}}',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'alert_button_tab',
	array(
		'label'     => esc_html__( 'Alert Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'show_alert_button' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_alignment',
	array(
		'label'     => esc_html__( 'Button Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
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
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button_wrapper' => 'text-align: {{VALUE}};',
		),
	)
);

$this->add_control(
	'button_custom_style',
	array(
		'label'        => esc_html__( 'Use Custom Style For Button', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
	)
);
$this->add_control(
	'show_button_icon',
	array(
		'label'        => esc_html__( 'Show Button Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'        => esc_html__( 'Button Icon Placement', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::CHOOSE,
		'options'      => array(
			'row-reverse' => array(
				'title' => esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'        => esc_html__( 'Only Show Icon On Hover For Button', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'       => esc_html__( 'Button Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		'condition' => array(
			'button_custom_style' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_text_size',
	array(
		'label'      => esc_html__( 'Button Text Size', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Button Text Color', 'wpmozo-addons-lite-for-elementor' ),
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
				'label'   => esc_html__( 'Button Background', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'       => esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		'condition' => array(
			'button_custom_style' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'button_text_size_hover',
	array(
		'label'      => esc_html__( 'Button Text Size', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_sale_button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_sale_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_text_color_hover',
	array(
		'label'     => esc_html__( 'Button Text Color', 'wpmozo-addons-lite-for-elementor' ),
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
				'label'   => esc_html__( 'Button Background', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'       => esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon'    => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_sale_button:hover svg' => 'fill: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_sale_button:hover i' => 'color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding_hover',
	array(
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
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
		'label'      => esc_html__( 'Button Margin', 'wpmozo-addons-lite-for-elementor' ),
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
$this->start_controls_section(
	'icon_image_tab',
	array(
		'label' => esc_html__( 'Icon/Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control( 
	'icon_image_padding',
	array( 
		'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'default'    => array( 
			'top'    => 5,
			'right'  => 5,
			'bottom' => 5,
			'left'   => 5,
		 ),
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_list_item_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'icon_font_size',
	array(
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array('px', 'em'),
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
		'default' => array(
			'unit' => 'px',
			'size' => 16,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs(
	'icon_image_styling'
);
$this->start_controls_tab(
	'icon_image_styling_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_image_background',
	array(
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control( 
    Group_Control_Border::get_type(),
    array( 
        'name'     => 'icon_image_border',
        'selector' => "{{WRAPPER}} .wpmozo_list_item_content_wrapper",
    )
);
$this->add_responsive_control( 
    'icon_image_border_radius',
    array( 
        'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array( 'px', 'em', '%' ),
        'selectors'  => array( 
            "{{WRAPPER}} .wpmozo_list_item_content_wrapper" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
    )
);
$this->end_controls_tab();
$this->start_controls_tab(
	'icon_image_styling_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_image_background_hover',
	array(
		'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text:hover' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->add_group_control( 
    Group_Control_Border::get_type(),
    array( 
        'name'     => 'icon_image_hover_border',
        'selector' => "{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover",
    )
);
$this->add_responsive_control( 
    'icon_image_border_radius_hover',
    array( 
        'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::DIMENSIONS,
        'size_units' => array( 'px', 'em', '%' ),
        'selectors'  => array( 
            "{{WRAPPER}} .wpmozo_list_item_content_wrapper:hover" => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ),
    )
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'close_icon_tab',
	array(
		'label' => esc_html__( 'Close Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'icon_font_size',
	array(
		'label'      => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array('px', 'em'),
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
		'default' => array(
			'unit' => 'px',
			'size' => 16,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs(
	'close_icon_styling'
);
$this->start_controls_tab(
	'close_icon_styling_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'item_styling_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'icon_color_hover',
	array(
		'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_list_item_text' => 'color: {{VALUE}}; transition: all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
// End Style Tab.