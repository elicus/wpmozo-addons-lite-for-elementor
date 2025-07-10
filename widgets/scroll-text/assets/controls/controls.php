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

use Elementor\Utils;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Controls_Manager;

	// content section starts here.
	$this->start_controls_section(
		'content_section',
		array(
			'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);
	$this->add_control(
		'scroll_text',
		array(
			'label'       => __( 'Rotating Text', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => __( 'Your content goes here. Edit or remove this text inline or in the widget Content settings. You can also style every aspect of this content in the widget Style settings and even apply custom CSS to this text in the widget Advanced settings.', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		)
	);
	$this->add_responsive_control(
		'scroll_effect',
		array(
			'label'   => esc_html__( 'Scroll Effect', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'fade',
			'options' => array(
				'fade'  => esc_html__( 'Fade', 'wpmozo-addons-lite-for-elementor' ),
				'blur'  => esc_html__( 'Blur', 'wpmozo-addons-lite-for-elementor' ),
				'color' => esc_html__( 'Color', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);
	$this->add_responsive_control(
		'text_split',
		array(
			'label'   => esc_html__( 'Text Split By', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'word',
			'options' => array(
				'word'   => esc_html__( 'Word', 'wpmozo-addons-lite-for-elementor' ),
				'letter' => esc_html__( 'Letter', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);
	$this->end_controls_section();
//Animation.
	$this->start_controls_section(
		'animation_section',
		array(
			'label' => __( 'Animation', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);
	$this->add_control(
		'use_custom_pos',
		array(
			'label'                => esc_html__( 'Use Custom Positioning', 'wpmozo-addons-lite-for-elementor' ),
			'type'                 => Controls_Manager::SWITCHER,
			'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value'         => 'yes', // return value when the switch is on.
			'default'              => 'no',
			'selectors_dictionary' => array(
				'yes' => 'yes',
				''    => 'no',
			),
		)
	);
	$this->add_control(
			'animation_start_pre',
			array(
				'label' => esc_html__( 'Animation Start', 'wpmozo-addons-lite-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array( 'use_custom_pos!' => 'yes' )
			)
		);
	$this->add_responsive_control(
		'element_start_position_pre',
		array(
			'label'   => esc_html__( 'Element', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'top',
			'options' => array(
				'top'   => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
			),
			'condition' => array( 'use_custom_pos!' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'viewport_start_position_pre',
		array(
			'label'   => esc_html__( 'Viewport', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'center',
			'options' => array(
				'top'   => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
			),
			'condition' => array( 'use_custom_pos!' => 'yes' ),
			'description' => esc_html__( 'Choose when the animation should start—for example, ( Element Top, Viewport Center ) means the animation starts when the Top of this Element/Widget reaches the Center of the Viewport.' )
		)
	);
	$this->add_control(
		'animation_end_pre',
		array(
			'label' => esc_html__( 'Animation End', 'wpmozo-addons-lite-for-elementor' ),
			'type' => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 'use_custom_pos!' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'element_end_position_pre',
		array(
			'label'   => esc_html__( 'Element', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'bottom',
			'options' => array(
				'top'   => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
			),
			'condition' => array( 'use_custom_pos!' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'viewport_end_position_pre',
		array(
			'label'   => esc_html__( 'Viewport', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'center',
			'options' => array(
				'top'   => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'bottom' => esc_html__( 'Bottom', 'wpmozo-addons-lite-for-elementor' ),
			),
			'condition' => array( 'use_custom_pos!' => 'yes' ),
			'description' => esc_html__( 'Choose when the animation should end—for example, ( Element Bottom, Viewport Center ) means the animation ends when the Bottom of this Element/Widget reaches the Center of the Viewport.' )
		)
	);
	$this->add_control(
		'animation_start',
		array(
			'label' => esc_html__( 'Animation Start', 'wpmozo-addons-lite-for-elementor' ),
			'type' => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'start_element_position',
		array(
			'label'      => esc_html__( 'Element', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%','px' ),
			'range'      => array(
				'%' => array(
					'min' => 0,
					'max' => 100,
				),
				'px' => array(
					'min' => -1000,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 0,
			),
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'start_viewport_position',
		array(
			'label'      => esc_html__( 'Viewport', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%','px' ),
			'range'      => array(
				'%' => array(
					'min' => -100,
					'max' => 100,
				),
				'px' => array(
					'min' => -1000,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 50,
			),
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->add_control(
		'animation_end',
		array(
			'label' => esc_html__( 'Animation End', 'wpmozo-addons-lite-for-elementor' ),
			'type' => Controls_Manager::HEADING,
			'separator' => 'before',
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'end_element_position',
		array(
			'label'      => esc_html__( 'Element', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%','px' ),
			'range'      => array(
				'%' => array(
					'min' => 0,
					'max' => 100,
				),
				'px' => array(
					'min' => -1000,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 100,
			),
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->add_responsive_control(
		'end_viewport_position',
		array(
			'label'      => esc_html__( 'Viewport', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( '%','px' ),
			'range'      => array(
				'%' => array(
					'min' => -100,
					'max' => 100,
				),
				'px' => array(
					'min' => -1000,
					'max' => 1000,
				),
			),
			'default'    => array(
				'unit' => '%',
				'size' => 50,
			),
			'condition' => array( 'use_custom_pos' => 'yes' )
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'text_style_section',
		array(
			'label'     => esc_html__( 'Text Style', 'wpmozo-addons-lite-for-elementor' ),
			'tab'       => Controls_Manager::TAB_STYLE,
			'condition' => array(
				'scroll_effect!' => 'fade',
			),
		)
	);
	$this->add_control(
		'active_text_color',
		array(
			'label'     => esc_html__( 'Active/Visible Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#7EBEC5',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_scroll_text .wpmozo_scroll_word_color .wpmozo_st_word.visible, {{WRAPPER}} .wpmozo_scroll_text .wpmozo_scroll_letter_color .wpmozo_st_letter.visible' => 'color: {{VALUE}}',
			),
			'condition' => array(
				'scroll_effect' => 'color',
			),
		)
	);
	$this->add_responsive_control(
		'normal_text_blur',
		array(
			'label'      => esc_html__( 'Normal Text Blur', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array(
				'px' => array(
					'min' => 1,
					'max' => 20,
				),
			),
			'default'    => array(
				'unit' => 'px',
				'size' => 6,
			),
			'selectors'  => array(
				'{{WRAPPER}} .wpmozo_scroll_text .wpmozo_scroll_word_blur .wpmozo_st_word, {{WRAPPER}} .wpmozo_scroll_text .wpmozo_scroll_letter_blur .wpmozo_st_letter' => 'filter: blur({{SIZE}}{{UNIT}})',
			),
			'condition'  => array(
				'scroll_effect' => 'blur',
			),
		)
	);
	$this->end_controls_section();
	$this->start_controls_section(
		'text_section',
		array(
			'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->start_controls_tabs( 'text_tabs' );
	$this->start_controls_tab(
		'text_normal_tab',
		array(
			'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'text_color',
		array(
			'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'default'   => '#000000',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_scroll_text_inner span' => 'color: {{VALUE}}',
			),
		)
	);
	$this->add_responsive_control(
		'text_size',
		array(
			'label'     => esc_html__( 'Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_scroll_text_inner span' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_typography',
			'exclude'     => array( 'font_size' ),
			'selector'    => '{{WRAPPER}} .wpmozo_scroll_text_inner span',
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_shadow',
			'selector'    => '{{WRAPPER}} .wpmozo_scroll_text_inner span',
		)
	);
	$this->end_controls_tab();
	$this->start_controls_tab(
		'text_hover_tab',
		array(
			'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'text_color_hover',
		array(
			'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_scroll_text_inner:hover span' => 'color: {{VALUE}}',
			),
		)
	);
	$this->add_responsive_control(
		'text_size_hover',
		array(
			'label'     => esc_html__( 'Text Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
			),
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_scroll_text_inner:hover span' => 'font-size: {{SIZE}}{{UNIT}}; transition: all 300ms;',
			),
		)
	);
	$this->add_group_control(
		Group_Control_Typography::get_type(),
		array(
			'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_typography_hover',
			'exclude'     => array( 'font_size' ),
			'selector'    => '{{WRAPPER}} .wpmozo_scroll_text_inner:hover span',
		)
	);
	$this->add_group_control(
		Group_Control_Text_Shadow::get_type(),
		array(
			'label'       => esc_html__( 'Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'name'        => 'text_shadow_hover',
			'selector'    => '{{WRAPPER}} .wpmozo_scroll_text_inner:hover span',
		)
	);
	$this->end_controls_tab();
	$this->end_controls_tabs();
	$this->end_controls_section();
