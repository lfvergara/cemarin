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
		}
	};

	qodefCore.shortcodes.stal_core_interactive_banner.qodefInteractiveBanner = qodefInteractiveBanner;
	
})(jQuery);