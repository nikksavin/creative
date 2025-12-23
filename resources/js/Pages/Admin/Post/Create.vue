<template>
    <AdminLayout>
        <div class="flex">
            <h1 class="text-3xl font-semibold tracking-tight">Создать пост</h1>
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
                                Заголовок поста
                            </label>
                            <input
                                type="text"
                                v-model="post.title"
                                placeholder="Введите заголовок поста"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent transition-all"
                                required
                            >
                        </div>

                        <!-- Контент поста -->
                        <div class="mb-8">
                            <label for="content" class="block text-gray-800 font-medium mb-2 flex items-center">
                                <i class="fas fa-align-left text-gray-500 mr-2"></i>
                                Содержание поста
                            </label>
                            <textarea
                                v-model="post.content"
                                rows="8"
                                placeholder="Напишите содержание вашего поста..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent resize-y transition-all"
                                required
                            ></textarea>
                        </div>

                        <!-- Категория и теги -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <!-- Категория -->
                            <div>
                                <label for="category" class="block text-gray-800 font-medium mb-2 flex items-center">
                                    <i class="fas fa-tag text-gray-500 mr-2"></i>
                                    Категория
                                </label>
                                <select
                                    v-model="post.category_id"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent bg-white transition-all"
                                >
                                    <option value="" selected disabled>Выберите категорию</option>
                                    <option v-for="category in categories" :value="category.id">{{category.title}}</option>
                                </select>
                            </div>

                        </div>

                        <!-- Изображение -->
                        <div class="mb-8">
                            <label class="block text-gray-800 font-medium mb-2 flex items-center">
                                <i class="fas fa-image text-gray-500 mr-2"></i>
                                Изображение поста
                            </label>
                            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                                <input
                                    type="file"
                                    id="image"
                                    name="image"
                                    @change="setImage"
                                >
                            </div>
                        </div>

                        <div class="mb-6">
                            <!-- Дата публикации -->
                            <div>
                                <label for="publishDate" class="block text-gray-700 mb-2">Дата публикации</label>
                                <input
                                    type="date"
                                    v-model="post.published_at"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-transparent bg-white transition-all"
                                >
                            </div>
                        </div>

                        <!-- Кнопки действий -->
                        <div class="flex flex-col md:flex-row justify-center gap-4 pt-6 border-t border-gray-200">
                            <button
                                @click="storePost"
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
    props:{
        categories: Array
    },
    components: {
        Link,
        AdminLayout
    },
    data() {
        return {
            post: {}
        }
    },
    methods: {
        storePost() {
            axios.post(route('admin.posts.store'), this.post, {
                headers: {
                    "Content-Type" : "multipart/form-data"
                },
            })
            .then(res => {
                console.log(res);
                this.post = {

                }
            })
            .catch()
            .finally();
        },

        setImage(e) {
            this.post.image = e.target.files[0]
        }
    }
}

</script>

