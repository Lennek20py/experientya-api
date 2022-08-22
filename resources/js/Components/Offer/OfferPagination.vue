<template>
    <div v-if="offers.data.length !== 0" class="mt-5 bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <Link :href="offers.prev_page_url" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Anterior </Link>
            <Link :href="offers.next_page_url" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Siguiente </Link>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <div>
                <nav
                    class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                    aria-label="Pagination"
                    v-for="(link, index) in offers.links" :key="index"
                >
                    <Link
                        v-html="link.label"
                        :href="link.url"
                        :class="[
                            link.url === null ? 'disabled' : '',
                            link.active ? 'z-10 bg-purple-50 border-purple-500 text-purple-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                        ]"
                    >
                    </Link>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link
        },
        props: {
            offers: Object
        }
    })
</script>

