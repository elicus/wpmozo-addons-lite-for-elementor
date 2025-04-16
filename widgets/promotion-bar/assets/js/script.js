(function ($) {
    $(window).on("elementor/frontend/init", function () {
        var WPMOZOPromotionBar = elementorModules.frontend.handlers.Base.extend({
            bindEvents: function () {
                this.change();
            },
            change: function () {
                jQuery(document).ready(function ($) {

                    if ($('.wpmozo_promotion_bar').length > 0) {
                        $('.wpmozo_promotion_bar').each(function () {
                            const thisObj = $(this);
                            const wrapObj = thisObj.find('.wpmozo_promotion_bar_wrap');

                            const dateStr = wrapObj.data('timestamp');
                            if (dateStr) {
                                // Update the count down every 1 second.
                                let timerIntervalId = setInterval(function () {

                                    // Find the distance between now and the count down date.
                                    let distance = parseInt(dateStr) - (new Date).getTime() / 1e3;

                                    // Check if days is visible.
                                    if (thisObj.find('.wpmozo_pb_days .wpmozo_pb_number').length > 0) {
                                        let days = parseInt(distance / 86400);
                                        days = (days && days > 0) ? days : 0;
                                        distance %= 86400;
                                        days = (days.toString().length < 2) ? "00".concat(days).slice(-2) : days;

                                        thisObj.find('.wpmozo_pb_days .wpmozo_pb_number').html(days);
                                        if (parseInt(days) < 1) {
                                            thisObj.find('.wpmozo_pb_days').addClass('wpmozo_has_zero_number');
                                        } else if (thisObj.find('.wpmozo_pb_days').hasClass('wpmozo_has_zero_number')) {
                                            thisObj.find('.wpmozo_pb_days').removeClass('wpmozo_has_zero_number');
                                        }
                                    }

                                    let hours = parseInt(distance / 3600);
                                    hours = (hours && hours > 0) ? hours : 0;
                                    distance %= 3600;
                                    let minutes = parseInt(distance / 60);
                                    minutes = (minutes && minutes > 0) ? minutes : 0;
                                    let seconds = parseInt(distance % 60);
                                    seconds = (seconds && seconds > 0) ? seconds : 0;

                                    // add leading zero if number length in single digit.
                                    hours = (hours.toString().length < 2) ? "00".concat(hours).slice(-2) : hours;
                                    minutes = (minutes.toString().length < 2) ? "00".concat(minutes).slice(-2) : minutes;
                                    seconds = (seconds.toString().length < 2) ? "00".concat(seconds).slice(-2) : seconds;

                                    thisObj.find('.wpmozo_pb_hours .wpmozo_pb_number').html(hours);
                                    if (parseInt(hours) < 1) {
                                        thisObj.find('.wpmozo_pb_hours').addClass('wpmozo_has_zero_number');
                                    } else if (thisObj.find('.wpmozo_pb_hours').hasClass('wpmozo_has_zero_number')) {
                                        thisObj.find('.wpmozo_pb_hours').removeClass('wpmozo_has_zero_number');
                                    }

                                    thisObj.find('.wpmozo_pb_minutes .wpmozo_pb_number').html(minutes);
                                    if (parseInt(minutes) < 1) {
                                        thisObj.find('.wpmozo_pb_minutes').addClass('wpmozo_has_zero_number');
                                    } else if (thisObj.find('.wpmozo_pb_minutes').hasClass('wpmozo_has_zero_number')) {
                                        thisObj.find('.wpmozo_pb_minutes').removeClass('wpmozo_has_zero_number');
                                    }

                                    thisObj.find('.wpmozo_pb_seconds .wpmozo_pb_number').html(seconds);
                                    if (parseInt(seconds) < 1) {
                                        thisObj.find('.wpmozo_pb_seconds').addClass('wpmozo_has_zero_number');
                                    } else if (thisObj.find('.wpmozo_pb_seconds').hasClass('wpmozo_has_zero_number')) {
                                        thisObj.find('.wpmozo_pb_seconds').removeClass('wpmozo_has_zero_number');
                                    }

                                    if (distance < 0) {
                                        thisObj.find('.wpmozo_promotion_bar_timer').addClass('wpmozo_timer_expired');
                                        clearInterval(timerIntervalId);
                                    }
                                }, 1000);
                            }
                        });
                    }
                }); // Document.ready.
            },
        });
        elementorFrontend.elementsHandler.attachHandler(
            "wpmozo_ae_promotion_bar",
            WPMOZOPromotionBar
        );
    });
})(jQuery);
