<!-- <template>
	<div class="row">
		<div class="col-xs-6">
			<div id="myChartusr01" :style="{width: '760px', height: '472px'}"></div>
		</div>
		<div class="col-xs-6">
			<div id="myChartime01" :style="{width: '760px', height: '472px'}"></div>
		</div>
	</div>
	<div class="row">
		<table>
			<tr></tr>
		</table>
	</div>
</template>
<script>
export default{
	name: 'shiping',
	methods:{
		draw(){
			let myChartusr01 = this.$echarts.init(document.getElementById('myChartusr01'))
			myChartusr01.setOption({
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
		drawL(){
			let myChartime01 = this.$echarts.init(document.getElementById('myChartime01'))
			myChartime01.setOption({
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
		}
	},
	mounted() {
    	this.draw();
    	this.drawL()
  	}
}

</script> -->