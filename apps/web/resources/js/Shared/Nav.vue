<script setup>
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue'
import { usePage } from '@inertiajs/vue3'

const user = computed(() => usePage().props.auth?.user)

const avatarActionsElement = ref(null)
let showAvatarActions = ref(false)
</script>

<template>
    <nav class="flex between center-y | mt-32 | nav">
        <h2 class="sr-only">Main nav</h2>
        <Link href="/" class="title-small-medium"
            :class="$page.url.startsWith('/auth') ? 'clr-neutral-200' : 'clr-primary-400'">
        Bibimbap</Link>

        <!-- The User avatar -->
        <div v-if="user" class="grid | gy-8 | avatar" @click="showAvatarActions = !showAvatarActions">
            <div class=" avatar-image">
                <img src="https://tinyurl.com/bibimbap-rickastley" alt="" class="circle" />
            </div>
            <div ref="avatarActionsElement" class="grid | px-8 py-16 gy-16 radius-8 | avatar-actions"
                :class="showAvatarActions ? 'shown' : 'hidden'">
                <Link href="/profile" class="text-medium smooth | link no-underline">
                View profile
                </Link>
                <div class=" pt-8 avatar-logout">
                    <Link href="/logout" method="post" as="button" class="text-medium clr-error smooth pointer">
                    Logout
                    </Link>
                </div>
            </div>
        </div>
        <!-- The login et register links -->
        <div v-else-if="!$page.url.startsWith('/auth')" class=" flex center-y | gx-24">
            <Link href="/auth/login" class="text-medium-large smooth | link">
            Login
            </Link>
            <Link href="/auth/register" class="btn">
            Register
            </Link>
        </div>
    </nav>
</template>
