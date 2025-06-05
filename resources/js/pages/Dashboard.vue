<script setup>
import AppLayout from '@/layout/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import Password from './settings/Password.vue';
import Message from 'primevue/message';
import Button from 'primevue/button';

const page = usePage();
const mustReset = page.props.mustReset;
// Obtener el usuario autenticado
const user = page.props.auth.user;
</script>

<template>
  <Head title="Dashboard" />
  <div v-if="mustReset">
    <div>
      <Password />
    </div>
  </div>
  <AppLayout v-else>
    <div class="card" style="background-color: #6790FF; color: white; padding: 2rem; border-radius: 12px; margin-bottom: 2rem;">
      <!-- Mensaje de bienvenida al panel administrativo -->
      <h2>Bienvenido {{ user.name }} a tu panel administrativo</h2>
    </div>
  </AppLayout>
</template>