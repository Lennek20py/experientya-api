<template>
  <AppLayout title="Mi CV">
    <div class="min-h-screen">
      <Notification :message="$page.props.flash.message" class="text-green-500 font-semibold rounded-full border-green-800 fixed right-2 bottom-2" />
        <div class="flex items-start justify-start gap-4">
          <Progress :userProp="user" class="hidden md:block "></Progress>
          <!-- <Progress class="hidden md:block md:fixed md:top-20 md:left-0"></Progress> -->
          <div class="flex flex-col align-center gap-4 w-full align-center pb-3">
            <div class="flex flex-col align-center justify-center mx-3 mt-3 gap-4 lg:flex-row lg:mr-4 lg:mx-0">
              <WorkPreferences :userProp="user"  class="order-last shadow-lg shadow-gray-300 lg:order-first"></WorkPreferences>
              <BasicInfo :userProp="user" class="order first items-center shadow-lg shadow-gray-300 lg:order-first"></BasicInfo>
            </div>
            <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
              <Study :userProp="user" class="shadow-lg shadow-gray-300"></Study>
            </div>
            <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
              <Certifications :userProp="user" class="shadow-lg shadow-gray-300"></Certifications>
            </div>
            <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
              <Languages :userProp="user" class="shadow-lg shadow-gray-300"></Languages>
            </div>
            <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
              <Experience :userProp="user" class="shadow-lg shadow-gray-300"></Experience>
            </div>
            <div class="gap-4 mx-3 lg:mx-0 lg:mr-4">
              <Skills :userProp="user" class="shadow-lg shadow-gray-300"></Skills>
            </div>
            <div class="gap-4 mx-3 flex flex-col md:flex-row lg:mx-0 lg:mr-4">
              <Testdisc :userProp="user" class="shadow-lg shadow-gray-300"></Testdisc>
              <TestSoft :userProp="user" class="shadow-lg shadow-gray-300"></TestSoft>
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
import Notification from '@/CustomComponents/Notification.vue';
import Languages from '@/Pages/User/UserCV/Languages.vue';
import Experience from '@/Pages/User/UserCV/Experience.vue';
import Testdisc from '@/Pages/User/UserCV/TestDisc.vue';
import TestSoft from '@/Pages/User/UserCV/TestSoftskills.vue';
import BaseModal from '@/CustomComponents/Modal.vue';
import Skills from '@/Pages/User/UserCV/Skills.vue';

const props = defineProps({
  user: Object
})

</script>
