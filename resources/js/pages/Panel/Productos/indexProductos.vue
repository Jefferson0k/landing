<template>
  <Head title="Productos" />
  <div class="bg-surface-0 dark:bg-surface-900">
    <div id="home" class="landing-wrapper overflow-hidden bg-[#6790FF]">
      <div
        class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static"
      >
        <TopbarWidget />
      </div>

      <!-- Sección de Productos -->
      <section
        class="flex flex-col gap-14 py-20 px-6 lg:px-24 bg-gradient-to-br from-[#EDEAE4] to-[#F5F2EC]"
      >
        <!-- Título principal -->
        <div class="text-center mb-10">
          <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-800 mb-4 tracking-tight">
            PRODUCTOS
          </h1>
          <p class="text-lg lg:text-xl text-gray-600 max-w-3xl mx-auto">
            Descubre nuestras alternativas de inversión diseñadas para diferentes perfiles y horizontes de inversión.
          </p>
        </div>

        <!-- Grid de productos -->
        <div class="grid gap-10 lg:grid-cols-3">
          <!-- Tarjeta 1 - Facturas -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <div class="p-8">
              <!-- Ícono -->
              <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                <img src="/imagenes/landing/Recurso 4.svg" alt="Facturas" class="w-8 h-8" />
              </div>
              
              <!-- Título y tag -->
              <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Facturas</h3>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                  Invierte desde $25
                </span>
              </div>
              
              <!-- Contenido -->
              <p class="text-gray-600 mb-6 leading-relaxed">
                ¡Bienvenido al mundo del factoring! Esta alternativa de inversión está orientada para aquel inversionista que tiene un horizonte de inversión corto. Las rentabilidades anuales van desde un <strong>10% a un 22% anual (TEA)</strong>. Al invertir en una cuenta por pagar, te conviertes en acreedor indirecto de las empresas más grandes y prestigiosas de tu país. Invierte desde $25. Easy.
              </p>
              
              <!-- Botón -->
              <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200 w-full">
                Show me more
              </button>
            </div>
          </div>

          <!-- Tarjeta 2 - Préstamos con Garantías -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <div class="p-8">
              <!-- Ícono -->
              <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                <img src="/imagenes/landing/Recurso 2.svg" alt="Préstamos" class="w-8 h-8" />
              </div>
              
              <!-- Título y tag -->
              <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Préstamos con Garantías</h3>
                <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                  Un solo inversionista ganador
                </span>
              </div>
              
              <!-- Contenido -->
              <p class="text-gray-600 mb-6 leading-relaxed">
                <strong>Plazos largos y montos altos.</strong> Todos los días, empresas o personas requieren de capital de forma rápida. Para mala suerte de ellos, el sistema financiero tradicional todavía se presenta lento y burocrático en sus procesos de evaluación y aprobación. Por ello en Zuma, recibimos a diario muchas de estas solicitudes, las cuales, después de una evaluación y depuración, de considerarlas apropiadas, ponemos a disposición de nuestra comunidad de inversionistas. Todas las operaciones cuentan con <strong>garantías de respaldo</strong>. Lamentablemente, para cada oportunidad de inversión que se presente, puede haber un solo inversionista ganador.
              </p>
              
              <!-- Botón -->
              <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200 w-full">
                Quiero ser el ganador
              </button>
            </div>
          </div>

          <!-- Tarjeta 3 - Depósitos a Plazo -->
          <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
            <div class="p-8">
              <!-- Ícono -->
              <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                <img src="/imagenes/landing/Recurso 5.svg" alt="Depósitos" class="w-8 h-8" />
              </div>
              
              <!-- Título -->
              <div class="mb-4">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Depósitos a Plazo</h3>
              </div>
              
              <!-- Contenido -->
              <p class="text-gray-600 mb-6 leading-relaxed">
                Esta alternativa la conocen todos y es la favorita de nuestro inversionista xxxx. Diversos plazos de inversión para <strong>tickets medianos</strong>. Pero claro, en Zuma, no te vamos a presentar el banco tradicional AAA que te paga 1 – 3% anual. ¡No! Presentamos alternativas del mercado con mayor rendimiento de instituciones más pequeñas, pero con <strong>cobertura del Seguro de Depósito</strong>. Así, si inviertes el monto adecuado, pase lo que pase, tu capital está garantizado.
              </p>
              
              <!-- Botón -->
              <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-200 w-full">
                Gloria a ti señor
              </button>
            </div>
          </div>
        </div>

        <!-- Advertencia y Quiz -->
        <div class="bg-white/90 backdrop-blur-md rounded-3xl p-10 shadow-lg border border-gray-200">
          <div class="max-w-4xl mx-auto text-center">
            <!-- Reemplazando el ícono de PrimeIcons con un emoji o símbolo HTML -->
            <div class="text-yellow-600 text-4xl mb-4">⚠️</div>
            <h3 class="text-3xl font-bold mb-4 text-gray-800">Advertencia de Riesgo</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
              Toda oportunidad de inversión presenta un riesgo. Existe la posibilidad que el retorno ofrecido por la oportunidad de inversión, no se cumpla. Inclusive, como casi todas las inversiones, es posible, que pierdas el íntegro de tu capital. Por ello, recomendamos que diversifiques tus inversiones.
            </p>
            <div class="bg-gray-100 rounded-xl p-6 mb-6 border-l-4 border-blue-500">
              <p class="font-medium text-lg italic text-gray-800">
                "Como diría la abuela: Nunca pongas todos tus huevos en una misma canasta."
              </p>
            </div>
            <p class="text-gray-700 mb-8">
              Te presentamos a continuación una forma rápida y sencilla de conocer qué tipo de inversionista eres.
            </p>
            <button
              @click="showDialog = true"
              class="bg-blue-600 text-white hover:bg-blue-700 font-bold py-4 px-10 rounded-lg text-lg transition-transform duration-200 hover:scale-105 shadow-md"
            >
              Accede al Quiz – Perfil de Riesgo
            </button>
          </div>
        </div>
         <Dialog
  v-model:visible="showDialog"
  modal
  header="Perfiles de Inversionista"
  :style="{ width: '90vw', maxWidth: '800px' }"
>
  <div class="grid gap-8 md:grid-cols-3 text-left">
    <div class="bg-blue-50 rounded-xl p-4 shadow-sm">
      <h4 class="text-lg font-bold mb-2">🧭 El Trekker</h4>
      <p class="text-sm text-gray-700">
        Este inversionista prefiere rutas seguras y bien planeadas. No busca emociones fuertes ni grandes saltos de rentabilidad. Prefiere ir paso a paso, asegurado en cada movimiento.<br><br>
        Si tiene que elegir un animal para identificarse, elegiría el <strong>búho</strong>, sabio y tranquilo.<br>
        Se rige por la frase: <span class="italic">“Lento pero seguro”.</span><br><br>
        <strong>Perfil: Conservador</strong>
      </p>
    </div>

    <div class="bg-yellow-50 rounded-xl p-4 shadow-sm">
      <h4 class="text-lg font-bold mb-2">🏄‍♂️ El Surfista</h4>
      <p class="text-sm text-gray-700">
        Sabe que el mar tiene sus riesgos, pero también conoce las olas y cómo dominarlas. Acepta cierta volatilidad, buscando equilibrio entre riesgo y rentabilidad.<br><br>
        <strong>Perfil: Moderado</strong>
      </p>
    </div>

    <div class="bg-red-50 rounded-xl p-4 shadow-sm">
      <h4 class="text-lg font-bold mb-2">🪂 El Paracaidista</h4>
      <p class="text-sm text-gray-700">
        Este inversionista busca adrenalina y altos retornos. Está dispuesto a asumir riesgos importantes, confiando en su experiencia o en una buena estrategia de aterrizaje.<br><br>
        Puede darse el lujo de tomar inversiones de largo plazo e inclusive en opciones de retorno variable.<br><br>
        <strong>Perfil: Agresivo</strong>
      </p>
    </div>
  </div>
</Dialog>

      </section>

      <FooterWidget />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Head } from '@inertiajs/vue3'
import TopbarWidget from '@/components/landing/TopbarWidget.vue'
import FooterWidget from '@/components/landing/FooterWidget.vue'
import Dialog from 'primevue/dialog'

const showDialog = ref(false)
</script>