<template>

    <li class="col-span-1 divide-y rounded-md shadow-sm border-solid border-2 border-neutral-100 mt-6">
        <div class="flex w-full items-center justify-between space-x-6 p-6">
            <div class="flex">
                <img class="h-14 w-14 rounded-full" :src="user.profile_photo_path.replace('profile/', '/storage/profile/')"
                    alt="">
                <div class="ml-3">
                    <p class="text-md font-bold text-gray-900">{{user.user_first_name}} {{user.user_last_name}}</p>
                    <p class="mt-1 truncate text-sm text-gray-700">{{ user.position }}</p>
                    <p class="mt-0.5 truncate text-sm text-gray-500">{{ user.city_name }}, {{ user.state_name }}</p>
                </div>
            </div>
        </div>
        <!-- {{ user }} -->

            <div>

                <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="flex w-0 flex-1">
                        <Link :href="route('company.cv', [user.id])"
                            class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                        <!-- Heroicon name: mini/envelope -->
                        <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-3">Ver</span>
                        </Link>
                    </div>
                        <div class="-ml-px flex w-0 flex-1">
                            <form  @submit.prevent="submit" class="-ml-px flex w-0 flex-1">
                                <button @click="acting = true" type="button"
                                    class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                                    <!-- Heroicon name: mini/envelope -->
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                        <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                    </svg>
                                    <span>Enviar Invitación</span>
                                </button>
                            </form>
                        </div>
                </div>
            </div>

    </li>

<JetModal maxWidth="4xl" :show="acting" @close="acting = null">
    <div class="bg-white shadow sm:rounded-lg">
        <form class="px-4 py-5 sm:p-6">
            <h3 class="mb-6 text-2xl leading-6 font-bold text-gray-900">Invitación</h3>
            <div class="mt-2 text-sm text-gray-500">
                <h3 class="text-lg leading-6 text-gray-800 mb-2">¡Hola!</h3>
                <h3 class="text-lg leading-6 text-gray-800 mb-2">¿Esta seguro de invitar al candidato <strong>{{
                    user.user_first_name + ' '+ user.user_last_name }}</strong> al proceso de selección de su empresa?</h3>

            </div>
            <div class="mt-7 text-sm text-gray-500">

                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-12 lg:col-span-3 mt-1">
                        <label for="type_of_contract" class="block text-sm font-medium text-gray-700">Vacantes Disponibles</label>
                        <select
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                            <option value="">Seleccione una vacante de la lista</option>
                            <option>Desarrollador PEGA</option>
                            <!--v-for="vacancie in vacancies" :key="vacancie.id" :value="vacancie.id-->
                        </select>
                    </div>

                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button type="button" @click="acting = null"
                    class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Cerrar
                </button>

                <button type="button" @click="submit(this.user.email); acting = null"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Heroicon name: mini/envelope -->
                    <svg class="-ml-1 mr-2 h-5 w-5 text-dark-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                        <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                    </svg>
                    Enviar Invitación
                </button>
            </div>
        </form>
    </div>
</JetModal>

</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import { defineComponent } from 'vue'
    import JetModal from '@/Jetstream/Modal'
    import Swal from 'sweetalert2';

    export default defineComponent({
        components: {
            Link,
            JetModal,
            Swal,

        },
        props: {
            user: Object,
            offer:Object

        },
        data(){
            return{
                acting:false,
                emailData: this.$inertia.form({
                    'email':this.user.email,
                    'user': this.user.user_first_name + ' ' + this.user.user_last_name
                }
                )
            }
        },

        methods:{

            submit(){
                console.log([this.user.user_first_name]),
                this.emailData.get(route('user.sendEmail',[this.emailData.email]))
                Swal.fire({
                    icon: 'success',
                    title: '¡Enviar Email!',
                    text:'El email se ha enviado con éxito',
                    showConfirmButton: false,
                    timer: 1800
                })

            }
        }
    })
</script>
