( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOScrollingZoomGallery = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
        		const $this  = this.$element.find('.wpmozo_scrolling_zoom_gallery');
				if ( $this.length > 0 ) {
            		$this.imagesLoaded( 
						function () {
							gsap.registerPlugin(ScrollTrigger);
							$this.each( ( index, gallery ) => {
								let $section         = $this;
								let scroller         = $section.find( '.wpmozo_scroll_zoom_gallery_scroller' );
								let innerObj     = $section.find( '.wpmozo_scroll_zoom_gallery_inner' ),
									images       = $section.find( '.wpmozo_scroll_zoom_gallery_item' ),
									startOpacity = parseFloat( scroller.data('start_opacity') ),
									imageCount   = images.length;
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
								console.log($(images));
								images.each( ( img, i ) => {
									let translateZ = ( i + 1 ) * 200 + 100,
										transZ = '-' + ( i + 1 ) * 200;
									tl.to( innerObj, { z: translateZ } ).fromTo( img, { opacity: startOpacity, z: transZ }, { opacity: 1, z: transZ }, i );
								} );
							} );
						}
				 	)	
				}				
			},
		} );
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_scrolling_zoom_gallery", WPMOZOScrollingZoomGallery );
	} );
} )( jQuery );
