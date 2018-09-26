import Vue from 'vue'
import Vuex from 'vuex'
import pubstore from '../config/store.js'

require('../css/login.scss');
Vue.use(Vuex)
const store = new Vuex.Store(pubstore)
new Vue({
	el: '#app',
	components: {
		zlLogin:()=>import('../components/login.vue')
	},
	store,
	data () {
		return {
			formlist:[
        {name:'username',type:'text',placeholder:'用户名/email/电话',headline:'账号',prompt:'请正确输入内容',status:true},
        {name:'password',type:'password',placeholder:'密码',headline:'密码',prompt:'请正确输入内容',status:true}
      ],
      closeshow:false,
      keywords:''
		}
	},
	created () {
		this.showlogin
	},
	methods: {
		topmenuevent:function () {
			if(this.$refs.topmenu.style.display == 'block') {
				this.$refs.topmenu.style.display = 'none';
			}else{
				this.$refs.topmenu.style.display = 'block';
			}
		},
		usermenuevent:function () {
			if(this.$refs.usermenu.style.display == 'block') {
				this.$refs.usermenu.style.display = 'none';
			}else{
				this.$refs.usermenu.style.display = 'block';
			}
		},
		searchwords:function () {
			window.location.href = "/index.php?s=index&c=course&catid=undefined&keyword="+this.keywords
		},
		modalbtwo:function () {
			store.commit('M_UP_URL','/login')
			store.dispatch('A_SENDDATE').then(() => {
				let ret = store.state.getdata
				if(ret&&ret.error=='0')
				{
					window.location.href="/"
				}else{
					window.location.reload()
				}
			})
		}
	},
	computed: {
		showlogin:function () {
			store.commit('M_UP_LOGIN',true)
		},
		isshow: function () {
			return store.state.islogin
		}
	}
});