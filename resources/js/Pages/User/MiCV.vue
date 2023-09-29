<template>
  <AppLayout title="Mi CV">
    <div class="min-h-screen pt-16 scroll-smooth">
      <Notification :message="$page.props.flash.message"
        class="text-green-500 font-semibold rounded-full border-green-800 fixed right-2 bottom-2" />
      <div class="flex items-start justify-start gap-4">
        <Progress :userProp="user" :cvId="mi_cv" :updateStatus="updateStatus" @sending-event="ReceivedEvent" class="md:block fixed"
          :class="{ 'block': progressHide, 'hidden': !progressHide }"></Progress>
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75" :class="{ 'block': progressHide, 'hidden': !progressHide }">
        </div>
        <div class="hidden md:block invisible w-full md:max-w-[200px] lg:max-w-[220px] 2xl:max-w-[250px]"></div>
        <div @click="ProgressBind()" class="animate-bounce fixed bottom-0 left-0 m-4 md:hidden z-50">
          <svg :class="{ 'hidden': progressHide }" class="w-12 h-12 text-blue-600" fill="#fff" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <svg :class="{ 'hidden': !progressHide }" class="w-12 h-12 text-red-600" fill="#fff" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
          </svg>
        </div>
        <!-- <Progress class="hidden md:block md:fixed md:top-20 md:left-0"></Progress> -->
        <div class="flex flex-col align-center gap-4 w-full align-center pb-3">
          <div class="flex flex-col align-center justify-center mx-3 mt-3 gap-4 lg:flex-row lg:mr-4 lg:mx-0">
            <WorkPreferences id="workPreferencesSection" :userProp="user" :cvId="mi_cv" @sending-event="ReceivedEvent" class="order-last shadow-lg shadow-gray-300 lg:order-first">
            </WorkPreferences>
            <BasicInfo id="tittleSection" :userProp="user" :cvId="mi_cv" @sending-event="ReceivedEvent"
              class="order first items-center shadow-lg shadow-gray-300 lg:order-first">
            </BasicInfo>
          </div>
          <BlockedInfo />
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

<script>
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
import BlockedInfo from '@/Pages/User/UserCV/BlockedInfo.vue';
import axios from 'axios'

import { defineComponent } from "vue";

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    Progress,
    BasicInfo,
    WorkPreferences,
    Study,
    Certifications,
    Notification,
    Languages,
    Experience,
    TestSoft,
    Testdisc,
    BaseModal,
    Skills,
    BlockedInfo
  },
  props: {
    user: Object,
    cvId: Object
  },
  data() {
    return {
      updateStatus: "",
      progressHide: false,
      mi_cv: {}

    }
  },
  methods: {
    async getCv () {
      await axios.get(route('cv-search', this.user.id))
        .then((response) => {
          this.mi_cv = response.data[0]
        }).catch((error) => {
          console.log(error)
        })
    },
    ReceivedEvent(n) {
      this.updateStatus = n
    },
    ProgressBind() {
      this.progressHide = !this.progressHide
      console.log('ahora es: ' + this.progressHide)
    }
  },
  created () {
    this.getCv()
  }
})

</script>

<style>
#workPreferencesSection, #tittleSection, #educationSection, #certificationsSection, #languagesSection, #workExperienceSection, #skillsSection {
  scroll-margin-top: 68px;
}
</style>
