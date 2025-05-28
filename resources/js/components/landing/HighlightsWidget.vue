<template>
    <div id="highlights" class="py-6 px-6 lg:px-20 mx-0 my-12 lg:mx-20">
        <div class="card center">
        <Galleria :value="images" :responsiveOptions="responsiveOptions" :numVisible="5" containerStyle="max-width: 640px">
            <template #item="slotProps">
                <img src="" :alt="slotProps.item.alt" style="width: 100%" />
            </template>
            <template #thumbnail="slotProps">
                <img src="" :alt="slotProps.item.alt" />
            </template>
        </Galleria>
    </div>
    </div>
</template>
<script stup>
import ref from 'vue';
import Galleria from 'primevue/galleria';

<script>