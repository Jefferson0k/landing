<template>
    <div class="py-6 px-6 mx-0 mt-20 lg:mx-20">
        <!-- Contenedor principal -->
        <div class="grid grid-cols-12 gap-10">
            <!-- Sección de información ZUMA -->
            <div class="col-span-12 md:col-span-3 flex flex-col justify-between">
                <div>
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                        ZUMA impulsa la creatividad y la innovación para un futuro más brillante.
                    </p>
                    <!-- Íconos sociales -->
                    <div class="flex space-x-4 text-gray-600 dark:text-gray-300 text-2xl">
                        <i class="fab fa-github hover:text-[#FF4929] cursor-pointer"></i>
                        <i class="fab fa-x-twitter hover:text-[#FF4929] cursor-pointer"></i>
                        <i class="fab fa-youtube hover:text-[#FF4929] cursor-pointer"></i>
                        <i class="fab fa-discord hover:text-[#FF4929] cursor-pointer"></i>
                    </div>
                </div>
                <!-- Copyright -->
                <div class="mt-8 text-sm text-gray-500 dark:text-gray-400">
                    <span>&copy; 2025 ZUMA</span>
                    <span class="mx-4">|</span>
                    <a href="#" class="hover:underline">Legal</a>
                    <span class="mx-4">|</span>
                    <a href="#" class="hover:underline">Status</a>
                </div>
            </div>

            <!-- Secciones de enlaces -->
            <div class="col-span-12 md:col-span-9 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#" class="hover:underline">About Us</a></li>
                        <li><a href="#" class="hover:underline">News</a></li>
                        <li><a href="#" class="hover:underline">Careers</a></li>
                        <li><a href="#" class="hover:underline">Media Kit</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-4">Resources</h4>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#" class="hover:underline">Get Started</a></li>
                        <li><a href="#" class="hover:underline">Learn</a></li>
                        <li><a href="#" class="hover:underline">Case Studies</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white mb-4">Community</h4>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#" class="hover:underline">Discord</a></li>
                        <li><a href="#" class="hover:underline">FAQ</a></li>
                        <li><a href="#" class="hover:underline">Blog</a></li>
                    </ul>
                </div>
            </div>

            <!-- ZUMA final -->
            <div class="col-span-12">
                <div class="w-full h-[400px] overflow-hidden flex items-center justify-center">
                    <h1 class="text-[400px] font-bold leading-none" style="color: #EDEAE4;">
                        Zu<span class="font-extrabold">m</span>a
                    </h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, onUnmounted } from 'vue';
import { showChatbot, hideChatbot } from './chatbotState';

onMounted(() => {
  console.log('SE ACTIVA');
    showChatbot();
});
onUnmounted(() => {
    console.log('SE DESACTIVA EL CHATBOT');
    hideChatbot();
});
</script>