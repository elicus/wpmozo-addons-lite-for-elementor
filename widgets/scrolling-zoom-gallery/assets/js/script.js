( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOScrollingZoomGallery = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
				jQuery( document ).ready( function($) {
					if ( $( '.wpmozo_scrolling_zoom_gallery' ).length > 0 ) {
						gsap.registerPlugin(ScrollTrigger);
						document.querySelectorAll( '.wpmozo_scrolling_zoom_gallery' ).forEach( ( gallery, galleryIndex ) => {
							let scroller   = gallery.querySelector( '.wpmozo_scroll_zoom_gallery_scroller' ),
								innerObj   = gallery.querySelector( '.wpmozo_scroll_zoom_gallery_inner' ),
								images     = gallery.querySelectorAll( '.wpmozo_scroll_zoom_gallery_item' ),
								imageCount = images.length;
							let tl = gsap.timeline( {
								defaults: {
									duration: ( imageCount * 2 ),
									ease: 'none'
								},
								scrollTrigger: {
									trigger: scroller,
									start: "top top",
									end: `+=${imageCount * 150}%`,
									scrub: 1,
									pin: true,
									anticipatePin: 1,
									onEnter: () => document.documentElement.classList.add( 'wpmozo_hide_scrollbar' ),
									onLeave: () => document.documentElement.classList.remove( 'wpmozo_hide_scrollbar' ),
									onEnterBack: () => document.documentElement.classList.add( 'wpmozo_hide_scrollbar' ),
									onLeaveBack: () => document.documentElement.classList.remove( 'wpmozo_hide_scrollbar' )
								}
							} );
							images.forEach( ( img, i ) => {
								let translateZ = ( i + 1 ) * 200 + 100,
									transZ = '-' + ( i + 1 ) * 200;
								tl.to( innerObj, { z: translateZ } ).fromTo( img, { opacity: 0, z: transZ }, { opacity: 1, z: transZ }, i );
							} );
						} );
					}
				} ); // Over document ready.				
			},
		} );
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_scrolling_zoom_gallery", WPMOZOScrollingZoomGallery );
	} );
} )( jQuery );
