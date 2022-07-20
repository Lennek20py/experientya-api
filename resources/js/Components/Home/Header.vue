<template>
    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-white shadow py-2 fixed inset-x-0 z-10 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
            <div class="flex">
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="mobile_menu = !mobile_menu" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                    Icon when menu is closed.

                    Heroicon name: outline/menu

                    Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg v-if="!mobile_menu" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                    Icon when menu is open.

                    Heroicon name: outline/x

                    Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg v-else xmlns="http://www.w3.org/2000/svg" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                </div>
                <Link :href="route('/')" class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-24 w-auto" src="../../../img/logo-01.png" alt="Workflow">
                <img class="hidden lg:block h-32 w-auto" src="../../../img/logo-01.png" alt="Workflow">
                </Link>
            </div>
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <Link :href="route('user.register')" type="button" class="text-base mx-1 relative inline-flex items-center px-4 py-2 border border-transparent font-medium rounded-full text-white bg-blue-500 shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span>Candidato</span>
                    </Link>
                    <Link :href="route('company.register')" type="button" class="text-base mx-1 relative inline-flex items-center px-4 py-2 border border-transparent font-medium rounded-full text-white bg-teal-500 shadow-sm hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-400">
                        <span>Empresa</span>
                    </Link>
                    <Link :href="route('login')" type="button" class="text-base mx-1 relative inline-flex items-center px-4 py-2 border border-transparent font-medium rounded-full border-teal-600 text-teal-600 bg-white-100 shadow-sm hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-700">
                        <span>Entrar</span>
                    </Link>
                </div>
                <div class="hidden md:ml-6 md:flex md:space-x-8">
                    <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-base font-medium"> Blog </a>
                    <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-base font-medium"> About us </a>
                </div>
            </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu" v-show="mobile_menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">Blog</a>
                <a href="#" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium sm:pl-5 sm:pr-6">About us</a>
            </div>
        </div>
        </nav>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link
        },
        data: function () {
            return {
                mobile_menu: 0
            }
        }
    })

</script>
