<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import { User, Menu } from '@element-plus/icons-vue';

const canLogin = usePage().props.canLogin;
const canRegister = usePage().props.canRegister;
const auth = usePage().props.auth;
const cart = computed(() => usePage().props.cart);
const isMenuOpen = ref(false);



// Method to handle logout
const handleLogout = () => {
    // Add logic to handle logout, e.g., calling a logout function or API
};
</script>
<template>
    <nav :class="{ 'bg-white w-full': isMenuOpen, 'dark:bg-gray-800': !isMenuOpen, 'border-gray-200': true, 'z-50': true, 'relative': true }">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between p-4">
            <!-- Logo and site name -->
            <Link :href="route('user.home')" class="hidden md:flex items-center space-x-3 rtl:space-x-reverse">
                <span class="px-4 py-2 rounded-md self-center text-3xl font-semibold text-[#7d836d] whitespace-nowrap dark:text-white hover:-translate-y-1 transform transition duration-200 hover:shadow-md">
                    Shantaty.<span>net</span>
                </span>
            </Link>

            <!-- Mobile menu button -->
            <button @click="isMenuOpen = !isMenuOpen" class="md:hidden text-gray-900 dark:text-white focus:outline-none">
                <Menu class="h-8 w-8 text-[#7d836d]" />
            </button>

            <!-- Mobile Navigation Links -->
            <div :class="{ 'block': isMenuOpen, 'hidden': !isMenuOpen }" class="fixed inset-0 top-16 md:hidden bg-white dark:bg-gray-800 z-40">
                <ul class="flex flex-col space-y-4 p-4">
                    <li>
                        <Link :href="route('user.home')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Home</Link>
                    </li>
                    <li>
                        <Link :href="route('AboutUs')"  class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">About</Link>
                    </li>
                    <li>
                        <Link :href="route('contactUs')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Contact</Link>
                    </li>
                    <li v-if="canLogin">
                        <Link :href="route('products.index')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Shop</Link>
                    </li>
                    <li v-if="canLogin">
                        <Link :href="route('cart.view')" class="relative block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="absolute top-3 right-0 left-9 inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full transform translate-x-2 -translate-y-2 dark:border-gray-900">
                                {{ cart.data.count }}
                            </div>
                            <p>Cart</p>
                        </Link>
                    </li>
                    <li v-if="auth.user" class="flex gap-2">
                        <Link v-if="auth.user.isAdmin" :href="route('admin.dashboard')" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                            Dashboard
                        </Link>
                        <Link v-else :href="route('user.dashboard')" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                            Dashboard
                        </Link>
                        <Link :href="route('logout')" method="post" class="px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                            Logout
                        </Link>
                    </li>
                    <li v-else class="flex gap-2">
                        <Link :href="route('login')" type="button" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                            Login
                        </Link>
                        <Link v-if="canRegister" :href="route('register')" type="button" class="px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white mr-3 bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                            Register
                        </Link>
                    </li>
                </ul>
            </div>

            <!-- Navigation Links for larger screens -->
            <div class="hidden md:flex md:items-center md:space-x-8 rtl:space-x-reverse font-medium w-full md:w-auto">
                <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0">
                    <li>
                        <Link :href="route('AboutUs')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">About</Link>
                    </li>
                    <li>
                        <Link :href="route('contactUs')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Contact</Link>
                    </li>
                    <li v-if="canLogin">
                        <Link :href="route('products.index')" class="block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">Shop</Link>
                    </li>
                    <li v-if="canLogin">
                        <Link :href="route('cart.view')" class="relative block px-3 py-2 rounded-md font-semibold text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full transform translate-x-2 -translate-y-2 dark:border-gray-900">
                                {{ cart.data.count }}
                            </div>
                            <p>Cart</p>
                        </Link>
                    </li>
                </ul>
            </div>

            <!-- User and Cart Actions -->
            <div v-if="canLogin" class="hidden md:flex items-center space-x-3 rtl:space-x-reverse">
                <div v-if="auth.user" class="flex gap-2">
                    <Link v-if="auth.user.isAdmin" :href="route('admin.dashboard')" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                        Dashboard
                    </Link>
                    <Link v-else :href="route('user.dashboard')" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                        Dashboard
                    </Link>
                    <Link :href="route('logout')" method="post" class="px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                        Logout
                    </Link>
                </div>
                <div v-else class="flex gap-2">
                    <Link :href="route('login')" type="button" class="px-6 py-3 mb-4 md:bg-[#b0956e] md:text-white bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                        Login
                    </Link>
                    <Link v-if="canRegister" :href="route('register')" type="button" class="px-6 py-3 mb-4 md:bg-[#7d836d] md:text-white mr-3 bg-white text-[#06402b] transition duration-300 hover:bg-[#937c5b] hover:text-white">
                        Register
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>

<style>
/* Add custom styles here if needed */
</style>
