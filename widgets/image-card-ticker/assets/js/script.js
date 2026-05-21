(function ($) {
	$(window).on("elementor/frontend/init", function () {
		var WPMOZOImageCardTicker = elementorModules.frontend.handlers.Base.extend({
			bindEvents: function () {
				this.change();
			},
			
			change: function () {
				const $imagecardticker = this.$element.find('.wpmozo_image_card_ticker');
				if (!$imagecardticker.length) return;

				$imagecardticker.each(function () {
					let $thisObj = $(this),
						$wrapper = $thisObj.find('.wpmozo_image_card_ticker_wrapper');

					let layout = $wrapper.data('layout') ?? 'marquee';
					

					// create
					let mm = gsap.matchMedia();

					// add a media query. When it matches, the associated function will run
					mm.add("(min-width: 1024px)", () => {
						if ('marquee' === layout) {
								wpmozoInitImageCardTickerMarquee($wrapper);
						} else if ('3d_circular' === layout) {
								wpmozoInitImageCardTicker3DCircle($wrapper);
						} else if ('curve' === layout) {
								wpmozoInitImageCardTickerCurve($wrapper);
						}
					});

					mm.add("(max-width: 1024px) and (min-width: 768px)", () => {
						if ('marquee' === layout) {
								wpmozoInitImageCardTickerMarqueeTablet($wrapper);
						} else if ('3d_circular' === layout) {
								wpmozoInitImageCardTicker3DCircleTablet($wrapper);
						} else if ('curve' === layout) {
								wpmozoInitImageCardTickerCurveTablet($wrapper);
						}
					});

					mm.add("(max-width: 767px)", () => {
						if ('marquee' === layout) {
								wpmozoInitImageCardTickerMarqueeMobile($wrapper);
						} else if ('3d_circular' === layout) {
								wpmozoInitImageCardTicker3DCircleMobile($wrapper);
						} else if ('curve' === layout) {
								wpmozoInitImageCardTickerCurveMobile($wrapper);
						}
					});

					
				});

				// Marquee mobile responsive.
				function wpmozoInitImageCardTickerMarqueeMobile($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);
		
					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');
		
					let direction = $wrapper.data('direction_mobile') || 'left',
						imgWidth = $wrapper.data('image_width_mobile') || '200',
						imgHeight = $wrapper.data('image_height_mobile') || '150',
						imgGap = $wrapper.data('image_gap_mobile'),
						speed = $wrapper.data('ticker_speed_mobile') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						isVertical = ['top', 'bottom'].includes(direction);
		
					if ((!imgGap || '' === imgGap) && (0 !== parseInt(imgGap))) {
						imgGap = '30';
					}
		
					let $scWidth = isVertical ? $(window).height() : $(window).width();
					let $imgSize = isVertical ? +imgHeight : +imgWidth;
					let distance = (($imgSize) + +imgGap) * +$innerWrap.children().length;
					let amount = Math.ceil($scWidth / $imgSize);
					amount = Math.ceil(amount / $innerWrap.children().length);
		
					let html = $innerWrap.html();
					for (let i = 0; i < amount; i++) {
						const $clones = $(html).map(function () {
							return $(this).addClass('wpmozo-cloned-item')[0];
						});
						$innerWrap.append($clones);
					}
		
					let [startPos, endPos] = ['right', 'bottom'].includes(direction) ? [-distance, 0] : [0, -distance];
					let prop = isVertical ? 'y' : 'x';
					if (['right', 'bottom'].includes(direction)) {
						gsap.set($innerWrap, { [prop]: startPos });
					}
		
					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: isVertical ? 0 : imgGap,
							marginBottom: isVertical ? imgGap : 0,
						});
					});
		
					let tween = gsap.to($innerWrap, {
						[prop]: endPos,
						duration: speed,
						ease: 'none',
						repeat: -1,
						onRepeat: () => gsap.set($innerWrap, { [prop]: startPos })
					});
		
					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
		
					$wrapper.addClass("marquee-inited");
				}
				// Marquee tablet responsive.
				function wpmozoInitImageCardTickerMarqueeTablet($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);
		
					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');
		
					let direction = $wrapper.data('direction_tablet') || 'left',
						imgWidth = $wrapper.data('image_width_tablet') || '200',
						imgHeight = $wrapper.data('image_height_tablet') || '150',
						imgGap = $wrapper.data('image_gap_tablet'),
						speed = $wrapper.data('ticker_speed_tablet') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						isVertical = ['top', 'bottom'].includes(direction);
		
					if ((!imgGap || '' === imgGap) && (0 !== parseInt(imgGap))) {
						imgGap = '30';
					}
		
					let $scWidth = isVertical ? $(window).height() : $(window).width();
					let $imgSize = isVertical ? +imgHeight : +imgWidth;
					let distance = (($imgSize) + +imgGap) * +$innerWrap.children().length;
					let amount = Math.ceil($scWidth / $imgSize);
					amount = Math.ceil(amount / $innerWrap.children().length);
		
					let html = $innerWrap.html();
					for (let i = 0; i < amount; i++) {
						const $clones = $(html).map(function () {
							return $(this).addClass('wpmozo-cloned-item')[0];
						});
						$innerWrap.append($clones);
					}
		
					let [startPos, endPos] = ['right', 'bottom'].includes(direction) ? [-distance, 0] : [0, -distance];
					let prop = isVertical ? 'y' : 'x';
					if (['right', 'bottom'].includes(direction)) {
						gsap.set($innerWrap, { [prop]: startPos });
					}
		
					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: isVertical ? 0 : imgGap,
							marginBottom: isVertical ? imgGap : 0,
						});
					});
		
					let tween = gsap.to($innerWrap, {
						[prop]: endPos,
						duration: speed,
						ease: 'none',
						repeat: -1,
						onRepeat: () => gsap.set($innerWrap, { [prop]: startPos })
					});
		
					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
		
					$wrapper.addClass("marquee-inited");
				}
				// Marquee desktop responsive.
				function wpmozoInitImageCardTickerMarquee($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);

					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');

					let direction = $wrapper.data('direction') || 'left',
						imgWidth = $wrapper.data('image_width') || '200',
						imgHeight = $wrapper.data('image_height') || '150',
						imgGap = $wrapper.data('image_gap'),
						speed = $wrapper.data('ticker_speed') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						isVertical = ['top', 'bottom'].includes(direction);

					if ((!imgGap || '' === imgGap) && (0 !== parseInt(imgGap))) {
						imgGap = '30';
					}

					let $scWidth = isVertical ? $(window).height() : $(window).width();
					let $imgSize = isVertical ? +imgHeight : +imgWidth;
					let distance = (($imgSize) + +imgGap) * +$innerWrap.children().length;
					let amount = Math.ceil($scWidth / $imgSize);
					amount = Math.ceil(amount / $innerWrap.children().length);

					let html = $innerWrap.html();
					for (let i = 0; i < amount; i++) {
						const $clones = $(html).map(function () {
							return $(this).addClass('wpmozo-cloned-item')[0];
						});
						$innerWrap.append($clones);
					}

					let [startPos, endPos] = ['right', 'bottom'].includes(direction) ? [-distance, 0] : [0, -distance];
					let prop = isVertical ? 'y' : 'x';
					if (['right', 'bottom'].includes(direction)) {
						gsap.set($innerWrap, { [prop]: startPos });
					}

					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: isVertical ? 0 : imgGap,
							marginBottom: isVertical ? imgGap : 0,
						});
					});

					let tween = gsap.to($innerWrap, {
						[prop]: endPos,
						duration: speed,
						ease: 'none',
						repeat: -1,
						onRepeat: () => gsap.set($innerWrap, { [prop]: startPos })
					});

					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}

					$wrapper.addClass("marquee-inited");
				}

				// 3D Circular mobile responsive.
				function wpmozoInitImageCardTicker3DCircleMobile($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);

					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');

					let imgWidth = $wrapper.data('image_width_mobile') || '200',
						imgHeight = $wrapper.data('image_height_mobile') || '150',
						direction = $wrapper.data('direction_mobile') || 'left',
						imgGap = $wrapper.data('image_gap_mobile'),
						speed = $wrapper.data('ticker_speed_mobile') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						totalCards = $innerWrap.children().length,
						spacingFactor = 1;

					let baseRadius = (imgWidth / 2) / Math.tan(Math.PI / totalCards);
					let radius = baseRadius * spacingFactor + (+imgGap / 2);

					$wrapper.addClass('circle-carousel');

					$innerWrap.children().each((i, card) => {
						let angle = (360 / totalCards) * i;
						gsap.set(card, {
							rotationY: angle,
							width: imgWidth,
							height: imgHeight,
							z: radius,
							transformOrigin: `center center -${radius}px`
						});
					});

					// Direction logic (360 or -360)
					let rotationAmount = (direction === 'left') ? 360 : -360;

					let tween = gsap.to($innerWrap, {
						rotationY: `+=${rotationAmount}`,
						duration: speed,
						repeat: -1,
						ease: 'none',
						transformOrigin: 'center center',
						transformStyle: 'preserve-3d',
						overflow: 'visible',
						position: 'relative'
					});

					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
				}
				// 3D Circular tablet responsive.
				function wpmozoInitImageCardTicker3DCircleTablet($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);

					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');

					let imgWidth = $wrapper.data('image_width_tablet') || '200',
						imgHeight = $wrapper.data('image_height_tablet') || '150',
						direction = $wrapper.data('direction_tablet') || 'left',
						imgGap = $wrapper.data('image_gap_tablet'),
						speed = $wrapper.data('ticker_speed_tablet') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						totalCards = $innerWrap.children().length,
						spacingFactor = 1;

					let baseRadius = (imgWidth / 2) / Math.tan(Math.PI / totalCards);
					let radius = baseRadius * spacingFactor + (+imgGap / 2);

					$wrapper.addClass('circle-carousel');

					$innerWrap.children().each((i, card) => {
						let angle = (360 / totalCards) * i;
						gsap.set(card, {
							rotationY: angle,
							width: imgWidth,
							height: imgHeight,
							z: radius,
							transformOrigin: `center center -${radius}px`
						});
					});

					// Direction logic (360 or -360)
					let rotationAmount = (direction === 'left') ? 360 : -360;

					let tween = gsap.to($innerWrap, {
						rotationY: `+=${rotationAmount}`,
						duration: speed,
						repeat: -1,
						ease: 'none',
						transformOrigin: 'center center',
						transformStyle: 'preserve-3d',
						overflow: 'visible',
						position: 'relative'
					});

					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
				}
				// 3D Circular desktop responsive.
				function wpmozoInitImageCardTicker3DCircle($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);

					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');

					let imgWidth = $wrapper.data('image_width') || '200',
						imgHeight = $wrapper.data('image_height') || '150',
						direction = $wrapper.data('direction') || 'left',
						imgGap = $wrapper.data('image_gap'),
						speed = $wrapper.data('ticker_speed') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes',
						totalCards = $innerWrap.children().length,
						spacingFactor = 1;

					let baseRadius = (imgWidth / 2) / Math.tan(Math.PI / totalCards);
					let radius = baseRadius * spacingFactor + (+imgGap / 2);

					$wrapper.addClass('circle-carousel');

					$innerWrap.children().each((i, card) => {
						let angle = (360 / totalCards) * i;
						gsap.set(card, {
							rotationY: angle,
							width: imgWidth,
							height: imgHeight,
							z: radius,
							transformOrigin: `center center -${radius}px`
						});
					});

					// Direction logic (360 or -360)
					let rotationAmount = (direction === 'left') ? 360 : -360;

					let tween = gsap.to($innerWrap, {
						rotationY: `+=${rotationAmount}`,
						duration: speed,
						repeat: -1,
						ease: 'none',
						transformOrigin: 'center center',
						transformStyle: 'preserve-3d',
						overflow: 'visible',
						position: 'relative'
					});

					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
				}

				// Curve mobile responsive.
				function wpmozoInitImageCardTickerCurveMobile($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);
				
					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');
				
					let imgWidth = $wrapper.data('image_width_mobile') || '200',
						imgHeight = $wrapper.data('image_height_mobile') || '150',
						direction = $wrapper.data('direction_mobile') || 'left',
						imgGap = $wrapper.data('image_gap_mobile'),
						speed = $wrapper.data('ticker_speed_mobile') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes';
				
					let totalItemWidth = (+imgWidth + +imgGap) * $innerWrap.children().length;
				
					let amount = Math.ceil($(window).width() / imgWidth);
					amount = Math.ceil(amount / $innerWrap.children().length);
				
					let html = $innerWrap.html();
				
					if (direction === 'left') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.append($clones);
						}
					} else if (direction === 'right') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.prepend($clones);
						}
					}
				
					$wrapper.addClass('curve-carousel');
				
					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: imgGap
						});
					});
				
					// Determine animation start and end positions
					let startX = 0;
					let endX = 0;
				
					if (direction === 'left') {
						startX = 0;
						endX = -totalItemWidth;
					} else if (direction === 'right') {
						startX = -totalItemWidth;
						endX = 0;
					}
				
					// Set initial position
					gsap.set($innerWrap, { x: startX });
				
					// Animate using GSAP
					let tween = gsap.to($innerWrap, {
						x: endX,
						duration: speed,
						ease: "none",
						repeat: -1,
						onRepeat: () => {
							gsap.set($innerWrap, { x: startX });
						}
					});
				
					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
				}
				// Curve tablet responsive.
				function wpmozoInitImageCardTickerCurveTablet($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);
				
					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');
				
					let imgWidth = $wrapper.data('image_width_tablet') || '200',
						imgHeight = $wrapper.data('image_height_tablet') || '150',
						direction = $wrapper.data('direction_tablet') || 'left',
						imgGap = $wrapper.data('image_gap_tablet'),
						speed = $wrapper.data('ticker_speed_tablet') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes';
				
					let totalItemWidth = (+imgWidth + +imgGap) * $innerWrap.children().length;
				
					let amount = Math.ceil($(window).width() / imgWidth);
					amount = Math.ceil(amount / $innerWrap.children().length);
				
					let html = $innerWrap.html();
				
					if (direction === 'left') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.append($clones);
						}
					} else if (direction === 'right') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.prepend($clones);
						}
					}
				
					$wrapper.addClass('curve-carousel');
				
					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: imgGap
						});
					});
				
					// Determine animation start and end positions
					let startX = 0;
					let endX = 0;
				
					if (direction === 'left') {
						startX = 0;
						endX = -totalItemWidth;
					} else if (direction === 'right') {
						startX = -totalItemWidth;
						endX = 0;
					}
				
					// Set initial position
					gsap.set($innerWrap, { x: startX });
				
					// Animate using GSAP
					let tween = gsap.to($innerWrap, {
						x: endX,
						duration: speed,
						ease: "none",
						repeat: -1,
						onRepeat: () => {
							gsap.set($innerWrap, { x: startX });
						}
					});
				
					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
				}
				// Curve desktop responsive.
				function wpmozoInitImageCardTickerCurve($wrapper) {
					// gsap.registerPlugin(ScrollTrigger);
				
					let $innerWrap = $wrapper.find('.wpmozo_image_card_ticker_inner');
				
					let imgWidth = $wrapper.data('image_width') || '200',
						imgHeight = $wrapper.data('image_height') || '150',
						direction = $wrapper.data('direction') || 'left',
						imgGap = $wrapper.data('image_gap'),
						speed = $wrapper.data('ticker_speed') || '45',
						pauseOnHover = $wrapper.data('pause_on_hover') || 'yes';
				
					let totalItemWidth = (+imgWidth + +imgGap) * $innerWrap.children().length;
				
					let amount = Math.ceil($(window).width() / imgWidth);
					amount = Math.ceil(amount / $innerWrap.children().length);
				
					let html = $innerWrap.html();
				
					if (direction === 'left') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.append($clones);
						}
					} else if (direction === 'right') {
						for (let i = 0; i < amount; i++) {
							const $clones = $(html).map(function () {
								return $(this).clone().addClass('wpmozo-cloned-item')[0];
							});
							$innerWrap.prepend($clones);
						}
					}
				
					$wrapper.addClass('curve-carousel');
				
					let $items = $innerWrap.children();
					$items.each((i, card) => {
						gsap.set(card, {
							width: imgWidth,
							height: imgHeight,
							marginRight: imgGap
						});
					});
				
					// Determine animation start and end positions
					let startX = 0;
					let endX = 0;
				
					if (direction === 'left') {
						startX = 0;
						endX = -totalItemWidth;
					} else if (direction === 'right') {
						startX = -totalItemWidth;
						endX = 0;
					}
				
					// Set initial position
					gsap.set($innerWrap, { x: startX });
				
					// Animate using GSAP
					let wrapWidth = $wrapper.width(),
						wrapHalf = wrapWidth/2,
						wrapQart = wrapWidth/4,
						wrap3Quart = wrapQart*3,
						wrapHeight = $wrapper.height(),
						wrapHHalf = wrapHeight/2,
						wrapHQart = wrapHeight/4,
						wrapH3Quart = wrapHQart*3;
					let tween = gsap.to($innerWrap, {
						x: endX,
						duration: speed,
						ease: "none",
						repeat: -1,
						onRepeat: () => {
							gsap.set($innerWrap, { x: startX });
						},
					});

					let svgHtmlMac = '<svg width="0" height="0" style="position:absolute"> <defs> <mask id="wpmozo_image_card_ticker_curve_mask" maskUnits="userSpaceOnUse" maskContentUnits="userSpaceOnUse"> <rect width="100%" height="100%" fill="black" /> <path d="M0,0 Q'+wrapHalf+','+wrapHQart+' '+wrapWidth+',0 V'+wrapHeight+' Q'+wrapHalf+','+wrapH3Quart+' 0,'+wrapHeight+' Z" fill="white" /> </mask> </defs> </svg>';

					let svgHtmlChr = '<svg width="0" height="0" style="position:absolute"> <defs> <mask id="wpmozo_image_card_ticker_curve_mask" maskUnits="objectBoundingBox" maskContentUnits="objectBoundingBox"> <rect width="100%" height="100%" fill="black" /> <path d="M0,0 Q0.5,0.25 1,0 V1 Q0.5,0.75 0,1 Z" fill="white" /> </mask> </defs> </svg>';

					// Pause on hover
					if (pauseOnHover === 'yes') {
						$innerWrap.on('mouseenter', 'img', () => tween.pause());
						$innerWrap.on('mouseleave', 'img', () => tween.resume());
					}
					if (/^((?!chrome|android).)*safari/i.test(navigator.userAgent)) {
						$wrapper.append(svgHtmlMac);
					} else{
						$wrapper.append(svgHtmlChr);
					}
				}								
			},
		});

		elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_image_card_ticker", WPMOZOImageCardTicker);
	});
})(jQuery);