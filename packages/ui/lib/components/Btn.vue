<template>
	<button>
		<slot></slot>
	</button>
</template>

<style scoped>
button {
	border: none;
	padding: .5rem 1rem;
	background: #D590CC;
	color: white;
	font-size: 1.25rem;
	font-family: sans-serif;
	border-radius: 0.4375rem;
}

button:hover {
	background: #C477B1;
	cursor: pointer;
}
</style>
