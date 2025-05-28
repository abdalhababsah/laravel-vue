<template>
    <div class="space-y-4">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Payment Method</h3>
        <div class="border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
            <div class="flex items-start">
                <div class="flex h-5 items-center">
                    <input 
                        id="pay-on-delivery" 
                        type="radio" 
                        name="payment-method" 
                        value="pay_on_delivery" 
                        v-model="localPaymentMethod"
                        class="h-4 w-4 border-gray-300 bg-white text-primary-600" 
                        checked 
                    />
                </div>
                <div class="ms-4 text-sm">
                    <label for="pay-on-delivery" class="font-medium leading-none text-gray-900 dark:text-white">Payment on delivery</label>
                    <p class="mt-1 text-xs font-normal text-blue-500">Free delivery</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const props = defineProps({
    paymentMethod: {
        type: String,
        required: true
    }
});

const emit = defineEmits(['update:paymentMethod']);

const localPaymentMethod = ref(props.paymentMethod);

watch(localPaymentMethod, (newValue) => {
    emit('update:paymentMethod', newValue);
});

watch(() => props.paymentMethod, (newValue) => {
    localPaymentMethod.value = newValue;
});
</script>

<style scoped>
/* Add your styles if needed */
</style>
