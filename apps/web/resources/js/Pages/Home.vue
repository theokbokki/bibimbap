<script setup>
import Layout from '../Shared/Layout.vue'
import { Head } from '@inertiajs/vue3'
import Infobox from '@bibimbap/ui/lib/components/Infobox.vue'

defineOptions({ layout: Layout })
</script>

<template>
    <Head title="Home" />

    <section class="grid center | gy-64 pb-32 | home-page">
        <div class="text-center">
            <h2 class="title-xl clr-primary-400">Bibimbap</h2>
            <p class="text-large mt-16">Deoxydize your Tauri apps</p>
        </div>
        <section class="flex | g-40 | home-infos">
            <h3 class="sr-only">Infos about Bibimbap</h3>
            <Infobox title="Bye Rust, welcome PHP">
                <p>
                    Leverage the power of the
                    <a href="https://laravel.com/" target="_blank" class="link clr-primary-400 smooth">Laravel</a>
                    framework to create
                    your apps’
                    backends
                    without having to type a single line of
                    <a href="https://www.rust-lang.org/" target="_blank" class="link clr-primary-400 smooth">Rust</a>
                </p>
            </Infobox>

            <Infobox title="Authentication out of the box">
                <p>
                    Registration, login, password reset, you name it, it’s there. Best of all, the API is protected so that
                    only instances your app can interact with it.
                </p>
            </Infobox>

            <Infobox title="One codebase, run everywhere">
                <p>
                    The project is setup in a way that allows you to reuse code across desktop, mobile and web apps if you
                    wish! 
                </p>
                <p>
                    All of this in a well organised monorepo.
                </p>
            </Infobox>

            <Infobox title="Your front, your choice">
                <p>
                    Thanks to
                    <a href="https://tauri.app" target="_blank" class="link clr-primary-400 smooth">Tauri</a>, you
                    are free to build the front end of your app in any way you like! 
                </p>
                <p>
                    We provide starter templates for
                    <a href="https://kit.svelte.dev" target="_blank" class="link clr-primary-400 smooth">Sveltekit</a>,
                    <a href="https://nextjs.org/" target="_blank" class="link clr-primary-400 smooth">Next</a> and
                    <a href="https://nuxt.com" target="_blank" class="link clr-primary-400 smooth"> Nuxt</a>.
                </p>
            </Infobox>
        </section>
    </section>
</template>
