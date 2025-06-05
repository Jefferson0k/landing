<script setup>
import { ref } from 'vue'
import Button from 'primevue/button'
import ProgressBar from 'primevue/progressbar'
import Tag from 'primevue/tag'
const handleReviewDetails = () => {
  console.log('Revisar detalles clicked')
}

// Calculated values
const financedAmount = 100673.50 * 0.5
const remainingAmount = 100673.50 - financedAmount
const progressPercentage = 50
const daysRemaining = 60
</script>

<template>
  <div class="card">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div class="font-semibold text-xl">Ultima factura</div>
    </div>

    <!-- Company Information -->
    <div class="mb-4">
      <div class="text-sm  mb-2">Código único</div>
      <div class="flex items-center justify-between">
        <div class="font-bold text-xl">Coca Cola Limitada</div>
        <Tag severity="info" value="A+" class="font-semibold" />
      </div>
    </div>

    <!-- Amount Section -->
    <div class="mb-5">
      <div class="text-sm mb-2">Monto a financiar</div>
      <div class="flex items-center text-3xl font-bold leading-tight">
        <div>
          S/ {{ Number(100673.50).toLocaleString('es-PE', { minimumFractionDigits: 2 }) }}
        </div>
        <div class="ml-4 text-base font-normal">
          {{ progressPercentage }}% financiada
        </div>
      </div>
    </div>

    <!-- Progress and Details -->
    <div class="mb-6">
      <div class="flex justify-between text-sm mb-2">
        <span>Tasa mensual</span>
        <span class="font-semibold">15.5%</span>
      </div>

      <ProgressBar :value="progressPercentage" :showValue="false" :style="{ height: '12px' }" class="mb-3" />

      <div class="flex items-center justify-between">
        <div class="flex items-center text-sm">
          <i class="pi pi-clock mr-2 text-blue-500"></i>
          <span>Cierre inversión</span>
          <span class="ml-2 font-semibold text-gray-800">{{ daysRemaining }} días</span>
        </div>
        <div class="text-sm">
          Faltan S/ {{ Number(remainingAmount).toLocaleString('es-PE', { minimumFractionDigits: 2 }) }}
        </div>
      </div>
    </div>

    <!-- Action Button -->
    <div class="pt-2">
      <Button label="Revisar detalles" severity="contrast" variant="outlined" class="w-full"
        @click="handleReviewDetails" rounded />
    </div>
  </div>
</template>