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
const Checkout=()=>{
    Swal.fire({
            toast: true,
            title: "Checkout is under maintenace",
            position: "top-end",
            icon: "info",
            showConfirmButton: false,
            timer: 1500,
        });
}
</script>

<template>
  <UserLayouts>
    <div class="bg-white py-6 sm:py-8 lg:py-12">
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

              <!-- Button -->
              <!-- <a
                href="#"
                class="absolute right-4 top-4 inline-block rounded-lg border bg-white px-3.5 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:text-gray-700 md:text-base"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-6 w-6"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                  />
                </svg>
              </a> -->
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
              <!-- <div class="flex h-7 items-center gap-1 rounded-full bg-indigo-500 px-2 text-white">
                <span class="text-sm">4.2</span>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                >
                  <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                  />
                </svg>
              </div> -->

              <!-- <span class="text-sm text-gray-500 transition duration-100">56 ratings</span> -->
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

              <button
               @click="Checkout"
                class="inline-block  bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base"
              >
                Buy now
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
