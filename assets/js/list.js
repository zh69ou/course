import Vue from 'vue'
import Vuex from 'vuex'
import pubstore from '../config/store.js'

require('../scss/bootstrap-grid.scss');
Vue.use(Vuex)
const store = new Vuex.Store(pubstore)
new Vue({
	el: '#app',
	components: {
		zlAdhead:()=>import('../components/adhead.vue')
		// zlTable:()=>import('../components/table.vue'),
		// zlPages:()=>import('../components/pages.vue'),
		// swiper,
		// swiperSlide,
		// zlLoading:()=>import('../components/loading.vue'),
		// zlBreadcrumb:()=>import('../components/breadcrumb.vue'),
		// zlLogin:()=>import('../components/login.vue')
		// fetch:()=>import('../plugs/fetch.js')
	},
	store,
	data () {
		return {
			// banner: '',
			// table:{},
			// menulist: [],
			// breadcrumblist: []
		}
	},
	created () {
		// this.getBanner
		// this.getBreadcrumb
		this.showlogin
	},
	methods: {
		// edituser: function (obj) {
		// 	// console.log(obj)
		// },
		// deluser: function (obj) {
		// 	// console.log(obj)
		// },
		// ascnum: function (obj) {
		// 	// console.log(obj)
		// }
	},
	computed: {
		// getBanner: function () {
		// 	store.commit('M_UP_URL','/api/banner')
		// 	store.commit('M_UP_SENDDATA',{abc:'abc'})
		// 	store.dispatch('A_SENDDATE')
		// 	let list = store.state.getdata
		// 	if (list.length > 0) {
		// 		this.banner = store.state.getdata
		// 	}
		// },
		// getBreadcrumb: function () {
		// 	store.commit('M_UP_URL','/api/breadcrumb')
		// 	store.commit('M_UP_SENDDATA',{abc:'abc'})
		// 	store.dispatch('A_SENDDATE')
		// 	let list = store.state.getdata
		// 	if (list.length > 0) {
		// 		this.breadcrumblist = store.state.getdata
		// 	}
		// },
		showlogin:function () {
			store.commit('M_UP_LOGIN',true)
		},
		isshow: function () {
			return store.state.islogin
		}
	}
});