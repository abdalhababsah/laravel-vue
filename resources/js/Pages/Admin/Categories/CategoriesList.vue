<script setup>
import { onMounted, ref } from "vue";
import { initFlowbite } from "flowbite";
import { router, usePage } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import Pagination from "../Components/Pagination.vue";

onMounted(() => {
    initFlowbite();
});

defineProps({
    categories: Array
});

const editMode = ref(false);
const isAddCategory = ref(false);
const dialogVisible = ref(false);

// Category data
const id = ref("");
const name = ref("");
const slug = ref("");

// Reset form data
const resetFormData = () => {
    id.value = '';
    slug.value = '';
    name.value = '';
};

const AddCategory = async () => {
    const data = {
        name: name.value,
        slug: slug.value
    };

    try {
        await router.post("/admin/categories/store", data, {
            onSuccess: (page) => {
                Swal.fire({
                    toast: true,
                    title: page.props.flash.success,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                });
                dialogVisible.value = false;
                resetFormData();
            }
        });
    } catch (error) {
        Swal.fire({
            title: "Error!",
            text: "There was an error creating the Category: " + error.message,
            icon: "error",
            confirmButtonText: "OK",
            timer: 1500,
        });
    }
};


// Delete Category
const deleteCategory = async (id) => {
    try {
        console.log(id);
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        });
        if (result.isConfirmed) {
            await router.delete(`/admin/categories/delete/${id}`, {
                onSuccess: (page) => {
                    Swal.fire({
                        toast: true,
                        title: page.props.flash.success,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            });
        }
    } catch (error) {
        Swal.fire({
            toast: true,
            title: "Error!",
            text: "There was an error deleting the category: " + error.message,
            position: "top-end",
            icon: "error",
            showConfirmButton: false,
            timer: 1500,
        });
    }
};

// Open Add Category modal
const openAddModel = () => {
    isAddCategory.value = true;
    dialogVisible.value = true;
    editMode.value = false;
};

// Open Edit Category modal
const openEditModel = (category) => {
    isAddCategory.value = false;
    editMode.value = true;
    dialogVisible.value = true;
    id.value = category.id;
    name.value = category.name;
    slug.value = category.slug;
};

// Handle modal close
const handleClose = () => {
    isAddCategory.value = false;
    dialogVisible.value = false;
};

// Update Category
const updateCategory = async () => {
    const data = {
        name: name.value,
        slug: slug.value,
        _method: 'PUT'
    };
    try {
        await router.put(`/admin/categories/update/${id.value}`, data, {
            onSuccess: (page) => {
                dialogVisible.value = false;
                resetFormData();
                Swal.fire({
                    toast: true,
                    title: page.props.flash.success,
                    position: "top-end",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        });
    } catch (error) {
        Swal.fire({
            title: "Error!",
            text: "There was an error updating the category: " + error.message,
            icon: "error",
            confirmButtonText: "OK",
            timer: 1500,
        });
    }
};

</script>


<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <!-- add category diaglog -->
        <el-dialog v-model="dialogVisible" :title="editMode ? 'Edit Category' : 'Add Category'" width="50%"
            :before-close="handleClose">
            <!-- add Category form -->
            <form class="px-6 py-4" @submit.prevent="editMode ? updateCategory() : AddCategory()">
                <!-- Category Title -->
                <div class="relative z-0 w-full mb-4">
                    <label for="floating_title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" v-model="name" name="floating_name" id="floating_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type Category name" required>
                </div>
                <!-- Category Slug
        <div class="relative z-0 w-full mb-4">
            <label for="floating_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug <span class="text-red-600">(You can keep it empty and create by default)</span></label>
            <input type="text" v-model="title" name="floating_title" id="floating_title"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Type Category Slug" >
        </div> -->


                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        Submit
                    </button>
                </div>
            </form>
        </el-dialog>

        <!-- end add product diaglog -->
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </div>
                    <div
                        class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button type="button"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            @click="openAddModel">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add Category
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">
                                    Category name
                                </th>
                                <th scope="col" class="px-4 py-3">Slug</th>

                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="categories.data && categories.data.length" v-for="category in categories.data"
                                :key="category.id" class="border-b dark:border-gray-700">

                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ category.name }}
                                </th>


                                <td class="px-4 py-3">
                                    {{ category.slug ? category.slug : "No slug" }}
                                </td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button :id="'edit-category-dropdown-button-' + category.id"
                                        :data-dropdown-toggle="'edit-category-dropdown-' + category.id"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div :id="'edit-category-dropdown-' + category.id"
                                        class="hidden z-10 w-24 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            :aria-labelledby="'edit-category-dropdown-button-' + category.id">
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <button @click="openEditModel(category)"
                                                    class="block py-2 px-4 text-left w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</button>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <button @click="deleteCategory(category.id)"
                                                class="block py-2 px-4 text-left w-full text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr v-else>
                                <td colspan="8" class="text-center py-4">
                                    No categories available
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <Pagination :pagination="categories" />

            </div>
        </div>
    </section>
</template>
