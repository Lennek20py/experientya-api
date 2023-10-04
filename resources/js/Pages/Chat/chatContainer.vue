<template>
    <div class="container-chat-messages h-full flex flex-col border-l-2 border-[#5178BA]">
        <div class="h-12 bg-[#2563EB] text-white flex justify-between items-center py-4">
            <div class="pl-4 flex items-center">
                <div class="rounded-full border-2 border-white p-2 cursor-pointer" @click="removeChat()">
                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 5H1m0 0 4 4M1 5l4-4" />
                    </svg>
                </div>
                <div class="ml-4">
                    <b>{{ props.chatData.name }}</b>

                    <lord-icon v-show="mostrarEscribiendo" class="ml-2" src="https://cdn.lordicon.com/hpivxauj.json"
                        trigger="loop" delay="500" colors="primary:#ffffff" style="width:20px;height:20px">
                    </lord-icon>
                </div>
            </div>
            <div>
                <div :class="'w-6 h-6 rounded-full mr-6 ' + statusChat"></div>
                <!-- bg-green-800 -->
                <!-- bg-red-800 -->
            </div>
        </div>
        <div ref="containerMenssages" class="contenedorScroll overflow-y-auto overflow-x-hidden flex-grow"
            style="background-image: url('/storage/imageResouces/others/fondoChat100px.png');">
            <div v-for="(item, index) in contentMessages" :key="index">
                <!-- Mensaje del la persona con la se chatea -->
                <div v-if="item.typeuser !== tipoUser" class="flex items-end pl-3">
                    <div class="relative min-w-12 w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <img class="w-full h-full object-cover" :src="props.chatData.photo" alt="user_profile_photo" />
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
                    <div class="relative min-w-12 w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
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
                    class="mx-6 w-11/12 border-2 border-black rounded-3xl p-2 resize-none h-auto" @keydown.enter="sentMessage(
                        messageContainer,
                        props.tipoUser,
                        props.user,
                        props.chatData
                    )" :change="sendTypingEvent()" />
            </div>
            <div class="flex-none p-2 border-[#2563EB] border-2 rounded-full mr-8 cursor-pointer hover:bg-[#2563EB]" @click="
                sentMessage(
                    messageContainer,
                    props.tipoUser,
                    props.user,
                    props.chatData
                )
                ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-[#2563EB] hover:text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
            </div>
        </div>
    </div>
</template>

<script setup >
import { ref, onMounted, watch, computed, onBeforeUnmount } from "vue";

const props = defineProps({
    chatData: Object,
    user: Object,
    tipoUser: String,
});

const emit = defineEmits(['removeChat', 'updateChatList'])

// -----------------Const-----------------
const containerMenssages = ref(null);
const contentMessages = ref([]);
const messageContainer = ref("");
const statusChat = ref('bg-red-800')
// Constante para resetear el tiempo de espera
const typingTimer = ref(false);
// Constante para mostrar el texto de escribiendo
const mostrarEscribiendo = ref(false);
// Bandera para el watch de los mensajes
const banderaContentMessages = ref(false);

const leaveChannel = () => {
    window.Echo.leave(`chat-message.${props.chatData ? props.chatData.chatId : '0'}`);
};

// -----------------Watch-----------------
watch(() => props.chatData, async () => {

    await getMessages(props.tipoUser, props.user, props.chatData.chatId)
}, { immediate: true })

watch(contentMessages, () => {
    scrollBottom()
})

// -----------------Functions-----------------
async function getMessages(typeUser, dataUser, idchat) {
    // contentMessages.value = []

    // Obteniendo mensaje
    if (typeUser === "company") {
        // Obtener mensajes
        await axios.post(route("company.getMessage"), {
            chatId: idchat
        })
            .then((res) => {
                contentMessages.value = res.data;
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
        // Marcar como leido los mensajes no leidos
        await axios.post(route("company.readAllMessages"), {
            chatId: idchat,
            typeUser: typeUser
        })
            .then((res) => {

            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    } else {
        // Obtener mensajes
        await axios.post(route("user.getMessage"), {
            chatId: idchat
        })
            .then((res) => {
                contentMessages.value = res.data;
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
        // Marcar como leido los mensajes no leidos
        await axios.post(route("user.readAllMessages"), {
            chatId: idchat,
            typeUser: typeUser
        })
            .then((res) => {

            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    }

    scrollBottom()
}

// Función para mandar mensajes
async function sentMessage(message, typeUser, dataUser, idchat) {
    if (!message) return;

    let userActivo = false
    let idChanelUser = props.tipoUser === 'company' ? '2' : '1'
    if (statusChat.value === 'bg-green-800') {
        userActivo = true
    }

    if (typeUser === "company") {
        await axios
            .post(route("company.sentMessage"), {
                message: message,
                idCompany: dataUser["id"],
                idchat: idchat["chatId"],
                typeUser: typeUser,
                idChanelUser: parseInt(idChanelUser + props.chatData.id, 10),
                statusUser: statusChat.value === 'bg-green-800' ? true : false
            })
            .then((res) => {
                addMessage(res.data)
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
                typeUser: typeUser,
                idChanelUser: parseInt(idChanelUser + props.chatData.id, 10),
                statusUser: statusChat.value === 'bg-green-800' ? true : false
            })
            .then((res) => {
                addMessage(res.data)
            })
            .catch((error) => {
                console.log("Ha ocurrido un error");
                console.log(error);
            });
    }

    // scrollBottom()

    messageContainer.value = "";
}

function removeChat() {
    emit('removeChat');
}

function scrollBottom() {
    // Scroll button
    containerMenssages.value.scrollTop = containerMenssages.value.scrollHeight;
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

// Función auxiliar para agregar un cero a los números menores a 10
function pad(number) {
    return number < 10 ? `0${number}` : number;
}

// Función para agregar un nuevo mensaje
async function addMessage(message) {
    await contentMessages.value.push(message);
    emit('updateChatList', message.chat_id, message.content, message.created_at, message.typeuser, message.readDate)
    scrollBottom()
}

function sendTypingEvent() {
    window.Echo.join(`chat-message.${props.chatData ? props.chatData.chatId : '0'}`).whisper(
        "typing",
        messageContainer.value.length
    );
}

// Laravel Echo
window.Echo.join(`chat-message.${props.chatData ? props.chatData.chatId : '0'}`)
    .listen(".MessageEvent", (e) => {

        addMessage(e.message)

        scrollBottom()
    })
    .listen('.pusher:subscription_error', (error) => {
        console.log('Error de suscripción al canal:', error);
    })// Obtiene los usuarios activos
    .here((users) => {
        const result = users.filter((user) => user.email !== props.user.email);

        if (result.length > 0) {
            statusChat.value = "bg-green-800";
        }
    })
    // Obtiene los usuarios que entran
    .joining((user) => {
        if (user.email !== props.user.email) {
            statusChat.value = "bg-green-800";
        }
    })
    // Obtienen los usuarios que salen
    .leaving((user) => {
        if (user.email !== props.user.email) {
            statusChat.value = "bg-red-800";
        }
    }).listenForWhisper("typing", (e) => {
        if (e > 0) {
            mostrarEscribiendo.value = true;
        }
        if (typingTimer.value) {
            clearTimeout(typingTimer.value);
        }

        typingTimer.value = setTimeout(() => {
            mostrarEscribiendo.value = false;
            typingTimer.value = false;
        }, 2000);
    });

onBeforeUnmount(() => {
    leaveChannel();
});
</script>

<style></style>