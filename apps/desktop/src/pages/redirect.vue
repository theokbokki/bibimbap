<script setup>
import { open } from '@tauri-apps/api/shell';
import { listen } from '@tauri-apps/api/event';

useHead({
	title: "Redirecting to the browser",
})

const params = useRequestURL().searchParams;

const token = params.get("token");

function reopenRegister() {
	open('http://web.test/auth/register?token=' + token);
}

const unlisten = await listen('scheme-request-received', (e) => {
	navigateTo(e.payload);
})
</script>

<template>
	<main class="flex col flex-1 center-x center-y | gy-40">
		<p class="title-large clr-neutral-500">Go to your browser to complete the action</p>
		<a @click="reopenRegister" class="btn">Didn't work ? Try again</a>
	</main>
</template>
