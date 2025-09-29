(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOAdvancedTooltip = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },

            change: function () {
                const $tooltips = this.$element.find('.wpmozo_advanced_tooltip');

                if (!$tooltips.length) return;

                $tooltips.each(function () {
                    let $this = $(this),
                        $wrap = $this.find('.wpmozo_tooltip_trigger_element_wrap');

                    // Get data attributes or fallback to defaults
                    let triggerType     = $wrap.data('trigger-action') || 'mouseenter',
                        animationType   = $wrap.data('animation') || 'fade',
                        duration        = parseInt($wrap.data('duration')) || 350,
                        interactive     = $wrap.data('interactive') === true || $wrap.data('interactive') === 'true',
                        width           = $wrap.data('tooltip-width') || '350',
                        triggerEl       = $wrap.data('trigger-element') || 'button',
                        triggerSelector = $wrap.data('trigger-selector') || '';


                    // 🔧 Fix: Look inside current tooltip instance only
                    let $tooltipContent = $this.find('.wpmozo_advanced_tooltip_content_wrap');
                    if (!$tooltipContent.length) return;

                    // 🔧 Fix: Localize trigger selector
                    let $triggerElement = $this.find('.wpmozo_tooltip_trigger_element');
                    if (triggerEl === 'element_css_id') {
                        $triggerElement = $('#' + triggerSelector);
                    } else if (triggerEl === 'element_css_class') {
                        $triggerElement = $('.' + triggerSelector);
                    }

                    // Initialize tippy.js
                    tippy($triggerElement[0], {
                        content: $tooltipContent.html(),
                        placement: 'auto',
                        trigger: triggerType,
                        animation: animationType,
                        duration: duration,
                        theme: 'light', // Use any theme you've defined in CSS
                        delay: [100, 100],
                        arrow: false,
                        allowHTML: true,
                        interactive: interactive,
                        appendTo: () => document.body,
                        maxWidth: width,
                        popperOptions: {
                            modifiers: [
                                {
                                    name: 'flip',
                                    options: {
                                        fallbackPlacements: ['top', 'bottom', 'left', 'right']
                                    }
                                },
                                {
                                    name: 'zIndex',
                                    enabled: true,
                                    phase: 'write',
                                    fn({ state }) {
                                        state.elements.popper.style.zIndex = '99999';
                                    }
                                }
                            ]
                        }
                    });

                    // Prevent default on button click
                    if (triggerType === 'click' && $this.find('.wpmozo_tooltip_trigger_button').length > 0) {
                        $this.on('click', '.wpmozo_tooltip_trigger_button', function (e) {
                            e.preventDefault();
                        });
                    }
                });
            },
        });

        elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_advanced_tooltip", WPMOZOAdvancedTooltip);
    });
})(jQuery);
