<?php
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

// content section starts here.
$this->start_controls_section(
	'content_section',
	array(
		'label' => __( 'Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();
$repeater->add_control(
	'content_heading',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::HEADING,
	)
);
$repeater->add_control(
	'item_title',
	array(
		'label'       => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__( 'Type your title here', 'wpmozo-addons-for-elementor' ),
	)
);
$repeater->add_control(
	'item_description',
	array(
		'label'       => esc_html__( 'Description', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXTAREA,
		'rows'        => 10,
		'placeholder' => esc_html__( 'Type your description here', 'wpmozo-addons-for-elementor' ),
	)
);

$repeater->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'     => 'item_background',
		'types'    => array( 'classic', 'gradient' ),
		'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} + .wpmozo_background_switcher_image',
	)
);
$repeater->add_control(
	'button_heading',
	array(
		'label'     => esc_html__( 'Button', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
	)
);
$repeater->add_control(
	'show_button',
	array(
		'label'        => esc_html__( 'Show Button', 'wpmozo-addons-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
		'return_value' => 'yes',
	)
);
$repeater->add_control(
	'button_text',
	array(
		'label'       => esc_html__( 'Button Text', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'default'     => esc_html__( 'View More', 'wpmozo-addons-for-elementor' ),
		'condition'   => array(
			'show_button' => 'yes',
		),
	)
);
$repeater->add_control(
	'button_url',
	array(
		'label'         => esc_html__( 'Button Url', 'wpmozo-addons-for-elementor' ),
		'type'          => Controls_Manager::URL,
		'placeholder'   => esc_html__( 'Enter url', 'wpmozo-addons-for-elementor' ),
		'show_external' => true,
		'default'       => array(
			'url'         => '#',
			'is_external' => true,
			'nofollow'    => true,
		),
		'condition'     => array(
			'show_button' => 'yes',
		),
	)
);

$this->add_control(
	'background_item',
	array(
		'label'       => __( 'Add New Background Item', 'wpmozo-addons-for-elementor' ),
		'type'        => Controls_Manager::REPEATER,
		'fields'      => $repeater->get_controls(),
		'title_field' => '{{{ item_title }}}',

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
$this->add_responsive_control(
	'switcher_orientation',
	array(
		'label'       => __( 'Switcher Orientation', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'row'    => esc_html__( 'Horizontal', 'wpmozo-addons-for-elementor' ),
			'column' => esc_html__( 'Vertical', 'wpmozo-addons-for-elementor' ),
		),
		'default'     => 'row',
		'render_type' => 'template',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_background_switcher_inner' => 'flex-direction: {{VALUE}};',
		),
	)
);

$this->add_responsive_control(
	'content_vertical_align',
	array(
		'label'       => __( 'Content Vertical Align', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'flex-start' => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
			'center'     => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
			'flex-end'   => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor' ),
		),
		'default'     => 'flex-end',
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_item_wrap' => 'justify-content: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'item_height',
	array(
		'label'          => esc_html__( 'Item Height', 'wpmozo-addons-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 1,
				'max'  => 991,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 350,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 350,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 350,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'separator'      => 'before',
		'selectors'      => array(
			'{{WRAPPER}} .wpmozo_background_switcher_item' => 'height: {{SIZE}}{{UNIT}}; min-height:{{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'overlay_background',
	array(
		'label'       => esc_html__( 'Overlay Background', 'wpmozo-addons-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::COLOR,
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_background_switcher_image::after, {{WRAPPER}} .wpmozo_background_switcher_item:hover .wpmozo_background_switcher_image::after' => 'background-color: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'blur_on_hover',
	array(
		'label'     => esc_html__( 'Blur on Hover', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		),
		'default'   => array(
			'unit' => 'px',
			'size' => 5,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_background_switcher_item:hover' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
		),
	)
);
$this->add_responsive_control(
	'transition_duration',
	array(
		'type'      => Controls_Manager::SLIDER,
		'label'     => esc_html__( 'Transition Duration(ms)', 'wpmozo-addons-for-elementor' ),
		'range'     => array(
			'ms' => array(
				'min'  => 0,
				'max'  => 1000,
				'step' => 1,
			),
		),
		'render_type' => 'template',
		'default'   => array(
			'size' => 300,
			'unit' => 'ms',
		),
		'selectors' => array(
			' {{WRAPPER}} .wpmozo_background_switcher_image' => 'transition: all {{SIZE}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'switcher_text_tab',
	array(
		'label' => esc_html__( 'Switcher Text', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'title_heading',
	array(
		'label' => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
		'type'  => Controls_Manager::HEADING,
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
		'default'   => '#ffffff',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_title:hover' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_title:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Title Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'title_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_title:hover',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_control(
	'description_heading',
	array(
		'label'     => esc_html__( 'Description', 'wpmozo-addons-for-elementor' ),
		'type'      => Controls_Manager::HEADING,
		'separator' => 'before',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_desc' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_desc' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_desc',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow',
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_desc',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_desc:hover' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_desc:hover' => 'font-size: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_desc:hover',
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-for-elementor' ),
		'label_block' => true,
		'name'        => 'description_text_shadow_hover',
		'selector'    => '{{WRAPPER}} .wpmozo_bg_switcher_desc:hover',
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
			'{{WRAPPER}} .wpmozo_bg_switcher_desc' => 'text-align: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'button_style',
	array(
		'label' => esc_html__( 'Button', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .wpmozo_read_more_button_wrapper' => 'text-align: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button' => 'flex-flow:{{VALUE}}; gap:5px;',
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
			'{{WRAPPER}}.icon_row-reverse .wpmozo_read_more_button_wrapper .wpmozo_read_more_button .wpmozo_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_read_more_button_wrapper .wpmozo_read_more_button svg'              => 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}}.icon_row-reverse .wpmozo_read_more_button_wrapper .wpmozo_read_more_button:hover .wpmozo_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_read_more_button_wrapper .wpmozo_read_more_button:hover svg'  => 'opacity: 1; margin-right:0;',
			'{{WRAPPER}}.icon_row .wpmozo_read_more_button_wrapper .wpmozo_read_more_button .wpmozo_button_icon, {{WRAPPER}}.icon_row .wpmozo_read_more_button_wrapper .wpmozo_read_more_button svg'                              => 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}}.icon_row .wpmozo_read_more_button_wrapper .wpmozo_read_more_button:hover .wpmozo_button_icon, {{WRAPPER}}.icon_row .wpmozo_read_more_button_wrapper .wpmozo_read_more_button:hover svg'                  => 'opacity: 1; margin-left:0;',
			'{{WRAPPER}} .wpmozo_read_more_button_wrapper .wpmozo_read_more_button .wpmozo_button_icon'                                                                                                                           => ' min-width:{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .wpmozo_read_more_button_wrapper .wpmozo_read_more_button'                                                                                                                                               => 'gap:0px;',
			'{{WRAPPER}} .wpmozo_read_more_button_wrapper .wpmozo_read_more_button:hover'                                                                                                                                         => 'gap:5px;',

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
		'selector'    => '{{WRAPPER}} .wpmozo_read_more_button',
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
			'{{WRAPPER}} .wpmozo_read_more_button'     => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_read_more_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button' => 'color: {{VALUE}}; transition: 300ms;',
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
		'selector'       => '{{WRAPPER}} .wpmozo_read_more_button',
	)
);
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'     => 'button_border',
		'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_read_more_button',

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
			'{{WRAPPER}} .wpmozo_read_more_button' => 'border-radius: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_read_more_button',
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
			'{{WRAPPER}} .wpmozo_read_more_button svg' => 'fill: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_read_more_button i'   => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_read_more_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button:hover' => 'color: {{VALUE}};',
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
		'selector'       => '{{WRAPPER}} .wpmozo_read_more_button:hover',
	)
);
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'     => 'button_border_hover',
		'label'    => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_read_more_button:hover',

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
			'{{WRAPPER}} .wpmozo_read_more_button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_read_more_button:hover',
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
			'{{WRAPPER}} .wpmozo_read_more_button:hover svg' => 'fill: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_read_more_button:hover i' => 'color: {{VALUE}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_read_more_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
