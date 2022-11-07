<template>
<!-- TITULO DE TARJETA -->
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Educación</h3>
    </div>
    <div v-if="!loadData"  role="status" class="max-w-sm justify animate-pulse pb-5 lg:pb-0">
        <div class="h-2.5 bg-gray-200 rounded-full w-48 mb-4"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[230px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[150px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-2.5"></div>
        <span class="sr-only">Loading...</span>
    </div>
    <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
    <div v-if="!formBind && !ifExists && loadData" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
    <div class="2xl:mb-4" v-else-if="formBind">
            <form @submit.prevent="submit">
                <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="studyLevel" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Grado cursado</label>
                        <select required v-model="this.studyDegree.study_level" name="studyLevel" id="studyLevel" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el grado cursado</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Preparatoria">Preparatoria</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestria">Maestria</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>
                </div>
                <div class="flex grow 2xl:ml-4 basis-1/2 lg:gap-4">
                    <div class="mt-3 grow">
                        <label for="study_status" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Estatus</label>
                        <select required name="study_status" @change="watchStatus" v-model="studyDegree.study_status" id="study_status" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el estado</option>
                            <option value="progress">En curso</option>
                            <option value="done">Finalizado</option>
                        </select>
                    </div>
                </div>
                </div>
            <div class="flex flex-col justify-around items-start grow gap-2 lg:gap-4 lg:flex-row">
                <div class="flex w-full 2xl:ml-1 lg:basis-1/2 lg:grow">
                    <div class="mt-3 grow">
                        <label for="school-name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Centro de educación</label>
                        <div class="relative">
                            <v-select taggable v-model="this.studyDegree.school_name" :options="schools" class="mt-1 block w-full text-xs rounded-md border-gray-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base"></v-select>
                            <p id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs text-gray-500">¿No aparece tu centro de educación en la lista? Ingresa tu centro de educación con su nombre y sus iniciales entre paréntesis. <span>Ej: Instituto Experientya (IE)</span></p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full 2xl:ml-1 lg:basis-1/2 lg:grow">
                    <div class="mt-3 grow">
                        <label for="study_certificate" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Título de la carrera</label>
                        <input type="text" v-model="this.studyDegree.study_tittle" required autocomplete="off" placeholder="Ingrese el título de la carrera" name="job" id="job" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="starting_month" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de inicio</label>
                        <select required v-model="this.studyDegree.starting_month" name="starting_month" id="starting_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el mes de inicio</option>
                            <option v-for="(Months, index) in this.months" :key="index" :value="Months">
                                {{ Months }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="starting_year" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de inicio</label>
                        <select required v-model="this.studyDegree.starting_year" name="starting_year" id="starting_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el año de inicio</option>
                            <option v-for="(Years, index) in this.years" :key="index" :value="Years">
                                {{ Years }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- DATOS FINALIZACIÓN, SELECCIONAR FINALIZADO EN ESTATUS PARA MOSTRAR CON VIF -->
             <div v-if="this.studyDegree.study_status == 'done'" class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="finished_month" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de finalización</label>
                        <select required v-model="this.studyDegree.finished_month" name="finished_month" id="finished_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el mes de finalización</option>
                            <option v-for="(Months, index) in this.months" :key="index" :value="Months">
                                {{ Months }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de finalización</label>
                        <select required v-model="this.studyDegree.finished_year" name="finished_year" id="finished_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione el año de finalización</option>
                            <option v-for="(Years, index) in this.years" :key="index" :value="Years">
                                {{ Years }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- BOTONES DE GUARDAR Y CANCELAR -->
            <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                <div class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                    <jet-button v-if="formBind" :disabled="studyDegree.processing" class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                    <a @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer" v-if="formBind">Cancelar</a>
                </div>
                <!-- BOTON DE ELIMINAR -->
                <div @click="deleteAlert()" v-if="!newStudyBind" class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400  order-last lg:text-base lg:order-first">
                   <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Eliminar
                </div>
            </div>
        </form>
    </div>
    <div v-else-if="!formBind && ifExists && loadData" class="flex flex-col">
        <div @click="edit(study)" v-for="(study, index) in studyDegrees" :key="index"  class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
            <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{study.school_name}}</h3>
            <p class="text-xs text-gray-500">{{study.starting_year}} - {{study.finished_year}}</p>
            <div class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                <div class="flex flex-nowrap justify-center items-center py-2 transition">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    <div class="text-sm text-gray-600 text-center w-auto leading-none align-middle">{{study.study_level}} en {{study.study_tittle}}</div>
                </div>
                <div class="flex w-min text-center justify-center flex-row text-sm text-gray-500 font-semibold rounded-xl bg-gray-100 px-2 py-1 mb-2 items-center select-none group-hover:visible group-hover:delay-100 group-hover:in-ease-out active:bg-gray-200 active:text-gray-600 lg:in-ease-out lg:invisible ">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Modificar
                </div>
           </div>
        </div>
         <div class="w-auto flex justify-center items-center lg:justify-center lg:py-4">
            <a @click="newStudy()" class="lg:hiddn flex items-center cursor-pointer content-center justify-center text-red-500 text-lg font-semibold text-start lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
        </div>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Yes, I'm sure
                </button>
                <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
            </div>
        </div>
    </div>
</div>



</div>
</template>

<script>
import JetButton from '@/Jetstream/Button';
import Notification from '@/CustomComponents/Notification';
import axios from 'axios';
import Swal from 'sweetalert2';
import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
export default {
    components: {JetButton, Notification, vSelect, Swal},
    props: ['userProp'],
    data() {
        return {
            loadData: false,
            formBind: false,
            ifExists: false,
            newStudyBind: false,
            deleteModal: false,
            state: "1",
            studyDegrees: [],
            schools: [],
            studyDegree: this.$inertia.form( {
                cv_id: "",
                school_name: "",
                study_level: "",
                study_tittle: "",
                study_status: "",
                study_certificate: "",
                starting_month: "",
                starting_year: "",
                finished_month: "",
                finished_year: "",
                study_city: "",
                study_state: "",
                study_country: "",
                id: "",
            }),
            years: [
                '2001',
                '2002',
                '2003',
                '2004',
                '2005',
                '2006',
                '2007',
                '2008',
                '2009',
                '2010',
                '2011',
                '2012',
                '2013',
                '2014',
                '2015',
                '2016',
                '2017',
                '2018',
                '2019',
                '2020',
                '2021',
                '2022',
            ],

            months: [
                'ENERO',
                'FEBRERO',
                'MARZO', 
                'ABRIL',
                'MAYO',
                'JUNIO',
                'JULIO',
                'AGOSTO',
                'SEPTIEMBRE',
                'OCTUBRE',
                'NOVIEMBRE',
                'DICIEMBRE',
            ]

        }
    },
    methods: {
        async getStudyDegree() {
            await axios.get(route('cv-search', this.userProp.id))
            .then((response) => {
                this.studyDegree.cv_id = response.data[0].id;
                this.$emit('sending-event', 'changed')
            }).catch((error) => {
                console.log(error);
            });

            await axios.get(route('study-degrees.show', this.studyDegree.cv_id))
            .then((response) => {
                this.studyDegrees = response.data;
                if (response.data.length == 0){ 
                this.ifExists = false
                this.newStudyBind = true;
                } else {    
                this.ifExists = true
                }
            }).catch((error) => {
                console.log(error);
                this.ifExists = false
            });
            
            await axios.get(route('list-degrees-schools'))
            .then((response) => {
                this.schools = response.data;
                console.log(this.schools)
            }).catch((error) => {
                console.log(error);
            })
            this.loadData = true;
        },
        newStudy(){
            this.clearData();
            this.formBind = true;
            this.newStudyBind = true;
        }, 
        edit(i){
            this.studyDegree.school_name= i.school_name,
            this.studyDegree.study_level= i.study_level,
            this.studyDegree.study_tittle= i.study_tittle,
            this.studyDegree.study_status= i.study_status,
            this.studyDegree.study_certificate= i.study_certificate,
            this.studyDegree.starting_month= i.starting_month,
            this.studyDegree.starting_year= i.starting_year,
            this.studyDegree.finished_month= i.finished_month,
            this.studyDegree.finished_year= i.finished_year,
            this.studyDegree.study_city= i.study_city,
            this.studyDegree.study_state= i.study_state,
            this.studyDegree.study_country= i.study_country,
            this.studyDegree.id= i.id;
            this.formBind = true;
            this.newStudyBind = false;
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
        deletes(){
            this.studyDegree.delete(route('study-degree.delete', this.studyDegree.id), { preserveScroll: true});
            this.formBind = false;
            this.getStudyDegree();
        },
        submit() {
            if (this.newStudyBind) {
                this.studyDegree.post(route('study-degree.store'), { preserveScroll: true});
                Swal.fire(
                    'Creado!',
                    'El registro fue creado exitosamente!',
                    'success'
                    );
            } else if (!this.newStudyBind) {
                this.studyDegree.put(route('study-degree.update', this.studyDegree.id), { preserveScroll: true});
                Swal.fire(
                    'Actualizado!',
                    'El registro fue actualizado exitosamente!',
                    'success'
                    );
            }
            this.getStudyDegree();
            this.formBind = false;
        },

        clearData(){
            this.studyDegree.school_name= "",
            this.studyDegree.study_level= "",
            this.studyDegree.study_tittle= "",
            this.studyDegree.study_status= "",
            this.studyDegree.study_certificate= "",
            this.studyDegree.starting_month= "",
            this.studyDegree.starting_year= "",
            this.studyDegree.finished_month= "",
            this.studyDegree.finished_year= "",
            this.studyDegree.study_city= "",
            this.studyDegree.study_state= "",
            this.studyDegree.study_country= "",
            this.studyDegree.id= "";
        },
        watchStatus() {
            if(this.studyDegree.study_status == "progress")
            this.studyDegree.finished_year = "En curso";
        },
    },

    created() {
        this.getStudyDegree();
    },
};
</script>

<style></style>

