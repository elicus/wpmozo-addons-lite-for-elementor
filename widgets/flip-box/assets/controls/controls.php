<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;

// Content tab.
$this->start_controls_section(
	'layout_section',
	array(
		'label' => esc_html__( 'Flip Box Layout', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

	$this->add_control(
		'flipbox_layout',
		array(
			'label'       => esc_html__( 'Accordion Trigger', 'wpmozo-addons-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'layout1' => esc_html__( 'Flip', 'wpmozo-addons-for-elementor' ),
				'layout2' => esc_html__( '3D Cube', 'wpmozo-addons-for-elementor' ),
			),
			'default'     => 'layout1',
		)
	);

	$this->add_control(
		'layout1_flip_style',
		array(
			'label'       => esc_html__( 'Flip Direction', 'wpmozo-addons-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'top'                   => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
				'bottom'                => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor' ),
				'left'                  => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'right'                 => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
				'diagonalLeft'          => esc_html__( 'Diagonal Left', 'wpmozo-addons-for-elementor' ),
				'diagonalRight'         => esc_html__( 'Diagonal Right', 'wpmozo-addons-for-elementor' ),
				'diagonalLeftInverted'  => esc_html__( 'Diagonal Left Inverted', 'wpmozo-addons-for-elementor' ),
				'diagonalRightInverted' => esc_html__( 'Diagonal Right Inverted', 'wpmozo-addons-for-elementor' ),
			),
			'default'     => 'top',
			'condition'   => array(
				'flipbox_layout' => 'layout1',
			),
		)
	);

	$this->add_responsive_control(
		'layout1_3d_depth',
		array(
			'label'                => esc_html__( '3D Depth Effect', 'wpmozo-addons-for-elementor' ),
			'type'                 => Controls_Manager::SWITCHER,
			'label_on'             => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
			'label_off'            => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
			'selectors_dictionary' => array(
				'yes' => 'translateZ(50px) scale(0.95);',
				''    => 'none',
			),
			'default'              => 'yes',
			'selectors'            => array(
				'{{WRAPPER}} .wpmozo_ae_flipbox_wrapper .wpmozo_ae_flipbox_inner' => 'transform: {{VALUE}}',
			),
			'condition'            => array(
				'flipbox_layout' => 'layout1',
			),
		)
	);

	$this->add_control(
		'layout1_shake_effect',
		array(
			'label'        => esc_html__( 'Shake on Flip', 'wpmozo-addons-for-elementor' ),
			'type'         => Controls_Manager::CHOOSE,
			'label_block'  => true,
			'options'      => array(
				'no'  => array(
					'title' => esc_html__( 'No', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-close',
				),
				'yes' => array(
					'title' => esc_html__( 'Yes', 'wpmozo-addons-for-elementor' ),
					'icon'  => 'eicon-check',
				),
			),
			'prefix_class' => 'wpmozo_ae_shake_effect-',
			'default'      => 'no',
			'toggle'       => false,
			'label_block'  => false,
			'condition'    => array(
				'flipbox_layout' => 'layout1',
			),
		)
	);

	$this->add_control(
		'layout2_flip_style',
		array(
			'label'       => esc_html__( 'Flip Direction', 'wpmozo-addons-for-elementor' ),
			'label_block' => true,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'top'    => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
				'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor' ),
				'left'   => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
				'right'  => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
			),
			'default'     => 'top',
			'condition'   => array(
				'flipbox_layout' => 'layout2',
			),
		)
	);

	$this->add_responsive_control(
		'flip_speed',
		array(
			'label'     => esc_html__( 'Flip Speed(in ms)', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'ms' => array(
					'min'  => 100,
					'max'  => 10000,
					'step' => 100,
				),
			),
			'default'   => array(
				'size' => 700,
				'unit' => 'ms',
			),
			'selectors' => array(
				'{{WRAPPER}}.wpmozo_ae_shake_effect-yes .wpmozo_ae_flipbox_side.el-transition' => 'transition: transform {{SIZE}}{{UNIT}} cubic-bezier(0.3, 0.9, 0.40, 1.3); -moz-transition: transform {{SIZE}}{{UNIT}} cubic-bezier(0.3, 0.9, 0.40, 1.3); -webkit-transition: transform {{SIZE}}{{UNIT}} cubic-bezier(0.3, 0.9, 0.40, 1.3);',
				'{{WRAPPER}}.wpmozo_ae_shake_effect-no .wpmozo_ae_flipbox_side.el-transition' => 'transition: transform {{SIZE}}{{UNIT}} cubic-bezier(.5, .3, .3, 1); -moz-transition: transform {{SIZE}}{{UNIT}} cubic-bezier(.5, .3, .3, 1); -webkit-transition: transform {{SIZE}}{{UNIT}} cubic-bezier(.5, .3, .3, 1);',
				'{{WRAPPER}}:not(.wpmozo_ae_shake_effect-no):not(.wpmozo_ae_shake_effect-yes) .wpmozo_ae_flipbox_wrapper.el-transition' => 'transition: transform {{SIZE}}{{UNIT}} ease; -moz-transition: transform {{SIZE}}{{UNIT}} ease; -webkit-transition: transform {{SIZE}}{{UNIT}} ease;',
			),
		)
	);

	$this->end_controls_section();

	$this->start_controls_section(
		'content_section',
		array(
			'label' => esc_html__( 'Flip Box Content', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$this->start_controls_tabs( 'flipbox_content_tabs' );

		// Front box content.
		$this->start_controls_tab(
			'flipbox_content_front',
			array(
				'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
			)
		);

			$this->add_control(
				'front_title',
				array(
					'label'       => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => esc_html__( 'Front Title', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_content',
				array(
					'label'       => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'default'     => esc_html__( 'Here you can set front text.', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->end_controls_tab();

			// Back box content.
			$this->start_controls_tab(
				'flipbox_content_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_title',
				array(
					'label'       => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => esc_html__( 'Back Title', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_content',
				array(
					'label'       => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'default'     => esc_html__( 'Here you can set back text.', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			$this->start_controls_section(
				'elements_section',
				array(
					'label' => esc_html__( 'Flip Box Elements', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				)
			);

			$this->start_controls_tabs( 'flipbox_elements_tabs' );

			// Front box elements.
			$this->start_controls_tab(
				'flipbox_elements_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_use_icon_image',
				array(
					'label'       => esc_html__( 'Use Image/Icon', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'none'  => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
						'icon'  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
						'image' => esc_html__( 'Image', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'icon',
				)
			);

			$this->add_control(
				'front_image',
				array(
					'label'       => esc_html__( 'Front Image', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::MEDIA,
					'label_block' => true,
					'default'     => array(
						'url' => '',
					),
					'condition'   => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->add_control(
				'front_icon_new',
				array(
					'label'     => esc_html__( 'Front Icon', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => array(
						'value'   => 'fas fa-star',
						'library' => 'fa-solid',
					),
					'condition' => array(
						'front_use_icon_image' => 'icon',
					),
				)
			);

			$this->add_control(
				'front_image_alt',
				array(
					'label'       => esc_html__( 'Front Image Alt Text', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => esc_html__( 'ALT text for your image.', 'wpmozo-addons-for-elementor' ),
					'condition'   => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->end_controls_tab();

			// Back box elements.
			$this->start_controls_tab(
				'flipbox_elements_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_use_icon_image',
				array(
					'label'       => esc_html__( 'Use Image/Icon', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'none'  => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
						'icon'  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
						'image' => esc_html__( 'Image', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'icon',
				)
			);

			$this->add_control(
				'back_image',
				array(
					'label'       => esc_html__( 'Back Image', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::MEDIA,
					'label_block' => true,
					'default'     => array(
						'url' => '',
					),
					'condition'   => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->add_control(
				'back_icon_new',
				array(
					'label'     => esc_html__( 'Back Icon', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => array(
						'value'   => 'fas fa-star',
						'library' => 'fa-solid',
					),
					'condition' => array(
						'back_use_icon_image' => 'icon',
					),
				)
			);

			$this->add_control(
				'back_image_alt',
				array(
					'label'       => esc_html__( 'Back Image Alt Text', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => esc_html__( 'ALT text for your image.', 'wpmozo-addons-for-elementor' ),
					'condition'   => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->add_control(
				'show_button_switcher',
				array(
					'label'        => esc_html__( 'Show Button', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => '',
				)
			);

			$this->add_control(
				'back_button',
				array(
					'label'     => esc_html__( 'Button', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'after',
					'condition' => array(
						'back_button_display' => 'yes',
					),
				)
			);

			$this->add_control(
				'button_text',
				array(
					'label'       => esc_html__( 'Button Text', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::TEXT,
					'dynamic'     => array( 'active' => true ),
					'placeholder' => esc_html__( 'Enter Button Text Here', 'wpmozo-addons-for-elementor' ),
					'default'     => esc_html__( 'Click ME!', 'wpmozo-addons-for-elementor' ),
					'condition'   => array( 'show_button_switcher' => 'yes' ),
				)
			);
			$this->add_control(
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
					'condition'     => array( 'show_button_switcher' => 'yes' ),
				)
			);
			$this->add_control(
				'button_icon',
				array(
					'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => array(
						'value'   => 'fas fa-arrow-right',
						'library' => 'fa-solid',
					),
					'condition' => array( 'show_button_switcher' => 'yes' ),
				)
			);
			$this->add_control(
				'button_icon_position',
				array(
					'label'     => esc_html__( 'Button Icon Position', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::CHOOSE,
					'options'   => array(
						'before' => array(
							'title' => esc_html__( 'Before', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-angle-left',
						),
						'after'  => array(
							'title' => esc_html__( 'After', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-angle-right',
						),
					),
					'default'   => 'after',
					'toggle'    => false,
					'condition' => array(
						'button_icon[value]!'  => '',
						'show_button_switcher' => 'yes',
					),
				)
			);
			$this->add_control(
				'show_icon_on_hover_switcher_before',
				array(
					'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => '',
					'selectors'    => array(
						'{{WRAPPER}} .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner svg' => 'opacity:0; transition:opacity 300ms;',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner .wpmozo_button' => 'margin-left:-{{button_font_size.SIZE}}{{button_font_size.UNIT}}; margin-right: calc( calc( {{button_font_size.SIZE}}{{button_font_size.UNIT}} / 2 ) - 5% );',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover svg' => 'opacity:1;',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover .wpmozo_button' => ' margin-left:0;',
					),
					'condition'    => array(
						'button_icon_position' => 'before',
						'button_icon[value]!'  => '',
						'show_button_switcher' => 'yes',
					),
				)
			);
			$this->add_control(
				'show_icon_on_hover_switcher_after',
				array(
					'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
					'return_value' => 'yes',
					'default'      => '',
					'selectors'    => array(
						'{{WRAPPER}} .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner svg' => 'opacity:0; transition:opacity 300ms;',
						'{{WRAPPER}} .wpmozo_button' => 'margin-right:-{{button_font_size.SIZE}}{{button_font_size.UNIT}}; margin-left: calc( calc( {{button_font_size.SIZE}}{{button_font_size.UNIT}} / 2 ) - 5% );',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover svg' => 'opacity:1;',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover .wpmozo_button' => ' margin-right:0;',
					),
					'condition'    => array(
						'button_icon_position' => 'after',
						'button_icon[value]!'  => '',
						'show_button_switcher' => 'yes',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox style.
			$this->start_controls_section(
				'section_toggle_style_text',
				array(
					'label' => esc_html__( 'FlipBox Style', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->add_control(
				'flipbox_global_text_styling_heading',
				array(
					'label' => esc_html__( 'Global Styling', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'global_title_typography',
					'label'    => esc_html__( 'Title Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_heading h1, {{WRAPPER}} .wpmozo_ae_flipbox_heading h2, {{WRAPPER}} .wpmozo_ae_flipbox_heading h3, {{WRAPPER}} .wpmozo_ae_flipbox_heading h4, {{WRAPPER}} .wpmozo_ae_flipbox_heading h5, {{WRAPPER}} .wpmozo_ae_flipbox_heading h6, {{WRAPPER}} .wpmozo_ae_flipbox_heading h1, {{WRAPPER}} .wpmozo_ae_flipbox_heading h2, {{WRAPPER}} .wpmozo_ae_flipbox_heading h3, {{WRAPPER}} .wpmozo_ae_flipbox_heading h4, {{WRAPPER}} .wpmozo_ae_flipbox_heading h5, {{WRAPPER}} .wpmozo_ae_flipbox_heading h6',
				)
			);

			$this->add_control(
				'global_title_color',
				array(
					'label'     => esc_html__( 'Title Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#fff',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_title' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'global_content_typography',
					'label'    => esc_html__( 'Content Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_description, {{WRAPPER}} .wpmozo_ae_flipbox_description p, {{WRAPPER}} .wpmozo_ae_flipbox_description, {{WRAPPER}} .wpmozo_ae_flipbox_description p',
				)
			);

			$this->add_control(
				'global_content_color',
				array(
					'label'     => esc_html__( 'Content Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#fff',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_description' => 'color: {{VALUE}};',
					),
				)
			);

			$this->start_controls_tabs( 'flipbox_style_tabs' );

			// Front box style.
			$this->start_controls_tab(
				'flipbox_style_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_heading_level',
				array(
					'label'       => esc_html__( 'Front Heading Level', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
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
					'default'     => 'h2',
					'toggle'      => true,
				)
			);

			$this->add_control(
				'flipbox_front_title_typography_heading',
				array(
					'label' => esc_html__( 'Title Styling', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);

			$this->add_control(
				'front_title_color',
				array(
					'label'     => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_title' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'front_title_typography',
					'label'    => esc_html__( '`Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_title',
				)
			);

			$this->add_control(
				'flipbox_front_content_typography_heading',
				array(
					'label' => esc_html__( 'Content Styling', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);

			$this->add_control(
				'front_content_color',
				array(
					'label'     => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_description' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'front_content_typography',
					'label'    => esc_html__( ' Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_description',
				)
			);

			$this->end_controls_tab();

			// Back box style.
			$this->start_controls_tab(
				'flipbox_style_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_heading_level',
				array(
					'label'       => esc_html__( 'Back Heading Level', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
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
					'default'     => 'h2',
					'toggle'      => true,
				)
			);

			$this->add_control(
				'flipbox_back_title_typography_heading',
				array(
					'label' => esc_html__( 'Title Styling', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);

			$this->add_control(
				'back_title_color',
				array(
					'label'     => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_title' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'back_title_typography',
					'label'    => esc_html__( '`Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_title',
				)
			);

			$this->add_control(
				'flipbox_back_content_typography_heading',
				array(
					'label' => esc_html__( 'Content Styling', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);

			$this->add_control(
				'back_content_color',
				array(
					'label'     => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_description' => 'color: {{VALUE}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'back_content_typography',
					'label'    => esc_html__( ' Typography', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_description',
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox image/icon style.
			$this->start_controls_section(
				'section_toggle_style_icon_image',
				array(
					'label' => esc_html__( 'FlipBox Image/Icon Style', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'flipbox_style_icon_image_tabs' );

			// Front image/icon style.
			$this->start_controls_tab(
				'flipbox_style_icon_image_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_icon_placement',
				array(
					'label'       => esc_html__( 'Image/Icon Placement', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'top'   => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
						'left'  => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
						'right' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'top',
				)
			);

			$this->add_control(
				'front_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#fff',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_icon i' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
					'condition' => array(
						'front_use_icon_image' => 'icon',
					),

				)
			);

			$this->add_control(
				'front_use_icon_font_size',
				array(
					'label'        => esc_html__( 'Use Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'front_use_icon_image' => 'icon',
					),
				)
			);

			$this->add_responsive_control(
				'front_icon_font_size',
				array(
					'label'     => esc_html__( 'Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'min' => 6,
							'max' => 300,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 40,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
					'separator' => 'before',
					'condition' => array(
						'front_use_icon_image'     => 'icon',
						'front_use_icon_font_size' => 'yes',
					),
				)
			);

			$this->add_control(
				'front_style_icon',
				array(
					'label'        => esc_html__( 'Style Icon', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'front_use_icon_image'     => 'icon',
						'front_icon_new[library]!' => 'svg',
					),
				)
			);

			$this->add_control(
				'front_icon_shape',
				array(
					'label'       => esc_html__( 'Shape', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'square'  => esc_html__( 'Square', 'wpmozo-addons-for-elementor' ),
						'circle'  => esc_html__( 'Circle', 'wpmozo-addons-for-elementor' ),
						'hexagon' => esc_html__( 'Hexagon', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'square',
					'condition'   => array(
						'front_use_icon_image' => 'icon',
						'front_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'front_shape_color',
				array(
					'label'     => esc_html__( 'Shape Background Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#000',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_icon_shape_border:not(.wpmozo_ae_hexagon), {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_hexagon:before' => 'background-color: {{VALUE}};',
					),
					'condition' => array(
						'front_use_icon_image' => 'icon',
						'front_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'front_use_shape_border',
				array(
					'label'        => esc_html__( 'Display Shape Border', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'front_use_icon_image' => 'icon',
						'front_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'front_shape_border_color',
				array(
					'label'     => esc_html__( 'Shape Border Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_icon_shape_border:not(.wpmozo_ae_hexagon)' => 'border-color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_hexagon' => 'background-color: {{VALUE}};',
					),
					'condition' => array(
						'front_use_icon_image'   => 'icon',
						'front_style_icon'       => 'yes',
						'front_use_shape_border' => 'yes',
					),
				)
			);

			$this->add_control(
				'front_image_alignment',
				array(
					'label'       => esc_html__( 'Front Image Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
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
					'default'     => 'center',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image' => 'text-align: {{VALUE}};',
					),
					'condition'   => array(
						'front_use_icon_image' => 'image',
						'front_icon_placement' => 'top',
					),
				)
			);

			$this->end_controls_tab();

			// Back image/icon style.
			$this->start_controls_tab(
				'flipbox_style_icon_image_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_icon_placement',
				array(
					'label'       => esc_html__( 'Image/Icon Placement', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'top'   => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
						'left'  => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
						'right' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'top',
				)
			);

			$this->add_control(
				'back_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#fff',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_icon i' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_icon svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
					'condition' => array(
						'back_use_icon_image' => 'icon',
					),

				)
			);

			$this->add_control(
				'back_use_icon_font_size',
				array(
					'label'        => esc_html__( 'Use Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'back_use_icon_image' => 'icon',
					),
				)
			);

			$this->add_responsive_control(
				'back_icon_font_size',
				array(
					'label'     => esc_html__( 'Icon Font Size', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'min' => 6,
							'max' => 300,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 40,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
					'separator' => 'before',
					'condition' => array(
						'back_use_icon_image'     => 'icon',
						'back_use_icon_font_size' => 'yes',
					),
				)
			);

			$this->add_control(
				'back_style_icon',
				array(
					'label'        => esc_html__( 'Style Icon', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'back_use_icon_image'     => 'icon',
						'back_icon_new[library]!' => 'svg',
					),
				)
			);

			$this->add_control(
				'back_icon_shape',
				array(
					'label'       => esc_html__( 'Shape', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'square'  => esc_html__( 'Square', 'wpmozo-addons-for-elementor' ),
						'circle'  => esc_html__( 'Circle', 'wpmozo-addons-for-elementor' ),
						'hexagon' => esc_html__( 'Hexagon', 'wpmozo-addons-for-elementor' ),
					),
					'default'     => 'square',
					'condition'   => array(
						'back_use_icon_image' => 'icon',
						'back_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'back_shape_color',
				array(
					'label'     => esc_html__( 'Shape Background Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#000',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_icon_shape_border:not(.wpmozo_ae_hexagon), {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_hexagon:before' => 'background-color: {{VALUE}};',
					),
					'condition' => array(
						'back_use_icon_image' => 'icon',
						'back_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'back_use_shape_border',
				array(
					'label'        => esc_html__( 'Display Shape Border', 'wpmozo-addons-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => 'no',
					'return_value' => 'yes',
					'condition'    => array(
						'back_use_icon_image' => 'icon',
						'back_style_icon'     => 'yes',
					),
				)
			);

			$this->add_control(
				'back_shape_border_color',
				array(
					'label'     => esc_html__( 'Shape Border Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_icon_shape_border:not(.wpmozo_ae_hexagon)' => 'border-color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_hexagon' => 'background-color: {{VALUE}};',
					),
					'condition' => array(
						'back_use_icon_image'   => 'icon',
						'back_style_icon'       => 'yes',
						'back_use_shape_border' => 'yes',
					),
				)
			);

			$this->add_control(
				'back_image_alignment',
				array(
					'label'       => esc_html__( 'Back Image Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
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
					'default'     => 'center',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image' => 'text-align: {{VALUE}};',
					),
					'condition'   => array(
						'back_use_icon_image' => 'image',
						'back_icon_placement' => 'top',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox alignment.
			$this->start_controls_section(
				'section_toggle_alignment',
				array(
					'label' => esc_html__( 'FlipBox Content Alignment', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'flipbox_alignment_tabs' );

			// Front box alignment.
			$this->start_controls_tab(
				'flipbox_alignment_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_content_align',
				array(
					'label'     => esc_html__( 'Content Alignment', 'wpmozo-addons-for-elementor' ),
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
					'default'   => 'center',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h1, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h2, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h3, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h4, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h5, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_heading h6, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_description, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_description p, {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image,  {{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_icon' => 'text-align: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'front_vertical_align',
				array(
					'label'                => esc_html__( 'Vertical Alignment', 'wpmozo-addons-for-elementor' ),
					'type'                 => Controls_Manager::CHOOSE,
					'options'              => array(
						'top'    => array(
							'title' => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-top',
						),
						'center' => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-middle',
						),
						'bottom' => array(
							'title' => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-bottom',
						),
					),
					'default'              => 'center',
					'selectors_dictionary' => array(
						'top'    => 'flex-start',
						'center' => 'center',
						'bottom' => 'flex-end',
					),
					'selectors'            => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front' => 'align-items: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			// Back box alignment.
			$this->start_controls_tab(
				'flipbox_alignment_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_content_align',
				array(
					'label'     => esc_html__( 'Content Alignment', 'wpmozo-addons-for-elementor' ),
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
					'default'   => 'center',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h1, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h2, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h3, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h4, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h5, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_heading h6, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_description, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_description p, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image, {{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_icon, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper' => 'text-align: {{VALUE}};',
					),
				)
			);

			$this->add_control(
				'back_vertical_align',
				array(
					'label'                => esc_html__( 'Vertical Alignment', 'wpmozo-addons-for-elementor' ),
					'type'                 => Controls_Manager::CHOOSE,
					'options'              => array(
						'top'    => array(
							'title' => esc_html__( 'Top', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-top',
						),
						'center' => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-middle',
						),
						'bottom' => array(
							'title' => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-v-align-bottom',
						),
					),
					'default'              => 'center',
					'selectors_dictionary' => array(
						'top'    => 'flex-start',
						'center' => 'center',
						'bottom' => 'flex-end',
					),
					'selectors'            => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back' => 'align-items: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox border.
			$this->start_controls_section(
				'section_toggle_image_border',
				array(
					'label' => esc_html__( 'FlipBox Border', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'flipbox_border_tabs' );

			// Global alignment.
			$this->start_controls_tab(
				'flipbox_border_global',
				array(
					'label' => esc_html__( 'Global', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'global_border',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-for-elementor' ),
					'fields_options' => array(
						'border' => array(
							'default' => 'solid',
						),
						'width'  => array(
							'default' => array(
								'unit'     => 'px',
								'top'      => '1',
								'right'    => '1',
								'bottom'   => '1',
								'left'     => '1',
								'isLinked' => true,
							),
						),
						'color'  => array(
							'default' => '#eeeeee',
						),
					),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flipbox_front, {{WRAPPER}} .wpmozo_ae_flipbox_back',
				)
			);

			$this->add_control(
				'global_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front, {{WRAPPER}} .wpmozo_ae_flipbox_back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'global_box_shadow',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flipbox_front, {{WRAPPER}} .wpmozo_ae_flipbox_back',
				)
			);

			$this->end_controls_tab();

			// Front/back image border.
			$this->start_controls_tab(
				'flipbox_border_image',
				array(
					'label'     => esc_html__( 'Image', 'wpmozo-addons-for-elementor' ),
					'condition' => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			// Front image border.
			$this->add_control(
				'flipbox_front_image_border_heading',
				array(
					'label'     => esc_html__( 'Front Image Border', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'condition' => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'front_image_border',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-for-elementor' ),
					'fields_options' => array(
						'border' => array(
							'default' => 'solid',
						),
						'width'  => array(
							'default' => array(
								'unit'     => 'px',
								'top'      => '1',
								'right'    => '1',
								'bottom'   => '1',
								'left'     => '1',
								'isLinked' => true,
							),
						),
						'color'  => array(
							'default' => '#eeeeee',
						),
					),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image img',
					'condition'      => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->add_control(
				'front_image_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition'  => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'      => 'front_image_box_shadow',
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image img',
					'condition' => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			// Back image border.
			$this->add_control(
				'flipbox_back_image_border_heading',
				array(
					'label'     => esc_html__( 'Back Image Border', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'condition' => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'back_image_border',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-for-elementor' ),
					'fields_options' => array(
						'border' => array(
							'default' => 'solid',
						),
						'width'  => array(
							'default' => array(
								'unit'     => 'px',
								'top'      => '1',
								'right'    => '1',
								'bottom'   => '1',
								'left'     => '1',
								'isLinked' => true,
							),
						),
						'color'  => array(
							'default' => '#eeeeee',
						),
					),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image img',
					'condition'      => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->add_control(
				'back_image_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'condition'  => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'      => 'back_image_box_shadow',
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image img',
					'condition' => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox background.
			$this->start_controls_section(
				'section_toggle_background',
				array(
					'label' => esc_html__( 'FlipBox Background', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'flipbox_background_tabs' );

			// Front box background.
			$this->start_controls_tab(
				'flipbox_background_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'front_background_color',
				array(
					'label'     => esc_html__( 'Front Background', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#543ec4',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front' => 'background-color: {{VALUE}};',
					),
				)
			);

			$this->end_controls_tab();

			// Back box background.
			$this->start_controls_tab(
				'flipbox_background_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'back_background_color',
				array(
					'label'     => esc_html__( 'Back Background', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#863ad0',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back' => 'background-color: {{VALUE}};',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Flipbox sizing.
			$this->start_controls_section(
				'section_toggle_sizing',
				array(
					'label' => esc_html__( 'FlipBox Sizing', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'flipbox_sizing_tabs' );

			// Front box sizing.
			$this->start_controls_tab(
				'flipbox_sizing_front',
				array(
					'label' => esc_html__( 'Front', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_responsive_control(
				'front_image_width',
				array(
					'label'      => esc_html__( 'Front Image Width', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 'px', '%' ),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 1100,
							'step' => 1,
						),
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
					),
					'default'    => array(
						'unit' => 'px',
						'size' => 100,
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_front .wpmozo_ae_flipbox_image img' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
					),
					'condition'  => array(
						'front_use_icon_image' => 'image',
					),
				)
			);

			$this->end_controls_tab();

			// Back box sizing.
			$this->start_controls_tab(
				'flipbox_sizing_back',
				array(
					'label' => esc_html__( 'Back', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_responsive_control(
				'back_image_width',
				array(
					'label'      => esc_html__( 'Back Image Width', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 'px', '%' ),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 1100,
							'step' => 1,
						),
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
					),
					'default'    => array(
						'unit' => 'px',
						'size' => 100,
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_back .wpmozo_ae_flipbox_image img' => 'min-width: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
					),
					'condition'  => array(
						'back_use_icon_image' => 'image',
					),
				)
			);

			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_responsive_control(
				'content_max_width',
				array(
					'label'      => esc_html__( 'Content Width', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::SLIDER,
					'size_units' => array( 'px', '%' ),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 1100,
							'step' => 1,
						),
						'%'  => array(
							'min'  => 1,
							'max'  => 100,
							'step' => 1,
						),
					),
					'default'    => array(
						'unit' => '%',
						'size' => 100,
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flipbox_wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
					),
				)
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'button_styling',
				array(
					'label'     => esc_html__( 'Button Styling', 'wpmozo-addons-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'show_button_switcher' => 'yes' ),
				)
			);

			$this->start_controls_tabs( 'button_normal_and_hover_state_control_tabs' );
			// Button style normal tab.
			$this->start_controls_tab(
				'button_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);
			// Settings for first tab.
			$this->add_control(
				'button_text_color_normal_state',
				array(
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#fff',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner, {{WRAPPER}} .wpmozo_button' => 'color: {{VALUE}}',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
					'label_block' => true,
					'name'        => 'button_text_normal_state_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner',
					'exclude'     => array( 'font_size' ),
				)
			);
			$this->add_responsive_control(
				'button_font_size',
				array(
					'type'       => Controls_Manager::SLIDER,
					'label'      => esc_html__( 'Font Size', 'wpmozo-addons-for-elementor' ),
					'range'      => array(
						'px' => array(
							'min'  => 0,
							'max'  => 1000,
							'step' => 1,
						),
						'%'  => array(
							'min' => 0,
							'max' => 200,
						),
						'vw' => array(
							'min' => 0,
							'max' => 200,
						),
						'vh' => array(
							'min' => 0,
							'max' => 200,
						),
					),
					'default'    => array(
						'size' => '18',
						'unit' => 'px',
					),
					'size_units' => array( 'px', '%', 'vw', 'vh' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'button_text_shadow_normal_state',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner',
					'separator' => 'before',
				)
			);
			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'           => 'button_box_shadow_normal_state',
					'label'          => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner',
					'fields_options' => array(
						'box_shadow_type' => array(
							'default' => 'yes',
						),
						'box_shadow'      => array(
							'default' => array(
								'horizontal' => 0,
								'vertical'   => 26,
								'blur'       => 27,
								'spread'     => -6,
								'color'      => 'rgba(0,0,0,0.15)',
							),
						),
					),
				)
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'           => 'button_border_normal_state',
					'label'          => esc_html__( 'Border', 'wpmozo-addons-for-elementor' ),
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner',
					'fields_options' => array(
						'border' => array( 'default' => 'solid' ),
						'width'  => array(
							'default' => array(
								'top'    => 2,
								'right'  => 2,
								'bottom' => 2,
								'left'   => 2,
							),
						),
					),

				)
			);
			$this->add_responsive_control(
				'button_border_radius_normal_state',
				array(
					'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::DIMENSIONS,
					'label_block' => true,
					'size_units'  => array( 'px', 'em', '%' ),
					'default'     => array(
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					),
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'button_background_normal_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner',
				)
			);
			$this->end_controls_tab();

			// Button style hover tab.
			$this->start_controls_tab(
				'button_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'button_text_color_hover_state',
				array(
					'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover .wpmozo_button' => 'color: {{VALUE}}',
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'          => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
					'label_block'    => false,
					'name'           => 'button_text_hover_state_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover',
					'fields_options' => array(
						'font_size' => array(
							'selectors' => array(
								'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover' => 'font-size:{{SIZE}}{{UNIT}};',
							),
							'default'   => array( 'size' => 18 ),
						),
					),
				)
			);
			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'      => 'button_text_shadow_hover_state',
					'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
					'selector'  => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover',
					'separator' => 'before',
				)
			);

			$this->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'     => 'button_box_shadow_hover_state',
					'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover',
				)
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'     => 'button_border_hover_state',
					'label'    => esc_html__( 'Border', 'wpmozo-addons-for-elementor' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover',
				)
			);

			$this->add_responsive_control(
				'button_border_radius_hover_state',
				array(
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);

			$this->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'button_background_hover_state',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner:hover',
				)
			);

			$this->add_control(
				'button_hover_animation',
				array(
					'label'     => esc_html__( 'Hover Animation', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::HOVER_ANIMATION,
					'separator' => 'before',
					'default'   => 'grow',
				)
			);

			$this->add_responsive_control(
				'button_transition_duration',
				array(
					'type'      => Controls_Manager::SLIDER,
					'label'     => esc_html__( 'Transition Duration (ms) ', 'wpmozo-addons-for-elementor' ),
					'range'     => array(
						'ms' => array(
							'min'  => 0,
							'max'  => 10000,
							'step' => 100,
						),
					),
					'default'   => array(
						'size' => 200,
						'unit' => 'ms',
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner, {{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner .wpmozo_button' => 'transition: color {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',

						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner svg' => 'transition: color {{SIZE}}{{UNIT}}, fill {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, opacity 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->add_control(
				'button_text_alignment',
				array(
					'label'     => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
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
					'toggle'    => true,
					'default'   => 'center',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper' => 'text-align: {{VALUE}};',
					),
					'separator' => 'before',
				)
			);
			$this->add_control(
				'button_padding_margin_heading',
				array(
					'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-for-elementor' ),
					'type'  => Controls_Manager::HEADING,
				)
			);
			$this->start_controls_tabs( 'button_padding_margin_control_tabs' );
			// Button padding tab.
			$this->start_controls_tab(
				'button_padding_tab',
				array(
					'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'button_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'default'    => array(
						'top'    => 5,
						'right'  => 5,
						'bottom' => 5,
						'left'   => 5,
					),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner .wpmozo_button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			// Button style margin tab.
			$this->start_controls_tab(
				'button_margin_tab',
				array(
					'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'button_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_ae_flip_box_button_wrapper_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
					'default'    => array(
						'top'    => 20,
						'right'  => 20,
						'bottom' => 20,
						'left'   => 20,
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();
