<?php
/**
 * @author      Elicus Technologies <hello@elicus.com>
 * @link        https://www.elicus.com/
 * @copyright   2024 Elicus Technologies Private Limited
 * @version     1.0.0
 */
class WPMOZO_Addons_Lite_For_Elementor_Public {

    public function init() {

        add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'], 99 );
        add_action( 'elementor/widgets/register', [$this, 'register_oembed_widget'], 99 );
        add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_frontend_styles' ] );
        add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ] );
    }

    /**
     * Register the styles
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function register_frontend_styles() {

        wp_register_style( 'wpmozo-ae-swiper-style', plugins_url( 'assets/css/swiper.min.css', plugin_dir_path( __FILE__ ) ) );
      
    }
    
    /**
     * Register the scripts
     *
     * @since 1.0.0
     *
     * @access public
     */
    public function register_frontend_scripts() {

        wp_register_script( 'wpmozo-ae-isotope', plugins_url( 'assets/js/isotope.pkgd.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

        wp_register_script( 'wpmozo-ae-imagesloaded', plugins_url( 'assets/js/imagesloaded.pkgd.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

        wp_register_script( 'wpmozo-ae-move-event', plugins_url( 'assets/js/jquery_event_move.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

        wp_register_script( 'wpmozo-ae-twenty-twenty', plugins_url( 'assets/js/jquery_twentytwenty.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

        wp_register_script( 'wpmozo-ae-mfp', plugins_url( 'assets/js/magnificPopup.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

        wp_register_script( 'wpmozo-ae-swiper', plugins_url( 'assets/js/swiper.min.js', plugin_dir_path( __FILE__) ), array( 'jquery' ), WPMOZO_ADDONS_LITE_FOR_ELEMENTOR_VERSION, false );

    }

    public function add_elementor_widget_categories( $elements_manager ) {

        $elements_manager->add_category(
            'wpmozo',
            [
                'title' => esc_html__( 'WPMozo', 'wpmozo-addons-lite-for-elementor-lite' ),
                'icon' => 'fa fa-plug',
            ]
        );

    }

    public function register_oembed_widget( $widgets_manager ) {

        $this->include_widgets();
        $widgets_manager->register(new \WPMOZO_AE_Before_After_Slider());
        $widgets_manager->register(new \WPMOZO_AE_Content_Toggle());
        $widgets_manager->register(new \WPMOZO_AE_Fancy_Heading());
        $widgets_manager->register(new \WPMOZO_AE_Fancy_Text());
        $widgets_manager->register(new \WPMOZO_AE_Flip_Box());
        $widgets_manager->register(new \WPMOZO_AE_Interactive_Image_Card());
        $widgets_manager->register(new \WPMOZO_AE_Logo_Slider());
        $widgets_manager->register(new \WPMOZO_AE_Masonry_Gallery());
        $widgets_manager->register(new \WPMOZO_AE_Pricing_Table());
        $widgets_manager->register(new \WPMOZO_AE_Tilt_Image());
    }

    public function include_widgets() {
        require_once plugin_dir_path( __DIR__ ) . '/widgets/before-after-slider/before-after-slider.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/content-toggle/content-toggle.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/fancy-heading/fancy-heading.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/fancy-text/fancy-text.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/flip-box/flip-box.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/interactive-image-card/interactive-image-card.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/logo-slider/logo-slider.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/masonry-gallery/masonry-gallery.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/pricing-table/pricing-table.php';
        require_once plugin_dir_path( __DIR__ ) . '/widgets/tilt-image/tilt-image.php';
    }

}