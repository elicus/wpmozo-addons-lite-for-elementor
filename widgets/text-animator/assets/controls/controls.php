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
        'prefix_text',
        array( 
            'label'       => esc_html__( 'Prefix Text', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'Pre', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => true,
        )
    );
    $this->add_control( 
        'animated_text',
        array( 
            'label'       => esc_html__( 'Animated Text ( | Separated )', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'Animated|Text', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => true,
        )
    );  
    $this->add_control( 
        'postfix_text',
        array( 
            'label'       => esc_html__( 'Postfix Text', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => esc_html__( 'Post', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => true,
        )
    );  

    $this->add_control( 
        'display_tag',
        array( 
            'label'   => esc_html__( 'Select Display Tag', 'wpmozo-addons-lite-for-elementor' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'p',
            'options' => array( 
                'h1'   => esc_html__( 'H1', 'wpmozo-addons-lite-for-elementor' ),
                'h2'   => esc_html__( 'H2', 'wpmozo-addons-lite-for-elementor' ),
                'h3'   => esc_html__( 'H3', 'wpmozo-addons-lite-for-elementor' ),
                'h4'   => esc_html__( 'H4', 'wpmozo-addons-lite-for-elementor' ),
                'h5'   => esc_html__( 'H5', 'wpmozo-addons-lite-for-elementor' ),
                'h6'   => esc_html__( 'H6', 'wpmozo-addons-lite-for-elementor' ),
                'p'    => esc_html__( 'P', 'wpmozo-addons-lite-for-elementor' ),
            ),
        )
    );  
    
    
    $this->end_controls_section();

    $this->start_controls_section( 
        'animation_section',
        array( 
            'label' => __( 'Animation', 'wpmozo-addons-lite-for-elementor' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        )
    );

    $this->add_control( 
        'animation_type',
        array( 
            'label'   => esc_html__( 'Select Animation', 'wpmozo-addons-lite-for-elementor' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'fade',
            'options' => array( 
                'fade'   => esc_html__( 'Fade', 'wpmozo-addons-lite-for-elementor' ),
                'flip'   => esc_html__( 'Flip', 'wpmozo-addons-lite-for-elementor' ),
                'typing' => esc_html__( 'Typing', 'wpmozo-addons-lite-for-elementor' ),
                'slide'  => esc_html__( 'Slide', 'wpmozo-addons-lite-for-elementor' ),
                'zoom'   => esc_html__( 'Zoom', 'wpmozo-addons-lite-for-elementor' ),
                'bounce' => esc_html__( 'Bounce', 'wpmozo-addons-lite-for-elementor' ),
                'wipe'   => esc_html__( 'Wipe', 'wpmozo-addons-lite-for-elementor' ),
                'wave'   => esc_html__( 'Wave', 'wpmozo-addons-lite-for-elementor' ),
            ),
        )
    );

    $this->add_control( 
        'display_in_stack',
        array( 
            'label'         => esc_html__( 'Display Text in Stack', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'     => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value'  => 'yes',
            'prefix_class'  => 'display_in_stack_',
            'selectors'     =>  array( 
                '{{WRAPPER}}.display_in_stack_yes .wpmozo_animated_text_wrapper .wpmozo_text_heading' => 'flex-direction: column;',
            ),                
        )
    );

    $this->add_responsive_control( 
        'animation_time',
        array( 
            'label'      => esc_html__( 'Animation Duration ( in ms )', 'wpmozo-addons-lite-for-elementor' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => array( 'ms' ),
            'range'      => array( 
                'ms' => array( 
                    'min'  => 10,
                    'max'  => 5000,
                    'step' => 10,
                ),
            ),
            'default' => array( 
                'unit' => 'ms',
                'size' => 500,
            ),
            'render_type' => 'template',
            'condition'   => array( 
                'animation_type!' => 'typing',
            ),
            'selectors'    =>  array( 
                '{{WRAPPER}} .wpmozo_animated_text_wrapper .wpmozo_animated_text' => 'animation-duration: {{SIZE}}{{UNIT}};',
            ),
        )
    );

    $this->add_control( 
        'typing_time',
        array( 
        'label'      => esc_html__( 'Typing Speed ( in ms )', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'ms' ),
        'range'      => array( 
            'ms' => array( 
                'min'  => 10,
                'max'  => 5000,
                'step' => 10,
            ),
        ),
        'default' => array( 
            'unit' => 'ms',
            'size' => 500,
        ),
        'render_type' => 'template',
        'condition'   => array( 
            'animation_type' => 'typing',
        ),
        )
    );

    $this->add_control( 
        'erasing_time',
        array( 
        'label'      => esc_html__( 'Erasing Speed ( in ms )', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'ms' ),
        'range'      => array( 
            'ms' => array( 
                'min'  => 10,
                'max'  => 5000,
                'step' => 10,
            ),
        ),
        'default' => array( 
            'unit' => 'ms',
            'size' => 500,
        ),
        'render_type' => 'template',
        'condition'   => array( 
            'animation_type' => 'typing',
        ),
        )
    );

    $this->add_control( 
        'animations_delay',
        array( 
        'label'      => esc_html__( 'Animation Delay ( in ms )', 'wpmozo-addons-lite-for-elementor' ),
        'type'       => Controls_Manager::SLIDER,
        'size_units' => array( 'ms' ),
        'range'      => array( 
            'ms' => array( 
                'min'  => 10,
                'max'  => 5000,
                'step' => 10,
            ),
        ),
        'render_type' => 'template',
        'default' => array( 
            'unit' => 'ms',
            'size' => 2000,
        ),
        )
    );

    $this->add_control( 
        'animation_on_hover',
        array( 
            'label'        => esc_html__( 'Stop Animation On Hover', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',                    
        )
    );

    

    $this->end_controls_section();

    // Text style section starts here 
    $this->start_controls_section( 
        'text_setting',
        array( 
        'label' => esc_html__( 'Text Settings', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        )
    );
    $this->start_controls_tabs( 'text_setting_tabs' );
        $this->start_controls_tab( 
            'global_text_tab',
            array( 
                'label' => esc_html__( 'Global', 'wpmozo-addons-lite-for-elementor' ),
            )
        );

            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Global Typography', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'global_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_text_animator *',
                )
            );

            $this->add_responsive_control( 
                'global_text_color',
                array( 
                    'label'       => esc_html__( 'Global Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_ae_text_animator' => 'color: {{VALUE}};',
                    ),
                )
            );

            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'global_text_shadow',
                    'label'     => esc_html__( 'Global Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_text_animator',
                    'separator' => 'before',
                )
            );

            $this->add_responsive_control( 
                'global_text_alignment',
                array( 
                    'label'        => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::CHOOSE,
                    'label_block'  => true,
                    'separator'    => 'before',
                    'options'      =>
                    array( 
                        'flex-start' =>
                            array( 
                                'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
                                'icon'  => 'eicon-text-align-left',
                            ),
                        'center'     =>
                            array( 
                                'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
                                'icon'  => 'eicon-text-align-center',
                            ),
                        'flex-end'   =>
                            array( 
                                'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
                                'icon'  => 'eicon-text-align-right',
                            ),
                    ),
                    'default'     => 'flex-start',
                    'toggle'      => true,
                    'selectors'   => array( 
                        '{{WRAPPER}}.display_in_stack_yes .wpmozo_ae_text_animator .wpmozo_text_heading' => 'place-items: {{VALUE}};',
                        '{{WRAPPER}}:not(.display_in_stack_yes) .wpmozo_ae_text_animator .wpmozo_text_heading' => 'justify-content: {{VALUE}};',
                    ),
                )
            );
        
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'pre_post_text_tab',
            array( 
            'label' => esc_html__( 'Pre/Post', 'wpmozo-addons-lite-for-elementor' ),
            )
        );

            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Pre/Post Typography', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'pre_post_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_pre_post',
                )
            );

            $this->add_responsive_control( 
                'pre_post_text_color',
                array( 
                    'label'       => esc_html__( 'Pre/Post Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_pre_post' => 'color: {{VALUE}};',
                    ),
                )
            );

            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'pre_post_text_shadow',
                    'label'     => esc_html__( 'Pre/Post Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_pre_post',
                    'separator' => 'before',
                )
            );
                        
        $this->end_controls_tab(); 
        $this->start_controls_tab( 
            'main_text_tab',
            array( 
            'label' => esc_html__( 'Animated', 'wpmozo-addons-lite-for-elementor' ),
            )
        );

            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'main_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_main_part',
                )
            );

            $this->add_responsive_control( 
                'main_text_color',
                array( 
                    'label'       => esc_html__( 'Animated Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_main_part' => 'color: {{VALUE}};',
                    ),
                )
            );

            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'main_text_shadow',
                    'label'     => esc_html__( 'Animated Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_main_part',
                    'separator' => 'before',
                )
            );
                        
        $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

            // Title text section starts here 
            $this->start_controls_section( 
                'text_background_setting',
                array( 
                'label' => __( 'Text Background Settings', 'wpmozo-addons-lite-for-elementor' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                ),   
            );
            $this->start_controls_tabs( 'text_background_setting_tabs' );
            $this->start_controls_tab( 
                'pre_post_text_background_tab',
                array( 
                'label' => esc_html__( 'Pre/Post', 'wpmozo-addons-lite-for-elementor' ),
                )
            );

            $this->add_control( 
                'pre_post_use_background',
                array( 
                    'label'        => esc_html__( 'Use Background', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => '',
                )
            );

            $this->add_group_control( 
                Group_Control_Background::get_type(),
                array( 
                    'name'     => 'pre_post_text_background',
                    'label'    => esc_html__( 'Pre/Post Background', 'wpmozo-addons-lite-for-elementor' ),
                    'types'    => array( 'classic', 'gradient' ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_pre_post',
                    'condition' => array( 
                        'pre_post_use_background' => 'yes'
                    )
                )
            );
            $this->add_responsive_control( 
                'pre_post_text_padding',
                array( 
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                     ),
                    'selectors'  => array( 
                        '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_pre_post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                     ),
                    'condition' => array( 
                        'pre_post_use_background' => 'yes'
                    )
                 )
             );
            
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'main_text_background_tab',
                array( 
                'label' => esc_html__( 'Animated', 'wpmozo-addons-lite-for-elementor' ),
                )
            );

            $this->add_control( 
                'main_use_background',
                array( 
                    'label'        => esc_html__( 'Use Background', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => '',
                )
            );
                       
            $this->add_group_control( 
                Group_Control_Background::get_type(),
                array( 
                    'name'     => 'main_text_background',
                    'label'    => esc_html__( 'Animated Text Background', 'wpmozo-addons-lite-for-elementor' ),
                    'types'    => array( 'classic', 'gradient' ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_main_part',
                    'condition' => array( 
                        'main_use_background' => 'yes'
                    )
                )
            );

            $this->add_responsive_control( 
                'main_text_padding',
                array( 
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 
                        'top'    => 0,
                        'right'  => 0,
                        'bottom' => 0,
                        'left'   => 0,
                     ),
                    'selectors'  => array( 
                        '{{WRAPPER}} .wpmozo_ae_text_animator .wpmozo_main_part' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                     ),
                    'condition' => array( 
                        'main_use_background' => 'yes'
                    )
                 )
             );

            $this->end_controls_tab();  
            $this->end_controls_tabs();
            $this->end_controls_section();