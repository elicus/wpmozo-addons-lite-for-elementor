(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOCoupon = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                const $this = this.$element.find('.wpmozo_coupon');
                const uniqueId = this.$element.data('id');
                
                const $toast = $this.find('#wpmozo_coupon_tooltip_'+uniqueId);
                $($this).on('click', '.wpmozo_coupon_code', function(e) {
                    const $box = $(this);
                    const code = $box.find('.wpmozo_coupon_code_text').text();

                    navigator.clipboard.writeText(code).then(function() {
                        $toast.addClass('show');

                        setTimeout(function() {
                            $toast.removeClass('show');
                        }, 1500);
                    });
                });
            },
        });
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_coupon", WPMOZOCoupon);
    });
})(jQuery);