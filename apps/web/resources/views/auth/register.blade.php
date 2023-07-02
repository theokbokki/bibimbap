<x-layouts.auth-layout title="Login page of Bibimbap" head-title="Login">
    <h3 class="title-medium-light text-center">Welcome to Bibimbap</h3>
    <form class="grid | gy-32" method="POST" action="{{ route('register') }}">
        @csrf
        <x-field name="username" label="Username" required placeholder="ahasucks" />
        <x-field name="email" label="Email" type="email" required placeholder="rick.astley@skynet.co" />
        <x-field name="password" label="Password" type="password" required />
        <div class="grid | gy-16">
            <button type="submit" class="btn">Register</button>
            <p class="text-end">Already have an account?
                <a href="/auth/login" class="clr-primary-400 smooth | link">Login</a>
            </p>
        </div>
    </form>
</x-layouts.auth-layout>
