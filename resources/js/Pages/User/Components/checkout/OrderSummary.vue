<template>
    <div class="space-y-4 s border border-gray-200 lg:w-[352px]  w-full bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 lg:w-full lg:max-w-xs xl:max-w-md">
        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order Summary</p>

        <div class="space-y-4">
            <div class="space-y-2">
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original Price</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">JOD {{ total }}</dd>
                </dl>
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Delivery</dt>
                    <dd class="line-through text-base font-medium text-gray-900 dark:text-white">JOD 2.00</dd>
                </dl>
                <dl class="flex items-center justify-between gap-4">
                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                    <dd class="text-base font-medium text-gray-900 dark:text-white">JOD 0.00</dd>
                </dl>
            </div>

            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">JOD {{ total }}</dd>
            </dl>
        </div>

        <Link :href="route('checkout')"
            class="flex w-full items-center justify-center bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Proceed
            to Checkout</Link>

        <div class="flex items-center justify-center gap-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
            <Link :href="route('products.index')" title=""
                class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 underline hover:no-underline dark:text-blue-500">
                Continue Shopping
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </Link>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const total = computed(() => usePage().props.cart.data.total);
</script>
