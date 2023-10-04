<template>
    <AppLayout title="Perfil">
        <div class="min-h-screen scroll-smooth">
            <div class="pt-16 flex h-screen">
                <!-- Contenedor de chat -->
                <Transition name="slide-fade">
                    <!-- <div class="flex-none w-full lg:w-96"> -->
                    <div v-if="!chatSelected" class="flex-auto">
                        <!-- Lista de chats disponibles -->
                        <div class="contenedorScroll flex flex-col max-h-full overflow-y-auto">
                            <!-- Chat -->
                            <div class="px-2 py-3 cursor-pointer flex border-b-2 hover:bg-[#5178BA] group"
                                v-for="(item, index) in chatsList" :key="index" @click="chatSelect(item), item.readDate = true"
                                :class="(item.class.length ? item.class[0] : '') + (item.messageDate != null && item.readDate === null && props.tipoUser != item.tipeUserMessage ? ' bg-[#5178BA] ' : '')" >
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
                                                :class="(item.class.length ? item.class[1] : '') + (item.messageDate != null && item.readDate === null && props.tipoUser != item.tipeUserMessage ? ' text-white' : '')">
                                                <b>{{ item.name }} 
                                                    <lord-icon
                                                        v-show="item.messageDate != null && item.readDate === null"
                                                        class="ml-4"
                                                        src="https://cdn.lordicon.com/msetysan.json"
                                                        trigger="loop"
                                                        delay="500"
                                                        colors="primary:#ffffff"
                                                        state="loop"
                                                        style="width:20px;height:20px">
                                                    </lord-icon>
                                                </b>
                                            </div>
                                            <div class="text-sm text-slate-500 group-hover:text-white"
                                                :class="(item.class.length ? item.class[1] : '') + (item.messageDate != null && item.readDate === null && props.tipoUser != item.tipeUserMessage ? ' text-white' : '')">
                                                {{ formatDate(item.DateList) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-2">
                                        <span class="text-slate-500 group-hover:text-white"
                                            :class="(item.class.length ? item.class[1] : '') + (item.messageDate != null && item.readDate === null && props.tipoUser != item.tipeUserMessage ? ' text-white' : '')">{{ showMessage(item) }}</span>
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
                                :user="props.user" :tipoUser="props.tipoUser" @removeChat="removeChat()" @updateChatList="updateChatList" />
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
    const newSelect = chatsList.value.findIndex(
        (item) => item.chatId === chat.chatId
    );

    removeChat();

    // background css
    chatsList.value[newSelect].class.push("bg-[#5178BA]");
    // Text css
    chatsList.value[newSelect].class.push("text-white");

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

    const fechaHora = new Date(messageDateTime);
    fechaHora.setHours(fechaHora.getHours() - 1);

    const fechaActual = new Date();
    const esMismoDia = fechaHora.getDate() === fechaActual.getDate() && fechaHora.getMonth() === fechaActual.getMonth() && fechaHora.getFullYear() === fechaActual.getFullYear();

    if (esMismoDia) {
        const hora = fechaHora.toLocaleTimeString('es-MX');
        return hora;
    } else {
        const fecha = `${fechaHora.getDate()}-${fechaHora.getMonth() + 1}-${fechaHora.getFullYear()}`;
        return fecha;
    }

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

// Función para actualizar los chats
function updateChatList(id, message, date, typeUser, readMessage) {

    const fechaHora = new Date(date);
    fechaHora.setHours(fechaHora.getHours() + 1);

    const indexChat = chatsList.value.findIndex(item => item.chatId === id)

    chatsList.value[indexChat].message = message
    chatsList.value[indexChat].DateList = fechaHora
    chatsList.value[indexChat].tipeUserMessage = typeUser
    chatsList.value[indexChat].readDate = readMessage

    chatsList.value.sort(compararFechas);
}

// Websocket para recibir las notificaciones de nuevos mensajes
window.Echo.join(`user-messages.${parseInt((props.tipoUser === 'company' ? '1' : '2') + props.user.id, 10)}`)
    .listen(".UserMessagesEvent", (e) => {
        // Revisar tipo de usuario
        updateChatList(e.message.chat_id, e.message.content, e.message.created_at, e.message.typeuser, e.message.readDate)
    });

onMounted(async () => {

    await getChats(props.user.id);

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
