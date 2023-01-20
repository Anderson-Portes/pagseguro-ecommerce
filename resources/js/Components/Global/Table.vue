<script setup>
import { toTitleCase } from "../../Utils";
import Button from "../Form/Button.vue";

defineProps({
  keys: Array,
  items: Object,
});
</script>
<template>
  <table class="table table-responsive table-hover table-borderless">
    <thead>
      <tr>
        <th v-for="key in keys">{{ toTitleCase(key) }}</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <slot />
    </tbody>
  </table>
</template>
