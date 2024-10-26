<template>
    <div class="space-y-4">
      <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Your name<span class="text-red-500">*</span>
          </label>
          <input type="text" id="your_name"
            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Bonnie Green" required />
        </div>

        <div>
          <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Your email<span class="text-red-500">*</span>
          </label>
          <input type="email" id="your_email"
            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="name@flowbite.com" required />
        </div>

        <div>
          <label for="address1" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Address One <span class="text-red-500">*</span>
          </label>
          <input type="text" id="address1"
            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Your address" required />
        </div>

        <div>
          <label for="address2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Address Two (<span class="text-blue-500">optional</span>)
          </label>
          <input type="text" id="address2"
            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
            placeholder="Your address" required />
        </div>

        <div>
          <label for="phone-input" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Phone Number <span class="text-red-500">*</span> <span v-if="errorMessage" class="text-red-500 text-sm">{{ errorMessage }}</span>
          </label>
          <div class="flex items-center">
            <div class="border-gray-300 w-1/4 bg-gray-50 p-2.5 text-sm flex items-center">
              <img src="../../../assets/flag-for-jordan-svgrepo-com.svg" alt="Jordan Flag" class="w-6 h-6 mr-2" />+962
            </div>
            <div class="relative w-3/4">
              <input type="text" id="phone-input"
                class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500"
                placeholder="779123456" required v-model="phoneNumber" @input="validatePhoneNumber"
                pattern="77[0-9]{7}|78[0-9]{7}|79[0-9]{7}" />
            </div>
          </div>
        </div>

        <div>
          <label for="zipcode" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
            Zipcode <span class="text-red-500">*</span>
          </label>
          <input type="text" id="zipcode"
            class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500"
            placeholder="Zipcode" required />
        </div>

        <div>
          <div class="mb-2 flex items-center gap-2">
            <label for="select-city-input-3" class="block text-sm font-medium text-gray-900 dark:text-white">
              City*
            </label>
          </div>
          <div class="relative w-full">
            <select id="select-city-input-3"
              class="block w-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
              <option value="" disabled selected>Select a city</option>
              <option value="amman">Amman</option>
              <option value="zarqa">Zarqa</option>
              <option value="irbid">Irbid</option>
              <option value="aqaba">Aqaba</option>
              <option value="mafraq">Mafraq</option>
              <option value="kerek">Kerek</option>
              <option value="salt">Salt</option>
              <option value="jarrash">Jarrash</option>
              <option value="madaba">Madaba</option>
              <option value="tafileh">Tafileh</option>
              <option value="abu_alanda">Abu Alanda</option>
              <!-- Add more cities as needed -->
            </select>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        phoneNumber: '',
        errorMessage: '' // New property to hold error messages
      };
    },
    methods: {
      validatePhoneNumber() {
        const phonePattern = /^(77|78|79)[0-9]{7}$/;
        if (!phonePattern.test(this.phoneNumber)) {
          this.errorMessage = 'Please enter a valid phone number starting with 77, 78, or 79 and consisting of 9 digits.';
        } else {
          this.errorMessage = ''; // Clear error message if valid
        }
      }
    }
  }
  </script>

  <style scoped>
  /* Add your styles here if needed */
  </style>
