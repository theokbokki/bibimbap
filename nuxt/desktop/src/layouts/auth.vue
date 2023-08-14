<template>
	<NuxtLayout name="default">
		<div class="grid | auth-page">
			<div class="auth-filler-container">
				<div class="grid | bg-primary-200 | auth-filler">
					<p class="ml-40 mb-40 title-large clr-neutral-200">Tauri apps with the power of Laravel</p>
				</div>
			</div>
			<section class="grid center | gy-40 ml-32 | auth-form">
				<slot>
					<NuxtPage />
				</slot>
			</section>
		</div>
	</NuxtLayout>
</template>
