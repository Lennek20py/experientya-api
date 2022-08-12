<template>
<!-- TITULO DE TARJETA -->
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Educación</h3>
    </div>
    <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
    <div v-if="!formBind && !ifExists" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de la educación, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
    <div class="2xl:mb-4" v-else-if="formBind">
            <form @submit.prevent="submit">
                <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1">
                    <div class="mt-3 grow">
                        <label for="studyLevel" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Grado cursado</label>
                        <select required v-model="this.studyDegree.study_level" name="studyLevel" id="studyLevel" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required name="study_status" @change="watchStatus" v-model="studyDegree.study_status" id="study_status" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required v-model="studyDegree.school_name" name="school_name" id="school_name" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required v-model="this.studyDegree.study_tittle" name="study_certificate" id="study_certificate" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione un algo</option>
                            <option value="ARQUITECTURA">ARQUITECTURA </option>
                            <option value="INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES">INGENIERÍA EN TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIONES </option>
                            <option value="LICENCIATURA EN TURISMO">LICENCIATURA EN TURISMO </option>
                            <option value="ESPECIALIZACIÓN EN INVESTIGACIÓN EDUCATIVA">ESPECIALIZACIÓN EN INVESTIGACIÓN EDUCATIVA </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-around items-center align-center grow gap-2 lg:gap-4">
                <div class="flex grow 2xl:ml-1 basis-1/2">
                    <div class="mt-1 grow">
                        <label for="starting_month" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Mes de inicio</label>
                        <select required v-model="this.studyDegree.starting_month" name="starting_month" id="starting_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required v-model="this.studyDegree.starting_year" name="starting_year" id="starting_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required v-model="this.studyDegree.finished_month" name="finished_month" id="finished_month" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                        <select required v-model="this.studyDegree.finished_year" name="finished_year" id="finished_year" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
            <!-- BOTONES DE GUARDAR Y CANCELAR -->
            <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                <div class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                    <jet-button v-if="formBind" :disabled="studyDegree.processing" class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                    <a @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer" v-if="formBind">Cancelar</a>
                </div>
                <!-- BOTON DE ELIMINAR -->
                <div @click="deletes()" v-if="!newStudyBind" class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400  order-last lg:text-base lg:order-first">
                   <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Eliminar
                </div>
            </div>
            </form>
    </div>
    <div v-else-if="!formBind && ifExists" class="flex flex-col">
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
            ifExists: false,
            newStudyBind: false,
            state: "1",
            studyDegrees: [],
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
                id: "",

            })
            
        }
    },
    methods: {
        async getStudyDegree() {
            // await axios.get().then((response) =>{
            //     console.log(response);
            // })

            await axios.get(route('study-degrees.show', 1))
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
            // console.log(i);
            // console.log('Id que se tiene', this.studyDegree.id);
        },
        deletes(){
            this.studyDegree.delete(route('study-degree.delete', this.studyDegree.id), { preserveScroll: true});
            this.formBind = false;
            this.getStudyDegree();
        },
        submit() {
            if (this.newStudyBind) {
                this.studyDegree.post(route('study-degree.store'), { preserveScroll: true});
            } else if (!this.newStudyBind) {
                this.studyDegree.put(route('study-degree.update', this.studyDegree.id), { preserveScroll: true});
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

<style>
</style>