<template>
  <div class="space-y-8">
    <!-- Header con información de la subasta -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-6 rounded-xl border border-blue-200 dark:border-blue-800">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-blue-900 dark:text-blue-100">Subasta de Inversión</h2>
        <div class="flex items-center gap-2 text-green-600 dark:text-green-400">
          <i class="pi pi-circle-fill text-xs"></i>
          <span class="font-medium">Activa</span>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="text-center">
          <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ formatCurrency(totalRecaudado) }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">Total Recaudado</div>
        </div>
        <div class="text-center">
          <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ participantes.length }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">Participantes</div>
        </div>
        <div class="text-center">
          <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ tiempoRestante }}</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">Tiempo Restante</div>
        </div>
      </div>
    </div>

    <!-- Participantes -->
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
      <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Participantes de la Subasta</h3>
          <Button 
            icon="pi pi-refresh" 
            class="p-button-text p-button-sm" 
            @click="actualizarParticipantes"
            :loading="cargandoParticipantes"
          />
        </div>
      </div>
      
      <DataTable 
        :value="participantes" 
        :loading="cargandoParticipantes"
        responsiveLayout="scroll"
        stripedRows
        class="border-0"
        :paginator="participantes.length > 10"
        :rows="10"
        paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
        currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords} participantes"
      >
        <template #empty>
          <div class="text-center py-8">
            <i class="pi pi-users text-4xl text-gray-400 mb-4"></i>
            <p class="text-gray-600 dark:text-gray-400">No hay participantes registrados aún</p>
          </div>
        </template>
        
        <Column field="nombre" header="Inversionista" sortable>
          <template #body="{ data }">
            <div class="flex items-center gap-3">
              <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                {{ data.nombre.charAt(0).toUpperCase() }}
              </div>
              <span class="font-medium">{{ data.nombre }}</span>
            </div>
          </template>
        </Column>
        
        <Column field="monto" header="Monto Invertido" sortable>
          <template #body="{ data }">
            <div class="font-semibold text-green-600 dark:text-green-400">
              {{ formatCurrency(data.monto) }}
            </div>
          </template>
        </Column>
        
        <Column field="fechaInversion" header="Fecha de Inversión" sortable>
          <template #body="{ data }">
            <span class="text-gray-600 dark:text-gray-400">{{ formatDate(data.fechaInversion) }}</span>
          </template>
        </Column>
        
        <Column field="estado" header="Estado">
          <template #body="{ data }">
            <Tag 
              :value="data.estado" 
              :severity="getEstadoSeverity(data.estado)"
              class="font-medium"
            />
          </template>
        </Column>
      </DataTable>
    </div>

    <!-- Simulación de Inversión -->
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
      <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
          <i class="pi pi-dollar text-white"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Simulación de Inversión</h3>
      </div>
      
      <form @submit.prevent="simularInversion" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="space-y-2">
            <label for="monto" class="block font-medium text-gray-700 dark:text-gray-300">
              Monto a invertir <span class="text-red-500">*</span>
            </label>
            <InputNumber 
              v-model="simulacion.monto"
              inputId="monto" 
              :min="montoMinimo" 
              :max="montoMaximo"
              placeholder="Ej. 10,000"
              class="w-full"
              :class="{ 'p-invalid': errores.monto }"
              mode="currency"
              currency="PEN"
              locale="es-PE"
            />
            <small v-if="errores.monto" class="text-red-500">{{ errores.monto }}</small>
            <small class="text-gray-500 dark:text-gray-400">
              Monto mínimo: {{ formatCurrency(montoMinimo) }} | Máximo: {{ formatCurrency(montoMaximo) }}
            </small>
          </div>
          
          <div class="space-y-2">
            <label for="nombre" class="block font-medium text-gray-700 dark:text-gray-300">
              Nombre del inversionista <span class="text-red-500">*</span>
            </label>
            <InputText 
              v-model="simulacion.nombre"
              inputId="nombre" 
              placeholder="Ingrese su nombre completo"
              class="w-full"
              :class="{ 'p-invalid': errores.nombre }"
            />
            <small v-if="errores.nombre" class="text-red-500">{{ errores.nombre }}</small>
          </div>
        </div>

        <!-- Información de la simulación -->
        <div v-if="simulacion.monto >= montoMinimo" class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
          <h4 class="font-semibold text-blue-900 dark:text-blue-100 mb-3">Resumen de tu inversión:</h4>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div>
              <span class="text-gray-600 dark:text-gray-400">Monto:</span>
              <div class="font-semibold text-gray-900 dark:text-gray-100">{{ formatCurrency(simulacion.monto) }}</div>
            </div>
            <div>
              <span class="text-gray-600 dark:text-gray-400">Comisión estimada:</span>
              <div class="font-semibold text-gray-900 dark:text-gray-100">{{ formatCurrency(calcularComision(simulacion.monto)) }}</div>
            </div>
            <div>
              <span class="text-gray-600 dark:text-gray-400">Monto neto:</span>
              <div class="font-semibold text-green-600 dark:text-green-400">{{ formatCurrency(simulacion.monto - calcularComision(simulacion.monto)) }}</div>
            </div>
          </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 justify-end">
          <Button 
            type="button"
            label="Limpiar" 
            icon="pi pi-times" 
            class="p-button-text"
            @click="limpiarFormulario"
          />
          <Button 
            type="submit"
            label="Simular Inversión" 
            icon="pi pi-calculator" 
            class="sm:w-auto"
            :loading="procesandoSimulacion"
            :disabled="!simulacion.monto || !simulacion.nombre"
          />
        </div>
      </form>
    </div>

    <!-- Confirmación Dialog -->
    <Dialog 
      v-model:visible="mostrarConfirmacion" 
      modal 
      header="Confirmar Inversión"
      class="mx-4"
      :style="{ width: '450px' }"
    >
      <div class="space-y-4">
        <div class="flex items-center gap-3">
          <i class="pi pi-exclamation-triangle text-orange-500 text-2xl"></i>
          <span>¿Está seguro de realizar esta inversión?</span>
        </div>
        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
          <div class="space-y-2">
            <div><strong>Inversionista:</strong> {{ simulacion.nombre }}</div>
            <div><strong>Monto:</strong> {{ formatCurrency(simulacion.monto) }}</div>
            <div><strong>Comisión:</strong> {{ formatCurrency(calcularComision(simulacion.monto)) }}</div>
            <div><strong>Monto neto:</strong> {{ formatCurrency(simulacion.monto - calcularComision(simulacion.monto)) }}</div>
          </div>
        </div>
      </div>
      <template #footer>
        <Button 
          label="Cancelar" 
          icon="pi pi-times" 
          class="p-button-text" 
          @click="mostrarConfirmacion = false" 
        />
        <Button 
          label="Confirmar Inversión" 
          icon="pi pi-check" 
          @click="confirmarInversion"
          :loading="procesandoInversion"
        />
      </template>
    </Dialog>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Button from 'primevue/button';
import InputNumber from 'primevue/inputnumber';
import InputText from 'primevue/inputtext';
import Tag from 'primevue/tag';
import Dialog from 'primevue/dialog';

// Estados reactivos
const participantes = ref([]);
const cargandoParticipantes = ref(false);
const procesandoSimulacion = ref(false);
const procesandoInversion = ref(false);
const mostrarConfirmacion = ref(false);

// Configuración
const montoMinimo = ref(1000);
const montoMaximo = ref(1000000);
const comisionPorcentaje = ref(0.02); // 2%

// Formulario de simulación
const simulacion = ref({
  monto: null,
  nombre: ''
});

const errores = ref({
  monto: '',
  nombre: ''
});

// Datos simulados para demostración
const participantesMock = [
  { 
    id: 1, 
    nombre: 'María González', 
    monto: 50000, 
    estado: 'Confirmado',
    fechaInversion: new Date('2024-01-15')
  },
  { 
    id: 2, 
    nombre: 'Carlos Mendoza', 
    monto: 75000, 
    estado: 'Pendiente',
    fechaInversion: new Date('2024-01-16')
  },
  { 
    id: 3, 
    nombre: 'Ana Rodríguez', 
    monto: 120000, 
    estado: 'Confirmado',
    fechaInversion: new Date('2024-01-17')
  },
  { 
    id: 4, 
    nombre: 'Roberto Silva', 
    monto: 30000, 
    estado: 'Rechazado',
    fechaInversion: new Date('2024-01-18')
  }
];

// Computed properties
const totalRecaudado = computed(() => {
  return participantes.value
    .filter(p => p.estado === 'Confirmado')
    .reduce((sum, p) => sum + p.monto, 0);
});

const tiempoRestante = computed(() => {
  // Simulación de tiempo restante
  return '2d 14h';
});

// Métodos
const formatCurrency = (value) => {
  if (!value) return 'S/ 0.00';
  return new Intl.NumberFormat('es-PE', {
    style: 'currency',
    currency: 'PEN'
  }).format(value);
};

const formatDate = (date) => {
  return new Intl.DateTimeFormat('es-PE', {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  }).format(date);
};

const getEstadoSeverity = (estado) => {
  const severityMap = {
    'Confirmado': 'success',
    'Pendiente': 'warning',
    'Rechazado': 'danger'
  };
  return severityMap[estado] || 'info';
};

const calcularComision = (monto) => {
  return monto * comisionPorcentaje.value;
};

const validarFormulario = () => {
  errores.value = { monto: '', nombre: '' };
  let valido = true;

  if (!simulacion.value.monto || simulacion.value.monto < montoMinimo.value) {
    errores.value.monto = `El monto debe ser mayor a ${formatCurrency(montoMinimo.value)}`;
    valido = false;
  }

  if (simulacion.value.monto > montoMaximo.value) {
    errores.value.monto = `El monto no puede ser mayor a ${formatCurrency(montoMaximo.value)}`;
    valido = false;
  }

  if (!simulacion.value.nombre?.trim()) {
    errores.value.nombre = 'El nombre es requerido';
    valido = false;
  }

  return valido;
};

const simularInversion = async () => {
  if (!validarFormulario()) return;

  procesandoSimulacion.value = true;
  
  // Simular procesamiento
  await new Promise(resolve => setTimeout(resolve, 1000));
  
  mostrarConfirmacion.value = true;
  procesandoSimulacion.value = false;
};

const confirmarInversion = async () => {
  procesandoInversion.value = true;
  
  // Simular confirmación de inversión
  await new Promise(resolve => setTimeout(resolve, 2000));
  
  // Agregar a la lista de participantes
  const nuevoParticipante = {
    id: Date.now(),
    nombre: simulacion.value.nombre,
    monto: simulacion.value.monto,
    estado: 'Pendiente',
    fechaInversion: new Date()
  };
  
  participantes.value.unshift(nuevoParticipante);
  
  limpiarFormulario();
  mostrarConfirmacion.value = false;
  procesandoInversion.value = false;
  
  // Aquí podrías mostrar un toast de éxito
  console.log('Inversión registrada exitosamente');
};

const limpiarFormulario = () => {
  simulacion.value = { monto: null, nombre: '' };
  errores.value = { monto: '', nombre: '' };
};

const actualizarParticipantes = async () => {
  cargandoParticipantes.value = true;
  
  // Simular carga de datos
  await new Promise(resolve => setTimeout(resolve, 1500));
  
  participantes.value = [...participantesMock];
  cargandoParticipantes.value = false;
};

// Lifecycle
onMounted(() => {
  actualizarParticipantes();
});
</script>