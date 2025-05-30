<template>
  <div class="relative py-20 px-4 lg:px-16 bg-white overflow-hidden">
    <div class="max-w-4xl mx-auto text-center mb-12">
      <h2 class="text-4xl lg:text-5xl font-bold text-[#171717] mb-4">
        <span class="text-[#6790FF]">Comunidad</span>
        <span class="text-[#FF4929]"> de confianza</span>
      </h2>
      <p class="text-lg lg:text-xl text-[#171717]/80">
        Colaboramos con empresas líderes en el sector financiero para brindarte soluciones integrales y de vanguardia.
      </p>
    </div>

    <Carousel
      :value="images"
      :numVisible="4"
      :numScroll="1"
      :responsiveOptions="responsiveOptions"
      circular
      :autoplayInterval="3000"
    >
      <template #item="slotProps">
        <div class="m-4 flex justify-center items-center">
          <div class="bg-white p-6 rounded-xl shadow-lg w-40 h-40 flex items-center justify-center">
            <img
              :src="'./customers/' + slotProps.data.image"
              class="max-w-full max-h-full object-contain"
              :alt="'Logo de ' + (slotProps.index + 1)"
            />
          </div>
        </div>
      </template>
    </Carousel>
  </div>
</template>

<script setup>
import { ref } from "vue";
import Carousel from "primevue/carousel";

const images = ref([
  { image: "expirian1-removebg-preview.png" },
  { image: "garantia-removebg-preview (1).png" },
  { image: "keynua-removebg-preview.png" },
  { image: "sunat1-removebg-preview.png" },
]);

const responsiveOptions = ref([
  {
    breakpoint: "1400px",
    numVisible: 3,
    numScroll: 1,
  },
  {
    breakpoint: "1199px",
    numVisible: 3,
    numScroll: 1,
  },
  {
    breakpoint: "767px",
    numVisible: 2,
    numScroll: 1,
  },
  {
    breakpoint: "575px",
    numVisible: 1,
    numScroll: 1,
  },
]);
</script>
