<script setup>
import { Link } from '@inertiajs/vue3'
</script>
<template>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebar-label">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </h5>
    </div>
    <div class="offcanvas-body">
      <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action">
          <i class="bi bi-gear me-2"></i>Perfil
        </a>
        <Link :href="route('logout')" method="post" class="list-group-item list-group-item-action" as="link">
        <i class="bi bi-escape me-2"></i>Sair
        </Link>
      </div>
    </div>
  </div>
</template>
<style>
#sidebar {
  width: 300px;
}
</style>