<?php
use \Elementor\Controls_Manager;

/* Configuration controls start here */
$this->start_controls_section( 'configuration',
        array( 
            'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        )
    );
	$this->add_control( 
        'facebook_app_id',
        array( 
            'label'         => esc_html__( 'Facebook APP ID', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::TEXT,
            'label_block'   => true,
			/*'description' 	=> esc_html__( 'Here you can enter the facebook app id for the facebook modules. You can use a single app id for all facebook modules and it can be saved in the plugin', 'wpmozo-addons-lite-for-elementor' ) . ' ' .
								'<a href="' . esc_url( admin_url( '/admin.php?page=wpmozo-addons-for-elementor&tab=integration' ) ) . 
								'" title="' . esc_html__( 'WPMOZO Addons For Elementor Settings', 'wpmozo-addons-lite-for-elementor' ) . 
								'" target="_blank">' . esc_html__( 'settings', 'wpmozo-addons-lite-for-elementor' ) . '</a> ' .
								esc_html__( 'page. Or if you want to use different app id for each facebook module then you can enter here. Click', 'wpmozo-addons-lite-for-elementor' ) . ' ' .
								'<a href="' . esc_url( 'https://developers.facebook.com/apps/' ) . 
								'" title="' . esc_html__( 'Facebook APP', 'wpmozo-addons-lite-for-elementor' ) . 
								'" target="_blank">' . esc_html__( 'here', 'wpmozo-addons-lite-for-elementor' ) . '</a> ' .
								esc_html__( 'to create one.', 'wpmozo-addons-lite-for-elementor' ),*/
        )
    );
	$this->add_control( 
        'page_url',
        array( 
            'label'         => esc_html__( 'Page URL', 'wpmozo-addons-lite-for-elementor' ),
            'type'          => Controls_Manager::TEXT,
            'label_block'   => true,
			'dynamic'		=> array(
				'active' => true,
			),
        )
    );
	$this->add_control( 'lazy_loading',
		array( 
			'label'        => esc_html__( 'Enable lazy loading', 'wpmozo-addons-lite-for-elementor' ),
			'type'         => Controls_Manager::SWITCHER,
			'label_off'    => esc_html__( 'NO', 'wpmozo-addons-lite-for-elementor' ),
			'label_on'     => esc_html__( 'YES', 'wpmozo-addons-lite-for-elementor' ),
			'return_value' => 'yes',
			'default'      => '',
		)
	);

$this->end_controls_section();


/* Display controls start here */
$this->start_controls_section( 'display',
        array( 
            'label' => esc_html__( 'Display', 'wpmozo-addons-lite-for-elementor' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        )
    );
    $this->add_responsive_control( 'button_layout',
        array( 
            'label'       => esc_html__( 'Layout', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'button'		=> esc_html__( 'Button', 'wpmozo-addons-lite-for-elementor' ),
                'button_count' 	=> esc_html__( 'Button Count', 'wpmozo-addons-lite-for-elementor' ),
                'box_count' 	=> esc_html__( 'Box Count', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'   => 'button',
        )
    );
    $this->add_responsive_control( 'button_size',
        array( 
            'label'       => esc_html__( 'Size', 'wpmozo-addons-lite-for-elementor' ),
            'label_block' => false,
            'type'        => Controls_Manager::SELECT,
            'options'     => array( 
                'small'		=> esc_html__( 'Small', 'wpmozo-addons-lite-for-elementor' ),
                'large'		=> esc_html__( 'Large', 'wpmozo-addons-lite-for-elementor' ),
            ),
            'default'     => 'small',
        )
    );
$this->end_controls_section();