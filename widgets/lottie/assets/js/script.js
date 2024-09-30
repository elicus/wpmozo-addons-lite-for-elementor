jQuery( window ).on( 
    "elementor/frontend/init",
    function () {
        var e = elementorModules.frontend.handlers.Base.extend( 
            {
                bindEvents: function () {
                    this.change();
                },
                change: function () {
                    let $this  = this.$element.find('.wpmozo_lottie_wrapper'),
                        params = $this.find('.wpmozo_lottie_params'),
                        animation_name = params.data('order-class') + '_lottie',
                        trigger = params.data('animation-trigger'),
                        wpmozo_lottie = '';


                    if ( 'hover' === trigger ) {
                        wpmozo_lottie = lottie.loadAnimation({
                            container: $this[0],
                            path: params.data('url'),
                            renderer: 'svg',
                            loop: params.data('loop'),
                            autoplay: false,
                            name: animation_name
                        });
                        $this.on('mouseenter mouseleave', function(e) {
                            if ( e.type === 'mouseenter' ) {
                                if ( params.data('direction') ) {
                                    wpmozo_lottie.setDirection( params.data('direction') );
                                }
                                if ( params.data('speed') ) {
                                    wpmozo_lottie.setSpeed( parseFloat( params.data('speed') ) );
                                }
                                wpmozo_lottie.play();
                            }
                        });
                    } else if ( 'click' === trigger ) {
                        wpmozo_lottie = lottie.loadAnimation({
                            container: $this[0],
                            path: params.data('url'),
                            renderer: 'svg',
                            loop: params.data('loop'),
                            autoplay: false,
                            name: animation_name
                        });
                        $this.on('click', function(e) {
                            wpmozo_lottie.play();
                            if ( params.data('direction') ) {
                                wpmozo_lottie.setDirection( params.data('direction') );
                            }
                            if ( params.data('speed') ) {
                                wpmozo_lottie.setSpeed( parseFloat( params.data('speed') ) );
                            }
                        });
                    } else {
                        wpmozo_lottie = lottie.loadAnimation({
                            container: $this[0],
                            path: params.data('url'),
                            renderer: 'svg',
                            loop: params.data('loop'),
                            autoplay: true,
                            name: animation_name
                        });
                        if ( params.data('direction') ) {
                            wpmozo_lottie.setDirection( params.data('direction') );
                        }
                        if ( params.data('speed') ) {
                            wpmozo_lottie.setSpeed( parseFloat( params.data('speed') ) );
                        }
                    }         
                },
            }
         );
        elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_lottie", e );
    }
 );