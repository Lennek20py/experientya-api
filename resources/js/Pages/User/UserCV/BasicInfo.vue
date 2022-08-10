<template>
    
<div class="w-full h-auto bg-white rounded-lg border border-gray-200 shadow-m lg:w-3/5 xl:w-[35rem]  xl:w-4xl">
    <div class="flex justify-end px-4 pt-4">
    </div>
    <div class="text-3xl mx-auto font-bold md:text-gray-900 text-center lg:text-4xl py-2">
        <h3>Información Básica</h3>
    </div>
    <div class="flex flex-col items-center pb-10 pt-7 mx-10 md:mx-7">
        <img class="mb-3 w-32 h-32 rounded-full shadow-lg md:w-36 md:h-36" :src="$page.props.user.profile_photo_path.replace('profile/', 'storage/profile/')" alt="Bonnie image">
        <h5 class="mb-1 text-xl font-semibold text-gray-900 lg:text-xl text-center">{{$page.props.user.user_first_name}} {{$page.props.user.user_last_name}}</h5>
        <span class="text-base text-center font-medium text-gray-500 lg:text-lg" v-for="states in state" :key="states.id">{{states.town_name}}, {{states.state_name}}</span>
        <div class="flex mt-4 space-x-3 lg:mt-6 items-center">
            <a href="#" class="inline-flex items-center py-2 text-sm font-medium text-center text-gray-600 bg-white rounded-lg hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-20"><svg class="w-6 h-6 items-center text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 21h7a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v11m0 5l4.879-4.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242z"></path></svg> Previsualizar CV</a>
        </div>
    </div>
</div>

</template>

<script>
import axios from 'axios';
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/UserLayout.vue";
export default {
    props: {
        user: Object,
    },
    components: { AppLayout },
    data: function() {
        return {
            state: {},
            user: this.$inertia.form({}),
        }
    },
    methods: {
        async getTownInfo() {
            await axios.get("town/2196")
            .then((response) => {
                this.state = response.data;
            }).catch((error) => {
          console.log(error);
        });
        }
    },
    created() {
        this.getTownInfo();
    }
};
</script>

<style>
</style>