jQuery(window).on("elementor/frontend/init", function () {
    var e = elementorModules.frontend.handlers.Base.extend({
        bindEvents: function () {
            this.change();
        },
        change: function () {
            jQuery(document).ready(function (n) {
                // Handle editor mode
                const isEditorMode = !!window.elementorFrontend?.isEditMode();
                if (isEditorMode) {
                    // Editor-specific logic
                    jQuery.getScript('https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v13.0', function () {
                        if (typeof FB !== 'undefined' && FB.XFBML && FB.XFBML.parse) {
                            FB.XFBML.parse();
                        }
                    });
                }
                if ( jQuery( "body" ).find( ".elementor-widget-wpmozo_ae_facebook_comments" ).length > 0 ) {
                    jQuery( "body" ).find( ".elementor-widget-wpmozo_ae_facebook_comments" ).each( function () {
                        let $appID = jQuery( this ).find( ".wpmozo_ae_facebook_comments.fb-comments" ).data().appId;
                        
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
                    });
                }
            });
        },
    });
    elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_facebook_comments", e);
});