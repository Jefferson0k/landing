<template>
  <div id="allies" class="relative py-20 px-4 lg:px-16 overflow-hidden">
    <!-- Fondo con gradiente y elementos decorativos -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/20"></div>
    <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/10 to-purple-400/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-indigo-400/10 to-cyan-400/10 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto">
      <!-- Header moderno -->
      <div class="text-center mb-16" v-animateonscroll="{ enterClass: 'animate-fade-in-up' }">
        <div class="inline-flex items-center gap-2 bg-blue-100/80 backdrop-blur-sm text-blue-700 px-4 py-2 rounded-full text-sm font-medium mb-4">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          Nuestros Aliados Estratégicos
        </div>
        <h2 class="text-4xl lg:text-5xl font-bold bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 bg-clip-text text-transparent mb-6">
          Comunidad de <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Confianza</span>
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
          Colaboramos con empresas líderes en el sector financiero para brindarte 
          soluciones integrales y de vanguardia
        </p>
      </div>

      <!-- Carrusel de aliados -->
      <div class="relative">
        <!-- Contenedor del carrusel -->
        <div class="overflow-hidden rounded-3xl">
          <div 
            class="flex transition-transform duration-700 ease-in-out"
            :style="{ transform: `translateX(-${currentSlide * slideWidth}%)` }"
            @mouseenter="pauseAutoplay"
            @mouseleave="resumeAutoplay"
          >
            <!-- Slide 1: FACTORYN y CONFIRMIN -->
            <div class="w-full flex-shrink-0 px-4">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- FACTORYN -->
                <div class="group relative bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 hover:bg-white/90">
                  <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-blue-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl mb-6 flex items-center justify-center shadow-lg group-hover:shadow-blue-500/25 group-hover:shadow-xl transition-all duration-500">
                      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                      </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-700 transition-colors duration-300">FACTORYN</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 text-base">
                      Soluciones avanzadas de factoring y descuento de documentos para optimizar tu flujo de efectivo
                    </p>
                    <div class="flex items-center justify-between">
                      <span class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                        <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        Factoring
                      </span>
                      <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- CONFIRMIN -->
                <div class="group relative bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 hover:bg-white/90">
                  <div class="absolute inset-0 bg-gradient-to-br from-green-500/5 to-green-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl mb-6 flex items-center justify-center shadow-lg group-hover:shadow-green-500/25 group-hover:shadow-xl transition-all duration-500">
                      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                      </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-700 transition-colors duration-300">CONFIRMIN</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 text-base">
                      Confirmación digital y validación inteligente de operaciones financieras en tiempo real
                    </p>
                    <div class="flex items-center justify-between">
                      <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        Confirmación
                      </span>
                      <svg class="w-5 h-5 text-gray-400 group-hover:text-green-500 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 2: SUBASTEMOS y CRÉDITO HIPOTECARIO -->
            <div class="w-full flex-shrink-0 px-4">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- SUBASTEMOS -->
                <div class="group relative bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 hover:bg-white/90">
                  <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-purple-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl mb-6 flex items-center justify-center shadow-lg group-hover:shadow-purple-500/25 group-hover:shadow-xl transition-all duration-500">
                      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                      </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-purple-700 transition-colors duration-300">SUBASTEMOS</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 text-base">
                      Plataforma innovadora de subastas digitales en activos financieros y oportunidades de inversión
                    </p>
                    <div class="flex items-center justify-between">
                      <span class="inline-flex items-center gap-2 bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold">
                        <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                        Subastas
                      </span>
                      <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-500 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- CRÉDITO HIPOTECARIO -->
                <div class="group relative bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 hover:bg-white/90">
                  <div class="absolute inset-0 bg-gradient-to-br from-orange-500/5 to-orange-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-700 rounded-2xl mb-6 flex items-center justify-center shadow-lg group-hover:shadow-orange-500/25 group-hover:shadow-xl transition-all duration-500">
                      <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                      </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-orange-700 transition-colors duration-300">CRÉDITO HIPOTECARIO</h3>
                    <p class="text-gray-600 leading-relaxed mb-6 text-base">
                      Financiamiento inteligente respaldado por bienes inmuebles con tasas competitivas
                    </p>
                    <div class="flex items-center justify-between">
                      <span class="inline-flex items-center gap-2 bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-semibold">
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                        Crédito
                      </span>
                      <svg class="w-5 h-5 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Slide 3: SUNAT (centrado) -->
            <div class="w-full flex-shrink-0 px-4">
              <div class="flex justify-center">
                <div class="w-full max-w-md">
                  <div class="group relative bg-white/70 backdrop-blur-sm rounded-3xl p-8 border border-white/20 shadow-xl hover:shadow-2xl transition-all duration-500 hover:scale-105 hover:bg-white/90">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/5 to-yellow-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                      <div>
                        <img src="customers/sunat.png" alt="">
                      </div>
                      <p class="text-gray-600 leading-relaxed mb-6 text-base text-center">

                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Controles de navegación -->
        <div class="flex items-center justify-between mt-8">
          <!-- Botón anterior -->
          <button 
            @click="prevSlide"
            class="group flex items-center justify-center w-12 h-12 bg-white/80 backdrop-blur-sm rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:bg-white"
            :disabled="currentSlide === 0"
            :class="{ 'opacity-50 cursor-not-allowed': currentSlide === 0 }"
          >
            <svg class="w-6 h-6 text-gray-600 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
          </button>

          <!-- Indicadores de slides -->
          <div class="flex space-x-3">
            <button
              v-for="(slide, index) in totalSlides"
              :key="index"
              @click="goToSlide(index)"
              class="w-3 h-3 rounded-full transition-all duration-300"
              :class="[
                currentSlide === index 
                  ? 'bg-gradient-to-r from-blue-600 to-purple-600 shadow-lg scale-125' 
                  : 'bg-gray-300 hover:bg-gray-400'
              ]"
            ></button>
          </div>

          <!-- Botón siguiente -->
          <button 
            @click="nextSlide"
            class="group flex items-center justify-center w-12 h-12 bg-white/80 backdrop-blur-sm rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 hover:bg-white"
            :disabled="currentSlide === totalSlides - 1"
            :class="{ 'opacity-50 cursor-not-allowed': currentSlide === totalSlides - 1 }"
          >
            <svg class="w-6 h-6 text-gray-600 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>

        <!-- Barra de progreso -->
        <div class="mt-6">
          <div class="w-full bg-gray-200/50 backdrop-blur-sm rounded-full h-1">
            <div 
              class="bg-gradient-to-r from-blue-600 to-purple-600 h-1 rounded-full transition-all duration-700 ease-out"
              :style="{ width: `${((currentSlide + 1) / totalSlides) * 100}%` }"
            ></div>
          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <div class="text-center mt-16" v-animateonscroll="{ enterClass: 'animate-fade-in-up' }">
        <div class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-semibold text-lg shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer group">
          Explora nuestras soluciones
          <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
          </svg>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue'
import AnimateOnScroll from 'primevue/animateonscroll'
//Customer/cavali.png
//Customer/expirian.png
// Customer/sunat.png
// Estado del carrusel
const currentSlide = ref(0)
const totalSlides = 3
const slideWidth = 100
const autoplayInterval = ref<NodeJS.Timeout | null>(null)
const isAutoplayPaused = ref(false)

// Navegación del carrusel
const nextSlide = () => {
  if (currentSlide.value < totalSlides - 1) {
    currentSlide.value++
  } else {
    currentSlide.value = 0 // Volver al inicio
  }
}

const prevSlide = () => {
  if (currentSlide.value > 0) {
    currentSlide.value--
  } else {
    currentSlide.value = totalSlides - 1 // Ir al final
  }
}

const goToSlide = (index: number) => {
  currentSlide.value = index
}

// Autoplay
const startAutoplay = () => {
  autoplayInterval.value = setInterval(() => {
    if (!isAutoplayPaused.value) {
      nextSlide()
    }
  }, 5000) // Cambiar slide cada 5 segundos
}

const stopAutoplay = () => {
  if (autoplayInterval.value) {
    clearInterval(autoplayInterval.value)
    autoplayInterval.value = null
  }
}

const pauseAutoplay = () => {
  isAutoplayPaused.value = true
}

const resumeAutoplay = () => {
  isAutoplayPaused.value = false
}

// Lifecycle hooks
onMounted(() => {
  startAutoplay()
})

onUnmounted(() => {
  stopAutoplay()
})
</script>

<style scoped>
/* Animaciones fluidas y modernas */
@keyframes fade-in-up {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fade-in-left {
  from {
    opacity: 0;
    transform: translateX(-30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

@keyframes fade-in-right {
  from {
    opacity: 0;
    transform: translateX(30px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

.animate-fade-in-up {
  animation: fade-in-up 0.8s ease-out forwards;
}

.animate-fade-in-left {
  animation: fade-in-left 0.8s ease-out forwards;
}

.animate-fade-in-right {
  animation: fade-in-right 0.8s ease-out forwards;
}

/* Efectos de glassmorphism */
.backdrop-blur-sm {
  backdrop-filter: blur(8px);
}

/* Gradientes de texto */
.bg-clip-text {
  -webkit-background-clip: text;
  background-clip: text;
}

/* Transiciones suaves para todos los elementos interactivos */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Efectos de hover mejorados */
.group:hover .group-hover\:shadow-xl {
  box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}

/* Responsive mejoras */
@media (max-width: 768px) {
  .rounded-3xl {
    border-radius: 1.5rem;
  }
  
  .p-8 {
    padding: 1.5rem;
  }
}

/* Estilos específicos del carrusel */
.carousel-container {
  touch-action: pan-y pinch-zoom;
}

/* Suavizar transiciones en móviles */
@media (max-width: 1024px) {
  .grid-cols-1.lg\:grid-cols-2 {
    grid-template-columns: 1fr;
    gap: 1.5rem;
  }
}
</style>