<template>
    <AppLayout title="Vacantes">
        <div class="min-h-screen pt-16 scroll-smooth">
            <VacantDetail :vacant="vacant"></VacantDetail>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "@/Layouts/UserLayout.vue";
import VacantDetail from "@/Pages/User/Vacancies/VacantDetail.vue";
import axios from 'axios'

import { defineComponent } from "vue";

export default defineComponent({
    components: {
        AppLayout,
        VacantDetail
    },
    props: {
        vacant: Object

    },
    data() {
        return {
        }
    },
    methods: {
    },
    created() {
    }
})

</script>

<style>

</style>
