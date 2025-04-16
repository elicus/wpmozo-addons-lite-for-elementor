( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOMysteryImage = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {

                const $this = this.$element;
                if ( $this.find( '.wpmozo_mystery_image' ).length > 0 ) {
                    $this.find( '.wpmozo_mystery_image' ).each( function() {
                        if ( $this.find( '.wpmozo_mystery_image_lightbox' ).length > 0 ) {

                            const $orderClass = $(this).prop('class').match(/(wpmozo_mystery_image\_[^\s]*)/)[0] + '_lightbox';
                            var $widget_id = "elementor-element-" + $this.closest(".elementor-widget-wpmozo_ae_mystery_image").data("id");
                            let $effect    = $(this).find( '.wpmozo_mystery_image_lightbox' ).data('lightbox_effect'),
                                $zoom      = 'zoom' === $effect ? true : false,
                                $duration  = 'none' !== $effect ? parseInt( $(this).find( '.wpmozo_mystery_image_lightbox' ).data( 'lightbox_transition_duration' ) ) : 0,
                                $mainClass = 'elementor-element mfp-img-mobile ' + $widget_id + ' wpmozo_mystery_image_lightbox ' + $orderClass + ' wpmozo_mfp_' + $effect;

                            $(this).magnificPopup({
                                delegate: 'a.wpmozo_mystery_image_lightbox',
                                type: 'image',
                                closeOnContentClick: false,
                                closeBtnInside: false,
                                mainClass: $mainClass,
                                removalDelay: $duration,
                                prependTo: $this.closest( ".elementor" ),
                                zoom: {
                                    enabled: $zoom,
                                    duration: $duration
                                },
                                gallery: { enabled: false },
                                image: {
                                    markup: '<div class="mfp-figure">' +
                                                '<div class="mfp-close"></div>' +
                                                '<div class="mfp-img"></div>' +
                                            '</div>',
                                    tError: '<a href="%url%">The image</a> could not be loaded.',
                                },
                            } );
                        }
                    } );
                }
            },
        });
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_mystery_image", WPMOZOMysteryImage);
    });
} )( jQuery );