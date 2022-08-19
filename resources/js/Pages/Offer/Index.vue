<template>
    <admin-layout>
        <main class="flex-1 pb-8">
            <div class="absolute top-8 right-10 z-10">
                <SuccessAlert :message="$page.props.success.message"/>
            </div>
            <div class="py-6">
                <div class="max-w-7xl px-4 sm:px-6 md:px-8">
                    <!-- Replace with your content -->
                        <div class="py-4">
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

                            <div class="min-h-full mt-8" v-for="offer in offers.data" :key="offer.id">
                                <OfferCard :offer="offer"/>
                            </div>

                            <div class="mt-5 bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                <div class="flex-1 flex justify-between sm:hidden">
                                    <Link :href="offers.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Anterior </Link>
                                    <Link :href="offers.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Siguiente </Link>
                                </div>
                                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                                    <div>
                                        <nav
                                            class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                            aria-label="Pagination"
                                            v-for="(link, index) in offers.links" :key="index"
                                        >
                                            <Link
                                                v-html="link.label"
                                                :href="link.url"
                                                :class="[
                                                    link.url === null ? 'disabled' : '',
                                                    link.active ? 'z-10 bg-purple-50 border-purple-500 text-purple-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                                                ]"
                                            >
                                            </Link>
                                        </nav>
                                    </div>
                                </div>
                                </div>

                            <!-- <OfferCard/>
                            <OfferCard/>
                            <OfferCard/>
                            <OfferCard/> -->
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
    import SuccessAlert from '@/Components/Alerts/SuccessAlert'
    import OfferCard from '@/Components/Offer/OfferCard'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            AdminLayout,
            Link,
            SuccessAlert,
            OfferCard
        },
        props: {
            offers: Object
        }
    })
</script>
