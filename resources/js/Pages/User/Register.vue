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
                        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Registrate</h2>
                    </div>

                    <div class="mt-8">
                        <div>

                        <div class="mt-6 relative">
                            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                            </div>
                        </div>
                        </div>

                        <div class="mt-6">
                        <form  class="space-y-6">
                            <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700"> Nombre </label>
                            <div class="mt-1">
                                <input id="first_name" name="first_name" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            </div>

                            <div>
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            </div>

                            <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Contraseña </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            </div>

                            <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Repita su contraseña </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            </div>

                            <div class="space-y-1">
                            <label for="state" class="block text-sm font-medium text-gray-700"> Estado </label>
                            <select v-model="state_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un estado</option>
                                <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                            </select>
                            </div>

                            <div class="space-y-1">
                            <label for="state" class="block text-sm font-medium text-gray-700"> Estado </label>
                            <select v-model="town_id" id="state" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                <option value="">Seleccione un municipio</option>
                                <option v-for="town in towns" :key="town.id" :value="town.id">{{town.name}}</option>
                            </select>
                            </div>

                            <div>
                            <button type="button" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Registrarse</button>
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
    import axios from 'axios'

    export default defineComponent({
        components: {
            Header,
            Footer
        },
        data: function () {
            return {
                state_id: '',
                town_id: '',
                states: [],
                towns: []
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
            }
        },
        created () {
            this.getStates()
        },
        watch: {
            state_id: function(value) {
                axios.get(`/list-towns/${value}`)
                    .then(response => {
                        this.towns = response.data
                    })
            }
        }
    })
</script>

