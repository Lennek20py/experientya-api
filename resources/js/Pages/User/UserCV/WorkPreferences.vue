<template>
    <Transition>

        <div
            class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
            <div
                class="text-2xl mx-auto font-bold text-gray-900 py-2 flex flex-wrap text-center items-center justify-center lg:justify-between lg:text-start lg:text-2xl 2xl:text-3xl">
                <h3>Preferencias Laborales</h3>

            </div>
            <div v-if="!formBind && !ifExists" class="flex content-end justify-around flex-col my-4 lg:my-0">
                <span class="w-full text-sm font-light text-gray-500 mx-auto text-justify">Aún no se encuentran
                    registros acerca de las preferencias laborales, por favor ingrese los datos nuevos en el botón a
                    continuación.</span>
                <div class="w-auto flex justify-start cursor-pointer lg:items-center lg:justify-center lg:py-4 lg:pt-64">
                    <!-- <a href="#" @click="this.formBind = true" class="hidden lg:flex lg:text-center lg:text-white lg:text-3xl lg:font-extrabold lg:p-2 lg:rounded-full lg:bg-blue-500"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg></a> -->
                    <a @click="this.formBind = true"
                        class="lg:hiddn flex items-center content-center justify-center text-red-500 text-lg font-semibold text-start pt-6 lg:rounded-full lg:bg-red-500 lg:text-gray-50 lg:px-4 lg:py-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg> Agregar</a>
                </div>
            </div>

            <!-- FORMULARIO PARA INGRESAR LA INFO / MODIFICARLA -->
            <div v-else>
                <form @submit.prevent="submit">
                    <div class="flex flex-col justify-start lg:flex-row 2xl:justify-around">
                        <div class="lg:basis-1/2 grow">
                            <div
                                class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl">
                                <h3>Me interesa: </h3>
                            </div>
                            <div v-if="formBind" class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                                <label class="block text-gray-500">
                                    <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight"
                                        type="checkbox" true-value="1" false-value="0"
                                        v-model="this.workPreferences.work" />
                                    <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                                        Trabajo.
                                    </span>
                                </label>
                            </div>
                            <div v-if="formBind" class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                                <label class="block text-gray-500">
                                    <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight"
                                        type="checkbox" true-value="1" false-value="0"
                                        v-model="this.workPreferences.practices" />
                                    <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                                        Residencia / Práctica profesional.
                                    </span>
                                </label>
                            </div>
                            <div v-if="formBind" class="my-1 md:flex md:items-center lg:py-1 lg:my-2">
                                <label class="block text-gray-500">
                                    <input :disabled="this.ifExists && !this.formBind" class="mr-2 leading-tight"
                                        type="checkbox" true-value="1" false-value="0"
                                        v-model="this.workPreferences.dual_education" />
                                    <span class="text-xs font-medium text-slate-700 lg:text-sm 2xl:text-base">
                                        Educación dual.
                                    </span>
                                </label>
                            </div>


                            <!-- ME INTERESA INFO  -->
                            <div v-if="!formBind && this.workPreferences.work == '1'"
                                class="my-1 md:flex md:items-center lg:py-1 lg:my-2 flex flex-nowrap justify-start items-center py-2 transition">
                                <label class="flex flex-row  items-center text-gray-500">
                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-xs font-medium w-auto leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                        Trabajo.
                                    </span>
                                </label>
                            </div>
                            <div v-if="!formBind && this.workPreferences.practices == '1'"
                                class="my-1 md:flex md:items-center lg:py-1 lg:my-2 flex flex-nowrap justify-start items-center py-2 transition">
                                <label class="flex flex-row  items-center text-gray-500">
                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-xs font-medium w-auto leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                        Residencia / Práctica profesional.
                                    </span>
                                </label>
                            </div>
                            <div v-if="!formBind && this.workPreferences.dual_education == '1'"
                                class="my-1 md:flex md:items-center lg:py-1 lg:my-2 flex flex-nowrap justify-start items-center py-2 transition">
                                <label class="flex flex-row  items-center text-gray-500">
                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                        </path>
                                    </svg>
                                    <span
                                        class="text-xs font-medium w-auto leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                        Educación dual.
                                    </span>
                                </label>
                            </div>
                            <!-- AREA DE INTERES FORMULARIO -->
                        </div>
                        <div class="lg:basis-1/2 shrink lg:pb-3 lg:px-2">
                            <div
                                class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl">
                                <h3>Área de interés: </h3>
                            </div>
                            <div v-if="formBind"
                                class="flex py-0 flex-wrap items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:basis-1/2 lg:justify-between 2xl:gap-2 2xl:py-2">
                                <div class="2xl:mt-1 shrink">
                                    <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Área</label>
                                    <select :disabled="this.ifExists && !this.formBind" @change="fetchGenerals"
                                        v-model="this.workPreferences.area" required name="area" id="area"
                                        class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                        <option value>Seleccione</option>
                                        <option v-for="area in areas" :key="area.id" :value="area.id">
                                            {{ area.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="2xl:mt-1 shrink">
                                    <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo
                                        general</label>
                                    <select :disabled="this.ifExists && !this.formBind" @change="fetchSpecifics"
                                        v-model="this.workPreferences.general_area" required name="general_area"
                                        id="general_area"
                                        class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                        <option value>Seleccione</option>
                                        <option v-for="general in generals" :key="general.id" :value="general.id">
                                            {{ general.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div v-if="formBind" class="flex space-y-2">
                                <div class="2xl:mt-1 grow">
                                    <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Campo
                                        específico</label>
                                    <select :disabled="this.ifExists && !this.formBind"
                                        v-model="this.workPreferences.specific_area" required name="specific_area"
                                        id="specific_area"
                                        class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                        <option value>Seleccione</option>
                                        <option v-for="specific in specifics" :key="specific.id" :value="specific.id">
                                            {{ specific.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- AREA DE INTERES INFO -->
                            <div v-if="!formBind"
                                class="flex py-0 flex-col items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:basis-1/2 lg:justify-between 2xl:gap-2 2xl:py-2">
                                <div class="2xl:mt-1 shrink flex flex-col w-full border-b border-gray-400 pb-1">
                                    <label for=""
                                        class="text-sm font-bold items-center justify-center text-gray-800 lg:text-sm 2xl:text-base">Área</label>
                                    <label for="" class="flex flex-row items-center py-1 ">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                            {{areas[this.workPreferences.area-1].name}}
                                        </span>
                                    </label>
                                </div>
                                <div class="2xl:mt-1 shrink flex flex-col w-full border-b border-gray-400 pb-1">
                                    <label for=""
                                        class="text-sm font-bold justify-center text-gray-800 lg:text-sm 2xl:text-base">Campo
                                        General</label>
                                    <label for="" class="flex flex-row items-center py-1">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                            {{generalsAll[this.workPreferences.general_area-1].name}}
                                        </span>
                                    </label>
                                </div>
                                <div class="2xl:mt-1 shrink flex flex-col w-full border-b border-gray-400 pb-1">
                                    <label for=""
                                        class="text-sm font-bold items-center justify-center text-gray-800 lg:text-sm 2xl:text-base">Campo
                                        Específico</label>
                                    <label for="" class="flex flex-row items-center py-1">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1 flex-no-shrink"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                            </path>
                                        </svg>
                                        <span
                                            class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                            {{specificsAll[this.workPreferences.specific_area-1].name}}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LOCALIZACION DE VACANTE FORM -->
                    <div class="flex flex-col lg:flex-row justify-start lg:justify-around">
                        <div class="lg:basis-1/2 grow">
                            <div
                                class="pt-1 text-base mx-auto font-bold text-gray-800 text-start lg:text-xl 2xl:text-2xl">
                                <h3>Localización de vacante:</h3>
                            </div>
                            <div v-if="formBind"
                                class="flex py-2 flex-wrap justify-start gap-2 lg:justify-between lg:flex-nowrap">
                                <div class="mt-1 w-full">
                                    <label for="" class="text-xs text-gray-800 lg:text-sm 2xl:text-base">Estado</label>
                                    <div class="mt-1">
                                        <select :disabled="this.ifExists && !this.formBind"
                                            v-model="this.workPreferences.preferred_state" required id="preferred_state"
                                            class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
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
                                        <select :disabled="this.ifExists && !this.formBind"
                                            v-model="this.workPreferences.preferred_city" id="town" required
                                            class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                                            <option value>Seleccione una ciudad</option>
                                            <option v-for="town in towns" :key="town.id" :value="town.id">
                                                {{ town.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- LOCALIZACION DE VACANTE INFO -->
                            <div v-if="!formBind"
                                class="flex py-0 flex-col items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:basis-1/2 lg:justify-between 2xl:gap-2 2xl:py-2">
                                <div class="2xl:mt-1 shrink flex flex-col w-full pt-2">
                                    <label for=""
                                        class="text-sm font-bold items-center justify-center text-gray-800 lg:text-sm 2xl:text-base">Estado
                                        y Ciudad</label>
                                    <label for="" class="flex flex-row items-center py-1 ">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                            </path>
                                        </svg>
                                        <span v-for="stados in state" :key="stados.id"
                                            class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                            {{stados.town_name}}, {{stados.state_name}}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="lg:basis-1/2 grow flex flex-col justify-center content-between">
                            <div
                                class="pt-1 text-base font-bold mx-auto text-gray-800 text-center lg:text-xl 2xl:text-2xl">
                                <h3>¿Cambiarías de lugar de residencia?</h3>
                            </div>
                            <div class="flex flex-wrap justify-around justify-items-start my-8 lg:my-5 2xl:my--6">
                                <div class="flex items-center justify-around">
                                    <input :disabled="this.ifExists && !this.formBind" id="change_city" type="radio"
                                        value="Y" name="change_city" v-model="this.workPreferences.change_city"
                                        class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                                    <label for="change_city"
                                        class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">Si</label>
                                </div>
                                <div class="flex items-center">
                                    <input :disabled="this.ifExists && !this.formBind" id="change_city" type="radio"
                                        value="N" name="change_city" v-model="this.workPreferences.change_city"
                                        class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 focus:ring-blue-500">
                                    <label for="change_city"
                                        class="ml-2 text-sm font-medium text-gray-900 2xl:text-xl">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="formBind" class="flex flex-wrap justify-center items-center lg:justify-end">
                        <jet-button v-if="formBind || ifExists" :disabled="workPreferences.processing"
                            class="rounded-lg bg-blue-500 text-gray-50 text-base text-center lg:mx-2 font-semibold px-5 py-1 w-full lg:w-auto">
                            Guardar</jet-button>
                        <!-- <button v-if="formBind || ifExists" @click="submit()" class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center lg:mx-2 font-semibold px-5 w-full lg:w-auto">Guardar</button> -->
                        <a @click="this.formBind = false"
                            class="flex items-center text-red-500 text-base font-semibold cursor-pointer text-center m-2 lg:text-lg"
                            v-if="formBind || ifExists">Cancelar</a>
                    </div>
                    <div v-if="!formBind && ifExists" class="flex flex-wrap justify-center items-center lg:justify-end">
                        <a @click="this.formBind = true"
                            class="rounded-lg bg-blue-500 text-gray-50 text-lg text-center cursor-pointer lg:mx-2 font-semibold px-4 py-1 tracking-widest w-full lg:w-auto">Editar</a>
                    </div>

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
import axios from 'axios';
import Swal from 'sweetalert2';
import { tsThisType } from '@babel/types';
export default {
    components: { JetButton, Notification, Swal },
    props: ['userProp'],
    data() {
        return {
            formBind: false,
            ifExists: false,
            state: {},
            states: [],
            towns: [],
            areas: [],
            generals: [],
            generalsAll: [],
            specifics: [],
            specificsAll: [],
            workPreferencesLocal: [],
            workPreferences: this.$inertia.form({
                work: "0",
                practices: "0",
                dual_education: "0",
                preferred_state: "",
                preferred_city: "",
                preferred_country: "Mexico",
                area: "",
                general_area: "",
                specific_area: "",
                change_city: "",
                type_contract: "type",
            }),
        }
    },
    methods: {
        async getWorkPreferences() {
            await axios.get(route('workPreferences.search', this.userProp.id))
                .then((response) => {
                    this.workPreferences.work = response.data[0].work == null ? "0" : response.data[0].work;
                    this.workPreferences.practices = response.data[0].practices == null ? "0" : response.data[0].practices;
                    this.workPreferences.dual_education = response.data[0].dual_education == null ? "0" : response.data[0].dual_education;
                    this.workPreferences.preferred_city = response.data[0].preferred_city;
                    this.workPreferences.preferred_state = response.data[0].preferred_state;
                    this.workPreferences.area = response.data[0].area;
                    this.workPreferences.general_area = response.data[0].general_profile;
                    this.workPreferences.specific_area = response.data[0].specific_profile;
                    this.workPreferences.change_city = response.data[0].change_city;
                    this.ifExists = true;
                    this.fetchGenerals();
                    this.fetchSpecifics();
                    this.getTownInfo();
                }).catch((error) => {
                    console.log(error);
                    this.ifExists = false;
                });
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
        async getAreas() {
            await axios
                .get("/anuies-areas")
                .then((response) => {
                    this.areas = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async getGeneralsAll() {
            await axios
                .get("/anuies-generals")
                .then((response) => {
                    this.generalsAll = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        async getSpecificsAll() {
            await axios
                .get("/anuies-specifics")
                .then((response) => {
                    this.specificsAll = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async fetchGenerals() {
            await axios.get("/anuies-generals/" + this.workPreferences.area)
                .then((response) => {
                    this.generals = response.data;
                });
        },
        async fetchSpecifics() {
            await axios.get("/anuies-specifics/" + this.workPreferences.general_area)
                .then((response) => {
                    this.specifics = response.data;
                });
        },
        async getTownInfo() {
            await axios.get("town/" + this.workPreferences.preferred_city)
                .then((response) => {
                    this.state = response.data;
                }).catch((error) => {
                    console.log(error);
                });
        },

        message() {
            // console.log(this.userProp.id);
        },
        submit() {
            this.workPreferences.post(route('workPreferences.update', this.userProp.id), { preserveScroll: true });
            Swal.fire(
                'Actualizado!',
                'El registro fue actualizado exitosamente!',
                'success'
            );
            this.formBind = false;
            this.ifExists = true;
            this.getTownInfo();
            this.$emit('sending-event', 'changed')
        },
    },
    created() {
        this.getAreas();
        this.getGeneralsAll();
        this.getSpecificsAll();
        this.getStates();
        this.getWorkPreferences();
    },
    mounted() {

    },
    watch: {
        "workPreferences.preferred_state": function (value) {
            axios.get("/list-towns/" + value).then((response) => {
                this.towns = response.data;
            });
        },
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