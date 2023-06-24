<script setup>
import { callApi } from '@bibimbap/shared-commands/bindings.ts'

async function handleSubmit(e) {
	const formData = new FormData(e.target);

	const formDataObject = {};
	formData.forEach((value, key) => {
		formDataObject[key] = value;
	});

	await callApi('login', { "email": formDataObject.email, "password": formDataObject.password }).then((res) => {
		console.log(res);
	}).catch((err) => {
		console.log(err);
	})
}
</script>

<template>
	<div class="container">
		<div class="content">
			<h1>Bibimbap</h1>
			<form @submit.prevent="handleSubmit">
				<div class="field">
					<label for="email">Email</label>
					<input type="email" name="email" id="email">
				</div>
				<div class="field">
					<label for="password">Password</label>
					<input type="password" name="password" id="password">
				</div>
				<ui-btn>Click me!</ui-btn>
			</form>
		</div>
	</div>
</template>

<style scoped>
* {
	font-family: sans-serif;
}

.container {
	height: 100vh;
	width: 100vw;
	display: grid;
	place-items: center;
}

.content {
	display: grid;
}

.field {
	display: grid;
	gap: .25rem;
}

h1 {
	color: #999999;
}

input {
	border: 1px solid #cccccc;
	padding: .5rem;
}

form {
	display: grid;
	gap: 2rem;
}
</style>
