( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOTeamSlider = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                let $winWidth = $( window ).width(),
                $this = this.$element;

                if ( $this.find( '.wpmozo_team_link' ).length > 0 ) {
                            $this.on( 'click', '.wpmozo_team_link', function( e ) {
                                if ( $( e.target ).is( $( this ).find( '.wpmozo_ae_team_member_social_icon' ) ) ) {
                                    return;
                                }
                                e.preventDefault();
                                let link    = $( this ).data( 'link' ),
                                    target  = $( this ).data( 'link_target' );
                                window.open( link, target );
                            } );
                        }
                if ( $this.length > 0 ) {
                    $this.each( function () {
                            let $arrows = $( this ).find( ".wpmozo_swiper_navigation" ).data();
                            if ( $arrows ) {
                                if ( $winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined" ) {
                                    wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                    $( this )
                                        .find( ".wpmozo_swiper_navigation" )
                                        .addClass( "wpmozo_arrows_" + $arrows.arrows_desktop );
                                }
                                if ( $winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined" ) {
                                    wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                    $( this )
                                        .find( ".wpmozo_swiper_navigation" )
                                        .addClass( "wpmozo_arrows_" + $arrows.arrows_tablet );
                                }
                                if ( $winWidth < 768 && typeof $arrows.arrows_phone !== "undefined" ) {
                                    wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                    $( this )
                                        .find( ".wpmozo_swiper_navigation" )
                                        .addClass( "wpmozo_arrows_" + $arrows.arrows_phone );
                                }
                                wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
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
                                        wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_desktop );
                                    }
                                    if ( $winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined" ) {
                                        wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_tablet );
                                    }
                                    if ( $winWidth < 768 && typeof $arrows.arrows_phone !== "undefined" ) {
                                        wpmozo_remove_arrows_classes( $( this ).find( ".wpmozo_swiper_navigation" ) );
                                        $( this )
                                            .find( ".wpmozo_swiper_navigation" )
                                            .addClass( "wpmozo_arrows_" + $arrows.arrows_phone );
                                    }
                                }
                            } );
                    }
                } );
                function wpmozo_get_arrows_classes() {
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
                function wpmozo_remove_arrows_classes( $element ) {
                    let $arrowClasses = wpmozo_get_arrows_classes();
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
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_team_slider", WPMOZOTeamSlider );
    } );
} )( jQuery );
