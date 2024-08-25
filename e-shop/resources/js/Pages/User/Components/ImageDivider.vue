<script setup>
import section from '../../assets/section.jpg'
</script>

<template>
    <div class="h-screen bg-fixed bg-center bg-cover"
        :style="{ backgroundImage: `url(${section})`, height: '39.7rem' }">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <div class="w-2/3 text-center md:w-1/2">
                <h1 class="mb-4 text-4xl font-bold text-[#b0956e]">Elevate Your Style with Our Exclusive Fashion Bags
                </h1>
                <p class="mb-8 text-white">Discover our latest collection of premium bags, blending timeless elegance
                    with modern design. Perfect for any occasion.</p>
                <button class="px-6 py-3 font-semibold text-white transition bg-[#b0956e] hover:bg-[#937c5b]">Shop
                    Now</button>
            </div>
        </div>
    </div>
</template>
