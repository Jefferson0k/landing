<script setup>
import { ref } from "vue";
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layout/AppLayout.vue';
import Breadcrumb from 'primevue/breadcrumb';
import Button from 'primevue/button';
import ListFacturasOportunidades from "./ListFacturasOportunidades.vue";

const home = ref({
    icon: 'pi pi-home',
    route: '/dashboard'
});

const items = ref([
    { label: 'Factoring', disabled: true },
    { label: 'Mi perfil del inversionista', icon: 'pi pi-bolt', route: '/dashboard3' },
]);

const selectedCurrency = ref('PEN');
const selectedCurrency1 = ref('USD');

const walletData = ref({
    PEN: {
        balance: '99,999.99',
        currency: 'PEN'
    },
    USD: {
        balance: '49,999.50',
        currency: 'USD'
    }
});
</script>

<template>
    <Head title="Buscamos Oportunidades" />
    <AppLayout>
        <div>
            <Breadcrumb :home="home" :model="items">
                <template #item="{ item, props }">
                    <Link v-if="item.route && !item.disabled" :href="item.route" v-bind="props.action">
                        <span v-if="item.icon" :class="[item.icon, 'text-color mr-2']" style="font-weight: 300;" />
                        <span class="text-primary font-semibold">{{ item.label }}</span>
                    </Link>
                    <span v-else-if="item.disabled" class="text-surface-400 dark:text-surface-500 cursor-not-allowed">
                        {{ item.label }}
                    </span>
                    <a v-else :href="item.url" :target="item.target" v-bind="props.action">
                        <span v-if="item.icon" :class="[item.icon, 'text-color mr-2']" style="font-weight: 300;" />
                        <span class="text-surface-700 dark:text-surface-0">{{ item.label }}</span>
                    </a>
                </template>
            </Breadcrumb>
            <br>
        </div>

        <div class="card p-4 sm:p-6 rounded-2xl" >
            <!-- Layout responsive: stack vertical en móvil, horizontal en desktop -->
            <div class="flex flex-col lg:flex-row lg:items-start gap-6">
                <!-- Sección de descripción -->
                <div class="flex-1 lg:max-w-md">
                    <h1 class="text-xl sm:text-2xl font-bold mb-2">Mi billetera</h1>
                    <p class=" text-sm sm:text-base">
                        Puedes utilizar ambas monedas al momento de hacer la inversión
                    </p>
                </div>

                <!-- Sección de monedas -->
                <div class="flex-1">
                    <!-- Layout responsive para las monedas: stack vertical en móvil, horizontal en tablet+ -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-6">
                        <!-- Columna PEN -->
                        <div class="space-y-3">
                            <Button severity="secondary" rounded class="flex items-center justify-center w-full sm:w-auto font-bold text-base sm:text-lg">
                                <svg class="mr-2 w-5 h-3 flex-shrink-0" viewBox="0 0 3 2" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="3" height="2" fill="#D91023" />
                                    <rect width="3" height="0.67" y="0.67" fill="#FFFFFF" />
                                </svg>
                                PEN
                            </Button>

                            <div class="card p-4">
                                <p class="text-xs sm:text-sm text-surface-600 dark:text-surface-400 flex items-center mb-2">
                                    <i class="pi pi-wallet mr-2 text-sm sm:text-base flex-shrink-0" /> 
                                    <span>Saldo disponible</span>
                                </p>
                                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold mb-2 break-all">
                                    {{ walletData.PEN.balance }}
                                    <span class="text-xs sm:text-sm ml-1">{{ selectedCurrency }}</span>
                                </h2>
                                <a href="#" class="text-blue-500 text-xs sm:text-sm hover:underline">Ver más detalles</a>
                            </div>
                        </div>

                        <!-- Columna USD -->
                        <div class="space-y-3">
                            <Button severity="secondary" rounded class="flex items-center justify-center w-full sm:w-auto font-bold text-base sm:text-lg">
                                <svg class="mr-2 w-5 h-3 flex-shrink-0" viewBox="0 0 7410 3900" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="7410" height="3900" fill="#B22234" />
                                    <rect width="7410" height="300" y="0" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="600" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="1200" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="1800" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="2400" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="3000" fill="#FFFFFF" />
                                    <rect width="7410" height="300" y="3600" fill="#FFFFFF" />
                                    <rect width="2964" height="2100" fill="#3C3B6E" />
                                </svg>
                                USD
                            </Button>

                            <div class="card p-4">
                                <p class="text-xs sm:text-sm text-surface-600 dark:text-surface-400 flex items-center mb-2">
                                    <i class="pi pi-wallet mr-2 text-sm sm:text-base flex-shrink-0" /> 
                                    <span>Saldo disponible</span>
                                </p>
                                <h2 class="text-lg sm:text-xl lg:text-2xl font-semibold mb-2 break-all">
                                    {{ walletData.USD.balance }}
                                    <span class="text-xs sm:text-sm ml-1">{{ selectedCurrency1 }}</span>
                                </h2>
                                <a href="#" class="text-blue-500 text-xs sm:text-sm hover:underline">Ver más detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <ListFacturasOportunidades />
    </AppLayout>
</template>

<style scoped></style>