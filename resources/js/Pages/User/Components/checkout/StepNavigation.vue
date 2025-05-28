<template>
    <ol class="items-center flex flex-wrap w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
        <!-- Cart Link -->
        <li :class="['flex items-center', { 'text-blue-700': currentStep === 'cart', 'text-gray-400': currentStep !== 'cart' }, 'after:mx-6 after:h-1 after:w-full after:border-b after:border-gray-200 dark:after:border-gray-700']">
            <Link :href="route('cart.view')">
                <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Cart
                </span>
            </Link>
        </li>

        <!-- Checkout Step -->
        <li :class="['flex items-center', { 'text-blue-700': currentStep === 'checkout', 'text-gray-400': currentStep !== 'checkout' }, 'after:mx-6 after:h-1 after:w-full after:border-b after:border-gray-200 dark:after:border-gray-700']">
            <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Checkout
            </span>
        </li>

        <!-- Order Summary -->
        <li :class="['flex items-center', { 'text-blue-700': currentStep === 'summary', 'text-gray-400': currentStep !== 'summary' }, 'shrink-0 items-center']">
            <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Order Summary
        </li>
    </ol>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

// Compute current step based on the current route
const currentStep = computed(() => {
    const currentRoute = page.url;
    if (currentRoute.includes('/user/checkout')) return 'checkout';
    if (currentRoute.includes('/cart')) return 'cart';
    return 'summary';
});
</script>

<style scoped>
/* Add your custom styles if needed */
</style>
