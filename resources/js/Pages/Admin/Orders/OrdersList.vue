<!-- File: resources/js/Pages/Admin/Orders/OrdersList.vue -->

<script setup>
import { onMounted, ref, watch, computed } from "vue";
import { initFlowbite } from "flowbite";
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import Pagination from '../Components/Pagination.vue';
import debounce from 'lodash/debounce';
import { Link } from '@inertiajs/vue3';

// Define the props received from the parent component
const props = defineProps({
    orders: Object, // Paginated orders object
    filters: Object, // Current filters (e.g., search)
});

// Initialize Flowbite on component mount
onMounted(() => {
    initFlowbite();
});

// Reactive variables for modal and form states
// Assuming you have modals for viewing/editing orders
const editMode = ref(false);
const isAddOrder = ref(false); // Typically, orders are created via user actions, not admin, but included for consistency
const dialogVisible = ref(false);

// Order data
const id = ref("");
const status = ref("");
const userName = ref("");
const userEmail = ref("");

// Reactive search variable initialized from props.filters
const search = ref(props.filters.search || "");

// Debounced search function using lodash debounce
const debouncedSearch = debounce((newSearch) => {
    router.get(route('admin.orders.index'), { search: newSearch }, {
        preserveState: true,
        preserveScroll: true,
    });
}, 500);

// Watch for changes in the search input and trigger debounced search
watch(search, (newSearch) => {
    debouncedSearch(newSearch);
});

// Reset form data
const resetFormData = () => {
    id.value = '';
    status.value = '';
    userName.value = '';
    userEmail.value = '';
};

// View Order Details
const viewOrder = (order) => {
    // Redirect to the order details page
    router.visit(`/admin/orders/${order.id}`);
};

// Delete Order
const deleteOrder = async (id) => {
    try {
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
            await router.delete(route('admin.orders.delete', id), {
                onSuccess: (page) => {
                    Swal.fire({
                        toast: true,
                        title: page.props.flash.success,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                onError: (error) => {
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error deleting the order: " + error.message,
                        position: "top-end",
                        icon: "error",
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
            text: "There was an error deleting the order: " + error.message,
            position: "top-end",
            icon: "error",
            showConfirmButton: false,
            timer: 1500,
        });
    }
};

// Print Invoice
const printInvoice = (orderId) => {
    // Open the invoice PDF in a new tab
    window.open(`/admin/orders/${orderId}/print-invoice`, '_blank');
};

// Additional methods for adding/editing orders can be implemented here if needed
</script>

<template>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
        <!-- Add/Edit Order Dialog (Optional) -->
        <!-- Implement modals for adding/editing orders if required -->
        <!-- For simplicity, assuming orders are managed by users and admins only view/edit/delete them -->

        <!-- Main Content -->
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Orders Management Panel -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    
                    <!-- Search Form -->
                    <div class="w-full md:w-1/2">
                        <form @submit.prevent="">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    v-model="search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                    focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 
                                    dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                    dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Search by Order ID, User Name, or Email" />
                            </div>
                        </form>
                    </div>

      
                </div>

                <!-- Orders Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Order ID</th>
                                <th scope="col" class="px-4 py-3">Order Status</th>
                                <th scope="col" class="px-4 py-3">User Name</th>
                                <th scope="col" class="px-4 py-3">User Email</th>
                                <th scope="col" class="px-4 py-3">User Number</th>
                                <th scope="col" class="px-4 py-3">Address</th>
                                <th scope="col" class="px-4 py-3">Products</th>
                                <th scope="col" class="px-4 py-3">Total Price</th>
                                <th scope="col" class="px-4 py-3">Payment Type</th>
                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="orders.data && orders.data.length" v-for="order in orders.data" :key="order.id" class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ order.id }}</td>
                                <td class="px-4 py-3">{{ order.status }}</td>
                                <td class="px-4 py-3">{{ order.user.name }}</td>
                                <td class="px-4 py-3">{{ order.user.email }}</td>
                                <td class="px-4 py-3">{{ order.user.number }}</td>
                                <td class="px-4 py-3">
                                    {{ order.user_address?.address1 }}, {{ order.user_address?.city }}
                                </td>
                                <td class="px-4 py-3">
                                    <ul>
                                        <li v-for="item in order.order_items" :key="item.id">
                                            {{ item.product.title }} - {{ item.quantity }} x {{ item.unit_price }}
                                        </li>
                                    </ul>
                                </td>
                                <td class="px-4 py-3">{{ order.total_price }}</td>
                                <td class="px-4 py-3">{{ order.payments[0]?.type }}</td> <!-- Assuming one payment type -->
                                <td class="px-4 py-3 flex items-center justify-end space-x-2">
                                    <Link :href="`/admin/orders/${order.id}`" class="text-blue-600 hover:text-blue-800">View</Link>
                                    <button @click="printInvoice(order.id)" class="text-green-600 hover:text-green-800">Print Invoice</button>
                                    <button @click="deleteOrder(order.id)" class="text-red-600 hover:text-red-800">Delete</button>
                                </td>
                            </tr>
                            <tr v-else>
                                <td colspan="10" class="text-center py-4">No Orders available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <Pagination :pagination="orders" />
            </div>
        </div>
    </section>
</template>