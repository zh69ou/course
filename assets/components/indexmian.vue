<template>
	<div class="adside">
		<el-container>
			<el-aside>
				<el-menu default-active="2" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose">
					<el-submebu index="1">
						<template slot="title">
         					<i class="el-icon-location"></i>
          					<span>导航一</span>
    					</template>
        				<el-menu-item-group>
          					<template slot="title">分组一</template>
          					<el-menu-item index="1-1">选项1</el-menu-item>
          					<el-menu-item index="1-2">选项2</el-menu-item>
        				</el-menu-item-group>
					</el-submebu>
				</el-menu>
			</el-aside>
		</el-container>
	</div>
</template>
<script>
export default{
	name:'indexmian',
	props:{
		adsidemenu:{
			type:Array,
	        default: function () {
	            return []
      		}
		}
	},
	methods:{
		handleOpen(key, keyPath) {
        	console.log(key, keyPath);
      	},
      	handleClose(key, keyPath) {
        	console.log(key, keyPath);
      	}
	}
}
</script>
<style scoped>

</style>