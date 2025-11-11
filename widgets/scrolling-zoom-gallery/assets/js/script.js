(function ($) {
    $(window).on("elementor/frontend/init", function () {

        // Define a custom Elementor frontend handler
        var WPMOZOScrollingZoomGallery = elementorModules.frontend.handlers.Base.extend({

            bindEvents: function () {
                this.change();
            },

            change: function () {
                const $galleryWrapper = this.$element.find('.wpmozo_scrolling_zoom_gallery');

                if ($galleryWrapper.length > 0) {

                    // Wait until all images are loaded before initializing animation
                    $galleryWrapper.imagesLoaded(function () {

                        gsap.registerPlugin(ScrollTrigger);

                        // For each gallery on the page
                        $galleryWrapper.each((index, gallery) => {

                            // Elements inside the gallery
                            let scroller   = gallery.querySelector('.wpmozo_scroll_zoom_gallery_scroller');
                            let innerObj   = gallery.querySelector('.wpmozo_scroll_zoom_gallery_inner');
                            let images     = gallery.querySelectorAll('.wpmozo_scroll_zoom_gallery_item');

                            // Get initial opacity from data attribute
                            let startOpacity = parseFloat(scroller.dataset.start_opacity);
                            let imageCount   = images.length;

                            // GSAP timeline setup with ScrollTrigger
                            let tl = gsap.timeline({
                                defaults: {
                                    duration: imageCount * 2,
                                    ease: 'none'
                                },
                                scrollTrigger: {
                                    trigger: scroller,
                                    start: "top top",
                                    end: `+=${imageCount * 150}%`,
                                    scrub: 1,
                                    pin: true,
                                    anticipatePin: 1,

                                    onEnter: () => document.documentElement.classList.add('wpmozo_hide_scrollbar'),
                                    onLeave: () => document.documentElement.classList.remove('wpmozo_hide_scrollbar'),
                                    onEnterBack: () => document.documentElement.classList.add('wpmozo_hide_scrollbar'),
                                    onLeaveBack: () => document.documentElement.classList.remove('wpmozo_hide_scrollbar')
                                }
                            });

                            // Animate each image in sequence
                            images.forEach((img, i) => {
                                let translateZ = (i + 1) * 200 + 100;
                                let transZ = '-' + (i + 1) * 200;

                                tl.to(innerObj, {
                                    z: translateZ
                                })
                                .fromTo(
                                    img,
                                    { opacity: startOpacity, z: transZ },
                                    { opacity: 1, z: transZ },
                                    i // position in timeline
                                );
                            });
                        });
                    });
                }
            },
        });

        // Attach the handler to Elementor frontend
        elementorFrontend.elementsHandler.attachHandler(
            "wpmozo_ae_scrolling_zoom_gallery",
            WPMOZOScrollingZoomGallery
        );

    });
})(jQuery);
