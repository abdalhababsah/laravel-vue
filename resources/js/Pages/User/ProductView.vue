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
    <div class="min-h-screen bg-white py-6 sm:py-8 lg:py-12">
      <div class="mx-auto max-w-screen-xl px-4 md:px-8">
        <div class="grid gap-8 md:grid-cols-2">
          <!-- images - start -->
          <div class="grid gap-4 lg:grid-cols-5">
            <div  class="order-last flex gap-4 lg:order-none lg:flex-col">
              <!-- Loop through the first few images and display them -->
              <div
                v-for="(image, index) in product.data.product_images.slice(0, 4)"
                :key="image.id"
                class="overflow-hidden rounded-lg bg-gray-100"
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

            <div style="max-height: 425px;max-width: 425px;" class="relative overflow-hidden rounded-lg bg-gray-100 lg:col-span-4">
              <!-- Display the main product image -->
              <img
                :src="mainImage"
                loading="lazy"
                alt="Main product image"
                class="h-full w-full object-cover object-center"
              />

              <!-- Sale label (you can customize or remove this if not needed) -->
              <span
                class="absolute left-0 top-0 rounded-br-lg bg-red-500 px-3 py-1.5 text-sm uppercase tracking-wider text-white"
                >sale</span
              >

            </div>
          </div>
          <!-- images - end -->

          <!-- content - start -->
          <div class="md:py-8">
            <!-- name - start -->
            <div class="mb-2 md:mb-3">
              <span class="mb-0.5 inline-block text-gray-500">{{ product.data.brand.name }}</span>
              <h2 class="text-2xl font-bold text-gray-800 lg:text-3xl">{{ product.data.title }}</h2>
            </div>
            <!-- name - end -->

            <!-- rating - start -->
            <div class="mb-6 flex items-center gap-3 md:mb-10">

            </div>
            <!-- rating - end -->

            <!-- color - start -->
            <div class="mb-4 md:mb-6">
              <span class="mb-3 inline-block text-sm font-semibold text-gray-500 md:text-base">Color</span>

              <div class="flex flex-wrap gap-2">
                <button
                  v-for="color in product.data.colors"
                  :key="color.id"
                  type="button"
                  :style="{ backgroundColor: color.hex_code }"
                  class="h-8 w-8 rounded-full border ring-2 ring-transparent ring-offset-1 transition duration-100 hover:ring-gray-200"
                ></button>
              </div>
            </div>
            <!-- color - end -->

            <!-- price - start -->
            <div class="mb-4">
              <div class="flex items-end gap-2">
                <span class="text-xl font-bold text-gray-800 md:text-2xl">{{ product.data.price }} JOD</span>
              </div>

              <span class="text-sm text-gray-500">incl. VAT plus shipping</span>
            </div>
            <!-- price - end -->

            <!-- shipping notice - start -->
            <div class="mb-6 flex items-center gap-2 text-gray-500">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
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

              <span class="text-sm">2-4 day shipping</span>
            </div>
            <!-- shipping notice - end -->

            <!-- buttons - start -->
            <div class="flex gap-2.5">
                <button
                  @click="addToCart(product.data.id)"
                  type="button"
                  class="inline-flex h-12 items-center justify-center  border border-transparent bg-[#7d836d] px-6 py-3 text-base font-medium text-white transition duration-150  focus:outline-none focus:ring-2 focus:ring-[#b0956e] focus:ring-offset-2 active:bg-[#b0956e]"
                >
                  Add to Cart
                </button>
            </div>
            <!-- buttons - end -->
          </div>
          <!-- content - end -->
        </div>
      </div>
    </div>
  </UserLayouts>
</template>
