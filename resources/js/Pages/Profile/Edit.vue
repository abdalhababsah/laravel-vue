<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-2xl font-bold text-gray-900">Profile Settings</h2>
        </template>

        <div class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
                <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                    <div class="p-6 sm:p-8 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Profile Information</h3>
                        <p class="text-sm text-gray-600 mb-6">Manage your account details and preferences.</p>
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="max-w-xl"
                        />
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                    <div class="p-6 sm:p-8 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Security</h3>
                        <p class="text-sm text-gray-600 mb-6">Ensure your account stays secure.</p>
                        <UpdatePasswordForm class="max-w-xl" />
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-lg rounded-2xl">
                    <div class="p-6 sm:p-8 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Delete Account</h3>
                        <p class="text-sm text-gray-600 mb-6">Permanently remove your account and all associated data.</p>
                        <DeleteUserForm class="max-w-xl" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
