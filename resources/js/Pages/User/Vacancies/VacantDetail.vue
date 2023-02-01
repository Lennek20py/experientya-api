<template>
    <div>
        <!-- <p>{{ vacant }}</p> -->
        <div>
            <div>
                <img class="h-32 w-full object-cover lg:h-48 rounded-t-lg color-white"
                    src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                    alt="">
            </div>
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                    <div class="flex">
                        <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                            :src="vacant.company_profile_photo_path.replace('profile/', '/storage/profile/')" alt="">
                    </div>
                    <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                        <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                            <h1 class="text-2xl font-bold text-gray-900">{{ vacant.title }}</h1>
                        </div>
                        <div class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                            <button type="button"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <!-- Heroicon name: mini/envelope -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                    <path
                                        d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                </svg>
                                <span>Aplicar a Vacante</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                    <h1 class="truncate text-2xl font-bold text-gray-900">{{ vacant.title }}</h1>
                </div>
                <div id="content" class="mx-auto mt-10">
                    <div class="flex flex-nowrap flex-row justify-between">
                        <div class="flex flex-col justify-center">
                            <h4 class="font-bold text-lg">Puesto</h4>
                            <p>{{ vacant.title_job }}</p>
                        </div>
                        <div class="flex flex-col justify-center">
                            <h4 class="font-bold text-lg">Compañía</h4>
                            <p>{{ vacant.company_name }}</p>
                        </div>
                    </div>
                    <hr class="h-px my-3 bg-gray-200 border-0">
                    <div class="flex flex-nowrap flex-row justify-between mt-4 grow">
                        <div class="flex flex-col grow">
                            <div class="flex flex-col">
                                <div class="flex flex-col">
                                    <h4 class="font-bold text-lg">Descripción</h4>
                                    <p class="text-justify">{{ vacant.description }}</p>
                                </div>
                                <!-- Componente variables columnas -->
                                <div class="grid grid-cols-2 grid-rows-4 md:grid-cols-4 md:grid-rows-2 gap-4 my-8">
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                            <h4 class="">Tipo de trabajo</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.type_job }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <h4 class="">Tipo de contrato</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.type_of_contract }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <h4 class="">Tiempo de pago</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.payment_type }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                            </svg>
                                            <h4 class="">Fecha de Inicio</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center">{{ vacant.start_date }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h4 class="">Horario</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.type_horary }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                                </path>
                                            </svg>
                                            <h4 class="">Estado</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center">{{ vacant.state_name }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                                </path>
                                            </svg>
                                            <h4 class="">Ciudad</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.city_name }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col place-self-center">
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-800 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <h4 class="">Salario</h4>
                                        </div>
                                        <div
                                            class="mt-2 flex items-center font-bold text-gray-600 text-base justify-center">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-800" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"></path>
                                            </svg>
                                            <p class="text-gray-500 text-center w-min">{{ vacant.salary }}</p>
                                        </div>
                                    </div>
                                    <!-- here -->

                                </div>
                                <div class="flex flex-col justify-center">
                                    <h4 class="font-bold text-lg">Descripción de empleado</h4>
                                    <p class="text-justify">{{ vacant.profile_description }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import JetModal from '@/Jetstream/Modal'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

import { defineComponent } from 'vue'

export default defineComponent({
    components: {
    },
    props: {
        vacant: Object
    },
    data() {
        return {
            vacancies: []
        }
    },
    methods: {

    },
    created() {
        // this.getVacants()
    },
    watch: {
    }
})
</script>
