<template>
    <div>
        <label class="text-xs text-gray-800 lg:text-sm 2xl:text-base">{{ Title }}</label>
        <div class="mt-1">
            <select required id="preferred_state" @input="$emit('update:modelValue', $event.target.value)"
                class="mt-1 block w-full text-xs rounded-md border-gray-300 py-2 pl-3 lg:pr-10 focus:border-blue-500 focus:outline-none focus:ring-blue-500 xl:text-base">
                <option value>Seleccione un estado</option>
                <option v-for="data in CustomData" :key="data.id" :value="data.value">
                    {{ data.value }}
                </option>
            </select>
        </div>
    </div>
</template>
  
<script setup>
import { ref, reactive, defineProps, defineEmits } from 'vue'

const emit = defineEmits(['update:modelValue'])

const props = defineProps({
    CustomData: Object,
    Title: String,
    ModelTitle: String
});

const selected = ref(props.CustomData[0])
</script>