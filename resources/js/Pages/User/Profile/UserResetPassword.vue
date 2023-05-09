<template>
    <div>
        <div v-for="(item, index) in arrayPasswords" :key="index" class="mt-3">
            <span
                class=" text-sm font-medium text-slate-700 after:ml-0.5 ml-3 bg-white pr-2">{{ item.text }}
            </span>
            <div 
                class="flex flex-nowrap justify-center align-middle mt-1 border-2 rounded-md">
                <input v-if="!item.show" id="password" type="password"
                    minlength="6"
                    autocomplete="current-password"
                    @blur="index === 0 ? currentPassword(item.password) : newPassword(index)"
                    class=" w-full bg-transparent border-none px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none  sm:text-sm z-0"
                    v-model="item.password" />
                <input v-else id="password" type="text" minlength="6"
                    autocomplete="current-password"
                    @blur="index === 0 ? currentPassword(item.password) : newPassword(index)"
                    class=" w-full bg-transparent border-none px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none sm:text-sm z-0"
                    v-model="item.password" />
                <div @click="item.show = !item.show"
                    class="h-full self-center border-l-2 px-2 cursor-pointer focus:bg-slate-700">
                    <svg v-if="!item.show" aria-hidden="true" fill="none"
                        stroke="currentColor" class="w-6 h-6 text-gray-500"
                        stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <svg v-else fill="none" stroke="currentColor" stroke-width="1.5"
                        class="w-6 h-6 text-gray-500" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88">
                        </path>
                    </svg>
                </div>
            </div>
            <span v-if="item.messageError" class="text-red-500 text-sm"> {{ item.messageError }}</span>
        </div>
        <div class="flex justify-end mt-6">
            <button v-if="btnStatus" class="text-white bg-slate-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 cursor-not-allowed">
                Guardar
            </button>
            <button v-else type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 cursor-pointer" @click="updatePassword()">
                Guardar
            </button>
        </div>
    </div>
</template>

<script setup>
    import {ref, computed, onMounted, watch} from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import axios from 'axios';
    import Swal from 'sweetalert2';

    const props = defineProps({
        userData: Object
    })

    const arrayPasswords = ref([
        {password: '', show: false, text: ' Contraseña actual', messageError:''},
        {password: '', show: false, text: ' Nueva contraseña', messageError:''},
        {password: '', show: false, text: ' Repetir nueva contraseña', messageError:''},
    ])

    const btnStatus = computed(()=>{
        if (arrayPasswords.value[0].password.length >= 8 && arrayPasswords.value[1].password.length >= 8 && arrayPasswords.value[1].password === arrayPasswords.value[2].password) {
            return false
        }
        return true
    })

    // Functions
    // Current password
    function currentPassword(dato){
        if (dato.length < 8) {
            arrayPasswords.value[0].messageError = 'La contraseña es de mínimo 8 caracteres'
        }else{
            arrayPasswords.value[0].messageError = ''
        }
    }
    // New password
    function newPassword(index){
        if (arrayPasswords.value[index].password.length < 8) {
            arrayPasswords.value[index].messageError = 'La contraseña es de mínimo 8 caracteres'
        }else{
            arrayPasswords.value[index].messageError = ''
        }
        switch (index) {
            case 1:
                if (arrayPasswords.value[2].password.length >= 8) {
                    if (arrayPasswords.value[1].password != arrayPasswords.value[2].password) {
                        arrayPasswords.value[1].messageError = 'Las contraseñas no coinciden'
                        arrayPasswords.value[2].messageError = 'Las contraseñas no coinciden'
                    }else{
                        arrayPasswords.value[1].messageError = ''
                        arrayPasswords.value[2].messageError = ''
                    }
                    
                }
                break;
            case 2:
                if (arrayPasswords.value[1].password.length >= 8) {
                    if (arrayPasswords.value[1].password != arrayPasswords.value[2].password) {
                        arrayPasswords.value[1].messageError = 'Las contraseñas no coinciden'
                        arrayPasswords.value[2].messageError = 'Las contraseñas no coinciden'
                    }else{
                        arrayPasswords.value[1].messageError = ''
                        arrayPasswords.value[2].messageError = ''
                    }
                    
                }
                break;
        
            default:
                break;
        }
    }

    async function updatePassword(){
        if (arrayPasswords.value[1].password.length >= 8 && arrayPasswords.value[1].password === arrayPasswords.value[2].password) {
            await axios.patch(route('user.updatePassword', props.userData), arrayPasswords.value,)
                .then((response) => {
                    console.log(response.data);
                    if (response.data) {
                        Swal.fire(
                            'Actualizado!',
                            'El registro fue actualizado exitosamente!',
                            'success'
                        );
                        for (let index = 0; index < arrayPasswords.value.length; index++) {
                            const element = arrayPasswords.value[index];
                            element.password = ''
                            element.messageError = ''
                        }
                    }else{
                        Swal.fire(
                            'Error!',
                            'La contraseña actual no es la correcta!',
                            'error'
                        );
                        arrayPasswords.value[0].password = ''
                        arrayPasswords.value[0].messageError = 'La contraseña no es la correcta'
                    }
                    
                }).catch((error) => {
                    console.log(error)
                })
        }
        
    }
</script>

<style scoped>
.ejemploBordeInput:focus{
    border: none !important;
    outline: none !important;
}
</style>