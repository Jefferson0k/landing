<template>
  <div
    id="hero"
    class="flex flex-col pt-12 px-6 lg:px-20 overflow-hidden relative"
    style="min-height: 88vh;"
  >
    <div class="mx-6 md:mx-20 mt-0 md:mt-6 max-w-4xl">
      <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
        Financia tus sueños con <span class="text-white">Zuma</span><br />
        Invierte con los mejores
      </h1>
      <p class="text-2xl md:text-3xl font-normal leading-relaxed mb-3 text-white">
        Zuma conecta inversionistas y capital de forma ágil y segura.<br />
        Tu suma, nosotros cuidamos tu inversión.
      </p>
      <Button label="Conoce más1" severity="warn" icon="pi pi-info-circle" class="mt-6" />
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32"></div>
  </div>
</template>

<script setup lang="ts">
import Button from 'primevue/button';
</script>
