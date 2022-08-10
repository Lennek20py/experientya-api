<template>
  <div v-if="message && showNotification" class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm items-center text-green-700 2xl:p-6 2xl:mb-8 2xl:text-base" role="alert">
        <svg class="w-5 h-5 inline mr-3 2xl:w-10 2xl:h-10 2xl:mr-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div>
            <span class="font-medium">{{$page.props.flash.message}}</span>
        </div>
    </div>
</template>

<script>
import {ref, onMounted } from 'vue';

const showNotification = ref(false);

onMounted(() => {
    showNotification.value = true;
    setTimeout(() => (showNotification.value = false), 2000);
})
export default {
    props: {
        'message': String
    }

}
</script>

<style>

</style>