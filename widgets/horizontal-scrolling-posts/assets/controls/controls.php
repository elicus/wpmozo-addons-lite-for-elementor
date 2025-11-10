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
use Elementor\Group_Control_Image_Size;
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
	$this->add_control(
		'layout',
		array(
			'label'   => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
				'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default' => 'layout1',
		)
	);
	$this->add_control(
		'posts_number',
		array(
			'label'   => __( 'Number of Posts', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::NUMBER,
			'default' => 10,
		)
	);
	$this->add_control(
		'post_order_by',
		array(
			'label'   => esc_html__( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'options' => array(
				'ID'            => esc_html__( 'Post ID', 'wpmozo-addons-lite-for-elementor' ),
				'author'        => esc_html__( 'Post Author', 'wpmozo-addons-lite-for-elementor' ),
				'title'         => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
				'date'          => esc_html__( 'Date', 'wpmozo-addons-lite-for-elementor' ),
				'modified'      => esc_html__( 'Last Modified Date', 'wpmozo-addons-lite-for-elementor' ),
				'parent'        => esc_html__( 'Parent Id', 'wpmozo-addons-lite-for-elementor' ),
				'rand'          => esc_html__( 'Random', 'wpmozo-addons-lite-for-elementor' ),
				'comment_count' => esc_html__( 'Comment Count', 'wpmozo-addons-lite-for-elementor' ),
				'menu_order'    => esc_html__( 'Menu Order', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default' => 'date',
		)
	);

	$this->add_control(
		'post_order',
		array(
			'label'   => __( 'Order', 'wpmozo-addons-lite-for-elementor' ),
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
			'label'        => __( 'Ignore Sticky Posts', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);

	$this->add_control(
		'exclude_password_protected',
		array(
			'label'        => __( 'Exclude Password Protected', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);

	$this->add_control(
		'exclude_posts',
		array(
			'label'       => __( 'Exclude Posts by ID', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'multiple'    => true,
			'description' => esc_html__( 'If you would like to exclude specific posts from the loop then enter their post ids here comma separated.', 'wpmozo-addons-lite-for-elementor' ),
		)
	);

	$this->add_control(
		'show_excerpt',
		array(
			'label'        => esc_html__( 'Show Excerpt', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);
	$this->add_control(
		'excerpt_length',
		array(
			'label'       => esc_html__( 'Excerpt Length', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::NUMBER,
			'label_block' => false,
			'step'        => 5,
			'default'     => '50',
			'condition'   => array(
				'show_excerpt' => 'yes',
			),
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
	$this->add_responsive_control(
		'space_between_posts',
		array(
			'label'      => esc_html__( 'Space Between Posts', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 0,
					'max' => 150,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 20,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_item:not(:last-child) .wpmozo_horizontal_scrolling_posts_wrapper' => 'margin-right: {{SIZE}}{{UNIT}} !important;',
			),
		)
	);
	$this->add_responsive_control(
		'animation_start_element',
		array(
			'label'      => esc_html__( 'Animation Start Element', 'wpmozo-addons-lite-for-elementor' ),
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
				'size' => 50,
			),
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
				'size' => 50,
			),
		)
	);
	$this->add_group_control(
		Group_Control_Image_Size::get_type(),
		array(
			'name'      => 'image_size',
			'exclude'   => array( 'custom' ),
			'include'   => array(),
			'default'   => 'large',
			'condition' => array( 'layout' => 'layout1' ),
		)
	);
	$this->add_control(
		'show_button',
		array(
			'label'        => esc_html__( 'Show Button', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'yes',
			'return_value' => 'yes',
		)
	);
	$this->add_control(
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
	$this->add_control(
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
	$this->end_controls_section();
	// General styling tab.

	$this->start_controls_section(
		'post_text_section',
		array(
			'label' => esc_html__( 'Post Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_control(
		'title_heading',
		array(
			'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'  => Controls_Manager::HEADING,
		)
	);
	$this->add_control(
		'title_heading_level',
		array(
			'label'       => esc_html__( 'Heading Level', 'wpmozo-addons-lite-for-elementor' ),
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
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title' => 'text-align: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'post_heading_tabs'
	);
	$this->start_controls_tab(
		'post_heading_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'title_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title',
		)
	);

	$this->add_responsive_control(
		'title_color',
		array(
			'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'heading_text_shadow',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'post_heading_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'title_typography_hover',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title:hover',
		)
	);

	$this->add_responsive_control(
		'title_color_hover',
		array(
			'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title:hover' => 'color: {{VALUE}};',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'heading_text_shadow_hover',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_title:hover',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->add_control(
		'excerpt_heading',
		array(
			'label'     => esc_html__( 'Excerpt', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::HEADING,
			'separator' => 'before',
		)
	);
	$this->add_responsive_control(
		'excerpt_alignment',
		array(
			'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt' => 'text-align: {{VALUE}};',
			),
		)
	);
	$this->start_controls_tabs(
		'post_excerpt_tabs'
	);
	$this->start_controls_tab(
		'post_excerpt_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'excerpt_typography',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt',
		)
	);

	$this->add_responsive_control(
		'excerpt_color',
		array(
			'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'excerpt_text_shadow',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'post_excerpt_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'name'     => 'excerpt_typography_hover',
			'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt:hover',
		)
	);

	$this->add_responsive_control(
		'excerpt_color_hover',
		array(
			'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt:hover' => 'color: {{VALUE}}; transition: 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'name'     => 'excerpt_text_shadow_hover',
			'label'    => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'selector' => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_excerpt:hover',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
	$this->start_controls_section(
		'post_item_section',
		array(
			'label' => esc_html__( 'Post Item', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_responsive_control(
		'post_item_padding',
		array(
			'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::DIMENSIONS,
			'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
			'default'    => array(
				'top'      => '0',
				'right'    => '0',
				'bottom'   => '0',
				'left'     => '0',
				'unit'     => 'px',
				'isLinked' => false,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'post_item_width',
		array(
			'label'      => esc_html__( 'Width', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'separator'  => 'before',
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
				'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper' => 'width: {{SIZE}}{{UNIT}}; min-width: {{SIZE}}{{UNIT}};',
			),
		)
	);
	$this->add_responsive_control(
		'post_item_height',
		array(
			'label'      => esc_html__( 'Height', 'wpmozo-addons-lite-for-elementor' ),
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
				'size' => 500,
			),
			'selectors'  => array(
				'{{WRAPPER}} .layout2 .wpmozo_horizontal_scrolling_posts_wrapper' => 'min-height: {{SIZE}}{{UNIT}};',
			),
			'condition'  => array(
				'layout' => 'layout2',
			),
		)
	);
	$this->start_controls_tabs( 'post_item_styling_tabs' );
		$this->start_controls_tab(
			'post_item_normal_tab',
			array(
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			)
		);
		$this->add_control(
			'post_background_color',
			array(
				'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper' => 'background-color: {{VALUE}}; transition: 300ms;',
				),
			)
		);
		$this->add_control(
			'post_overlay_color',
			array(
				'label'     => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .wpmozo_horizontal_scrolling_post_inner::before' => 'background-color: {{VALUE}};',
				),
				'condition' => array( 'layout' => 'layout2' ),
			)
		);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'post_item_border',
					'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper',
				)
			);
			$this->add_responsive_control(
				'post_item_border_radius',
				array(
					'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'separator'   => 'after',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'post_item_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'post_background_color_hover',
				array(
					'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper:hover' => 'background-color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_control(
				'post_overlay_color_hover',
				array(
					'label'     => esc_html__( 'Overlay Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_horizontal_scrolling_post_inner:hover::before' => 'background-color: {{VALUE}};',
					),
					'condition' => array( 'layout' => 'layout2' ),
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'post_item_hover_border',
					'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper:hover',
				)
			);
			$this->add_responsive_control(
				'post_item_hover_border_radius',
				array(
					'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'separator'   => 'after',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'           => 'post_item_box_shadow',
					'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper',
					'fields_options' => array(
						'box-shadow' => array(
							'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
						),
					),
				)
			);
			$this->end_controls_section();
			$this->start_controls_section(
				'post_content_section',
				array(
					'label' => esc_html__( 'Post Content', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'post_content_padding',
				array(
					'label'       => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'default'     => array(
						'top'    => '20',
						'right'  => '20',
						'bottom' => '20',
						'left'   => '20',
						'unit'   => 'px',
					),
					'size_units'  => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'render_type' => 'template',
				)
			);
			$this->start_controls_tabs( 'post_content_styling_tabs' );
				$this->start_controls_tab(
					'post_content_normal_tab',
					array(
						'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
					)
				);
				$this->add_control(
					'post_content_background_color',
					array(
						'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper' => 'background-color: {{VALUE}}; transition: 300ms;',
						),
					)
				);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						array(
							'name'           => 'post_content_border',
							'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper',
						)
					);
					$this->add_responsive_control(
						'post_content_border_radius',
						array(
							'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
							'type'        => Controls_Manager::DIMENSIONS,
							'label_block' => true,
							'size_units'  => array( 'px', 'em', '%' ),
							'selectors'   => array(
								'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
							),
						)
					);
					$this->end_controls_tab();
					$this->start_controls_tab(
						'post_content_hover_tab',
						array(
							'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
						)
					);
					$this->add_control(
						'post_content_background_color_hover',
						array(
							'label'     => esc_html__( 'Background Color', 'wpmozo-addons-lite-for-elementor' ),
							'type'      => Controls_Manager::COLOR,
							'selectors' => array(
								'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper:hover' => 'background-color: {{VALUE}}; transition: 300ms;',
							),
						)
					);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						array(
							'name'           => 'post_content_hover_border',
							'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper:hover',
						)
					);
					$this->add_responsive_control(
						'post_content_hover_border_radius',
						array(
							'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
							'type'        => Controls_Manager::DIMENSIONS,
							'label_block' => true,
							'size_units'  => array( 'px', 'em', '%' ),
							'selectors'   => array(
								'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_content_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							),
						)
					);
					$this->end_controls_tab();
					$this->end_controls_tabs();
					$this->end_controls_section();
					$this->start_controls_section(
						'post_image_section',
						array(
							'label'     => esc_html__( 'Post Image', 'wpmozo-addons-lite-for-elementor' ),
							'tab'       => Controls_Manager::TAB_STYLE,
							'condition' => array(
								'layout' => 'layout1',
							),
						)
					);
					$this->add_responsive_control(
						'image_padding',
						array(
							'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
							'type'       => Controls_Manager::DIMENSIONS,
							'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
							'selectors'  => array(
								'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							),
						)
					);
					$this->add_control(
						'enable_custom_height',
						array(
							'label'        => esc_html__( 'Enable Custom Height', 'wpmozo-addons-lite-for-elementor' ),
							'type'         => Controls_Manager::SWITCHER,
							'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
							'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
							'return_value' => 'yes',
							'default'      => 'yes',
						)
					);
					$this->add_responsive_control(
						'image_height',
						array(
							'label'      => esc_html__( 'Height', 'wpmozo-addons-lite-for-elementor' ),
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
								'size' => 'auto',
							),
							'selectors'  => array(
								'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image' => 'height: {{SIZE}}{{UNIT}} !important;',
							),
							'condition'  => array(
								'enable_custom_height' => 'yes',
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
									'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image',
								)
							);
							$this->add_responsive_control(
								'image_border_radius',
								array(
									'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'separator'   => 'after',
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
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
									'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image:hover',
								)
							);
							$this->add_responsive_control(
								'image_hover_border_radius',
								array(
									'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
									'type'        => Controls_Manager::DIMENSIONS,
									'label_block' => true,
									'size_units'  => array( 'px', 'em', '%' ),
									'separator'   => 'after',
									'selectors'   => array(
										'{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									),
								)
							);
							$this->end_controls_tab();
							$this->end_controls_tabs();
							$this->add_group_control(
								Group_Control_Box_Shadow::get_type(),
								array(
									'name'           => 'image_box_shadow',
									'selector'       => '{{WRAPPER}} .wpmozo_horizontal_scrolling_posts_wrapper .wpmozo_horizontal_scrolling_posts_image',
								)
							);
							$this->end_controls_section();
							$this->start_controls_section(
								'read_more_style_section',
								array(
									'label'     => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
									'tab'       => Controls_Manager::TAB_STYLE,
									'condition' => array( 'show_button' => 'yes' ),
								)
							);
							$this->add_responsive_control(
								'read_more_alignment',
								array(
									'label'     => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
									'label'        => esc_html__( 'Use Custom Styles', 'wpmozo-addons-lite-for-elementor' ),
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
									'label'        => esc_html__( 'Icon Placement', 'wpmozo-addons-lite-for-elementor' ),
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
									'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-lite-for-elementor' ),
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
									'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
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
								'button_text_color',
								array(
									'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
									'type'      => Controls_Manager::COLOR,
									'condition' => array(
										'button_custom_style' => 'yes',
									),
									'selectors' => array(
										'{{WRAPPER}} .wpmozo_readmore_button' => 'color: {{VALUE}}; transition: 300ms;',
									),
								)
							);
							$this->add_responsive_control(
								'button_icon_color',
								array(
									'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
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
							$this->add_group_control(
								Group_Control_Background::get_type(),
								array(
									'name'           => 'button_background',
									'types'          => array( 'classic', 'gradient' ),
									'toggle'         => false,
									'condition'      => array(
										'button_custom_style' => 'yes',
									),
									'selector'       => '{{WRAPPER}} .wpmozo_readmore_button',
								)
							);
							$this->add_group_control(
								Group_Control_Typography::get_type(),
								array(
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
								'button_text_size',
								array(
									'label'      => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
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
							$this->add_responsive_control(
								'button_margin',
								array(
									'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
									'type'       => Controls_Manager::DIMENSIONS,
									'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
									'default'    => array(
										'top'      => 2,
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
									'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
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
								'button_text_color_hover',
								array(
									'label'     => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
									'type'      => Controls_Manager::COLOR,
									'condition' => array(
										'button_custom_style' => 'yes',
									),
									'selectors' => array(
										'{{WRAPPER}} .wpmozo_readmore_button:hover'     => 'color: {{VALUE}}; transition: 300ms;',
									),
								)
							);
							$this->add_responsive_control(
								'button_icon_color_hover',
								array(
									'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
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
							$this->add_group_control(
								Group_Control_Background::get_type(),
								array(
									'name'           => 'button_background_hover',
									'types'          => array( 'classic', 'gradient' ),
									'toggle'         => false,
									'condition'      => array(
										'button_custom_style' => 'yes',
									),
									'selector'       => '{{WRAPPER}} .wpmozo_readmore_button:hover',
								)
							);
							$this->add_group_control(
								Group_Control_Typography::get_type(),
								array(
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
								'button_text_size_hover',
								array(
									'label'      => esc_html__( 'Font Size', 'wpmozo-addons-lite-for-elementor' ),
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
							$this->add_responsive_control(
								'button_margin_hover',
								array(
									'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
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
									'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
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
								'wrapper_background',
								array(
									'label' => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
									'tab'   => Controls_Manager::TAB_STYLE,
								)
							);
								$this->add_group_control(
									Group_Control_Background::get_type(),
									array(
										'name'     => 'wrapper_background',
										'types'    => array( 'classic', 'gradient' ),
										'toggle'   => false,
										'selector' => '{{WRAPPER}} .wpmozo_sticky_posts_scroller',
									)
								);
								$this->end_controls_section();

							$this->start_controls_section(
								'wrapper_padding_section',
								array(
									'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
									'tab'   => Controls_Manager::TAB_STYLE,
								)
							);
								$this->add_responsive_control(
									'wrapper_padding',
									array(
										'label'      => esc_html__( 'Scroller Padding', 'wpmozo-addons-lite-for-elementor' ),
										'type'       => Controls_Manager::DIMENSIONS,
										'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
										'default'    => array(
											'top'      => '0',
											'right'    => '0',
											'bottom'   => '0',
											'left'     => '0',
											'unit'     => 'px',
											'isLinked' => false,
										),
										'selectors'  => array(
											'{{WRAPPER}} .wpmozo_sticky_posts_scroller' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
										),
									)
								);
								$this->end_controls_section();
