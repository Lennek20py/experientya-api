<template>
    <admin-layout>
    <main class="flex-1 pb-8 bg-gray-50">
        <div class="py-6 max-h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 pb-14 pt-6">
            <!-- Replace with your content -->
                <form aria-labelledby="applicant-information-title" @submit.prevent="submit">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                    <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Nueva Vacante</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        <span class="block after:ml-0.5 after:text-red-500 after:content-['*']">Los campos requeridos son marcados con un asterisco</span>
                        <!-- {{ form }} -->
                    </p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6 mb-4">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="title" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Título</label>
                                <input
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                >
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="title-job" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Nombre del puesto</label>
                                <input
                                    type="text"
                                    v-model="form.title_job"
                                    id="title-job"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                >
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <label for="description" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Descripción</label>
                                <textarea
                                    rows="4"
                                    v-model="form.description"
                                    id="description"
                                    class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_job" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Tipo de Trabajo</label>
                                <select v-model="form.type_job" id="type_job" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option disabled selected value="">Selecciona una opción</option>
                                    <option>Empleo</option>
                                    <option>Residencia</option>
                                    <option>Práctica profesional</option>
                                    <option>Educación Dual</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_horary" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Horario</label>
                                <select v-model="form.type_horary" id="type_horary" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option disabled selected value="">Selecciona una opción</option>
                                    <option>Jornada Completa</option>
                                    <option>Media Jornada</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Tipo de Contrato</label>
                                <select v-model="form.type_of_contract" id="type_of_contract" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option disabled selected value="">Selecciona una opción</option>
                                    <option>Contrato</option>
                                    <option>Por proyecto</option>
                                    <option>Temporal</option>
                                    <option>Permanente</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <label for="profile_description" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Pérfil de Cadidato ideal</label>
                                <textarea
                                    v-model="form.profile_description"
                                    rows="4"
                                    id="profile_description"
                                    class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="start_date" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Fecha de Inicio</label>
                                <input
                                    id="start_date"
                                    v-model="form.start_date"
                                    type="date"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                />
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="salary" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Salario: ($ {{ form.salary }})</label>
                                <input id="salary" type="range" min="1" max="100000" v-model="form.salary" class="w-full h-2 bg-blue-100 appearance-none" />
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="range" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Tipo de pago</label>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input v-model="form.payment_type" id="payment_type_1" name="notification-method" type="radio" value="Mensual" class="focus:ring-teal-500 h-4 w-4 text-teal-600 border-gray-300">
                                        <label for="payment_type_1" class="ml-3 block text-sm font-medium text-gray-700"> Mensual </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input v-model="form.payment_type" id="payment_type_2" name="notification-method" type="radio" value="Quincenal" class="focus:ring-teal-500 h-4 w-4 text-teal-600 border-gray-300">
                                        <label for="payment_type_2" class="ml-3 block text-sm font-medium text-gray-700"> Quincenal </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <label for="offer_address" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Dirección</label>
                                <input
                                    type="text"
                                    v-model="form.offer_address"
                                    id="offer_address"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                >
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Estado</label>
                                <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un estado</option>
                                    <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Ciudad o Municipio</label>
                                <select v-model="form.town_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un municipio</option>
                                    <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area</label>
                                <select v-model="form.area_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area</option>
                                    <option v-for="area in anuies_area" :key="area.id" :value="area.id">{{area.name}}</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area general</label>
                                <select v-model="form.general_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area general</option>
                                    <option v-for="general in anuies_general" :key="general.id" :value="general.id">{{general.name}}</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area específica</label>
                                <select v-model="form.specific_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area específica</option>
                                    <option v-for="specific in anuies_specific" :key="specific.id" :value="specific.id">{{specific.name}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end px-4 py-4 bg-gray-100 rounded-b-md">
                        <button class="px-5 py-3 w-full lg:w-auto mr-2 bg-red-500 justify-center rounded-xl text-sm" :disabled="form.processing">
                            <span class="text-white">
                                Cancelar
                            </span>
                        </button>
                        <button class="px-5 py-3 w-full lg:w-auto bg-teal-400 justify-center rounded-xl text-sm" :disabled="form.processing">
                            <span class="animate-spin  mr-1" v-show="form.processing">
                                &#9696;
                            </span>
                            <span class="text-white" v-show="!form.processing">
                                Guardar
                            </span>
                        </button>
                    </div>
                </div>
                </form>
            <!-- /End replace -->
            </div>
        </div>
    </main>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/CompanyLayout'
    import { Link } from '@inertiajs/inertia-vue3'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            AdminLayout,
            Link
        },
        data() {
            return {
                states: [],
                towns: [],
                anuies_area: [],
                anuies_general: [],
                anuies_specific: [],
                form: this.$inertia.form({
                    'title': '',
                    'title_job': '',
                    'description': '',
                    'type_job': '',
                    'type_horary': '',
                    'type_of_contract': '',
                    'profile_description': '',
                    'start_date': '',
                    'salary': 0,
                    'payment_type': '',
                    'offer_address': '',
                    'state_id': '',
                    'town_id': '',
                    'area_id': '',
                    'general_id': '',
                    'specific_id': '',
                    'company_id': this.$page.props.auth.company.id
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
            async getAnuiesAreas() {
                await axios.get('/anuies-areas')
                    .then(response => {
                        this.anuies_area = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            submit() {
                this.form.submit('post', route('offer.store'))
            }
        },
        created () {
            this.getStates()
            this.getAnuiesAreas()
        },
        watch: {
            'form.state_id': function(value) {
                axios.get('/list-towns/' + value)
                    .then(response => {
                        this.towns = response.data
                    })
            },
            'form.area_id': function(value) {
                this.form.anuies_specific_id = ''
                axios.get('/anuies-generals/' + value)
                    .then(response => {
                        this.anuies_general = response.data
                    })
            },
            'form.general_id': function(value) {
                axios.get('/anuies-specifics/' + value)
                    .then(response => {
                        this.anuies_specific = response.data
                    })
            }
        }
    })
</script>
