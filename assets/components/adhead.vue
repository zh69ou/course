<template>
  <div class="div-cont">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand">
        <img src="../img/14ke-logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
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
              <a class="nav-link" :href="menu.url"><img src="../img/news.svg" width="30" height="30" class="d-inline-block align-top" alt="">{{menu.name}}<span class="badge badge-danger">{{menu.num}}</span></a>
            </li>
            <li class="nav-item" v-else-if="menu.type=='user'">
              <a class="nav-link">
                <img v-if="menu.ico!=''" :src="menu.ico" alt="">
                <!-- <img v-else src="/img/myinfo.png" alt=""> -->
                {{menu.name}}
              </a>
            </li>
            <li class="nav-item dropdown" v-else >
              <a class="nav-link dropdown-toggle" @click="showdrop(menu)">
                <img src="../img/PersonalCenter.svg" width="30" height="30" class="d-inline-block align-top" alt="">
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
    <template>
      <indexmian></indexmian>
    </template>
  </div>
</template>
<script>
import zlJump from './jump'
import indexmian from './indexmian'
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
  components:{
    indexmian
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
.bg-dark {
    background-color: #37394f!important;
}
</style>