<x-layouts.base-layout title="Home page of bibimbap" head-title="Home">
    <main class="flex col flex-1 center-x center-y | gy-40">
        <p class="text-center title-large clr-neutral-500">Registration complete! Go to the app to login.</p>

        <form method="post" action="/redirect">
            @csrf
            <button type="submit" class="btn">
                Go to the app
            </button>
        </form>
    </main>
</x-layouts.base-layout>
