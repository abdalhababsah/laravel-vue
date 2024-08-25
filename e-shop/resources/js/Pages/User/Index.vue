<script setup>
import Hero from './Layouts/Hero.vue';
import CompanyDivider from './Components/CompanyDivider.vue';
import UserLayouts from './Layouts/UserLayouts.vue';
import ProductsSliderHome from './Components/ProductsSliderHome.vue';
import ProductCards from './Components/ProductCards.vue';
import ImageDivider from './Components/ImageDivider.vue';
import ImageSlider from './Components/ImageSlider.vue';
import AboutSectionHome from './Components/AboutSectionHome.vue';
defineProps({
    new_products: Array,
    featured_products: Array,
    products: Array
})

</script>

<template>
    <UserLayouts>
        <Hero />

        <CompanyDivider/>
        <ProductsSliderHome/>
        <ImageDivider/>
        <ImageSlider/>
        <AboutSectionHome/>


                <!-- <ProductCards :products="featured_products" gridClass="lg:grid-cols-4" /> -->

      </UserLayouts>





</template>
