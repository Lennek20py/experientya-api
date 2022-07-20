<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template class="bg-slate-50">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 bg-slate-50">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto pr-6 h-12 w-auto" src="../../../img/logoMini.png" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md lg:px-0 px-6">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg rounded-lg sm:px-10">
                <JetValidationErrors class="mb-4" />
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
            <form class="space-y-6" @submit.prevent="submit">
                <div>
                <JetLabel for="email" value="Email" />
                <div class="mt-1">
                    <JetInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required
                    />
                </div>
                </div>

                <div>
                <JetLabel for="password" value="Contraseña" />
                <div class="mt-1">
                    <JetInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required
                        autocomplete="current-password"
                    />
                </div>
                </div>

                <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <JetCheckbox v-model:checked="form.remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"/>
                    <span class="ml-2 text-sm text-gray-600">Recuerdame</span>
                </div>

                <div class="text-sm">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="font-medium text-blue-600 hover:text-blue-500">
                        ¿Recordar contraseña?
                    </Link>
                </div>
                </div>

                <div>
                <JetButton class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Entrar
                </JetButton>
                </div>
            </form>

            <div class="mt-6">
                <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
