<script setup lang="ts">
import { ref, onMounted } from 'vue';
import FeaturesWidget from '@/components/landing/FeaturesWidget.vue';
import FooterWidget from '@/components/landing/FooterWidget.vue';
import HeroWidget from '@/components/landing/HeroWidget.vue';
import HighlightsWidget from '@/components/landing/HighlightsWidget.vue';
import PricingWidget from '@/components/landing/PricingWidget.vue';
import TopbarWidget from '@/components/landing/TopbarWidget.vue';
import CustomesWidget from '@/components/landing/CustomesWidget.vue';
import { Head } from '@inertiajs/vue3';
import { showChatbot } from './chatbotState';

onMounted(() => {
    showChatbot();
});

</script>

<template>
    <Head title="Landing"></Head>
    <div class="bg-surface-0 dark:bg-surface-900">
        <div id="home" class="landing-wrapper overflow-hidden">
            <div class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static">
                <TopbarWidget />
            </div>
            <HeroWidget />
            <FeaturesWidget />
            <!--<hlightsWidget />
            <PricingWidget />-->
            <FooterWidget />
        </div>
    </div>
</template>
