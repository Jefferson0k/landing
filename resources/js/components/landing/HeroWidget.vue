<template>
  <div id="hero" class="flex flex-col items-center px-6 lg:px-20 py-12 space-y-12" style="background-color: #EDEAE4;">
    <!-- HERO PRINCIPAL -->
    <div class="flex flex-col md:flex-row items-center justify-between w-full max-w-7xl" data-aos="fade-up"
      data-aos-duration="1000">
      <!-- Texto -->
      <div class="md:w-1/2 mb-10 md:mb-0" data-aos="fade-right" data-aos-delay="200">
        <h1 class="text-5xl md:text-6xl font-light text-black leading-tight">
          Financia tus sueños<br />
          con <span class="font-bold text-black">zuma</span>
        </h1>
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

      <!-- Imagen -->
      <div class="md:w-1/2 flex justify-center md:justify-end" data-aos="zoom-in" data-aos-delay="400">
        <div class="bg-white rounded-full p-6 shadow-lg overflow-hidden">
          <img src="/imagenes/landing/SINFONDO.png" alt="Hero Image" class="md:w-96" />
        </div>
      </div>
    </div>

    <!-- Línea divisoria -->
    <div class="w-full border-t border-gray-300" data-aos="fade-in" data-aos-delay="600"></div>

    <!-- BOTONES DE INVERSIÓN -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-6" data-aos="fade-up" data-aos-delay="800">

      <!-- Botón 1 -->
      <a href="https://fondeo.apros.global/iniciar-sesion?redirect=%2F" target="_blank" rel="noopener noreferrer">
        <div
          class="w-96 h-28 bg-white hover:bg-[#6790FF] hover:text-white transition-all duration-300 rounded-full flex items-center gap-6 shadow-md cursor-pointer px-8 hover:scale-110 group">
          <div
            class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-white group-hover:scale-110">
            <img src="/imagenes/landing/Recurso 5.svg" alt="Factoring" class="w-10 h-10" />
          </div>
          <span class="text-black group-hover:text-white text-2xl font-semibold leading-tight">
            Facturas<br />
          </span>
        </div>
      </a>

      <!-- Botón 2 -->
      <a href="https://hipotecas-main-ctqfss.laravel.cloud/login" target="_blank" rel="noopener noreferrer"
        data-aos="fade-up" data-aos-delay="1000">
        <div
          class="w-96 h-28 bg-white hover:bg-[#6790FF] hover:text-white transition-all duration-300 rounded-full flex items-center gap-6 shadow-md cursor-pointer px-8 hover:scale-110 group">
          <div
            class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-white group-hover:scale-110">
            <img src="/imagenes/landing/Recurso 2.svg" alt="Hipotecarios" class="w-10 h-10" />
          </div>
          <span class="text-black group-hover:text-white text-2xl font-semibold leading-tight">
            Prestamos<br />con Garantia<br />
          </span>
        </div>
      </a>

      <!-- Botón 3 -->
      <a href="https://landing-main-p1nnxs.laravel.cloud/login" target="_blank" rel="noopener noreferrer"
        data-aos="fade-up" data-aos-delay="1200">
        <div
          class="w-96 h-28 bg-white hover:bg-[#6790FF] hover:text-white transition-all duration-300 rounded-full flex items-center gap-6 shadow-md cursor-pointer px-8 hover:scale-110 group">
          <div
            class="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center transition-all duration-300 group-hover:bg-white group-hover:scale-110">
            <img src="/imagenes/landing/Recurso 4.svg" alt="Tasas Fijas" class="w-10 h-10" />
          </div>
          <span class="text-black group-hover:text-white text-2xl font-semibold leading-tight">
            Depositos <br /> a plazo
          </span>
        </div>
      </a>
    </div>
  </div>
</template>
