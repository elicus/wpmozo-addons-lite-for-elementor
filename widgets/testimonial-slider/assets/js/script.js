( function ( $ ) {
    $( window ).on( "elementor/frontend/init resize", function () {
        var WPMOZOTestimonialSlider = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change();
            },
            change: function () {
                let swiperInstances = {};
                let a = this.$element
                let atts = JSON.parse(a.find('.wpmozo_swiper_wrapper').attr('data-attr'));
                const clientId = atts.clientId;
                if ( swiperInstances[clientId] && !swiperInstances[clientId].empty() ) {

                    swiperInstances[clientId].destroy(true, true);
                    swiperInstances[clientId] = initSwiper( a, atts );
                
                } else {

                    swiperInstances[clientId] = initSwiper( a, atts );
                
                }
                if( true === a.hasClass( "wpmozo_ae_equal_height" ) ){
                    let b = [  ];
                    let c = 0;
                    let d = a.find( ".swiper-wrapper" );
                    d.children().each( function(){
                        b[ c ] = $( this ).outerHeight();
                        c++;
                    } );
                    d.children().each( function(){
                        $( this ).height( Math.max.apply( Math,b ) );
                    } );
                }
            },
        } );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_testimonial_slider", WPMOZOTestimonialSlider );
    } );

    function initSwiper(el,attributes){
        let block = el;
        let slideEffect = attributes.effect,
            productsPerSlide = parseInt( attributes.cardsPerSlide ),
            spaceBetweenSlides = parseInt( attributes.spaceBetweenSlides ),
            slidesPerGroup = parseInt( attributes.slidesPerGroup ),
            cardsPerSlideTab = parseInt( attributes.cardsPerSlideTab ),
            slidesPerGroupTab = parseInt( attributes.slidesPerGroupTab ),
            spaceBetweenSlidesTab = parseInt( attributes.spaceBetweenSlidesTab ),
            cardsPerSlideMob = parseInt( attributes.cardsPerSlideMob ),
            spaceBetweenSlidesMob = parseInt( attributes.spaceBetweenSlidesMob ),
            slidesPerGroupMob = parseInt( attributes.slidesPerGroupMob ),
            buttonNextClass = `.${attributes.clientId} .swiper-button-next`,
            buttonPrevClass = `.${attributes.clientId} .swiper-button-prev`,
            cube = false,
            slidesPerGroupSkip;

            if( 'coverflow' === slideEffect ) {
                coverflowShadow  = attributes.coverflowShadow
                coverflowRotate  = parseInt( attributes.coverflowRotate );
                coverflowDepth   = parseInt( attributes.coverflowDepth );
            }

        let loop =  attributes.sliderLoop,
            speed = attributes.transitionDuration,
            arrows = false,
            dots = false,
            autoplaySlides = false;

        if ( productsPerSlide > slidesPerGroup && 1 !== slidesPerGroup ) {
            slidesPerGroupSkip = productsPerSlide - slidesPerGroup;
        }

        if ( attributes.showArrow ) {
            arrows = {
                nextEl: buttonNextClass,
                prevEl: buttonPrevClass
            };
        }

        if ( attributes.showControlDot ) {
            dots = {
                el: '.'+attributes.clientId+' .swiper-pagination',
                dynamicBullets: attributes.dynamicBullets,
                clickable: true,
            };
        }

        if ( attributes.autoplay ) {
            if ( attributes.pauseOnHover ) {
                autoplaySlides = {
                    delay: attributes.autoplaySpeed,
                    disableOnInteraction: true,
                    pauseOnMouseEnter: true,
                }
            }else{
                autoplaySlides = {
                    delay: attributes.autoplaySpeed,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: false
                }
            }
        }

        let options = {
            effect: slideEffect,
            slidesPerView: productsPerSlide,
            spaceBetween: spaceBetweenSlides,
            slidesPerGroup: slidesPerGroup,
            loop: loop,
            speed: speed,
            pagination: dots,
            navigation: arrows,
            grabCursor: true,
            observer: true,
            observeParents: true,
            breakpoints: {
                0: {
                    slidesPerView: cardsPerSlideMob,
                    spaceBetween: spaceBetweenSlidesMob,
                    slidesPerGroup: slidesPerGroupMob
                },
                768: {
                    slidesPerView: cardsPerSlideTab,
                    spaceBetween: spaceBetweenSlidesTab,
                    slidesPerGroup: slidesPerGroupTab,
                },
                981: {
                    slidesPerView: productsPerSlide,
                    spaceBetween: spaceBetweenSlides,
                    slidesPerGroup: slidesPerGroup,
                }
            },
        };
        if( 'true' === attributes.autoplay){
            options.autoplay = autoplaySlides;
        }
        if ( 'cube' === slideEffect ) {
            options.cubeEffect = {
                shadow: false,
                slideShadows: false
            }
        }
        if ( 'coverflow' === slideEffect ) {
            options.coverflowEffect = {
                rotate: coverflowRotate,
                stretch: 0,
                depth: coverflowDepth,
                modifier: 1,
                slideShadows : coverflowShadow
            }
        }
        return new Swiper( block.find(`.swiper-container`).get(0), options);
    }
} )( jQuery );