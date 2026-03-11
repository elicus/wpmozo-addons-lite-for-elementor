jQuery(window).on("elementor/frontend/init", function () {

    var ScrollingSvgHandler = elementorModules.frontend.handlers.Base.extend({

        onInit: function () {
            this.initScrollingSVG();
        },

        initScrollingSVG: function () {

            var $wrapper = this.$element.find('.wpmozo_scrolling_svg_wrapper');
            if (!$wrapper.length) return;

            var $inner = $wrapper.find('.wpmozo_scrolling_svg_inner');
            var $svg = $wrapper.find('.animated-svg');
            if (!$svg.length) return;

            var $elements = $svg.find('path, rect, circle, ellipse, polygon, polyline, line');
            if (!$elements.length) return;

            var wrapper = $wrapper[0];
            var inner = $inner[0];

            //var distanceVH = parseFloat($wrapper.data('animation_distance')) || 200;
            //var speed = parseFloat($wrapper.data('animation_speed')) || 3;
            var reverseDraw = $wrapper.data('reverse_draw') === 'yes';
            //var pinSection = $wrapper.data('pin_section') === 'yes';

            //var distancePX = (window.innerHeight * distanceVH) / 100;

            // Prepare SVG paths
            $elements.each(function () {

                var length;

                try {
                    length = this.getTotalLength();
                } catch (e) {
                    length = 400;
                }

                gsap.set(this, {
                    strokeDasharray: length,
                    strokeDashoffset: reverseDraw ? 0 : length
                });

                jQuery(this).attr("data-length", length);

            });

            // Timeline
            var tl = gsap.timeline({
                scrollTrigger: {
                    trigger: wrapper,
                    start: "top top",
                    end: "bottom bottom",
                    scrub: 1,
                    //pin: pinSection ? inner : false,
                    pinSpacing: true,
                    invalidateOnRefresh: true
                }
            });

            $elements.each(function () {

                var length = parseFloat(jQuery(this).attr("data-length"));

                tl.to(this, {
                    strokeDashoffset: reverseDraw ? length : 0,
                    //duration: speed,
                    ease: "none"
                }, 0);

            });

        }

    });

    elementorFrontend.elementsHandler.attachHandler(
        "wpmozo_ae_scrolling_svg",
        ScrollingSvgHandler
    );

});