<?php

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Plugin;

// Content tab starts here.
// Content One section starts.
$this->start_controls_section(
	'wpmozo_toggle_one',
	array(
		'label' => esc_html__( 'Toggle One Content', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

	$this->add_control(
		'wpmozo_toggle_one_title',
		array(
			'label'       => esc_html__( 'Toggle Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'default'     => 'Content One',
			'type'        => Controls_Manager::TEXT,
			'placeholder' => esc_html__( 'Enter Title', 'wpmozo-addons-lite-for-elementor' ),
		)
	);

	$this->add_control(
		'wpmozo_toggle_one_type',
		array(
			'label'   => esc_html__( 'Content Type', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'text',
			'options' => array(
				'text'     => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
				'template' => esc_html__( 'Template', 'wpmozo-addons-lite-for-elementor' ),
				'page'     => esc_html__( 'Page', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);

	$this->add_control(
		'wpmozo_toggle_one_content',
		array(
			'label'       => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => esc_html__( 'Default content', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Type your content here', 'wpmozo-addons-lite-for-elementor' ),
			'condition'   => array(
				'wpmozo_toggle_one_type' => 'text',
			),
		)
	);
	$this->add_control(
		'wpmozo_toggle_one_select_template',
		array(
			'label'     => esc_html__( 'Select Template', 'wpmozo-addons-lite-for-elementor' ),
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
			'label'       => esc_html__( 'Select Page', 'wpmozo-addons-lite-for-elementor' ),
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

	// Content two section starts.
	$this->start_controls_section(
		'wpmozo_toggle_two',
		array(
			'label' => esc_html__( 'Toggle Two Content', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_CONTENT,
		)
	);

	$this->add_control(
		'wpmozo_toggle_two_title',
		array(
			'label'       => esc_html__( 'Toggle Title', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
			'default'     => 'Content Two',
			'type'        => Controls_Manager::TEXT,
			'placeholder' => esc_html__( 'Enter Title', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_control(
		'wpmozo_toggle_two_type',
		array(
			'label'   => esc_html__( 'Content Type', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'text',
			'options' => array(
				'text'     => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
				'template' => esc_html__( 'Template', 'wpmozo-addons-lite-for-elementor' ),
				'page'     => esc_html__( 'Page', 'wpmozo-addons-lite-for-elementor' ),
			),
		)
	);
	$this->add_control(
		'wpmozo_toggle_two_content',
		array(
			'label'       => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXTAREA,
			'default'     => esc_html__( 'Default content', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Type your content here', 'wpmozo-addons-lite-for-elementor' ),
			'condition'   => array(
				'wpmozo_toggle_two_type' => 'text',
			),
		)
	);
	// Add a custom control to your Elementor widget.
	$this->add_control(
		'wpmozo_toggle_two_select_template',
		array(
			'label'     => esc_html__( 'Select Template', 'wpmozo-addons-lite-for-elementor' ),
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
			'label'     => esc_html__( 'Select Page', 'wpmozo-addons-lite-for-elementor' ),
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
	// Toggle Switch Styling controls starts here.
	$this->start_controls_section(
		'wpmozo_toggle_switch_style',
		array(
			'label' => esc_html__( 'Toggle Switch Styling', 'wpmozo-addons-lite-for-elementor' ),
			'tab'   => Controls_Manager::TAB_STYLE,
		)
	);
	$this->add_control(
		'wpmozo_toggle_switch_layout',
		array(
			'label'   => esc_html__( 'Select Toggle Layout', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'wpmozo_toggle_layout_one',
			'options' => array(
				'wpmozo_toggle_layout_one' => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
				'wpmozo_toggle_layout_two' => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),
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
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			)
		);

			$this->add_control(
				'wpmozo_toggle_switch_normal_color',
				array(
					'label'     => esc_html__( 'Switch Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Color (ON State)', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Background Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Background Color (ON State)', 'wpmozo-addons-lite-for-elementor' ),
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
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_switch_hover_color',
				array(
					'label'     => esc_html__( 'Switch Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Color (ON State)', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Background Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'     => esc_html__( 'Switch Background Color (ON State)', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
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
					'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_switch_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
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
					'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_switch_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
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

			// Toggle label normal state styling starts here.
			$this->start_controls_section(
				'wpmozo_toggle_label_style',
				array(
					'label'     => esc_html__( 'Toggle Label Text Settings', 'wpmozo-addons-lite-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_two' ),
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_label_active_and_inactive_state_control_tab'
			);

			$this->start_controls_tab(
				'wpmozo_toggle_label_text_active_state_tab',
				array(
					'label' => esc_html__( 'Active Toggle', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_active_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active',
				)
			);

			$this->add_control(
				'wpmozo_toggle_active_label_normal_state_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active' => 'color: {{VALUE}}',
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active:hover' => 'color: {{wpmozo_toggle_active_label_hover_state_text_color.VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_label_text_inactive_state_tab',
				array(
					'label' => esc_html__( 'Inactive Toggle', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_inactive_label_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive',
				)
			);

			$this->add_control(
				'wpmozo_toggle_inactive_label_normal_state_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive' => 'color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->end_controls_tabs();

			$this->end_controls_section();

			// Toggle label hover state styling starts here.
			$this->start_controls_section(
				'wpmozo_toggle_label_hover_style',
				array(
					'label'     => esc_html__( 'Toggle Label Hover State Text Settings', 'wpmozo-addons-lite-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_two' ),
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_label_active_and_inactive_hover_state_control_tab'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_label_active_hover_state_tab',
				array(
					'label' => esc_html__( 'Active Toggle', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'    => esc_html__( 'Hover State Typography', 'wpmozo-addons-lite-for-elementor' ),
					'name'     => 'wpmozo_toggle_active_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active:hover',
				)
			);

			$this->add_control(
				'wpmozo_toggle_active_label_hover_state_text_color',
				array(
					'label'     => esc_html__( 'Hover State Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_active:hover' => 'color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();
			$this->start_controls_tab(
				'wpmozo_toggle_label_inactive_hover_state_tab',
				array(
					'label' => esc_html__( 'Inactive Toggle', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'    => esc_html__( 'Hover State Typography', 'wpmozo-addons-lite-for-elementor' ),
					'name'     => 'wpmozo_toggle_inactive_label_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive:hover',
				)
			);
			$this->add_control(
				'wpmozo_toggle_inactive_label_hover_state_text_color',
				array(
					'label'     => esc_html__( 'Hover State Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_trigger.wpmozo_inactive:hover' => 'color: {{VALUE}}',
					),
				)
			);
			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Toggle title text styling starts here.
			$this->start_controls_section(
				'wpmozo_toggle_title_text_style',
				array(
					'label'     => esc_html__( 'Toggle Switch Text Settings', 'wpmozo-addons-lite-for-elementor' ),
					'tab'       => Controls_Manager::TAB_STYLE,
					'condition' => array( 'wpmozo_toggle_switch_layout' => 'wpmozo_toggle_layout_one' ),
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_title_text_normal_and_hover_state_control_tab'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_title_text_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_title_normal_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'wpmozo_toggle_title_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title, {{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_one::before ' => 'color: {{VALUE}}',
					),
				)
			);

			$this->end_controls_tab();

			$this->start_controls_tab(
				'wpmozo_toggle_title_text_hover_state_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'name'     => 'wpmozo_toggle_title_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title:hover',
				)
			);
			// text color control was not given so added here.
			$this->add_control(
				'wpmozo_toggle_title_hover_text_color',
				array(
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_toggle_title:hover, {{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_toggle_button_wrapper .wpmozo_switch_two::before ' => 'color: {{VALUE}}',
					),
				)
			);


			$this->end_controls_tab();
			$this->end_controls_tabs();
			$this->end_controls_section();

			// Content One text styling starts here.
			$this->start_controls_section(
				'wpmozo_toggle_one_style',
				array(
					'label' => esc_html__( 'Content One Text Settings', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs(
				'wpmozo_toggle_one_title_text_normal_and_hover_state_control_tab'
			);
			$this->start_controls_tab(
				'wpmozo_toggle_title_one_text_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_one_text_color',
				array(
					'label'     => esc_html__( 'Content one Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_one_toggle.wpmozo_content_toggle_text' => 'color: {{VALUE}}',
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
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_one_hover_text_color',
				array(
					'label'     => esc_html__( 'Content one Text Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
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
					'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_one_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
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
					'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_one_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
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
				'wpmozo_toggle_two_style',
				array(
					'label' => esc_html__( 'Content Two Text Settings', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);

			$this->start_controls_tabs( 'wpmozo_toggle_two_title_text_normal_and_hover_state_control_tab' );
			$this->start_controls_tab(
				'wpmozo_toggle_title_two_text_normal_state_tab',
				array(
					'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_two_text_color',
				array(
					'label'     => esc_html__( 'Content Two Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array(
						'{{WRAPPER}} .wpmozo_content_toggle_wrapper .wpmozo_content_two_toggle.wpmozo_content_toggle_text' => 'color: {{VALUE}}',
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
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$this->add_control(
				'wpmozo_toggle_two_hover_text_color',
				array(
					'label'     => esc_html__( 'Content Two Text Color', 'wpmozo-addons-lite-for-elementor' ),
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
					'label'       => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options'     => array(
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
					'label' => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_two_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
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
					'label' => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_control(
				'wpmozo_toggle_two_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
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

			/**
			 * Function to get Elementor templates as options.
			 * **/
			function wpmozo_ae_get_elementor_templates_as_options() {
				$templates        = Plugin::$instance->templates_manager->get_source( 'local' )->get_items();
				$template_options = array();
				// Add the "Select Template" option with an empty value as the first item.
				$template_options[0] = esc_html__( 'Select Template', 'wpmozo-addons-lite-for-elementor' );
				foreach ( $templates as $template ) {
					// Use the template's ID as the key and the title as the value.
					$template_options[ $template['template_id'] ] = $template['title'];
				}
				return $template_options;
			}

			/**
			 * Function to get a list of pages as options.
			 * **/
			function wpmozo_ae_get_pages_as_options() {
				$pages        = get_pages();
				$page_options = array();
				global $post;

				$current_post_id = $post->ID;

				// Add the "Select Page" option with an empty value as the first item.
				$page_options[0] = esc_html__( 'Select Page', 'wpmozo-addons-lite-for-elementor' );

				foreach ( $pages as $page ) {
					if ( $current_post_id !== $page->ID ) {
						$page_options[ $page->ID ] = $page->post_title;
					}
				}

				return $page_options;
			}
