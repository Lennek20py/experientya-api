<script setup>
    import {ref,watch} from 'vue'

    const props = defineProps({
        arrayButtons: Object
    })
    const selecTab = ref(props.arrayButtons[0].name)

    watch(selecTab, (count, prevCount) => {
        const index = props.arrayButtons.findIndex((persona) => persona.name === selecTab.value);
        showDivs(props.arrayButtons[index].value, index)
    })

    function showDivs( numberDiv, position ){
        props.arrayButtons[position].class = 'border-current text-teal-600'

        if (oldPosition.value != position ) {
            props.arrayButtons[oldPosition.value].class = '';
            oldPosition.value = position
        }

        div.value = numberDiv;
    }
    
    let oldPosition = ref(0)
    let div = ref(props.arrayButtons[0].value)
</script>

<template>
  <div>
    <!-- Tabs -->
    <div class=" mt-6">
        <div class="lg:hidden">
            <select v-model="selecTab" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm rounded-md">
                <option v-for="(item, index) in props.arrayButtons" :key="index" @click="showDivs(item.value, index)">
                    {{ item.name }}
                </option>

            </select>
        </div>
        <div class="hidden lg:block">
            <div class="flex flex-wrap justify-center border-b border-gray-100 text-sm font-medium"  >

                <span  v-for="(item, index) in props.arrayButtons" :key="index" class="-mb-px border-b border-transparent p-4  hover:text-teal-600 cursor-pointer select-none" :class="item.class"  @click="showDivs(item.value, index)">
                    {{ item.name }}
                </span>

            </div>
        </div>
        
    </div>
    <!-- Content -->
    <div>
        <div class="mt-5">
            <div v-for="(item, index) in props.arrayButtons" :key="index" v-show="div == item.value">
                <slot :name="item.referencia"/>
            </div>
        </div>
    </div>
    
  </div>
</template>