<script setup>
import Badge from 'primevue/badge';

const investors = [
  {
    id: 1,
    name: 'NatiC',
    amount: 'S/ 3,100.00',
    icon: 'pi pi-trophy',
    bgColor: 'bg-gradient-to-br from-yellow-400 via-yellow-500 to-amber-600',
    isTop3: true
  },
  {
    id: 2,
    name: 'DrewC',
    amount: 'S/ 3,100.00',
    icon: 'pi pi-chart-line',
    bgColor: 'bg-gradient-to-br from-red-500 via-red-600 to-rose-700',
    isTop3: true
  },
  {
    id: 3,
    name: 'DaniS',
    amount: 'S/ 3,100.00',
    icon: 'pi pi-heart',
    bgColor: 'bg-gradient-to-br from-cyan-400 via-cyan-500 to-teal-600',
    isTop3: true
  },
  {
    id: 4,
    name: 'Vik',
    amount: 'S/ 3,100.00',
    icon: 'pi pi-desktop',
    bgColor: 'bg-gray-50',
    isTop3: false
  },
  {
    id: 5,
    name: 'SusiLu',
    amount: 'S/ 350.00',
    icon: 'pi pi-eye',
    bgColor: 'bg-gray-50',
    isTop3: false
  },
  {
    id: 6,
    name: 'ZeroB',
    amount: 'S/ 0.00',
    icon: 'pi pi-briefcase',
    bgColor: 'bg-gray-50',
    isTop3: false
  }
];
</script>

<template>
  <div class="card">
    <div class="flex items-center justify-between mb-6">
      <div class="font-semibold text-xl">Ranking top 6 inversionistas</div>
    </div>

    <div class="space-y-3">
      <div 
        v-for="investor in investors" 
        :key="investor.id"
        :class="[
          'flex items-center justify-between p-4 rounded-xl transition-all duration-200 relative overflow-hidden',
          investor.bgColor,
          investor.isTop3 ? 'shadow-lg' : 'border border-gray-200'
        ]"
      >
        <!-- Números laterales con gradiente centrado -->
        <template v-if="investor.isTop3">
          <!-- Izquierda -->
          <div
            class="absolute left-0 top-1/2 -translate-y-1/2 w-24 text-center text-6xl font-extrabold text-white opacity-40 pointer-events-none select-none"
            style="mask-image: radial-gradient(ellipse at center, white 40%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, white 40%, transparent 70%);"
          >
            {{ investor.id }}
          </div>

          <!-- Derecha -->
          <div
            class="absolute right-0 top-1/2 -translate-y-1/2 w-24 text-center text-6xl font-extrabold text-white opacity-40 pointer-events-none select-none"
            style="mask-image: radial-gradient(ellipse at center, white 40%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, white 40%, transparent 70%);"
          >
            {{ investor.id }}
          </div>
        </template>

        <!-- Contenido del inversor -->
        <div class="flex items-center space-x-4 relative z-10">
          <!-- Icono -->
          <div class="relative">
            <div 
              :class="[
                'w-12 h-12 rounded-full flex items-center justify-center backdrop-blur-sm',
                investor.isTop3 ? 'bg-white bg-opacity-20 border border-white border-opacity-30' : 'bg-gray-100'
              ]"
            >
              <i 
                :class="[
                  investor.icon, 
                  'text-lg',
                  investor.isTop3 ? 'text-white drop-shadow-sm' : 'text-gray-600'
                ]"
              ></i>
            </div>

            <!-- Badge -->
            <Badge 
              v-if="investor.isTop3"
              :value="investor.id.toString()" 
              severity="contrast"
              class="absolute -top-1 -right-1 !bg-gray-900 !text-white !text-xs !w-6 !h-6 !flex !items-center !justify-center !rounded-full shadow-lg"
            />
          </div>

          <!-- Info del inversor -->
          <div>
            <div 
              :class="[
                'font-semibold text-lg',
                investor.isTop3 ? 'text-white drop-shadow-sm' : 'text-gray-900'
              ]"
            >
              {{ investor.name }}
            </div>
            <div 
              :class="[
                'text-sm font-medium',
                investor.isTop3 ? 'text-white text-opacity-95 drop-shadow-sm' : 'text-gray-600'
              ]"
            >
              {{ investor.amount }}
            </div>
          </div>
        </div>

        <!-- Efectos visuales adicionales -->
        <div 
          v-if="investor.isTop3"
          class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent pointer-events-none"
        ></div>
        <div 
          v-if="investor.isTop3"
          class="absolute inset-0 bg-gradient-to-br from-white/5 via-transparent to-black/5 pointer-events-none"
        ></div>

        <!-- Números para no top-3 -->
        <div 
          v-if="!investor.isTop3"
          class="text-2xl font-bold text-gray-400 relative z-10"
        >
          {{ investor.id }}
        </div>
      </div>
    </div>
  </div>
</template>