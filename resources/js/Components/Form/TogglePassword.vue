<script setup>
import { onMounted, ref } from 'vue';
import Icon from '../Global/Icon.vue';

const setInputs = () => inputs.value = document.querySelectorAll('input[type=password]');
const showPassword = ref(false);
const inputs = ref([]);
const togglePassword = () => {
  showPassword.value = !showPassword.value;
  inputs.value.forEach(i => i.type = showPassword.value ? 'text' : 'password')
}
onMounted(setInputs);
</script>
<template>
  <Icon :icon="`eye-${showPassword ? 'slash-' : ''}fill`" @click="togglePassword" />
</template>