<template>
    <!-- component -->
    <AdminLayout>
        <div class="py-14 px-4 md:px-6 2xl:px-20 2xl:container 2xl:mx-auto">
            <div class="flex justify-start item-start space-y-2 flex-col">
                <h1 class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800">
                    Order #{{ order.id }}
                </h1>
                <p
                    class="text-xl ml-3 dark:text-white font-semibold leading-7 lg:leading-9 text-gray-800 flex items-center">
                    <span class="inline-block w-3 h-3 rounded-full mr-2" :class="{
                        'bg-yellow-500': order.status === 'pending',
                        'bg-green-500': order.status === 'completed',
                        'bg-blue-500': order.status === 'shipped'
                    }"></span>
                    {{ order.status }}
                </p>

                <p class="text-base dark:text-gray-300 font-medium leading-6 text-gray-600">
                    {{ order.created_at_formatted }}
                </p>
            </div>
            <div
                class="mt-10 flex flex-col xl:flex-row justify-center items-stretch w-full xl:space-x-8 space-y-4 md:space-y-6 xl:space-y-0">
                <div class="flex flex-col justify-start items-start w-full space-y-4 md:space-y-6 xl:space-y-8">
                    <div
                        class="flex flex-col justify-start items-start dark:bg-gray-800 bg-gray-50 px-4 py-4 md:py-6 md:p-6 xl:p-8 w-full">
                        <p
                            class="text-lg md:text-xl dark:text-white font-semibold leading-6 xl:leading-5 text-gray-800">
                            Customer’s Cart
                        </p>
                        <!-- Products -->
                        <div v-for="(item, index) in order.order_items" :key="index"
                            class="mt-4 md:mt-6 flex flex-row  md:flex-row justify-start items-start md:items-center md:space-x-6 xl:space-x-8 w-full">
                            <div class="pb-4 md:pb-8 w-40">
                                <img class="w-full mr-5" :src="item.product.product_images[0].image"
                                    :alt="item.product.title" />
                            </div>
                            <div
                                class="border-b  border-gray-200 md:flex-row flex-col flex ml-5 justify-between items-start w-full pb-8 space-y-4 md:space-y-0">
                                <div class="w-full flex flex-col justify-start items-start space-y-8 ">
                                    <h3
                                        class="text-xl dark:text-white xl:text-2xl font-semibold leading-6 text-gray-800">
                                        {{ item.product.title }}
                                    </h3>
                                    <div class="flex items-center space-x-2">
                                        <p class="text-sm dark:text-white leading-none text-gray-800">
                                            <span class="dark:text-gray-700 text-black">Color: </span>
                                            {{ item.product_color.color.name }}
                                        </p>
                                        <div :style="{ backgroundColor: item.product_color.color.hex_code }"
                                            class="w-4 h-4 border border-gray-300"></div>
                                    </div>

                                </div>
                                <div class="flex justify-between space-x-4 items-start w-full">
                                    <p class="text-base dark:text-white xl:text-lg leading-6">${{ item.unit_price }}</p>
                                    <p class="text-base dark:text-white xl:text-lg leading-6 text-gray-800">{{
                                        item.quantity }}</p>
                                    <p
                                        class="text-base dark:text-white xl:text-lg font-semibold leading-6 text-gray-800">
                                        ${{ (item.product.price * item.quantity).toFixed(2) }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end Products -->
                    </div>
                    <div
                        class="flex justify-center md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
                        <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                            <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Summary</h3>
                            <div
                                class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                                <div class="flex justify-between w-full">
                                    <p class="text-base dark:text-white leading-4 text-gray-800">Subtotal</p>
                                    <p class="text-base dark:text-gray-300 leading-4 text-gray-600">${{
                                        order.total_price }}</p>
                                </div>
                                <!-- Add more summary details here if needed -->
                            </div>
                        </div>
                        <div
                            class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-50 dark:bg-gray-800 space-y-6">
                            <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Shipping</h3>
                            <div class="flex justify-between items-start w-full">
                                <div class="flex justify-center items-center space-x-4">
                                    <div class="w-8 h-8">
                                        <img class="w-full h-full" alt="logo"
                                            src="https://i.ibb.co/L8KSdNQ/image-3.png" />
                                    </div>
                                    <div class="flex flex-col justify-start items-center">
                                        <p class="text-lg leading-6 dark:text-white font-semibold text-gray-800">
                                            Shipping Company<br /><span class="font-normal">Standard Shipping</span>
                                        </p>
                                    </div>
                                </div>
                                <p class="text-lg font-semibold leading-6 dark:text-white text-gray-800">$8.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-gray-50 dark:bg-gray-800 w-full xl:w-96 flex justify-between items-center md:items-start px-4 py-6 md:p-6 xl:p-8 flex-col">
                    <h3 class="text-xl dark:text-white font-semibold leading-5 text-gray-800">Customer</h3>
                    <div
                        class="flex flex-col md:flex-row xl:flex-col justify-start items-stretch h-full w-full md:space-x-6 lg:space-x-8 xl:space-x-0">
                        <div class="flex flex-col justify-start items-start flex-shrink-0">
                            <div
                                class="flex justify-center w-full md:justify-start items-center space-x-4 py-8 border-b border-gray-200">
                                <img src="https://i.ibb.co/5TSg7f6/Rectangle-18.png" alt="avatar" />
                                <div class="flex justify-start items-start flex-col space-y-2">
                                    <p
                                        class="text-base dark:text-white font-semibold leading-4 text-left text-gray-800">
                                        {{ order.user.name }}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M3 7L12 13L21 7" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <p class="cursor-pointer text-sm leading-5 ">{{ order.user.email }}</p>
                            </div>
                            <div
                                class="flex justify-center text-gray-800 dark:text-white md:justify-start items-center space-x-4 py-4 border-b border-gray-200 w-full">
                                <AnOutlinedPhone class="h-7 w-7" />
                                <p class="cursor-pointer text-sm leading-5 ">{{ order.user.number }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between xl:h-full items-stretch w-full flex-col mt-6 md:mt-0">
                            <div
                                class="flex justify-center md:justify-start xl:flex-col flex-col md:space-x-6 lg:space-x-8 xl:space-x-0 space-y-4 xl:space-y-12 md:space-y-0 md:flex-row items-center md:items-start">
                                <div
                                    class="flex justify-center md:justify-start items-center md:items-start flex-col space-y-4 xl:mt-8">
                                    <p
                                        class="text-base dark:text-white font-semibold leading-4 text-center md:text-left text-gray-800">
                                        Shipping Address
                                    </p>
                                    <p
                                        class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                        City: {{ order.user_address.city }}
                                    </p>
                                    <p
                                        class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                        Addresses: {{ order.user_address.address1 }}, {{ order.user_address.address2 }}
                                    </p>

                                    <p v-if="order.user_address.country"
                                        class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                        Country: {{ order.user_address.country }}
                                    </p>
                                    <p v-if="order.user_address.zip_code"
                                        class="w-48 lg:w-full dark:text-gray-300 xl:w-48 text-center md:text-left text-sm leading-5 text-gray-600">
                                        Zip code: {{ order.user_address.zip_code }}
                                    </p>
                                </div>
                            </div>
                            <div
                                class="flex w-full justify-center items-center md:justify-start xl:items-center mt-6 md:mt-0">
                                <button
                                    class="py-5 my-6 dark:text-white dark:bg-transparent dark:border-white bg-[#7d836d] text-base text-white leading-4 w-60">
                                    Save Invoice
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '../Components/AdminLayout.vue';
import { AnOutlinedPhone } from '@kalimahapps/vue-icons';
const props = defineProps({
    order: Array,
})
</script>
