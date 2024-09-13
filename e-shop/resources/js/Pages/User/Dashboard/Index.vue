<template>
    <MainLayout>
        <div class="relative bg-[#b0956e] md:pt-2 pb-32 pt-2">
            <div class="px-4 mx-auto w-full">
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <!-- Active Orders Card -->
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Total Orders</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ orderStats.total_orders }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LaFileInvoiceSolid class="h-10 text-black" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Users Card -->
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Pending Orders</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ orderStats.pending_orders }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LiUsers class="h-10 text-black" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">Completed Orders</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ orderStats.completed_orders }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial">
                                        <div
                                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full">
                                            <LiUsers class="h-10 text-black" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Card -->
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <Link :href="route('products.index')">
                        <div class="relative flex flex-col min-w-0 break-words bg-black hover:bg-white text-white hover:text-black rounded mb-6 xl:mb-0 shadow-lg">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class=" uppercase font-bold text-xs">New Bags</h5>
                                        <span class="font-semibold text-xl text-blueGray-700">{{ productsAdded }}</span>
                                    </div>
                                    <div class="relative w-auto pl-4 flex-initial flex items-center animate-pulse">
                                        <p class="text-xs">Go To Shop</p>
                                        <div
                                            class="p-3 text-center inline-flex items-center justify-center w-12 h-12 ">
                                          <AnOutlinedArrowRight class="h-15 w-20" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </Link>
                    </div>

                </div>
            </div>
        </div>
    </MainLayout>

</template>
<script setup>
import { LiUsers, LaFileInvoiceSolid, AnOutlinedArrowRight  } from '@kalimahapps/vue-icons';
import { usePage } from '@inertiajs/vue3';

const { orderStats, productsAdded } = usePage().props;

import MainLayout from './Layouts/MainLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>
