<template>
    <header class="bg-white py-8 rounded-md shadow-md border-solid border-2 border-neutral-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
            <div class="flex-1 min-w-0">
                <h1 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:tracking-tight sm:truncate">{{ offer.title }}</h1>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/briefcase -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{ offer.type_job }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/location-marker -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        {{ offer.type_of_contract }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/calendar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ offer.start_date }}
                    </div>
                </div>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/currency-dollar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ offer.salary }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <!-- Heroicon name: solid/calendar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        {{ offer.payment_type }}
                    </div>
                </div>
            </div>
            <div class="mt-5 flex xl:mt-0 xl:ml-4">
                <span class="hidden sm:block ml-3">
                    <div class="relative inline-block text-left">
                        <div>
                            <button @click="menu = !menu" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                            Más
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            </button>
                        </div>

                        <div v-if="menu" class="z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <Link :href="route('offer.edit', [offer.id])" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 hover:text-black hover:font-semibold" role="menuitem" tabindex="-1" id="menu-item-0">Editar</Link>
                            <a
                                class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 hover:text-black hover:font-semibold"
                                role="menuitem"
                                tabindex="-1"
                                id="menu-item-1"
                                @click="acting = true;"
                            >
                                Eliminar
                            </a>
                            </div>
                        </div>
                    </div>
                </span>

                <div class="sm:ml-3 relative z-0">
                <div>
                    <label id="listbox-label" class="sr-only"> Change published status </label>
                    <div class="relative">
                    <div class="inline-flex shadow-sm rounded-md divide-x divide-purple-600">
                        <div class=" relative z-0 inline-flex shadow-sm rounded-md divide-x divide-purple-600">
                        <div
                            class="relative inline-flex items-center py-2 pl-3 pr-4 border  rounded-l-md shadow-sm"
                            :class="offer.status == 0 ? 'bg-white text-gray-600 border-slate-100' : 'bg-purple-500 text-white border-transparent'"
                        >
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-5 w-5" v-if="offer.status == 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <svg class="w-5 h-5" v-else-if="offer.status == 0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>

                            <p class="ml-2.5 text-sm font-medium" v-if="offer.status == 0">Inactiva </p>
                            <p class="ml-2.5 text-sm font-medium" v-else-if="offer.status == 1">Publicada </p>
                        </div>
                        <button @click="subMenuShow = !subMenuShow" type="button" class="relative inline-flex items-center bg-purple-500 p-2 rounded-l-none rounded-r-md text-sm font-medium text-white hover:bg-purple-600 focus:outline-none focus:z-10 focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-purple-500" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                            <span class="sr-only">Change published status</span>
                            <!-- Heroicon name: solid/chevron-down -->
                            <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        </div>
                    </div>
                    <ul
                        v-if="subMenuShow"
                        @mouseover="hover = true"
                        @mouseleave="hover = false"
                        class="origin-top-right absolute left-0 mt-2 -mr-1 w-72 rounded-md shadow-lg overflow-hidden divide-y divide-gray-200 ring-1 ring-black ring-opacity-5 focus:outline-none sm:left-auto sm:right-0"
                        :class="hover == false ? 'bg-white' : 'bg-purple-500'"
                        tabindex="-1"
                        role="listbox"
                        aria-labelledby="listbox-label"
                        aria-activedescendant="listbox-option-0"
                    >
                        <li
                            class="text-gray-900 cursor-default select-none relative p-4 text-sm" id="listbox-option-0"
                            role="option"
                            style="cursor: pointer;"
                            @click="offer.status = !offer.status"
                        >
                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                <p
                                    class="font-semibold"
                                    :class="hover == false ? 'text-gray-900' : 'text-white'"
                                >
                                    <span v-if="offer.status == 0">Publicar</span>
                                    <span v-if="offer.status == 1">Inactivar</span>
                                </p>
                                <!--
                                    Checkmark, only display for selected option.

                                    Highlighted: "text-white", Not Highlighted: "text-purple-500"
                                -->
                                <span :class="hover == false ? 'text-purple-500' : 'text-white'">
                                    <!-- Heroicon name: solid/check -->
                                    <svg class="h-5 w-5" v-if="offer.status == 0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    <svg class="w-5 h-5" v-else-if="offer.status == 1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                    </svg>
                                </span>
                                </div>
                            </div>
                        </li>
                        <!-- More items... -->
                    </ul>

                    </div>
                </div>
                </div>

                <!-- Dropdown -->
                <div class="ml-3 relative sm:hidden">
                    <button @click="menu = !menu" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        Más
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div v-if="menu" class="z-10 origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                        <Link :href="route('offer.edit', [offer.id])" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 hover:text-black hover:font-semibold" role="menuitem" tabindex="-1" id="menu-item-0">Editar</Link>
                        <a
                            class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-50 hover:text-black hover:font-semibold"
                            role="menuitem"
                            tabindex="-1"
                            id="menu-item-1"
                            @click="acting = true;"
                        >
                            Eliminar
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <JetModal :show="acting" @close="acting = null">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow sm:rounded-lg">
                <form class="px-4 py-5 sm:p-6" @submit.prevent="submit">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Eliminar esta Vacante</h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Una vez que elimine la vacante <span class="text-black font-semibold">{{ offer.title }}</span>, perderá todos los datos asociados con ella.</p>
                    </div>
                    <div class="flex justify-end mt-5">
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <!-- Heroicon name: solid/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </JetModal>
    </header>
</template>

<script>
import JetModal from '@/Jetstream/Modal'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

import { defineComponent } from 'vue'

export default defineComponent({
        components: {
            JetModal,
            Link
        },
        props: {
            offer: Object
        },
        data () {
            return {
                subMenuShow: false,
                hover: false,
                menu: 0,
                acting: false,
                show: 0,
                form: this.$inertia.form({
                    'id': this.offer.id,
                })
            }
        },
        methods: {
            submit () {
                this.form.submit('delete', route('offer.destroy', [this.form.id]), {
                    preserveState: false,
                    onSuccess: () => {
                        this.acting = false
                    }
                })
            }
        },
        watch: {
            'offer.status': function(value) {
                var state;
                if (value === true) {
                    state = 1
                }else if (value === false) {
                    state = 0
                }
                Inertia.put(`/company/offer/changeStatus/${this.offer.id}`, {
                    status: state
                }, {
                    preserveState: false,
                    preserveScroll: true,
                    onSuccess: () => {
                        this.subMenuShow = false
                    }
                })
            }
        }
    })
</script>
