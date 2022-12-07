<template>
    <!-- TITULO DE TARJETA -->
    <div ref="MondaPelua"
        class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
        <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
            <h3>Skills</h3>
        </div>
        <div v-if="!loadData" role="status" class="max-w-sm animate-pulse pb-5 lg:pb-0">
            <div class="h-2.5 bg-gray-200 rounded-full w-48 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[230px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[150px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-2.5"></div>
            <span class="sr-only">Loading...</span>
        </div>
        <!-- VISTA EN CASO DE QUE NO EXISTAN REGISTROS -->
        <div v-if="!formBind && !ifExists && loadData" class="flex content-end justify-around flex-col my-4">
            <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify">Aún no se encuentran
                registros acerca de los idiomas, por favor ingrese los datos nuevos en el link a continuación.</span>
            <a class="flex items-center text-red-500 text-lg font-semibold text-start pt-6 cursor-pointer"><svg
                    class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> Agregar</a>
        </div>
        <!-- VISTA PARA CREAR UN NUEVO REGISTRO / MODIFICAR REGISTRO -->
        <div class="2xl:mb-4" v-else-if="!formBind && ifExists && loadData">
            <span class="w-full text-xs lg:text-sm font-light text-gray-500 mx-auto leading-none text-justify">Ingrese
                las skills o habilidades que posea en el botón gris de "Nuevo Skill", el límite de skills es de 10.
                Actualmente tiene <span class="font-bold"
                    :class="[skills.length < 10 && skills.length > 7 ? 'text-red-700' : '', skills.length <= 7 && skills.length >= 5 ? 'text-yellow-500' : '', skills.length <= 4 && skills.length >= 0 ? 'text-green-500' : '']">{{
                            10
                            - skills.length
                    }} restante/s.</span>
            </span>

            <div
                class="flex flex-row flex-wrap gap-x-4 gap-y-2 py-4 justify-start content-center place-content-center lg:justify-start lg:gap-x-2 lg:gap-y-2">
                <span v-for="(data, index) in skills" :key="index" id="badge-dismiss-pink"
                    class="inline-flex items-center py-1 px-2 mr-2 text-sm font-medium rounded"
                    :class="setColor(index)">
                    {{ data.skill }}
                    <button type="button" @click="deleteAlert(data.id)"
                        class="inline-flex items-center p-0.5 ml-2 text-sm text-gray-700 bg-transparent rounded-sm "
                        data-dismiss-target="#badge-dismiss-pink" aria-label="Remove">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Remove badge</span>
                    </button>
                </span>

                <!-- Agregar nueva Skill -->
                <form @submit.prevent="submit" v-if="!fullData">
                    <span id="badge-dismiss-dark"
                        class="inline-flex cursor-pointer items-center py-1 px-2 mr-2 text-sm font-medium text-gray-800 bg-gray-100 rounded dark:bg-gray-200 dark:text-gray-800">
                        <div class="relative">
                            <input type="text" id="floating_outlined" v-model="skill.skill" required
                                class="block cursor-pointer px-1 py-1 w-full text-sm text-gray-700 bg-transparent rounded-lg border-transparent focus:border-transparent appearance-none focus:outline-none focus:ring-0 peer"
                                placeholder=" " />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-800 duration-300 transform -translate-y-5 scale-75 top-2 z-5 origin-[0] bg-transparent px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-5 left-1">Nuevo
                                Skill</label>
                        </div>
                        <button type="button" @click="submit"
                            class="inline-flex items-center p-0.5 ml-2 text-sm text-gray-400 bg-transparent rounded-sm hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-300 dark:hover:text-gray-900"
                            aria-label="Save">
                            <svg class="w-4 h-4" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="sr-only">New Skill</span>
                        </button>
                    </span>
                </form>
            </div>
        </div>

    </div>
</template>
    
<script>
import JetButton from '@/Jetstream/Button';
import axios from 'axios';
import Swal from 'sweetalert2';
import route from '../../../../../vendor/tightenco/ziggy/src/js';
export default {
    components: { JetButton, Swal },
    props: ['userProp'],
    data() {
        return {
            loadData: false,
            ifExists: false,
            formBind: false,
            newData: false,
            fullData: false,
            skill: this.$inertia.form({
                cv_id: "",
                skill: ""
            }),
            skills: [],
            colors: [{
                color: "bg-blue-100 text-blue-800"
            },
            {
                color: "bg-red-100 text-red-800"
            },
            {
                color: "bg-green-100 text-green-800"
            },
            {
                color: "bg-yellow-100 text-yellow-800"
            },
            {
                color: "bg-indigo-100 text-indigo-800"
            },
            {
                color: "bg-purple-100 text-purple-800"
            },
            {
                color: "bg-pink-100 text-pink-800"
            },
            {
                color: "bg-blue-100 text-blue-800"
            },
            {
                color: "bg-green-100 text-green-800"
            },
            {
                color: "bg-indigo-100 text-indigo-800"
            }
            ],
            colorsExtended: []
        }
    },
    methods: {
        async getSkills() {
            await axios.get(route('cv-search', this.userProp.id))
                .then((response) => {
                    this.skill.cv_id = response.data[0].id;
                    this.$emit('sending-event', 'changed')
                }).catch((error) => {
                    console.log(error)
                })

            await axios.get(route('user.skills.index', this.skill.cv_id))
                .then((response) => {
                    this.loadData = true
                    this.ifExists = true
                    this.skills = response.data;
                    this.skills.length < 10 ? this.fullData = false : this.fullData = true
                })
        },
        submit() {
            if (this.skill.skill == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Ingresa un Skill válido.',
                })
            } else {
                this.skill.post(route('userSkill.store'), { preserveScroll: true });
                Swal.fire(
                    'Exito!',
                    'El idioma fue registrado exitosamente!',
                    'success'
                );
                this.skill.skill = ""
                this.getSkills()
            }
        },
        deleteAlert(id) {
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
                    this.deleteData(id);
                    this.getSkills()
                }
            })
        },
        deleteData(id) {
            this.skill.delete(route('userSkill.destroy', id), { preserveScroll: true })
        },
        setColor(id) {
            return this.colors[id].color
        }

    },
    created() {
        this.getSkills()
    },
    computed: {
    }
};
</script>
    
<style>

</style>