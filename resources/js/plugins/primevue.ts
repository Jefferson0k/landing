import type { App } from 'vue';
import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';
import ToastService from 'primevue/toastservice';
import Tooltip from 'primevue/tooltip';
import Aura from '@primeuix/themes/aura';
import StyleClass from 'primevue/styleclass';
import Toast from 'primevue/toast';

// Importa AnimateOnScroll
import AnimateOnScroll from 'primevue/animateonscroll';

export function setupPrimeVue(app: App) {
    // Usar PrimeVue y sus servicios
    app.use(PrimeVue, {
        theme: {
            preset: Aura,
            options: {
                darkModeSelector: ".app-dark",
            },
        },
    });

    app.use(ConfirmationService);
    app.use(ToastService);

    // Registrar directivas
    app.directive('styleclass', StyleClass);
    app.directive('tooltip', Tooltip);

    // Registrar AnimateOnScroll
    app.directive('animateonscroll', AnimateOnScroll);

    // Registrar componentes
    app.component('Toast', Toast);
}
