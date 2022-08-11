<template>
<Transition>
        
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px]">
    <div class="text-2xl mx-auto font-bold text-gray-900 py-2 flex flex-wrap text-center items-center justify-center lg:justify-between lg:text-start lg:text-2xl 2xl:text-3xl">
        <h3>Preferencias Laborales</h3>
        
    </div>
    <div v-if="!formBind && !ifExists" class="flex content-end justify-around flex-col my-4 lg:my-0">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran registros acerca de las preferencias laborales, por favor ingrese los datos nuevos en el botón a continuación.</span> 
        <div class="w-auto flex justify-start lg:items-center lg:justify-center lg:py-4 lg:pt-64">
            <!-- <a href="#" @click="this.formBind = true" class="hidden lg:flex lg:text-center lg:text-white lg:text-3xl lg:font-extrabold lg:p-2 lg:rounded-full lg:bg-blue-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></a> -->
            <a href="#" @click="this.formBind = true" class="lg:hiddn flex items-center content-center justify-center text-red-500 text-lg font-semibold text-start pt-6 lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> Agregar</a></div>
    </div>
    <div v-else>
        <form @submit.prevent="submit">
            <div class="flex flex-col justify-start lg:flex-row 2xl:justify-around">
            <div class="lg:basis-1/2 grow">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Me interesa: </h3></div>
                    <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                        <label class="block text-gray-500">
                        <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight" type="checkbox" true-value="1" false-value="0" v-model="this.workPreferences.work" />
                            <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                                 Trabajo.
                            </span>
                        </label>
                    </div>
                <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                <label class="block text-gray-500">
                    <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight" type="checkbox" true-value="1" false-value="0" v-model="this.workPreferences.practices" />
                        <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                            Residencia / Práctica profesional.
                        </span>
                    </label>
                </div>
                <div class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                <label class="block text-gray-500">
                    <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight" type="checkbox" true-value="1" false-value="0" v-model="this.workPreferences.dual_education" />
                        <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                            Educación dual.
                        </span> 
                    </label>
                </div>
        	</div>
            <div class="lg:basis-1/2 grow lg:pb-3 lg:px-2">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Área de interés: </h3></div>
                <div class="flex py-0 flex-wrap items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:justify-between 2xl:gap-2 2xl:py-2">
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Área</label>
                        <select :disabled="this.ifExists && !this.formBind" v-model="this.workPreferences.area" required name="area" id="area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione</option>
                            <option value="Administración y negocios">Administración y negocios</option>
                            <option value="Ingeniería, manufactura y construcción">Ingeniería, manufactura y construcción</option>
                            <option value="Tecnologías de la información y la comunicación">Tecnologías de la información y la comunicación</option>
                        </select>
                    </div>
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo general</label>
                        <select :disabled="this.ifExists && !this.formBind" v-model="this.workPreferences.general_area" required name="general_area" id="general_area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione</option>
                            <option value="Administración y gestión">Administración y gestión</option>
                            <option value="Negocios y contabilidad">Negocios y contabilidad</option>
                            <option value="Arquitectura y construcción">Arquitectura y construcción</option>
                            <option value="Ingeniería mecánica, eléctrica, electrónica, química y profesiones afines">Ingeniería mecánica, eléctrica, electrónica, química y profesiones afines</option>
                            <option value="Implementación de las tecnologías de la información y la comunicación">Implementación de las tecnologías de la información y la comunicación</option>
                            <option value="Innovación en tecnologías de la información y la comunicación">Innovación en tecnologías de la información y la comunicación</option>
                        </select>
                    </div>
                </div>
                <div class="flex space-y-2">
                    <div class="2xl:mt-1 grow">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo específico</label>
                        <select :disabled="this.ifExists && !this.formBind" v-model="this.workPreferences.specific_area" required name="specific_area" id="specific_area" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                            <option value>Seleccione</option>
                            <option value="Administración de empresas">Administración de empresas</option>
                            <option value="Administración pública">Administración pública</option>
                            <option value="Electrónica, automatización y aplicaciones de la mecánica-eléctrica">Electrónica, automatización y aplicaciones de la mecánica-eléctrica</option>
                            <option value="Ingeniería industrial">Ingeniería industrial</option>
                            <option value="Telecomunicaciones">Telecomunicaciones</option>
                            <option value="Desarrollo de software">Desarrollo de software</option>
                        </select>
                    </div>
                </div>
        	</div>
           </div>
           <div class="flex flex-col lg:flex-row justify-start lg:justify-around">
             <div class="lg:basis-1/2 grow">
                <div class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl"><h3>Localización de vacante:</h3></div>
                <div class="flex py-2 flex-wrap justify-start gap-2 lg:justify-between lg:flex-nowrap">
                    <div class="mt-1 w-full">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Estado</label>
                        <div class="mt-1">
                            <select :disabled="this.ifExists && !this.formBind" v-model="this.workPreferences.preferred_state" required id="preferred_state" class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione un estado</option>
                                <option v-for="state in states" :key="state.id" :value="state.id">
                                    {{ state.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-1 w-full">
                        <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Ciudad</label>
                        <div class="mt-1">
                            <select :disabled="this.ifExists && !this.formBind" v-model="this.workPreferences.preferred_city" id="town" required class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                <option value>Seleccione una ciudad</option>
                                <option v-for="town in towns" :key="town.id" :value="town.id">
                                    {{ town.name }}
                                </option>
                                </select>
                        </div>
                    </div>
                </div>
        	</div>
            <div class="lg:basis-1/2 grow flex flex-col justify-center content-between">
                <div class="pt-1 text-base font-bold mx-auto text-gray-800 text-center lg:text-xl 2xl:text-2xl"><h3>¿Cambiarías de lugar de residencia?</h3></div>
                    <div class="flex flex-wrap justify-around justify-items-start my-8 lg:my-5 2xl:my--6">
                        <div class="flex items-center justify-around">
                        <input :disabled="this.ifExists && !this.formBind" id="change_city" type="radio" value="Y" name="change_city" v-model="this.workPreferences.change_city" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="change_city" class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">Si</label>
                    </div>
                    <div class="flex items-center">
                        <input :disabled="this.ifExists && !this.formBind" id="change_city" type="radio" value="N" name="change_city" v-model="this.workPreferences.change_city" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                        <label for="change_city" class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">No</label>
                    </div>
                    </div>
                </div>
           </div>
            
            <div v-if="formBind" class="flex flex-wrap justify-center items-center lg:justify-end">
                <jet-button v-if="formBind || ifExists" :disabled="workPreferences.processing" class="rounded-lg bg-blue-500 text-gray-50 text-base text-center lg:mx-2 font-semibold px-5 py-1 w-full lg:w-auto">Guardar</jet-button>
                <!-- <button v-if="formBind || ifExists" @click="submit()" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center lg:mx-2 font-semibold px-5 w-full lg:w-auto">Guardar</button> -->
                <a href="#" @click="this.formBind = false" class="flex items-center text-red-500 text-base font-semibold text-center m-2 lg:text-lg" v-if="formBind || ifExists">Cancelar</a>
            </div>
            <div v-if="!formBind && ifExists" class="flex flex-wrap justify-center items-center lg:justify-end">
                <a href="#" @click="this.formBind = true" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center lg:mx-2 font-semibold px-4 py-1 tracking-widest w-full lg:w-auto">Editar</a>
            </div>
            <Notification />
            <!-- <div v-if="$page.props.flash.message" class="text-green-500 font-semibold rounded-full border-green-800 fixed right-2 bottom-2">
            <Notification /></div> -->
        </form>
    </div>
</div>
</Transition>
</template>

<script>

import JetButton from '@/Jetstream/Button'
import Notification from '@/CustomComponents/Notification.vue'
export default {
    components: {JetButton, Notification},
    props: ['userProp'],
    data() {
        return {
            formBind: false, 
            ifExists: false,
            states: [],
            towns: [], 
            workPreferencesLocal: [],
            workPreferences: this.$inertia.form( {
                work: "",
                practices: "",
                dual_education: "",
                preferred_state: "",
                preferred_city: "",
                preferred_country: "Mexico",
                area: "",
                general_area: "",
                specific_area: "",
                change_city: "",
                type_contract: "type",
            }),
            // workPreferences: {
            //     work: true,
            //     practices: true,
            //     dual_education: false,
            //     preferred_state: "Veracruz de la llave",
            //     preferred_city: "Misantla",
            //     area: "Informatica",
            //     general_area: "Programación",
            //     specific_area: "Desarrollo web",
            //     move_city: "Yes",
            // },
        }
    },
    methods: {
        async getStates() {
            await axios
            .get("/list-states")
            .then((response) => {
                this.states = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
        },

        async getWorkPreferences() {
            await axios.get(route('workPreferences.search', this.userProp.id))
            .then((response) => {
                this.workPreferences.work = response.data[0].work;
                this.workPreferences.practices = response.data[0].practices;
                this.workPreferences.dual_education = response.data[0].dual_education;
                this.workPreferences.preferred_city = response.data[0].preferred_city;
                this.workPreferences.preferred_state = response.data[0].preferred_state;
                this.workPreferences.area = response.data[0].area;
                this.workPreferences.general_area = response.data[0].general_profile;
                this.workPreferences.specific_area = response.data[0].specific_profile;
                this.workPreferences.change_city = response.data[0].change_city;
                console.log(response.data[0]);
                this.ifExists = true;
            }).catch((error) => {
                console.log(error+' alas');
                this.ifExists = false;
            });
        },
        message() {
            console.log(this.userProp.id);
        },
        submit() {
            this.workPreferences.post(route('workPreferences.update', this.userProp.id));
            this.formBind = false;
            this.ifExists = true;
        },
    },
    created(){
         this.getStates();
         this.getWorkPreferences();
    },
    watch: {
        "workPreferences.preferred_state": function (value) {
            axios.get("/list-towns/" + value).then((response) => {
                this.towns = response.data;
            });
        }
    }
};
</script>

<style>
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}
</style>