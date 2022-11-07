<template>
    <!-- TITULO DE TARJETA -->
    <div
        class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
        <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
            <h3>Experiencia</h3>
        </div>
        <div v-if="!loadData" role="status" class="max-w-sm animate-pulse pb-5 lg:pb-0">
            <div class="h-2.5 bg-gray-200 rounded-full w-48 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[230px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[150px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-2.5"></div>
            <span class="sr-only">Loading...</span>
            <span class="sr-only">Loading...</span>
        </div>
        <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
        <div v-if="!formBind && !ifExists && loadData" class="flex content-end justify-around flex-col my-4">
            <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran
                registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
            <a @click="this.formBind = true"
                class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> Agregar</a>
        </div>
        <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
        <div class="2xl:mb-4" v-else-if="formBind && loadData">
            <div class="">
                <p id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs text-gray-500">¿No cuentas
                    con experiencia laboral?, no te preocupes. Puedes ingresar experiencia como becario o como
                    estudiante y referenciar a tus maestros.</p>
                <hr class="mt-0 mb-1 h-px bg-gray-200 border-0 dark:bg-gray-700">
            </div>
            <form @submit.prevent="submit">
                <div class="flex flex-col">
                    <!-- PUESTO INPUT / JOB -->
                    <div class="mt-3 grow">
                        <label for="studyLevel"
                            class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:text-red-500 after:content-['*']">Puesto</label>
                        <input type="text" v-model="this.experience.job" required
                            placeholder="Ingrese un puesto de trabajo." name="job" id="job"
                            class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    </div>

                    <!-- FECHAS DE INICIO Y FIN -->
                    <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                        <div class="flex w-full 2xl:ml-1 self-start">
                            <div class="mt-3 grow">
                                <label for="study_status"
                                    class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:text-red-500 after:content-['*']">Fecha
                                    de Inicio</label>
                                <input v-model="this.experience.start_date" type="date" name="start_date"
                                    id="start_date" required
                                    class="mt-1 block w-full text-xs rounded-md border-gray-300 py-1 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base" />
                            </div>
                        </div>
                        <div class="flex w-full gap-2 2xl:ml-4 lg:gap-4">
                            <div class="mt-3 grow">
                                <label for="end_date" v-bind:class="{ disabled: this.experience.actual_status == 1 }"
                                    class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:text-red-500 after:content-['*']">Fecha
                                    de Finalización</label>
                                <input v-model="this.experience.end_date" v-if="this.experience.actual_status == 0"
                                    placeholder="dd/mm/yyyy" type="date" name="end_date" id="end_date" required
                                    class="mt-1 block w-full text-xs rounded-md border-gray-300 py-1 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base" />
                                <div class="flex flex-row justify-end align-center pt-px">
                                    <label for="actual"
                                        class="text-[10px] text-justify lg:text-xs text-gray-500 align-center">
                                        <input @change="watchStatus()" type="checkbox" name="actual" id="actual"
                                            class="w-3 h-3 mr-px rounded-sm" v-model="this.experience.actual_status"
                                            true-value="1" false-value="0">
                                        Actual
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EMPRESA FIELD -->
                <div class="mt-0 grow">
                    <label for="company"
                        class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:text-red-500 after:content-['*']">Empresa</label>
                    <input required type="text" v-model="this.experience.company" placeholder="Ingrese la empresa."
                        name="company" id="company"
                        class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                </div>
                <div class="flex flex-row justify-around items-start grow gap-2 lg:gap-4">
                    <div class="flex grow 2xl:ml-1 basis-1/3">
                        <div class="mt-3 grow">
                            <label for="country"
                                class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">País</label>
                            <select @change="fetchStates()" v-model="this.experience.country" required name="country"
                                id="country"
                                class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione un país</option>
                                <option v-for="(Countries, index) in countries" :key="index" :value="Countries.iso2">
                                    {{ Countries.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="flex grow basis-1/3 2xl:ml-4">
                        <div class="mt-3 grow">
                            <label for="study_certificates"
                                class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Estado</label>
                            <select @change="fetchCities()" v-model="this.experience.state" required
                                name="study_certificate" id="study_certificate"
                                class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione un estado</option>
                                <option v-for="(States, index) in states" :key="index" :value="States.iso2">
                                    {{ States.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="flex grow basis-1/3 2xl:ml-4">
                        <div class="mt-3 grow">
                            <label for="study_certificate"
                                class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Ciudad /
                                Municipio</label>
                            <select v-model="this.experience.city" required name="study_certificate"
                                id="study_certificate"
                                class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione un algo</option>
                                <option v-for="(Cities, index) in cities" :key="index" :value="Cities.name">
                                    {{ Cities.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-3 grow">
                    <label for="studyLevel"
                        class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:text-red-500 after:content-['*']">Referencia
                        de la empresa</label>
                    <textarea required v-model="this.experience.company_description" name="company_description"
                        id="company_description" rows="4"
                        class="block p-2.5 w-full text-xs text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Nombre del responsable, teléfono y correo electrónico de contacto..."></textarea>
                </div>
                <!-- BOTONES DE GUARDAR Y CANCELAR -->
                <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                    <div
                        class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                        <jet-button v-if="formBind" :disabled="experience.processing"
                            class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">
                            Guardar</jet-button>
                        <a @click="this.formBind = false"
                            class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer"
                            v-if="formBind">Cancelar</a>
                    </div>
                    <!-- BOTON DE ELIMINAR -->
                    <div @click="deleteAlert()" v-if="!newData"
                        class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400  order-last lg:text-base lg:order-first">
                        <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                        Eliminar
                    </div>
                </div>
            </form>
        </div>

        <div v-else-if="!formBind && ifExists && loadData" class="flex flex-col">
            <div @click="edit(Experience)" v-for="(Experience, index) in experiences" :key="index"
                class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
                <!-- <div class="hidden">{{fetchLocationInfo(Experience.city)}}</div> -->
                <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{ Experience.company }}</h3>
                <div class="flex flex-nowrap justify-center items-center py-0 transition">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-300 pr-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-xs text-gray-500">{{ Experience.start_date }} - {{ Experience.end_date }}</p>
                </div>
                <div class="flex flex-nowrap justify-center items-center py-0 transition">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-300 pr-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-xs text-gray-500">{{ Experience.city }}, {{ Experience.state }}, {{
                            Experience.country
                    }}
                    </p>
                </div>
                <div
                    class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                    <div class="flex flex-nowrap justify-center items-center py-2 transition">
                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                        <div class="text-sm text-gray-600 text-center w-auto leading-none align-middle">
                            {{ Experience.job }}</div>
                    </div>
                    <div
                        class="flex w-min text-center justify-center flex-row text-sm text-gray-500 font-semibold rounded-xl bg-gray-100 px-2 py-1 mb-2 items-center select-none group-hover:visible group-hover:delay-100 group-hover:in-ease-out active:bg-gray-200 active:text-gray-600 lg:in-ease-out lg:invisible ">
                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 pr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                            </path>
                        </svg>
                        Modificar
                    </div>
                </div>
            </div>
            <div class="w-auto flex justify-center items-center lg:justify-center lg:py-4">
                <a @click="newDataMethod()"
                    class="lg:hiddn flex items-center cursor-pointer content-center justify-center text-red-500 text-lg font-semibold text-start lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg> Agregar</a>
            </div>
        </div>
    </div>

</template>

<script>
import JetButton from '@/Jetstream/Button';
import Notification from '@/CustomComponents/Notification';
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
    components: { JetButton, Notification, Swal },
    props: ['userProp'],
    data() {
        return {
            loadData: false,
            formBind: false,
            ifExists: false,
            newData: false,
            state: "1",
            locationInfo: {},
            experiences: [],
            countries: [{}],
            states: [],
            cities: [],
            experience: this.$inertia.form({
                cv_id: "",
                job: "",
                start_date: "",
                end_date: "",
                company: "",
                country: "",
                state: "",
                city: "",
                company_description: "",
                id: "",
                actual_status: "",
            }),
        }
    },
    methods: {
        async getExperiences() {
            await axios.get(route('cv-search', this.userProp.id))
                .then((response) => {
                    this.experience.cv_id = response.data[0].id;
                }).catch((error) => {
                    console.log(error);
                });

            await axios.get(route('experience.show', this.experience.cv_id))
                .then((response) => {
                    this.experiences = response.data;
                    this.$emit('sending-event', 'changed')
                    if (response.data.length == 0) {
                        this.ifExists = false
                        this.newData = true;
                    } else {
                        this.ifExists = true
                    }
                }).catch((error) => {
                    console.log(error);
                    this.ifExists = false
                });
            const self = this;
            this.loadData = true;
            var config = {
                method: 'get',
                url: 'https://api.countrystatecity.in/v1/countries',
                headers: {
                    'X-CSCAPI-KEY': 'cUlVWVJxVGRJdXVlVmZURER3QnJCOTRtOVZteklKblpFYTJ1TklUZw=='
                }
            };
            axios(config)
                .then(function (response) {
                    self.countries = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        newDataMethod() {
            this.clearData();
            this.formBind = true;
            this.newData = true;
        },
        edit(i) {
            this.experience.job = i.job,
                this.experience.start_date = i.start_date,
                this.experience.end_date = i.end_date,
                this.experience.company = i.company,
                this.experience.country = i.country,
                this.experience.state = i.state,
                this.experience.city = i.city,
                this.experience.company_description = i.company_description,
                this.experience.id = i.id,
                this.formBind = true;
            this.newData = false;
            this.fetchStatesEdit();
            this.fetchCitiesEdit();
        },
        deleteAlert() {
            Swal.fire({
                title: '¿Está seguro?',
                text: "No se podrá revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si, Eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Eliminado!',
                        'El registro fue eliminado exitosamente.',
                        'success'
                    )
                    this.deletes();
                }
            })
        },
        deletes() {
            this.experience.delete(route('experience.destroy', this.experience.id), { preserveScroll: true });
            this.formBind = false;
            this.getExperiences();
        },
        submit() {
            if (this.newData) {
                this.experience.post(route('experience.store'), { preserveScroll: true });
            } else if (!this.newData) {
                this.experience.put(route('experience.update', this.experience.id), { preserveScroll: true });
            }
            this.getExperiences();
            this.formBind = false;
        },
        clearData() {
            this.experience.job = "",
                this.experience.start_date = "",
                this.experience.end_date = "",
                this.experience.company = "",
                this.experience.country = "",
                this.experience.state = "",
                this.experience.city = "",
                this.experience.company_description = "",
                this.experience.id = ""
        },
        watchStatus() {
            if (this.experience.actual_status == 1)
                this.experience.end_date = "Actual";
        },
        async fetchStates() {
            this.experience.state = "";
            this.experience.city = "";
            const self = this;
            var config = {
                method: 'get',
                url: 'https://api.countrystatecity.in/v1/countries/' + this.experience.country + '/states',
                headers: {
                    'X-CSCAPI-KEY': 'cUlVWVJxVGRJdXVlVmZURER3QnJCOTRtOVZteklKblpFYTJ1TklUZw=='
                }
            };
            axios(config)
                .then(function (response) {
                    self.states = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        async fetchCities() {
            this.experience.city = ""
            const self = this
            var config = {
                method: 'get',
                url: 'https://api.countrystatecity.in/v1/countries/' + this.experience.country + '/states/' + this.experience.state + '/cities',
                headers: {
                    'X-CSCAPI-KEY': 'cUlVWVJxVGRJdXVlVmZURER3QnJCOTRtOVZteklKblpFYTJ1TklUZw=='
                }
            };
            axios(config)
                .then(function (response) {
                    self.cities = response.data;
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
        async fetchStatesEdit() {
            await axios.get(route('states-list', this.experience.country))
                .then((response) => {
                    this.states = response.data;
                }).catch((error) => {
                    console.log(error);
                });
        },
        // async fetchCities() {
        //     this.experience.city = "";
        //     await axios.get(route('cities-list', this.experience.state))
        //     .then((response) => {
        //         this.cities = response.data;
        //     }).catch((error) => {
        //         console.log(error);
        //     });
        // },
        async fetchCitiesEdit() {
            await axios.get(route('cities-list', this.experience.state))
                .then((response) => {
                    this.cities = response.data;
                }).catch((error) => {
                    console.log(error);
                });
        },
    },

    created() {
        this.getExperiences();
    },
};
</script>


<style>

</style>