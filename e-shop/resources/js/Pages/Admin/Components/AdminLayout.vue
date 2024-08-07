<script setup>
import Navbar from "./Navbar.vue";
import Sidebar from "./Sidebar.vue";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
onMounted(() => {
    initFlowbite();
});
</script>
<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- navbar -->
        <Navbar />
        <!-- navbar end -->

        <!-- Sidebar -->
        <Sidebar />
        <main class="p-4 md:ml-64 h-auto pt-20">

        <!-- Sidebar end -->
        <slot />
        </main>

    </div>
</template>

