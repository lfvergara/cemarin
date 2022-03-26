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