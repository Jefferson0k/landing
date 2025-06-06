<template>
    <div>
        <Accordion v-model:value="activeAccordion">
            <AccordionPanel value="0">
                <AccordionHeader>
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between w-full px-4 py-4">
                        <!-- Título y descripción -->
                        <div>
                            <h2 class="font-bold text-xl">Mi billetera</h2>
                            <p>Puedes utilizar ambas monedas al momento de hacer la inversión</p>
                            <!-- Botones de moneda con banderas - solo se muestran si está cerrado -->
                            <div v-if="!isAccordionOpen" class="mt-3 flex gap-3">
                                <Button severity="secondary" rounded class="flex items-center">
                                    <!-- Opción 1: SVG inline para Perú -->
                                    <svg class="mr-2 w-5 h-3" viewBox="0 0 3 2" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="3" height="2" fill="#D91023"/>
                                        <rect width="3" height="0.67" y="0.67" fill="#FFFFFF"/>
                                    </svg>
                                    PEN
                                </Button>
                                <Button severity="secondary" rounded class="flex items-center">
                                    <!-- Opción 1: SVG inline para USA -->
                                    <svg class="mr-2 w-5 h-3" viewBox="0 0 7410 3900" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="7410" height="3900" fill="#B22234"/>
                                        <rect width="7410" height="300" y="0" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="600" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="1200" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="1800" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="2400" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="3000" fill="#FFFFFF"/>
                                        <rect width="7410" height="300" y="3600" fill="#FFFFFF"/>
                                        <rect width="2964" height="2100" fill="#3C3B6E"/>
                                    </svg>
                                    USD
                                </Button>
                            </div>
                        </div>
                        <!-- Botones de acción -->
                        <div class="mt-4 sm:mt-0 flex gap-3">
                            <Button label="+ Depósito" severity="contrast" rounded class="bg-black text-white" />
                            <Button label="- Retiro" severity="secondary" variant="outlined" rounded />
                        </div>
                    </div>
                </AccordionHeader>
                <AccordionContent>
                    <div class="p-6 space-y-8">
                        <!-- Sección PEN -->
                        <div>
                            <div class="flex items-center gap-2 mb-6">
                                <!-- SVG para bandera de Perú -->
                                <svg class="w-6 h-4" viewBox="0 0 3 2" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="3" height="2" fill="#D91023"/>
                                    <rect width="3" height="0.67" y="0.67" fill="#FFFFFF"/>
                                </svg>
                                <h3 class="font-bold text-lg">PEN</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Card Saldo Disponible PEN -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-wallet text-gray-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Saldo disponible</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">
                                        9999999 <span class="text-sm font-normal text-gray-500">PEN</span>
                                    </p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>

                                <!-- Card Total Invertido PEN -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-chart-line text-orange-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Total invertido</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">9999999 <span
                                            class="text-sm font-normal text-gray-500">PEN</span></p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>

                                <!-- Card Retorno Total PEN -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-trending-up text-green-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Retorno total</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">9999999 <span
                                            class="text-sm font-normal text-gray-500">PEN</span></p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>
                            </div>
                        </div>

                        <!-- Sección USD -->
                        <div>
                            <div class="flex items-center gap-2 mb-6">
                                <!-- SVG para bandera de USA -->
                                <svg class="w-6 h-4" viewBox="0 0 7410 3900" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="7410" height="3900" fill="#B22234"/>
                                    <rect width="7410" height="300" y="0" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="600" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="1200" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="1800" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="2400" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="3000" fill="#FFFFFF"/>
                                    <rect width="7410" height="300" y="3600" fill="#FFFFFF"/>
                                    <rect width="2964" height="2100" fill="#3C3B6E"/>
                                </svg>
                                <h3 class="font-bold text-lg">USD</h3>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Card Saldo Disponible USD -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-wallet text-gray-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Saldo disponible</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">9999999 <span
                                            class="text-sm font-normal text-gray-500">USD</span></p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>

                                <!-- Card Total Invertido USD -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-chart-line text-orange-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Total invertido</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">9999999 <span
                                            class="text-sm font-normal text-gray-500">USD</span></p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>

                                <!-- Card Retorno Total USD -->
                                <div class="rounded-lg p-6 shadow-sm" style="background-color: #EDEAE4;">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                            <i class="pi pi-trending-up text-green-600"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Retorno total</h4>
                                        </div>
                                    </div>
                                    <p class="text-2xl font-bold text-black mb-2">9999999 <span
                                            class="text-sm font-normal text-gray-500">USD</span></p>
                                    <a href="#" class="text-blue-500 text-sm hover:underline">Ver más detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </AccordionContent>
            </AccordionPanel>
        </Accordion>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import Accordion from 'primevue/accordion';
import AccordionPanel from 'primevue/accordionpanel';
import AccordionHeader from 'primevue/accordionheader';
import AccordionContent from 'primevue/accordioncontent';
import Button from 'primevue/button';

const activeAccordion = ref(null);
const isAccordionOpen = computed(() => activeAccordion.value === '0');
</script>