<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const user = computed(() => usePage().props.auth?.user)
</script>

<template>
    <nav class="flex between center-y | mt-32 | nav">
        <h2 class="sr-only">Main nav</h2>
        <Link href="/" class="title-small-medium"
            :class="$page.url.startsWith('/auth') ? 'clr-neutral-200' : 'clr-primary-400'">
        Bibimbap</Link>

        <!-- The User avatar -->
        <div v-if="user" class="flex center-y | gx-16">
            <p>@{{ user.username }}</p>
            <Link class="avatar-image">
            <img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
            </Link>
        </div>
        <!-- The login et register links -->
        <div v-else-if="!$page.url.startsWith('/auth')" class=" flex center-y | gx-24">
            <Link href="/auth/login" class="text-medium-large smooth | link">
            Login
            </Link>
            <Link as="button" type="submit" href="/auth/register" class="btn">
            Register
            </Link>
        </div>
    </nav>
</template>
