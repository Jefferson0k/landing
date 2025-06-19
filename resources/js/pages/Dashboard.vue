<script setup>
import { ref } from "vue";
import AppLayout from '@/layout/AppLayout.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import Password from './settings/Password.vue';
import Breadcrumb from 'primevue/breadcrumb';
import StatsWidget from '@/components/dashboard/StatsWidget.vue';
import BestSellingWidget from "@/components/dashboard/BestSellingWidget.vue";
import NotificationsWidget from "@/components/dashboard/NotificationsWidget.vue";
import RecentSalesWidget from "@/components/dashboard/RecentSalesWidget.vue";
import Button from "primevue/button";
const page = usePage();
const mustReset = page.props.mustReset;

const user = page.props.auth.user;

const home = ref({
  icon: 'pi pi-home',
  route: '/dashboard'
});

const items = ref([
  { label: 'Prestamos hipotecarios', disabled: true },
  { label: 'Mi perfil del inversionista', icon: 'pi pi-bolt', route: '/dashboard3' },
]);

function verOportunidades() {
  router.visit('/Buscar/Oportunidades');
}
</script>

<template>

  <Head title="Dashboard" />

  <div v-if="mustReset">
    <div>
      <Password />
    </div>
  </div>

  <AppLayout v-else>
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
      <div class="card"
        style="background-color: #6790FF; color: white; padding: 2rem; border-radius: 12px; margin-bottom: 2rem;">
        <h2>Bienvenido [ {{ user.name }} ]a tu perfil del inversionista</h2>
      </div>
      <StatsWidget />

    <BestSellingWidget />
    <br>
    <div class="grid grid-cols-12 gap-8">
      <div class="col-span-12 xl:col-span-6">
        <NotificationsWidget />
      </div>
      <div class="col-span-12 xl:col-span-6">
        <RecentSalesWidget />
      </div>
    </div>
    <br>
    <!-- Aquí el bloque con texto y botón centrado -->
    <div class="card">
      <h3 class="text-center font-semibold mb-4">Encuentra más oportunidades para invertir</h3>
      <div class="flex justify-center">
        <Button label="Ver oportunidades" rounded @click="verOportunidades" />
      </div>
    </div>

  </AppLayout>
</template>
