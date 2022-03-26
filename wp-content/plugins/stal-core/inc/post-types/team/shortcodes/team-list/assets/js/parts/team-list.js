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