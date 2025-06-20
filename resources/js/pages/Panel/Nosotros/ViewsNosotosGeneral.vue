<template>
  <Head title="Nosotros" />
  <div class="bg-surface-0 dark:bg-surface-900">
    <div id="home" class="landing-wrapper overflow-hidden bg-[#6790FF]">
      <div
        class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static"
      >
        <TopbarWidget />
      </div>

      <!-- Sección Nosotros -->
      <section
        class="flex flex-col gap-16 py-20 px-6 lg:px-24 bg-gradient-to-br from-[#EDEAE4] to-[#F5F2EC]"
      >
        <!-- Título principal -->
        <div class="text-center mb-10">
          <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-800 mb-4 tracking-tight">
            NOSOTROS
          </h1>
        </div>

        <!-- Quiénes Somos -->
        <div class="max-w-4xl mx-auto">
          <div class="bg-white rounded-3xl shadow-xl p-10 lg:p-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">
              Quiénes Somos
            </h2>
            <p class="text-gray-700 text-lg leading-relaxed">
              En Zuma construimos una comunidad de inversionistas. Nuestro rol pasa por educar y presentar oportunidades de fácil entendimiento, sin letra pequeña ni mensajes ocultos. Buscamos ofrecer una diversidad de herramientas de inversión que estén al alcance del común de los bolsillos. En las sociedades donde operamos, la mayoría de las personas aún no rentabilizan adecuadamente sus excedentes. En muchos casos por desconocimiento o temor. Las alternativas de inversión disponibles en el mercado están orientadas a personas de alto patrimonio. Aquellos que cuentan con pequeños excedentes, no son tomados en cuenta. Es así que nace Zuma, una plataforma creada para conectar, educar y crear riqueza, dirigida para aquellos que recién se inician en el mundo de las inversiones o que buscan algo diferente.
            </p>
          </div>
        </div>

        <!-- Misión, Visión y Propósito -->
        <div class="grid gap-8 lg:grid-cols-3">
          <!-- Misión -->
          <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
              <div class="text-blue-600 text-2xl">🎯</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Misión</h3>
            <p class="text-gray-600 leading-relaxed">
              Brindar acceso a alternativas de inversión de forma ágil, fácil y confiable.
            </p>
          </div>

          <!-- Visión -->
          <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
              <div class="text-purple-600 text-2xl">👁️</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Visión</h3>
            <p class="text-gray-600 leading-relaxed">
              Convertirnos en el market place líder de inversiones alternativas en Latinoamérica.
            </p>
          </div>

          <!-- Propósito -->
          <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
              <div class="text-green-600 text-2xl">🌟</div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Propósito</h3>
            <p class="text-gray-600 leading-relaxed">
              Democratizar el acceso a instrumentos de inversión.
            </p>
          </div>
        </div>

        <!-- Formulario de Contacto -->
        <div class="max-w-2xl mx-auto">
          <div class="bg-white rounded-3xl shadow-xl p-10 lg:p-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">
              Recibe Asesoría
            </h2>
            <p class="text-gray-600 text-center mb-8">
              Contáctanos y te ayudaremos a encontrar la mejor opción de inversión para ti
            </p>
            
            <form @submit.prevent="submitForm" class="space-y-6">
              <!-- Nombre y Apellido -->
              <div class="flex flex-col gap-2">
                <label for="nombre" class="text-sm font-medium text-gray-700">
                  Nombre y Apellido *
                </label>
                <InputText
                  id="nombre"
                  v-model="form.nombre"
                  placeholder="Ingresa tu nombre completo"
                  :class="{ 'p-invalid': errors.nombre }"
                  class="w-full"
                />
                <small v-if="errors.nombre" class="p-error">{{ errors.nombre }}</small>
              </div>

              <!-- Teléfono -->
              <div class="flex flex-col gap-2">
                <label for="telefono" class="text-sm font-medium text-gray-700">
                  Teléfono *
                </label>
                <InputText
                  id="telefono"
                  v-model="form.telefono"
                  placeholder="Ingresa tu número de teléfono"
                  :class="{ 'p-invalid': errors.telefono }"
                  class="w-full"
                />
                <small v-if="errors.telefono" class="p-error">{{ errors.telefono }}</small>
              </div>

              <!-- Correo -->
              <div class="flex flex-col gap-2">
                <label for="correo" class="text-sm font-medium text-gray-700">
                  Correo Electrónico *
                </label>
                <InputText
                  id="correo"
                  v-model="form.correo"
                  type="email"
                  placeholder="Ingresa tu correo electrónico"
                  :class="{ 'p-invalid': errors.correo }"
                  class="w-full"
                />
                <small v-if="errors.correo" class="p-error">{{ errors.correo }}</small>
              </div>

              <!-- Producto de Interés -->
              <div class="flex flex-col gap-2">
                <label for="producto" class="text-sm font-medium text-gray-700">
                  Producto de Interés *
                </label>
                <Dropdown
                  id="producto"
                  v-model="form.producto"
                  :options="productos"
                  optionLabel="name"
                  optionValue="code"
                  placeholder="Selecciona un producto"
                  :class="{ 'p-invalid': errors.producto }"
                  class="w-full"
                />
                <small v-if="errors.producto" class="p-error">{{ errors.producto }}</small>
              </div>

              <!-- Mensaje -->
              <div class="flex flex-col gap-2">
                <label for="mensaje" class="text-sm font-medium text-gray-700">
                  Mensaje
                </label>
                <Textarea
                  id="mensaje"
                  v-model="form.mensaje"
                  rows="4"
                  placeholder="Cuéntanos cómo podemos ayudarte..."
                  class="w-full"
                />
              </div>

              <!-- Botón de Envío -->
              <Button
                type="submit"
                label="Enviar Solicitud"
                :loading="loading"
                class="w-full"
                size="large"
              />
            </form>
          </div>
        </div>
      </section>

      <FooterWidget />
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'
import TopbarWidget from '@/components/landing/TopbarWidget.vue'
import FooterWidget from '@/components/landing/FooterWidget.vue'
import InputText from 'primevue/inputtext'
import Dropdown from 'primevue/dropdown'
import Textarea from 'primevue/textarea'
import Button from 'primevue/button'

// Estado del formulario
const form = ref({
  nombre: '',
  telefono: '',
  correo: '',
  producto: null,
  mensaje: ''
})

// Errores de validación
const errors = ref({})

// Estado de carga
const loading = ref(false)

// Opciones de productos
const productos = ref([
  { name: 'Cash Flow', code: 'cash-flow' },
  { name: 'Hipotecash', code: 'hipotecash' },
  { name: 'Convierte tu dinero', code: 'convierte-tu-dinero' }
])

// Función de validación
const validateForm = () => {
  errors.value = {}
  
  if (!form.value.nombre.trim()) {
    errors.value.nombre = 'El nombre es requerido'
  }
  
  if (!form.value.telefono.trim()) {
    errors.value.telefono = 'El teléfono es requerido'
  }
  
  if (!form.value.correo.trim()) {
    errors.value.correo = 'El correo es requerido'
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.value.correo)) {
    errors.value.correo = 'El correo no tiene un formato válido'
  }
  
  if (!form.value.producto) {
    errors.value.producto = 'Debe seleccionar un producto'
  }
  
  return Object.keys(errors.value).length === 0
}

// Función para enviar el formulario
const submitForm = async () => {
  if (!validateForm()) {
    return
  }
  
  loading.value = true
  
  try {
    // Aquí iría la lógica para enviar el formulario
    console.log('Formulario enviado:', form.value)
    
    // Simular envío
    await new Promise(resolve => setTimeout(resolve, 2000))
    
    // Limpiar formulario después del envío exitoso
    form.value = {
      nombre: '',
      telefono: '',
      correo: '',
      producto: null,
      mensaje: ''
    }
    
    // Aquí podrías mostrar un mensaje de éxito
    alert('¡Formulario enviado correctamente! Nos pondremos en contacto contigo pronto.')
    
  } catch (error) {
    console.error('Error al enviar formulario:', error)
    alert('Hubo un error al enviar el formulario. Por favor, inténtalo de nuevo.')
  } finally {
    loading.value = false
  }
}
</script>