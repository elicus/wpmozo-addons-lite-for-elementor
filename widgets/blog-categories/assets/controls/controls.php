<?php
/**
 * If this file is called directly, abort.
 */

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
				'count'         => esc_html__( 'Post Count', 'wpmozo-addons-lite-for-elementor' ),
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
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_categories .wpmozo_blog_categories_inner' => 'grid-template-columns: repeat( {{VALUE}} ,1fr) !important;',
		),
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
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_categories .wpmozo_blog_categories_inner' => 'gap: {{SIZE}}{{UNIT}} !important;',
		),
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
			'layout!'         => 'layout3',
		),
	)
);
$this->add_control(
	'post_count_text',
	array(
		'label'       => esc_html__( 'Post Count Text', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
		'placeholder' => esc_html__( 'Articles', 'wpmozo-addons-lite-for-elementor' ),
		'default'     => esc_html__( 'Articles', 'wpmozo-addons-lite-for-elementor' ),
		'condition'   => array(
			'show_post_count'       => 'yes',
			'show_as_super_number!' => 'yes',
			'layout!'               => 'layout3',
		),
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
			'{{WRAPPER}} .wpmozo_blog_category_name' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'      => 'heading_text_shadow',
		'label'     => esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_blog_category_name',
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
			'{{WRAPPER}} .wpmozo_blog_category_name' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'title_typography',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_blog_category_name',
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
			'{{WRAPPER}} .wpmozo_blog_category_name:hover' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'title_typography_hover',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_blog_category_name:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'post_count_section',
	array(
		'label' => esc_html__( 'Post Count', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'post_count_alignment',
	array(
		'label'     => esc_html__( 'Post Count Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
			'{{WRAPPER}} .wpmozo_blog_category_count_wrap' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_responsive_control(
	'post_count_margin',
	array(
		'label'      => esc_html__( 'Post Count Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'unit' => 'px',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_blog_category_count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'post_count_padding',
	array(
		'label'      => esc_html__( 'Post Count Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'unit' => 'px',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_blog_category_count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->start_controls_tabs(
	'post_count_style_tabs'
);
$this->start_controls_tab(
	'post_count_style_tab_normal',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'post_count_text_color',
	array(
		'label'     => esc_html__( 'Post Count Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_category_count' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'post_count_typography',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_blog_category_count',
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'post_count_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Post Count Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_blog_category_count',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'post_border',
		'selector'       => '{{WRAPPER}} .wpmozo_blog_category_count',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Post Count Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Post Count Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Post Count Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'post_border_radius',
	array(
		'label'       => esc_html__( 'Post Count Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_category_count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};overflow:hidden;transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'post_count_style_tab_hover',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'post_count_text_color_hover',
	array(
		'label'     => esc_html__( 'Post Count Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'      => Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_category_count:hover' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name'     => 'post_count_typography_hover',
		'label'    => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_blog_category_count:hover',
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'post_count_background_hover',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Post Count Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_blog_category_count:hover',
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'post_count_border_hover',
		'selector'       => '{{WRAPPER}} .wpmozo_blog_category_count:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Post Count Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Post Count Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Post Count Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'post_count_border_radius_hover',
	array(
		'label'       => esc_html__( 'Post Count Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_category_count:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name'      => 'post_count_text_shadow',
		'label'     => esc_html__( 'Post Count Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_blog_category_count',
		'separator' => 'before',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'thumbnail_settings',
	array(
		'label' => esc_html__( 'Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
		'condition' => array(
			'layout!'         => 'layout1',
		),
	)
);
$this->add_control(
	'thumbnail_custom_width',
	array(
		'label'        => esc_html__( 'Enable Thumbnail Custom Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
	)
);
$this->add_responsive_control(
	'image_width',
	array(
		'label'      => esc_html__( 'Image Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 100,
				'max' => 700,
			),
		),
		'default'    => array(
			'size' => 120,
			'unit' => 'px',
		),
		'condition'  => array(
			'thumbnail_custom_width' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_category_image_wrapper img' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'thumbnail_custom_height',
	array(
		'label'        => esc_html__( 'Enable Thumbnail Custom Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
	)
);
$this->add_responsive_control(
	'image_height',
	array(
		'label'      => esc_html__( 'Image Height', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::SLIDER,
		'size_units' => array( 'px' ),
		'range'      => array(
			'px' => array(
				'min' => 100,
				'max' => 700,
			),
		),
		'default'    => array(
			'size' => 120,
			'unit' => 'px',
		),
		'condition'  => array(
			'thumbnail_custom_height' => 'yes',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_category_image_wrapper img' => 'height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'thumbnail_padding',
	array(
		'label'      => esc_html__( 'Thumbnail Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'unit' => 'px',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_category_image_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'thumbnail_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_category_image_wrapper img',
		'fields_options' => array(
			'box-shadow' => array(
				'label' => esc_html__( 'Thumbnail Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->start_controls_tabs( 'thumbnail_styling_tabs' );
	$this->start_controls_tab(
		'thumbnail_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'thumbnail_border',
		'selector'       => '{{WRAPPER}} .wpmozo_category_image_wrapper img',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Thumbnail Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Thumbnail Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Thumbnail Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'thumbnail_border_radius',
	array(
		'label'       => esc_html__( 'Thumbnail Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_category_image_wrapper img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'thumbnail_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'thumbnail_hover_border',
		'selector'       => '{{WRAPPER}} .wpmozo_category_image_wrapper img:hover',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Thumbnail Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Thumbnail Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Thumbnail Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'thumbnail_hover_border_radius',
	array(
		'label'       => esc_html__( 'Thumbnail Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_category_image_wrapper img:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'category_item_settings',
	array(
		'label' => esc_html__( 'Category Item', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name'           => 'item_background',
		'types'          => array( 'classic', 'gradient' ),
		'fields_options' => array(
			'background' => array(
				'label'   => esc_html__( 'Item Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' => 'classic',
			),
		),
		'toggle'         => false,
		'selector'       => '{{WRAPPER}} .wpmozo_blog_categories_wrapper.layout1 .wpmozo_blog_category_item::before, {{WRAPPER}} .wpmozo_blog_categories_wrapper:not(.layout1) .wpmozo_blog_category_item',
	)
);
$this->add_responsive_control(
	'category_item_padding',
	array(
		'label'      => esc_html__( 'Item Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
		'default'    => array(
			'unit' => 'px',
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Box_Shadow::get_type(),
	array(
		'name'           => 'category_item_box_shadow',
		'selector'       => '{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item',
		'fields_options' => array(
			'box-shadow' => array(
				'label' => esc_html__( 'Item Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
			),
		),
	)
);
$this->start_controls_tabs( 'category_item_styling_tabs' );
	$this->start_controls_tab(
		'category_item_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'category_item_border',
		'selector'       => '{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Item Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Item Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Item Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'category_item_border_radius',
	array(
		'label'       => esc_html__( 'Item Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'category_item_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Border::get_type(),
	array(
		'name'           => 'category_item_hover_border',
		'selector'       => '{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item',
		'fields_options' => array(
			'border' => array( 'label' => esc_html__( 'Item Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
			'width'  => array( 'label' => esc_html__( 'Item Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
			'color'  => array( 'label' => esc_html__( 'Item Border Color', 'wpmozo-addons-lite-for-elementor' ) ),
		),
	)
);
$this->add_responsive_control(
	'category_item_hover_border_radius',
	array(
		'label'       => esc_html__( 'Item Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::DIMENSIONS,
		'label_block' => true,
		'size_units'  => array( 'px', 'em', '%' ),
		'selectors'   => array(
			'{{WRAPPER}} .wpmozo_blog_categories_wrapper .wpmozo_blog_category_item:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition:all 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
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
