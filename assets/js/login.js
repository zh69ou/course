import Vue from 'vue'
import Vuex from 'vuex'
import pubstore from '../config/store.js'

require('../scss/bootstrap-grid.scss');
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
      closeshow:false
		}
	},
	created () {
		this.showlogin
	},
	methods: {
		modalbtwo:function () {
			store.commit('M_UP_URL','/api/login')
			store.dispatch('A_SENDDATE').then(() => {
				let ret = store.state.getdata
				console.log(ret)
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