<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Button from 'primevue/button';

function smoothScroll(id) {
    document.body.click();
    const element = document.getElementById(id);
    if (element) {
        element.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
}
</script>

<template>
    <div class="fixed top-0 left-0 w-full z-50 py-6 px-6 mx-0 md:px-12 lg:px-20 flex items-center justify-between rounded-b-2xl shadow-lg"
        style="background: rgb(103, 144, 255);">

        <!-- Logo que va a la ruta '/' -->
        <Link href="/" class="flex items-center">
        <span class="text-5xl font-bold text-black relative leading-none">
            ZUMA
            <div class="absolute -bottom-2 left-0 w-full h-1 bg-black rounded-full opacity-30"></div>
        </span>
        </Link>
        <!-- Botón de menú en móvil -->
        <Button class="lg:!hidden lg:order-3" text severity="secondary" rounded
            v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }">
            <i class="pi pi-bars !text-2xl text-white"></i>
        </Button>

        <!-- Menú de navegación -->
        <div
            class="items-center bg-white lg:bg-transparent dark:bg-surface-900 grow justify-end hidden lg:flex absolute lg:static w-full right-0 top-full px-12 lg:px-0 z-20 rounded-border">
            <ul class="list-none p-0 m-0 flex lg:items-center select-none flex-col lg:flex-row cursor-pointer gap-8">
                <li>
                    <!-- Link a /nosotros con Inertia -->
                    <Link href="/Nosotros"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl hover:text-gray-200 transition-colors">
                    <span>Nosotros</span>
                    </Link>
                </li>
                <li>
                    <a @click="smoothScroll('features')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Planes</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('highlights')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Contáctanos</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('pricing')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Valores</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>
