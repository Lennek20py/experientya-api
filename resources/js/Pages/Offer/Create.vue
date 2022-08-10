<template>
    <admin-layout>
        <div class="py-6 bg-gray-200 max-h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 pb-24">
            <!-- Replace with your content -->
                <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                    <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Nueva Vacante</h2>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                    <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ form }}</p> -->
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                <input
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                            </div>
                            <div class="col-span-12 lg:col-span-3 mt-1">
                                <label for="title-job" class="block text-sm font-medium text-gray-700">Nombre del puesto</label>
                                <input
                                    type="text"
                                    v-model="form.title_job"
                                    id="title-job"
                                    autocomplete="street-address"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                                <textarea
                                    rows="4"
                                    v-model="form.description"
                                    id="description"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_job" class="block text-sm font-medium text-gray-700">Tipo de Trabajo</label>
                                <select v-model="form.type_job" id="type_job" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option selected>Empleo</option>
                                    <option>Residencia</option>
                                    <option>Práctica profesional</option>
                                    <option>Educación Dual</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_horary" class="block text-sm font-medium text-gray-700">Horario</label>
                                <select v-model="form.type_horary" id="type_horary" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option selected>Jornada Completa</option>
                                    <option>Media Jornada</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Tipo de Contrato</label>
                                <select v-model="form.type_of_contract" id="type_of_contract" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option selected>Contrato</option>
                                    <option>Por proyecto</option>
                                    <option>Temporal</option>
                                    <option>Permanente</option>
                                </select>
                            </div>
                            <div class="col-span-12 lg:col-span-6 mt-1">
                                <label for="profile_description" class="block text-sm font-medium text-gray-700">Pérfil de Cadidato ideal</label>
                                <textarea
                                    v-model="form.profile_description"
                                    rows="4"
                                    id="profile_description"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                >
                                </textarea>
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
                                <input
                                    id="start_date"
                                    v-model="form.start_date"
                                    type="date"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                />
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="salary" class="font-bold text-gray-600 mb-2">Salario: ($ {{ form.salary }})</label>
                                <input id="salary" type="range" min="1" max="100000" v-model="form.salary" class="w-full h-2 bg-blue-100 appearance-none" />
                            </div>
                            <div class="col-span-12 lg:col-span-2 mt-1">
                                <label for="range" class="font-bold text-gray-600">Tipo de pago</label>
                                <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                                    <div class="flex items-center">
                                        <input v-model="form.payment_type" id="payment_type_1" name="notification-method" type="radio" value="Mensual" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="payment_type_1" class="ml-3 block text-sm font-medium text-gray-700"> Mensual </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input v-model="form.payment_type" id="payment_type_2" name="notification-method" type="radio" value="Quincenal" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="payment_type_2" class="ml-3 block text-sm font-medium text-gray-700"> Quincenal </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Read full application</a>
                    </div>
                </div>
                </section>
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
        },
        data() {
            return {
                form: this.$inertia.form({
                    'title': '',
                    'title_job': '',
                    'description': '',
                    'type_job': '',
                    'type_horary': '',
                    'type_of_contract': '',
                    'profile_description': '',
                    'profile_description': '',
                    'start_date': '',
                    'salary': 0,
                    'payment_type': ''
                })
            }
        }
    })
</script>
