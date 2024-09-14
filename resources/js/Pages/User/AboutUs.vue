<template>
    <UserLayouts>
    <div class="min-h-screen bg-white">
      <!-- Hero Section -->
      <section
        class="relative h-[60vh] bg-cover bg-center"
        :style="{ backgroundImage: `url(${AboutImage})` }"
      >
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center bg-black bg-opacity-50">
          <h1 class="mb-2 text-4xl font-bold text-white">About Us</h1>
          <p class="max-w-md text-lg text-white">
            We create premium bags that combine sustainability and style.
          </p>
        </div>
      </section>

      <!-- About Us Content Section -->
      <section class="px-6 py-12 bg-white lg:px-24">
        <div class="max-w-5xl mx-auto text-center">
          <!-- Title -->
          <h2 class="text-3xl font-bold text-[#7d836d] mb-6">Our Story</h2>
          <p class="mb-8 text-lg text-gray-600">
            Our journey began with a love for timeless designs and a commitment
            to eco-friendly materials. Every bag we make is a testament to our
            dedication to quality and sustainability.
          </p>
        </div>
      </section>

      <!-- Values Section -->
      <section class="py-12 bg-[#f7f7f7]">
        <div class="max-w-5xl mx-auto text-center">
          <h2 class="text-2xl font-semibold text-[#b0956e] mb-8">Our Values</h2>
          <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            <!-- Value 1 -->
            <div class="p-4 bg-white border rounded-lg">
              <h3 class="text-xl font-semibold text-[#7d836d] mb-2">Quality</h3>
              <p class="text-gray-600">
                Handcrafted with care, each bag is made to last.
              </p>
            </div>
            <!-- Value 2 -->
            <div class="p-4 bg-white border rounded-lg">
              <h3 class="text-xl font-semibold text-[#7d836d] mb-2">
                Sustainability
              </h3>
              <p class="text-gray-600">
                We source eco-friendly materials and minimize waste.
              </p>
            </div>
            <!-- Value 3 -->
            <div class="p-4 bg-white border rounded-lg">
              <h3 class="text-xl font-semibold text-[#7d836d] mb-2">Style</h3>
              <p class="text-gray-600">
                Our designs are classic, versatile, and functional.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
</UserLayouts>
  </template>

  <script setup>
  import AboutImage from "../assets/aboutusImage.png";
import UserLayouts from "./Layouts/UserLayouts.vue";

  </script>
