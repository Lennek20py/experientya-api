<template>
    <admin-layout title="Proceso de Reclutamiento">
        <div class="min-h-screen pt-2 px-2 scroll-smooth cursor-default">
            <div
                class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75">
                <h2 class="py-5 text-6xl uppercase font-extrabold text-gray-900 text-center">Proceso de Reclutamiento</h2>
                <div class="text-center text-3xl">Vacante Actual: {{ Offer.title }}</div>
                <div class="w-3/4 py-10 mx-auto">
                    <div class="flex">
                        <select id="states" v-model="ActualOffer.id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-x-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Elige una Vacante</option>
                            <option v-for="(offer) in Offers" :key="offer.id" :value="offer.id">{{ offer.title }}</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex flex-row flex-nowrap justify-center align-middle items-center content-center py-10 w-full w-4xl bg-white rounded-lg border gap-5 border-gray-200 shadow-m px-5 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delasy-75">
                    <div class="w-1/2 border">
                        <h3 class="text-center uppercase text-4xl font-bold text-gray-900">SOLICITUDES ENVIADAS</h3>
                        <!-- <p>{{ user.email }}</p> -->
                        <p class="mx-auto text-center">No se encontraron solicitudes</p>
                    </div>
                    <div class="w-1/2 border">
                        <h3 class="text-center uppercase text-4xl font-bold text-gray-900">SOLICITUDES RECIBIDAS</h3>
                        <div v-for="(Candidate, index) in Candidates" :key="index"
                            class="cursor-pointer py-4 bg-['f9fafb'] text-gray-700 rounded-lg p-4 flex items-center">
                            <img class="w-16 h-16 rounded-full mr-4" :src="Candidate.cvid.user.profile_photo_link"
                                alt="Imagen de Usuario">
                            <div>
                                <h2 class="text-xl font-semibold">{{ Candidate.cvid.user.user_first_name }} {{
                                    Candidate.cvid.user.user_last_name }}</h2>
                                <p class="text-sm">{{ Candidate.cvid.position }}</p>
                            </div>
                            <div class="ml-auto">
                                <h2 class="text-xl font-semibold">{{ translatedStatus(Candidate.status) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </admin-layout>
</template>

<script>
import AdminLayout from '@/Layouts/CompanyLayout'
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Applicant from '@/Components/Company/ApplicantCard'
import axios from 'axios'

export default {
    components: {
        AdminLayout,
        Applicant
    },
    props: {
        Offer: Object,
        user: Object
    },
    data() {
        return {
            Offers: [],
            ActualOffer: [],
            Candidates: []
        }
    },
    methods: {
        async getOrganizationOffers() {
            await axios.get(route('vacants.getOffers', this.user.id))
                .then((response) => {
                    this.ActualOffer.id = this.Offer.id
                    this.Offers = response.data
                    this.getAppliedOffers()
                }).catch((error) => {
                    console.log(error)
                })
        },
        async getAppliedOffers() {
            await axios.get(route('company.applied', this.ActualOffer.id))
                .then((response) => {
                    console.log(response)
                    this.Candidates = response.data
                }).catch((error) => {
                    console.log(error)
                })
        },
        translatedStatus(status) {
            return this.statusTranslations[status] || status;
        }
    },
    computed: {
        statusTranslations() {
            return {
                pending: 'Pendiente',
                approved: 'Aprobado',
                rejected: 'Rechazado',
                applied: 'Aplicado'
            };
        }
    },
    created() {
        this.getOrganizationOffers()
    }

}
</script>

<style></style>