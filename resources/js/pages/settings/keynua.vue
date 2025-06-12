<script setup>
import Button from 'primevue/button';
import Message from 'primevue/message';

function iniciarVerificacion() {
  console.log('Iniciando proceso de verificación con Keynua...');
  // Ejemplo: router.visit('/verificacion/keynua');
}
</script>

<template>
  <!-- Encabezado -->
  <div class="flex items-center gap-3 py-4">
    <i class="pi pi-file-signature text-primary text-2xl"></i>
    <div>
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Firma y Contrato</h2>
      <p class="text-gray-600 dark:text-gray-300 text-sm">
        Verifique su identidad y firme el contrato. Tenga su DNI a la mano.
      </p>
    </div>
  </div>

  <!-- Advertencia -->
  <Message severity="warn" :closable="false" class="p-4">
    <div class="flex items-start gap-4">
      <i class="pi pi-exclamation-triangle text-3xl text-yellow-500 mt-1"></i>
      <div class="flex-1">
        <h4 class="text-lg font-semibold text-yellow-700 dark:text-yellow-400">Advertencia</h4>
        <p class="text-sm text-gray-700 dark:text-gray-300 mb-4">
          Solo el titular de la cuenta puede completar este proceso. Asegúrese de estar presente y con su documento en
          mano.
        </p>
        <Button label="Comenzar verificación" icon="pi pi-video" iconPos="left" severity="warn"
          @click="iniciarVerificacion" />
      </div>
    </div>
  </Message>
</template>
