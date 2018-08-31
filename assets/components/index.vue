<!-- <template>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#" style="color: #b4b5c4">
	  	<img src="../img/14ke-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    	{{msg}}
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarText">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#" style="color: #b4b5c4">
	        	<img src="../img/news.svg" width="30" height="30" class="d-inline-block align-top" alt="">
				通知
	        </a>
	      </li>
	      <li class="nav-item dropdown" @click.stop="taptoggle">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #b4b5c4">
	          <img src="../img/PersonalCenter.svg" width="30" height="30" class="d-inline-block align-top" alt="">
				个人中心
	        </a>
	        <div class="dropdown-menu" @mouseleave='taptoggle' :style="{display:look?'block':'none'}" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">测试</a>
	          <a class="dropdown-item" href="#">测试 测试</a>
	          <a class="dropdown-item" href="#">测试</a>
	        </div>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="#" style="color: #b4b5c4">
	        	<img src="../img/14ke-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
				熊小鱼
	        </a>
	      </li>
	    </ul>
	  </div>
	</nav>
</template>
<script>
export default{
	name:'xyz',
	data(){
		return{
			msg:'14ke',
			look: false,
		}
	},
	props: {
	    menu: {
	      type:Array,
	      default: function () {
	        return []
	      }
	    },
	    navName:{
	      type:String,
	      default:''
	    }
  	},
	methods: {
		taptoggle(){
			this.look = !this.look;
		}
	},
	mounted() {
		var that = this;
		document.addEventListener('click', function(){
			that.look=false;
		})
	}
}
</script>

<style>
.navbar-light{
	background-color: #37394f!important
}
</style> -->