<template>
    <div class="mt-10 divide-y divide-gray-200">
        <div class="space-y-1">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Planes contratados</h3>
            <p class="max-w-2xl text-sm text-gray-500">Se listan todas las compras de planes y paquetes relacionadas a su cuenta.</p>
            <div class="grid sm:grid-cols-12 lg:grid-cols-1 gap-6 py-6">
                <div v-if="shoppings.length == 0">
                    <div>
                        <div class="rounded-md bg-blue-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                <!-- Heroicon name: mini/information-circle -->
                                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M19 10.5a8.5 8.5 0 11-17 0 8.5 8.5 0 0117 0zM8.25 9.75A.75.75 0 019 9h.253a1.75 1.75 0 011.709 2.13l-.46 2.066a.25.25 0 00.245.304H11a.75.75 0 010 1.5h-.253a1.75 1.75 0 01-1.709-2.13l.46-2.066a.25.25 0 00-.245-.304H9a.75.75 0 01-.75-.75zM10 7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                </svg>
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                <p class="text-sm text-blue-700">Aún no has adquirido algún plan</p>
                                <p class="mt-3 text-sm md:mt-0 md:ml-6">
                                    <a href="#" class="whitespace-nowrap font-medium text-blue-700 hover:text-blue-600">
                                    <span class="font-bold" @click="showPlans">Comprar</span>
                                    <span aria-hidden="true"> &rarr;</span>
                                    </a>
                                </p>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
                <div v-else>
                    <div v-for="shopping in shoppings" :key="shopping.id">
                        <article class="p-6 bg-white sm:p-8 rounded-xl ring mb-6 ring-indigo-50">
                            <div class="flex items-start">
                                <div
                                class="hidden sm:grid sm:h-20 sm:w-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-amber-700 animate-pulse"
                                aria-hidden="true"
                                v-if="shopping.name === 'bronze_pack'"
                                >
                                <div class="flex items-center gap-1">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-amber-700 w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                    </svg>
                                </div>
                                </div>

                                <div
                                class="hidden sm:grid sm:h-20 sm:w-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-zinc-400 animate-pulse"
                                aria-hidden="true"
                                v-if="shopping.name === 'silver_pack'"
                                >
                                <div class="flex items-center gap-1">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-zinc-400 w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                    </svg>
                                </div>
                                </div>

                                <div
                                class="hidden sm:grid sm:h-20 sm:w-20 sm:shrink-0 sm:place-content-center sm:rounded-full sm:border-2 sm:border-yellow-500 animate-pulse"
                                aria-hidden="true"
                                v-if="shopping.name === 'gold_pack'"
                                >
                                <div class="flex items-center gap-1">
                                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="animate-pulse text-yellow-500 w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                    </svg>
                                </div>
                                </div>

                                <div class="sm:ml-8">
                                    <div class="flex items-center">
                                        <strong
                                            class="rounded border px-3 py-1.5 font-medium text-white mr-2"
                                            :class="shopping.status === 1 ? 'border-green-500 bg-green-500': 'border-red-500 bg-red-500'"
                                        >
                                            <span class="text-sm" v-if="shopping.status === 1">Vigente</span>
                                            <span class="text-sm" v-if="shopping.status === 0">Expirado</span>
                                        </strong>

                                        <button
                                            type="button"
                                            class="rounded border px-3 py-1.5 font-medium text-white"
                                            v-if="shopping.status === 0"
                                            @click="selectedPlan(shopping)"
                                        >
                                            <!-- Heroicon name: mini/envelope -->
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>

                                <h2 class="mt-4 text-2xl font-medium sm:text-xl">
                                    <a class="hover:underline" v-if="shopping.name === 'bronze_pack'"> Paquete Bronce </a>
                                    <a class="hover:underline" v-if="shopping.name === 'silver_pack'"> Paquete Plata </a>
                                    <a class="hover:underline" v-if="shopping.name === 'gold_pack'"> Paquete Oro </a>
                                </h2>

                                <p class="mt-1 text-sm text-gray-700">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam nulla
                                    amet voluptatum sit rerum, atque, quo culpa ut necessitatibus eius
                                    suscipit eum accusamus, aperiam voluptas exercitationem facere aliquid
                                    fuga. Sint.
                                </p>

                                <div class="mt-4 sm:flex sm:items-center sm:gap-2">
                                    <div class="flex items-center text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>

                                    <p class="ml-1 text-xs font-medium">{{ shopping.date }}</p>
                                    </div>

                                    <span class="hidden sm:block" aria-hidden="true">&middot;</span>

                                    <p class="mt-2 text-xs font-medium text-gray-500 sm:mt-0">
                                        {{ shopping.spaces_available }} disponible(s)
                                    </p>
                                </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <JetModal :show="acting" @close="acting = null; plan = null">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow sm:rounded-lg">
                <form class="px-4 py-5 sm:p-6" @submit.prevent="submit">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Eliminar paquete</h3>
                    <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p class="flex items-center">
                        ¿Estas seguro de eliminar el paquete?
                    </p>
                    </div>

                    <div class="flex justify-end mt-5">
                        <button @click="acting = null; plan = null" type="button" class="mr-2 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-600 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200">
                            Cancelar
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Eliminar
                        </button>
                    </div>
                </form>
            </div>
        </JetModal>
    </div>
</template>

<script>
    import JetModal from '@/Jetstream/Modal'
    import { Inertia } from '@inertiajs/inertia'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            JetModal
        },
        data () {
            return {
                acting: false,
                plan: null
            }
        },
        props:{
            shoppings: Array
        },
        methods: {
            showPlans() {
                this.$emit("showPlan", 2);
            },
            selectedPlan(plan) {
                this.acting = true
                this.plan = plan
            },
            submit() {
                this.$inertia.delete('/company/plan/delete/' + this.plan.id, {
                    preserveState: false,
                    preserveScroll: true,
                    onSuccess: () => {
                        this.acting = false
                    }
                })
            }
        }
    })
</script>
