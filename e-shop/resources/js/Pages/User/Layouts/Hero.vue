<template>
     <div class="container mx-auto px-4 sm:px-2 md:px-10 lg:px-15 xl:px-10">

    <section class="relative flex flex-col items-center justify-center w-full py-10 md:py-0 md:flex-row h-5/6">
      <!-- Background Image Section (Visible on small screens) -->
      <div class="absolute inset-0 w-full h-full bg-no-repeat bg-cover bg-center md:hidden"
           style="background-image: url('https://i.pinimg.com/564x/57/d8/66/57d8663e7bc6a2c086406ea890818959.jpg');">
      </div>

      <!-- Content Section -->
      <div class="z-10 w-full px-6 mb-8 text-center ml-12 md:w-1/2 md:mb-0 md:text-left">
        <h1 class="md:text-[#b0956e] md:text-5xl text-white text-4xl lg:text-[#b0956e] lg:text-6xl font-bold mb-4 leading-[2.5rem] sm:leading-[3rem] md:leading-[4rem] lg:leading-[5rem] z-10">
          CARRY YOUR CONFIDENCE
        </h1>
        <p class="mt-4 mb-4 leading-6 text-xl text-[#06402b] sm:mt-8 sm:mb-6 sm:leading-8">
          Perfect handbag made with unique style very elegant for everyday use. It's secured with magnetic and best
          option for your high fashion look.
        </p>
        <div class="flex gap-3 mt-4 sm:flex-row sm:mt-8">
          <button
            class="px-3 py-3 mb-4 md:bg-[#7d836d] md:text-white bg-white text-[#06402b] transition duration-300 sm:px-4 sm:mb-6 hover:bg-[#937c5b] hover:text-white">
            Go To Shop
          </button>
        </div>
      </div>

      <!-- Image Section (Visible on large screens) -->
      <div class="relative hidden justify-center md:flex md:w-1/2">
        <img src="https://i.pinimg.com/564x/57/d8/66/57d8663e7bc6a2c086406ea890818959.jpg" alt="Model with handbag"
             class="w-full max-w-[30rem] h-auto md:h-[35rem] rounded-lg shadow-xl rounded-b-full">
      </div>
    </section>
     </div>
    <!-- hero section -->
  </template>


