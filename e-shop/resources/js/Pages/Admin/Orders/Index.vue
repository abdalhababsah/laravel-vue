<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import OrdersList from './OrdersList.vue';
defineProps({
    orders:Object,
});
</script>
<template>
<AdminLayout>

   <OrdersList :orders = 'orders'/>
</AdminLayout>
</template>
