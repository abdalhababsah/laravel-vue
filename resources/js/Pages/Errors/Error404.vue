<template>
    <div class="relative flex min-h-screen items-center justify-center overflow-hidden">
        <div
            class="px-6 py-16 text-center font-semibold before:container before:absolute before:left-1/2 before:-translate-x-1/2 before:rounded-full before:bg-[linear-gradient(180deg,#4361EE_0%,rgba(67,97,238,0)_50.73%)] before:aspect-square before:opacity-10 md:py-20"
        >
            <div class="relative">
                <img
                    :src="Image404"
                    alt="404"
                    class="mx-auto -mt-10 w-full max-w-xs object-cover md:-mt-14 md:max-w-xl"
                />
                <p class="mt-5 text-base dark:text-white">The page you requested was not found!</p>
                <Link :href="route('user.home')" class="btn btn-gradient mx-auto !mt-7 w-max border-0 uppercase shadow-none">Home</Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { useMeta } from '@/Composables/use-meta';  // Corrected import
import Image404 from '../assets/404-light.svg';
useMeta({ title: 'Error 404 - Page Not Found' });
</script>
