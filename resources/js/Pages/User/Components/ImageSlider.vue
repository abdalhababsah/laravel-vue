<template>
    <div class="container mx-auto px-4 sm:px-2 md:px-10 lg:px-15 xl:px-10">
      <div class="relative w-full mt-20">
        <div class="flex justify-start mb-12">
          <p class="text-4xl leading-normal tracking-wide text-[#b0956e] lg:text-5xl dark:text-white">
            More Requested
          </p>
        </div>
        <swiper
          class="centered-slide-carousel"
          :loop="true"
          :space-between="30"
          :slide-to-clicked-slide="true"
          :autoplay="{ delay: 1000, disableOnInteraction: true }"
          :breakpoints="{
            1920: { slidesPerView: 4, spaceBetween: 30 },
            1280: { slidesPerView: 4, spaceBetween: 20 },
            1028: { slidesPerView: 3, spaceBetween: 10 },
            768: { slidesPerView: 2, spaceBetween: 5 },
            0: { slidesPerView: 1, spaceBetween: 10 }
          }"
          :pagination="{ clickable: true }"
        >
          <swiper-slide v-for="product in newProducts" :key="product.id">
            <div class="block rounded-lg bg-white shadow-secondary-1 border border-gray-300 dark:bg-surface-dark h-[33rem]">
              <div class="relative overflow-hidden bg-no-repeat bg-cover">
                <!-- Fallback content if no image is available -->
                <img
                  class="w-full rounded-t-lg h-96 object-cover"
                  :src="product.product_images.length > 0 ? product.product_images[0].image : ''"
                  alt="Product Image"
                />
                <div
                  class="absolute inset-0 h-full w-full bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"
                >
                </div>
              </div>
              <div class="p-6 text-surface dark:text-white">
                <h5 class="mb-2 text-xl font-medium leading-tight">{{ product.title }}</h5>
                <p class="mb-4 text-base">{{ product.description }}</p>
              </div>
            </div>
          </swiper-slide>
          <div class="swiper-pagination"></div>
        </swiper>
      </div>
    </div>
  </template>

  <script setup>
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  import 'swiper/css/pagination';

  const props = defineProps({
    newProducts: Array
  });
  </script>

  <style scoped>
  .swiper-wrapper {
    width: 100%;
    height: max-content !important;
    padding-bottom: 64px !important;
    -webkit-transition-timing-function: linear !important;
    transition-timing-function: linear !important;
    position: relative;
  }

  .swiper-pagination-bullet {
    background: #ebebeb;
  }

  .swiper-pagination-bullet-active {
    background: #000000 !important;
  }
  </style>
