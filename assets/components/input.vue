<template>
  <div class="form-group">
    <label><slot name="headline"></slot></label>
    <input :type="info.type" @change="setinput" :name="info.name" class="form-control" :placeholder="info.placeholder" v-model="info.val">
    <small class="form-text text-muted"><slot name="prompt"></slot></small>
  </div>
</template>
<script>
/**
 * @desc 输入框
 * @module components/input
 */
export default {
	name: 'zl-input',
  data () {
    return {
      butclass: '', // 按钮样式
      name: ''
    }
  },
	props: {
    info: {
      type: Object,
      default: function () {
        return {name: '', type: 'text', placeholder: ''}
      }
    },
    type: {
      type: String,
      default: 'button'
    }
  },
  methods: {
    setinput: function () {
      let data = this.$store.state.senddata
      data[this.info.name] = this.info.val
      this.$store.commit('M_UP_SENDDATA',data)
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
@import "../scss/mixins/border-radius";
@import "../scss/mixins/text-truncate";
@import "../scss/mixins/text-emphasis";
@import "../scss/mixins/text-hide";
@import "../scss/utilities/text";
@import "../scss/mixins/forms";
@import "../scss/forms";
input {
  box-sizing: border-box;
}
</style>