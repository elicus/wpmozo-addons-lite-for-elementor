<?php

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Controls_Manager\URL;

// Button Iitem Section starts.
$this->start_controls_section(
	'button_item_sec',
	array(
		'label' => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$repeater = new Repeater();
	$repeater->start_controls_tabs( 'button_tabs' );
		$repeater->start_controls_tab(
			'button_content_tab',
			array(
				'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
			)
		);
			$repeater->add_control(
				'button_type',
				array(
					'label'       => esc_html__( 'Button Type', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'classic'    => esc_html__( 'Classic', 'wpmozo-addons-lite-for-elementor' ),
						'conversion' => esc_html__( 'Conversion', 'wpmozo-addons-lite-for-elementor' ),
					),
					'default'     => 'classic',
					'render_type' => 'template',
				)
			);
			$repeater->add_responsive_control(
				'button_text',
				array(
					'label'       => esc_html__( 'Button Text', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'render_type' => 'template',
				),
			);
			$repeater->add_responsive_control(
				'secondary_text',
				array(
					'label'       => esc_html__( 'Secondary Text', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'render_type' => 'template',
					'condition'   => array( 'button_type' => 'conversion' ),
				),
			);
			$repeater->add_control(
				'link_heading',
				array(
					'label'     => esc_html__( 'Link', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_control(
				'button_url',
				array(
					'label'       => esc_html__( 'Link', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::URL,
					'options'     => false,
					'default'     => array(
						'url' => '',
					),
					'label_block' => true,
					'dynamic'     => array(
						'active' => true,
					),
				)
			);
			$repeater->add_control(
				'url_new_window',
				array(
					'label'   => esc_html__( 'Button Link Target', 'wpmozo-addons-lite-for-elementor' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => array(
						'_self'  => array(
							'title' => esc_html__( 'Same Window', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-link',
						),
						'_blank' => array(
							'title' => esc_html__( 'New Tab', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-editor-external-link',
						),
					),
					'default' => '_self',
					'toggle'  => false,
				)
			);

			$repeater->end_controls_tab();

			$repeater->start_controls_tab(
				'button_style_tab',
				array(
					'label' => esc_html__( 'Style', 'wpmozo-addons-lite-for-elementor' ),
				)
			);

			$repeater->add_responsive_control(
				'button_color',
				array(
					'label'       => esc_html__( 'Button Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_primary_text_with_icon .wpmozo_button_text' => 'color: {{VALUE}};',
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'          => esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'button_typography',
					'selector'       => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_primary_text_with_icon .wpmozo_button_text',
					'fields_options' => array(
						'font_size' => array(
							'selectors'   => array(
								'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_primary_text_with_icon svg.wpmozo_ae_button_icon' => 'width:{{SIZE}}{{UNIT}}; height:{{SIZE}}{{UNIT}};',
								'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_primary_text_with_icon .wpmozo_button_text, {{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon' => 'font-size:{{SIZE}}{{UNIT}};',
								'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link .wpmozo_primary_text_with_icon i.wpmozo_ae_button_icon' => 'width:auto; height: auto;',
							),
							'default'     => array(
								'size' => '18',
								'unit' => 'px',
							),
							'render_type' => 'template',
						),
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'button_bg_color',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_wrapper .wpmozo_button_link',
				)
			);

			$repeater->add_responsive_control(
				'secondary_button_color',
				array(
					'label'       => esc_html__( 'Secondary Button Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#2ea3f2',
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_secondary_text' => 'color: {{VALUE}};',
					),
					'condition'   => array( 'button_type' => 'conversion' ),
				)
			);

			$repeater->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'       => esc_html__( 'Secondary Button Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'secondary_button_typography',
					'selector'    => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_secondary_text, {{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link:hover .wpmozo_button_secondary_text',
					'condition'   => array( 'button_type' => 'conversion' ),
				)
			);

			$repeater->add_responsive_control(
				'button_text_alignment',
				array(
					'label'     => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
					'toggle'    => true,
					'default'   => 'left',
					'selectors' => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link' => 'text-align: {{VALUE}};',
					),
				)
			);

			$repeater->add_responsive_control(
				'button_alignment',
				array(
					'label'     => esc_html__( 'Button Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::CHOOSE,
					'options'   => array(
						'left'   => array(
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-align-start-h',
						),
						'center' => array(
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-align-center-h',
						),
						'right'  => array(
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-align-end-h',
						),
					),
					'toggle'    => true,
					'selectors' => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_wrapper' => 'text-align: {{VALUE}};',
					),
				)
			);
			$repeater->add_control(
				'button_icon_heading',
				array(
					'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_control(
				'button_use_icon',
				array(
					'label'        => esc_html__( 'Use Icon on Button', 'wpmozo-addons-lite-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => '',
					'return_value' => 'on',
				)
			);
			$repeater->add_control(
				'button_icon',
				array(
					'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => array(
						'value'   => 'fas fa-star',
						'library' => 'fa-solid',
					),
					'condition' => array( 'button_use_icon' => 'on' ),
				)
			);
			$repeater->add_responsive_control(
				'button_icon_color',
				array(
					'label'       => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_wrapper svg path' => 'fill: {{VALUE}};',
					),
					'condition'   => array( 'button_use_icon' => 'on' ),
				)
			);

			$repeater->add_responsive_control(
				'button_icon_position',
				array(
					'label'       => esc_html__( 'Button Icon Position', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::CHOOSE,
					'options'     => array(
						'row-reverse' => array(
							'title' => esc_html__( 'Before', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-angle-left',
						),
						'row'         => array(
							'title' => esc_html__( 'After', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-angle-right',
						),
					),
					'default'     => 'row-reverse',
					'render_type' => 'template',
					'toggle'      => false,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_primary_text_with_icon' => 'flex-flow:{{VALUE}}; gap:5px;',
					),
					'condition'   => array(
						'button_icon[value]!' => '',
						'button_use_icon'     => 'on',
					),
				)
			);

			$repeater->add_control(
				'show_icon_on_hover_switcher',
				array(
					'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-lite-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
					'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
					'return_value' => 'yes',
					'default'      => '',
					'selectors'    => array(
						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse.size_set .wpmozo_button_wrapper .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse.size_set .wpmozo_button_wrapper .wpmozo_primary_text_with_icon svg' => 'opacity: 0; transition: all 300ms; margin-right: -{{button_typography_font_size.SIZE}}{{button_typography_font_size.UNIT}};',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse.size_set .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_ae_button svg' => 'opacity: 1; margin-right:0;',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row.size_set .wpmozo_button_wrapper .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row.size_set .wpmozo_button_wrapper .wpmozo_primary_text_with_icon svg' => 'opacity: 0; transition: all 300ms; margin-left: -{{button_typography_font_size.SIZE}}{{button_typography_font_size.UNIT}};',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row.size_set .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_ae_button svg' => 'opacity: 1; margin-left:0;',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse.size_empty .wpmozo_button_wrapper .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse.size_empty .wpmozo_button_wrapper .wpmozo_primary_text_with_icon svg' => 'opacity: 0; transition: all 300ms; margin-right: -{{buttons_typography_font_size.SIZE}}{{buttons_typography_font_size.UNIT}};',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row.size_empty .wpmozo_button_wrapper .wpmozo_primary_text_with_icon .wpmozo_ae_button_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row.size_empty .wpmozo_button_wrapper .wpmozo_primary_text_with_icon svg' => 'opacity: 0; transition: all 300ms; margin-left: -{{buttons_typography_font_size.SIZE}}{{buttons_typography_font_size.UNIT}};',

						'{{WRAPPER}} {{CURRENT_ITEM}}.icon_row .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_primary_text_with_icon, {{WRAPPER}} {{CURRENT_ITEM}}.icon_row-reverse .wpmozo_button_wrapper .wpmozo_button_link:hover .wpmozo_primary_text_with_icon' => 'gap:5px;',


						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_wrapper .wpmozo_primary_text_with_icon' => ' gap:0px;',

					),
					'condition'    => array(
						'button_icon[value]!' => '',
						'button_use_icon'     => 'on',
					),
				)
			);
			$repeater->add_control(
				'button_spacing',
				array(
					'label'     => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::HEADING,
					'separator' => 'before',
				)
			);
			$repeater->add_responsive_control(
				'button_padding',
				array(
					'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$repeater->add_responsive_control(
				'button_margin',
				array(
					'label'      => esc_html__( 'Margin', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Border::get_type(),
				array(
					'name'      => 'button_border',
					'separator' => 'before',
					'label'     => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link',
				)
			);
			$repeater->add_responsive_control(
				'button_border_radius',
				array(
					'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-lite-for-elementor' ),
					'type'       => Controls_Manager::DIMENSIONS,
					'size_units' => array( 'px', 'em', '%' ),
					'selectors'  => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					),
				)
			);
			$repeater->add_group_control(
				Group_Control_Box_Shadow::get_type(),
				array(
					'name'      => 'button_box_shadow',
					'separator' => 'before',
					'label'     => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link',
				)
			);
			$repeater->end_controls_tab();
			$repeater->start_controls_tab(
				'button_hover_tab',
				array(
					'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$repeater->add_control(
				'background_fill_style',
				array(
					'label'       => esc_html__( 'Background Fill Style', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'render_type' => 'template',
					'type'        => Controls_Manager::SELECT,
					'options'     => array(
						'default_fill'            => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
						'wipe_fill'               => esc_html__( 'Wipe', 'wpmozo-addons-lite-for-elementor' ),
						'slide_up_fill'           => esc_html__( 'Slide Up', 'wpmozo-addons-lite-for-elementor' ),
						'slide_down_fill'         => esc_html__( 'Slide Down', 'wpmozo-addons-lite-for-elementor' ),
						'slide_left_fill'         => esc_html__( 'Slide Left', 'wpmozo-addons-lite-for-elementor' ),
						'slide_right_fill'        => esc_html__( 'Slide Right', 'wpmozo-addons-lite-for-elementor' ),
						'vertical_shutter_fill'   => esc_html__( 'Vertical Shutter', 'wpmozo-addons-lite-for-elementor' ),
						'horizontal_shutter_fill' => esc_html__( 'Horizontal Shutter', 'wpmozo-addons-lite-for-elementor' ),
					),
					'default'     => 'default_fill',
				)
			);
			$repeater->add_group_control(
				Group_Control_Background::get_type(),
				array(
					'name'     => 'button_bg_hover_color',
					'label'    => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
					'types'    => array( 'classic', 'gradient' ),
					'exclude'  => array( 'position' ),
					'selector' => '
                    {{WRAPPER}} {{CURRENT_ITEM}}.vertical_or_horizonal_fill .wpmozo_button_link:hover .wpmozo_background_effect_wrap:before, 
                    {{WRAPPER}} {{CURRENT_ITEM}}.vertical_or_horizonal_fill .wpmozo_button_link:hover .wpmozo_background_effect_wrap:after, 
                    {{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link:hover .wpmozo_background_effect_wrap:before,
                    {{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_default_fill:hover
                    ',
				)
			);
			$repeater->add_responsive_control(
				'button_hover_color',
				array(
					'label'       => esc_html__( 'Button Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link:hover .wpmozo_primary_text_with_icon .wpmozo_button_text' => 'color: {{VALUE}};',
					),
				)
			);
			$repeater->add_responsive_control(
				'secondary_button_hover_color',
				array(
					'label'       => esc_html__( 'Secondary Button Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_link:hover .wpmozo_button_secondary_text' => 'color: {{VALUE}};',
					),
					'condition'   => array( 'button_type' => 'conversion' ),

				)
			);

			$repeater->add_responsive_control(
				'button_icon_color_on_hover',
				array(
					'label'       => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'selectors'   => array(
						'{{WRAPPER}} {{CURRENT_ITEM}} .wpmozo_button_wrapper .wpmozo_button_link:hover svg path' => 'fill: {{VALUE}};',
					),
					'condition'   => array( 'button_use_icon' => 'on' ),
				)
			);
			$repeater->end_controls_tab();
			$repeater->end_controls_tabs();


			$this->add_control(
				'buttons',
				array(
					'label'       => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater->get_controls(),
					'title_field' => '{{{ button_text }}}',
				),
			);

			$this->end_controls_section();

			/* Configuration section starts here. */
			$this->start_controls_section(
				'configuration',
				array(
					'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_CONTENT,
				)
			);
			$this->add_control(
				'inline_buttons',
				array(
					'label'        => esc_html__( 'Inline Buttons', 'wpmozo-addons-lite-for-elementor' ),
					'type'         => Controls_Manager::SWITCHER,
					'default'      => '',
					'return_value' => 'on',
				)
			);

			$this->end_controls_section();

			/* Buttons alignment control starts here. */
			$this->start_controls_section(
				'button_alignment_sec',
				array(
					'label' => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->add_responsive_control(
				'buttons_alignment',
				array(
					'label'     => esc_html__( 'Buttons Alignment', 'wpmozo-addons-lite-for-elementor' ),
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
					'toggle'    => false,
					'default'   => 'center',
					'selectors' => array(
						'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};',
					),
				)
			);

			$this->end_controls_section();

			/* Buttons text and icon style controls start here. */
			$this->start_controls_section(
				'text_and_button_sec',
				array(
					'label' => esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
					'tab'   => Controls_Manager::TAB_STYLE,
				)
			);
			$this->start_controls_tabs( 'button_text_and_icon_tabs' );
			$this->start_controls_tab(
				'button_text_tab',
				array(
					'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				array(
					'label'          => esc_html__( 'Button Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block'    => true,
					'name'           => 'buttons_typography',
					'selector'       => '{{WRAPPER}} .wpmozo_primary_text_with_icon .wpmozo_button_text',
					'fields_options' => array(
						'typography' => array(
							'default' => 'yes',
						),
						'font_size'  => array(
							'default'   => array( 'size' => 18 ),
							'selectors' => array(
								'{{WRAPPER}} .wpmozo_primary_text_with_icon svg.wpmozo_ae_button_icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .wpmozo_primary_text_with_icon .wpmozo_button_text' => 'font-size:{{SIZE}}{{UNIT}};',
							),
						),
					),

				)
			);
			$this->end_controls_tab();
			$this->start_controls_tab(
				'button_icon_tab',
				array(
					'label' => esc_html__( 'Icon', 'wpmozo-addons-lite-for-elementor' ),
				)
			);
			$this->add_responsive_control(
				'buttons_icon_color',
				array(
					'label'       => esc_html__( 'Button Icon Color', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => false,
					'type'        => Controls_Manager::COLOR,
					'default'     => '#2EA3F2',
					'selectors'   => array(
						'{{WRAPPER}} .wpmozo_button_wrapper svg.wpmozo_ae_button_icon' => 'fill: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_button_wrapper .wpmozo_ae_button_icon' => 'color: {{VALUE}};',
					),
				)
			);
			$this->end_controls_tab();

			$this->end_controls_tabs();
			$this->end_controls_section();
