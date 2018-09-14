<template>
	<div class="btn-toolbar">
	  <div class="btn-group">
	    <button type="button" class="btn btn-outline-info">1</button>
	    <input type="text" class="btn btn-outline-info" size="3">
	    <button type="button" class="btn btn-outline-info">4</button>
	  </div>
	</div>
</template>
<script>
/**
 * @desc 表单
 * @module  components/pages
 */
	export default {
		name: 'zl-pages',
		props: {
			title: {
				type: Array,
				default: function () {
					return []
				}
			},
			content: {
				type: Array,
				default: function () {
					return []
				}
			}
		},
		methods: {
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
</style>