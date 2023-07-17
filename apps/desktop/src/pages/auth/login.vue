<script setup lang="ts">
import Field from '@bibimbap/ui/lib/components/Field.vue';

useHead({
	title: "Login page of Bibimbap",
})
definePageMeta({
	layout: 'auth',
});
</script>

<template>
	<Head title="Login" />

	<h3 class="title-medium-light text-center">Welcome back</h3>
	<form @submit.prevent="" class="grid | gy-32">
		<Field type="email" label="Email" id="email" name="email" :has-errors="false" placeholder="rick.astley@skynet.co">
			<p v-if="false">{{ }}</p>
		</Field>
		<Field type="password" label="Password" id="password" name="password" :has-errors="false">
			<p v-if="false">{{}}</p>
		</Field>
		<div class="grid | gy-16">
			<button type="submit" class="btn" :disabled="false">Login</button>
			<p class="text-end">Don’t have an account yet?
				<NuxtLink to="http://web.test/auth/register" target="_blank" class="clr-primary-400 smooth | link">
					Register
				</NuxtLink>
			</p>
		</div>
	</form>
</template>
