
<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import CategoriesList from './CategoriesList.vue';

// Define the props received from the backend
const props = defineProps({
    categories: Object, // Paginated categories object
    filters: Object,    // Current filters (e.g., search)
});
</script>

<template>
    <AdminLayout>
        <CategoriesList :categories="categories" :filters="filters" />
    </AdminLayout>
</template>