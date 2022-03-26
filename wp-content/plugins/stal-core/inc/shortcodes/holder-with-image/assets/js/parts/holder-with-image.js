(function ($) {
    "use strict";

    qodefCore.shortcodes.stal_core_holder_with_image = {};

    $(document).ready(function () {
        qodefHolderWithImage.init();
    });

    $(window).on('load', function () {
        qodefElementorHolderWithImage();
    });

    /**
     * Elementor
     */
    function qodefElementorHolderWithImage() {
        $(window).on('elementor/frontend/init', function () {
            elementorFrontend.hooks.addAction( 'frontend/element_ready/stal_core_holder_with_image.default', function() {
                qodefHolderWithImage.init();
            } );
        });
    }

    var qodefHolderWithImage = {
        init: function () {
            this.holders = $('.qodef-holder-with-image');

            if (this.holders.length) {
                this.holders.each(function () {
                    var $thisHolder = $(this);

                    if ( $thisHolder.hasClass('qodef-appear-animation-enabled--from-left') || $thisHolder.hasClass('qodef-appear-animation-enabled--from-right') ) {
                        var appearContent = $thisHolder.find('.qodef-m-content');

                        appearContent.appear(function () {
                            appearContent.addClass('qodef-appear');
                        }, {accX: 0, accY: -150});
                    }
                });
            }
        }
    };

})(jQuery);