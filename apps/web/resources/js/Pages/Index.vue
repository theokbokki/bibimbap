<script setup>
import Layout from '../Shared/Layout.vue'
import { Head } from '@inertiajs/vue3'
import Infobox from '@bibimbap/ui/lib/components/Infobox.vue'

defineOptions({ layout: Layout })
</script>

<template>
    <Head title="Home page of the app" />

    <section class="flex col flex-1 center-x center-y">
        <p class="title-xl clr-neutral-400">An awesome app comes here!</p>
    </section>
</template>
