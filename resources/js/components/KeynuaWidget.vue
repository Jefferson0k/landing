<template>
  <div>
    <Button label="Iniciar firma con Keynua" @click="obtenerToken" :loading="loading" :disabled="loading" />

    <div v-if="error" class="error-message">
      {{ error }}
    </div>

    <iframe v-if="token" :src="`https://slate.keynua.com/widget?flow=signature&token=${token}`" width="100%"
      height="600" style="border: none; margin-top: 1rem;">
    </iframe>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Button from 'primevue/button';

const token = ref(null);
const loading = ref(false);
const error = ref(null);

async function obtenerToken() {
  loading.value = true;
  error.value = null;

  try {
    const response = await axios.post('/keynua/session', {
      user_id: 1,
      name: 'Juan Pérez',
      email: 'juan@example.com',
      document_url: 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
      document_name: 'Contrato de Servicios',
    });

    if (response.data.token) {
      token.value = response.data.token;
    } else {
      throw new Error('No se recibió el token');
    }

  } catch (err) {
    console.error('Error al obtener token:', err);
    // Mostrar errores más detallados del backend
    error.value = err.response?.data?.errors
      ? JSON.stringify(err.response.data.errors)
      : err.response?.data?.message || 'Error al conectar con el servidor';
  } finally {
    loading.value = false;
  }
}
</script>

<style scoped>
iframe {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.error-message {
  background-color: #fee;
  color: #c33;
  padding: 0.75rem;
  border-radius: 4px;
  margin-top: 1rem;
  border: 1px solid #fcc;
}
</style>
