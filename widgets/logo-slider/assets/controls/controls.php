<?php 

use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Flex_Item;

//content section starts here
$this->start_controls_section('content_section_new',
	array(
		'label' => __( 'Logos', 'wpmozo-addons-for-elementor-lite' ),
		'tab' => Controls_Manager::TAB_CONTENT,
	)
);
    $repeater = new Repeater();
    $repeater->add_control(
        'logo_image',
        array(
            'label' => __( 'Logo', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::MEDIA,
            'default' => array(
                'url' => Utils::get_placeholder_image_src(),
            ),
        )
    );
    $repeater->add_control(
        'logo_alt_text', array(
            'label' => __( 'Alt Text', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::TEXT,
            'default' => __( 'List Title' , 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => true,
        )
    );

    $repeater->add_control(
        'logo_link',
        array(
            'label'   => esc_html__( 'Link', 'textdomain' ),
            'type'    => Controls_Manager::URL,
            'options' => false,
            'default' => array(
                'url' => '',
            ),
            'label_block' => true,
        )
    );

    $repeater->add_control( 'logo_link_target',
        array(
            'label'   => esc_html__( 'Module Link Target', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => array(
                '_self' => array(
                    'title' => esc_html__( 'Same Window', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-editor-link',
                ),
                '_blank' => array(
                    'title' => esc_html__( 'New Tab', 'elementor' ),
                    'icon'  => 'eicon-editor-external-link',
                )
            ),
            'default'   => '_self',
            'toggle'    => false,
        )
    );

    $repeater->add_control( 'enable_custom_styles',
        array(
            'label'        => esc_html__( 'Enable Custom Styling', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'separator'    => 'before',
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'selectors_dictionary'  => array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $repeater->start_controls_tabs( 'logo_styling_normal_and_hover_state_control_tab',
        array(
            'condition'      => array( 'enable_custom_styles' => 'yes' ),
        )
    );

        //Tab 1
        $repeater->start_controls_tab( 'logo_styling_normal_state_tab',
            array(
                'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor-lite' ),
            )
        );

            $repeater->add_control( 'logo_background_color',
                array(
                    'label'         => esc_html__( 'Background Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'       => '',
                    'selectors'     => array( '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};'
                    )
                )
            );

            $repeater->add_responsive_control( 'logo_custom_padding',
                array(
                    'label'       => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                    'type'        => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'separator' => 'before',
                    'size_units'  => array( 'px', 'em', '%' ),
                    'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
                    'selectors'   => array(
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );

            $repeater->add_group_control( Group_Control_Border::get_type(),
                array(
                    'name'      => 'logo_border',
                    'separator' => 'before',
                    'label'     => esc_html__( 'Border', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}',
                )
            );
            $repeater->add_responsive_control( 'logo_border_radius',
                array(
                    'label' => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor-lite' ),
                    'separator' => 'after',
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'selectors' => array(
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; transition: all 300ms;',
                    ),
                )
            );

            $repeater->add_group_control( Group_Control_Box_Shadow::get_type(),
                array(
                    'name' => 'logo_box_shadow',
                    'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
                    'fields_options' => array( 'box_shadow' => array( 'default' => array( 'blur' => 0)))
                )
            );

            $repeater->add_group_control( Group_Control_Css_Filter::get_type(),
                array(
                    'name' => 'logo_css_filters',
                    'separator' => 'before',
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
                )
            );

        $repeater->end_controls_tab();

        //Tab 2
        $repeater->start_controls_tab('logo_styling_hover_state_tab',
            array(
                'label' => esc_html__('Hover', 'wpmozo-addons-for-elementor-lite'),
            )
        );

            $repeater->add_control('logo_hover_background_color',
                array(
                    'label' => esc_html__('Background Color', 'wpmozo-addons-for-elementor-lite'),
                    'label_block' => false,
                    'type' => Controls_Manager::COLOR,
                    'default' => '',
                    'selectors'     => array( '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'background-color: {{VALUE}};'
                    )
                )
            );

            $repeater->add_responsive_control('logo_hover_custom_padding',
                array(
                    'label' => esc_html__('Padding', 'wpmozo-addons-for-elementor-lite'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'separator' => 'before',
                    'size_units' => array('px', 'em', '%'),
                    'default' => array('top' => 5, 'right' => 5, 'bottom' => 5, 'left' => 5),
                    'selectors'   => array(
                        '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );

            $repeater->add_group_control(Group_Control_Border::get_type(),
                array(
                    'name' => 'logo_hover_border',
                    'separator' => 'before',
                    'label' => esc_html__('Border', 'wpmozo-addons-for-elementor-lite'),
                    'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}:hover',
                )
            );

            $repeater->add_responsive_control('logo_hover_border_radius',
                array(
                    'label' => esc_html__('Border Radius', 'wpmozo-addons-for-elementor-lite'),
                    'separator' => 'after',
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => array('px', 'em', '%'),
                    'selectors' => array(
                        '{{WRAPPER}} {{CURRENT_ITEM}}:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );

            $repeater->add_group_control(Group_Control_Box_Shadow::get_type(),
                array(
                    'name' => 'logo_hover_box_shadow',
                    'label' => esc_html__('Box Shadow', 'wpmozo-addons-for-elementor-lite'),
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}:hover',
                    'fields_options' => array( 'box_shadow' => array( 'default' => array( 'blur' => 0)))
                )
            );

            $repeater->add_group_control(Group_Control_Css_Filter::get_type(),
                array(
                    'name' => 'logo_hover_css_filters',
                    'separator' => 'before',
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}:hover',
                )
            );

        $repeater->end_controls_tab();


    $repeater->end_controls_tabs();

    $this->add_control(
        'logo_list',
        array(
            'label' => __( 'Logo List', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => array(
                array(
                    'list_logo' => __( 'Item Media', 'wpmozo-addons-for-elementor-lite' ),
                    'logo_alt_text' => __( 'Item Title', 'wpmozo-addons-for-elementor-lite' ),
                    

                ),
                array(
                    'list_image' => __( 'Item Media', 'wpmozo-addons-for-elementor-lite' ),
                    'logo_alt_text' => __( 'Item Title', 'wpmozo-addons-for-elementor-lite' ),
                    
                ),
            ),
            'title_field' => '{{{ logo_alt_text }}}',
        )
    );
$this->end_controls_section();


//Slider settings start here
$this->start_controls_section( 'slider_settings',
    array(
        'label' => esc_html__( 'Slider', 'wpmozo-addons-for-elementor-lite' ),
        'tab'   => Controls_Manager::TAB_CONTENT,
    )
);

    $this->add_control( 'slide_effect',
        array(
            'label'       => __( 'Slider Effect', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'separator'   => 'after',
            'options'     => array(
                'slide'     => esc_html__( 'Slide', 'wpmozo-addons-for-elementor-lite' ),
                'cube'      => esc_html__( 'Cube', 'wpmozo-addons-for-elementor-lite' ),
                'coverflow' => esc_html__( 'Coverflow', 'wpmozo-addons-for-elementor-lite' ),
                'flip'      => esc_html__( 'Flip', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'     => 'slide',
            'selectors'   => array( '' ),
            'render_type' => 'template'
        )
    );

    $this->add_responsive_control( 'cards_per_slide',
        array(
            'label'     => esc_html__( 'Number of Cards Per Slide', 'wpmozo-addons-for-elementor-lite' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 3,
            'condition' => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
        )
    );

    $this->add_responsive_control( 'slides_per_group',
        array(
            'label'     => esc_html__( 'Number of Slides Per Group', 'wpmozo-addons-for-elementor-lite' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 1,
            'condition' => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
        )
    );

    $this->add_responsive_control( 'space_between_slides',
        array(
            'label' => esc_html__( 'Space Between Slides', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min'  => 10,
                    'max'  => 100,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array(
                'size' => 20,
                'unit' => 'px',
            ),
            'tablet_default' => array(
                'size' => 20,
                'unit' => 'px',
            ),
            'mobile_default' => array(
                'size' => 10,
                'unit' => 'px',
            ),
            'size_units' => array( 'px' ),
            'condition'      => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
            'selectors'  => array( '' ),
            'render_type' => 'template'
        )
    );

    $this->add_control( 'enable_coverflow_shadow',
        array(
            'label'        => esc_html__( 'Enable Slide Shadow', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'coverflow_shadow_color',
        array(
            'label'         => esc_html__( 'Shadow Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#222',
            'condition'      => array( 'enable_coverflow_shadow' => 'yes', 'slide_effect' => 'coverflow' ),
            'selectors'     => array( '{{WRAPPER}} .wpmozo_ae_wrapper .swiper-slide-shadow-left' => 'background-image: linear-gradient(to left,{{VALUE}},rgba(0,0,0,0)) !important;',
                '{{WRAPPER}} .wpmozo_ae_wrapper .swiper-slide-shadow-right' => 'background-image: linear-gradient(to right,{{VALUE}},rgba(0,0,0,0)) !important;'
            )
        )
    );

    $this->add_responsive_control( 'coverflow_rotate',
        array(
            'type' => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Rotate ', 'wpmozo-addons-for-elementor-lite' ),
            'range' => array(
                'px' => array(
                    'min' => 1,
                    'max' => 360,
                    'step'=>1,
                ),
            ),
            'default' => array(
                'size' => 40,
                'unit' => 'px',
            ),
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors' => array(
                '{{WRAPPER}} .' => 'transform: rotate( {{SIZE}}{{UNIT}} );',
            ),
            'render_type' => 'template'
        )
    );

    $this->add_responsive_control( 'coverflow_depth',
        array(
            'type' => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Depth ', 'wpmozo-addons-for-elementor-lite' ),
            'range' => array(
                'px' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step'=>1,
                ),
            ),
            'default' => array(
                'size' => 100,
                'unit' => 'px',
            ),
            'condition'      => array( 'slide_effect' => 'coverflow' ),
            'selectors' => array(
                '{{WRAPPER}} .' => 'transform: rotate( {{SIZE}}{{UNIT}} );',
            ),
            'render_type' => 'template'
        )
    );

    $this->add_control( 'enable_linear_transition',
        array(
            'label'        => esc_html__( 'Enable Linear Transition', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'linear',//return value when the switch is on
            'default'      => 'no',
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
            'selectors' => array('{{WRAPPER}} .swiper-wrapper' => 'transition-timing-function: {{VALUE}} !important; align-items:center;')
        )
    );

    $this->add_control( 'slider_loop',
        array(
            'label'        => esc_html__( 'Enable Loop', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'autoplay',
        array(
            'label'        => esc_html__( 'Autoplay', 'wpmozo-addons-for-elementor-lite' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'autoplay_speed',
        array(
            'label'     => esc_html__( 'Autoplay Delay', 'wpmozo-addons-for-elementor-lite' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 0,
            'max'       => 10000,
            'step'      => 100,
            'default'   => 3000,
            'condition' => array( 'autoplay' => 'yes' ),
        )
    );

    $this->add_control( 'pause_on_hover',
        array(
            'label'        => esc_html__( 'Pause On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'condition' => array( 'autoplay' => 'yes' ),
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'slide_transition_duration',
        array(
            'label'   => esc_html__( 'Transition Duration', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::NUMBER,
            'min'     => 100,
            'max'     => 10000,
            'step'    => 100,
            'default' => 1000,
        )
    );

    $this->add_control( 'show_arrow',
        array(
            'label'        => esc_html__( 'Show Arrows', 'wpmozo-addons-for-elementor-lite' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'yes',
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'previous_slide_arrow',
        array(
            'label'            => esc_html__( 'Previous Arrow', 'wpmozo-addons-for-elementor-lite' ),
            'type'             => Controls_Manager::ICONS,
            'default'          => array(
                'value'        => 'fas fa-chevron-left',
                'library'      => 'fa-solid',
            ),
            'condition'        => array( 'show_arrow' => 'yes' ),
        )
    );

    $this->add_control( 'next_slide_arrow',
        array(
            'label'            => esc_html__( 'Next Arrow', 'wpmozo-addons-for-elementor-lite' ),
            'type'             => Controls_Manager::ICONS,
            'default'          => array(
                'value'        => 'fas fa-chevron-right',
                'library'      => 'fa-solid',
            ),
            'condition'        => array( 'show_arrow' => 'yes' ),
        )
    );

    $this->add_control( 'show_arrow_on_hover',
        array(
            'label'        => esc_html__( 'Show Arrows On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'condition'    => array( 'show_arrow' => 'yes' ),
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_responsive_control( 'arrows_position',
        array(
            'label'       => __( 'Arrows Position', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array(
                'inside'        => esc_html__( 'Inside', 'wpmozo-addons-for-elementor-lite' ),
                'outside'       => esc_html__( 'Outside', 'wpmozo-addons-for-elementor-lite' ),
                'top_left'      => esc_html__( 'Top Left', 'wpmozo-addons-for-elementor-lite' ),
                'top_right'     => esc_html__( 'Top Right', 'wpmozo-addons-for-elementor-lite' ),
                'top_center'    => esc_html__( 'Top Center', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_left'   => esc_html__( 'Bottom Left', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_right'  => esc_html__( 'Bottom Right', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_center' => esc_html__( 'Bottom Center', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'   => 'inside',
            'condition' => array( 'show_arrow' => 'yes' )
        )
    );

    $this->add_control( 'show_control_dot',
        array(
            'label'        => esc_html__( 'Show Dots Pagination', 'wpmozo-addons-for-elementor-lite' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );

    $this->add_control( 'control_dot_style',
        array(
            'label'       => __( 'Dots Pagination Style', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array(
                'solid_dot'       => esc_html__( 'Solid Dot', 'wpmozo-addons-for-elementor-lite' ),
                'transparent_dot' => esc_html__( 'Transparent Dot', 'wpmozo-addons-for-elementor-lite' ),
                'stretched_dot'   => esc_html__( 'Stretched Dot', 'wpmozo-addons-for-elementor-lite' ),
                'line'            => esc_html__( 'Line', 'wpmozo-addons-for-elementor-lite' ),
                'rounded_line'    => esc_html__( 'Rounded Line', 'wpmozo-addons-for-elementor-lite' ),
                'square_dot'      => esc_html__( 'Squared Dot', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'     => 'solid_dot',
            'condition'   => array( 'show_control_dot' => 'yes' ),
            'render-type' => 'template'
        )
    );

    $this->add_control( 'enable_dynamic_dots',
        array(
            'label'        => esc_html__( 'Enable Dynamic Dots', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',//return value when the switch is on
            'default'      => 'no',
            'condition'        => array( 
                'show_control_dot' => 'yes',
                'control_dot_style' => array(
                    'solid_dot',
                    'transparent_dot',
                    'square_dot'
                ),
            ),
            'selectors_dictionary' 	=> array(
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
$this->end_controls_section();

$this->start_controls_section( 'slider_styling',
    array(
        'label' => esc_html__( 'Slider', 'wpmozo-addons-for-elementor-lite' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        'conditions' => array(
            'relation' => 'or',
            'terms' => array(
                array(
                    'name' => 'show_arrow',
                    'operator' => '===',
                    'value' => 'yes',
                ),
                array(
                    'name' => 'show_control_dot',
                    'operator' => '===',
                    'value' => 'yes',
                ),
            ),
        ),
    )
);

    $this->add_responsive_control( 'arrows_custom_padding',
        array(
            'label'       => esc_html__( 'Arrows Padding', 'wpmozo-addons-for-elementor-lite' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
            'condition'   => array( 'show_arrow' => 'yes'),
            'selectors'   => array(
                '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );

    $this->add_responsive_control( 'arrows_font_size',
        array(
            'label' => esc_html__( 'Arrows Font Size', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'default' => array(
                'size' => 20,
                'unit' => 'px',
            ),
            'tablet_default' => array(
                'size' => 15,
                'unit' => 'px',
            ),
            'mobile_default' => array(
                'size' => 10,
                'unit' => 'px',
            ),
            'size_units' => array( 'px' ),
            'condition'   => array( 'show_arrow' => 'yes'),
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_ae_swiper_navigation span ' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg ' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};'

            ),
        )
    );

    $this->start_controls_tabs( 'arrows_background_normal_and_hover_state_control_tab',
        array(
            'separator' => 'before'
        )
    );

        //Tab 1
        $this->start_controls_tab( 'arrows_background_normal_state_tab',
            array(
                'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor-lite' ),
                'condition'   => array( 'show_arrow' => 'yes'),
            )
        );

            $this->add_control( 'arrows_color',
                array(
                    'label'         => esc_html__( 'Arrows Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '#007AFE',
                    'condition'   => array( 'show_arrow' => 'yes'),
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'fill:{{VALUE}};'
                    )
                )
            );

            $this->add_control( 'arrows_background_color',
                array(
                    'label'         => esc_html__( 'Arrows Background', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'condition'   => array( 'show_arrow' => 'yes'),
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'background-color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'background-color:{{VALUE}};' 
                    ),
                )
            );

            $this->add_control( 'arrows_background_border_size',
                array(
                    'label' => esc_html__( 'Arrows Background Border', 'wpmozo-addons-for-elementor-lite' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => array(
                        'px' => array(
                            'min' => 1,
                            'max' => 1000,
                            'step' => 1,
                        )
                    ),
                    'default' => array(
                        'size' => '',
                        'unit' => 'px',
                    ),
                    'size_units' => array( 'px' ),
                    'condition'   => array( 'show_arrow' => 'yes'),
                    'selectors' => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'border: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'border: {{SIZE}}{{UNIT}} solid;'
                    ),
                )
            );

            $this->add_control( 'arrows_background_border_color',
                array(
                    'label'         => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'condition'     => array( 'show_arrow' => 'yes'),
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'border-color:{{VALUE}};', 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'border-color:{{VALUE}};' 
                    ),
                    'separator'     => 'after'
                )
            );


        $this->end_controls_tab();

        //Tab 2
        $this->start_controls_tab( 'arrows_background_border_hover_state_tab',
            array(
                'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor-lite' ),
                'condition'   => array( 'show_arrow' => 'yes'),
            )
        );

            $this->add_control( 'arrows_hover_color',
                array(
                    'label'         => esc_html__( 'Arrows Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'condition'   => array( 'show_arrow' => 'yes'),
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span:hover' => 'color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg:hover' => 'fill:{{VALUE}};'
                    )
                )
            );

            $this->add_control( 'arrows_background_hover_color',
                array(
                    'label'         => esc_html__( 'Arrows Background', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span:hover' => 'background-color:{{VALUE}};', 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg:hover' => 'background-color:{{VALUE}};' 
                    ),
                    'condition'   => array( 'show_arrow' => 'yes'),
                )
            );

            $this->add_control( 'arrows_background_border_hover_size',
                array(
                    'label' => esc_html__( 'Arrows Background Border', 'wpmozo-addons-for-elementor-lite' ),
                    'type'  => Controls_Manager::SLIDER,
                    'range' => array(
                        'px' => array(
                            'min' => 1,
                            'max' => 1000,
                            'step' => 1,
                        )
                    ),
                    'default' => array(
                        'size' => '',
                        'unit' => 'px',
                    ),
                    'size_units' => array( 'px' ),
                    'condition'   => array( 'show_arrow' => 'yes'),
                    'selectors' => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg:hover' => 'border: {{SIZE}}{{UNIT}} solid;',
                    ),
                )
            );

            $this->add_control( 'arrows_background_border_hover_color',
                array(
                    'label'         => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'   => false,
                    'type'          => Controls_Manager::COLOR,
                    'default'   	=> '',
                    'selectors'     => array( 
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span:hover' => 'border-color:{{VALUE}};',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg:hover' => 'border-color:{{VALUE}};' 
                    ),
                    'condition'   => array( 'show_arrow' => 'yes'),
                )
            );

            $this->add_responsive_control( 'arrows_transition_duration',
                array(
                    'type'  => Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Transition Duration (ms) ', 'wpmozo-addons-for-elementor-lite' ),
                    'range' => array(
                        'ms' => array(
                            'min' => 0,
                            'max' => 10000,
                            'step'=>100,
                        ),
                    ),
                    'separator' => 'after',
                    'default' => array(
                        'size' => 300,
                        'unit' => 'ms',
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation span' => 'transition: color {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;',
                        '{{WRAPPER}} .wpmozo_ae_swiper_navigation svg' => 'transition: fill {{SIZE}}{{UNIT}}, opacity {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin {{SIZE}}{{UNIT}}, padding {{SIZE}}{{UNIT}}; transition-timing-function: linear;'
                    ),
                )
            );

        $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->add_control( 'control_dot_active_color',
        array(
            'label'         => esc_html__( 'Active Dot Pagination Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#000',
            'selectors'     => array( '{{WRAPPER}} .wpmozo_ae_swiper_pagination .swiper-pagination-bullet-active-main, {{WRAPPER}} .wpmozo_ae_swiper_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background : {{VALUE}};' ),
            'condition'   => array( 'show_control_dot' => 'yes'),
        )
    );

    $this->add_control( 'control_dot_inactive_color',
        array(
            'label'         => esc_html__( 'Inactive Dot Pagination Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#cccccc',
            'selectors'     => array( '{{WRAPPER}} .wpmozo_ae_swiper_pagination .swiper-pagination-bullet' => 'background: {{VALUE}};' ),
            'condition'   => array( 'show_control_dot' => 'yes'),
        )
    );

$this->end_controls_section();

$this->start_controls_section( 'logo_styling',
    array(
        'label' => esc_html__( 'Logo', 'wpmozo-addons-for-elementor-lite' ),
        'tab'   => Controls_Manager::TAB_STYLE,
        
    )
);

    $this->add_control(
        'logo_width',
        array(
            'label' => esc_html__( 'Logo Width', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 10,
                ),
                '%' => array(
                    'min' => 0,
                    'max' => 100,
                ),
            ),
            'default' => array(
                'unit' => 'px',
                'size' => 150,
            ),
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_swiper_wrapper .swiper-wrapper .swiper-slide img' => 'width: {{SIZE}}{{UNIT}};',
            ),
        )
    );

    $this->add_control('container_height',
        array(
            'label' => esc_html__( 'Container Height', 'textdomain' ),
            'type' =>Controls_Manager::SLIDER,
            'size_units' => array( 'px', '%', 'em', 'rem', 'custom' ),
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 10,
                ),
                '%' => array(
                    'min' => 0,
                    'max' => 100,
                ),
            ),
            'default' => array(
                'unit' => 'px',
                'size' => 150,
            ),
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_swiper_wrapper .swiper-wrapper .swiper-slide' => 'min-height: {{SIZE}}{{UNIT}};',
            ),
        )
    );
    $this->add_control( 'logo_align',
        array(
            'label'       => __( 'Logo Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'separator'   => 'after',
            'options'     => array(
                'flex-start'     => esc_html__( 'Top', 'wpmozo-addons-for-elementor-lite' ),
                'center'   => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                'flex-end' => esc_html__( 'Bottom', 'wpmozo-addons-for-elementor-lite' ),        
            ),
            'default'     => 'center',
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_swiper_wrapper .swiper-wrapper .swiper-slide' => 'align-items: {{VALUE}};',
            ),  
        )
    );
$this->end_controls_section();