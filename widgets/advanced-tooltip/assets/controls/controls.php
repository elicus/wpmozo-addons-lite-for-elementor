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
use Elementor\Utils;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;

// Content.
$this->start_controls_section(
	'card_items_section',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'trigger_action',
	array(
		'label'       => esc_html__( 'Trigger Action', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'mouseenter',
		'options'     => array(
			'mouseenter' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			'click' => esc_html__( 'Click', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->add_control(
	'trigger_element_type',
	array(
		'label'     => esc_html__( 'Trigger Element', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'button',
		'options'   => array(
			'button'            => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
			'image'             => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'icon'              => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'text'              => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'id'    => esc_html__( 'Element CSS ID', 'wpmozo-addons-lite-for-elementor' ),
			'class' => esc_html__( 'Element CSS Class', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	'trigger_button_text',
	array(
		'label'       => esc_html__( 'Trigger Button Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'default'     => 'Read More',
		'condition'   => array(
			'trigger_element_type' => 'button',
		),
	)
);
$this->add_control(
	'trigger_button_link_url',
	array(
		'label'       => esc_html__( 'Trigger Button Link Url', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::URL,
		'options'     => array( 'url', 'is_external', 'nofollow' ),
		'default'     => array(
			'url'         => '',
			'is_external' => true,
			'nofollow'    => true,
		),
		'label_block' => true,
		'condition'   => array(
			'trigger_element_type' => 'button',
		),
	)
);
$this->add_control(
	'trigger_button_link_target',
	array(
		'label'       => esc_html__( 'Trigger Button Link Target', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'_blank' => esc_html__( 'In New Tab', 'wpmozo-addons-lite-for-elementor' ),
			'_self'  => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default'     => '_self',
		'condition'   => array(
			'trigger_element_type' => 'button',
		),
	)
);
$this->add_control(
	'trigger_image',
	array(
		'label'     => esc_html__( 'Trigger Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::MEDIA,
		'default'   => array(
			'url' => Utils::get_placeholder_image_src(),
		),
		'condition' => array(
			'trigger_element_type' => 'image',
		),
	)
);
$this->add_control(
	'trigger_image_alt_tag',
	array(
		'label'       => esc_html__( 'Trigger Image Alt Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'condition'   => array(
			'trigger_element_type' => 'image',
		),
	)
);
$this->add_responsive_control(
	'trigger_icon',
	array(
		'label'     => esc_html__( 'Trigger Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::ICONS,
		'default'   => array(
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		),
		'condition'   => array(
			'trigger_element_type' => 'icon',
		),
	)
);
$this->add_control( 
	'trigger_text',
	array( 
		'label'       => esc_html__( 'Trigger Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXTAREA,
		'label_block' => true,
		'placeholder' => esc_html__( 'Enter Content Here', 'wpmozo-addons-lite-for-elementor' ),
		'show_label'  => true,
		'dynamic'     => array( 'active' => true ),
		'default'     => 'Your content goes here. Edit this text inline or in the widget Content settings. You can also style every aspect of this content in the widget Design settings.',
		'condition'   => array(
			'trigger_element_type' => 'text',
		),
	 )
 );
 $this->add_control(
	 'trigger_selector_id',
	 array(
		 'label'       => esc_html__( 'Trigger Selector ID', 'wpmozo-addons-lite-for-elementor' ),
		 'type'        => Controls_Manager::TEXT,
		 'label_block' => true,
		 'condition'   => array(
			 'trigger_element_type' => 'id',
		 ),
	 )
 );
 $this->add_control(
	 'trigger_selector_class',
	 array(
		 'label'       => esc_html__( 'Trigger Selector Class', 'wpmozo-addons-lite-for-elementor' ),
		 'type'        => Controls_Manager::TEXT,
		 'label_block' => true,
		 'condition'   => array(
			 'trigger_element_type' => 'class',
		 ),
	 )
 );
$this->end_controls_section();
// Content.
$this->start_controls_section(
	'content_section',
	array(
		'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'tooltip_content_type',
	array(
		'label'       => esc_html__( 'Tooltip Content Type', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::SELECT,
		'default'     => 'text',
		'options'     => array(
			'text' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'image' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'el_library_layout' => esc_html__( 'Elementor Library Layout', 'wpmozo-addons-lite-for-elementor' ),
		),
		'render_type' => 'template',
	)
);
$this->add_control(
	'content_type_text',
	array(
		'label'       => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::WYSIWYG,
		'label_block' => true,
		'default'     => esc_html__( 'This Is Dummy Content', 'wpmozo-addons-lite-for-elementor' ),
		'placeholder' => esc_html__( 'Body Content', 'wpmozo-addons-lite-for-elementor' ),
		'condition'   => array(
			'tooltip_content_type' => 'text',
		),
	)
);
$this->add_control(
	'content_type_image',
	array(
		'label'     => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::MEDIA,
		'default'   => array(
			'url' => Utils::get_placeholder_image_src(),
		),
		'condition' => array(
			'tooltip_content_type' => 'image',
		),
	)
);
$this->add_control(
	'content_type_image_alt_tag',
	array(
		'label'       => esc_html__( 'Image Alternative Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'condition'   => array(
			'tooltip_content_type' => 'image',
		),
	)
);
$this->add_control(
	'content_type_elementor_layout',
	array(
		'label'     => __( 'Select Layout', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => '0', // Set the default value as needed.
		'options'   => wpmozo_ae_get_elementor_templates_as_options(), // Function to fetch Elementor library templates.
		'condition' => array(
			'tooltip_content_type' => 'el_library_layout',
		),
	)
);
$this->end_controls_section();
// Styling Tab.
$this->start_controls_section(
	'button_style_section',
	array(
		'label' => esc_html__( 'Trigger Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
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
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper' => 'text-align: {{VALUE}};',
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
		'default'      => 'no',
	)
);
$this->add_responsive_control(
	'show_button_icon',
	array(
		'label'        => esc_html__( 'Show Button Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'no',
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
			'show_button_icon' => 'yes',
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
				'title' => esc_html__( 'After', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  => 'eicon-angle-right',
			),
		),
		'render_type'  => 'template',
		'default'      => 'row-reverse',
		'prefix_class' => 'icon_',
		'toggle'       => false,
		'selectors'    => array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'flex-flow:{{VALUE}}; gap:5px;',
		),
		'condition'    => array(
			'button_custom_style' => 'yes',
			'show_button_icon' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'show_button_icon_on_hover',
	array(
		'label'        => esc_html__( 'Only Show Icon On Hover For Button', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
		'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => '',
		'selectors'    => array(
			'{{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg'              => 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg'  => 'opacity: 1; margin-right:0;',
			'{{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg'                              => 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg'                  => 'opacity: 1; margin-left:0;',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon'                                                                                                                           => ' min-width:{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button'                                                                                                                                               => 'gap:0px;',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover'                                                                                                                                         => 'gap:5px;',

		),
		'condition'    => array(
			'button_custom_style' => 'yes',
			'show_button_icon' => 'yes',
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
		'selector'    => '{{WRAPPER}} .wpmozo_readmore_button',
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
			'{{WRAPPER}} .wpmozo_readmore_button'       => 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_readmore_button svg'   => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_readmore_button' => 'color: {{VALUE}}; transition: 300ms;',
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
		'selector'       => '{{WRAPPER}} .wpmozo_readmore_button',
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
			'size' => 2,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'border: {{SIZE}}{{UNIT}} solid;',
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
			'{{WRAPPER}} .wpmozo_readmore_button'   => 'border-color: {{VALUE}}; transition: 300ms;',
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
			'{{WRAPPER}} .wpmozo_readmore_button' => 'border-radius: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_readmore_button',
	)
);
$this->add_responsive_control(
	'button_icon_color',
	array(
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button svg'   => 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_readmore_button i'     => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_margin',
	array(
		'label'      => esc_html__( 'Button Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'      => 15,
			'right'    => 0,
			'bottom'   => 2,
			'left'     => 0,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'top'      => 10,
			'right'    => 20,
			'bottom'   => 10,
			'left'     => 20,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_readmore_button:hover'     => 'font-size: {{SIZE}}{{UNIT}}',
			'{{WRAPPER}} .wpmozo_readmore_button svg:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
			'{{WRAPPER}} .wpmozo_readmore_button:hover'     => 'color: {{VALUE}}; transition: 300ms;',
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
		'selector'       => '{{WRAPPER}} .wpmozo_readmore_button:hover',
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
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
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
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border-color: {{VALUE}}; transition: 300ms;',
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
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
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
		'selector'    => '{{WRAPPER}} .wpmozo_readmore_button:hover',
	)
);
$this->add_responsive_control(
	'button_icon_color_hover',
	array(
		'label'     => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes',
			'show_button_icon' => 'yes',
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover svg' => 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_readmore_button:hover i'   => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_margin_hover',
	array(
		'label'      => esc_html__( 'Button Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding_hover',
	array(
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'condition'  => array(
			'button_custom_style' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'trigger_image_section',
	array(
		'label' => esc_html__( 'Trigger Image', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition'  => array(
			'trigger_element_type' => 'image',
		),
	)
);
$this->add_responsive_control(
	'trigger_image_width',
	array(
		'label'      => esc_html__( 'Trigger Image Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( '%' ),
		'range'      => array(
			'%' => array(
				'min' => 1,
				'max' => 100
			)
		),
		'default'=> array( 'unit'=>'%' ),
		'selectors'  => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_image'  => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'trigger_icon_section',
	array(
		'label' => esc_html__( 'Trigger Icon', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition'  => array(
			'trigger_element_type' => 'icon',
		),
	)
);
$this->add_responsive_control(
	'trigger_icon_size',
	array(
		'label'      => esc_html__( 'Trigger Icon Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px', 'em' ),
		'separator'  => 'after',
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
			'size' => 30,
		),
		'selectors'  => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon span.dipl_tooltip_trigger_icon'  => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon svg.dipl_tooltip_trigger_icon'   => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->start_controls_tabs( 'trigger_icon_styling_tabs' );
$this->start_controls_tab(
	'trigger_icon_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'trigger_icon_color',
	array(
		'label'     => esc_html__( 'Trigger Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon svg'   => 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon i'     => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'trigger_icon_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'trigger_icon_color_hover',
	array(
		'label'     => esc_html__( 'Trigger Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon svg:hover'   => 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .dipl_tooltip_trigger_element_wrap.trigger_type_icon i:hover'     => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'trigger_text_section',
	array(
		'label' => esc_html__( 'Trigger Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition'  => array(
			'trigger_element_type' => 'text',
		),
	)
);
$this->add_responsive_control(
	'trigger_text_alignment',
	array(
		'label'     => esc_html__( 'Trigger Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'separator' => 'after',
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
			'{{WRAPPER}} .trigger_type_text' => 'text-align: {{VALUE}};',
		),
	)
);
$this->start_controls_tabs(
	'trigger_text_tabs'
);
$this->start_controls_tab(
	'trigger_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'trigger_text_typography',
		'label'    => esc_html__( 'Trigger Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .dipl_tooltip_trigger_text',
	)
);
$this->add_responsive_control(
	'trigger_text_size',
	array(
		'label'     => esc_html__( 'Trigger Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_text' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'trigger_text_color',
	array(
		'label'     => esc_html__( 'Trigger Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_text' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'trigger_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'trigger_text_typography_hover',
		'label'    => esc_html__( 'Trigger Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .dipl_tooltip_trigger_text:hover',
	)
);
$this->add_responsive_control(
	'trigger_text_size_hover',
	array(
		'label'     => esc_html__( 'Trigger Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_text:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'trigger_text_color_hover',
	array(
		'label'     => esc_html__( 'Trigger Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .dipl_tooltip_trigger_text:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'trigger_text_shadow',
		'label'    => esc_html__( 'Trigger Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .dipl_tooltip_trigger_text',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'tooltip_styling_section',
	array(
		'label' => esc_html__( 'Tooltip Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'entrance_animation',
	array(
		'label'     => esc_html__( 'Entrance Animation', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SELECT,
		'default'   => 'fade',
		'options'   => array(
			'fade'        		 	=> esc_html__( 'Fade', 'wpmozo-addons-lite-for-elementor' ),
			'scale'       			=> esc_html__( 'Scale', 'wpmozo-addons-lite-for-elementor' ),
			'scale-subtle'  		=> esc_html__( 'Scale Subtle', 'wpmozo-addons-lite-for-elementor' ),
			'scale-extreme' 		=> esc_html__( 'Scale Extreme', 'wpmozo-addons-lite-for-elementor' ),
			'shift-away'         	=> esc_html__( 'Shift Away', 'wpmozo-addons-lite-for-elementor' ),
			'shift-away-subtle'  	=> esc_html__( 'Shift Away Subtle', 'wpmozo-addons-lite-for-elementor' ),
			'shift-away-extreme' 	=> esc_html__( 'Shift Away Extreme', 'wpmozo-addons-lite-for-elementor' ),
			'shift-toward'         	=> esc_html__( 'Shift Toward', 'wpmozo-addons-lite-for-elementor' ),
			'shift-toward-subtle'  	=> esc_html__( 'Shift Toward Subtle', 'wpmozo-addons-lite-for-elementor' ),
			'shift-toward-extreme' 	=> esc_html__( 'Shift Toward Extreme', 'wpmozo-addons-lite-for-elementor' ),
			'perspective' 			=> esc_html__( 'Perspective', 'wpmozo-addons-lite-for-elementor' ),
			'perspective-subtle'  	=> esc_html__( 'Perspective Subtle', 'wpmozo-addons-lite-for-elementor' ),
			'perspective-extreme' 	=> esc_html__( 'Perspective Extreme', 'wpmozo-addons-lite-for-elementor' ),
		),
	)
);
$this->add_control(
	'animation_duration',
	array(
		'type'    => Controls_Manager::SLIDER,
		'label'   => esc_html__( 'Animation Duration ( ms )', 'wpmozo-addons-lite-for-elementor' ),
		'range'   => array(
			'ms' => array(
				'min'  => 0,
				'max'  => 5000,
				'step' => 1,
			),
		),
		'default' => array(
			'size' => 400,
			'unit' => 'ms',
		),
	)
);
$this->add_control(
	'show_speech_bubble',
	array(
		'label'        => esc_html__( 'Show Speech Bubble', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->add_control(
	'make_interactive_tooltip',
	array(
		'label'        => esc_html__( 'Make Interactive Tooltip', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' => 'yes',
		'default'      => 'yes',
	)
);
$this->add_responsive_control(
	'tooltip_width',
	array(
		'label'      => esc_html__( 'Tooltip Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 1,
				'max' => 1000,
			),
		),
		'default'    => array(
			'unit' => 'px',
			'size' => 350,
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards .layout-horizontal .wpmozo_scroll_stack_cards_item' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'tooltip_padding',
	array(
		'label'      => esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'top'      => 20,
			'right'    => 20,
			'bottom'   => 20,
			'left'     => 20,
			'unit'     => 'px',
			'isLinked' => false,
		),
		'selectors'  => array(
			'{{WRAPPER}} ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'tooltip_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Tooltip Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'condition'      => array(
			'button_custom_style' => 'yes',
		),
		'selector'       => '{{WRAPPER}} .wpmozo_readmore_button',
	)
);
$this->start_controls_tabs( 'tooltip_styling_tabs' );
$this->start_controls_tab(
	'tooltip_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'tooltip_border',
		'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Tooltip Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Tooltip Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Tooltip Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'tooltip_border_radius',
	array(
		'label'       => esc_html__( 'Tooltip Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator' => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'tooltip_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'tooltip_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Tooltip Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Tooltip Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Tooltip Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
		'separator' => 'none',
	)
);
$this->add_responsive_control(
	'tooltip_border_radius_hover',
	array(
		'label'       => esc_html__( 'Tooltip Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'separator' => 'after',
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'tooltip_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper',
		'fields_options' => array(
			'box_shadow_type' => array(
				'label' => esc_html__( 'Tooltip Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'tooltip_content_text_section',
	array(
		'label' => esc_html__( 'Tooltip Content Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'tooltip_content_text_alignment',
	array(
		'label'     => esc_html__( 'Tooltip Content Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::CHOOSE,
		'separator' => 'after',
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
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->start_controls_tabs(
	'tooltip_content_text_tabs'
);
$this->start_controls_tab(
	'tooltip_content_text_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'tooltip_content_text_typography',
		'label'    => esc_html__( 'Tooltip Content Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title',
	)
);
$this->add_responsive_control(
	'tooltip_content_text_size',
	array(
		'label'     => esc_html__( 'Tooltip Content Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_title' => 'font-size: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'tooltip_content_text_color',
	array(
		'label'     => esc_html__( 'Tooltip Content Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_title' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'tooltip_content_text_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'tooltip_content_text_typography_hover',
		'label'    => esc_html__( 'Tooltip Content Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'exclude'  => array( 'font_size' ),
		'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover',
	)
);
$this->add_responsive_control(
	'tooltip_content_text_size_hover',
	array(
		'label'     => esc_html__( 'Tooltip Content Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::SLIDER,
		'range'     => array(
			'px' => array(
				'min'  => 1,
				'max'  => 100,
				'step' => 1,
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
		),
	)
);
$this->add_responsive_control(
	'tooltip_content_text_color_hover',
	array(
		'label'     => esc_html__( 'Tooltip Content Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'separator' => 'after',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover' => 'color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'     => 'tooltip_content_text_shadow',
		'label'    => esc_html__( 'Tooltip Content Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title',
	)
);
$this->end_controls_section();