<template>
<!-- TITULO DE TARJETA -->
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Idiomas</h3>
    </div>
    <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
    <div v-if="!formBind && !ifExist" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de los idiomas, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a @click="this.formBind = true" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6 cursor-pointer"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
    <div class=" mb-4" v-else-if="formBind">
        <div class="flex flex-col justify-around w-full items-start grow gap-2 2xl:ml-1 lg:gap-4 lg:flex-row lg:pb-4">
            <div class="grow w-full lg:basis-1/2">
                <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Idioma</label>
                <select required name="school_name" v-model="this.languages.language" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    <option value>Seleccione un algo</option>
                    <option value="Inglés">Inglés</option>
                    <option value="Alemán">Alemán</option>
                    <option value="Italiano">Italiano</option>
                    <option value="Japonés">Japonés</option>
                </select>
            </div>
            <div class="grow w-full lg:basis-1/2">
                <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Nivel</label>
                <select required name="school_name" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    <option value>Seleccione un algo</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                </select>
            </div>
        </div>
        <div v-if="this.languages.language == 'Inglés'" class="flex flex-col justify-around w-full items-start grow gap-2 2xl:ml-1 lg:gap-4 lg:flex-row lg:pb-4">
            <div class="grow w-full lg:basis-1/2">
                <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Nombre del certificado</label>
                <select required name="school_name" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                    <option value>Seleccione un algo</option>
                    <option value="Instituto Tecnológico de Tuxtla Gutiérrez (ITTG)">Instituto Tecnológico de Tuxtla Gutiérrez (ITTG)</option>
                    <option value="Instituto Tecnológico de Chihuahua (ITCH)">Instituto Tecnológico de Chihuahua (ITCH)</option>
                    <option value="Universidad Anáhuac(UA)">Universidad Anáhuac(UA)</option>
                    <option value="Instituto Tecnológico Superior de Misantla (ITSM)">Instituto Tecnológico Superior de Misantla (ITSM)</option>
                </select>
                <p id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs text-gray-500">¿No aparece tu centro de educación en la lista? <a href="#" class="text-red-500 hover:underline font-bold">regístralo aquí!</a>.</p>
            </div>
            <div class="flex grow w-full lg:basis-1/2 2xl:ml-4">
            <div class="grow">
                <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">
                    <span class="block text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Adjuntar certificado</span>
                </label>
                <div class="flex items-center justify-center space-y-1 border-2 rounded-md">
                    <input type="file" required id="profile_photo_path" name="profile_photo_path" class="block w-full text-sm text-slate-500 xl:text-base file:xl:text-base file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600" @change="onFileSelected"/>
                </div>
            </div>
            </div>
        </div>
        <!-- BOTONES DE GUARDAR Y CANCELAR -->
            <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                <div class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                    <jet-button v-if="formBind" class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                    <a @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer" v-if="formBind">Cancelar</a>
                </div>
                <!-- BOTON DE ELIMINAR
                <div @click="deletes()" v-if="!newStudyBind" class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400  order-last lg:text-base lg:order-first">
                   <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Eliminar
                </div> -->
            </div>
    </div>
    
    <div class="2xl:mb-4" v-else-if="!formBind && ifExist">
        <div class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
            <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">Inglés</h3>
            <p class="text-xs text-gray-500">Nivel: B1</p>
            <div class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
             
             <div class="flex flex-nowrap justify-center items-center py-2 cursor-pointer transition">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-red-500 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <div class="text-sm text-gray-600 text-center w-auto leading-none align-middle">TOEFLCertificate_AnayaDiazHugoRafael.pdf</div>
                </div>
                <div class="flex w-min text-center justify-center flex-row text-sm text-gray-500 font-semibold rounded-xl bg-gray-100 px-2 py-1 mb-2 items-center select-none group-hover:visible group-hover:delay-100 group-hover:in-ease-out active:bg-gray-200 active:text-gray-600 lg:in-ease-out lg:invisible ">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Modificar
                </div>
           </div>
        </div>
        <div class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
            <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">Alemán</h3>
            <p class="text-xs text-gray-500">Nivel: A1</p>
            <div class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                <div class="flex flex-nowrap justify-center items-center py-2 transition">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-400 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <div class="text-sm text-gray-500 text-center w-auto leading-none align-middle">Sin documento adjunto</div>
                </div>
                <div class="flex w-min text-center justify-center flex-row text-sm text-gray-500 font-semibold rounded-xl bg-gray-100 px-2 py-1 mb-2 items-center select-none group-hover:visible group-hover:delay-100 group-hover:in-ease-out active:bg-gray-200 active:text-gray-600 lg:in-ease-out lg:invisible ">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    Modificar
                </div>
           </div>
        </div>
         <div class="w-auto flex justify-center items-center lg:justify-center lg:py-4">
            <a @click="this.formBind = true" class="lg:hiddn flex items-center cursor-pointer content-center justify-center text-red-500 text-lg font-semibold text-start lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
        </div>
    </div>
</div>
</template>

<script>
import JetButton from '@/Jetstream/Button';
export default {
    components: {JetButton },
    props: ['userProp'],
    data() {
        return {
            ifExist: true,
            formBind: false,
            newData: false,
            englishBind: false,
            languages: this.$inertia.form( {
                language: ""
            }),
        }
    },
    methods: {
        // nonExistView() {
        //     if
        //     console.log("nonExistView");
        // },
        // formView() {
        //     console.log("formView");
        // },
        // existView() {
        //     console.log("existView");
        // }
    }
};
</script>

<style>
</style>