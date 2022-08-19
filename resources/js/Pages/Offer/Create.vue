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
                                <jet-input-error :message="form.errors.title"/>
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
                                <jet-input-error :message="form.errors.title_job"/>
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <div class="flex justify-between">
                                    <label for="description" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Descripción</label>
                                    <label class="block text-xs font-medium text-gray-700">{{ totalcharacterDescription }} / 300</label>
                                </div>
                                <textarea
                                    rows="4"
                                    v-model="form.description"
                                    @keyup="charCountDescription()"
                                    id="description"
                                    class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                                <span></span>
                                <jet-input-error :message="form.errors.description"/>
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
                                <jet-input-error :message="form.errors.type_job"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_horary" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Horario</label>
                                <select v-model="form.type_horary" id="type_horary" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option disabled selected value="">Selecciona una opción</option>
                                    <option>Jornada Completa</option>
                                    <option>Media Jornada</option>
                                </select>
                                <jet-input-error :message="form.errors.type_horary"/>
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
                                <jet-input-error :message="form.errors.type_of_contract"/>
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <div class="flex justify-between">
                                    <label for="description" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Descripción del pérfil del solicitante</label>
                                    <label class="block text-xs font-medium text-gray-700">{{ totalcharacterProfile }} / 300</label>
                                </div>
                                <textarea
                                    v-model="form.profile_description"
                                    rows="4"
                                    @keyup="charCountProfile()"
                                    id="profile_description"
                                    class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                                <jet-input-error :message="form.errors.profile_description"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="start_date" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Fecha de Inicio</label>
                                <input
                                    id="start_date"
                                    v-model="form.start_date"
                                    type="date"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm"
                                />
                                <jet-input-error :message="form.errors.start_date"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <div class="flex items-center justify-between">
                                    <label for="salary" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Salario: ($ {{ form.salary }})</label>
                                    <button @click="acting = true" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                        </svg>
                                    </button>
                                </div>
                                <input id="salary" type="range" min="1" max="100000" v-model="form.salary" class="w-full h-2 bg-blue-100 appearance-none" />
                                <jet-input-error :message="form.errors.salary"/>
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
                                <jet-input-error :message="form.errors.payment_type"/>
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
                                <jet-input-error :message="form.errors.offer_address"/>
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Estado</label>
                                <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un estado</option>
                                    <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                                </select>
                                <jet-input-error :message="form.errors.state_id"/>
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Ciudad o Municipio</label>
                                <select v-model="form.town_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un municipio</option>
                                    <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                                </select>
                                <jet-input-error :message="form.errors.town_id"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area</label>
                                <select v-model="form.area_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area</option>
                                    <option v-for="area in anuies_area" :key="area.id" :value="area.id">{{area.name}}</option>
                                </select>
                                <jet-input-error :message="form.errors.area_id"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area general</label>
                                <select v-model="form.general_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area general</option>
                                    <option v-for="general in anuies_general" :key="general.id" :value="general.id">{{general.name}}</option>
                                </select>
                                <jet-input-error :message="form.errors.general_id"/>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700 after:text-red-500 after:content-['*']">Area específica</label>
                                <select v-model="form.specific_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione un area específica</option>
                                    <option v-for="specific in anuies_specific" :key="specific.id" :value="specific.id">{{specific.name}}</option>
                                </select>
                                <jet-input-error :message="form.errors.specific_id"/>
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
                            <span role="status" v-show="form.processing">
                                <svg role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="text-white">
                                Guardar
                            </span>
                        </button>
                    </div>
                </div>
                </form>
            <!-- /End replace -->
            <JetModal :show="acting" @close="acting = null">
                <div class="bg-gray-50 shadow-2xl py-8">
                    <form class="px-12">

                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700"> Introduce otra cantidad </label>
                            <div class="mt-1">
                                <input type="number" v-model="form.salary" id="company_name" class="shadow-sm focus:ring-teal-500 focus:border-teal-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="$">
                            </div>
                        </div>
                        <div class="flex justify-end">
                        <button class="px-5 py-3 mt-5 w-full lg:w-auto bg-blue-400 hover:bg-blue-500 justify-center rounded-xl text-sm" :disabled="form.processing">
                            <span class="text-white" @click="acting = false">
                                Guardar
                            </span>
                        </button>
                    </div>
                    </form>
                </div>
            </JetModal>
            </div>
        </div>
    </main>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/CompanyLayout'
    import { Link } from '@inertiajs/inertia-vue3'
    import JetInputError from '@/Jetstream/InputError'
    import JetModal from '@/Jetstream/Modal'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            AdminLayout,
            Link,
            JetInputError,
            JetModal
        },
        data() {
            return {
                states: [],
                towns: [],
                anuies_area: [],
                anuies_general: [],
                anuies_specific: [],
                totalcharacterDescription: 0,
                totalcharacterProfile: 0,
                acting: false,
                form: this.$inertia.form({
                    'title': '',
                    'title_job': '',
                    'description': '',
                    'type_job': '',
                    'type_horary': '',
                    'type_of_contract': '',
                    'profile_description': '',
                    'start_date': '',
                    'salary': null,
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
            charCountDescription(){
                this.totalcharacterDescription = this.form.description.length;
            },
            charCountProfile() {
                this.totalcharacterProfile = this.form.profile_description.length;
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
