(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOBackgroundSwitcher = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery( document ).ready( function($) {
                    $( this ).find( '.wpmozo_background_switcher_item:first-child' ).addClass( 'wpmozo_bg_switcher_hover' );
                    // Image as switcher background.
                    $( document ).on( {
                        mouseenter: function () {
                            $( this ).parent().find( '.wpmozo_background_switcher_item' ).removeClass( 'wpmozo_bg_switcher_hover' );
                            $( this ).addClass( 'wpmozo_bg_switcher_hover' );
                        },
                        mouseleave: function () {
                            // Do nothing on mouse leave.
                        }
                    }, '.wpmozo_background_switcher_item' );
                
                } ); // Over Document ready.                
            },
        });
        elementorFrontend.elementsHandler.attachHandler(
            "wpmozo_ae_background_switcher",
            WPMOZOBackgroundSwitcher
        );
    });
})(jQuery);
