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
                                <form @submit.prevent="validateFirstStep" class="space-y-6">
                                    <div class="-mx-3 mb-6 flex flex-wrap">
                                        <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                                            <label class="mb-2 block" for="first_name">
                                                <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Nombre(s)</span>
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
                                            <jet-input-error :message="user.errors.user_first_name"/>
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
                                            <jet-input-error :message="user.errors.user_last_name"/>
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
                                                minlength="18"
                                                maxlength="18"
                                                autocomplete="CURP"
                                                required
                                                :value="user.CURP.toUpperCase()"
                                                @input="user.CURP = $event.target.value.toUpperCase()"
                                                class="block uppercase w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                
                                            />
                                        </div>
                                        <jet-input-error :message="user.errors.CURP"/>
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
                                                @blur="validateEmail"
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.email"
                                            />
                                        </div>
                                    <jet-input-error :message="user.errors.email"/>
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
                                                minlength="6"
                                                @blur="validatePassword"
                                                autocomplete="current-password"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.password"
                                            />
                                        </div>
                                        <jet-input-error :message="user.errors.password"/>
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
                                                minlength="6"
                                                @blur="validatePassword"
                                                autocomplete="current-repeat-password"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.password_confirmation"
                                            />
                                        </div>
                                        <jet-input-error :message="user.errors.password_confirmation"/>
                                    </div>
                                    <div class="space-y-1">
                                        <label for="profile_photo_path" class="block text-sm font-medium text-gray-700">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Foto de perfil</span>
                                        </label>
                                        <div class="flex items-center justify-center space-y-1">
                                            <input
                                                type="file"
                                                required
                                                id="profile_photo_path"
                                                name="profile_photo_path"
                                                class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-lg file:border-0 file:bg-blue-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-blue-600"
                                                @change="onFileSelected"/>
                                        </div>
                                        <jet-input-error :message="user.errors.profile_photo_path"/>
                                    </div>
                                    <div class="mb-6 md:flex md:items-center">
                                        <label class="block text-gray-500">
                                            <input class="mr-2 leading-tight" type="checkbox" v-model="user.terms" required />
                                            <span class="text-xs font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">                                            
                                                Acepto el
                                                <a href="http://" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline underline-offset-4">aviso legal</a>
                                                y la
                                                <a href="http://" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline underline-offset-4">política de privacidad</a>.
                                            </span>
                                        </label>
                                        <jet-input-error :message="user.errors.terms"/>
                                    </div>
                                    <div class="mb-6 md:flex md:items-center">
                                        <label class="block text-gray-500">
                                            <input
                                                class="mr-2 leading-tight"
                                                type="checkbox"
                                                v-model="user.newsletter"/>
                                            <span class="text-xs font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Acepto recibir comunicados de mi interés relacionados con EXPERIENTYA.</span>
                                        </label>
                                        <jet-input-error :message="user.errors.newsletter"/>
                                    </div>
                                    <div>
                                    <jet-button
                                    :disabled="user.processing"
                                    class="flex w-full justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Guardar y Continuar</jet-button>
                                    </div>
                                     <jet-input-error :message="user.errors.confirmation"/>
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
                            <form @submit.prevent="submit" class="space-y-6">
                                <div class="-mx-3 mb-2 flex flex-wrap">
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                        <label class="mb-2 block" for="country">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">País</span>
                                        </label>
                                        <div class="mt-1">
                                            <select v-model="user.user_country_id" id="state" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                                <option value>
                                                    México
                                                </option>
                                                <!-- <option v-for="country in countries" :key="country.id" :value="country.id">
                                                    {{ country.name }}
                                                </option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                        <label class="mb-2 block" for="state">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Estado</span>
                                        </label>
                                        <div class="mt-1">
                                            <select v-model="user.user_state_id" required id="state" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
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
                                                required
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
                                <!-- <div class="-mx-3 mb-6 flex flex-wrap">
                                </div> -->
                                <div class="-mx-3 mb-6 flex flex-wrap">
                                    <div class="w-full px-3 md:w-1/3">
                                        <label class="mb-2 block" for="user_postal_code">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Código Postal</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_postal_code"
                                                name="user_postal_code"
                                                type="text"
                                                min="0"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                maxlength="7"
                                                autocomplete="postal_code"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_postal_code"/>
                                        </div>
                                    </div>
                                    <div class="mb-6 w-full px-3 md:mb-0 md:w-1/3">
                                        <label class="mb-2 block" for="user_phone_number">
                                            <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Teléfono 1</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_phone_number"
                                                name="user_phone_number"
                                                type="text"
                                                min="0"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                minlength="10"
                                                maxlength="10"
                                                autocomplete="user_phone_number"
                                                required
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_phone_number"/>
                                        </div>
                                    </div>
                                    <div class="w-full px-3 md:w-1/3">
                                        <label class="mb-2 block" for="user_second_phone_number">
                                            <span class="block text-sm font-medium text-slate-700">Teléfono 2</span>
                                        </label>
                                        <div class="mt-1">
                                            <input
                                                id="user_second_phone_number"
                                                name="user_second_phone_number"
                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                type="text"
                                                min="0"
                                                minlength="10"
                                                maxlength="10"
                                                autocomplete="user_second_phone_number"
                                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                                v-model="user.user_second_phone_number"/>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label for="email_alternative" class="block text-sm font-medium text-gray-700">
                                        <span class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']">Correo electrónico alternativo</span>
                                    </label>
                                    <div class="mt-1">
                                        <input
                                            id="email_alternative"
                                            name="email_alternative"
                                            type="email"
                                            autocomplete="email"
                                            required
                                            @blur="validateAlternativeEmail"
                                            class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                            v-model="user.email_alternative"/>
                                            <jet-input-error :message="user.errors.email_alternative"/>
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
                                        required
                                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                        v-model="user.user_date_of_birth"/>
                                </div>
                                <div class="flex content-around justify-around">
                                    <button
                                            type="button"
                                            class="flex w-1/3 justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                            @click="changeStage()">
                                            ATRAS
                                        </button>

                                        <jet-button
                                    :disabled="user.processing"
                                    class="flex w-1/2 justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Guardar y Continuar</jet-button>
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
import JetInputError from "@/Jetstream/InputError";
import JetButton from '@/Jetstream/Button'

export default defineComponent({
    components: { Header, Footer, JetInputError, JetButton },
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
        password_confirmation: "",
        profile_photo_path: null,
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
        terms: "",
        newsletter: false,
        errors: [{
            email: "",
            password: "",
            password_confirmation: "",
            confirmation: "",
            email_alternative: "",
        }],
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


    onFileSelected(event) {
        this.user.profile_photo_path = event.target.files[0];
        console.log(event.target.files[0]);
    },
    changeStage() {
      this.bind ? this.bind=false : this.bind=true;
    },

    // VALIDATIONS ON FIRST STEP (FRONT SIDE)
    validateEmail() {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.user.email)) {
        console.log('Valid Email');
        this.user.errors.email = "";
        // return false;
        } else {
        this.user.errors.email = "Ingrese un email válido";
        // return true;
        }
    },
    validateAlternativeEmail() {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.user.email_alternative)) {
        console.log('Valid Email');
        this.user.errors.email_alternative = "";
        // return false;
        } else {
        this.user.errors.email_alternative = "Ingrese un email válido";
        // return true;
        }
    },
    validatePassword() {
        if (this.user.password == this.user.password_confirmation) {
            this.user.errors.password = "";
            this.user.errors.password_confirmation = "";
            // return true;
        } else {
            this.user.errors.password = "Las contraseñas no coinciden.";
            this.user.errors.password_confirmation = "Las contraseñas no coinciden.";
            // return false;
        }
    },
    validateFirstStep() {
        if (this.user.errors.email == "" && this.user.errors.password == "") {
            this.bind = false;
            this.user.errors.confirmation = ""
            } else {
            this.user.errors.confirmation = "Revise los campos requeridos antes de continuar."
            this.bind = true;
        }
    },  
    submit(){
            this.user.submit('post', route('user.store'));
            console.log(this.user);
        },
  },
  created() {
    this.getStates();
    console.log(this.$attrs);
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
