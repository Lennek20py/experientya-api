<template>
<!-- TITULO DE TARJETA -->
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
        <h3>Idiomas</h3>
    </div>
    <div v-if="!loadData"  role="status" class="max-w-sm animate-pulse pb-5 lg:pb-0">
        <div class="h-2.5 bg-gray-200 rounded-full w-48 mb-4"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[230px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[150px] mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-2.5"></div>
        <span class="sr-only">Loading...</span>
    </div>
    <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
    <div v-if="!formBind && !ifExists && loadData" class="flex content-end justify-around flex-col my-4">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de los idiomas, por favor ingrese los datos nuevos en el link a continuación.</span>
        <a @click="newDataForm()" class="flex items-center text-red-500 text-lg font-semibold text-start pt-6 cursor-pointer"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a>
    </div>
    <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
    <div class=" mb-4" v-else-if="formBind">
        <form @submit.prevent="submit">
            <div class="flex flex-col justify-around w-full items-start grow gap-2 2xl:ml-1 lg:gap-4 lg:flex-row lg:pb-4">
                <div class="grow w-full lg:tgyhnybasis-1/2">
                    <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Idioma</label>
                    <select required name="school_name" v-model="this.language.name_language" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                        <option value>Seleccione un idioma</option>
                        <option v-for="(list, id) in this.list_languages" :key="id" :value="list.language">
                            {{ list.language }}
                        </option>
                    </select>
                </div>
                <div class="grow w-full lg:basis-1/2">
                    <label for="school_name" class="text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base after:ml-0.5 after:text-red-500 after:content-['*']">Nivel</label>
                    <select v-model="this.language.level" required name="school_name" id="school_name" class="block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                        <option value>Seleccione el nivel</option>
                        <option value="No Hablado">No Hablado</option>
                        <option value="Básico">Básico</option>
                        <option value="Intermedio">Intermedio</option>
                        <option value="Avanzado">Avanzado</option>
                        <option value="Nativo">Nativo</option>
                    </select>
                </div>
            </div>
            <div v-if="!this.language.name_language == ''" class="flex flex-col pt-2 justify-around w-full items-start grow gap-2 2xl:ml-1 lg:gap-4 lg:pt-0 lg:flex-row lg:pb-4">
                <div class="flex grow w-full">
                <div class="grow">
                    <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">
                        <span class="block text-xs text-gray-800 font-medium lg:text-sm 2xl:text-base">Adjuntar certificado</span>
                    </label>
                    <div class="flex items-center justify-center space-y-1 border-2 rounded-md">
                        <input type="file" id="profile_photo_path" name="profile_photo_path" class="block w-full text-sm text-slate-500 xl:text-base file:xl:text-base file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600" @change="onFileSelected"/>
                    </div>
                     <p v-if="certification_url" id="helper-text-explanation" class=" text-[10px] text-justify lg:text-xs mt-1 leading-none truncate ... text-gray-500 lg:m1-0">Archivo actual: <a target="_blank" rel="noopener noreferrer" :href="'storage/certifications/'+this.certification_url" class="text-red-500 leading-none truncate ... hover:underline font-bold">{{this.certification_url}}</a>.</p>
                </div>
                </div>
            </div>
            <!-- BOTONES DE GUARDAR Y CANCELAR -->
                <div class="flex mt-3 w-full flex-col justify-between items-center lg:flex-row 2xl:py-3">
                    <div class="flex flex-wrap justify-center w-full order-first lg:order-last lg:w-auto lg:justify-end ">
                        <jet-button v-if="formBind" class="rounded-lg bg-blue-500 text-gray-50 text-base flex!important text-center lg:mx-2 items-center font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                        <a @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg cursor-pointer" v-if="formBind">Cancelar</a>
                    </div>
                    <!-- BOTON DE ELIMINAR -->
                    <div @click="deleteAlert()" v-if="!newData" class="flex flex-row justify-center items-center text-sm cursor-pointer text-gray-400  order-last lg:text-base lg:order-first">
                    <svg class="w-4 h-4 mr-1 lg:w-5 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Eliminar
                    </div>
                </div>
        </form>
    </div>
    <div class="2xl:mb-4" v-else-if="!formBind && ifExists && loadData">
        <div v-for="(Language, index) in languages" :key="index" @click="edit(Language)" class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
            <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{ Language.name_language }}</h3>
            <p class="text-xs text-gray-500">Nivel: {{ Language.level }}</p>
            <div class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
            <div v-if="Language.language_certification_path_name" class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                <a class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start" target="_blank" rel="noopener noreferrer" :href="'storage/certifications/'+Language.language_certification_path_name">
                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-red-500 pr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <div class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">{{Language.language_certification_path_name}}</div>
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
export default {
    components: {JetButton, Swal },
    props: ['userProp'],
    data() {
        return {
            loadData: false,
            ifExists: false,
            formBind: false,
            newData: false,
            englishBind: false,
            certification_url: "",
            languages: [],
            language: this.$inertia.form( {
                id: "",
                cv_id: "",
                name_language: "",
                level: "",
                language_certification_path_name: "",
                language_certification_path_name_capitalized: "",
            }),
            list_languages: [
                
                    {
                    "id": 1,
                    "language": "Akan"
                    },
                    {
                    "id": 2,
                    "language": "Alemán"
                    },
                    {
                    "id": 3,
                    "language": "Amharic"
                    },
                    {
                    "id": 4,
                    "language": "Árabe"
                    },
                    {
                    "id": 5,
                    "language": "Arabe argelino"
                    },
                    {
                    "id": 6,
                    "language": "Arabe egipcio"
                    },
                    {
                    "id": 7,
                    "language": "Arabe marroquí"
                    },
                    {
                    "id": 8,
                    "language": "Arabe mesopotámico"
                    },
                    {
                    "id": 9,
                    "language": "Arabe Najdi"
                    },
                    {
                    "id": 10,
                    "language": "Arabe Saidi"
                    },
                    {
                    "id": 11,
                    "language": "Arabe sanaani"
                    },
                    {
                    "id": 12,
                    "language": "Arabe sirio"
                    },
                    {
                    "id": 13,
                    "language": "Arabe sudanés"
                    },
                    {
                    "id": 14,
                    "language": "Arabe tunecino"
                    },
                    {
                    "id": 15,
                    "language": "Assamese"
                    },
                    {
                    "id": 16,
                    "language": "Awadhi"
                    },
                    {
                    "id": 17,
                    "language": "Azerbaiyano"
                    },
                    {
                    "id": 18,
                    "language": "Azerí o Azerbaiyano"
                    },
                    {
                    "id": 19,
                    "language": "Belarusano"
                    },
                    {
                    "id": 20,
                    "language": "Bengalí"
                    },
                    {
                    "id": 21,
                    "language": "Bopurí"
                    },
                    {
                    "id": 22,
                    "language": "Búlgaro"
                    },
                    {
                    "id": 23,
                    "language": "Burmese Myanmar"
                    },
                    {
                    "id": 24,
                    "language": "Canarés o Kannada"
                    },
                    {
                    "id": 25,
                    "language": "Cebuano"
                    },
                    {
                    "id": 26,
                    "language": "Chattisgarhi"
                    },
                    {
                    "id": 27,
                    "language": "Checo"
                    },
                    {
                    "id": 28,
                    "language": "Chino Cantonés-Yue"
                    },
                    {
                    "id": 29,
                    "language": "Chino Gan"
                    },
                    {
                    "id": 30,
                    "language": "Chino Harka"
                    },
                    {
                    "id": 31,
                    "language": "Chino mandarín"
                    },
                    {
                    "id": 32,
                    "language": "Chino Min Bei"
                    },
                    {
                    "id": 33,
                    "language": "Chino Wu"
                    },
                    {
                    "id": 34,
                    "language": "Chino Xiang"
                    },
                    {
                    "id": 35,
                    "language": "Chino Yinyu"
                    },
                    {
                    "id": 36,
                    "language": "Chino Zhuang"
                    },
                    {
                    "id": 37,
                    "language": "Chittaginiano"
                    },
                    {
                    "id": 38,
                    "language": "Coreano"
                    },
                    {
                    "id": 39,
                    "language": "Deccan"
                    },
                    {
                    "id": 40,
                    "language": "Español"
                    },
                    {
                    "id": 41,
                    "language": "Farsi o Persa"
                    },
                    {
                    "id": 42,
                    "language": "Francés"
                    },
                    {
                    "id": 43,
                    "language": "Fulfulde nigeriano"
                    },
                    {
                    "id": 44,
                    "language": "Griego"
                    },
                    {
                    "id": 45,
                    "language": "Guyarati"
                    },
                    {
                    "id": 46,
                    "language": "Haitiano Criollo Francés"
                    },
                    {
                    "id": 47,
                    "language": "Haryanvi"
                    },
                    {
                    "id": 48,
                    "language": "Hausa"
                    },
                    {
                    "id": 49,
                    "language": "Hiligaynon"
                    },
                    {
                    "id": 50,
                    "language": "Hindi-Urdú"
                    },
                    {
                    "id": 51,
                    "language": "Húngaro"
                    },
                    {
                    "id": 52,
                    "language": "Igbo"
                    },
                    {
                    "id": 53,
                    "language": "Ilocano"
                    },
                    {
                    "id": 54,
                    "language": "Inglés"
                    },
                    {
                    "id": 55,
                    "language": "Italiano"
                    },
                    {
                    "id": 56,
                    "language": "Japonés"
                    },
                    {
                    "id": 57,
                    "language": "Javanés"
                    },
                    {
                    "id": 58,
                    "language": "Kazako"
                    },
                    {
                    "id": 59,
                    "language": "Khmer"
                    },
                    {
                    "id": 60,
                    "language": "Kurmanji"
                    },
                    {
                    "id": 61,
                    "language": "Lombardo"
                    },
                    {
                    "id": 62,
                    "language": "Madura"
                    },
                    {
                    "id": 63,
                    "language": "Mahahi"
                    },
                    {
                    "id": 64,
                    "language": "Maithili"
                    },
                    {
                    "id": 65,
                    "language": "Malayo"
                    },
                    {
                    "id": 66,
                    "language": "Malayo-Indonesio"
                    },
                    {
                    "id": 67,
                    "language": "Malgache"
                    },
                    {
                    "id": 68,
                    "language": "Marathi-Indoiraní"
                    },
                    {
                    "id": 69,
                    "language": "Marwari"
                    },
                    {
                    "id": 70,
                    "language": "Min Nan"
                    },
                    {
                    "id": 71,
                    "language": "Napolitano Calabres"
                    },
                    {
                    "id": 72,
                    "language": "Neerlandés"
                    },
                    {
                    "id": 73,
                    "language": "Nepalí"
                    },
                    {
                    "id": 74,
                    "language": "Oromo"
                    },
                    {
                    "id": 75,
                    "language": "Panyabi"
                    },
                    {
                    "id": 76,
                    "language": "Pashto"
                    },
                    {
                    "id": 77,
                    "language": "Polaco"
                    },
                    {
                    "id": 78,
                    "language": "Portugués"
                    },
                    {
                    "id": 79,
                    "language": "riya"
                    },
                    {
                    "id": 80,
                    "language": "Rumano"
                    },
                    {
                    "id": 81,
                    "language": "Ruso"
                    },
                    {
                    "id": 82,
                    "language": "Rwandés"
                    },
                    {
                    "id": 83,
                    "language": "Saraiki"
                    },
                    {
                    "id": 84,
                    "language": "Servo-Croata"
                    },
                    {
                    "id": 85,
                    "language": "Shona"
                    },
                    {
                    "id": 86,
                    "language": "Sindhi"
                    },
                    {
                    "id": 87,
                    "language": "Sinhala"
                    },
                    {
                    "id": 88,
                    "language": "Somalí"
                    },
                    {
                    "id": 89,
                    "language": "Sueco"
                    },
                    {
                    "id": 90,
                    "language": "Sunda"
                    },
                    {
                    "id": 91,
                    "language": "Tagalo"
                    },
                    {
                    "id": 92,
                    "language": "Tamil"
                    },
                    {
                    "id": 93,
                    "language": "Tatar"
                    },
                    {
                    "id": 94,
                    "language": "Telugu"
                    },
                    {
                    "id": 95,
                    "language": "Thai"
                    },
                    {
                    "id": 96,
                    "language": "Thai"
                    },
                    {
                    "id": 97,
                    "language": "Ucraniano"
                    },
                    {
                    "id": 98,
                    "language": "Uyghur"
                    },
                    {
                    "id": 99,
                    "language": "Uzbeko"
                    },
                    {
                    "id": 100,
                    "language": "Vietnamita"
                    },
                    {
                    "id": 101,
                    "language": "Yoruba"
                    },
                    {
                    "id": 102,
                    "language": "Zulú"
                    }
            ]
        }
    },
    methods: {
        async getCertifications() {
            await axios.get(route('cv-search', this.userProp.id))
            .then((response) => {
                this.language.cv_id = response.data[0].id;

            }).catch((error) => {
                console.log(error);
            });

            await axios.get(route('language.show', this.language.cv_id))
            .then((response) => {
                this.languages = response.data;
                this.$emit('sending-event', 'changed')
                if (response.data.length == 0) {
                    this.ifExists = false;
                    this.newData = true;
                } else {
                    this.ifExists = true;
                }

            }).catch((error) => {
                console.log(error);
                this.ifExists = false;
            });

            this.loadData = true;
        },
        capitalizeCertificationName() {
        let str = this.language.name_language;
        const arr = str.split(" ");
        for (var i = 0; i < arr.length; i++) {
            arr[i] = arr[i].charAt(0).toUpperCase() + arr[i].slice(1);
        }
        this.language.language_certification_path_name_capitalized = arr.join("");
        },
        newDataForm(){
            this.clearData();
            this.formBind = true;
            this.newData = true;
        }, 
    edit(i) {
        this.language.id = i.id;
        this.language.cv_id = i.cv_id;
        this.language.name_language = i.name_language;
        this.language.level = i.level;
        this.language.language_certification_path_name = i.language_certification_path_name;
        this.language.language_certification_path_name_capitalized = i.language_certification_path_name_capitalized;
        this.certification_url = i.language_certification_path_name;
        this.formBind = true;
        this.newData = false;

    },
    clearData(){
        this.language.name_language = "";
        this.language.level = "";
        this.language.language_certification_path_name = "";
        this.language.language_certification_path_name_capitalized = "";
        this.certification_url = "";
    },
    onFileSelected(event) {
        this.capitalizeCertificationName();
        this.language.language_certification_path_name = event.target.files[0];
        // console.log(event.target.files[0]);
    },
        submit() {
            this.capitalizeCertificationName();
            if(this.newData) {
                this.language.post(route('language.store'), { preserveScroll: true });
                Swal.fire(
                    'Exito!',
                    'El idioma fue registrado exitosamente!',
                    'success'
                    );
            } else if(!this.newData) {
                this.language.put(route('language.update', this.language.id), { preserveScroll: true });
                Swal.fire(
                    'Actualizado!',
                    'El idioma fue actualizado exitosamente!',
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
        // console.log(this.certification.id);
        this.language.delete(route('language.destroy', this.language.id), { preserveScroll: true })
        this.formBind = false;
        this.getCertifications();
    },

    },
    created() {
        this.getCertifications();
    }
};
</script>

<style>
</style>