<script setup>
import AuthLayout from '../../Shared/AuthLayout.vue';
import Layout from '../../Shared/Layout.vue';
import Field from '@bibimbap/ui/lib/components/Field.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

defineOptions({ layout: [Layout, AuthLayout] });

const form = useForm({
    username: null,
    email: null,
    password: null,
})
</script>

<template>
    <Head title="Register" />

    <h3 class="title-medium-light text-center">Welcome to Bibimbap</h3>
    <form @submit.prevent="form.post('/auth/register')" class="grid | gy-32">
        <Field v-model:model="form.username" type="text" label="Username" id="username" name="username"
            placeholder="ahasucks">
            <div v-if="form.errors.username">{{ form.errors.username }}</div>
        </Field>
        <Field v-model:model="form.email" type="email" label="Email" id="email" name="email"
            placeholder="rick.astley@skynet.co">
            <div v-if="form.errors.email">{{ form.errors.email }}</div>
        </Field>
        <Field v-model:model="form.password" type="password" label="Password" id="password" name="password">
            <div v-if="form.errors.password">{{ form.errors.password }}</div>
        </Field>
        <div class="grid | gy-16">
            <button type="submit" class="btn" :disabled="form.processing">Register</button>
            <p class="text-end">Already have an account?
                <Link href="/auth/login" class="clr-primary-400 smooth | link">Login</Link>
            </p>
        </div>
    </form>
</template>
