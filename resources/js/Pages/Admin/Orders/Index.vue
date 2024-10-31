<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import OrdersList from './OrdersList.vue';

// Define the props received from the backend
const props = defineProps({
    orders: Object, // Paginated orders object
    filters: Object, // Current filters (e.g., search)
});
</script>

<template>
    <AdminLayout>
        <OrdersList :orders="orders" :filters="filters" />
    </AdminLayout>
</template>