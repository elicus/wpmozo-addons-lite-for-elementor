<?php
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;

/* Configuration section controls */
$this->start_controls_section(
    'configuration_sec',
    array(
        'label' => esc_html__('Configuration', 'wpmozo-addons-for-elementor'),
    )
);
    $this->add_control( 
        'image_ids',
        array( 
            'label'      => esc_html__( 'Add Gallery Images', 'wpmozo-addons-for-elementor' ),
            'type'       => Controls_Manager::GALLERY,
            'show_label' => false,
            'dynamic'    => array( 
                'active' => true,
            ),
        )
    );
    $this->add_responsive_control(
        'image_size',
        array(
            'label'             => esc_html__('Image Size', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'large',
            'options'           => array(
                'thumbnail' => esc_html__( 'Thumbnail', 'wpmozo-addons-for-elementor' ),
                'medium' 	=> esc_html__( 'Medium', 'wpmozo-addons-for-elementor' ),
                'large' 	=> esc_html__( 'Large', 'wpmozo-addons-for-elementor' ),
                'full' 		=> esc_html__( 'Full', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template'    
        )
    );
    $this->add_responsive_control( 
		'column_spacing',
		array( 
			'label'          => esc_html__( 'Column Spacing', 'wpmozo-addons-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'range'          => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 10,
				'unit' => 'px',
			 ),
			'size_units'     => array( 'px' ),
            'render_type'    => 'template',
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo-masonry-layout-gutter' => 'width: {{SIZE}}{{UNIT}};',
				'{{Wrapper}} .filterable-gallery-single-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
     $this->add_responsive_control( 
		'row_height',
		array( 
			'label'          => esc_html__( 'Row Height', 'wpmozo-addons-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'range'          => array( 
				'px' => array( 
					'min'  => 50,
					'max'  => 500,
					'step' => 5,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 200,
				'unit' => 'px',
			 ),
			'size_units'     => array( 'px' ),
            'render_type'    => 'template',
			'selectors'      => array( 
				'{{WRAPPER}} .wpmozo-masonry-layout-gutter' => 'width: {{SIZE}}{{UNIT}};',
				'{{Wrapper}} .filterable-gallery-single-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
			 ),
		 )
	);
    $this->add_responsive_control(
        'lastrow_align',
        array(
            'label'             => esc_html__('Last Row Align', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'justify',
            'options'           => array(
                'justify' 	=> esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
                'center' 	=> esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
                'right' 	=> esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
                'nojustify' => esc_html__( 'No Justify', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template'    
        )
    );
    $this->add_responsive_control(
        'click_trigger',
        array(
            'label'             => esc_html__('Click Trigger', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'off',
            'options'           => array(
                'off'		  => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
                'lightbox'	  => esc_html__( 'Lightbox', 'wpmozo-addons-for-elementor' ),
                'link' 		  => esc_html__( 'Link', 'wpmozo-addons-for-elementor' ),
                'zoom_n_link' => esc_html__( 'Lightbox & Link on Overlay', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template'    
        )
    );
    $this->add_control( 
        'link_target',
        array( 
            'label'   => esc_html__( 'Link Target', 'wpmozo-addons-for-elementor' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => array( 
                'no'  => array( 
                    'title' => esc_html__( 'Same Window', 'wpmozo-addons-for-elementor' ),
                    'icon'  => 'eicon-editor-link',
                 ),
                'yes' => array( 
                    'title' => esc_html__( 'New Tab', 'wpmozo-addons-for-elementor' ),
                    'icon'  => 'eicon-editor-external-link',
                 ),
             ),
            'default' => 'no',
            'toggle'  => false,
            'condition' => array(
                'click_trigger' => 'link'
            ),
         )
    );
$this->end_controls_section();

/* Elements section controls */
$this->start_controls_section(
    'elements_sec',
    array(
        'label' => esc_html__('Elements', 'wpmozo-addons-for-elementor'),
    )
);
    $this->add_control(
        'enable_filterable_gallery',
        array(
            'label'         => esc_html__('Enable Filterable Gallery', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',
        )
    );
    $this->add_control(
        'show_all_filter',
        array(
            'label'         => esc_html__('Show All Images filter', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => 'yes',
            'condition'     => array(
                'enable_filterable_gallery' => 'yes'
            )

        )
    );
    $this->add_control(
        'all_images_text',
        array(
            'label'         => esc_html__('All Images Text', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::TEXT,
            'label_block'   => false,
            'default'       => esc_html__( 'All', 'wpmozo-addons-for-elementor' ),
            'condition'     => array(
                'enable_filterable_gallery' => 'yes',
                'show_all_filter'           => 'yes'
            )
        )
    );
    $this->add_responsive_control(
        'terms_orderby',
        array(
            'label'             => esc_html__('Filterable Category Order By', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'none',
            'options'           => array(
                'none'       => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
                'term_order' => esc_html__( 'Term Order', 'wpmozo-addons-for-elementor' ),
                'date'       => esc_html__( 'Date', 'wpmozo-addons-for-elementor' ),
                'name'       => esc_html__( 'Name/Title', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template' ,
            'condition'         => array(
                'enable_filterable_gallery' => 'yes'
            )   
        )
    );
    $this->add_responsive_control(
        'terms_order',
        array(
            'label'             => esc_html__('Filterable Category Order', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'DESC',
            'options'           => array(
                'DESC' => esc_html__( 'DESC', 'wpmozo-addons-for-elementor' ),
				'ASC'  => esc_html__( 'ASC', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template' ,
            'condition'         => array(
                'enable_filterable_gallery' => 'yes',
                'terms_orderby!'            => 'none',
            )   
        )
    );
    $this->add_control(
        'enable_overlay',
        array(
            'label'         => esc_html__('Enable Image Overlay on Hover', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',

        )
    );
    $this->add_control(
        'overlay_icon',
        array(
            'label'             => esc_html__('Overlay Icon', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::ICONS,
            'default'           => array(
                'value'     => 'fas fa-search-plus',
                'library'   => 'fa-solid',
            ),
            'condition'         => array(
                'enable_overlay' => 'yes',
            ),
        )
    );
    $this->add_control(
        'show_title',
        array(
            'label'         => esc_html__('Show Title', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',

        )
    );
    $this->add_responsive_control(
        'title_area',
        array(
            'label'             => esc_html__('Show Title in', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'lightbox',
            'options'           => array(
                'lightbox'	=> esc_html__( 'Lightbox Only', 'wpmozo-addons-for-elementor' ),
                'overlay' 	=> esc_html__( 'Overlay Only', 'wpmozo-addons-for-elementor' ),
                'both'		=> esc_html__( 'Both', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template' ,
            'condition'         => array(
                'show_title' => 'yes',
            )   
        )
    );
    $this->add_control(
        'show_caption',
        array(
            'label'         => esc_html__('Show Caption', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',

        )
    );
    $this->add_responsive_control(
        'caption_area',
        array(
            'label'             => esc_html__('Show Title in', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'lightbox',
            'options'           => array(
                'lightbox'	=> esc_html__( 'Lightbox Only', 'wpmozo-addons-for-elementor' ),
                'overlay' 	=> esc_html__( 'Overlay Only', 'wpmozo-addons-for-elementor' ),
                'both'		=> esc_html__( 'Both', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type' => 'template' ,
            'condition'         => array(
                'show_caption' => 'yes',
            )   
        )
    );
$this->end_controls_section();

/* Lightbox section controls */
$this->start_controls_section(
    'lightbox_sec',
    array(
        'label' => esc_html__('Lightbox', 'wpmozo-addons-for-elementor'),
        'condition'         => array(
            'click_trigger' => array('lightbox', 'zoom_n_link'),
        )  
    )
);
    $this->add_responsive_control(
        'lightbox_effect',
        array(
            'label'             => esc_html__('Lightbox Effect', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'none',
            'options'           => array(
                'none' => esc_html__( 'None', 'wpmozo-addons-for-elementor' ),
                'zoom' => esc_html__( 'Zoom', 'wpmozo-addons-for-elementor' ),
                'fade' => esc_html__( 'Fade', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type'       => 'template' ,
            'condition'         => array(
                'click_trigger' => array('lightbox', 'zoom_n_link'),
            )   
        )
    );
    $this->add_responsive_control( 
		'lightbox_transition_duration',
		array( 
			'label'          => esc_html__( 'Transition Duration', 'wpmozo-addons-for-elementor' ),
			'type'           => Controls_Manager::SLIDER,
			'range'          => array( 
				'px' => array( 
					'min'  => 100,
					'max'  => 2000,
					'step' => 100,
				 ),
			 ),
			'devices'        => array( 'desktop', 'tablet', 'mobile' ),
			'default'        => array( 
				'size' => 200,
				'unit' => 'px',
			 ),
			'size_units'     => array( 'px' ),
            'condition'      => array(
                'click_trigger'     => array('lightbox', 'zoom_n_link'),
                'lightbox_effect'   => array( 'zoom', 'fade' ),
            )  
		 )
	);
    $this->add_control(
        'enable_navigation',
        array(
            'label'         => esc_html__('Enable Navigation', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => 'yes',
            'condition'         => array(
                'click_trigger' => array('lightbox', 'zoom_n_link'),
            )   

        )
    );
    $this->add_responsive_control(
        'lightbox_title_and_caption_style',
        array(
            'label'             => esc_html__('Title & Caption Style', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'image_overlay',
            'options'           => array(
                'image_overlay'	=> esc_html__( 'Image Overlay', 'wpmozo-addons-for-elementor' ),
				'below_image' 	=> esc_html__( 'Below Image', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type'       => 'template' ,
            'condition'         => array(
                'click_trigger' => array('lightbox', 'zoom_n_link'),
            )   
        )
    );
$this->end_controls_section();

/* Pagination section controls */
$this->start_controls_section(
    'pagination_sec',
    array(
        'label' => esc_html__('Pagination', 'wpmozo-addons-for-elementor'),
        'condition'         => array(
            'click_trigger' => array('lightbox', 'zoom_n_link'),
        )  
    )
);
    $this->add_control(
        'enable_load_more',
        array(
            'label'         => esc_html__('Enable Pagination', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',
        )
    );
    $this->add_control(
        'images_per_page',
        array(
            'label'         => esc_html__('Images per Page', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::TEXT,
            'dynamic'       => array( 'active' => true ),
            'label_block'   => false,
            'default'       => 6,
            'input_type'    => 'number',
            'condition'     => array(
                'enable_load_more'  => 'yes'
            )
        )
    );
    $this->add_responsive_control(
        'pagination_type',
        array(
            'label'             => esc_html__('Pagination Type', 'wpmozo-addons-for-elementor'),
            'type'              => Controls_Manager::SELECT,
            'default'           => 'load_more',
            'options'           => array(
                'number'	=> esc_html__( 'Number Pagination', 'wpmozo-addons-for-elementor' ),
				'load_more' => esc_html__( 'Load More Button', 'wpmozo-addons-for-elementor' ),
            ),
            'render_type'       => 'template' ,
            'condition'         => array(
                'enable_load_more'  => 'yes'
            )   
        )
    );
    $this->add_control(
        'load_more_text',
        array(
            'label'         => esc_html__('Load More Text', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::TEXT,
            'dynamic'       => array( 'active' => true ),
            'label_block'   => false,
            'default'       => esc_html__( 'Load More', 'wpmozo-addons-for-elementor' ),
            'condition'     => array(
                'enable_load_more'  => 'yes',
                'pagination_type'   => 'load_more'
            )
        )
    );
    $this->add_control(
        'show_prev_next',
        array(
            'label'         => esc_html__('Show Previous Next Links', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::SWITCHER,
            'label_on'      => esc_html__('Yes', 'wpmozo-addons-for-elementor'),
            'label_off'     => esc_html__('No', 'wpmozo-addons-for-elementor'),
            'return_value'  => 'yes',
            'default'       => '',
            'condition'     => array(
                'enable_load_more'  => 'yes',
                'pagination_type'   => 'number'
            )
        )
    );
    $this->add_control(
        'next_text',
        array(
            'label'         => esc_html__('Next Link Text', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::TEXT,
            'dynamic'       => array( 'active' => true ),
            'label_block'   => false,
            'default'       => esc_html__('Next','wpmozo-addons-for-elementor'),
            'condition'     => array(
                'enable_load_more' => 'yes',
                'show_prev_next'   => 'yes',
                'pagination_type'  => 'number',
            )
        )
    );
    $this->add_control(
        'prev_text',
        array(
            'label'         => esc_html__('Prev Link Text', 'wpmozo-addons-for-elementor'),
            'type'          => Controls_Manager::TEXT,
            'dynamic'       => array( 'active' => true ),
            'label_block'   => false,
            'default'       => esc_html__('Prev','wpmozo-addons-for-elementor'),
            'condition'     => array(
                'enable_load_more' => 'yes',
                'show_prev_next'   => 'yes',
                'pagination_type'  => 'number',
            )
        )
    );
$this->end_controls_section();

/* Category style section controls */
$this->start_controls_section(
    'category_style_sec',
    array(
        'label' => esc_html__('Category', 'wpmozo-addons-for-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->start_controls_tabs( 'category_normal_and_active_tabs');

        // Normal Tab
        $this->start_controls_tab( 'category_normal_tab',
            array( 
                'label' => esc_html__( 'Normal', 'wpmozo-addons-for-elementor' ),
            )
        );
        $this->add_responsive_control( 
            'category_normal_color',
            array( 
                'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                'label_block' => false,
                'type'        => Controls_Manager::COLOR,
                'default'     => '#fff',
                'selectors'   => array( 
                    '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item a' => 'color: {{VALUE}};',
                ),
            )
        );
        $this->add_group_control( 
            Group_Control_Typography::get_type(),
            array( 
                'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                'label_block' => true,
                'name'        => 'category_normal_typography',
                'fields_options' => array( 
                    'typography' => array( 
                        'default' => 'yes',
                    ),
                    'font_size' => array( 
                        'default'   => array( 'size' => 18 ),
                    ),
                ),
                'selector'    => '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item',
            )
        );
        $this->add_group_control( 
            Group_Control_Text_Shadow::get_type(),
            array( 
                'name'      => 'category_normal_text_shadow',
                'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                'selector'  => '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item',
                'separator' => 'before',
                )
        );
        $this->end_controls_tab();
        // Hover Tab
        $this->start_controls_tab( 'category_active_tab',
            array( 
                'label' => esc_html__( 'Active', 'wpmozo-addons-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'category_active_color',
                array( 
                    'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#000',
                    'selectors'   => array( 
                        '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item.active a' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'category_active_typography',
                    'fields_options' => array( 
                        'typography' => array( 
                            'default' => 'yes',
                        ),
                        'font_size' => array( 
                            'default'   => array( 'size' => 18 ),
                        ),
                    ),
                    'selector'    => '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item.active',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'category_active_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                    'selector'  => '{{WRAPPER}} ul.wpmozo-justified-gallery-filter li.wpmozo-filter-item.active',
                    'separator' => 'before',
                    )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

/* Overlay style section controls */
$this->start_controls_section(
    'overlay_style_sec',
    array(
        'label' => esc_html__('Overlay', 'wpmozo-addons-for-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => array(
            'enable_overlay'    => 'yes'
        )
    )
);
    $this->add_responsive_control(
        'overlay_icon_size',
        array(
            'label'     => esc_html__('Overlay Icon Size', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::SLIDER,
            'default'   => array(
                'size' => 32,
                'unit' => 'px',
            ),
            'range'          => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
            'selectors' => array(
                '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay span.wpmozo-icon-wrap svg' => 'height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay span.wpmozo-icon-wrap svg' => 'width: {{SIZE}}{{UNIT}};',
            ),
            'render_type'   => 'template',
            'condition' => array(
                'enable_overlay'    => 'yes'
            )
        )
    );
    $this->add_control(
        'overlay_icon_color',
        array(
            'label'     => esc_html__('Overlay Icon Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay span.wpmozo-icon-wrap svg' => 'fill: {{VALUE}};',
            ),
            'condition' => array(
                'enable_overlay'    => 'yes'
            )
        )
    );
    $this->add_control(
        'overlay_color',
        array(
            'label'     => esc_html__('Overlay Background Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-justified-gallery-item:hover .wpmozo-justified-gallery-item-overlay' => 'background-color: {{VALUE}};',
            ),
            'condition' => array(
                'enable_overlay'    => 'yes'
            )
        )
    );
    $this->add_responsive_control(
        'zoom_icon_size',
        array(
            'label'     => esc_html__('Zoom Icon Size', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::SLIDER,
            'default'   => array(
                'size' => 16,
                'unit' => 'px',
            ),
            'range'          => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-lightbox i' => 'font-size: {{SIZE}}{{UNIT}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
    $this->add_control(
        'zoom_icon_bg',
        array(
            'label'     => esc_html__('Zoom Icon Background Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-lightbox i' => 'background-color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
    $this->add_control(
        'zoom_icon_color',
        array(
            'label'     => esc_html__('Zoom Icon Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-lightbox i' => 'color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
    $this->add_responsive_control(
        'link_icon_size',
        array(
            'label'     => esc_html__('Link Icon Size', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::SLIDER,
            'default'   => array(
                'size' => 16,
                'unit' => 'px',
            ),
            'range'          => array( 
				'px' => array( 
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				 ),
			 ),
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-link i' => 'font-size: {{SIZE}}{{UNIT}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
    $this->add_control(
        'link_icon_bg',
        array(
            'label'     => esc_html__('Link Icon Background Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-link i' => 'background-color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
    $this->add_control(
        'link_icon_color',
        array(
            'label'     => esc_html__('Link Icon Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array(
                '{{WRAPPER}} .wpmozo-overlay-icon-wrap a.wpmozo-icon.wpmozo-overlay-link i' => 'color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger'    => 'zoom_n_link'
            )
        )
    );
$this->end_controls_section();

/* Overlay text style section controls */
$this->start_controls_section(
    'overlay_text_style_sec',
    array(
        'label' => esc_html__('Overlay Text', 'wpmozo-addons-for-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->start_controls_tabs( 'overlay_text_title_and_caption_tabs');

        // Normal Tab
        $this->start_controls_tab( 'overlay_text_title_tab',
            array( 
                'label' => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'overlay_text_title_color',
                array( 
                    'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#000',
                    'selectors'   => array( 
                        '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay :is(h1, h2, h3, h4, h5, h6)' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'overlay_text_title_typography',
                    'fields_options' => array( 
                        'typography' => array( 
                            'default' => 'yes',
                        ),
                        'font_size' => array( 
                            'default'   => array( 'size' => 18 ),
                        ),
                    ),
                    'selector'    => '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay :is(h1, h2, h3, h4, h5, h6)',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'overlay_text_title_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                    'selector'  => '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay :is(h1, h2, h3, h4, h5, h6)',
                    'separator' => 'before',
                    )
            );
            $this->add_responsive_control( 
                'overlay_text_title_alignment',
                array( 
                    'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options'     =>
                    array( 
                        'left' =>
                            array( 
                                'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-left',
                                ),
                        'center'     =>
                            array( 
                                'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-center',
                                ),
                        'right'   =>
                            array( 
                                'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-right',
                                ),
                        'justify'   =>
                            array( 
                                'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-justify',
                                ),
                    ),
                    'toggle'      => true,
                    'selectors'   => array( 
                        '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay :is(h1, h2, h3, h4, h5, h6)' => 'text-align: {{VALUE}};',
                        ),
                )
            );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab( 'overlay_text_caption_tab',
            array( 
                'label' => esc_html__( 'Caption', 'wpmozo-addons-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'overlay_text_caption_color',
                array( 
                    'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay .wpmozo-item-caption' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'overlay_text_caption_typography',
                    'fields_options' => array( 
                        'typography' => array( 
                            'default' => 'yes',
                        ),
                        'font_size' => array( 
                            'default'   => array( 'size' => 18 ),
                        ),
                    ),
                    'selector'    => '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay .wpmozo-item-caption',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'overlay_text_caption_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                    'selector'  => '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay .wpmozo-item-caption',
                    'separator' => 'before',
                    )
            );
            $this->add_responsive_control( 
                'overlay_text_caption_alignment',
                array( 
                    'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options'     =>
                    array( 
                        'left' =>
                            array( 
                                'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-left',
                                ),
                        'center'     =>
                            array( 
                                'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-center',
                                ),
                        'right'   =>
                            array( 
                                'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-right',
                                ),
                        'justify'   =>
                            array( 
                                'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-justify',
                                ),
                    ),
                    'toggle'      => true,
                    'selectors'   => array( 
                        '{{WRAPPER}} figcaption.wpmozo-justified-gallery-item-overlay .wpmozo-item-caption' => 'text-align: {{VALUE}};',
                        ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

/* Lightbox style section controls */
$this->start_controls_section(
    'lighbox_style_sec',
    array(
        'label' => esc_html__('Lightbox', 'wpmozo-addons-for-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => array(
            'click_trigger' => array( 'lightbox', 'zoom_n_link' ),
        )
    )
);
    $this->add_control(
        'title_and_caption_background_color',
        array(
            'label'     => esc_html__('Title & Caption Background Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(0,0,0,0.6)',
            'selectors' => array(
                '{{WRAPPER}}.mfp-wrap .mfp-title' => 'background-color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger' => array( 'lightbox', 'zoom_n_link' ),
            )
        )
    );
    $this->add_control(
        'lightbox_background_color',
        array(
            'label'     => esc_html__('Lightbox Background Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(0,0,0,0.8)',
            'selectors' => array(
                '{{WRAPPER}}.mfp-wrap' => 'background-color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger' => array( 'lightbox', 'zoom_n_link' ),
            )
        )
    );
    $this->add_control(
        'lightbox_close_icon_color',
        array(
            'label'     => esc_html__('Close Icon Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#fff',
            'selectors' => array(
                '{{WRAPPER}}.mfp-wrap .mfp-close' => 'color: {{VALUE}};',
            ),
            'condition' => array(
                'click_trigger' => array( 'lightbox', 'zoom_n_link' ),
            )
        )
    );
    $this->add_control(
        'lightbox_arrows_color',
        array(
            'label'     => esc_html__('Arrows Color', 'wpmozo-addons-for-elementor'),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#fff',
            'selectors'     => array( 
                '{{WRAPPER}}.mfp-wrap .mfp-arrow-left:before' => 'border-right-color: {{VALUE}};',
                '{{WRAPPER}}.mfp-wrap .mfp-arrow-right:before' => 'border-left-color:  {{VALUE}};', 
            ),
            'condition' => array(
                'click_trigger' => array( 'lightbox', 'zoom_n_link' ),
            )
        )
    );
$this->end_controls_section();


/* Lightbox style section controls */
$this->start_controls_section(
    'lightbox_text_style_sec',
    array(
        'label' => esc_html__('Lightbox Text', 'wpmozo-addons-for-elementor'),
        'tab'   => Controls_Manager::TAB_STYLE,
    )
);
    $this->start_controls_tabs( 'lightbox_text_title_and_caption_tabs');

        // Normal Tab
        $this->start_controls_tab( 'lightbox_text_title_tab',
            array( 
                'label' => esc_html__( 'Title', 'wpmozo-addons-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'lightbox_text_title_color',
                array( 
                    'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'default'     => '#000',
                    'selectors'   => array( 
                        '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-title' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'lightbox_text_title_typography',
                    'fields_options' => array( 
                        'typography' => array( 
                            'default' => 'yes',
                        ),
                        'font_size' => array( 
                            'default'   => array( 'size' => 18 ),
                        ),
                    ),
                    'selector'    => '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-title',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'lightbox_text_title_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                    'selector'  => '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-title',
                    'separator' => 'before',
                    )
            );
            $this->add_responsive_control( 
                'lightbox_text_title_alignment',
                array( 
                    'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options'     =>
                    array( 
                        'left' =>
                            array( 
                                'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-left',
                                ),
                        'center'     =>
                            array( 
                                'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-center',
                                ),
                        'right'   =>
                            array( 
                                'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-right',
                                ),
                        'justify'   =>
                            array( 
                                'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-justify',
                                ),
                    ),
                    'toggle'      => true,
                    'selectors'   => array( 
                            '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-title' => 'text-align: {{VALUE}};',
                        ),
                )
            );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab( 'lightbox_text_caption_tab',
            array( 
                'label' => esc_html__( 'Caption', 'wpmozo-addons-for-elementor' ),
            )
        );
            $this->add_responsive_control( 
                'lightbox_text_caption_color',
                array( 
                    'label'       => esc_html__( 'Color', 'wpmozo-addons-for-elementor' ),
                    'label_block' => false,
                    'type'        => Controls_Manager::COLOR,
                    'selectors'   => array( 
                        '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-caption' => 'color: {{VALUE}};',
                    ),
                )
            );
            $this->add_group_control( 
                Group_Control_Typography::get_type(),
                array( 
                    'label'       => esc_html__( 'Typography', 'wpmozo-addons-for-elementor' ),
                    'label_block' => true,
                    'name'        => 'lightbox_text_caption_typography',
                    'fields_options' => array( 
                        'typography' => array( 
                            'default' => 'yes',
                        ),
                        'font_size' => array( 
                            'default'   => array( 'size' => 18 ),
                        ),
                    ),
                    'selector'    => '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-caption',
                )
            );
            $this->add_group_control( 
                Group_Control_Text_Shadow::get_type(),
                array( 
                    'name'      => 'lightbox_text_caption_text_shadow',
                    'label'     => esc_html__( 'Text Shadow', 'wpmozo-addons-for-elementor' ),
                    'selector'  => '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-caption',
                    'separator' => 'before',
                    )
            );
            $this->add_responsive_control( 
                'lightbox_text_caption_alignment',
                array( 
                    'label'       => esc_html__( 'Alignment', 'wpmozo-addons-for-elementor' ),
                    'type'        => Controls_Manager::CHOOSE,
                    'label_block' => false,
                    'options'     =>
                    array( 
                        'left' =>
                            array( 
                                'title' => esc_html__( 'Left', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-left',
                                ),
                        'center'     =>
                            array( 
                                'title' => esc_html__( 'Center', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-center',
                                ),
                        'right'   =>
                            array( 
                                'title' => esc_html__( 'Right', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-right',
                                ),
                        'justify'   =>
                            array( 
                                'title' => esc_html__( 'Justify', 'wpmozo-addons-for-elementor' ),
                                'icon'  => 'eicon-text-align-justify',
                                ),
                    ),
                    'toggle'      => true,
                    'selectors'   => array( 
                        '{{WRAPPER}}.mfp-wrap .mfp-title .wpmozo-item-caption' => 'text-align: {{VALUE}};',
                        ),
                )
            );
        $this->end_controls_tab();
    $this->end_controls_tabs();
$this->end_controls_section();

/* Load More Button style controls */
$this->start_controls_section( 
	'load_more_btn_style_sec',
	array( 
		'label' => esc_html__( 'Load More Button', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => array(
            'pagination_type' => 'load_more'
        )
	 )
); 
    $this->add_control( 'custom_style_for_load_more_btn',
        array( 
            'label'        => esc_html__( 'Use Custom Style For Load More Button', 'wpmozo-addons-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
            'return_value' => 'yes',
            'default'      => '',
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_size',
        array( 
            'type'       => Controls_Manager::SLIDER,
            'label'      => esc_html__( 'Load More Button Text Size', 'wpmozo-addons-for-elementor' ),
            'size_units' => array( 'px' ),
            'range'      => array( 
                'px' => array( 
                    'min' => 1,
                    'max' => 100,
                 ),
             ),
            'default'    => array( 
                'unit' => 'px',
                'size' => '20',
             ),
             'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
            'selectors' => array( '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'font-size: {{SIZE}}{{UNIT}};')
         )
    );
    $this->add_responsive_control( 
        'load_more_btn_color',
        array( 
            'label'     => esc_html__( 'Load More Button Text Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'color: {{VALUE}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_group_control(
        Group_Control_Background::get_type(),
        array(
            'name'      => 'load_more_btn_text_size',
            'label'     => esc_html__('Background', 'wpmozo-addons-for-elementor'),
            'types'     => array('classic', 'gradient'),
            'selector'  => '{{WRAPPER}} a.wpmozo-justified-gallery-load-more',
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_border_width',
        array( 
            'label'      => esc_html__( 'Load More Button Border Width', 'wpmozo-addons-for-elementor' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => array( 'px', 'em', '%' ),
            'selectors'  => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_border_radius',
        array( 
            'label'      => esc_html__( 'Load More Button Border Radius', 'wpmozo-addons-for-elementor' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => array( 'px', 'em', '%' ),
            'selectors'  => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_border_color',
        array( 
            'label'     => esc_html__( 'Load More Button Border Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'border-color: {{VALUE}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name'     => 'load_more_btn_typography',
            'selector' => '{{WRAPPER}} a.wpmozo-justified-gallery-load-more',
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_control( 'show_load_more_btn_icon',
        array( 
            'label'        => esc_html__( 'Show Load More Button Icon', 'wpmozo-addons-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
            'return_value' => 'yes',
            'default'      => '',
            'condition' => array(
                'custom_style_for_load_more_btn' => 'yes',
            ),
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_icon_color',
        array( 
            'label'     => esc_html__( 'Load More Button Icon Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo-products-accordion-wrap .wpmozo-woo-product__add_to_cart .load_more_btn svg path' => 'fill: {{VALUE}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
                'show_load_more_btn_icon'      => 'yes'
            ),
        )
    );
    $this->add_control( 
        'button_icon',
        array( 
            'label'            => esc_html__( 'Button Icon', 'wpmozo-addons-for-elementor' ),
            'type'             => Controls_Manager::ICONS,
            'default'          => array( 
                'value'   => 'fas fa-chevron-right',
                'library' => 'fa-solid',
             ),
            'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
                'show_load_more_btn_icon'      => 'yes'
            ),
         )
     );
    $this->add_control( 
        'button_icon_position',
        array( 
            'label'     => esc_html__( 'Button Icon Position', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::CHOOSE,
            'options'   => array( 
                'row-reverse' => array( 
                    'title' => esc_html__( 'Before', 'wpmozo-addons-for-elementor' ),
                    'icon'  => 'eicon-angle-left',
                 ),
                'row'  => array( 
                    'title' => esc_html__( 'After', 'wpmozo-addons-for-elementor' ),
                    'icon'  => 'eicon-angle-right',
                 ),
             ),
            'default'   => 'row',
            'prefix_class' => 'icon_',
            'toggle'    => false,
            'selectors'    => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'flex-flow:{{VALUE}};'
             ),
             'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
                'show_load_more_btn_icon'      => 'yes',
                'button_icon[value]!' => '',
            ),
         )
     );
    $this->add_control( 
        'show_icon_on_hover_switcher',
        array( 
            'label'        => esc_html__( 'Show Icon On Hover', 'wpmozo-addons-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_off'    => esc_html__( 'NO', 'wpmozo-addons-for-elementor' ),
            'label_on'     => esc_html__( 'YES', 'wpmozo-addons-for-elementor' ),
            'return_value' => 'yes',
            'default'      => '',
            'selectors'    => array( 
                '{{WRAPPER}}.icon_row-reverse a.wpmozo-justified-gallery-load-more .wpmozo-icon, {{WRAPPER}}.icon_row-reverse a.wpmozo-justified-gallery-load-more svg' => 'opacity: 0; transition: all 300ms; margin-right: -{{load_more_btn_typography.SIZE}}{{load_more_btn_typography.UNIT}};',
                '{{WRAPPER}}.icon_row-reverse a.wpmozo-justified-gallery-load-more:hover .wpmozo-icon, {{WRAPPER}}.icon_row-reverse a.wpmozo-justified-gallery-load-more:hover svg' => 'opacity: 1; margin-right:0;',
                '{{WRAPPER}}.icon_row a.wpmozo-justified-gallery-load-more .wpmozo-icon, {{WRAPPER}}.icon_row a.wpmozo-justified-gallery-load-more svg' => 'opacity: 0; transition: all 300ms; margin-left: -{{load_more_btn_typography.SIZE}}{{load_more_btn_typography.UNIT}};',
                '{{WRAPPER}}.icon_row a.wpmozo-justified-gallery-load-more:hover .wpmozo-icon, {{WRAPPER}}.icon_row a.wpmozo-justified-gallery-load-more:hover svg' => 'opacity: 1; margin-left:0;',
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more .wpmozo-icon' => ' min-width:{{load_more_btn_typography.SIZE}}{{load_more_btn_typography.UNIT}};',
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => ' gap:0px;',
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more:hover' => 'gap:5px;',

             ),
            'condition'    => array( 
                'button_icon[value]!'  => '',
                'show_load_more_btn_icon'      => 'yes',
             ),
         )
     );
    $this->add_group_control( 
        Group_Control_Text_Shadow::get_type(),
        array( 
            'name'     => 'load_more_btn_text_shadow',
            'selector' => '{{WRAPPER}} a.wpmozo-justified-gallery-load-more',
            'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
            ),
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_margin',
        array( 
            'label'      => esc_html__( 'Load More Button Margin', 'wpmozo-addons-for-elementor' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => array( 'px', 'em', '%' ),
            'selectors'  => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
            ),
    
        )
    );
    $this->add_responsive_control( 
        'load_more_btn_padding',
        array( 
            'label'      => esc_html__( 'Load More Button Padding', 'wpmozo-addons-for-elementor' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => array( 'px', 'em', '%' ),
            'selectors'  => array( 
                '{{WRAPPER}} a.wpmozo-justified-gallery-load-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ),
            'condition' => array(
                'custom_style_for_load_more_btn'  => 'yes',
            ),
    
        )
    );
$this->end_controls_section();


/* Pagination style controls */
$this->start_controls_section( 
	'pagination_style_sec',
	array( 
		'label' => esc_html__( 'Pagination', 'wpmozo-addons-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
        'condition' => array(
            'pagination_type' => 'number'
        )
	 )
); 
    $this->add_responsive_control( 
        'pagination_link_background_color',
        array( 
            'label'     => esc_html__( 'Pagination Link Background Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'transparent',
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_justified_gallery_pagination li a' => 'background-color: {{VALUE}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'pagination_link_color',
        array( 
            'label'     => esc_html__( 'Pagination Link Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#000',
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_justified_gallery_pagination li a' => 'color: {{VALUE}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'active_pagination_link_background_color',
        array( 
            'label'     => esc_html__( 'Active Pagination Link Background Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#000',
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_justified_gallery_pagination li.active a' => 'background-color: {{VALUE}};',
            ),
        )
    );
    $this->add_responsive_control( 
        'active_pagination_link_color',
        array( 
            'label'     => esc_html__( 'Active Pagination Link Color', 'wpmozo-addons-for-elementor' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => array( 
                '{{WRAPPER}} .wpmozo_justified_gallery_pagination li.active a' => 'color: {{VALUE}};',
            ),
        )
    );
    $this->add_group_control( 
        Group_Control_Typography::get_type(),
        array( 
            'name'     => 'pagination_typography',
            'selector' => '{{WRAPPER}} .wpmozo_justified_gallery_pagination li a',
        )
    );
$this->end_controls_section();
