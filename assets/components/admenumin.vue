<!-- <template>
	<div class="col-xs-12 col-sm-6 col-md-10">
		<ul class="nav nav-pills mb-3">
			<li v-for="(item,index) in items" class="nav-item" @click="table(index)"><a class="nav-link" :class="{active:index==active}">{{item.message}}</a></li>
		</ul>
		<div class="tab-content">
			<div v-html="item.message" class="tab-pane fade show touxiang active" v-for="(item,index) in contents" v-show="index == active">{{item.message}}</div>
		</div>
	</div>
</template>
<script>
export default{
	name: "mainnav",
	data(){
		return{
			look:false,
			isActive:true,
			items:[
				{ message: '基本信息' },
      			{ message: '修改密码' }
			],
			props:{

			},
			contents:[
				{ message: `<img src="../img/myinfo.png" alt="">
				  	<span>点击更换头像</span>
				  	<div class="input-group mb-3 middle">
						<div class="input-group-prepend">
							<span class="input-group-text right" id="basic-addon1" style="text-align:right">账户名称</span>
						</div>
						<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3 middle">
						<div class="input-group-prepend">
							<span class="input-group-text right" style="text-align:right">手机号</span>
						</div>
					 	<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						<div class="input-group-append">
							<span class="input-group-text">发送验证码</span>
						</div>
					</div>
					<div class="input-group mb-3 middle">
						<div class="input-group-prepend">
							<span class="input-group-text right" id="basic-addon1" style="text-align:right">验证码</span>
						</div>
						<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group mb-3 middle">
						<div class="input-group-prepend">
							<span class="input-group-text right" id="basic-addon1" style="text-align:right">邮箱</span>
						</div>
					  	<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>
					<button type="button" class="btn btn-primary affirm">保存修改</button>`},
				{ message: `<div class="input-group mb-3 middle">
					<div class="input-group-prepend">
					    <span class="input-group-text right" id="basic-addon1" style="text-align:right">原密码</span>
					</div>
					<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3 middle">
					<div class="input-group-prepend">
					    <span class="input-group-text right" id="basic-addon1" style="text-align:right">新密码</span>
					</div>
					<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group mb-3 middle">
					<div class="input-group-prepend">
					    <span class="input-group-text right" id="basic-addon1" style="text-align:right">确认密码</span>
					</div>
					<input type="text" class="form-control inputdmeo" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
				</div>
				<button type="button" class="btn btn-primary affirm">保存修改</button>`}
			],
			active:0
		}
	},
	methods:{
  		table(index){
  			this.active = index;
  		}
  	}
}
</script>
<style>
	.right{
		width: 100px;
	}
	.middle{
		width: 350px;
		margin: 0 auto;
	}
	.middle input:focus{
		outline:none;
		border:0px;
	}
	.inputdmeo{
		width: 100px;
	}
	.touxiang img{
		width: 80px;
		height: auto;
		display: block;
		margin: 0 auto;
	}
	.touxiang span{
		display: block;
		text-align: center;
	}
	.touxiang .affirm{
		display: block;
    	margin: 0 auto;
	}
	.affirm{
		display: block;
    	margin: 0 auto;
	}
	.listnav{
		padding: 0!important;
	}
	.forms li{
		border: 0!important;
	}
</style> -->