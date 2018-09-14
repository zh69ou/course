<template>
	<span :info="info">
		<a v-if="info.type=='hand'" :href="info.url">{{info.name}}</a>
		<a v-else @click.stop="jump(info)">{{info.name}}</a>
	</span>
</template>
<script>
/**
 * @desc 链接跳转
 * @module components/jump
 * @param {Object} [props.info] - 链接对象
 * @type 跳转链接：先检查地址是否有权限，有权限跳转，没条件弹框
 * @type js拟态框：请求地址，根据返回内容弹框
 * @type js弹框：直接弹出，替换弹框内内容
 * @type js回调：直接执行js代码
 */
export default {
	name: 'zl-jump',
	props: {
		info: Object,
		default: {}
	},
	methods: {
		jump: function (info) {
			if (info.type && info.type == 'ajax') {
				this.$store.commit('M_UP_URL',info.url)
				this.$store.dispatch('A_SENDDATE')
			} else if (info.type && info.type == 'login') {
				this.$store.commit('M_UP_LOGIN',true)
				// console.log(this.$store.state.islogin)
			}
			this.$emit('menucallback')
		}
	}
}
</script>