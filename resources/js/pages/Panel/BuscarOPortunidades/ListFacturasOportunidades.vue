<template>
    <div class="card">
        <DataTable ref="dt" :value="facturas" dataKey="id" :paginator="true" :rows="10" :filters="filters"
            paginatorTemplate="FirstPageLink PrevPageLink PageLinks NextPageLink LastPageLink CurrentPageReport RowsPerPageDropdown"
            :rowsPerPageOptions="[5, 10, 25]"
            currentPageReportTemplate="Mostrando {first} a {last} de {totalRecords} facturas" class="p-datatable-sm">


            <template #header>
                <div class="flex flex-wrap gap-2 items-center justify-between">
                    <h4 class="m-0">Facturas <Tag severity="warn" value="2"></Tag>
                    </h4>

                    <!-- Controles de la derecha: Buscador, SelectButton y Filtros -->
                    <div class="flex flex-wrap gap-3 items-center">
                        <!-- Buscador -->
                        <IconField>
                            <InputIcon>
                                <i class="pi pi-search" />
                            </InputIcon>
                            <InputText v-model="filters['global'].value" placeholder="Search..." />
                        </IconField>

                        <!-- SelectButton original -->
                        <SelectButton v-model="value" :options="options" />

                        <!-- Select Filtrar Por -->
                        <Select v-model="selectedFilterType" :options="filterTypes" optionLabel="label"
                            optionValue="value" placeholder="Filtrar por..." class="w-10rem"
                            @change="onFilterTypeChange">
                            <template #value="slotProps">
                                <div v-if="slotProps.value" class="flex align-items-center gap-2">
                                    <i class="pi pi-filter text-sm"></i>
                                    <span>{{ slotProps.placeholder }}</span>
                                </div>
                                <span v-else>{{ slotProps.placeholder }}</span>
                            </template>
                        </Select>

                        <!-- Filtros Dinámicos dentro del dropdown -->
                        <div v-if="selectedFilterType" class="flex gap-2">
                            <!-- Filtro de Moneda -->
                            <MultiSelect v-if="showMonedaFilter" v-model="selectedMonedas" :options="monedaOptions"
                                optionLabel="label" optionValue="value" placeholder="Moneda" class="w-9rem"
                                :maxSelectedLabels="1" selectedItemsLabel="{0} monedas" />

                            <!-- Filtro de Plazo de Pago -->
                            <MultiSelect v-if="showPlazoFilter" v-model="selectedPlazos" :options="plazoOptions"
                                optionLabel="label" optionValue="value" placeholder="Plazo" class="w-8rem"
                                :maxSelectedLabels="1" selectedItemsLabel="{0} plazos" />

                            <!-- Filtro de Nivel de Riesgo -->
                            <MultiSelect v-if="showRiesgoFilter" v-model="selectedRiesgos" :options="riesgoOptions"
                                optionLabel="label" optionValue="value" placeholder="Riesgo" class="w-8rem"
                                :maxSelectedLabels="1" selectedItemsLabel="{0} niveles" />

                            <!-- Filtro de Tipo de Industria -->
                            <MultiSelect v-if="showIndustriaFilter" v-model="selectedIndustrias"
                                :options="industriaOptions" optionLabel="label" optionValue="value"
                                placeholder="Industria" class="w-9rem" :maxSelectedLabels="1"
                                selectedItemsLabel="{0} industrias" />

                            <!-- Botón para limpiar filtros -->
                            <Button icon="pi pi-times" severity="secondary" outlined size="small" @click="clearFilters"
                                v-tooltip="'Limpiar filtros'" />
                        </div>
                    </div>
                </div>
            </template>

            <Column selectionMode="multiple" style="width: 3rem" :exportable="false"></Column>
            <Column field="empresa" header="Empresa" sortable style="min-width: 12rem"></Column>
            <Column field="monto" header="Monto a financiar" sortable style="min-width: 12rem">
                <template #body="slotProps">
                    <span class="font-semibold">{{ slotProps.data.monto }}</span>
                </template>
                </Column>
                <Column field="porcentaje" header="% a financiar" sortable style="min-width: 10rem">
                    <template #body="slotProps">
                        <div class="flex flex-column gap-2">
                            <span class="text-orange-500 font-bold">{{ slotProps.data.porcentaje }}</span>
                        </div>
                    </template>
                </Column>
            <Column field="tasa" header="Tasa Mensual" sortable style="min-width: 16rem">
                <template #body="slotProps">
                    <span class="font-semibold">{{ slotProps.data.tasa }}</span>
                            <ProgressBar :value="50"></ProgressBar>
                </template>
            </Column>
            <Column field="dias" header="Días de inversión" sortable style="min-width: 14rem">
                <template #body="slotProps">
                    <div class="flex flex-column gap-1">
                        <span class="font-semibold">{{ slotProps.data.dias }}</span>
                        <div class="flex align-items-center gap-1">
                            <span class="text-sm text-500">{{ slotProps.data.diasTexto }}</span>
                            <i class="pi pi-info-circle text-xs text-500"></i>
                        </div>
                    </div>
                </template>
            </Column>
            <Column field="detalles" header="Detalles" sortable >
                <template #body="slotProps">
                    <Button label="Revisar detalles" outlined class="p-button-sm"
                        @click="revisarDetalles(slotProps.data)" />
                </template>
            </Column>
        </DataTable>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import IconField from 'primevue/iconfield';
import InputIcon from 'primevue/inputicon';
import InputText from 'primevue/inputtext';
import Select from 'primevue/select';
import MultiSelect from 'primevue/multiselect';
import Button from 'primevue/button';
import SelectButton from 'primevue/selectbutton';
import ProgressBar from 'primevue/progressbar';
import { FilterMatchMode } from '@primevue/core/api';
import Tag from 'primevue/tag';

// Datos de las facturas
const facturas = ref([
    {
        id: 1,
        empresa: 'Coca Cola Limitada',
        monto: 'S/100,673.50',
        porcentaje: '50% financiada',
        porcentajeNum: 50,
        tasa: '15,5%',
        dias: 'Cierre inversión',
        diasTexto: '60 días'
    },
    {
        id: 2,
        empresa: 'Coca Cola Limitada',
        monto: 'S/90,245.20',
        porcentaje: '75% financiada',
        porcentajeNum: 75,
        tasa: '10,2%',
        dias: 'Cierre inversión',
        diasTexto: '60 días'
    }
]);

// Filtros básicos
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS }
});

// SelectButton original
const value = ref('PEN');
const options = ref(['PEN', '30 dias']);

// Estado del filtro principal
const selectedFilterType = ref(null);

// Estados de los multiselects
const selectedMonedas = ref([]);
const selectedPlazos = ref([]);
const selectedRiesgos = ref([]);
const selectedIndustrias = ref([]);

// Opciones del filtro principal
const filterTypes = ref([
    { label: 'Moneda', value: 'moneda' },
    { label: 'Plazo de Pago', value: 'plazo' },
    { label: 'Nivel de Riesgo', value: 'riesgo' },
    { label: 'Tipo de Industria', value: 'industria' },
    { label: 'Todos los Filtros', value: 'todos' }
]);

// Opciones para cada multiselect
const monedaOptions = ref([
    { label: 'PEN (Soles)', value: 'PEN' },
    { label: 'USD (Dólares)', value: 'USD' },
    { label: 'EUR (Euros)', value: 'EUR' }
]);

const plazoOptions = ref([
    { label: '30 días', value: '30' },
    { label: '60 días', value: '60' },
    { label: '90 días', value: '90' },
    { label: '120 días', value: '120' }
]);

const riesgoOptions = ref([
    { label: 'Bajo', value: 'bajo' },
    { label: 'Medio', value: 'medio' },
    { label: 'Alto', value: 'alto' },
    { label: 'Muy Alto', value: 'muy_alto' }
]);

const industriaOptions = ref([
    { label: 'Tecnología', value: 'tecnologia' },
    { label: 'Manufactura', value: 'manufactura' },
    { label: 'Servicios', value: 'servicios' },
    { label: 'Comercio', value: 'comercio' },
    { label: 'Construcción', value: 'construccion' },
    { label: 'Agricultura', value: 'agricultura' }
]);

// Computed properties para mostrar/ocultar filtros
const showMonedaFilter = computed(() => {
    return selectedFilterType.value === 'moneda' || selectedFilterType.value === 'todos';
});

const showPlazoFilter = computed(() => {
    return selectedFilterType.value === 'plazo' || selectedFilterType.value === 'todos';
});

const showRiesgoFilter = computed(() => {
    return selectedFilterType.value === 'riesgo' || selectedFilterType.value === 'todos';
});

const showIndustriaFilter = computed(() => {
    return selectedFilterType.value === 'industria' || selectedFilterType.value === 'todos';
});

// Métodos
const onFilterTypeChange = () => {
    // Limpiar filtros cuando cambia el tipo
    if (selectedFilterType.value !== 'moneda' && selectedFilterType.value !== 'todos') {
        selectedMonedas.value = [];
    }
    if (selectedFilterType.value !== 'plazo' && selectedFilterType.value !== 'todos') {
        selectedPlazos.value = [];
    }
    if (selectedFilterType.value !== 'riesgo' && selectedFilterType.value !== 'todos') {
        selectedRiesgos.value = [];
    }
    if (selectedFilterType.value !== 'industria' && selectedFilterType.value !== 'todos') {
        selectedIndustrias.value = [];
    }
};

const applyFilters = () => {
    console.log('Filtros aplicados:', {
        tipo: selectedFilterType.value,
        monedas: selectedMonedas.value,
        plazos: selectedPlazos.value,
        riesgos: selectedRiesgos.value,
        industrias: selectedIndustrias.value
    });

    // Aquí puedes implementar la lógica para aplicar los filtros a la tabla
    // Por ejemplo, actualizar los datos o aplicar filtros específicos
};

const clearFilters = () => {
    selectedFilterType.value = null;
    selectedMonedas.value = [];
    selectedPlazos.value = [];
    selectedRiesgos.value = [];
    selectedIndustrias.value = [];

    console.log('Filtros limpiados');
};
</script>

<style scoped>

</style>