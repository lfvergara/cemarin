(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefStalSpinner.init();
    });

    $(window).on('elementor/frontend/init', function() {
		var isEditMode = Boolean( elementorFrontend.isEditMode() );
        if( isEditMode) {
            qodefStalSpinner.removeSpinner();
		}
    });

    var qodefStalSpinner = {
        init: function () {
            var $holder = $('#qodef-page-spinner.qodef-layout--stal');
            qodefStalSpinner.windowLoaded = false;

            if ( $holder.length ) {
                if ( qodef.body.is('.error404, .archive, .elementor_library-template-default') ) {
                    qodefStalSpinner.removeSpinner();
                } else {
                    qodefStalSpinner.animateSpinner($holder);
                }
            }
        },
        removeSpinner: function() {
            this.holder = $('#qodef-page-spinner.qodef-layout--stal');
            if (this.holder.length) {
                this.holder.remove();
            }
        },
        animateSpinner: function ($holder) {
            var $spinnerImagesHolder = $holder.find('.qodef-m-stal-images-holder'),
                $spinnerImages = $holder.find('.qodef-m-stal-images-holder > div'),
                stalInterval;

            var animateImagesSecond = function(){
                var animateImagesInterval = setInterval(function() {
                    var activeImage = $spinnerImages.filter('.qodef-stal-spinner-image-animating'),
                        firstImage = $spinnerImages.first();

                    $spinnerImages.removeClass('qodef-stal-spinner-image-animating');
                    if (!activeImage.next().length) {
                        firstImage.addClass('qodef-stal-spinner-image-animating');
                    } else {
                        activeImage.next().addClass('qodef-stal-spinner-image-animating');
                    }
                    
                    if (qodefStalSpinner.windowLoaded) {
                        clearInterval(animateImagesInterval);
                        setTimeout( function() {
                            $holder.addClass('qodef-stal-animate-elements');
                        }, 500);
                        moveOnScroll();
                    }
                }, 1000);
            };

            var animateImagesFirst = function() {
                var delay = 0;

                $spinnerImages.each(function(i) {
                    var $thisImage = $(this);
                    var $spinnerImagesLength = $spinnerImages.length - 1;

                    $spinnerImagesHolder.css('opacity', 1);

                    setTimeout( function() {
                        $thisImage.addClass('qodef-stal-spinner-image-animating');
                        if ($thisImage.hasClass('qodef-stal-spinner-image-animating') ) {
                            $thisImage.prev().removeClass('qodef-stal-spinner-image-animating');
                        }

                        if ( i === $spinnerImagesLength ) {
                            if ( qodefStalSpinner.windowLoaded ) {
                                clearInterval(stalInterval);
                                setTimeout( function() {
                                    $holder.addClass('qodef-stal-animate-elements');
                                }, 500);
                                moveOnScroll();
                            } else {
                                // Continue looping images if window not loaded
                                animateImagesSecond();
                            }
                        }
                    }, delay);
                    delay += 1000;

                    $spinnerImagesHolder.addClass('qodef-stal-animate-border');
                    $spinnerImagesHolder.css('transition-duration', i + 1 + 's');
                });
            };

            var moveOnScroll = function() {
                $('html, body').animate({scrollTop:0}, 100);
                setTimeout( function() {
                    $holder.addClass('qodef-animation-stop');
                    qodefCore.qodefScroll.enable();
                    /*scrollToContent();*/
                }, 1500);
            };

/*            var scrollToContent = function() {
                $(window).one('scroll', function() {
                    $('html, body').animate({'scrollTop': $('#test').offset().top}, 1000);
                });
            };*/

            // Start Spinner Animation Loop
            setTimeout(function() {
                qodefCore.qodefScroll.disable();
                animateImagesFirst();
            }, 250);

            // End Spinner Animation on Window Load
            $(window).on('load', function() {
                qodefStalSpinner.windowLoaded = true;
            });
        },
        fadeOutLoader: function ($holder, speed, delay, easing) {
            speed = speed ? speed : 600;
            delay = delay ? delay : 0;
            easing = easing ? easing : 'swing';

            if ($holder.length) {
                $holder.delay(delay).fadeOut(speed, easing);
                $(window).on('bind', 'pageshow', function (event) {
                    if (event.originalEvent.persisted) {
                        $holder.fadeOut(speed, easing);
                    }
                });
            }
        }
    };

})(jQuery);