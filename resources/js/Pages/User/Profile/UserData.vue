<template>
    <div>
        <div>
            <span>
                Actualice la información de perfil y la dirección de correo
                electrónico de su cuenta.
            </span>
        </div>
        <div v-for="(item, index) in arrayDataUser" :key="index">
            <h2 class="mt-9 text-3xl font-extrabold text-gray-900">
                {{ item.name }}
            </h2>
            <div
                class="grid sm:grid-cols-2 lg:grid-cols-4 md:grid-cols-2 gap-4"
            >
                <div
                    class="mt-1"
                    v-for="(twoItem, twoIndex) in item.data"
                    :key="twoIndex"
                >
                    <div class="z-10 mb-[-10px]">
                        <span
                            class="text-sm font-medium text-slate-700 after:ml-0.5 ml-3 bg-white pl-2 pr-2"
                            >{{ twoItem.nameInput }}
                        </span>
                    </div>
                    <!-- Country -->
                    <select
                        v-if="twoItem.nameInput === 'País'"
                        v-model="props.userData[twoItem.value]"
                        class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                    >
                        <option
                            v-for="country in countrys"
                            :key="country.id"
                            :value="country.id"
                        >
                            {{ country.name }}
                        </option>
                    </select>

                    <!-- State -->
                    <select
                        v-else-if="twoItem.nameInput === 'Estado'"
                        v-model="props.userData[twoItem.value]"
                        class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                    >
                        <option
                            v-for="state in states"
                            :key="state.id"
                            :value="state.id"
                        >
                            {{ state.name }}
                        </option>
                    </select>

                    <!-- Town -->
                    <select
                        v-else-if="twoItem.nameInput === 'Ciudad / Municipio'"
                        v-model="props.userData[twoItem.value]"
                        class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                    >
                        <option
                            v-for="town in towns"
                            :key="town.id"
                            :value="town.id"
                        >
                            {{ town.name }}
                        </option>
                    </select>
                    <!-- Text -->
                    <input
                        v-else
                        :type="twoItem.typeInput"
                        :maxlength="twoItem.maxlength"
                        class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2.5 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                        v-model="props.userData[twoItem.value]"
                    />
                    <span
                        v-if="twoItem.showMessage"
                        class="text-red-500 text-sm"
                        >{{ twoItem.message }}</span
                    >
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-6">
            <button
                v-if="btnStatus"
                class="text-white bg-slate-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-not-allowed"
            >
                Guardar
            </button>
            <button
                v-else
                type="button"
                class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer"
                @click="submit()"
            >
                Guardar
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
import Swal from "sweetalert2";

const props = defineProps({
    userData: Object,
});
let referenceData = ref(JSON.parse(JSON.stringify(props.userData)));

const arrayDataUser = ref([
    {
        name: "Datos Personales",
        data: [
            {
                nameInput: "Nombre(s)",
                value: "user_first_name",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "false",
            },
            {
                nameInput: "Apellidos",
                value: "user_last_name",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "false",
            },
            {
                nameInput: "CURP",
                value: "CURP",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "18",
            },
        ],
    },
    {
        name: "Datos de Contacto",
        data: [
            {
                nameInput: "País",
                value: "user_country_id",
                message: "",
                showMessage: false,
                typeInput: "select",
                maxlength: "false",
            },
            {
                nameInput: "Estado",
                value: "user_state_id",
                message: "",
                showMessage: false,
                typeInput: "select",
                maxlength: "false",
            },
            {
                nameInput: "Ciudad / Municipio",
                value: "user_city_id",
                message: "",
                showMessage: false,
                typeInput: "select",
                maxlength: "false",
            },
            {
                nameInput: "Dirección",
                value: "user_address",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "false",
            },
            {
                nameInput: "Código Postal",
                value: "user_postal_code",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "5",
            },
            {
                nameInput: "Teléfono 1",
                value: "user_phone_number",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "10",
            },
            {
                nameInput: "Teléfono 2",
                value: "user_second_phone_number",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "10",
            },
            {
                nameInput: "Correo electrónico alternativo",
                value: "email_alternative",
                message: "",
                showMessage: false,
                typeInput: "text",
                maxlength: "false",
            },
            {
                nameInput: "Fecha de nacimiento",
                value: "user_date_of_birth",
                message: "",
                showMessage: false,
                typeInput: "date",
                maxlength: "false",
            },
        ],
    },
]);

const btnStatus = computed(() => {
    validation();
    let status = true;
    for (let i in props.userData) {
        if (
            i != "banner_photo_path" &&
            i != "profile_photo_path" &&
            i != "profile_photo_link" &&
            i != "updated_at"
        ) {
            if (props.userData[i] != referenceData.value[i]) status = false;
        }
    }
    return status;
});

let countrys = [{ id: 1, name: "México" }];

let states = ref([]);
let towns = ref([]);
let ejemplo = ref("");

async function getStates() {
    await axios
        .get("/list-states")
        .then((response) => {
            states.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
}

async function getTowns() {
    await axios
        .get("/list-towns/" + props.userData.user_state_id)
        .then((response) => {
            towns.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
}

watch(props.userData, async (item) => {
    console.log(item.user_state_id);
    await axios
        .get("/list-towns/" + item.user_state_id)
        .then((response) => {
            towns.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
});

watch(
    () => props.userData.user_state_id,
    () => {
        props.userData.user_city_id = "";
    }
);

// Validation
function validation() {
    let result = true;
    const regex = /^[0-9]+$/;
    // arrayDataUser.value.forEach(element => {
    //     element.data.forEach(item => {
    //         // Name - LastName - Address - State - City
    //         if (item.nameInput === 'Nombre(s)' || item.nameInput === 'Apellidos' || item.nameInput === 'Dirección' || item.nameInput === 'Estado' || item.nameInput === 'Ciudad / Municipio') {
    //             if ( !props.userData[item.value]) {
    //                 item.showMessage = true;
    //                 item.message = 'No se puede dejar vacío'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }else if (item.nameInput === 'CURP'){
    //         // CURP
    //             if ( !props.userData[item.value]) {
    //                 item.showMessage = true;
    //                 item.message = 'No se puede dejar vacío'
    //                 result = false
    //             }else if (props.userData[item.value].length != 18){
    //                 item.showMessage = true;
    //                 item.message = 'La CURD solo debe tener 18 caracteres'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }else if (item.nameInput === 'Código Postal'){
    //         // Postal code
    //             if (props.userData[item.value].length != 5) {
    //                 item.showMessage = true;
    //                 item.message = 'El C.P. solo debe de tener 5 números'
    //                 result = false
    //             }else if(isNaN(props.userData[item.value])){
    //                 item.showMessage = true;
    //                 item.message = 'Solo debes de incluir números'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }else if(item.nameInput === 'Teléfono 1' || item.nameInput === 'Teléfono 2'){
    //         // Phone
    //             if (!props.userData[item.value] || props.userData[item.value] === null) {
    //                 item.showMessage = false;
    //             }else if (props.userData[item.value].length != 10) {
    //                 item.showMessage = true;
    //                 item.message = 'El teléfono solo debe de tener 10 números'
    //                 result = false
    //             }else if(isNaN(props.userData[item.value])){
    //                 item.showMessage = true;
    //                 item.message = 'Solo debes de incluir números'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }else if (item.nameInput === 'Correo electrónico alternativo') {
    //         // Email
    //             if (!props.userData[item.value]) {
    //                 item.showMessage = true;
    //                 item.message = 'No se puede dejar vacío'
    //                 result = false
    //             }else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(props.userData[item.value]))){
    //                 item.showMessage = true;
    //                 item.message = 'Colocar un correo válido'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }else if (item.nameInput === 'Fecha de nacimiento') {
    //             if (!props.userData[item.value]) {
    //                 item.showMessage = true;
    //                 item.message = 'No se puede dejar vacío'
    //                 result = false
    //             }else{
    //                 item.showMessage = false;
    //             }
    //         }
    //     });
    // });
    return result;
}

async function submit() {
    if (validation()) {
        Inertia.post(
            route("user.updateData", props.userData.id),
            {
                _method: "patch",
                data: JSON.parse(JSON.stringify(props.userData)),
            },
            {
                onSuccess: () => {
                    Swal.fire(
                        "Actualizado!",
                        "El registro fue actualizado exitosamente!",
                        "success"
                    );
                    referenceData.value = JSON.parse(
                        JSON.stringify(props.userData)
                    );
                },
            }
        );
    } else {
        Swal.fire("Oops...!", "Algo salió mal, revise sus datos", "warning");
    }
}

onMounted(async () => {
    // console.log(props.user);
    await getStates();
    await getTowns();
});
</script>
