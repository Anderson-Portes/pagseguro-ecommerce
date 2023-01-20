<script setup>
import BaseLayout from "../Layouts/BaseLayout.vue";
import { permissions } from "../Bootstrap/constraints";
</script>
<template>
  <BaseLayout>
    <h1>Hello World</h1>
    <pre>{{ permissions }}</pre>
  </BaseLayout>
</template>
