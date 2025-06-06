<template>
  <div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Firma 3D con Keynua</h2>
    
    <Button
      label="Crear contrato e iniciar firma 3D"
      icon="pi pi-video"
      @click="crearContrato"
      :loading="cargando"
      severity="success"
      class="mb-6"
    />
    
    <div v-if="error" class="p-3 mb-6 border border-red-500 text-red-700 rounded bg-red-50">
      <strong>Error:</strong> {{ error }}
    </div>
    
    <div v-if="contratoCreado && !token" class="p-3 mb-6 border border-blue-500 text-blue-700 rounded bg-blue-50">
      <strong>Info:</strong> Contrato creado exitosamente, cargando widget...
    </div>
    
    <div v-if="token" class="mb-4">
      <div class="p-3 mb-4 border border-green-500 text-green-700 rounded bg-green-50">
        <strong>Éxito:</strong> Widget de firma cargado correctamente
      </div>
      <div id="keynua-widget-container"></div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import axios from 'axios';
import Button from 'primevue/button';

const cargando = ref(false);
const error = ref(null);
const token = ref(null);
const contratoCreado = ref(false);

// Tus credenciales (reemplaza con las reales)
const API_KEY = '42m8MvTF1ma1C9rVqmDoZ75aOxinzYDga7sT5t7J';
const API_TOKEN = 'ZjA3ZWMwZWEtNGM2OC00ODQ0LWE0MjMtZTY1Y2JiOTlhNzhmOjY2N2Y1NDQzODVlYTQwZTA4NWQ1YzY3OWY1ZGQzZDZmOjkyZTJjNjc0MTZlN2YzMGJjNzMwNGI1YzQwZjg2MmU0YmZkNzE5ZDMzNjc3MTQxMWY2ZTllYTU4YzkxNDFlZTA';

const crearContrato = async () => {
  cargando.value = true;
  error.value = null;
  token.value = null;
  contratoCreado.value = false;
  
  console.log('🚀 Iniciando creación de contrato...');
  
  try {
    const payload = {
      templateId: 'shortcode-3d',
      signer: {
        name: 'Susana Llontop',
        email: 'susana@example.com',
        documentNumber: '12345678',
        documentType: 'DNI'
      },
      mode: 'development'
    };
    
    console.log('📤 Payload enviado:', payload);
    console.log('🔑 API Key:', API_KEY);
    console.log('🎫 Token (primeros 50 chars):', API_TOKEN.substring(0, 50) + '...');
    
    const response = await axios.post(
      'https://api.stg.keynua.com/api/contracts',
      payload,
      {
        headers: {
          'Content-Type': 'application/json',
          'Authorization': `Bearer ${API_TOKEN}`,
          'x-api-key': API_KEY
        }
      }
    );
    
    console.log('✅ Respuesta completa de la API:', response.data);
    console.log('📊 Status de respuesta:', response.status);
    console.log('📋 Headers de respuesta:', response.headers);
    
    contratoCreado.value = true;
    
    // Extraemos el token del primer firmante
    const firstSigner = response.data.users?.[0];
    console.log('👤 Primer firmante encontrado:', firstSigner);
    
    if (firstSigner?.token) {
      console.log('🎯 Token obtenido:', firstSigner.token);
      token.value = firstSigner.token;
    } else {
      console.error('❌ No se encontró token en la respuesta');
      console.error('👥 Estructura de users:', response.data.users);
      console.error('🏗️ Estructura completa:', JSON.stringify(response.data, null, 2));
      error.value = 'No se pudo obtener el token para el firmante. Revisa la consola para más detalles.';
    }
  } catch (e) {
    console.error('💥 Error completo:', e);
    console.error('📄 Response data:', e.response?.data);
    console.error('🔢 Response status:', e.response?.status);
    console.error('📊 Response headers:', e.response?.headers);
    
    let errorMessage = 'Error desconocido';
    
    if (e.response?.data?.message) {
      errorMessage = e.response.data.message;
    } else if (e.response?.data?.error) {
      errorMessage = e.response.data.error;
    } else if (e.response?.data) {
      errorMessage = JSON.stringify(e.response.data);
    } else if (e.message) {
      errorMessage = e.message;
    }
    
    error.value = `Error al crear el contrato: ${errorMessage}`;
  } finally {
    cargando.value = false;
  }
};

// Cargar el script del widget de Keynua solo cuando haya token
watch(token, (newToken) => {
  if (newToken) {
    console.log('🎬 Token detectado, cargando widget...');
    cargarWidget(newToken);
  }
});

function cargarScript(url) {
  return new Promise((resolve, reject) => {
    // Verificar si el script ya está cargado
    if (document.querySelector(`script[src="${url}"]`)) {
      console.log('📜 Script ya cargado:', url);
      resolve();
      return;
    }
    
    console.log('⬇️ Cargando script:', url);
    const script = document.createElement('script');
    script.src = url;
    script.onload = () => {
      console.log('✅ Script cargado exitosamente:', url);
      resolve();
    };
    script.onerror = (e) => {
      console.error('❌ Error al cargar script:', url, e);
      reject(e);
    };
    document.head.appendChild(script);
  });
}

async function cargarWidget(token) {
  console.log('🎨 Cargando widget con token:', token);
  
  try {
    // Carga el script oficial (modo staging para pruebas)
    await cargarScript('https://sign.stg.keynua.com/widgets/widget.js');
    
    // Dar un pequeño delay para asegurar que el script se inicialice
    await new Promise(resolve => setTimeout(resolve, 100));
    
    console.log('🔍 Verificando window.Keynua:', window.Keynua);
    console.log('🌐 Objetos globales disponibles:', Object.keys(window).filter(k => k.includes('Keynua') || k.includes('keynua')));
    
    if (window.Keynua && typeof window.Keynua.run === 'function') {
      console.log('🚀 Inicializando widget...');
      
      const widgetConfig = {
        token: token,
        widgetContainerId: 'keynua-widget-container'
      };
      
      console.log('⚙️ Configuración del widget:', widgetConfig);
      
      window.Keynua.run(widgetConfig);
      console.log('✨ Widget inicializado exitosamente');
    } else {
      console.error('❌ window.Keynua no está disponible o no tiene el método run');
      console.error('🔧 Tipo de window.Keynua:', typeof window.Keynua);
      console.error('📋 Propiedades disponibles:', window.Keynua ? Object.keys(window.Keynua) : 'N/A');
      error.value = 'No se pudo inicializar el widget de Keynua. El script no se cargó correctamente.';
    }
  } catch (e) {
    console.error('💥 Error al cargar widget:', e);
    error.value = `Error al cargar el widget de Keynua: ${e.message}`;
  }
}

// Limpiar el contenedor del widget al desmontar el componente
onMounted(() => {
  console.log('🎭 Componente montado');
});
</script>

<style scoped>
#keynua-widget-container {
  min-height: 500px;
  border: 2px dashed #e5e7eb;
  border-radius: 8px;
  background-color: #f9fafb;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

#keynua-widget-container:empty::before {
  content: "El widget de Keynua se cargará aquí...";
  color: #6b7280;
  font-style: italic;
}

/* Cuando el widget se carga, remover el estilo de placeholder */
#keynua-widget-container:not(:empty) {
  border: 1px solid #d1d5db;
  background-color: white;
}

.p-button {
  transition: all 0.2s ease;
}

.p-button:hover {
  transform: translateY(-1px);
}
</style>