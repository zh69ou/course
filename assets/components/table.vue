<template>
	<div class="table-responsive-lg">
		<table class="table table-hover" cellpadding="0" cellspacing="0">
			<thead>
				<tr class="table-light" v-if="title">
					<th v-if="t.name" v-for="t in title" @click="tclick(t)">{{t.name}}</th>
				</tr>
			</thead>
			<tbody>
				<tr class="table-light" v-if="b" v-for="b in content">
					<td v-if="typeof l=='string'" v-for="l in b">{{l}}</td>
					<td v-else>
						<template v-for="bu in l">
							<zl-button :but="bu" @click="eclick(bu,b)"></zl-button>
						</template>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>
<script>
import zlButton from './button'
/**
 * @desc 表单
 * @module  components/table
 */
	export default {
		name: 'zl-table',
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
		components: {
	    zlButton
	  },
		methods: {
			tclick: function (t) {
				if(t.click) {
					this.$emit(t.click,t)
				}
			},
			eclick: function (t,b) {
				if(t.click) {
					this.$emit(t.click,b)
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
@import "../scss/mixins/gradients";
@import "../scss/mixins/transition";
// @import "../scss/mixins/border-radius";
@import "../scss/mixins/table-row";
@import "../scss/tables";
.table-light{
	white-space: nowrap;
}
.btn {
	margin: 0rem 0.1rem;
}
</style>