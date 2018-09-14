import Vue from 'vue'
// import Vuex from 'vuex'
// import pubstore from '../config/store.js'

import search from '../ico/search.svg'
import note from '../ico/note.svg'
import logo from '../ico/logo.png'
import user from '../ico/user.jpg'
import userico from '../ico/userico.svg'
import logoutico from '../ico/logoutico.svg'

require('../scss/bootstrap-grid.scss');

// Vue.use(Vuex)
// const store = new Vuex.Store(pubstore)
// new Vue({
// 	el: '#app',
// 	components: {
// 		zlAdhead:()=>import('../components/adhead.vue'),
// 		zlAdbox:()=>import('../components/adbox.vue')
// 	},
// 	store,
// 	data () {
// 		return {
// 			adheadmenu:[],
// 			logoname:''
// 		}
// 	},
// 	created () {
// 		this.getheadmenu
// 	},
// 	methods: {
// 	},
// 	computed: {
// 		getheadmenu:function () {
// 			store.commit('M_UP_URL','/getheadmenu')
// 			store.dispatch('A_SENDDATE').then(() => {
// 				let ret = store.state.getdata
// 				if(ret&&ret.error=='0')
// 				{
// 					this.adheadmenu = ret.data.menu
// 					this.logoname = ret.data.name
// 				}
// 			})
// 		}
// 	}
// });