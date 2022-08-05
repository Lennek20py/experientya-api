<template>
  <AppLayout title="Mi CV">
    <div class="">
       <!-- <div class="grid grid-cols-4 gap-2"> -->
        <div class="flex items-start justify-start gap-4">
         <Progress class=""></Progress>
         <div class="flex flex-col align-center gap-4 w-full">
          <div class="flex flex-row align-center justify-center gap-4 mt-3 mr-4">
            <WorkPreferences class="shadow-lg shadow-gray-300"></WorkPreferences>
            <BasicInfo class="shadow-lg shadow-gray-300"></BasicInfo>
          </div>
          <div class="gap-4 mr-4">
            <Study class=""></Study>
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
</script>
