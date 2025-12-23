<template>
    <AdminLayout>
        <!-- Page header -->
        <div class="flex items-end justify-between">
            <div>
                <h1 class="text-3xl font-semibold tracking-tight">Теги</h1>
            </div>
            <Link :href="route('admin.tags.create')" class="px-5 py-2.5 rounded-xl bg-gray-900 text-white text-sm font-medium shadow hover:bg-gray-800 transition">Создать</Link>
        </div>

        <div class="grid grid-cols-12 gap-6" v-for="tag in tags">

            <div class="col-span-12 xl:col-span-12 bg-white/80 backdrop-blur rounded-3xl border border-gray-200 shadow-sm p-6">
                <Link :href="route('admin.tags.show', tag.id)"> {{ tag.title }}</Link>
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
        tags: Array
    },
    components: {
        Link,
        AdminLayout
    },
}
</script>



<style scoped>

</style>
