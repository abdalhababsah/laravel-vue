<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Footer from './Footer.vue';
import Header from './Header.vue';
// Initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})

</script>

<template>

<!-- navbar -->
<div class="mx-22 sm:mx-2">
<!-- navbar -->
<!-- header -->
<Header/>

<!-- header -->
<!-- hero section -->

<!-- hero section -->


<!-- product list  -->
<slot/>
<!-- product list  -->
<!-- footer -->



<Footer/>
</div>

</template>
