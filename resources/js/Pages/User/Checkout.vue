<template>
    <UserLayouts>
        <section class="bg-white lg:ml-12 py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <StepNavigation />
                <div class="mt-2 sm:mt-8 lg:flex lg:justify-between lg:items-start lg:gap-12 xl:gap-16">
                    <div class="min-w-0 flex-1 space-y-8">
                        <DeliveryDetails 
                            :delivery-details="deliveryDetails"
                            @update:deliveryDetails="updateDeliveryDetails" 
                        />
                        <PaymentOptions 
                            v-model:payment-method="paymentMethod"
                        />
                    </div>
                    <div class="mt-6 w-full lg:mt-10 lg:max-w-xs lg:mr-10 xl:max-w-md">
                        <OrderSummary 
                            :delivery-details="deliveryDetails" 
                            :payment-method="paymentMethod"
                            :is-form-valid="isFormValid" 
                        />
                    </div>
                </div>
            </div>
        </section>
    </UserLayouts>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import StepNavigation from './Components/checkout/StepNavigation.vue';
import DeliveryDetails from './Components/checkout/DeliveryDetails.vue';
import PaymentOptions from './Components/checkout/PaymentOptions.vue';
import OrderSummary from './Components/checkout/OrderSummary.vue';

const page = usePage();

const deliveryDetails = ref({
    name: '',
    email: page.props.auth?.user?.email || '',
    address1: '',
    address2: '',
    phone: '',
    zipcode: '',
    city: ''
});

const paymentMethod = ref('pay_on_delivery');

const isFormValid = computed(() => {
    const requiredFields = ['name', 'email', 'address1', 'phone', 'zipcode', 'city'];
    const fieldsValid = requiredFields.every(field => deliveryDetails.value[field]?.length > 0);
    const phoneValid = /^(77|78|79)[0-9]{7}$/.test(deliveryDetails.value.phone || '');
    const emailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(deliveryDetails.value.email || '');
    
    return fieldsValid && phoneValid && emailValid && paymentMethod.value === 'pay_on_delivery';
});

const updateDeliveryDetails = (details) => {
    deliveryDetails.value = { ...details };
};

// Check if cart is empty on mount
onMounted(() => {
    if (!page.props.cart?.data?.items?.length) {
        window.location.href = route('cart.view');
    }
});
</script>

<style scoped>
/* Add your styles if needed */
</style>
