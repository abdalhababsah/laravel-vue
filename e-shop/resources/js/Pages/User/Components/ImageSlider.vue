<template>
    <div class="container mx-auto px-4 sm:px-2 md:px-10 lg:px-15 xl:px-10">

        <div class="container mx-auto px-4 sm:px-2 md:px-10 lg:px-15 xl:px-10">
            <div class="relative w-full mt-20">
                <div class="flex justify-start mb-12">
                    <p class="text-4xl leading-normal tracking-wide text-[#b0956e] lg:text-5xl dark:text-white">More
                        Requested</p>
                </div>
                <swiper class="centered-slide-carousel" :loop="true" :space-between="30" :slide-to-clicked-slide="true"
                    :autoplay="{ delay: 1000, disableOnInteraction: false }" :breakpoints="{
                        1920: { slidesPerView: 4, spaceBetween: 30 },
                        1280: { slidesPerView: 4, spaceBetween: 20 },
                        1028: { slidesPerView: 3, spaceBetween: 10 },
                        768: { slidesPerView: 2, spaceBetween: 5 },
                        0: { slidesPerView: 1, spaceBetween: 10 }
                    }" :pagination="{ clickable: true }">
                    <swiper-slide v-for="(card, index) in cards" :key="index">
                        <div class="block rounded-lg bg-white shadow-secondary-1 dark:bg-surface-dark h-[33rem]">
                            <div class="relative overflow-hidden bg-no-repeat bg-cover">
                                <img class="w-full rounded-t-lg h-96" :src="card.image" alt="" />
                                <div
                                    class="absolute inset-0 h-full w-full bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                                </div>
                            </div>
                            <div class="p-6 text-surface dark:text-white">
                                <h5 class="mb-2 text-xl font-medium leading-tight">{{ card.title }}</h5>
                                <p class="mb-4 text-base">{{ card.content }}</p>
                            </div>
                        </div>
                    </swiper-slide>
                    <div class="swiper-pagination"></div>
                </swiper>

            </div>
        </div>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/pagination';

const cards = [
    {
        image: 'https://i.pinimg.com/564x/8a/b5/d8/8ab5d8f72045161f08b1674b56bb90bb.jpg',
        title: 'Card title 1',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
    {
        image: 'https://i.pinimg.com/564x/ad/13/05/ad130543b0d7c2d5c02fe3505e95cc02.jpg',
        title: 'Card title 2',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
    {
        image: 'https://i.pinimg.com/564x/09/fd/f8/09fdf879a395d89f7ad232e8568d5f1c.jpg',
        title: 'Card title 3',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
    {
        image: 'https://i.pinimg.com/564x/7f/47/ee/7f47ee5cb299d80029ae607615111fcc.jpg',
        title: 'Card title 4',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
    {
        image: 'https://i.pinimg.com/736x/73/f7/6c/73f76c7ca99dc20bd4b0527973702121.jpg',
        title: 'Card title 5',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
    {
        image: 'https://i.pinimg.com/564x/d4/da/76/d4da767d7bf9c15ace6b8658482c4991.jpg',
        title: 'Card title 6',
        content: 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
    },
];

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
