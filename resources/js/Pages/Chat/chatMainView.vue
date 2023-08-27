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
                            <div
                                class="px-2 py-3 cursor-pointer flex border-b-2 hover:bg-[#5178BA] group"
                                v-for="(item, index) in chatsList"
                                :key="index"
                                @click="chatSelect(item)"
                                :class="item.class.length ? item.class[0] : ''"
                            >
                                <!-- Imagen de perfil -->
                                <div
                                    class="relative w-20 h-20 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 cursor-pointer"
                                >
                                    <img
                                        class="w-full h-full object-cover"
                                        :src="item.photo"
                                        alt="user_profile_photo"
                                    />
                                </div>
                                <!-- Info -->
                                <div
                                    class="flex flex-auto flex-col justify-between pl-2 cursor-pointer"
                                >
                                    <div class="mt-2">
                                        <div class="flex justify-between">
                                            <div
                                                class="text-lg group-hover:text-white"
                                                :class="
                                                    item.class.length
                                                        ? item.class[1]
                                                        : ''
                                                "
                                            >
                                                <b>{{ item.name }}</b>
                                            </div>
                                            <div
                                                class="text-sm text-slate-500 group-hover:text-white"
                                                :class="
                                                    item.class.length
                                                        ? item.class[1]
                                                        : ''
                                                "
                                            >
                                                06/08/2023
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-2">
                                        <span
                                            class="text-slate-500 group-hover:text-white"
                                            :class="
                                                item.class.length
                                                    ? item.class[1]
                                                    : ''
                                            "
                                            >Como te va</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </Transition>
                <Transition name="slide-fade">
                    <!-- Contenedor de mensajes -->
                    <!-- <div v-if="chatSelected" class="flex-auto hidden lg:block"> -->
                    <div v-if="chatSelected" class="flex-auto">
                        <div
                            v-if="chatSelected"
                            class="h-full flex flex-col border-l-2 border-[#5178BA]"
                        >
                            <div
                                class="h-12 bg-[#2563EB] text-white flex justify-between items-center py-4"
                            >
                                <div class="pl-4 flex items-center">
                                    <div
                                        class="rounded-full border-2 border-white p-2 cursor-pointer"
                                        @click="removeChat()"
                                    >
                                        <svg
                                            class="w-4 h-4 text-gray-800 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 14 10"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 5H1m0 0 4 4M1 5l4-4"
                                            />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <b>{{ chatSelected.name }}</b>
                                    </div>
                                </div>
                                <div>
                                    <div
                                        class="w-6 h-6 bg-green-800 rounded-full mr-6"
                                    ></div>
                                </div>
                            </div>
                            <div
                                class="overflow-y-auto flex-grow"
                                style="
                                    background-image: url('/storage/imageResouces/others/fondoChat100px.png');
                                "
                            >
                                <!-- Mensaje prueba 1 -->
                                <div
                                    class="flex p-2 items-end"
                                    v-for="item in 5"
                                    :key="item"
                                >
                                    <div
                                        class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
                                    >
                                        <img
                                            class="w-full h-full object-cover"
                                            :src="chatSelected.photo"
                                            alt="user_profile_photo"
                                        />
                                    </div>
                                    <div
                                        class="bg-blue-300 m-2 p-4 rounded-r-lg rounded-tl-lg w-8/12"
                                    >
                                        Lorem ipsum dolor, sit amet consectetur
                                        adipisicing elit. Quod, vel sapiente
                                        beatae quos cum corrupti! Quis, officia
                                        quaerat impedit rem voluptatem tempore
                                        repudiandae iure recusandae laborum quae
                                        incidunt odit voluptate, fugiat alias,
                                        rerum consequatur? Odio eaque facilis
                                        consectetur, exercitationem ut nesciunt
                                        vitae quos harum, blanditiis doloremque
                                        qui dignissimos accusantium ex?
                                    </div>
                                </div>
                                <!-- Mensaje prueba 2 -->
                                <div
                                    class="flex flex-row-reverse p-2 items-end"
                                    v-for="item in 5"
                                    :key="item"
                                >
                                    <div
                                        class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600"
                                    >
                                        <img
                                            class="w-full h-full object-cover"
                                            src="https://www.nobbot.com/wp-content/uploads/2021/12/perfil-1024x754.jpg"
                                            alt="user_profile_photo"
                                        />
                                    </div>
                                    <div
                                        class="bg-gray-200 m-2 p-4 rounded-l-lg rounded-tr-lg w-8/12"
                                    >
                                        Lorem ipsum dolor, sit amet consectetur
                                        adipisicing elit. Quod, vel sapiente
                                        beatae quos cum corrupti! Quis, officia
                                        quaerat impedit rem voluptatem tempore
                                        repudiandae iure recusandae laborum quae
                                        incidunt odit voluptate, fugiat alias,
                                        rerum consequatur? Odio eaque facilis
                                        consectetur, exercitationem ut nesciunt
                                        vitae quos harum, blanditiis doloremque
                                        qui dignissimos accusantium ex?
                                    </div>
                                </div>
                                {{ chatSelected }}
                            </div>
                            <div class="h-16 max-h-32 flex items-center py-4">
                                <div class="flex-auto">
                                    <textarea
                                        cols="30"
                                        rows="1"
                                        class="mx-6 w-11/12 border-2 border-black rounded-3xl p-2 resize-none h-auto"
                                    ></textarea>
                                </div>
                                <div
                                    class="flex-none p-2 border-[#2563EB] border-2 rounded-full mr-8 cursor-pointer hover:bg-[#2563EB]"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="w-6 h-6 text-[#2563EB] hover:text-white"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div
                            v-else
                            class="h-full flex flex-col border-solid border-l-2 border-[#5178BA] justify-center items-center"
                        >
                            <lord-icon
                                src="https://cdn.lordicon.com/zpxybbhl.json"
                                trigger="loop"
                                delay="1000"
                                colors="primary:#5178ba,secondary:#08a88a"
                                stroke="35"
                                style="width: 250px; height: 250px"
                            >
                            </lord-icon>

                            <span class="text-gray-500 text-base"
                                ><b>Selecciona una conversación</b></span
                            >
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

const { datos } = usePage().props;

const props = defineProps({
    user: Object,
    tipoUser: String,
    infoChat: String,
});

// ---------------------Const-----------------------------
const chatsList = ref([]);
const viewChat = ref(false);

// ---------------------computed-----------------------------
const chatSelected = computed(() => {
    const chat = chatsList.value.find((item) => item.class.length === 2);

    return chat;
});

// ---------------------Functions-----------------------------
async function getChatsCompany(id) {
    await axios
        .post("/company/chat/list-student", {
            id_company: id,
        })
        .then((response) => {
            chatsList.value = response.data.map((item) => {
                return {
                    ...item,
                    photo: item.photo.replace("profile/", "/storage/profile/"),
                    class: (item.class = []),
                };
            });
        })
        .catch((error) => {
            console.log(error);
        });
}
function chatSelect(chat) {
    console.log(chat);
    const newSelect = chatsList.value.findIndex(
        (item) => item.chatId === chat.chatId
    );

    removeChat();

    // background css
    chatsList.value[newSelect].class.push("bg-[#5178BA]");
    // Text css
    chatsList.value[newSelect].class.push("text-white");
}

function removeChat() {
    const oldSelect = chatsList.value.findIndex(
        (item) => item.class.length === 2
    );
    if (oldSelect != -1) {
        chatsList.value[oldSelect].class = [];
    }
}

onMounted(async () => {
    if (props.tipoUser === "company") {
        await getChatsCompany(props.user.id);
    }
    console.log("prop user");
    console.log(props.user);
    console.log("tipoUser");
    console.log(props.tipoUser);
    console.log("infoChat");
    console.log(props.infoChat);
    console.log("chatsList.value");
    console.log(chatsList.value);
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
