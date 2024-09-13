<template>
    <div class="container mx-auto px-4 w-full h-screen bg-blueGray-800 bg-no-repeat bg-full" :style="{ backgroundImage: `url(${background})` }">
      <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
          <div class="relative flex bg-white flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg border-0">
            <div class="rounded-t mb-0 px-6 py-6">
              <div class="text-center">
                <div class="text-[#7d836d] font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase inline-flex items-center text-2xl ease-linear transition-all duration-150" type="button">
                  Shantaty.net
                </div>
              </div>
              <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="text-blueGray-400 text-center mb-3 font-bold">
                <small>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</small>
              </div>

              <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600 text-center">
                A new verification link has been sent to the email address you provided during registration.
              </div>

              <form @submit.prevent="submit">
                <div class="text-center mt-6">
                  <button class="bg-[#7d836d] text-white text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none w-full ease-linear transition-all duration-150" :disabled="form.processing" type="submit">
                    Resend Verification Email
                  </button>
                </div>
              </form>

              <div class="flex flex-wrap mt-6 relative">
                <div class="w-1/2">
                  <Link :href="route('login')" class="text-blueGray-200">
                    <small>Back to login</small>
                  </Link>
                </div>
                <div class="w-1/2 text-right">
                  <Link :href="route('register')" class="text-blueGray-200">
                    <small>Create new account</small>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import background from "../assets/register_bg_2.png";
  import { Link, useForm } from '@inertiajs/vue3';
  import { computed } from 'vue';

  const props = defineProps({
    status: {
      type: String,
    },
  });

  const form = useForm({});

  const submit = () => {
    form.post(route('verification.send'));
  };

  const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
  </script>
