<script setup>

import Header from '@/Components/Home/Header'
import Carousel from '@/Components/Home/Carousel'
import Footer from '@/Components/Home/Footer'
import Main from '@/Components/Home/Main'

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <div>
        <Header/>
        <Carousel/>
        <Main/>
        <Footer/>
    </div>

</template>

<style scoped>

</style>
