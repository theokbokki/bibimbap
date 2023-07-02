<x-layouts.auth-layout title="Login page of Bibimbap" head-title="Login">
    <h3 class="title-medium-light text-center">Welcome back</h3>
    <form class="grid | gy-32" method="POST" action="{{ route('login') }}">
        @csrf
        <x-field name="email" label="Email" type="email" required placeholder="rick.astley@skynet.co" />
        <x-field name="password" label="Password" type="password" required />
        <div class="grid | gy-16">
            <button type="submit" class="btn">Login</button>
            <p class="text-end">Don’t have an account yet?
                <a href="/auth/register" class="clr-primary-400 smooth | link">Register</a>
            </p>
        </div>
    </form>
</x-layouts.auth-layout>
