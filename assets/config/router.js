import Vue from 'vue'
import VueRouter from 'vue-router'
import xyz from '../components/echartshiping.vue'

const routes = [
    {
    	path: '/echartshiping',
    	name:'echartshiping',
    	components: echartshiping
    },
]

export default new VueRouter({
  	routes
})
