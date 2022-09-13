<template>
    <div class="mt-10 divide-y divide-gray-200">
        <div class="space-y-1">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Planes y Paquetes</h3>
            <p class="max-w-2xl text-sm text-gray-500">Seleccione el plan que más se adecue a sus necesidades.</p>
            <div class="grid sm:grid-cols-12 lg:grid-cols-3 gap-6 py-6">
                <div v-for="plan in plans" :key="plan.id">
                    <div class="p-4 w-full bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                        <h5 class="flex mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">
                            <span v-if="plan.id === 1">
                                Paquete Bronce
                            </span>
                            <span v-if="plan.id === 2">
                                Paquete Plata
                            </span>
                            <span v-if="plan.id === 3">
                                Paquete Oro
                            </span>
                        <svg v-if="plan.id === 1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-amber-700 ml-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                        </svg>
                        <svg v-if="plan.id === 2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-zinc-400 ml-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                        </svg>
                        <svg v-if="plan.id === 3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-yellow-500 ml-2 w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                        </svg>

                        </h5>
                        <div class="flex items-baseline text-gray-900 dark:text-white">
                            <span class="text-3xl font-semibold">$</span>
                            <span class="text-5xl font-extrabold tracking-tight">{{plan.price}}</span>
                            <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400"></span>
                        </div>
                        <!-- List -->
                        <ul role="list" class="my-7 space-y-5">
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400" v-if="plan.spaces_available === 1">{{ plan.spaces_available }} Vacante</span>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400" v-else>{{ plan.spaces_available }} Vacantes</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">{{ plan.remaining_days }} días para usarlo</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Acceso a base de datos y cv de usuarios</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Mensajería directa con candidatos</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Acceso a Dashboard</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Filtro de candidatos</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Prueba habilidades blandas</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Prueba habilidades duras</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Visibilidad del proceso de selección</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-teal-600 dark:text-teal-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Soporte técnico</span>
                            </li>
                            <li class="flex space-x-3" :class='plan.id === 3 ? "": "line-through decoration-gray-500"'>
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h" :class='plan.id == 3 ? "text-teal-600 dark:text-teal-500" : "text-gray-400 dark:text-gray-500"' fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500">Aparición página principal como colaboradores</span>
                            </li>
                            <li class="flex space-x-3" :class='plan.id === 3 ? "": "line-through decoration-gray-500"'>
                                <!-- Icon -->
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" :class='plan.id == 3 ? "text-teal-600 dark:text-teal-500" : "text-gray-400 dark:text-gray-500"' fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Check icon</title><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="text-base font-normal leading-tight text-gray-500">1 publicación en redes sociales como colaborador de Experientya</span>
                            </li>
                        </ul>
                        <button @click="selectedPlan(plan)" type="button" class="text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-teal-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Elegir plan</button>
                    </div>
                </div>
            </div>

            <JetModal :show="acting" @close="acting = null; plan = null">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="bg-white shadow sm:rounded-lg">
                        <form class="px-4 py-5 sm:p-6" @submit.prevent="submit">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Comprar paquete</h3>
                            <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p class="flex items-center">¿Esta seguro de efectuar la compra del &nbsp;
                                <span class="text-amber-700 font-semibold" v-if="plan.id === 1">Paquete Bronce?</span>
                                <svg v-if="plan.id === 1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-amber-700 ml-1 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>
                                <span class="text-zinc-400 font-semibold" v-if="plan.id === 2">Paquete Plata?</span>
                                <svg v-if="plan.id === 2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-zinc-400 ml-1 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>
                                <span class="text-yellow-500 font-semibold" v-if="plan.id === 3">Paquete Oro?</span>
                                <svg v-if="plan.id === 3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-yellow-500 ml-1 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>
                            </p>
                            </div>

                            <div class="flex justify-end mt-5">
                                <button @click="acting = null; plan = null" type="button" class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Cancelar
                                </button>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                    Comprar
                                </button>
                            </div>
                        </form>
                    </div>
            </JetModal>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetModal from '@/Jetstream/Modal'
    import { Inertia } from '@inertiajs/inertia'

export default defineComponent({
    components: {
        JetModal
    },
    props: {
        plans: Array
    },
    data () {
        return {
            acting: false,
            plan: null
        }
    },
    methods: {
        selectedPlan(plan) {
            this.acting = true
            this.plan = plan
        },
        submit() {
            this.$inertia.post('/company/buyPlan', this.plan, {
                preserveState: false,
                preserveScroll: true,
                onSuccess: () => {
                    this.acting = false
                }
            })
        }
    }
})
</script>
