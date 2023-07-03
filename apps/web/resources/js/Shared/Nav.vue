<script setup>
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const user = computed(() => usePage().props.auth?.user)
</script>

<template>
    <nav class="flex between center-y | mt-32 | nav">
        <h2 class="sr-only">Main nav</h2>
        <a href="/" class="title-small-medium"
            :class="$page.url.startsWith('/auth') ? 'clr-neutral-200' : 'clr-primary-400'">Bibimbap</a>

        <!-- The User avatar -->
        <div v-if="user" class="grid | gy-8 | avatar">
            <input type="checkbox" class="sr-only" id="avatar-toggle">
            <label class="avatar-image pointer" for="avatar-toggle">
                <img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
            </label>
            <label class="transparent-overlay" for="avatar-toggle"></label>
            <div class="grid | px-8 py-16 gy-16 radius-8 | avatar-actions">
                <Link href=" /profile" class="text-medium smooth | link no-underline">
                View profile
                </Link>
                <div class="pt-8 avatar-logout">
                    <a href="/auth/login" method="delete" as="button" class="text-medium clr-error smooth pointer">
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <!-- The login et register links -->
        <div v-else-if="!$page.url.startsWith('/auth')" class=" flex center-y | gx-24">
            <a href="/auth/login" class="text-medium-large smooth | link">
                Login
            </a>
            <a href="/auth/register" class="btn">
                Register
            </a>
        </div>
    </nav>
</template>
