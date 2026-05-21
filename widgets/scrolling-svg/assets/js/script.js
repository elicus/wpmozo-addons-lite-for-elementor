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
            gsap.registerPlugin( ScrollTrigger );
            if ( elementorFrontend.isEditMode() ) {
                this.$element.init(function(){
                    ScrollTrigger.getAll().forEach(trigger => {
                        trigger.refresh();
                    });
                });
            }

            var wrapper = $wrapper[0];
            var inner = $inner[0];

            var reverseDraw = $wrapper.data('reverse_draw') === 'yes';


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
                    start: "top "+$wrapper.data('position_top'),
                    end: "bottom bottom",
                    scrub: 1,
                    pin: inner,
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