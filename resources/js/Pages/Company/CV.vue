<template>
    <admin-layout>
        <main class="flex-1 pb-8">
            <nav class="shadow hidden border-b border-gray-200 bg-white lg:flex" aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
                    <li class="flex">
                        <div class="flex items-center">
                            <Link :href="route('company.index')" class="text-gray-400 hover:text-gray-500">
                            <!-- Heroicon name: mini/home -->
                            <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Home</span>
                            </Link>
                        </div>
                    </li>

                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="h-full w-6 flex-shrink-0 text-gray-200" preserveAspectRatio="none"
                                viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">CV</a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="py-6">
                <div class="max-w-7xl px-4 sm:px-6 md:px-8">
                    <!-- <p class="text-sm">{{user}}</p> -->
                    <!-- <p class="text-sm">{{form}}</p> -->
                    <!-- Replace with your content -->
                    <div class="py-4 mt-2">
                        <article
                            class="shadow-md rounded-b-lg mt-5 w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
                            <!-- Profile header -->
                            <div>
                                <div>
                                    <img class="h-32 w-full object-cover lg:h-48 rounded-t-lg"
                                        src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                                        alt="">
                                </div>
                                <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                                    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                                        <div class="flex">
                                            <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                                :src="user.profile_photo_path.replace('profile/', '/storage/profile/')"
                                                alt="">
                                        </div>
                                        <div
                                            class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                            <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                                                <h1 class="truncate text-2xl font-bold text-gray-900">{{
                                                    full_name(user.user_first_name, user.user_last_name) }} </h1>
                                            </div>
                                            <div
                                                class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                                                <form @submit.prevent="submit" class="">
                                                    <button @click="acting = true" type="button"
                                                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                        <!-- Heroicon name: mini/envelope -->
                                                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" aria-hidden="true">
                                                            <path
                                                                d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                                            <path
                                                                d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                                        </svg>
                                                        <span>Enviar Invitación</span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div
                                                class="justify-stretch mt-6 flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                                                <button @click="PDFDownload" type="button"
                                                    class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                    <!-- Heroicon name: mini/envelope -->
                                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25" />
                                                    </svg>
                                                    <span>Descargar PDF</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                                        <h1 class="truncate text-2xl font-bold text-gray-900">{{
                                            full_name(user.user_first_name, user.user_last_name) }}</h1>
                                    </div>
                                </div>
                            </div>

                            <JetModal maxWidth="4xl" :show="acting" @close="acting = null">
                                <div v-if="vacants" class="bg-white shadow sm:rounded-lg">
                                    <form class="px-4 py-5 sm:p-6">
                                        <h3 class="mb-6 text-2xl leading-6 font-bold text-gray-900">Invitación</h3>
                                        <div class="mt-2 text-sm text-gray-500">
                                            <h3 class="text-lg leading-6 text-gray-800 mb-2">¡Hola!</h3>
                                            <h3 class="text-lg leading-6 text-gray-800 mb-2">¿Esta seguro de invitar al
                                                candidato <strong>{{
                                                    user.user_first_name + ' ' + user.user_last_name
                                                }}</strong> al proceso de selección de su
                                                empresa?</h3>

                                        </div>
                                        <div class="mt-7 text-sm text-gray-500">

                                            <div class="grid grid-cols-6 gap-6">
                                                <div class="col-span-12 lg:col-span-3 mt-1">
                                                    <label for="type_of_contract"
                                                        class="block text-sm font-medium text-gray-700">Vacantes Disponibles</label>
                                                    <select v-model="selectVacant.id"
                                                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                                        <option value>Seleccione una vacante de la lista</option>
                                                        <option v-for="vacant in vacants" :key="vacant.id"
                                                            :value="vacant.id">
                                                            {{ vacant.title }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mt-5">
                                            <button type="button" @click="acting = null"
                                                class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Cerrar
                                            </button>

                                            <button type="button"
                                                @click="submit(user.email, selectVacant.id); acting = null"
                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                <!-- Heroicon name: mini/envelope -->
                                                <svg class="-ml-1 mr-2 h-5 w-5 text-dark-400"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                                                    <path
                                                        d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                                                </svg>
                                                Enviar Invitación
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </JetModal>

                            <!-- Tabs -->
                            <div class="mt-6 sm:mt-2 2xl:mt-5">
                                <div class="border-b border-gray-200">
                                    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                            <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                                            <a @click="option = 0"
                                                :class='option == 0 ? "border-purple-500 text-purple-600" : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"'
                                                class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                                                aria-current="page">Perfil</a>

                                            <a @click="option = 1"
                                                :class='option == 1 ? "border-purple-500 text-purple-600" : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"'
                                                class="border-transparent whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Preferencias
                                                Laborales</a>

                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <!-- Description list -->
                            <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8" v-if="option === 0">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Título</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.position }}</dd>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.email }}</dd>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Telefono</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.user_phone_number }}</dd>
                                    </div>

                                    <!-- <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Team</dt>
                                        <dd class="mt-1 text-sm text-gray-900">Product Development</dd>
                                    </div> -->

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.user_address }}</dd>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Ubicación</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.city_name }}, {{ user.state_name }}
                                        </dd>
                                    </div>

                                    <!-- <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Salary</dt>
                                        <dd class="mt-1 text-sm text-gray-900">$145,000</dd>
                                    </div> -->

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Cumpleaños</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ user.user_date_of_birth }}</dd>
                                    </div>

                                    <!-- <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">About</dt>
                                        <dd class="mt-1 max-w-prose space-y-5 text-sm text-gray-900">
                                        <p>Tincidunt quam neque in cursus viverra orci, dapibus nec tristique. Nullam ut sit dolor consectetur urna, dui cras nec sed. Cursus risus congue arcu aenean posuere aliquam.</p>
                                        <p>Et vivamus lorem pulvinar nascetur non. Pulvinar a sed platea rhoncus ac mauris amet. Urna, sem pretium sit pretium urna, senectus vitae. Scelerisque fermentum, cursus felis dui suspendisse velit pharetra. Augue et duis cursus maecenas eget quam lectus. Accumsan vitae nascetur pharetra rhoncus praesent dictum risus suspendisse.</p>
                                        </dd>
                                    </div> -->
                                </dl>
                            </div>

                            <div class="mx-auto mt-6 max-w-5xl px-4 sm:px-6 lg:px-8" v-else-if="option === 1">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Áreas Laborales</dt>
                                        <div
                                            class="mt-2 flex py-0 flex-col items-center justify-start gap-2 lg:gap-1 lg:flex-nowrap lg:basis-1/2 lg:justify-between 2xl:gap-2 2xl:py-2">
                                            <div class="2xl:mt-1 shrink flex flex-col w-full pb-1">
                                                <label
                                                    class="text-sm font-bold items-center justify-center text-gray-800 lg:text-sm 2xl:text-base">Área</label>
                                                <label for="" class="flex flex-row items-center py-1 ">
                                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                                        {{ user.area_name }}
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="2xl:mt-1 shrink flex flex-col w-full pb-1">
                                                <label for=""
                                                    class="text-sm font-bold justify-center text-gray-800 lg:text-sm 2xl:text-base">Campo
                                                    General</label>
                                                <label for="" class="flex flex-row items-center py-1">
                                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        class="text-xs font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                                        {{ user.general_area_name }}
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="2xl:mt-1 shrink flex flex-col w-full pb-1">
                                                <label for=""
                                                    class="text-sm font-bold items-center justify-center text-gray-800 lg:text-sm 2xl:text-base">Campo
                                                    Específico</label>
                                                <label for="" class="flex flex-row items-center py-1">
                                                    <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1 flex-no-shrink"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                                        {{ user.specific_area_name }}
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500 mb-2">Me Interesa</dt>

                                        <div v-if="user.work == '1'" class="2xl:mt-1 shrink flex flex-col w-full pb-1">
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
                                                    Trabajo
                                                </span>
                                            </label>
                                        </div>

                                        <div v-if="user.practices == '1'" class="2xl:mt-1 shrink flex flex-col w-full pb-1">
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
                                                    Residencia / Práctica profesional
                                                </span>
                                            </label>
                                        </div>

                                        <div v-if="user.dual_education == '1'"
                                            class="2xl:mt-1 shrink flex flex-col w-full pb-1">
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
                                                    Educación dual
                                                </span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500 mb-3">Cambio de Residencia</dt>
                                        <div v-if="user.work == '1'" class="2xl:mt-1 shrink flex flex-col w-full pb-1">
                                            <label for="" class="flex flex-row items-center py-1">
                                                <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1 flex-no-shrink"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                    </path>
                                                </svg>
                                                <span v-if="user.change_city == 'Y'"
                                                    class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                                    Sí
                                                </span>

                                                <span v-else-if="user.change_city == 'N'"
                                                    class="text-xs justify-items-start font-medium w-auto text-justify leading-none align-middle text-slate-700 lg:text-sm 2xl:text-base">
                                                    No
                                                </span>
                                            </label>
                                        </div>
                                    </div>


                                </dl>
                            </div>
                            <!-- Team member list -->
                            <div class="mx-auto mt-8 max-w-5xl px-4 pb-12 sm:px-6 lg:px-8">
                            </div>
                        </article>

                        <div
                            class="mt-5 shadow-md w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
                            <div
                                class="mt-2 text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
                                <h3>Educación</h3>
                            </div>
                            <div class="flex flex-col py-4" v-if="user.study_degrees.length > 0">
                                <div v-for="(study, index) in user.study_degrees" :key="index"
                                    class="my-3 w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
                                    <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">
                                        {{ study.school_name }}</h3>
                                    <p class="text-xs text-gray-500">{{ study.starting_year }} - {{ study.finished_year }}
                                    </p>
                                    <div
                                        class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                                        <div class="flex flex-nowrap justify-center items-center py-2 transition">
                                            <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                </path>
                                            </svg>
                                            <div class="text-sm text-gray-600 text-center w-auto leading-none align-middle">
                                                {{ study.study_level }} en {{ study.study_tittle }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col py-4" v-else>
                                <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify pb-5 pt-2">
                                    Aún no se encuentran registros acerca de la educación dadas de alta por el usuario.
                                </span>
                            </div>
                        </div>

                        <div
                            class="mt-5 shadow-md w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
                            <div
                                class="mt-2 text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
                                <h3>Certificaciones</h3>
                            </div>
                            <div class="flex flex-col py-4" v-if="user.certifications.length > 0">
                                <div v-for="(Certifications, index) in user.certifications" :key="index"
                                    class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
                                    <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">
                                        {{ Certifications.name_certification }}</h3>
                                    <div
                                        class="flex flex-col w-full justify-center items-center lg:flex lg:flex-row lg:justify-between">
                                        <div v-if="Certifications.certification_path_name"
                                            class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                                            <a class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start"
                                                target="_blank" rel="noopener noreferrer"
                                                :href="'/storage/certifications/' + Certifications.certification_path_name">
                                                <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-red-500 pr-1"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <div
                                                    class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">
                                                    {{ Certifications.certification_path_name }}</div>
                                            </a>
                                        </div>
                                        <div v-else
                                            class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                                            <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-500 pr-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <div
                                                class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">
                                                Sin documento adjunto</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col py-4" v-else>
                                <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify pb-5 pt-2">
                                    Aún no se encuentran registros acerca de las certificaciones dadas de alta por el
                                    usuario.
                                </span>
                            </div>
                        </div>

                        <div
                            class="mt-5 shadow-md w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
                            <div
                                class="mt-2 text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
                                <h3>Idiomas</h3>
                            </div>
                            <div class="flex flex-col py-4" v-if="user.lenguages.length > 0">
                                <div v-for="(Language, index) in user.lenguages" :key="index"
                                    class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
                                    <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{
                                        Language.name_language }}</h3>
                                    <p class="text-xs text-gray-500">Nivel: {{ Language.level }}</p>
                                    <div
                                        class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                                        <div v-if="Language.language_certification_path_name"
                                            class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                                            <a class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start"
                                                target="_blank" rel="noopener noreferrer"
                                                :href="'/storage/certifications/' + Language.language_certification_path_name">
                                                <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-red-500 pr-1"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                    </path>
                                                </svg>
                                                <div
                                                    class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">
                                                    {{ Language.language_certification_path_name }}</div>
                                            </a>
                                        </div>
                                        <div v-else
                                            class="flex w-full flex-nowrap justify-center items-center py-2 cursor-pointer text-ellipsis overflow-hidden transition lg:justify-start">
                                            <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-500 pr-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                </path>
                                            </svg>
                                            <div
                                                class="text-sm text-gray-600 text-center w-auto leading-none truncate ... align-middle">
                                                Sin documento adjunto</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col py-4" v-else>
                                <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify pb-5 pt-2">
                                    Aún no se encuentran registros acerca de los idiomas dados de alta por el usuario.
                                </span>
                            </div>
                        </div>

                        <div
                            class="mt-5 shadow-md w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
                            <div
                                class="mt-2 text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
                                <h3>Experiencia</h3>
                            </div>
                            <div class="flex flex-col py-4" v-if="user.experiences.length > 0">
                                <div v-for="(Experience, index) in user.experiences" :key="index"
                                    class="w-full flex flex-col items-center text-center mb-3 md:mb-5 lg:items-start lg:text-start border-b border-gray-200 group in-ease-out delay-150 cursor-pointer">
                                    <!-- <div class="hidden">{{fetchLocationInfo(Experience.city)}}</div> -->
                                    <h3 class="text-base text-gray-800 font-bold lg:text-xl 2xl:text-2xl">{{
                                        Experience.company }}</h3>
                                    <div class="flex flex-nowrap justify-center items-center py-0 transition">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-300 pr-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="text-xs text-gray-500">{{ Experience.start_date }} - {{
                                            Experience.end_date }}</p>
                                    </div>
                                    <div class="flex flex-nowrap justify-center items-center py-0 transition">
                                        <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-gray-300 pr-1"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="text-xs text-gray-500">{{ Experience.city }}, {{ Experience.state }}, {{
                                            Experience.country
                                        }}
                                        </p>
                                    </div>
                                    <div
                                        class="flex flex-col w-auto justify-center items-center lg:flex lg:flex-row lg:justify-between lg:w-full">
                                        <div class="flex flex-nowrap justify-center items-center py-2 transition">
                                            <svg class="min-w-fit w-4 h-4 lg:w-5 lg:h-5 self-start text-blue-500 pr-1"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                                </path>
                                            </svg>
                                            <div class="text-sm text-gray-600 text-center w-auto leading-none align-middle">
                                                {{ Experience.job }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col py-4" v-else>
                                <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify pb-5 pt-2">
                                    Aún no se encuentran registros acerca de las experiencias dadas de alta por el usuario.
                                </span>
                            </div>
                        </div>

                        <div
                            class="mt-5 shadow-md w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
                            <div
                                class="mt-2 text-2xl text-center mx-auto font-bold  text-gray-900 py-2 lg:text-start lg:text-3xl">
                                <h3>Skills</h3>
                            </div>
                            <div class="flex flex-col py-2" v-if="user.user_skills.length > 0">
                                <div
                                    class="flex flex-row flex-wrap gap-x-4 gap-y-2 py-4 justify-between content-center place-content-center lg:justify-start lg:gap-x-2 lg:gap-y-2">
                                    <span v-for="(data, index) in user.user_skills" :key="index" id="badge-dismiss-pink"
                                        class="inline-flex items-center py-1 px-2 mr-2 text-sm font-medium rounded"
                                        :class="setColor(index)">
                                        {{ data.skill }}
                                        <button type="button" disabled
                                            class="inline-flex items-center p-0.5 ml-2 text-sm text-gray-700 bg-transparent rounded-sm "
                                            data-dismiss-target="#badge-dismiss-pink" aria-label="Remove">
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="flex flex-col py-4" v-else>
                                <span class="w-full text-sm font-light text-gray-500 mx-auto px- text-justify pb-5 pt-2">
                                    Aún no se encuentran registros acerca de los skills dados de alta por el usuario.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
</admin-layout>
</template>

<script>
import AdminLayout from '@/Layouts/CompanyLayout'
import { Link } from '@inertiajs/inertia-vue3'
import axios from 'axios'
import JetModal from '@/Jetstream/Modal'
import Swal from 'sweetalert2';
//import { Inertia } from '@inertiajs/inertia'
import { defineComponent } from 'vue'
export default defineComponent({
    components: {
        AdminLayout,
        Link,
        JetModal,
        Swal
    },
    props: {
        user: Object,
        offer: Object
    },
    data() {
        return {
            acting: false,
            emailData: this.$inertia.form({
                'email': this.user.email,
                'user': this.user.user_first_name + ' ' + this.user.user_last_name,
            }),
            vacants: [],
            selectVacant: [],
            option: 0,
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
        }
    },
    methods: {
        async getVacant() {
            await axios.get(route('offer.getOffer'))
                .then((response) => {
                    this.vacants = response.data;
                    console.log(this.vacants.length)
                    //console.log(this.vacants[0].title)
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        submit(idV) {
            this.emailData.get(route('user.sendEmail', {
                idV: idV,
                //nameOff: 'this.vacants[0].title',
            }))
            Swal.fire({
                icon: 'success',
                title: '¡Enviar Email!',
                text: 'El email se ha enviado con éxito',
                showConfirmButton: false,
                timer: 1800
            })
        },
        setColor(id) {
            return this.colors[id].color
        },
        full_name(first_name, last_name) {
            const fullName = first_name + ' ' + last_name
            const upperFullName = fullName.split(" ");
            for (let i = 0; i < upperFullName.length; i++) {
                upperFullName[i] = upperFullName[i][0].toUpperCase() + upperFullName[i].substr(1);
            }
            return upperFullName.join(" ");
        },
        PDFDownload() {
            axios({
                url: '/company/downloadCV/' + this.user.id,
                method: 'GET',
                responseType: 'blob', // important
            }).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', `${this.user.user_first_name}-${this.user.user_last_name}-CV.pdf`);
                document.body.appendChild(link);
                link.click();
            });
        },
    },
    created() {
        this.getVacant()
    },
})
</script>
