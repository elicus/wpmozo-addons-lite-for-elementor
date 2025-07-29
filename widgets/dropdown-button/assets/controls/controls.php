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
use Elementor\Repeater;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;

// Content.
$this->start_controls_section(
	'dropdown_items_section',
	array(
		'label' => esc_html__( 'Dropdown Items', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();

	$repeater->add_control(
		'dropdown_item_text',
		array(
			'label'       => esc_html__( 'Item Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Item Text', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$repeater->add_control(
		'dropdown_item_url',
		array(
			'label'       => esc_html__( 'Item Url', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::URL,
			'options'     => array( 'url', 'is_external', 'nofollow' ),
			'default'     => array(
				'url'         => '',
				'is_external' => true,
				'nofollow'    => true,
			),
			'label_block' => true,
		)
	);
	$repeater->add_control(
		'dropdown_link_target',
		array(
			'label'       => esc_html__( 'Link Target', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'_blank' => esc_html__( 'In New Tab', 'wpmozo-addons-lite-for-elementor' ),
				'_self'  => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => '_self',
		)
	);
	$repeater->add_control(
		'background_heading',
		array(
			'label'     => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$repeater->add_group_control(
		Group_Control_Background::get_type(),
		array(
			'name'           => 'dropdown_item_background',
			'types'          => array( 'classic', 'gradient' ),
			'fields_options' => array(
				'background' => array(
					'label'   => esc_html__( 'Item Background', 'wpmozo-addons-lite-for-elementor' ),
					'default' => 'classic',
				),
			),
			'toggle'         => false,
			'selector'       => '{{WRAPPER}} .wpmozo_dropdown_button .wpmozo_dropdown_button_item{{CURRENT_ITEM}} a',
		)
	);
	$this->add_control(
		'dropdown_items_content',
		array(
			'label'       => esc_html__( 'Dropdown Item', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => array(
				array(
					'dropdown_item_text' => esc_html__( 'Item Text', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'title_field' => '{{{ dropdown_item_text }}}',
		)
	);
	$this->end_controls_section();
	// Display.
	$this->start_controls_section(
		'display_section',
		array(
			'label' => __( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'button_text',
		array(
			'label'       => esc_html__( 'Button Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Click here', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$this->add_control(
		'trigger_action',
		array(
			'label'       => esc_html__( 'Trigger Action', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 'click',
			'options'     => array(
				'hover' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				'click'      => esc_html__( 'Click', 'wpmozo-addons-lite-for-elementor' ),
			),
			'render_type' => 'template',
		)
	);
	$this->add_control(
		'dropdown_direction',
		array(
			'label'       => esc_html__( 'Dropdown Direction', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 'bottom',
			'options'     => array(
				'bottom'     => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
				'top'        => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'left'       => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'right'      => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);
	$this->end_controls_section();
	// General styling tab.
	$this->start_controls_section(
		'button_style_section',
		array(
			'label' => esc_html__( 'Dropdown Button', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .wpmozo_dropdown_button_wrap' => 'text-align: {{VALUE}};',
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
		'dropdown_menu_section',
		array(
			'label' => esc_html__( 'Dropdown Menu', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'dropdown_min_width',
		array(
			'label'      => esc_html__( 'Dropdown Min Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'separator'  => 'after',
			'range'      => array(
				'px' => array(
					'min' => 10,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 180,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_dropdown_menu_items' => 'width: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'dropdown_padding',
		array(
			'label'      => esc_html__( 'Dropdown Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array(
				'top'      => 5,
				'right'    => 0,
				'bottom'   => 5,
				'left'     => 0,
				'unit'     => 'px',
				'isLinked' => false,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_dropdown_menu_items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_control(
		'dropdown_background',
		array(
			'label'     => esc_html__( 'Dropdown Background', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_menu_items' => 'background-color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->start_controls_tabs( 'dropdown_menu_tabs' );
	$this->start_controls_tab(
		'dropdown_menu_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => 'dropdown_menu_border',
			'selector'       => '{{WRAPPER}} .wpmozo_dropdown_menu_items',
			'fields_options' => array(
				'border' => array( 'label' => esc_html__( 'Dropdown Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
				'width'  => array( 'label' => esc_html__( 'Dropdown Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
				'color'  => array( 'label' => esc_html__( 'Dropdown Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
			),
		)
	);
	$this->add_responsive_control(
		'dropdown_menu_border_radius',
		array(
			'label'       => esc_html__( 'Dropdown Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::DIMENSIONS,
			'label_block' => true,
			'size_units'  => array( 'px', 'em', '%' ),
			'separator'   => 'after',
			'selectors'   => array(
				'{{WRAPPER}} .wpmozo_dropdown_menu_items' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'dropdown_menu_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => 'dropdown_menu_border_hover',
			'selector'       => '{{WRAPPER}} .wpmozo_dropdown_menu_items:hover',
			'fields_options' => array(
				'border' => array( 'label' => esc_html__( 'Dropdown Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
				'width'  => array( 'label' => esc_html__( 'Dropdown Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
				'color'  => array( 'label' => esc_html__( 'Dropdown Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
			),
		)
	);
	$this->add_responsive_control(
		'dropdown_menu_border_radius_hover',
		array(
			'label'       => esc_html__( 'Dropdown Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::DIMENSIONS,
			'label_block' => true,
			'size_units'  => array( 'px', 'em', '%' ),
			'separator'   => 'after',
			'selectors'   => array(
				'{{WRAPPER}} .wpmozo_dropdown_menu_items:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'name'           => 'dropdown_box_shadow',
			'selector'       => '{{WRAPPER}} .wpmozo_dropdown_menu_items',
			'fields_options' => array(
				'box_shadow_type' => array(
					'label' => esc_html__( 'Dropdown Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'dropdown_link_text_section',
		array(
			'label' => esc_html__( 'Dropdown Link Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'dropdown_link_text_alignment',
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
			'default'     => 'left',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_button .wpmozo_dropdown_button_item' => 'text-align: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'dropdown_link_text_tabs'
	);
	$this->start_controls_tab(
		'dropdown_link_text_normal_tabs',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'link_text_typography',
			'label'    => esc_html__( 'Link Text Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_dropdown_button_item a',
		)
	);
	$this->add_responsive_control(
		'link_text_size',
		array(
			'label'     => esc_html__( 'Link Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_button_item a' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'link_text_color',
		array(
			'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_button_item a' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'dropdown_link_text_hover_tabs',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'link_text_typography_hover',
			'label'    => esc_html__( 'Link Text Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_dropdown_button_item a:hover',
		)
	);
	$this->add_responsive_control(
		'link_text_size_hover',
		array(
			'label'     => esc_html__( 'Link Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_button_item a:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'link_text_color_hover',
		array(
			'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_dropdown_button_item a:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'link_text_shadow',
			'label'    => esc_html__( 'Link Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_dropdown_button_item a',
		)
	);
	$this->end_controls_section();