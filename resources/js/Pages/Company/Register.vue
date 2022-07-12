<template>
    <div>
        <Header/>
        <main class="py-8 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white mt-24 mb-16 rounded-2xl shadow-md">
                <div class="flex-1 flex flex-col justify-center py-4 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                    <div class="">
                        <form @submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="pt-8">
                            <div>
                                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Registra tu empresa</h2>
                            </div>
                            <div>
                            <!-- {{ states }} -->
                            <!-- {{ towns }} -->
                            <!-- {{ form }} -->
                            <!-- {{ sectors }} -->
                            <div class="mt-6 relative">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                </div>
                            </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700"> Nombre de la empresa </label>
                                <div class="mt-1">
                                    <input id="company_name" v-model="form.company_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.company_name"/>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                <div class="mt-1">
                                    <input id="email" name="email" v-model="form.email" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.email"/>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Contraseña </label>
                                <div class="mt-1">
                                    <input id="password" v-model="form.password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.password"/>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Repita su contraseña </label>
                                <div class="mt-1">
                                    <input id="password_confirmation" v-model="form.password_confirmation" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.password_confirmation"/>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="state" class="block text-sm font-medium text-gray-700"> Estado </label>
                                <div class="mt-1">
                                    <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un estado</option>
                                        <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                                    </select>
                                    <jet-input-error :message="form.errors.state_id"/>
                                </div>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="town" class="block text-sm font-medium text-gray-700"> Ciudad o Municipio </label>
                                <div class="mt-1">
                                    <select v-model="form.town_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un municipio</option>
                                        <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                                    </select>
                                    <jet-input-error :message="form.errors.town_id"/>
                                </div>
                                </div>

                                <div class="sm:col-span-6">
                                <label for="company_address" class="block text-sm font-medium text-gray-700"> Dirección </label>
                                <div class="mt-1">
                                    <input id="company_address" v-model="form.company_address" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.company_address"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="company_phone_number" class="block text-sm font-medium text-gray-700"> Número telefónico </label>
                                <div class="mt-1">
                                <input id="company_phone_number" v-model="form.company_phone_number" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.company_phone_number"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="company_postal_code" class="block text-sm font-medium text-gray-700"> Código Postal </label>
                                <div class="mt-1">
                                    <input id="company_postal_code" v-model="form.company_postal_code" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.company_postal_code"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="RFC" class="block text-sm font-medium text-gray-700"> RFC </label>
                                <div class="mt-1">
                                    <input id="RFC" v-model="form.RFC" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.RFC"/>
                                </div>

                                <div class="sm:col-span-6">
                                <label for="company_address" class="block text-sm font-medium text-gray-700"> Dirección Fiscal </label>
                                <div class="mt-1">
                                    <input id="company_address" v-model="form.company_fiscal_address" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.company_fiscal_address"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="responsible_first_name" class="block text-sm font-medium text-gray-700"> Nombre responsable </label>
                                <div class="mt-1">
                                    <input id="responsible_first_name" v-model="form.responsible_first_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.responsible_first_name"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="responsible_last_name" class="block text-sm font-medium text-gray-700"> Apellido(s) </label>
                                <div class="mt-1">
                                    <input id="responsible_last_name" v-model="form.responsible_last_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.responsible_last_name"/>
                                </div>

                                <div class="sm:col-span-2">
                                <label for="responsible_phone_number" class="block text-sm font-medium text-gray-700"> Número de celular </label>
                                <div class="mt-1">
                                    <input id="responsible_phone_number" v-model="form.responsible_phone_number" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                </div>
                                    <jet-input-error :message="form.errors.responsible_phone_number"/>
                                </div>

                                <div class="sm:col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700"> Descripción de la empresa </label>
                                <div class="mt-1">
                                    <textarea id="description" name="about" v-model="form.description" rows="3" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                </div>
                                <jet-input-error :message="form.errors.description"/>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="sector" class="block text-sm font-medium text-gray-700"> Sector o rubro </label>
                                <div class="mt-1">
                                    <select v-model="form.sector_id" id="sector" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un sector</option>
                                        <option v-for="sector in sectors" :key="sector.id" :value="sector.id">{{sector.name}}</option>
                                    </select>
                                    <jet-input-error :message="form.errors.sector_id"/>
                                </div>
                                </div>

                                <div class="sm:col-span-3">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Foto de pérfil </label>
                                <div class="mt-1">
                                    <input id="password_confirmation" @input="form.profile_photo_path = $event.target.files[0]" type="file" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                    </progress>
                                </div>
                                    <jet-input-error :message="form.errors.profile_photo_path"/>
                                </div>

                            </div>
                            </div>
                        </div>

                        <div class="pt-5">
                            <jet-button
                                :disabled="form.processing"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-teal-500 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                Registrarse
                            </jet-button>
                        </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </main>
        <Footer/>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import Header from '@/Components/Home/Header'
    import Footer from '@/Components/Home/Footer'
    import JetButton from '@/Jetstream/Button'
    import JetInputError from '@/Jetstream/InputError'
    import axios from 'axios'

    export default defineComponent({
        components: {
            Header,
            Footer,
            JetButton,
            JetInputError
        },
        data: function () {
            return {
                states: [],
                towns: [],
                sectors: [],
                form: this.$inertia.form({
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
                    'profile_photo_path': ''
                })
            }
        },
        methods: {
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
            submit() {
                this.form.submit('post', route('company.store'))
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
