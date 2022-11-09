<template>
    <li class="col-span-1 divide-y rounded-md shadow-sm border-solid border-2 border-neutral-100 mt-6">
        <div class="flex w-full items-center justify-between space-x-6 p-6">
            <div class="flex">
                <img class="h-14 w-14 rounded-full" :src="user.profile_photo_path.replace('profile/', '/storage/profile/')" alt="">
                <div class="ml-3">
                <p class="text-md font-bold text-gray-900">{{user.user_first_name}} {{user.user_last_name}}</p>
                <p class="mt-1 truncate text-sm text-gray-700">{{ user.position }}</p>
                <p class="mt-0.5 truncate text-sm text-gray-500">{{ user.city_name }}, {{ user.state_name }}</p>
                </div>
            </div>
        </div>
        <!-- {{ user }} -->
        <div>
        <div class="-mt-px flex divide-x divide-gray-200">
            <div class="flex w-0 flex-1">
            <Link :href="route('company.cv', [user.id])" class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center rounded-bl-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                <!-- Heroicon name: mini/envelope -->
                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="ml-3">Ver</span>
            </Link>
            </div>
            <div class="-ml-px flex w-0 flex-1">
            <a href="tel:+1-202-555-0170" class="relative inline-flex w-0 flex-1 items-center justify-center rounded-br-lg border border-transparent py-4 text-sm font-medium text-gray-700 hover:text-gray-500">
                <!-- Heroicon name: mini/phone -->
                <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z" />
                <path d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z" />
                </svg>
                <span class="ml-3">Invitar</span>
            </a>
            </div>
        </div>
        </div>
    </li>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link
        },
        props: {
            user: Object
        }
    })
</script>
