<template>
    <div>
        <Header/>
        <main class="relative bg-white">
            <img
                class="absolute inset-0 object-[75%] sm:object-[25%] object-cover w-full h-full opacity-25 sm:opacity-100"
                src="../../img/bg_4.jpg"
                alt="Couple on a bed with a dog"
            />

            <div class="hidden sm:block sm:inset-0 sm:absolute sm:bg-gradient-to-r sm:from-white sm:to-transparent"></div>

            <div class="relative max-w-screen-xl px-4 py-32 mx-auto lg:h-screen lg:items-center lg:flex">
                <div class="max-w-xl text-center sm:text-left">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Bienvenido a
                    <strong class="font-extrabold text-teal-500 sm:block">
                    Experientya.
                    </strong>
                </h1>

                <p class="max-w-lg mt-4 sm:leading-relaxed sm:text-xl">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus numquam ea!
                </p>

                <div class="flex flex-wrap gap-4 mt-8 text-center">
                    <a class="block w-full px-12 py-3 text-base font-medium text-white rounded shadow bg-teal-500 sm:w-auto active:bg-teal-500 hover:bg-teal-500 focus:outline-none focus:ring">
                    Iniciar sesión
                    </a>

                    <a class="block w-full px-12 py-3 text-base font-medium bg-white rounded shadow text-teal-600 sm:w-auto hover:text-teal-700 active:text-teal-500 focus:outline-none focus:ring">
                    Volver al inicio
                    </a>
                </div>
                </div>
            </div>
        </main>
        <Footer/>
    </div>
</template>

<script>

import { defineComponent } from 'vue'
import Header from '@/Components/Home/Header'
import Footer from '@/Components/Home/Footer'

export default defineComponent({
    components: {
        Header,
        Footer
    }
})
</script>
