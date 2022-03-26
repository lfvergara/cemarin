(function ($) {
    "use strict";

    qodefCore.shortcodes.stal_vertical_split_slider = {};

    $(document).ready(function () {
        qodefVerticalSplitSlider.init();
    });

    var qodefVerticalSplitSlider = {
        init: function () {
            var $holder = $('.qodef-vertical-split-slider'),
                breakpoint = qodefVerticalSplitSlider.getBreakpoint($holder),
                initialHeaderStyle = '';

            if (qodef.body.hasClass('qodef-header--light')) {
                initialHeaderStyle = 'light';
            } else if (qodef.body.hasClass('qodef-header--dark')) {
                initialHeaderStyle = 'dark';
            }

            if ($holder.length) {
                $holder.multiscroll({
                    navigation: true,
                    navigationPosition: 'right',
                    scrollingSpeed: 0,
                    afterRender: function () {
                        qodef.body.addClass('qodef-vertical-split-slider--initialized');
                        qodefVerticalSplitSlider.bodyClassHandler($('.ms-left .ms-section:first-child').data('header-skin'), initialHeaderStyle);
                        qodefVerticalSplitSlider.bodyClassHandlerTwo($('.ms-left .ms-section:first-child').data('bullets-skin'));
                    },
                    onLeave: function (index, nextIndex) {
                        qodefVerticalSplitSlider.bodyClassHandler($($('.ms-left .ms-section')[nextIndex - 1]).data('header-skin'), initialHeaderStyle);
                        qodefVerticalSplitSlider.bodyClassHandlerTwo($($('.ms-left .ms-section')[nextIndex - 1]).data('bullets-skin'));
                    }
                });

                $holder.height(qodef.windowHeight);
                qodefVerticalSplitSlider.buildAndDestroy(breakpoint);

                $(window).resize(function () {
                    qodefVerticalSplitSlider.buildAndDestroy(breakpoint);
                });
            }
        },
        getBreakpoint: function ($holder) {
            if ($holder.hasClass('qodef-disable-below--768')) {
                return 768;
            } else {
                return 1024;
            }
        },
        buildAndDestroy: function (breakpoint) {
            if (qodef.windowWidth <= breakpoint) {
                $.fn.multiscroll.destroy();
                $('html, body').css('overflow', 'initial');
                qodef.body.removeClass('qodef-vertical-split-slider--initialized');
            } else {
                $.fn.multiscroll.build();
                qodef.body.addClass('qodef-vertical-split-slider--initialized');
            }
        },
        bodyClassHandler: function (slideHeaderStyle, initialHeaderStyle) {
            if (slideHeaderStyle !== undefined && slideHeaderStyle !== '') {
                qodef.body.removeClass('qodef-header--light qodef-header--dark').addClass('qodef-header--' + slideHeaderStyle);
            } else if (initialHeaderStyle !== '') {
                qodef.body.removeClass('qodef-header--light qodef-header--dark').addClass('qodef-header--' + slideHeaderStyle);
            } else {
                qodef.body.removeClass('qodef-header--light qodef-header--dark');
            }
        },
	    bodyClassHandlerTwo: function (slideBulletsStyle) {
		    if (slideBulletsStyle !== undefined && slideBulletsStyle !== '') {
			    qodef.body.removeClass('qodef-bullets--light qodef-bullets--dark').addClass('qodef-bullets--' + slideBulletsStyle);
		    } else {
			    qodef.body.removeClass('qodef-bullets--light qodef-bullets--dark');
		    }
	    }
    };

    qodefCore.shortcodes.stal_vertical_split_slider.qodefVerticalSplitSlider = qodefVerticalSplitSlider;

})(jQuery);