<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;

$post_types = wpmozo_addons_lite_for_elementor()::$public_instance->wpmozo_ae_get_post_types();
$taxonomies = get_taxonomies( array(), 'objects' );

// Content.
$this->start_controls_section(
	'content_section',
	array(
		'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

	$this->add_control(
		'posts_number',
		array(
			'label'   => __( 'Number of Posts', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::NUMBER,
			'default' => 3,
		)
	);
	$this->add_control(
		'post_type',
		array(
			'label'   => __( 'Post Type', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => $post_types,
			'default' => 'post',
		)
	);

	$this->add_control(
		'post_order_by',
		array(
			'label'   => esc_html__( 'Order By', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'ID'            => esc_html__( 'Post ID', 'wpmozo-addons-for-elementor' ),
				'author'        => esc_html__( 'Post Author', 'wpmozo-addons-for-elementor' ),
				'title'         => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
				'date'          => esc_html__( 'Date', 'wpmozo-addons-for-elementor' ),
				'modified'      => esc_html__( 'Last Modified Date', 'wpmozo-addons-for-elementor' ),
				'parent'        => esc_html__( 'Parent Id', 'wpmozo-addons-for-elementor' ),
				'rand'          => esc_html__( 'Random', 'wpmozo-addons-for-elementor' ),
				'comment_count' => esc_html__( 'Comment Count', 'wpmozo-addons-for-elementor' ),
				'menu_order'    => esc_html__( 'Menu Order', 'wpmozo-addons-for-elementor' ),
			),
			'default' => 'date',
		)
	);

	$this->add_control(
		'post_order',
		array(
			'label'   => __( 'Order', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT2,
			'options' => array(
				'asc'  => 'Ascending',
				'desc' => 'Descending',
			),
			'default' => 'desc',

		)
	);

	$this->add_control(
		'ignore_sticky_posts',
		array(
			'label'        => __( 'Ignore Sticky Posts', 'wpmozo-addons-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);

	$this->add_control(
		'exclude_password_protected',
		array(
			'label'        => __( 'Exclude Password Protected', 'wpmozo-addons-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);

	$this->add_control(
		'exclude_posts',
		array(
			'label'       => __( 'Exclude Posts by ID', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'multiple'    => true,
			'description' => esc_html__( 'If you would like to exclude specific posts from the loop then enter their post ids here comma separated.', 'wpmozo-addons-for-elementor' ),
		)
	);

	$this->end_controls_section();

	// Display.
	$this->start_controls_section(
		'display_section',
		array(
			'label' => __( 'Display', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'ticker_label',
		array(
			'label'       => __( 'Ticker Label', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => 'Breaking News',
		)
	);
	$this->add_control(
		'ticker_effect',
		array(
			'label'   => esc_html__( 'Ticker Effect', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'scroll' => esc_html__( 'Scroll', 'wpmozo-addons-for-elementor' ),
				'fade'   => esc_html__( 'Fade', 'wpmozo-addons-for-elementor' ),
				'slide'  => esc_html__( 'Slide', 'wpmozo-addons-for-elementor' ),
			),
			'default' => 'scroll',
		)
	);
	$this->add_control(
		'post_item_separator_type',
		array(
			'label'     => esc_html__( 'Post Item Separator Type', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'custom' => esc_html__( 'Custom', 'wpmozo-addons-for-elementor' ),
				'icon'   => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
			),
			'default'   => 'custom',
			'condition' => array(
				'ticker_effect' => 'scroll',
			),
		)
	);
	$this->add_control(
		'custom_separator',
		array(
			'label'       => __( 'Custom Post Item Separator', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => '|',
			'selectors'   => array(
				'{{WRAPPER}} .wpmozo_ticker_effect_scroll .wpmozo_post_ticker_item::after' => 'content: "{{VALUE}}" !important;',
			),
			'condition'   => array(
				'post_item_separator_type' => 'custom',
				'ticker_effect'            => 'scroll',
			),
		)
	);
	$this->add_control(
		'icon_separator',
		array(
			'label'     => esc_html__( 'Post Item Separator Icon', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array(
				'value'   => 'fa fa-angle-right',
				'library' => 'fa-solid',
			),
			'condition' => array(
				'post_item_separator_type' => 'icon',
				'ticker_effect'            => 'scroll',
			),
		)
	);
	$this->add_control(
		'scroll_effect_speed',
		array(
			'label'       => __( 'Scroll Effect Speed', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => '70',
			'condition'   => array(
				'ticker_effect' => 'scroll',
			),
		)
	);
	$this->add_control(
		'slide_alignment',
		array(
			'label'     => esc_html__( 'Slide Alignment', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'options'   => array(
				'horizontal' => esc_html__( 'Horizontal', 'wpmozo-addons-for-elementor' ),
				'vertical'   => esc_html__( 'Vertical', 'wpmozo-addons-for-elementor' ),
			),
			'default'   => 'horizontal',
			'condition' => array(
				'ticker_effect' => 'slide',
			),
		)
	);
	$this->add_control(
		'effect_delay',
		array(
			'label'       => __( 'Effect Delay', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => '2500',
			'condition'   => array(
				'ticker_effect' => array( 'fade', 'slide' ),
			),
		)
	);
	$this->add_control(
		'transition_duration',
		array(
			'label'       => __( 'Transition Duration', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'default'     => '700',
			'condition'   => array(
				'ticker_effect' => array( 'fade', 'slide' ),
			),
		)
	);
	$this->add_control(
		'show_arrows',
		array(
			'label'        => __( 'Show Arrows', 'wpmozo-addons-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'no',
			'return_value' => 'yes',
			'condition'    => array(
				'ticker_effect' => array( 'fade', 'slide' ),
			),
		)
	);
	$this->add_control(
		'previous_arrow_icon',
		array(
			'label'     => esc_html__( 'Previous Arrow', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array(
				'value'   => 'fa fa-angle-left',
				'library' => 'fa-solid',
			),
			'condition' => array(
				'ticker_effect' => array( 'fade', 'slide' ),
				'show_arrows'   => 'yes',
			),
		)
	);
	$this->add_control(
		'next_arrow_icon',
		array(
			'label'     => esc_html__( 'Next Arrow', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::ICONS,
			'default'   => array(
				'value'   => 'fa fa-angle-right',
				'library' => 'fa-solid',
			),
			'condition' => array(
				'ticker_effect' => array( 'fade', 'slide' ),
				'show_arrows'   => 'yes',
			),
		)
	);
	$this->end_controls_section();

	// General styling tab.
	$this->start_controls_section(
		'ticker_label_section',
		array(
			'label' => esc_html__( 'Ticker Label', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	$this->add_responsive_control(
		'ticker_label_padding',
		array(
			'label'      => esc_html__( 'Ticker Label Padding', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'default'    => array(
				'top'    => 10,
				'right'  => 20,
				'bottom' => 10,
				'left'   => 20,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'ticker_label_text_shadow',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_label',
		)
	);
	$this->start_controls_tabs( 'ticker_label_tabs' );
	$this->start_controls_tab(
		'ticker_label_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'label_background_color',
		array(
			'label'     => esc_html__( 'Label Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label' => 'background-color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'ticker_label_text_color',
		array(
			'label'     => esc_html__( 'Ticker Label Text Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label' => 'color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'ticker_label_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_label',
		)
	);
	$this->add_responsive_control(
		'ticker_label_text_size',
		array(
			'label'     => esc_html__( 'Ticker Label Text Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 20,
				'unit' => 'px',
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label' => 'font-size: {{SIZE}}{{UNIT}}; transition:all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'ticker_label_border',
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_label',
		)
	);
	$this->add_responsive_control(
		'ticker_label_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'ticker_label_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'label_background_color_hover',
		array(
			'label'     => esc_html__( 'Label Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label:hover' => 'background-color: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'ticker_label_text_color_hover',
		array(
			'label'     => esc_html__( 'Ticker Label Text Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'ticker_label_typography_hover',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_label:hover',
		)
	);
	$this->add_responsive_control(
		'ticker_label_text_size_hover',
		array(
			'label'     => esc_html__( 'Ticker Label Text Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label:hover' => 'font-size: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'ticker_label_border_hover',
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_label:hover',
		)
	);
	$this->add_responsive_control(
		'ticker_label_border_radius_hover',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_label:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'post_items_bar_section',
		array(
			'label' => esc_html__( 'Post Items Bar', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'post_items_bar_margin',
		array(
			'label'      => esc_html__( 'Post Items Bar Margin', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->start_controls_tabs( 'post_items_bar_tabs' );
	$this->start_controls_tab(
		'post_items_bar_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'items_bar_background_color',
		array(
			'label'     => esc_html__( 'Items Bar Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#f5f5f5',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_items' => 'background-color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'post_items_bar_border',
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_items',
		)
	);
	$this->add_responsive_control(
		'post_items_bar_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_items' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'post_items_bar_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'items_bar_background_color_hover',
		array(
			'label'     => esc_html__( 'Items Bar Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_items:hover' => 'background-color: {{VALUE}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'post_items_bar_border_hover',
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_items:hover',
		)
	);
	$this->add_responsive_control(
		'post_items_bar_border_radius_hover',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_items:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'post_item_section',
		array(
			'label' => esc_html__( 'Post Item', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);

	$this->add_responsive_control(
		'post_item_padding',
		array(
			'label'      => esc_html__( 'Post Item Padding', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_post_ticker_post_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'post_item_text_shadow',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_post_title',
		)
	);
	$this->start_controls_tabs( 'post_item_tabs' );
	$this->start_controls_tab(
		'post_item_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'post_item_text_color',
		array(
			'label'     => esc_html__( 'Post Item Text Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_post_title' => 'color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'post_item_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_post_title',
		)
	);
	$this->add_responsive_control(
		'post_item_text_size',
		array(
			'label'     => esc_html__( 'Post Item Text Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 20,
				'unit' => 'px',
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_post_title' => 'font-size: {{SIZE}}{{UNIT}}; transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'post_item_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'post_item_text_color_hover',
		array(
			'label'     => esc_html__( 'Post Item Text Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_post_title:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'post_item_typography_hover',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
			'exclude'  => array( 'font_size' ),
			'selector' => '{{WRAPPER}} .wpmozo_post_ticker_post_title:hover',
		)
	);
	$this->add_responsive_control(
		'post_item_text_size_hover',
		array(
			'label'     => esc_html__( 'Post Item Text Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_post_ticker_post_title:hover' => 'font-size: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'separator_section',
		array(
			'label'     => esc_html__( 'Post Item Separator', 'wpmozo-addons-for-elementor' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => array(
				'ticker_effect' => 'scroll',
			),
		)
	);
	$this->add_responsive_control(
		'separator_font_size',
		array(
			'label'     => esc_html__( 'Separator Font Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 20,
				'unit' => 'px',
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_ticker_icon_separator i' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ticker_icon_separator svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_ticker_effect_scroll .wpmozo_post_ticker_item::after' => 'font-size: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_control(
		'separator_icon_color',
		array(
			'label'     => esc_html__( 'Separator Icon Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_ticker_icon_separator i, .wpmozo_ticker_effect_scroll .wpmozo_post_ticker_item::after' => 'color: {{VALUE}};',
				'{{WRAPPER}} .wpmozo_ticker_icon_separator svg' => 'fill: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'separator_padding',
		array(
			'label'      => esc_html__( 'Post Item Separator Padding', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_ticker_icon_separator, .wpmozo_ticker_effect_scroll .wpmozo_post_ticker_item::after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'arrows_section',
		array(
			'label'     => esc_html__( 'Arrows', 'wpmozo-addons-for-elementor' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => array(
				'ticker_effect' => array( 'fade', 'slide' ),
			),
		)
	);
	$this->add_responsive_control(
		'arrows_container_padding',
		array(
			'label'      => esc_html__( 'Arrows Container Padding', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'default'    => array(
				'top'    => 10,
				'right'  => 10,
				'bottom' => 10,
				'left'   => 10,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'arrows_padding',
		array(
			'label'      => esc_html__( 'Arrows Padding', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', 'em', '%' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next, .wpmozo_swiper_navigation .swiper-button-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'arrow_font_size',
		array(
			'label'     => esc_html__( 'Arrow Font Size', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'default'   => array(
				'size' => 18,
				'unit' => 'px',
			),
			'range'     => array(
				'px' => array(
					'min' => 0,
					'max' => 100,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_arrows_position i:after' => 'font-size: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .wpmozo_arrows_position svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->start_controls_tabs( 'arrows_tabs' );
	$this->start_controls_tab(
		'arrows_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'arrows_container_background_color',
		array(
			'label'     => esc_html__( 'Arrows Container Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation' => 'background-color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_responsive_control(
		'arrows_text_color',
		array(
			'label'     => esc_html__( 'Arrow Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next, .wpmozo_swiper_navigation .swiper-button-prev' => 'color: {{VALUE}}; transition:all 300ms;',
				'{{WRAPPER}} .wpmozo_swiper_navigation svg.swiper-button-next, .wpmozo_swiper_navigation svg.swiper-button-prev' => 'fill: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_control(
		'arrows_background_color',
		array(
			'label'     => esc_html__( 'Arrow Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next, .wpmozo_swiper_navigation .swiper-button-prev' => 'background-color: {{VALUE}}; transition:all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'arrows_border',
			'selector' => '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next, .wpmozo_swiper_navigation .swiper-button-prev',
		)
	);
	$this->add_responsive_control(
		'arrows_border_radius',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next, .wpmozo_swiper_navigation .swiper-button-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition:all 300ms;',
			),
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'arrows_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'arrows_container_background_color_hover',
		array(
			'label'     => esc_html__( 'Arrows Container Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation:hover' => 'background-color: {{VALUE}};',
			),
		)
	);
	$this->add_responsive_control(
		'arrows_text_color_hover',
		array(
			'label'     => esc_html__( 'Arrow Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover, .wpmozo_swiper_navigation .swiper-button-prev:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->add_control(
		'arrows_background_color_hover',
		array(
			'label'     => esc_html__( 'Arrow Background Color', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover, .wpmozo_swiper_navigation .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Border::get_type(),
		array(
			'name'     => 'arrows_border_hover',
			'selector' => '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover, .wpmozo_swiper_navigation .swiper-button-prev:hover',
		)
	);
	$this->add_responsive_control(
		'arrows_border_radius_hover',
		array(
			'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover, .wpmozo_swiper_navigation .swiper-button-prev:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
