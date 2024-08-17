<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);
import { User, ShoppingCart, ShoppingCartFull } from '@element-plus/icons-vue';
</script>

<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span
                    class="self-center text-2xl font-semibold text-yellow-900 whitespace-nowrap dark:text-white ">Shantaty.<span
                        class="">net</span></span>
            </a>
            <div class="flex-1 flex items-center justify-center">
                <ul class="flex space-x-8 rtl:space-x-reverse font-medium">
                    <li>
                        <a href="#"
                            class="text-yellow-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-500">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-yellow-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-500">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-yellow-900 dark:text-white hover:text-blue-700 dark:hover:text-blue-500">Contact</a>
                    </li>
                </ul>
            </div>
            <div v-if="canLogin" class="flex items-center space-x-3 rtl:space-x-reverse">
                <Link :href="route('products.index')"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-500 to-pink-500 group-hover:from-purple-500 group-hover:to-pink-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Go To Shop
                    </span>
                </Link>
                <Link :href="route('cart.view')"
                    class="relative inline-flex items-center p-1 text-sm font-medium text-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 rounded ">
                <svg class="w-7 h-7 p-1" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                    viewBox="0 0 1024 1024">
                    <path fill="currentColor"
                        d="M887.01 264.99c-6-5.99-13.67-8.99-23.01-8.99H704c-1.34-54.68-20.01-100.01-56-136s-81.32-54.66-136-56c-54.68 1.34-100.01 20.01-136 56s-54.66 81.32-56 136H160c-9.35 0-17.02 3-23.01 8.99-5.99 6-8.99 13.67-8.99 23.01v640c0 9.35 2.99 17.02 8.99 23.01S150.66 960 160 960h704c9.35 0 17.02-2.99 23.01-8.99S896 937.34 896 928V288c0-9.35-2.99-17.02-8.99-23.01M421.5 165.5c24.32-24.34 54.49-36.84 90.5-37.5 35.99.68 66.16 13.18 90.5 37.5s36.84 54.49 37.5 90.5H384c.68-35.99 13.18-66.16 37.5-90.5M832 896H192V320h128v128h64V320h256v128h64V320h128z">
                    </path>
                </svg>
                <span class="sr-only">Cart</span>
                <div
                    class="absolute inline-flex items-center justify-center w-5 h-5 text-xs  text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                    {{ cart.data.count }}</div>
                </Link>

                <button v-if="auth.user" type="button"
                    class="flex text-sm hover:bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <span class="w-8 h-8 p-1 text-gray hover:text-white border-2 rounded-full" alt="user photo">
                        <User />
                    </span>
                </button>
                <div v-else>
                    <Link :href="route('login')" type="button"
                        class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Login</Link>
                    <Link v-if="canRegister" :href="route('register')" type="button"
                        class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    Register</Link>

                </div>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>


                </div>
            </div>
        </div>
    </nav>
</template>
