<script setup>
const props = defineProps({
	type: {
		type: String,
		default: "text",
	},
	id: String,
	name: String,
	label: String,
	model: String,
	placeholder: String,
	hasErrors: Boolean,
})
</script>

<template>
	<div class="grid | gy-8">
		<label :for="props.name">{{ props.label }}</label>
		<div class="smooth | field-wrapper">
			<input :type="props.type" :id="props.id" :name="props.name" :value="model"
				@input="$emit('update:model', $event.target.value)" class="py-12 px-16 radius-8 smooth | field"
				:placeholder="props.placeholder" :data-error="hasErrors" />
		</div>
		<div class="clr-error text-small">
			<slot />
		</div>
	</div>
</template>
