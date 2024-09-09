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
if ( ! class_exists( 'WPMOZO_AE_Text_Animator' ) ) {
    class WPMOZO_AE_Text_Animator extends Widget_Base {
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
            return 'wpmozo_ae_text_animator';
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
            return esc_html__( 'Text Animator', 'wpmozo-addons-lite-for-elementor' );
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
            return 'wpmozo-ae-icon-text-animator1 wpmozo-ae-brandicon';
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
            wp_register_style( 'wpmozo-ae-text-animator-style', plugins_url( 'assets/css/style.min.css' , __FILE__ ), null, WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION );
            return array( 'wpmozo-ae-text-animator-style' );
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
            wp_register_script( 'wpmozo-ae-text-animator', plugins_url( 'assets/js/script.min.js', __FILE__ ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, true );
            return array( 'wpmozo-ae-text-animator' );
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
            include_once plugin_dir_path( __DIR__ ) . 'text-animator/assets/controls/controls.php';
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
            $settings        = $this->get_settings_for_display();
            $widget_id       = $this->get_id();

            $pre_text        = $settings[ 'prefix_text' ];
            $content_text    = explode( '|',$settings[ 'animated_text' ] );
            $post_text       = $settings[ 'postfix_text' ];
            $animation_type  = $settings[ 'animation_type' ];   
            $heading_level   = $settings[ 'display_tag' ];      
            $animation_delay = '' !== $settings[ 'animations_delay' ] ? $settings[ 'animations_delay' ][ 'size' ] : 0;
            $animation_time  = ( isset( $settings[ 'animation_time' ] ) && '' !== $settings[ 'animation_time' ] ) ? $settings[ 'animation_time' ][ 'size' ] : 500;
            $typing_speed    = ( isset( $settings[ 'typing_time' ] ) && '' !== $settings[ 'typing_time' ] ) ? $settings[ 'typing_time' ][ 'size' ] : 100;
            $erasing_speed   = ( isset( $settings[ 'erasing_time' ] ) && '' !== $settings[ 'erasing_time' ] ) ? $settings[ 'erasing_time' ][ 'size' ] : 100;
            $stop_animation  = '' !== $settings[ 'animation_on_hover' ] ? 'on' : 'off';
            ?> 
                <div class="wpmozo_ae_text_animator wpmozo_animated_text_wrapper wpmozo_text_animator_<?php echo esc_attr( $widget_id ); ?>">                
                        <<?php echo esc_attr( $heading_level ); ?> class="wpmozo-<?php echo esc_attr( $animation_type ); ?>">
                            <span class="wpmozo_pre_text_wrapper wpmozo_pre_post"><?php echo wp_kses_post( $pre_text ); ?></span>
                            <span class="wpmozo_animated_text wpmozo_main_part" 
                                data-wait-time=<?php echo esc_attr( $animation_delay ); ?> 
                                data-animation-time="<?php echo esc_attr( $animation_time ); ?>" 
                                <?php echo 'typing' === $animation_type ?  'data-typing-time="'. esc_attr( $typing_speed ).'"' : '' ; 
                                echo 'typing' === $animation_type ?  ' data-erasing-time='. esc_attr( $erasing_speed ) : '' ; ?> data-text="<?php echo esc_attr( $settings[ 'animated_text' ] ); ?>" data-stop-animation-on-hover="<?php echo esc_attr( $stop_animation ); ?>">
                                
                                    <?php echo wp_kses_post( $content_text[ 0 ] ); ?>
                                    
                                </span>
                            <span class="wpmozo_post_text_wrapper wpmozo_pre_post"><?php echo wp_kses_post( $post_text ); ?></span>
                        </<?php echo esc_attr( $heading_level ); ?>>
                </div>
            <?php
        }
    }
}