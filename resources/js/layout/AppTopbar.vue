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
            <button class="layout-menu-button layout-topbar-action" @click="toggleMenu">
                <i class="pi pi-bars"></i>
            </button>
            <Link href="/dashboard" class="layout-topbar-logo zuma-hover">
            <strong>zuma</strong>
            </Link>

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