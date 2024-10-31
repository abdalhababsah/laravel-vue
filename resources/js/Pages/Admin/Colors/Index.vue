<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import ColorsList from './ColorsList.vue';
defineProps({
    colors: Array,
    filters: Object
})
</script>

<template>
    <AdminLayout>
        <ColorsList :filters="filters" :colors="colors" />
    </AdminLayout>
</template>
