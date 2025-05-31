<template>
  <section class="text-center py-16 bg-white">
    <h2 class="text-4xl font-bold text-[#171717] mb-12">¿Qué hemos logrado?</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 px-4 max-w-6xl mx-auto">
      <!-- Item 1 -->
      <div
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
        class="flex items-center gap-6 justify-center px-4 py-6"
      >
        <i class="pi pi-dollar text-[96px] text-[#FF4929] drop-shadow-md leading-none"></i>
        <div class="text-left">
          <p class="text-3xl font-extrabold text-[#171717] whitespace-nowrap">+ $ 160M</p>
          <p class="text-lg text-[#171717] font-semibold whitespace-nowrap">Millones prestados</p>
        </div>
      </div>

      <!-- Item 2 -->
      <div
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
        class="flex items-center gap-6 justify-center px-4 py-6 border-l-4 border-dotted border-[#EDEAE4]"
      >
        <i class="pi pi-users text-[96px] text-[#FF4929] drop-shadow-md leading-none"></i>
        <div class="text-left">
          <p class="text-3xl font-extrabold text-[#171717] whitespace-nowrap">+ 1300</p>
          <p class="text-lg text-[#171717] font-semibold whitespace-nowrap">Clientes atendidos</p>
        </div>
      </div>

      <!-- Item 3 -->
      <div
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
        class="flex items-center gap-6 justify-center px-4 py-6 border-l-4 border-dotted border-[#EDEAE4]"
      >
        <i class="pi pi-file text-[96px] text-[#FF4929] drop-shadow-md leading-none"></i>
        <div class="text-left">
          <p class="text-3xl font-extrabold text-[#171717] whitespace-nowrap">+ 15K</p>
          <p class="text-lg text-[#171717] font-semibold whitespace-nowrap">Facturas descontadas</p>
        </div>
      </div>

      <!-- Item 4 -->
      <div
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
        class="flex items-center gap-6 justify-center px-4 py-6 border-l-4 border-dotted border-[#EDEAE4]"
      >
        <i class="pi pi-wallet text-[96px] text-[#FF4929] drop-shadow-md leading-none"></i>
        <div class="text-left">
          <p class="text-3xl font-extrabold text-[#171717] whitespace-nowrap">+ $ 110</p>
          <p class="text-lg text-[#171717] font-semibold whitespace-nowrap">Millones en hipotecas</p>
        </div>
      </div>
    </div>

    <!-- Registro SBS -->
    <div
      v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
      class="mt-16 flex items-center justify-center gap-4"
    >
      <p class="text-xl font-extrabold text-[#171717]">Registrados en la:</p>
      <img src="customers/superintentencia-SBS.svg" alt="SBS Logo" class="h-20" />
    </div>
  </section>
</template>

<script setup lang="ts">
// No necesitas lógica por ahora
</script>
