<template>
  <section class="flex flex-col lg:flex-row items-center justify-between gap-10 py-20 px-6 lg:px-20 bg-[#EDEAE4]">
    <div class="relative w-full">
      <div class="relative z-10 max-w-7xl mx-auto py-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          <div class="lg:col-span-7 text-center lg:text-left">
            <div class="mb-12">
              <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-4 leading-tight">
                Tu
                <span class="text-blue-600 relative">
                  Zuma,
                  <div class="absolute -bottom-2 left-0 w-full h-1 bg-blue-600 rounded-full opacity-30"></div>
                </span>
                nosotros protegemos tu dinero
              </h1>
              <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-800 mb-6">
                Financia tus sueños
              </h2>
            </div>
          </div>
          <div class="lg:col-span-5 flex justify-center lg:justify-end relative">
            <div class="relative w-full max-w-xs mt-[-40px]">
              <div
                class="relative bg-[#FF4929] rounded-3xl shadow-2xl p-8 transform rotate-[6deg] hover:rotate-0 transition-all duration-500 hover:shadow-3xl">
                <div class="flex justify-between items-center mb-4">
                  <h1 class="text-base font-semibold text-gray-800">Invierte de forma efectiva y segura</h1>
                </div>
                <div class="space-y-4">
                  <img src="customers/SINFONDO.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
                    <CustomesWidget />

      </div>
    </div>
  </section>
</template>

<script setup>
import CustomesWidget from './CustomesWidget.vue'
</script>

<style scoped>
@keyframes float {

  0%,
  100% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(-10px);
  }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

.shadow-3xl {
  box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}

.group:hover .group-hover\:scale-110 {
  transform: scale(1.1);
}

@media (max-width: 1024px) {
  .transform.rotate-3 {
    transform: rotate(0deg);
  }
}
</style>
