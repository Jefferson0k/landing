<template>
  <div class="p-4">
    <button @click="iniciarFirma" :disabled="loading" class="px-4 py-2 bg-blue-500 text-white rounded">
      Iniciar Firma
    </button>

    <p v-if="status">Estado: {{ status }}</p>

    <iframe
      v-if="iframeUrl"
      :src="iframeUrl"
      width="100%"
      height="600"
      frameborder="0"
      allowfullscreen
    ></iframe>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const status = ref('')
const iframeUrl = ref('')
const signatureId = ref('')
const loading = ref(false)

const iniciarFirma = async () => {
  loading.value = true
  status.value = ''
  try {
    const res = await axios.post('/keynua/initiate')
    iframeUrl.value = res.data.link
    signatureId.value = res.data.id
    status.value = 'Proceso iniciado'
    checkEstado()
  } catch (error) {
    console.error(error)
    status.value = 'Error iniciando firma'
  } finally {
    loading.value = false
  }
}

const checkEstado = async () => {
  const interval = setInterval(async () => {
    try {
      const res = await axios.get(`/keynua/status/${signatureId.value}`)
      status.value = res.data.status
      if (['completed', 'declined'].includes(res.data.status)) {
        clearInterval(interval)
      }
    } catch (e) {
      console.error(e)
    }
  }, 3000)
}
</script>
