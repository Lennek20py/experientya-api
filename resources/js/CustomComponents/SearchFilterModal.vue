<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="relative z-10" @close="open = false">
            <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100"
                leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full justify-center p-4 text-center items-center sm:p-0">
                    <TransitionChild as="template" enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                        <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">Filtros de
                                            búsqueda</DialogTitle>
                                        <div class="mt-2">
                                            <p class="text-sm text-gray-500">A continuación seleccione los filtros para
                                                realizar una búsqueda personalizada.</p>
                                        </div>
                                        <label for="all_filter">
                                            <div class="flex justify-between flex-nowrap items-center border-t-2">
                                                <div class="flex justify-center items-center">
                                                    <div class="p-2 text-[#1579ac] font-bold">
                                                        <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                            class="w-5 h-5" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <p>Ver todos</p>
                                                </div>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" id="all_filter" :true-value="'Y'"
                                                        :false-value="''" value="''" class="sr-only peer"
                                                        v-model="filter.all">
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                                    </div>
                                                </label>
                                            </div>
                                        </label>
                                        <label for="moving">
                                            <div class="flex justify-between flex-nowrap items-center border-y-2">
                                                <div class="flex justify-center items-center">
                                                    <div class="p-2 text-[#1579ac] font-bold">
                                                        <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                            class="w-5 h-5" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <p>Posibilidad de mudarse</p>
                                                </div>
                                                <label class="relative inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" id="moving" :true-value="'Y'"
                                                        :false-value="''" value="''" class="sr-only peer" v-model="filter.moving">
                                                    <div
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                                    </div>
                                                </label>
                                            </div>
                                        </label>
                                        <SelectInput :CustomData="horaryData" :Title="'Tipo de Horario'" v-model="filter.time_work" />
                                        <SelectInput :CustomData="workData" :Title="'Tipo de Trabajo'" v-model="filter.type_work" />
                                        <SelectInput :CustomData="contractData" :Title="'Tipo de Contrato'" v-model="filter.type_contract" />
                                        <SelectInput :CustomData="paymentPeriod" :Title="'Periodo de Pago'" v-model="filter.payment_type" />

                                    </div>
                                </div>
                                <p>{{ filter }}</p>

                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button"
                                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-[#1579ac] px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-[#2fa286] focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="emit('setOpen', !props.open)">Aplicar</button>
                                <button type="button"
                                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="emit('setOpen', !props.open)" ref="cancelButtonRef">Cancelar</button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
  
<script setup>
import { ref, defineEmits, defineProps } from 'vue'
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import SelectInput from '@/CustomComponents/SelectInput.vue'
import horaryData from '@/CustomData/TypeHorary';
import workData from '@/CustomData/TypeWork';
import paymentPeriod from '@/CustomData/PaymentPeriod';
import contractData from '@/CustomData/TypeContract';

const emit = defineEmits(['setOpen'])

const props = defineProps(['open'])

</script>

<script>

export default {
    data() {
        return {
            filter: {
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
    }
}
</script>
