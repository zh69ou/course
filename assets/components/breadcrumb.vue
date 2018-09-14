<template>
	<nav>
	  <ol class="breadcrumb">
	    <li :class="{'breadcrumb-item':1,active:(index+1)==menulist.length}" v-for="(menu,index) in menulist">
	    	<zl-jump :info="menu">{{menu.name}}</zl-jump>
	    </li>
	  </ol>
	</nav>
</template>
<script>
import zlJump from './jump'
/**
 * @desc 面包屑
 * @module components/breadcrumb
 * @param {String} [props.menulist] - 面包屑
 */
export default {
	name: 'zl-breadcrumb',
	props: {
		menulist: Array,
		default: []
	},
	components: {
    zlJump
  },
  methods: {}
}
</script>
<style lang="scss">
@import "../scss/functions";
@import "../scss/variables";
@import "../scss/mixins/border-radius";
@import "../scss/breadcrumb";
</style>