<script setup>
import BaseLayout from '../Layouts/BaseLayout.vue';
import { user } from '../Bootstrap/constraints';
</script>
<template>
  <BaseLayout>
    <h1>Hello World</h1>
    <pre>{{ user }}</pre>
  </BaseLayout>
</template>