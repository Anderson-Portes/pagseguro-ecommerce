<script setup>
import BaseLayout from '../Layouts/BaseLayout.vue';
import { user } from '../Bootstrap/constraints';
</script>
<template>
  <BaseLayout>
    <h1>Hello World {{ user.name }}</h1>
  </BaseLayout>
</template>