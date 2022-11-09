<template>

   <aside class="max-w-72 min-h-screen h-full max-h-[200vh] flex flex-col" aria-label="Sidebar">
      <div class="w-auto py-4 h-full max-h-[200vh] px-3 min-h-screen bg-gray-100 rounded lg:w-auto 2xl:w-64">
         <!-- PROGRESS CIRCLE  -->
         <div class="space-y-2">
            <h2 class="text-center text-gray-900 font-extrabold text-2xl "> Perfil </h2>
            <div
               class="circular-progress mx-auto relative h-36 w-36 flex items-center justify-center before:absolute before:h-20 before:w-20">
               <span class="relative text-lg font-extrabold text-gray-900">{{ this.general_progress }}%</span>
            </div>
         </div>
         <ul class="pt-4 mt-4 space-y-2 border-t border-gray-800">
            <li>
               <div class="p-2 text-base font-semibold text-white rounded-lg transition duration-75 group bg-blue-500">
                  <span class="flex flex-row justify-between">Preferencias laborales <svg class="w-6 h-6"
                        :class="[progress['work'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Título de puesto <svg class="w-6 h-6"
                        :class="[progress['position'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Educación <svg class="w-6 h-6"
                        :class="[progress['study'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Certificaciones <svg class="w-6 h-6"
                        :class="[progress['certification'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Idiomas <svg class="w-6 h-6"
                        :class="[progress['language'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Experiencia Laboral <svg class="w-6 h-6"
                        :class="[progress['experience'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Skills <svg class="w-6 h-6"
                        :class="[progress['skill'] == 'true' ? 'visible' : 'invisible']" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <!-- <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg> -->
                  <span class="flex flex-row justify-between">Test Competencias
                     <svg class="w-6 h-6 text-yellow-500"
                        :class="[progress['testcompetition'] != 'false' && progress['testcompetition'] <= 26 ? 'visible' : 'invisible']"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                     </svg>
                     <svg class="w-6 h-6"
                        :class="[progress['testcompetition'] != 'false' && progress['testcompetition'] > 26 ? 'visible' : 'invisible']"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
            <li>
               <div
                  class="p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 group">
                  <span class="flex flex-row justify-between">Test de SoftSkills
                     <svg class="w-6 h-6 text-yellow-500"
                        :class="[progress['testsoftskill'] != 'false' && progress['testsoftskill'] <= 28 ? 'visible' : 'invisible']"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                        </path>
                     </svg>
                     <svg class="w-6 h-6"
                        :class="[progress['testsoftskill'] != 'false' && progress['testsoftskill'] > 28 ? 'visible' : 'invisible']"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                        </path>
                     </svg></span>
               </div>
            </li>
         </ul>
      </div>
   </aside>


</template>

<script>
export default ({
   props: ['userProp', 'updateStatus'],
   data: function () {
      return {
         general_progress: "0",
         deg: "50",
         cv_id: "",
         progress: []
      };
   },
   methods: {
      async getProgress() {
         await axios.get(route('cv-search', this.userProp.id))
            .then((response) => {
               this.cv_id = response.data;
            }).catch((error) => {
               console.log(error);
            });

         await axios.get(route('progress.index', this.cv_id))
            .then((response) => {
               this.progress = response.data
            })
         this.calculate()
         this.$emit('sending-event', '')
      },
      circulo() {
         let circularProgress = document.querySelector(".circular-progress"),
            progressValue = document.querySelector(".progress-value");
      },
      calculate() {
         let subtotal = 0
         this.progress["position"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["work"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["study"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["certification"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["language"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["experience"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["skill"] == "true" ? subtotal += 1 : subtotal = subtotal
         this.progress["testcompetition"] == 27 ? subtotal += 1 : subtotal = subtotal

         this.progress["testsoftskill"] == "false" ? subtotal = subtotal : subtotal = subtotal
         // this.progress["testsoftskill"] == "true" ? subtotal += 1 : subtotal = subtotal
         // console.log('aqui el subtotal: ', subtotal)
         let total = (subtotal / 9) * 100
         this.general_progress = total.toFixed(1)

      }

   },
   created() {
      this.circulo();
      this.getProgress()
   },
   mounted() {
      
   },
   watch : {
      updateStatus(oldStatus, newStatus) {
         this.getProgress()
      }
   }
});

</script>

<style>
.circular-progress {
   border-radius: 50%;
   background: conic-gradient(#3B82F6 v-bind((general_progress*3.6)+"deg"), #ffffff 0deg);
}

.circular-progress::before {
   content: "";

   border-radius: 50%;
   background-color: rgb(243 244 246 / var(--tw-bg-opacity));
}
</style>