<template>
    <admin-layout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Replace with your content -->
                <div class="py-4">
                    {{ $page.props.auth.company }}
                </div>
            <!-- /End replace -->
            </div>
        </div>
    </admin-layout>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    import AdminLayout from '@/Layouts/CompanyLayout'

    import { defineComponent } from 'vue'

    export default defineComponent({
        components: {
            Link,
            AdminLayout
        },
        methods: {
            logout() {
                this.$inertia.post(route('admin.logout'));
            }
        },
    })

</script>
