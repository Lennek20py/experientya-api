<template>
    <div>
        <button type="button" @click="open = !open" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
            class="p-2.5 ml-2 text-sm font-medium text-white bg-[#1579ac] rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            <svg fill="none" stroke="currentColor" stroke-width="1.5" class="w-5 h-5" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75">
                </path>
            </svg>
            <span class="sr-only">Icon description</span>
        </button>
        <FilterModal :open="open" @setOpen="this.open = !this.open" v-model="filter" />
    </div>
</template>

<script setup>

import { ref, defineEmits, watch } from 'vue'
import FilterModal from '@/CustomComponents/SearchFilterModal.vue'

const emit = defineEmits(['setOpen', 'update:modelValue'])
const open = ref(false)

var filter = ref('')

watch(filter, (newFilter) => {
    emit('update:modelValue', newFilter)
})

</script>

<style></style>