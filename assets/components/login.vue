<template>
	<zl-modal @modalclose="modalclose" @modalbone="modalbone" @modalbtwo="modalbtwo" :isshow="isshow()" :closeshow="false" :title="'登录'" ref="logform">
    <form accept-charset="utf-8">
      <template v-for="list in formlist">
        <zl-input :info="list">
          <template slot="headline">{{list.headline}}</template>
          <template slot="prompt">{{list.prompt}}</template>
        </zl-input>
      </template>
    </form>
  </zl-modal>
</template>
<script>
import zlModal from './modal'
import zlInput from './input'
/**
 * @desc 登录
 * @module components/login
 */
export default {
	name: 'zl-login',
  props: {
    formlist: {
      type: Array,
      default: function () {
        return []
      }
    },
    closeshow: {
      type: Boolean,
      default: true
    }
  },
	components: {
    zlModal,
    zlInput
  },
  methods: {
    isshow: function () {
      return this.$store.state.islogin
    },
    modalclose: function () {
      this.$emit('modalclose')
    },
    modalbone: function () {
      this.$emit('modalbone')
    },
    modalbtwo: function () {
      this.$emit('modalbtwo')
    }
  }
}
</script>