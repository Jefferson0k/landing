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
    <div class="fixed top-0 left-0 w-full z-50 py-6 px-6 mx-0 md:px-12 lg:px-20 flex items-center justify-between shadow-lg"
        style="background: rgb(103, 144, 255); border-bottom-left-radius: 3rem; border-bottom-right-radius: 3rem;">
        <a class="flex items-center" href="#">
            <span class="font-bold text-4xl text-black leading-normal mr-20">ZUMA</span>
        </a>
        
        <!-- Botón de menú en móvil -->
        <Button class="lg:!hidden lg:order-3" text severity="secondary" rounded
            v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }">
            <i class="pi pi-bars !text-2xl text-white"></i>
        </Button>

        <!-- Menú de navegación -->
        <div
            class="items-center bg-surface-0 dark:bg-surface-900 grow justify-end hidden lg:flex absolute lg:static w-full right-0 top-full px-12 lg:px-0 z-20 rounded-border lg:bg-transparent">
            <ul class="list-none p-0 m-0 flex lg:items-center select-none flex-col lg:flex-row cursor-pointer gap-8">
                <li>
                    <a @click="smoothScroll('hero')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0  font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Nosotros</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('features')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Planes</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('highlights')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0  font-medium text-xl hover:text-gray-200 transition-colors">
                        <span>Contactanos</span>
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
