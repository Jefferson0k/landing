<script setup>
import Button from 'primevue/button';
import { router, Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Detectar URL actual
const page = usePage();
const isLoginPage = computed(() =>
    ['/login', '/auth/login'].includes(page.url)
);

// Scroll suave al hacer clic en los links
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
    <Link class="flex items-center" href="/">
        <span class="text-surface-900 dark:text-surface-0 font-medium text-2xl leading-normal mr-20">ZUMA</span>
    </Link>

    <!-- Botón hamburguesa (para móviles) -->
    <Button class="lg:!hidden" text severity="secondary" rounded
        v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }">
        <i class="pi pi-bars !text-2xl"></i>
    </Button>

    <!-- Navbar principal -->
    <div
        class="items-center bg-surface-0 dark:bg-surface-900 grow hidden lg:flex absolute lg:static w-full left-0 top-full px-12 lg:px-0 z-20 rounded-border"
        style="background-color: #6790FF;">
        <div class="ml-auto flex items-center gap-8">
            <!-- Menú -->
            <ul
                class="list-none p-0 m-0 flex lg:items-center select-none flex-col lg:flex-row cursor-pointer gap-8">
                <li>
                    <a @click="smoothScroll('hero')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl">
                        <span>Nosotros</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('features')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl">
                        <span>Productos</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('highlights')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl">
                        <span>Contáctanos</span>
                    </a>
                </li>
                <li>
                    <a @click="smoothScroll('pricing')"
                        class="px-0 py-4 text-surface-900 dark:text-surface-0 font-medium text-xl">
                        <span>Blog</span>
                    </a>
                </li>
            </ul>

            <!-- Botones de acción -->
            <div
                v-if="!isLoginPage"
                class="flex border-t lg:border-t-0 border-surface py-4 lg:py-0 mt-4 lg:mt-0 gap-2"
            >
                <Button
                    label="Iniciar Sesión"
                    severity="contrast"
                    variant="text"
                    @click="() => router.visit('/login')"
                    rounded
                />
                <Button
                    label="Regístrate"
                    severity="warn"
                    to="/auth/login"
                    rounded
                />
            </div>
        </div>
    </div>
</template>
