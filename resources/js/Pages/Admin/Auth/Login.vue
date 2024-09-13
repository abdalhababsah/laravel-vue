<template>
     <div
    class="container mx-auto px-4 w-full h-full bg-blueGray-800 bg-no-repeat bg-full"
    :style="{ backgroundImage: `url(${background})` }"
  >
      <div class="flex content-center items-center justify-center h-full">
        <div class="w-full lg:w-4/12 px-4">
          <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
          >
            <div class="rounded-t mb-0 px-6 py-6">
              <div class="text-center mb-3">
                <h6 class="text-blueGray-500 text-sm font-bold">
                  Sign in with
                </h6>
              </div>
              <div class="btn-wrapper text-center">
                <button
                  class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                  type="button"
                >
                  <img alt="..." class="w-5 mr-1" :src="github" />
                  Github
                </button>
                <button
                  class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                  type="button"
                >
                  <img alt="..." class="w-5 mr-1" :src="google" />
                  Google
                </button>
              </div>
              <hr class="mt-6 border-b-1 border-blueGray-300" />
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
              <div class="text-blueGray-400 text-center mb-3 font-bold">
                <small>Or sign in with credentials</small>
              </div>
              <form @submit.prevent="submit">
                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Email
                  </label>
                  <input
                    v-model="form.email"
                    type="email"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Email"
                    required
                    autofocus
                  />
                </div>

                <div class="relative w-full mb-3">
                  <label
                    class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                    htmlFor="grid-password"
                  >
                    Password
                  </label>
                  <input
                    v-model="form.password"
                    type="password"
                    class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                    placeholder="Password"
                    required
                  />
                </div>
                <div>
                  <label class="inline-flex items-center cursor-pointer">
                    <input
                      id="customCheckLogin"
                      v-model="form.remember"
                      type="checkbox"
                      class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                    />
                    <span class="ml-2 text-sm font-semibold text-blueGray-600">
                      Remember me
                    </span>
                  </label>
                </div>

                <div class="text-center mt-6">
                  <button
                    class=" text-white bg-[#7d836d] hover:bg-[#7d836d] active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    type="submit"
                  >
                    Sign In
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-wrap mt-6 relative">
            <div class="w-1/2">
              <a href="javascript:void(0)" class="text-blueGray-200">
                <small>Forgot password?</small>
              </a>
            </div>
            <div class="w-1/2 text-right">
              <router-link to="/auth/register" class="text-blueGray-200">
                <small>Create new account</small>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import github from "../../assets/github.svg";
  import google from "../../assets/google.svg";
  import background from "../../assets/register_bg_2.png";
  import { useForm } from '@inertiajs/vue3';

  const form = useForm({
    email: '',
    password: '',
    remember: false,
  });

  const submit = () => {
    form.post(route('admin.login.post'), {
      onFinish: () => form.reset('password'),
    });
  };
  </script>
