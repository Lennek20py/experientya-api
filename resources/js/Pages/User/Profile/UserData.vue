<script setup>
    import {ref, computed, onMounted, watch} from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import axios from "axios";

    const props = defineProps({
        userData: Object
    })
    let referenceData = JSON.parse(JSON.stringify(props.userData))

    const btnStatus = computed(() => {
        let status = true
        for(let i in props.userData){
            if (props.userData[i] != referenceData[i]) status = false 
        }
        return status
    })

    let states = ref([]);
    let towns = ref([]);

    async function getStates(){
        await axios.get("/list-states").then((response) => {
            states.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
    }

    async function getTowns(){
        await axios.get("/list-towns/" + props.userData.user_state_id).then((response) => {
            towns.value = response.data;
        }).catch((error) => {
            console.log(error);
        });
    }

    watch(props.userData, async (item) => {
        console.log(item.user_state_id);
        await axios.get("/list-towns/" + item.user_state_id).then((response) => {
            towns.value = response.data;
        }).catch((error) => {
            console.log(error);
        });
    });

    function submit(){
        Inertia.post(`/user/update/${props.userData.id}`, {
            _method: 'put',
            'user_first_name':props.userData.user_first_name,
            'user_last_name' :props.userData.user_last_name,
            'CURP' :props.userData.CURP,
            'email':props.userData.email,
            'user_country_id':props.userData.user_country_id,
            'user_state_id' :props.userData.user_state_id,
            'user_city_id':props.userData.user_city_id,
            'user_address' :props.userData.user_address,
            'user_postal_code':props.userData.user_postal_code,
            'user_phone_number' :props.userData.user_phone_number,
            'user_second_phone_number' :props.userData.user_second_phone_number,
            'email_alternative' :props.userData.email_alternative,
            'useruser_date_of_birth' :props.userData.user_date_of_birth,
        },
        {
            onSuccess: () => {
                referenceData = JSON.parse(JSON.stringify(props.userData))
            }
        })
    }

    onMounted(async() => {
        // console.log(props.user);
        await getStates();
        await getTowns();
    });

</script>

<template>
    <div>
        <div>
            <span>
                Actualice la información de perfil y la dirección de correo electrónico de su cuenta.
            </span>
        </div>
        <h2 class="mt-12 text-3xl font-extrabold text-gray-900">Datos Personales</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-2 gap-4">
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Nombre(s)</span>
                <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" v-model="props.userData.user_first_name"
                />
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Apellidos</span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm" v-model="props.userData.user_last_name"
                />
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">CURP</span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.CURP"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Email </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.email"/>
            </div>
        </div>
        <h2 class="mt-12 text-3xl font-extrabold text-gray-900">Datos de Contacto</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-2 gap-4">
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">País </span>
                    <select v-model="props.userData.user_country_id" id="state"
                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                        <option value="1">
                            México
                        </option>
                    </select>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Estado </span>
                    <select v-model="props.userData.user_state_id" id="state"
                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                        <option v-for="state in states" :key="state.id"
                            :value="state.id">
                            {{ state.name }}
                        </option>
                    </select>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Ciudad / Municipio </span>
                    <select v-model="props.userData.user_city_id" id="state"
                        class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                        <option v-for="town in towns" :key="town.id" :value="town.id">
                            {{ town.name }}
                        </option>
                    </select>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Dirección </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.user_address"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Código Postal </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.user_postal_code"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Teléfono 1 </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.user_phone_number"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Teléfono 2 </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.user_second_phone_number"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Correo electrónico alternativo </span>
                    <input type="text"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.email_alternative"/>
            </div>
            <div class="mt-1">
                <span
                    class="block text-sm font-medium text-slate-700 after:ml-0.5">Fecha de nacimiento </span>
                    <input type="date"
                    class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                v-model="props.userData.user_date_of_birth"/>
            </div>
        </div>
        
        <div class="flex justify-end ">
            <button v-if="btnStatus" class="text-white bg-slate-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-not-allowed">
                Guardar
            </button>
            <button v-else type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer" @click="submit()">
                Guardar
            </button>
        </div>
        
    </div>
</template>

