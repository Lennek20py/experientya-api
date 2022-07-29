<template>
    <div class="mt-10 divide-y divide-gray-200">
        <div class="space-y-1">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Pérfil</h3>
            <p class="max-w-2xl text-sm text-gray-500">Esta información se mostrará públicamente, así que tenga cuidado con lo que comparte..</p>
        </div>
        <div class="mt-6">
            <dl class="divide-y divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Compañia</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ userInfo.company_name }}</span>
                    <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 1; company.company_name = userInfo.company_name"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Nombre</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ userInfo.responsible_first_name }}</span>
                    <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 2; company.responsible_first_name = userInfo.responsible_first_name"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Apellido</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ userInfo.responsible_last_name }}</span>
                    <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 3; company.responsible_last_name = userInfo.responsible_last_name"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Photo</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">
                    <img class="h-8 w-8 rounded-full" :src="userInfo.profile_photo_link" alt="">
                    </span>
                    <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button @click="acting = true; show = 4" type="button" class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ userInfo.email }}</span>
                    <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 5; company.email = userInfo.email"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Número telefonico</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow">{{ userInfo.responsible_phone_number }}</span>
                    <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 6; company.responsible_phone_number = userInfo.responsible_phone_number"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
            </dl>
        </div>
    </div>

    <div class="mt-10 divide-y divide-gray-200">
        <div class="space-y-1">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Cuenta</h3>
            <p class="max-w-2xl text-sm text-gray-500">Administre cómo se muestra la información en su cuenta.</p>
        </div>
        <div class="mt-6">
            <dl class="divide-y divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.c }}</span>
                <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 7; company.company_address = userInfo.company_address"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Código Postal</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.company_postal_code }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 8; company.company_postal_code = userInfo.company_postal_code"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Número teléfonico</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.company_phone_number }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 9; company.company_phone_number = userInfo.company_phone_number"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">RFC</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.RFC }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 10; company.RFC = userInfo.RFC"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Dirección Fiscal</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.company_fiscal_address }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 11; company.company_fiscal_address = userInfo.company_fiscal_address"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Estado</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.state_name }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 12"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Ciudad o Municipio</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.town_name }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 13"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Sector o rubro</dt>
                <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <span class="flex-grow">{{ userInfo.sector_name }}</span>
                <span class="ml-4 flex-shrink-0 flex items-start space-x-4">
                    <button
                        @click="acting = true; show = 14"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            </dl>
        </div>
        <JetModal :show="acting" closeable="true" @close="acting = null">
            <div class="bg-gray-50 shadow-2xl py-8">
                <form class="px-12" @submit.prevent="update">

                    <div v-if="show == 1">
                        <label for="company_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Nombre de la empresa </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.company_name" id="company_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                        </div>
                    </div>

                    <div v-else-if="show == 2">
                        <label for="responsible_first_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Nombre </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.responsible_first_name" id="responsible_first_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 3">
                        <label for="responsible_last_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Apellido </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.responsible_last_name" id="responsible_last_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 5">
                        <label for="email" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Email </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.email" id="email" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 6">
                        <label for="responsible_phone_number" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Número teléfonico </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.responsible_phone_number" id="responsible_phone_number" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 7">
                        <label for="company_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Dirección </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.company_address" id="company_address" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 8">
                        <label for="company_postal_code" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Código Postal </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.company_postal_code" id="company_postal_code" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 9">
                        <label for="company_phone_number" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Número teléfonico </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.company_phone_number" id="company_phone_number" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 10">
                        <label for="RFC" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> RFC </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.RFC" id="RFC" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 11">
                        <label for="company_fiscal_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Dirección Fiscal </label>
                        <div class="mt-1">
                            <input type="text" v-model="company.company_fiscal_address" id="company_fiscal_address" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <button class="px-5 py-3 mt-5 w-full bg-teal-400 justify-center rounded-xl text-sm" :disabled="company.processing">
                        <span class="animate-spin mr-1" v-show="company.processing">
                            &#9696;
                        </span>
                        <span class="text-white" v-show="!company.processing">
                            Guardar
                        </span>
                    </button>
                </form>
            </div>
        </JetModal>
    </div>
</template>

<script>
    import JetModal from '@/Jetstream/Modal'

    import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        JetModal
    },
    data() {
        return {
            acting: null,
            show: 0,
            company: this.$inertia.form({
                'company_name': '',
                'email': '',
                'password': '',
                'password_confirmation': '',
                'company_phone_number': '',
                'company_address': '',
                'company_postal_code': '',
                'company_fiscal_address': '',
                'RFC': '',
                'responsible_first_name': '',
                'responsible_last_name': '',
                'responsible_phone_number': '',
                'description': '',
                'state_id': '',
                'town_id': '',
                'sector_id': '',
                'profile_photo_path': '',
                'terms': '',
                'newsletter': ''
            })
        }
    },
    props: {
        userInfo: Object
    },
    methods: {
        update() {
            console.log('hello')
        }
    }
})
</script>
