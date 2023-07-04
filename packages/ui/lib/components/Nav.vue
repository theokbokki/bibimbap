<script setup>
const url = useRequestURL()
const user = null;

async function handleSumbit() { console.log('logout') }
</script>

<template>
	<nav class="flex between center-y | mt-32 | nav">
		<h2 class="sr-only">Main nav</h2>
		<NuxtLink to="/" class="title-small-medium"
			:class="url.pathname.startsWith('/auth') ? 'clr-neutral-200' : 'clr-primary-400'">Bibimbap</NuxtLink>

		<!-- The User avatar -->
		<div v-if="user" class="grid | gy-8 | avatar">
			<input type="checkbox" class="sr-only" id="avatar-toggle">
			<label class="avatar-image pointer" for="avatar-toggle">
				<img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
			</label>
			<label class="transparent-overlay" for="avatar-toggle"></label>
			<div class="grid | px-8 py-16 gy-16 radius-8 | avatar-actions">
				<NuxtLink to="/profile" class="text-medium smooth | link no-underline">
					View profile
				</NuxtLink>
				<div class="pt-8 avatar-logout">
					<form @submit.prevent="handleSubmit" class="pt-8 | avatar-logout">
						<button type="submit" class="text-medium clr-error smooth pointer">
							Logout
						</button>
					</form>
				</div>
			</div>
		</div>
		<!-- The login et register links -->
		<div v-else-if="!url.pathname.startsWith('/auth')" class="flex center-y | gx-24">
			<NuxtLink to="/auth/login" class="text-medium-large smooth | link">
				Login
			</NuxtLink>
			<NuxtLink to="http://web.test/auth/register" target="_blank" class="btn">
				Register
			</NuxtLink>
		</div>
	</nav>
</template>
