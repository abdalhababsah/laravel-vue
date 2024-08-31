<script setup>
import AdminLayout from "../Components/AdminLayout.vue";
import UsersList from "./UsersList.vue";
import { defineProps, reactive } from 'vue';
const props = defineProps({
    users: Array
});
// const users = reactive(props.users);
</script>
<template>
    <AdminLayout>
        <UsersList :users="users" />
    </AdminLayout>
</template>
