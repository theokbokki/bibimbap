<script setup>
import Nav from './Nav.vue';

defineProps({
    title: String,
})
</script>

<template>
    <h1 class="sr-only" v-text="title"></h1>
    <Nav />

    <slot />
</template>
