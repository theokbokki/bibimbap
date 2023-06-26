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
    <Head title="Register" />

    <h3 class="title-medium-light text-center">Welcome to Bibimbap</h3>
    <form action="" class="grid | gy-32">
        <Field type="text" label="Username" id="username" name="username" placeholder="ahasucks"></Field>
        <Field type="email" label="Email" id="email" name="email" placeholder="rick.astley@skynet.co"></Field>
        <Field type="password" label="Password" id="password" name="password"></Field>
        <div class="grid | gy-16">
            <Btn as="button" type="submit" class="text-center">Register</Btn>
            <p class="text-end">Already have an account?
                <Link href="/auth/login" class="clr-primary-400 smooth | link">Login</Link>
            </p>
        </div>
    </form>
</template>
