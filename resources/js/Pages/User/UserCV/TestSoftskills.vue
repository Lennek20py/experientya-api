<template>
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 first-line:lg:text-3xl">
        <h3>Test de SoftSkills</h3>
    </div>
     <div v-if="!formBind && !ifExists && loadData" class="flex justify-center align-center flex-col my-1">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- leading-tight text-justify">Para poder completar tu perfil, es necesario realizar el test de competencias. Este test tiene una duración estimada de 5 - 20 minutos. Le recomendamos tomar el test sin distractores al rededor.
        </span>
        <svg class="py-4 self-center w-[100px] lg:w-[120px] text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
        <!-- <svg class="py-4 self-center w-[100px] lg:w-[120px] text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> -->
        <div class="w-auto flex justify-center items-center lg:justify-center lg:py-4">
            <a class="flex items-center cursor-pointer content-center justify-cente text-lg font-semibold text-start rounded-full bg-red-500 text-gray-50 px-4 py-1">
            INICIAR TEST</a>
        </div>
    </div>
     <div v-if="!formBind && ifExists && loadData" class="flex justify-center align-center flex-col my-4">
        <!-- <span class="w-full text-sm font-light text-gray-500 mx-auto px- leading-tight text-justify">Para poder completar tu perfil, es necesario realizar el test de competencias. Este test tiene una duración estimada de 5 - 20 minutos. Le recomendamos tomar el test sin distractores al rededor.
        </span> -->
        <svg class="pt-4 self-center w-[100px] lg:w-[120px] text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
        <div class="w-auto flex text-sm justify-center items-center lg:justify-center text-gray-500 lg:py-4">
            Realizado el 29/01/2022
        </div>
    </div>

</div>
  
</template>

<script>
export default {
    data() {
        return{
            formBind: false,
            ifExists: false,
            loadData: true,
        }

    }

}
</script>

<style>

</style>