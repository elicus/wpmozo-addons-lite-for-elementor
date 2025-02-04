<?php
/**
 * @author      Elicus <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2025 Elicus Technologies Private Limited
 * @version     1.0.1
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

use \Elementor\Widget_Base;
use \Elementor\Icons_Manager;

if ( !class_exists( 'WPMOZO_AE_Breadcrumb' ) ) {
	class WPMOZO_AE_Breadcrumb extends Widget_Base {
		/**
		 * Get widget name.
		 *
		 * Retrieve widget name.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget name.
		 */
		public function get_name() {
			return 'wpmozo_ae_breadcrumb';
		}

		/**
		 * Get widget title.
		 *
		 * Retrieve widget title.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget title.
		 */
		public function get_title() {
			return esc_html__( 'Breadcrumb', 'wpmozo-addons-lite-for-elementor' );
		}

		/**
		 * Get widget keyword list.
		 *
		 * Retrieve widget keywords.
		 *
		 * @since 1.4.0
		 * @access public
		 *
		 * @return array Widget keywords.
		 */
		public function get_keywords() {
			return array( 'wpmz breadcrumb navigation','wpmozo breadcrumb navigation' );
		}

		/**
		 * Get widget icon.
		 *
		 * Retrieve widget icon.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return string Widget icon.
		 */
		public function get_icon() {
			return 'wpmozo-ae-icon-breadcrumb wpmozo-ae-brandicon';
		}

		/**
		 * Get widget categories.
		 *
		 * Retrieve the list of categories the widget belongs to.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return array Widget categories.
		 */
		public function get_categories() {
			return array( 'wpmozo' );
		}

		/**
		 * Define Dependencies.
		 *
		 * Define the CSS files required to run the widget.
		 *
		 * @since 1.1.0
		 * @access public
		 *
		 * @return style handle.
		 */
		public function get_style_depends(){
			wp_register_style( 'wpmozo-ae-breadcrumb-style', plugins_url( 'assets/css/style.min.css', __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
			return array( 'wpmozo-ae-breadcrumb-style' );
		}

		/**
		 * Register widget controls.
		 *
		 * Adds different input fields to allow the user to change and customize the widget settings.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function register_controls() {
			// Seprate file containing all the code for registering controls.
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'breadcrumb/assets/controls/controls.php';
		}

		/**
		 * Render widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.1.0
		 * @access protected
		 */
		protected function render() {
			$settings          = $this->get_settings_for_display();
			$open_link         = $settings[ 'link_target' ];
			$home_link_text    = $settings[ 'custom_home_link_text' ];
			$display_icon_only = $settings[ 'display_only_icon_switcher' ];
			$breadcrumb_layout = $settings[ 'breadcrumb_layout' ];
			
			// Initialize opacity_range to null
			if ( 'yes' === $settings[ 'enable_opacity' ] && !empty( $settings[ 'opacity_slider' ][ 'size' ] ) ) {
				$opacity_range = $settings[ 'opacity_slider' ][ 'size' ];
			} else {
				$opacity_range = null;
			}
			$home_link_icon = !empty( $settings[ 'home_link_icon' ][ 'value' ] ) ? $settings[ 'home_link_icon' ] : null;
			$separator      = !empty( $settings[ 'separator_text' ] ) ? $settings[ 'separator_text' ] : '';
			$separator_icon = !empty( $settings[ 'separator_icon' ][ 'value' ] ) ? $settings[ 'separator_icon' ] : null;

			// Get the breadcrumb structure
			$this->get_breadcrumb( $separator, $separator_icon, $breadcrumb_layout, $open_link, $opacity_range, $home_link_text, $home_link_icon, $display_icon_only );
		}

		/**
		 * Get breadcrumb data for output.
		 *
		 * @since 1.1.0
		 * @access private
		 */
		private function get_breadcrumb( $separator, $separator_icon, $breadcrumb_layout, $open_link, $opacity_range, $home_link_text, $home_link_icon, $display_icon_only ) {
		    global $post;
		    ?>
		    <div class="wpmozo_breadcrumb">
		        <div class="wpmozo_breadcrumb_section">
		            <div class="wpmozo_breadcrumb_wrapper <?php echo esc_attr( $breadcrumb_layout ); ?>">
		                <ol class="wpmozo_breadcrumb_inner">
		    			<?php
		    				$parent_id  = $post->post_parent;
		    				$current_id = $post->ID;

		    				// Collect parent_pages
		    				$parent_pages = [  ];
		    				$num_parents  = 0;
		    				$opacity      = 1;

						    while ( $parent_id ) {
						        $page           = get_post( $parent_id );
						        $num_parents++;
						        $parent_pages[  ] = $page;
						        $parent_id      = $page->post_parent;
						    }

						    // Reverse parent_pages to display from root to parent
						    if ( !empty( $parent_pages ) ) {
						        $parent_pages = array_reverse( $parent_pages );


						        // Flag to exclude the first <li>
						        $exclude_first_li = true;
						        foreach ( $parent_pages as $index => $page ) {
						        	$this->add_render_attribute( 
					                	'breadcrumb_item', 
					                	array( 
					                		'class'  => array( 'breadcrumb_item', 'wpmozo_home_page' ), 
					                		'href'   => get_permalink( $page ), 
					                		'target' => $open_link,
					                	 )
					                );
						        $current_opacity = $opacity;
						        $opacity         = $opacity > $opacity_range ? ( $opacity - floatval( $opacity_range ) ) : $opacity;
						            if ( $index == 0 && !empty( $home_link_text ) ) {
						                // This is the first <li>, include the home link icon
						                ?>
						                <li style="opacity: <?php echo esc_attr( $current_opacity ); ?>;">
						                    <a <?php $this->print_render_attribute_string( 'breadcrumb_item' ); ?>>
						                        <span class="breadcrumb_page">
						                        	<span class="breadcrumb_home_icon">
						                        		<?php Icons_Manager::render_icon( $home_link_icon, [ 'aria-hidden' => 'true', 'class' => 'wpmozo_home_icon' ] ); ?>
						                        	</span> 
						                        	<?php echo 'yes' !== $display_icon_only ? esc_html( $home_link_text ) : ''; ?>
						                        </span>
						                    </a>
						                    <?php if( 'layout2' ===$breadcrumb_layout ){ ?>
							                    <span class="separator_item">
							                    	<?php if( !empty( $separator_icon ) ){ 
							                    		Icons_Manager::render_icon( $separator_icon, [ 'aria-hidden' => 'true', 'class' => 'wpmozo_separator_icon' ] ); 
							                    	} else { 
							                    		echo esc_html( $separator ); 
							                    	} ?>
							                    </span>
						                	<?php } ?>
						                </li>
						                <?php
						            } elseif ( $index == 0 && !empty( $home_link_icon ) ) {
						                // This is the first <li>, include the home link icon
						                ?>
						                <li style="opacity: <?php echo esc_attr( $current_opacity ); ?>;">
						                    <a <?php $this->print_render_attribute_string( 'breadcrumb_item' ); ?>>
						                        <span class="breadcrumb_page">
						                        	<span class="breadcrumb_home_icon">
						                        		<?php Icons_Manager::render_icon( $home_link_icon, [ 'aria-hidden' => 'true', 'class' => 'wpmozo_home_icon' ] ); ?>
						                        	</span>
						                        	<?php echo 'yes' !== $display_icon_only ? esc_html( get_the_title( $page ) ) : ''; ?>
						                        </span>
						                    </a>
						                    <?php if( 'layout2' === $breadcrumb_layout ) {?>
							                    <span class="separator_item">
							                    	<?php if( !empty( $separator_icon ) ){ 
							                    		Icons_Manager::render_icon( $separator_icon, [ 'aria-hidden' => 'true', 'class' => 'wpmozo_separator_icon' ] ); 
							                    	} else{ 
							                    		echo esc_html( $separator ); 
							                    	} ?>
							                    </span>
						                	<?php } ?>
						                </li>
						                <?php
						            } else {
						                // For other <li>s, render without the icon
						                ?>
						                <li style="opacity: <?php echo esc_attr( $current_opacity ); ?>;">
						                    <a <?php $this->print_render_attribute_string( 'breadcrumb_item' ); ?>>
						                        <span class="breadcrumb_page">
						                        	<?php echo esc_html( get_the_title( $page ) ); ?>
					                        	</span>
						                    </a>
						                   	<?php if( 'layout2' === $breadcrumb_layout ) {?>
							                    <span class="separator_item">
							                    	<?php if( !empty( $separator_icon ) ){ 
							                    		Icons_Manager::render_icon( $separator_icon, [ 'aria-hidden' => 'true', 'class' => 'wpmozo_separator_icon' ] ); 
							                    	} else{ 
							                    		echo esc_html( $separator ); 
							                    	} ?>
						                    	</span>
					                    	<?php } ?>
						                </li>
						                <?php
						            } 
						        }
						    }

						    // Add current page ( last page )
						    ?>
						    <li style="opacity: <?php echo esc_attr( $current_opacity ); ?>;">
						        <a class="breadcrumb_item wpmozo_last_page">
						            <span class="breadcrumb_page wpmozo_breadcrumb_last_page">
						            	<?php echo esc_html( get_the_title( $post ) ); ?>
						            </span>
						        </a>
						    </li>
		                </ol>
		            </div>
		        </div>
		    </div>
		    <?php
		}
	}
}