<template>
<div class="fixed z-10 inset-0 overflow-y-auto " >
  <div class="flex items-center justify-center min-h-screen">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75" @click="closeModal"></div>
    <div class="relative bg-white rounded-lg pl-8 pt-8 pr-8 pb-4 m-6" :class="props.styleModal">
      <div class="absolute top-0 right-0">
        <button class="text-gray-700 hover:text-gray-800 focus:outline-none p-4" @click="closeModal">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <div class="absolute top-0 left-0 ">
        <h2 class="text-xl font-semibold ml-3 mt-2">{{ props.title }}</h2>
      </div>
      <div class="py-6 mt-3">
        
        <slot :name="'contenido'"/>
        
      </div>
      <div class="flex justify-end pt-4">
        <button class="px-4 py-2 bg-gray-500 text-white rounded mr-2 hover:bg-gray-600 focus:outline-non text-xs" @click="closeModal">Cancelar</button>
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none text-xs" @click="save">Guardar</button>
      </div>
    </div>
  </div>
</div>
</template>

<script setup>
import { stringLiteral } from '@babel/types';


const props = defineProps({
    title: String,
    styleModal: String
})

const emit = defineEmits(['closeMod', 'clickSave', 'clickCancel'])

function closeModal(){
  emit('closeMod')
}

function save(){
  emit('clickSave')
}

function cancel(){
  emit('clickCancel')
}

</script>