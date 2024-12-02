( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOLogoSlider = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                let $winWidth = $( window ).width();
                let $this = this.$element;
                if ( $this.find( ".elementor-widget-wpmozo_ae_logo_slider" ).length > 0 ) {
                    $this.find( ".elementor-widget-wpmozo_ae_logo_slider" ).each( function () {
                        let $arrows = $( this ).find( ".wpmozo_swiper_navigation" ).data();
                        if ( $arrows ) {
                            if ( $winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined" ) {
                                wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                $( this )
                                    .find( ".wpmozo_swiper_navigation" )
                                    .addClass( "wpmozo_arrows_" + $arrows.arrows_desktop );
                            }
                            if ( $winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined" ) {
                                wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                $( this )
                                    .find( ".wpmozo_swiper_navigation" )
                                    .addClass( "wpmozo_arrows_" + $arrows.arrows_tablet );
                            }
                            if ( $winWidth < 768 && typeof $arrows.arrows_phone !== "undefined" ) {
                                wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                $( this )
                                    .find( ".wpmozo_swiper_navigation" )
                                    .addClass( "wpmozo_arrows_" + $arrows.arrows_phone );
                            }
                            wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                            $( this )
                                .find( ".wpmozo_swiper_navigation" )
                                .addClass( "wpmozo_arrows_" + $arrows.arrows );
                        }
                    } );
                }
                $( window ).resize( function () {
                    let $winWidth = $( window ).width();
                    if ( $this.find( ".wpmozo_swiper_layout" ).length > 0 ) {
                        $this
                            .find( ".wpmozo_swiper_layout" )
                            .each( function () {
                                let $arrows = $( this ).find( ".wpmozo_swiper_navigation" ).data();
                                if ( $arrows ) {
                                    if ( $winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined" ) {
                                        wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_desktop );
                                    }
                                    if ( $winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined" ) {
                                        wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_tablet );
                                    }
                                    if ( $winWidth < 768 && typeof $arrows.arrows_phone !== "undefined" ) {
                                        wpmozo_ae_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_phone );
                                    }
                                }
                            } );
                    }
                } );
                function wpmozo_ae_get_arrows_classes() {
                    return [ 
                        "wpmozo_arrows_top_left",
                        "wpmozo_arrows_top_center",
                        "wpmozo_arrows_top_right",
                        "wpmozo_arrows_bottom_left",
                        "wpmozo_arrows_bottom_center",
                        "wpmozo_arrows_bottom_right",
                        "wpmozo_arrows_outside",
                        "wpmozo_arrows_inside",
                    ];
                }
                function wpmozo_ae_remove_arrows_classes( $element ) {
                    let $arrowClasses = wpmozo_ae_get_arrows_classes();
                    $element.removeClass( $arrowClasses.join( " " ) );
                }
                let a = $this;
                if( true === a.hasClass( "wpmozo_ae_equal_height" ) ){
                    let b = [  ];
                    let c = 0;
                    let d = a.find( ".swiper-wrapper" );
                    d.children().each( function(){
                        b[ c ] = $( this ).height();
                        c++;
                    } );
                    d.children().each( function(){
                        $( this ).height( Math.max.apply( Math,b ) );
                    } );
                }
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_logo_slider", WPMOZOLogoSlider );
    } );
} )( jQuery );