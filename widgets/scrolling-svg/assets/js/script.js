jQuery(window).on("elementor/frontend/init", function () {

    var ScrollingSvgHandler = elementorModules.frontend.handlers.Base.extend({

        onInit: function () {
            this.initScrollingSVG();
        },

        initScrollingSVG: function () {

            var $wrapper = this.$element.find('.wpmozo_scrolling_svg_wrapper');
            if (!$wrapper.length) return;

            var $svg = $wrapper.find('.animated-svg');
            if (!$svg.length) return;

            var $elements = $svg.find('path, rect, circle, ellipse, polygon, polyline, line');
            if (!$elements.length) return;

            var section = $wrapper[0];
            var ticking = false;

            // control value
            // var reAnimate = $wrapper.data('re_animate_on_click') === 'yes';

            // ---- Cache Stroke Lengths ----
            $elements.each(function () {

                var length;

                try {
                    length = this.getTotalLength();
                } catch (e) {
                    length = 400;
                }

                jQuery(this)
                    .attr('data-length', length)
                    .css({
                        "stroke-dasharray": length,
                        "stroke-dashoffset": length
                    });

            });


            // ---- Scroll Animation ----
            function updateAnimation() {

                var rect = section.getBoundingClientRect();
                var windowHeight = window.innerHeight;

                var progress = (windowHeight - rect.top) / (windowHeight + rect.height);

                progress = Math.max(0, Math.min(progress, 1));

                $elements.each(function () {

                    var length = parseFloat(jQuery(this).attr('data-length'));

                    var draw = length * progress;

                    jQuery(this).css(
                        "stroke-dashoffset",
                        length - draw
                    );

                });

                ticking = false;
            }


            function requestTick() {

                if (!ticking) {
                    requestAnimationFrame(updateAnimation);
                    ticking = true;
                }

            }

            jQuery(window).on('scroll resize', requestTick);

            requestTick();

        }

    });


    elementorFrontend.elementsHandler.attachHandler(
        "wpmozo_ae_scrolling_svg",
        ScrollingSvgHandler
    );

});