// JavaScript Document
function lineChart() {

        var ctx = document.getElementById("yyeqs").getContext("2d") //对象初始化
		var col={}
		col= ["2014-10", "2014-11", "2014-12", "2015-1", "2015-2", "2015-4"]
		/*数据赋值*/
        var data = {
            labels:col,
            datasets: [{
                label: "",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(0,102,51,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#339933",
                pointHighlightFill: "#339933",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [1.27, 1.30, 1.30, 1.41, 1.04, 1.29]
            },{
                label: "数据2",
                fillColor: "rgba(100,220,220,0.2)",
                strokeColor: "rgba(100,102,51,1)",
                pointColor: "rgba(100,220,220,1)",
                pointStrokeColor: "#339933",
                pointHighlightFill: "#339933",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [1, 2, 2, 1, 1, 3]
            }],
        };

        var salesVolumeChart = new Chart(ctx).Line(data, {
            bezierCurveTension: 0.4,  /*线条样式控制 0是折线 0.4是曲线*/
            bezierCurve: false, 	  /*关闭或开启曲线*/
            tooltipTemplate: "<%if (label){%><%=label%> 销量：<%}%><%= value %>万辆", /*折线顶点文字提示*/
            //自定义背景小方格、y轴每个格子的单位、起始坐标
            scaleOverride: true,
            scaleSteps: 10,     /*Y轴总单元数*/
            scaleStepWidth: 0.5, /*Y轴步长*/
            scaleStartValue: 1 /*Y轴起点*/
        });
    }

		
	
	
		
	setTimeout(function() {lineChart();barChart();RadarChart();PieChart();HuanChart()}, 0)
		/*手机端优化代码 ↓*/
	if (/Mobile/i.test(navigator.userAgent)) {
	  Chart.defaults.global.animationSteps = Chart.defaults.global.animationSteps / 6
	  Chart.defaults.global.animationEasing = "linear"
	}