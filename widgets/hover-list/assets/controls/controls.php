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
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();

	$repeater->add_responsive_control(
		'item_title',
		array(
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$repeater->add_responsive_control(
		'item_subtitle',
		array(
			'label'       => esc_html__( 'Subtitle', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Subtitle', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$repeater->add_responsive_control(
		'item_description',
		array(
			'label'       => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'rows'        => 10,
			'default'     => esc_html__( 'Default Description', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Type your description here', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$repeater->add_control(
		'item_image',
		array(
			'label'   => esc_html__( 'Hover Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array(
				'url' => Utils::get_placeholder_image_src(),
				'id'  => 'thisistheimage',
			),
		)
	);
	$repeater->add_control(
		'icon_heading',
		array(
			'label'     => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$repeater->add_control(
		'show_icon',
		array(
			'label'        => esc_html__( 'Show Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => '',
			'return_value' => 'yes',
		)
	);
	$repeater->add_responsive_control(
		'item_icon',
		array(
			'label'     => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array(
				'value'   => 'far fa-star',
				'library' => 'fa-regular',
			),
			'condition' => array(
				'show_icon' => 'yes',
			),
		)
	);
	$repeater->add_control(
		'button_heading',
		array(
			'label'     => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$repeater->add_control(
		'show_button',
		array(
			'label'        => esc_html__( 'Show Button', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => '',
			'return_value' => 'yes',
		)
	);
	$repeater->add_control(
		'button_text',
		array(
			'label'       => esc_html__( 'Button Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => 'Read More',
			'condition'   => array(
				'show_button' => 'yes',
			),
		)
	);
	$repeater->add_control(
		'button_link_url',
		array(
			'label'       => esc_html__( 'Button Link Url', 'wpmozo-addons-lite-for-elementor' ),
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
	$repeater->add_control(
		'button_link_target',
		array(
			'label'       => esc_html__( 'Button Link Target', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'_blank' => esc_html__( 'In New Tab', 'wpmozo-addons-lite-for-elementor' ),
				'_self'  => esc_html__( 'In The Same Window', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => '_self',
			'condition'   => array( 'show_button' => 'yes' ),
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
			'name'           => 'item_background',
			'types'          => array( 'classic', 'gradient' ),
			'fields_options' => array(
				'background' => array(
					'label'   => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'default' => 'classic',
				),
			),
			'toggle'         => false,
			'selector'       => '{{WRAPPER}} .dipl_hover_list .dipl_hover_list_item{{CURRENT_ITEM}}',
		)
	);
	$this->add_control(
		'wpmozo_items_content',
		array(
			'label'       => esc_html__( 'Hover List Item', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => array(
				array(
					'item_title' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'title_field' => '{{{ item_title }}}',
		)
	);
	$this->end_controls_section();

	// General styling tab.
	$this->start_controls_section(
		'title_section',
		array(
			'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_control(
		'title_heading_level',
		array(
			'label'       => esc_html__( 'Title Heading Level', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::CHOOSE,
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
			'default'     => 'h2',
			'toggle'      => true,
		)
	);
	$this->add_responsive_control(
		'title_width',
		array(
			'label'      => esc_html__( 'Title Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%' ),
			'range'      => array(
				'%' => array(
					'min' => 1,
					'max' => 100,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 20,
			),
			'selectors'  => array(
				'{{WRAPPER}} .dipl_hover_list_title_wrapper' => 'flex: 0 0 {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'title_alignment',
		array(
			'label'     => esc_html__( 'Title Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::CHOOSE,
			'separator' => 'after',
			'options'   => array(
				'start'   => array(
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array(
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				),
				'end'  => array(
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_title_wrapper' => 'justify-content: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'title_tabs'
	);
	$this->start_controls_tab(
		'title_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_title',
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
				'{{WRAPPER}} .dipl_hover_list_title' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'title_color',
		array(
			'label'     => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_title' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'title_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'title_typography_hover',
			'label'    => esc_html__( 'Title Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_title:hover',
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
				'{{WRAPPER}} .dipl_hover_list_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'title_color_hover',
		array(
			'label'     => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_title:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'title_text_shadow',
			'label'    => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_title',
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'subtitle_section',
		array(
			'label' => esc_html__( 'Subtitle Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'subtitle_alignment',
		array(
			'label'     => esc_html__( 'Subtitle Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .dipl_hover_list_subtitle' => 'text-align: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'subtitle_tabs'
	);
	$this->start_controls_tab(
		'subtitle_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'subtitle_typography',
			'label'    => esc_html__( 'Subtitle Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_subtitle',
		)
	);
	$this->add_responsive_control(
		'subtitle_text_size',
		array(
			'label'     => esc_html__( 'Subtitle Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_subtitle' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'subtitle_color',
		array(
			'label'     => esc_html__( 'Subtitle Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_subtitle' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'subtitle_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'subtitle_typography_hover',
			'label'    => esc_html__( 'Sub Title Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_subtitle:hover',
		)
	);
	$this->add_responsive_control(
		'subtitle_text_size_hover',
		array(
			'label'     => esc_html__( 'Subtitle Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_subtitle:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'subtitle_color_hover',
		array(
			'label'     => esc_html__( 'Subtitle Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_subtitle:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'subtitle_text_shadow',
			'label'    => esc_html__( 'Subtitle Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_subtitle',
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'description_section',
		array(
			'label' => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'description_width',
		array(
			'label'      => esc_html__( 'Description Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%' ),
			'range'      => array(
				'%' => array(
					'min' => 1,
					'max' => 100,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 40,
			),
			'selectors'  => array(
				'{{WRAPPER}} .dipl_hover_list_description' => 'flex: 0 0 {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_padding',
		array(
			'label'      => esc_html__( 'Description Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array(
				'top'      => 0,
				'right'    => 10,
				'bottom'   => 0,
				'left'     => 10,
				'unit'     => 'px',
				'isLinked' => false,
			),
			'selectors'  => array(
				'{{WRAPPER}} .dipl_hover_list_description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'description_alignment',
		array(
			'label'     => esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .dipl_hover_list_description' => 'text-align: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'description_tabs'
	);
	$this->start_controls_tab(
		'description_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'description_typography',
			'label'    => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_description',
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
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_description' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'description_color',
		array(
			'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_description' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'description_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'description_typography_hover',
			'label'    => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_description:hover',
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
				'{{WRAPPER}} .dipl_hover_list_description:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'description_color_hover',
		array(
			'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_description:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'description_text_shadow',
			'label'    => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .dipl_hover_list_description',
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'icon_section',
		array(
			'label' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'icon_size',
		array(
			'label'      => esc_html__( 'Icon Size', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .dipl_hover_list_title_wrapper span.dipl_hover_list_icon'  => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
				'{{WRAPPER}} .dipl_hover_list_title_wrapper svg.dipl_hover_list_icon'   => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->start_controls_tabs( 'tag_styling_tabs' );
	$this->start_controls_tab(
		'icon_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'icon_color',
		array(
			'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_title_wrapper svg'   => 'fill: {{VALUE}}; transition: 300ms;',
				'{{WRAPPER}} .dipl_hover_list_title_wrapper span'     => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'icon_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'icon_color_hover',
		array(
			'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .dipl_hover_list_title_wrapper svg:hover'   => 'fill: {{VALUE}}; transition: 300ms;',
				'{{WRAPPER}} .dipl_hover_list_title_wrapper span:hover'     => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'image_section',
		array(
			'label' => esc_html__( 'Hover Image', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'image_padding',
		array(
			'label'      => esc_html__( 'Image Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'image_size',
		array(
			'label'      => esc_html__( 'Image Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 10,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 400,
			),
			'selectors'  => array(
				'{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor' => 'width:{{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->start_controls_tabs( 'image_styling_tabs' );
	$this->start_controls_tab(
		'image_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => 'image_border',
			'selector'       => '{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor',
			'fields_options' => array(
				'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
				'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
				'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
			),
		)
	);
	$this->add_responsive_control(
		'image_border_radius',
		array(
			'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::DIMENSIONS,
			'label_block' => true,
			'size_units'  => array( 'px', 'em', '%' ),
			'separator'   => 'after',
			'selectors'   => array(
				'{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'image_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'           => 'image_hover_border',
			'selector'       => '{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor:hover',
			'fields_options' => array(
				'border' => array( 'label' => esc_html__( 'Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
				'width'  => array( 'label' => esc_html__( 'Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
				'color'  => array( 'label' => esc_html__( 'Image Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
			),
		)
	);
	$this->add_responsive_control(
		'image_hover_border_radius',
		array(
			'label'       => esc_html__( 'Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::DIMENSIONS,
			'label_block' => true,
			'size_units'  => array( 'px', 'em', '%' ),
			'separator'   => 'after',
			'selectors'   => array(
				'{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_group_control(
		Group_Control_Box_Shadow::get_type(),
		array(
			'name'           => 'image_box_shadow',
			'selector'       => '{{WRAPPER}} .dipl_hover_list .dipl-hover-list-cursor',
			'fields_options' => array(
				'box_shadow_type' => array(
					'label' => esc_html__( 'Image Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'wpmozo_divider_tab',
		array(
			'label' => esc_html__( 'Divider', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'divider_size',
		array(
			'label'      => esc_html__( 'Divider Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range' => array(
				'px' => array(
					'min' => 0,
					'max' => 20,
				),
			),
			'default' => array(
				'unit' => 'px',
				'size' => 0,
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-divider' => 'border-top-width: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'divider_style',
		array(
			'label'   => esc_html__( 'Divider Style', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'solid',
			'options' => array(
				'solid'  => esc_html__( 'Solid', 'wpmozo-addons-lite-for-elementor' ),
				'dashed' => esc_html__( 'Dashed', 'wpmozo-addons-lite-for-elementor' ),
				'dotted' => esc_html__( 'Dotted', 'wpmozo-addons-lite-for-elementor' ),
				'double' => esc_html__( 'Double', 'wpmozo-addons-lite-for-elementor' ),
				'ridge'  => esc_html__( 'Ridge', 'wpmozo-addons-lite-for-elementor' ),
				'groove' => esc_html__( 'Groove', 'wpmozo-addons-lite-for-elementor' ),
				'inset'  => esc_html__( 'Inset', 'wpmozo-addons-lite-for-elementor' ),
				'outset' => esc_html__( 'Outset', 'wpmozo-addons-lite-for-elementor' ),
				'none'   => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-divider' => 'border-top-style: {{VALUE}};',
			),
		)
	);
	$this->add_control(
		'hide_last_divider',
		array(
			'label'        => esc_html__( 'Hide Last Divider?', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'wpmozo_hide_last_divider',
		)
	);
	$this->start_controls_tabs(
		'divider_color_tabs'
	);
	$this->start_controls_tab(
		'divider_color_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'divider_color',
		array(
			'label'     => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#d3d3d3',
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-divider' => 'border-top-color: {{VALUE}}; transition: all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'divider_margin',
		array(
			'label'      => esc_html__( 'Divider Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array(
				'top'      => 0,
				'right'    => 0,
				'bottom'   => 0,
				'left'     => 0,
				'unit'     => 'px',
				'isLinked' => false,
			),
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'divider_color_tab_hover',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'divider_color_hover',
		array(
			'label'     => esc_html__( 'Divider Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-wrapper:hover .dipl-hover-list-item-divider' => 'border-top-color: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'divider_margin_hover',
		array(
			'label'      => esc_html__( 'Divider Margin', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors' => array(
				'{{WRAPPER}} .dipl-hover-list-item-wrapper:hover .dipl-hover-list-item-divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'button_style_section',
		array(
			'label' => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}}.icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg'              => 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
				'{{WRAPPER}}.icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}}.icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg'  => 'opacity: 1; margin-right:0;',
				'{{WRAPPER}}.icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}}.icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg'                              => 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
				'{{WRAPPER}}.icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}}.icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg'                  => 'opacity: 1; margin-left:0;',
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
