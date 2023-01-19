<script setup>
defineProps({
  justify: String,
  align: String,
  gap: String
})
</script>
<template>
  <div :class="`row ${justify && 'justify-content-'+justify} ${align && 'align-items-'+align} ${gap && 'g-'+gap}`"
    v-bind="$attrs">
    <slot />
  </div>
</template>