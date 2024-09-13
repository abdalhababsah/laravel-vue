<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    pagination: Object,
})

// Computed property to handle pagination links
const computedLinks = computed(() => {
    const { links, current_page, last_page } = props.pagination.meta
    const result = []

    // Handle previous button
    if (current_page > 1) {
        result.push(links[0])
    }

    // Handle ellipses and page numbers
    if (last_page > 4) {
        if (current_page < 4) {
            result.push(...links.slice(1, 4))
            result.push({ label: '...', url: '#' })
            result.push(links[links.length - 2])
        } else if (current_page > last_page - 3) {
            result.push(links[1])
            result.push({ label: '...', url: '#' })
            result.push(...links.slice(-3))
        } else {
            result.push(links[1])
            result.push({ label: '...', url: '#' })
            result.push(...links.slice(current_page - 2, current_page + 1))
            result.push({ label: '...', url: '#' })
            result.push(links[links.length - 2])
        }
    } else {
        result.push(...links.slice(1, -1))
    }

    // Handle next button
    if (current_page < last_page) {
        result.push(links[links.length - 1])
    }

    return result
})
</script>

<template>
    <nav class="flex flex-col md:flex-row md:justify-between items-center w-full" aria-label="Table navigation">
        <!-- Showing Info -->
        <span class="text-xs md:text-sm font-normal text-gray-500 dark:text-gray-400 mb-2 md:mb-0">
            Page
            <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.meta.current_page }}</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ pagination.meta.last_page }}</span>
        </span>

        <!-- Pagination Links -->
        <ul class="inline-flex items-center flex-wrap -space-x-px">
            <!-- Pagination Items -->
            <li v-for="link in computedLinks" :key="link.label">
                <Link
                    v-if="link.label === '...'"
                    href="#"
                    class="flex items-center justify-center text-xs md:text-sm py-1 md:py-2 px-2 md:px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                >
                    ...
                </Link>
                <Link
                    v-else
                    preserve-scroll
                    :href="link.url ?? '#'"
                    v-html="link.label"
                    class="flex items-center justify-center text-xs md:text-sm py-1 md:py-2 px-2 md:px-3 leading-tight border border-gray-300 dark:border-gray-700 hover:bg-[#937c5b] hover:text-white dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    :class="{ 'bg-[#7d836d]': link.active, '!text-gray-300': !link.url }"
                />
            </li>
        </ul>
    </nav>
</template>
