<script setup>
import DeleteUserForm from './ProfilePartials/DeleteUserForm.vue';
import UpdatePasswordForm from './ProfilePartials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './ProfilePartials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';
import MainLayout from './Layouts/MainLayout.vue';
import UpdateAddressForm from './ProfilePartials/UpdateAddressForm.vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    address: {
        type: Array,
    },
});
</script>

<template>
    <Head title="Profile" />

    <MainLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Profile</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <!-- Grid layout for Profile and Address Information side by side -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Profile Information Form -->
                    <div class="p-4 sm:p-8 bg-white shadow">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                        />
                    </div>

                    <!-- Address Information Form -->
                    <div class="p-4 sm:p-8 bg-white shadow">
                        <UpdateAddressForm :address="address"/>
                    </div>
                </div>

                <!-- Grid layout for Password and Delete User forms -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Update Password Form -->
                    <div class="p-4 sm:p-8 bg-white shadow">
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>

                    <!-- Delete User Form -->
                    <div class="p-4 sm:p-8 bg-white shadow">
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>
            </div>
        </div>
    </MainLayout>
</template>
