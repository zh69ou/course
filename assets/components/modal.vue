<template>
  <div class="modal" v-if="isshow">
    <div :class="modalsize()">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{title}}</h4>
          <zl-button :class="'close'" @click="closemodal" v-if="closeshow">
            <span>&times;</span>
          </zl-button>
        </div>
        <div class="modal-body">
          <slot>{{content}}</slot>
        </div>
        <div class="modal-footer">
          <zl-button :but="butone" v-if="butone.status" @click="bone"></zl-button>
          <zl-button :but="buttwo" v-if="buttwo.status" @click="btwo"></zl-button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import zlButton from './button'
/**
 * @desc 弹框
 * @module components/modal
 * @param {String} [props.isshow] - 是否显示
 * @param {String} [props.butone] - 第一按钮
 * @param {String} [props.buttwo] - 第二按钮
 * @param {String} [props.boxsize] - 弹框尺寸
 * @param {String} [props.closeshow] - 关闭按钮显示
 */
export default {
	name: 'zl-modal',
	props: {
    isshow: {
      type: Boolean,
      default: false
    },
    closeshow: {
      type: Boolean,
      default: true
    },
    butone: {
      type: Object,
      default: function () {
        return {name: '关闭', type: 'close', status: false}
      }
    },
    buttwo: {
      type: Object,
      default: function () {
        return {name: '提交', type: 'sub', status: true}
      }
    },
    boxsize: {
      type: String,
      default: 'def' // def/log/sm
    },
    content: {
      type: String,
      default: ''
    },
    title: {
      type: String,
      default: ''
    }
  },
  components: {
    zlButton
  },
  methods: {
    modalsize: function () {
      let name = 'modal-dialog modal-dialog-centered'
      if (this.boxsize == 'sm') {
        name += ' modal-sm'
      } else if (this.boxsize == 'lg') {
        name += ' modal-lg'
      }
      return name
    },
    closemodal: function () {
      this.$emit('modalclose')
    },
    bone: function () {
      this.$emit('modalbone')
    },
    btwo: function () {
      this.$emit('modalbtwo')
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
@import "../scss/mixins/border-radius";
@import "../scss/mixins/box-shadow";
@import "../scss/modal";
.modal{
  display: block;
}
</style>