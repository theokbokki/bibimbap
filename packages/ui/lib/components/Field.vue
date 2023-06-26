<script setup>
const props = defineProps({
	type: {
		type: String,
		default: "text",
	},
	id: String,
	name: String,
	label: String,
	hasErrors: {
		type: Boolean,
		default: false,
	}
})
</script>

<template>
	<div class="grid | gy-8">
		<label for="props.name">{{ props.label }}</label>
		<div class="field-wrapper radius-8">
			<input type="props.type" id="props.id" name="props.name" class="py-12 px-16 radius-8 | field"
				data-error="hasErrors" />
		</div>
		<slot name="error" />
	</div>
</template>
