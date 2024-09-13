<template>

    <MainLayout>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <div class="relative w-full">
                        <input type="text" v-model="searchQuery"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Search by order ID or status" />
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                            @click="searchQuery = ''">
                            <svg v-if="searchQuery" class="w-5 h-5 text-gray-500" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 8.586l3.293-3.293a1 1 0 011.414 1.414L11.414 10l3.293 3.293a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 10 5.293 6.707a1 1 0 011.414-1.414L10 8.586z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Order ID</th>
                            <th scope="col" class="px-4 py-3">Order Status</th>
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
                        <tr v-for="order in orders.data" :key="order.id" class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ order.id }}</td>
                            <td class="px-4 py-3">{{ order.status }}</td>
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
                                <button @click="printInvoice(order.id)"
                                    class="text-green-600 hover:text-green-800">Print Invoice</button>
                            </td>
                        </tr>
                        <tr v-if="!orders.data.length">
                            <td colspan="9" class="text-center py-4">No Orders available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</MainLayout>
</template>

<script setup>
import MainLayout from './Layouts/MainLayout.vue';
import { ref, computed } from 'vue';

const searchQuery = ref("");
const props = defineProps({
    orders: Array,
});

const printInvoice = (orderId) => {
    // Handle invoice printing
    window.open(`/user/orders/${orderId}/print-invoice`, '_blank');
};

</script>
