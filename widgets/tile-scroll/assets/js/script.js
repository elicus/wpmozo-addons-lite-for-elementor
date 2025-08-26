(function ($) {
    $(window).on("elementor/frontend/init", function () {
  
        var WPMOZOTileScroll = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
  
                // --- Utils: Preload images ---
                function preloadImages(selector = 'img') {
                    return new Promise((resolve) => {
                        if (typeof imagesLoaded === "undefined") {
                            console.error("❌ imagesLoaded not found! Make sure it's enqueued.");
                            resolve();
                            return;
                        }
                        imagesLoaded(document.querySelectorAll(selector), { background: true }, resolve);
                    });
                }
  
                // --- Main ---
                Promise.all([
                    preloadImages('.tiles__line-img')
                ]).then(() => {
                    // Remove loader class
                    document.getElementById('tile_scroll').classList.remove('loading');
  
                    // Initialize Locomotive Scroll
                    if (typeof LocomotiveScroll === "undefined") {
                        console.error("❌ LocomotiveScroll not found! Make sure it's enqueued.");
                        return;
                    }
  
                    const scroll = new LocomotiveScroll({
                        el: document.querySelector('[data-scroll-container]'),
                        smooth: true
                    });
  
                    // Refresh after preload
                    scroll.update();
                });
  
            },
        });
  
        // Attach handler to Elementor widget
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_tile_scroll", WPMOZOTileScroll);
    });
  })(jQuery);
  