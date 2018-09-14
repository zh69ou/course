<template>
	<div>
		<div class="row">
			<div :class="leftclass">
				<div class="text-right"><span v-html="actbtn" @click="actmenu"></span></div>
				<slot name="boxleft"></slot>
			</div>
			<div :class="rightclass">
				<slot name="boxright"></slot>
			</div>
		</div>
	</div>
</template>
<script>
/**
 * @desc 后台结构
 * @module components/adbox
 * @param {String} [props.boxleft] - 左侧结构
 * @param {String} [props.boxright] - 右侧结构
 */
export default {
	name: 'zl-adbox',
	data: function () {
		return {
			leftclass:'',
			rightclass:'',
			actbtn:'',
			showact:0
		}
	},
	props: {
		isshow: {
      type: Number,
      default: 0
    }
	},
	created: function () {
		this.setclass()
	},
	watch: {
		isshow: function () {
			this.showact = this.isshow
		},
		showact: function () {
			this.setclass()
		}
	},
	methods: {
		actmenu: function () {
			if(this.showact==1)
			{
				this.showact = 0
			}else{
				this.showact = 1
			}
		},
		setclass: function(){
			if(this.showact==1)
			{
				this.leftclass = 'col-6 col-md-2 bg-dark text-white'
				this.rightclass = 'col-6 col-md-10'
				this.actbtn = '&lt;'
			}else{
				this.leftclass = 'col-1 bg-dark text-white'
				this.rightclass = 'col-11'
				this.actbtn = '&gt;'
			}
		}
	}
}
</script>
<style lang="scss">
@import "../scss/functions";
@import "../scss/variables";
@import "../scss/mixins/breakpoints";
@import "../scss/mixins/grid";
@import "../scss/mixins/grid-framework";
@import "../scss/mixins/hover";
@import "../scss/mixins/text-truncate";
@import "../scss/mixins/text-emphasis";
@import "../scss/mixins/text-hide";
@import "../scss/utilities/text";
@import "../scss/mixins/background-variant";
@import "../scss/utilities/background";
@import "../scss/grid";
</style>