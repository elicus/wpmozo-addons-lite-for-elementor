(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOLogoSlider = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                let $winWidth = $(window).width();
                if ($("body").find(".elementor-widget-wpmozo_ale_logo_slider").length > 0) {
                    $("body")
                        .find(".elementor-widget-wpmozo_ale_logo_slider")
                        .each(function () {
                            let $arrows = $(this).find(".wpmozo_ale_swiper_navigation").data();
                            if ($arrows) {
                                if ($winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined") {
                                    wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                    $(this)
                                        .find(".wpmozo_ale_swiper_navigation")
                                        .addClass("wpmozo_ale_arrows_" + $arrows.arrows_desktop);
                                }
                                if ($winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined") {
                                    wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                    $(this)
                                        .find(".wpmozo_ale_swiper_navigation")
                                        .addClass("wpmozo_ale_arrows_" + $arrows.arrows_tablet);
                                }
                                if ($winWidth < 768 && typeof $arrows.arrows_phone !== "undefined") {
                                    wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                    $(this)
                                        .find(".wpmozo_ale_swiper_navigation")
                                        .addClass("wpmozo_ale_arrows_" + $arrows.arrows_phone);
                                }
                                wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                $(this)
                                    .find(".wpmozo_ale_swiper_navigation")
                                    .addClass("wpmozo_ale_arrows_" + $arrows.arrows);
                            }
                        });
                }
                $(window).resize(function () {
                    let $winWidth = $(window).width();
                    if ($("body").find(".wpmozo_ale_swiper_layout").length > 0) {
                        $("body")
                            .find(".wpmozo_ale_swiper_layout")
                            .each(function () {
                                let $arrows = $(this).find(".wpmozo_ale_swiper_navigation").data();
                                if ($arrows) {
                                    if ($winWidth > 980 && typeof $arrows.arrows_desktop !== "undefined") {
                                        wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                        $(this)
                                            .find(".wpmozo_ale_swiper_navigation")
                                            .addClass("wpmozo_ale_arrows_" + $arrows.arrows_desktop);
                                    }
                                    if ($winWidth < 981 && typeof $arrows.arrows_tablet !== "undefined") {
                                        wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                        $(this)
                                            .find(".wpmozo_ale_swiper_navigation")
                                            .addClass("wpmozo_ale_arrows_" + $arrows.arrows_tablet);
                                    }
                                    if ($winWidth < 768 && typeof $arrows.arrows_phone !== "undefined") {
                                        wpmozo_ale_remove_arrows_classes($(this).find(".wpmozo_ale_swiper_navigation"));
                                        $(this)
                                            .find(".wpmozo_ale_swiper_navigation")
                                            .addClass("wpmozo_ale_arrows_" + $arrows.arrows_phone);
                                    }
                                }
                            });
                    }
                });
                function wpmozo_ale_get_arrows_classes() {
                    return [
                        "wpmozo_ale_arrows_top_left",
                        "wpmozo_ale_arrows_top_center",
                        "wpmozo_ale_arrows_top_right",
                        "wpmozo_ale_arrows_bottom_left",
                        "wpmozo_ale_arrows_bottom_center",
                        "wpmozo_ale_arrows_bottom_right",
                        "wpmozo_ale_arrows_outside",
                        "wpmozo_ale_arrows_inside",
                    ];
                }
                function wpmozo_ale_remove_arrows_classes($element) {
                    let $arrowClasses = wpmozo_ale_get_arrows_classes();
                    $element.removeClass($arrowClasses.join(" "));
                }
            },
        });
        elementorFrontend.elementsHandler.attachHandler("wpmozo_ale_logo_slider", WPMOZOLogoSlider);
    });
})(jQuery);
