<template>
    <AppLayout title="Perfil">
        <template #header>
            
            <div class="2 mb-12 ">
                <div>
                    <div class="w-full h-60 content-end">
                        <img class="w-full h-full object-cover" :src="photoBanner" alt="Imagen de fondo">
                        
                    </div>
                    <div class="flex justify-end container-btn-update-banner p-2">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-2 relative overflow-hidden ml-2 " @click="changeImg(2)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                        </button>
                        <input
                                ref="inputImgBanner"
                                type="file"
                                id="banner_photo_path"
                                name="banner_photo_path"
                                class="hidden"
                                @change="onFileSelectedBanner"
                            />
                    </div>
                    <div class="flex justify-center container-img">
                        <div class="relative w-40 h-40 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 border-2 border-solid">
                            <img class="w-full h-full object-cover" :src="photoProfile"
                                                        :alt="$page.props.user.user_first_name">
                        </div>
                    </div>
                    <div class="flex justify-center container-btn-update-profile">
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-2 relative overflow-hidden ml-2" @click="changeImg(1)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                            </svg>
                        </button>
                        <input
                                ref="inputImg"
                                type="file"
                                id="profile_photo_path"
                                name="profile_photo_path"
                                class="hidden"
                                @change="onFileSelected"
                            />
                    </div>
                </div>
            </div>
            <!-- Tabs -->
            <tabs :arrayButtons="arrayButtons" class="mb-12">
                <template #tabOne>
                    <userData :userData="props.user"/>
                </template>
                <template #tabTwo>
                    <div>
                        <span>
                            Asegúrese de que su cuenta esté utilizando una contraseña larga y aleatoria para mantenerse seguro.
                        </span>
                    </div>
                </template>
                <template #tabThree>
                    <div>
                        <span>
                            Agregue seguridad adicional a su cuenta utilizando la autenticación de dos factores.
                        </span>
                    </div>
                </template>
                <template #tabFour>
                    <div>
                        <span>
                            Administre e inicie sesión en sus sesiones activas en otros navegadores y dispositivos.
                        </span>
                    </div>
                </template>
                <template #tabFive>
                    <div>
                        <span>
                            Elimine permanentemente su cuenta.
                        </span>
                    </div>
                </template>
            </tabs>

            <!-- ----------Modals---------- -->
            <transition name="fade">
                <!-- Profile -->
                <ModalComponent v-if="modal === 1" :title="'Foto de Perfil'" :styleModal="'max-w-2xl lg:w-2/6 w-3/6'" @closeMod="closeModal(), resetImg(1)" @clickSave="sendPhoto(1)">
                    <template #contenido>
                        <div>
                            <div class="flex justify-center ">
                                <div class="relative w-40 h-40 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 border-2 border-solid">
                                    <img class="w-full h-full object-cover" :src="photoProfile"
                                                                :alt="$page.props.user.user_first_name">
                                </div>
                            </div>
                        </div>
                    </template>
                </ModalComponent>
                <!-- Banner -->
                <ModalComponent v-else-if="modal === 2" :title="'Banner'" :styleModal="'max-w-2xl lg:w-2/6 w-3/6'" @closeMod="closeModal(), resetImg(2)" @clickSave="sendPhoto(2)">
                    <template #contenido>
                        <div>
                            <div class="flex justify-center ">
                                <div class="w-full h-60 content-end">
                                    <img class="w-full h-full object-cover" :src="photoBanner" alt="Imagen de fondo">
                                </div>
                            </div>
                        </div>
                    </template>
                </ModalComponent>
            </transition>
        </template>
    </AppLayout>
    
</template>

<script setup>

import AppLayout from '@/Layouts/UserLayout.vue';
import { ref, onMounted, watch, computed  } from 'vue'
import  tabs from '@/CustomComponents/Tabs.vue'
import  ModalComponent from '@/CustomComponents/ModalComponent.vue'
import  userData from '@/Pages/User/Profile/UserData.vue'
import { Inertia } from '@inertiajs/inertia'
import axios from 'axios';
import Swal from 'sweetalert2';


const props = defineProps({
    user: Object,
    cvId: Object
})
console.log(props.user);
// ------------Variables
// Modals
const modal = ref(0)

// image profile path
let photoProfile = ref(props.user.profile_photo_path.replace('profile/', 'storage/profile/'));

// image banner path
let photoBanner = ref(props.user.banner_photo_path.replace('banner/', 'storage/banner/'));
const newPhoto = props.user.banner_photo_path === 'banner/banner-default.png' ? false : true

// Photo
let imgProfileData = ref()

// ------------References
// Input file
const inputImg = ref(null)
const inputImgBanner = ref(null)

// ------------Arays
// Tabs info
let arrayButtons = ref([
    {name:'información del perfil', value: 1, class:'border-current text-teal-600', referencia: 'tabOne'},
    {name:'Actualiza contraseña', value: 2, class:'', referencia: 'tabTwo'},
    {name:'Autenticación', value: 3, class:'', referencia: 'tabThree'},
    // {name:'Sesiones del navegador', value: 4, class:'', referencia: 'tabFour'},
    {name:'Eliminar cuenta', value: 5, class:'', referencia: 'tabFive'},
])

// ------------ Functions
// Modals
function closeModal(){
    modal.value = 0;
}

// Image change Profile
function onFileSelected(e) {
    if (e.target.files[0]) {
        imgProfileData.value = e.target.files[0]
        photoProfile.value = URL.createObjectURL(e.target.files[0])
        modal.value = 1
    }else{
        photoProfile.value = props.user.profile_photo_path.replace('profile/', 'storage/profile/')
    }
}

// Image change Banner
function onFileSelectedBanner(e) {
    if (e.target.files[0]) {
        imgProfileData.value = e.target.files[0]
        photoBanner.value = URL.createObjectURL(e.target.files[0])
        modal.value = 2
    }else{
        photoBanner.value = props.user.banner_photo_path.replace('profile/', 'storage/profile/')
    }
}
// Active input file
function changeImg(modal){
    if (modal === 1) {
        inputImg.value.click();
    }else{
        inputImgBanner.value.click();
    }
    
}

async function sendPhoto(photo){
    console.log(imgProfileData.value);
    if (photo === 1) {
        Inertia.post(`/user/photo/${props.user.id}`, {
                _method: 'put',
                profile_photo_path: imgProfileData.value,
            },
            {
                onSuccess: () => {
                    modal.value = 0;
                    imgProfileData.value = '';
                    Swal.fire(
                        'Actualizado!',
                        'Tu foto de perfil fue actualizada exitosamente!',
                        'success'
                    );
                }
            }
        )
    }else{
        Inertia.post(`/user/photo/${props.user.id}`, {
                _method: 'put',
                banner_photo_path: imgProfileData.value,
                newPhoto: newPhoto,
            },
            {
                onSuccess: () => {
                    modal.value = 0;
                    imgProfileData.value = '';
                    Swal.fire(
                        'Actualizado!',
                        'Tu foto del banner fue actualizada exitosamente!',
                        'success'
                    );
                }
            }
        )
    }
    
    // await axios.put(route('user.updatePhoto', props.user.id), imgProfileData.value,
    // {
    //     headers: {
    //         'Content-Type': 'multipart/form-data'
    //     }
    // })
    //     .then((response) => {
    //         console.log(response.data);
    //         Swal.fire(
    //             'Actualizado!',
    //             'El registro fue actualizado exitosamente!',
    //             'success'
    //         );
    //     }).catch((error) => {
    //         console.log(error)
    //     })
}

function resetImg(modal){
    imgProfileData.value = ''
    if (modal === 1) {
        photoProfile.value = props.user.profile_photo_path.replace('profile/', 'storage/profile/');
        document.getElementById("profile_photo_path").value = ''
    }else{
        photoBanner.value = props.user.banner_photo_path.replace('banner/', 'storage/banner/');
        document.getElementById("banner_photo_path").value = ''
    }
}
    

</script>
<style scoped>
input:focus {
  border: none !important;
}
.container-img{
    margin-top: -5rem !important;
}
.container-btn-update-profile{
    margin-top: -1.5rem !important;
}
.container-btn-update-banner{
    margin-top: -3.4rem !important;
}

/* Style transition */
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0
}
</style>
