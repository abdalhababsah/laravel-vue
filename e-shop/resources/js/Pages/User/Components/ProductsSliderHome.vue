<template>
  <div class="container mx-auto px-4 sm:px-2 md:px-10 lg:px-15 xl:px-10">

 <div class="container relative hidden px-6 py-12 mx-auto my-20 md:block">
      <div class="absolute right-0 z-0  hidden lg:block">
              <div style="height: 238px !important;"
                    class=" bg-[#7d836d] w-96 relative z-10 mb-4 flex items-center justify-center overflow-hidden  px-6 py-12 sm:mb-8 sm:h-[160px] sm:p-5 lg:mb-4 xl:mb-8">

                    <div>
                      <span class="absolute top-0 left-0 -z-10">
                        <svg width="106" height="144" viewBox="0 0 106 144" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <rect opacity="0.1" x="-67" y="47.127" width="113.378" height="131.304"
                            transform="rotate(-42.8643 -67 47.127)" fill="url(#paint0_linear_1416_214)" />
                          <defs>
                            <linearGradient id="paint0_linear_1416_214" x1="-10.3111" y1="47.127" x2="-10.3111"
                              y2="178.431" gradientUnits="userSpaceOnUse">
                              <stop stop-color="white" />
                              <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                      <span class="absolute top-0 right-0 -z-10">
                        <svg width="130" height="97" viewBox="0 0 130 97" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <rect opacity="0.1" x="0.86792" y="-6.67725" width="155.563" height="140.614"
                            transform="rotate(-42.8643 0.86792 -6.67725)" fill="url(#paint0_linear_1416_215)" />
                          <defs>
                            <linearGradient id="paint0_linear_1416_215" x1="78.6495" y1="-6.67725" x2="78.6495"
                              y2="133.937" gradientUnits="userSpaceOnUse">
                              <stop stop-color="white" />
                              <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                      <span class="absolute bottom-0 right-0 -z-10">
                        <svg width="175" height="104" viewBox="0 0 175 104" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <rect opacity="0.1" x="175.011" y="108.611" width="101.246" height="148.179"
                            transform="rotate(137.136 175.011 108.611)" fill="url(#paint0_linear_1416_216)" />
                          <defs>
                            <linearGradient id="paint0_linear_1416_216" x1="225.634" y1="108.611" x2="225.634"
                              y2="256.79" gradientUnits="userSpaceOnUse">
                              <stop stop-color="white" />
                              <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                          </defs>
                        </svg>
                      </span>
                    </div>
                  </div>
      </div>
      <div tabindex="0" aria-label="carousel" class="focus:outline-none lg:pt-20">
        <div class="flex flex-col-reverse items-center justify-between lg:flex-row">
          <div class="z-20 flex flex-col lg:w-1/2">
            <div tabindex="0"
              class="hidden text-4xl leading-normal tracking-wide text-[#b0956e] focus:outline-none f-f-d-s lg:text-5xl lg:block dark:text-white">
              Trending
              <br />
              Products
            </div>
            <div class="flex justify-start w-full">
              <div class="flex justify-between w-full lg:pt-20 lg:pt-10 lg:justify-start">
                <button aria-label="slide backward"
                  class="px-6 py-3 mr-8 border dark:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black lg:py-5 border-black-color focus:outline-none"
                  id="prev">
                  <img
                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/right-aligned-3-placeholders-with-sliders-svg1.svg"
                    alt="left arrow" />
                </button>
                <button aria-label="slide forward"
                  class="px-6 py-5 border dark:bg-gray-300 focus:ring-2 focus:ring-offset-2 focus:ring-black border-black-color focus:outline-none"
                  id="next">
                  <img
                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/right-aligned-3-placeholders-with-sliders-svg2.svg"
                    alt="right arrow" />
                </button>
              </div>
            </div>
          </div>
          <div class="slider lg:relative lg:w-1/3">
            <div
            class="block text-4xl leading-normal tracking-wide text-[#b0956e] focus:outline-none f-f-d-s lg:text-5xl lg:hidden dark:text-white">
              Trending Products</div>

            <div class="slide-ana lg:relative">
              <div class="relative flex items-center justify-end lg:w-3/5">
                <div aria-label="slide 1" tabindex="0" class="z-20 w-full focus:outline-none lg:ml-12 lg:w-64">
                  <div>
                    <img src="https://i.pinimg.com/736x/ff/4e/9a/ff4e9a0ad421be82091aae20705207d6.jpg" alt="study lamp"
                      tabindex="0" class="w-56 focus:outline-none h-72" />
                  </div>
                  <div tabindex="0"
                    class="py-4 text-2xl font-medium text-center text-[#b0956e] focus:outline-none dark:text-white f-f-l">
                    Study lamp</div>
                  <div tabindex="0"
                    class="flex justify-center text-base text-4xl text-gray-700 focus:outline-none f-f-l dark:text-gray-200">
                    $ 45</div>
                </div>
                <div aria-label="slide 2" tabindex="0" class="z-20 w-full ml-12 focus:outline-none lg:w-64">
                  <div>
                    <img src="https://i.pinimg.com/564x/b4/4e/73/b44e73c705e2e3620b1a7d968a112b66.jpg" alt="flower"
                      tabindex="0" class="focus:outline-none 56 h-72" />
                  </div>
                  <div tabindex="0"
                    class="py-4 text-2xl font-medium text-center text-[#b0956e] focus:outline-none dark:text-white f-f-l">
                    Study lamp</div>
                  <div tabindex="0"
                    class="flex justify-center text-base text-4xl text-gray-700 focus:outline-none f-f-l dark:text-gray-200">
                    $ 45</div>
                </div>
                <div aria-label="slide 3" tabindex="0" class="z-20 w-full ml-12 focus:outline-none lg:w-64">
                  <div>
                    <img src="https://i.pinimg.com/564x/8e/03/39/8e0339223c12faf01162f3afa0f24d85.jpg" alt="chair"
                      tabindex="0" class="focus:outline-none 56 h-72" />
                  </div>
                  <div tabindex="0"
                    class="py-4 text-2xl font-medium text-center text-[#b0956e] focus:outline-none dark:text-white f-f-l">
                    Study lamp</div>
                  <div tabindex="0"
                    class="flex justify-center text-base text-4xl text-gray-700 focus:outline-none f-f-l dark:text-gray-200">
                    $ 45</div>
                </div>
              </div>
              <div style="transform: translateX(100%)" class="relative flex items-center justify-end lg:w-3/5">
                <div aria-label="slide 4" tabindex="0" class="z-20 w-full focus:outline-none lg:ml-12 lg:w-64">
                  <div>
                    <img src="https://i.pinimg.com/736x/48/a8/06/48a80633097452cac280a007b49a4b50.jpg" alt="study lamp"
                      tabindex="0" class="focus:outline-none 56 h-72" />
                  </div>
                  <div tabindex="0"
                    class="py-4 text-2xl font-medium text-center text-[#b0956e] focus:outline-none dark:text-white f-f-l">
                    Study lamp</div>
                  <div tabindex="0"
                    class="flex justify-center text-base text-4xl text-gray-700 focus:outline-none f-f-l dark:text-gray-200">
                    $ 45</div>
                </div>
                <div aria-label="slide 5" tabindex="0" class="z-20 w-full ml-12 focus:outline-none lg:w-64">
                  <div>
                    <img src="https://i.pinimg.com/736x/e2/cd/9a/e2cd9a8fe92095f95dfe5ae2c2816de3.jpg" alt="flower"
                      tabindex="0" class="focus:outline-none 56 h-72" />
                  </div>
                  <div tabindex="0"
                    class="py-4 text-4xl font-medium text-center text-[#b0956e] focus:outline-none dark:text-white f-f-l">
                    Study lamp</div>
                  <div tabindex="0"
                    class="flex justify-center text-base text-4xl text-gray-700 focus:outline-none f-f-l dark:text-gray-200">
                    $ 45</div>
                </div>
                <div tabindex="0" aria-label="slide 6"
                  class="z-20 w-full ml-12 bg-white shadow-md cursor-pointer py-36 focus:outline-none lg:w-64 h-96">

                  <div tabindex="0"
                    class="p-6 text-4xl font-medium text-center text-[#06402b] focus:outline-none dark:text-white f-f-l ">
                    show
                    more </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Desktop Slider -->
    <!-- Mobile responsive -->
    <div class="container relative block px-4 py-12 mx-auto lg:px-0 md:hidden">
      <div class="absolute right-0 z-0 flex hidden lg:block">
        <div class="h-64 bg-indigo-700 w-96"></div>
      </div>
      <div class="lg:pt-20">
        <div class="flex flex-col-reverse items-center justify-between lg:flex-row">
          <div class="z-20 flex flex-col ">
            <div
              class="hidden text-xl leading-normal tracking-wide text-center text-[#b0956e] f-f-d-s lg:text-5xl lg:block dark:text-white">
              Trending
              <br />
              Products
            </div>
            <div class="flex justify-start w-full mt-5">
              <div class="flex justify-between w-full lg:pt-20 lg:pt-10 lg:justify-start">
                <button aria-label="slide backward"
                  class="px-6 py-3 mr-8 border lg:py-5 border-black-color focus:outline-none" id="prev2">
                  <img
                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/right-aligned-3-placeholders-with-sliders-svg1.svg"
                    alt="left arrow" />
                </button>
                <button aria-label="slide forward" class="px-6 py-5 border border-black-color focus:outline-none"
                  id="next2">
                  <img
                    src="https://tuk-cdn.s3.amazonaws.com/can-uploader/right-aligned-3-placeholders-with-sliders-svg2.svg"
                    alt="right arrow" />
                </button>
              </div>
            </div>
          </div>
          <div class="slider2">
            <div
              class="block text-4xl leading-normal tracking-wide text-[#b0956e]  f-f-d-s lg:text-5xl lg:hidden dark:text-white">
              Trending Products</div>

            <div class="mt-20 slide-ana2">
              <div class="w-28">
                <div>
                  <img src="https://i.pinimg.com/564x/28/3a/5a/283a5afe054427d0b572263d4738a769.jpg" alt=""
                    class="mx-auto" />
                </div>
                <div
                  class="flex justify-center py-4 text-base font-bold text-[#b0956e] dark:text-white lg:text-2xl f-f-l">
                  Study lamp</div>
                <div class="flex justify-center text-base text-2xl text-gray-700 lg:text-sm f-f-l dark:text-gray-200">$
                  45
                </div>
              </div>

              <div class="w-28">
                <div>
                  <img src="https://i.pinimg.com/564x/b4/4e/73/b44e73c705e2e3620b1a7d968a112b66.jpg" alt=""
                    class="mx-auto" />
                </div>
                <div
                  class="flex justify-center py-4 text-base font-bold text-[#b0956e] dark:text-white lg:text-2xl f-f-l">
                  Study lamp</div>
                <div class="flex justify-center text-base text-2xl text-gray-700 lg:text-sm f-f-l dark:text-gray-200">$
                  45
                </div>
              </div>
              <div class="w-28">
                <div>
                  <img src="https://i.pinimg.com/564x/8e/03/39/8e0339223c12faf01162f3afa0f24d85.jpg" alt=""
                    class="mx-auto" />
                </div>
                <div
                  class="flex justify-center py-4 text-base font-bold text-[#b0956e] dark:text-white lg:text-2xl f-f-l">
                  Study lamp</div>
                <div class="flex justify-center text-base text-2xl text-gray-700 lg:text-sm f-f-l dark:text-gray-200">$
                  45
                </div>
              </div>
              <div class="p-48 px-20 shadow-md cursor-pointer w-28 shadow-black">

                <div
                  class="flex justify-center p-10 py-4 text-4xl font-bold text-gray-900 shadow-sm dark:text-white lg:text-2xl f-f-l">
                  Show More</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Mobile responsive -->
    <!-- Mobile responsive -->
    <!-- slider ends here -->
</template>

<script>
export default {
  created () {
  },
    data() {
        return {
            products: [
                {
                    name: "Study Lamp",
                    image: "https://cdn.tuk.dev/assets/templates/Fabterior/section3(1).png",
                    price: "45",
                },
                {
                    name: "Flower Pot",
                    image: "https://cdn.tuk.dev/assets/templates/Fabterior/section3(2).png",
                    price: "45",
                },
                {
                    name: "Grey Chair",
                    image: "https://cdn.tuk.dev/assets/templates/Fabterior/section3(3).png",
                    price: "45",
                },
            ],
        };
    },
    mounted() {
    // Slider Mobile
    let slides2 = document.querySelectorAll(".slide-ana2>div");
    let slideSayisi2 = slides2.length;
    let prev2 = document.getElementById("prev2");
    let next2 = document.getElementById("next2");

    let loop2 = 0;

    // Initialize slides position for mobile
    slides2.forEach((slide, index) => {
        slide.style.transform = `translateX(${100 * index}%)`;
    });

    function goNext2() {
        loop2++;
        slides2.forEach((slide, index) => {
            slide.style.transform = `translateX(${100 * (index - loop2 % slideSayisi2)}%)`;
        });
    }

    function goPrev2() {
        loop2--;
        slides2.forEach((slide, index) => {
            slide.style.transform = `translateX(${100 * (index - loop2 % slideSayisi2)}%)`;
        });
    }

    next2.addEventListener("click", goNext2);
    prev2.addEventListener("click", goPrev2);

    // Slider Desktop
    let slides = document.querySelectorAll(".slide-ana>div");
    let slideSayisi = slides.length;
    let prev = document.getElementById("prev");
    let next = document.getElementById("next");

    let loop = 0;

    // Initialize slides position for desktop
    slides.forEach((slide, index) => {
        slide.style.transform = `translateX(${100 * index}%)`;
    });

    function goNext() {
        loop++;
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(${100 * (index - loop % slideSayisi)}%)`;
        });
    }

    function goPrev() {
        loop--;
        slides.forEach((slide, index) => {
            slide.style.transform = `translateX(${100 * (index - loop % slideSayisi)}%)`;
        });
    }

    next.addEventListener("click", goNext);
    prev.addEventListener("click", goPrev);
},

};
</script>

<style scoped>
.custom-design {
    width: 30.313rem;
    height: 250px;
}
/* Slider css below */

.slider {
    width: 100%;
    height: 428px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}
.slider2 {
    width: 100%;
    height: 650px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
}

.slide-ana,
.slide-ana2 {
    height: 100%;
}

.slide-ana > div,
.slide-ana2 > div {
    width: 100%;
    height: 100%;
    position: absolute;
    transition: all 1s;
}

@media (min-width: 300px) and (max-width: 1023px) {
    .slider {
        height: 450px;
    }
}
@media (min-width: 300px) and (max-width: 1023px) {
    .slider2 {
        height: 650px;
    }
}
</style>
