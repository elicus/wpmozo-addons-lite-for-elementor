( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOProgressBar = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                const $this = this.$element.find('.wpmozo_scroll_progress');
                if ( $this.length > 0 ) {
                    $( window ).on( 'scroll', wpmozoInitUpdateProgressBars );
                    wpmozoInitUpdateProgressBars();
                }
                
                // Init update scroll progress.
                function wpmozoInitUpdateProgressBars() {
                    $this.each( function() {
                
                        let thisObj = $this,
                            wrapObj = thisObj.find( '.wpmozo_scroll_progress_wrapper' ),
                            $bar    = thisObj.find( '.wpmozo_scroll_progress_inner' );
                
                        let direction    = wrapObj.data( 'bar_direction' ) || 'horizontal';
                
                        let scrollTop    = jQuery( window ).scrollTop(),
                            scrollHeight = jQuery( document ).height() - jQuery( window ).height(),
                            percent      = scrollHeight > 0 ? ( scrollTop / scrollHeight ) * 100 : 0;
                
                        if ( wrapObj.hasClass( 'wpmozo_scroll_progress_layout_circle' ) ) {
                            // Circle.
                            let $circle     = $bar.find( 'circle.wpmozo_circle_fg' ),
                                direction   = 'clockwise', // or anticlockwise.
                                totalLength = 2 * Math.PI * 45,
                                offset      = totalLength - ( percent / 100 ) * totalLength;
                    
                            $circle.css( 'stroke-dashoffset', direction === 'anticlockwise' ? -offset : offset );
                            $bar.find( '.wpmozo_scroll_progress_percent' ).text( Math.round(percent) + '%' );
                        } else if ( wrapObj.hasClass( 'wpmozo_scroll_progress_layout_half_circle' ) ) {
                            // Half-Circle.
                            let $fgPath     = $bar.find( 'path.wpmozo_circle_fg' ),
                                direction   = 'clockwise', // or anticlockwise.
                                totalLength = 282.74, // Half-circle approx length.
                                offset      = totalLength - (percent / 100) * totalLength;
                
                            $fgPath.css( 'stroke-dashoffset', direction === 'anticlockwise' ? -offset : offset );
                            $bar.find( '.wpmozo_scroll_progress_percent' ).text( Math.round( percent ) + '%' );
                        } else {
                            // Bars default.
                              if ( 'vertical' === direction ) {
                                $bar.css( { height: percent + '%', width: '100%' } );
                            } else {
                                $bar.css( { width: percent + '%', height: '100%' } );
                            }
                            wrapObj.find( '.wpmozo_scroll_progress_percent' ).text( Math.round(percent) + '%' );
                        }
                    } );
                }                                            
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_scroll_progress", WPMOZOProgressBar );
    } );
} )( jQuery );
