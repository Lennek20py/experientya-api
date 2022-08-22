<template>
    <admin-layout>
        <main class="flex-1 pb-8">
            <div class="absolute top-8 right-10 z-10">
                <SuccessAlert :message="$page.props.success.message"/>
            </div>

            <div class="py-6">
                <div class="max-w-7xl px-4 sm:px-6 md:px-8">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Buscar . . .</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="simple-search" v-model="search" class="bg-slate-50-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500" placeholder="Buscar . . ." required>
                        </div>
                    </form>
                    <!-- Replace with your content -->
                    <div class="py-4 mt-2">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Vacantes</h1>
                            <p class="mt-2 text-sm text-gray-700">Un listado de todas las vacantes relacionadas a su cuenta.</p>
                            </div>
                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                <Link :href="route('offer.create')" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                <!-- Heroicon name: solid/mail -->
                                <svg class="-ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Agregar vacante
                                </Link>
                            </div>
                        </div>

                        <div class="min-h-full mt-8 pr-10 lg:pr-96" v-if="offers.data.length === 0">
                            <p class="border-b pb-4 mt-16 text-lg font-semibold text-gray-900"> Sin contenido que mostrar . . . </p>
                        </div>
                        <div v-else>
                            <div class="min-h-full mt-10" v-for="offer in offers.data" :key="offer.id">
                                <OfferCard :offer="offer"/>
                            </div>
                        </div>


                        <OfferPagination :offers="offers"/>
                    </div>

                    <!-- /End replace -->
                </div>
            </div>
        </main>
    </admin-layout>
</template>

<script>
    import AdminLayout from '@/Layouts/CompanyLayout'
    import { Link } from '@inertiajs/inertia-vue3'
    import { Inertia } from '@inertiajs/inertia'
    import SuccessAlert from '@/Components/Alerts/SuccessAlert'
    import OfferCard from '@/Components/Offer/OfferCard'
    import OfferPagination from '@/Components/Offer/OfferPagination'

    import { defineComponent, watch } from 'vue'

    export default defineComponent({
        components: {
            AdminLayout,
            Link,
            SuccessAlert,
            OfferCard,
            OfferPagination
        },
        props: {
            offers: Object,
            filters: Object
        },
        data () {
            return {
                search: this.filters.search
            }
        },
        watch: {
            'search': function (value) {
                Inertia.get('/company/offer', {search: value}, {
                    preserveState: true,
                    replace: true
                } )
            }
        }
    })
</script>
