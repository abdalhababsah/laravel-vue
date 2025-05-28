<script setup>
import { computed } from 'vue';
import UserLayouts from './Layouts/UserLayouts.vue';
import PeopleAlsoBoughtProducts from "./Components/PeopleAlsoBoughtProducts.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import StepNavigation from './Components/checkout/StepNavigation.vue';
import OrderSummary from './Components/shared/OrderSummary.vue';
const carts = computed(() => usePage().props.cart.data.items);
const total = computed(() => usePage().props.cart.data.total);
const products = computed(() => usePage().props.cart.data.products);
const PeopleAlsoBought = computed(() => usePage().props.PeopleAlsoBought.data);
const itemId = (id) => carts.value.findIndex((item) => item.product_id === id);
const update = (product, quantity) => {
    if (quantity < 0) return;
    router.patch(route('cart.update', product.id), { quantity }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
};
const remove = (product) => {
    router.delete(route('cart.delete', product), {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
};
</script>
<template>
    <UserLayouts>
        <div class="min-h-screen bg-gray-50 py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Shopping Cart</h1>
                    <Link :href="route('products.index')" class="text-sm font-medium text-[#7d836d] hover:text-[#b0956e]">
                        Continue Shopping
                        <span aria-hidden="true"> →</span>
                    </Link>
                </div>

                <div class="mt-8">
                    <div v-if="products.length === 0" class="flex flex-col items-center justify-center space-y-6 rounded-lg bg-white p-12 text-center shadow">
                        <div class="rounded-full bg-gray-100 p-6">
                            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-medium text-gray-900">Your cart is empty</h2>
                            <p class="mt-2 text-sm text-gray-500">Looks like you haven't added anything to your cart yet.</p>
                        </div>
                        <Link :href="route('products.index')" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#7d836d] px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-[#b0956e]">
                            Start Shopping
                        </Link>
                    </div>

                    <div v-else class="lg:grid lg:grid-cols-12 lg:items-start lg:gap-8">
                        <div class="lg:col-span-8">
                            <div class="space-y-4">
                                <div v-for="product in products" :key="product.id" class="group relative flex rounded-lg bg-white p-6 shadow transition-all hover:shadow-lg">
                                    <div class="flex flex-1 items-center">
                                        <div class="flex h-24 w-24 flex-shrink-0 items-center justify-center overflow-hidden rounded-md border border-gray-200">
                                            <img :src="product.product_images.length > 0 ? `${product.product_images[0].image}` : 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg'"
                                                :alt="product.title" class="h-full w-full object-cover object-center" />
                                        </div>

                                        <div class="ml-6 flex flex-1 flex-col">
                                            <div class="flex justify-between">
                                                <div>
                                                    <h3 class="text-lg font-medium text-gray-900">
                                                        <a :href="'/product/' + product.slug">{{ product.title }}</a>
                                                    </h3>
                                                    <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ product.description }}</p>
                                                </div>
                                                <p class="text-lg font-medium text-gray-900">JOD {{ product.price }}</p>
                                            </div>

                                            <div class="mt-4 flex items-center justify-between">
                                                <div class="flex items-center space-x-4">
                                                    <div class="flex items-center rounded-lg border border-gray-200">
                                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity - 1)"
                                                            class="flex h-8 w-8 items-center justify-center border-r border-gray-200 hover:bg-gray-50">
                                                            <span class="sr-only">Decrease quantity</span>
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                            </svg>
                                                        </button>
                                                        <input v-model="carts[itemId(product.id)].quantity" type="number" min="0" readonly
                                                            class="w-12 border-none bg-transparent p-0 text-center text-sm focus:ring-0" />
                                                        <button @click.prevent="update(product, carts[itemId(product.id)].quantity + 1)"
                                                            class="flex h-8 w-8 items-center justify-center border-l border-gray-200 hover:bg-gray-50">
                                                            <span class="sr-only">Increase quantity</span>
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <button @click.prevent="remove(product)" class="text-sm font-medium text-[#7d836d] hover:text-[#b0956e]">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 lg:col-span-4 lg:mt-0">
                            <OrderSummary :isCheckoutPage="false" />
                        </div>
                    </div>
                </div>

                <section v-if="products.length > 0" class="mt-16">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">People Also Bought</h2>
                        <Link :href="route('products.index')" class="hidden text-sm font-medium text-[#7d836d] hover:text-[#b0956e] sm:block">
                            View all products
                            <span aria-hidden="true"> →</span>
                        </Link>
                    </div>

                    <div class="mt-8">
                        <PeopleAlsoBoughtProducts :products="PeopleAlsoBought" />
                    </div>

                    <div class="mt-6 sm:hidden">
                        <Link :href="route('products.index')" class="block text-sm font-medium text-[#7d836d] hover:text-[#b0956e]">
                            View all products
                            <span aria-hidden="true"> →</span>
                        </Link>
                    </div>
                </section>
            </div>
        </div>
    </UserLayouts>

</template>
