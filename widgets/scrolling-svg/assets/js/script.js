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

            var section = $wrapper[0];
            var ticking = false;

            // ---- Setup stroke lengths ----
            $elements.each(function () {

                let length;

                try {
                    length = this.getTotalLength();
                } catch (e) {
                    length = 400;
                }

                jQuery(this).css({
                    "stroke-dasharray": length,
                    "stroke-dashoffset": length
                });
            });

            function updateAnimation() {

                var rect = section.getBoundingClientRect();
                var windowHeight = window.innerHeight;

                var sectionHeight = rect.height;
                var visible = Math.min(Math.max(windowHeight - rect.top, 0), sectionHeight);

                var progress = visible / sectionHeight;
                progress = Math.min(Math.max(progress, 0), 1);

                $elements.each(function () {

                    let length;

                    try {
                        length = this.getTotalLength();
                    } catch (e) {
                        length = 400;
                    }

                    var draw = length * progress;
                    jQuery(this).css("stroke-dashoffset", length - draw);
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

            // ---- Click Reanimate ----
            if ($wrapper.data('re_animate_on_click') === 'on') {

                $wrapper.on('click', 'svg', function () {

                    $elements.each(function () {

                        let length;

                        try {
                            length = this.getTotalLength();
                        } catch (e) {
                            length = 400;
                        }

                        jQuery(this).css("stroke-dashoffset", length);
                    });

                    setTimeout(requestTick, 50);
                });
            }
        }
    });

    elementorFrontend.elementsHandler.attachHandler(
        "wpmozo_ae_scrolling_svg",
        ScrollingSvgHandler
    );
});