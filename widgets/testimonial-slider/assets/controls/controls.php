<?php 
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

//content section starts here
$this->start_controls_section( 'content_section',
        array( 
            'label' => esc_html__( 'Content', 'wpmozo-addons-lite-for-elementor' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'testimonial_layout',
        array( 
            'label'       => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'layout1'   => esc_html__( 'Layout 1', 'wpmozo-addons-lite-for-elementor' ),
                'layout2'   => esc_html__( 'Layout 2', 'wpmozo-addons-lite-for-elementor' ),                
            ),
            'default'     => 'layout1',           
        )
    );
    $this->add_control( 'testimonial_number',
        array( 
            'label'     => esc_html__( 'Number of Members', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 10,            
        )
    );
    $this->add_control( 'testimonial_order',
        array( 
            'label'       => esc_html__( 'Order', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'desc'     => esc_html__( 'DESC', 'wpmozo-addons-lite-for-elementor' ),
                'asc'      => esc_html__( 'ASC', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'desc',
        )
    );
    $this->add_control( 'testimonial_order_by',
        array( 
            'label'       => esc_html__( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'date'          => esc_html__( 'Date', 'wpmozo-addons-lite-for-elementor' ),
                'modified_date' => esc_html__( 'Modified Date', 'wpmozo-addons-lite-for-elementor' ),
                'title'         => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
                'slue'          => esc_html__( 'Slug', 'wpmozo-addons-lite-for-elementor' ),
                'ID'            => esc_html__( 'ID', 'wpmozo-addons-lite-for-elementor' ),
                'random'        => esc_html__( 'Random', 'wpmozo-addons-lite-for-elementor' ),
                'relevance'     => esc_html__( 'Relevance', 'wpmozo-addons-lite-for-elementor' ),
                'none'          => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'   => 'date',
        )
    );
    $this->add_control( 'include_categories',
        array( 
            'label'         => esc_html__( 'Select Categories', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::SELECT2,
            'label_block'   => true,
            'multiple'      => true,
            'options'       => wpmozo_ae_get_testimonial_categories(),            
        )
    );
    $this->add_control( 
        'no_result_text',
        array( 
            'label'         => esc_html__( 'No Result Text', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::TEXT,
            'label_block'   => true,
            'placeholder'   => esc_html__( 'The testimonials you requested could not be found. Try changing your module settings or create some new testimonials.', 'wpmozo-addons-lite-for-elementor' ),
        )
    );
$this->end_controls_section();

/* Display section starts here */
$this->start_controls_section( 'display_sec',
        array( 
            'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_control( 'show_rating',
        array( 
            'label'        => esc_html__( 'Show Rating', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            )
    );
    $this->add_control( 'show_author_image',
        array( 
            'label'        => esc_html__( 'Show Author Image', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'use_gravatar',
        array( 
            'label'        => esc_html__( 'Use Gravatar', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'author_image_size',
        array( 
            'label'       => esc_html__( 'Author Image Size', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'thumbnail'	=> esc_html__( 'Thumbnail', 'wpmozo-addons-lite-for-elementor' ),
                'medium'	=> esc_html__( 'Medium', 'wpmozo-addons-lite-for-elementor' ),
                'large'		=> esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
                'full'		=> esc_html__( 'Full', 'wpmozo-addons-lite-for-elementor' ),              
            ),
            'default'     => 'thumbnail', 
            'condition'      => array( 
                'show_author_image' => 'yes',
                'use_gravatar'      => ''
             ),   
        )
    );
    $this->add_control( 'show_author_designation',
        array( 
            'label'        => esc_html__( 'Show Designation', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
    $this->add_control( 'show_author_company_name',
        array( 
            'label'        => esc_html__( 'Show Company Name', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        )
    );
$this->end_controls_section();

//Slider settings start here
$this->start_controls_section( 'slider_settings',
    array( 
        'label' => esc_html__( 'Slider', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_CONTENT,
    )
 );    
    $this->add_control( 'slide_effect',
        array( 
            'label'       => esc_html__( 'Slider Effect', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'slide'     => esc_html__( 'Slide', 'wpmozo-addons-lite-for-elementor' ),
                'cube'      => esc_html__( 'Cube', 'wpmozo-addons-lite-for-elementor' ),
                'coverflow' => esc_html__( 'Coverflow', 'wpmozo-addons-lite-for-elementor' ),
                'flip'      => esc_html__( 'Flip', 'wpmozo-addons-lite-for-elementor' ),
                'fade'      => esc_html__( 'Fade', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'slide',
            'render_type' => 'template'
        )
    );
    $this->add_responsive_control( 'testimonial_per_slide',
        array( 
            'label'     => esc_html__( 'Number of Testimonial Per View', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::NUMBER,
            'min'       => 1,
            'max'       => 15,
            'step'      => 1,
            'default'   => 1,
            'condition' => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
        )
    );
    $this->add_responsive_control( 'slides_per_group',
        array( 
            'label'     => esc_html__( 'Number of Slides Per Group', 'wpmozo-addons-lite-for-elementor' ),
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
            'label' => esc_html__( 'Space Between Slides', 'wpmozo-addons-lite-for-elementor' ),
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
            'size_units'  => array( 'px' ),
            'condition'   => array( 'slide_effect' => array( 'slide', 'coverflow' ) ),
            'render_type' => 'template'
        )
    );
    $this->add_control( 'enable_coverflow_shadow',
        array( 
            'label'        => esc_html__( 'Enable Slide Shadow', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'condition'    => array( 'slide_effect' => 'coverflow' ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_responsive_control( 'coverflow_shadow_color',
        array( 
            'label'         => esc_html__( 'Shadow Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#222',
            'condition'     => array( 'enable_coverflow_shadow' => 'yes', 'slide_effect' => 'coverflow' ),
            'selectors'     => array( '{{WRAPPER}} .wpmozo_swiper_wrapper .swiper-slide-shadow-left' => 'background-image: linear-gradient( to left,{{VALUE}},rgba( 0,0,0,0 ) ) !important;',
                '{{WRAPPER}} .wpmozo_swiper_wrapper .swiper-slide-shadow-right' => 'background-image: linear-gradient( to right,{{VALUE}},rgba( 0,0,0,0 ) ) !important;'
            )
        )
    );
    $this->add_responsive_control( 'coverflow_rotate',
        array( 
            'type'  => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Rotate ', 'wpmozo-addons-lite-for-elementor' ),
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
            'type'  => Controls_Manager::SLIDER,
            'label' => esc_html__( 'Coverflow Depth ', 'wpmozo-addons-lite-for-elementor' ),
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
    $this->add_control( 'equalize_testimonials_height',
        array( 
            'label'        => esc_html__( 'Equalize Slides Height', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'equal_height',
            'default'      => 'no',
            'render_type'  => 'template',
            'prefix_class' => 'wpmozo_ae_',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
            'selectors' => array( 
                '{{WRAPPER}}.wpmozo_ae_equal_height .wpmozo_testimonial_slide' => 'align-self: flex-start;',
                '{{WRAPPER}}.wpmozo_ae_equal_height .wpmozo_testimonial_slide .wpmozo_single_testimonial_card' => 'height:100%;',
            )
        )
    );
    $this->add_control( 'slider_loop',
        array( 
            'label'        => esc_html__( 'Enable Loop', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'autoplay',
        array( 
            'label'        => esc_html__( 'Autoplay', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'autoplay_speed',
        array( 
            'label'     => esc_html__( 'Autoplay Delay', 'wpmozo-addons-lite-for-elementor' ),
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
            'label'        => esc_html__( 'Pause On Hover', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'condition' => array( 'autoplay' => 'yes' ),
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 
        'enable_linear_transition',
        array( 
            'label'                => esc_html__( 'Enable Linear Transition', 'wpmozo-addons-lite-for-elementor' ),
            'type'                 => Controls_Manager::SWITCHER,
            'label_off'            => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'             => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value'         => 'linear',
            'default'              => 'no',
            'selectors_dictionary' => array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
            'selectors'            => array( '{{WRAPPER}} .swiper-wrapper' => 'transition-timing-function: {{VALUE}} !important;' ),
        )
    );
    $this->add_control( 'slide_transition_duration',
        array( 
            'label'   => esc_html__( 'Transition Duration', 'wpmozo-addons-lite-for-elementor' ),
            'type'    => Controls_Manager::NUMBER,
            'min'     => 0,
            'max'     => 10000,
            'step'    => 100,
            'default' => 1000,
        )
    );
    $this->add_control( 'show_arrow',
        array( 
            'label'        => esc_html__( 'Show Arrows', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => '',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'previous_slide_arrow',
        array( 
            'label'     => esc_html__( 'Previous Arrow', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::ICONS,
            'default'   => array( 
                'value'     => 'fas fa-chevron-left',
                'library'   => 'fa-solid',
            ),
            'condition' => array( 'show_arrow' => 'yes' ),
        )
    );
    $this->add_control( 'next_slide_arrow',
        array( 
            'label'     => esc_html__( 'Next Arrow', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::ICONS,
            'default'   => array( 
                'value'     => 'fas fa-chevron-right',
                'library'   => 'fa-solid',
            ),
            'condition' => array( 'show_arrow' => 'yes' ),
        )
    );
    $this->add_control( 'show_arrow_on_hover',
        array( 
            'label'        => esc_html__( 'Show Arrows On Hover', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
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
            'label'       => esc_html__( 'Arrows Position', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'inside'        => esc_html__( 'Inside', 'wpmozo-addons-lite-for-elementor' ),
                'outside'       => esc_html__( 'Outside', 'wpmozo-addons-lite-for-elementor' ),
                'top_left'      => esc_html__( 'Top Left', 'wpmozo-addons-lite-for-elementor' ),
                'top_right'     => esc_html__( 'Top Right', 'wpmozo-addons-lite-for-elementor' ),
                'top_center'    => esc_html__( 'Top Center', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_left'   => esc_html__( 'Bottom Left', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_right'  => esc_html__( 'Bottom Right', 'wpmozo-addons-lite-for-elementor' ),
                'bottom_center' => esc_html__( 'Bottom Center', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'   => 'inside',
            'condition' => array( 'show_arrow' => 'yes' )
        )
    );
    $this->add_control( 'show_control_dot',
        array( 
            'label'        => esc_html__( 'Show Dots Pagination', 'wpmozo-addons-lite-for-elementor' ),
            'separator'	   => 'before',
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'no',
            'selectors_dictionary' 	=> array( 
                'yes' => 'yes',
                ''    => 'no',
            ),
        )
    );
    $this->add_control( 'control_dot_style',
        array( 
            'label'       => esc_html__( 'Dots Pagination Style', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'solid_dot'       => esc_html__( 'Solid Dot', 'wpmozo-addons-lite-for-elementor' ),
                'transparent_dot' => esc_html__( 'Transparent Dot', 'wpmozo-addons-lite-for-elementor' ),
                'stretched_dot'   => esc_html__( 'Stretched Dot', 'wpmozo-addons-lite-for-elementor' ),
                'line'            => esc_html__( 'Line', 'wpmozo-addons-lite-for-elementor' ),
                'rounded_line'    => esc_html__( 'Rounded Line', 'wpmozo-addons-lite-for-elementor' ),
                'square_dot'      => esc_html__( 'Squared Dot', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'solid_dot',
            'condition'   => array( 'show_control_dot' => 'yes' ),
            'render-type' => 'template'
        )
    );
    $this->add_control( 'enable_dynamic_dots',
        array( 
            'label'        => esc_html__( 'Enable Dynamic Dots', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
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

/* Text style controls start here */
$this->start_controls_section( 'text_style_sec',
    array( 
        'label' => esc_html__( 'Text', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_responsive_control( 
        'text_alignment',
        array( 
            'label'         => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::CHOOSE,
            'options'       => array( 
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
                'justify'  => array( 
                    'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
                    'icon'  => 'eicon-text-align-justify',
                ),
            ),
            'selectors'     => array( 
                '{{WRAPPER}} ' => 'text-align: {{VALUE}};',
            ),
            'default'       => 'center',
            'prefix_class'  => ' wpmozo_text_align_',
            'render_type'   => 'template',
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name' => 'text_shadow',
            'selector' => '{{WRAPPER}}',
        )
    );
$this->end_controls_section();

/* Body style controls start here */
$this->start_controls_section( 'body_style_sec',
    array( 
        'label' => esc_html__( 'Body', 'wpmozo-addons-lite-for-elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    )
);
    $this->start_controls_tabs( 'body_text_normal_and_hover_tabs' );
        $this->start_controls_tab( 
            'body_text_normal_tab',
            array( 
                'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'body_text_color',
                array( 
                    'label'       => esc_html__( 'Body Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_desc, {{WRAPPER}} .wpmozo_testimonial_desc p' => 'color: {{VALUE}};transition: all 300ms;',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Body Text', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'body_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_testimonial_desc, {{WRAPPER}} .wpmozo_testimonial_desc p',
                )
            );
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'body_text_hover_tab',
            array( 
                'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'body_text_color_hover',
                array( 
                    'label'       => esc_html__( 'Body Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_desc:hover, {{WRAPPER}} .wpmozo_testimonial_desc p:hover' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Body Text', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'body_text_hover_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_testimonial_desc:hover, {{WRAPPER}} .wpmozo_testimonial_desc p:hover',
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control(
        'body_text_hr',
        array(
            'type' => \Elementor\Controls_Manager::DIVIDER,
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name'      => 'body_text_shadow',
            'label'     => esc_html__( 'Body Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
            'selector'  => '{{WRAPPER}} .wpmozo_testimonial_desc, {{WRAPPER}} .wpmozo_testimonial_desc p',
        )
    );
$this->end_controls_section();

/* Author style controls start here */
$this->start_controls_section( 'author_style_sec',
    array( 
        'label' => esc_html__( 'Author', 'wpmozo-addons-lite-for-elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_control(
        'name_heading',
        array(
            'label'     => esc_html__( 'Name', 'wpmozo-addons-lite-for-elementor' ),
            'type'      => Controls_Manager::HEADING,
            'separator' => 'before',
        )
    );
        $this->start_controls_tabs( 'author_name_tabs' );
            $this->start_controls_tab( 
                'author_name_normal_tab',
                array( 
                    'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
                $this->add_responsive_control( 
                    'author_name_text_color',
                    array( 
                        'label'       => esc_html__( 'Author Name Text Color', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => false,
                        'type'        => Controls_Manager::COLOR,
                        'default'     => '',
                        'selectors'   => array( 
                            '{{WRAPPER}} .wpmozo_testimonial_author_name' => 'color: {{VALUE}};transition: all 300ms;',
                        ),
                    )
                );
                $this->add_group_control( 
                    Group_Control_Typography::get_type(),
                    array( 
                        'label'       => esc_html__( 'Author Name Text', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => true,
                        'name'        => 'author_name_text_typography',
                        'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_name',
                    )
                );
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'author_name_hover_tab',
                array( 
                    'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
                $this->add_responsive_control( 
                    'author_name_hover_text_color',
                    array( 
                        'label'       => esc_html__( 'Author Name Text Color', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => false,
                        'type'        => Controls_Manager::COLOR,
                        'default'     => '',
                        'selectors'   => array( 
                            '{{WRAPPER}} .wpmozo_testimonial_author_name:hover' => 'color: {{VALUE}};',
                        ),
                    )
                );
                $this->add_group_control( 
                    Group_Control_Typography::get_type(),
                    array( 
                        'label'       => esc_html__( 'Author Name Text', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => true,
                        'name'        => 'author_name_text_hover_typography',
                        'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_name:hover',
                        'separator'   => 'after',
                    )
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'author_text_shadow_heading',
            array(
                'label' => esc_html__( 'Author Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            )
        );
        $this->add_group_control( 
            Group_Control_Text_Shadow::get_type(),
            array( 
                'name' => 'name_text_shadow',
                'selector' => '{{WRAPPER}} .wpmozo_testimonial_author_name',
            )
        );
    $this->add_control(
        'author_designation_text_hr',
        array(
            'type' => Controls_Manager::DIVIDER,
        )
    );
    $this->add_control(
        'designation_heading',
        array(
            'label' => esc_html__( 'Designation', 'wpmozo-addons-lite-for-elementor' ),
            'type' => Controls_Manager::HEADING,
        )
    );
        $this->start_controls_tabs( 'author_designation_tabs' );
            $this->start_controls_tab( 
                'author_designation_normal_tab',
                array( 
                    'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
                $this->add_responsive_control( 
                    'author_designation_text_color',
                    array( 
                        'label'       => esc_html__( 'Designation Text Color', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => false,
                        'type'        => Controls_Manager::COLOR,
                        'default'     => '',
                        'selectors'   => array( 
                            '{{WRAPPER}} .wpmozo_testimonial_author_designation' => 'color: {{VALUE}};transition: all 300ms;',
                        ),
                    )
                );
                $this->add_group_control( 
                    Group_Control_Typography::get_type(),
                    array( 
                        'label'       => esc_html__( 'Designation Text', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => true,
                        'name'        => 'author_designation_text_typography',
                        'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_designation',
                    )
                );
            $this->end_controls_tab();
            $this->start_controls_tab( 
                'author_designation_hover_tab',
                array( 
                    'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
                )
            );
                $this->add_responsive_control( 
                    'author_designation_hover_text_color',
                    array( 
                        'label'       => esc_html__( 'Designation Text Color', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => false,
                        'type'        => Controls_Manager::COLOR,
                        'default'     => '',
                        'selectors'   => array( 
                            '{{WRAPPER}} .wpmozo_testimonial_author_designation:hover' => 'color: {{VALUE}};',
                        ),
                    )
                );
                $this->add_group_control( 
                    Group_Control_Typography::get_type(),
                    array( 
                        'label'       => esc_html__( 'Designation Text', 'wpmozo-addons-lite-for-elementor' ),
                        'label_block' => true,
                        'name'        => 'author_designation_text_hover_typography',
                        'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_designation:hover',
                    )
                );
            $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'designation_text_shadow_heading',
            array(
                'label' => esc_html__( 'Designation Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            )
        );
        $this->add_group_control( 
            Group_Control_Text_Shadow::get_type(),
            array( 
                'name' => 'designation_text_shadow',
                'selector' => '{{WRAPPER}} .wpmozo_testimonial_author_designation',
            )
        );
    $this->add_control(
        'author_company_text_hr',
        array(
            'type' => Controls_Manager::DIVIDER,
        )
    );
    $this->add_control(
        'company_heading',
        array(
            'label' => esc_html__( 'Company', 'wpmozo-addons-lite-for-elementor' ),
            'type' => Controls_Manager::HEADING,
        )
    );
    $this->start_controls_tabs( 'author_company_tabs' );
        $this->start_controls_tab( 
            'author_company_normal_tab',
            array( 
                'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'author_company_text_color',
                array( 
                    'label'       => esc_html__( 'Company Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#2ea3f2',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_author_company, {{WRAPPER}} .wpmozo_testimonial_author_company a' => 'color: {{VALUE}};transition: all 300ms;',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Company Text', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'author_company_text_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_company, {{WRAPPER}} .wpmozo_testimonial_author_company a',
                )
            );
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'author_company_hover_tab',
            array( 
                'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'author_company_hover_text_color',
                array( 
                    'label'       => esc_html__( 'Company Text Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_author_company:hover, {{WRAPPER}} .wpmozo_testimonial_author_company a:hover' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Company Text', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'author_company_text_hover_typography',
                    'selector'    => '{{WRAPPER}} .wpmozo_testimonial_author_company:hover, {{WRAPPER}} .wpmozo_testimonial_author_company a:hover',
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
    $this->add_control(
        'company_text_shadow_heading',
        array(
            'label' => esc_html__( 'Company Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
            'type' => Controls_Manager::HEADING,
            'separator' => 'before'
        )
    );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name' => 'company_text_shadow',
            'selector' => '{{WRAPPER}} .wpmozo_testimonial_author_company, {{WRAPPER}} .wpmozo_testimonial_author_company a',
        )
    );
$this->end_controls_section();

/* Style rating style controls start here */
$this->start_controls_section( 'star_rating_style_sec',
    array( 
        'label' => esc_html__( 'Star Rating', 'wpmozo-addons-lite-for-elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_responsive_control( 
        'star_font_size',
        array( 
            'label'      => esc_html__( 'Star Font Size', 'wpmozo-addons-lite-for-elementor' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => array( 'px' ),
            'range'      => array( 
                'px' => array( 
                    'min'  => 10,
                    'max'  => 100,
                    'step' => 10,
                ),
            ),
            'default' => array( 
                'unit' => 'px',
                'size' => 24,
            ),
            'selectors'    =>  array( 
                '{{WRAPPER}} .wpmozo_testimonial_rating .wpmozo_testimonial_star' => 'font-size: {{SIZE}}{{UNIT}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'filled_star_color',
        array( 
            'label'       => esc_html__( 'Filled Star Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'default'     => '',
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_testimonial_rating .wpmozo_testimonial_filled_star, {{WRAPPER}} .wpmozo_testimonial_rating .wpmozo_testimonial_half_filled_star' => 'color: {{VALUE}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'empty_star_color',
        array( 
            'label'       => esc_html__( 'Empty Star Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::COLOR,
            'default'     => '',
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_testimonial_rating .wpmozo_testimonial_empty_star' => 'color: {{VALUE}};',
            ),
        )
    );
$this->end_controls_section();

/* Quote icon style controls start here */
$this->start_controls_section( 'quote_icon_sec',
    array( 
        'label' => esc_html__( 'Quote Icon', 'wpmozo-addons-lite-for-elementor' ),
        'tab' => Controls_Manager::TAB_STYLE,
    )
);
    $this->start_controls_tabs( 'quote_icons_tabs' );
        $this->start_controls_tab( 
            'opening_quote_icon_tab',
            array( 
                'label' => esc_html__( 'Opening Quote', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_control( 'show_opening_quote_icon',
                array( 
                    'label'        => esc_html__( 'Show Opening Quote Icon', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => 'yes',
                )
            );
            $this->add_responsive_control( 
                'opening_quote_icon_size',
                array( 
                    'label'      => esc_html__( 'Quote Icon Size', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => array( 'px' ),
                    'range'      => array( 
                        'px' => array( 
                            'min'  => 10,
                            'max'  => 350,
                            'step' => 10,
                        ),
                    ),
                    'default' => array( 
                        'unit' => 'px',
                        'size' => 56,
                    ),
                    'selectors'    =>  array( 
                        '{{WRAPPER}} .wpmozo_testimonial_opening_quote_icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    ),
                    'condition' => array(
                        'show_opening_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_responsive_control( 
                'opening_quote_icon_color',
                array( 
                    'label'       => esc_html__( 'Quote Icon Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => 'rgba(0,0,0,0.2)',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_opening_quote_icon' => 'color: {{VALUE}};',
                    ),
                    'condition' => array(
                        'show_opening_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_control( 'custom_position_opening_quote_icon',
                array( 
                    'label'        => esc_html__( 'Enable Custom Position For Quote Icon', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => '',
                    'condition' => array(
                        'show_opening_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_responsive_control( 
                'opening_quote_icon_position_top',
                array( 
                    'label'      => esc_html__( 'Quote Icon Position From Top', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => array( 'px', '%',  ),
                    'range'      => array( 
                        'px' => array( 
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ),
                    ),
                    'default' => array( 
                        'unit' => '%',
                        'size' => 0,
                    ),
                    'selectors'    =>  array( 
                        '{{WRAPPER}} .wpmozo_testimonial_opening_quote_icon' => 'top: {{SIZE}}{{UNIT}};',
                    ),
                    'condition' => array(
                        'show_opening_quote_icon' => 'yes',
                        'custom_position_opening_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_control( 'opening_quote_icon_position',
                array( 
                    'label'       => esc_html__( 'Quote Icon Position', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::SELECT,
                    'options'     => array( 
                        'left'   => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'right'  => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),               
                    ),
                    'default'     => 'right',
                    'condition'   => array(
                        'show_opening_quote_icon' => 'yes',
                        'custom_position_opening_quote_icon' => 'yes'
                    )        
                )
            );
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'closing_quote_icon_tab',
            array( 
                'label' => esc_html__( 'Closing Quote', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_control( 'show_closing_quote_icon',
                array( 
                    'label'        => esc_html__( 'Show Opening Quote Icon', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => '',
                )
            );
            $this->add_responsive_control( 
                'closing_quote_icon_size',
                array( 
                    'label'      => esc_html__( 'Quote Icon Size', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => array( 'px' ),
                    'range'      => array( 
                        'px' => array( 
                            'min'  => 10,
                            'max'  => 350,
                            'step' => 10,
                        ),
                    ),
                    'default' => array( 
                        'unit' => 'px',
                        'size' => 56,
                    ),
                    'selectors'    =>  array( 
                        '{{WRAPPER}} .wpmozo_testimonial_closing_quote_icon' => 'font-size: {{SIZE}}{{UNIT}};',
                    ),
                    'condition' => array(
                        'show_closing_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_responsive_control( 
                'closing_quote_icon_color',
                array( 
                    'label'       => esc_html__( 'Quote Icon Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => 'rgba(0,0,0,0.2)',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_testimonial_closing_quote_icon' => 'color: {{VALUE}};',
                    ),
                    'condition' => array(
                        'show_closing_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_control( 'custom_position_closing_quote_icon',
                array( 
                    'label'        => esc_html__( 'Enable Custom Position For Quote Icon', 'wpmozo-addons-lite-for-elementor' ),
                    'type'         => Controls_Manager::SWITCHER,
                    'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
                    'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
                    'return_value' => 'yes',
                    'default'      => '',
                    'condition' => array(
                        'show_closing_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_responsive_control( 
                'closing_quote_icon_position_bottom',
                array( 
                    'label'      => esc_html__( 'Quote Icon Position From Bottom', 'wpmozo-addons-lite-for-elementor' ),
                    'type'       => Controls_Manager::SLIDER,
                    'size_units' => array( 'px', '%',  ),
                    'range'      => array( 
                        'px' => array( 
                            'min'  => 0,
                            'max'  => 100,
                            'step' => 1,
                        ),
                    ),
                    'default' => array( 
                        'unit' => '%',
                        'size' => 0,
                    ),
                    'selectors'    =>  array( 
                        '{{WRAPPER}} .wpmozo_testimonial_closing_quote_icon' => 'bottom: {{SIZE}}{{UNIT}};',
                    ),
                    'condition' => array(
                        'show_closing_quote_icon' => 'yes',
                        'custom_position_closing_quote_icon' => 'yes'
                    )
                )
            );
            $this->add_control( 'closing_quote_icon_position',
                array( 
                    'label'       => esc_html__( 'Quote Icon Position', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::SELECT,
                    'options'     => array( 
                        'left'   => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
						'center' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
						'right'  => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),               
                    ),
                    'default'   => 'right',
                    'condition' => array(
                        'show_closing_quote_icon' => 'yes',
                        'custom_position_closing_quote_icon' => 'yes'
                    )        
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

/* Slider style controls start here */
$this->start_controls_section( 'slider_styling',
    array( 
        'label' => esc_html__( 'Slider', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
 );
    $this->add_responsive_control( 'control_dot_active_color',
        array( 
            'label'         => esc_html__( 'Active Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#000',
            'selectors'     => array( '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet-active-main, {{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background : {{VALUE}};' ),
            'condition'   => array( 'show_control_dot' => 'yes' ),
        )
    );
    $this->add_responsive_control( 'control_dot_inactive_color',
        array( 
            'label'         => esc_html__( 'Inactive Dot Pagination Color', 'wpmozo-addons-lite-for-elementor' ),
            'label_block'   => false,
            'type'          => Controls_Manager::COLOR,
            'default'   	=> '#cccccc',
            'selectors'     => array( 
                '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullet' => 'background: {{VALUE}};',
                '{{WRAPPER}} .wpmozo_swiper_pagination .swiper-pagination-bullets-dynamic' => 'width: 100% !important;' ),
            'condition'   => array( 'show_control_dot' => 'yes' ),
        )
    );
    $this->add_responsive_control( 'arrows_font_size',
        array( 
            'label' => esc_html__( 'Arrows Font Size', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 100,
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
            'condition'   => array( 'show_arrow' => 'yes' ),
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_swiper_navigation i ' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_swiper_navigation svg ' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_arrows_outside::before' => 'width: {{SIZE}}{{UNIT}}; left: -{{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .wpmozo_arrows_outside::after' => 'width: {{SIZE}}{{UNIT}}; right: -{{SIZE}}{{UNIT}};'

            ),
        )
    );
    $this->add_responsive_control( 'arrow_bg_border',
        array( 
            'label' => esc_html__( 'Arrow Background Border', 'wpmozo-addons-lite-for-elementor' ),
            'type'  => Controls_Manager::SLIDER,
            'range' => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                )
            ),
            'devices' => array( 'desktop', 'tablet', 'mobile' ),
            'size_units' => array( 'px' ),
            'condition'   => array( 'show_arrow' => 'yes' ),
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next ' => 'border: {{SIZE}}{{UNIT}} solid;',
            ),
        )
    );
    $this->add_responsive_control( 'arrow_border_radius',
        array( 
            'label'       => esc_html__( 'Arrow Border Radius', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'condition'   => array( 'show_arrow' => 'yes' ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
    
    $this->add_responsive_control( 'arrows_padding',
        array( 
            'label'       => esc_html__( 'Arrows Padding', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};box-sizing:content',
                '{{WRAPPER}} .wpmozo_swiper_navigation svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};box-sizing:content-box;',
            ),
        )
    );
    $this->start_controls_tabs( 'arrows_normal_and_hover_tabs' );
        $this->start_controls_tab( 
            'arrows_normal_tab',
            array( 
                'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'arrows_color',
                array( 
                    'label'       => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#2ea3f2',
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next' => 'fill: {{VALUE}};transition:all 300ms;',
                    ),
                )
            );
            $this->add_responsive_control( 
                'arrows_bg_color',
                array( 
                    'label'       => esc_html__( 'Arrows Background Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next' => 'background-color: {{VALUE}};',
                    ),
                )
            );
            $this->add_responsive_control( 
                'arrows_bg_border_color',
                array( 
                    'label'       => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next' => 'border-color: {{VALUE}};',
                    ),
                )
            );
        $this->end_controls_tab();
        $this->start_controls_tab( 
            'arrows_hover_tab',
            array( 
                'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'arrows_hover_color',
                array( 
                    'label'       => esc_html__( 'Arrows Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover' => 'fill: {{VALUE}};',
                    ),
                )
            );
            $this->add_responsive_control( 
                'arrows_hover_bg_color',
                array( 
                    'label'       => esc_html__( 'Arrows Background Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover' => 'background-color: {{VALUE}};',
                    ),
                )
            );
            $this->add_responsive_control( 
                'arrows_hover_bg_border_color',
                array( 
                    'label'       => esc_html__( 'Arrows Background Border Color', 'wpmozo-addons-lite-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-prev:hover, {{WRAPPER}} .wpmozo_swiper_navigation .swiper-button-next:hover' => 'border-color: {{VALUE}};',
                    ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

/* Spacing section controls start here */
$this->start_controls_section( 'spacing_sec',
    array( 
        'label' => esc_html__( 'Spacing', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_responsive_control( 'slider_container_padding',
        array( 
            'label'       => esc_html__( 'Slider Container Padding', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'selectors'   => array( 
                '{{WRAPPER}} .swiper-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
    $this->add_responsive_control( 'testimonial_padding',
        array( 
            'label'       => esc_html__( 'Testimonial Padding', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_single_testimonial_card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
$this->end_controls_section();

/* Border section controls start here */
$this->start_controls_section( 'border_sec',
    array( 
        'label' => esc_html__( 'Border', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_group_control( 
        Group_Control_Border::get_type(),
        array( 
            'name'      => 'single_testimonial_border',
            'selector'  => '{{WRAPPER}} .wpmozo_single_testimonial_card',
            'fields_options' => array( 
                'border' => array( 'label' => esc_html__( 'Single Testimonial Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
                'width' => array( 'label' => esc_html__( 'Single Testimonial Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
                'color' => array( 'label' => esc_html__( 'Single Testimonial Border Color', 'wpmozo-addons-lite-for-elementor' ) )
            )
        )
    );
    $this->add_responsive_control( 'single_testimonial_border_radius',
        array( 
            'label'       => esc_html__( 'Single Testimonial Border Radius', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_single_testimonial_card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
    
    $this->add_group_control( 
        Group_Control_Border::get_type(),
        array( 
            'name'      => 'author_image_border',
            'selector'  => '{{WRAPPER}} .wpmozo_testimonial_author_image img',
            'fields_options' => array( 
                'border' => array( 'label' => esc_html__( 'Author Image Border Type', 'wpmozo-addons-lite-for-elementor' ) ),
                'width' => array( 'label' => esc_html__( 'Author Image Border Width', 'wpmozo-addons-lite-for-elementor' ) ),
                'color' => array( 'label' => esc_html__( 'Author Image Border Color', 'wpmozo-addons-lite-for-elementor' ) )
            )
        )
    );
    $this->add_responsive_control( 'author_image_border_radius',
        array( 
            'label'       => esc_html__( 'Author Image Border Radius', 'wpmozo-addons-lite-for-elementor' ),
            'type'        => Controls_Manager::DIMENSIONS,
            'label_block' => true,
            'size_units'  => array( 'px', 'em', '%' ),
            'selectors'   => array( 
                '{{WRAPPER}} .wpmozo_testimonial_author_image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
        )
    );
$this->end_controls_section();

/* Box Shadow section controls start here */
$this->start_controls_section( 'box_shadow_sec',
    array( 
        'label' => esc_html__( 'Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_group_control( 
        Group_Control_Box_Shadow::get_type(),
        array( 
            'name'      => 'single_testimonial_box_shadow',
            'label'       => esc_html__( 'Single Testimonial Box Shadow', 'wpmozo-addons-lite-for-elementor' ),
            'selector'  => '{{WRAPPER}} .wpmozo_single_testimonial_card',
        )
    );
$this->end_controls_section();

/* Background section controls start here */
$this->start_controls_section( 'background_sec',
    array( 
        'label' => esc_html__( 'Background', 'wpmozo-addons-lite-for-elementor' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->add_group_control( 
        Group_Control_Background::get_type(),
        array( 
            'name'           => 'testimonial_card_bg_color',
            'types'          => array( 'classic', 'gradient' ),
            'selector'       => '{{WRAPPER}} .wpmozo_single_testimonial_card',
            'fields_options' => array(
                'background' => array( 'label' => esc_html__( 'Single Testimonial Background', 'wpmozo-addons-lite-for-elementor' ) ),
            )
        )
    );
$this->end_controls_section();