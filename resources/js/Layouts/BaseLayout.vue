<script setup>
import Navbar from '../Components/Navigation/Navbar.vue';

</script>
<template>
  <Navbar />
  <div class="container py-4">
    <slot />
  </div>
</template>