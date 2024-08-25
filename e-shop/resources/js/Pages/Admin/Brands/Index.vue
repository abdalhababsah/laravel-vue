<script setup>
import AdminLayout from "../Components/AdminLayout.vue";
import BrandsList from "./BrandsList.vue";
defineProps({
    brands: Array,
})

</script>
<template>
    <AdminLayout>

        <BrandsList :brands="brands" />

    </AdminLayout>
</template>
