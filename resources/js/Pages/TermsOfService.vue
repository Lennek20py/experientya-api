<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';

defineProps({
    terms: String,
});
</script>

<template>
    <Head title="Terms of Service" />

    <div class="font-sans text-gray-900 antialiased">
        <div class="pt-4 bg-gray-100">
            <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
                <div>
                    <div class="container mx-auto py-8">
                        <h1 class="text-3xl font-bold mb-4">Política de Privacidad</h1>

                        <p class="text-gray-800 mb-6">Última actualización: [Fecha]</p>

                        <h2 class="text-xl font-bold mb-2">1. Información que recopilamos</h2>
                        <p class="text-gray-800 mb-4">...</p>

                        <h2 class="text-xl font-bold mb-2">2. Uso de la información recopilada</h2>
                        <p class="text-gray-800 mb-4">...</p>

                        <h2 class="text-xl font-bold mb-2">3. Protección de la información</h2>
                        <p class="text-gray-800 mb-4">...</p>

                        <h2 class="text-xl font-bold mb-2">4. Enlaces a sitios web de terceros</h2>
                        <p class="text-gray-800 mb-4">...</p>

                        <h2 class="text-xl font-bold mb-2">5. Cambios en la Política de Privacidad</h2>
                        <p class="text-gray-800">Nos reservamos el derecho de modificar o actualizar esta Política de
                            Privacidad en cualquier momento. Cualquier cambio realizado se reflejará en esta página.</p>

                        <p class="mt-8 text-gray-800">Si tienes alguna pregunta sobre nuestra política de privacidad, por
                            favor contáctanos.</p>
                    </div>
                </div>

                <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose"
                    v-html="terms" />
            </div>
        </div>
    </div></template>
