<?php
/**
 * Registers all the controls for the Facebook Comments widget in WPMozo, enabling customization of comment settings in Elementor.
 *
 * This widget allows users to embed Facebook comments on their website, with options for layout, language, and moderation.
 *
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2024 Elicus Technologies Private Limited
 * @version   1.4.0
 * @package   WPMOZO Lite
 */

use Elementor\Controls_Manager;

/* Configuration controls start here */
$this->start_controls_section(
	'configuration',
	array(
		'label' => esc_html__( 'Configuration', 'wpmozo-addons-lite-for-elementor' ),
		'tab'   => Controls_Manager::TAB_CONTENT,
	)
);
	$this->add_control(
		'facebook_app_id',
		array(
			'label'       => esc_html__( 'Facebook APP ID', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'required'    => true,
			'render_type' => 'template',
			'label_block' => true,
			/*'description'     => esc_html__( 'Here you can enter the facebook app id for the facebook modules. You can use a single app id for all facebook modules and it can be saved in the plugin', 'wpmozo-addons-lite-for-elementor' ) . ' ' . '<a href="' . esc_url( admin_url( '/admin.php?page=wpmozo-addons-for-elementor&tab=integration' ) ) . '" title="' . esc_html__( 'WPMOZO Addons For Elementor Settings', 'wpmozo-addons-lite-for-elementor' ) . '" target="_blank">' . esc_html__( 'settings', 'wpmozo-addons-lite-for-elementor' ) . '</a> ' .esc_html__( 'page. Or if you want to use different app id for each facebook module then you can enter here. Click', 'wpmozo-addons-lite-for-elementor' ) . ' ' .'<a href="' . esc_url( 'https://developers.facebook.com/apps/' ) . '" title="' . esc_html__( 'Facebook APP', 'wpmozo-addons-lite-for-elementor' ) . '" target="_blank">' . esc_html__( 'here', 'wpmozo-addons-lite-for-elementor' ) . '</a> ' .esc_html__( 'to create one.', 'wpmozo-addons-lite-for-elementor' ),*/
		)
	);
	$this->add_control(
		'page_url',
		array(
			'label'       => esc_html__( 'Page URL', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::TEXT,
			'label_block' => true,
			'dynamic'     => array(
				'active' => true,
			),
		)
	);
	$this->add_control(
		'num_posts',
		array(
			'label'       => esc_html__( 'Number of Comments', 'wpmozo-addons-lite-for-elementor' ),
			'type'        => Controls_Manager::NUMBER,
			'placeholder' => esc_html__( '10', 'wpmozo-addons-lite-for-elementor' ),
		)
	);
	$this->add_responsive_control(
		'order_by',
		array(
			'label'       => esc_html__( 'Order By', 'wpmozo-addons-lite-for-elementor' ),
			'label_block' => false,
			'type'        => Controls_Manager::SELECT,
			'options'     => array(
				'social'       => esc_html__( 'Top', 'wpmozo-addons-lite-for-elementor' ),
				'reverse_time' => esc_html__( 'Newest', 'wpmozo-addons-lite-for-elementor' ),
				'time'         => esc_html__( 'Oldest', 'wpmozo-addons-lite-for-elementor' ),
			),
			'default'     => 'social',
		)
	);
	$this->add_control(
		'lazy_loading',
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
