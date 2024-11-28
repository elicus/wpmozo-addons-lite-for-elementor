( function ( $ ) {
    $( window ).on( 'elementor/frontend/init', function () {
        var WPMOZOTwitter_Follow_Button = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change(); // Initial call to set up the button
            },
            change: function () {
                // Create Twitter button
                const twitterButtons = this.$element.find('.wpmozo_twitter_follow_button');
                
                twitterButtons.each(function () {
                    const e = $(this).find(".wpmozo_twitter_embedded_follow_button"),
                          n = e.find(".wpmozo_twitter_embed_follow_button"),
                          o = n.data("name"),
                          d = n.data("show-screen-name"),
                          r = n.data("size"),
                          w = n.data("dnt");

                    // Clear any existing buttons
                    e.empty();

                    // Load Twitter script if not already loaded
                    if (typeof window.twttr === "undefined") {
                        (window.twttr = (function (t, e, n) {
                            const d = t.getElementsByTagName(e)[0],
                                  i = window.twttr || {};
                            if (!t.getElementById(n)) {
                                const o = t.createElement(e);
                                o.id = n;
                                o.src = "https://platform.twitter.com/widgets.js";
                                d.parentNode.insertBefore(o, d);
                                i._e = [];
                                i.ready = function (callback) {
                                    i._e.push(callback);
                                };
                            }
                            return i;
                        })(document, "script", "twitter-wjs"));
                    }

                    // Create the follow button
                    window.twttr.ready(function (t) {
                        t.widgets.createFollowButton(o, e[0], { 
                            showScreenName: d, 
                            size: r, 
                            dnt: w 
                        }).then(function () {
                            n.remove(); // Remove the original link after creation
                        });
                    });
                });
            },
        });

        // Attach the handler to Elementor
        elementorFrontend.elementsHandler.attachHandler('wpmozo_ae_twitter_follow_button', WPMOZOTwitter_Follow_Button);
    });
} )( jQuery )