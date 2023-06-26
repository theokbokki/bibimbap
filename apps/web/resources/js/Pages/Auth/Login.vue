<script setup>
import AuthLayout from '../../Shared/AuthLayout.vue';
import Layout from '../../Shared/Layout.vue';
import Btn from '../../Shared/Btn.vue';
import Field from '@bibimbap/ui/lib/components/Field.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineOptions({ layout: [Layout, AuthLayout] });
</script>

<template>
    <Head title="Login" />

    <h3 class="title-medium-light text-center">Welcome back</h3>
    <form action="" class="grid | gy-32">
        <Field type="email" label="Email" id="email" name="email"></Field>
        <Field type="password" label="Password" id="password" name="password"></Field>
        <div class="grid | gy-16">
            <Btn as="button" type="submit" class="text-center">Login</Btn>
            <p class="text-end">Don’t have an account yet?
                <Link href="/auth/register" class="clr-primary-400 smooth | link">Register</Link>
            </p>
        </div>
    </form>
</template>
