<template>
  <div>
    <h3 class="text-xl font-semibold mb-4">Subastas Activas</h3>
    <DataView :value="[]" layout="grid">
      <template #grid="{ item }">
        <div class="col-12 md:col-4">
          <Card class="mb-4">
            <template #header>
              <div class="text-lg font-bold">
                {{ item.nombre }}
              </div>
            </template>
            <template #content>
              <p class="text-sm text-gray-500">Fecha: {{ item.fecha }}</p>
              <p class="text-sm text-gray-500">Ubicación: {{ item.ubicacion }}</p>
              <p class="text-sm text-gray-500">Monto base: {{ item.montoBase }}</p>
              <p class="text-sm text-gray-500">Descripción: {{ item.descripcion }}</p>
            </template>
            <template #footer>
              <Button label="Ver participantes" icon="pi pi-users" text />
            </template>
          </Card>
        </div>
      </template>
    </DataView>
  </div>
</template>

<script setup>
import DataView from 'primevue/dataview';
import Card from 'primevue/card';
import Button from 'primevue/button';
</script>
