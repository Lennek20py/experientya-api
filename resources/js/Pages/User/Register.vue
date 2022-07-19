<template>
  <div>
    <Header />
    <main class="bg-gray-100 py-12">

    <!-- BASIC INFO -->
    <Transition>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" v-if="bind">
            <div class="mt-24 mb-16 flex min-h-full rounded-2xl bg-white shadow-md">
                <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-20">
                    <div class="mx-auto w-full lg:w-[31rem]">
                        <div>
                            <!-- <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow"> -->
                            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                                Registrate
                            </h2>
                        </div>
                        <div class="mt-8">
                            <div>
                             <label class="mx-auto text-gray-400 text-sm"><span class="block after:ml-0.5 after:text-red-500 after:content-['*']">Es fácil y rápido. Los campos requeridos son marcados con un asterisco</span></label>
                                <div class="relative mt-1">
                                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>
                                    <div class="relative flex justify-center text-sm"></div>
                                </div>
                            </div>
                            <div class="mt-6">
                                <form class="space-y-6">
                                    <div class="-mx-3 mb-6 flex flex-wrap">
                                        <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                                            <label class="mb-2 block" for="first_name">
                                                <span class="block text-xs font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Nombre(s)</span>
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="first_name"
                                                    name="first_name"
                                                    type="text"
                                                    autocomplete="first_name"
                                                    required
                                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                    v-model="user.user_first_name"/>
                                            </div>
                                        </div>
                                        <div class="w-full px-3 md:w-1/2">
                                            <label class="mb-2 block" for="last_name">
                                                <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Apellidos</span>
                                            </label>
                                            <div class="mt-1">
                                                <input
                                                    id="last_name"
                                                    name="last_name"
                                                    type="text"
                                                    autocomplete="last_name"
                                                    required
                                                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                    v-model="user.user_last_name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <label for="CURP" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">CURP</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="CURP"
                                                name="CURP"
                                                type="text"
                                                autocomplete="CURP"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.CURP"
                                            />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Email</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="email"
                                                name="email"
                                                type="email"
                                                autocomplete="email"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.email"
                                            />
                                            <jet-input-error :message="user.errors.email"/>
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="password" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Contraseña</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="password"
                                                name="password"
                                                type="password"
                                                autocomplete="current-password"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.password"
                                            />
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="repeat-password" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Repetir contraseña</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="repeat-password"
                                                name="repeat-password"
                                                type="password"
                                                autocomplete="current-repeat-password"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            />
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="photo_profile_path" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Foto de perfil</span>
                                        </label>
                                        <div class="flex items-center justify-center space-y-1">
                                            <!-- <div class="shrink-0">                        <img                          class="h-16 w-16 object-cover rounded-full"                          src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"                          alt="Current profile photo"                        />                          </div>-->
                                            <input
                                                type="file"
                                                id="photo_profile_path"
                                                name="photo_profile_path"
                                                class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600"
                                                v-on:change="user.profile_photo_path"/>
                                        </div>
                                    </div>
                                    <div class="mb-6 md:flex md:items-center">
                                        <label class="block text-gray-500">
                                            <input class="mr-2 leading-tight" type="checkbox" v-model="user.terms" />
                                            <span class="text-xs font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">                                            
                                                Acepto el
                                                <a href="http://" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline underline-offset-4">aviso legal</a>
                                                y la
                                                <a href="http://" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline underline-offset-4">política de privacidad</a>.
                                            </span>
                                        </label>
                                    </div>
                                    <div class="mb-6 md:flex md:items-center">
                                        <label class="block text-gray-500">
                                            <input
                                                class="mr-2 leading-tight"
                                                type="checkbox"
                                                v-model="user.newsletter"/>
                                            <span class="text-xs font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Acepto recibir comunicados de mi interés relacionados con EXPERIENTYA.</span>
                                        </label>
                                    </div>
                                    <div>
                                        <button
                                            type="button"
                                            class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                            @click="changeStage()">
                                            Continuar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative hidden w-0 flex-1 lg:block">
                    <img class="absolute inset-0 h-full w-full rounded-r-2xl object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt />
                </div>
            </div>
            <!-- ESTADOS Y CIUDADES -->
        </div>
    </Transition>
    <!-- CONTACT INFO -->
    <Transition>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" v-if="!bind">
        <div class="mt-24 mb-16 flex min-h-full rounded-2xl bg-white shadow-md">
            <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-20">
                <div class="mx-auto w-full lg:w-[35rem]">
                    <div>
                        <!-- <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow"> -->
                        <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                            Datos de Contacto
                        </h2>
                    </div>
                    <div class="mt-6">
                    <label class="mx-auto text-gray-400 text-sm"><span class="block after:ml-0.5 after:text-red-500 after:content-['*']">Para finalizar su registro ingrese su datos de contacto. Los campos requeridos son marcados con un asterisco</span></label>
                        <div>
                            <div class="relative mt-1">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                    <div class="w-full border-t border-gray-300"></div>
                                </div>
                                <div class="relative flex justify-center text-sm"></div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <!-- ESTADOS Y CIUDADES -->
                            <div class="space-y-1"></div>
                            <form class="space-y-6">
                                <div class="-mx-3 mb-2 flex flex-wrap">
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                        <label class="mb-2 block" for="country">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">País</span>
                                        </label>
                                        <div class="mt-1">
                                            <select v-model="user.user_country_id" id="state" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                                <option value>
                                                    Seleccione un país
                                                </option>
                                                <option v-for="country in countries" :key="country.id" :value="country.id">
                                                    {{ country.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                        <label class="mb-2 block" for="state">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Estado</span>
                                        </label>
                                        <div class="mt-1">
                                            <select v-model="user.user_state_id" id="state" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                                <option value>Seleccione un estado</option>
                                                <option v-for="state in states" :key="state.id" :value="state.id">
                                                    {{ state.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 md:w-1/3">
                                        <label class="mb-2 block" for="town">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Ciudad / Municipio</span>
                                        </label>
                                        <div class="mt-1">
                                            <select
                                                v-model="user.user_city_id" 
                                                id="town"
                                                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                                <option value>Seleccione una ciudad</option>
                                                <option v-for="town in towns" :key="town.id" :value="town.id">
                                                    {{ town.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="user_address" class="block text-sm font-medium text-gray-700">
                                        <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Dirección</span>
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="user_address"
                                            name="user_address"
                                            type="text"
                                            autocomplete="user_address"
                                            required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            v-model="user.user_address"
                                        />
                                    </div>
                                </div>
                                <div class="-mx-3 mb-6 flex flex-wrap">
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                                        <label class="mb-2 block" for="social_networks">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Redes Sociales</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="social_networks"
                                                name="social_networks"
                                                type="text"
                                                autocomplete="social_networks"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_social_networks"/>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 md:w-1/2">
                                        <label class="mb-2 block" for="user_postal_code">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Código Postal</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_postal_code"
                                                name="user_postal_code"
                                                type="text"
                                                autocomplete="user_postal_code"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_postal_code"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="-mx-3 mb-6 flex flex-wrap">
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                                        <label class="mb-2 block" for="user_phone_number">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Teléfono 1</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_phone_number"
                                                name="user_phone_number"
                                                type="text"
                                                autocomplete="user_phone_number"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_phone_number"/>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 md:w-1/2">
                                        <label class="mb-2 block" for="user_second_phone_number">
                                            <span class="block text-sm font-medium text-slate-700">Teléfono 2</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_second_phone_number"
                                                name="user_second_phone_number"
                                                type="text"
                                                autocomplete="user_second_phone_number"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_second_phone_number"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="alternative_email" class="block text-sm font-medium text-gray-700">
                                        <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Correo electrónico alternativo</span>
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="alternative_email"
                                            name="alternative_email"
                                            type="email"
                                            autocomplete="alternative_email"
                                            required
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            v-model="user.email_alternative"/>
                                    </div>
                                </div>
                                <div>
                                    <label for="user_date_of_birth" class="block text-sm font-medium text-gray-700">
                                        <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Fecha de nacimiento</span>
                                    </label>
                                    <input
                                        type="date"
                                        name="user_date_of_birth"
                                        id="user_date_of_birth"
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                        v-model="user.user_date_of_birth"/>
                                </div>
                                <div>
                                    <button
                                        type="button"
                                        class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Registrarse
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative hidden w-0 flex-1 lg:block">
                <img class="absolute inset-0 h-full w-full rounded-r-2xl object-cover" src="https://pbs.twimg.com/media/EYid9iWWsAAaMGX?format=jpg&name=4096x4096" alt />
            </div>
        </div>
    </div></Transition>

    </main>
    <Footer />
  </div>
</template>

<script>
import { defineComponent } from "vue";
import Header from "@/Components/Home/Header";
import Footer from "@/Components/Home/Footer";
import axios from "axios";
import InputError from "@/Jetstream/InputError";
import JetButton from '@/Jetstream/Button'

export default defineComponent({
    components: { Header, Footer, InputError, JetButton },
  data: function () {
    return {
      country_id: "",
      state_id: "",
      town_id: "",
      states: [],
      towns: [],
      bind: true,
      users: [],
      user: this.$inertia.form( {
        user_first_name: "",
        user_last_name: "",
        CURP: "",
        email: "",
        password: "",
        profile_photo_path: "",
        user_address: "",
        user_social_networks: "",
        user_postal_code: "",
        user_phone_number: "",
        user_second_phone_number: "",
        email_alternative: "",
        user_date_of_birth: "",
        user_country_id: "",
        user_state_id: "",
        user_city_id: "",
        terms: false,
        newsletter: false,
      }),
    };
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
    changeStage() {
      this.bind = false;
    },
  },
  created() {
    this.getStates();
  },
  watch: {
    "user.user_state_id": function (value) {
      axios.get("/list-towns/" + value).then((response) => {
        this.towns = response.data;
      });
    },
  },
});
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
