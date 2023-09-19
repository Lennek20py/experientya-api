<template>
    <admin-layout title="Proceso de Reclutamiento">
        <div class="min-h-screen px-2 scroll-smooth cursor-default">
            <div
                class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-screen transition ease-in-out delasy-75">
                <h2 class="py-5 text-2xl capitalize font-semibold text-gray-900 text-center lg:text-4xl lg:font-extrabold lg:text-start ">Proceso de Reclutamiento</h2>
                <!-- <div class="text-center text-3xl">Vacante Actual: {{ Offer.title }}</div> -->
                <div class="w-3/4 pb-4 mx-auto lg:text-start lg:mx-0 lg:w-5/12">
                    <div class="flex">
                        <select id="states" v-model="ActualOffer.id"
                            class="rounded bg-white border border-gray-300 text-gray-900 text-sm rounded-x-lg  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            @change="this.getOrganizationOffers">
                            <option selected>Elige una Vacante</option>
                            <option v-for="(offer) in Offers" :key="offer.id" :value="offer.id">{{ offer.title }}</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex flex-row flex-wrap py-2 w-full min-h-screen w-4xl bg-[#F8F8F8] rounded-lg border gap-5 border-gray-200 shadow-m px-2 lg:flex-nowrap lg:py-10 2xl:px-8 transition ease-in-out delasy-75">
                    <div class="w-full border-b lg:bg-white lg:border lg:rounded-3xl lg:p-4">
                        <h3 class="text-center pb-1 capitalize text-base font-normal text-gray-900 lg:text-2xl lg:text-start lg:py-2 lg:px-5 2xl:font-semibold">Solicitudes Enviadas
                        </h3>
                        <div v-if="Invites.length > 0">
                            <div v-for="(Invite, index) in Invites" :key="index"
                                class="cursor-pointer py-4 bg-['f9fafb'] text-gray-700 rounded-lg p-4 flex items-center lg:border lg:rounded-lg lg:bg-[#F8F8F8] lg:my-3 lg:py-2">
                                <img class="w-12 h-12 rounded-full mr-4 2xl:w-15 2xl:h-15" :src="Invite.cvid.user.profile_photo_link"
                                    alt="Imagen de Usuario">
                                <div>
                                    <h2 class="text-base font-semibold capitalize xl:font-bold xl:text-xl">{{ Invite.cvid.user.user_first_name }} {{
                                        Invite.cvid.user.user_last_name }}</h2>
                                    <p class="text-xs capitalize xl:text-base">{{ Invite.cvid.position }}</p>
                                </div>
                                <div class="ml-auto bg-green-600 border rounded-md lg:rounded-lg">
                                    <h2 class="text-sm font-semibold text-white mx-2 lg:text-lg lg:mx-4">{{ translatedStatus(Invite.status) }}</h2>
                                </div>
                            </div>
                        </div>
                        <p v-else class="mx-auto text-center">No se encontraron usuarios</p>
                    </div>
                    <div class="w-full border-b lg:bg-white lg:border lg:rounded-3xl lg:p-4">
                        <h3 class="text-center pb-1 capitalize text-base font-normal text-gray-900 lg:text-2xl lg:text-start lg:py-2 lg:px-5">Solicitudes Recibidas
                        </h3>
                        <div v-if="Candidates.length > 0">
                            <div v-for="(Candidate, index) in Candidates" :key="index"
                            class="cursor-pointer py-4 bg-['f9fafb'] text-gray-700 rounded-lg p-4 flex items-center lg:border lg:rounded-lg lg:bg-[#F8F8F8] lg:my-3 lg:py-2">
                                <img class="w-12 h-12 rounded-full mr-4 2xl:w-15 2xl:h-15" :src="Candidate.cvid.user.profile_photo_link"
                                    alt="Imagen de Usuario">
                                <div>
                                    <h2 class="text-base font-semibold capitalize xl:font-bold xl:text-xl">{{ Candidate.cvid.user.user_first_name }} {{
                                        Candidate.cvid.user.user_last_name }}</h2>
                                    <p class="text-xs capitalize xl:text-base">{{ Candidate.cvid.position }}</p>
                                </div>
                                <div class="ml-auto bg-green-600 border rounded-md lg:rounded-lg">
                                    <h2 class="text-sm font-semibold text-white mx-2 lg:text-lg lg:mx-4">{{ translatedStatus(Candidate.status)
                                    }}</h2>
                                </div>
                            </div>
                        </div>
                        <p v-else class="mx-auto text-center">No se encontraron usuarios</p>
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
import ApplicantCard from '../../Components/Company/ApplicantCard.vue'
import axios from 'axios'

export default {
    components: {
        AdminLayout,
        Applicant,
        ApplicantCard
    },
    props: {
        Offer: Object,
        user: Object
    },
    data() {
        return {
            Offers: [],
            ActualOffer: [],
            Candidates: [],
            Invites: [],
            Cvs: []
        }
    },
    methods: {
        async getOrganizationOffers() {
            await axios.get(route('vacants.getOffers', this.user.id))
                .then((response) => {
                    this.ActualOffer.id = this.Offer.id
                    this.Offers = response.data
                    this.getAppliedOffers()
                    this.getCandidateInvites()
                }).catch((error) => {
                    console.log(error)
                })
        },
        async getAppliedOffers() {
            await axios.get(route('company.applied', this.ActualOffer.id))
                .then((response) => {
                    this.Candidates = response.data
                }).catch((error) => {
                    console.log(error)
                })
        },
        async getCandidateInvites() {
            const params = {
                company: this.user.id,
                offer: this.Offer.id
            }
            await axios.get(route('candidatesInvites.index'), { params })
                .then((response) => {
                    this.Invites = response.data.data
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
                applied: 'Aplicado',
                invited: 'Invitado'
            };
        }
    },
    created() {
        this.getOrganizationOffers()
        this.getCandidateInvites()
    }

}
</script>

<style></style>