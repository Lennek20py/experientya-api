<template>
    <div class="w-full h-auto bg-white rounded-lg border border-gray-200 shadow-m lg:w-3/5 xl:w-[35rem] xl:w-4xl">
        <div class="flex justify-end px-4 pt-4">
        </div>
        <div class="text-3xl mx-auto font-bold md:text-gray-900 text-center lg:text-4xl py-2">
            <h3>Información Básica</h3>
        </div>
        <div v-if="!isShowModal" @click="toggleModal()"
            class="flex flex-col items-center pb-10 pt-7 mx-10 md:mx-7 group hover:cursor-pointer">
            <img class="mb-3 w-32 h-32 rounded-full shadow-lg md:w-36 md:h-36"
                :src="$page.props.user.profile_photo_path.replace('profile/', 'storage/profile/')" alt="Bonnie image">
            <h5 class="mb-1 text-xl font-semibold text-gray-900 lg:text-xl text-center">
                {{$page.props.user.user_first_name}} {{$page.props.user.user_last_name}}</h5>
            <div class="flex flex-row justify-center content-center place-content-center">
                <span :class="{ 'text-red-500' : position == 'Presiona aquí para ingresar un título' }"
                    class="text-base text-center font-medium select-none text-gray-700">{{this.position}}</span>
                <svg class="min-w-fit w-5 h-5 lg:w-5 lg:h-5 p-1 text-gray-500" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </div>
            <span class="text-sm text-center font-medium text-gray-500" v-for="states in state"
                :key="states.id">{{states.town_name}}, {{states.state_name}}</span>
            <div class="flex mt-4 space-x-3 lg:mt-6 items-center">
                <a href="#"
                    class="inline-flex items-center py-2 text-sm font-medium text-center text-gray-600 bg-white rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-20"><svg
                        class="w-6 h-6 items-center text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z">
                        </path>
                    </svg> Previsualizar CV</a>
            </div>
        </div>
        <div v-if="isShowModal" class="relative bottom-10 px-1 pb-4 inset-0 flex items-center justify-center">
            <div class="fixed inset-0 transition-opacity">
                <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="z-10 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-7xl sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="bg-white px-4 pt-2 pb-4 sm:p-5 sm:pb-5 flex-col flex">
                    <div class="sm:flex w-full sm:items-start">
                        <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left overflow-auto ...">
                            <div class="flex text-center flex-col justify-center items-center mb-4 w-full">
                                <!-- TÍTULO -->
                                <div
                                    class="flex flex-row px-1 py-2 pt-0 justify-between w-full items-center content-center">
                                    <button type="button" class="invisible">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </button>
                                    <h3 class="uppercase  text-lg text-center leading-6 font-bold text-gray-900"
                                        id="modal-headline">
                                        Campo de profesión
                                    </h3>
                                    <button @click="toggleModal()" type="button" class="justify-self-end">
                                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- INSTRUCCIONES -->
                                <p
                                    class="text-xs select-none text-gray-500 text-justify border-b-2 lg:mx-10 lg:text-base">

                                </p>
                                <div class="mb-1 grow">
                                    <label for="study_certificate" class="text-xs text-gray-800 font-medium">Ingrese el
                                        título del
                                        puesto / profesión que desea aplicar:</label>
                                    <input type="text" v-on:keyup.enter="savePosition()" v-model="this.position"
                                        required autocomplete="off" placeholder="Ingrese el título de la carrera"
                                        name="job" id="job"
                                        class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                </div>

                                <button @click="savePosition()" type="button"
                                    class="inline-flex justify-center font-bold w-fit rounded-md select-none border border-gray-300 px-4 py-2 my-2 bg-blue-600 text-base leading-6 text-white shadow-sm hover:text-gray-2000 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    GUARDAR
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import BaseModal from '@/CustomComponents/Modal.vue';
import axios from 'axios';
import Swal from 'sweetalert2';
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/UserLayout.vue";
import route from '../../../../../vendor/tightenco/ziggy/src/js';
export default {
    props: ['userProp'],
    components: { AppLayout, Swal },
    data: function () {
        return {
            state: {},
            isShowModal: false,
            position: ""
        }
    },
    methods: {
        async getTownInfo() {
            await axios.get("town/" + this.userProp.user_city_id)
                .then((response) => {
                    this.state = response.data;
                }).catch((error) => {
                    console.log(error);
                });
        },
        async getTittle() {
            await axios.get(route('user.position.index', this.userProp.id))
                .then((response) => {
                    this.position = response.data[0].position
                    this.position == null ? this.position = "Presiona aquí para ingresar un título" : this.position = this.position
                }).catch((error) => {
                    console.log(error)
                })
        },
        async savePosition() {
            let data = {}
            data.position = this.position
            await axios.put(route('user.position.update', this.userProp.id), data)
                .then((response) => {
                    Swal.fire(
                        'Actualizado!',
                        'El registro fue actualizado exitosamente!',
                        'success'
                    );
                    this.getTittle()
                    this.toggleModal()

                }).catch((error) => {
                    console.log(error)
                })
        },
        toggleModal() {
            this.isShowModal = !this.isShowModal;
        }
    },
    created() {
        this.getTownInfo();
        this.getTittle()
    }
};
</script>

<style>

</style>