<template>
  <button type="button" :class="butclass" @click="handleClick"><slot>{{name}}</slot></button>
</template>
<script>
/**
 * @desc 按钮
 * @module components/button
 * @param {String} [props.isshow] - 是否显示
 */
export default {
	name: 'zl-button',
  data () {
    return {
      butclass: '', // 按钮样式
      name: ''
    }
  },
	props: {
    but: {
      type: Object,
      default: function () {
        return {name: '', type: 'blin', color: '', size: ''}
      }
    }
  },
  mounted: function () {
    if (this.but.type) {
      switch (this.but.type) {
        case 'bse':
          this.butclass = 'btn btn-secondary'
          break
        case 'bsu':
          this.butclass = 'btn btn-success'
          break
        case 'bdan':
          this.butclass = 'btn btn-danger'
          break
        case 'bwa':
          this.butclass = 'btn btn-warning'
          break
        case 'bin':
          this.butclass = 'btn btn-info'
          break
        case 'blig':
          this.butclass = 'btn btn-light'
          break
        case 'bdar':
          this.butclass = 'btn btn-dark'
          break
        case 'blin':
          this.butclass = 'btn btn-link'
          break
        case 'lpr':
          this.butclass = 'btn btn-outline-primary'
          break
        case 'lse':
          this.butclass = 'btn btn-outline-secondary'
          break
        case 'lsu':
          this.butclass = 'btn btn-outline-success'
          break
        case 'ldan':
          this.butclass = 'btn btn-outline-danger'
          break
        case 'lwa':
          this.butclass = 'btn btn-outline-warning'
          break
        case 'lin':
          this.butclass = 'btn btn-outline-info'
          break
        case 'llig':
          this.butclass = 'btn btn-outline-light'
          break
        case 'ldar':
          this.butclass = 'btn btn-outline-dark'
          break
        default:
          this.butclass = 'btn btn-primary'
      }
    }
    this.butclass = this.butclass.length > 0 ? this.butclass : 'btn btn-primary'
    if (this.but.size) {
      switch (this.but.size) {
        case 'lg':
          this.butclass += ' btn-lg'
          break
        case 'sm':
          this.butclass += ' btn-sm'
      }
    }

    this.name = this.but.name
  },
  methods: {
    handleClick (evt) {
      this.$emit('click', evt)
    }
  }
}
</script>
<style lang="scss">
@import "../scss/functions";
@import "../scss/variables";
@import "../scss/mixins/breakpoints";
@import "../scss/mixins/hover";
@import "../scss/mixins/gradients";
@import "../scss/mixins/transition";
@import "../scss/mixins/box-shadow";
@import "../scss/mixins/buttons";
@import "../scss/buttons";
@import "../scss/close";
</style>