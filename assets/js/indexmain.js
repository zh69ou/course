import Vue from 'vue'
import Vuex from 'vuex'
import pubstore from '../config/store.js'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI)
Vue.use(Vuex)
const store = new Vuex.Store(pubstore)
new Vue({
	el: '#app',
	components:{
		indexmian:()=>import('../components/indexmian.vue')
	},
	store,
	data (){
		return{
			menu:[]
		}
	},
	created (){
		this.getheadmenu
	},
	methods:{
		getheadmenu:function () {
			store.commit('M_UP_URL','/getleftmenu')
			store.dispatch('A_SENDDATE').then(() => {
				let ret = store.state.getdata
				if(ret&&ret.error=='0')
				{
					console.log(ret)
					this.menu = ret.data.menu
					// this.logoname = ret.data.name
				}
			})
		}
	},
})