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

import '../ico/banner1.jpg'
import '../ico/banner2.jpg'
import '../ico/book.jpg'
import '../ico/book.png'

import 'swiper/dist/css/swiper.min.css'

require('../css/index.scss');

new Vue({
	el: '#app',
	components: {
	},
	data () {
		return {
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
		}
	},
	computed: {
	}
});

var banner = new Swiper('.banner', {
	pagination: {
    el: '.swiper-pagination',
  },
	autoplay: 5000
})

var newbook = new Swiper('.newbook', {
	pagination: {
    el: '.swiper-pagination',
    slidesPerView: 5,
    spaceBetween : 20,
    slidesOffsetBefore : 100,
  }
})