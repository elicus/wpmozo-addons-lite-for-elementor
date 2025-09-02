(function ($) {
    $(window).on("elementor/frontend/init", function () {
  
        var WPMOZOTileScroll = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                document.getElementById('tile_scroll').classList.remove('loading');

                var $el = this.$element.find('#tile_scroll');
                if (!$el.length) return;

                const scroll = new LocomotiveScroll({
                    el: document.querySelector('body'),
                    smooth: true,
                });

                $el.addClass('has-scroll-init has-scroll-smooth');
                document.documentElement.classList.remove(
                    'has-scroll-init',
                    'has-scroll-smooth',
                    'has-scroll-scrolling'
                );

                let scrollTimeout;
                scroll.on('scroll', (args) => {
                    clearTimeout(scrollTimeout);

                    $el.addClass('has-scroll-scrolling');
                    document.documentElement.classList.remove('has-scroll-scrolling');

                    console.log('direction:', args.direction, 'speed:', args.speed);

                    scrollTimeout = setTimeout(() => {
                        $el.removeClass('has-scroll-scrolling');
                    }, 150);
                });

                // ✅ Update after init
                scroll.update();

                // ✅ Update after background images load
                imagesLoaded($el[0].querySelectorAll('.tiles__line-img'), { background: true }, function () {
                    console.log('Background images loaded!');
                    scroll.update();
                });

                // ✅ Update after full window load (fallback)
                window.addEventListener('load', () => {
                    scroll.update();
                });
            },
        });
  
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_tile_scroll", WPMOZOTileScroll);
    });
})(jQuery);
