<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand">
      <svg class="d-block" width="36" height="36" viewBox="0 0 612 612" xmlns="http://www.w3.org/2000/svg" focusable="false"><title>Bootstrap</title><path fill="currentColor" d="M510 8a94.3 94.3 0 0 1 94 94v408a94.3 94.3 0 0 1-94 94H102a94.3 94.3 0 0 1-94-94V102a94.3 94.3 0 0 1 94-94h408m0-8H102C45.9 0 0 45.9 0 102v408c0 56.1 45.9 102 102 102h408c56.1 0 102-45.9 102-102V102C612 45.9 566.1 0 510 0z"></path><path fill="currentColor" d="M196.77 471.5V154.43h124.15c54.27 0 91 31.64 91 79.1 0 33-24.17 63.72-54.71 69.21v1.76c43.07 5.49 70.75 35.82 70.75 78 0 55.81-40 89-107.45 89zm39.55-180.4h63.28c46.8 0 72.29-18.68 72.29-53 0-31.42-21.53-48.78-60-48.78h-75.57zm78.22 145.46c47.68 0 72.73-19.34 72.73-56s-25.93-55.37-76.46-55.37h-74.49v111.4z"></path></svg>
    </a>
    <button class="navbar-toggler" type="button" @click="showmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" ref="admenu">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">{{logoname}}</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <template v-for="(menu,i) in adheadmenu">
          <li class="nav-item" v-if="menu.type=='notic'">
            <a class="nav-link" :href="menu.url">{{menu.name}}<span class="badge badge-danger">{{menu.num}}</span></a>
          </li>
          <li class="nav-item" v-else-if="menu.type=='user'">
            <a class="nav-link">
              <img v-if="menu.ico!=''" :src="menu.ico" alt="">
              <img v-else src="/img/myinfo.png" alt="">
              {{menu.name}}
            </a>
          </li>
          <li class="nav-item dropdown" v-else >
            <a class="nav-link dropdown-toggle" @click="showdrop(menu)">
              {{menu.name}}
            </a>
            <div class="dropdown-menu" v-if="menu.show">
              <a class="dropdown-item" v-for="list in menu.list" :href="list.url">{{list.name}}</a>
            </div>
          </li>
        </template>
      </ul>
    </div>
  </nav>
</template>
<script>
import zlJump from './jump'
/**
 * @desc 后台菜单
 * @module components/adhead
 * @param {String} [props.adheadmenu] - 后台菜单
 */
export default {
	name: 'zl-adhead',
  props: {
    adheadmenu: {
      type:Array,
      default: function () {
        return []
      }
    },
    logoname:{
      type:String,
      default:''
    }
  },
  methods: {
    showmenu:function(){
      if(this.$refs.admenu.style.display=='block')
      {
        this.$refs.admenu.style.display='none'
      }else{
        this.$refs.admenu.style.display='block'
      }
    },
    showdrop:function(obj){
      if(obj.show==1)
      {
        obj.show = 0
      }else{
        obj.show = 1
      }
    }
  }
}
</script>
<style lang="scss">
@import "../scss/functions";
@import "../scss/variables";
@import "../scss/mixins/breakpoints";
@import "../scss/mixins/hover";
@import "../scss/mixins/caret";
@import "../scss/mixins/badge";
@import "../scss/mixins/gradients";
@import "../scss/mixins/border-radius";
@import "../scss/mixins/box-shadow";
@import "../scss/mixins/nav-divider";
@import "../scss/utilities/spacing";
@import "../scss/utilities/position";
@import "../scss/navbar";
@import "../scss/nav";
@import "../scss/dropdown";
@import "../scss/badge";
.dropdown-menu{
  display: block;
}
.nav-link img{
  width: 1.5rem;
  height: 1.5rem;
  border-radius: 1.5rem;
}
</style>