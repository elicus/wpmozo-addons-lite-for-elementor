<?php
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;

// content section starts here.  
$this->start_controls_section( 
    'content_section',
    array( 
        'label' => __( 'Content', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_CONTENT,
    )
 );
    $this->add_control( 
        'pre',
        array( 
            'label'       => esc_html__( 'Pre', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'WPMozo', 'wpmozo-addons-lite-for-elementor' ),
            'rows'        => 10,
            'label_block' => true,
        )
    );
    $this->add_control( 
        'content',
        array( 
            'label'       => esc_html__( 'Main', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'Text Highlighter', 'wpmozo-addons-lite-for-elementor' ),
            'rows'        => 10,
            'label_block' => true,
        )
    );
    $this->add_control( 
        'post',
        array( 
            'label'       => esc_html__( 'Post', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'Addon For Elementor', 'wpmozo-addons-lite-for-elementor' ),
            'rows'        => 10,
            'label_block' => true,
        )
    );
    $this->add_control( 
        'highlighter_shape',
        array( 
            'label'   => esc_html__( 'Text Highlighter Shape', 'wpmozo-addons-lite-for-elementor' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'zig_zag',
            'options' => array( 
                'zig_zag'          => esc_html__( 'Zig Zag', 'wpmozo-addons-lite-for-elementor' ),
                'underline'        => esc_html__( 'Underline', 'wpmozo-addons-lite-for-elementor' ),                        
                'double_underline' => esc_html__( 'Double Underline', 'wpmozo-addons-lite-for-elementor' ),                        
                'circle'           => esc_html__( 'Circle', 'wpmozo-addons-lite-for-elementor' ),                        
                'diagonal'         => esc_html__( 'Diagonal', 'wpmozo-addons-lite-for-elementor' ),                        
                'cross'            => esc_html__( 'Cross', 'wpmozo-addons-lite-for-elementor' ),                        
                'curly_line'       => esc_html__( 'Curly Line', 'wpmozo-addons-lite-for-elementor' ),                        
            ),
            'label_block' => true,                    
            
        )
    );
    $this->add_control( 
        'display_in_stack',
        array( 
            'label'        => esc_html__( 'Display in Stack', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',                    
        )
    );
    $this->add_control( 
        'wrap_in_heading_tag',
        array( 
            'label'        => esc_html__( 'Wrap in Heading Tag', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',                    
        )
    );
    $this->end_controls_section();
    // Highlighter shape style section starts here.  
    $this->start_controls_section( 
        'shape_setting',
        array( 
        'label' => esc_html__( 'Highlighter Shape Settings', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        )
    );
    $this->add_responsive_control( 
        'highlighter_color',
        array( 
            'label'     => esc_html__( 'Highlighter Color', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter_inner_wrapper svg path' => 'fill: {{VALUE}};',
                '{{WRAPPER}} .wpmozo_text_highlighter_inner_wrapper svg path' => 'stroke: {{VALUE}};',
            ),
            'default'   => '#2B87DA', 
        )
    );
    $this->add_responsive_control( 
        'stroke_width',
        array( 
        'label'      => esc_html__( 'Strock Width', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'px' ),
        'range'      => array( 
            'px' => array( 
                'min'  => 0,
                'max'  => 12.5,
                'step' => 0.5,
            ),
        ),
        'default' => array( 
            'unit' => 'px',
            'size' => 2.5,
        ),
        'selectors' => array( 
            '{{WRAPPER}} .wpmozo_text_highlighter_inner_wrapper svg path' => 'stroke-width: {{SIZE}}{{UNIT}};',                    
        ),
        )
    );
    $this->add_responsive_control( 'stroke_paint_animation_delay',
        array( 
        'label'      => esc_html__( 'Stroke Paint Animation Delay', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'range'      => array( 
            'ms' => array( 
                'min'  => 0,
                'max'  => 10000,
                'step' => 100,
            ),
            's' => array( 
                'min'  => 0,
                'max'  => 100,
                'step' => 1,
            ),
        ),
        'default' => array( 
            'unit' => 'ms',
            'size' => 300,
        ),
        'size_units' => array( 'ms', 's' ),
        'selectors' => array( 
            '{{WRAPPER}} .wpmozo_text_highlighter_inner_wrapper svg path' => 'animation-delay: {{SIZE}}{{UNIT}};',                    
        ),
        )
    );
    $this->add_control( 
        'custom_highlighter_positioning',
        array( 
            'label'        => esc_html__( 'Custom Position For Highlighter', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',                    
        )
    );
    $this->add_responsive_control( 'custom_vertical_position_for_highlighter',
        array( 
        'label'      => esc_html__( 'Vertical', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'px', '%' ),
        'range'      => array( 
            'px' => array( 
                'min'  => 0,
                'max'  => 10000,
                'step' => 1,
            ),
            '%' => array( 
                'min'  => -1000,
                'max'  => 1000,
                'step' => 1,
            ),
        ),
        'default' => array( 
            'unit' => '%',
            'size' => 100,
        ),
        'selectors' => array( 
            '{{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_curly_line svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_double_underline svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_underline svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_zig_zag svg' => 'top: {{SIZE}}{{UNIT}};',                    
        ),
        'condition' => array( 
            'custom_highlighter_positioning' => 'yes',
        ),
        )
    );
    $this->add_responsive_control( 'custom_horizontal_position_for_highlighter',
        array( 
        'label'      => esc_html__( 'Horizontal', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( '%', 'px' ),
        'range'      => array( 
            '%' => array( 
                'min'  => -1000,
                'max'  => 1000,
                'step' => 1,
            ),
            'px' => array( 
                'min'  => 0,
                'max'  => 10000,
                'step' => 1,
            ),
        ),
        'default' => array( 
            'unit' => '%',
        ),
        'selectors' => array( 
            '{{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_curly_line svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_double_underline svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_underline svg, {{WRAPPER}} .wpmozo_text_highlighter_wrapper.wpmozo_highlight_zig_zag svg' => 'left: {{SIZE}}{{UNIT}};',                    
        ),
        'condition' => array( 
            'custom_highlighter_positioning' => 'yes',
        ),
        )
    );
    $this->end_controls_section();

    // Text style section starts here 
    $this->start_controls_section( 
        'text_setting',
        array( 
        'label' => __( 'Text Settings', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition'   => array( 
            'wrap_in_heading_tag' => '',
        ),
        )
    );
    $this->start_controls_tabs( 'text_setting_tabs' );
        $this->start_controls_tab( 
            'global_text_tab',
            array( 
                'label' => esc_html__( 'Global', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'global_text_color',
                array( 
                'label'     => esc_html__( 'Global Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'global_text_typography',
                'label'    => esc_html__( 'Global Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'global_text_shadow',
                'label'    => esc_html__( 'Global Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span',
                )
            );
            $this->add_responsive_control( 
                'global_text_alignment',
                array( 
                'label'       => esc_html__( 'Global Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options'     => array( 
                'left'   =>
                    array( 
                        'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-left',
                    ),
                'center' =>
                    array( 
                        'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-center',
                    ),
                'right'  =>
                    array( 
                        'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-right',
                    ),
                ),
                'toggle'      => true,
                'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter_wrapper' => 'text-align: {{VALUE}};', 
                ),
                )
            );
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'pre_text_tab',
                array( 
                'label' => esc_html__( 'Pre', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'pre_text_color',
                array( 
                'label'     => esc_html__( 'Pre Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'pre_text_typography',
                'label'    => esc_html__( 'Pre Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'pre_text_shadow',
                'label'    => esc_html__( 'Pre Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper',
                )
            );            
            $this->end_controls_tab(); 
            $this->start_controls_tab( 
                'main_text_tab',
                array( 
                'label' => esc_html__( 'Main', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'main_text_color',
                array( 
                'label'     => esc_html__( 'Main Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'main_text_typography',
                'label'    => esc_html__( 'Pre Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'main_text_shadow',
                'label'    => esc_html__( 'Main Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content',
                )
            );            
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'post_text_tab',
                array( 
                'label' => esc_html__( 'Post', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'post_text_color',
                array( 
                'label'     => esc_html__( 'Post Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'post_text_typography',
                'label'    => esc_html__( 'Post Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'post_text_shadow',
                'label'    => esc_html__( 'Post Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper',
                )
            );            
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

            // Title text section starts here 
            $this->start_controls_section( 
                'title_text_setting',
                array( 
                'label' => __( 'Title Settings', 'wpmozo-addons-lite-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition'   => array( 
                'wrap_in_heading_tag' => 'yes',
                ),
                ),   
            );
            $this->start_controls_tabs( 'title_text_setting_tabs' );
            $this->start_controls_tab( 
                'global_title_text_tab',
                array( 
                'label' => esc_html__( 'Global', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_control( 
                'global_heading_level',
                array( 
                    'label'       => esc_html__( 'Global Heading Level', 'wpmozo-addons-lite-for-elementor' ),
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
                    'default' => 'h2',
                    'toggle'  => false,
                )
            );
            $this->add_responsive_control( 
                'global_title_text_color',
                array( 
                'label'     => esc_html__( 'Global Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'global_title_text_typography',
                'label'    => esc_html__( 'Global Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'global_title_text_shadow',
                'label'    => esc_html__( 'Global Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span',
                )
            );
            $this->add_responsive_control( 
                'global_title_text_alignment',
                array( 
                'label'       => esc_html__( 'Global Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options'     => array( 
                'left'   =>
                    array( 
                        'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-left',
                    ),
                'center' =>
                    array( 
                        'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-center',
                    ),
                'right'  =>
                    array( 
                        'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
                        'icon'  => 'eicon-text-align-right',
                    ),
                ),
                'toggle'      => true,
                'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter_wrapper' => 'text-align: {{VALUE}};', 
                ),
                )
            );
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'pre_title_text_tab',
                array( 
                'label' => esc_html__( 'Pre', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'pre_title_text_color',
                array( 
                'label'     => esc_html__( 'Pre Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'pre_title_text_typography',
                'label'    => esc_html__( 'Pre Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'pre_title_text_shadow',
                'label'    => esc_html__( 'Pre Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_pre_inner_wrapper',
                )
            );            
            $this->end_controls_tab();  
            $this->start_controls_tab( 
                'main_title_text_tab',
                array( 
                'label' => esc_html__( 'Main', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'main_title_text_color',
                array( 
                'label'     => esc_html__( 'Main Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'main_title_text_typography',
                'label'    => esc_html__( 'Main Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'main_title_text_shadow',
                'label'    => esc_html__( 'Main Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighted_content',
                )
            );            
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'post_title_text_tab',
                array( 
                'label' => esc_html__( 'Post', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
            $this->add_responsive_control( 
                'post_title_text_color',
                array( 
                'label'     => esc_html__( 'Post Text Color', 'wpmozo-addons-lite-for-elementor' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => array( 
                '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper' => 'color: {{VALUE}};',
                ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                'name'     => 'post_title_text_typography',
                'label'    => esc_html__( 'Pre Typography', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                'name'     => 'post_title_text_shadow',
                'label'    => esc_html__( 'Post Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'selector' => '{{WRAPPER}} .wpmozo_text_highlighter span.wpmozo_text_highlighter_post_inner_wrapper',
                )
            );
            
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();