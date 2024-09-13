<template>
    <div class="container mx-auto px-4 w-full h-screen bg-blueGray-800 bg-no-repeat bg-full" :style="{ backgroundImage: `url(${background})` }">
      <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
          <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
            <div class="rounded-t mb-0 px-6 py-6">

              <div class="text-center">
                <div class="text-[#7d836d] font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase  inline-flex items-center text-2xl ease-linear transition-all duration-150" type="button">
                Shantaty.net
                </div>
              </div>
              <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="text-blueGray-400 text-center mb-3 font-bold">
                <small>Sign up</small>
              </div>
              <form @submit.prevent="submit">
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="name">Name</label>
                  <input v-model="form.name" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Name" required autofocus />
                </div>
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">Email</label>
                  <input v-model="form.email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email" required />
                </div>
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">Password</label>
                  <input v-model="form.password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Password" required />
                </div>
                <div class="relative w-full mb-3">
                  <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password_confirmation">Confirm Password</label>
                  <input v-model="form.password_confirmation" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Confirm Password" required />
                </div>
                <div class="text-center mt-6">
                  <button class="bg-[#7d836d] text-white text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none w-full ease-linear transition-all duration-150" :disabled="form.processing" type="submit">
                    Sign Up
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-wrap mt-6 relative">
            <div class="w-1/2 text-left">
              <Link :href="route('login')" class="text-blueGray-200">
                <small>Already have an account? Login</small>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import github from "../assets/github.svg";
  import google from "../assets/google.svg";
  import background from "../assets/register_bg_2.png";
  import { Link, useForm } from '@inertiajs/vue3';

  const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });

  const submit = () => {
    form.post(route('register'), {
      onFinish: () => form.reset('password', 'password_confirmation'),
    });
  };
  </script>
