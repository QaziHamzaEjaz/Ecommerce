<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
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
    <Head title="Admin" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin</h2>
            
        </template>

        <div class="py-12">           
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-3">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Admin</div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
