import Vue from 'vue'
import Swiper from 'swiper'

import '../ico/search.svg'
import '../ico/note.svg'
import '../ico/logo.png'
import '../ico/user.jpg'
import '../ico/userico.svg'
import '../ico/logoutico.svg'
import '../ico/vedio.svg'
import '../ico/book.svg'
import '../ico/ranking.svg'
import '../ico/cut.svg'
import '../ico/qq.svg'

import '../ico/rankbg.png'
import '../ico/one.png'
import '../ico/two.png'
import '../ico/three.png'
import '../ico/point.png'

import '../ico/banner1.jpg'
import '../ico/banner2.jpg'
import '../ico/book.jpg'
import '../ico/book.png'

import 'swiper/dist/css/swiper.min.css'

require('../css/index.scss');

var wd = window.innerWidth;

var num = wd > 990 ? 5 : 2 ;

new Vue({
	el: '#app',
	components: {
	},
	data () {
		return {
			screenWidth: document.body.clientWidth,
			keywords:''
		}
	},
	mounted () {
		const that = this
		window.onresize = () => {
			return (() => {
				window.screenWidth = document.body.clientWidth
				that.screenWidth = window.screenWidth
			})()
		}
		that.webadapt
	},
	created () {
	},
	watch: {
		screenWidth (val) {
			if (!this.timer) {
				this.screenWidth = val
				this.timer = true
				let that = this
				setTimeout(function () {
					that.webadapt
					that.timer = false
				},400)
			}
		}
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
		}
	},
	computed: {
		webadapt:function () {
			let num = this.screenWidth > 990 ? 5 : 2
			let banner = new Swiper('.banner', {
				pagination: {
			    el: '.swiper-pagination',
			  },
				autoplay: 5000
			})
			let newbook = new Swiper('.newbook', {
			  slidesPerView: num,
			  spaceBetween : 20,
			  autoplay: 10000
			})
		}
	}
});
