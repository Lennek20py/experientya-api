<template>
<!-- TITULO DE TARJETA -->
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Certificaciones</h3>
    </div>
    <!-- DIV CARGANDO DATOS  -->
    <div v-if="!loadData"  role="status" class="max-w-sm animate-pulse pb-5 lg:pb-0">
        <div class="h-2.5 bg-gray-200 rounded-full w-48 mb-4"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[230px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[150px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-2.5"></div>
        <span class="sr-only">Loading...</span>
    </div>
    <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
    <div v-if="!formBind && !ifExist && loadData" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros sobre certificaciones, por favor ingrese los datos nuevos en el botón de "+Agregar".</span>
        <a @click="newDataForm()" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6 cursor-pointer"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
    <div class=" mb-4" v-else-if="formBind">
    <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="flex flex-col justify-around w-full items-start grow gap-2 2xl:ml-1 lg:gap-4 lg:flex-row lg:pb-4">
            <div class="grow w-full lg:basis-2/3">
                <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Nombre del certificado</label>
                <v-select taggable v-model="this.certification.name_certification" :options="certifications_list"></v-select>
                <!-- <select v-model="this.certification.name_certification" required name="school_name" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    <option value>Seleccione un algo</option>
                    <option  v-for="(list, index) in this.certifications_list" :key="index" :value="list">
                        {{ list }}
                    </option>
                </select> -->
            </div>
            <div class="flex grow w-full lg:basis-1/3 2xl:ml-4">
            <div class="w-full lg:grow">
                <label for="certification_path_name" class="block text-sm font-medium text-gray-700">
                    <span class="block text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Adjuntar certificado</span>
                </label>
                <div class="flex items-center justify-center space-y-1 border-2 rounded-md">
                    <input type="file" id="certification_path_name" name="certification_path_name" class="block w-full text-sm text-slate-500 xl:text-base file:xl:text-base file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600" @change="onFileSelected"/>
                </div>
                <p v-if="certification_url" id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs mt-1 leading-none truncate ... text-gray-500 lg:m1-0">Archivo actual: <a target="_blank" rel="noopener noreferrer" :href="'storage/certifications/'+this.certification_url" class="text-red-500 leading-none truncate ... hover:underline font-bold">{{this.certification_url}}</a>.</p>
            </div>
            </div>
        </div>
        <!-- BOTONES DE GUARDAR Y CANCELAR -->
            <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                <div class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                    <jet-button v-if="formBind" :disabled="certification.processing" class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                    <a @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer" v-if="formBind">Cancelar</a>
                </div>
                <!-- BOTON DE ELIMINAR -->
                <div @click="deleteAlert()" v-if="!newData" class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400 mt-2 lg:mt-0 order-last lg:text-base lg:order-first">
                   <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Eliminar
                </div> 
            </div>
        </form>
    </div>
    <!-- VISTA DE REGISTROS  -->
    <div class="2xl:mb-4" v-else-if="!formBind && ifExist && loadData">
        <div v-for="(Certifications, index) in certifications" :key="index" @click="edit(Certifications)"  class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
            <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{Certifications.name_certification}}</h3>
            <div class="flex flex-col w-full justify-center items-center lg:flex lg:flex-row lg:justify-between">
                <div v-if="Certifications.certification_path_name" class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                    <a class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start" target="_blank" rel="noopener noreferrer" :href="'storage/certifications/'+Certifications.certification_path_name">
                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-red-500 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <div class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">{{Certifications.certification_path_name}}</div>
                    </a>
                </div>
                <div v-else class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-500 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <div class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">Sin documento adjunto</div>
                </div>
                <div class="flex w-min text-center justify-center flex-row text-sm text-gray-500 font-semibold rounded-xl bg-gray-100 px-2 py-1 mb-2 items-center select-none group-hover:visible group-hover:delay-100 group-hover:in-ease-out active:bg-gray-200 active:text-gray-600 lg:in-ease-out lg:invisible ">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Modificar
                </div>
           </div>
        </div>
         <div class="w-auto flex justify-center items-center lg:justify-center lg:py-4">
            <a @click="newDataForm()" class="lg:hiddn flex items-center cursor-pointer content-center justify-center text-red-500 text-lg font-semibold text-start lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
        </div>
    </div>
</div>
</template>

<script>
import JetButton from '@/Jetstream/Button';
import axios from 'axios';
import Swal from 'sweetalert2';
import vSelect from 'vue-select';
export default {
    components: {JetButton, Swal, vSelect },
    props: ['userProp', 'cvId'],
    data() {
        return {
            loadData: false,
            ifExist: false,
            formBind: false,
            newData: false,
            certification_url: "",
            certifications: [],
            certification: this.$inertia.form( {
                cv_id: "",
                name_certification: "",
                name_certification_capitalized: "",
                certification_path_name: "",
                id: "",

            }),
            certifications_list: [
            'Arquitecto de soluciones certificado por AWS – Profesional',
            'Profesional certificado en seguridad en la nube (CCSP)',
            'Ingeniero certificado en soluciones de privacidad de datos (CDPSE)',
            'Profesional de datos certificado (CDP)',
            'Hacker ético certificado (CEH)',
            'Gerente de seguridad de la información certificado (CISM)',
            'Profesional certificado en seguridad de sistemas de información (CISSP)',
            'Experto certificado en internetwork de Cisco (CCIE)',
            'Asociado de red certificado de Cisco (CCNA)',
            'Cisco Certified Professional Network Professional (CCNP)',
            'Arquitecto de soluciones Azure certificado por Microsoft',
            'Asociado de soluciones certificado de Microsoft (MCSA)',
            'Administrador de bases de datos MySQL certificado por Oracle (CMDBA)',
            'Profesional de gestión de proyectos (PMP)',
            'Diseñador de implementación y ciclo de vida de desarrollo certificado por Salesforce',
            'Pega Certified Business Architect',
            'Pega Certified System Architect',
            'Pega Certified Senior System Architect',
            'Pega Certified Lead System Architect',
            'Pega Certified Robotics System Architect',
            'Pega Certified Data Scientist',
            'Pega Certified Decisioning Consultant',
            'Pega Certified Marketing Consultant',
            'ISO 14001 – Sistemas de Gestión de Medio Ambiente',
            'ISO 9001 – Sistemas de Gestión de Calidad',
            'ISO 18001 (OSHAS) –Sistemas de Gestión de la Seguridad y la Salud (OHSMS)',
            'ISO 18001 (OSHAS) –Sistemas de Gestión de la Seguridad y la Salud (OHSMS)',
            'ISO 27001 – Sistemas de Gestión de la Seguridad de la Información',
            'ISO 22000 – Sistema de Gestión Alimentario',
            'ISO 16949 (ISO/TS 16949)',

            ]
        }
    },
    methods: {
    async getCertifications() {
        await axios.get(route('certifications.show', this.cvId.id))
        .then((response) => {
            this.certifications = response.data;
            this.$emit('sending-event', 'changed')
            this.certifications.forEach(element => this.certifications_list.indexOf(element.name_certification) === -1 ? this.certifications_list.push(element.name_certification) : this.certifications_list = this.certifications_list );
            
            if (response.data.length == 0) {
                this.ifExist = false;
                this.newData = true;     
            } else {
                this.ifExist = true;
            }
        }).catch((error) => {
            console.log(error);
             this.ifExist = false;
        });

        this.loadData = true;
    },
    capitalizeCertificationName() {
        let str = this.certification.name_certification;
        const arr = str.split(" ");
        for (var i = 0; i < arr.length; i++) {
            arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
        }
        this.certification.name_certification_capitalized = arr.join("");
    },
    newDataForm(){
            this.clearData();
            this.formBind = true;
            this.newData = true;
        }, 
    edit(i) {
      this.certification.name_certification = i.name_certification;
      this.certification.name_certification_capitalized = i.name_certification_capitalized;
      this.certification.certification_path_name = i.certification_path_name;
      this.certification.id = i.id;
      this.certification_url = i.certification_path_name;
      this.formBind = true;
      this.newData = false;

    },
    clearData(){
        this.certification.name_certification = "";
        this.certification.name_certification_capitalized = "";
        this.certification_path_name = "";
        this.certification_url = "";
    },
    onFileSelected(event) {
        this.capitalizeCertificationName();
        this.certification.certification_path_name = event.target.files[0];
        // console.log(event.target.files[0]);
    },

    submit() {
        this.capitalizeCertificationName();
        if(this.newData) {
            this.certification.post(route('certifications.store'), { preserveScroll: true });
            Swal.fire(
                    'Exito!',
                    'La certificación fue registrada exitosamente!',
                    'success'
                    );
        } else if(!this.newData) {
            this.certification.put(route('certifications.update', this.certification.id), { preserveScroll: true });
            Swal.fire(
                    'Actualizado!',
                    'La certificación fue actualizada exitosamente!',
                    'success'
                    );
        }
        this.getCertifications();
        this.formBind = false;
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
                    this.deleteData();
                }
            })
        },
    deleteData() {
        this.certification.delete(route('certifications.destroy', this.certification.id), { preserveScroll: true })
        this.formBind = false;
        this.getCertifications();
    },
    
    },
    created() {
    },
    watch: {
        cvId(newCv, oldCv) {
            this.getCertifications()
        }
    }
};
</script>

<style>
</style>