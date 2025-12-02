(function ($) {
	$(window).on("elementor/frontend/init", function () {
	  	var WPMOZOPostTicker = elementorModules.frontend.handlers.Base.extend({
			bindEvents: function () {
		  		this.change();
			},
			change: function () {
				const $this = this.$element.find(".wpmozo_post_ticker");
					// Check if module available.
				if ($this.length > 0) {
		  			$this.each(function () {
			  			let thisObj = $(this),
							wrapObj = thisObj.find(".wpmozo_post_ticker_wrap");

			  			const $orderClass = 'elementor-element-'+thisObj.closest('.elementor-element').data('id');

			  			const tickerEffect = wrapObj.data("ticker_effect");
			  			// Scroll effect.
			  			if ("scroll" === tickerEffect) {
							wpmozo_post_ticker_set_scroll_speed(wrapObj);
			  			}

			  			// Fade effect, init swipper slider.
			  			if ("fade" === tickerEffect || "slide" === tickerEffect) {
							let slideAlign = wrapObj.data("slide_align"),
								autoplaySpeed = wrapObj.data("fade_effect_delay"),
								transitionDuration = wrapObj.data( "fade_effect_transition" ),
								showArrow = wrapObj.data("show_arrow"),
								arrows = false;
							if ("on" === showArrow) {
				  				arrows = {
									nextEl: "." + $orderClass + " .swiper-button-next",
									prevEl: "." + $orderClass + " .swiper-button-prev",
				  				};
							}

							let fadeEffect = false;
							if ("fade" === tickerEffect) {
					  			fadeEffect = { crossFade: true };
							}

							var swipperSlider = new Swiper( "." + $orderClass + " .swiper-container", {
								direction: "slide" === tickerEffect ? slideAlign : "horizontal",
								slidesPerView: 1,
								slidesPerGroup: 1,
								slidesPerGroupSkip: 1,
								freeMode: true,
								autoHeight: true,
								autoplay: {
								  	delay: autoplaySpeed ? autoplaySpeed : 2500,
								  	disableOnInteraction: true,
								},
								spaceBetween: 0,
								effect: tickerEffect,
								fadeEffect: fadeEffect,
								speed: transitionDuration ? transitionDuration : 700,
								loop: true,
								navigation: arrows,
								grabCursor: true,
								observer: true,
								observeParents: true,
					  		});
							jQuery("." + $orderClass + " .swiper-container").on( "mouseleave", function (e) {
								if (typeof swipperSlider.autoplay.start === "function") {
						  			swipperSlider.autoplay.start();
								}
					  		});
							jQuery("." + $orderClass + " .swiper-container").on( "mouseenter", function (e) {
								if (typeof swipperSlider.autoplay.stop === "function") {
						  			swipperSlider.autoplay.stop();
								}
					  		});
			  			}
					});

				  	$(window).resize(function () {
						$("body").find(".wpmozo_post_ticker").each(function () {
							let thisObj = $(this),
						  		wrapObj = thisObj.find(".wpmozo_post_ticker_wrap");
	  
							// Scroll effect.
							if (wrapObj.hasClass("wpmozo_ticker_effect_scroll")) {
							  	wpmozo_post_ticker_set_scroll_speed(wrapObj);
							}
					  	});
				  	});
				}
  
		  		/**
		   		* Set speed of ticker.
		   		*/
			  	function wpmozo_post_ticker_set_scroll_speed(wrapObj) {
					let tickerListSize = wrapObj.find(".wpmozo_post_ticker_items").width(),
				  		tickerBarSize = wrapObj.find(".wpmozo_post_ticker_bar").width(),
				  		tickerSpeed = wrapObj.data("scroll_effect_delay");

					let calcSpeed = ( (tickerListSize + tickerBarSize) / tickerSpeed ).toFixed(2);
						wrapObj.find(".wpmozo_post_ticker_bar").css("animation-duration", calcSpeed + "s");
		  		}
			},
  		});
  		elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_post_ticker", WPMOZOPostTicker );
	});
})(jQuery);
  