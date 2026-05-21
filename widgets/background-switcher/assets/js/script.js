(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOBackgroundSwitcher = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                var $this = this.$element.find('.wpmozo_background_switcher');
                $this.find('.wpmozo_background_switcher_item:first-child')
                    .addClass('wpmozo_bg_switcher_hover');
                $transition = $this.find(".wpmozo_background_switcher_inner").data('transition');
                console.log($transition);

                $this.on({
                    mouseenter: function () {
                        var $content = $(this).find('.wpmozo_bg_switcher_hover_content');
                        // Stop any ongoing animation and clear the queue
                        $content.stop(true, false).slideDown($transition);
                        $(this).parent().find('.wpmozo_background_switcher_item')
                            .removeClass('wpmozo_bg_switcher_hover');
                        $(this).addClass('wpmozo_bg_switcher_hover');
                    },
                    mouseleave: function () {
                        var $content = $(this).find('.wpmozo_bg_switcher_hover_content');
                        // Stop any ongoing animation and slide up
                        $content.stop(true, false).slideUp($transition);
                    }
                }, '.wpmozo_background_switcher_item');
            },
        });

        elementorFrontend.elementsHandler.attachHandler(
            "wpmozo_ae_background_switcher",
            WPMOZOBackgroundSwitcher
        );
    });
})(jQuery);
