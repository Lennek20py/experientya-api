<template>
    <admin-layout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
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
                </div>
            <!-- /End replace -->
            </div>
        </div>
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
        }
    })
</script>
