<template>
    <AdminLayout>
        <div class="flex">
            <h1 class="text-3xl font-semibold tracking-tight">Создать категорию</h1>
        </div>
        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 xl:col-span-12 bg-white/80 backdrop-blur rounded-3xl border border-gray-200 shadow-sm p-6">

                <!-- Форма -->
                <div class="bg-white rounded-xl form-shadow overflow-hidden transition-all">
                    <div id="postForm" class="p-6 md:p-8">
                        <!-- Заголовок поста -->
                        <div class="mb-8">
                            <label for="title" class="block text-gray-800 font-medium mb-2 flex items-center">
                                <i class="fas fa-heading text-gray-500 mr-2"></i>
                                Заголовок категории
                            </label>
                            <input
                                type="text"
                                v-model="category.title"
                                placeholder="Введите заголовок категории"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition-all"
                                required
                            >
                        </div>

                        <!-- Кнопки действий -->
                        <div class="flex flex-col md:flex-row justify-end gap-4 pt-6 border-t border-gray-200">
                            <button
                                @click="storeCategory"
                                class="px-6 py-3 bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-900 transition-all flex items-center justify-center"
                            >
                                <i class="fas fa-paper-plane mr-2"></i>
                                Опубликовать пост
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Уведомление об успешной отправке -->
                <div id="successMessage" class="hidden mt-6 p-4 bg-gray-800 text-white rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-xl mr-3"></i>
                        <div>
                            <p class="font-medium">Пост успешно добавлен!</p>
                            <p class="text-gray-300 text-sm">Ваш пост был сохранен и готов к публикации.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
export default {
    name: "Create",
    components: {
        Link,
        AdminLayout
    },
    data() {
        return {
            category: {}
        }
    },
    methods: {
        storeCategory() {
            axios.post(route('admin.categories.store'), this.category)
                .then(res => {
                    console.log(res);
                    alert('added')
                })
                .catch()
                .finally();
        }
    }
}

</script>



<style scoped>

</style>
Í
