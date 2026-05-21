( function ( $ ) {
    $( window ).on( 'elementor/frontend/init', function () {
        var WPMOZOTwitter_Embedded_Tweet = elementorModules.frontend.handlers.Base.extend( {
            bindEvents: function () {
                this.change(); // Initial call to set up the tweet
                this.addListeners(); // Set up listeners for changes
            },
            addListeners: function() {
                const self = this;

                // Listen for control changes
                elementorFrontend.hooks.addAction('elementor/controls/changed', function (panel, control) {
                    // Check if this widget is being affected by the control change
                    if (panel.getSettings('wpmozo_ae_twitter_embedded_tweet')) {
                        self.change(); // Update the tweet when any relevant control changes
                    }
                });

                // Listen for refresh events in Elementor
                elementorFrontend.hooks.addAction('elementor/frontend/element/refresh', function (element) {
                    if (element.find('.wpmozo_twitter_embedded_tweet').length) {
                        self.change(); // Re-create the button on updates
                    }
                });
            },
            change: function () {
                const self = this;
                $(document).ready(function () {
                    // Load the Twitter widget script if not already loaded
                    if (typeof window.twttr === 'undefined') {
                        window.twttr = (function (t, e, d) {
                            var n,
                                i = t.getElementsByTagName(e)[0],
                                r = window.twttr || {};
                            if (!t.getElementById(d)) {
                                n = t.createElement(e);
                                n.id = d;
                                n.src = "https://platform.twitter.com/widgets.js";
                                i.parentNode.insertBefore(n, i);
                                r._e = [];
                                r.ready = function (t) {
                                    r._e.push(t);
                                };
                            }
                            return r;
                        })(document, "script", "twitter-wjs");
                    }

                    // Iterate through each embedded tweet
                    $("body").find(".wpmozo_twitter_embedded_tweet").each(function () {
                        let e = $(this).find(".wpmozo_twitter_embedded_tweet_wrapper"),
                            d = $(this).find(".wpmozo_tweet"),
                            n = d.data("id"),
                            i = d.data("theme"),
                            r = d.data("width"),
                            a = d.data("cards"),
                            w = d.data("conversation"),
                            o = d.data("dnt");

                        // Remove the old tweet element before re-creating it
                        d.remove();

                        // Create the new tweet
                        window.twttr.ready(function (t) {
                            t.widgets.createTweet(n, e[0], {
                                theme: i,
                                width: r,
                                cards: a,
                                conversation: w,
                                dnt: o
                            }).then(function () {
                                // Optionally handle success or errors
                            });
                        });
                    });
                });
            },
        });

        // Attach the handler to Elementor
        elementorFrontend.elementsHandler.attachHandler('wpmozo_ae_twitter_embedded_tweet', WPMOZOTwitter_Embedded_Tweet);
    });
} )( jQuery );