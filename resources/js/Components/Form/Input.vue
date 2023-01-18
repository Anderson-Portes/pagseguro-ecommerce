<script setup>
defineProps({
  modelValue: String,
});
</script>
<template>
  <input :class="`${$attrs.type == 'checkbox' || $attrs.type == 'radio' ? 'form-check-input' : 'form-control'}`"
    v-bind="$attrs" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
</template>
