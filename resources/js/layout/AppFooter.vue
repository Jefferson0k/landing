<script setup>
import Button from 'primevue/button';
</script>

<template>
  <footer class="layout-footer">
    <div class="grid grid-cols-12 gap-8 p-6 sm:p-10">
      <!-- Primera columna - Logo y contacto -->
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="footer-brand mb-6">
          <h2 class="text-3xl font-bold">zuma</h2>

          <div class="contact-info space-y-4 mb-6">
            <div class="flex items-center gap-3">
              <i class="pi pi-phone text-orange-500"></i>
              <span>616-6600</span>
            </div>

            <div class="flex items-center gap-3">
              <i class="pi pi-envelope text-orange-500"></i>
              <span>garantia@garantiacapital.com</span>
            </div>

            <div class="flex items-start gap-3">
              <i class="pi pi-map-marker text-orange-500 mt-1"></i>
              <div>
                <div>Av. Faustino Sánchez Carrión 417,</div>
                <div>Magdalena del Mar</div>
                <div>Lima - Perú</div>
              </div>
            </div>
          </div>

          <!-- Redes sociales -->
          <div class="flex gap-3">
            <a href="#" class="social-link">
              <i class="pi pi-facebook"></i>
            </a>
            <a href="#" class="social-link">
              <i class="pi pi-instagram"></i>
            </a>
            <a href="#" class="social-link">
              <i class="pi pi-whatsapp"></i>
            </a>
            <a href="#" class="social-link">
              <i class="pi pi-youtube"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Segunda columna - Servicios -->
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="space-y-8">
          <div>
            <h3 class="text-lg font-semibold mb-4">Préstamos</h3>
            <ul class="space-y-2">
              <li>
                <a href="#" class="footer-link">
                  <i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>
                  Con Garantía Hipotecaria
                </a>
              </li>
              <li>
                <a href="#" class="footer-link">
                  <i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>
                  Con Garantía Vehicular
                </a>
              </li>
              <li>
                <a href="#" class="footer-link">
                  <i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>
                  Préstamos Constructor
                </a>
              </li>
            </ul>
          </div>

          <div>
            <h3 class="text-lg font-semibold mb-4">Inversiones</h3>
            <ul class="space-y-2">
              <li>
                <a href="#" class="footer-link">
                  <i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>
                  Inversiones en facturas
                </a>
              </li>
              <li>
                <a href="#" class="footer-link">
                  <i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>
                  Ahorro de alto rendimiento
                </a>
              </li>
            </ul>
          </div>

          <div class="space-y-4">
            <h3 class="text-lg font-semibold">Factoring</h3>
            <h3 class="text-lg font-semibold">Confirming</h3>
            <h3 class="text-lg font-semibold">Inversores</h3>
          </div>
        </div>
      </div>

      <!-- Tercera columna - Nosotros -->
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div>
          <h3 class="text-lg font-semibold mb-4">Nosotros</h3>
          <ul class="space-y-2">
            <li><a href="#" class="footer-link"><i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Blog</a>
            </li>
            <li><a href="#" class="footer-link"><i
                  class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Referidos</a></li>
            <li><a href="#" class="footer-link"><i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Únete al
                equipo</a></li>
            <li><a href="#" class="footer-link"><i
                  class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Contacto</a></li>
            <li><a href="#" class="footer-link"><i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Sucursal
                virtual</a></li>
          </ul>
        </div>
      </div>

      <!-- Cuarta columna - Información adicional -->
      <div class="col-span-12 sm:col-span-6 md:col-span-3">
        <div class="space-y-8">
          <div>
            <h3 class="text-lg font-semibold mb-4">Preguntas frecuentes</h3>
          </div>

          <div>
            <h3 class="text-lg font-semibold mb-4">Transparencia</h3>
            <ul class="space-y-2">
              <li><a href="#" class="footer-link"><i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Canal de
                  denuncias</a></li>
              <li><a href="#" class="footer-link"><i
                    class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Transparencia</a></li>
            </ul>
          </div>

          <div>
            <h3 class="text-lg font-semibold mb-4">Legales</h3>
            <ul class="space-y-2">
              <li><a href="#" class="footer-link"><i
                    class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Políticas de privacidad</a></li>
              <li><a href="#" class="footer-link"><i class="pi pi-circle-fill text-orange-500 text-xs mr-2"></i>Términos
                  y condiciones</a></li>
            </ul>
          </div>
          <div class="flex justify-between items-center">
            <Button label="Libro de reclamaciones" rounded icon="pi pi-book mr-2" variant="outlined" severity="warn" />
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="text-center py-4 border-t text-sm">
    © {{ new Date().getFullYear() }} Zuma - Todos los derechos reservados.
  </div>
</template>

<style scoped>
.social-link {
  @apply bg-orange-500 rounded-full w-10 h-10 flex items-center justify-center transition duration-300 hover:bg-orange-600;
}

.footer-link {
  @apply hover:underline text-sm;
}
</style>
