<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Verificación de Email" />

    <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />

        </template>
        <div style="border-top: 30px;">
<p> <br> </p>
        </div>
        <div class=" text-sm text-gray-900">
            <p class=" font-extrabold ">¡Verifica tu cuenta porfavor!</p> <br>

            <p> Antes de continuar, <br> ¿Podría verificar su dirección de email haciendo click en el enlace que le acabamos de enviar a su correo electrónico?</p>
            <br>
            Si no recibiste el correo electrónico, da click en el siguiente botón y se reenviará un nuevo enlace.
        </div>
        <br>
        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó en la configuración de su perfil. <br>
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reenviar una nueva verificación
                </JetButton>

                 <div>


                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 ml-2"
                    >
                        Salir
                    </Link>
                </div>

            </div>
        </form>
        <div style="border-top: 30px;">
<p> <br> </p>
        </div>
    </JetAuthenticationCard>
</template>
