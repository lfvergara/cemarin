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
