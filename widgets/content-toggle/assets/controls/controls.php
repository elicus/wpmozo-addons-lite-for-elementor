<?php

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Plugin;

// Content One section starts.
$this->start_controls_section(
	'wpmozo_toggle_one',
	array(
		'label' => esc_html__( 'Toggle One Content', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

	$this->add_control(
		'wpmozo_toggle_one_title',
		array(
			'label'       => esc_html__( 'Toggle Title', 'wpmozo-addons-for-elementor' ),
			'label_block' => true,
			'default'     => 'Content One',
			'type'        => Controls_Manager::TEXT,
			'placeholder' => esc_html__( 'Enter Title', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'toggle_one_selected_icon',
		array(
			'label'                  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
			'type'                   => Controls_Manager::ICONS,
			'skin'                   => 'inline',
			'label_block'            => false,
			'exclude_inline_options' => array( 'svg' ),
			'separator'              => 'before',
		)
	);

	$this->add_control(
		'toggle_one_icon_align',
		array(
			'label'     => esc_html__( 'Icon Position', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => 'left',
			'options'   => array(
				'left'  => esc_html__( 'Before', 'wpmozo-addons-for-elementor' ),
				'right' => esc_html__( 'After', 'wpmozo-addons-for-elementor' ),
			),
			'condition' => array( 'toggle_one_selected_icon[value]!' => '' ),
		)
	);
	$this->add_control(
		'toggle_one_icon_indent',
		array(
			'label'     => esc_html__( 'Icon Spacing', 'elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'max' => 50,
				),
			),
			'default'   => array(
				'unit' => 'px',
				'size' => 10,
			),
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_off_value' => 'gap: {{SIZE}}{{UNIT}};',
			),
			'condition' => array( 'toggle_one_selected_icon[value]!' => '' ),
		)
	);

	$this->add_control(
		'wpmozo_toggle_one_type',
		array(
			'label'   => esc_html__( 'Content Type', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'text',
			'options' => array(
				'text'     => esc_html__( 'Text', 'wpmozo-addons-for-elementor' ),
				'template' => esc_html__( 'Template', 'wpmozo-addons-for-elementor' ),
				'page'     => esc_html__( 'Page', 'wpmozo-addons-for-elementor' ),
			),
		)
	);

	$this->add_control(
		'wpmozo_toggle_one_content',
		array(
			'label'       => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => esc_html__( 'Default content', 'wpmozo-addons-for-elementor' ),
			'placeholder' => esc_html__( 'Type your content here', 'wpmozo-addons-for-elementor' ),
			'condition'   => array(
				'wpmozo_toggle_one_type' => 'text',
			),
		)
	);
	$this->add_control(
		'wpmozo_toggle_one_select_template',
		array(
			'label'     => esc_html__( 'Select Template', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => '0', // Set the default value as needed.
			'options'   => wpmozo_ae_get_elementor_templates_as_options(), // Use the function to fetch template IDs and names.
			'condition' => array(
				'wpmozo_toggle_one_type' => 'template',
			),
		)
	);
	$this->add_control(
		'wpmozo_toggle_one_select_page',
		array(
			'label'       => esc_html__( 'Select Page', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::SELECT,
			'default'     => 0, // Set the default value as needed.
			'options'     => wpmozo_ae_get_pages_as_options(), // Use the function to fetch template IDs and names.
			'condition'   => array(
				'wpmozo_toggle_one_type' => 'page',
			),
			'render_type' => 'template',
		)
	);
	$this->end_controls_section();

	// Content Two section starts.
	$this->start_controls_section(
		'wpmozo_toggle_two',
		array(
			'label' => esc_html__( 'Toggle Two Content', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$this->add_control(
		'wpmozo_toggle_two_title',
		array(
			'label'       => esc_html__( 'Toggle Title', 'wpmozo-addons-for-elementor' ),
			'label_block' => true,
			'default'     => 'Content Two',
			'type'        => Controls_Manager::TEXT,
			'placeholder' => esc_html__( 'Enter Title', 'wpmozo-addons-for-elementor' ),
		)
	);
	$this->add_control(
		'toggle_two_selected_icon',
		array(
			'label'                  => esc_html__( 'Icon', 'wpmozo-addons-for-elementor' ),
			'type'                   => Controls_Manager::ICONS,
			'skin'                   => 'inline',
			'label_block'            => false,
			'exclude_inline_options' => array( 'svg' ),
			'separator'              => 'before',
		)
	);
	$this->add_control(
		'toggle_two_icon_align',
		array(
			'label'     => esc_html__( 'Icon Position', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => 'right',
			'options'   => array(
				'left'  => esc_html__( 'Before', 'wpmozo-addons-for-elementor' ),
				'right' => esc_html__( 'After', 'wpmozo-addons-for-elementor' ),
			),
			'condition' => array( 'toggle_two_selected_icon[value]!' => '' ),
		)
	);
	$this->add_control(
		'toggle_two_icon_indent',
		array(
			'label'     => esc_html__( 'Icon Spacing', 'elementor' ),
			'type'      => Controls_Manager::SLIDER,
			'range'     => array(
				'px' => array(
					'max' => 50,
				),
			),
			'default'   => array(
				'unit' => 'px',
				'size' => 10,
			),
			'separator' => 'after',
			'selectors' => array(
				'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_on_value' => 'gap: {{SIZE}}{{UNIT}};',
			),
			'condition' => array( 'toggle_two_selected_icon[value]!' => '' ),
		)
	);
	$this->add_control(
		'wpmozo_toggle_two_type',
		array(
			'label'   => esc_html__( 'Content Type', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'text',
			'options' => array(
				'text'     => esc_html__( 'Text', 'wpmozo-addons-for-elementor' ),
				'template' => esc_html__( 'Template', 'wpmozo-addons-for-elementor' ),
				'page'     => esc_html__( 'Page', 'wpmozo-addons-for-elementor' ),
			),
		)
	);
	$this->add_control(
		'wpmozo_toggle_two_content',
		array(
			'label'       => esc_html__( 'Content', 'wpmozo-addons-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => esc_html__( 'Default content', 'wpmozo-addons-for-elementor' ),
			'placeholder' => esc_html__( 'Type your content here', 'wpmozo-addons-for-elementor' ),
			'condition'   => array(
				'wpmozo_toggle_two_type' => 'text',
			),
		)
	);
	// Add a custom control to your Elementor widget.
	$this->add_control(
		'wpmozo_toggle_two_select_template',
		array(
			'label'     => esc_html__( 'Select Template', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => '0', // Set the default value as needed.
			'options'   => wpmozo_ae_get_elementor_templates_as_options(), // Use the function to fetch template IDs and names.
			'condition' => array(
				'wpmozo_toggle_two_type' => 'template',
			),
		)
	);

	$this->add_control(
		'wpmozo_toggle_two_select_page',
		array(
			'label'     => esc_html__( 'Select Page', 'wpmozo-addons-for-elementor' ),
			'type'      => Controls_Manager::SELECT,
			'default'   => 0, // Set the default value as needed.
			'options'   => wpmozo_ae_get_pages_as_options(), // Use the function to fetch template IDs and names.
			'condition' => array(
				'wpmozo_toggle_two_type' => 'page',
			),
		)
	);

	$this->end_controls_section();

	// Style tab starts here.
	// Toggle Switch controls start here.
	$this->start_controls_section(
		'wpmozo_toggle_switch',
		array(
			'label' => esc_html__( 'Toggle Switch', 'wpmozo-addons-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_control(
		'wpmozo_toggle_switch_layout',
		array(
			'label'   => esc_html__( 'Select Toggle Layout', 'wpmozo-addons-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'wpmozo_toggle_layout_one',
			'options' => array(
				'wpmozo_toggle_layout_one' => esc_html__( 'Layout 1', 'wpmozo-addons-for-elementor' ),
				'wpmozo_toggle_layout_two' => esc_html__( 'Layout 2', 'wpmozo-addons-for-elementor' ),
			),
		)
	);

	$this->start_controls_tabs(
		'wpmozo_toggle_switch_normal_and_hover_state_control_tab',
		array(
			'separator' => 'before',
		)
	);

		$this->start_controls_tab(
			'wpmozo_toggle_switch_normal_state_tab',
			array(
				'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
			)
		);

			$this->add_control(
				'wpmozo_toggle_switch_normal_color',
				array(
					'label'     => esc_html__( 'Switch Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#ffffff',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch:before ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_normal_color_on',
				array(
					'label'     => esc_html__( 'Switch Color (ON State)', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#ffffff',
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper input:checked+.wpmozo_switch:before ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_normal_background',
				array(
					'label'     => esc_html__( 'Switch Background Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '#eee',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_on_normal_background',
				array(
					'label'     => esc_html__( 'Switch Background Color (ON State)', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
					'default'   => '#eee',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper input:checked+.wpmozo_switch ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_switch_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_hover_color',
				array(
					'label'     => esc_html__( 'Switch Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch:hover:before ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_hover_color_on',
				array(
					'label'     => esc_html__( 'Switch Color (ON State)', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper input:checked+.wpmozo_switch:hover:before ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_hover_background',
				array(
					'label'     => esc_html__( 'Switch Background Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'default'   => '',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch:hover ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_on_hover_background',
				array(
					'label'     => esc_html__( 'Switch Background Color (ON State)', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
					'default'   => '',
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper input:checked+.wpmozo_switch:hover ' => 'background-color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->add_control(
				'wpmozo_toggle_switch_alignment',
				array(
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper' => 'justify-content: {{VALUE}};',
					),
					'separator'   => 'before',
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_switch_space'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_switch_space_padding',
				array(
					'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_switch_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_switch_space_margin',
				array(
					'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_switch_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->end_controls_section();

			// Animation controls section start here.
			$this->start_controls_section(
				'wpmozo_toggle_animation',
				array(
					'label' => esc_html__( 'Toggle Animation', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_control(
				'entrance_animation',
				array(
					'label'       => esc_html__( 'Animation', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::ANIMATION,
					'render_type' => 'template',
				)
			);

			$this->end_controls_section();
			// Toggle label normal state styling starts here.
			$this->start_controls_section(
				'active_label_section',
				array(
					'label'     => esc_html__( 'Active Label', 'wpmozo-addons-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_two' ),
				)
			);

			$this->start_controls_tabs(
				'active_label_normal_and_hover_tabs'
			);

			$this->start_controls_tab(
				'active_label_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'active_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active .wpmozo_toggle_title',
				)
			);
			$this->add_control(
				'active_label_normal_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active .wpmozo_toggle_title' => 'color: {{VALUE}}',

					),
				)
			);
			$this->add_control(
				'active_label_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 30,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_active .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'active_label_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_active .icon-wrapper i' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'active_label_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'active_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active:hover .wpmozo_toggle_title',
				)
			);

			$this->add_control(
				'active_label_hover_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active:hover .wpmozo_toggle_title' => 'color: {{VALUE}};transition:all 300ms;',
					),
				)
			);
			$this->add_control(
				'active_label_hover_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_active:hover .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};transition:all 300ms;',
					),
				)
			);
			$this->add_control(
				'active_label_hover_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_active:hover .icon-wrapper i' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Toggle label hover state styling starts here.
			$this->start_controls_section(
				'inactive_label_section',
				array(
					'label'     => esc_html__( 'Inactive Label', 'wpmozo-addons-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_two' ),
				)
			);

			$this->start_controls_tabs(
				'inactive_label_normal_and_hover_tabs'
			);
			$this->start_controls_tab(
				'inactive_label_hover_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'inactive_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive > .wpmozo_toggle_title',
				)
			);

			$this->add_control(
				'inactive_label_normal_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);
			$this->add_control(
				'inactive_label_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 30,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_inactive .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}}; transition: 300ms;',
					),
				)
			);
			$this->add_control(
				'inactive_label_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_inactive .icon-wrapper i' => 'color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();
			$this->start_controls_tab(
				'label_inactive_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'inactive_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive:hover',
				)
			);
			$this->add_control(
				'inactive_label_hover_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->add_control(
				'inactive_label_hover_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_inactive:hover .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'inactive_label_hover_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_switch .wpmozo_inactive:hover .icon-wrapper i ' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Toggle One Label controls star here.
			$this->start_controls_section(
				'toggle_one_label_section',
				array(
					'label'     => esc_html__( 'Label One', 'wpmozo-addons-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
				)
			);

			$this->start_controls_tabs(
				'toggle_one__label_normal_and_hover_tabs'
			);
			$this->start_controls_tab(
				'toggle_one_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'toggle_one_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value .wpmozo_toggle_title',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'toggle_one_label_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value .wpmozo_toggle_title, {{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_one::before ' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);
			$this->add_control(
				'toggle_one_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 30,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'toggle_one_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value .icon-wrapper i' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'toggle_one_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'toggle_one_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title:hover',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'toggle_one_label_hover_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value:hover .wpmozo_toggle_title, {{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_two::before ' => 'color: {{VALUE}}',
					),
				)
			);
			$this->add_control(
				'toggle_one_hover_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value:hover .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'toggle_one_hover_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_off_value:hover .icon-wrapper i' => 'color: {{VALUE}};',
					),
				)
			);

			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Toggle Two Label controls star here.
			$this->start_controls_section(
				'toggle_two_label_section',
				array(
					'label'     => esc_html__( 'Label Two', 'wpmozo-addons-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
				)
			);

			$this->start_controls_tabs(
				'toggle_two__label_normal_and_hover_tabs'
			);
			$this->start_controls_tab(
				'toggle_two_normal_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'toggle_two_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value .wpmozo_toggle_title',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'toggle_two_label_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper  .wpmozo_toggle_on_value .wpmozo_toggle_title' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);
			$this->add_control(
				'toggle_two_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'default'   => array(
						'unit' => 'px',
						'size' => 30,
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'toggle_two_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value .icon-wrapper i' => 'color: {{VALUE}}; transition: 300ms;',
					),
				)
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'toggle_two_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'toggle_two_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title:hover',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'toggle_two_label_hover_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value:hover .wpmozo_toggle_title, {{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_two::before ' => 'color: {{VALUE}};',
					),
				)
			);
			$this->add_control(
				'toggle_two_hover_icon_size',
				array(
					'label'     => esc_html__( 'Icon Size', 'elementor' ),
					'type'      => Controls_Manager::SLIDER,
					'range'     => array(
						'px' => array(
							'max' => 200,
						),
					),
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value:hover .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
					),
				)
			);
			$this->add_control(
				'toggle_two_hover_icon_color',
				array(
					'label'     => esc_html__( 'Icon Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_on_value:hover .icon-wrapper i' => 'color: {{VALUE}};',
					),
				)
			);

			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Content One text styling starts here.
			$this->start_controls_section(
				'wpmozo_toggle_one_section',
				array(
					'label' => esc_html__( 'Content One', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_one_title_text_normal_and_hover_state_control_tab'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_title_one_text_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_one_text_color',
				array(
					'label'     => esc_html__( 'Content one Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_one_typography',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text',
				)
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'wpmozo_toggle_one_text_shadow',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text',
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_title_one_text_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_one_hover_text_color',
				array(
					'label'     => esc_html__( 'Content one Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_one_hover_typography',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text:hover',
				)
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'wpmozo_toggle_one_hover_text_shadow',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text:hover',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_control(
				'wpmozo_toggle_one_alignment',
				array(
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle' => 'text-align: {{VALUE}};',
					),
					'separator'   => 'before',
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_one_space'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_one_space_padding',
				array(
					'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_one_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_one_space_margin',
				array(
					'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_one_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Content Two text settings starts here.
			$this->start_controls_section(
				'wpmozo_toggle_two_section',
				array(
					'label' => esc_html__( 'Content Two', 'wpmozo-addons-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'wpmozo_toggle_two_title_text_normal_and_hover_state_control_tab' );
			$this->start_controls_tab(
				'wpmozo_toggle_title_two_text_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_two_text_color',
				array(
					'label'     => esc_html__( 'Content Two Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text' => 'color: {{VALUE}}; transition: all 300ms;',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_two_typography',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text',
				)
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'wpmozo_toggle_two_text_shadow',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text',
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_title_two_text_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_two_hover_text_color',
				array(
					'label'     => esc_html__( 'Content Two Text Color', 'wpmozo-addons-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_two_hover_typography',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text:hover',
				)
			);

			$this->add_group_control(
				Group_Control_Text_Shadow::get_type(),
				array(
					'name'     => 'wpmozo_toggle_two_hover_text_shadow',
					'selector' => '.wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text:hover',
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_control(
				'wpmozo_toggle_two_alignment',
				array(
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
						'left'    => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						),
						'center'  => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						),
						'right'   => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						),
						'justify' => array(
							'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						),
					),
					'default'     => 'center',
					'toggle'      => true,
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle' => 'text-align: {{VALUE}};',
					),
					'separator'   => 'before',
				)
			);

			$this->start_controls_tabs( 'wpmozo_toggle_two_space' );
			$this->start_controls_tab(
				'wpmozo_toggle_two_space_padding',
				array(
					'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_two_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_two_space_margin',
				array(
					'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_two_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
					'selectors'  => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->end_controls_section();


