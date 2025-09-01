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
                    getSpeed: true,
                    getDirection: true,
                    reloadOnContextChange: true,
                    tablet: { smooth: false },
                    smartphone: { smooth: false }
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

                // ✅ Function to shuffle array
                function shuffleArray(array) {
                    for (let i = array.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [array[i], array[j]] = [array[j], array[i]];
                    }
                    return array;
                }

                // ✅ Function to clone lines with random shuffle
                function repeatTiles() {
                    const lines = $el[0].querySelectorAll('.tiles__line');
                    lines.forEach(line => {
                        if (!line.classList.contains('is-cloned')) {
                            const clone = line.cloneNode(true);

                            // get all images in clone
                            const imgs = Array.from(clone.querySelectorAll('.tiles__line-img'));

                            // shuffle
                            const shuffled = shuffleArray(imgs);

                            // clear and append shuffled
                            clone.innerHTML = "";
                            shuffled.forEach(img => clone.appendChild(img));

                            clone.classList.add('is-cloned');
                            line.parentNode.appendChild(clone);
                        }
                    });
                }

                // ✅ Call repeat before imagesLoaded
                repeatTiles();

                // ✅ Update after init
                scroll.update();

                // ✅ Update after background images load
                imagesLoaded($el[0].querySelectorAll('.tiles__line-img'), { background: true }, function () {
                    console.log('Background images loaded!');
                    repeatTiles();
                    scroll.update();
                });

                // ✅ Update after full window load (fallback)
                window.addEventListener('load', () => {
                    repeatTiles();
                    scroll.update();
                });
            },
        });
  
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_tile_scroll", WPMOZOTileScroll);
    });
})(jQuery);
