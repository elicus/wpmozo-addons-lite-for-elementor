<?php
/**
 * The common settings of the plugin.
 *
 * Defines the settings od the plugin.
 *
 * @since      1.0.0
 * @author     Elicus <hello@elicus.com>
 */
class WPMOZO_Addons_Lite_For_Elementor_Settings {

    /**
     * Plugin option name.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string    $plugin_option    The plugin option name where all the settings are stored.
     */
    private $plugin_option;

    /**
     * License Key option.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $license_key_option The license key option name where all the license key is stored.
     */
    private $license_key_option = 'wpmozo_addons_lite_for_elementor_license_key';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param    string    $plugin_name     The name of this plugin.
     * @param    string    $version         The version of this plugin.
     */
    public function __construct( $plugin_option ) {
        $this->plugin_option = $plugin_option;
    }

    public function render( $type, $atts ) {
        switch ( $type ) {
            case 'licensefield':
                return $this->render_licensefield( $atts );
                break;
            default:
                return 'Please define a field type.';
        }
    }

    private function render_licensefield( $atts ) {
        $label       = $atts['label'];
        $name        = $atts['name'];
        $default     = $atts['default'];
        $info        = $atts['info'];
        $attrs       = isset( $atts['attrs'] )  ? $atts['attrs']  : '';

        $value = $default;

        $license_key = get_site_option( $this->license_key_option );
        if ( $license_key && '' !== $license_key ) {
            $value  = '********';
            $attrs['disabled'] = "disabled";
        }

        if ( is_array( $attrs ) ) {
            array_walk( $attrs, function( &$value, $key ) {
                $value = $key . '="'. $value .'"';
            });
            $attrs = implode( ' ', $attrs );
        }

        if ( $label ) { 
            $label_field = sprintf(
                '<div class="wpmozo_ae_panel_label_control">
                    <label for="%1$s">%2$s</label>
                </div>',
                $name,
                $label
            );
        }

        if ( '' === $value ) {
            $ab_disabled_class = '';
            $db_disabled_class = ' disabled';
        } else {
            $ab_disabled_class = ' disabled';
            $db_disabled_class = '';
        }

        return sprintf(
            '<div class="wpmozo_ae_panel_field wpmozo_ae_panel_licensefield">
                %1$s
                <div class="wpmozo_ae_panel_field_control">
                    <input type="text" id="%2$s" class="wpmozo_ae_panel_textfield" name="%2$s" data-license_key="%8$s" value="%3$s" %4$s />
                    <a href="javascript:void(0)" id="wpmozo_ae_panel_deactivate_license" class="wpmozo_ae_panel_button wpmozo_ae_panel_button_deactivate%5$s">Deactivate</a>
                    <a href="javascript:void(0)" id="wpmozo_ae_panel_activate_license" class="wpmozo_ae_panel_button wpmozo_ae_panel_button_activate%6$s">Activate</a>
                    <span class="wpmozo_ae_panel_license_response"></span>
                </div>
                <span class="wpmozo_ae_panel_settings_info">%7$s</span>
            </div>',
            $label_field,
            $name,
            $value,
            $attrs,
            $db_disabled_class,
            $ab_disabled_class,
            $info,
            $license_key
        );
    }
}