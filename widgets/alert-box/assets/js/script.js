( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOAlertBox = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                const $this = this.$element.find('.wpmozo_alert_box');

                if (!$this.length) {
                    return;
                }
                $this.on('click', '.wpmozo_alert_box_close_btn', function (e) {
                    e.preventDefault();
                    $this.fadeOut();
                });          
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_alert_box", WPMOZOAlertBox );
    } );
} )( jQuery );
