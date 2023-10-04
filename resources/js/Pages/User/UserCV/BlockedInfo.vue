<template>
    <div
        class="blur-md flex flex-wrap justify-center items-center w-4xl bg-white rounded-lg border border-gray-200 shadow-m 2xl:min-h-[204px] transition ease-in-out delasy-75 hover:-translate-x-1">
        <div class="flex flex-wrap flex-col justify-center items-center w-full h-96 bg-gray-100 rounded-lg">
            <div class="text-5xl text-center text-gray-500">
                <svg fill="none" class="w-12 h-12 inline-block font-extrabold" stroke="currentColor" stroke-width="3"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z">
                    </path>
                </svg>
            </div>
            <p class="text-lg text-center mt-4">Disponible muy pronto.</p>
        </div>
    </div>
</template>
  
<script>
export default {
    name: 'TarjetaBloqueada',
};
</script>
  
<style>
.blur-md {
  filter: blur(0.5px);
}
</style>
  