<template>
  <div>
    <button @click="iniciarFirma" :disabled="loading">
      {{ loading ? 'Generando...' : 'Generar Firma' }}
    </button>
    <div v-if="error" class="error">{{ error }}</div>
    <KeynuaWidget v-if="token" :token="token" />
  </div>
</template>

<script>
import axios from 'axios';
import KeynuaWidget from '@/components/KeynuaWidget.vue';

export default {
  components: { KeynuaWidget },
  data() {
    return {
      token: null,
      loading: false,
      error: null
    };
  },
  methods: {
    async iniciarFirma() {
      this.loading = true;
      this.error = null;
      
      try {
        const response = await axios.post('/keynua/contract', {
          name: 'Juan Perez',
          email: 'juan@example.com'
        });
        
        if (response.data.success) {
          this.token = response.data.token;
        } else {
          this.error = response.data.error;
        }
      } catch (error) {
        this.error = error.response?.data?.message || 'Error de conexión';
      } finally {
        this.loading = false;
      }
    }
  }
};
</script>