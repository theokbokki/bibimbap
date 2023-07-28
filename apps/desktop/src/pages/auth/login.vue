<script setup>
import Field from '@bibimbap/ui/lib/components/Field.vue';
import { callApi } from '@bibimbap/shared-commands';

useHead({
	title: "Login page of Bibimbap",
})

definePageMeta({
	layout: 'auth',
});

const errors = ref({
	email: '',
	password: '',
});

async function handleSubmit(e) {
	const formData = new FormData(e.target);
	const data = Object.fromEntries(formData);

	await callApi('POST', 'auth/login', data).then((r) => {
		const res = JSON.parse(r);

		if (res.success) {
			localStorage.setItem('loggedIn', true);
			navigateTo('/');
		}
		else {
			errors.value = res.errors;
		}
	})
}
</script>

<template>
	<Head title="Login" />

	<h3 class="title-medium-light text-center">Welcome back</h3>
	<form @submit.prevent="handleSubmit" class="grid | gy-32">
		<Field type="email" label="Email" id="email" name="email" :has-errors="false" placeholder="rick.astley@skynet.co">
			<p v-if="errors.email">{{ errors.email[0] }}</p>
		</Field>
		<Field type="password" label="Password" id="password" name="password" :has-errors="false">
			<p v-if="errors.password">{{ errors.password[0] }}</p>
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
