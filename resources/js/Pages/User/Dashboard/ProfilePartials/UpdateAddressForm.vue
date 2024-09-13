<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';
const props = defineProps({
    address:Array
})
const user = usePage().props.auth.user;

const form = useForm({
    address1: props?.address.address1 || '',
    address2: props?.address.address2 || '',
    city: props?.address.city || '',
    state: props?.address.state || '',
    zipcode: props?.address.zipcode || '',
    country_code: props?.address.country_code || '',
    isMain: props?.address.isMain || false,
});

const updateAddress = () => {
    form.patch(route('address.update'));
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Address Information</h2>
            <p class="mt-1 text-sm text-gray-600">Update your account's address information.</p>
        </header>

        <form @submit.prevent="updateAddress" class="mt-6 space-y-6">
            <div>
                <InputLabel for="address1" value="Address Line 1" />
                <TextInput
                    id="address1"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.address1"
                    required
                    autofocus
                    autocomplete="address-line1"
                />
                <InputError class="mt-2" :message="form.errors.address1" />
            </div>

            <div>
                <InputLabel for="address2" value="Address Line 2" />
                <TextInput
                    id="address2"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.address2"
                    autocomplete="address-line2"
                />
                <InputError class="mt-2" :message="form.errors.address2" />
            </div>

            <div>
                <InputLabel for="city" value="City" />
                <TextInput
                    id="city"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.city"
                    required
                    autocomplete="address-level2"
                />
                <InputError class="mt-2" :message="form.errors.city" />
            </div>

            <div>
                <InputLabel for="state" value="State" />
                <TextInput
                    id="state"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.state"
                    autocomplete="address-level1"
                />
                <InputError class="mt-2" :message="form.errors.state" />
            </div>

            <div>
                <InputLabel for="zipcode" value="Zip Code" />
                <TextInput
                    id="zipcode"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.zipcode"
                    required
                    autocomplete="postal-code"
                />
                <InputError class="mt-2" :message="form.errors.zipcode" />
            </div>

            <div>
                <InputLabel for="country_code" value="Country Code" />
                <TextInput
                    id="country_code"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.country_code"
                    required
                    autocomplete="country"
                />
                <InputError class="mt-2" :message="form.errors.country_code" />
            </div>

            <div>
                <label class="flex items-center">
                    <input
                        type="checkbox"
                        v-model="form.isMain"
                        class="form-checkbox"
                    />
                    <span class="ml-2 text-sm text-gray-600">Set as Main Address</span>
                </label>
                <InputError class="mt-2" :message="form.errors.isMain" />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
