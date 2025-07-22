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
	'card_items_section',
	array(
		'label' => esc_html__( 'Card Items', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$repeater = new Repeater();

	$repeater->add_responsive_control(
		'item_title',
		array(
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Card Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$repeater->add_responsive_control(
		'card_item_description',
		array(
			'label'       => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => esc_html__( 'Item Content', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$repeater->add_control(
		'card_item_image',
		array(
			'label'   => esc_html__( 'Card Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array(
				'url' => Utils::get_placeholder_image_src(),
				'id'  => 'thisistheimage',
			),
		)
	);
	$repeater->add_responsive_control(
		'card_item_image_alt',
		array(
			'label' => esc_html__( 'Image Alt Tag', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::TEXT,
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
		'card_icon',
		array(
			'label'     => esc_html__( 'Card Icon', 'wpmozo-addons-lite-for-elementor' ),
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
			'name'           => 'card_background',
			'types'          => array( 'classic', 'gradient' ),
			'fields_options' => array(
				'background' => array(
					'label'   => esc_html__( 'Card Background', 'wpmozo-addons-lite-for-elementor' ),
					'default' => 'classic',
				),
			),
			'toggle'         => false,
			'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards .wpmozo_scroll_stack_cards_item{{CURRENT_ITEM}}',
		)
	);
	$this->add_control(
		'wpmozo_items_content',
		array(
			'label'       => esc_html__( 'Card Item', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::REPEATER,
			'fields'      => $repeater->get_controls(),
			'default'     => array(
				array(
					'item_title' => esc_html__( 'Card Title', 'wpmozo-addons-lite-for-elementor' ),
				),
			),
			'title_field' => '{{{ item_title }}}',
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
		'layout',
		array(
			'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'vertical'   => esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
				'horizontal' => esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default' => 'vertical',
		)
	);
	$this->add_responsive_control(
		'animation_start_viewport',
		array(
			'label'      => esc_html__( 'Animation Start Viewport', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%' ),
			'range'      => array(
				'%' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 0,
			),
		)
	);
	$this->add_responsive_control(
		'collapsed_width',
		array(
			'label'      => esc_html__( 'Collapsed Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 10,
					'max' => 500,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 200,
			),
			'condition'  => array(
				'layout' => 'horizontal',
			),
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
		'title_alignment',
		array(
			'label'     => esc_html__( 'Title Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title',
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
				'{{WRAPPER}} .wpmozo_scroll_stack_cards_title' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
				'{{WRAPPER}} .wpmozo_scroll_stack_cards_title' => 'color: {{VALUE}}; transition: 300ms;',
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
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover',
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
				'{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
				'{{WRAPPER}} .wpmozo_scroll_stack_cards_title:hover' => 'color: {{VALUE}};',
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
			'selector' => '{{WRAPPER}} .wpmozo_scroll_stack_cards_title',
		)
	);
	$this->end_controls_section();
	// Description Choose Options.
	$this->start_controls_section(
		'descriptoin_text_styling',
		array(
			'label' => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->start_controls_tabs( 'description_text_options_tabs' );

		$this->start_controls_tab(
			'description_text_tab',
			array(
				'label' => '<i class="eicon-text"></i>',
			)
		);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content > p:not( :has( a ) )',
				)
			);
			$this->add_responsive_control(
				'description_text__color',
				array(
					'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_text__shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content',
				)
			);
			$this->add_responsive_control(
				'description_text_alignment',
				array(
					'type'      => Controls_Manager::CHOOSE,
					'label'     => esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'    => true,
					'options'   => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'description_link_tab',
				array(
					'label' => '<i class="eicon-editor-link"></i>',
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Link Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_link_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content a',
				)
			);
			$this->add_responsive_control(
				'description_link_color',
				array(
					'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content a' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'label'       => esc_html__( 'Link Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_link_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content a',
				)
			);
			$this->add_responsive_control(
				'description_link_alignment',
				array(
					'type'      => Controls_Manager::CHOOSE,
					'label'     => esc_html__( 'Link Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'    => true,
					'options'   => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content p:has( a )' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'description__unordered_list_tab',
				array(
					'label' => '<i class="eicon-editor-list-ul"></i>',
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Unordered List Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description__unordered_list_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content ul',
				)
			);
			$this->add_responsive_control(
				'description__unordered_list_color',
				array(
					'label'     => esc_html__( 'Unordered List Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content ul' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'label'       => esc_html__( 'Unordered List Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description__unordered_list_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content ul',
				)
			);
			$this->add_responsive_control(
				'description__unordered_list_alignment',
				array(
					'type'      => Controls_Manager::CHOOSE,
					'label'     => esc_html__( 'Unordered List Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'    => true,
					'options'   => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content ul' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'description_ordered_list_tab',
				array(
					'label' => '<i class="eicon-editor-list-ol"></i>',
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Ordered List Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_ordered_list_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content ol',
				)
			);
			$this->add_responsive_control(
				'description_ordered_list_color',
				array(
					'label'     => esc_html__( 'Ordered Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content ol' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'label'       => esc_html__( 'Ordered List Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_ordered_list_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content ol',
				)
			);
			$this->add_responsive_control(
				'description_ordered_list_alignment',
				array(
					'type'      => Controls_Manager::CHOOSE,
					'label'     => esc_html__( 'Ordered List Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'    => true,
					'options'   => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content ol' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'description_blockquote_tab',
				array(
					'label' => '<i class="eicon-editor-quote"></i>',
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Blockquote Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_blockquote_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content blockquote',
				)
			);
			$this->add_responsive_control(
				'description_blockquote_color',
				array(
					'label'     => esc_html__( 'Blockquote Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content blockquote' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content blockquote p:before' => 'border-left: 5px solid {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'label'       => esc_html__( 'Blockquote Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_blockquote_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_scroll_stack_cards_content blockquote',
				)
			);
			$this->add_responsive_control(
				'description_blockquote_alignment',
				array(
					'type'      => Controls_Manager::CHOOSE,
					'label'     => esc_html__( 'Blockquote Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'    => true,
					'options'   => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_content blockquote' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'icon_section',
				array(
					'label' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'icon_alignment',
				array(
					'label'     => esc_html__( 'Icon Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->add_responsive_control(
				'cards_icon_padding',
				array(
					'label'      => esc_html__( 'Icon Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
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
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper span.wpmozo_icon'  => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper svg.wpmozo_icon'   => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; transition: all 300ms;',
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
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper svg'   => 'fill: {{VALUE}}; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper i'     => 'color: {{VALUE}}; transition: 300ms;',
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
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper svg:hover'   => 'fill: {{VALUE}}; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_icon_wrapper i:hover'     => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'image_section',
				array(
					'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->add_responsive_control(
				'image_size',
				array(
					'label'      => esc_html__( 'Image Size', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( '%' ),
					'separator'  => 'after',
					'range'      => array(
						'%' => array(
							'min' => 0,
							'max' => 100,
						),
					),
					'default'    => array(
						'unit' => '%',
						'size' => 30,
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_scroll_stack_cards .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_image_wrapper' => 'flex: 0 0 {{SIZE}}{{UNIT}} !important;',
					),
					'condition'  => array(
						'layout' => 'vertical',
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
							'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img',
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
								'{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
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
							'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img:hover',
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
								'{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							),
						)
					);
					$this->end_controls_tab();
					$this->end_controls_tabs();
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						array(
							'name'           => 'image_box_shadow',
							'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_image_wrapper img',
							'fields_options' => array(
								'box_shadow_type' => array(
									'label' => esc_html__( 'Image Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
								),
							),
						)
					);
					$this->end_controls_section();
					$this->start_controls_section(
						'content_styling_section',
						array(
							'label' => esc_html__( 'Content Styling', 'wpmozo-addons-lite-for-elementor' ),
							'tab'   => Controls_Manager::TAB_STYLE,
						)
					);
					$this->add_responsive_control(
						'content_wrap_padding',
						array(
							'label'      => esc_html__( 'Content Wrap Padding', 'wpmozo-addons-lite-for-elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
							'selectors'  => array(
								'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							),
						)
					);
					$this->add_responsive_control(
						'content_margin_right',
						array(
							'label'      => esc_html__( 'Content Margin Right', 'wpmozo-addons-lite-for-elementor' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => array( 'px' ),
							'separator'  => 'after',
							'range'      => array(
								'px' => array(
									'min' => 0,
									'max' => 200,
								),
							),
							'default'    => array(
								'unit' => 'px',
								'size' => 20,
							),
							'selectors'  => array(
								'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper' => 'margin: {{SIZE}}{{UNIT}};',
							),
						)
					);
					$this->start_controls_tabs( 'content_styling_tabs' );
						$this->start_controls_tab(
							'content_normal_tab',
							array(
								'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
							)
						);
						$this->add_control(
							'content_wrap_background',
							array(
								'label'     => esc_html__( 'Content Wrap Background', 'wpmozo-addons-lite-for-elementor' ),
								'type'      => Controls_Manager::COLOR,
								'selectors' => array(
									'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper' => 'background-color: {{VALUE}}; transition: 300ms;',
								),
							)
						);
							$this->add_group_control(
								Group_Control_Border::get_type(),
								array(
									'name'           => 'content_wrap_border',
									'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper',
									'fields_options' => array(
										'border' => array( 'label' => esc_html__( 'Content Wrap Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
										'width'  => array( 'label' => esc_html__( 'Content Wrap Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
										'color'  => array( 'label' => esc_html__( 'Content Wrap Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
									),
								)
							);
							$this->add_responsive_control(
								'content_wrap_border_radius',
								array(
									'label'       => esc_html__( 'Content Wrap Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
									),
								)
							);
							$this->end_controls_tab();
							$this->start_controls_tab(
								'content_hover_tab',
								array(
									'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
								)
							);
							$this->add_control(
								'content_wrap_background_hover',
								array(
									'label'     => esc_html__( 'Content Wrap Background', 'wpmozo-addons-lite-for-elementor' ),
									'type'      => Controls_Manager::COLOR,
									'selectors' => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper:hover' => 'background-color: {{VALUE}}; transition: 300ms;',
									),
								)
							);
							$this->add_group_control(
								Group_Control_Border::get_type(),
								array(
									'name'           => 'content_wrap_border_hover',
									'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper:hover',
									'fields_options' => array(
										'border' => array( 'label' => esc_html__( 'Content Wrap Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
										'width'  => array( 'label' => esc_html__( 'Content Wrap Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
										'color'  => array( 'label' => esc_html__( 'Content Wrap Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
									),
								)
							);
							$this->add_responsive_control(
								'content_wrap_border_radius_hover',
								array(
									'label'       => esc_html__( 'Content Wrap Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards_wrapper .wpmozo_scroll_stack_cards_content_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
								)
							);
							$this->end_controls_tab();
							$this->end_controls_tabs();
							$this->end_controls_section();
							$this->start_controls_section(
								'card_item_section',
								array(
									'label' => esc_html__( 'Card Item', 'wpmozo-addons-lite-for-elementor' ),
									'tab'   => Controls_Manager::TAB_STYLE,
								)
							);
							$this->add_responsive_control(
								'card_item_width',
								array(
									'label'      => esc_html__( 'Card Item Width', 'wpmozo-addons-lite-for-elementor' ),
									'type'       => Controls_Manager::SLIDER,
									'size_units' => array( 'px' ),
									'separator'  => 'after',
									'range'      => array(
										'px' => array(
											'min' => 100,
											'max' => 1000,
										),
									),
									'default'    => array(
										'unit' => 'px',
										'size' => 300,
									),
									'selectors'  => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards .layout-horizontal .wpmozo_scroll_stack_cards_item' => 'width: {{SIZE}}{{UNIT}};',
									),
									'condition'  => array(
										'layout' => 'horizontal',
									),
								)
							);
							$this->start_controls_tabs( 'card_item_styling_tabs' );
							$this->start_controls_tab(
								'card_item_normal_tab',
								array(
									'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
								)
							);
							$this->add_group_control(
								Group_Control_Border::get_type(),
								array(
									'name'           => 'card_item_border',
									'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_item',
									'fields_options' => array(
										'border' => array( 'label' => esc_html__( 'Card Item Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
										'width'  => array( 'label' => esc_html__( 'Card Item Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
										'color'  => array( 'label' => esc_html__( 'Card Item Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
									),
								)
							);
							$this->add_responsive_control(
								'card_item_border_radius',
								array(
									'label'       => esc_html__( 'Card Item Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'separator'   => 'after',
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
									),
								)
							);
							$this->end_controls_tab();
							$this->start_controls_tab(
								'card_item_hover_tab',
								array(
									'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
								)
							);
							$this->add_group_control(
								Group_Control_Border::get_type(),
								array(
									'name'           => 'card_item_hover_border',
									'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_item:hover',
									'fields_options' => array(
										'border' => array( 'label' => esc_html__( 'Card Item Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
										'width'  => array( 'label' => esc_html__( 'Card Item Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
										'color'  => array( 'label' => esc_html__( 'Card Item Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
									),
								)
							);
							$this->add_responsive_control(
								'card_item_hover_border_radius',
								array(
									'label'       => esc_html__( 'Card Item Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'separator'   => 'after',
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_scroll_stack_cards_item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
								)
							);
							$this->end_controls_tab();
							$this->end_controls_tabs();
							$this->add_group_control(
								Group_Control_Box_Shadow::get_type(),
								array(
									'name'           => 'card_item_box_shadow',
									'selector'       => '{{WRAPPER}} .wpmozo_scroll_stack_cards_item',
									'fields_options' => array(
										'box_shadow_type' => array(
											'label' => esc_html__( 'Card Item Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
										),
									),
								)
							);
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
