// resources/js/Composables/use-meta.js

import { useHead } from '@vueuse/head';
import { unref, computed } from 'vue';

let siteTitle = 'Shantaty - Your Ultimate Bag Destination';
let separator = '|';

export const usePageTitle = (pageTitle) => {
    useHead(
        computed(() => ({
            title: `${unref(pageTitle)} ${separator} ${siteTitle}`,
        }))
    );
};

export const useMeta = (data = {}) => {
    const defaultData = {
        title: 'Discover Stylish Bags | Shantaty',
        description: 'Explore our exquisite collection of stylish and high-quality bags. Perfect for any occasion. Shop now at Shantaty, your ultimate bag destination.',
        keywords: 'bags, handbags, tote bags, backpacks, stylish bags, fashion accessories',
        author: 'Shantaty Team',
    };

    const mergedData = {
        ...defaultData,
        ...data
    };

    useHead(
        computed(() => ({
            title: `${unref(mergedData.title)} ${separator} ${siteTitle}`,
            meta: [
                { name: 'description', content: unref(mergedData.description) },
                { name: 'keywords', content: unref(mergedData.keywords) },
                { name: 'author', content: unref(mergedData.author) },
            ],
        }))
    );
};
