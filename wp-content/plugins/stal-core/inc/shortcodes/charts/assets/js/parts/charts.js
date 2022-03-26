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