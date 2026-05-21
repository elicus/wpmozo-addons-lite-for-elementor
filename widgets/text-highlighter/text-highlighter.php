<?php
/**
 * @author    Elicus <hello@elicus.com>
 * @link      https://www.elicus.com/
 * @copyright 2023 Elicus Technologies Private Limited
 * @version   1.0.0
 */

// if this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

use Elementor\Widget_Base;

if ( ! class_exists( 'WPMOZO_AE_Text_Highlighter' ) ) {
    class WPMOZO_AE_Text_Highlighter extends Widget_Base {
        /**
         * Get widget name.
         *
         * Retrieve widget name.
         *
         * @since  1.0.0
         * @access public
         *
         * @return string Widget name.
         */
        public function get_name() {
            return 'wpmozo_ae_text_highlighter';
        }

        /**
         * Get widget title.
         *
         * Retrieve widget title.
         *
         * @since  1.0.0
         * @access public
         *
         * @return string Widget title.
         */
        public function get_title() {
            return esc_html__( 'Text Highlighter', 'wpmozo-addons-lite-for-elementor' );
        }

        /**
         * Get widget icon.
         *
         * Retrieve widget icon.
         *
         * @since  1.0.0
         * @access public
         *
         * @return string Widget icon.
         */
        public function get_icon() {
            return 'wpmozo-ae-icon-text-highlighter wpmozo-ae-brandicon';
        }

        /**
         * Get widget categories.
         *
         * Retrieve the list of categories the widget belongs to.
         *
         * @since  1.0.0
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
         * @since  1.0.0
         * @access public
         *
         * @return style handle.
         */
        public function get_style_depends() {
            wp_register_style( 'wpmozo-ae-text-highlighter-style', plugins_url( 'assets/css/style.min.css' , __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
            return array( 'wpmozo-ae-text-highlighter-style' );
        }

        /**
         * Get script dependencies.
         *
         * Retrieve the list of script dependencies the element requires.
         *
         * @since  1.3.0
         * @access public
         *
         * @return array Element scripts dependencies.
         */
        public function get_script_depends() {
            wp_register_script( 'wpmozo-ae-custom-text-highlighter', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
            return array( 'wpmozo-ae-twenty-twenty' , 'wpmozo-ae-waypoints', 'wpmozo-ae-custom-text-highlighter' );
        }

        /**
         * Register widget controls.s
         *
         * Adds different input fields to allow the user to change and customize the widget settings.
         *
         * @since  1.0.0
         * @access protected
         */
        protected function register_controls() {
            // Seprate file containing all the code for registering controls.
            include_once plugin_dir_path( __DIR__ ) . 'text-highlighter/assets/controls/controls.php';
        }

        /**
         * Render widget output on the frontend.
         *
         * Written in PHP and used to generate the final HTML.
         *
         * @since  1.0.0
         * @access protected
         */
        protected function render() {
            $settings               = $this->get_settings_for_display();
            $pre_text               = $settings[ 'pre' ];
            $post_text              = $settings[ 'post' ];
            $widget_id              = $this->get_id();
            $content_text           = $settings[ 'content' ];
            $heading_level          = wpmozo_ae_validate_heading_level( $settings[ 'global_heading_level' ] ); 
            $highlighter_shape      = $settings[ 'highlighter_shape' ];   
            $display_in_stack_class = "";
            if ( 'yes' === $settings[ 'display_in_stack' ] ) {
                $display_in_stack_class = "wpmozo_text_highlighter_stack";
            }        
            $wrap_in_heading_tag = $settings[ 'wrap_in_heading_tag' ];
            if ( '' !== $pre_text ) {
                $this->add_inline_editing_attributes( 'pre', 'none' );
                $this->add_render_attribute( 'pre', 'class', 'wpmozo_text_highlighter_pre_inner_wrapper' );
            }
            if ( '' !== $content_text ) {
                $this->add_inline_editing_attributes( 'content', 'none' );
                $this->add_render_attribute( 'content', 'class', 'wpmozo_text_highlighted_content' );
            }
            if ( '' !== $post_text ) {
                $this->add_inline_editing_attributes( 'post', 'none' );
                $this->add_render_attribute( 'post', 'class', 'wpmozo_text_highlighter_post_inner_wrapper' );
            }
            ?> 
                <div class="wpmozo_text_highlighter <?php echo esc_attr( $display_in_stack_class ); ?> wpmozo_text_highlighter_<?php echo esc_attr( $widget_id ); ?>">                
                    <div class="wpmozo_text_highlighter_wrapper wpmozo_highlighter_heading wpmozo_highlight_<?php echo esc_attr( $highlighter_shape ); ?>">
                        <?php if ( 'yes' === $wrap_in_heading_tag ) : ?>
                        <<?php echo esc_attr( $heading_level ); ?> class="wpmozo_text_highlighter_title">
                        <?php endif; ?>
                            <span <?php $this->print_render_attribute_string( 'pre' ); ?>><?php echo esc_attr( $pre_text ); ?></span>
                            <span class="wpmozo_text_highlighter_inner_wrapper">
                                <span <?php $this->print_render_attribute_string( 'content' ); ?>><?php echo esc_attr( $content_text ); ?></span>
                                <?php if ( 'zig_zag' === $highlighter_shape ) : ?>   
                                    <svg version="1.1" style="enable-background:new 0 0 175.3 17.9;"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 175.3 17.9" style="enable-background:new 0 0 175.3 17.9;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M4,9.3c0,0,106.8-8.9,167.2-1.9c0,0-91.1-0.4-114.6,3.8c0,0,37-1.7,55.2,1.9" ></path></svg>
                                <?php endif; ?>
                                <?php if ( 'underline' === $highlighter_shape ) : ?>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 167.7 12" style="enable-background:new 0 0 167.7 12;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M3.8,8c0,0,116.5-7.5,160.1-1.8" ></path></svg>
                                <?php endif; ?>
                                <?php if( 'double_underline' === $highlighter_shape ) : ?>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 176.4 15.3" style="enable-background:new 0 0 176.4 15.3;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M3.7,8.4c0,0,112.2-9,169.3-3.1" ></path><path class="st0" d="M12.7,12.2c0,0,92.8-8,149.9-2.7" ></path></svg>
                                <?php endif; ?>
                                <?php if ( 'circle' === $highlighter_shape ) : ?>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 175.3 58.4" style="enable-background:new 0 0 175.3 58.4;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M121.8,14.8c0,0-118.8-0.3-118.8,21c0,24.8,167,24.9,169.3-4.3c1.8-23.4-87.2-27-87.2-27" ></path></svg>
                                <?php endif; ?>
                                <?php if ( 'diagonal' === $highlighter_shape ) : ?>
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 170.4 37.6" style="enable-background:new 0 0 170.4 37.6;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M4.8,32.1c0,0,105.8-29.6,160.9-26.3" ></path></svg>
                                <?php endif; ?>
                                <?php if ( 'cross' === $highlighter_shape ) : ?>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 176.9 50.8" style="enable-background:new 0 0 176.9 50.8;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#000000;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M3.9,9.3l160.8,34.1 M172,7C136.6,10,14.9,39.9,14.9,39.9" ></path></svg>
                                <?php endif; ?>
                                <?php if ( 'curly_line' === $highlighter_shape ) : ?>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 183.1 23.4" style="enable-background:new 0 0 183.1 23.4;" xml:space="preserve"><style type="text/css">.st0{fill:none;stroke:#231F20;stroke-width:2.5;stroke-linecap:round;stroke-linejoin:round;}</style><path class="st0" d="M3.5,18.2c0,0,10.9-11.5,22.1-11.5c13.5,0,14.5,10.1,23.8,10.7C61.5,18.2,65.1,5.3,79.4,6c12.9,0.7,13.1,10.2,23.1,11.3S119.5,4.8,132,5.3s13.9,13.3,27.9,12.1c8.2-0.6,15.5-5.1,19.7-12.1" ></path></svg>
                                <?php endif; ?>
                            </span>
                            <span <?php $this->print_render_attribute_string( 'post' ); ?>><?php echo esc_attr( $post_text ); ?></span>
                        <?php if( 'yes' === $wrap_in_heading_tag ) : ?>
                        </<?php echo esc_attr( $heading_level ); ?>>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
        }
    }
}