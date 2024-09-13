<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import CategoriesList from './CategoriesList.vue';
defineProps({
    categories:Array,
})
</script>

<template>
<AdminLayout>
<CategoriesList :categories="categories"/>
</AdminLayout>
</template>
