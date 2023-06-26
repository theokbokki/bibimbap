<template>
    <div class="grid | auth-page">
        <div>
            <div class="grid | bg-primary-200 | auth-filler">
                <p class="ml-40 mb-40 title-large clr-neutral-200">Tauri apps with the power of Laravel</p>
            </div>
        </div>
        <section class="grid center | gy-40 ml-32 | auth-form">
            <slot></slot>
        </section>
    </div>
</template>
