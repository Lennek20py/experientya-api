<template>
    <AppLayout title="Dashboard">
        <template #header>
            <SearchBar class="py-6 mt-12" v-model="params" />
            <Vacants :vacants="vacancies" />

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
import SearchBar from '@/CustomComponents/SearchBar.vue';
import Vacants from './Vacancies/VacanciesComponent.vue'

export default {
    components: {
        AppLayout,
        Vacants,
        SearchBar
    },
    data() {
        return {
            vacancies: [],
            loading: false,
            params: {
                search: '',
                all: '',
                type_work: '',
                time_work: '',
                payment_type: '',
                type_contract: '',
                moving: ''
            }
        }
    },
    methods: {
        async getvacancies() {
            await axios.get(route('vacancies.index', 8), { params: this.params })
                .then((response) => {
                    this.vacancies = response.data
                    console.log(this.vacancies)
                })
        },
        search(paramsFilter) {
            this.params = paramsFilter
            this.getvacancies()
        }
    },
    created() {
        this.getvacancies()
    },
    watch: {
        params: {
            handler(newValue, oldValue) {
                this.getvacancies()
            },
            deep: true
        }
    }
}
</script>