<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { ref, onMounted } from 'vue';
import axios from 'axios';

const blogs = ref([]);

onMounted(async () => {
    const response = await axios.get('/get_all_blogs');
    blogs.value = response.data;
});
</script>


<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blogs</h2>
            
        </template>

        <div class="py-12">           
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3" v-for="blog in blogs" :key="blog.id">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">{{ blog.title }}</div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
