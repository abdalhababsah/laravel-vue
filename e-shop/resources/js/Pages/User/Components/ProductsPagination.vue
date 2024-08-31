<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    pagination: Object,
})
</script>

<template>
    <nav class="flex flex-row justify-between md:gap-28 w-100" aria-label="Table navigation">
        <!-- Showing Info -->
        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
            Page
            <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.meta.current_page }}</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.meta.last_page }}</span>
        </span>

        <!-- Pagination Links -->
        <ul  class="inline-flex items-stretch -space-x-px">
            <!-- Previous Button -->
            <li >
                <Link
                    preserve-scroll
                    :href="pagination.meta.links[0]?.url ?? '#'"
                    class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </Link>
            </li>
            <!-- Page Numbers -->
            <li v-for="link in pagination.meta.links.slice(1, -1)" :key="link.label">
                <Link
                    preserve-scroll
                    :href="link.url ?? '#'"
                    v-html="link.label"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight border border-gray-300 dark:border-gray-700 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    :class="{ 'bg-[#7d836d]': link.active, '!text-gray-300': !link.url }"
                />
            </li>
            <!-- Ellipsis -->
            <li v-if="pagination.meta.links.some(link => link.label === '...')">
                <a
                    href="#"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    ...
                </a>
            </li>
            <!-- Last Page Number -->
            <li v-if="pagination.meta.links.length > 2">
                <Link
                    preserve-scroll
                    :href="pagination.meta.links[pagination.meta.links.length - 1]?.url ?? '#'"
                    v-html="pagination.meta.links[pagination.meta.links.length - 1]?.label ?? ''"
                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight border border-gray-300 dark:border-gray-700 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                />
            </li>
            <!-- Next Button -->
            <li>
                <Link
                    preserve-scroll
                    :href="pagination.meta.links[pagination.meta.links.length - 1]?.url ?? '#'"
                    class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </Link>
            </li>
        </ul>
    </nav>
</template>
