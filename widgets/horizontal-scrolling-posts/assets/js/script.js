( function ( $ ) {
    $( window ).on( "elementor/frontend/init", function () {
        var WPMOZOHorizontalScrollingPosts = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
            	const $this = this.$element.find('.wpmozo_horizontal_scrolling_posts')
				if ( $this.length > 0 ) {
					gsap.registerPlugin( ScrollTrigger );
					$this.each( function() {
						let $section         = $( this ),
							$container       = $section.find('.wpmozo_sticky_posts_wrapper'),
							$scroller        = $section.find( '.wpmozo_sticky_posts_scroller' ),
							scrollableWidth  = $container[0].scrollWidth,
							visibleWidth     = $container.outerWidth(),
							totalScroll      = scrollableWidth - visibleWidth;
			
						let triggerPosition  = $container.data( 'animation_start_element_pos' ) || 'center',
							viewPortPosition = $container.data( 'animation_start_viewport_pos' ) || 'center',
							animationSpeed   = parseFloat( $container.data( 'animation_speed' ) ) || 1;
			
						gsap.to( $container, {
							x: -totalScroll,
							ease: "none",
							duration: animationSpeed,
							scrollTrigger: {
								trigger: $scroller,
								pin: true,
								start: `${triggerPosition} ${viewPortPosition}`,
								scrub: true,
								end: () => `+=${totalScroll}`
							}
						} );
					} );
				}
			},
		} );
		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_horizontal_scrolling_posts", WPMOZOHorizontalScrollingPosts );
	} );
} )( jQuery );
