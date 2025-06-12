<template>
    <!-- Grid responsive con tarjetas más pequeñas -->
    <div class="grid grid-cols-12 gap-3 p-3">
        <!-- Tarjeta 1 -->
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <div class="relative bg-white shadow-md rounded-xl overflow-hidden group">
                <!-- Imagen más pequeña y con forma -->
                <img src="https://primefaces.org/cdn/primevue/images/compare/island1.jpg" alt="Servicio 1"
                    class="w-full h-44 object-cover rounded-t-xl transition-transform duration-500 group-hover:scale-105" />
                <!-- Línea decorativa -->
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 opacity-80 z-10">
                </div>
                <!-- Botón lateral derecho -->
                <div class="absolute top-3 right-3 z-20">
                    <Button label="Servicio 1" severity="warn" rounded size="small" />
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <div class="relative bg-white shadow-md rounded-xl overflow-hidden group">
                <img src="https://primefaces.org/cdn/primevue/images/compare/island1.jpg" alt="Servicio 2"
                    class="w-full h-44 object-cover rounded-t-xl transition-transform duration-500 group-hover:scale-105" />
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 opacity-80 z-10">
                </div>
                <div class="absolute top-3 right-3 z-20">
                    <Button label="Servicio 2" severity="secondary" rounded size="small" />
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
            <div class="relative bg-white shadow-md rounded-xl overflow-hidden group">
                <img src="https://primefaces.org/cdn/primevue/images/compare/island1.jpg" alt="Servicio 3"
                    class="w-full h-44 object-cover rounded-t-xl transition-transform duration-500 group-hover:scale-105" />
                <div
                    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-400 via-orange-400 to-yellow-400 opacity-80 z-10">
                </div>
                <div class="absolute top-3 right-3 z-20">
                    <Button label="Servicio 3" severity="contrast" rounded size="small" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Button from 'primevue/button';
</script>
