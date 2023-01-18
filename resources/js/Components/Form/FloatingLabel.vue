<script setup>
import Input from './Input.vue';
defineProps({
  keyValue: String,
  error: String,
  type: String
});
</script>
<template>
  <div class="form-floating mb-2">
    <Input :type="type || ''" :placeholder="keyValue" :id="keyValue?.replaceAll(' ', '_').toLowerCase()"
      v-bind="$attrs" />
    <label :for="keyValue?.replaceAll(' ', '_').toLowerCase()">{{ keyValue }}</label>
    <p class="text-danger" v-if="error">{{ error }}</p>
  </div>
</template>