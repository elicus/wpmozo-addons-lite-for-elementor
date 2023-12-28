jQuery(window).on("elementor/frontend/init", function () {
    var e = elementorModules.frontend.handlers.Base.extend({
        bindEvents: function () {
            this.change();
        },
        change: function () {
            jQuery(document).ready(function ($) {
                $("body").on("click", ".wpmozo_ae_toggle_field", function () {
                    var el = $(this);
                    if (el.prop("checked") === !0) {
                        el.closest(".wpmozo_content_toggle")
                            .children(".wpmozo_content_toggle_wrapper")
                            .children(".wpmozo_content_one_toggle")
                            .fadeOut(300, function () {
                                el.closest(".wpmozo_content_toggle")
                                    .children(".wpmozo_content_toggle_wrapper")
                                    .children(".wpmozo_content_two_toggle")
                                    .fadeIn(300, function () {});
                            });
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_one").removeClass("wpmozo_active");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_one").addClass("wpmozo_inactive");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_two").removeClass("wpmozo_inactive");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_two").addClass("wpmozo_active");
                    } else {
                        el.closest(".wpmozo_content_toggle")
                            .children(".wpmozo_content_toggle_wrapper")
                            .children(".wpmozo_content_two_toggle")
                            .fadeOut(300, function () {
                                el.closest(".wpmozo_content_toggle")
                                    .children(".wpmozo_content_toggle_wrapper")
                                    .children(".wpmozo_content_one_toggle")
                                    .fadeIn(300, function () {});
                            });
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_two").removeClass("wpmozo_active");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_two").addClass("wpmozo_inactive");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_one").removeClass("wpmozo_inactive");
                        el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_switch_one").addClass("wpmozo_active");
                    }
                });
                $("body").on("click", ".wpmozo_toggle_title_value", function () {
                    var el = $(this);
                    if (el.hasClass("wpmozo_toggle_on_value")) {
                        if (el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_ae_toggle_field").prop("checked") !== !0) {
                            el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_ae_toggle_field").trigger("click");
                        }
                    } else {
                        if (el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_ae_toggle_field").prop("checked") === !0) {
                            el.closest(".wpmozo_toggle_button_wrapper").find(".wpmozo_ae_toggle_field").trigger("click");
                        }
                    }
                });
            });
        },
    });
    elementorFrontend.elementsHandler.attachHandler("wpmozo_ae_content_toggle_for_elementor", e);
});
