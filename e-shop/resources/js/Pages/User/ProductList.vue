<script setup>
import UserLayouts from './Layouts/UserLayouts.vue';
import { ref, watch } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
// import ProductsPagination from './Components/ProductsPagination.vue'
import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from '@headlessui/vue';
import DisclosureFilter from './Components/DisclosureFilter.vue';
import ProductCards from './Components/ProductCards.vue';
import { ChevronDownIcon, FunnelIcon, Squares2X2Icon } from '@heroicons/vue/20/solid';

const sortOptions = [
    { name: 'Most Popular', href: '#', current: true },
    { name: 'Best Rating', href: '#', current: false },
    { name: 'Newest', href: '#', current: false },
    { name: 'Price: Low to High', href: '#', current: false },
    { name: 'Price: High to Low', href: '#', current: false },
];

const mobileFiltersOpen = ref(false);

const filterPrices = useForm({
    prices: [0, 1000],
});

const priceFilter = () => {
    filterPrices.transform((data) => ({
        ...data,
        prices: {
            from: filterPrices.prices[0],
            to: filterPrices.prices[1],
        },
    })).get('/products', {
        preserveState: true,
        replace: true,
    });
};

const selectedBrands = ref([]);
const selectedCategory = ref([]);
const selectedColor = ref([]);

watch([selectedBrands, selectedCategory, selectedColor], () => {
    updateFilterProducts();
});

const updateFilterProducts = () => {
    router.get('/products', {
        brands: selectedBrands.value,
        categories: selectedCategory.value,
        colors: selectedColor.value,
    }, {
        preserveState: true,
        replace: true,
        preserveScroll: true,
    });
};

defineProps({
    products: Array,
    categories: Array,
    brands: Array,
    colors: Array,
});

</script>

<template>
    <UserLayouts>
        <div class="bg-white h-3/5 rounded-b-3xl ">
            <div>
                <!-- Mobile filter dialog -->
                <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-20">
                        <h1 class="text-xl font-bold tracking-tight text-gray-900">Bag Haven: Explore our top picks</h1>

                        <div class="flex items-center">
                            <Menu as="div" class="relative inline-block text-left">
                                <div>
                                    <MenuButton
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900">
                                        Sort
                                        <ChevronDownIcon
                                            class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                            aria-hidden="true" />
                                    </MenuButton>
                                </div>

                                <transition enter-active-class="transition ease-out duration-100"
                                    enter-from-class="transform opacity-0 scale-95"
                                    enter-to-class="transform opacity-100 scale-100"
                                    leave-active-class="transition ease-in duration-75"
                                    leave-from-class="transform opacity-100 scale-100"
                                    leave-to-class="transform opacity-0 scale-95">
                                    <MenuItems
                                        class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <div class="py-1">
                                            <MenuItem v-for="option in sortOptions" :key="option.name"
                                                v-slot="{ active }">
                                            <a :href="option.href"
                                                :class="[option.current ? 'font-medium text-gray-900' : 'text-gray-500', active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm']">{{
                                                    option.name }}</a>
                                            </MenuItem>
                                        </div>
                                    </MenuItems>
                                </transition>
                            </Menu>


                            <button type="button"
                                class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden"
                                @click="mobileFiltersOpen = true">
                                <span class="sr-only">Filters</span>
                                <FunnelIcon class="h-5 w-5" aria-hidden="true" />
                            </button>
                        </div>
                    </div>

                    <section aria-labelledby="products-heading" class="pb-24 pt-6">
                        <h2 id="products-heading" class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                            <!-- Filters -->
                            <div class="hidden lg:block">
                                <h3 class="sr-only">Prices</h3>
                                <div class="flex flex-col sm:flex-row items-end gap-4">
                                    <!-- Min Price Input -->
                                    <div class="flex flex-col gap-2 flex-grow">
                                        <label for="min-price"
                                            class="text-sm font-semibold text-gray-700 dark:text-gray-300">Min
                                            Price</label>
                                        <input v-model="filterPrices.prices[0]" type="number" id="min-price"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="10" min="0" max="100" required />
                                    </div>

                                    <!-- Max Price Input -->
                                    <div class="flex flex-col gap-2 flex-grow">
                                        <label for="max-price"
                                            class="text-sm font-semibold text-gray-700 dark:text-gray-300">Max
                                            Price</label>
                                        <input v-model="filterPrices.prices[1]" type="number" id="max-price"
                                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="100" min="0" max="1000" required />
                                    </div>

                                    <!-- Filter Button -->
                                    <div>
                                        <button @click="priceFilter()"
                                            class="inline-flex items-center px-4 py-3 text-sm font-semibold text-black bg-[#e5e7eb] rounded hover:bg-black hover:text-[#e5e7eb] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-400 w-full sm:w-auto">
                                            Filter
                                        </button>
                                    </div>
                                </div>

                                <!-- Category Filter -->
                                <DisclosureFilter :items="categories" sectionTitle="Categories"
                                    v-model="selectedCategory" />

                                <!-- Brand Filter -->
                                <DisclosureFilter :items="brands" sectionTitle="Brands" v-model="selectedBrands" />

                                <!-- Color Filter -->
                                <DisclosureFilter :items="colors" sectionTitle="Colors" v-model="selectedColor" />
                            </div>

                            <!-- Product grid -->
                            <div class="lg:col-span-3">
                                <!-- Your content -->
                                <ProductCards :products="products" gridClass="lg:grid-cols-3" />
                            </div>
                        </div>
                        <!-- <ProductsPagination/> -->
                    </section>
                </main>
            </div>
        </div>



    </UserLayouts>
</template>
