<template>
    <AppLayout title="Perfil">
        <div class="min-h-screen scroll-smooth">
            <div class="pt-16 flex h-screen">
                <!-- Contenedor de chat -->
                <Transition name="slide-fade">
                    <!-- <div class="flex-none w-full lg:w-96"> -->
                    <div v-if="!chatSelected" class="flex-auto">
                        <!-- Lista de chats disponibles -->
                        <div class="flex flex-col max-h-full overflow-y-auto">
                            <!-- Chat -->
                            <div class="px-2 py-3 cursor-pointer flex border-b-2 hover:bg-[#5178BA] group"
                                v-for="(item, index) in chatsList" :key="index" @click="chatSelect(item)"
                                :class="item.class.length ? item.class[0] : ''">
                                <!-- Imagen de perfil -->
                                <div
                                    class="relative w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 cursor-pointer">
                                    <img class="w-full h-full object-cover" :src="item.photo" alt="user_profile_photo" />
                                </div>
                                <!-- Info -->
                                <div class="flex flex-auto flex-col justify-between pl-4 cursor-pointer">
                                    <div class="mt-2">
                                        <div class="flex justify-between">
                                            <div class="text-lg group-hover:text-white"
                                                :class="item.class.length ? item.class[1] : ''">
                                                <b>{{ item.name }}</b>
                                            </div>
                                            <div class="text-sm text-slate-500 group-hover:text-white"
                                                :class="item.class.length ? item.class[1] : ''">
                                                {{ formatDate(item.DateList) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-2">
                                        <span class="text-slate-500 group-hover:text-white"
                                            :class="item.class.length ? item.class[1] : ''">{{ showMessage(item) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </Transition>
                <!-- Contenedor de mensajes -->
                <Transition name="slide-fade">
                    <!-- <div v-if="chatSelected" class="flex-auto hidden lg:block"> -->
                    <div v-if="chatSelected" class="flex-auto">
                        <div v-if="chatSelected" class="h-full flex flex-col border-l-2 border-[#5178BA]">
                            <chatContainer ref="chatContainerComponent" v-if="chatSelected" :chatData="chatSelected"
                                :user="props.user" :tipoUser="props.tipoUser" @removeChat="removeChat()" />
                            <div v-if="false">
                                <div class="h-12 bg-[#2563EB] text-white flex justify-between items-center py-4">
                                    <div class="pl-4 flex items-center">
                                        <div class="rounded-full border-2 border-white p-2 cursor-pointer"
                                            @click="removeChat()">
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <b>{{ chatSelected.name }}</b>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="w-6 h-6 bg-green-800 rounded-full mr-6"></div>
                                    </div>
                                </div>
                                <div ref="msgerChat" class="overflow-y-auto overflow-x-hidden flex-grow"
                                    style="background-image: url('/storage/imageResouces/others/fondoChat100px.png');">
                                    <div v-for="(item, index) in contentMessages" :key="index">
                                        <!-- Mensaje del la persona con la se chatea -->
                                        <div v-if="item.typeuser !== tipoUser" class="flex items-end pl-3">
                                            <div
                                                class="relative min-w-12 w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                <img class="w-full h-full object-cover" :src="chatSelected.photo"
                                                    alt="user_profile_photo" />
                                            </div>
                                            <div class="bg-blue-300 m-2 p-4 rounded-r-lg rounded-tl-lg w-8/12">
                                                <div class="flex justify-start ">
                                                    {{ formatDate(item.created_at) }}
                                                </div>
                                                {{ item.content }}
                                            </div>
                                        </div>
                                        <!-- Mensaje del usuario que manda el mensaje -->
                                        <div v-else class="flex items-end flex-row-reverse pr-3">
                                            <div
                                                class="relative min-w-12 w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                <img class="w-full h-full object-cover" :src="user.profile_photo_path.replace(
                                                    'profile/',
                                                    '/storage/profile/'
                                                )
                                                    " alt="user_profile_photo" />
                                            </div>
                                            <div class="bg-gray-200 m-2 p-4 rounded-l-lg rounded-tr-lg w-8/12">
                                                <div class="flex justify-end ">
                                                    {{ formatDate(item.created_at) }}
                                                </div>
                                                {{ item.content }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h-16 max-h-32 flex items-center py-4">
                                    <div class="flex-auto">
                                        <textarea v-model="messageContainer" cols="30" rows="1"
                                            class="mx-6 w-11/12 border-2 border-black rounded-3xl p-2 resize-none h-auto"
                                            @keydown.enter="sentMessage(
                                                messageContainer,
                                                props.tipoUser,
                                                props.user,
                                                chatSelected
                                            )" />
                                    </div>
                                    <div class="flex-none p-2 border-[#2563EB] border-2 rounded-full mr-8 cursor-pointer hover:bg-[#2563EB]"
                                        @click="
                                            sentMessage(
                                                messageContainer,
                                                props.tipoUser,
                                                props.user,
                                                chatSelected
                                            )
                                            ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 text-[#2563EB] hover:text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else
                            class="h-full flex flex-col border-solid border-l-2 border-[#5178BA] justify-center items-center">
                            <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop" delay="1000"
                                colors="primary:#5178ba,secondary:#08a88a" stroke="35" style="width: 250px; height: 250px">
                            </lord-icon>

                            <span class="text-gray-500 text-base"><b>Selecciona una conversación</b></span>
                        </div>
                    </div>
                </Transition>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/UserLayout.vue";
import { ref, onMounted, watch, computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import chatContainer from "./chatContainer.vue";

const { datos } = usePage().props;

const props = defineProps({
    user: Object,
    tipoUser: String,
});
// ---------------------Const-----------------------------
const chatsList = ref([]);
const viewChat = ref(false);
const messageContainer = ref("");
const contentMessages = ref([]);
const msgerChat = ref(null);
const chatContainerComponent = ref(null);

// ---------------------computed-----------------------------
const chatSelected = computed(() => {
    const chat = chatsList.value.find((item) => item.class.length === 2);

    return chat;
});

// ---------------------Functions-----------------------------
async function getChats(id) {
    if (props.tipoUser === "company") {
        await axios.post("/company/chat/list-student", {
            id_company: id,
        })
            .then((response) => {
                console.log(response.data);
                chatsList.value = response.data.map((item) => {
                    return {
                        ...item,
                        photo: item.photo.replace("profile/", "/storage/profile/"),
                        class: (item.class = []),
                        DateList: item.messageDate ? item.messageDate : item.chatDate,
                    };
                });
            })
            .catch((error) => {
                console.log(error);
            });
    } else {
        await axios.post("/user/chat/list-company", {
            id_student: id,
        })
            .then((response) => {
                chatsList.value = response.data.map((item) => {
                    return {
                        ...item,
                        photo: item.photo.replace("profile/", "/storage/profile/"),
                        class: (item.class = []),
                        DateList: item.messageDate ? item.messageDate : item.chatDate,
                    };
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }

    chatsList.value.sort(compararFechas);
}
async function chatSelect(chat) {
    console.log(chat);
    const newSelect = chatsList.value.findIndex(
        (item) => item.chatId === chat.chatId
    );

    removeChat();

    // background css
    chatsList.value[newSelect].class.push("bg-[#5178BA]");
    // Text css
    chatsList.value[newSelect].class.push("text-white");

    // Obteniendo mensajes del chat
    // await getMessages(props.tipoUser, props.user, chatsList.value[newSelect]);
}

async function getMessages(typeUser, dataUser, idchat) {
    console.log("**************** FUNCIÓN GET MENSAJES ******************");
    console.log("Tipo de usuario");
    console.log(typeUser);
    console.log("Dasa del usuario logueado");
    console.log(dataUser);
    console.log("Chat seleccionado");
    console.log(idchat);

    // contentMessages.value = []

    // Obteniendo mensaje
    if (typeUser === "company") {
        await axios.post(route("company.getMessage"), {
            chatId: idchat
        })
            .then((res) => {
                console.log(res.data);
                contentMessages.value = res.data;
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    } else {
        await axios.post(route("user.getMessage"), {
            chatId: idchat
        })
            .then((res) => {
                console.log(res.data);
                contentMessages.value = res.data;
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    }

    // scrollBottom()
    chatContainerComponent.value.scrollBottom();
}
// Función para mandar mensajes
async function sentMessage(message, typeUser, dataUser, idchat) {
    console.log("**************** FUNCIÓN SENT MENSAJES ******************");
    console.log('id chat ' + chatSelected.value.chatId);
    if (!message) return;

    if (typeUser === "company") {
        await axios
            .post(route("company.sentMessage"), {
                message: message,
                idCompany: dataUser["id"],
                idchat: idchat["chatId"],
                typeUser: typeUser
            })
            .then((res) => {
                // console.log(res.data);
                contentMessages.value.push(res.data);
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    } else {
        await axios
            .post(route("user.sentMessage"), {
                message: message,
                idStudent: dataUser["id"],
                idchat: idchat["chatId"],
                typeUser: typeUser
            })
            .then((res) => {
                // console.log(res.data);
                contentMessages.value.push(res.data);
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    }

    // scrollBottom()
    chatContainerComponent.value.scrollBottom();

    messageContainer.value = "";
}
// Salir del chat
function removeChat() {
    const oldSelect = chatsList.value.findIndex(
        (item) => item.class.length === 2
    );
    if (oldSelect != -1) {
        chatsList.value[oldSelect].class = [];
    }
}
// Dar formato a la fecha
function formatDate(messageDateTime) {
    // Crear un objeto Date a partir del string ISO 8601
    const fechaHoraUtc = new Date(messageDateTime);

    // Configurar la zona horaria a México
    fechaHoraUtc.setUTCHours(fechaHoraUtc.getUTCHours());

    // Obtener los componentes de la fecha y hora
    const year = fechaHoraUtc.getFullYear();
    const month = fechaHoraUtc.getMonth() + 1; // Los meses en JavaScript comienzan en 0
    const day = fechaHoraUtc.getDate();
    const hours = fechaHoraUtc.getHours();
    const minutes = fechaHoraUtc.getMinutes();
    const seconds = fechaHoraUtc.getSeconds();

    // Formatear la fecha y hora
    const fechaHoraFormateada = `${year}-${pad(month)}-${pad(day)} ${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;

    return fechaHoraFormateada;
}

function scrollBottom() {
    // Scroll button
    msgerChat.value.scrollTop = msgerChat.value.scrollHeight;
}

// Función auxiliar para agregar un cero a los números menores a 10
function pad(number) {
    return number < 10 ? `0${number}` : number;
}

// Funcón para retornar el mensaje que se muestra en la vista de los chats
function showMessage(item) {
    // Se obtiene el mensaje
    let mensaje = ''
    if (item.tipeUserMessage) {
        mensaje = item.message
        if (item.message.length > 30) {
            mensaje = item.message.substring(0, 30) + '...'
        } else {
            mensaje = item.message
        }
    } else {
        mensaje = 'Chat vacío'
    }

    // Se obtiene la persona que lo mandó
    let person = ''
    if (item.tipeUserMessage) {
        if (item.tipeUserMessage === props.tipoUser) {
            person = 'Yo:'
        } else {
            person = item.name.split(" ")[0] + ':'
        }
    }

    return person + ' ' + mensaje
}

// Función de comparación personalizada
function compararFechas(a, b) {
    var fechaA = new Date(a.DateList);
    var fechaB = new Date(b.DateList);

    return fechaB - fechaA;
}

onMounted(async () => {

    await getChats(props.user.id);
    // console.log("prop user");
    // console.log(props.user);
    // console.log("tipoUser");
    // console.log(props.tipoUser);
    // console.log(chatsList.value);
});
</script>

<style>
.slide-fade-enter-active {
    transition: all 0.1s ease-out;
}

.slide-fade-leave-active {
    transition: all 0.1s ease-out;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(20px);
    opacity: 0;
}
</style>
