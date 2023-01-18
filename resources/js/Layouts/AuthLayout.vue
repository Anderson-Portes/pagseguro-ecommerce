<script setup>
import { router } from '@inertiajs/core';
import Card from '../Components/Global/Card.vue';

</script>
<template>
  <div class="bg-body-secondary vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-11 col-md-8 col-lg-6 p-0">
          <slot />
        </div>
      </div>
    </div>
  </div>
</template>