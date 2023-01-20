<script setup>
import Input from "./Input.vue";
defineProps({
  keyValue: String,
  error: String,
  type: String,
  isTextarea: Boolean,
});
</script>
<template>
  <div class="form-floating mb-2">
    <template v-if="isTextarea">
      <textarea
        :placeholder="keyValue"
        :id="keyValue?.replaceAll(' ', '_').toLowerCase()"
        v-bind="$attrs"
        :class="error && 'is-invalid'"
        class="form-control"
      ></textarea>
    </template>
    <template v-else>
      <Input
        :type="type || ''"
        :placeholder="keyValue"
        :id="keyValue?.replaceAll(' ', '_').toLowerCase()"
        v-bind="$attrs"
        :class="error && 'is-invalid'"
      />
    </template>
    <label :for="keyValue?.replaceAll(' ', '_').toLowerCase()">
      {{ keyValue }}
    </label>
    <strong class="invalid-feedback" v-if="error">{{ error }}</strong>
  </div>
</template>
