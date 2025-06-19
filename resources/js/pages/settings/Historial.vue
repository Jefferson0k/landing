<template>
    <Timeline :value="inversiones" align="alternate" class="customized-timeline">
        <template #marker="slotProps">
            <span class="flex w-8 h-8 items-center justify-center text-white rounded-full z-10 shadow-sm"
                :style="{ backgroundColor: slotProps.item.resultado === 'Ganó' ? '#4CAF50' : '#F44336' }">
                <i :class="slotProps.item.resultado === 'Ganó' ? 'pi pi-thumbs-up' : 'pi pi-thumbs-down'"></i>
            </span>
        </template>

        <template #content="slotProps">
            <Card class="mt-4">
                <template #title>
                    Inversión #{{ slotProps.index + 1 }}
                </template>
                <template #subtitle>
                    {{ slotProps.item.fecha }} - Resultado: 
                    <span :class="slotProps.item.resultado === 'Ganó' ? 'text-green-600' : 'text-red-600'">
                        {{ slotProps.item.resultado }}
                    </span>
                </template>
                <template #content>
                    <p><strong>Propiedad:</strong> {{ slotProps.item.propiedad }}</p>
                    <p><strong>Monto Invertido:</strong> ${{ slotProps.item.monto }}</p>
                    <p><strong>Retorno:</strong> ${{ slotProps.item.retorno }}</p>
                </template>
            </Card>
        </template>
    </Timeline>
</template>

<script setup>
import { ref } from 'vue';
import Timeline from 'primevue/timeline';
import Card from 'primevue/card';

const inversiones = ref([
    {
        fecha: '2025-06-15 12:30',
        resultado: 'Ganó',
        propiedad: 'Casa en Miraflores',
        monto: 5000,
        retorno: 6500
    },
    {
        fecha: '2025-05-20 09:10',
        resultado: 'Perdió',
        propiedad: 'Departamento en Surco',
        monto: 4000,
        retorno: 0
    },
    {
        fecha: '2025-04-12 16:45',
        resultado: 'Ganó',
        propiedad: 'Lote en Asia',
        monto: 3000,
        retorno: 3800
    }
]);
</script>

<style lang="scss" scoped>
@media screen and (max-width: 960px) {
    ::v-deep(.customized-timeline) {
        .p-timeline-event:nth-child(even) {
            flex-direction: row;

            .p-timeline-event-content {
                text-align: left;
            }
        }

        .p-timeline-event-opposite {
            flex: 0;
        }
    }
}
</style>
