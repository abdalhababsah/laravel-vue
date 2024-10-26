<template>
    <UserLayouts>
        <section class="bg-white lg:ml-12 py-8 antialiased dark:bg-gray-900 md:py-16">
            <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <StepNavigation
                    :disableCart="false"
                    :disableCheckout="false"
                    :disableOrderSummary="true"
                />
                <div class="mt-2 sm:mt-8 lg:flex lg:justify-between lg:items-start lg:gap-12 xl:gap-16">
                    <div class="min-w-0 flex-1 space-y-8">
                        <DeliveryDetails />
                        <PaymentOptions />
                    </div>
                    <div class="mt-6 w-full lg:mt-10 lg:max-w-xs lg:mr-10 xl:max-w-md">
                        <OrderSummary />
                    </div>
                </div>
            </form>
        </section>
    </UserLayouts>
</template>

<script setup>
import UserLayouts from './Layouts/UserLayouts.vue';
import StepNavigation from './Components/checkout/StepNavigation.vue';
import DeliveryDetails from './Components/checkout/DeliveryDetails.vue';
import PaymentOptions from './Components/checkout/PaymentOptions.vue';
import OrderSummary from './Components/checkout/OrderSummary.vue';

</script>

<style scoped>
/* Add your styles if needed */
</style>
