jQuery( window ).on( "elementor/frontend/init", function () {
    var e = elementorModules.frontend.handlers.Base.extend( {
        bindEvents: function () {
            this.change();
        },
        change: function () {   
            
            jQuery( document ).ready( function( $ ){
                if ( $( 'body' ).find( '.wpmozo_text_highlighter' ).length > 0 ) {
                    $( 'body' ).find( '.wpmozo_text_highlighter' ).each( function(){
                        if ( $( this ).find( '.wpmozo_text_highlighter_inner_wrapper' ).length > 0 ) {
                            $( this ).find( '.st0' ).each( function() {
                                let $this = $( this );
                                $this.waypoint( {
                                    handler: function() {
                                        $this.css( 'animation-name', 'wpmozo-dash-animation' );
                                    },
                                    offset: '100%'
                                } );
                            } );
                        }
                    } );
                }
            } );
            
        },
    } );
    elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_text_highlighter", e );
} );