<script setup>
defineProps({
  icon: String
});
</script>
<template>
  <i :class="`bi bi-${icon}`" v-bind="$attrs"></i>
</template>