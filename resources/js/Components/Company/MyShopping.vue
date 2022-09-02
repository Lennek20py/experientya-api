<template>
    <div class="mt-10 divide-y divide-gray-200">
        <div class="space-y-1">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Planes contratados ahsas</h3>
            <p class="max-w-2xl text-sm text-gray-500">Se listan todas las compras de planes y paquetes relacionadas a su cuenta.</p>
        </div>
        <div class="grid sm:grid-cols-12 lg:grid-cols-1 gap-6 py-6">
            <div v-for="shopping in shoppings" :key="shopping.id">
                <article class="p-6 bg-white sm:p-8 rounded-xl ring ring-indigo-50">
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
                        <strong
                            class="rounded border px-3 py-1.5 font-medium text-white"
                            :class="shopping.status === 1 ? 'border-green-500 bg-green-500': 'border-red-500 bg-red-500'"
                        >
                            <span class="text-sm" v-if="shopping.status === 1">Vigente</span>
                            <span class="text-sm" v-if="shopping.status === 0">Expirado</span>
                        </strong>

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
</template>

<script>

    import { defineComponent } from 'vue'

    export default defineComponent({
        props:{
            shoppings: Array
        }
    })
</script>
