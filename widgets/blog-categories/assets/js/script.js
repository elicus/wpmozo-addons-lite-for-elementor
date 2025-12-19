( function ( $ ) {
	$( window ).on(
		"elementor/frontend/init",
		function () {
			var WPMOZOBlogSlider = elementorModules.frontend.handlers.Base.extend(
				{
					bindEvents: function () {
						this.change();
					},
					change: function () {
						let $this     = this.$element; // Use this.$element
						let $winWidth = $( window ).width();

						if ( $this.length > 0 ) {
							let $arrows = $this.find( ".wpmozo_swiper_navigation" ).data();
							if ( $arrows ) {
								this.updateArrows( $this, $arrows, $winWidth );
							}
						}

						$( window ).resize(
							() => {
								let $winWidth = $( window ).width();
								if ( $this.find( ".wpmozo_swiper_layout" ).length > 0 ) {
									let $arrows = $this.find( ".wpmozo_swiper_navigation" ).data();
									if ( $arrows ) {
										this.updateArrows( $this, $arrows, $winWidth );
									}
								}
							}
						);

						// Equal height logic
						if ($this.hasClass( "wpmozo_ae_equal_height" )) {
							let heights = [];
							$this.find( ".swiper-wrapper" ).children().each(
								function () {
									heights.push( $( this ).height() );
								}
							);
							$this.find( ".swiper-wrapper" ).children().each(
								function () {
									$( this ).height( Math.max.apply( Math, heights ) );
								}
							);
						}
					},
					updateArrows: function ($element, $arrows, $winWidth) {
						this.removeArrowsClasses( $element.find( ".wpmozo_swiper_navigation" ) );

						if ($winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined") {
							$element.find( ".wpmozo_swiper_navigation" ).addClass( "wpmozo_arrows_" + $arrows.arrows_desktop );
						} else if ($winWidth < 981 && $winWidth >= 768 && typeof $arrows.arrows_tablet !== "undefined") {
							$element.find( ".wpmozo_swiper_navigation" ).addClass( "wpmozo_arrows_" + $arrows.arrows_tablet );
						} else if ($winWidth < 768 && typeof $arrows.arrows_phone !== "undefined") {
							$element.find( ".wpmozo_swiper_navigation" ).addClass( "wpmozo_arrows_" + $arrows.arrows_phone );
						}

						this.removeArrowsClasses( $element.find( ".wpmozo_swiper_navigation" ) );
						$element.find( ".wpmozo_swiper_navigation" ).addClass( "wpmozo_arrows_" + $arrows.arrows );
					},
					getArrowsClasses: function () {
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
					},
					removeArrowsClasses: function ($element) {
						let arrowClasses = this.getArrowsClasses();
						$element.removeClass( arrowClasses.join( " " ) );
					}
				}
			);
			elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_advanced_blog_slider", WPMOZOBlogSlider );
		}
	);
} )( jQuery );