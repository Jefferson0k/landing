<template>
  <Head title="Contáctanos" />
  <div class="bg-surface-0 dark:bg-surface-900">
    <div id="home" class="landing-wrapper overflow-hidden bg-[#6790FF]">
      <div
        class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static"
      >
        <TopbarWidget />
      </div>

      <!-- Sección de Contacto -->
      <section class="flex flex-col gap-14 py-20 px-6 lg:px-24 bg-gradient-to-br from-[#EDEAE4] to-[#F5F2EC]">
        <div class="max-w-6xl mx-auto w-full">
          <!-- Encabezado -->
          <div class="text-center mb-16">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">
              Contáctanos
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
              Estamos aquí para ayudarte. Completa el formulario y uno de nuestros asesores se pondrá en contacto contigo.
            </p>
          </div>

          <div class="grid lg:grid-cols-2 gap-12 items-start">
            <!-- Formulario de Contacto -->
            <Card class="shadow-xl">
              <template #title>
                <div class="flex items-center gap-3">
                  <i class="pi pi-envelope text-2xl text-[#6790FF]"></i>
                  <span class="text-2xl font-bold text-gray-800">Recibe Asesoría</span>
                </div>
              </template>
              
              <template #content>
                <form @submit.prevent="submitForm" class="space-y-6">
                  <!-- Nombre y Apellido -->
                  <div>
                    <label for="fullName" class="block text-sm font-semibold text-gray-700 mb-2">
                      Nombre y Apellido *
                    </label>
                    <InputText
                      id="fullName"
                      v-model="form.fullName"
                      placeholder="Ingresa tu nombre completo"
                      class="w-full"
                      :class="{ 'p-invalid': errors.fullName }"
                    />
                    <small v-if="errors.fullName" class="p-error">{{ errors.fullName }}</small>
                  </div>

                  <!-- Teléfono -->
                  <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                      Teléfono *
                    </label>
                    <InputText
                      id="phone"
                      v-model="form.phone"
                      placeholder="Ej: +51 999 888 777"
                      class="w-full"
                      :class="{ 'p-invalid': errors.phone }"
                    />
                    <small v-if="errors.phone" class="p-error">{{ errors.phone }}</small>
                  </div>

                  <!-- Correo -->
                  <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                      Correo Electrónico *
                    </label>
                    <InputText
                      id="email"
                      v-model="form.email"
                      type="email"
                      placeholder="tu@email.com"
                      class="w-full"
                      :class="{ 'p-invalid': errors.email }"
                    />
                    <small v-if="errors.email" class="p-error">{{ errors.email }}</small>
                  </div>

                  <!-- Producto de Interés -->
                  <div>
                    <label for="product" class="block text-sm font-semibold text-gray-700 mb-2">
                      Producto de Interés *
                    </label>
                    <Dropdown
                      id="product"
                      v-model="form.product"
                      :options="productOptions"
                      optionLabel="name"
                      optionValue="value"
                      placeholder="Selecciona un producto"
                      class="w-full"
                      :class="{ 'p-invalid': errors.product }"
                    />
                    <small v-if="errors.product" class="p-error">{{ errors.product }}</small>
                  </div>

                  <!-- Mensaje -->
                  <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                      Mensaje
                    </label>
                    <Textarea
                      id="message"
                      v-model="form.message"
                      placeholder="Cuéntanos cómo podemos ayudarte..."
                      rows="5"
                      class="w-full"
                    />
                  </div>

                  <!-- Checkbox de Privacidad -->
                  <div class="flex items-start gap-3">
                    <Checkbox
                      id="privacy"
                      v-model="form.privacyAccepted"
                      :binary="true"
                      :class="{ 'p-invalid': errors.privacyAccepted }"
                    />
                    <label for="privacy" class="text-sm text-gray-600 leading-5">
                      Autorizo el uso de mis datos personales para fines comerciales y de marketing, 
                      de acuerdo con la 
                      <a href="#" class="text-[#6790FF] underline hover:text-[#5577DD]">
                        política de privacidad de Zuma
                      </a>
                    </label>
                  </div>
                  <small v-if="errors.privacyAccepted" class="p-error block">{{ errors.privacyAccepted }}</small>

                  <!-- Botón de Envío -->
                  <Button
                    type="submit"
                    label="Enviar Mensaje"
                    icon="pi pi-send"
                    class="w-full p-3 text-lg font-semibold"
                    :loading="isSubmitting"
                  />
                </form>
              </template>
            </Card>

            <!-- Información de Contacto y WhatsApp -->
            <div class="space-y-8">
              <!-- Botón WhatsApp -->
              <Card class="shadow-xl bg-gradient-to-r from-green-500 to-green-600 text-white">
                <template #content>
                  <div class="text-center">
                    <i class="pi pi-whatsapp text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold mb-3">¿Necesitas ayuda inmediata?</h3>
                    <p class="mb-6">
                      Chatea con nosotros por WhatsApp y recibe atención personalizada
                    </p>
                    <Button
                      label="Chatear por WhatsApp"
                      icon="pi pi-whatsapp"
                      class="bg-white text-green-600 hover:bg-green-50 border-white font-semibold p-3"
                      @click="openWhatsApp"
                    />
                  </div>
                </template>
              </Card>

              <!-- Newsletter -->
              <Card class="shadow-xl">
                <template #title>
                  <div class="flex items-center gap-3">
                    <i class="pi pi-bell text-2xl text-[#6790FF]"></i>
                    <span class="text-xl font-bold text-gray-800">Mantente Informado</span>
                  </div>
                </template>
                
                <template #content>
                  <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-gray-800">
                      ¡Sé el primero en enterarte de las subastas de facturas!
                    </h4>
                    <p class="text-gray-600">
                      Déjanos tu correo electrónico y recibe notificaciones sobre nuevas oportunidades de inversión.
                    </p>
                    
                    <div class="flex gap-2">
                      <InputText
                        v-model="newsletter.email"
                        placeholder="tu@email.com"
                        class="flex-1"
                        :class="{ 'p-invalid': newsletter.error }"
                      />
                      <Button
                        label="Suscribirse"
                        icon="pi pi-check"
                        @click="subscribeNewsletter"
                        :loading="newsletter.isSubmitting"
                      />
                    </div>
                    <small v-if="newsletter.error" class="p-error">{{ newsletter.error }}</small>
                    <small v-if="newsletter.success" class="text-green-600">¡Suscripción exitosa!</small>
                    
                    <div class="flex items-start gap-2 mt-4">
                      <Checkbox
                        id="newsletterPrivacy"
                        v-model="newsletter.privacyAccepted"
                        :binary="true"
                      />
                      <label for="newsletterPrivacy" class="text-xs text-gray-500 leading-4">
                        Autorizo el uso de mis datos personales para fines comerciales y de marketing
                      </label>
                    </div>
                  </div>
                </template>
              </Card>

              <!-- Información Adicional -->
              <div class="grid grid-cols-1 gap-4">
                <div class="flex items-center gap-4 p-4 bg-white rounded-lg shadow-md">
                  <i class="pi pi-map-marker text-2xl text-[#6790FF]"></i>
                  <div>
                    <h5 class="font-semibold text-gray-800">Oficina Principal</h5>
                    <p class="text-gray-600">Lima, Perú</p>
                  </div>
                </div>
                
                <div class="flex items-center gap-4 p-4 bg-white rounded-lg shadow-md">
                  <i class="pi pi-clock text-2xl text-[#6790FF]"></i>
                  <div>
                    <h5 class="font-semibold text-gray-800">Horario de Atención</h5>
                    <p class="text-gray-600">Lunes a Viernes: 9:00 - 18:00</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <FooterWidget />
    </div>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import { ref, reactive } from 'vue'
import TopbarWidget from '@/components/landing/TopbarWidget.vue'
import FooterWidget from '@/components/landing/FooterWidget.vue'

// Componentes PrimeVue
import Card from 'primevue/card'
import InputText from 'primevue/inputtext'
import Textarea from 'primevue/textarea'
import Dropdown from 'primevue/dropdown'
import Button from 'primevue/button'
import Checkbox from 'primevue/checkbox'

// Formulario principal
const form = reactive({
  fullName: '',
  phone: '',
  email: '',
  product: '',
  message: '',
  privacyAccepted: false
})

const errors = reactive({
  fullName: '',
  phone: '',
  email: '',
  product: '',
  privacyAccepted: ''
})

const isSubmitting = ref(false)

// Opciones de productos
const productOptions = [
  { name: 'Cash Flow - Factoring de facturas', value: 'cash_flow' },
  { name: 'Hipotecash - Créditos hipotecarios', value: 'hipotecash' },
  { name: 'Convierte tu dinero - Inversiones', value: 'convierte_dinero' }
]

// Newsletter
const newsletter = reactive({
  email: '',
  privacyAccepted: false,
  isSubmitting: false,
  error: '',
  success: false
})

// Validación del formulario
const validateForm = () => {
  let isValid = true
  
  // Reset errors
  Object.keys(errors).forEach(key => errors[key] = '')
  
  if (!form.fullName.trim()) {
    errors.fullName = 'El nombre es requerido'
    isValid = false
  }
  
  if (!form.phone.trim()) {
    errors.phone = 'El teléfono es requerido'
    isValid = false
  }
  
  if (!form.email.trim()) {
    errors.email = 'El correo es requerido'
    isValid = false
  } else if (!/\S+@\S+\.\S+/.test(form.email)) {
    errors.email = 'El formato del correo no es válido'
    isValid = false
  }
  
  if (!form.product) {
    errors.product = 'Selecciona un producto de interés'
    isValid = false
  }
  
  if (!form.privacyAccepted) {
    errors.privacyAccepted = 'Debes aceptar la política de privacidad'
    isValid = false
  }
  
  return isValid
}

// Enviar formulario
const submitForm = async () => {
  if (!validateForm()) return
  
  isSubmitting.value = true
  
  try {
    // Aquí iría la lógica para enviar el formulario
    await new Promise(resolve => setTimeout(resolve, 2000)) // Simulación
    
    // Reset form
    Object.keys(form).forEach(key => {
      if (typeof form[key] === 'boolean') {
        form[key] = false
      } else {
        form[key] = ''
      }
    })
    
    alert('Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.')
  } catch (error) {
    alert('Error al enviar el mensaje. Por favor, inténtalo de nuevo.')
  } finally {
    isSubmitting.value = false
  }
}

// Abrir WhatsApp
const openWhatsApp = () => {
  const message = encodeURIComponent('Hola, me interesa conocer más sobre los servicios de Zuma')
  const whatsappUrl = `https://wa.me/51999888777?text=${message}`
  window.open(whatsappUrl, '_blank')
}

// Suscribirse al newsletter
const subscribeNewsletter = async () => {
  newsletter.error = ''
  newsletter.success = false
  
  if (!newsletter.email.trim()) {
    newsletter.error = 'El correo es requerido'
    return
  }
  
  if (!/\S+@\S+\.\S+/.test(newsletter.email)) {
    newsletter.error = 'El formato del correo no es válido'
    return
  }
  
  if (!newsletter.privacyAccepted) {
    newsletter.error = 'Debes aceptar la política de privacidad'
    return
  }
  
  newsletter.isSubmitting = true
  
  try {
    // Aquí iría la lógica para suscribir al newsletter
    await new Promise(resolve => setTimeout(resolve, 1500))
    
    newsletter.success = true
    newsletter.email = ''
    newsletter.privacyAccepted = false
  } catch (error) {
    newsletter.error = 'Error al suscribirse. Inténtalo de nuevo.'
  } finally {
    newsletter.isSubmitting = false
  }
}
</script>

<style scoped>
/* Estilos adicionales si son necesarios */
.p-card .p-card-title {
  margin-bottom: 1rem;
}

.p-button:hover {
  transform: translateY(-1px);
  transition: transform 0.2s ease;
}

.p-inputtext:focus,
.p-dropdown:focus,
.p-textarea:focus {
  border-color: #6790FF;
  box-shadow: 0 0 0 2px rgba(103, 144, 255, 0.2);
}
</style>