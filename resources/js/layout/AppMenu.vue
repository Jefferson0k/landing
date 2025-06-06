<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AppMenuItem from './AppMenuItem.vue';
import Avatar from 'primevue/avatar';
import Button from 'primevue/button';
import OverlayBadge from 'primevue/overlaybadge';

const page = usePage();

// Acceder a permisos del usuario
const permissions = computed(() => page.props.auth.user?.permissions ?? []);
const hasPermission = (perm) => permissions.value.includes(perm);

// Estructura del menú con iconos de PrimeIcons
const model = computed(() => [
    {
        items: [
            { label: 'Mi billetera', icon: 'pi pi-wallet', to: '/dashboard' },
            { label: 'Buscamos oportunidades', icon: 'pi pi-search-plus', to: '/Buscar/Oportunidades' },
            { label: 'Mi dashboard', icon: 'pi pi-chart-line', to: '/dashboard2' },
            {
                label: 'Información Bancaria', icon: 'pi pi-building',
                items: [
                    { label: 'Cuentas', icon: 'pi pi-list', to: '/auth/login' },
                    { label: 'Estado de cuentas', icon: 'pi pi-file-pdf', to: '/auth/error' }
                ]
            },
            { label: 'Mis datos personales', icon: 'pi pi-user-edit', to: '/dashboard3' },
        ]
    }
].filter(section => section.items.length > 0));
</script>

<template>
    <div class="flex flex-col h-full p-4">
        <!-- Perfil del usuario -->
        <div class="flex flex-col items-center justify-center text-center mb-8 mt-4">
            <OverlayBadge value="4" severity="danger" class="inline-flex">

            <Avatar image="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRxXXkXxmSjKzi69Qjr2aBUtLK6IeZ5XfrSZe8zEyUkxYSt_C-9" size="xlarge" shape="circle"
                class="mb-6 !w-48 !h-48 shadow-lg" />
                </OverlayBadge>

            <div class="text-xl font-bold mb-3">{{ page.props.auth.user.name }}</div>
            <div class="text-lg font-semibold">1234567890</div>
        </div>

        <!-- Menú lateral -->
        <ul class="layout-menu mb-8">
            <template v-for="(item, i) in model" :key="i">
                <app-menu-item :item="item" :index="i" />
            </template>
        </ul>
        <!-- Card + botones + imagen -->
        <div class="mt-auto w-full flex flex-col items-center gap-6">
            <!-- Card personalizado sin el componente Card -->
            
            <!-- Botones informativos con más separación -->
            <div class="flex flex-col gap-4 w-full max-w-64">
                <Button label="¿Por qué invertir con nosotros?" severity="contrast" class="w-full justify-center"
                    rounded />
                <Button label="Preguntas frecuentes" class="w-full justify-center text-black" severity="contrast"
                    rounded />
            </div>
        </div>
    </div>
</template>