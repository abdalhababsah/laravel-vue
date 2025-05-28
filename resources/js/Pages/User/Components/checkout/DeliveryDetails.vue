<template>
    <div class="space-y-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>
        <form @submit.prevent="submitForm" class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900">
                    Your name<span class="text-red-500">*</span>
                </label>
                <input type="text" id="your_name" v-model="form.name"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Full Name" required />
                <span v-if="errors.name" class="text-red-500 text-sm">{{ errors.name }}</span>
            </div>

            <div>
                <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900">
                    Your email<span class="text-red-500">*</span>
                </label>
                <input type="email" id="your_email" v-model="form.email"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="email@example.com" required />
                <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
            </div>

            <div>
                <label for="address1" class="mb-2 block text-sm font-medium text-gray-900">
                    Address One <span class="text-red-500">*</span>
                </label>
                <input type="text" id="address1" v-model="form.address1"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Your address" required />
                <span v-if="errors.address1" class="text-red-500 text-sm">{{ errors.address1 }}</span>
            </div>

            <div>
                <label for="address2" class="mb-2 block text-sm font-medium text-gray-900">
                    Address Two (<span class="text-blue-500">optional</span>)
                </label>
                <input type="text" id="address2" v-model="form.address2"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Additional address details" />
            </div>

            <div>
                <label for="phone-input" class="mb-2 block text-sm font-medium text-gray-900">
                    Phone Number <span class="text-red-500">*</span>
                </label>
                <div class="flex items-center">
                    <div class="border-gray-300 w-1/4 bg-gray-50 p-2.5 text-sm flex items-center">
                        <img src="../../../assets/flag-for-jordan-svgrepo-com.svg" alt="Jordan Flag" class="w-6 h-6 mr-2" />+962
                    </div>
                    <div class="relative w-3/4">
                        <input type="text" id="phone-input" v-model="form.phone"
                            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500"
                            placeholder="779123456" required pattern="77[0-9]{7}|78[0-9]{7}|79[0-9]{7}" />
                    </div>
                </div>
                <span v-if="errors.phone" class="text-red-500 text-sm">{{ errors.phone }}</span>
            </div>

            <div>
                <label for="zipcode" class="mb-2 block text-sm font-medium text-gray-900">
                    Zipcode <span class="text-red-500">*</span>
                </label>
                <input type="text" id="zipcode" v-model="form.zipcode"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    placeholder="Zipcode" required />
                <span v-if="errors.zipcode" class="text-red-500 text-sm">{{ errors.zipcode }}</span>
            </div>

            <div>
                <label for="select-city" class="mb-2 block text-sm font-medium text-gray-900">
                    City<span class="text-red-500">*</span>
                </label>
                <select id="select-city" v-model="form.city"
                    class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                    required>
                    <option value="" disabled>Select a city</option>
                    <option v-for="city in cities" :key="city" :value="city">{{ city }}</option>
                </select>
                <span v-if="errors.city" class="text-red-500 text-sm">{{ errors.city }}</span>
            </div>
        </form>
    </div>
</template>

<script setup>
import { ref, reactive, watch } from 'vue';

const props = defineProps({
    deliveryDetails: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['update:deliveryDetails']);

const cities = [
    'Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq',
    'Kerek', 'Salt', 'Jarrash', 'Madaba', 'Tafileh', 'Abu Alanda'
];

const form = reactive({
    name: props.deliveryDetails.name || '',
    email: props.deliveryDetails.email || '',
    address1: props.deliveryDetails.address1 || '',
    address2: props.deliveryDetails.address2 || '',
    phone: props.deliveryDetails.phone || '',
    zipcode: props.deliveryDetails.zipcode || '',
    city: props.deliveryDetails.city || ''
});

const errors = reactive({});

const validateForm = () => {
    let isValid = true;
    errors.name = !form.name ? 'Name is required' : '';
    errors.email = !form.email ? 'Email is required' : '';
    errors.address1 = !form.address1 ? 'Address is required' : '';
    errors.phone = !form.phone ? 'Phone is required' : '';
    errors.zipcode = !form.zipcode ? 'Zipcode is required' : '';
    errors.city = !form.city ? 'City is required' : '';

    // Phone number validation
    if (form.phone && !/^(77|78|79)[0-9]{7}$/.test(form.phone)) {
        errors.phone = 'Please enter a valid phone number starting with 77, 78, or 79';
        isValid = false;
    }

    // Email validation
    if (form.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
        errors.email = 'Please enter a valid email address';
        isValid = false;
    }

    return isValid && !Object.values(errors).some(error => error);
};

const submitForm = () => {
    if (validateForm()) {
        emit('update:deliveryDetails', form);
    }
};

// Watch for form changes and emit updates
watch(form, (newValue) => {
    if (validateForm()) {
        emit('update:deliveryDetails', { ...newValue });
    }
}, { deep: true });

// Watch for props changes
watch(() => props.deliveryDetails, (newValue) => {
    Object.assign(form, newValue);
}, { deep: true });
</script>

<style scoped>
/* Add your styles here if needed */
</style>
