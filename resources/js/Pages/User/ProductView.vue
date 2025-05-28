<script setup>
import { ref } from 'vue';
import UserLayouts from './Layouts/UserLayouts.vue';
import { router } from "@inertiajs/vue3";
import Swal from "sweetalert2";

// Define props
const props = defineProps({
  product: Object // Changed to Object to match the structure of product.data
});

// Define a reactive variable for the selected main image
const mainImage = ref(props.product.data.product_images[0]?.image);

// Method to update the main image
const updateMainImage = (image) => {
  mainImage.value = image;
};

const addToCart = async (id) => {
    try {
        router.post(route('cart.store', id), {
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
  <UserLayouts>
    <div class="min-h-screen bg-gray-50 py-8 sm:py-12">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
          <div class="grid gap-8 md:grid-cols-2 p-6 md:p-8">
            <!-- images - start -->
            <div class="grid gap-4 lg:grid-cols-5">
              <div class="order-last flex gap-4 lg:order-none lg:flex-col">
                <div
                  v-for="(image, index) in product.data.product_images.slice(0, 4)"
                  :key="image.id"
                  class="overflow-hidden rounded-lg bg-gray-100 shadow-sm transition-transform hover:scale-105 cursor-pointer"
                >
                  <img
                    :src="image.image"
                    loading="lazy"
                    alt="Product image"
                    class="h-full w-full object-cover object-center"
                    @click="updateMainImage(image.image)"
                  />
                </div>
              </div>

              <div class="relative overflow-hidden rounded-xl bg-gray-100 lg:col-span-4">
                <img
                  :src="mainImage"
                  loading="lazy"
                  alt="Main product image"
                  class="h-full w-full object-cover object-center transition-transform duration-300 hover:scale-105"
                />

                <span
                  class="absolute left-4 top-4 rounded-full bg-red-500 px-4 py-2 text-sm font-semibold uppercase tracking-wider text-white shadow-lg"
                  >sale</span>
              </div>
            </div>
            <!-- images - end -->

            <!-- content - start -->
            <div class="flex flex-col justify-between md:py-4">
              <div>
                <div class="mb-6">
                  <span class="mb-2 inline-block rounded-full bg-gray-100 px-3 py-1 text-sm font-medium text-gray-700">{{ product.data.brand.name }}</span>
                  <h2 class="text-3xl font-bold text-gray-800 lg:text-4xl">{{ product.data.title }}</h2>
                </div>

                <!-- color selection - start -->
                <div class="mb-8">
                  <span class="mb-3 inline-block text-lg font-semibold text-gray-700">Color</span>
                  <div class="flex flex-wrap gap-3">
                    <button
                      v-for="color in product.data.colors"
                      :key="color.id"
                      type="button"
                      :style="{ backgroundColor: color.hex_code }"
                      class="h-10 w-10 rounded-full border shadow-sm ring-2 ring-transparent ring-offset-2 transition duration-200 hover:ring-[#7d836d] focus:ring-[#7d836d]"
                    ></button>
                  </div>
                </div>
                <!-- color selection - end -->

                <!-- price - start -->
                <div class="mb-8">
                  <div class="mb-2 flex items-center gap-2">
                    <span class="text-3xl font-bold text-[#7d836d]">{{ product.data.price }} JOD</span>
                  </div>
                  <span class="text-sm text-gray-500">Including VAT & Shipping</span>
                </div>
                <!-- price - end -->

                <!-- shipping info - start -->
                <div class="mb-8">
                  <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-4">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-7 w-7 text-[#7d836d]"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"
                      />
                    </svg>
                    <div>
                      <span class="block font-semibold text-gray-800">Fast Delivery</span>
                      <span class="text-sm text-gray-600">2-4 business days</span>
                    </div>
                  </div>
                </div>
                <!-- shipping info - end -->
              </div>

              <!-- add to cart button - start -->
              <div>
                <button
                  @click="addToCart(product.data.id)"
                  type="button"
                  class="w-full rounded-lg bg-[#7d836d] px-8 py-4 text-center text-lg font-bold text-white transition duration-200 hover:bg-[#6a705c] focus:outline-none focus:ring-2 focus:ring-[#7d836d] focus:ring-offset-2 active:bg-[#5d624f]"
                >
                  Add to Cart
                </button>
              </div>
              <!-- add to cart button - end -->
            </div>
            <!-- content - end -->
          </div>
        </div>
      </div>
    </div>
  </UserLayouts>
</template>
