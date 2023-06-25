<script setup>
import { Link } from '@inertiajs/vue3';
import Btn from './Btn.vue';
</script>

<template>
    <nav class="flex between center-y | mt-32">
        <h2 class="sr-only">Main nav</h2>
        <Link href="/" class="title-small-medium clr-primary-400">Bibimbap</Link>

        <!-- The User avatar -->
        <!-- TODO: user login -->
        <Link v-if="false" class="avatar-image">
        <img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
        </Link>

        <!-- The login et register links -->
        <div v-else-if="!$page.url.startsWith('/auth')" class=" flex center-y | gx-24">
            <Link href="/login" class="text-medium-large smooth | link">
            Login
            </Link>
            <Btn href="/register">
                Register
            </Btn>
        </div>
    </nav>
</template>
