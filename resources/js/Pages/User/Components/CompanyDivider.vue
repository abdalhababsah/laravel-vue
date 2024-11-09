<template>
    <!-- ====== Brands Section Start -->
    <section id="brands_section" class="mt-12 md:mt-28 bg-[#7d836d]">
        <div class="px-4 py-6 md:px-20">
            <div class="flex flex-wrap items-center justify-between gap-6 xl:gap-11">
                <img :src="ChanelLogo" alt="Chanel Logo" class="w-16 sm:w-20 md:w-28" />
                <img :src="CoachLogo" alt="Coach Logo" class="w-16 sm:w-20 md:w-28" />
                <img :src="AlluLogo" alt="Allu Logo" class="w-16 sm:w-20 md:w-28" />
                <img :src="LappellaLogo" alt="Lappella Logo" class="w-16 sm:w-20 md:w-28" />
            </div>
        </div>
    </section>
</template>

<script setup>
import CoachLogo from '../../assets/coach.svg';
import ChanelLogo from '../../assets/chanel-logo.svg';
import LappellaLogo from '../../assets/prada.svg';
import AlluLogo from '../../assets/gucci.svg';
</script>

<style scoped>
img {
    mix-blend-mode: multiply;
}
</style>