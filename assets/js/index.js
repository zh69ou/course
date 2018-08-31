import Vue from 'vue'
import Vuex from 'vuex'
import pubstore from '../config/store.js'

require('../scss/bootstrap-grid.scss');
require('../scss/bootstrap.scss');
Vue.use(Vuex)
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)

const store = new Vuex.Store(pubstore)
new Vue({
	el: '#app',
	components: {
		zlAdhead:()=>import('../components/adhead.vue')
		// leftnav:()=>import('../components/adminindexleft.vue'),
		// mainnav:()=>import('../components/admenumin.vue')
	},
	store,
	data () {
		return {
			adheadmenu:[],
			logoname:''
			// adleftmenu:[],
			// adlefticon:'',
			// headname:'',
			// headhimg:'',
			// cellphone:'',
			// needemail:''
		}
	},
	created () {
		this.getheadmenu
		// this.getleftmenu,
		// this.myinfodata
	},
	methods: {
	},
	computed: {
		getheadmenu:function () {
			store.commit('M_UP_URL','/getheadmenu')
			store.dispatch('A_SENDDATE').then(() => {
				let ret = store.state.getdata
				if(ret&&ret.error=='0')
				{
					console.log(ret)
					this.adheadmenu = ret.data.menu
					this.logoname = ret.data.name
				}
			})
		},
		// getleftmenu:function () {
		// 	store.commit('M_UP_URL','/getleftmenu')
		// 	store.dispatch('A_SENDDATE').then(() => {
		// 		let ret = store.state.getdata
		// 		if(ret&&ret.error=='0')
		// 		{
		// 			// console.log(ret)
		// 			this.adleftmenu = ret.data.menu
		// 			this.adlefticon = ret.data.ico
		// 		}
		// 	})
		// },
		// myinfodata:function () {
		// 	store.commit('M_UP_URL','/ myinfodata')
		// 	store.dispatch('A_SENDDATE').then(() => {
		// 		let ret = store.state.getdata
		// 		if(ret&&ret.error=='0')
		// 		{
		// 			console.log(ret)
		// 			this.headname = ret.data.menu
		// 			this.headhimg = ret.data.himg
		// 			this.cellphone = ret.data.phone
		// 			this.needemail = ret.data.email
		// 		}
		// 	})
		// }
	}
});