<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div>
                            <img class="h-32 w-full object-cover lg:h-48 rounded-t-lg color-white"
                                src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
                                alt="">
                        </div>
                        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                            <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
                                <div class="flex">
                                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                                        :src="$page.props.user.profile_photo_path.replace('profile/', '/storage/profile/')"
                                        alt="">
                                </div>
                                <div
                                    class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                    <div class="mt-6 min-w-0 flex-1 sm:hidden 2xl:block">
                                        <h1 class="text-2xl font-bold text-gray-900">{{ $page.props.user.user_first_name }}
                                            {{ $page.props.user.user_last_name }}</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                                <h1 class="truncate text-2xl font-bold text-gray-900">Titulao</h1>
                            </div>
                            <div id="content" class="mx-auto mt-10">
                                <div class="flex flex-nowrap flex-row justify-start">
                                    <div class="flex flex-col justify-center">
                                        <h4 class="font-bold text-lg">Vacantes Aplicadas</h4>
                                    </div>
                                </div>
                                <hr class="h-px my-3 bg-gray-200 border-0">
                                <!-- <Vacants :vacants="vacancies" /> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import Vacants from './Vacancies/VacanciesComponent.vue'
import AppLayout from '@/Layouts/UserLayout.vue';
export default {
    components: {
        AppLayout,
        Vacants
    },
    data() {
        return {
            vacants: []
        }
    },
    methods: {
        async getVacancts() {
            await axios.get(route('vacancies.index', 8), { params: this.params })
                .then((response) => {
                    this.vacancies = response.data
                    console.log(this.vacancies)
                })
        },
        created() {
            this.getVacants()
        }
    }

}
</script>

<style></style>