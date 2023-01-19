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
    <Input :type="type || ''" :placeholder="keyValue" :id="keyValue?.replaceAll(' ', '_').toLowerCase()" v-bind="$attrs"
      :class="error && 'is-invalid'" />
    <label :for="keyValue?.replaceAll(' ', '_').toLowerCase()">{{ keyValue }}</label>
    <strong class="invalid-feedback" v-if="error">{{ error }}</strong>
  </div>
</template>