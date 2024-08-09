<script setup>
import Hero from './Layouts/Hero.vue';
import CompanyDivider from './Components/CompanyDivider.vue';
import UserLayouts from './Layouts/UserLayouts.vue';
defineProps({
    new_products:Array,
    featured_products:Array
})
</script>

<template>

    <UserLayouts>

        <Hero/>

        <!-- <CompanyDivider/> -->

<!-- product list  -->
<div class="bg-white">
    <div class="mx-auto max-w-2xl py-8 sm:px-6 sm:py-4 lg:max-w-7xl">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Feasured products</h2>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in featured_products" :key="product.id" class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" :alt="product.title" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a :href="product.href">
                  <span aria-hidden="true" class="absolute inset-0" />
                  {{ product.title }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="bg-white">
    <div class="mx-auto max-w-2xl py-8 sm:px-6 sm:py-4 lg:max-w-7xl">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900">New products</h2>

      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in new_products" :key="product.id" class="group relative">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
            <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" :alt="product.title" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
          </div>
          <div class="mt-4 flex justify-between">
            <div>
              <h3 class="text-sm text-gray-700">
                <a :href="product.href">
                  <span aria-hidden="true" class="absolute inset-0" />
                  {{ product.title }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
            </div>
            <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</UserLayouts>
<!-- product list  -->
<!-- footer -->





</template>
