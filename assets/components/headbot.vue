<template>
  <div class="fixed-bottom">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" :menulist="menulist">
      <div class="navbar-collapse justify-content-center">
        <div class="navbar-box" v-for="(menu,i) in menulist">
          <ul class="navbar-nav bg-light" :style="getstyle(i+1)" v-if="menu.list">
            <li class="nav-item active" v-for="info in menu.list">
              <zl-jump class="nav-link" @menucallback="menucallback" :info="info">{{info.name}}</zl-jump>
            </li>
          </ul>
          <a class="navbar-toggler" @click="shownav(i+1)">{{menu.name}}</a>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
import zlJump from './jump'
/**
 * @desc 菜单
 * @module components/headbot
 * @param {String} [props.menulist] - 菜单
 */
export default {
	name: 'zl-headbot',
  data () {
    return {
      menuind: ''
    }
  },
	props: {
		menulist: Array,
		default: []
	},
  components: {
    zlJump
  },
  methods: {
    shownav: function (ind) {
      this.menuind = ind
    },
    menucallback: function () {
      this.menuind = 0
    },
    getstyle: function (i) {
      return i == this.menuind ? 'display:flex' : ''
    },
    handleother: function (obj) {
      if(obj.target.className!='navbar-toggler') {
        this.menuind = 0
      }
    }
  },
  mounted () {
    document.addEventListener('click', this.handleother)
  },
  destroyed () {
    document.removeEventListener('click', this.handleother)
  }
}
</script>
<style lang="scss">
@import "../scss/functions";
@import "../scss/variables";
@import "../scss/mixins/breakpoints";
@import "../scss/mixins/hover";
@import "../scss/mixins/border-radius";
@import "../scss/utilities/spacing";
@import "../scss/utilities/position";
@import "../scss/navbar";
.bg-light {
  background-color: #f8f9fa !important;
}
.navbar {
  line-height: 36px;
}
body {
  padding-bottom: 36px;
}
.nflex{
  display: flex;
}
</style>