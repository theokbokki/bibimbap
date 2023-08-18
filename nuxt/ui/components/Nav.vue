<script setup>
const props = defineProps(['user']);

const url = useRequestURL();

const user = JSON.parse(localStorage.getItem('user'));

async function handleSubmit() {
	localStorage.removeItem('loggedIn');
	localStorage.removeItem('user');
	navigateTo('/auth/login');
}
</script>

<template>
	<nav class="flex between center-y | mt-32 | nav">
		<h2 class="sr-only">Main nav</h2>
		<NuxtLink to="/" class="title-small-medium | logo"
			:class="url.pathname.startsWith('/auth') ? 'clr-neutral-200' : 'clr-primary-400'">Bibimbap</NuxtLink>

		<!-- The User avatar -->
		<div v-if="!url.pathname.startsWith('/auth') && user" class="grid | gy-8 | avatar">
			<input type="checkbox" class="sr-only" id="avatar-toggle">
			<label class="avatar-image pointer" for="avatar-toggle">
				<img :src="'https://ui-avatars.com/api/?background=random&name=' + user.username" alt="" class=" circle" />
			</label>
			<label class="transparent-overlay" for="avatar-toggle"></label>
			<div class="grid | px-8 py-16 gy-16 radius-8 | avatar-actions">
				<NuxtLink to="/profile" class="text-medium smooth | link no-underline">
					View profile
				</NuxtLink>
				<form @submit.prevent="handleSubmit" class="pt-8 | avatar-logout">
					<button type="submit" class="text-medium clr-error smooth pointer">
						Logout
					</button>
				</form>
			</div>
		</div>
	</nav>
</template>
