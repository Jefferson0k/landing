<script setup lang="ts">
import { ref, onMounted } from 'vue';
import FeaturesWidget from '@/components/landing/FeaturesWidget.vue';
import FooterWidget from '@/components/landing/FooterWidget.vue';
import HeroWidget from '@/components/landing/HeroWidget.vue';
import HighlightsWidget from '@/components/landing/HighlightsWidget.vue';
import TopbarWidget from '@/components/landing/TopbarWidget.vue';
import { showChatbot } from './chatbotState';

onMounted(() => {
    showChatbot();
});
</script>

<template>
    <div class="bg-surface-0 dark:bg-surface-900">
        <div id="home" class="landing-wrapper overflow-hidden" style="background-color: #6790FF;">
            <div class="py-6 px-6 mx-0 md:mx-12 lg:mx-20 lg:px-20 flex items-center justify-between relative lg:static">
                <TopbarWidget/>
            </div>
            <HeroWidget />
            <FeaturesWidget />
            <HighlightsWidget />
            <FooterWidget />
        </div>
    </div>
</template>
