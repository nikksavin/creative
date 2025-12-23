<template>
    <AdminLayout>
        <!-- Page header -->
        <div class="flex items-end justify-between">
            <div>
                <h1 class="text-3xl font-semibold tracking-tight">Профили</h1>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6" v-for="profile in profiles">

            <div class="col-span-12 xl:col-span-12 bg-white/80 backdrop-blur rounded-3xl border border-gray-200 shadow-sm p-6">
                <Link :href="route('admin.profiles.show', profile.id)"> {{ profile.id }}</Link>
            </div>

        </div>
    </AdminLayout>
</template>

<script>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
export default {
    title: 'title',
    name: "Index",
    props:{
        profiles: Array
    },
    components: {
        Link,
        AdminLayout
    },
}
</script>



<style scoped>

</style>
