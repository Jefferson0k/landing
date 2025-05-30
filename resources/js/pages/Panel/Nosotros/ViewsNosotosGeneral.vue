<script setup lang="ts">
import FooterWidget from '@/components/landing/FooterWidget.vue';
import TopbarWidget from '@/components/landing/TopbarWidget.vue';
import { Head } from '@inertiajs/vue3';
import Nosotros from './Nosotros.vue';
//import { showChatbot} from  '';

//onMounted(() => {
//    showChatbot();
//});

</script>

<template>
    <Head title="Landing"></Head>
    <div class="bg-surface-0 dark:bg-surface-900">
        <div id="home" class="landing-wrapper overflow-hidden">
            <div class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static">
                <TopbarWidget />
            </div>
            <Nosotros />
            <FooterWidget />
        </div>
    </div>
</template>
