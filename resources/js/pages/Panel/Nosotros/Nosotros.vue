<template>
    <div>
        <section class="flex flex-col gap-10 py-20 px-6 lg:px-20 bg-gradient-to-br from-[#EDEAE4] to-[#F5F2EC]">
            <!-- Título con línea -->
            <div class="w-full animate-fadeInUp">
                <h1 class="text-4xl font-bold text-gray-800 flex items-center gap-3">
                    <span class="animate-float">🏢</span>
                    Nosotros
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-[#5A4E3C] to-[#8B7355] rounded-full mt-3 animate-slideInLeft delay-200"></div>
            </div>
        </section>

        <div class="px-6 lg:px-20 -mt-10 relative z-10">
            <div class="text-gray-700 space-y-12">
                <!-- Aliados Card -->
                <div class="animate-slideInUp delay-300">
                    <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover border border-gray-100">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="bg-gradient-to-br from-[#5A4E3C] to-[#8B7355] p-4 rounded-2xl icon-bounce">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-[#5A4E3C]">Invertimos Juntos como Aliados</h2>
                        </div>
                        <p class="text-lg leading-relaxed">
                            En Zuma buscamos representar la unión real entre el inversionista y la empresa, mostrando cómo, a través
                            de esta conexión, impulsamos el crecimiento del capital y generamos oportunidades financieras para
                            quienes las necesitan.
                        </p>
                    </div>
                </div>

                <!-- Misión y Visión en columnas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Misión Card -->
                    <div class="animate-slideInLeft delay-400">
                        <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover border border-gray-100 h-full">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-4 rounded-2xl icon-bounce">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-semibold text-[#5A4E3C]">Misión</h2>
                            </div>
                            <p class="text-lg leading-relaxed">
                                Brindamos soluciones de inversión, capitalizamos nuestro lado humano, asegurando que cada propuesta
                                no solo informe, sino que conecte, confiando en nuestro potencial su capital o negocio.
                            </p>
                        </div>
                    </div>

                    <!-- Visión Card -->
                    <div class="animate-slideInRight delay-500">
                        <div class="bg-white rounded-3xl p-8 shadow-2xl card-hover border border-gray-100 h-full">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-4 rounded-2xl icon-bounce">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-semibold text-[#5A4E3C]">Visión</h2>
                            </div>
                            <p class="text-lg leading-relaxed">
                                Convertirnos en la solución financiera de referencia para las pequeñas y medianas empresas,
                                brindándoles acceso a liquidez y capital de trabajo. Ser una empresa reconocida por su
                                transparencia, cercanía, confianza y estabilidad. Construyendo aliados sólidos con sus clientes y
                                socios.
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</template>

<script setup>
// Vue 3 Composition API
</script>

<style scoped>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0px); 
    }
    50% { 
        transform: translateY(-10px); 
    }
}

.animate-fadeInUp {
    animation: fadeInUp 0.8s ease-out forwards;
}

.animate-slideInLeft {
    animation: slideInLeft 0.8s ease-out forwards;
}

.animate-slideInRight {
    animation: slideInRight 0.8s ease-out forwards;
}

.animate-slideInUp {
    animation: slideInUp 0.8s ease-out forwards;
}

.animate-scaleIn {
    animation: scaleIn 0.6s ease-out forwards;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.card-hover {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.15);
}

.icon-bounce {
    transition: all 0.3s ease;
}

.icon-bounce:hover {
    transform: scale(1.1) rotate(5deg);
}

/* Delays para animaciones secuenciales */
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
.delay-400 { animation-delay: 0.4s; }
.delay-500 { animation-delay: 0.5s; }
.delay-600 { animation-delay: 0.6s; }
.delay-700 { animation-delay: 0.7s; }
</style>