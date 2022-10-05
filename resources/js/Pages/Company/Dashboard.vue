<template>
    <admin-layout>
        <main class="flex-1 pb-8">
            <div class="py-6">
                <div class="max-w-7xl px-4 sm:px-6 md:px-8">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Buscar . . .</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-slate-50-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Buscar . . ." required>
                        </div>
                        <button  @click="acting = true" type="button" class=" ml-2 inline-flex items-center rounded-md border border-transparent bg-purple-500 px-3 py-3 text-sm font-medium leading-4 text-white shadow-sm hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            <!-- Heroicon name: mini/envelope -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                            </svg>
                            Filtros
                        </button>
                    </form>
                    <!-- Replace with your content -->
                    <div class="py-4 mt-2">
                        <div class="min-h-full">
                            <ul role="list" class="grid grid-cols-1 gap-6">
                                <li class="col-span-1 divide-y rounded-md shadow-sm border-solid border-2 border-neutral-100">
                                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                                        <div class="flex">
                                            <img class="h-14 w-14 rounded-full" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                            <p class="text-md font-bold text-gray-900">Calvin Hawkins</p>
                                            <p class="mt-1 truncate text-sm text-gray-700">Regional Paradigm Technician</p>
                                            <p class="mt-0.5 truncate text-sm text-gray-500">Veracruz, Méxicco</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                        <a href="mailto:janecooper@example.com" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/envelope -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="ml-3">Ver</span>
                                        </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                        <a href="tel:+1-202-555-0170" class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/phone -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                            </svg>
                                            <span class="ml-3">Invitar</span>
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col-span-1 divide-y rounded-md shadow-sm border-solid border-2 border-neutral-100">
                                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                                        <div class="flex">
                                            <img class="h-14 w-14 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                            <div class="ml-3">
                                            <p class="text-md font-bold text-gray-900">Jane Cooper</p>
                                            <p class="mt-1 truncate text-sm text-gray-700">Paradigm Representative</p>
                                            <p class="mt-0.5 truncate text-sm text-gray-500">Nuevo León, Méxicco</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                        <a href="mailto:janecooper@example.com" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/envelope -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="ml-3">Ver</span>
                                        </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                        <a href="tel:+1-202-555-0170" class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/phone -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                            </svg>
                                            <span class="ml-3">Invitar</span>
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                </li>
                                <li class="col-span-1 divide-y rounded-md shadow-sm border-solid border-2 border-neutral-100">
                                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                                        <div class="flex">
                                            <img class="h-14 w-14 rounded-full" src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                            <p class="text-md font-bold text-gray-900">Eduardo Benz</p>
                                            <p class="mt-1 truncate text-sm text-gray-700">Forward Response Developer</p>
                                            <p class="mt-0.5 truncate text-sm text-gray-500">Baja California Sur, Méxicco</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                    <div class="-mt-px flex divide-x divide-gray-200">
                                        <div class="flex w-0 flex-1">
                                        <a href="mailto:janecooper@example.com" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/envelope -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="ml-3">Ver</span>
                                        </a>
                                        </div>
                                        <div class="-ml-px flex w-0 flex-1">
                                        <a href="tel:+1-202-555-0170" class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                            <!-- Heroicon name: mini/phone -->
                                            <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                            <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                            </svg>
                                            <span class="ml-3">Invitar</span>
                                        </a>
                                        </div>
                                    </div>
                                    </div>
                                </li>

                                <!-- More people... -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <JetModal maxWidth="4xl" :show="acting" @close="acting = null">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow sm:rounded-lg">
                    <form class="px-4 py-5 sm:p-6">
                        <h3 class="mb-6 text-2xl leading-6 font-bold text-gray-900">Filtros</h3>
                        <div class="mt-2 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">Area de Trabajo:</h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Area</label>
                                    <select v-model="form.area_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un area</option>
                                        <option v-for="area in anuies_area" :key="area.id" :value="area.id">{{area.name}}</option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Area general</label>
                                    <select v-model="form.general_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un area general</option>
                                        <option v-for="general in anuies_general" :key="general.id" :value="general.id">{{general.name}}</option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Area específica</label>
                                    <select v-model="form.specific_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un area específica</option>
                                        <option v-for="specific in anuies_specific" :key="specific.id" :value="specific.id">{{specific.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-7 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">Ubicación:</h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Estado</label>
                                    <select v-model="form.state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un estado</option>
                                        <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Ciudad o Municipio</label>
                                    <select v-model="form.town_id" id="town" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option value="">Seleccione un municipio</option>
                                        <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mt-7 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">Tipo de trabajo y cambio de residencia:</h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label for="type_job" class="block text-sm font-medium text-gray-700">Tipo de Trabajo</label>
                                    <select v-model="form.type_job" id="type_job" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                        <option disabled selected value="">Selecciona una opción</option>
                                        <option>Empleo</option>
                                        <option>Residencia</option>
                                        <option>Práctica profesional</option>
                                        <option>Educación Dual</option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label for="range" class="block text-sm font-medium text-gray-700 mb-3">Cambio de residencia</label>
                                    <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                        <div class="flex items-center">
                                            <input v-model="form.change_address" id="payment_type_1" name="notification-method" type="radio" value="Mensual" class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300">
                                            <label for="payment_type_1" class="ml-3 block text-sm font-medium text-gray-700"> Si  </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input v-model="form.change_address" id="payment_type_2" name="notification-method" type="radio" value="Quincenal" class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300">
                                            <label for="payment_type_2" class="ml-3 block text-sm font-medium text-gray-700"> No </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-5">
                            <!--button-->
                        </div>
                    </form>
                </div>
            </JetModal>
        </main>
    </admin-layout>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/Layouts/CompanyLayout'
    import JetModal from '@/Jetstream/Modal'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link,
            AdminLayout,
            JetModal
        },
        data () {
            return {
                acting: false,
                states: [],
                towns: [],
                anuies_area: [],
                anuies_general: [],
                anuies_specific: [],
                form: this.$inertia.form({
                    'state_id': '',
                    'town_id': '',
                    'type_job': '',
                    'area_id': '',
                    'general_id': '',
                    'specific_id': '',
                    'change_address': ''
                })
            }
        },
        methods: {
            logout() {
                this.$inertia.post(route('admin.logout'));
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
            async getAnuiesAreas() {
                await axios.get('/anuies-areas')
                    .then(response => {
                        this.anuies_area = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
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
