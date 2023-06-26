<script setup>
import AuthLayout from '../../Shared/AuthLayout.vue';
import Layout from '../../Shared/Layout.vue';
import Field from '@bibimbap/ui/lib/components/Field.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'

defineOptions({ layout: [Layout, AuthLayout] });

const form = useForm({
    email: null,
    password: null,
})

</script>

<template>
    <Head title="Login" />

    <h3 class="title-medium-light text-center">Welcome back</h3>
    <form @submit.prevent="form.post('/auth/login')" class="grid | gy-32">
        <Field v-model:model="form.email" type="email" label="Email" id="email" name="email"
            :has-errors="form.errors.email ? true : false" placeholder="rick.astley@skynet.co">
            <p v-if="form.errors.email">{{ form.errors.email }}</p>
        </Field>
        <Field v-model:model="form.password" type="password" label="Password" id="password" name="password"
            :has-errors="form.errors.password ? true : false">
            <p v-if="form.errors.password">{{ form.errors.password }}</p>
        </Field>
        <div class="grid | gy-16">
            <button type="submit" class="btn" :disabled="form.processing">Login</button>
            <p class="text-end">Don’t have an account yet?
                <Link href="/auth/register" class="clr-primary-400 smooth | link">Register</Link>
            </p>
        </div>
    </form>
</template>
