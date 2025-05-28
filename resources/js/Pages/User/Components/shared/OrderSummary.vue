<template>
    <div class="space-y-4 border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order Summary</p>

        <!-- Display any flash error messages -->
        <div v-if="flashError" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <span class="block sm:inline">{{ flashError }}</span>
        </div>

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

        <!-- Display validation errors if any -->
        <div v-if="Object.keys(errors).length > 0" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <ul class="list-disc list-inside">
                <li v-for="(error, key) in errors" :key="key" class="text-sm">
                    {{ error }}
                </li>
            </ul>
        </div>

        <button v-if="isCheckoutPage" @click="handleCheckout" :disabled="!isFormValid || processing"
            class="flex w-full items-center justify-center bg-[#7d836d] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#b0956e] focus:outline-none focus:ring-4 focus:ring-blue-300 disabled:opacity-50">
            {{ processing ? 'Processing...' : 'Place Order' }}
        </button>
        <Link v-else :href="route('checkout')"
            class="flex w-full items-center justify-center bg-[#7d836d] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#b0956e] focus:outline-none focus:ring-4 focus:ring-blue-300">
            Proceed to Checkout
        </Link>

        <div class="flex items-center justify-center gap-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">or</span>
            <Link v-if="isCheckoutPage" :href="route('cart.view')"
                class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 underline hover:no-underline">
                Return to Cart
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </Link>
            <Link v-else :href="route('products.index')"
                class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 underline hover:no-underline">
                Continue Shopping
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </Link>
        </div>
    </div>
</template>

<script setup>
import { computed, ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const props = defineProps({
    isCheckoutPage: {
        type: Boolean,
        default: false
    },
    deliveryDetails: {
        type: Object,
        default: () => ({})
    },
    paymentMethod: {
        type: String,
        default: ''
    },
    isFormValid: {
        type: Boolean,
        default: false
    }
});

const page = usePage();
const total = computed(() => page.props.cart?.data?.total || 0);
const processing = ref(false);
const errors = computed(() => page.props.errors || {});
const flashError = computed(() => page.props.flash?.error);

const handleCheckout = async () => {
    if (!props.isFormValid) {
        Swal.fire({
            title: 'Error',
            text: 'Please fill in all required fields correctly',
            icon: 'error'
        });
        return;
    }

    if (!total.value) {
        Swal.fire({
            title: 'Error',
            text: 'Your cart is empty',
            icon: 'error'
        });
        return;
    }

    processing.value = true;

    try {
        await router.post(route('checkout.process'), {
            delivery_details: props.deliveryDetails,
            payment_method: props.paymentMethod,
            total_amount: total.value
        }, {
            preserveScroll: true,
            onError: (errors) => {
                Swal.fire({
                    title: 'Error',
                    text: Object.values(errors)[0],
                    icon: 'error'
                });
            }
        });
    } catch (error) {
        Swal.fire({
            title: 'Error',
            text: 'Something went wrong. Please try again.',
            icon: 'error'
        });
    } finally {
        processing.value = false;
    }
};
</script> 