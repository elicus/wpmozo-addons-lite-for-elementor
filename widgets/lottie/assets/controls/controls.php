<?php
// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use \Elementor\Utils;
use \Elementor\Controls_Manager;

// Configuration section starts here.
$this->start_controls_section( 
	'configuration',
	array( 
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);

    $this->add_control(
        'url',
            array(
                'label' => esc_html__( 'Upload json', 'wpmozo-addons-lite-for-elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => Utils::get_placeholder_image_src(),
                ),
                'media_types' => array('application/json'),
                'render_type' => 'template',
            )
    );
    $this->add_responsive_control( 
		'animation_trigger',
		array( 
			'label'       => esc_html__( 'Animation Trigger', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'autoplay' 	=> esc_html__( 'Autoplay', 'wpmozo-addons-lite-for-elementor' ),
                'hover'     => esc_html__( 'Hover', 'wpmozo-addons-lite-for-elementor' ),
                'click'     => esc_html__( 'Click', 'wpmozo-addons-lite-for-elementor' ),
			 ),
			'default'      => 'autoplay',
             'render_type' => 'template',
		 )
    );
    $this->add_responsive_control( 
		'direction',
		array( 
			'label'       => esc_html__( 'Direction', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array( 
				'1'  => esc_html__( 'Normal', 'wpmozo-addons-lite-for-elementor' ),
                '-1' => esc_html__( 'Reverse', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'      => '1',
             'render_type' => 'template',
		 )
	 );
     $this->add_control(
        'loop',
        [
            'label'        => esc_html__( 'Loop', 'wpmozo-addons-lite-for-elementor' ),
            'type'         => Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'wpmozo-addons-lite-for-elementor' ),
            'label_off'    => esc_html__( 'No', 'wpmozo-addons-lite-for-elementor' ),
            'return_value' => 'yes',
            'default'      => 'yes',
            'render_type'  => 'template',
        ]
    );
    $this->add_control(
        'speed',
        array(
            'label'      => esc_html__( 'Animation Speed', 'wpmozo-addons-lite-for-elementor' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => array( 'px' ),
            'range' => array(
                'px' => array(
                    'min'  => 0.1,
                    'max'  => 6,
                    'step' => 0.1,
                ),
              
            ),
            'default' => array(
                'unit' => 'px',
                'size' => 1,
            ),
            'render_type' => 'template',
        )
    );
$this->end_controls_section();