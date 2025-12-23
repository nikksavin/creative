<template>
    <AdminLayout>
        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 xl:col-span-12 bg-white/80 backdrop-blur rounded-3xl border border-gray-200 shadow-sm p-6">

                <div class="flex items-end justify-between">
                    <div>
                        <h1 class="text-3xl font-semibold tracking-tight">{{ tag.title }}</h1>
                    </div>
                    <Link :href="route('admin.tags.index')" class="px-5 py-2.5 rounded-xl bg-gray-900 text-white text-sm font-medium shadow hover:bg-gray-800 transition">Назад</Link>
                </div>

            </div>

        </div>

    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
export default {
    name: "Show",
    props:{
        tag: Object
    },
    components: {
        Link,
        AdminLayout
    },
}

</script>



<style scoped>

</style>
Í
