import { log } from 'util';
<template>
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Educación</h3>
    </div>
    <div v-if="!formBind" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a href="#" @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <div class="2xl:mb-4" v-else>
            <form @submit.prevent="submit">
                <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1">
                    <div class="mt-3 grow">
                        <label for="studyLevel" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Grado cursado</label>
                        <select v-model="this.studyDegree.study_level" name="studyLevel" id="studyLevel" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Preparatoria">Preparatoria</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestria">Maestria</option>
                            <option value="Doctorado">Doctorado</option>
                        </select>
                    </div>
                </div>
                <div class="flex grow gap-2 2xl:ml-4 lg:gap-4">
                    <div class="mt-3 grow">
                        <label for="study_status" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Estatus</label>
                        <select name="study_status" v-model="studyDegree.study_status" id="study_status" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="progress">En curso</option>
                            <option value="done">Finalizado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-start grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Centro de educación</label>
                        <select v-model="studyDegree.school_name" name="school_name" id="school_name" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="Instituto Tecnológico de Tuxtla Gutiérrez (ITTG)">Instituto Tecnológico de Tuxtla Gutiérrez (ITTG)</option>
                            <option value="Instituto Tecnológico de Chihuahua (ITCH)">Instituto Tecnológico de Chihuahua (ITCH)</option>
                            <option value="Universidad Anáhuac(UA)">Universidad Anáhuac(UA)</option>
                            <option value="Instituto Tecnológico Superior de Misantla (ITSM)">Instituto Tecnológico Superior de Misantla (ITSM)</option>
                            
                        </select>
                        <p id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs text-gray-500">¿No aparece tu centro de educación en la lista? <a href="#" class="text-red-500 hover:underline font-bold">regístralo aquí!</a>.</p>
                    </div>
                </div>
                <div class="flex grow basis-1/2 2xl:ml-4">
                    <div class="mt-3 grow">
                        <label for="study_certificate" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Título de la carrera</label>
                        <select v-model="this.studyDegree.study_tittle" name="study_certificate" id="study_certificate" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="ARQUITECTURA ">ARQUITECTURA </option>
                            <option value="INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES ">INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES </option>
                            <option value="LICENCIATURA EN TURISMO ">LICENCIATURA EN TURISMO </option>
                            <option value="ESPECIALIZACIÓN EN INVESTIGACIÓN EDUCATIVA ">ESPECIALIZACIÓN EN INVESTIGACIÓN EDUCATIVA </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="starting_month" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de inicio</label>
                        <select v-model="this.studyDegree.starting_month" name="starting_month" id="starting_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="ENERO">ENERO</option>
                            <option value="FEBRERO">FEBRERO</option>
                            <option value="MARZO">MARZO</option>
                            <option value="ABRIL">ABRIL</option>
                            <option value="MAYO">MAYO</option>
                            <option value="JUNIO">JUNIO</option>
                            <option value="JULIO">JULIO</option>
                            <option value="AGOSTO">AGOSTO</option>
                            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                            <option value="OCTUBRE">OCTUBRE</option>
                            <option value="NOVIEMBRE">NOVIEMBRE</option>
                            <option value="DICIEMBRE">DICIEMBRE</option>
                        </select>
                    </div>
                </div>

                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="starting_year" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de inicio</label>
                        <select v-model="this.studyDegree.starting_year" name="starting_year" id="starting_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- DATOS FINALIZACIÓN, SELECCIONAR FINALIZADO EN ESTATUS PARA MOSTRAR CON VIF -->
             <div v-if="this.studyDegree.study_status == 'done'" class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="finished_month" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de finalización</label>
                        <select v-model="this.studyDegree.finished_month" name="finished_month" id="finished_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="ENERO">ENERO</option>
                            <option value="FEBRERO">FEBRERO</option>
                            <option value="MARZO">MARZO</option>
                            <option value="ABRIL">ABRIL</option>
                            <option value="MAYO">MAYO</option>
                            <option value="JUNIO">JUNIO</option>
                            <option value="JULIO">JULIO</option>
                            <option value="AGOSTO">AGOSTO</option>
                            <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                            <option value="OCTUBRE">OCTUBRE</option>
                            <option value="NOVIEMBRE">NOVIEMBRE</option>
                            <option value="DICIEMBRE">DICIEMBRE</option>
                        </select>
                    </div>
                </div>
                <div class="flex grow 2xl:ml-4 basis-1/2">
                    <div class="mt-3 grow">
                        <label for="" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Año de finalización</label>
                        <select v-model="this.studyDegree.finished_year" name="finished_year" id="finished_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                           <option value>Seleccione un algo</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex mt-3 flex-wrap justify-center items-center lg:justify-end 2xl:py-3">
                <jet-button v-if="formBind" @click="submit" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center lg:mx-2 font-semibold px-5 w-full lg:w-auto">Guardar</jet-button>
                <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg" v-if="formBind">Cancelar</a>
        </div>
            </form>
    </div>
</div>
</template>

<script>
import JetButton from '@/Jetstream/Button';
import Notification from '@/CustomComponents/Notification';
import axios from 'axios';
export default {
    components: {JetButton, Notification},
    props: ['userProp'],
    data() {
        return {
            formBind: false,
            state: "1",
            studyDegree: this.$inertia.form( {
                cv_id: 1,
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

            })
            
        }
    },
    methods: {
        async getStudyDegree() {
            await axios.get(route('study-degree.show', this.miCv_ID))
            .then((response) => {
                this.studyDegree = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        submit() {
            this.studyDegree.post(route('study-degree.store'));
            this.formBind = false;
        },
    },

    created() {
        this.getStudyDegree();
    },
};
</script>

<style>
</style>