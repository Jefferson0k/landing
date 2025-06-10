<template>
  <div id="hero" class="flex flex-col items-center px-6 lg:px-20 py-12 space-y-12" style="background-color: #EDEAE4;">

    <!-- HERO PRINCIPAL -->
    <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-7xl">

      <!-- Texto -->
      <div class="md:w-1/2 mb-10 md:mb-0">
        <h1 class="text-5xl md:text-6xl font-light text-black leading-tight">
          Financia tus sueños<br />
          con <span class="font-bold text-black">zuma</span>
        </h1>

        <!-- Lista separada visualmente -->
        <ul class="mt-10 space-y-3 text-xl text-black">
          <li class="flex items-center gap-3">
            <i class="pi pi-check text-xl text-black"></i>
            <span>Lorem ipsum dolor sit</span>
          </li>
          <li class="flex items-center gap-3">
            <i class="pi pi-check text-xl text-black"></i>
            <span>Lorem ipsum dolor sit</span>
          </li>
        </ul>
      </div>
      <div class="md:w-1/2 flex justify-center md:justify-end">
        <div class="bg-white rounded-full p-6 shadow-lg overflow-hidden">
          <img src="/imagenes/landing/SINFONDO.png" alt="Hero Image" class=" md:w-96 " />
        </div>
      </div>
    </div>

    <!-- LÍNEA DIVISORIA -->
    <div class="w-full border-t border-gray-300"></div>

    <!-- BOTONES DE INVERSIÓN -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-6">

      <!-- Botón 1 -->
      <div
        class="w-72 h-24 bg-white hover:bg-[#6790FF] hover:text-white transition-colors duration-300 rounded-full flex items-center gap-4 shadow-md cursor-pointer px-6">
        <img src="/imagenes/landing/Recurso 5.svg" alt="Factoring" class="w-14 h-14" />
        <span class="text-black hover:text-white text-sm font-medium leading-tight">
          Invierte en<br />factoring
        </span>
      </div>

      <!-- Botón 2 -->
      <div
        class="w-72 h-24 bg-white hover:bg-[#6790FF] hover:text-white transition-colors duration-300 rounded-full flex items-center gap-4 shadow-md cursor-pointer px-6">
        <img src="/imagenes/landing/Recurso 2.svg" alt="Hipotecarios" class="w-14 h-14" />
        <span class="text-black hover:text-white text-sm font-medium leading-tight">
          Invierte en<br />Préstamos<br />Hipotecarios
        </span>
      </div>

      <!-- Botón 3 -->
      <div
        class="w-72 h-24 bg-white hover:bg-[#6790FF] hover:text-white transition-colors duration-300 rounded-full flex items-center gap-4 shadow-md cursor-pointer px-6">
        <img src="/imagenes/landing/Recurso 4.svg" alt="Tasas Fijas" class="w-14 h-14" />
        <span class="text-black hover:text-white text-sm font-medium leading-tight">
          Invierte en<br />Tasas Fijas
        </span>
      </div>

    </div>
  </div>
</template>
