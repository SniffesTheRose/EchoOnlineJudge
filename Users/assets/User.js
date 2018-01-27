// JavaScript Document
$(document).ready(function(e) {
	var chart = Highcharts.chart('container', {
		chart: {
			type: 'spline'
		},
		title: {
			text: '数据统计'
		},
		subtitle: {
			text: 'Echo Online Judge 提供统计数据'
		},
		xAxis: {
			categories: ['一月', '二月', '三月', '四月', '五月', '六月',
						 '七月', '八月', '九月', '十月', '十一月', '十二月']
		},
		yAxis: {
			title: {
				text: '通过数'
			},
			labels: {
				formatter: function () {
					return this.value;
				}
			}
		},
		tooltip: {
			crosshairs: true,
			shared: true
		},
		plotOptions: {
			spline: {
				marker: {
					radius: 4,
					lineColor: '#666666',
					lineWidth: 1
				}
			}
		},
		series: [{
			name: '累计通过',
			marker: {
				symbol: 'square'
			},
			data: [107.0, 106.9, 109.5, 114.5, 118.2, 121.5, 125.2, 126.5, 123.3, 118.3, 113.9, 109.6]
		}, {
			name: '新通过',
			marker: {
				symbol: 'diamond'
			},
			data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		}]
	});
});