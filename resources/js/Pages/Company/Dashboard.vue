<template>
    <admin-layout :viewSelect="'navHome'">
        <main class="flex-1 pb-8">
            <button
                class="rounded-full bg-lime-500 p-2 px-4 ml-6 mt-4"
                @click="chatStuden"
            >
                Chat con user id 15
            </button>

            <button
                class="rounded-full bg-teal-500 p-2 px-4 ml-6 mt-4"
                @click="chats()"
            >
                Chats
            </button>

            <div class="py-6">
                <div class="max-w-7xl px-4 sm:px-6 md:px-8">
                    <form class="flex items-center" @submit.prevent="submit">
                        <button
                            @click="acting = true"
                            type="button"
                            class="mr-2 inline-flex items-center rounded-md border border-transparent bg-purple-500 px-3 py-3 text-sm font-medium leading-4 text-white shadow-sm hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                        >
                            <!-- Heroicon name: mini/envelope -->
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="-ml-0.5 mr-2 h-4 w-4"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z"
                                />
                            </svg>
                            Filtros
                        </button>
                        <label for="simple-search" class="sr-only"
                            >Buscar . . .</label
                        >

                        <div class="relative w-full">
                            <input
                                v-model="form.search"
                                type="text"
                                id="simple-search"
                                class="bg-slate-50-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder=""
                            />
                        </div>
                        <button
                            type="submit"
                            class="ml-2 inline-flex items-center rounded-md border border-transparent bg-blue-500 px-3 py-3 text-sm font-medium leading-4 text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            <!-- Heroicon name: mini/envelope -->
                            <svg
                                aria-hidden="true"
                                class="-ml-0.5 mr-2 h-4 w-4"
                                fill="currentColor"
                                viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                            Buscar
                        </button>
                    </form>
                    <!-- <p class="text-sm">{{users}}</p>-->
                    <!-- <p class="text-sm">{{form}}</p> -->
                    <!-- Replace with your content -->
                    <div class="py-4 mt-2">
                        <div class="min-h-full">
                            <ul
                                role="list"
                                class="grid grid-cols-1 gap-6"
                                v-for="user in users"
                                :key="user.id"
                            >
                                <Applicant :user="user" />
                                <!-- More people... -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <JetModal maxWidth="4xl" :show="acting" @close="acting = null">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="bg-white shadow sm:rounded-lg">
                    <form class="px-4 py-5 sm:p-6">
                        <h3
                            class="mb-6 text-2xl leading-6 font-bold text-gray-900"
                        >
                            Filtros
                        </h3>
                        <div class="mt-2 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">
                                Area de Trabajo dsdsa:
                            </h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="type_of_contract"
                                        class="block text-sm font-medium text-gray-700"
                                        >Area</label
                                    >
                                    <select
                                        v-model="form.area_id"
                                        id="town"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                                    >
                                        <option value="">
                                            Seleccione un area
                                        </option>
                                        <option
                                            v-for="area in anuies_area"
                                            :key="area.id"
                                            :value="area.id"
                                        >
                                            {{ area.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="type_of_contract"
                                        class="block text-sm font-medium text-gray-700"
                                        >Area general</label
                                    >
                                    <select
                                        v-model="form.general_id"
                                        id="town"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                                    >
                                        <option value="">
                                            Seleccione un area general
                                        </option>
                                        <option
                                            v-for="general in anuies_general"
                                            :key="general.id"
                                            :value="general.id"
                                        >
                                            {{ general.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="type_of_contract"
                                        class="block text-sm font-medium text-gray-700"
                                        >Area específica</label
                                    >
                                    <select
                                        v-model="form.specific_id"
                                        id="town"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                                    >
                                        <option value="">
                                            Seleccione un area específica
                                        </option>
                                        <option
                                            v-for="specific in anuies_specific"
                                            :key="specific.id"
                                            :value="specific.id"
                                        >
                                            {{ specific.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-7 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">
                                Ubicación:
                            </h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label
                                        for="type_of_contract"
                                        class="block text-sm font-medium text-gray-700"
                                        >Estado</label
                                    >
                                    <select
                                        v-model="form.state_id"
                                        id="state"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                                    >
                                        <option value="">
                                            Seleccione un estado
                                        </option>
                                        <option
                                            v-for="state in states"
                                            :key="state.id"
                                            :value="state.id"
                                        >
                                            {{ state.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-12 lg:col-span-3 mt-1">
                                    <label
                                        for="type_of_contract"
                                        class="block text-sm font-medium text-gray-700"
                                        >Ciudad o Municipio</label
                                    >
                                    <select
                                        v-model="form.town_id"
                                        id="town"
                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md"
                                    >
                                        <option value="">
                                            Seleccione un municipio
                                        </option>
                                        <option
                                            v-for="town in towns"
                                            :key="town.id"
                                            :value="town.id"
                                        >
                                            {{ town.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-7 text-sm text-gray-500">
                            <h3 class="text-lg leading-6 text-gray-800 mb-2">
                                Preferencias Laborales:
                            </h3>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 lg:col-span-4 mt-1">
                                    <label
                                        for="type_job"
                                        class="block text-sm font-medium text-gray-700 mb-3"
                                        >Tipo de Trabajo</label
                                    >
                                    <div class="flex">
                                        <div class="flex items-center mr-4">
                                            <input
                                                id="inline-checkbox"
                                                type="checkbox"
                                                v-model="form.work"
                                                true-value="1"
                                                :false-value="null"
                                                class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            />
                                            <label
                                                for="inline-checkbox"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                >Empleo</label
                                            >
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input
                                                id="inline-2-checkbox"
                                                type="checkbox"
                                                v-model="form.practices"
                                                true-value="1"
                                                :false-value="null"
                                                class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            />
                                            <label
                                                for="inline-2-checkbox"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                >Residencia / Práctica
                                                profesional</label
                                            >
                                        </div>
                                        <div class="flex items-center mr-4">
                                            <input
                                                checked
                                                id="inline-checked-checkbox"
                                                type="checkbox"
                                                v-model="form.dual_education"
                                                true-value="1"
                                                :false-value="null"
                                                class="w-4 h-4 text-purple-600 bg-gray-100 rounded border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            />
                                            <label
                                                for="inline-checked-checkbox"
                                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                >Educación Dual</label
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="range"
                                        class="block text-sm font-medium text-gray-700 mb-3"
                                        >Cambio de residencia</label
                                    >
                                    <div
                                        class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
                                    >
                                        <div class="flex items-center">
                                            <input
                                                v-model="form.change_address"
                                                id="payment_type_1"
                                                type="radio"
                                                value="Y"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="payment_type_1"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                Si
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                v-model="form.change_address"
                                                id="payment_type_2"
                                                type="radio"
                                                value="N"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="payment_type_2"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="range"
                                        class="block text-sm font-medium text-gray-700 mb-3"
                                        >¿Que cuente con experiencia?</label
                                    >
                                    <div
                                        class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
                                    >
                                        <div class="flex items-center">
                                            <input
                                                v-model="form.experiences"
                                                id="experience_1"
                                                type="radio"
                                                value="Y"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="experience_1"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                Si
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                v-model="form.experiences"
                                                id="experience_2"
                                                type="radio"
                                                value="N"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="experience_2"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="range"
                                        class="block text-sm font-medium text-gray-700 mb-3"
                                        >¿Que cuente con certificaciones?</label
                                    >
                                    <div
                                        class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
                                    >
                                        <div class="flex items-center">
                                            <input
                                                v-model="form.certifications"
                                                id="certifications_1"
                                                type="radio"
                                                value="Y"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="certifications_1"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                Si
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                v-model="form.certifications"
                                                id="certifications_2"
                                                type="radio"
                                                value="N"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="certifications_2"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-2 mt-1">
                                    <label
                                        for="range"
                                        class="block text-sm font-medium text-gray-700 mb-3"
                                        >¿Que hable otro idioma?</label
                                    >
                                    <div
                                        class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10"
                                    >
                                        <div class="flex items-center">
                                            <input
                                                v-model="form.lenguages"
                                                id="lenguages_1"
                                                type="radio"
                                                value="Y"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="lenguages_1"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                Si
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input
                                                v-model="form.lenguages"
                                                id="lenguages_2"
                                                type="radio"
                                                value="N"
                                                class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300"
                                            />
                                            <label
                                                for="lenguages_2"
                                                class="ml-3 block text-sm font-medium text-gray-700"
                                            >
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-5">
                            <button
                                type="button"
                                @click="acting = null"
                                class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            >
                                Cerrar
                            </button>
                            <button
                                type="button"
                                @click="clear()"
                                class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="-ml-0.5 mr-2 h-4 w-4 text-white"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99"
                                    />
                                </svg>
                                Limpiar
                            </button>
                            <button
                                type="button"
                                @click="
                                    submit();
                                    acting = null;
                                "
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            >
                                <!-- Heroicon name: mini/envelope -->
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="-ml-0.5 mr-2 h-4 w-4 text-white"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z"
                                    />
                                </svg>
                                Aplicar
                            </button>
                        </div>
                    </form>
                </div>
            </JetModal>
        </main>
    </admin-layout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from "@/Layouts/CompanyLayout";
import JetModal from "@/Jetstream/Modal";
import Applicant from "@/Components/Company/ApplicantCard";
import axios from "axios";
import { Inertia } from "@inertiajs/inertia";

import { defineComponent } from "vue";

export default defineComponent({
    components: {
        Link,
        AdminLayout,
        JetModal,
        Applicant,
    },
    props: {
        users: Array,
        offers: Object,
    },
    data() {
        return {
            acting: false,
            states: [],
            towns: [],
            anuies_area: [],
            anuies_general: [],
            anuies_specific: [],
            form: this.$inertia.form({
                search: "",
                state_id: "",
                town_id: "",
                type_job: "",
                area_id: "",
                general_id: "",
                specific_id: "",
                change_address: "",
                work: null,
                practices: null,
                dual_education: null,
                certifications: null,
                lenguages: null,
                experiences: null,
            }),
        };
    },
    methods: {
        logout() {
            this.$inertia.post(route("admin.logout"));
        },
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
        async getAnuiesAreas() {
            await axios
                .get("/anuies-areas")
                .then((response) => {
                    this.anuies_area = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        submit() {
            (this.acting = false),
                this.form.submit("get", route("company.index"), {
                    preserveState: true,
                    replace: true,
                });
        },
        clear() {
            this.form.state_id = "";
            this.form.town_id = "";
            this.form.change_address = null;
            this.form.type_job = null;
            this.form.work = null;
            this.form.practices = null;
            this.form.dual_education = null;
            this.form.area_id = "";
            this.form.general_id = "";
            this.form.specific_id = "";
            this.form.certifications = null;
            this.form.lenguages = null;
            this.form.experience = null;
        },
        async chatStuden() {
            console.log(this.props);
            await axios
                .post("/company/chat/with-student", {
                    id_company: 1,
                    id_student: 15,
                })
                .then((response) => {
                    this.$inertia.visit("/company/chat/view", {
                        datos: response.data,
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        chats() {
            this.$inertia.visit("/company/chat/view");
        },
    },
    created() {
        this.getStates();
        this.getAnuiesAreas();
    },
    watch: {
        "form.state_id": function (value) {
            axios.get("/list-towns/" + value).then((response) => {
                this.towns = response.data;
            });
        },
        "form.area_id": function (value) {
            this.form.anuies_specific_id = "";
            axios.get("/anuies-generals/" + value).then((response) => {
                this.anuies_general = response.data;
            });
        },
        "form.general_id": function (value) {
            axios.get("/anuies-specifics/" + value).then((response) => {
                this.anuies_specific = response.data;
            });
        },
        "form.work": function (value) {
            this.form.practices = null;
            this.form.dual_education = null;
            this.form.work = 1;
        },
        "form.practices": function (value) {
            this.form.work = null;
            this.form.dual_education = null;
            this.form.practices = 1;
        },
        "form.dual_education": function (value) {
            this.form.work = null;
            this.form.practices = null;
            this.form.dual_education = 1;
        },
    },
});
</script>
