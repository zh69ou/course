<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-md-2 adnav" :adnav="adnav">
				<li class="list-group-item adlist">&#12288;</li>
					<template v-for="(item,option) in adleftmenu">
						<li class="list-group-item adlist">
							<div class="left_boder" v-show="show"></div>
							<a class="colornav" @click="leftclick">
								<img class="iconfont left" :src="item.ico" alt="">
								{{item.name}}
								<img class="iconfont right" src="../img/drop-down.svg" alt="">
							</a>
							<ul class="list-group margintop" v-show="show">
								<template v-for="(child,index) in item.list" >
									<li class="list-group-item adlist boderbotton">
										<a class="colornav" >
											<img class="iconfont left" :src="child.ico" alt="">
											{{child.name}}
										</a>
									</li>
								</template>
							</ul>
						</li>
					</template>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-10 quchup">
				<mainnav :headname="headname" :headhimg="headhimg" :cellphone="cellphone" :needemail="needemail"></mainnav>
				<echartshiping></echartshiping>
				<shiping></shiping>
				<banner></banner>
				<teacher></teacher>
				<videoc></videoc>
				<mainnav></mainnav>
			</div>
		</div>
	</div>
</template>
<script>

// import mainnav from './admenumin.vue'
// import echartshiping from './echartshiping.vue'
// import shiping from './shiping.vue'
// import banner from './banner.vue'
// import teacher from './teacher.vue'
// import videoc from './video.vue'
export default{
	name:'leftnav',
	props: {
	    adleftmenu: {
	      	type:Array,
	      	default: function () {
	       		return []
	      	}
	    },
	    adlefticon:{
	    	type:String,
	    	default:''
	    },
	    headname:{
			type:String,
	    	default:''
		},
		headhimg:{
	    	type:String,
	    	default:''
	    },
	    cellphone:{
	    	type:String,
	    	default:''
	    },
	    needemail:{
	    	type:String,
	    	default:''
	    },
  	},
	data(){
		return{
			theme2: 'dark',
			show:false,
			act:0
		}
	},
	components: {
    	// mainnav
    	// echartshiping,
    	// shiping,
    	// banner,
    	// teacher,
    	// videoc
  	},
  	methods:{
  		leftclick(){
  			// console.log(this.adleftmenu)
  			this.show = !this.show
  			if(this.act){
  				this.act = 0
  			}else{
  				this.act = 1
  			}
  		},
  		adnav(){
  			var h = document.documentElement.clientHeight || document.body.clientHeight;
			var adnav = document.querySelector(".adnav");
			console.log(adnav)
			adnav.style.height = h+"px";
  		}
  	}
}
</script>
<style scoped>
.adnav{
	/*height: 904px;*/
	background-color: #43455b;
	padding: 0;
}
.colornav{
	color: #b4b5c4!important;
}
.adlist{
	background-color: #43455b;
}
.iconfont{
	width: 18px;
	height: auto;
}
.margintop{
	margin-top: 15px!important;
}
.boderbotton{
	border: 0;
}
.left{
	margin-right: 18px;
}
.right{
	float: right;
	padding-top: 4px;
}
.quchup{
	padding: 0!important;
}
.left_boder{
    float: left;
    background-color:#9a6fea;
    width: 4px;
    height: 22px;
    margin-left: -21px;
}
</style>