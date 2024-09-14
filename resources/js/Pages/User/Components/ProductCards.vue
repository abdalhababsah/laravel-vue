<script setup>
import { defineProps } from 'vue';
import ProductsPagination from './ProductsPagination.vue';
import Swal from "sweetalert2";
import { Link, router } from "@inertiajs/vue3";

defineProps({
    products: {
        type: Array,
        required: true,
    },
    gridClass: {
        type: String,
        required: true,
    },
});

const addToCart = async (product) => {
    try {
        router.post(route('cart.store', product.id), {
            quantity: 1
        }, {
            preserveState: true,
            replace: true,
            preserveScroll: true,
            onSuccess: (page) => {
                if (page.props.flash.success) {
                    Swal.fire({
                        toast: true,
                        title: page.props.flash.success,
                        position: "top-end",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            }
        });
    } catch (error) {
        console.error("Error adding product to cart:", error);
        Swal.fire({
            toast: true,
            title: "Failed to add product to cart",
            position: "top-end",
            icon: "error",
            showConfirmButton: false,
            timer: 1500,
        });
    }
};


</script>

<template>

        <div class="flex flex-col items-center w-full">
            <!-- Product Grid -->
            <div :class="`mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 ${gridClass} xl:gap-x-8`">
                <div v-for="product in products.data" :key="product.id"
                    class="group product_card flex w-full max-w-xs flex-col overflow-hidden border bg-white">
                    <a :href="product.href" class="relative flex h-72 overflow-hidden">
                        <img :src="product.product_images.length > 0 ? `${product.product_images[0].image}` : 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg'"
                            :alt="product.title" class="absolute top-0 right-0 h-full w-full object-cover" />

                        <!-- View Product -->
                        <div
                            class="absolute -right-16 bottom-0 mr-2 mb-4 space-y-2 transition-all duration-300 group-hover:right-0">
                             <Link :href="route('products.show', { id: product.id, slug: product.slug })"
                                class="flex h-10 w-10 items-center justify-center bg-gray-900 text-white transition hover:bg-gray-700">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                    <path fill="currentColor"
                                        d="M512 160c320 0 512 352 512 352S832 864 512 864 0 512 0 512s192-352 512-352m0 64c-225.28 0-384.128 208.064-436.8 288 52.608 79.872 211.456 288 436.8 288 225.28 0 384.128-208.064 436.8-288-52.608-79.872-211.456-288-436.8-288zm0 64a224 224 0 1 1 0 448 224 224 0 0 1 0-448m0 64a160.192 160.192 0 0 0-160 160c0 88.192 71.744 160 160 160s160-71.808 160-160-71.744-160-160-160">
                                    </path>
                                </svg>
                            </Link>
                        </div>

                        <!-- Add to Cart -->
                        <div
                            class="absolute -right-16 bottom-12 mr-2 mb-4 space-y-2 transition-all duration-300 group-hover:right-0">
                            <button @click="addToCart(product)"
                                class="flex h-10 w-10 items-center justify-center bg-gray-900 text-white transition hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                            </button>
                        </div>

                        <!-- Add to Wishlist -->
                        <!-- <div
                            class="absolute -right-16 bottom-24 mr-2 mb-4 space-y-2 transition-all duration-300 group-hover:right-0">
                            <button
                                class="flex h-10 w-10 items-center justify-center bg-gray-900 text-white transition hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div> -->
                    </a>

                    <div class="mt-4 px-5 pb-5 flex justify-between">
                        <a :href="product.href">
                            <h5 class="text-xl tracking-tight text-slate-900">{{ product.title }}</h5>
                        </a>
                        <div class="mt-2 mb-2 flex items-center justify-between">
                            <p>
                                <span class="text-sm font-bold text-slate-900">JOD {{ product.price }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
        </div>
        <div class="mt-6 mx-10 md:mx-28 lg:mx-24">
            <ProductsPagination :pagination="products" />
        </div>


</template>

<style scoped>
.product_card{
width: 251px;
}
</style>
