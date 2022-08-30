<template>
<div class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 first-line:lg:text-3xl">
        <h3>Test de Competencias</h3>
    </div>
     <div v-if="!formBind && !ifExists && loadData" class="flex justify-center align-center flex-col my-1">
        <span class="w-full text-sm font-light text-gray-500 mx-auto px- leading-tight text-justify">Para poder completar tu perfil, es necesario realizar el test de competencias. Este test tiene una duración estimada de 5 - 20 minutos. Le recomendamos tomar el test sin distractores al rededor.
        </span>
        <svg class="py-4 self-center w-[100px] lg:w-[120px] text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        <div @click="toggleModal()" class="w-auto flex justify-center items-center lg:justify-center lg:py-1">
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
<!-- <base-modal v-if="isShowModal" @close="toggleModal"/> -->
<!-- MODAL DE INFORMACIÓP -->
<div v-if="isShowModal" @close="toggleModal" class="fixed bottom-0 inset-x-0 px-4 pb-4 inset-0 flex items-center justify-center">
  <div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
  </div>
  <div class="z-10 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-7xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="bg-white px-4 pt-4 pb-4 sm:p-5 sm:pb-5">
      <div class="sm:flex w-full sm:items-start">
        <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left overflow-auto ...">
          <div class="flex text-center flex-col justify-center items-center mb-4 w-full">
                <!-- TÍTULO -->
            <h3 class="uppercase px-1 py-2 text-xl text-center leading-6 font-bold text-gray-900" id="modal-headline">
              TEST DE COMPETENCIAS
            </h3>
                <!-- INSTRUCCIONES -->
            <p class="text-xs text-gray-500 text-justify border-b-2">Lea atentamente el enunciado y seleccione la opción que más se acople a su manera de ser. Si desea cerrar la ventana del test, este se guardará en la última respuesta brindada; le recomendamos tomar el test sin distractores externos y en un solo intento.</p>
          </div>
            <!-- CUERPO -->
          <div class="mt-2 flex flex-col modal-body">
            <div class="self-start px-1 py-2 text- leading-6 font-bold text-gray-900">Instrucciones:</div>
            <!-- TEXTO DE INFORMACIÓN  -->
            <div class="flex flex-col">
                <div class="py-1">
                    <p class="text-xs text-gray-500 text-justify leading-none justify-start">1- El test te mostrará cuatro palabras en pantalla. Est le pedirá que seleccione primero la palabra con la que más se sienta identificado.</p>

                    <img class="w-56 h-auto mx-auto py-2 mb-4" src="../../../../img/Instruction1.png" alt="">
                </div>
                <div class="py-1">
                    <p class="text-xs text-gray-500 text-justify leading-none justify-start">2- Para elegir el ítem solicitado, solo basta con darle clic en cualquier parte del cuadrado y se pintará del color acorde a lo solicitado, verde para "más semejante" y rojo para "menos semejante".</p>

                    <img class="w-56 h-auto mx-auto py-2  mb-4" src="../../../../img/Instruction2.png" alt="">
                </div>
                <div class="py-1">
                    <p class="text-xs text-gray-500 text-justify leading-none justify-start">3- Si las elecciones son correctas, proceda a darle clic en el botón azul de la esquina inferior derecha para pasar al siguiente conjunto de palabras.</p>

                    <img class="w-56 h-auto mx-auto py-2  mb-4" src="../../../../img/Instruction2.png" alt="">
                </div>
                <div class="py-1">
                    <p class="text-xs text-gray-500 text-justify leading-none justify-start">4- Al pasar todas las preguntas el test tendrá una pantalla de finalizado, esta mostará el estado del test y si se realizó de manera correcta.</p>
                </div>
            </div>
            <!-- BOTONES DEE RESPUESTA -->
            <div id="answers"></div>
          </div>
        </div>
      </div>
    </div>
        <!-- BOTONES / FOOTER PAGE -->
    <div class="bg-gray-50 px-4 py-6 sm:px-6 flex flex-col sm:flex-row-reverse">
      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button @click="toggleModalTest(), toggleModal()" type="button" class="inline-flex justify-center font-bold w-full rounded-md border border-gray-300 px-4 py-2 bg-red-500 text-base leading-6 text-white shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
          INICIAR
        </button>
      </span>
      <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button @click="toggleModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
          Cancel
        </button>
      </span>
    </div>
  </div>
</div>
<!-- MODAL DE TEST -->
<div v-if="isStartTest" @close="toggleModal" class="fixed bottom-0 inset-x-0 px-4 pb-4 inset-0 flex items-center justify-center">
  <div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
  </div>
  <div class="z-10 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-7xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <div class="bg-white px-4 pt-4 pb-4 sm:p-5 sm:pb-5">
      <div class="sm:flex w-full sm:items-start">
        <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left overflow-auto ...">
          <div class="flex text-center flex-col justify-center items-center mb-4 w-full">
                <!-- TÍTULO -->
            <h3 class="uppercase px-1 py-2 text-xl text-center leading-6 font-bold text-gray-900" id="modal-headline">
              TEST DE COMPETENCIAS
            </h3>
                <!-- INSTRUCCIONES -->
            <p class="text-xs text-gray-500 text-justify border-b-2">Lea atentamente el enunciado y seleccione la opción que más se acople a su manera de ser. Si desea cerrar la ventana del test, se reiniciará por completo, por lo que, le pedimos atentamente que el test sea iniciado y terminado en el mismo intento.</p>
          </div>
            <!-- CUERPO -->
            <div class="mt-2 flex flex-col">
              <h4> Seleccione el adjetivo que más se asemeje a su personalidad.</h4>
              <div class="flex flex-wrap justify-center gap-11">
                <div class="py-2 gap-7 content-between flex flex-col">
                  <div class="uppercase align-center text-center border-2 p-3 my-4s">RÁPIDO</div>
                  <div class="uppercase align-center text-center border-2 p-3 my-4s">ENTUSIASTA</div>
                </div>
                <div class="py-2 gap-2 place-content-between flex flex-col">
                  <div class="uppercase align-center text-center border-2 p-3 my-4s">APACIBLE</div>
                  <div class="uppercase align-center text-center border-2 p-3 my-4s">LÓGICO</div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
        <!-- BOTONES / FOOTER PAGE -->
    <div class="bg-gray-50 px-4 py-6 sm:px-6 flex flex-row justify-between items-end content-center sm:flex-row-reverse text-end">
      <p class="text-gray-400 text-sm items-end">1/28</p>
      <span class="mt-3 flex w-auto items-center align-middle rounded-md shadow-sm sm:mt-0 sm:w-auto">
        <button @click="toggleModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
          Next
        </button>
      </span>
    </div>
  </div>
</div>
</template>

<script>
// import Flowbite from 'flowbite';
import BaseModal from '@/CustomComponents/Modal.vue';
export default {
    components: {BaseModal},
    data() {
        return{
            formBind: false,
            ifExists: false,
            loadData: true,
            isShowModal: false,
            isStartTest: true,
            best: 0,
            worst: 0,
            questions: [
              {
                question: 'Seleccione la palabra que mejor se asemeje.',
                options: [
                  'RÁPIDO',
                  'ENTUSIASTA',
                  'APACIBLE',
                  'LÓGICO'
                ],
                selected: null
              },
              {
                question: 'Seleccione la palabra que PEOR se asemeje.',
                options: [
                  'RÁPIDO',
                  'ENTUSIASTA',
                  'APACIBLE',
                  'LÓGICO'
                ],
                selected: null
              },
              {
                question: 'Seleccione la palabra que mejor se asemeje.',
                options: [
                  'DECIDIDO',
                  'RECEPTIVO',
                  'BONDADOSO',
                  'CAUTELOSO'
                ],
                selected: null
              },
              {
                question: 'Seleccione la palabra que PEOR se asemeje.',
                options: [
                  'DECIDIDO',
                  'RECEPTIVO',
                  'BONDADOSO',
                  'CAUTELOSO'
                ],
                selected: null
              }
            ]
        }

    },
    methods: {
        toggleModal() {
        this.isShowModal = !this.isShowModal;
        },
        toggleModalTest() {
        this.isStartTest = !this.isStartTest;
        },
        handleClose() {
          this.$emit("close");
        },
        
    }

}
</script>

<style>

.modal-body{
    max-height: calc(100vh - 380px);
    overflow-y: auto;
}

</style>