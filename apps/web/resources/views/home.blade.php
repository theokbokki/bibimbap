<x-layouts.base-layout>
    <x-slot:head_title>Home</x-slot>
        <x-slot:title>Home page of bibimbap</x-slot>

            <main class="grid center | gy-64 pb-32 | home-page">
                <div class="text-center">
                    <h2 class="title-xl clr-primary-400">Bibimbap</h2>
                    <p class="text-large mt-16">Deoxydize your Tauri apps</p>
                </div>
                <section class="flex | g-40 | home-infos">
                    <h3 class="sr-only">Infos about Bibimbap</h3>
                    <x-infobox>
                        <x-slot:title>Bye Rust, welcome PHP</x-slot>
                            <p>
                                Leverage the power of the
                                <a href="https://laravel.com/" target="_blank"
                                    class="link clr-primary-400 smooth">Laravel</a>
                                framework to create your apps’ backends without having to type a single line of
                                <a href="https://www.rust-lang.org/" target="_blank"
                                    class="link clr-primary-400 smooth">Rust</a>
                            </p>
                    </x-infobox>

                    <x-infobox>
                        <x-slot:title> Authentication out of the box</x-slot>
                            <p>
                                Registration, login, password reset, you name it, it’s there. Best of all, the API is
                                protected
                                so that only instances your app can interact with it.
                            </p>
                    </x-infobox>

                    <x-infobox>
                        <x-slot:title>One codebase, run everywhere</x-slot>
                            <p>
                                The project is setup in a way that allows you to reuse code across desktop, mobile and
                                web apps
                                if you wish!
                            </p>
                            <p>
                                All of this in a well organised monorepo.
                            </p>
                    </x-infobox>

                    <x-infobox>
                        <x-slot:title>Your front, your choice</x-slot>
                            <p>
                                Thanks to
                                <a href="https://tauri.app" target="_blank"
                                    class="link clr-primary-400 smooth">Tauri</a>
                                , you are free to build the front end of your app in any way you like!
                            </p>
                            <p>
                                We provide starter templates for
                                <a href="https://kit.svelte.dev" target="_blank"
                                    class="link clr-primary-400 smooth">Sveltekit</a>,
                                <a href="https://nextjs.org/" target="_blank"
                                    class="link clr-primary-400 smooth">Next</a>
                                and
                                <a href="https://nuxt.com" target="_blank" class="link clr-primary-400 smooth">
                                    Nuxt</a>.
                            </p>
                    </x-infobox>
                </section>
            </main>
</x-layouts.base-layout>
