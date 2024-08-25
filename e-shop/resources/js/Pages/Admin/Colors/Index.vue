<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import ColorsList from './ColorsList.vue';
defineProps({
    colors: Array,
})
</script>

<template>
    <AdminLayout>
        <ColorsList :colors="colors" />
    </AdminLayout>
</template>
