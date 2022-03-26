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