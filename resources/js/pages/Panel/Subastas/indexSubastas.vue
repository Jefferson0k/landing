<template>

    <Head title="Subasta Online" />
    <AppLayout>
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

        <br />
        <div class="p-4 space-y-6">
            <ListHistorialOnline />
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { ref } from "vue";
import AppLayout from '@/layout/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import Breadcrumb from 'primevue/breadcrumb';
import ListHistorialOnline from "./Desarrollo/ListHistorialOnline.vue";
import ListSubastasOnline from "./Desarrollo/ListSubastasOnline.vue";

const items = ref([
    { label: 'Prestamos hipotecarios', disabled: true },
    { label: 'Mi perfil del inversionista', icon: 'pi pi-bolt', route: '/dashboard3' },
]);

const home = { icon: 'pi pi-home', route: '/' };
</script>
