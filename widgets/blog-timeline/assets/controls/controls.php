<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;

$taxonomies = get_taxonomies( array(), 'objects' );
// Check for the category taxonomy
$category_taxonomy = 'category'; // Taxonomy you want to include
// Content tab.
$this->start_controls_section(
	'query_section',
	array(
		'label' 	=> esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_CONTENT,
	)
);

if ( isset( $taxonomies[$category_taxonomy] ) ) {
	$object = $taxonomies[$category_taxonomy];

	// Add the control for category IDs
	$this->add_control(
		$category_taxonomy . '_ids',
		array(
			'label' 		=> $object->label,
			'type' 			=> 'wpmozo-select',
			'label_block' 	=> true,
			'multiple' 		=> true,
			'source_name' 	=> 'taxonomy',
			'source_type' 	=> $category_taxonomy,
		)
	);
}
$this->add_control(
	'posts_number',
	array(
		'label' 	=> esc_html__( 'Post Count', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::NUMBER,
		'default' 	=> 3,
	)
);
$this->add_control(
	'post_order_by',
	array(
		'label' 			=> esc_html__( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
		'type' 				=> Controls_Manager::SELECT,
		'options' 			=> array(
				'ID' 			=> esc_html__( 'Post ID', 'wpmozo-addons-lite-for-elementor' ),
				'author' 		=> esc_html__( 'Post Author', 'wpmozo-addons-lite-for-elementor' ),
				'title' 		=> esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
				'date' 			=> esc_html__( 'Date', 'wpmozo-addons-lite-for-elementor' ),
				'modified' 		=> esc_html__( 'Last Modified Date', 'wpmozo-addons-lite-for-elementor' ),
				'parent' 		=> esc_html__( 'Parent Id', 'wpmozo-addons-lite-for-elementor' ),
				'rand' 			=> esc_html__( 'Random', 'wpmozo-addons-lite-for-elementor' ),
				'comment_count' => esc_html__( 'Comment Count', 'wpmozo-addons-lite-for-elementor' ),
				'menu_order' 	=> esc_html__( 'Menu Order', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' 			=> 'date',
	)
);

$this->add_control(
	'post_order',
	array(
		'label' 		=> esc_html__( 'Order', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SELECT2,
		'options' 		=> array(
			'asc' 	=> 'Ascending',
			'desc'	=> 'Descending',
		),
		'default' 		=> 'desc',
	)
);

$this->add_control(
	'offset',
	array(
		'label' 				=> esc_html__(' Offset', 'wpmozo-addons-lite-for-elementor' ),
		'type' 					=> Controls_Manager::NUMBER,
		'default' 				=> 0,
		'condition' 			=> array(
			'post_order_by!' 	=> 'rand',
		),
	)
);

$this->add_control(
	'meta_date',
	array(
		'label' 		=> esc_html__( 'Meta Date Format', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::TEXT,
		'label_block' 	=> true,
		'default' 		=> 'M j, Y',
		'description' 	=> esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'wpmozo-addons-lite-for-elementor' ),
	)
);

$this->add_control(
	'no_results_text',
	array(
		'label' 	=> esc_html__( 'No Results Text', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::TEXT,
	)
);

$this->add_control(
	'ignore_sticky_posts',
	array(
		'label' 		=> esc_html__( 'Ignore Sticky Posts', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'no',
		'return_value' 	=> 'yes',
	)
);

$this->add_control(
	'show_content',
	array(
		'label' 		=> esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SELECT,
		'options' 		=> array(
			'excerpt' => esc_html__( 'Show Excerpt', 'wpmozo-addons-lite-for-elementor' ),
			'content' => esc_html__( 'Show Content', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' 		=> 'excerpt',
	)
);

$this->add_control(
	'excerpt_length',
	array(
		'label' 	=> esc_html__( 'Excerpt Length', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::NUMBER,
		'min' 		=> 0,
		'max' 		=> 1000,
		'step' 		=> 5,
		'default' 	=> 100,
		'condition' => array(
			'show_content' 	=> 'excerpt',
		),
	)
);

$this->end_controls_section();

// Elements.
$this->start_controls_section(
	'section_elements',
	array(
		'label' 	=> esc_html__( 'Elements', 'wpmozo-addons-lite-for-elementor' ),
	)
);

$this->add_control(
	'show_thumbnail',
	array(
		'label' 		=> esc_html__( 'Show Featured Image', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
	)
);

$this->add_control(
	'featured_image_size',
	array(
		'label' 	=> esc_html__( 'Featured Image Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::SELECT,
		'options' 	=> array(
			'medium' 	=> esc_html__( 'Medium', 'wpmozo-addons-lite-for-elementor' ),
			'large' 	=> esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
			'full' 		=> esc_html__( 'Full', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' 	=> 'large',
	)
);

$this->add_control(
	'show_more',
	array(
		'label' 		=> esc_html__( 'Show Read More Link', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
		'condition' 	=> array(
			'show_content' 	=> 'excerpt',
		),
	)
);

$this->add_control(
	'read_more_text',
	array(
		'label' 		=> esc_html__( 'Read More Text', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::TEXT,
		'label_block' 	=> true,
		'default' 		=> 'Read More',
		'condition' 	=> array(
			'show_more' 	=> 'yes',
			'show_content' 	=> 'excerpt',
		),
	)
);

$this->add_control(
	'show_author',
	array(
		'label' 		=> esc_html__( 'Show Author', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
	)
);

$this->add_control(
	'show_date',
	array(
		'label' 		=> esc_html__( 'Show Date', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
	)
);

$this->add_control(
	'show_categories',
	array(
		'label' 		=> esc_html__( 'Show Categories/Terms', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
	)
);

$this->add_control(
	'show_comments',
	array(
		'label' 		=> esc_html__( 'Show Comment Count', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'yes',
		'return_value' 	=> 'yes',
	)
);

$this->end_controls_section();

// General styling tab.
$this->start_controls_section(
	'layout_section',
	array(
		'label' 	=> esc_html__( 'Timeline Layout', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'timeline_layout',
	array(
		'label' 		=> esc_html__( 'Select Layout', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'type' 			=> Controls_Manager::SELECT,
		'options' 		=> array(
			'layout1' 	=> esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
			'layout2' 	=> esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' 		=> 'layout1',
	)
);
$this->add_control(
	'timeline_layout_option',
	array(
		'label' 		=> esc_html__( 'Select Option', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'type' 			=> Controls_Manager::SELECT,
		'options' 		=> array(
			'alternate' => esc_html__( 'Alternate', 'wpmozo-addons-lite-for-elementor' ),
			'right' 	=> esc_html__( 'Content Right', 'wpmozo-addons-lite-for-elementor' ),
			'left' 		=> esc_html__( 'Content Left', 'wpmozo-addons-lite-for-elementor' ),
		),
		'default' 		=> 'alternate',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'icon_styling_section',
	array(
		'label' 	=> esc_html__( 'Timeline Icon Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'timeline_icon',
	array(
		'label' 		=> esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::ICONS,
		'default' 		=> array(
			'value' 	=> 'fas fa-angle-double-down',
			'library' 	=> 'fa-solid',
		),
	)
);

$this->add_responsive_control(
	'timeline_icon_font_size',
	array(
		'label' => esc_html__( 'Icon Font Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 	=> Controls_Manager::SLIDER,
		'range' => array(
			'px' 	=> array(
				'min' 	=> 6,
				'max' 	=> 300,
			),
		),
		'default' 	=> array(
				'unit' 	=> 'px',
				'size' 	=> 20,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post span.timeline_icon' => 'font-size: {{SIZE}}{{UNIT}};',

			'{{WRAPPER}} .wpmozo_blog_timeline_post .timeline_icon, {{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',

			'{{WRAPPER}} .wpmozo_blog_timeline .wpmozo_stem_wrapper.wpmozo_blog_timeline_right_stem' => 'left: calc( {{SIZE}}{{UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} );',

			'{{WRAPPER}} .wpmozo_blog_timeline .wpmozo_stem_wrapper.wpmozo_blog_timeline_left_stem' => 'right: calc( {{SIZE}}{{UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} );',

			'{{WRAPPER}} .wpmozo_blog_timeline .circle .wpmozo_stem_wrapper.wpmozo_blog_timeline_left_stem,{{WRAPPER}} .wpmozo_blog_timeline .square .wpmozo_stem_wrapper.wpmozo_blog_timeline_left_stem' => 'right: calc( {{SIZE}}{{UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} );',

			'{{WRAPPER}} .wpmozo_blog_timeline .circle .wpmozo_stem_wrapper.wpmozo_blog_timeline_right_stem,{{WRAPPER}} .wpmozo_blog_timeline .square .wpmozo_stem_wrapper.wpmozo_blog_timeline_right_stem' => 'left: calc( {{SIZE}}{{UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} );',
		),
	)
);
$this->add_control(
	'icon_shape',
	array(
		'label' 		=> esc_html__( 'Icon Shape', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'render_type' 	=> 'template',
		'type' 			=> Controls_Manager::SELECT,
		'options' 		=> array(
			'none' 			=> esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
			'circle' 		=> esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),
			'square' 		=> esc_html__( 'Square', 'wpmozo-addons-lite-for-elementor' ),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline .wpmozo_blog_timeline_wrapper.circle .wpmozo_blog_timeline_stem_center' => 'border-radius: 50%; overflow:hidden;',
		),
		'default' 		=> 'none',
	)
);
$this->add_control(
	'icon_shape_border',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'default' 		=> 'no',
		'return_value' 	=> 'yes',
		'condition' 	=> array(
			'icon_shape!' 	=> 'none',
		),
	)
);
$this->add_control(
	'icon_shape_border_size',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'render_type' 	=> 'template',
		'range' 		=> array(
			'px' 	=> array(
				'min' 	=> 1,
				'max' 	=> 30,
			),
		),
		'default' 		=> array(
			'unit' 	=> 'px',
			'size' 	=> 2,
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
			'{{WRAPPER}} .wpmozo_blog_timeline .circle .wpmozo_stem_wrapper.wpmozo_blog_timeline_left_stem,{{WRAPPER}} .wpmozo_blog_timeline .square .wpmozo_stem_wrapper.wpmozo_blog_timeline_left_stem' => 'right: calc( {{timeline_icon_font_size.SIZE}}{{timeline_icon_font_size.UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} + {{SIZE}}{{UNIT}} );',
			'{{WRAPPER}} .wpmozo_blog_timeline .circle .wpmozo_stem_wrapper.wpmozo_blog_timeline_right_stem,{{WRAPPER}} .wpmozo_blog_timeline .square .wpmozo_stem_wrapper.wpmozo_blog_timeline_right_stem' => 'left: calc( {{timeline_icon_font_size.SIZE}}{{timeline_icon_font_size.UNIT}} / 2 + {{icon_shape_padding.SIZE}}{{icon_shape_padding.UNIT}} + {{SIZE}}{{UNIT}} );',
		),
		'condition' 	=> array(
			'icon_shape!' 		=> 'none',
			'icon_shape_border' => 'yes',
		),
	)
);
$this->add_responsive_control(
	'icon_shape_padding',
	array(
		'label' 		=> esc_html__( 'Icon Shape Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'render_type' 	=> 'template',
		'range' 		=> array(
			'px' 	=> array(
				'min' 	=> 0,
				'max' 	=> 100,
			),
		),
		'default' 		=> array(
			'unit' 	=> 'px',
			'size' 	=> 0,
		),
		'size_units' 	=> array('px', 'em', '%'),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center' => 'padding: {{SIZE}}{{UNIT}};',
		),
		'condition' => array(
			'icon_shape!' => 'none'
		),
	)
);
$this->start_controls_tabs(
	'timeline_icon_styling_tabs'
);
$this->start_controls_tab(
	'timeline_icon_styling_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'timeline_icon_color',
	array(
		'label' 	=> esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'default'   => '#ccc',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post span.timeline_icon' 	=> 'color: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_blog_timeline_post svg.timeline_icon' 	=> 'color: {{VALUE}}; fill: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_control(
	'timeline_icon_fill_color',
	array(
		'label' 		=> esc_html__( 'Icon Fill Color(On Scroll)', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'default'       => '#000',
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill span.timeline_icon' 	=> 'color: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill svg.timeline_icon' 	=> 'color: {{VALUE}}; fill: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_control(
	'icon_shape_background_color',
	array(
		'label' 		=> esc_html__( 'Icon Shape Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center' 	=> 'background-color: {{VALUE}}; transition: 300ms;'
		),
		'condition' 	=> array(
			'icon_shape!' 	=> 'none',
		),
	)
);
$this->add_control(
	'icon_shape_background_fill_color',
	array(
		'label' 		=> esc_html__( 'Icon Shape Background Fill Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center' 	=> 'background-color: {{VALUE}}; transition: 300ms;'
		),
		'condition' 	=> array(
			'icon_shape!' 	=> 'none',
		),
	)
);
$this->add_control(
	'icon_shape_border_color',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center' 	=> 'border-color: {{VALUE}};'
		),
		'condition' 	=> array(
			'icon_shape!' 		=> 'none',
			'icon_shape_border' => 'yes',
		),
	)
);
$this->add_control(
	'icon_shape_border_fill_color',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border Fill Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center' 	=> 'border-color: {{VALUE}};'
		),
		'condition' 	=> array(
			'icon_shape!' 		=> 'none',
			'icon_shape_border' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'timeline_icon_styling_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_control(
	'timeline_icon_color_hover',
	array(
		'label' 		=> esc_html__( 'Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center:hover span.timeline_icon' 	=> 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center:hover svg.timeline_icon' => 'color: {{VALUE}}; fill: {{VALUE}};',
		),
	)
);
$this->add_control(
	'timeline_icon_fill_color_hover',
	array(
		'label' 	=> esc_html__( 'Icon Fill Color(On Scroll)', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center:hover span.timeline_icon' 		=> 'color: {{VALUE}};',
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center:hover svg.timeline_icon' 	=> 'color: {{VALUE}}; fill: {{VALUE}};',
		),
	)
);
$this->add_control(
	'icon_shape_background_color_hover',
	array(
		'label' 	=> esc_html__( 'Icon Shape Background Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center:hover' 	=> 'background-color: {{VALUE}}; transition: 300ms;'
		),
		'condition' => array(
			'icon_shape!' 	=> 'none',
		),
	)
);
$this->add_control(
	'icon_shape_background_fill_color_hover',
	array(
		'label' 		=> esc_html__( 'Icon Shape Background Fill Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center:hover' => 'background-color: {{VALUE}}; transition: 300ms;'
		),
		'condition' 	=> array(
			'icon_shape!' 	=> 'none',
		),
	)
);
$this->add_control(
	'icon_shape_border_color_hover',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post .wpmozo_blog_timeline_stem_center:hover' 	=> 'border-color: {{VALUE}};'
		),
		'condition' 	=> array(
			'icon_shape!' 		=> 'none',
			'icon_shape_border' => 'yes',
		),
	)
);
$this->add_control(
	'icon_shape_border_fill_color_hover',
	array(
		'label' 		=> esc_html__( 'Icon Shape Border Fill Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post.wpmozo_icon_fill .wpmozo_blog_timeline_stem_center:hover' 	=> 'border-color: {{VALUE}};'
		),
		'condition' 	=> array(
			'icon_shape!' 		=> 'none',
			'icon_shape_border' => 'yes',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'stem_styling_section',
	array(
		'label' 	=> esc_html__( 'Timeline Stem Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'timeline_stem_width',
	array(
		'label' 	=> esc_html__( 'Timeline Stem Width', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::SLIDER,
		'range' 	=> array(
			'px' 		=> array(
					'min' => 1,
					'max' => 30,
			),
		),
		'default' 	=> array(
			'unit' 		=> 'px',
			'size' 		=> 2,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_stem_wrapper' 	=> 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_control(
	'timeline_stem_color',
	array(
		'label' 		=> esc_html__( 'Stem Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'default' 		=> '#eee',
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_stem_wrapper' 	=> 'background: {{VALUE}};',
		),
	)
);
$this->add_control(
	'timeline_stem_fill_color',
	array(
		'label' 	=> esc_html__( 'Stem Fill Color(On Scroll)', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'default' 	=> '#000000',
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_stem' => 'background: {{VALUE}};',
		),
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'post_styling_section',
	array(
		'label' 	=> esc_html__( 'Timeline Post Styling', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'post_border_radius',
	array(
		'label' 		=> esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::DIMENSIONS,
		'size_units' 	=> array('px', 'em', '%'),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_content_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'timeline_featured_image_size',
	array(
		'label' 	=> esc_html__( 'Featured Image Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::SLIDER,
		'range' 	=> array(
			'%' 	=> array(
				'min' 	=> 0,
				'max' 	=> 100,
			),
		),
		'default' 	=> array(
			'unit' 		=> '%',
			'size' 		=> 100,
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_image_link' => 'width: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'featured_image_alignment',
	array(
		'label' 	=> esc_html__( 'Featured Image Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::CHOOSE,
		'options' 	=> array(
			'flex-start' => array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' 	 => array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'flex-end' 	 => array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_image_wrapper' => 'justify-content: {{VALUE}} !important;',
		),
	)
);
$this->add_responsive_control(
	'timeline_padding',
	array(
		'label' 		=> esc_html__( 'Timeline Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::DIMENSIONS,
		'size_units' 	=> array('px', 'em', '%'),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_content .wpmozo_blog_timeline_content_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name' 		=> 'timeline_background',
		'label' 	=> esc_html__( 'Timeline Background', 'wpmozo-addons-lite-for-elementor' ),
		'types' 	=> array('classic', 'gradient'),
		'toggle' 	=> true,
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_content_wrapper, {{WRAPPER}} .wpmozo_blog_timeline_triangle',
	)
);
$this->end_controls_section();
$this->start_controls_section(
	'title_section',
	array(
		'label' 	=> esc_html__( 'Post Heading', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_control(
	'heading_level',
	array(
		'label' 		=> esc_html__( 'Title Heading Level', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::CHOOSE,
		'label_block' 	=> true,
		'options' 		=> array(
			'h1' => array(
				'title' 	=> esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h1',
			),
			'h2' => array(
				'title' 	=> esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h2',
			),
			'h3' => array(
				'title' 	=> esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h3',
			),
			'h4' => array(
				'title' 	=> esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h4',
			),
			'h5' => array(
				'title' 	=> esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h5',
			),
			'h6' => array(
				'title' 	=> esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-editor-h6',
			),
		),
		'default' 		=> 'h2',
		'toggle' 		=> true,
	)
);

$this->add_responsive_control(
	'title_alignment',
	array(
		'label' 		=> esc_html__( 'Title Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::CHOOSE,
		'options' 		=> array(
			'left' 	 => array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' => array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'right'  => array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_title' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name' 		=> 'heading_text_shadow',
		'label' 	=> esc_html__( 'Title Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_blog_timeline_post_title',
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
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'title_typography',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_post_title, {{WRAPPER}} .wpmozo_blog_timeline_post_title a',
	)
);

$this->add_responsive_control(
	'title_color',
	array(
		'label' 	=> esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_title,{{WRAPPER}} .wpmozo_blog_timeline_post_title a' => 'color: {{VALUE}}; transition: 300ms;',
		),
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
		'name' 		=> 'title_typography_hover',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_post_title:hover a',
	)
);

$this->add_responsive_control(
	'title_color_hover',
	array(
		'label' 	=> esc_html__( 'Title Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_title:hover a' => 'color: {{VALUE}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'body_section',
	array(
		'label' => esc_html__( 'Post Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab' => Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'body_alignment',
	array(
		'label' 		=> esc_html__( 'Body Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::CHOOSE,
		'options' 		=> array(
			'left' 	 => array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' => array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'right'  => array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors'  	=> array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner' => 'text-align: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name' 		=> 'body_text_shadow',
		'label' 	=> esc_html__( 'Body Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner',
		'separator' => 'before',
	)
);
$this->start_controls_tabs(
	'post_content_tabs'
);
$this->start_controls_tab(
	'post_content_normal_tab',
	array(
		'label' 	=> esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'body_typography',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner',
	)
);

$this->add_responsive_control(
	'body_color',
	array(
		'label' 	=> esc_html__( 'Body Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'post_content_hover_tab',
	array(
		'label' 	=> esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'body_typography_hover',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner:hover',
	)
);

$this->add_responsive_control(
	'body_color_hover',
	array(
		'label' 	=> esc_html__( 'Body Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_post_content_inner:hover' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'post_date_section',
	array(
		'label' 	=> esc_html__( 'Post Date', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'meta_date_text_alignment',
	array(
		'label' 	=> esc_html__( 'Date Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::CHOOSE,
		'options' 	=> array(
			'left' 		=> array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' 	=> array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'right' 	=> array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_wrapper .wpmozo_blog_timeline_post .wpmozo_blog_timeline_outer_container .wpmozo_blog_timeline_meta_date, {{WRAPPER}} .wpmozo_blog_timeline_wrapper .wpmozo_blog_timeline_post .wpmozo_blog_timeline_post_content .wpmozo_blog_timeline_meta_date' => 'text-align: {{VALUE}};',
		),
	)
);

$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name' 		=> 'meta_date_text_shadow',
		'label' 	=> esc_html__( 'Date Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta_date span',
		'separator' => 'before',
	)
);
$this->start_controls_tabs(
	'meta_date_tabs'
);
$this->start_controls_tab(
	'meta_date_normal_tab',
	array(
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'meta_date_text_color',
	array(
		'label' 	=> esc_html__( 'Date Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_meta_date span' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'meta_date_text_typography',
		'label' 	=> esc_html__( 'Date Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta_date span',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'meta_date_hover_tab',
	array(
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'meta_date_text_color_hover',
	array(
		'label' 	=> esc_html__( 'Date Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_meta_date span:hover' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'meta_date_text_typography_hover',
		'label' 	=> esc_html__( 'Date Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta_date span:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'post_meta_section',
	array(
		'label' 	=> esc_html__( 'Post Meta', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'meta_text_alignment',
	array(
		'label' 		=> esc_html__( 'Meta Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::CHOOSE,
		'options' 		=> array(
			'left' 	 => array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' => array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'right'  => array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_meta' => 'justify-content: {{VALUE}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'name' 		=> 'meta_text_shadow',
		'label' 	=> esc_html__( 'Meta Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta span',
		'separator' => 'before',
	)
);
$this->start_controls_tabs(
	'post_meta_tabs'
);
$this->start_controls_tab(
	'post_meta_normal_tab',
	array(
		'label' 	=> esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'meta_text_color',
	array(
		'label' 	=> esc_html__( 'Meta Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_meta span, {{WRAPPER}} .wpmozo_blog_timeline_meta span a' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'meta_text_typography',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta span',
		'{{WRAPPER}} .wpmozo_blog_timeline_meta span a',
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'post_meta_hover_tab',
	array(
		'label' 	=> esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	)
);
$this->add_responsive_control(
	'meta_text_color_hover',
	array(
		'label' 	=> esc_html__( 'Meta Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_blog_timeline_meta span:hover, {{WRAPPER}} .wpmozo_blog_timeline_meta span a:hover' => 'color: {{VALUE}}; padding: 1px 1px; border-radius: 4px; transition: 300ms;',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'name' 		=> 'meta_text_typography_hover',
		'label' 	=> esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' 	=> '{{WRAPPER}} .wpmozo_blog_timeline_meta span:hover',
		'{{WRAPPER}} .wpmozo_blog_timeline_meta span a:hover',
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section(
	'read_more_style_section',
	array(
		'label' 	=> esc_html__( 'Read More', 'wpmozo-addons-lite-for-elementor' ),
		'tab' 		=> Controls_Manager::TAB_STYLE,
	)
);
$this->add_responsive_control(
	'read_more_alignment',
	array(
		'label' 	=> esc_html__( 'Read More Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::CHOOSE,
		'options' 	=> array(
			'left' 		=> array(
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-left',
			),
			'center' 	=> array(
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-center',
			),
			'right' 	=> array(
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 		=> 'eicon-text-align-right',
			),
		),
		'selectors'  => array(
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper' => 'text-align: {{VALUE}};',
		),
	)
);

$this->add_control(
	'button_custom_style',
	array(
		'label' 		=> esc_html__( 'Use Custom Style For Button', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'label_on' 		=> esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' 	=> esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' 	=> 'yes',
		'default' 		=> 'no',
	)
);
$this->add_responsive_control(
	'show_button_icon',
	array(
		'label' 		=> esc_html__( 'Show Button Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'label_on' 		=> esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
		'label_off' 	=> esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' 	=> 'yes',
		'default' 		=> 'no',
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
	)
);
$this->add_responsive_control(
	'button_icon',
	array(
		'label' 		=> esc_html__( 'Button Icon', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::ICONS,
		'default' 		=> array(
			'value'   => 'far fa-star',
			'library' => 'fa-regular',
		),
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes',
			'show_button_icon' 		=> 'yes',
		),
	)
);

$this->add_responsive_control(
	'button_icon_placement',
	array(
		'label' 		=> esc_html__( 'Button Icon Placement', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::CHOOSE,
		'options' 		=> array(
			'row-reverse' 			=> array(
				'title' 		=> esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
				'icon' 			=> 'eicon-angle-left',
			),
			'row' 					=> array(
				'title' 		=> esc_html__( 'After', 'wpmozo-addons-lite-for-elementor'),
				'icon' 			=> 'eicon-angle-right',
			),
		),
		'render_type' 	=> 'template',
		'default' 		=> 'row-reverse',
		'prefix_class' 	=> 'icon_',
		'toggle' 		=> false,
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'flex-flow:{{VALUE}}; gap:5px;'
		),
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes',
			'show_button_icon' 		=> 'yes',
		),
	)
);
$this->add_responsive_control(
	'show_button_icon_on_hover',
	array(
		'label' 		=> esc_html__( 'Only Show Icon On Hover For Button', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SWITCHER,
		'label_off' 	=> esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
		'label_on' 		=> esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
		'return_value' 	=> 'yes',
		'default' 		=> '',
		'selectors' 	=> array(
			'{{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg' 				=> 'opacity: 0; transition: all 300ms; margin-right: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row-reverse .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg' 	=> 'opacity: 1; margin-right:0;',
			'{{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button svg' 								=> 'opacity: 0; transition: all 300ms; margin-left: -{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover .wpmozo_button_icon, {{WRAPPER}} .icon_row .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover svg' 					=> 'opacity: 1; margin-left:0;',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button .wpmozo_button_icon' 																															=> ' min-width:{{button_text_size.SIZE}}{{button_text_size.UNIT}};',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button'						 																														=> 'gap:0px;',
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper .wpmozo_readmore_button:hover' 																																		=> 'gap:5px;',

		),
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes',
			'show_button_icon' 		=> 'yes',
		),
	)
);
$this->add_group_control(
	Group_Control_Text_Shadow::get_type(),
	array(
		'label' 		=> esc_html__( 'Button Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'name' 			=> 'button_text_shadow',
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selector' 		=> '{{WRAPPER}} .wpmozo_readmore_button',
	)
);
$this->start_controls_tabs(
	'button_tab'
);
$this->start_controls_tab(
	'button_tab_normal',
	array(
		'label' 	=> esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		'condition' => array(
			'button_custom_style' 	=> 'yes'
		),
	)
);
$this->add_responsive_control(
	'button_text_size',
	array(
		'label' 		=> esc_html__( 'Button Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', 'em'),
		'range' 		=> array(
			'px' 	=> array(
				'min' => 1,
				'max' => 100,
			),
			'em' 	=> array(
				'min' => 1,
				'max' => 10,
			),
		),
		'default' 		=> array(
			'unit' 	=> 'px',
			'size' 	=> 16,
		),
		'condition'  	=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button' 		=> 'font-size: {{SIZE}}{{UNIT}};',
			'{{WRAPPER}} .wpmozo_readmore_button svg' 	=> 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_text_color',
	array(
		'label' 	=> esc_html__( 'Button Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 		=> Controls_Manager::COLOR,
		'condition' => array(
			'button_custom_style' => 'yes'
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name' 				=> 'button_background',
		'types' 			=> array('classic', 'gradient'),
		'fields_options' 	=> array(
			'background' 			=> array(
				'label' 		=> esc_html__( 'Button Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' 		=> 'classic',
			),
		),
		'toggle' 			=> false,
		'condition' 		=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selector' 			=> '{{WRAPPER}} .wpmozo_readmore_button',
	)
);
$this->add_responsive_control(
	'button_border_width',
	array(
		'label' 		=> esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', '%'),
		'range' 		=> array(
			'px' 	=> array(
				'min' 		=> 1,
				'max' 		=> 100,
			),
		),
		'default' 		=> array(
			'unit' 	=> 'px',
			'size' 	=> 2,
		),
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'border: {{SIZE}}{{UNIT}} solid;',
		),
	)
);
$this->add_responsive_control(
	'button_border_color',
	array(
		'label' 		=> esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'condition' 	=> array(
			'button_custom_style' 					=> 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button' 	=> 'border-color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_border_radius',
	array(
		'label' 		=> esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', '%'),
		'range' 		=> array(
			'px' 	=> array(
				'min' 	=> 1,
				'max' 	=> 100,
			),
		),
		'default' 	=> array(
			'unit' 		=> 'px',
			'size' 		=> 8,
		),
		'condition' => array(
			'button_custom_style' => 'yes'
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label' 		=> esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'name' 			=> 'button_typography',
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'exclude' 		=> array('font_size'),
		'selector' 		=> '{{WRAPPER}} .wpmozo_readmore_button',
	)
);
$this->add_responsive_control(
	'button_icon_color',
	array(
		'label' 		=> esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes',
			'show_button_icon' 		=> 'yes',
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button svg' 	=> 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_readmore_button i' 	=> 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_margin',
	array(
		'label' 		=> esc_html__( 'Button Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::DIMENSIONS,
		'size_units' 	=> array('px', '%', 'em', 'rem', 'custom'),
		'default' 		=> array(
			'top' 	 		=> 2,
			'right'			=> 0,
			'bottom' 		=> 2,
			'left' 			=> 0,
			'unit' 			=> 'px',
			'isLinked' 		=> false,
		),
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding',
	array(
		'label' 		=> esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::DIMENSIONS,
		'size_units' 	=> array('px', '%', 'em', 'rem', 'custom'),
		'default' 		=> array(
			'top' 			=> 10,
			'right' 		=> 20,
			'bottom' 		=> 10,
			'left' 			=> 20,
			'unit' 			=> 'px',
			'isLinked' 		=> false,
		),
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->start_controls_tab(
	'button_tab_hover',
	array(
		'label' 	=> esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		'condition' => array(
			'button_custom_style' 	=> 'yes'
		),
	)
);
$this->add_responsive_control(
	'button_text_size_hover',
	array(
		'label' 		=> esc_html__( 'Button Text Size', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', 'em'),
		'range' 		=> array(
			'px' 	=> array(
				'min' 		=> 1,
				'max' 		=> 100,
			),
			'em' 	=> array(
				'min' 		=> 1,
				'max' 		=> 10,
			),
		),
		'condition' => array(
			'button_custom_style' => 'yes'
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' 	=> 'font-size: {{SIZE}}{{UNIT}}',
			'{{WRAPPER}} .wpmozo_readmore_button svg:hover' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_text_color_hover',
	array(
		'label' 		=> esc_html__( 'Button Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' 	=> 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);

$this->add_group_control(
	Group_Control_Background::get_type(),
	array(
		'name' 				=> 'button_background_hover',
		'types' 			=> array('classic', 'gradient'),
		'fields_options' 	=> array(
			'background' 		  => array(
				'label' 			=> esc_html__( 'Button Background', 'wpmozo-addons-lite-for-elementor' ),
				'default' 			=> 'classic',
			),
		),
		'toggle' 			=> false,
		'condition' 		=> array(
			'button_custom_style' => 'yes'
		),
		'selector' 			=> '{{WRAPPER}} .wpmozo_readmore_button:hover',
	)
);
$this->add_responsive_control(
	'button_border_width_hover',
	array(
		'label' 		=> esc_html__( 'Border Width', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', '%'),
		'range' 		=> array(
			'px' 	=> array(
				'min' 		=> 1,
				'max' 		=> 100,
			),
		),
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
		),
	)
);
$this->add_responsive_control(
	'button_border_color_hover',
	array(
		'label' 		=> esc_html__( 'Border Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border-color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_border_radius_hover',
	array(
		'label' 		=> esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::SLIDER,
		'size_units' 	=> array('px', '%'),
		'range' 		=> array(
			'px' 	=> array(
				'min' => 1,
				'max' => 100,
			),
		),
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
		),
	)
);
$this->add_group_control(
	Group_Control_Typography::get_type(),
	array(
		'label' 		=> esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
		'label_block' 	=> true,
		'name' 			=> 'button_typography_hover',
		'condition' 	=> array(
			'button_custom_style' => 'yes'
		),
		'exclude' 		=> array('font_size'),
		'selector' 		=> '{{WRAPPER}} .wpmozo_readmore_button:hover',
	)
);
$this->add_responsive_control(
	'button_icon_color_hover',
	array(
		'label' 		=> esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
		'type' 			=> Controls_Manager::COLOR,
		'condition' 	=> array(
			'button_custom_style' 	=> 'yes',
			'show_button_icon' 		=> 'yes',
		),
		'selectors' 	=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover svg' => 'fill: {{VALUE}}; transition: 300ms;',
			'{{WRAPPER}} .wpmozo_readmore_button:hover i' 	=> 'color: {{VALUE}}; transition: 300ms;',
		),
	)
);
$this->add_responsive_control(
	'button_margin_hover',
	array(
		'label' 			=> esc_html__( 'Button Margin', 'wpmozo-addons-lite-for-elementor' ),
		'type' 				=> Controls_Manager::DIMENSIONS,
		'size_units' 		=> array('px', '%', 'em', 'rem', 'custom'),
		'condition' 		=> array(
			'button_custom_style' => 'yes'
		),
		'selectors' => array(
			'{{WRAPPER}} .wpmozo_readmore_button_wrapper:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->add_responsive_control(
	'button_padding_hover',
	array(
		'label' 			=> esc_html__( 'Button Padding', 'wpmozo-addons-lite-for-elementor' ),
		'type' 				=> Controls_Manager::DIMENSIONS,
		'size_units' 		=> array('px', '%', 'em', 'rem', 'custom'),
		'condition' 		=> array(
			'button_custom_style' 	=> 'yes'
		),
		'selectors' 		=> array(
			'{{WRAPPER}} .wpmozo_readmore_button:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		),
	)
);
$this->end_controls_tab();
$this->end_controls_tabs();
$this->end_controls_section();
