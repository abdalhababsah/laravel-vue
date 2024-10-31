<template>
    <!-- ====== Brands Section Start -->
    <section id="brands_section" class=" md:mt-28 mt-12 bg-[#7d836d]">
        <div class="px-20 py-3">
            <div class="flex items-center justify-between gap-6 xl:gap-11 ">
                <img :src="ChanelLogo" alt="Chanel Logo" class="sm:w-14 w-10 md:w-28" />
                <img :src="CoachLogo" alt="Coach Logo" class="sm:w-14 w-10 md:w-28" />
                <img :src="AlluLogo" alt="Allu Logo" class="sm:w-14 w-10 md:w-28" />
                <img :src="LappellaLogo" alt="Lappella Logo" class="sm:w-14 w-10 md:w-28" />
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
            width: 100px;
            mix-blend-mode: multiply;
        }
</style>