<template>
  <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight pt-12">
                vacancies
            </h2>
            <vacancies></vacancies>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <Welcome />-->
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/UserLayout.vue';
import vacancies from './Vacancies/VacanciesComponent.vue'

import { defineComponent } from 'vue'

export default defineComponent({
    components: {
        AppLayout,
        vacancies
    }

    
})


</script>
