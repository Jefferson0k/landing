<template>
  <div class="hero-container" style="min-height: 100vh;">
    <!-- Sección superior con fondo de color - 50% del espacio -->
    <div id="hero" class="py-6 px-6 lg:px-20 mx-0 my-12 lg:mx-20"
      style="min-height: 50vh; background: linear-gradient(135deg, #EFEBE5 0%, #f8f6f2 100%);"
      
      >

      <div class="grid grid-cols-12 gap-8 items-center">

        <!-- Columna de texto -->
        <div class="col-span-12 lg:col-span-6 space-y-8 text-center lg:text-left">
          <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-tight text-gray-900">
            Financia tus sueños con
            <span class="text-blue-600 relative block mt-4 inline-block">
              Zuma
              <div
                class="absolute -bottom-3 left-0 w-32 h-2 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full opacity-70">
              </div>
            </span>
          </h1>

          <h2 class="text-gray-800 font-bold text-3xl md:text-4xl lg:text-5xl">
            Invierte con los mejores
          </h2>

          <p class="text-xl md:text-2xl font-light leading-relaxed text-gray-700 max-w-3xl mx-auto lg:mx-0">
            Zuma conecta inversionistas y capital de forma
            <span class="font-semibold text-blue-700">ágil y segura.</span>
            <br />
            <span class="font-semibold text-blue-800 text-lg md:text-xl block mt-2">
              Tu suma, nosotros cuidamos tu inversión.
            </span>
          </p>
        </div>

        <!-- Columna de servicios -->
        <div class="col-span-12 lg:col-span-6 relative flex justify-center lg:justify-end mt-12 lg:mt-0">
          <div
            class="relative bg-white rounded-3xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500 w-full max-w-sm">

            <!-- Contenido de tarjeta -->
            <div class="space-y-4">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Servicios Zuma</h3>
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                </div>
              </div>

              <!-- Lista de servicios -->
              <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">📈</div>
                    <span class="text-sm font-medium text-gray-700">Inversiones</span>
                  </div>
                  <span class="text-sm font-bold text-blue-600">Activo</span>
                </div>

                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">🏦</div>
                    <span class="text-sm font-medium text-gray-700">Factoring</span>
                  </div>
                  <span class="text-sm font-bold text-green-600">Disponible</span>
                </div>

                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">✅</div>
                    <span class="text-sm font-medium text-gray-700">Confirming</span>
                  </div>
                  <span class="text-sm font-bold text-purple-600">Operativo</span>
                </div>

                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">💼</div>
                    <span class="text-sm font-medium text-gray-700">Cobranza Libre</span>
                  </div>
                  <span class="text-sm font-bold text-orange-600">24/7</span>
                </div>
              </div>

              <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-center">
                  <span class="text-lg font-semibold text-gray-800">Servicios Activos</span>
                  <span class="text-xl font-bold text-green-600">4/4</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Globo decorativo -->
          <div
            class="absolute -top-4 -right-4 w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg animate-bounce">
            💰
          </div>
        </div>

      </div>
    </div>


    <!-- Sección inferior con fondo blanco y las 4 tarjetas - 50% del espacio -->
    <div class="bg-white py-16 px-6 lg:px-20" style="min-height: 50vh;">
      <div class="max-w-7xl mx-auto h-full flex items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 w-full">
          <!-- Tarjeta 1: Inversiones -->
          <div
            v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-l-8 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
            class="relative bg-white rounded-3xl shadow-2xl p-8 transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-2">
            <div class="space-y-4">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Inversiones</h3>
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                </div>
              </div>

              <div class="space-y-4">
                <div class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                      📈
                    </div>
                    <span class="text-sm font-medium text-gray-700">Rendimiento</span>
                  </div>
                  <span class="text-sm font-bold text-blue-600">15.2%</span>
                </div>
              </div>

              <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-center">
                  <span class="text-lg font-semibold text-gray-800">Estado</span>
                  <span class="text-xl font-bold text-green-600">Activo</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Tarjeta 2: Factoring -->
          <div
            v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
            class="relative bg-white rounded-3xl shadow-2xl p-8 transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-2">
            <div class="space-y-4">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Factoring</h3>
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                </div>
              </div>

              <div class="space-y-4">
                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-green-50 to-green-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                      🏦
                    </div>
                    <span class="text-sm font-medium text-gray-700">Aprobación</span>
                  </div>
                  <span class="text-sm font-bold text-green-600">24h</span>
                </div>
              </div>

              <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-centers">
                  <span class="text-lg font-semibold text-gray-800">Estado</span>
                  <span class="text-xl font-bold text-green-600">Disponible</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Tarjeta 3: Confirming -->
          <div
            v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 slide-in-from-l-8 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
            class="relative bg-white rounded-3xl shadow-2xl p-8 transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-2">
            <div class="space-y-4">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Confirming</h3>
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                </div>
              </div>

              <div class="space-y-4">
                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-purple-50 to-purple-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                      ✅
                    </div>
                    <span class="text-sm font-medium text-gray-700">Éxito</span>
                  </div>
                  <span class="text-sm font-bold text-purple-600">99.8%</span>
                </div>
              </div>

              <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-center">
                  <span class="text-lg font-semibold text-gray-800">Estado</span>
                  <span class="text-xl font-bold text-green-600">Operativo</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Tarjeta 4: Cobranza Libre -->
          <div
            v-animateonscroll="{ enterClass: 'animate-enter fade-in-10 animate-duration-1000', leaveClass: 'animate-leave fade-out-0' }"
            class="relative bg-white rounded-3xl shadow-2xl p-8 transform hover:rotate-0 transition-transform duration-500 hover:-translate-y-2">
            <div class="space-y-4">
              <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Cobranza Libre</h3>
                <div class="flex space-x-2">
                  <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                  <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                </div>
              </div>

              <div class="space-y-4">
                <div
                  class="flex items-center justify-between p-3 bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg">
                  <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center">
                      💼
                    </div>
                    <span class="text-sm font-medium text-gray-700">Recuperación</span>
                  </div>
                  <span class="text-sm font-bold text-orange-600">85%</span>
                </div>
              </div>

              <div class="border-t pt-4 mt-6">
                <div class="flex justify-between items-center">
                  <span class="text-lg font-semibold text-gray-800">Estado</span>
                  <span class="text-xl font-bold text-green-600">24/7</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
// Sin dependencias de botones PrimeVue
</script>