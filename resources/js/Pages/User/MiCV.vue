<template>
  <AppLayout title="Mi CV">
    <div class="">
       <!-- <div class="grid grid-cols-4 gap-2"> -->
        <div class="flex items-start justify-start gap-4">
         <Progress class="hidden md:block"></Progress>
         <div class="flex flex-col align-center gap-4 w-full align-center pb-3">
          <div class="flex flex-col align-center justify-center mx-3 mt-3 gap-4 lg:flex-row lg:mr-4 lg:mx-0">
            <WorkPreferences :userProp="user"  class="order-last shadow-lg shadow-gray-300 lg:order-first"></WorkPreferences>
            <BasicInfo :userProp="user" class="order first items-center shadow-lg shadow-gray-300 lg:order-first"></BasicInfo>
          </div>
          <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
            <Study :userProp="user" class=""></Study>
          </div>
          <div class="gap-4 mr-4">
            <Certifications class=""></Certifications>
          </div>
         </div>
       </div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
           
          <!-- <Welcome />-->
        </div>
      </div>
    </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/UserLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Progress from "@/Pages/User/UserCV/Progress.vue";
import BasicInfo from "@/Pages/User/UserCV/BasicInfo.vue";
import WorkPreferences from "@/Pages/User/UserCV/WorkPreferences.vue";
import Study from "@/Pages/User/UserCV/StudyHistory.vue";
import Certifications from "@/Pages/User/UserCV/Certifications.vue";

const props = defineProps({
  user: Object
})

</script>
