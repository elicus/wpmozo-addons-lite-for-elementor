<?php

/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */

//if this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( ! class_exists( 'WPMOZO_AE_Price_List' ) ) {
	class WPMOZO_AE_Price_List extends Widget_Base
	{

		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget name.
		 */

		public function get_name()
		{
			return 'wpmozo_ae_price_list';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget title.
		 */

		public function get_title()
		{
			return esc_html__( 'Price List', 'wpmozo-addons-for-elementor' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */

		public function get_icon()
		{
			return 'wpmozo-ae-icon-price-list  wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */

		public function get_categories()
		{
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since 1.0.0
		 * @access public
		 *
		 * @return style handle.
		 */

		public function get_style_depends()
		{
			wp_register_style( 'wpmozo-ae-price-list-style', plugins_url( 'assets/css/style.min.css', __FILE__ ) );

			return array( 'wpmozo-ae-price-list-style', 'wpmozo-ae-swiper-style', 'wpmozo-ae-font-awesome-style' );
		}


		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.0.0
		 * @access protected
		 */

		protected function register_controls()
		{
			//Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'price-list/assets/controls/controls.php';
		}


		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *( 
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {
			$settings                	= $this->get_settings_for_display();
			$items_content      		= isset( $settings[ 'wpmozo_items_content' ] ) ? $settings[ 'wpmozo_items_content' ] : [];
			$layout                  	= wpmozo_ae_validate_layout( $settings[ 'price_list_layout' ], array( 'layout1', 'layout2' ) );
			$heading_level              = wpmozo_ae_validate_heading_level( $settings[ 'heading_level' ], array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ) );
			$currency_symbol_position	= $settings[ 'currency_symbol_position' ];
			$icon_shape         		= isset( $settings[ 'icon_shape' ] ) ? $settings[ 'icon_shape' ] : '';
			$number_of_columns 			= isset( $settings[ 'number_of_columns' ] ) ? $settings[ 'number_of_columns' ] : '';
			?>
			<div class="wpmozo_price_list">
			<?php if ( 'layout1' === $layout ) { 
				if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . "price-list/assets/layouts/$layout.php" ) ) {
					include plugin_dir_path( dirname( __FILE__ ) ) . "price-list/assets/layouts/$layout.php";
				}
			 }elseif ( 'layout2' === $layout ) { 
				if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . "price-list/assets/layouts/$layout.php" ) ) {
					include plugin_dir_path( dirname( __FILE__ ) ) . "price-list/assets/layouts/$layout.php";
				}
			  } ?>
			</div>
		<?php	
		}			
	}
}
