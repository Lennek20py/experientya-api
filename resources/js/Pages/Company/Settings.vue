<template>
    <admin-layout>
        <div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <div class="py-4">
                    <div class="relative max-w-4xl mx-auto md:px-8 xl:px-0">
                        <div class="pt-10 pb-16">
                            <div class="px-4 sm:px-6 md:px-0">
                                <h1 class="text-3xl font-extrabold text-gray-900">Opciones</h1>
                            </div>
                            <div class="px-4 sm:px-6 md:px-0">
                                <div class="py-6">
                                <!-- Tabs -->
                                <div class="lg:hidden">
                                    <label for="selected-tab" class="sr-only">Select a tab</label>
                                    <select id="selected-tab" name="selected-tab" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-purple-500 focus:border-purple-500 sm:text-sm rounded-md">
                                    <option selected>General</option>

                                    <option>Contraseña</option>

                                    <!-- <option>Notifications</option> -->

                                    <option>Plan</option>

                                    <!-- <option>Billing</option> -->

                                    <!-- <option>Team Members</option> -->
                                    </select>
                                </div>
                                <div class="hidden lg:block">
                                    <div class="border-b border-gray-200">
                                        <nav class="-mb-px flex space-x-8">
                                            <!-- Current: "border-purple-500 text-purple-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                                            <a href="#" @click="option = 0" :class='option == 0 ? "border-teal-500 text-teal-600" : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"' class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> General </a>

                                            <a href="#" @click="option = 1" :class='option == 1 ? "border-teal-500 text-teal-600" : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"' class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Contraseña </a>

                                            <!-- <a href="#" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Notifications </a> -->

                                            <a href="#" @click="option = 2" :class='option == 2 ? "border-teal-500 text-teal-600" : "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700"' class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"> Plan </a>

                                        </nav>
                                    </div>
                                </div>

                                    <!-- Description list with inline editing -->
                                    <div>
                                        <Profile :userInfo="userInfo" v-if="option == 0"/>
                                        <Password v-else-if="option == 1"/>
                                        <Package v-else-if="option == 2"/>
                                    </div>
                                    <!-- Description list with inline editing -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/Layouts/CompanyLayout'
    import Profile from '@/Components/Company/Profile'
    import Password from '@/Components/Company/Password'
    import Package from '@/Components/Company/Package'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link,
            AdminLayout,
            Profile,
            Password,
            Package
        },
        props: {
            userInfo: Object
        },
        data() {
            return {
                option: 0
            }
        }
    })

</script>
