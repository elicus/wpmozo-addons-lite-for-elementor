jQuery( window ).on( "elementor/frontend/init", function () {
    var e = elementorModules.frontend.handlers.Base.extend( {
        bindEvents: function () {
            this.change();
        },
        change: function () {
            const $this = this.$element.find('.wpmozo_fb_embedded_video_wrapper');
                // Handle editor mode
                // Editor-specific logic
            if ( $this.length > 0 ) {
                $this.each( function () {
                    let $widgetData = jQuery( this ).find( ".fb-video" ).data();
                    jQuery.getScript('https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0', function() {
                        if (typeof FB !== 'undefined' && FB.XFBML && FB.XFBML.parse) {
                            FB.XFBML.parse();


                        }
                        if(true === $widgetData.autoplay){
                            FB.Event.subscribe('xfbml.ready', function(msg) {
                                if (msg.type === 'video') {
                                    msg.instance.play();
                                }
                            });
                        }
                    });
                    $appID = $widgetData?.appId ?? '';
                    if( $appID !== 'undefined' || '' === $appID )
                    {
                        // Initialize the Facebook SDK
                        window.fbAsyncInit = function () {
                            FB.init({
                                appId: `'${$appID}'`, // replace with your App ID
                                cookie: true, // enable cookies
                                xfbml: true, // parse social plugins
                                version: 'v12.0' // valid version
                            });
                        };
                        // Load the SDK
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://connect.facebook.net/en_US/sdk.js?version=v12.0'; // corrected version query
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));

                    }
                    
                });
            }
        },
    } );
    elementorFrontend.elementsHandler.attachHandler( "wpmozo_ae_facebook_embedded_video", e );
} );