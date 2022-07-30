
<template>
  <AppLayout title="Dashboard">
    
    <div class="">
       <!-- <div class="grid grid-cols-4 gap-2"> -->
        <div class="flex items-start justify-start gap-4">
         <Progress class=""></Progress>
         <WorkPreferences class="mt-3 shadow-lg shadow-gray-300"></WorkPreferences>
         <BasicInfo class="mt-3 shadow-lg shadow-gray-300"></BasicInfo>
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
</script>

