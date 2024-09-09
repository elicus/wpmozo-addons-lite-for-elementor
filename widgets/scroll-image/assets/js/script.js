( function ( $ ) {
    $( window ).on( 'elementor/frontend/init', function () {
        var WPMOZOScrollImage = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery( document ).ready( function( e ) {
                    e( "body" ).find( ".wpmozo_ae_scroll_image" ).length > 0 && e( ".wpmozo_ae_scroll_image" ).each( function() {
                        let t = e( this ).find( ".wpmozo_ae_scroll_image_wrapper" ),
                            a = t.find( ".wpmozo_ae_scroll_image_inner_wrapper" ).find( "img" ),
                            s = t.find( ".wpmozo_ae_scroll_image_inner_wrapper" ).data( "direction" ),
                            r = a.height(),
                            n = a.width(),
                            i = t.height(),
                            l = t.width(),
                            o = parseFloat( r ) - parseFloat( i ),
                            p = parseFloat( n ) - parseFloat( l );
                        "bottom" === s && r > i && a.css( "transform", "translateY( -" + o + "px )" ), "right" === s && n > l && a.css( "transform", "translateX( -" + p + "px )" ), t.on( "mouseenter mouseleave", function( t ) {
                            let a = e( this ),
                                s = a.find( ".wpmozo_ae_scroll_image_inner_wrapper" ).find( "img" ),
                                r = a.find( ".wpmozo_ae_scroll_image_inner_wrapper" ).data( "direction" ),
                                n = s.height(),
                                i = s.width(),
                                l = a.height(),
                                o = a.width(),
                                p = parseFloat( n ) - parseFloat( l ),
                                m = parseFloat( i ) - parseFloat( o );
                            switch ( r ) {
                                case "top":
                                    "mouseenter" === t.type && n > l && s.css( "transform", "translateY( -" + p + "px )" ), "mouseleave" === t.type && s.css( "transform", "translateY( 0 )" );
                                    break;
                                case "bottom":
                                    "mouseenter" === t.type && s.css( "transform", "translateY( 0 )" ), "mouseleave" === t.type && n > l && s.css( "transform", "translateY( -" + p + "px )" );
                                    break;
                                case "left":
                                    "mouseenter" === t.type && i > o && s.css( "transform", "translateX( -" + m + "px )" ), "mouseleave" === t.type && s.css( "transform", "translateX( 0 )" );
                                    break;
                                case "right":
                                    "mouseenter" === t.type && s.css( "transform", "translateX( 0 )" ), "mouseleave" === t.type && i > o && s.css( "transform", "translateX( -" + m + "px )" )
                            }
                        } )
                    } )
                } );
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( 'wpmozo_ae_scroll_image', WPMOZOScrollImage );
    } );
} )( jQuery );