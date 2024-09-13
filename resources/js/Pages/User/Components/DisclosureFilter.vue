<script setup>
import { ref, computed, defineProps, defineEmits } from 'vue';
import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue';
import { PlusIcon, MinusIcon } from '@heroicons/vue/24/outline';

const props = defineProps({
    items: Array,
    sectionTitle: String,
    modelValue: {
        type: Array,
        default: () => []
    }
});

const emit = defineEmits(['update:modelValue']);

const isChecked = (id) => {
    return props.modelValue.includes(id);
};

const handleChange = (id) => {
    const newSelection = [...props.modelValue];
    if (newSelection.includes(id)) {
        newSelection.splice(newSelection.indexOf(id), 1);
    } else {
        newSelection.push(id);
    }
    emit('update:modelValue', newSelection);
};

// Search term
const searchQuery = ref('');

const filteredItems = computed(() => {
    return props.items.filter(item =>
        item.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});
</script>

<template>
    <Disclosure as="div" class="border-b border-gray-200 py-6" v-slot="{ open }">
        <h3 class="-my-3 flow-root">
            <DisclosureButton
                class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                <span class="font-medium text-gray-900">{{ sectionTitle }}</span>
                <span class="ml-6 flex items-center">
                    <PlusIcon v-if="!open" class="h-5 w-5" aria-hidden="true" />
                    <MinusIcon v-else class="h-5 w-5" aria-hidden="true" />
                </span>
            </DisclosureButton>
        </h3>
        <DisclosurePanel class="pt-6">
            <!-- Search input -->
            <input v-model="searchQuery" type="text" :placeholder="`Search ${sectionTitle.toLowerCase()}`"
                class="mb-8 w-full rounded border-gray-300 text-gray-600 focus:ring-indigo-500" />

            <div class="space-y-4">
                <!-- Filtered items -->
                <div v-for="item in filteredItems" :key="item.id" class="flex items-center">
                    <input :id="`filter-${item.id}`" :value="item.id" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        :checked="isChecked(item.id)" @change="handleChange(item.id)" />
                    <label :for="`filter-${item.id}`" class="ml-3 text-sm text-gray-600 flex items-center">
                        <!-- Small colored circle -->
                        <span :style="{ backgroundColor: item.hex_code }"
                            class="inline-block w-4 h-4 rounded-full mr-2"></span>
                        <!-- Color name -->
                        {{ item.name }}
                    </label>
                </div>
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
