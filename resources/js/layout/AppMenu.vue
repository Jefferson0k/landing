<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import AppMenuItem from './AppMenuItem.vue';
import Avatar from 'primevue/avatar';

const page = usePage();

// Acceder a permisos del usuario
const permissions = computed(() => page.props.auth.user?.permissions ?? []);
const hasPermission = (perm) => permissions.value.includes(perm);

// Estructura del menú
const model = computed(() => [
    {
        items: [
            {
                label: 'Mi billetera',
                icon: 'pi pi-wallet',
                to: '/dashboard'
            },
            {
                label: 'Buscamos oportunidades',
                icon: 'pi pi-search',
                to: '/dashboard1'
            },
            {
                label: 'Mi dashboard',
                icon: 'pi pi-chart-bar',
                to: '/dashboard2'
            },
            {
                label: 'Información Bancaria',
                icon: 'pi pi-credit-card',
                items: [
                    {
                        label: 'Login',
                        icon: 'pi pi-sign-in',
                        to: '/auth/login'
                    },
                    {
                        label: 'Error',
                        icon: 'pi pi-times-circle',
                        to: '/auth/error'
                    }
                ]
            },
            {
                label: 'Mis datos personales',
                icon: 'pi pi-user-edit',
                to: '/dashboard3'
            },
        ]
    }
].filter(section => section.items.length > 0));
</script>

<template>
    <div class="flex flex-col h-full p-4">
        <!-- Perfil del usuario más abajo y avatar más grande -->
        <div class="flex flex-col items-center justify-center text-center mb-6 mt-6">
            <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" size="xlarge" shape="circle"
                class="mb-3 !w-40 !h-40" />
            <div class="text-lg font-bold">{{ page.props.auth.user.name }}</div>
            <div class="text-base font-bold mt-1">1234567890</div>
        </div>

        <!-- Menú lateral -->
        <ul class="layout-menu mt-8">
            <template v-for="(item, i) in model" :key="i">
                <app-menu-item :item="item" :index="i" />
            </template>
        </ul>
    </div>
</template>
