(function ($) {
	"use strict";
	
	window.qodefCore = {};
	qodefCore.shortcodes = {};
	
	qodefCore.body = $('body');
	qodefCore.html = $('html');
	qodefCore.windowWidth = $(window).width();
	qodefCore.windowHeight = $(window).height();
	qodefCore.scroll = 0;
	
	$(document).ready(function () {
		qodefCore.scroll = $(window).scrollTop();
		qodefInlinePageStyle.init();
	});
	
	$(window).resize(function () {
		qodefCore.windowWidth = $(window).width();
		qodefCore.windowHeight = $(window).height();
	});
	
	$(window).scroll(function () {
		qodefCore.scroll = $(window).scrollTop();
	});

	var qodefScroll = {
		disable: function(){
			if (window.addEventListener) {
				window.addEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}
			
			// window.onmousewheel = document.onmousewheel = qodefScroll.preventDefaultValue;
			document.onkeydown = qodefScroll.keyDown;
		},
		enable: function(){
			if (window.removeEventListener) {
				window.removeEventListener('wheel', qodefScroll.preventDefaultValue, {passive: false});
			}
			window.onmousewheel = document.onmousewheel = document.onkeydown = null;
		},
		preventDefaultValue: function(e){
			e = e || window.event;
			if (e.preventDefault) {
				e.preventDefault();
			}
			e.returnValue = false;
		},
		keyDown: function(e) {
			var keys = [37, 38, 39, 40];
			for (var i = keys.length; i--;) {
				if (e.keyCode === keys[i]) {
					qodefScroll.preventDefaultValue(e);
					return;
				}
			}
		}
	};
	
	qodefCore.qodefScroll = qodefScroll;
	
	var qodefPerfectScrollbar = {
		init: function ($holder) {
			if ($holder.length) {
				qodefPerfectScrollbar.qodefInitScroll($holder);
			}
		},
		qodefInitScroll: function ($holder) {
			var $defaultParams = {
				wheelSpeed: 0.6,
				suppressScrollX: true
			};
			
			var $ps = new PerfectScrollbar($holder[0], $defaultParams);
			$(window).resize(function () {
				$ps.update();
			});
		}
	};
	
	qodefCore.qodefPerfectScrollbar = qodefPerfectScrollbar;
	
	var qodefInlinePageStyle = {
		init: function () {
			this.holder = $('#masterds-core-page-inline-style');
			
			if (this.holder.length) {
				var style = this.holder.data('style');
				
				if (style.length) {
					$('head').append('<style type="text/css">' + style + '</style>');
				}
			}
		}
	};
	
})(jQuery);
(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefBackToTop.init();
    });

    var qodefBackToTop = {
        init: function () {
            this.holder = $('#qodef-back-to-top');

            if(this.holder.length) {
                // Scroll To Top
                this.holder.on('click', function (e) {
                    e.preventDefault();
        
                    $('html, body').animate({scrollTop: 0}, $(window).scrollTop() / 3, 'swing');
                });
    
                qodefBackToTop.showHideBackToTop();
            }
        },
        showHideBackToTop: function () {
            $(window).scroll(function () {
                var $thisItem = $(this),
                    b = $thisItem.scrollTop(),
                    c = $thisItem.height(),
                    d;

                if (b > 0) {
                    d = b + c / 2;
                } else {
                    d = 1;
                }

                if (d < 1e3) {
                    qodefBackToTop.addClass('off');
                } else {
                    qodefBackToTop.addClass('on');
                }
            });
        },
        addClass: function (a) {
            this.holder.removeClass('qodef--off qodef--on');

            if (a === 'on') {
                this.holder.addClass('qodef--on');
            } else {
                this.holder.addClass('qodef--off');
            }
        }
    };

})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefFullscreenMenu.init();
	});
	
	var qodefFullscreenMenu = {
		init: function () {
			var $fullscreenMenuOpener = $('a.qodef-fullscreen-menu-opener'),
				$menuItems = $('.qodef-fullscreen-menu-holder nav ul li a');
			
			// Open popup menu
			$fullscreenMenuOpener.on('click', function (e) {
				e.preventDefault();
				
				if (!qodef.body.hasClass('qodef-fullscreen-menu--opened')) {
					qodefFullscreenMenu.openFullscreen();
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							qodefFullscreenMenu.closeFullscreen();
						}
					});
				} else {
					qodefFullscreenMenu.closeFullscreen();
				}
			});
			
			//open dropdowns
			$menuItems.on('tap click', function (e) {
				var $thisItem = $(this);
				if ($thisItem.parent().hasClass('menu-item-has-children')) {
					e.preventDefault();
					qodefFullscreenMenu.clickItemWithChild($thisItem);
				} else if (($(this).attr('href') !== "http://#") && ($(this).attr('href') !== "#")) {
					qodefFullscreenMenu.closeFullscreen();
				}
			});
		},
		openFullscreen: function () {
			qodef.body.removeClass('qodef-fullscreen-menu-animate--out').addClass('qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in');
			qodefCore.qodefScroll.disable();
		},
		closeFullscreen: function () {
			qodef.body.removeClass('qodef-fullscreen-menu--opened qodef-fullscreen-menu-animate--in').addClass('qodef-fullscreen-menu-animate--out');
			qodefCore.qodefScroll.enable();
			$("nav.qodef-fullscreen-menu ul.sub_menu").slideUp(200);
		},
		clickItemWithChild: function (thisItem) {
			var $thisItemParent = thisItem.parent(),
				$thisItemSubMenu = $thisItemParent.find('.sub-menu').first();
			
			if ($thisItemSubMenu.is(':visible')) {
				$thisItemSubMenu.slideUp(300);
			} else {
				$thisItemSubMenu.slideDown(300);
				$thisItemParent.siblings().find('.sub-menu').slideUp(400);
			}
		}
	};
	
})(jQuery);
(function($){
    "use strict";

    $(document).ready(function () {
        qodefHeaderScrollAppearance.init();
    });

    var qodefHeaderScrollAppearance = {
        appearanceType: function(){
            return qodef.body.attr('class').indexOf('qodef-header-appearance--') !== -1 ? qodef.body.attr('class').match(/qodef-header-appearance--([\w]+)/)[1] : '';
        },
        init: function(){
            var appearanceType = this.appearanceType();

            if(appearanceType !== '' && appearanceType !== 'none'){
                window.qodef[appearanceType+"HeaderAppearance"]();
            }
        }
    };

})(jQuery);

(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefMobileHeaderAppearance.init();
    });

    /*
     **	Init mobile header functionality
     */
    var qodefMobileHeaderAppearance = {
        init: function () {
            if (qodef.body.hasClass('qodef-mobile-header-appearance--sticky')) {

                var docYScroll1 = qodef.scroll,
                    displayAmount = qodefGlobal.vars.mobileHeaderHeight + qodefGlobal.vars.adminBarHeight,
                    $pageOuter = $('#qodef-page-outer');

                qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                $(window).scroll(function () {
                    qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                    docYScroll1 = qodef.scroll;
                });

                $(window).resize(function () {
                    $pageOuter.css('padding-top', 0);
                    qodefMobileHeaderAppearance.showHideMobileHeader(docYScroll1, displayAmount, $pageOuter);
                });
            }
        },
        showHideMobileHeader: function(docYScroll1, displayAmount,$pageOuter){
            if(qodef.windowWidth <= 1024) {
                if (qodef.scroll > displayAmount * 2) {
                    //set header to be fixed
                    qodef.body.addClass('qodef-mobile-header--sticky');

                    //add transition to it
                    setTimeout(function () {
                        qodef.body.addClass('qodef-mobile-header--sticky-animation');
                    }, 300); //300 is duration of sticky header animation

                    //add padding to content so there is no 'jumping'
                    $pageOuter.css('padding-top', qodefGlobal.vars.mobileHeaderHeight);
                } else {
                    //unset fixed header
                    qodef.body.removeClass('qodef-mobile-header--sticky');

                    //remove transition
                    setTimeout(function () {
                        qodef.body.removeClass('qodef-mobile-header--sticky-animation');
                    }, 300); //300 is duration of sticky header animation

                    //remove padding from content since header is not fixed anymore
                    $pageOuter.css('padding-top', 0);
                }

                if ((qodef.scroll > docYScroll1 && qodef.scroll > displayAmount) || (qodef.scroll < displayAmount * 3)) {
                    //show sticky header
                    qodef.body.removeClass('qodef-mobile-header--sticky-display');
                } else {
                    //hide sticky header
                    qodef.body.addClass('qodef-mobile-header--sticky-display');
                }
            }
        }
    };

})(jQuery);
(function ($) {
	"use strict";

	$(document).ready(function () {
		qodefNavMenu.init();
		qodefNavMenu.wideDropdownPosition();
		qodefNavMenu.dropdownPosition();
	});

	var qodefNavMenu = {
		wideDropdownPosition: function () {
			var $menuItems = $(".qodef-header-navigation > ul > li.qodef-menu-item--wide");

			if ($menuItems.length) {
				$menuItems.each(function () {
					var $menuItem = $(this);
					var $menuItemSubMenu = $menuItem.find('.qodef-drop-down-second');

					if ($menuItemSubMenu.length) {
						$menuItemSubMenu.css('left', 0);

						var leftPosition = $menuItemSubMenu.offset().left;

						if (qodef.body.hasClass('qodef--boxed')) {
							//boxed layout case
							var boxedWidth = $('.qodef--boxed .qodef-wrapper .qodef-wrapper-inner').outerWidth();
							leftPosition = leftPosition - (qodef.windowWidth - boxedWidth) / 2;
							$menuItemSubMenu.css({'left': -leftPosition, 'width': boxedWidth});

						} else if (qodef.body.hasClass('qodef-drop-down-second--full-width')) {
							//wide dropdown full width case
							$menuItemSubMenu.css({'left': -leftPosition});
						}
						else {
							//wide dropdown in grid case
							$menuItemSubMenu.css({'left': -leftPosition + (qodef.windowWidth - $menuItemSubMenu.width()) / 2});
						}
					}
				});
			}
		},
		dropdownPosition: function () {
			var $menuItems = $('.qodef-header-navigation > ul > li.qodef-menu-item--narrow.menu-item-has-children');

			if ($menuItems.length) {
				$menuItems.each(function () {
					var $thisItem = $(this),
						menuItemPosition = $thisItem.offset().left,
						$dropdownHolder = $thisItem.find('.qodef-drop-down-second'),
						$dropdownMenuItem = $dropdownHolder.find('.qodef-drop-down-second-inner ul'),
						dropdownMenuWidth = $dropdownMenuItem.outerWidth(),
						menuItemFromLeft = $(window).width() - menuItemPosition;

					var dropDownMenuFromLeft;

					if ($thisItem.find('li.menu-item-has-children').length > 0) {
						dropDownMenuFromLeft = menuItemFromLeft - dropdownMenuWidth;
					}

					$dropdownHolder.removeClass('qodef-drop-down--right');
					$dropdownMenuItem.removeClass('qodef-drop-down--right');
					if (menuItemFromLeft < dropdownMenuWidth || dropDownMenuFromLeft < dropdownMenuWidth) {
						$dropdownHolder.addClass('qodef-drop-down--right');
						$dropdownMenuItem.addClass('qodef-drop-down--right');
					}
				});
			}
		},
		init: function () {
			var $menuItems = $('.qodef-header-navigation > ul > li');

			$menuItems.each(function () {
				var $thisItem = $(this);

				if ($thisItem.find('.qodef-drop-down-second').length) {
					$thisItem.waitForImages(function () {
						var $dropDownHolder = $thisItem.find('.qodef-drop-down-second'),
							$dropdownMenuItem = $dropDownHolder.find('.qodef-drop-down-second-inner ul'),
							dropDownHolderHeight = $dropdownMenuItem.outerHeight();

						if (!qodef.menuDropdownHeightSet) {
							$dropDownHolder.height(0);
						}

						if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
							$thisItem.on("touchstart mouseenter", function () {
								$dropDownHolder.css({
									'height': dropDownHolderHeight,
									'overflow': 'visible',
									'visibility': 'visible',
									'opacity': '1'
								});
							}).on("mouseleave", function () {
								$dropDownHolder.css({
									'height': '0px',
									'overflow': 'hidden',
									'visibility': 'hidden',
									'opacity': '0'
								});
							});
						} else {
							if ($('body').hasClass('qodef-drop-down-second--animate-height')) {
								var animateConfig = {
									interval: 0,
									over: function () {
										setTimeout(function () {
											$dropDownHolder.addClass('qodef-drop-down--start').css({
												'visibility': 'visible',
												'height': '0',
												'opacity': '1'
											});
											$dropDownHolder.stop().animate({
												'height': dropDownHolderHeight
											}, 400, 'easeInOutQuint', function () {
												$dropDownHolder.css('overflow', 'visible');
											});
										}, 100);
									},
									timeout: 100,
									out: function () {
										$dropDownHolder.stop().animate({
											'height': '0',
											'opacity': 0
										}, 100, function () {
											$dropDownHolder.css({
												'overflow': 'hidden',
												'visibility': 'hidden'
											});
										});

										$dropDownHolder.removeClass('qodef-drop-down--start');
									}
								};

								$thisItem.hoverIntent(animateConfig);
							} else {
								var config = {
									interval: 0,
									over: function () {
										setTimeout(function () {
											$dropDownHolder.addClass('qodef-drop-down--start').stop().css({'height': dropDownHolderHeight});
										}, 150);
									},
									timeout: 150,
									out: function () {
										$dropDownHolder.stop().css({'height': '0'}).removeClass('qodef-drop-down--start');
									}
								};
								$thisItem.hoverIntent(config);
							}
						}
					});
				}
			});
		}
	};

})(jQuery);

(function ($) {
    "use strict";

    $(window).on('load', function () {
        qodefParallaxBackground.init();
    });

    /**
     * Init global parallax background functionality
     */
    var qodefParallaxBackground = {
        init: function (settings) {
            this.$sections = $('.qodef-parallax');

            // Allow overriding the default config
            $.extend(this.$sections, settings);

            var isSupported = !qodefCore.html.hasClass('touchevents') && !qodefCore.body.hasClass('qodef-browser--edge') && !qodefCore.body.hasClass('qodef-browser--ms-explorer');

            if (this.$sections.length && isSupported) {
                this.$sections.each(function () {
                    qodefParallaxBackground.ready($(this));
                });
            }
        },
        ready: function ($section) {
            $section.$imgHolder = $section.find('.qodef-parallax-img-holder');
            $section.$imgWrapper = $section.find('.qodef-parallax-img-wrapper');
            $section.$img = $section.find('img.qodef-parallax-img');

            var h = $section.height(),
                imgWrapperH = $section.$imgWrapper.height();

            $section.movement = 100 * (imgWrapperH - h) / h / 2; //percentage (divided by 2 due to absolute img centering in CSS)

            $section.buffer = window.pageYOffset;
            $section.scrollBuffer = null;


            //calc and init loop
            requestAnimationFrame(function () {
                $section.$imgHolder.animate({opacity: 1}, 100);
                qodefParallaxBackground.calc($section);
                qodefParallaxBackground.loop($section);
            });

            //recalc
            $(window).on('resize', function () {
                qodefParallaxBackground.calc($section);
            });
        },
        calc: function ($section) {
            var wH = $section.$imgWrapper.height(),
                wW = $section.$imgWrapper.width();

            if ($section.$img.width() < wW) {
                $section.$img.css({
                    'width': '100%',
                    'height': 'auto'
                });
            }

            if ($section.$img.height() < wH) {
                $section.$img.css({
                    'height': '100%',
                    'width': 'auto',
                    'max-width': 'unset'
                });
            }
        },
        loop: function ($section) {
            if ($section.scrollBuffer === Math.round(window.pageYOffset)) {
                requestAnimationFrame(function () {
                    qodefParallaxBackground.loop($section);
                }); //repeat loop
                return false; //same scroll value, do nothing
            } else {
                $section.scrollBuffer = Math.round(window.pageYOffset);
            }

            var wH = window.outerHeight,
                sTop = $section.offset().top,
                sH = $section.height();

            if ($section.scrollBuffer + wH * 1.2 > sTop && $section.scrollBuffer < sTop + sH) {
                var delta = (Math.abs($section.scrollBuffer + wH - sTop) / (wH + sH)).toFixed(4), //coeff between 0 and 1 based on scroll amount
                    yVal = (delta * $section.movement).toFixed(4);

                if ($section.buffer !== delta) {
                    $section.$imgWrapper.css('transform', 'translate3d(0,' + yVal + '%, 0)');
                }

                $section.buffer = delta;
            }

            requestAnimationFrame(function () {
                qodefParallaxBackground.loop($section);
            }); //repeat loop
        }
    };

    qodefCore.qodefParallaxBackground = qodefParallaxBackground;

})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSideArea.init();
	});
	
	var qodefSideArea = {
		init: function () {
			var $sideAreaOpener = $('a.qodef-side-area-opener'),
				$sideAreaClose = $('#qodef-side-area-close'),
				$sideArea = $('#qodef-side-area');
				qodefSideArea.openerHoverColor($sideAreaOpener);
			// Open Side Area
			$sideAreaOpener.on('click', function (e) {
				e.preventDefault();
				
				if (!qodef.body.hasClass('qodef-side-area--opened')) {
					qodefSideArea.openSideArea();
					
					$(document).keyup(function (e) {
						if (e.keyCode === 27) {
							qodefSideArea.closeSideArea();
						}
					});
				} else {
					qodefSideArea.closeSideArea();
				}
			});
			
			$sideAreaClose.on('click', function (e) {
				e.preventDefault();
				qodefSideArea.closeSideArea();
			});
			
			if ($sideArea.length && typeof window.qodefCore.qodefPerfectScrollbar === 'object') {
				window.qodefCore.qodefPerfectScrollbar.init($sideArea);
			}
		},
		openSideArea: function () {
			var $wrapper = $('#qodef-page-wrapper');
			var currentScroll = $(window).scrollTop();

			$('.qodef-side-area-cover').remove();
			$wrapper.prepend('<div class="qodef-side-area-cover"/>');
			setTimeout( function() {
				qodef.body.removeClass('qodef-side-area-animate--out').addClass('qodef-side-area--opened qodef-side-area-animate--in');
			}, 10);

			$('.qodef-side-area-cover').on('click', function (e) {
				e.preventDefault();
				qodefSideArea.closeSideArea();
			});

			$(window).scroll(function () {
				if (Math.abs(qodef.scroll - currentScroll) > 400) {
					qodefSideArea.closeSideArea();
				}
			});

		},
		closeSideArea: function () {
			qodef.body.removeClass('qodef-side-area--opened qodef-side-area-animate--in').addClass('qodef-side-area-animate--out');
		},
		openerHoverColor: function ($opener) {
			if (typeof $opener.data('hover-color') !== 'undefined') {
				var hoverColor = $opener.data('hover-color');
				var originalColor = $opener.css('color');
				
				$opener.on('mouseenter', function () {
					$opener.css('color', hoverColor);
				}).on('mouseleave', function () {
					$opener.css('color', originalColor);
				});
			}
		}
	};
	
})(jQuery);

(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSpinner.init();
	});

	$(window).on('elementor/frontend/init', function() {
		var isEditMode = Boolean( elementorFrontend.isEditMode() );
        if( isEditMode) {
            qodefSpinner.fadeOutSpinnerElementor();
		}
    });
	
	var qodefSpinner = {
		init: function () {
			this.holder = $('#qodef-page-spinner:not(.qodef-layout--stal)');
			
			if (this.holder.length) {
				qodefSpinner.animateSpinner(this.holder);
				qodefSpinner.fadeOutAnimation();
			}
		},
		animateSpinner: function ($holder) {
			$(window).on('load', function () {
				qodefSpinner.fadeOutLoader($holder);
			});
		},
		fadeOutSpinnerElementor: function() {
			this.holder = $('#qodef-page-spinner:not(.qodef-layout--stal)');
			if (this.holder.length) {
				qodefSpinner.fadeOutLoader(this.holder);
			}
		},
		fadeOutLoader: function ($holder, speed, delay, easing) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';

			$holder.delay(delay).fadeOut(speed, easing);

			$(window).on('bind', 'pageshow', function (event) {
				if (event.originalEvent.persisted) {
					$holder.fadeOut(speed, easing);
				}
			});
		},
		fadeOutAnimation: function () {
			
			// Check for fade out animation
			if (qodefCore.body.hasClass('qodef-spinner--fade-out')) {
				var $pageHolder = $('#qodef-page-wrapper'),
					$linkItems = $('a');
				
				// If back button is pressed, than show content to avoid state where content is on display:none
				window.addEventListener("pageshow", function (event) {
					var historyPath = event.persisted || (typeof window.performance !== "undefined" && window.performance.navigation.type === 2);
					if (historyPath && !$pageHolder.is(':visible')) {
						$pageHolder.show();
					}
				});
				
				$linkItems.on('click', function (e) {
					var $clickedLink = $(this);

					if (
						e.which === 1 && // check if the left mouse button has been pressed
						$clickedLink.attr('href').indexOf(window.location.host) >= 0 && // check if the link is to the same domain
						!$clickedLink.hasClass('remove') && // check is WooCommerce remove link
						$clickedLink.parent('.product-remove').length <= 0 && // check is WooCommerce remove link
						$clickedLink.parents('.woocommerce-product-gallery__image').length <= 0 && // check is product gallery link
						typeof $clickedLink.data('rel') === 'undefined' && // check pretty photo link
						typeof $clickedLink.attr('rel') === 'undefined' && // check VC pretty photo link
						!$clickedLink.hasClass('lightbox-active') && // check is lightbox plugin active
						(typeof $clickedLink.attr('target') === 'undefined' || $clickedLink.attr('target') === '_self') && // check if the link opens in the same window
						$clickedLink.attr('href').split('#')[0] !== window.location.href.split('#')[0] // check if it is an anchor aiming for a different page
					) {
						e.preventDefault();
				
						$pageHolder.fadeOut(600, 'easeOutSine', function () {
							window.location = $clickedLink.attr('href');
						});
					}
				});
			}
		}
	}
	
})(jQuery);
(function ($) {
    "use strict";

    $(window).on('load', function () {
        qodefSubscribeModal.init();
    });

    var qodefSubscribeModal = {
        init: function () {
            this.holder = $('#qodef-subscribe-popup-modal');

            if (this.holder.length) {
                var $preventHolder = this.holder.find('.qodef-sp-prevent'),
                    $modalClose = $('.qodef-sp-close'),
                    disabledPopup = 'no';

                if ($preventHolder.length) {
                    var isLocalStorage = this.holder.hasClass('qodef-sp-prevent-cookies'),
                        $preventInput = $preventHolder.find('.qodef-sp-prevent-input'),
                        preventValue = $preventInput.data('value');

                    if (isLocalStorage) {
                        disabledPopup = localStorage.getItem('disabledPopup');
                        sessionStorage.removeItem('disabledPopup');
                    } else {
                        disabledPopup = sessionStorage.getItem('disabledPopup');
                        localStorage.removeItem('disabledPopup');
                    }

                    $preventHolder.children().on('click', function (e) {
                        if (preventValue !== 'yes') {
                            preventValue = 'yes';
                            $preventInput.addClass('qodef-sp-prevent-clicked').data('value', 'yes');
                        } else {
                            preventValue = 'no';
                            $preventInput.removeClass('qodef-sp-prevent-clicked').data('value', 'no');
                        }

                        if (preventValue === 'yes') {
                            if (isLocalStorage) {
                                localStorage.setItem('disabledPopup', 'yes');
                            } else {
                                sessionStorage.setItem('disabledPopup', 'yes');
                            }
                        } else {
                            if (isLocalStorage) {
                                localStorage.setItem('disabledPopup', 'no');
                            } else {
                                sessionStorage.setItem('disabledPopup', 'no');
                            }
                        }
                    });
                }

                if (disabledPopup !== 'yes') {
                    if (qodef.body.hasClass('qodef-sp-opened')) {
                        qodefSubscribeModal.handleClassAndScroll('remove');
                    } else {
                        qodefSubscribeModal.handleClassAndScroll('add');
                    }

                    $modalClose.on('click', function (e) {
                        e.preventDefault();

                        qodefSubscribeModal.handleClassAndScroll('remove');
                    });

                    // Close on escape
                    $(document).keyup(function (e) {
                        if (e.keyCode === 27) { // KeyCode for ESC button is 27
                            qodefSubscribeModal.handleClassAndScroll('remove');
                        }
                    });
                }
            }
        },

        handleClassAndScroll: function (option) {
            if (option === 'remove') {
                qodef.body.removeClass('qodef-sp-opened');
                qodefCore.qodefScroll.enable();
            }
            if (option === 'add') {
                qodef.body.addClass('qodef-sp-opened');
                qodefCore.qodefScroll.disable();
            }
        },
    };

})(jQuery);
(function ($) {
    "use strict";

    $(document).ready(function () {
        qodefPortfolio.init();
    });


    var qodefPortfolio = {
        init: function () {
            this.holder = $('.qodef-portfolio-info-sticky-holder');
            if (this.holder.length && qodef.windowWidth > 1024) {

                var params = {
                    self: this.holder,
                    infoHolder: this.holder.parent(),
                    infoHolderOffset: this.holder.parent().offset().top,
                    infoHolderHeight: this.holder.parent().height(),
                    mediaHolder: $('.qodef-media'),
                    mediaHolderHeight: $('.qodef-media').height(),
                    header: $('#qodef-page-header'),
                    headerHeight: $('#qodef-page-header').length ? $('#qodef-page-header').height() : 0,
                    constant: 0, //30 to prevent mispositioned
                    marginTop: 0
                };

                qodefPortfolio.infoHolderPosition(params);

                $(window).scroll(function () {
                    qodefPortfolio.recalculateInfoHolderPosition(params);
                });
            }

        },
        infoHolderPosition: function (params) {
            if (params.mediaHolderHeight >= params.infoHolderHeight) {
                if (qodef.scroll >= params.infoHolderOffset - params.headerHeight) {

                    params.marginTop = qodef.scroll - params.infoHolderOffset + params.headerHeight + params.constant;

                    // if scroll is initially positioned below mediaHolderHeight
                    if (params.marginTop + params.infoHolderHeight > params.mediaHolderHeight) {
                        params.marginTop = params.mediaHolderHeight - params.infoHolderHeight + params.constant;
                    }

                    params.self.stop().animate({
                        marginTop: params.marginTop
                    });
                }
            }
        },

        recalculateInfoHolderPosition: function (params) {
            // this is updated after scroll - for ie issue on starting height
            params.mediaHolderHeight = params.mediaHolder ? params.mediaHolder.height() : 0;
            if (params.mediaHolderHeight >= params.infoHolderHeight) {

                //Calculate header height if header appears
                if (qodef.scroll > 0) {
                    params.headerHeight = params.header.height();
                }

                var headerMixin = params.headerHeight + params.constant;

                if (qodef.scroll >= params.infoHolderOffset - headerMixin) {
                    if (qodef.scroll + params.infoHolderHeight + headerMixin + 2 * params.constant < params.infoHolderOffset + params.mediaHolderHeight) {
                        params.self.stop().animate({
                            marginTop: (qodef.scroll - params.infoHolderOffset + headerMixin + 2 * params.constant)
                        });

                        //Reset header height
                        params.headerHeight = 0;

                    } else {
                        params.self.stop().animate({
                            marginTop: params.mediaHolderHeight - params.infoHolderHeight
                        });
                    }
                } else {
                    params.self.stop().animate({
                        marginTop: 0
                    });
                }
            }
        },
    };
})(jQuery);



(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_accordion = {};
	
	$(document).ready(function () {
		qodefAccordion.init();
	});
	
	var qodefAccordion = {
		init: function () {
			this.holder = $('.qodef-accordion');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					
					if ($thisHolder.hasClass('qodef-behavior--accordion')) {
						qodefAccordion.initAccordion($thisHolder);
					}
					
					if ($thisHolder.hasClass('qodef-behavior--toggle')) {
						qodefAccordion.initToggle($thisHolder);
					}
					
					$thisHolder.addClass('qodef--init');
				});
			}
		},
		initAccordion: function ($accordion) {
			$accordion.accordion({
				animate: "swing",
				collapsible: true,
				active: 1,
				icons: "",
				heightStyle: "content"
			});
		},
		initToggle: function ($toggle) {
			var $toggleAccordionTitle = $toggle.find('.qodef-accordion-title'),
				$toggleAccordionContent = $toggleAccordionTitle.next();
			
			$toggle.addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset");
			$toggleAccordionTitle.addClass("ui-accordion-header ui-state-default ui-corner-top ui-corner-bottom");
			$toggleAccordionContent.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();
			
			$toggleAccordionTitle.each(function () {
				var $thisTitle = $(this);
				
				$thisTitle.hover(function () {
					$thisTitle.toggleClass("ui-state-hover");
				});
				
				$thisTitle.on('click', function () {
					$thisTitle.toggleClass('ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom');
					$thisTitle.next().toggleClass('ui-accordion-content-active').slideToggle(400);
				});
			});
		}
	};

	qodefCore.shortcodes.stal_core_accordion.qodefAccordion = qodefAccordion;
	
})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.masterds_core_button = {};
	
	$(document).ready(function () {
		qodefButton.init();
	});
	
	var qodefButton = {
		init: function () {
			this.buttons = $('.qodef-button');
			
			if (this.buttons.length) {
				this.buttons.each(function () {
					var $thisButton = $(this);
					
					qodefButton.buttonHoverColor($thisButton);
					qodefButton.buttonHoverBgColor($thisButton);
					qodefButton.buttonHoverBorderColor($thisButton);
				});
			}
		},
		buttonHoverColor: function ($button) {
			if (typeof $button.data('hover-color') !== 'undefined') {
				var hoverColor = $button.data('hover-color');
				var originalColor = $button.css('color');
				
				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'color', hoverColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'color', originalColor);
				});
			}
		},
		buttonHoverBgColor: function ($button) {
			if (typeof $button.data('hover-background-color') !== 'undefined') {
				var hoverBackgroundColor = $button.data('hover-background-color');
				var originalBackgroundColor = $button.css('background-color');

				if (typeof $button.hasClass('qodef-layout-splitted') ) {
					var splitElements = $button.find('.qodef-m-split');

					splitElements.css('background-color', hoverBackgroundColor);

					hoverBackgroundColor = originalBackgroundColor;
				}

				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'background-color', hoverBackgroundColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'background-color', originalBackgroundColor);
				});
			}
		},
		buttonHoverBorderColor: function ($button) {
			if (typeof $button.data('hover-border-color') !== 'undefined') {
				var hoverBorderColor = $button.data('hover-border-color');
				var originalBorderColor = $button.css('borderTopColor');
				
				$button.on('mouseenter', function () {
					qodefButton.changeColor($button, 'border-color', hoverBorderColor);
				});
				$button.on('mouseleave', function () {
					qodefButton.changeColor($button, 'border-color', originalBorderColor);
				});
			}
		},
		changeColor: function ($button, cssProperty, color) {
			$button.css(cssProperty, color);
		}
	};
	
	qodefCore.shortcodes.masterds_core_button.qodefButton = qodefButton;
})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.masterds_core_cards_gallery = {};
	
	$(document).ready(function () {
		qodefCardsGallery.init();
	});
	
	var qodefCardsGallery = {
		init: function () {
			this.holder = $('.qodef-cards-gallery');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					if ( $thisHolder.hasClass('qodef-gallery--enabled') ) {
						qodefCardsGallery.initCards($thisHolder);
					}
					qodefCardsGallery.initBundle( $thisHolder );
				});
			}
		},
		initCards: function ($holder) {
			var $cards = $holder.find('.qodef-m-card');
			$cards.each(function () {
				var $card = $(this);
				
				$card.on('click', function () {
					if (!$cards.last().is($card)) {
						$card.addClass('qodef-out qodef-animating').siblings().addClass('qodef-animating-siblings');
						$card.detach();
						$card.insertAfter($cards.last());
						
						setTimeout(function () {
							$card.removeClass('qodef-out');
						}, 200);
						
						setTimeout(function () {
							$card.removeClass('qodef-animating').siblings().removeClass('qodef-animating-siblings');
						}, 1200);
						
						$cards = $holder.find('.qodef-m-card');
						
						return false;
					}
				});
				
				
			});
		},
		initBundle: function($holder) {
			if ( $holder.hasClass('qodef-animation--bundle') ) {
				$holder.appear(function () {
					$holder.addClass('qodef-appeared');
					$holder.find('img').one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function () {
						$(this).addClass('qodef-animation-done');
					});
				}, {accX: 0, accY: -150});
			}
		}
	};
	
	qodefCore.shortcodes.masterds_core_cards_gallery.qodefCardsGallery  = qodefCardsGallery;
	
})(jQuery);
(function ($) {
	"use strict";
	
	qodefCore.shortcodes.stal_core_charts = {};
	
	$(document).ready(function () {
		qodefCharts.init();
	});
	
	var qodefCharts = {
		init: function () {
			this.charts = $('.qodef-charts');
			if (this.charts.length) {
				this.charts.each(function () {
					var thisChartHolder = $(this),
						thisChartCanvasId = thisChartHolder.find('canvas').attr('id');
					
					qodefCharts.generateOptions(thisChartHolder, thisChartCanvasId);
				});
			}
		},
		generateOptions: function(thisChartHolder,thisChartCanvasId) {
			thisChartHolder.height(thisChartHolder.width() / 2);
			var noOfDatasets = thisChartHolder.data('no_of_used_datasets');
			var pointGroupLabels = thisChartHolder.data('point_group_labels');
			
			var pointGroupColors = '',
				dataset_1,
				dataset_1_color,
				dataset_2,
				dataset_2_color,
				dataset_3,
				dataset_3_color,
				datasets;
			
			if (thisChartHolder.data('color_scheme') == 'dataset') {
				dataset_1_color = thisChartHolder.data('dataset_1_color');
			}
			else {
				dataset_1_color = thisChartHolder.data('point_group_colors').split(',');
			}
			
			dataset_1 = {
				fill: true,
				label: thisChartHolder.data('dataset_1_label'),
				backgroundColor: dataset_1_color,
				data: thisChartHolder.data('dataset_1').split(','),
				cubicInterpolationMode: 'monotone'
			};
			
			datasets = [dataset_1];
			
			if (noOfDatasets >= 2) {
				if (thisChartHolder.data('color_scheme') == 'dataset') {
					dataset_2_color = thisChartHolder.data('dataset_2_color');
				}
				else {
					dataset_2_color = thisChartHolder.data('point_group_colors').split(',');
				}
				
				dataset_2 = {
					fill: true,
					label: thisChartHolder.data('dataset_2_label'),
					backgroundColor: dataset_2_color,
					data: thisChartHolder.data('dataset_2').split(','),
					cubicInterpolationMode: 'monotone'
				};
				
				datasets = [dataset_1, dataset_2];
			}
			
			if (noOfDatasets >= 3) {
				if (thisChartHolder.data('color_scheme') == 'dataset') {
					dataset_3_color = thisChartHolder.data('dataset_3_color');
				}
				else {
					dataset_3_color = thisChartHolder.data('point_group_colors').split(',');
				}
				
				dataset_3 = {
					fill: true,
					label: thisChartHolder.data('dataset_3_label'),
					backgroundColor: dataset_3_color,
					data: thisChartHolder.data('dataset_3').split(','),
					cubicInterpolationMode: 'monotone'
				};
				
				datasets = [dataset_1, dataset_2, dataset_3];
			}
			
			var thisChartParams = {
				labels: pointGroupLabels.split(','),
				datasets: datasets
			};
			
			var ctx = document.getElementById(thisChartCanvasId).getContext('2d');
			
			qodefCharts.chartAppear(thisChartHolder, ctx, thisChartParams);
		},
		chartAppear: function (holder, ctx, thisChartParams) {
			var legendPosition = holder.data('legend_position'),
				chartType = holder.data('type'),
				startAtZero = '';
			
			if (qodef.windowWidth < 600) {
				legendPosition = 'bottom';
			}
			
			if (chartType == 'line' || chartType == 'horizontalBar' || chartType == 'bar') {
				startAtZero = {
					y: {
						ticks: {
							beginAtZero: true
						}
					},
					x: {
						ticks: {
							beginAtZero: true
						}
					}
				};
			}
			holder.appear(function () {
				holder.addClass('qodef-appeared');
				
				setTimeout(function () {



					window.myBar = new Chart(ctx, {
						type: chartType,
						data: thisChartParams,
						options: {
							responsive: true,
							plugins:{
								legend: {
									position: legendPosition,
								},
								tooltip: {
									titleFont:{
										size: 16
									},
									titleColor: '#ee0d08',
									backgroundColor: '#eef2f5',
									titleMarginBottom: 4,
									bodyColor: '#747474',
									bodyFont:{
										size: 13
									},
									displayColors: false
								}
							},
							scales: {
								x: {
									ticks: {
										font:{
											size: 15
										},
										color: '#9c9c9c',
									}
								},
								y: {
									ticks: {
										beginAtZero:true,
										font:{
											size: 13
										},
										padding: 20,
										color: '#9c9c9c',
									}
								},
							}
						},
					});
					
					
				}, 500);
			}, {accX: 0, accY: -100});
		}
	};
	
	qodefCore.shortcodes.stal_core_charts.qodefCharts  = qodefCharts;
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_countdown = {};
	
	$(document).ready(function () {
		qodefCountdown.init();
	});
	
	var qodefCountdown = {
		init: function () {
			this.countdowns = $('.qodef-countdown');
			
			if (this.countdowns.length) {
				this.countdowns.each(function () {
					var $thisCountdown = $(this),
						$countdownElement = $thisCountdown.find('.qodef-m-date'),
						options = qodefCountdown.generateOptions($thisCountdown);
					
					qodefCountdown.initCountdown($countdownElement, options);
				});
			}
		},
		generateOptions: function($countdown) {
			var options = {};
			options.date = typeof $countdown.data('date') !== 'undefined' ? $countdown.data('date') : null;
			
			options.weekLabel = typeof $countdown.data('week-label') !== 'undefined' ? $countdown.data('week-label') : '';
			options.weekLabelPlural = typeof $countdown.data('week-label-plural') !== 'undefined' ? $countdown.data('week-label-plural') : '';
			
			options.dayLabel = typeof $countdown.data('day-label') !== 'undefined' ? $countdown.data('day-label') : '';
			options.dayLabelPlural = typeof $countdown.data('day-label-plural') !== 'undefined' ? $countdown.data('day-label-plural') : '';
			
			options.hourLabel = typeof $countdown.data('hour-label') !== 'undefined' ? $countdown.data('hour-label') : '';
			options.hourLabelPlural = typeof $countdown.data('hour-label-plural') !== 'undefined' ? $countdown.data('hour-label-plural') : '';
			
			options.minuteLabel = typeof $countdown.data('minute-label') !== 'undefined' ? $countdown.data('minute-label') : '';
			options.minuteLabelPlural = typeof $countdown.data('minute-label-plural') !== 'undefined' ? $countdown.data('minute-label-plural') : '';
			
			options.secondLabel = typeof $countdown.data('second-label') !== 'undefined' ? $countdown.data('second-label') : '';
			options.secondLabelPlural = typeof $countdown.data('second-label-plural') !== 'undefined' ? $countdown.data('second-label-plural') : '';
			
			return options;
		},
		initCountdown: function ($countdownElement, options) {
			var $weekHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit-wrapper-inner"><span class="qodef-label">' + '%!w:' + options.weekLabel + ',' + options.weekLabelPlural + ';</span><span class="qodef-digit">%w</span></span></span>';
			var $dayHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit-wrapper-inner"><span class="qodef-label">' + '%!d:' + options.dayLabel + ',' + options.dayLabelPlural + ';</span><span class="qodef-digit">%d</span></span></span>';
			var $hourHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit-wrapper-inner"><span class="qodef-label">' + '%!H:' + options.hourLabel + ',' + options.hourLabelPlural + ';</span><span class="qodef-digit">%H</span></span></span>';
			var $minuteHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit-wrapper-inner"><span class="qodef-label">' + '%!M:' + options.minuteLabel + ',' + options.minuteLabelPlural + ';</span><span class="qodef-digit">%M</span></span></span>';
			var $secondHTML = '<span class="qodef-digit-wrapper"><span class="qodef-digit-wrapper-inner"><span class="qodef-label">' + '%!S:' + options.secondLabel + ',' + options.secondLabelPlural + ';</span><span class="qodef-digit">%S</span></span></span>';
			
			$countdownElement.countdown(options.date, function(event) {
				$(this).html(event.strftime($weekHTML + $dayHTML + $hourHTML + $minuteHTML + $secondHTML));
			});
		}
	};

	qodefCore.shortcodes.stal_core_countdown.qodefCountdown  = qodefCountdown;
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_counter = {};
	
	$(document).ready(function () {
		qodefCounter.init();
	});
	
	var qodefCounter = {
		init: function () {
			this.counters = $('.qodef-counter');
			
			if (this.counters.length) {
				this.counters.each(function () {
					var $thisCounter = $(this),
						$counterElement = $thisCounter.find('.qodef-m-digit'),
						options = qodefCounter.generateOptions($thisCounter);
					
					qodefCounter.counterScript($counterElement, options);
				});
			}
		},
		generateOptions: function($counter) {
			var options = {};
			options.start = typeof $counter.data('start-digit') !== 'undefined' && $counter.data('start-digit') !== '' ? $counter.data('start-digit') : 0;
			options.end = typeof $counter.data('end-digit') !== 'undefined' && $counter.data('end-digit') !== '' ? $counter.data('end-digit') : null;
			options.step = typeof $counter.data('step-digit') !== 'undefined' && $counter.data('step-digit') !== '' ? $counter.data('step-digit') : 1;
			options.delay = typeof $counter.data('step-delay') !== 'undefined' && $counter.data('step-delay') !== '' ? parseInt( $counter.data('step-delay'), 10 ) : 100;
			options.txt = typeof $counter.data('digit-label') !== 'undefined' && $counter.data('digit-label') !== '' ? $counter.data('digit-label') : '';
			
			return options;
		},
		counterScript: function ($counterElement, options) {
			var defaults = {
				start: 0,
				end: null,
				step: 1,
				delay: 100,
				txt: ""
			};
			
			var settings = $.extend(defaults, options || {});
			var nb_start = settings.start;
			var nb_end = settings.end;
			
			$counterElement.text(nb_start + settings.txt);
			
			var counter = function() {
				// Definition of conditions of arrest
				if (nb_end !== null && nb_start >= nb_end) {
					return;
				}
				// incrementation
				nb_start = nb_start + settings.step;
				
				if( nb_start >= nb_end ) {
					nb_start = nb_end;
				}
				// display
				$counterElement.text(nb_start + settings.txt);
			};

			$counterElement.appear(function() {
				setInterval(counter, settings.delay);
			}, { accX: 0, accY: 0 });
		}
	};

	qodefCore.shortcodes.stal_core_counter.qodefCounter  = qodefCounter;
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_google_map = {};
	
	$(document).ready(function () {
		qodefGoogleMap.init();
	});
	
	var qodefGoogleMap = {
		init: function () {
			this.holder = $('.qodef-google-map');
			
			if (this.holder.length) {
				this.holder.each(function () {
					if (qodefCore.qodefGoogleMap !== undefined) {
						qodefCore.qodefGoogleMap.initMap($(this).find('.qodef-m-map'));
					}
				});
			}
		}
	};
	qodefCore.shortcodes.stal_core_google_map.qodefGoogleMap  = qodefGoogleMap;
})(jQuery);
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
(function ($) {
    "use strict";

    qodefCore.shortcodes.stal_core_icon = {};

    $(document).ready(function () {
        qodefIcon.init();
    });

    var qodefIcon = {
        init: function () {
            this.icons = $('.qodef-icon-holder');

            if (this.icons.length) {
                this.icons.each(function () {
                    var $thisIcon = $(this);

                    qodefIcon.iconHoverColor($thisIcon);
                    qodefIcon.iconHoverBgColor($thisIcon);
                    qodefIcon.iconHoverBorderColor($thisIcon);
                });
            }
        },
        iconHoverColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-color') !== 'undefined') {
                var spanHolder = $iconHolder.find('span');
                var originalColor = spanHolder.css('color');
                var hoverColor = $iconHolder.data('hover-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor(spanHolder, 'color', hoverColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor(spanHolder, 'color', originalColor);
                });
            }
        },
        iconHoverBgColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-background-color') !== 'undefined') {
                var hoverBackgroundColor = $iconHolder.data('hover-background-color');
                var originalBackgroundColor = $iconHolder.css('background-color');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', hoverBackgroundColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'background-color', originalBackgroundColor);
                });
            }
        },
        iconHoverBorderColor: function ($iconHolder) {
            if (typeof $iconHolder.data('hover-border-color') !== 'undefined') {
                var hoverBorderColor = $iconHolder.data('hover-border-color');
                var originalBorderColor = $iconHolder.css('borderTopColor');

                $iconHolder.on('mouseenter', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', hoverBorderColor);
                });
                $iconHolder.on('mouseleave', function () {
                    qodefIcon.changeColor($iconHolder, 'border-color', originalBorderColor);
                });
            }
        },
        changeColor: function (iconElement, cssProperty, color) {
            iconElement.css(cssProperty, color);
        }
    };

    qodefCore.shortcodes.stal_core_icon.qodefIcon = qodefIcon;

})(jQuery);
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
(function ($) {
    "use strict";
	qodefCore.shortcodes.stal_core_image_gallery = {};
	qodefCore.shortcodes.stal_core_image_gallery.qodefSwiper = qodef.qodefSwiper;
	qodefCore.shortcodes.stal_core_image_gallery.qodefMasonryLayout = qodef.qodefMasonryLayout;

})(jQuery);
(function ($) {
    "use strict";

	qodefCore.shortcodes.stal_core_image_with_text = {};
    qodefCore.shortcodes.stal_core_image_with_text.qodefMagnificPopup = qodef.qodefMagnificPopup;

})(jQuery);
(function($) {
	'use strict';

	qodefCore.shortcodes.stal_core_interactive_banner = {};
	
	$(document).ready(function () {
		qodefInteractiveBanner.init();
	});
	
	var qodefInteractiveBanner = {
		init: function () {
			this.holder = $('.qodef-interactive-banners');
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this),
						$imagesHolder = $thisHolder.find('.qodef-ib-images-holder');
					$imagesHolder.css('background-image', $imagesHolder.find('.qodef-ib-image-holder').first().css('background-image'));
					qodefInteractiveBanner.mouseEnter($thisHolder, $imagesHolder);
				});
			}
		},
		mouseEnter: function ($holder, $images) {
			var $imagesHolderItem = $images.find('.qodef-ib-image-holder'),
				$items = $holder.find('.qodef-ib-item'),
				$activeItemIndex = 0;
			
			$items.on("mouseenter", function () {
				$items.removeClass('qodef-active');
				$(this).addClass('qodef-active');
				$activeItemIndex = $(this).index();
				setTimeout( function() {
					$imagesHolderItem.removeClass('qodef-active');
					$images.find('.qodef-ib-image-holder').eq($activeItemIndex).addClass('qodef-active');
				}, 350);
			});
		},
		mouseleave: function ($holder, $images) {
			var $imagesHolderItem = $images.find('.qodef-ib-image-holder'),
				$items = $holder.find('.qodef-ib-item'),
				$activeItemIndex = 0;
			
			$items.on("mouseenter", function () {
				$items.removeClass('qodef-active');
			});
		}
	};

	qodefCore.shortcodes.stal_core_interactive_banner.qodefInteractiveBanner = qodefInteractiveBanner;
	
})(jQuery);
(function ($) {
	'use strict';

	qodefCore.shortcodes.stal_core_progress_bar = {};

	$(document).ready(function () {
		qodefProgressBar.init();
	});

	/**
	 * Init progress bar shortcode functionality
	 */
	var qodefProgressBar = {
		init: function () {
			this.holder = $('.qodef-progress-bar');

			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this),
						layout = $thisHolder.data('layout');

					$thisHolder.appear(function () {
						$thisHolder.addClass('qodef--init');

						var $container = $thisHolder.find('.qodef-m-canvas'),
							data = qodefProgressBar.generateBarData($thisHolder, layout),
							number = $thisHolder.data('number') / 100;

						switch (layout) {
							case 'circle':
								qodefProgressBar.initCircleBar($container, data, number);
								break;
							case 'semi-circle':
								qodefProgressBar.initSemiCircleBar($container, data, number);
								break;
							case 'line':
								data = qodefProgressBar.generateLineData($thisHolder, number);
								qodefProgressBar.initLineBar($container, data);
								break;
							case 'custom':
								qodefProgressBar.initCustomBar($container, data, number);
								break;
						}
					});
				});
			}
		},
		generateBarData: function (thisBar, layout) {
			var activeWidth = thisBar.data('active-line-width');
			var activeColor = thisBar.data('active-line-color');
			var inactiveWidth = thisBar.data('inactive-line-width');
			var inactiveColor = thisBar.data('inactive-line-color');
			var easing = 'linear';
			var duration = typeof thisBar.data('duration') !== 'undefined' && thisBar.data('duration') !== '' ? parseInt(thisBar.data('duration'), 10) : 1600;
			var textColor = thisBar.data('text-color');

			return {
				strokeWidth: activeWidth,
				color: activeColor,
				trailWidth: inactiveWidth,
				trailColor: inactiveColor,
				easing: easing,
				duration: duration,
				svgStyle: {
					width: '100%',
					height: '100%'
				},
				text: {
					style: {
						color: textColor
					},
					autoStyleContainer: false
				},
				from: {
					color: inactiveColor
				},
				to: {
					color: activeColor
				},
				step: function (state, bar) {
					if (layout !== 'custom') {
						bar.setText(Math.round(bar.value() * 100) + '%');
					}
				}
			};
		},
		generateLineData: function (thisBar, number) {
			var height = thisBar.data('active-line-width');
			var activeColor = thisBar.data('active-line-color');
			var inactiveHeight = thisBar.data('inactive-line-width');
			var inactiveColor = thisBar.data('inactive-line-color');
			var duration = typeof thisBar.data('duration') !== 'undefined' && thisBar.data('duration') !== '' ? parseInt(thisBar.data('duration'), 10) : 1600;
			var textColor = thisBar.data('text-color');

			return {
				percentage: number * 100,
				duration: duration,
				fillBackgroundColor: activeColor,
				color: activeColor,
				backgroundColor: inactiveColor,
				height: height,
				inactiveHeight: inactiveHeight,
				followText: thisBar.hasClass('qodef-percentage--floating'),
				textColor: textColor
			};
		},
		initCircleBar: function ($container, data, number) {
			if (qodefProgressBar.checkBar($container)) {
				var $bar = new ProgressBar.Circle($container[0], data);

				$bar.animate(number);
			}
		},
		initSemiCircleBar: function ($container, data, number) {
			if (qodefProgressBar.checkBar($container)) {
				var $bar = new ProgressBar.SemiCircle($container[0], data);

				$bar.animate(number);
			}
		},
		initCustomBar: function ($container, data, number) {
			if (qodefProgressBar.checkBar($container)) {
				var $bar = new ProgressBar.Path($container[0], data);

				$bar.set(0);
				$bar.animate(number);
			}
		},
		initLineBar: function ($container, data) {
			$container.LineProgressbar(data);

			var $line = $('.qodef-progress-bar.qodef-layout--line .proggress');
			var $num = $('.qodef-progress-bar.qodef-layout--line .percentCount');
			$line.css('color', data['fillBackgroundColor']);
			$num.css('color', data['textColor']);
		},
		checkBar: function ($container) {
			// check if svg is already in container, elementor fix
			if ($container.find('svg').length) {
				return false;
			}

			return true;
		}
	};

	qodefCore.shortcodes.stal_core_progress_bar.qodefProgressBar = qodefProgressBar;

})(jQuery);

(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_swapping_image_gallery = {};
	
	$(document).ready(function () {
		qodefSwappingImageGallery.init();
	});
	
	var qodefSwappingImageGallery = {
		init: function () {
			this.holder = $('.qodef-swapping-image-gallery');
			
			if (this.holder.length) {
				this.holder.each(function () {
					var $thisHolder = $(this);
					qodefSwappingImageGallery.createSlider($thisHolder);
				});
			}
		},
		createSlider: function ($holder) {
			var $swiperHolder = $holder.find('.qodef-m-image-holder');
			var $paginationHolder = $holder.find('.qodef-m-thumbnails-holder .qodef-grid-inner');
			var spaceBetween = 0;
			var slidesPerView = 1;
			var centeredSlides = false;
			var loop = false;
			var autoplay = false;
			var speed = 800;
			
			var $swiper = new Swiper($swiperHolder, {
				slidesPerView: slidesPerView,
				centeredSlides: centeredSlides,
				spaceBetween: spaceBetween,
				autoplay: autoplay,
				loop: loop,
				speed: speed,
				pagination: {
					el: $paginationHolder,
					type: 'custom',
					clickable: true,
					bulletClass: 'qodef-m-thumbnail'
				},
				on: {
					init: function () {
						$swiperHolder.addClass('qodef-swiper--initialized');
						$paginationHolder.find('.qodef-m-thumbnail').eq(0).addClass('qodef--active');
					},
					slideChange: function slideChange() {
						var swiper = this;
						var activeIndex = swiper.activeIndex;
						$paginationHolder.find('.qodef--active').removeClass('qodef--active');
						$paginationHolder.find('.qodef-m-thumbnail').eq(activeIndex).addClass('qodef--active');
					}
				}
			});
		}
	};

	qodefCore.shortcodes.stal_core_swapping_image_gallery.qodefSwappingImageGallery = qodefSwappingImageGallery;
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_tabs = {};
	
	$(document).ready(function () {
		qodefTabs.init();
	});
	
	var qodefTabs = {
		init: function () {
			this.holder = $('.qodef-tabs');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefTabs.initTabs($(this));
				});
			}
		},
		initTabs: function ($tabs) {
			$tabs.children('.qodef-tabs-content').each(function (index) {
				index = index + 1;
				
				var $that = $(this),
					link = $that.attr('id'),
					$navItem = $that.parent().find('.qodef-tabs-navigation li:nth-child(' + index + ') a'),
					navLink = $navItem.attr('href');
				
				link = '#' + link;
				
				if (link.indexOf(navLink) > -1) {
					$navItem.attr('href', link);
				}
			});
			
			$tabs.addClass('qodef--init').tabs();
		}
	};

	qodefCore.shortcodes.stal_core_tabs.qodefTabs = qodefTabs;
	
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_text_marquee = {};
	
	$(document).ready(function () {
		qodefTextMarquee.init();
	});
	
	var qodefTextMarquee = {
		init: function () {
			this.holder = $('.qodef-text-marquee');
			
			if (this.holder.length) {
				this.holder.each(function () {
					qodefTextMarquee.initMarquee($(this));
					qodefTextMarquee.initResponsive($(this).find('.qodef-m-content'));
				});
			}
		},
		initResponsive: function (thisMarquee) {
			var fontSize,
				lineHeight,
				coef1 = 1,
				coef2 = 1;
			
			if (qodef.windowWidth < 1480) {
				coef1 = 0.8;
			}
			
			if (qodef.windowWidth < 1200) {
				coef1 = 0.7;
			}
			
			if (qodef.windowWidth < 768) {
				coef1 = 0.55;
				coef2 = 0.65;
			}
			
			if (qodef.windowWidth < 600) {
				coef1 = 0.45;
				coef2 = 0.55;
			}
			
			if (qodef.windowWidth < 480) {
				coef1 = 0.4;
				coef2 = 0.5;
			}
			
			fontSize = parseInt(thisMarquee.css('font-size'));
			
			if (fontSize > 200) {
				fontSize = Math.round(fontSize * coef1);
			} else if (fontSize > 60) {
				fontSize = Math.round(fontSize * coef2);
			}
			
			thisMarquee.css('font-size', fontSize + 'px');
			
			lineHeight = parseInt(thisMarquee.css('line-height'));
			
			if (lineHeight > 70 && qodef.windowWidth < 1440) {
				lineHeight = '1.2em';
			} else if (lineHeight > 35 && qodef.windowWidth < 768) {
				lineHeight = '1.2em';
			} else {
				lineHeight += 'px';
			}
			
			thisMarquee.css('line-height', lineHeight);
		},
		initMarquee: function (thisMarquee) {
			var elements = thisMarquee.find('.qodef-m-text'),
				delta = 0.05;
			
			elements.each(function (i) {
				$(this).data('x', 0);
			});
			
			requestAnimationFrame(function () {
				qodefTextMarquee.loop(thisMarquee, elements, delta);
			});
		},
		inRange: function (thisMarquee) {
			if (qodef.scroll + qodef.windowHeight >= thisMarquee.offset().top &&
				qodef.scroll < thisMarquee.offset().top + thisMarquee.height()) {
				return true;
			}
			
			return false;
		},
		loop: function (thisMarquee, elements, delta) {
			if (!qodefTextMarquee.inRange(thisMarquee)) {
				requestAnimationFrame(function () {
					qodefTextMarquee.loop(thisMarquee, elements, delta);
				});
				return false;
			} else {
				elements.each(function (i) {
					var el = $(this);
					el.css('transform', 'translate3d(' + el.data('x') + '%, 0, 0)');
					el.data('x', (el.data('x') - delta).toFixed(2));
					el.offset().left < -el.width() - 25 && el.data('x', 100 * Math.abs(i - 1));
				})
				requestAnimationFrame(function () {
					qodefTextMarquee.loop(thisMarquee, elements, delta);
				});
			}
		}
	};

	qodefCore.shortcodes.stal_core_text_marquee.qodefTextMarquee = qodefTextMarquee;

})(jQuery);
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
(function ($) {
    "use strict";

	qodefCore.shortcodes.stal_core_video_button = {};
    qodefCore.shortcodes.stal_core_video_button.qodefMagnificPopup = qodef.qodefMagnificPopup;

})(jQuery);
(function ($) {
	
    "use strict";
	qodefCore.shortcodes.stal_core_blog_list = {};
	qodefCore.shortcodes.stal_core_blog_list.qodefPagination = qodef.qodefPagination;
	qodefCore.shortcodes.stal_core_blog_list.qodefFilter = qodef.qodefFilter;
	qodefCore.shortcodes.stal_core_blog_list.qodefJustifiedGallery = qodef.qodefJustifiedGallery;
	qodefCore.shortcodes.stal_core_blog_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.stal_core_blog_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefVerticalNavMenu.init();
	});
	
	/**
	 * Function object that represents vertical menu area.
	 * @returns {{init: Function}}
	 */
	var qodefVerticalNavMenu = {
		initNavigation: function ($verticalMenuObject) {
			var $verticalNavObject = $verticalMenuObject.find('.qodef-header-vertical-navigation');
			
			if ($verticalNavObject.hasClass('qodef-vertical-drop-down--below')) {
				qodefVerticalNavMenu.dropdownClickToggle($verticalNavObject);
			} else if ($verticalNavObject.hasClass('qodef-vertical-drop-down--side')) {
				qodefVerticalNavMenu.dropdownFloat($verticalNavObject);
			}
		},
		dropdownClickToggle: function ($verticalNavObject) {
			var $menuItems = $verticalNavObject.find('ul li.menu-item-has-children');
			
			$menuItems.each(function () {
				var $elementToExpand = $(this).find(' > .qodef-drop-down-second, > ul');
				var menuItem = this;
				var $dropdownOpener = $(this).find('> a');
				var slideUpSpeed = 'fast';
				var slideDownSpeed = 'slow';
				
				$dropdownOpener.on('click tap', function (e) {
					e.preventDefault();
					e.stopPropagation();
					
					if ($elementToExpand.is(':visible')) {
						$(menuItem).removeClass('qodef-menu-item--open');
						$elementToExpand.slideUp(slideUpSpeed);
					} else if ($dropdownOpener.parent().parent().children().hasClass('qodef-menu-item--open') && $dropdownOpener.parent().parent().parent().hasClass('qodef-vertical-menu')) {
						$(this).parent().parent().children().removeClass('qodef-menu-item--open');
						$(this).parent().parent().children().find(' > .qodef-drop-down-second').slideUp(slideUpSpeed);
						
						$(menuItem).addClass('qodef-menu-item--open');
						$elementToExpand.slideDown(slideDownSpeed);
					} else {
						
						if (!$(this).parents('li').hasClass('qodef-menu-item--open')) {
							$menuItems.removeClass('qodef-menu-item--open');
							$menuItems.find(' > .qodef-drop-down-second, > ul').slideUp(slideUpSpeed);
						}
						
						if ($(this).parent().parent().children().hasClass('qodef-menu-item--open')) {
							$(this).parent().parent().children().removeClass('qodef-menu-item--open');
							$(this).parent().parent().children().find(' > .qodef-drop-down-second, > ul').slideUp(slideUpSpeed);
						}
						
						$(menuItem).addClass('qodef-menu-item--open');
						$elementToExpand.slideDown(slideDownSpeed);
					}
				});
			});
		},
		dropdownFloat: function ($verticalNavObject) {
			var $menuItems = $verticalNavObject.find('ul li.menu-item-has-children');
			var $allDropdowns = $menuItems.find(' > .qodef-drop-down-second > .qodef-drop-down-second-inner > ul, > ul');
			
			$menuItems.each(function () {
				var $elementToExpand = $(this).find(' > .qodef-drop-down-second > .qodef-drop-down-second-inner > ul, > ul');
				var menuItem = this;
				
				if (Modernizr.touch) {
					var $dropdownOpener = $(this).find('> a');
					
					$dropdownOpener.on('click tap', function (e) {
						e.preventDefault();
						e.stopPropagation();
						
						if ($elementToExpand.hasClass('qodef-float--open')) {
							$elementToExpand.removeClass('qodef-float--open');
							$(menuItem).removeClass('qodef-menu-item--open');
						} else {
							if (!$(this).parents('li').hasClass('qodef-menu-item--open')) {
								$menuItems.removeClass('qodef-menu-item--open');
								$allDropdowns.removeClass('qodef-float--open');
							}
							
							$elementToExpand.addClass('qodef-float--open');
							$(menuItem).addClass('qodef-menu-item--open');
						}
					});
				} else {
					//must use hoverIntent because basic hover effect doesn't catch dropdown
					//it doesn't start from menu item's edge
					$(this).hoverIntent({
						over: function () {
							$elementToExpand.addClass('qodef-float--open');
							$(menuItem).addClass('qodef-menu-item--open');
						},
						out: function () {
							$elementToExpand.removeClass('qodef-float--open');
							$(menuItem).removeClass('qodef-menu-item--open');
						},
						timeout: 300
					});
				}
			});
		},
		verticalAreaScrollable: function ($verticalMenuObject) {
			return $verticalMenuObject.hasClass('qodef-with-scroll');
		},
		initVerticalAreaScroll: function ($verticalMenuObject) {
			if (qodefVerticalNavMenu.verticalAreaScrollable($verticalMenuObject)) {
				window.qodefCore.qodefPerfectScrollbar.init($verticalMenuObject);
			}
		},
		init: function () {
			var $verticalMenuObject = $('.qodef-header--vertical #qodef-page-header');
			
			if ($verticalMenuObject.length) {
				qodefVerticalNavMenu.initNavigation($verticalMenuObject);
				qodefVerticalNavMenu.initVerticalAreaScroll($verticalMenuObject);
			}
		}
	};
	
})(jQuery);
(function($){
    "use strict";

    var fixedHeaderAppearance = {
        showHideHeader: function($pageOuter, $header){
            if(qodef.windowWidth > 1024) {
                if (qodef.scroll <= 0) {
                    qodef.body.removeClass('qodef-header--fixed-display');
                    $pageOuter.css('padding-top', '0');
                    $header.css('margin-top', '0');
                } else {
                    qodef.body.addClass('qodef-header--fixed-display');
                    $pageOuter.css('padding-top', parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.topAreaHeight) + 'px');
                    $header.css('margin-top', parseInt(qodefGlobal.vars.topAreaHeight) + 'px');
                }
            }
        },
        init: function(){
            var $pageOuter = $('#qodef-page-outer'),
                $header = $('#qodef-page-header');
            fixedHeaderAppearance.showHideHeader($pageOuter, $header);
            $(window).scroll(function() {
                fixedHeaderAppearance.showHideHeader($pageOuter, $header);
            });
            $(window).resize(function() {
                $pageOuter.css('padding-top', '0');
                fixedHeaderAppearance.showHideHeader($pageOuter, $header);
            });
        }
    };
    
    qodef.fixedHeaderAppearance = fixedHeaderAppearance.init;

})(jQuery);
(function ($) {
	"use strict";
	
	var stickyHeaderAppearance = {
		displayAmount: function () {
			if (qodefGlobal.vars.qodefStickyHeaderScrollAmount !== 0) {
				return parseInt(qodefGlobal.vars.qodefStickyHeaderScrollAmount);
			} else {
				return parseInt(qodefGlobal.vars.headerHeight + qodefGlobal.vars.adminBarHeight);
			}
		},
		showHideHeader: function (displayAmount) {
			
			if (qodef.scroll < displayAmount) {
				qodef.body.removeClass('qodef-header--sticky-display');
			} else {
				qodef.body.addClass('qodef-header--sticky-display');
			}
		},
		init: function () {
			var displayAmount = stickyHeaderAppearance.displayAmount();
			
			stickyHeaderAppearance.showHideHeader(displayAmount);
			$(window).scroll(function () {
				stickyHeaderAppearance.showHideHeader(displayAmount);
			});
		}
	};
	
	qodef.stickyHeaderAppearance = stickyHeaderAppearance.init;
	
})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefSearchOnSide.init();
	});
	
	var qodefSearchOnSide = {
		init: function () {
			var searchOpener = $('a.qodef-search-opener');
			
			if (searchOpener.length) {
				var searchOpenerParent = searchOpener.parent(),
					searchOpenerInput = $('input.qodef-search-field');
				
				searchOpener.on('click', function(e){
					console.log(searchOpenerParent);
					searchOpenerParent.addClass("opened");
					
					setTimeout(function () {
						searchOpenerInput.focus();
					}, 500)
				});
				
				qodefSearchOnSide.close(searchOpenerParent);
			}
		},
		close : function (searchOpenerParent) {
			$(document).on('click', function(e){
				if(!e.target.closest('.qodef-search-opener') &&
					!e.target.closest('.qodef-search-field')) {
					searchOpenerParent.removeClass("opened");
				}
			});
		},
	};
	
})(jQuery);


(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefProgressBarSpinner.init();
	});
	
	var qodefProgressBarSpinner = {
		percentNumber: 0,
		init: function () {
			this.holder = $('#qodef-page-spinner.qodef-layout--progress-bar');
			
			if (this.holder.length) {
				qodefProgressBarSpinner.animateSpinner(this.holder);
			}
		},
		animateSpinner: function ($holder) {
			
			var $numberHolder = $holder.find('.qodef-m-spinner-number-label'),
				$spinnerLine = $holder.find('.qodef-m-spinner-line-front'),
				numberIntervalFastest,
				windowLoaded = false;
			
			$spinnerLine.animate({'width': '100%'}, 10000, 'linear');
			
			var numberInterval = setInterval(function () {
				qodefProgressBarSpinner.animatePercent($numberHolder, qodefProgressBarSpinner.percentNumber);
			
				if (windowLoaded) {
					clearInterval(numberInterval);
				}
			}, 100);
			
			$(window).on('load', function () {
				windowLoaded = true;
				
				numberIntervalFastest = setInterval(function () {
					if (qodefProgressBarSpinner.percentNumber >= 100) {
						clearInterval(numberIntervalFastest);
						$spinnerLine.stop().animate({'width': '100%'}, 500);
						
						setTimeout(function () {
							$holder.addClass('qodef--finished');
							
							setTimeout(function () {
								qodefProgressBarSpinner.fadeOutLoader($holder);
							}, 1000);
						}, 600);
					} else {
						qodefProgressBarSpinner.animatePercent($numberHolder, qodefProgressBarSpinner.percentNumber);
					}
				}, 6);
			});
		},
		animatePercent: function ($numberHolder, percentNumber) {
			if (percentNumber < 100) {
				percentNumber += 5;
				$numberHolder.text(percentNumber);
				
				qodefProgressBarSpinner.percentNumber = percentNumber;
			}
		},
		fadeOutLoader: function ($holder, speed, delay, easing) {
			speed = speed ? speed : 600;
			delay = delay ? delay : 0;
			easing = easing ? easing : 'swing';
			
			$holder.delay(delay).fadeOut(speed, easing);
			
			$(window).on('bind', 'pageshow', function (event) {
				if (event.originalEvent.persisted) {
					$holder.fadeOut(speed, easing);
				}
			});
		}
	};
	
})(jQuery);
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
(function ($) {
	
    "use strict";
	qodefCore.shortcodes.stal_core_product_list = {};
	qodefCore.shortcodes.stal_core_product_list.qodefPagination = qodef.qodefPagination;
	qodefCore.shortcodes.stal_core_product_list.qodefFilter = qodef.qodefFilter;
	qodefCore.shortcodes.stal_core_product_list.qodefJustifiedGallery = qodef.qodefJustifiedGallery;
	qodefCore.shortcodes.stal_core_product_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.stal_core_product_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function ($) {
    "use strict";
	qodefCore.shortcodes.stal_core_product_categories_list = {};
	qodefCore.shortcodes.stal_core_product_categories_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.stal_core_product_categories_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function ($) {
	
    "use strict";
	qodefCore.shortcodes.stal_core_portfolio_list = {};
	qodefCore.shortcodes.stal_core_portfolio_list.qodefPagination = qodef.qodefPagination;
	qodefCore.shortcodes.stal_core_portfolio_list.qodefFilter = qodef.qodefFilter;
	qodefCore.shortcodes.stal_core_portfolio_list.qodefJustifiedGallery = qodef.qodefJustifiedGallery;
	qodefCore.shortcodes.stal_core_portfolio_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.stal_core_portfolio_list.qodefSwiper = qodef.qodefSwiper;

})(jQuery);
(function($) {
	"use strict";
	qodefCore.shortcodes.stal_core_team_list = {};
	
	$(document).ready(function () {
		qodefTeamList.init();
	});
	var qodefTeamList = {
		init: function () {
			var $teamSocial = $('.qodef-team-list .qodef-e-social-content');
			
			if ($teamSocial.length) {
				$teamSocial.each(function () {
					var $thisTeamSocial = $(this),
						$teamSocialOpener = $thisTeamSocial.find('.qodef-team-member-social-icon-opener'),
						$socialIcons = $thisTeamSocial.find('.qodef-team-member-social-icons');
					$teamSocialOpener.on('mouseenter', function (e) {
						if(!($thisTeamSocial.hasClass('opened'))) {
							$thisTeamSocial.addClass('opened');
						}
					});
					$socialIcons.on('mouseleave', function (e) {
						if(($thisTeamSocial.hasClass('opened'))) {
							$thisTeamSocial.removeClass('opened');
						}
					});
				});
			}
		}
	};
	
	qodefCore.shortcodes.stal_core_team_list.qodefTeamList = qodefTeamList;
	qodefCore.shortcodes.stal_core_team_list.qodefPagination = qodef.qodefPagination;
	qodefCore.shortcodes.stal_core_team_list.qodefFilter = qodef.qodefFilter;
	qodefCore.shortcodes.stal_core_team_list.qodefJustifiedGallery = qodef.qodefJustifiedGallery;
	qodefCore.shortcodes.stal_core_team_list.qodefMasonryLayout = qodef.qodefMasonryLayout;
	qodefCore.shortcodes.stal_core_team_list.qodefSwiper = qodef.qodefSwiper;
})(jQuery);
(function ($) {
	"use strict";

	qodefCore.shortcodes.stal_core_testimonials_list = {};

	$(document).ready(function () {
		qodefTestimonials.init();
	});

	var qodefTestimonials = {
		init: function () {
			var holder = $('.qodef-testimonials-list');

			if (holder.length) {
				holder.each(function () {
					var thisHolder = $(this),
						swiper = thisHolder.find('.qodef-m-testimonials-swiper');

					var sliderOptions = typeof holder.data('options') !== 'undefined' ? holder.data('options') : {},
						spaceBetween = sliderOptions.spaceBetween !== undefined && sliderOptions.spaceBetween !== '' ? sliderOptions.spaceBetween : 0,
						slidesPerView = sliderOptions.slidesPerView !== undefined && sliderOptions.slidesPerView !== '' ? parseInt(sliderOptions.slidesPerView, 10) : 1,
						centeredSlides = sliderOptions.centeredSlides !== undefined && sliderOptions.centeredSlides !== '' ? sliderOptions.centeredSlides : false,
						loop = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true,
						autoplay = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : true,
						speed = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? parseInt(sliderOptions.speed, 10) : 5000,
						speedAnimation = sliderOptions.speedAnimation !== undefined && sliderOptions.speedAnimation !== '' ? parseInt(sliderOptions.speedAnimation, 10) : 800,
						outsideNavigation = sliderOptions.outsideNavigation !== undefined && sliderOptions.outsideNavigation === 'yes',
						nextNavigation = outsideNavigation ? '.swiper-button-next-' + sliderOptions.unique : holder.find('.swiper-button-next'),
						prevNavigation = outsideNavigation ? '.swiper-button-prev-' + sliderOptions.unique : holder.find('.swiper-button-prev'),
						pagination = holder.find('.swiper-pagination');

					if (autoplay !== 'false' && speed !== 5000) {
						autoplay = {
							delay: speed
						};
					}

					var slider = new Swiper(swiper, {
						slidesPerView: slidesPerView,
						centeredSlides: centeredSlides,
						spaceBetween: spaceBetween,
						autoplay: false,
						loop: loop,
						speed: speedAnimation,
						navigation: {nextEl: nextNavigation, prevEl: prevNavigation},
						pagination: {el: pagination, type: 'bullets', clickable: true},
						on: {
							slideChange: function () {

								setTimeout(function () {
									changeActiveImage();
								}, 100);
							}
						}
					});

					var initActiveImage = function () {
						var activeItem = thisHolder.find('.swiper-slide-active'),
							itemIndex = activeItem.data('slide-index'),
							activeImage = $('.qodef-testimonial-image[data-slide-index=' + itemIndex + ']');

						activeImage.addClass('active');
					};

					var changeActiveImage = function () {

						var activeItem = thisHolder.find('.swiper-slide-active, .swiper-slide-duplicate-active'),
							itemIndex = activeItem.data('slide-index'),
							activeImage = $('.qodef-testimonial-image.active'),
							nextActiveImage = $('.qodef-testimonial-image[data-slide-index=' + itemIndex + ']');

						activeImage.removeClass('active');
						nextActiveImage.addClass('active');
					};

					initActiveImage();
				})
			}
		},
	};

	qodefCore.shortcodes.stal_core_testimonials_list.qodefTestimonials = qodefTestimonials;

})(jQuery);
(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefTilt.init();
	});
	
	$(document).on('stal_trigger_get_new_posts', function () {
		qodefTilt.init();
	});

	var qodefTilt = {
		init: function () {
			var $gallery = $('.qodef-hover-animation--tilt');
			
			if ($gallery.length) {
				$gallery.each(function () {
					var $this = $(this);
					
					$this.find('article .qodef-e-media-image').each(function () {
						$(this).tilt({
							maxTilt: 25,
							perspective: 1600,
							scale: 1,
							easing: "cubic-bezier(.03,.98,.52,.99)",
							transition: true,
							speed: 300,
							glare: true,
							maxGlare: 0.2,
						});
					});
				});
			}
		}
	};
	
	qodefCore.shortcodes.stal_core_portfolio_list.qodefTilt = qodefTilt;
	
})(jQuery);