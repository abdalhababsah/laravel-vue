<template>

<footer class="bg-[#7d836d]">
<!-- <footer class="bg-[#e5e7eb]"> -->
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <span class="self-center text-3xl font-semibold whitespace-nowrap text-white">Shantaty</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 gap-3 text-sm font-medium text-white sm:mb-0 dark:text-gray-400">
                <li>
                    <Link :href="route('AboutUs')" class="hover:underline me-4 md:me-6">About</Link>
                </li>
                <li>
                    <Link :href="route('contactUs')" class="hover:underline">Contact</Link>
                </li>
            </ul>
        </div>
        <hr class="my-6 p-2 border-white sm:mx-auto lg:my-8" />
        <span class="block text-sm text-white sm:text-center dark:text-gray-400">© 2024 <a href="https://shantaty.net" class="hover:underline text-black">Shantaty™</a>. All Rights Reserved.</span>
        <span class="block text-sm text-white sm:text-center dark:text-gray-400">Developed by <a href="https://www.linkedin.com/in/abdalrahman-al-hababsah/" class="hover:underline text-black">abdalrahman-al-hababsah</a></span>
    </div>
</footer>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
</script>
