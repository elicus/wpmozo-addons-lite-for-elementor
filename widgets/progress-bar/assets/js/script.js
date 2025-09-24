( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOProgressBar = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery( document ).ready( function($) {
                    if ( $( '.wpmozo_progress_bar' ).length > 0 ) {
                        $( window ).on( 'scroll', wpmozoInitUpdateProgressBars );
                        wpmozoInitUpdateProgressBars();
                    }
                } );
                
                // Init update progress bar.
                function wpmozoInitUpdateProgressBars() {
                    jQuery( '.wpmozo_progress_bar' ).each( function() {
                
                        let thisObj = jQuery( this ),
                            wrapObj = thisObj.find( '.wpmozo_progress_bar_wrapper' ),
                            $bar    = thisObj.find( '.wpmozo_progress_bar_inner' );
                
                        let direction    = wrapObj.data( 'bar_direction' ) || 'horizontal';
                
                        let scrollTop    = jQuery( window ).scrollTop(),
                            scrollHeight = jQuery( document ).height() - jQuery( window ).height(),
                            percent      = scrollHeight > 0 ? ( scrollTop / scrollHeight ) * 100 : 0;
                
                        if ( wrapObj.hasClass( 'wpmozo_progress_bar_layout_circle' ) ) {
                            // Circle.
                            let $circle     = $bar.find( 'circle.wpmozo_circle_fg' ),
                                direction   = 'clockwise', // or anticlockwise.
                                totalLength = 2 * Math.PI * 45,
                                offset      = totalLength - ( percent / 100 ) * totalLength;
                    
                            $circle.css( 'stroke-dashoffset', direction === 'anticlockwise' ? -offset : offset );
                            $bar.find( '.wpmozo_progress_bar_percent' ).text( Math.round(percent) + '%' );
                        } else if ( wrapObj.hasClass( 'wpmozo_progress_bar_layout_half_circle' ) ) {
                            // Half-Circle.
                            let $fgPath     = $bar.find( 'path.wpmozo_circle_fg' ),
                                direction   = 'clockwise', // or anticlockwise.
                                totalLength = 282.74, // Half-circle approx length.
                                offset      = totalLength - (percent / 100) * totalLength;
                
                            $fgPath.css( 'stroke-dashoffset', direction === 'anticlockwise' ? -offset : offset );
                            $bar.find( '.wpmozo_progress_bar_percent' ).text( Math.round( percent ) + '%' );
                        } else {
                            // Bars default.
                              if ( 'vertical' === direction ) {
                                $bar.css( { height: percent + '%', width: '100%' } );
                            } else {
                                $bar.css( { width: percent + '%', height: '100%' } );
                            }
                            $bar.find( '.wpmozo_progress_bar_percent' ).text( Math.round(percent) + '%' );
                        }
                    } );
                }                                            
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_progress_bar", WPMOZOProgressBar );
    } );
} )( jQuery );
