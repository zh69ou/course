<template>
	<div>
		<div class="row">
			<div class="col-xs-4">
				<div id="myChart" style="width: 500px;height: 354px"></div>
			</div>
			<div class="col-xs-4">
				<div id="myChartl" style="width: 500px;height: 354px"></div>
			</div>
			<div class="col-xs-4">
				<div id="myChartlo" style="width: 500px;height: 354px"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<div id="myChartusr" style="width: 760px;height: 472px"></div>
			</div>
			<div class="col-xs-6">
				<div id="myChartime" style="width: 760px;height: 472px"></div>
			</div>
		</div>
	</div>
</template>
<script>
export default{
	name:"echartshiping",
	methods:{
		drawLine(){
			let myChart = this.$echarts.init(document.getElementById('myChart'))
			myChart.setOption({
				color: ['#6b61d0'],
			    tooltip : {
			        trigger: 'axis',
			        axisPointer : {
			            type : 'shadow'
			        }
			    },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['QQ', '百度', '微信', '网页', '直接访问', ],
			            axisTick: {
			                alignWithLabel: true
			            }
			        }
			    ],
			    yAxis : [
			        {
			            type : 'category',
			            data : [100,200,300,400,500,600,700,800,900,1000,1100]
			        }
			    ],
			    series : [
			        {
			            name:'访问路径',
			            type:'bar',
			            barWidth: '60%',
			            data:[5,8,9,7,4]
			        }
			    ]
			})
		},
		drawLinel(){
			let myChartl = this.$echarts.init(document.getElementById('myChartl'))
			myChartl.setOption({
				color: ['#66b3c2'],
			    tooltip : {
			        trigger: 'axis',
			        axisPointer : {
			            type : 'shadow'
			        }
			    },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['IE', 'chrom', '火狐', 'QQ', '搜狗','Safari','UC','360' ],
			            axisTick: {
			                alignWithLabel: true
			            }
			        }
			    ],
			    yAxis : [
			        {
			            type : 'category',
			            data : [100,200,300,400,500,600,700,800,900,1000,1100]
			        }
			    ],
			    series : [
			        {
			            name:'访问路径',
			            type:'bar',
			            barWidth: '60%',
			            data:[5,8,9,7,4,6,7,8]
			        }
			    ]
			})
		},
		drawLinelo(){
			let myChartlo = this.$echarts.init(document.getElementById('myChartlo'))
			myChartlo.setOption({
				color: ['#676fc3'],
			    tooltip : {
			        trigger: 'axis',
			        axisPointer : {
			            type : 'shadow'
			        }
			    },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['首页','课程','师资', '个人中心', '排行榜','自我测','学情报告',],
			            axisTick: {
			                alignWithLabel: true
			            }
			        }
			    ],
			    yAxis : [
			        {
			            type : 'category',
			            data : [100,200,300,400,500,600,700,800,900,1000,1100]
			        }
			    ],
			    series : [
			        {
			            name:'访问路径',
			            type:'bar',
			            barWidth: '60%',
			            data:[5,8,9,7,4,6,7]
			        }
			    ]
			})
		},
		drawLinelor(){
			let myChartusr = this.$echarts.init(document.getElementById('myChartusr'))
			myChartusr.setOption({
			    trigger: 'axis',
		        axisPointer: {
		            type: 'cross',
		            label: {
		                backgroundColor: '#f4a2a2'
		            }
		        },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['7/1','7/2','7/3', '7/4', '7/5','7/6','7/7','7/8','7/9','7/10','7/11','7/12','7/13','7/14'],
			            axisTick: {
			                alignWithLabel: true
			            }
			        }
			    ],
			    yAxis : [
			        {
			            type : 'category',
			            data : [100,200,300,400,500,600,700,800,900,1000,1100]
			        }
			    ],
			    series : [
			        {
			            name:'访问路径',
			            type:'line',

			            barWidth: '60%',
			            data:[5,8,9,7,4,6,7,5,8,9,7,4,6,7,]
			        }
			    ]
			})
		},
		drawLinelorl(){
			let myChartime = this.$echarts.init(document.getElementById('myChartime'))
			myChartime.setOption({
			    trigger: 'axis',
		        axisPointer: {
		            type: 'aaa',
		            label: {
		                backgroundColor: '#7782d8'
		            }
		        },
			    grid: {
			        left: '3%',
			        right: '4%',
			        bottom: '3%',
			        containLabel: true
			    },
			    xAxis : [
			        {
			            type : 'category',
			            data : ['02:00','04:00','06:00','08:00', '10:00','12:00','14:00','16:00','18:00','20:00','22:00','24:00'],
			            axisTick: {
			                alignWithLabel: true
			            }
			        }
			    ],
			    yAxis : [
			        {
			            type : 'category',
			            data : [100,200,300,400,500,600,700,800,900,1000,1100]
			        }
			    ],
			    series : [
			        {
			            name:'访问路径',
			            type:'line',
			            barWidth: '60%',
			            data:[5,8,9,7,4,6,7,5,8,9,7,4,]
			        }
			    ]
			})
		},
	},
	mounted() {
    	this.drawLine();
    	this.drawLinel();
    	this.drawLinelo();
    	this.drawLinelor();
    	this.drawLinelorl();
  	}
}
</script>