<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;

// Start Content Tab.
$this->start_controls_section( 
	'configuration_setting',
	array( 
		'label'		  => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	  => Controls_Manager::TAB_CONTENT,
	 )
 );
 $this->add_control( 
	'tweet_id',
	array( 
		'label'       => esc_html__( 'Tweet ID', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::TEXT,
		'label_block' => true,
	 )
 );
 $this->add_control( 
	'content',
	array( 
		'label'       => esc_html__( 'Fallback Content', 'wpmozo-addons-lite-for-elementor' ),
		'type'        => Controls_Manager::WYSIWYG,
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
	'cards',
	array( 
		'label'        => __( 'Cards', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'yes',
		'return_value' => 'yes',
	 )
 );
 $this->add_control( 
	'conversation',
	array( 
		'label'        => __( 'Conversation', 'wpmozo-addons-lite-for-elementor' ),
		'type'         => Controls_Manager::SWITCHER,
		'default'      => 'yes',
		'return_value' => 'yes',
	 )
 );
 $this->add_control( 
	 'theme',
	 array( 
		 'label'   => esc_html__( 'Theme', 'wpmozo-addons-lite-for-elementor' ),
		 'type'    => Controls_Manager::SELECT,
		 'default' => 'light',
		 'options' => array( 
			 'light'    => esc_html__( 'Light', 'wpmozo-addons-lite-for-elementor' ),
			 'dark' 	=> esc_html__( 'Dark', 'wpmozo-addons-lite-for-elementor' ),
		  ),
	  )
  );
  $this->add_responsive_control( 
	'tweet_max_width',
	array( 
		'label'          => esc_html__( 'Max Width', 'wpmozo-addons-lite-for-elementor' ),
		'type'           => Controls_Manager::SLIDER,
		'size_units'     => array( 'px' ),
		'range'          => array( 
			'px' => array( 
				'min'   => 250,
				'max'   => 550,
				'step'  => 1,
			 ),
		 ),
		'default'        => array( 
			'unit' => 'px',
			'size' => 350,
		 ),
		'selectors'      => array( 
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper' => 'width: {{SIZE}}{{UNIT}};',
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
		'type'    		=> Controls_Manager::CHOOSE,
		'label'   		=> esc_html__( 'Alignment', 'wpmozo-addons-lite-for-elementor' ),
		'options' 		=> array( 
			'left' 			=> array( 
				'title' 		=> esc_html__( 'Left', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  		=> 'eicon-h-align-left',
			 ),
			'center' 		=> array( 
				'title' 		=> esc_html__( 'Center', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  		=> 'eicon-h-align-center',
			 ),
			'right' 		=> array( 
				'title' 		=> esc_html__( 'Right', 'wpmozo-addons-lite-for-elementor' ),
				'icon'  		=> 'eicon-h-align-right',
			 ),
		 ),
		'default' 		=> 'left',
		'toggle'  		=> true,
		'prefix_class' 	=> 'wpmozo_',
		'selectors' 	=> array( 
			'{{WRAPPER}}.wpmozo_center .wpmozo_twitter_embedded_tweet_wrapper' 	=> 'margin-left: auto; margin-right: auto;',
			'{{WRAPPER}}.wpmozo_right .wpmozo_twitter_embedded_tweet_wrapper' 	=> 'margin-left: auto;',
		 ),
	 )
 );
 $this->end_controls_section();
$this->start_controls_section( 
	'border',
	array( 
		'label' 	=> esc_html__( 'Tweet', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   	=> Controls_Manager::TAB_STYLE,
	 )
 );
 $this->start_controls_tabs(
	'border_style_tabs'
);
$this->start_controls_tab(
	'border_style_normal_tab',
	[
		'label' => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
	]
);
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'      => 'tweet_border',
		'label'     => esc_html__( 'Tweet Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper',
	 )
 );
 $this->add_responsive_control( 
	'tweet_border_radius',
	array( 
		'label'      => esc_html__( 'Tweet Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'separator'  => 'after',
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition: all 300ms; overflow:hidden;',
			'{{WRAPPER}} .tweeter-tweet .wpmozo_twitter_embedded_tweet_wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};transition: all 300ms; overflow:hidden;',
		 ),
	 )
 );
$this->end_controls_tab();
$this->start_controls_tab(
	'border_style_hover_tab',
	[
		'label' => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
	]
);
$this->add_group_control( 
	Group_Control_Border::get_type(),
	array( 
		'name'      => 'tweet_border_hover',
		'label'     => esc_html__( 'Tweet Border', 'wpmozo-addons-lite-for-elementor' ),
		'selector'  => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper:hover',
	 )
 );
 $this->add_responsive_control( 
	'tweer=t_border_radius_hover',
	array( 
		'label'      => esc_html__( 'Tweet Border Radius', 'wpmozo-addons-lite-for-elementor' ),
		'type'       => Controls_Manager::DIMENSIONS,
		'size_units' => array( 'px', 'em', '%' ),
		'separator'  => 'after',
		'selectors'  => array( 
			'{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		 ),
	 )
 );
$this->end_controls_tab();
$this->end_controls_tabs();
	$this->add_group_control( 
		Group_Control_Box_Shadow::get_type(),
		array( 
			'name'      => 'tweet_box_shadow',
			'selector'  => '{{WRAPPER}} .wpmozo_twitter_embedded_tweet_wrapper',
		 )
	 );
$this->end_controls_section();
//End Style Tab