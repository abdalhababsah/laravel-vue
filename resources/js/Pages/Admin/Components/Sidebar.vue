<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { DataAnalysis } from '@element-plus/icons-vue'; // Element Plus icons
import { LaShoppingBagSolid } from '@kalimahapps/vue-icons';
import { LuUsers ,LaFileInvoiceDollarSolid} from '@kalimahapps/vue-icons';
import { CaColorPalette, BxCategory, LiDiamond } from '@kalimahapps/vue-icons';

const { url } = usePage(); // Get the current URL from usePage
</script>

<template>
<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-[#7d836d] border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav"
    id="drawer-navigation"
>
    <div class="overflow-y-auto py-5 px-3 h-full dark:bg-gray-800">
        <form action="#" method="GET" class="md:hidden mb-2">
            <label for="sidebar-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg
                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        ></path>
                    </svg>
                </div>
                <input
                    type="text"
                    name="search"
                    id="sidebar-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Search"
                />
            </div>
        </form>
        <!-- First Section -->
        <ul class="space-y-2">
            <li>
                <Link
                    :href="route('admin.dashboard')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/dashboard',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/dashboard'
                    }"
                >
                    <DataAnalysis
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/dashboard',
                            'text-white group-hover:text-black': $page.url !== '/admin/dashboard'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/dashboard',
                            'text-white group-hover:text-black': $page.url !== '/admin/dashboard'
                        }"
                    >Dashboard</span>
                </Link>
            </li>
            <li>
                <Link
                    :href="route('admin.users.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/users',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/users'
                    }"
                >
                    <LuUsers
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/users',
                            'text-white group-hover:text-black': $page.url !== '/admin/users'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/users',
                            'text-white group-hover:text-black': $page.url !== '/admin/users'
                        }"
                    >Users</span>
                </Link>
            </li>
        </ul>
        <!-- Divider -->
        <hr class="my-4 border-gray-300 dark:border-gray-600"/>
        <!-- Second Section -->
        <ul class="space-y-2">
            <li>
                <Link
                    :href="route('admin.products.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/products',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/products'
                    }"
                >
                    <LaShoppingBagSolid
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/products',
                            'text-white group-hover:text-black': $page.url !== '/admin/products'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/products',
                            'text-white group-hover:text-black': $page.url !== '/admin/products'
                        }"
                    >Products</span>
                </Link>
            </li>
            <li>
                <Link
                    :href="route('admin.orders.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/orders',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/orders'
                    }"
                >
                    <LaFileInvoiceDollarSolid
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/orders',
                            'text-white group-hover:text-black': $page.url !== '/admin/orders'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/orders',
                            'text-white group-hover:text-black': $page.url !== '/admin/orders'
                        }"
                    >Orders</span>
                </Link>
            </li>
        </ul>
        <!-- Third Section -->
        <ul class="space-y-2">
            <hr class="my-4 border-gray-300 dark:border-gray-600"/>
            <li>
                <Link
                    :href="route('admin.brands.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/brands',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/brands'
                    }"
                >
                    <LiDiamond
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/brands',
                            'text-white group-hover:text-black': $page.url !== '/admin/brands'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/brands',
                            'text-white group-hover:text-black': $page.url !== '/admin/brands'
                        }"
                    >Brands</span>
                </Link>
            </li>
            <li>
                <Link
                    :href="route('admin.categories.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/categories',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/categories'
                    }"
                >
                    <BxCategory
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/categories',
                            'text-white group-hover:text-black': $page.url !== '/admin/categories'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/categories',
                            'text-white group-hover:text-black': $page.url !== '/admin/categories'
                        }"
                    >Categories</span>
                </Link>
            </li>
            <li>
                <Link
                    :href="route('admin.colors.index')"
                    class="flex items-center p-2 text-base font-medium rounded-lg group"
                    :class="{
                        'bg-gray-100 dark:bg-gray-700 text-black': $page.url === '/admin/colors',
                        'text-white hover:bg-gray-100 dark:hover:bg-gray-700': $page.url !== '/admin/colors'
                    }"
                >
                    <CaColorPalette
                        class="w-6 h-6"
                        :class="{
                            'text-black': $page.url === '/admin/colors',
                            'text-white group-hover:text-black': $page.url !== '/admin/colors'
                        }"
                    />
                    <span
                        class="ml-3"
                        :class="{
                            'text-black': $page.url === '/admin/colors',
                            'text-white group-hover:text-black': $page.url !== '/admin/colors'
                        }"
                    >Product Colors</span>
                </Link>
            </li>
        </ul>
    </div>
</aside>

</template>
