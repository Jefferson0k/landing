<script setup>
import { Link } from '@inertiajs/vue3';
import { useLayout } from '@/layout/composables/layout';
import AppConfigurator from './AppConfigurator.vue';
import { router } from '@inertiajs/vue3';
import OverlayBadge from 'primevue/overlaybadge';

const { toggleMenu, toggleDarkMode, isDarkTheme } = useLayout();

const logout = () => {
    router.post(route('logout'));
};

const goToProfile = () => {
    router.get('/settings/profile');
};
</script>

<template>
    <div class="layout-topbar">
        <div class="layout-topbar-logo-container">
            <Link href="/dashboard" class="layout-topbar-logo zuma-hover">
            <strong>
                <h1>zuma</h1>
            </strong>
            </Link>
            <button class="layout-menu-button layout-topbar-action ml-32" @click="toggleMenu">
    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 26 22" fill="none">
        <rect x="1.51078" y="1.5267" width="22.7718" height="19.1942" rx="5.31803" transform="rotate(-0.620767 1.51078 1.5267)" stroke="#101010" stroke-width="2"/>
        <line x1="11.0977" y1="20.5049" x2="11.0977" y2="1.35933" stroke="#101010" stroke-width="2"/>
        <path d="M5.39844 6.86353H7.79163" stroke="#101010" stroke-width="2" stroke-linecap="round"/>
        <path d="M5.39844 11.1711H7.79163" stroke="#101010" stroke-width="2" stroke-linecap="round"/>
    </svg>
</button>

        </div>

        <div class="layout-topbar-actions">
            <div class="layout-config-menu">
                <button type="button" class="layout-topbar-action" @click="toggleDarkMode">
                    <i :class="['pi', { 'pi-moon': isDarkTheme, 'pi-sun': !isDarkTheme }]"></i>
                </button>
                <div class="relative hidden">
                    <button
                        v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }"
                        type="button" class="layout-topbar-action layout-topbar-action-highlight">
                        <i class="pi pi-palette"></i>
                    </button>
                    <AppConfigurator />
                </div>
                <div class="relative">
                    <button type="button" class="layout-topbar-action">
                        <OverlayBadge :value="2">
                            <i class="pi pi-bell" style="font-size: 1.25rem" />
                        </OverlayBadge>
                    </button>
                </div>
            </div>

            <button class="layout-topbar-menu-button layout-topbar-action"
                v-styleclass="{ selector: '@next', enterFromClass: 'hidden', enterActiveClass: 'animate-scalein', leaveToClass: 'hidden', leaveActiveClass: 'animate-fadeout', hideOnOutsideClick: true }">
                <i class="pi pi-ellipsis-v"></i>
            </button>

            <div class="layout-topbar-menu hidden lg:block">
                <div class="layout-topbar-menu-content">
                    <button type="button" class="layout-topbar-action" @click="goToProfile">
                        <i class="pi pi-user"></i>
                        <span>Profile</span>
                    </button>
                    <button type="button" @click="logout" class="layout-topbar-action">
                        <i class="pi pi-sign-out"></i>
                        <span>Cerrar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>