<script setup>
defineProps({
  errors: Object
});
</script>
<template>
  <div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container top-0 end-0 p-3">
      <div class="toast text-bg-danger fade show my-0" role="alert" aria-live="assertive" aria-atomic="true"
        v-for="error in errors">
        <div class="toast-body d-flex align-items-center justify-content-between">
          {{ error }}
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
</template>