<template>
  <div class="max-w-7xl mx-auto h-full flex items-center">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full">

      <!-- Tarjeta: Inversiones -->
      <div v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-l-8 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
        class="relative rounded-2xl shadow-xl transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-1 border border-white/20 overflow-hidden max-w-xs">
        <div class="bg-transparent p-4">
          <img src="customers/Ojo.png" alt="" class="opacity-70 w-16 mx-auto transition-transform duration-300 hover:scale-105">
        </div>
        <div class="bg-white p-4 pt-0 rounded-t-none">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-semibold text-black">Inversiones</h3>
          </div>
          <div class="space-y-2">
            <p class="text-xs text-black/80">
              Diversifica tu portafolio con facturas por cobrar en soles y dólares, con una rentabilidad anual de hasta 26%. Ideal para inversionistas que buscan seguridad y retorno.
            </p>
          </div>
          <div class="border-t border-black/10 mt-4">
            <button class="w-full bg-[#FF4929] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-[#e04024] transition">
              Conoce más
            </button>
          </div>
        </div>
      </div>

      <!-- Tarjeta: Factoring -->
      <div v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
        class="relative rounded-2xl shadow-xl transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-1 border border-white/20 overflow-hidden max-w-xs">
        <div class="bg-transparent p-4">
          <img src="customers/F3.png" alt="" class="opacity-70 w-16 mx-auto transition-transform duration-300 hover:scale-105">
        </div>
        <div class="bg-white p-4 pt-0 rounded-t-none">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-semibold text-black">Factoring</h3>
          </div>
          <div class="space-y-2">
            <p class="text-xs text-black/80">
              Obtén liquidez inmediata sin endeudarte. Con Zuma, adelanta el cobro de tus facturas con rapidez, sin trámites engorrosos y a tasas competitivas.
            </p>
          </div>
          <div class="border-t border-black/10 mt-4">
            <button class="w-full bg-[#FF4929] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-[#e04024] transition">
              Conoce más
            </button>
          </div>
        </div>
      </div>

      <!-- Tarjeta: Confirming -->
      <div v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-l-8 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
        class="relative rounded-2xl shadow-xl transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-1 border border-white/20 overflow-hidden max-w-xs">
        <div class="bg-transparent p-4">
          <img src="customers/F4.png" alt="" class="opacity-70 w-16 mx-auto transition-transform duration-300 hover:scale-105">
        </div>
        <div class="bg-white p-4 pt-0 rounded-t-none">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-semibold text-black">Confirming</h3>
          </div>
          <div class="space-y-2">
            <p class="text-xs text-black/80">
              Optimiza tu cadena de pagos. Nosotros financiamos a tus proveedores para que puedas mantener tu liquidez sin comprometer relaciones comerciales.
            </p>
          </div>
          <div class="border-t border-black/10 mt-4">
            <button class="w-full bg-[#FF4929] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-[#e04024] transition">
              Conoce más
            </button>
          </div>
        </div>
      </div>

      <!-- Tarjeta: Cobranza Libre -->
      <div v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
        class="relative rounded-2xl shadow-xl transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-1 border border-white/20 overflow-hidden max-w-xs">
        <div class="bg-transparent p-4">
          <img src="customers/F5.png" alt="" class="opacity-70 w-16 mx-auto transition-transform duration-300 hover:scale-105">
        <br>
        </div>
        <div class="bg-white p-4 pt-0 rounded-t-none">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-semibold text-black">Cobranza Libre</h3>
          </div>
          <div class="space-y-2">
            <p class="text-xs text-black/80">
              Gestiona eficientemente tus cuentas por cobrar. Reduce la morosidad con nuestro sistema automatizado y enfócate en crecer.
            </p>
          </div>
          <div class="border-t border-black/10 mt-4">
            <button class="w-full bg-[#FF4929] text-white px-3 py-1.5 rounded-lg text-xs font-semibold hover:bg-[#e04024] transition">
              Conoce más
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>
