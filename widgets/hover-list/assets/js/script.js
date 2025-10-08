( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOHoverList = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
				//jQuery( document ).ready( function($) {
					//$( '.wpmozo_hover_list' ).each(function () {
						const $this = this.$element.find('.wpmozo_hover_list');
						wpmozo_init_hover_list( $this )
					//} );
				//} ); // Over document ready.
				// Init hover list.
				function wpmozo_init_hover_list( thisObj ) {
					let $cursor = thisObj.find( '.wpmozo_hover_list_cursor' ).eq(0);
					// Set the background hover effect.
					thisObj.find( '.wpmozo_hover_list_item' ).each( function() {
						let imageUrl = jQuery( this ).find( '.wpmozo_hover_list_item_wrapper' ).attr( 'data-image' );
						jQuery( this ).hover( function () {
							$cursor.css( 'background-image', 'url(' + imageUrl + ')' );
						} );
					} );
					let $overlays = thisObj.find( '.wpmozo_hover_list_item_inner' );
					$overlays.on( 'mousemove', function (e) {
						TweenLite.to( $cursor, 0.3, { scale: 1, autoAlpha: 1 } );
						TweenLite.to( $cursor, 0.5, {
							css: {
								left: e.clientX,
								top: e.clientY
							},
							delay: 0.03
						} );
					} );
					// Adjust 768 to your breakpoint.
					if ( window.innerWidth <= 767 ) { 
						$overlays.on( 'mousemove', function(e) {
							TweenLite.to( $cursor, 0.5, {
								css: {
									left: "50%",
									top: "50%"
								},
								delay: 0.03
							} );
						} );
					}
					$overlays.on( 'mouseout', function () {
						TweenLite.to( $cursor, 0.3, { scale: 0.1, autoAlpha: 0 } );
					} );
				}							
			},
		} );
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_hover_list", WPMOZOHoverList );
	} );
} )( jQuery );
