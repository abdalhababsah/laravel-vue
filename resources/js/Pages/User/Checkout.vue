<template>
    <UserLayouts>
        <div class="min-h-screen bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 pt-4 pb-16 sm:px-6 sm:pt-8 lg:px-8">
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <h1 class="sr-only">Checkout</h1>

                    <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
                        <div>
                            <div class="mt-10 border-t border-gray-200 pt-10">
                                <h2 class="text-lg font-medium text-gray-900">Delivery information</h2>

                                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Full name</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.name" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Email address</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.email" type="email" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Phone number</label>
                                        <div class="mt-1">
                                            <div class="flex">
                                                <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-gray-500 sm:text-sm">
                                                    +962
                                                </span>
                                                <input v-model="deliveryDetails.phone" type="tel" class="block w-full rounded-none rounded-r-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Address</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.address1" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700">Apartment, suite, etc.</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.address2" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">City</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.city" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                                        <div class="mt-1">
                                            <input v-model="deliveryDetails.zipcode" type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7d836d] focus:ring-[#7d836d] sm:text-sm" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 border-t border-gray-200 pt-10">
                                <h2 class="text-lg font-medium text-gray-900">Payment</h2>

                                <fieldset class="mt-4">
                                    <legend class="sr-only">Payment type</legend>
                                    <div class="space-y-4 sm:flex sm:items-center sm:space-x-10 sm:space-y-0">
                                        <div class="flex items-center">
                                            <input id="pay-on-delivery" v-model="paymentMethod" name="payment-type" type="radio" value="pay_on_delivery" checked class="h-4 w-4 border-gray-300 text-[#7d836d] focus:ring-[#7d836d]" />
                                            <label for="pay-on-delivery" class="ml-3 block text-sm font-medium text-gray-700">Pay on delivery</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="mt-6 flex space-x-2">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm text-gray-500">
                                            By placing this order, you agree to our
                                            <a href="#" class="font-medium text-[#7d836d] hover:text-[#b0956e]">terms and conditions</a>
                                            and
                                            <a href="#" class="font-medium text-[#7d836d] hover:text-[#b0956e]">privacy policy</a>.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order summary -->
                        <div class="mt-10 lg:mt-0">
                            <h2 class="sr-only">Order summary</h2>

                            <OrderSummary 
                                :delivery-details="deliveryDetails" 
                                :payment-method="paymentMethod"
                                :is-form-valid="isFormValid"
                                :isCheckoutPage="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayouts>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import OrderSummary from './Components/shared/OrderSummary.vue';

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
