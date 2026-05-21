( function ( $ ) {
    $( window ).on( 'elementor/frontend/init', function () {
        var WPMOZOTwitter_Tweet_Button = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change(); // Initial call to set up the button
            },
            change: function () {
                const tweetButton = this.$element.find('.wpmozo_twitter_tweet_button');
                
                    // Find and set up Twitter share buttons
                    tweetButton.each(function () {
                        let e = $(this).find(".wpmozo_twitter_embedded_tweet_button"),
                            a = e.find(".wpmozo_twitter_embed_tweet_button");
                        // Clear any existing buttons
                        e.empty();
                        console.log(a);

                
                        //console.log('Embedded Tweet Button:', a); // Log the button element
                
                        // Access data attributes
                        let d = a.data("text"),
                            n = a.data("url"),
                            i = a.data("hashtags"),
                            r = a.data("via"),
                            o = a.data("related"),
                            w = a.data("size"),
                            s = a.data("dnt");
                
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
                        console.log('Creating Twitter button with:', {
                            text: d,
                            url: n,
                            hashtags: i,
                            via: r,
                            related: o,
                            size: w,
                            dnt: s
                        });
                
                        // Create the Twitter share button
                        window.twttr.ready(function (t) {
                            t.widgets.createShareButton(n, e[0], {
                                text: d,
                                hashtags: i,
                                via: r,
                                related: o,
                                size: w,
                                dnt: s
                            }).then(function () {
                                a.remove(); // Remove the original button after creating the new one
                            }).catch(function (error) {
                                console.error('Error creating Twitter button:', error);
                            });
                        });
                    });
                               
            },
        });

        // Attach the handler to Elementor
        elementorFrontend.elementsHandler.attachHandler('wpmozo_ae_twitter_tweet_button', WPMOZOTwitter_Tweet_Button);
    });
} )( jQuery );