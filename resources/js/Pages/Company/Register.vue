<template>
    <div>
        <Header/>
        <main class="py-12 bg-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="min-h-full flex bg-white mt-24 mb-16 rounded-2xl shadow-md">
                <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                    <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <!-- <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow"> -->
                        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Registra tu empresa</h2>
                    </div>

                    <div class="mt-8">
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

                        <div class="mt-6">
                        <form  class="space-y-6" @submit.prevent="submit">
                            <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700"> Nombre de la empresa</label>
                            <div class="mt-1">
                                <input id="company_name" v-model="form.company_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.company_name"/>
                            </div>

                            <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                            <div class="mt-1">
                                <input id="email" name="email" v-model="form.email" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.email"/>
                            </div>

                            <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Contraseña </label>
                            <div class="mt-1">
                                <input id="password" v-model="form.password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.password"/>
                            </div>

                            <div class="space-y-1">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700"> Repita su contraseña </label>
                            <div class="mt-1">
                                <input id="password_confirmation" v-model="form.password_confirmation" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.password_confirmation"/>
                            </div>

                            <div>
                            <label for="company_phone_number" class="block text-sm font-medium text-gray-700"> Número telefonico empresarial</label>
                            <div class="mt-1">
                                <input id="company_phone_number" v-model="form.company_phone_number" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.company_phone_number"/>
                            </div>

                            <div>
                            <label for="company_address" class="block text-sm font-medium text-gray-700"> Dirección </label>
                            <div class="mt-1">
                                <input id="company_address" v-model="form.company_address" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.company_address"/>
                            </div>

                            <div>
                            <label for="company_address" class="block text-sm font-medium text-gray-700"> Dirección Fiscal </label>
                            <div class="mt-1">
                                <input id="company_address" v-model="form.company_fiscal_address" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.company_fiscal_address"/>
                            </div>

                            <div>
                            <label for="company_postal_code" class="block text-sm font-medium text-gray-700"> Código Postal </label>
                            <div class="mt-1">
                                <input id="company_postal_code" v-model="form.company_postal_code" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.company_postal_code"/>
                            </div>

                            <div>
                            <label for="RFC" class="block text-sm font-medium text-gray-700"> RFC</label>
                            <div class="mt-1">
                                <input id="RFC" v-model="form.RFC" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.RFC"/>
                            </div>

                            <div>
                            <label for="responsible_first_name" class="block text-sm font-medium text-gray-700"> Nombre Responsable</label>
                            <div class="mt-1">
                                <input id="responsible_first_name" v-model="form.responsible_first_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.responsible_first_name"/>
                            </div>

                            <div>
                            <label for="responsible_last_name" class="block text-sm font-medium text-gray-700"> Apellidos Responsable</label>
                            <div class="mt-1">
                                <input id="responsible_last_name" v-model="form.responsible_last_name" type="text" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.responsible_last_name"/>
                            </div>

                            <div>
                            <label for="company_phone_number" class="block text-sm font-medium text-gray-700"> Número telefonico responsable</label>
                            <div class="mt-1">
                                <input id="company_phone_number" v-model="form.responsible_phone_number" type="number" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                            </div>
                            <jet-input-error :message="form.errors.responsible_phone_number"/>
                            </div>

                            <div class="space-y-1">
                            <label for="state" class="block text-sm font-medium text-gray-700"> Estado </label>
                            <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un estado</option>
                                <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                            </select>
                            <jet-input-error :message="form.errors.state_id"/>
                            </div>

                            <div class="space-y-1">
                            <label for="state" class="block text-sm font-medium text-gray-700"> Estado </label>
                            <select v-model="form.town_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un municipio</option>
                                <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                            </select>
                            <jet-input-error :message="form.errors.town_id"/>
                            </div>

                            <div class="space-y-1">
                            <label for="state" class="block text-sm font-medium text-gray-700"> Sector </label>
                            <select v-model="form.sector_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un sector</option>
                                <option v-for="sector in sectors" :key="sector.id" :value="sector.id">{{sector.name}}</option>
                            </select>
                            <jet-input-error :message="form.errors.sector_id"/>
                            </div>

                            <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción de la empresa</label>
                            <div class="mt-1">
                                <textarea rows="4" id="description" v-model="form.description" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <jet-input-error :message="form.errors.description"/>
                            </div>

                            <div>
                                <jet-button
                                    :disabled="form.processing"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-500 hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                    Registrarse
                                </jet-button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="hidden lg:block relative w-0 flex-1">
                    <img class="absolute inset-0 h-full w-full object-cover rounded-r-2xl" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
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
