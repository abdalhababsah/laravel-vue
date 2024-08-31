<script setup>
import { onMounted, ref, computed } from "vue";
import { initFlowbite } from "flowbite";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ElDialog, ElInput, ElCheckbox, ElForm, ElFormItem, ElButton } from "element-plus";
import Pagination from "../Components/Pagination.vue";
import { Plus } from '@element-plus/icons-vue';

// Initialize Flowbite
onMounted(() => {
    initFlowbite();
});

// Define props
const props = defineProps({
    users: Object,
});

const editMode = ref(false);
const dialogVisible = ref(false);
const searchQuery = ref("");

// User data
const id = ref("");
const name = ref("");
const number = ref("");
const email = ref("");
const password = ref("");
const isAdmin = ref(false);

// Reset form data
const resetFormData = () => {
    id.value = "";
    name.value = "";
    email.value = "";
    number.value = "";
    password.value = "";
    isAdmin.value = false;
    dialogVisible.value=false;
};

// Open Add User modal
const openAddModal = () => {
    resetFormData();
    editMode.value = false;
    dialogVisible.value = true;
};

// Open Edit User modal
const openEditModal = (user) => {
    id.value = user.id;
    name.value = user.name;
    email.value = user.email;
    number.value = user.number;
    isAdmin.value = 0;
    password.value = "";
    editMode.value = true;
    dialogVisible.value = true;

};

// Add new user
const addUser = async () => {
    const data = {
        name: name.value,
        email: email.value,
        number: number.value,
        password: password.value,
        isAdmin: isAdmin.value,
    };

    try {
        await router.post("/admin/users/store", data, {
            onSuccess: (page) => {
                dialogVisible.value = false;
                Swal.fire({
                    toast: true,
                    title: page.props.flash.success || "User created successfully",
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                });
                resetFormData();
            },
            onError: (errors) => {
                Swal.fire({
                    title: "Error!",
                    text: Object.values(errors).join(", "),
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
        });
    } catch (error) {
        Swal.fire({
            title: "Error!",
            text: "There was an error creating the user.",
            icon: "error",
            confirmButtonText: "OK",
        });
    }
};

// Update existing user
const updateUser = async () => {
    const data = {
        name: name.value,
        email: email.value,
        number: number.value,
        isAdmin: isAdmin.value,
        ...(password.value && { password: password.value }),
        _method: "PUT",
    };
    try {
        await router.post(`/admin/users/update/${id.value}`, data, {
            onSuccess: (page) => {
                Swal.fire({
                    toast: true,
                    title: page.props.flash.success || "User updated successfully",
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                });
                dialogVisible.value = false;
                resetFormData();
            },
            onError: (errors) => {
                Swal.fire({
                    title: "Error!",
                    text: Object.values(errors).join(", "),
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
        });
    } catch (error) {
        Swal.fire({
            title: "Error!",
            text: "There was an error updating the user.",
            icon: "error",
            confirmButtonText: "OK",
        });
    }
};

// Delete user
const deleteUser = async (userId) => {
    try {
        const result = await Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
        });
        if (result.isConfirmed) {
            await router.delete(`/admin/users/delete/${userId}`, {
                onSuccess: (page) => {
                    Swal.fire({
                        toast: true,
                        title: page.props.flash.success || "User deleted successfully",
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                onError: (errors) => {
                    Swal.fire({
                        title: "Error!",
                        text: Object.values(errors).join(", "),
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
            });
        }
    } catch (error) {
        Swal.fire({
            title: "Error!",
            text: "There was an error deleting the user.",
            icon: "error",
            confirmButtonText: "OK",
        });
    }
};

// Filtered users based on search query
const filteredUsers = computed(() => {
    if (!searchQuery.value) {
        return props.users.data || [];
    }
    return (props.users.data || []).filter((user) =>
        user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
        user.email.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});
</script>

<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 fade-in-right">
        <!-- User Dialog -->
        <el-dialog
            v-model="dialogVisible"
            :title="editMode ? 'Edit User' : 'Add User'"
            width="500px"
            :before-close="resetFormData"

        >
            <el-form :model="{ name, email, password, number, isAdmin  }" label-width="100px"  label-position="left">
                <el-form-item label="Name" required>
                    <el-input v-model="name" placeholder="Enter user name"></el-input>
                </el-form-item>

                <el-form-item label="Email" required>
                    <el-input v-model="email" placeholder="Enter user email"></el-input>
                </el-form-item>
                <el-form-item label="Number" required>
                <el-input v-model="number" placeholder="Enter user number"></el-input>
            </el-form-item>
                <el-form-item label="Password" :required="!editMode">
                    <el-input
                        v-model="password"
                        type="password"
                        placeholder="Enter password"
                        autocomplete="new-password"
                    ></el-input>
                    <small v-if="editMode">Leave blank to keep existing password</small>
                </el-form-item>

                <el-form-item label="Admin" class="ml-3">
                    <el-checkbox v-model="isAdmin"></el-checkbox>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" @click="editMode ? updateUser() : addUser()">
                        {{ editMode ? "Update" : "Create" }}
                    </el-button>
                    <el-button @click="dialogVisible = false">Cancel</el-button>
                </el-form-item>
            </el-form>
        </el-dialog>
        <!-- End User Dialog -->

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4"
                >
                    <div class="w-full md:w-1/2">
                        <div class="relative w-full">
                            <input
                                type="text"
                                v-model="searchQuery"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Search by name or email"
                            />
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                                @click="searchQuery = ''"
                            >
                                <svg
                                    v-if="searchQuery"
                                    class="w-5 h-5 text-gray-500"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10 8.586l3.293-3.293a1 1 0 011.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 011.414-1.414L10 8.586z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="w-full md:w-auto flex justify-end">
                        <el-button type="primary" @click="openAddModal">
                            <Plus class="h-3.5 w-3.5 font-bold  mr-2" />
                            Add User
                        </el-button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Name</th>
                                <th scope="col" class="px-4 py-3">Number</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Role</th>
                                <th scope="col" class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-if="filteredUsers.length"
                                v-for="user in filteredUsers"
                                :key="user.id"
                                class="border-b dark:border-gray-700"
                            >
                                <td class="px-4 py-3">{{ user.id }}</td>
                                <td class="px-4 py-3">{{ user.name }}</td>
                                <td class="px-4 py-3">{{ user.number }}</td>
                                <td class="px-4 py-3">{{ user.email }}</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded-full text-white"
                                        :class="user.isAdmin ? 'bg-green-500' : 'bg-blue-500'"
                                    >
                                        {{ user.isAdmin ? 'Admin' : 'User' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right flex items-center justify-end space-x-2">
                                    <el-button size="small" type="primary" @click="openEditModal(user)">
                                        Edit
                                    </el-button>
                                    <el-button
                                        size="small"
                                        type="danger"
                                        @click="deleteUser(user.id)"
                                    >
                                        Delete
                                    </el-button>
                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="4" class="text-center py-4">
                                    No users found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <pagination :pagination="props.users" />
            </div>
        </div>
    </section>
</template>

<style scoped>
/* @keyframes fadeInRight {
    0% {
        opacity: 0;
        transform: translateX(100px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

.fade-in-right {
    animation: fadeInRight 0.5s ease-in;
} */
</style>
