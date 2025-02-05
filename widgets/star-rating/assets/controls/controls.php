<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Utils;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Background;

// Start Content Tab.
$this->start_controls_section( 'rating_content_tab',
	array( 
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 'title_text',
		array( 
			'label'       => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'default'     => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Title...', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => true,
		 )
	 );

	$this->add_control( 'star_rating_scale',
	    array( 
	        'label'   => esc_html__( 'Rating Scale', 'wpmozo-addons-lite-for-elementor' ),
	        'type'    => Controls_Manager::SLIDER,
	        'default' => array( 
	            'unit' => '',
	            'size' => 10,
	        ),
	        'range' => array( 
	            'px' => array( 
	                'min'  => 1,
	                'max'  => 10,
	                'step' => 1,
	            ),
	        ),
	    )
	 );
	$this->add_control( 'rating_count',
		array( 
			'label'    => esc_html__( 'Rating', 'wpmozo-addons-lite-for-elementor' ),
			'type'     => Controls_Manager::NUMBER,
			'min'      => 1,
			'max'      => 10,
			'step'     => 0.5,
			'default'  => 9.5,
			'settings' => array( 
	            'empty' => false, // This ensures that the default value is displayed
	        ),
		 )
	 );
	$this->add_control( 'image',
		array( 
			'label'   => esc_html__( 'Image', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::MEDIA,
			'default' => array( 
				'url' => Utils::get_placeholder_image_src(),
			 ),
		 )
	 );
	$this->add_control( 'image_alt_text',
		array( 
			'label'       => esc_html__( 'Image Alt Text','wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
		 )
	 );

	$this->add_control( 'description_text',
		array( 
			'label'       => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::WYSIWYG,
			'default'     => esc_html__( 'Default description', 'wpmozo-addons-lite-for-elementor' ),
			'placeholder' => esc_html__( 'Type your description here', 'wpmozo-addons-lite-for-elementor' ),
		 )
	 );
$this->end_controls_section();

$this->start_controls_section( 'star_rating_display_settings',
	array( 
		'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	 )
 );
	$this->add_control( 'rating_position',
		array( 
			'label'   => esc_html__( 'Rating Position', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => ' ',
			'options' => array( 
				' '            => esc_html__( 'Below Title', 'wpmozo-addons-lite-for-elementor' ),
				'inline-block' => esc_html__( 'After Title', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_title, {{WRAPPER}} .wpmozo_ae_star_rating_rating_wrapper' => 'display: {{VALUE}};'
			 )
		 )
	 );
	$this->add_control( 'show_rating_number_switcher',
		array( 
			'label'        => esc_html__( 'Show Rating Number', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
			'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => 'yes',
		 )
	 );
$this->end_controls_section();
// Style Tab.
$this->start_controls_section( 'star_rating_alignment_setting',
	array( 
		'label' => esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 'global_text_alignment',
		array( 
			'type'    => Controls_Manager::CHOOSE,
			'label'   => esc_html__( 'Text Alignment', 'wpmozo-addons-lite-for-elementor' ),
			'default' => 'left',
			'toggle'  => true,
			'options' => array( 
				'left' => array( 
					'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-left',
				 ),
				'center' => array( 
					'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-center',
				 ),
				'right' => array( 
					'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-right',
				 ),
				'justify' => array( 
					'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
					'icon'  => 'eicon-text-align-justify',
				 ),
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_wrapper' => 'text-align: {{VALUE}};',
			 ),
		 )
	 );
$this->end_controls_section();
$this->start_controls_section( 'title_text_styling',
	array( 
		'label' => esc_html__( 'Title', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_control( 'title_heading_level',
		array( 
			'type'    => Controls_Manager::CHOOSE,
			'label'   => esc_html__( 'Heading', 'wpmozo-addons-lite-for-elementor' ),
			'default' => 'h3',
			'toggle'  => false,
			'options' => array( 
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
		 )
	 );
	$this->add_group_control( Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'title_text_shadow',
			'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_title',
		 )
	 );
	$this->start_controls_tabs( 'title_text_normal_and_hover_tabs' );
		$this->start_controls_tab( 'title_text_normal_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'name'     => 'title_text_typography',
					'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_title *',
				 )
			 );
			$this->add_responsive_control( 'title_text_color',
				array( 
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_title' => 'color: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'title_text_hover_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'name'     => 'title_text_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_title *:hover',
				 )
			 );
			$this->add_responsive_control( 'title_text_hover_color',
				array( 
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_title:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();

// Description Choose Options.
$this->start_controls_section( 'descriptoin_text_styling',
	array( 
		'label' => esc_html__( 'Description', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->start_controls_tabs( 'description_text_options_tabs' );

		$this->start_controls_tab( 'description_text_tab',
			array( 
				'label' => '<i class="eicon-text"></i>',
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Description Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_text_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description > p:not( :has( a ) )',
				 )
			 );
			$this->add_responsive_control( 'description_text__color',
				array( 
					'label'     => esc_html__( 'Description Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( Group_Control_Text_Shadow::get_type(),
				array( 
					'label'       => esc_html__( 'Description Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_text__shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description',
				 )
			 );
			$this->add_responsive_control( 'description_text_alignment',
				array( 
					'type'    => Controls_Manager::CHOOSE,
					'label'   => esc_html__( 'Description Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => true,
					'options' => array( 
						'left' => array( 
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						 ),
						'center' => array( 
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						 ),
						'right' => array( 
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						 ),
						'justify' => array( 
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						 ),
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description' => 'text-align: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'description_link_tab',
			array( 
				'label' => '<i class="eicon-editor-link"></i>',
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Link Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_link_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description a',
				 )
			 );
			$this->add_responsive_control( 'description_link_color',
				array( 
					'label'     => esc_html__( 'Link Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description a' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( Group_Control_Text_Shadow::get_type(),
				array( 
					'label'       => esc_html__( 'Link Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_link_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description a',
				 )
			 );
			$this->add_responsive_control( 'description_link_alignment',
				array( 
					'type'    => Controls_Manager::CHOOSE,
					'label'   => esc_html__( 'Link Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => true,
					'options' => array( 
						'left' => array( 
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						 ),
						'center' => array( 
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						 ),
						'right' => array( 
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						 ),
						'justify' => array( 
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						 ),
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description p:has( a )' => 'text-align: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'description__unordered_list_tab',
			array( 
				'label' => '<i class="eicon-editor-list-ul"></i>',
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Unordered List Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description__unordered_list_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description ul',
				 )
			 );
			$this->add_responsive_control( 'description__unordered_list_color',
				array( 
					'label'     => esc_html__( 'Unordered List Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description ul' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( Group_Control_Text_Shadow::get_type(),
				array( 
					'label'       => esc_html__( 'Unordered List Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description__unordered_list_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description ul',
				 )
			 );
			$this->add_responsive_control( 'description__unordered_list_alignment',
				array( 
					'type'    => Controls_Manager::CHOOSE,
					'label'   => esc_html__( 'Unordered List Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => true,
					'options' => array( 
						'left' => array( 
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						 ),
						'center' => array( 
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						 ),
						'right' => array( 
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						 ),
						'justify' => array( 
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						 ),
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description ul' => 'text-align: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'description_ordered_list_tab',
			array( 
				'label' => '<i class="eicon-editor-list-ol"></i>',
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Ordered List Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_ordered_list_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description ol',
				 )
			 );
			$this->add_responsive_control( 'description_ordered_list_color',
				array( 
					'label'     => esc_html__( 'Ordered Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description ol' => 'color: {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( Group_Control_Text_Shadow::get_type(),
				array( 
					'label'       => esc_html__( 'Ordered List Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_ordered_list_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description ol',
				 )
			 );
			$this->add_responsive_control( 'description_ordered_list_alignment',
				array( 
					'type'    => Controls_Manager::CHOOSE,
					'label'   => esc_html__( 'Ordered List Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => true,
					'options' => array( 
						'left' => array( 
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-left',
						 ),
						'center' => array( 
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-center',
						 ),
						'right' => array( 
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-right',
						 ),
						'justify' => array( 
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon' => 'eicon-text-align-justify',
						 ),
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description ol' => 'text-align: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'description_blockquote_tab',
			array( 
				'label' => '<i class="eicon-editor-quote"></i>',
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'label'       => esc_html__( 'Blockquote Typography', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_blockquote_typography',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description blockquote',
				 )
			 );
			$this->add_responsive_control( 'description_blockquote_color',
				array( 
					'label'     => esc_html__( 'Blockquote Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description blockquote' => 'color: {{VALUE}};',
						'{{WRAPPER}} .wpmozo_ae_star_rating_description blockquote p:before' => 'border-left: 5px solid {{VALUE}};',
					 ),
				 )
			 );
			$this->add_group_control( Group_Control_Text_Shadow::get_type(),
				array( 
					'label'       => esc_html__( 'Blockquote Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
					'label_block' => true,
					'name'        => 'description_blockquote_text_shadow',
					'selector'    => '{{WRAPPER}} .wpmozo_ae_star_rating_description blockquote',
				 )
			 );
			$this->add_responsive_control( 'description_blockquote_alignment',
				array( 
					'type'    => Controls_Manager::CHOOSE,
					'label'   => esc_html__( 'Blockquote Alignment', 'wpmozo-addons-lite-for-elementor' ),
					'toggle'  => true,
					'options' => array( 
						'left' => array( 
							'title' => esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-left',
						 ),
						'center' => array( 
							'title' => esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-center',
						 ),
						'right' => array( 
							'title' => esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-right',
						 ),
						'justify' => array( 
							'title' => esc_html__( 'Justify', 'wpmozo-addons-lite-for-elementor' ),
							'icon'  => 'eicon-text-align-justify',
						 ),
					 ),
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_description blockquote' => 'text-align: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'rating_number_styling',
	array( 
		'label'     => esc_html__( 'Rating Number', 'wpmozo-addons-lite-for-elementor' ),
		'tab'       => Controls_Manager::TAB_STYLE,
		'condition' => array( 'show_rating_number_switcher' => 'yes' ),
	 )
 );
	$this->add_responsive_control( 'rating_number_underline_text_decoration',
		array( 
			'label'   => esc_html__( 'Underline Text Decoration', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'auto',
			'options' => array( 
				'auto'         => esc_html__( 'Default', 'wpmozo-addons-lite-for-elementor' ),
				'underline'    => esc_html__( 'Underline', 'wpmozo-addons-lite-for-elementor' ),
				'overline'     => esc_html__( 'Overline', 'wpmozo-addons-lite-for-elementor' ),
				'line-through' => esc_html__( 'Line Through', 'wpmozo-addons-lite-for-elementor' ),
				'none'         => esc_html__( 'None', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_number' => 'text-decoration: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 'rating_number_underline_color',
		array( 
			'label'     => esc_html__( 'Underline Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_number' => 'text-decoration-color: {{VALUE}};',
			 ),
			'condition' => array( 
				'wpmozo_sr_rating_number_underline_t_deco' => array( 'underline', 'overline', 'line-through' )
			 ),
		 )
	 );
	$this->add_responsive_control( 'rating_number_underline_style',
		array( 
			'label'   => esc_html__( 'Underline Style', 'wpmozo-addons-lite-for-elementor' ),
			'type'    => Controls_Manager::SELECT,
			'default' => 'solid',
			'options' => array( 
				'solid'  => esc_html__( 'Solid', 'wpmozo-addons-lite-for-elementor' ),
				'dashed' => esc_html__( 'Dashed', 'wpmozo-addons-lite-for-elementor' ),
				'dotted' => esc_html__( 'Dotted', 'wpmozo-addons-lite-for-elementor' ),
				'double' => esc_html__( 'Double', 'wpmozo-addons-lite-for-elementor' ),
				'wavy'   => esc_html__( 'Wavy', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_number' => 'text-decoration-style: {{VALUE}};',
			 ),
			'condition' => array( 
				'wpmozo_sr_rating_number_underline_t_deco' => array( 'underline', 'overline', 'line-through' )
			 ),
		 )
	 );
	$this->add_group_control( Group_Control_Text_Shadow::get_type(),
		array( 
			'name'     => 'rating_number_text_shadow',
			'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_number',
		 )
	 );
	$this->start_controls_tabs( 'rating_number_normal_and_hover_tabs' );
		$this->start_controls_tab( 'rating_number_normal_tab',
			array( 
				'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'name'     => 'rating_number_typography',
					'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_number',
					'exclude'  => array( 'text_decoration' ),
				 )
			 );
			$this->add_responsive_control( 'rating_number_text_color',
				array( 
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_number' => 'color: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
		$this->start_controls_tab( 'rating_number_hover_tab',
			array( 
				'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
			 )
		 );
			$this->add_group_control( Group_Control_Typography::get_type(),
				array( 
					'name'     => 'rating_number_hover_typography',
					'selector' => '{{WRAPPER}} .wpmozo_ae_star_rating_number:hover',
				 )
			 );
			$this->add_responsive_control( 'rating_number_hover_color',
				array( 
					'label'     => esc_html__( 'Text Color', 'wpmozo-addons-lite-for-elementor' ),
					'type'      => Controls_Manager::COLOR,
					'selectors' => array( 
						'{{WRAPPER}} .wpmozo_ae_star_rating_number:hover' => 'color: {{VALUE}};',
					 ),
				 )
			 );
		$this->end_controls_tab();
	$this->end_controls_tabs();
$this->end_controls_section();
$this->start_controls_section( 'rating_stars_styling',
	array( 
		'label' => esc_html__( 'Stars', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_STYLE,
	 )
 );
	$this->add_responsive_control( 'rating_stars_font_size',
		array( 
			'label'      => esc_html__( 'Star Font Size', 'wpmozo-addons-lite-for-elementor' ),
			'type'       => Controls_Manager::SLIDER,
			'size_units' => array( 'px' ),
			'range'      => array( 
				'px' => array( 
					'min' => 1,
					'max' => 100,
				 ),
			 ),
			'default' => array( 
				'unit' => 'px',
				'size' => 20,
			 ),
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_star' => 'font-size: {{SIZE}}{{UNIT}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 'rating_stars_color',
		array( 
			'label'     => esc_html__( 'Filled Star Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_star' => 'color: {{VALUE}};',
			 ),
		 )
	 );
	$this->add_responsive_control( 'empty_rating_star_color',
		array( 
			'label'     => esc_html__( 'Empty Star Color', 'wpmozo-addons-lite-for-elementor' ),
			'type'      => Controls_Manager::COLOR,
			'selectors' => array( 
				'{{WRAPPER}} .wpmozo_ae_star_rating_empty_star' => 'color: {{VALUE}};',
			 ),
		 )
	 );
$this->end_controls_section();