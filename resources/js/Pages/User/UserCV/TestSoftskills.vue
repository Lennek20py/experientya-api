<template>
  <div
    class="w-full w-4xl bg-white rounded-lg border border-gray-200 shadow-m px-5 py-2 2xl:px-8 2xl:min-h-[204px] transition ease-in-out delay-75 hover:-translate-x-1">
    <div class="text-2xl text-center mx-auto font-bold  text-gray-900 py-2 first-line:lg:text-3xl">
      <h3>Test de SoftSkills</h3>
    </div>
    <!-- CARGANDO VISTA  -->
    <div v-if="!loadData" role="status" class="sm:max-w-sm lg:max-w-full animate-pulse pb-5 lg:pb-0">
      <div class="h-2.5 bg-white rounded-full w-48 mb-4"></div>
      <div class="h-2 bg-gray-200 rounded-full max-w-[1150px] mb-2.5"></div>
      <div class="h-2 bg-gray-200 rounded-full max-w-[1130px] mb-2.5"></div>
      <div class="h-2 bg-gray-200 rounded-full max-w-[260px] mb-5"></div>
      <div class="flex mx-auto justify-center align-middle items-center w-1/2 h-32 bg-gray-300 rounded">
        <svg class="w-12 h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor"
          viewBox="0 0 640 512">
          <path
            d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z" />
        </svg>
      </div>
      <span class="sr-only">Loading...</span>
      <span class="sr-only">Loading...</span>
    </div>
    <!-- VISTA EN CASO DE NO TENER UN TEST TERMINADO  -->
    <div v-if="!formBind && loadData && !test_finished" class="flex justify-center align-center flex-col my-1">
      <span class="w-full text-sm font-light text-gray-500 mx-auto px- leading-tight text-justify">Para poder completar
        tu perfil, es necesario realizar el test de competencias. Este test tiene una duración estimada de 5 - 20
        minutos. Le recomendamos tomar el test sin distractores al rededor.
      </span>
      <svg class="py-4 self-center w-[100px] lg:w-[120px] text-gray-300" fill="none" stroke="currentColor"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
        </path>
      </svg>
      <div @click="toggleModal()" class="w-auto flex justify-center items-center lg:justify-center lg:py-1">
        <a v-if="ifExists"
          class="flex items-center cursor-pointer content-center justify-cente text-lg font-semibold text-start rounded-full bg-red-600 text-gray-50 px-4 py-1">
          CONTINUAR</a>
        <a v-else
          class="flex items-center cursor-pointer content-center justify-cente text-lg font-semibold text-start rounded-full bg-red-600 text-gray-50 px-4 py-1">
          INICIAR TEST</a>
      </div>
    </div>
    <!-- VISTA EN CASO DE TENER EL TEST TERMINADO -->
    <div v-if="!formBind && loadData && test_finished" class="flex justify-center align-center flex-col my-4">
      <svg class="pt-4 self-center w-[100px] lg:w-[120px] text-green-600" fill="none" stroke="currentColor"
        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
        </path>
      </svg>
      <div v-for="(tests, index) in test" :key="index"
        class="w-auto flex text-sm justify-center items-center lg:justify-center text-gray-500 lg:py-4">
        Realizado el {{tests.finished_date}}
      </div>
    </div>
  </div>
  <!-- MODAL DE INFORMACIÓN -->
  <div v-if="isShowModal" @close="toggleModal"
    class="fixed bottom-0 inset-x-0 px-4 pb-4 inset-0 flex items-center justify-center">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="z-10 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-7xl sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-4 pb-4 sm:p-5 sm:pb-5">
        <div class="sm:flex w-full sm:items-start">
          <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left overflow-auto ...">
            <div class="flex text-center flex-col justify-center items-center mb-4 w-full">
              <!-- TÍTULO -->
              <h3 class="uppercase px-1 py-2 text-xl text-center leading-6 font-bold text-gray-900 lg:text-3xl"
                id="modal-headline">
                TEST DE SOFTSKILLS
              </h3>
              <!-- INSTRUCCIONES -->
              <p class="text-xs text-gray-500 text-justify border-b-2 sm:mx-10 md:mx-20 lg:text-base">Lea atentamente el
                enunciado y seleccione la opción que más se acople a su manera de ser. Si desea cerrar la ventana del
                test, este se guardará en la última respuesta brindada; le recomendamos tomar el test sin distractores
                externos y en un solo intento.</p>
            </div>
            <!-- CUERPO -->
            <div class="mt-2 flex flex-col modal-body px-0 sm:px-10 md:px-20">
              <div class="self-start px-1 py-2 leading-6 font-bold text-gray-900 lg:text-lg">Instrucciones:</div>
              <!-- TEXTO DE INFORMACIÓN  -->
              <div class="flex flex-col lg:text-base">
                <div class="py-1">
                  <p class="text-xs text-gray-500 text-justify leading-none justify-start lg:text-base">El test te
                    mostrará cinco palabras en pantalla. Este le pedirá que seleccione la palabra con la que más se
                    sienta identificado.</p>
                  <img class="hidden h-auto mx-auto py-2 mb-4 lg:block" src="../../../../img/InstructionDesktop.gif"
                    alt="">
                  <img class="block w-64 h-auto mx-auto py-2 mb-4 lg:hidden" src="../../../../img/InstructionMobile.gif"
                    alt="">
                </div>
              </div>
              <!-- BOTONES DEE RESPUESTA -->
              <div id="answers"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- BOTONES / FOOTER PAGE -->
      <div class="bg-gray-50 gap-2 px-4 py-6 sm:px-6 flex flex-col sm:flex-row-reverse">
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
          <button @click="toggleModalTest(), toggleModal()" type="button"
            class="inline-flex justify-center font-bold w-full rounded-md select-none border border-gray-300 px-4 py-2 bg-red-600 text-base leading-6 text-white shadow-sm hover:text-gray-2000 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            {{ ifExists ? "CONTINUAR" : "INICIAR" }}
          </button>
        </span>
        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
          <button @click="toggleModal()" type="button"
            class="inline-flex justify-center w-full rounded-md border select-none border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
            Cancel
          </button>
        </span>
      </div>
    </div>
  </div>

  <!-- MODAL DE TEST -->
  <div v-if="isStartTest" @close="toggleModal"
    class="fixed bottom-0 inset-x-0 px-4 pb-4 inset-0 flex items-center justify-center">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="z-10 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-7xl sm:w-full"
      role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div class="bg-white px-4 pt-2 pb-4 sm:p-5 sm:pb-5 flex-col flex">
        <div v-if="!this.isFinishedTest" class="flex justify-end">
          <button @click="closeable()" type="button" class="py-2">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </button>
        </div>
        <div class="sm:flex w-full sm:items-start">
          <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left overflow-auto ...">
            <div class="flex text-center flex-col justify-center items-center mb-4 w-full">
              <!-- TÍTULO -->
              <h3 class="uppercase px-1 py-2 pt-0 text-2xl text-center leading-6 font-extrabold text-gray-900"
                id="modal-headline">
                TEST DE SOFTSKILLS
              </h3>
              <!-- INSTRUCCIONES -->
              <p v-if="!this.isFinishedTest"
                class="text-xs select-none text-gray-500 text-justify border-b-2 lg:mx-10 lg:text-base">Lea atentamente
                el enunciado y seleccione la opción que más se acople a su manera de ser. Si desea cerrar la ventana del
                test, se reiniciará por completo, por lo que, le pedimos atentamente que el test sea iniciado y
                terminado en el mismo intento.
              </p>
              <p v-else class="text-xs text-gray-500 select-none text-justify border-b-2 lg:text-lg">¡Gracias por
                realizar el test de Soft Skills!, los resultados han sido guardados y están en espera a revisión. Puede
                continuar completando el resto de zonas para su CV.</p>
            </div>
            <!-- CUERPO -->
            <div v-if="!this.isFinishedTest" class="mt-2 flex flex-col">
              <h4
                class="transition ease-in-out delay-1 uppercase duration-300 leading-none font-bold text-center lg:text-xl lg:font-bold">
                {{ this.questions[this.countQuestion]['question']}}</h4>
              <div class="flex flex-wrap justify-center gap-4 lg:gap-11">
                <div class="py-2 gap-3 flex flex-col justify-center sm:py-4 lg:gap-7">
                  <label :for="index" v-for="words, index in questions[this.countQuestion]['options']" :key="index"
                    :class="{'bg-green-600 text-white' : index == this.questions[this.countQuestion]['answer_skill'], 'cursor-pointer' : !this.questions[this.countQuestion]['fullAnswers']}"
                    class="select-none my-auto text-sm content-center text-center w-full border-2 p-2 lg:p-5 lg:text-lg lg:font-semibold">
                    <input @click="answered($event)" type="radio"
                      :disabled="this.questions[this.countQuestion]['answer_skill']" :id="index"
                      class="hidden content-center" :value="index">{{words}}
                  </label>
                </div>
              </div>
            </div>
            <div v-else class="mt-2 flex flex-col">
              <h4 class="font-bold text-center text-xl lg:text-2xl">¡TEST FINALIZADO!</h4>
              <div class="flex flex-wrap justify-center">
                <svg class="w-48 h-48 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                  </path>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- BOTONES / FOOTER PAGE -->
      <div
        class="flex flex-col bg-gray-50 px-4 py-6 text-center items-center justify-between content-center sm:px-6 lg:items-end lg:flex-row lg:text-end">
        <p v-if="!this.isFinishedTest"
          class="order-last mt-4 text-gray-900 text-base items-end lg:text-lg lg:order-first">
          {{this.countQuestion+1}}/30</p>
        <span v-if="!this.isFinishedTest"
          class="mt-3 flex w-auto items-center rounded-md justify-between shadow-sm sm:mt-0 sm:w-auto lg:align-middle">
          <button @click="clean()" type="button"
            class="inline-flex justify-center w-full rounded-md border select-none border-gray-300 mx-2 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 lg:px-8 lg:py-3 lg:text-xl">
            Limpiar
          </button>
          <button :disabled="this.countQuestion<=0" :class="{'opacity-40' : this.countQuestion<=0}"
            @click="this.countQuestion--" type="button"
            class=" inline-flex select-none justify-center w-full rounded-md border border-gray-300 mx-2 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 lg:px-8 lg:py-3 lg:text-xl">
            Atrás
          </button>
          <button v-if="this.countQuestion < 29" :disabled="!this.questions[this.countQuestion]['fullAnswers']"
            :class="{'opacity-40' : !this.questions[this.countQuestion]['fullAnswers']}" @click="nextCalculate()"
            type="button"
            class=" inline-flex justify-center w-full select-none rounded-md border border-gray-300 mx-2 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 lg:px-8 lg:py-3 lg:text-xl">
            Siguiente
          </button>
          <button v-else @click="finishButton()" :disabled="!this.questions[this.countQuestion]['fullAnswers']"
            :class="{'opacity-40' : !this.questions[this.countQuestion]['fullAnswers']}" type="button"
            class=" inline-flex justify-center w-full rounded-md border border-gray-300 mx-2 px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white focus:outline-none focus:border-blue-300 hover:bg-red-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 lg:px-8 lg:py-3 lg:text-xl">
            Finalizar
          </button>
        </span>
        <span v-else
          class="mt-3 flex w-auto items-center align-middle rounded-md shadow-sm sm:mt-0 sm:w-auto lg:self-end">
          <button @click="isStartTest = false, ifExists = true" type="button"
            class=" inline-flex justify-center justify-items-end w-full rounded-md border border-gray-300 mx-2 px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:text-white focus:outline-none focus:border-blue-300 hover:bg-blue-700 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5 lg:px-8 lg:py-3 lg:text-xl">
            Finalizar
          </button>
        </span>
      </div>
    </div>
  </div>

</template>

<script>
import BaseModal2 from '@/CustomComponents/Modal.vue';
import Swal from 'sweetalert2';
import questionData from '@/CustomData/SoftSkillsArray'
export default {
  components: { BaseModal2, Swal },
  props: ['userProp'],
  data() {
    return {
      formBind: false,
      ifExists: false,
      loadData: false,
      isShowModal: false,
      isStartTest: false,
      isFinishedTest: false,
      test_finished: false,
      cv_id: "",
      test: [],
      countQuestion: 0,
      test_soft: {
        "cv_id": 0,
        "name_user": "",
        "finished_test": false,
        "finished_date": ""

      },
      questions: questionData
    }

  },
  methods: {
    async getTests() {
      await axios.get(route('cv-search', this.cv_id))
        .then((response) => {
          this.cv_id = response.data[0].id;
        }).catch((error) => {
          console.log(error);
        });
      await axios.get(route('testsoftskills.show', this.cv_id))
        .then((response) => {
          this.test = response.data;
          if (response.data.length == 0) {
            this.ifExists = false
            this.newData = true
          } else {
            this.ifExists = true
            this.getAnswers();
          }
          if (this.test[this.test.length - 1].finished_test == "true") {
            this.test_finished = true;
          }
        }).catch((error) => {
          console.log(error)
          this.ifExists = false
        });
      this.loadData = true;
    },
    // METODOS PARA OBTENER LAS RESPUESTAS EN CASO DE QUE EXISTAN
    async getAnswers() {
      await axios.get(route('testsoftskillsAsw.show', this.test[this.test.length - 1].id))
        .then((response) => {
          this.question = response.data;
          for (let index = 0; index < this.question.length; index++) {
            this.questions[index].answer_skill = this.question[index].answer_skill;
            this.questions[index].fullAnswers = this.question[index].fullAnswers;
            this.questions[index].saved = this.question[index].saved;
          }
          if (this.question.length >= 0) this.countQuestion = this.question.length
        }).catch((error) => {
          console.log(error)
        });
    },
    async newTest() {
      if (!(this.test.length > 0) || this.test[this.test.length - 1].test_finished == "true") {
        var today = new Date();
        this.test_soft.cv_id = this.cv_id;
        this.test_soft.name_user = this.userProp.user_first_name;
        this.test_soft.finished_date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear()
        await axios.post(route('testsoftskills.store'), this.test_soft)
          .then((response) => {
            console.log(response);
            this.getTest();
            this.ifExists = true;
          }).catch((error) => {
            console.log(error);
          })
      }
    },
    async newAnswer() {
      var today = new Date();
      let formData = {}
      formData.test_id = this.test[this.test.length - 1].id,
        formData.question = this.questions[this.countQuestion]['question_number'],
        formData.soft_skill_tittle = this.questions[this.countQuestion]['options'][this.questions[this.countQuestion]['answer_skill']],
        formData.answer_skill = this.questions[this.countQuestion]['answer_skill'],
        formData.fullAnswers = this.questions[this.countQuestion]['fullAnswers'],
        formData.saved = this.questions[this.countQuestion]['saved'],
        formData.answer_date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear()

      await axios.post(route('testsoftskillsAsw.store'), formData)
        .then((response) => {
          console.log('guardado exitosamente')
        }).catch((error) => {
          console.log(error)
        })
    },
    async resultsInsert() {
      this.getTests()
      let countOptions = {}
      this.countQuestion <= 30 ? countOptions.finished_test = "true" : countOptions.finished_test = "false"
      var today = new Date();
      countOptions.finished_date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear()
      await axios.put(route('testsoftskills.update', this.test[this.test.length - 1].id), countOptions)
        .then((response) => {
          console.log(response)
        }).catch((error) => {
          console.log(error)
        })

    },
    toggleModal() {
      this.isShowModal = !this.isShowModal;
    },
    toggleModalTest() {
      this.isStartTest = !this.isStartTest;
      this.newTest();
    },
    handleClose() {
      this.$emit("close");
    },
    closeable() {
      Swal.fire({
        title: '¿Está seguro?',
        text: "Le recomendamos continuar con el test",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
          this.isStartTest = false;
          this.clean();
        }
      })
    },
    answered(e) {
      console.log('erda');
      console.log(e.target.value);
      if (e.target.value == this.questions[this.countQuestion]['answer_skill']) {
        var error = true;
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Selecciona otra opción diferente.',
        })
      } else {
        if (this.questions[this.countQuestion]['answer_skill'] == null && !error) {
          this.questions[this.countQuestion]['answer_skill'] = e.target.value;
          this.questions[this.countQuestion]['question'] = 'Si es correcto, presione el botón de siguiente. De lo contrario presione "limpiar"';
          this.questions[this.countQuestion]['fullAnswers'] = "true";
        }
      }
    },
    clean() {
      if (this.questions[this.countQuestion]['fullAnswers'] != false || this.questions[this.countQuestion]['answer_skill'] != null)
        this.questions[this.countQuestion]['fullAnswers'] = false
      this.questions[this.countQuestion]['answer_skill'] = null
      this.questions[this.countQuestion]['question'] = 'Seleccione el adjetivo que más se asemeje a su personalidad.';
    },
    nextCalculate() {
      this.questions[this.countQuestion]['saved'] === false ? this.questions[this.countQuestion]['saved'] = "true" : this.questions[this.countQuestion]['saved'] = this.questions[this.countQuestion]['saved']
      this.newAnswer()
      this.countQuestion < 30 ? this.countQuestion++ : this.countQuestion = 30;
      if (!(this.countQuestion < 30)) {
        this.resultsInsert()
        this.isFinishedTest = true
      }
    },
    finishButton() {
      Swal.fire({
        title: '¿Está seguro?',
        text: "Si finaliza se bloquea y no se procede a cambios.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.isConfirmed) {
          this.nextCalculate();
        }
      })
    },
  },

  created() {
    this.cv_id = this.userProp.id
    this.getTests();
  }

}
</script>

<style>
.modal-body {
  max-height: calc(100vh - 380px);
  overflow-y: auto;
}
</style>