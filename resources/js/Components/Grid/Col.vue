<script setup>
defineProps({
  base: String,
  sm: String,
  md: String,
  lg: String,
});
</script>
<template>
  <div
    :class="`col-${base || '12'} ${sm && 'col-sm-' + sm} ${
      md && 'col-md-' + md
    } ${lg && 'col-lg-' + lg}`"
    v-bind="$attrs"
  >
    <slot />
  </div>
</template>
