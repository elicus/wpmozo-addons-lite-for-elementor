<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

// content section starts here.
$this->start_controls_section(
	'content_section',
	array(
		'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$this->add_control(
		'number_of_categories',
		array(
			'label'   => esc_html__( 'Number of Categories', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::NUMBER,
			'min'     => -1,
			'max'     => 30,
			'step'    => 1,
			'default' => 10,
		)
	);
	$this->add_control(
		'select_categories',
		array(
			'label'       => esc_html__( 'Select Categories', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::SELECT2,
			'label_block' => true,
			'multiple'    => true,
			'options'     => wpmozo_get_blog_posts_categories(),
		)
	);
	$this->add_control(
		'category_order',
		array(
			'label'       => __( 'Order', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'desc' => esc_html__( 'DESC', 'wpmozo-addons-lite-for-elementor' ),
				'asc'  => esc_html__( 'ASC', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => 'desc',
		)
	);
	$this->add_control(
		'category_order_by',
		array(
			'label'       => __( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'name'          => esc_html__( 'Name', 'wpmozo-addons-lite-for-elementor' ),
				'slug'          => esc_html__( 'Slug', 'wpmozo-addons-lite-for-elementor' ),
				'term_id'       => esc_html__( 'Term ID', 'wpmozo-addons-lite-for-elementor' ),
				'post_count'    => esc_html__( 'Post Count', 'wpmozo-addons-lite-for-elementor' ),
				'menu_order'    => esc_html__( 'Menu Order', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => 'name',
		)
	);
	$this->add_control(
		'hide_empty',
		array(
			'label'        => esc_html__( 'Hide Empty', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'default'      => 'no',
			'return_value' => 'yes',
		)
	);
	$this->add_control(
		'no_result_text',
		array(
			'label'       => esc_html__( 'No Result Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'placeholder' => esc_html__( 'The categories you requested could not be found. Try changing your widget settings or create some new posts.', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
$this->end_controls_section();
$this->start_controls_section(
	'display_section',
	array(
		'label' => __( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
$this->add_control(
	'layout',
	array(
		'label'       => __( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'layout1' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
			'layout3' => esc_html__( 'Layout 3', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default'     => 'layout1',
	)
);
$this->add_control(
	'number_of_columns',
	array(
		'label'       => __( 'Number of Columns', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' => false,
		'type'        => Controls_Manager::SELECT,
		'options'     => array(
			'1' => esc_html__( '1', 'wpmozo-addons-lite-for-elementor' ),
			'2' => esc_html__( '2', 'wpmozo-addons-lite-for-elementor' ),
			'3' => esc_html__( '3', 'wpmozo-addons-lite-for-elementor' ),
			'4' => esc_html__( '4', 'wpmozo-addons-lite-for-elementor' ),
			'5' => esc_html__( '5', 'wpmozo-addons-lite-for-elementor' ),
			'6' => esc_html__( '6', 'wpmozo-addons-lite-for-elementor' ),
			'7' => esc_html__( '7', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default'     => '3',
	)
);
$this->add_responsive_control(
	'items_gap',
	array(
		'label'          => esc_html__( 'Items Gap', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'range'          => array(
			'px' => array(
				'min'  => 0,
				'max'  => 150,
				'step' => 1,
			),
		),
		'devices'        => array( 'desktop', 'tablet', 'mobile' ),
		'default'        => array(
			'size' => 30,
			'unit' => 'px',
		),
		'tablet_default' => array(
			'size' => 30,
			'unit' => 'px',
		),
		'mobile_default' => array(
			'size' => 20,
			'unit' => 'px',
		),
		'size_units'     => array( 'px' ),
		'render_type'    => 'template',
	)
);
$this->add_control(
	'show_post_count',
	array(
		'label'        => esc_html__( 'Show Post Count', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'yes',
		'return_value' => 'yes',
	)
);
$this->add_control(
	'show_as_super_number',
	array(
		'label'        => esc_html__( 'Show Super Number', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
		'condition' => array(
			'show_post_count' => 'yes',
		),
	)
);
$this->add_control(
	'post_count_text',
	array(
		'label'       => esc_html__( 'Post Count Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__( 'The categories you requested could not be found. Try changing your widget settings or create some new posts.', 'wpmozo-addons-lite-for-elementor' ),
		'condition' => array(
			'show_post_count' => 'yes',
			'show_as_super_number!' => 'yes',
		),
	)
);
$this->end_controls_section();

	// Image styling start here.
	$this->start_controls_section(
		'image_settings',
		array(
			'label' => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
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
					'selector'       => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post_image',
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
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post_image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
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
					'selector'       => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post_image:hover',
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
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post_image:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->end_controls_section();
			$this->start_controls_section(
				'meta_icon_styling',
				array(
					'label' => esc_html__( 'Meta Icon', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->add_responsive_control(
				'meta_icon_font_size',
				array(
					'label'      => esc_html__( 'Meta Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 'px' ),
					'range'      => array(
						'px' => array(
							'min' => 1,
							'max' => 100,
						),
					),
					'default'    => array(
						'unit' => 'px',
						'size' => 14,
					),
					'condition'  => array(
						'layout' => array( 'layout2', 'layout3', 'layout4' ),
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_meta_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_responsive_control(
				'comment_icon_font_size',
				array(
					'label'      => esc_html__( 'Comment Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 'px' ),
					'range'      => array(
						'px' => array(
							'min' => 1,
							'max' => 100,
						),
					),
					'default'    => array(
						'unit' => 'px',
						'size' => 14,
					),
					'condition'  => array(
						'layout' => 'layout4',
					),
					'selectors'  => array(
						'{{WRAPPER}} .layout4 .comments i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->start_controls_tabs(
				'meta_icon_style_tabs'
			);
			$this->start_controls_tab(
				'meta_icon_style_tab_normal',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'meta_icon_color',
				array(
					'label'     => esc_html__( 'Meta Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_meta_icon i' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'meta_icon_style_tab_hover',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'meta_icon_color_hover',
				array(
					'label'     => esc_html__( 'Meta Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_meta_icon i:hover' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'post_content_section',
				array(
					'label' => esc_html__( 'Post Content', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'post_content_margin',
				array(
					'label'      => esc_html__( 'Post Content Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'default'    => array(
						'unit' => 'px',
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider .wpmozo_advanced_blog_slider_post .wpmozo_advanced_blog_slider_content_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->add_responsive_control(
				'post_content_padding',
				array(
					'label'      => esc_html__( 'Post Content Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'default'    => array(
						'unit' => 'px',
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider .wpmozo_swiper_wrapper .wpmozo_swiper_layout .wpmozo_advanced_blog_post_slide .wpmozo_advanced_blog_slider_post .wpmozo_advanced_blog_slider_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->start_controls_tabs(
				'post_content_style_tabs'
			);
			$this->start_controls_tab(
				'post_content_style_tab_normal',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'           => 'post_content_background',
					'types'          => array( 'classic', 'gradient' ),
					'fields_options' => array(
						'background' => array(
							'label'   => esc_html__( 'Post Content Background', 'wpmozo-addons-lite-for-elementor' ),
							'default' => 'classic',
						),
						'color'      => array(
							'default' => 'rgba(244,244,244,0.7)',
						),
					),
					'toggle'         => false,
					'selector'       => '{{WRAPPER}} .wpmozo_advanced_blog_slider .wpmozo_advanced_blog_slider_post',
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'slide_border',
					'selector'       => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post',
					'fields_options' => array(
						'border' => array( 'label' => esc_html__( 'Single Post Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
						'width'  => array( 'label' => esc_html__( 'Single Post Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
						'color'  => array( 'label' => esc_html__( 'Single Post Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
					),
				)
			);
			$this->add_responsive_control(
				'slide_border_radius',
				array(
					'label'       => esc_html__( 'Single Post Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};overflow:hidden;transition:all 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'post_content_style_tab_hover',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'           => 'post_content_background_hover',
					'types'          => array( 'classic', 'gradient' ),
					'fields_options' => array(
						'background' => array(
							'label'   => esc_html__( 'Post Content Background', 'wpmozo-addons-lite-for-elementor' ),
							'default' => 'classic',
						),
					),
					'toggle'         => false,
					'selector'       => '{{WRAPPER}} .wpmozo_advanced_blog_slider .wpmozo_advanced_blog_slider_post:hover',
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'slide_border_hover',
					'selector'       => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post:hover',
					'fields_options' => array(
						'border' => array( 'label' => esc_html__( 'Single Post Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
						'width'  => array( 'label' => esc_html__( 'Single Post Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
						'color'  => array( 'label' => esc_html__( 'Single Post Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
					),
				)
			);
			$this->add_responsive_control(
				'slide_border_radius_hover',
				array(
					'label'       => esc_html__( 'Single Post Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'category_section',
				array(
					'label' => esc_html__( 'Category', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'category_alignment',
				array(
					'label'     => esc_html__( 'Category Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'category_text_shadow',
					'label'     => esc_html__( 'Category Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories',
					'separator' => 'before',
				)
			);
			$this->start_controls_tabs(
				'category_tabs'
			);
			$this->start_controls_tab(
				'category_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'category_typography',
					'label'    => esc_html__( 'Category Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a',
				)
			);
			$this->add_responsive_control(
				'category_color',
				array(
					'label'     => esc_html__( 'Category Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a' => 'color: {{VALUE}}; transition: all 300ms; padding: 2px 4px;',
					),
				)
			);
			$this->add_responsive_control(
				'category_background_color',
				array(
					'label'     => esc_html__( 'Category Background Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a' => 'background-color: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'category_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'category_typography_hover',
					'label'    => esc_html__( 'Category Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a:hover',
				)
			);

			$this->add_responsive_control(
				'category_color_hover',
				array(
					'label'     => esc_html__( 'Category Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a:hover' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_responsive_control(
				'category_background_color_hover',
				array(
					'label'     => esc_html__( 'Category Background Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_categories a:hover' => 'background-color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			// Style Controls.
			$this->start_controls_section(
				'slider_styling',
				array(
					'label' => esc_html__( 'Slider', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'slider_container_padding',
				array(
					'label'       => esc_html__( 'Slider Container Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'selectors'   => array(
						'{{WRAPPER}} .swiper-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_custom_padding',
				array(
					'label'       => esc_html__( 'Arrows Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'default'     => array(
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					),
					'condition'   => array( 'show_arrow' => 'yes' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};box-sizing:content-box;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'           => 'member_box_shadow',
					'selector'       => '{{WRAPPER}} .wpmozo_wrapper .wpmozo_advanced_blog_slider_post',
					'fields_options' => array(
						'box-shadow' => array(
							'label' => esc_html__( 'Single Post Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
						),
					),
				)
			);
			$this->add_responsive_control(
				'arrows_font_size',
				array(
					'label'      => esc_html__( 'Arrows Font Size', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'range'      => array(
						'px' => array(
							'min'  => 1,
							'max'  => 1000,
							'step' => 1,
						),
					),
					'devices'    => array( 'desktop', 'tablet', 'mobile' ),
					'default'    => array(
						'size' => 20,
						'unit' => 'px',
					),
					'size_units' => array( 'px' ),
					'condition'  => array( 'show_arrow' => 'yes' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation i ' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg ' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_arrows_outside::before' => 'width: {{SIZE}}{{UNIT}}; left: -{{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_arrows_outside::after' => 'width: {{SIZE}}{{UNIT}}; right: -{{SIZE}}{{UNIT}};',

					),
				)
			);
			$this->start_controls_tabs(
				'arrows_background_normal_and_hover_state_control_tab',
				array(
					'separator' => 'before',
					'condition' => array( 'show_arrow' => 'yes' ),
				)
			);

			// Tab 1.
			$this->start_controls_tab(
				'arrows_background_normal_state_tab',
				array(
					'label'     => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
					'condition' => array( 'show_arrow' => 'yes' ),
				)
			);
			$this->add_responsive_control(
				'arrows_color',
				array(
					'label'       => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#007AFE',
					'condition'   => array( 'show_arrow' => 'yes' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation i'   => 'color:{{VALUE}};',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'fill:{{VALUE}};',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_background_color',
				array(
					'label'       => esc_html__( 'Arrows Background', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'condition'   => array( 'show_arrow' => 'yes' ),
					'default'     => '',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation i'   => 'background-color:{{VALUE}};',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'background-color:{{VALUE}};',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_background_border_size',
				array(
					'label'      => esc_html__( 'Arrows Background Border', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'range'      => array(
						'px' => array(
							'min'  => 1,
							'max'  => 1000,
							'step' => 1,
						),
					),
					'default'    => array(
						'size' => '',
						'unit' => 'px',
					),
					'size_units' => array( 'px' ),
					'condition'  => array( 'show_arrow' => 'yes' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'border: {{SIZE}}{{UNIT}} solid;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'border: {{SIZE}}{{UNIT}} solid;',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_background_border_color',
				array(
					'label'       => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'condition'   => array( 'show_arrow' => 'yes' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next' => 'border-color:{{VALUE}};',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'border-color:{{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();

			// Tab 2.
			$this->start_controls_tab(
				'arrows_background_border_hover_state_tab',
				array(
					'label'     => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
					'condition' => array( 'show_arrow' => 'yes' ),
				)
			);
			$this->add_responsive_control(
				'arrows_hover_color',
				array(
					'label'       => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'condition'   => array( 'show_arrow' => 'yes' ),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'color:{{VALUE}}; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'fill:{{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_background_hover_color',
				array(
					'label'       => esc_html__( 'Arrows Background', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'background-color:{{VALUE}}; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'background-color:{{VALUE}}; transition: 300ms;',
					),
					'condition'   => array( 'show_arrow' => 'yes' ),
				)
			);
			$this->add_responsive_control(
				'arrows_background_border_hover_size',
				array(
					'label'      => esc_html__( 'Arrows Background Border', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'range'      => array(
						'px' => array(
							'min'  => 1,
							'max'  => 1000,
							'step' => 1,
						),
					),
					'default'    => array(
						'size' => '',
						'unit' => 'px',
					),
					'size_units' => array( 'px' ),
					'condition'  => array( 'show_arrow' => 'yes' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'border: {{SIZE}}{{UNIT}} solid; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'border: {{SIZE}}{{UNIT}} solid; transition: 300ms;',
					),
				)
			);
			$this->add_responsive_control(
				'arrows_background_border_hover_color',
				array(
					'label'       => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'border-color:{{VALUE}}; transition: 300ms;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg:hover' => 'border-color:{{VALUE}}; transition: 300ms;',
					),
					'condition'   => array( 'show_arrow' => 'yes' ),
				)
			);
			$this->add_responsive_control(
				'arrows_transition_duration',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration ( ms ) ', 'wpmozo-addons-lite-for-elementor' ),
					'range'     => array(
						'ms' => array(
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						),
					),
					'default'   => array(
						'size' => 300,
						'unit' => 'ms',
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .wpmozo_swiper_layout_icon_next:hover' => 'transition: color {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, right 300ms ease, left 300ms ease, visibility 300ms ease, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;',
						'{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'transition: fill {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, right 300ms ease, left 300ms ease, visibility 300ms ease, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'control_dot_active_color',
				array(
					'label'       => esc_html__( 'Active Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#000',
					'separator'   => 'before',
					'selectors'   => array( '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet-active-main, {{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background : {{VALUE}};' ),
					'condition'   => array( 'show_control_dot' => 'yes' ),
				)
			);
			$this->add_responsive_control(
				'control_dot_inactive_color',
				array(
					'label'       => esc_html__( 'Inactive Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#cccccc',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet' => 'background: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullets-dynamic' => 'left: 0% !important; transform: translateX(0%) !important;',
					),
					'condition'   => array( 'show_control_dot' => 'yes' ),
				)
			);
			$this->end_controls_section();
			$this->start_controls_section(
				'title_section',
				array(
					'label' => esc_html__( 'Title Text', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_control(
				'heading_level',
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
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'heading_text_shadow',
					'label'     => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title',
					'separator' => 'before',
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
			$this->add_responsive_control(
				'title_color',
				array(
					'label'     => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title a' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'title_typography',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title a,{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title',
				)
			);

			$this->end_controls_tab();
			$this->start_controls_tab(
				'post_heading_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'title_color_hover',
				array(
					'label'     => esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title a:hover' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'title_typography_hover',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title a:hover,{{WRAPPER}} .wpmozo_advanced_blog_slider_post_title:hover',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'body_section',
				array(
					'label' => esc_html__( 'Body Text', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'body_alignment',
				array(
					'label'     => esc_html__( 'Body Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_content' => 'text-align: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'body_text_shadow',
					'label'     => esc_html__( 'Body Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_advanced_blog_slider_content',
					'separator' => 'before',
				)
			);
			$this->start_controls_tabs(
				'post_content_tabs'
			);
			$this->start_controls_tab(
				'post_content_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_responsive_control(
				'body_color',
				array(
					'label'     => esc_html__( 'Body Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_content' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'body_typography',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_content',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'post_content_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_responsive_control(
				'body_color_hover',
				array(
					'label'     => esc_html__( 'Body Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_content:hover' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'body_typography_hover',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_content:hover',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'post_meta_section',
				array(
					'label' => esc_html__( 'Post Meta Text', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'meta_text_alignment',
				array(
					'label'     => esc_html__( 'Meta Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span' => 'justify-content: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'meta_text_shadow',
					'label'     => esc_html__( 'Meta Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span',
					'separator' => 'before',
				)
			);
			$this->start_controls_tabs(
				'post_meta_tabs'
			);
			$this->start_controls_tab(
				'post_meta_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'meta_text_color',
				array(
					'label'     => esc_html__( 'Meta Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span, {{WRAPPER}} .wpmozo_advanced_blog_slider_meta span.author a' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'meta_text_typography',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span, {{WRAPPER}} .wpmozo_advanced_blog_slider_meta span.author a',
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'post_meta_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'meta_text_color_hover',
				array(
					'label'     => esc_html__( 'Meta Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span:hover, {{WRAPPER}} .wpmozo_advanced_blog_slider_meta span.author a:hover' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px; transition: 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'meta_text_typography_hover',
					'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_advanced_blog_slider_meta span:hover, {{WRAPPER}} .wpmozo_advanced_blog_slider_meta span.author a:hover',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
			$this->start_controls_section(
				'read_more_style_section',
				array(
					'label' => esc_html__( 'Read More', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'read_more_alignment',
				array(
					'label'     => esc_html__( 'Read More Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
						'show_button_icon'    => 'yes',
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
						'{{WRAPPER}} .wpmozo_readmore_button' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_readmore_button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button' => 'border-color: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button' => 'border-radius: {{SIZE}}{{UNIT}};transition: all 300ms;',
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
						'show_button_icon'    => 'yes',
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_readmore_button svg' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_readmore_button i'   => 'color: {{VALUE}};',
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
						'top'    => '10',
						'right'  => '10',
						'bottom' => '10',
						'left'   => '10',
						'unit'   => 'px',
					),
					'separator'  => 'after',
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
						'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_readmore_button:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border-color: {{VALUE}};',
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
						'show_button_icon'    => 'yes',
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_readmore_button:hover svg' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_readmore_button:hover i' => 'color: {{VALUE}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'{{WRAPPER}} .wpmozo_readmore_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_section();

			/** Custom functions **/
			function wpmozo_get_blog_posts_categories() {
				$terms           = get_terms(
					array(
						'taxonomy'   => 'category',
						'hide_empty' => false,
					)
				);
				$dynamic_options = array();
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$dynamic_options[ $term->term_id ] = $term->name;
					}
				}
				return $dynamic_options;
			}
