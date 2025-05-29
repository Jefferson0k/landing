<template>
  <div id="features" class="py-6 px-6 lg:px-20 mt-8 mx-0 lg:mx-20">
    <div class="grid grid-cols-12 md:grid-cols-2 gap-8 justify-center">
      
      <div class="col-span-12 text-center mt-20 mb-6 md:col-span-2">
        <h2 class="text-surface-900 dark:text-surface-0 font-normal mb-2 text-4xl">
          Conoce más Sobre Nosotros
        </h2>
        <p class="text-muted-color text-2xl max-w-3xl mx-auto">
          Placerat in egestas erat... Aquí te presentamos nuestros servicios principales para ayudarte a crecer y optimizar tu negocio.
        </p>
      </div>

      <!-- Card Inversiones -->
      <div
        class="col-span-12 md:col-span-1 p-0 pr-4 pb-8 mt-6 md:mt-0"
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-20 animate-duration-1000' }"
      >
        <div
          style="height: 240px; padding: 2px; border-radius: 10px; background: linear-gradient(90deg, rgba(253, 228, 165, 0.2), rgba(187, 199, 205, 0.2)), linear-gradient(180deg, rgba(253, 228, 165, 0.2), rgba(187, 199, 205, 0.2))"
        >
          <div class="p-4 bg-surface-0 dark:bg-surface-900 h-full flex flex-col justify-between" style="border-radius: 8px">
            <div>
              <div
                class="flex items-center justify-center bg-yellow-200 mb-4"
                style="width: 3.5rem; height: 3.5rem; border-radius: 10px"
              >
                <i class="pi pi-fw pi-users !text-2xl text-yellow-700"></i>
              </div>
              <h5 class="mb-2 text-surface-900 dark:text-surface-0 text-xl font-semibold">Inversiones</h5>
              <p class="text-surface-600 dark:text-surface-200 text-sm">
                Impulsamos tu capital para lograr rendimientos seguros y sostenibles en el tiempo.
              </p>
            </div>
            <button class="mt-4 bg-yellow-600 text-white py-2 px-4 rounded hover:bg-yellow-700 transition">
              Conocer más
            </button>
          </div>
        </div>
      </div>

      <!-- Card Factoring -->
      <div
        class="col-span-12 md:col-span-1 p-0 pl-4 pb-8 mt-6 md:mt-0"
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-b-20 animate-duration-1000' }"
      >
        <div
          style="height: 240px; padding: 2px; border-radius: 10px; background: linear-gradient(90deg, rgba(145, 226, 237, 0.2), rgba(251, 199, 145, 0.2)), linear-gradient(180deg, rgba(253, 228, 165, 0.2), rgba(172, 180, 223, 0.2))"
        >
          <div class="p-4 bg-surface-0 dark:bg-surface-900 h-full flex flex-col justify-between" style="border-radius: 8px">
            <div>
              <div
                class="flex items-center justify-center bg-cyan-200 mb-4"
                style="width: 3.5rem; height: 3.5rem; border-radius: 10px"
              >
                <i class="pi pi-fw pi-palette !text-2xl text-cyan-700"></i>
              </div>
              <h5 class="mb-2 text-surface-900 dark:text-surface-0 text-xl font-semibold">Factoring</h5>
              <p class="text-surface-600 dark:text-surface-200 text-sm">
                Financiamiento ágil basado en facturas para mejorar tu flujo de caja sin endeudamiento.
              </p>
            </div>
            <button class="mt-4 bg-cyan-600 text-white py-2 px-4 rounded hover:bg-cyan-700 transition">
              Conocer más
            </button>
          </div>
        </div>
      </div>

      <!-- Card Confirming -->
      <div
        class="col-span-12 md:col-span-1 p-0 pr-4 pb-8 mt-6 md:mt-0"
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 zoom-in-50 animate-duration-1000' }"
      >
        <div
          style="height: 240px; padding: 2px; border-radius: 10px; background: linear-gradient(90deg, rgba(145, 226, 237, 0.2), rgba(172, 180, 223, 0.2)), linear-gradient(180deg, rgba(172, 180, 223, 0.2), rgba(246, 158, 188, 0.2))"
        >
          <div class="p-4 bg-surface-0 dark:bg-surface-900 h-full flex flex-col justify-between" style="border-radius: 8px">
            <div>
              <div
                class="flex items-center justify-center bg-indigo-200 mb-4"
                style="width: 3.5rem; height: 3.5rem; border-radius: 10px"
              >
                <i class="pi pi-fw pi-map !text-2xl text-indigo-700"></i>
              </div>
              <h5 class="mb-2 text-surface-900 dark:text-surface-0 text-xl font-semibold">Confirming</h5>
              <p class="text-surface-600 dark:text-surface-200 text-sm">
                Servicio de pago anticipado a proveedores para optimizar tu cadena de suministro.
              </p>
            </div>
            <button class="mt-4 bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition">
              Conocer más
            </button>
          </div>
        </div>
      </div>

      <!-- Card Cobranza Libre -->
      <div
        class="col-span-12 md:col-span-1 p-0 pl-4 pb-8 mt-6 md:mt-0"
        v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-t-16 animate-duration-1000' }"
      >
        <div
          style="height: 240px; padding: 2px; border-radius: 10px; background: linear-gradient(90deg, rgba(187, 199, 205, 0.2), rgba(251, 199, 145, 0.2)), linear-gradient(180deg, rgba(253, 228, 165, 0.2), rgba(145, 210, 204, 0.2))"
        >
          <div class="p-4 bg-surface-0 dark:bg-surface-900 h-full flex flex-col justify-between" style="border-radius: 8px">
            <div>
              <div
                class="flex items-center justify-center bg-slate-200 mb-4"
                style="width: 3.5rem; height: 3.5rem; border-radius: 10px"
              >
                <i class="pi pi-fw pi-id-card !text-2xl text-slate-700"></i>
              </div>
              <h5 class="mb-2 text-surface-900 dark:text-surface-0 text-xl font-semibold">Cobranza Libre</h5>
              <p class="text-surface-600 dark:text-surface-200 text-sm">
                Gestión flexible y eficiente de cobros para maximizar tu recuperación de cartera.
              </p>
            </div>
            <button class="mt-4 bg-slate-600 text-white py-2 px-4 rounded hover:bg-slate-700 transition">
              Conocer más
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">
import AnimateOnScroll from 'primevue/animateonscroll';
</script>
