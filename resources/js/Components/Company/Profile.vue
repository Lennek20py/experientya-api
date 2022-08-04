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
                        @click="acting = true; show = 1"
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
                        @click="acting = true; show = 2"
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
                        @click="acting = true; show = 3"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                    </span>
                </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:pt-5">
                <dt class="text-sm font-medium text-gray-500">Foto</dt>
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
                        @click="acting = true; show = 5"
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
                        @click="acting = true; show = 6"
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
                <span class="flex-grow">{{ userInfo.company_address }}</span>
                <span class="ml-4 flex-shrink-0">
                    <button
                        @click="acting = true; show = 7"
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
                        @click="acting = true; show = 8"
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
                        @click="acting = true; show = 9"
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
                        @click="acting = true; show = 10"
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
                        @click="acting = true; show = 11"
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
                        @click="acting = true; show = 12"
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
                        @click="acting = true; show = 13"
                        type="button"
                        class="bg-white rounded-md font-medium text-teal-600 hover:text-teal-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">Actualizar</button>
                </span>
                </dd>
            </div>
            </dl>
        </div>
        <JetModal :show="acting" @close="acting = null">
            <div class="bg-gray-50 shadow-2xl py-8">
                <form class="px-12" @submit.prevent="update">

                    <div v-if="show == 1">
                        <label for="company_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Nombre de la empresa </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.company_name" id="company_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
                        </div>
                    </div>

                    <div v-else-if="show == 2">
                        <label for="responsible_first_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Nombre </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.responsible_first_name" id="responsible_first_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 3">
                        <label for="responsible_last_name" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Apellido </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.responsible_last_name" id="responsible_last_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 4">
                        <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">
                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Foto de perfil</span>
                        </label>
                        <div class="flex items-center justify-center mt-1.5">
                            <!-- <div class="shrink-0">                        <img                          class="h-16 w-16 object-cover rounded-full"                          src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"                          alt="Current profile photo"                        />                          </div>-->
                            <input
                                type="file"
                                id="profile_photo_path"
                                name="profile_photo_path"
                                class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600"
                                @change="onFileSelected"
                            />
                        </div>
                    </div>

                    <div v-else-if="show == 5">
                        <label for="email" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Email </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.email" id="email" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 6">
                        <label for="responsible_phone_number" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Número teléfonico </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.responsible_phone_number" id="responsible_phone_number" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 7">
                        <label for="company_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Dirección </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.company_address" id="company_address" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 8">
                        <label for="company_postal_code" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Código Postal </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.company_postal_code" id="company_postal_code" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 9">
                        <label for="company_phone_number" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Número teléfonico </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.company_phone_number" id="company_phone_number" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 10">
                        <label for="RFC" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> RFC </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.RFC" id="RFC" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div v-else-if="show == 11">
                        <label for="company_fiscal_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Dirección Fiscal </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.company_fiscal_address" id="company_fiscal_address" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div v-else-if="show == 12">
                        <label for="company_fiscal_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Estado </label>
                        <div class="mt-1 mb-3">
                            <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un estado</option>
                                <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                            </select>
                        </div>
                        <label for="company_fiscal_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Ciudad o Municipio </label>
                        <div class="mt-1">
                            <select v-model="form.town_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un municipio</option>
                                <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                            </select>
                        </div>
                    </div>

                    <div v-else-if="show == 13">
                        <label for="company_fiscal_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']"> Estado </label>
                        <div class="mt-1 mb-3">
                            <select v-model="form.sector_id" id="sector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un sector</option>
                                <option v-for="sector in sectors" :key="sector.id" :value="sector.id">{{sector.name}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button class="px-5 py-3 mt-5 w-full lg:w-auto mr-2 bg-red-500 justify-center rounded-xl text-sm" :disabled="form.processing">
                            <span class="text-white" @click="acting = false">
                                Cancelar
                            </span>
                        </button>
                        <button class="px-5 py-3 mt-5 w-full lg:w-auto bg-teal-400 justify-center rounded-xl text-sm" :disabled="form.processing">
                            <span class="animate-spin  mr-1" v-show="form.processing">
                                &#9696;
                            </span>
                            <span class="text-white" v-show="!form.processing">
                                Guardar
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </JetModal>
    </div>
</template>

<script>
    import JetModal from '@/Jetstream/Modal'
    import { Inertia } from '@inertiajs/inertia'
    import axios from 'axios'

    import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        JetModal
    },
    data() {
        return {
            states: [],
            towns: [],
            sectors: [],
            acting: false,
            show: 0,
            form: this.$inertia.form({
                'id': this.userInfo.id,
                'company_name': this.userInfo.company_name,
                'email': this.userInfo.email,
                'company_phone_number': this.userInfo.company_phone_number,
                'company_address': this.userInfo.company_address,
                'company_postal_code': this.userInfo.company_postal_code,
                'company_fiscal_address': this.userInfo.company_fiscal_address,
                'RFC': this.userInfo.RFC,
                'responsible_first_name': this.userInfo.responsible_first_name,
                'responsible_last_name': this.userInfo.responsible_last_name,
                'responsible_phone_number': this.userInfo.responsible_phone_number,
                'description': this.userInfo.description,
                'state_id': this.userInfo.state_id,
                'town_id': this.userInfo.town_id,
                'sector_id': this.userInfo.sector_id,
                'profile_photo_path': null,
            })
        }
    },
    props: {
        userInfo: Object
    },
    methods: {
        update() {
            Inertia.post(`/company/update/${this.form.id}`, {
                _method: 'put',
                company_name: this.form.company_name,
                email: this.form.email,
                company_phone_number: this.form.company_phone_number,
                company_address: this.form.company_address,
                company_postal_code: this.form.company_postal_code,
                company_fiscal_address: this.form.company_fiscal_address,
                RFC: this.form.RFC,
                responsible_first_name: this.form.responsible_first_name,
                responsible_last_name: this.form.responsible_last_name,
                responsible_phone_number: this.form.responsible_phone_number,
                description: this.form.description,
                state_id: this.form.state_id,
                town_id: this.form.town_id,
                sector_id: this.form.sector_id,
                profile_photo_path: this.form.profile_photo_path,
            },
            {
                onSuccess: () => {
                    this.acting = false
                }
            })
        },
        async getStates() {
            await axios.get('/list-states')
                .then(response => {
                    this.states = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        async getSectors() {
            await axios.get('/list-sectors')
                .then(response => {
                    this.sectors = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        onFileSelected(event) {
            this.form.profile_photo_path = event.target.files[0];
            console.log(event.target.files[0]);
        }
    },
    created () {
        this.getStates()
        this.getSectors()
    },
    watch: {
        'form.state_id': function(value) {
            axios.get('/list-towns/' + value)
                .then(response => {
                    this.towns = response.data
                })
        }
    }
})
</script>
