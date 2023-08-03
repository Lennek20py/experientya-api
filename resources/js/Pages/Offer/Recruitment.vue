<template>
    <admin-layout title="Proceso de Reclutamiento">
        <div class="min-h-screen pt-2 px-2 scroll-smooth cursor-default">
            <div
                class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75">
                <h2 class="py-5 text-6xl uppercase font-extrabold text-gray-900 text-center">Proceso de Reclutamiento</h2>
                <div class="w-3/4 py-10 mx-auto">
                    <div class="flex">
                        <h4 class="text-center text-md bg-gray-50 border border-gray-300 text-gray-900 rounded-l-lg">Vacante
                            actual: </h4>
                        <label for="states" class="sr-only">Vacante Actual</label>
                        <select id="states"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg border-l-gray-100  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Elige una Vacante</option>
                            <option value="CA">Desarrollador Web</option>
                            <option value="TX">Arquitecto Obras</option>
                            <option value="WH">Desarrollador iOS</option>
                            <option value="FL">Diseñador UX/UI</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex flex-row flex-nowrap justify-center align-middle items-center content-center py-10 w-full w-4xl bg-white rounded-lg border gap-5 border-gray-200 shadow-m px-5 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75">
                    <div class="w-1/2 border">
                        <h3 class="text-center uppercase text-4xl font-bold text-gray-900">SOLICITUDES ENVIADAS</h3>
                        
                    </div>
                    <div class="w-1/2 border">
                        <h3 class="text-center uppercase text-4xl font-bold text-gray-900">SOLICITUDES RECIBIDAS</h3>
                        
                    </div>
                </div>
            </div>
        </div>

    </admin-layout>
</template>

<script>
import AdminLayout from '@/Layouts/CompanyLayout'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
export default {
    components: {
        AdminLayout
    }

}
</script>

<style></style>