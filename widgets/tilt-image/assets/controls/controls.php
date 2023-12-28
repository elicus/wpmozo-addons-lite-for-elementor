<?php
use \Elementor\Utils;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

//Content tab 
//image controls 
$this->start_controls_section( 'tilt_image_settings',
        array(
            'label' => esc_html__( 'Tilt Image', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'tilt_image_image',
        array(
            'label'   => esc_html__( 'Choose Image', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::MEDIA,
            'dynamic' => array(
            'active'  => true,
            ),
            'default' => array(
                'url' => Utils::get_placeholder_image_src(),
                'id'  => 'default-image-id',
            ),
        )
    );
    $this->add_group_control(
        Group_Control_Image_Size::get_type(),
        array(
            'name'    => 'tilt_image_size',
            'exclude' => array( 'custom' ),
            'include' => array(),
            'default' => 'large',
        )
    );
$this->end_controls_section();

//Content controls 
$this->start_controls_section( 'content_settings',
        array(
            'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'title_text',
        array(
            'label'       => __( 'Enter Title', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => true,
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => array( 'active' => true ),
            'default'     => __( 'Tilt Image Title','wpmozo-addons-for-elementor-lite' ),
            'placeholder' => __( 'Enter Title', 'wpmozo-addons-for-elementor-lite' )
        )
    );
    $this->add_control( 'description_text',
        array(
            'label'         => __( 'Enter Description', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => true,
            'type'          => Controls_Manager::TEXTAREA,
            'dynamic'       => array( 'active' => true ),
            'default'       => __('Lorem ipsum dolor sit amet', 'wpmozo-addons-for-elementor-lite'),
            'placeholder'   => __( 'Enter Description', 'wpmozo-addons-for-elementor-lite' )
        )
    );
    $this->add_control( 'use_icon_switcher',
        array(
            'label'        => esc_html__( 'Use Icon', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'select_icon',
        array(
            'label'     => esc_html__( 'Icon', 'wpmozo-addons-for-elementor-lite' ),
            'type'      => Controls_Manager::ICONS,
            'default'   => array(
                'value'   => 'far fa-image',
                'library' => 'fa-regular',
            ),
            'condition' => array( 'use_icon_switcher' => 'yes' ),
        )
    );
    $this->add_control( 'show_button_switcher',
        array(
            'label'        => esc_html__( 'Show Button', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'button_text',
        array(
            'label'       => esc_html__( 'Button Text', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => true,
            'type'        => Controls_Manager::TEXT,
            'dynamic'     => array( 'active' => true ),
            'placeholder' => __('Enter Button Text Here', 'wpmozo-addons-for-elementor-lite'),
            'default'     => esc_html__( 'Click ME!', 'wpmozo-addons-for-elementor-lite' ),
            'condition'   => array( 'show_button_switcher' => 'yes' ),
        )
    );      
    $this->add_control( 'button_url',
        array(
            'label'         => esc_html__( 'Button Url', 'wpmozo-addons-for-elementor-lite' ),
            'type'          => Controls_Manager::URL,
            'placeholder'   => esc_html__( 'Enter url', 'wpmozo-addons-for-elementor-lite' ),
            'show_external' => true,
            'default'       => array(
                'url'         => '#',
                'is_external' => true,
                'nofollow'    => true,
            ),
            'condition'     => array( 'show_button_switcher' => 'yes' ),
        )
    );
    $this->add_control( 'button_icon',
        array(
            'label'     => esc_html__( 'Button Icon', 'wpmozo-addons-for-elementor-lite' ),
            'type'      => Controls_Manager::ICONS,
            'default'   => array(
                'value'   => 'fas fa-star',
                'library' => 'fa-solid',
            ),
            'condition' => array( 'show_button_switcher' => 'yes' ),
        )
    );
    $this->add_control( 'button_icon_position',
        array(
            'label'   => esc_html__( 'Button Icon Position', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => array(
                'before' => array(
                    'title' => esc_html__( 'Before', 'wpmozo-addons-for-elementor-lite' ),
                    'icon' => 'eicon-angle-left',
                ),
                'after' => array(
                    'title' => esc_html__( 'After', 'wpmozo-addons-for-elementor-lite' ),
                    'icon' => 'eicon-angle-right',
                            )
            ),
            'default' => 'after',
            'toggle'  => false, 
            'condition' => array( 'button_icon[value]!' => '', 'show_button_switcher' => 'yes' ),
        )
    );
    $this->add_control( 'show_icon_on_hover_switcher_before',
        array(
            'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
            'selectors'    => array(
                '{{WRAPPER}} .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner svg' => 'opacity:0; transition:opacity 300ms;',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner .wpmozo_button' => 'margin-left:-{{button_font_size.SIZE}}{{button_font_size.UNIT}}; margin-right: calc( calc( {{button_font_size.SIZE}}{{button_font_size.UNIT}} / 2 ) - 5% );',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover svg' => 'opacity:1;',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover .wpmozo_button' => ' margin-left:0;'
            ),
            'condition'    => array(
                'button_icon_position' => 'before',
                'button_icon[value]!' => '',
                'show_button_switcher' => 'yes'
            )
        )
    );
    $this->add_control( 'show_icon_on_hover_switcher_after',
        array(
            'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
            'selectors'    => array(
                '{{WRAPPER}} .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner svg' => 'opacity:0; transition:opacity 300ms;',
                '{{WRAPPER}} .wpmozo_button' => 'margin-right:-{{button_font_size.SIZE}}{{button_font_size.UNIT}}; margin-left: calc( calc( {{button_font_size.SIZE}}{{button_font_size.UNIT}} / 2 ) - 5% );',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover .wpmozo_button_icon, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover svg' => 'opacity:1;',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover .wpmozo_button' => ' margin-right:0;'
            ),
            'condition'    => array(
                'button_icon_position' => 'after',
                'button_icon[value]!' => '',
                'show_button_switcher' => 'yes'
            )
        )
    );
$this->end_controls_section();

//Style tab 
//Tilt style controls 
$this->start_controls_section( 'tilt_styling',
        array(
            'label' => esc_html__( 'Tilt Setting', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        )
    );
    $this->add_responsive_control( 'max_rotation_slider',
        array(
            'label' => esc_html__( 'Max Rotation', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'default' => array(
                'size' => 20,
            )
        )
    );
    $this->add_responsive_control( 'perspective_slider',
        array(
            'label' => esc_html__( 'Perspective', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 100,
                    'max' => 2000,
                    'step' => 1,
                ),
                
            ),
            'default' => array(
                'size' => 1000,
            )
        )
    );
    $this->add_responsive_control( 'scale_on_hover_slider',
        array(
            'label' => esc_html__( 'Scale On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 10,
                    'step' => 0.1,
                )
            ),
            'default' => array(
                'size' => 0.9,
            ),
        )
    );
    $this->add_responsive_control( 'speed_slider',
        array(
            'label' => esc_html__( 'Speed', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'default' => array(
                'size' => 800,
            ),
        )
    );
    $this->add_control( 'disable_on_mobile_switcher',
        array(
            'label'        => esc_html__( 'Disable On Mobile', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
        )
    );
    $this->add_control( 'use_glare_switcher',
        array(
            'label'        => esc_html__( 'Use Glare', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'on',
            'default'      => '',
        )
    );
    $this->add_responsive_control( 'max_glare_slider',
        array(
            'label' => esc_html__( 'Max Glare', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                )
            ),
            'default' => array(
                'size' => '0',
            ),
        'condition'  => array( 'use_glare_switcher' => 'on' )
        )
    );
    $this->add_control( 'use_3d_effect_switcher',
        array(
            'label'        => esc_html__( 'Use 3D Effect', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'default'      => 'yes',
            'selectors_dictionary'  => array(
                'yes'   => 'preserve-3d',
                ''      => 'none',
            ),
            'selectors'    => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_wrapper, {{WRAPPER}} .wpmozo_ae_tilt_image_inner_wrapper' => 'transform-style: {{VALUE}};'
            ),
        )
    );
    $this->add_responsive_control( '3d_effect_slider',
        array(
            'label' => esc_html__( '3D Effect', 'wpmozo-addons-for-elementor-lite' ),
            'type' => Controls_Manager::SLIDER,
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            ),
            'default' => array(
                'size' => 50,
                'unit' => 'px'
            ),
            'selectors'    => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_content_wrapper' => 'transform: translateZ( {{SIZE}}{{UNIT}} );'
            ),
            'size_units' => array( 'px' ),
            'condition'  => array( 'use_3d_effect_switcher' => 'yes' )
        )
    );
    $this->add_control( 'use_disable_xy_axis_switcher',
        array(
            'label'        => esc_html__( 'Use Disable X/Y axis', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'  => false,
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'on',
            'default'      => '',
        )
    );
    $this->add_control( 'disable_x/y_axis_select',
        array(
            'label'         => __( 'Disable X/Y axis', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::SELECT,
            'options'       => array(
                'y'  => __( 'X axis', 'wpmozo-addons-for-elementor-lite' ),
                'x'  => __( 'Y axis', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'       => 'x',
            'condition'     => array( 'use_disable_xy_axis_switcher' => 'on' ),
        )
    );
$this->end_controls_section();

//Overlay controls 
$this->start_controls_section( 'overlay_setting',
        array(
            'label' => esc_html__( 'Overlay', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        )
    );
    $this->add_control( 'overlay_switcher',
        array(
            'label'        => esc_html__( 'Image Overlay', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'  => false,
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
        )
    );
    $this->add_control( 'image_overlay_color',
        array(
            'label'       => esc_html__( 'Overlay Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'default'     => '#0000006E',
            'selectors'   => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_inner_wrapper:before' => 'background-color: {{VALUE}};',
            ),
            'condition'   => array( 'overlay_switcher' => 'yes' ),
        )
    );
$this->end_controls_section();

//Content style controls 
$this->start_controls_section( 'content_styling',
        array(
            'label' => esc_html__( 'Content', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        )
    );
    $this->add_control( 'content_alignment_selector',
        array(
            'label'         => __( 'Content Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::SELECT,
            'options'       => array(
                'top_left'  => __( 'Top Left', 'wpmozo-addons-for-elementor-lite' ),
                'top_center'  => __( 'Top Center', 'wpmozo-addons-for-elementor-lite' ),
                'top_right'  => __( 'Top Right', 'wpmozo-addons-for-elementor-lite' ),
                'center_left'  => __( 'Center Left', 'wpmozo-addons-for-elementor-lite' ),
                'center'  => __( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                'center_right'  => __( 'Center Right', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_left'  => __( 'Bottom Left', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_center'  => __( 'Bottom Center', 'wpmozo-addons-for-elementor-lite' ),
                'bottom_right'  => __( 'Bottom Right', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'       => 'center',
        )
    );
    $this->add_control( 'content_on_hover_switcher',
        array(
            'label'        => esc_html__( 'Content On Hover', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
            'selectors'    => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_content_wrapper' => 'opacity:0;',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_inner_wrapper:hover .wpmozo_ae_tilt_content_wrapper' => 'opacity:1;'
            ),
        )
    );
    $this->add_control( 'content_animation_selector',
        array(
            'label'         => __( 'Content Animation', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::SELECT,
            'options'       => array(
                'wpmozofadeInBottom'  => __( 'Fade In Bottom', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInRight'  => __( 'Fade In Right', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInLeft'  => __( 'Fade In Left', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInTop'  => __( 'Fade In Top', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInTopLeft'  => __( 'Fade In Top-Left', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInTopRight'  => __( 'Fade In Top-Right', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInBottomLeft'  => __( 'Fade In Bottom-Left', 'wpmozo-addons-for-elementor-lite' ),
                'wpmozofadeInBottomRight'  => __( 'Fade In Bottom-Left', 'wpmozo-addons-for-elementor-lite' ),
                ''  => __( 'No Animation', 'wpmozo-addons-for-elementor-lite' )
            ),
            'default'       => '',
            'condition'     => array( 'content_on_hover_switcher' => 'yes' ),
        )
    );
$this->end_controls_section();

//Icon style controls 
$this->start_controls_section( 'icon_styling',
        array(
            'label' => esc_html__( 'Icon', 'wpmozo-addons-for-elementor-lite' ),
            'tab'   => Controls_Manager::TAB_STYLE,
            'condition' => array( 'select_icon[value]!' => '', 'use_icon_switcher' => 'yes' ),
        )
    );
    $this->add_control( 'icon_color',
        array(
            'label'         => esc_html__( 'Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'       => '',
            'selectors'     => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper span' => 'color: {{VALUE}}',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper svg' => 'color: {{VALUE}}; fill: {{VALUE}};'
            ),
        )
    );
    $this->add_control( 'icon_size',
        array(
            'label'         => esc_html__( 'Icon Size', 'wpmozo-addons-for-elementor-lite' ),
            'label_block'   => true,
            'type'          => Controls_Manager::SLIDER,
            'size_units' => array( 'px', '%', 'vw', 'vh' ),
            'range' => array(
                'px' => array(
                    'min' => 0,
                    'max' => 1000,
                    'step' => 1,
                ),
                '%' => array(
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
            'default' => array(
                'size' => 75,
                'unit' => 'px'
            ),
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper span' => 'font-size: {{SIZE}}{{UNIT}}',
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper svg' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};'
            ),
        )
    );
    $this->add_control( 'icon_alignment',
        array(
            'label'   => esc_html__( 'Icon Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => array(
                'flex-start' => array(
                    'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-center',
                            ),
                'flex-end' => array(
                    'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-right',
                ),
            ),
            'toggle'    => true,
            'default'   => '',
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper' => 'align-self: {{VALUE}};',
            ),
            'separator' => 'before', 
        )
    );
    $this->add_control( 'icon_style_switcher',
        array(
            'label'        => esc_html__( 'Style Icon', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
        )
    );
    $this->add_control( 'select_icon_shape',
        array(
            'label'       => esc_html__( 'Select Style', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array(
                'square' => esc_html__( 'Square', 'wpmozo-addons-for-elementor-lite' ),
                'circle' => esc_html__( 'Circle', 'wpmozo-addons-for-elementor-lite' ),
            ),
            'default'     => 'square',
            'condition'   => array(
                'icon_style_switcher' => 'yes'
            ),
        )
    );
    $this->add_control( 'icon_shape_background_color',
        array(
            'label'       => esc_html__( 'Icon Background Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'default'     => '',
            'selectors'   => 
                array( '{{WRAPPER}} .wpmozo_icon_shape_square,
                    {{WRAPPER}} .wpmozo_icon_shape_circle,
                    {{WRAPPER}} .wpmozo_icon_shape_square_container svg,
                    {{WRAPPER}} .wpmozo_icon_shape_circle_container svg, 
                    {{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper svg' => 'background-color: {{VALUE}};',
                ),

            'condition'  => array(
                'icon_style_switcher' => 'yes'
            ),
        )
    );
    $this->add_control( 'icon_border_switcher',
        array(
            'label'        => esc_html__( 'Show Icon Border', 'wpmozo-addons-for-elementor-lite' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor-lite' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor-lite' ),
            'return_value' => 'yes',
            'default'      => '',
        )
    );
    $this->add_control( 'icon_border_color',
        array(
            'label'       => esc_html__( 'Border Color', 'wpmozo-addons-for-elementor-lite' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'default'     => '',
            'selectors'   => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_square,
                    {{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_circle,
                    {{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper > svg' => 'border: 2px solid {{VALUE}};',
            ),
            'condition'   => array(
                'icon_border_switcher' => 'yes'
            )
        )
    );
    $this->add_control( 'icon_padding_margin_heading',
        array(
            'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::HEADING            
        )
    );
    $this->start_controls_tabs( 'icon_padding_margin_control_tabs');
        //Icon padding tab
        $this->start_controls_tab( 'icon_padding_tab',
                array(
                    'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                )
            );      
            $this->add_responsive_control( 'icon_padding',
                array(
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=> 0,'right'=> 0,'bottom'=> 0,'left'=> 0 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_square,
                        {{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_circle, 
                        {{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
        //Icon margin tab
        $this->start_controls_tab(
                'icon_margin_tab',
                array(
                    'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_responsive_control( 'icon_margin',
                array(
                    'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_square,
                        {{WRAPPER}} .wpmozo_ae_tilt_image_icon.wpmozo_icon_shape_circle,
                        {{WRAPPER}} .wpmozo_ae_tilt_image_icon_wrapper > svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();


//Title style controls 
$this->start_controls_section( 'title_styling_section',
        array(
            'label'     => esc_html__( 'Title', 'wpmozo-addons-for-elementor-lite' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => array( 'title_text!' => '' )
        )
    );
    $this->add_control( 'title_heading_level',
        array(
            'label'       => esc_html__( 'Title Heading Level', 'wpmozo-addons-for-elementor-lite' ),
            'type'        => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options'     =>
            array(
                'h1' =>
                    array(
                        'title' => esc_html__( 'H1', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h1',
                    ),
                'h2' =>
                    array(
                        'title' => esc_html__( 'H2', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h2',
                    ),
                'h3' =>
                    array(
                        'title' => esc_html__( 'H3', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h3',
                    ),
                'h4' =>
                    array(
                        'title' => esc_html__( 'H4', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h4',
                    ),
                'h5' =>
                    array(
                        'title' => esc_html__( 'H5', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h5',
                    ),
                'h6' =>
                    array(
                        'title' => esc_html__( 'H6', 'wpmozo-addons-for-elementor-lite' ),
                        'icon'  => 'eicon-editor-h6',
                    ),
            ),
            'default'   => 'h2',
            'separator' => 'before',
            'toggle'    => false,
        )
    );
    $this->start_controls_tabs( 'title_normal_and_hover_state_control_tab');
        //Title normal tab
        $this->start_controls_tab( 'title_normal_state_tab',
                array(
                    'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_control( 'title_text_color',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#222',
                    'selectors'   => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_title' => 'color: {{VALUE}}',
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => true,
                    'name'        => 'title_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_tilt_title',
                )
            );
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'title_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_tilt_title',
                    'separator' => 'before',
                )
            );
        $this->end_controls_tab();
        //Title hover tab
        $this->start_controls_tab( 'title_hover_state_tab',
                array(
                    'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_control( 'title_text_hover_state_color',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array(
                        '{{WRAPPER}} div:hover .wpmozo_ae_tilt_title' => 'color: {{VALUE}}',
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'       => esc_html__( 'Title Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => true,
                    'name'        => 'title_text_hover_state_typography',
                    'selector'    => '{{WRAPPER}} div:hover .wpmozo_ae_tilt_title',
                )
            );
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'title_text_hover_state_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} div:hover .wpmozo_ae_tilt_title',
                    'separator' => 'before',
                )
            );
            $this->add_responsive_control( 'title_transition_duration',
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
                    'default' => array(
                        'size' => 300,
                        'unit' => 'ms',
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_title' => 'transition: {{SIZE}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control( 'title_text_alignment',
        array(
            'label'       => esc_html__( 'Title Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'type'        => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options'     => array(
                'flex-start' => array(
                    'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-center',
                            ),
                'flex-end' => array(
                    'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-right',
                ),
            ),
            'default'   => is_rtl() ? 'right' : 'left',
            'toggle'    => true, 
            'separator' => 'before',
            'selectors' => array( '{{WRAPPER}} .wpmozo_ae_tilt_title' => 'align-self: {{VALUE}};' ),
        )
    );

    $this->add_control( 'title_padding_margin_heading',
        array(
            'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::HEADING,
            
        )
    );

    $this->start_controls_tabs( 'title_padding_margin_control_tabs');
        // Title Padding tab
        $this->start_controls_tab( 'title_padding_tab',
                array(
                    'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                )
            );      
            $this->add_responsive_control( 'title_padding',
                array(
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=>5,'right'=>5,'bottom'=>5,'left'=>5 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
        // Title margin tab
        $this->start_controls_tab( 'title_margin_tab',
                array(
                    'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                )
            );      
            $this->add_responsive_control( 'title_margin',
                array(
                    'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=>0,'right'=>0,'bottom'=>0,'left'=>0 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();

$this->end_controls_section();





//Description controls 
$this->start_controls_section( 'description_text_styling_section',
        array(
            'label'     => esc_html__( 'Description', 'wpmozo-addons-for-elementor-lite' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => array( 'description_text!' => '' )
        )
    );
    $this->start_controls_tabs( 'description_normal_and_hover_state_control_tab');
        //Description normal tab
        $this->start_controls_tab( 'description_normal_state_tab',
                array(
                    'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_control( 'description_text_color',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#222',
                    'selectors'   => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_desc' => 'color: {{VALUE}}',
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => true,
                    'name'        => 'description_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_tilt_desc',
                )
            );
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'description_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_tilt_desc',
                    'separator' => 'before',
                )
            );
        $this->end_controls_tab();
        // Description hover tab
        $this->start_controls_tab( 'description_hover_state_tab',
                array(
                    'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor-lite' ),
                )
            );  
            $this->add_control( 'description_text_hover_state_color',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array(
                        '{{WRAPPER}} div:hover .wpmozo_ae_tilt_desc' => 'color: {{VALUE}}',
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => true,
                    'name'        => 'description_text_hover_state_typography',
                    'selector'    => '{{WRAPPER}} div:hover .wpmozo_ae_tilt_desc',
                )
            );
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'description_text_hover_state_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} div:hover .wpmozo_ae_tilt_desc',
                    'separator' => 'before',
                )
            );
            $this->add_responsive_control( 'description_transition_duration',
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
                    'default' => array(
                        'size' => 300,
                        'unit' => 'ms',
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_desc' => 'transition: {{SIZE}}{{UNIT}};'
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->add_control( 'description_text_alignment',
        array(
            'label'       => esc_html__( 'Description Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'type'        => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options'     => array(
                'flex-start' => array(
                    'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-center',
                            ),
                'flex-end' => array(
                    'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-right',
                ),
            ),
            'default'   => is_rtl() ? 'right' : 'left',
            'toggle'    => true,
            'separator' => 'before',
            'selectors' => array( '{{WRAPPER}} .wpmozo_ae_tilt_desc' => 'align-self: {{VALUE}};' ),
        )
    );
    $this->add_control( 'description_padding_margin_heading',
        array(
            'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::HEADING,
            
        )
    );

    $this->start_controls_tabs( 'description_padding_margin_control_tabs');
        // Description padding tab
        $this->start_controls_tab( 'description_padding_tab',
                array(
                    'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_responsive_control( 'description_padding',
                array(
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=>5,'right'=>5,'bottom'=>5,'left'=>5 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_desc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
        // Description margin tab
        $this->start_controls_tab( 'description_margin_tab',
                array(
                    'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_responsive_control( 'descripiton_margin',
                array(
                    'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=>0,'right'=>0,'bottom'=>0,'left'=>0 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();
        
//Button style controls 
$this->start_controls_section( 'button_styling',
        array(
            'label'     => esc_html__( 'Button Styling', 'wpmozo-addons-for-elementor-lite' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => array( 'show_button_switcher' => 'yes' ),
        )
    );

    $this->start_controls_tabs( 'button_normal_and_hover_state_control_tabs');
        //Button style normal tab
        $this->start_controls_tab( 'button_normal_state_tab',
                array(
                    'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            //Settings for first tab
            $this->add_control( 'button_text_color_normal_state',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#000000',
                    'selectors'   => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner, {{WRAPPER}} .wpmozo_button' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner svg' => 'color: {{VALUE}}; fill: {{VALUE}};'
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => true,
                    'name'        => 'button_text_normal_state_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner',
                    'exclude'     => array( 'font_size' ),
                )
            );
            $this->add_responsive_control( 'button_font_size',
                array(
                    'type'  => Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Font Size', 'wpmozo-addons-for-elementor-lite' ),
                    'range' => array(
                        'px' => array(
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ),
                        '%' => array(
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
                    'default' => array(
                        'size' => '18',
                        'unit' => 'px'
                    ),
                    'size_units' => array( 'px', '%', 'vw', 'vh' ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner' => 'font-size: {{SIZE}}{{UNIT}};',
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                    ),
                )
            );            
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'button_text_shadow_normal_state',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner',
                    'separator' => 'before',
                )
            );
            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                array(
                    'name'     => 'button_box_shadow_normal_state',
                    'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner',
                    'fields_options' => array(
                            'box_shadow_type' => array( 
                                'default' =>'yes' 
                            ),
                            'box_shadow' => array(
                                'default' => array(
                                    'horizontal' => 0,
                                    'vertical'   => 26,
                                    'blur'       => 27,
                                    'spread'     => -6,
                                    'color'      => 'rgba(0,0,0,0.15)'
                                )
                            )
                        )
                )
            );
            $this->add_group_control(
                Group_Control_Border::get_type(),
                array(
                    'name'           => 'button_border_normal_state',
                    'label'          => esc_html__( 'Border', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'       => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner',
                    'fields_options' => array(
                        'border' => array( 'default' => 'solid' ),
                        'width'  => array( 'default' => array( 'top'=>2,'right'=>2,'bottom'=>2,'left'=>2 ) ),
                    )

                )
            );
            $this->add_responsive_control( 'button_border_radius_normal_state',
                array(
                    'label'       => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor-lite' ),
                    'type'        => Controls_Manager::DIMENSIONS,
                    'label_block' => true,
                    'size_units'  => array( 'px', 'em', '%' ),
                    'default'     =>array( 'top'=> 5, 'right'=> 5, 'bottom'=> 5, 'left'=> 5 ),
                    'selectors'   => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Background::get_type(),
                array(
                    'name'     => 'button_background_normal_state',
                    'label'    => esc_html__( 'Background', 'wpmozo-addons-for-elementor-lite' ),
                    'types'    => array( 'classic', 'gradient', ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner',
                )
            );
        $this->end_controls_tab();

        // Button style hover tab
        $this->start_controls_tab( 'button_hover_state_tab',
                array(
                    'label' => esc_html__( 'Hover', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_control( 'button_text_color_hover_state',
                array(
                    'label'       => esc_html__( 'Text Color', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover .wpmozo_button' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}};'
                    ),
                )
            );
            $this->add_group_control(
                Group_Control_Typography::get_type(),
                array(
                    'label'          => esc_html__( 'Typography', 'wpmozo-addons-for-elementor-lite' ),
                    'label_block'    => false,
                    'name'           => 'button_text_hover_state_typography',
                    'selector'       => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover',
                    'fields_options' => array(
                        'font_size' => array( 'selectors' => array( '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover'=> 'font-size:{{SIZE}}{{UNIT}};' ), 'default' => array( 'size' => 18 ) )
                    )
                )
            );      
            $this->add_group_control(
                Group_Control_Text_Shadow::get_type(),
                array(
                    'name'      => 'button_text_shadow_hover_state',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector'  => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover',
                    'separator' => 'before',
                )
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                array(
                    'name'     => 'button_box_shadow_hover_state',
                    'label'    => esc_html__( 'Box Shadow', 'wpmozo-addons-for-elementor-lite' ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover',
                )
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                array(
                    'name'     => 'button_border_hover_state',
                    'label'    => esc_html__( 'Border', 'wpmozo-addons-for-elementor-lite' ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover',
                )
            );

            $this->add_responsive_control( 'button_border_radius_hover_state',
                array(
                    'label'      => esc_html__( 'Border Radius', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                array(
                    'name'     => 'button_background_hover_state',
                    'label'    => esc_html__( 'Background', 'wpmozo-addons-for-elementor-lite' ),
                    'types'    => array( 'classic', 'gradient', ),
                    'selector' => '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner:hover',
                )
            );

            $this->add_control( 'button_hover_animation',
                array(
                    'label'     => esc_html__( 'Hover Animation', 'wpmozo-addons-for-elementor-lite' ),
                    'type'      => Controls_Manager::HOVER_ANIMATION,
                    'separator' =>  'before',
                    'default'   => 'grow'
                )
            );

            $this->add_responsive_control( 'button_transition_duration',
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
                    'default' => array(
                        'size' => 200,
                        'unit' => 'ms',
                    ),
                    'selectors' => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner, {{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner .wpmozo_button' => 'transition: color {{SIZE}}{{UNIT}}, border {{SIZE}}{{UNIT}}, background {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, border-radius {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, font {{SIZE}}{{UNIT}}, size {{SIZE}}{{UNIT}}, letter-spacing {{SIZE}}{{UNIT}}, word-spacing {{SIZE}}{{UNIT}}, margin 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;',
                        
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner svg' => 'transition: color {{SIZE}}{{UNIT}}, fill {{SIZE}}{{UNIT}}, text-shadow {{SIZE}}{{UNIT}}, transform {{SIZE}}{{UNIT}}, height {{SIZE}}{{UNIT}}, width {{SIZE}}{{UNIT}}, opacity 300ms; animation-duration:{{SIZE}}{{UNIT}}; transition-timing-function: linear;'
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control( 'button_text_alignment',
        array(
            'label'   => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => array(
                'flex-start' => array(
                    'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor-lite' ),
                    'icon' => 'eicon-text-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                    'icon' => 'eicon-text-align-center',
                            ),
                'flex-end' => array(
                    'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor-lite' ),
                    'icon' => 'eicon-text-align-right',
                ),
            ),
            'toggle'    => true,
            'default'   => 'center',
            'selectors' => array(
                '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper' => 'align-self: {{VALUE}};',
            ),
            'separator' => 'before', 
        )
    );
    $this->add_control( 'button_padding_margin_heading',
        array(
            'label' => esc_html__( 'Padding and Margin', 'wpmozo-addons-for-elementor-lite' ),
            'type'  => Controls_Manager::HEADING,
        )
    );
    $this->start_controls_tabs( 'button_padding_margin_control_tabs');
        // Button padding tab
        $this->start_controls_tab( 'button_padding_tab',
                array(
                    'label' => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_responsive_control( 'button_padding',
                array(
                    'label'      => esc_html__( 'Padding', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'default'    => array( 'top'=> 5,'right'=> 5,'bottom'=> 5,'left'=> 5 ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                )
            );
        $this->end_controls_tab();
        // Button style margin tab
        $this->start_controls_tab( 'button_margin_tab',
                array(
                    'label' => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                )
            );
            $this->add_responsive_control( 'button_margin',
                array(
                    'label'      => esc_html__( 'Margin', 'wpmozo-addons-for-elementor-lite' ),
                    'type'       => Controls_Manager::DIMENSIONS,
                    'size_units' => array( 'px', 'em', '%' ),
                    'selectors'  => array(
                        '{{WRAPPER}} .wpmozo_ae_tilt_image_button_wrapper_inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ),
                    'default'    => array( 'top'=> 10,'right'=> 10,'bottom'=> 10,'left'=> 10 )
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

//Tilt Image advance alignment 
$this->start_controls_section( 'tilt_image_alignment',
        array(
            'label'      => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'tab'        => Controls_Manager::TAB_ADVANCED,
            'condition' => array( 'tilt_image_size_size!' => 'full', 'tilt_image_size_size!' => 'custom'  )
        )
    );
    $this->add_control( 'layout_alignment',
        array(
            'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor-lite' ),
            'type'        => Controls_Manager::CHOOSE,
            'label_block' => true,
            'options'     => array(
                'left' => array(
                    'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-left',
                ),
                'center' => array(
                    'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-center',
                            ),
                'right' => array(
                    'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor-lite' ),
                    'icon'  => 'eicon-text-align-right',
                ),
            ),
            'default'   => 'center',
            'toggle'    => true, //Behave like toggle or not. 
            'selectors' => array( '{{WRAPPER}} .wpmozo_ae_tilt_image_inner_wrapper' => 'justify-content: {{VALUE}};' ),
        )
    );      
$this->end_controls_section();