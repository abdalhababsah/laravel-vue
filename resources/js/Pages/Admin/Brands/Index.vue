<script setup>
import AdminLayout from "../Components/AdminLayout.vue";
import BrandsList from "./BrandsList.vue";

// Define the props received from the backend
const props = defineProps({
    brands: Object, // Paginated brands object
    filters: Object, // Current filters (e.g., search)
});
</script>

<template>
    <AdminLayout>
        <BrandsList :brands="brands" :filters="filters" />
    </AdminLayout>
</template>