<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Footer from './Footer.vue';
import Header from './Header.vue';
onMounted(() => {
    initFlowbite();
})
</script>

<template>
  <!-- Container with margins and background color -->
    <!-- Navbar -->
    <Header />

    <!-- Hero Section -->
    <!-- Content for hero section goes here -->

    <!-- Product List -->
    <slot />

    <!-- Footer -->
    <Footer />

</template>
