<script setup>
import Icon from '../Global/Icon.vue';

defineProps({
  color: String,
  size: String,
  icon: String,
  type: String,
  text: String
});
</script>
<template>
  <button :class="`btn btn-${color || 'primary'} btn-${size || 'md'}`" :type="type || ''">
    <Icon :icon="icon" :class="text && 'me-2'" v-if="icon" />{{ text }}
  </button>
</template>