(function ($) {
    "use strict";

    qodefCore.shortcodes.stal_core_icon_with_text = {};

    $(window).on('load', function () {
        qodefIconWithText.init();
    });

    var qodefIconWithText = {
        init: function () {
            this.holders = $('.qodef-icon-with-text');

            if (this.holders.length) {
                this.holders.each(function () {
                    var $thisHolder = $(this);

                    if ( $thisHolder.hasClass('qodef-appear-animation--enabled') ) {
                        $thisHolder.appear(function () {
                            $thisHolder.addClass('qodef-appear');
                        }, {accX: 0, accY: -100});
                    }
                });
            }
        },
    };

})(jQuery);