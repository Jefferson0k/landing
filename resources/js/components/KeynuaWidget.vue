<template>
  <div v-if="token">
    <div class="keynua-widget" :data-token="token"></div>
  </div>
</template>

<script>
export default {
  props: {
    token: {
      type: String,
      required: true
    }
  },
  mounted() {
    if (window.KeynuaWidget) {
      window.KeynuaWidget.init();
    }
  }
};
</script>
