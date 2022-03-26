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

