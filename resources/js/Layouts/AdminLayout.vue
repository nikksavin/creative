<template>

    <!-- Header -->
    <header class="sticky top-0 z-50 h-16 bg-white/70 backdrop-blur-xl border-b border-gray-200">
        <div class="h-full max-w-7xl mx-auto px-6 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-gray-700 to-gray-900 text-white flex items-center justify-center font-bold shadow">M</div>
                <span class="text-lg font-semibold tracking-tight">My App</span>
            </div>
            <div class="flex items-center gap-4 text-sm text-gray-500">
                <span>Admin panel</span>
                <div class="w-8 h-8 rounded-full bg-gray-300"></div>
            </div>
        </div>
    </header>

    <!-- Main -->
    <div class="flex min-h-[calc(100vh-4rem-3rem)]">

        <!-- Sidebar -->
        <aside class="w-72 bg-gradient-to-b from-gray-900 to-gray-800 text-gray-300 px-4 py-6">
            <div class="mb-8 px-3">
                <div class="text-xs uppercase tracking-widest text-gray-500 mb-2">Навигация</div>
            </div>

            <nav class="space-y-1">
                <Link :href="route('admin.posts.index')" class="group flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white shadow-inner">Посты</Link>
                <Link :href="route('admin.categories.index')" class="group flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white shadow-inner">Категории</Link>
                <Link :href="route('admin.tags.index')" class="group flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white shadow-inner">Теги</Link>
                <Link :href="route('admin.profiles.index')" class="group flex items-center gap-3 px-4 py-3 rounded-xl bg-white/10 text-white shadow-inner">Профили</Link>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 px-10 py-8">
            <div class="max-w-7xl mx-auto space-y-8">
                <slot/>
            </div>
        </main>

    </div>

    <!-- Footer -->
    <footer class="h-12 bg-white/70 backdrop-blur border-t border-gray-200 text-gray-500 flex items-center justify-center text-sm">
        © 2025 My App
    </footer>

</template>

<script setup>
import {Link} from "@inertiajs/vue3";
</script>



<style scoped>

</style>
