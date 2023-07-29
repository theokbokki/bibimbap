<script setup>
import { open } from '@tauri-apps/api/shell';

useHead({
	title: "Redirecting to the browser",
})

const params = useRequestURL().searchParams;

const token = params.get("token");

function reopenRegister() {
	open('http://web.test/auth/register?token=' + token);
}
</script>

<template>
	<main class="flex col flex-1 center-x center-y | gy-40">
		<p class="title-large clr-neutral-500">Go to your browser to complete the action</p>
		<a @click="reopenRegister" class="btn">Didn't work ? Try again</a>
	</main>
</template>
