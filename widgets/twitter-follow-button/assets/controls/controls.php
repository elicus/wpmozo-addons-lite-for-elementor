<?php
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Text_Shadow;

// Start Content Tab.
$this->start_controls_section( 
	'configuration_setting',
	array( 
		'label'		  => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	  => Controls_Manager::TAB_CONTENT,
	 )
 );
 $this->add_control( 
	'twitter_username',
	array( 
		'label'       => esc_html__( 'Twitter Username', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	 )
 );
 $this->add_control( 
	'do_not_track',
	array( 
		'label'        => __( 'Do not track', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
	 )
 );
 $this->end_controls_section();
 $this->start_controls_section( 
	'display_setting',
	array( 
		'label' 	=> esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	=> Controls_Manager::TAB_CONTENT,
	 )
 );
 $this->add_control( 
	'show_username',
	array( 
		'label'        => __( 'Show Username', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'no',
		'return_value' => 'yes',
	 )
 );
 $this->add_control( 
	 'button_size',
	 array( 
		 'label'   => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
		 'type'    => Controls_Manager::SELECT,
		 'default' => 'large',
		 'options' => array( 
			 'small'    => esc_html__( 'Small', 'wpmozo-addons-lite-for-elementor' ),
			 'large' 	=> esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
		  ),
	  )
  );
 $this->end_controls_section();
//End Content Tab
//Start Style Tab
$this->start_controls_section( 
	'alignment_styling',
	array( 
		'label' 	=> esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	=> Controls_Manager::TAB_STYLE,
	 )
 );
 $this->add_responsive_control( 
	'alignment',
	array( 
		'type'    	=> Controls_Manager::CHOOSE,
		'label'   	=> esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' 	=> array( 
			'left' 		=> array( 
				'title' 	=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  	=> 'eicon-h-align-left',
			 ),
			'center' 	=> array( 
				'title' 	=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  	=> 'eicon-h-align-center',
			 ),
			'right' 	=> array( 
				'title' 	=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  	=> 'eicon-h-align-right',
			 ),
		 ),
		'default' 	=> 'center',
		'toggle'  	=> true,
		'selectors' => array( 
			'{{WRAPPER}} .wpmozo_twitter_follow_button' 	=> 'text-align: {{VALUE}};',
		 ),
	 )
 );
 $this->end_controls_section();
 $this->start_controls_section( 
	'fallback_text_styling',
	array( 
		'label' 	=> esc_html__( 'Fallback Text', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	=> Controls_Manager::TAB_STYLE,
	 )
 );
 $this->start_controls_tabs(
	'fallback_text_style_tabs'
);
$this->start_controls_tab(
	'fallback_text_style_normal_tab',
	[
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	]
);
$this->add_group_control( 
	Group_Control_Typography::get_type(),
	array( 
		'name'     => 'fallback_text_typography',
		'label'    => esc_html__( 'Fallback Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_follow_button a',
	 )
 );
 $this->add_responsive_control( 
	'fallback_text_color',
	array( 
		'label'      => esc_html__( 'Fallback Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::COLOR,
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_twitter_embedded_follow_button a' 	=> 'color: {{VALUE}};',
		 ),
	 )
 );
 $this->add_group_control( 
	Group_Control_Text_Shadow::get_type(),
	array( 
		'name'     => 'fallback_text_shadow',
		'label'    => esc_html__( 'Fallback Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_follow_button',
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab(
	'fallback_text_style_hover_tab',
	[
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	]
);
$this->add_group_control( 
	Group_Control_Typography::get_type(),
	array( 
		'name'     => 'fallback_text_typography_hover',
		'label'    => esc_html__( 'Fallback Text Typography', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_follow_button a:hover',
	 )
 );
 $this->add_responsive_control( 
	'fallback_text_color_hover',
	array( 
		'label'      => esc_html__( 'Fallback Text Color', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::COLOR,
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_twitter_embedded_follow_button a:hover' 	=> 'color: {{VALUE}}; transition: 300ms;',
		 ),
	 )
 );
 $this->add_group_control( 
	Group_Control_Text_Shadow::get_type(),
	array( 
		'name'     => 'fallback_text_shadow_hover',
		'label'    => esc_html__( 'Fallback Text Shadow', 'wpmozo-addons-lite-for-elementor' ),
		'selector' => '{{WRAPPER}} .wpmozo_twitter_embedded_follow_button:hover',
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
 $this->end_controls_section();
//End Style Tab